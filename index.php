<?php
// contact.php (or wherever you render the form)
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Party Lab</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

</head>

<body class="index-page">
  <nav id="centerLogoNav" class="center-logo-navbar navbar-light">

    <!-- Top row: logo + burger -->
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

    <!-- Bottom row: your custom menu -->
    <div id="centerLogoNavMenu" class="center-logo-navbar__bottom collapse">
      <ul class="center-logo-navbar__menu">
        <!-- Home & About -->
        <li class="center-logo-navbar__item">
          <a href="index.php" class="center-logo-navbar__link active">HOME</a>
        </li>
        <li class="center-logo-navbar__item">
          <a href="about.html" class="center-logo-navbar__link">ABOUT US</a>
        </li>

        <!-- Kids dropdown -->
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="kidsDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            KIDS <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="kidsDropdown">
            <li><a class="dropdown-item" href="kids-experience.html">YOUR EVENT | OUR EXPERTISE</a></li>
            <li><a class="dropdown-item" href="kids-services.html">OUR SERVICES</a></li>
            <li><a class="dropdown-item" href="kids-parties.html">EXCLUSIVE PARTIES</a></li>
            <li><a class="dropdown-item" href="wedding-kids.html">WEDDING KIDS</a></li>
            <li><a class="dropdown-item" href="click-party.html">CLICK PARTY</a></li>
          </ul>
        </li>

        <!-- Adults dropdown -->
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="adultsDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            ADULTS <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="adultsDropdown">
            <li><a class="dropdown-item" href="adults-experience.html">YOUR EVENT | OUR EXPERTISE</a></li>
            <li><a class="dropdown-item" href="adults-services.html">OUR SERVICES</a></li>
          </ul>
        </li>

        <!-- Wedding & Venues -->
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="weddingDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            WEDDING <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="weddingDropdown">
            <li><a class="dropdown-item" href="special-day.html">YOUR SPECIAL DAY</a></li>
            <li><a class="dropdown-item" href="wedding-kids.html">WEDDING KIDS</a></li>
          </ul>
        </li>
        <li class="center-logo-navbar__item">
          <a href="venues.html" class="center-logo-navbar__link">VENUES</a>
        </li>

        <!-- Information dropdown -->
        <li class="center-logo-navbar__item dropdown">
          <a href="#" class="center-logo-navbar__link dropdown-toggle" id="infoDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            INFORMATION <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="infoDropdown">
            <li><a class="dropdown-item" href="terms-conditions.html">TERMS & CONDITIONS</a></li>
            <li><a class="dropdown-item" href="privacy-policy.html">PRIVACY POLICY</a></li>
            <li><a class="dropdown-item" href="faqs.html">FAQ</a></li>
          </ul>
        </li>
        <li class="center-logo-navbar__item">
          <a href="contact.php" class="center-logo-navbar__link active">CONTACT</a>
        </li>

        <!-- Instagram icon -->
        <li class="center-logo-navbar__item social">
          <a href="https://www.instagram.com/thepartylab_kids" target="_blank" rel="noopener"
            class="center-logo-navbar__link">
            <i class="bi bi-instagram"></i>
          </a>
        </li>

      </ul>
    </div>
  </nav>



  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/banner.png" alt="" data-aos="fade-in">
      Welcome to ThePartyLab


      <div class="container">
        <div class="row">
          <div class="col-xl-4">
            <h1 data-aos="fade-up">Welcome to ThePartyLab</h1>
            <blockquote data-aos="fade-up" data-aos-delay="100">
              <p style="font-size: 1.5rem;"><strong style="letter-spacing: 1.4px;">Set the scene for an unforgettable
                  celebration — for kids and adults alike!

                  From magical birthday parties and fun-filled family events to elegant soirées and corporate gathering,
                  we can elevate any occasion. Whether you’re hosting a playful garden party, a stylish milestone
                  celebration, or a branded event, we’ll help you create the perfect atmosphere.

                  Our bespoke and statement decoration add that all-important WOW factor, combined with our amazing Soft
                  Play options, entertainment and activities for the little ones with tasty treats or full on catering—
                  no
                  matter the theme, size, or style of your celebration: we got you covered!

                  We are ready to provide you with stress free solutions so you sit back and relax while we ensure
                  unmatched attention to detail with a touch of Mallorca charm. </strong></p>
            </blockquote>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="contact.php" class="btn-get-started">Get Started</a>
              <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                  Video</span></a> -->
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

      <div class="container">

        <div class="row g-0">

          <div class="col-xl-5 img-bg" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/14.png" alt="">
          </div>

          <div class="col-xl-7 slides position-relative" data-aos="fade-up" data-aos-delay="200">

            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "centeredSlides": true,
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                  }
                }
              </script>
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Customised Activities and Tailored Decoration
                    </h3>
                    <!-- <h4 class="mb-3">The perfect party for your child's special day.</h4> -->
                    <p style="letter-spacing: 1.4px;">We'll design fun and engaging activities with games that fit
                      perfectly with the theme, ensuring
                      an immersive experience for all the little guests. Combine the fun with beautiful decoration,
                      table settings and props: we'll source or create everything needed to bring your event to life!
                    </p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Uninterrupted Adult Time at Your Wedding
                    </h3>
                    <!-- <h4 class="mb-3">Uninterrupted Adult Time at Your Wedding.</h4> -->
                    <p style="letter-spacing: 1.4px;">At ThePartyLab we understand that weddings are not just about
                      celebrating love: they're about
                      creating unforgettable memories for everyone, including the littlest members of your family. We've
                      got you covered, so you can enjoy your special day to the fullest. Please check out our Wedding
                      Kids services <a href="wedding-kids.html">here</a> </p>
                  </div>
                </div><!-- End slide item -->

                <div class="swiper-slide">
                  <div class="item">
                    <h3 class="mb-3">Celebrations with a Twist
                    </h3>
                    <!-- <h4 class="mb-3">Our kids' station is a magical place</h4> -->
                    <p style="letter-spacing: 1.4px;">Looking to turn your private party into an unforgettable
                      celebration? We’re here to help you make
                      it extraordinary! Whether you’re planning a birthday, anniversary, or any special occasion, our
                      entertainment services are designed to bring fun, excitement, and a WOW-factor to your event. We
                      provide a range of top-tier entertainment and decoration options that will leave your guests
                      talking long after the party ends!</p>
                  </div>
                </div><!-- End slide item -->


              </div>
              <div class="swiper-pagination"></div>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Services</h2>
        <p>We offer the best experiences for you and your kids</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-4 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><img style="max-width: 100px;" src="assets/img/icons/1.png"
                alt="Kids Events"></div>
            <div>
              <h4 class="title">Kids Events</h4>
              <p class="description">Let’s create a magical place where children and teenagers can let their
                imaginations run wild and have a blast.</p>
              <a href="kids-services.html" class="readmore stretched-link"><span>Learn More</span><i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-md-4 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><img style="max-width: 100px;" src="assets/img/icons/2.png"
                alt="Adults Events"></div>
            <div>
              <h4 class="title">Adults Events</h4>
              <p class="description">From elegant anniversary dinners to wild bride-to-be parties: we craft skids-services.htmls
                that are anything but ordinary.</p>
              <a href="adults-services.html" class="readmore stretched-link"><span>Learn More</span><i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><img style="max-width: 100px;" src="assets/img/icons/3.png"
                alt="Wedding Kids"></div>
            <div>
              <h4 class="title">Wedding Kids</h4>
              <p class="description">Keep little guests happy and entertained with fun activities and professional
                supervision. </p>
              <a href="wedding-kids.html" class="readmore stretched-link"><span>Learn More</span><i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <!-- <div class="col-lg-6 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="icon flex-shrink-0"><i class="bi bi-bar-chart" style="color: #d90769;"></i></div>
            <div>
              <h4 class="title">Sed ut perspiciatis</h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="icon flex-shrink-0"><i class="bi bi-binoculars" style="color: #15bfbc;"></i></div>
            <div>
              <h4 class="title">Magni Dolores</h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <div class="icon flex-shrink-0"><i class="bi bi-brightness-high" style="color: #f5cf13;"></i></div>
            <div>
              <h4 class="title">Nemo Enim</h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
            <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week" style="color: #1335f5;"></i></div>
            <div>
              <h4 class="title">Eiusmod Tempor</h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div> -->
        </div>

      </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assets/img/7.png" alt="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Any Questions? Contact us!</h3>
              <p>We're here to assist you in any way we can. Whether you have questions, need assistance, or want to
                share feedback, please don't hesitate to reach out. You can contact us through our web form, email or
                send a WhatsApp to +34644654905.</p>
              <a class="cta-btn" href="/contact.php">Contact Us</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">
        <div class="row">
          <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100">
            <h3 class="mb-0" style="text-align: center;">What our clients say</h3>

            <div class="row">
              <div class="col-12 mt-5" data-aos="fade-up" data-aos-delay="400">
                <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner text-center">

                    <div class="carousel-inner">

                      <!-- 1st testimonial (active) -->
                      <div class="carousel-item active">
                        <div class="testimonial-box">
                          <!-- ★★★★★ row -->
                          <div class="testimonial-stars">★★★★★</div>

                          <!-- “An absolute pleasure” in cursive -->
                          <h3 class="testimonial-title">“An absolute pleasure”</h3>

                          <!-- actual quote text -->
                          <div class="testimonial-content">
                            <p>
                              Working with The Party Lab has been an absolute pleasure. The team is
                              incredibly professional, reliable, and always quick to respond.
                              Communication is smooth and efficient, which makes the whole
                              collaboration process super easy and stress-free.<br /><br />

                              Consistently deliver high-end quality in everything you do, and with
                              your clear passion for creating unforgettable experiences every event
                              is successful. I highly recommend them to anyone looking for a trusted
                              and top-tier partner in events.
                            </p>
                          </div>

                          <!-- author line (centered) -->
                          <div class="testimonial-author">D. Mallorca</div>
                        </div>
                      </div>

                      <!-- 2nd testimonial -->
                      <div class="carousel-item">
                        <div class="testimonial-box">
                          <div class="testimonial-stars">★★★★★</div>
                          <h3 class="testimonial-title">“Huge Thank You”</h3>
                          <div class="testimonial-content">
                            <p>
                              I want to say a huge thank you for organizing the event! All the children
                              had an incredible experience! The parents were happy too! You are true
                              professionals!!! I wish you further success!!! and see you soon!!! 🥳💫❤️💛💚💙💜
                            </p>
                          </div>
                          <div class="testimonial-author">T. Tapki</div>
                        </div>
                      </div>

                      <!-- 3rd testimonial -->
                      <div class="carousel-item">
                        <div class="testimonial-box">
                          <div class="testimonial-stars">★★★★★</div>
                          <h3 class="testimonial-title">“Perfectly Prepared”</h3>
                          <div class="testimonial-content">
                            <p>
                              My husband found Kidzdreamparty on the internet and although I had two other
                              recommendations, we decided for the both because of the nice contact and the
                              creative answers to all our questions. And that was the right decision :-) Our
                              daughter, all invited children and we were totally happy!<br /><br />

                              Everything was prepared perfectly and with great attention to detail. The kids
                              loved the unicorn glitter party, the games and all the little surprises. The glitter
                              tattoos were not allowed to be washed off for days… It was really great and good
                              value for money. A clear recommendation!
                            </p>
                          </div>
                          <div class="testimonial-author">J. Rickert</div>
                        </div>
                      </div>

                      <!-- 4th testimonial -->
                      <div class="carousel-item">
                        <div class="testimonial-box">
                          <div class="testimonial-stars">★★★★★</div>
                          <h3 class="testimonial-title">“Amazing Service”</h3>
                          <div class="testimonial-content">
                            <p>
                              I found the KidzDreamParty through Google Search and I couldn't have been more
                              happier with the service that they have provided for my nieces. Great entertainment,
                              a true passion for fun and play and the kids had an amazing day.<br /><br />

                              Good price with a lot to offer – even the little extra things can be taken care of. I
                              would highly recommend their services to everyone!
                            </p>
                          </div>
                          <div class="testimonial-author">J. Rickert</div>
                        </div>
                      </div>

                      <!-- 5th testimonial -->
                      <div class="carousel-item">
                        <div class="testimonial-box">
                          <div class="testimonial-stars">★★★★★</div>
                          <h3 class="testimonial-title">“Mermaid Magic”</h3>
                          <div class="testimonial-content">
                            <p>
                              Wowww what an amazing mermaid party was organized by Lidia. The 4 years old girls
                              absolutely loved it and we parents too. Not a single time during the 4 hours the kids
                              came running to us as they were so brilliantly entertained.<br /><br />

                              She does it with so much love for the detail, so much enthusiasm and dedication. So
                              many fun activities for the kids!!!
                            </p>
                          </div>
                          <div class="testimonial-author">J. Ortlinghaus</div>
                        </div>
                      </div>
                    </div>


                  </div>

                  <!-- Controls -->
                  <button style="color: var(--accent-color);" class="carousel-control-prev" type="button"
                    data-bs-target="#reviewsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button style="color: var(--accent-color);" class="carousel-control-next" type="button"
                    data-bs-target="#reviewsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 position-relative" data-aos="zoom-out" data-aos-delay="200">
            <div class="phone-wrap">
              <div id="feedCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">
                <div class="carousel-inner">

                  <div class="carousel-item active">
                    <img src="assets/img/feed/1.png" class="img-fluid" alt="Feed screenshot 1">
                  </div>

                  <div class="carousel-item">
                    <img src="assets/img/feed/2.png" class="img-fluid" alt="Feed screenshot 2">
                  </div>

                  <!-- …add more .carousel-item blocks here as needed… -->

                </div>
                <!-- no controls/indicators = purely automatic -->
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    <section id="contact" class="contact section">
      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <h3>Let's Make Magic Happen!</h3>

          <div class="col-lg-12">
            <form id="contactForm" action="forms/contact.php" method="post" data-aos="fade-up" data-aos-delay="500">

              <!-- 1) Honeypot -->
              <div style="display:none;">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" autocomplete="off">
              </div>

              <!-- 2) CSRF token -->
              <input
                type="hidden"
                name="csrf_token"
                value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES) ?>"
              >

              <!-- 3) Timestamp + JS-flag -->
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
                    placeholder="Select a date" required />
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

  <footer id="footer" class="footer light-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-about">
            <a href="index.php" class="logo d-flex align-items-center">
              <span class="sitename">ThePartyLab</span>
            </a>
            <p>ThePartyLab is a party planning company that specializes in creating memorable experiences for children
              and
              adults alike.</p>
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
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
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
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
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
        } catch {
          errorEl.textContent = 'Network error. Please try again.';
          errorEl.style.display = 'block';
        } finally {
          loadingEl.style.display = 'none';
        }
      });
    });
  </script>

</body>

</html>