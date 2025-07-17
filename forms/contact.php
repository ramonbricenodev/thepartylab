<?php
// forms/contact.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

// -- DEBUG SETUP --
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function dbg($msg) {
    file_put_contents(__DIR__ . '/debug.log', date('[Y-m-d H:i] ') . $msg . "\n", FILE_APPEND);
}
// -- end DEBUG SETUP --

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

session_start();

// 0) Log raw POST
// dbg("RAW POST: " . print_r($_POST, true));

// 1) Rate-limiting
if (isset($_SESSION['last_submit']) && (time() - $_SESSION['last_submit']) < 60) {
    http_response_code(429);
    exit('DEBUG: rate-limit triggered.');
}
$_SESSION['last_submit'] = time();

// 2) Honeypot
if (!empty($_POST['website'])) {
    http_response_code(400);
    exit('DEBUG: honeypot triggered.');
}

// 3) CSRF
if (
    empty($_POST['csrf_token']) ||
    empty($_SESSION['csrf_token']) ||
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
    http_response_code(400);
    exit('DEBUG: invalid CSRF token.');
}

// 4) Timestamp + JS flag
$now  = time();
$then = intval($_POST['ts'] ?? 0);
if ($then === 0 || ($now - $then) < 3) {
    http_response_code(400);
    exit('DEBUG: spam (too fast).');
}
if (($_POST['js'] ?? '') !== '1') {
    http_response_code(400);
    exit('DEBUG: please enable JavaScript.');
}

// 5) Collect & validate (unchanged) …
$first_name = trim(strip_tags($_POST['first_name'] ?? ''));
$last_name  = trim(strip_tags($_POST['last_name']  ?? ''));
if ($first_name === '' || $last_name === '') {
    http_response_code(400);
    exit('First and last name are required.');
}
$name = "$first_name $last_name";

$email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
if (!$email) {
    http_response_code(400);
    exit('Invalid email address.');
}

$phone = trim(strip_tags($_POST['phone'] ?? ''));

$allowed_services = [
    'Kids Party','Wedding Kids',
    'Your Event | Our Expertise','Our Services','Exclusive Parties'
];
$services = '—';
if (is_array($_POST['services'] ?? null)) {
    $clean = [];
    foreach ($_POST['services'] as $srv) {
        $srv = strip_tags(trim($srv));
        if (in_array($srv, $allowed_services, true)) {
            $clean[] = $srv;
        }
    }
    $services = $clean ? implode(', ', $clean) : '—';
}

$preferred_date = $_POST['preferred_date'] ?? '';
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $preferred_date)) {
    http_response_code(400);
    exit('Invalid date format.');
}

$referral = strip_tags(trim($_POST['referral'] ?? '—'));

$message_body = trim(strip_tags($_POST['message'] ?? ''));
if ($message_body === '') {
    http_response_code(400);
    exit('Message cannot be empty.');
}
if (mb_strlen($message_body) > 1000) {
    http_response_code(400);
    exit('Message is too long.');
}

// 6) Build email bodies (unchanged) …
$adminBody = <<<EOD
You have a new enquiry:

Name:          {$name}
Email:         {$email}
Phone:         {$phone}
Services:      {$services}
Preferred on:  {$preferred_date}
Referred by:   {$referral}

Message:
{$message_body}
EOD;

$clientBody = <<<EOD
Hi {$first_name},

Thanks for reaching out to ThePartyLab! We’ve received your request:

— Services:       {$services}
— Preferred Date: {$preferred_date}
— How you heard:  {$referral}

Your message:
{$message_body}

We’ll be in touch shortly to confirm availability and next steps.

Happy planning!
ThePartyLab Team
EOD;

// 7) SMTP & PHPMailer setup
$smtpHost     = $_ENV['SMTP_HOST']      ?: 'smtp.gmail.com';
$smtpPort     = $_ENV['SMTP_PORT']      ?: 587;
$smtpUser     = $_ENV['SMTP_USER']      ?: '';
$smtpPassword = $_ENV['SMTP_PASS']      ?: '';
$fromAddress  = $_ENV['SMTP_FROM']      ?: $smtpUser;
$fromName     = $_ENV['SMTP_FROM_NAME'] ?: 'ThePartyLab';

// 8) sendMail with debug
function sendMail($to, $toName, $subject, $body) {
    global $smtpHost, $smtpPort, $smtpUser, $smtpPassword, $fromAddress, $fromName;
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPDebug  = 2;                       // ← verbose debug
        $mail->Debugoutput = function($str, $level) {
        };
        $mail->Host       = $smtpHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUser;
        $mail->Password   = $smtpPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $smtpPort;

        $mail->setFrom($fromAddress, $fromName);
        $mail->addAddress($to, $toName);

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->isHTML(false);

        $ok = $mail->send();
        return $ok;
    } catch (Exception $e) {
        return false;
    }
}


// 9) Fire off both mails
$adminSent  = sendMail('bookings@thepartylabmallorca.com','ThePartyLab Team',"New enquiry from {$name}", $adminBody);
$clientSent = sendMail($email, $first_name,"Thanks for contacting ThePartyLab!", $clientBody);

// 10) Response
header('Content-Type: text/plain; charset=UTF-8');
if ($adminSent && $clientSent) {
    echo 'OK';
    exit;
} else {
    http_response_code(500);
    echo 'ERROR';
    exit;
}
