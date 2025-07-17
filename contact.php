<?php
// contact.php (renders the form)
session_start();

// If we don’t already have a CSRF token, make one
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Contact - Click Party</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/imagesloaded/imagesloaded.pkgd.min.css" rel="stylesheet">
  <link href="assets/vendor/isotope-layout/isotope.pkgd.min.css" rel="stylesheet">

  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="contact-page">

  <!-- NAVBAR -->
  <nav id="centerLogoNav" class="center-logo-navbar navbar-light">
    <div class="center-logo-navbar__top">
      <a href="index.php" class="center-logo-navbar__logo-link">
        <img src="assets/img/logo.png" alt="Your Logo">
      </a>
      <button id="centerLogoNavToggle" class="center-logo-navbar__burger navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#centerLogoNavMenu" aria-controls="centerLogoNavMenu"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div id="centerLogoNavMenu" class="center-logo-navbar__bottom collapse">
      <ul class="center-logo-navbar__menu">
        <li class="center-logo-navbar__item"><a href="index.php" class="center-logo-navbar__link active">HOME</a></li>
        <li class="center-logo-navbar__item"><a href="about.html" class="center-logo-navbar__link">ABOUT US</a></li>
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="kidsDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">KIDS <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul class="dropdown-menu" aria-labelledby="kidsDropdown">
            <li><a class="dropdown-item" href="kids-experience.html">YOUR EVENT | OUR EXPERTISE</a></li>
            <li><a class="dropdown-item" href="kids-services.html">OUR SERVICES</a></li>
            <li><a class="dropdown-item" href="kids-parties.html">EXCLUSIVE PARTIES</a></li>
            <li><a class="dropdown-item" href="wedding-kids.html">WEDDING KIDS</a></li>
            <li><a class="dropdown-item" href="click-party.html">CLICK PARTY</a></li>
          </ul>
        </li>
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="adultsDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">ADULTS <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul class="dropdown-menu" aria-labelledby="adultsDropdown">
            <li><a class="dropdown-item" href="adults-experience.html">YOUR EVENT | OUR EXPERTISE</a></li>
            <li><a class="dropdown-item" href="adults-services.html">OUR SERVICES</a></li>
          </ul>
        </li>
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="weddingDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">WEDDING <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul class="dropdown-menu" aria-labelledby="weddingDropdown">
            <li><a class="dropdown-item" href="special-day.html">YOUR SPECIAL DAY</a></li>
            <li><a class="dropdown-item" href="wedding-kids.html">WEDDING KIDS</a></li>
          </ul>
        </li>
        <li class="center-logo-navbar__item"><a href="venues.html" class="center-logo-navbar__link">VENUES</a></li>
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="infoDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">INFORMATION <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul class="dropdown-menu" aria-labelledby="infoDropdown">
            <li><a class="dropdown-item" href="terms-conditions.html">TERMS & CONDITIONS</a></li>
            <li><a class="dropdown-item" href="privacy-policy.html">PRIVACY POLICY</a></li>
            <li><a class="dropdown-item" href="faqs.html">FAQ</a></li>
          </ul>
        </li>
        <li class="center-logo-navbar__item"><a href="contact.php" class="center-logo-navbar__link active">CONTACT</a></li>
        <li class="center-logo-navbar__item social">
          <a href="https://www.instagram.com/thepartylab_kids" target="_blank" rel="noopener"
            class="center-logo-navbar__link"><i class="bi bi-instagram"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
      style="background-image: url(assets/img/information/contact.png);">
      <div class="container">
        <h1>Contact</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <h3>Let's Make Magic Happen!</h3>
          <div class="col-lg-12">
            <form id="contactForm" action="forms/contact.php" method="post" data-aos="fade-up"
              data-aos-delay="500">

              <!-- Honeypot -->
              <div style="display:none;">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" autocomplete="off">
              </div>

              <!-- CSRF token -->
              <input type="hidden" name="csrf_token"
                value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES) ?>">

              <!-- Timestamp + JS flag -->
              <input type="hidden" name="ts" value="<?= time() ?>">
              <input type="hidden" name="js" id="js" value="0">

              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="first_name" class="form-control" placeholder="First Name *" required>
                </div>
                <div class="col-md-6">
                  <input type="text" name="last_name" class="form-control" placeholder="Last Name *" required>
                </div>
                <div class="col-md-6">
                  <input type="email" name="email" class="form-control" placeholder="Your Email *" required>
                </div>
                <div class="col-md-6">
                  <input type="tel" name="phone" class="form-control" placeholder="Phone">
                </div>
                <div class="col-md-12">
                  <label class="form-label">What services are you interested in?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" id="serviceKidsParty"
                      value="Kids Party">
                    <label class="form-check-label" for="serviceKidsParty">Kids Party</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="services[]" id="serviceWeddingKids"
                      value="Wedding Kids">
                    <label class="form-check-label" for="serviceWeddingKids">Wedding Kids</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="form-label">Preferred Date</label>
                  <input type="text" id="preferred_date" name="preferred_date" class="form-control"
                    placeholder="Select a date" required>
                </div>
                <div class="col-md-12">
                  <label class="form-label">How did you hear about us?</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="referral" id="referralWord"
                      value="Word of mouth" checked>
                    <label class="form-check-label" for="referralWord">Word of mouth</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="referral" id="referralInternet"
                      value="Internet / Social media">
                    <label class="form-check-label" for="referralInternet">Internet / Social media</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message *" required></textarea>
                </div>
                <div class="col-md-12 text-center">
  <div id="loadingIndicator" style="display:none;">Loading</div>
                  <div id="errorMessage" style="display:none;color:red;"></div>
                  <div id="successMessage" style="display:none;color:green;">Your message has been sent. Thank you!</div>
                  <button type="submit" class="btn btn-primary btn-lg px-5" style="border-color: #f3a0ad; background-color: #f3a0ad;">
                    Contact Us
                  </button>
                </div>  
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer id="footer" class="footer light-background">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.php" class="logo d-flex align-items-center">
              <span class="sitename">ThePartyLab</span>
            </a>
            <p>ThePartyLab is a party planning company that specializes in creating memorable experiences for children
              and adults alike.</p>
            <div class="social-links d-flex mt-4">
              <a href="https://www.instagram.com/thepartylab_kids"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.html">About Us</a></li>
              <li><a href="kids-services.html">Services Kids</a></li>
              <li><a href="adults-services.html">Services Adults</a></li>
              <li><a href="terms-conditions.html">Terms of Service</a></li>
              <li><a href="faqs.html">FAQ</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>Palma Mallorca, Isla Balears</p>
            <p class="mt-4"><strong>Phone:</strong> <span>+34 644 65 49 05</span></p>
            <p><strong>Email:</strong> <span>bookings@thepartylabmallorca.com</span></p>
          </div>
        </div>
      </div>
    </div>
    <div class="container copyright text-center">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PartyLab</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://ramonbriceno.netlify.app/">Ramon</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Anti-bot & AJAX form handler -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Mark JS as enabled
      document.getElementById('js').value = '1';

      // Initialize Flatpickr
      flatpickr("#preferred_date", {
        minDate: "today",
        dateFormat: "Y-m-d",
        allowInput: false
      });

      // AJAX form submission
      const form = document.getElementById('contactForm');
      const loadingEl = document.getElementById('loadingIndicator');
      const errorEl = document.getElementById('errorMessage');
      const successEl = document.getElementById('successMessage');

      form.addEventListener('submit', async event => {
        event.preventDefault();
        loadingEl.style.display = 'block';
        errorEl.style.display = 'none';
        successEl.style.display = 'none';

        try {
          const res = await fetch(form.action, {
            method: 'POST',
            body: new FormData(form)
          });
          const text = (await res.text()).trim();

          if (text === 'OK') {
            successEl.style.display = 'block';
            form.reset();
          } else {
            errorEl.textContent = text;
            errorEl.style.display = 'block';
          }
        } catch (err) {
          errorEl.textContent = 'Network error. Please check your connection.';
          errorEl.style.display = 'block';
        } finally {
          loadingEl.style.display = 'none';
        }
      });
    });
  </script>
</body>

</html>
