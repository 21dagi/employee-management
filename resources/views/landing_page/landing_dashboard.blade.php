<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MAWI-Tech</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ url('') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ url('') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('') }}/assets_landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('') }}/assets_landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('') }}/assets_landing/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ url('') }}/assets_landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ url('') }}/assets_landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ url('') }}/assets_landing/css/main.css" rel="stylesheet">


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
       
        <h1 class="sitename">M-tech</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#pricing">Pricing</a></li>
          
         
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('login.signin') }}">Sign-In</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
          <div class="company-badge mb-4">
            <i class="bi bi-gear-fill me-2"></i>
            Innovating Your Future
          </div>

          <h1 class="mb-4">
            Empowering Technology <br>
            Through Innovation <br>
            <span class="accent-text">Your Vision, Our Mission</span>
          </h1>

          <p class="mb-4 mb-md-5">
            At M-Tech, we transform ideas into reality. Our cutting-edge solutions cater to your unique needs, ensuring success at every step. Join us on a journey of digital transformation.
          </p>

          <div class="hero-buttons">
            <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Discover More</a>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-link mt-2 mt-sm-0 glightbox">
              <i class="bi bi-play-circle me-1"></i>
              Watch Our Story
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
          <img src="{{ url('') }}/assets_landing/img/illustration-1.webp" alt="Hero Image" class="img-fluid">

          <div class="customers-badge">
            <div class="customer-avatars">
              <img src="{{ url('') }}/assets_landing/img/avatar-1.webp" alt="Customer 1" class="avatar">
              <img src="{{ url('') }}/assets_landing/img/avatar-2.webp" alt="Customer 2" class="avatar">
              <img src="{{ url('') }}/assets_landing/img/avatar-3.webp" alt="Customer 3" class="avatar">
              <img src="{{ url('') }}/assets_landing/img/avatar-4.webp" alt="Customer 4" class="avatar">
              <img src="{{ url('') }}/assets_landing/img/avatar-5.webp" alt="Customer 5" class="avatar">
              <span class="avatar more">15+</span>
            </div>
            <p class="mb-0 mt-2">15,000+ satisfied clients across various industries</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-trophy"></i>
          </div>
          <div class="stat-content">
            <h4>5x Industry Awards</h4>
            <p class="mb-0">Recognized for excellence in technology</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-briefcase"></i>
          </div>
          <div class="stat-content">
            <h4>10k Projects Delivered</h4>
            <p class="mb-0">Transforming visions into reality</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-graph-up"></i>
          </div>
          <div class="stat-content">
            <h4>120k Users Served</h4>
            <p class="mb-0">Empowering businesses globally</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="stat-item">
          <div class="stat-icon">
            <i class="bi bi-award"></i>
          </div>
          <div class="stat-content">
            <h4>7x Innovation Awards</h4>
            <p class="mb-0">Leading the way in tech advancements</p>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
 
<section id="about" class="about section">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4 align-items-center justify-content-between">

    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
      <span class="about-meta">MORE ABOUT US</span>
      <h2 class="about-title">Your Trusted Technology Partner</h2>
      <p class="about-description">At M-Tech, we strive to deliver innovative solutions that empower businesses to thrive in a digital world. Our commitment to excellence drives us to exceed our clients' expectations every day.</p>

      <div class="row feature-list-wrapper">
        <div class="col-md-6">
          <ul class="feature-list">
            <li><i class="bi bi-check-circle-fill"></i> Tailored software solutions</li>
            <li><i class="bi bi-check-circle-fill"></i> Expert technical support</li>
            <li><i class="bi bi-check-circle-fill"></i> Cutting-edge technology</li>
          </ul>
        </div>
        <div class="col-md-6">
          <ul class="feature-list">
            <li><i class="bi bi-check-circle-fill"></i> Agile project management</li>
            <li><i class="bi bi-check-circle-fill"></i> Comprehensive training programs</li>
            <li><i class="bi bi-check-circle-fill"></i> Continuous improvement focus</li>
          </ul>
        </div>
      </div>

      <div class="info-wrapper">
        <div class="row gy-4">
          <div class="col-lg-5">
            <div class="profile d-flex align-items-center gap-3">
              <img src="{{ url('') }}/assets_landing/img/avatar-1.webp" alt="CEO Profile" class="profile-image">
              <div>
                <h4 class="profile-name">Mario Smith</h4>
                <p class="profile-position">CEO &amp; Founder</p>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="contact-info d-flex align-items-center gap-2">
              <i class="bi bi-telephone-fill"></i>
              <div>
                <p class="contact-label">Reach out to us</p>
                <p class="contact-number">+123 456-789</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
      <div class="image-wrapper">
        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
          <img src="{{ url('') }}/assets_landing/img/about-5.webp" alt="Business Meeting" class="img-fluid main-image rounded-4">
          <img src="{{ url('') }}/assets_landing/img/about-2.webp" alt="Team Discussion" class="img-fluid small-image rounded-4">
        </div>
        <div class="experience-badge floating">
          <h3>15+ <span>Years</span></h3>
          <p>Of experience in delivering impactful solutions</p>
        </div>
      </div>
    </div>
  </div>

</div>

</section><!-- /About Section -->

<section id="features" class="features section">

<div class="container section-title" data-aos="fade-up">
  <h2>Our Features</h2>
  <p>Transforming challenges into innovative solutions tailored for your success.</p>
</div>

<div class="container">

  <div class="d-flex justify-content-center">
    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
      <li class="nav-item">
        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
          <h4>Custom Solutions</h4>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
          <h4>User Experience</h4>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
          <h4>Robust Security</h4>
        </a>
      </li>
    </ul>
  </div>

  <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

    <div class="tab-pane fade active show" id="features-tab-1">
      <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
          <h3>Tailored Software Solutions</h3>
          <p class="fst-italic">
            We create customized software that fits your business needs perfectly.
          </p>
          <ul>
            <li><i class="bi bi-check2-all"></i> <span>Efficient workflows tailored to your processes.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Seamless integration with existing systems.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Ongoing support and updates.</span></li>
          </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
          <img src="{{ url('') }}/assets_landing/img/features-illustration-1.webp" alt="" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="features-tab-2">
      <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
          <h3>Exceptional User Experience</h3>
          <p class="fst-italic">
            Our solutions prioritize user experience to ensure satisfaction.
          </p>
          <ul>
            <li><i class="bi bi-check2-all"></i> <span>Intuitive interfaces designed for ease of use.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Responsive design for all devices.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Continuous feedback integration for improvement.</span></li>
          </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
          <img src="{{ url('') }}/assets_landing/img/features-illustration-2.webp" alt="" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="features-tab-3">
      <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
          <h3>Robust Security Features</h3>
          <ul>
            <li><i class="bi bi-check2-all"></i> <span>Advanced encryption for data protection.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Regular security audits and updates.</span></li>
            <li><i class="bi bi-check2-all"></i> <span>Compliance with industry standards.</span></li>
          </ul>
          <p class="fst-italic">
            We ensure that your data is safe and secure with our comprehensive security measures.
          </p>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
          <img src="{{ url('') }}/assets_landing/img/features-illustration-3.webp" alt="" class="img-fluid">
        </div>
      </div>
    </div>

  </div>

</div>

</section>

<section id="features-cards" class="features-cards section">

<div class="container">

  <div class="row gy-4">

    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
      <div class="feature-box orange">
        <i class="bi bi-award"></i>
        <h4>Exceptional Quality</h4>
        <p>Delivering outstanding results through innovative solutions tailored to your needs.</p>
      </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
      <div class="feature-box blue">
        <i class="bi bi-patch-check"></i>
        <h4>Reliable Support</h4>
        <p>Our dedicated team is here to assist you at every step of your journey.</p>
      </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
      <div class="feature-box green">
        <i class="bi bi-sunrise"></i>
        <h4>Innovative Solutions</h4>
        <p>Utilizing the latest technologies to drive your business forward.</p>
      </div>
    </div>

    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
      <div class="feature-box red">
        <i class="bi bi-shield-check"></i>
        <h4>Robust Security</h4>
        <p>Ensuring the safety and integrity of your data with top-notch security measures.</p>
      </div>
    </div>

  </div>

</div>

</section>

<section id="call-to-action" class="call-to-action section">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row content justify-content-center align-items-center position-relative">
    <div class="col-lg-8 mx-auto text-center">
      <h2 class="display-4 mb-4">Transform Your Business Today</h2>
      <p class="mb-4">Discover how our solutions can elevate your operations and drive success.</p>
      <a href="#" class="btn btn-cta">Get Started</a>
    </div>

    <div class="shape shape-1">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z" transform="translate(100 100)"></path>
      </svg>
    </div>

    <div class="shape shape-2">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z" transform="translate(100 100)"></path>
      </svg>
    </div>

    <div class="shape shape-3">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z" transform="translate(100 100)"></path>
      </svg>
    </div>
  </div>

</div>

</section>

<section id="clients" class="clients section">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 2,
            "spaceBetween": 40
          },
          "480": {
            "slidesPerView": 3,
            "spaceBetween": 60
          },
          "640": {
            "slidesPerView": 4,
            "spaceBetween": 80
          },
          "992": {
            "slidesPerView": 6,
            "spaceBetween": 120
          }
        }
      }
    </script>
    <div class="swiper-wrapper align-items-center">
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-1.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-2.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-3.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-4.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-5.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-6.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-7.png" class="img-fluid" alt=""></div>
      <div class="swiper-slide"><img src="{{ url('') }}/assets_landing/img/clients/client-8.png" class="img-fluid" alt=""></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>

</div>

</section>

<section id="testimonials" class="testimonials section light-background">

<div class="container section-title" data-aos="fade-up">
  <h2>Testimonials</h2>
  <p>What our clients say about us</p>
</div>

<div class="container">

  <div class="row g-5">

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <div class="testimonial-item">
        <img src="{{ url('') }}/assets_landing/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
        <h3>Saul Goodman</h3>
        <h4>CEO &amp; Founder</h4>
        <div class="stars">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
        </div>
        <p>
          <i class="bi bi-quote quote-icon-left"></i>
          <span>Working with M-Tech has been a game-changer for our business. Their solutions are top-notch!</span>
          <i class="bi bi-quote quote-icon-right"></i>
        </p>
      </div>
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
      <div class="testimonial-item">
        <img src="{{ url('') }}/assets_landing/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
        <h3>Sara Wilsson</h3>
        <h4>Designer</h4>
        <div class="stars">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
        </div>
        <p>
          <i class="bi bi-quote quote-icon-left"></i>
          <span>Exceptional service and support! I highly recommend M-Tech for all tech needs.</span>
          <i class="bi bi-quote quote-icon-right"></i>
        </p>
      </div>
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
      <div class="testimonial-item">
        <img src="{{ url('') }}/assets_landing/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
        <h3>Jena Karlis</h3>
        <h4>Store Owner</h4>
        <div class="stars">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
        </div>
        <p>
          <i class="bi bi-quote quote-icon-left"></i>
          <span>M-Tech's team is professional and dedicated. Their solutions helped my business grow!</span>
          <i class="bi bi-quote quote-icon-right"></i>
        </p>
      </div>
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
      <div class="testimonial-item">
        <img src="{{ url('') }}/assets_landing/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
        <h3>Matt Brandon</h3>
        <h4>Freelancer</h4>
        <div class="stars">
          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
        </div>
        <p>
          <i class="bi bi-quote quote-icon-left"></i>
          <span>M-Tech provided the tools I needed to succeed. Their support is fantastic!</span>
          <i class="bi bi-quote quote-icon-right"></i>
        </p>
      </div>
    </div>

  </div>

</div>

</section>
<section id="stats" class="stats section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
          <p>Clients</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
          <p>Projects</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
          <p>Hours Of Support</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
          <p>Workers</p>
        </div>
      </div>

    </div>

  </div>

</section>

<section id="services" class="services section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
    <p>Delivering exceptional solutions tailored to your needs.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-4">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-activity"></i>
          </div>
          <div>
            <h3>Custom Software Development</h3>
            <p>We build software solutions that meet your specific business requirements, ensuring maximum efficiency and impact.</p>
            <a href="service-details.html" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-diagram-3"></i>
          </div>
          <div>
            <h3>Data Analytics</h3>
            <p>Transforming data into actionable insights to drive your business decisions and strategies.</p>
            <a href="service-details.html" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-easel"></i>
          </div>
          <div>
            <h3>UI/UX Design</h3>
            <p>Creating user-friendly interfaces and experiences that enhance user satisfaction and engagement.</p>
            <a href="service-details.html" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-card d-flex">
          <div class="icon flex-shrink-0">
            <i class="bi bi-clipboard-data"></i>
          </div>
          <div>
            <h3>Consulting Services</h3>
            <p>Offering expert advice and strategies to optimize your business processes and technology integration.</p>
            <a href="service-details.html" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div>

  </div>

</section>
<section id="pricing" class="pricing section light-background">

<div class="container section-title" data-aos="fade-up">
  <h2>Pricing</h2>
  <p>Affordable plans tailored to your needs</p>
</div>

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row g-4 justify-content-center">

    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
      <div class="pricing-card">
        <h3>Basic Plan</h3>
        <div class="price">
          <span class="currency">$</span>
          <span class="amount">9.9</span>
          <span class="period">/ month</span>
        </div>
        <p class="description">Essential features to get you started with our services.</p>

        <h4>Features Included:</h4>
        <ul class="features-list">
          <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor</li>
          <li><i class="bi bi-check-circle-fill"></i> Excepteur sint occaecat</li>
          <li><i class="bi bi-check-circle-fill"></i> Nemo enim ipsam voluptatem</li>
        </ul>

        <a href="#" class="btn btn-primary">
          Buy Now
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
      <div class="pricing-card popular">
        <div class="popular-badge">Most Popular</div>
        <h3>Standard Plan</h3>
        <div class="price">
          <span class="currency">$</span>
          <span class="amount">19.9</span>
          <span class="period">/ month</span>
        </div>
        <p class="description">Comprehensive features for growing businesses.</p>

        <h4>Features Included:</h4>
        <ul class="features-list">
          <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
          <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
          <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
          <li><i class="bi bi-check-circle-fill"></i> Ut labore et dolore magna</li>
        </ul>

        <a href="#" class="btn btn-light">
          Buy Now
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>

    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
      <div class="pricing-card">
        <h3>Premium Plan</h3>
        <div class="price">
          <span class="currency">$</span>
          <span class="amount">39.9</span>
          <span class="period">/ month</span>
        </div>
        <p class="description">Advanced features for maximum impact.</p>

        <h4>Features Included:</h4>
        <ul class="features-list">
          <li><i class="bi bi-check-circle-fill"></i> Temporibus autem quibusdam</li>
          <li><i class="bi bi-check-circle-fill"></i> Saepe eveniet ut et voluptates</li>
          <li><i class="bi bi-check-circle-fill"></i> Nam libero tempore soluta</li>
          <li><i class="bi bi-check-circle-fill"></i> Cumque nihil impedit quo</li>
          <li><i class="bi bi-check-circle-fill"></i> Maxime placeat facere possimus</li>
        </ul>

        <a href="#" class="btn btn-primary">
          Buy Now
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>

  </div>

</div>

</section>

<section class="faq-9 faq section light-background" id="faq">

<div class="container">
  <div class="row">

    <div class="col-lg-5" data-aos="fade-up">
      <h2 class="faq-title">Have a question? Check out the FAQ</h2>
      <p class="faq-description">Get answers to common questions and find out more about our services.</p>
      <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
        <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
        </svg>
      </div>
    </div>

    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
      <div class="faq-container">

        <div class="faq-item faq-active">
          <h3>Non consectetur a erat nam at lectus urna duis?</h3>
          <div class="faq-content">
            <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div>

        <div class="faq-item">
          <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
          <div class="faq-content">
            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div>

        <div class="faq-item">
          <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
          <div class="faq-content">
            <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div>

        <div class="faq-item">
          <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
          <div class="faq-content">
            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div>

        <div class="faq-item">
          <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
          <div class="faq-content">
            <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div>

        <div class="faq-item">
          <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
          <div class="faq-content">
            <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div>

      </div>
    </div>

  </div>
</div>
</section>
<section id="call-to-action-2" class="call-to-action-2 section dark-background">

<div class="container">
  <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
    <div class="col-xl-10">
      <div class="text-center">
        <h3>Join Us Today</h3>
        <p>Transform your business with our innovative solutions. Experience excellence in every step.</p>
        <a class="cta-btn" href="#">Get Started</a>
      </div>
    </div>
  </div>
</div>

</section>

<section id="contact" class="contact section light-background">

<div class="container section-title" data-aos="fade-up">
  <h2>Contact Us</h2>
  <p>We are here to assist you with any inquiries you may have.</p>
</div>

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row g-4 g-lg-5">
    <div class="col-lg-5">
      <div class="info-box" data-aos="fade-up" data-aos-delay="200">
        <h3>Contact Info</h3>
        <p>Reach out to us for any questions or support.</p>

        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box">
            <i class="bi bi-geo-alt"></i>
          </div>
          <div class="content">
            <h4>Our Location</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
          </div>
        </div>

        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
          <div class="icon-box">
            <i class="bi bi-telephone"></i>
          </div>
          <div class="content">
            <h4>Phone Numbers</h4>
            <p>+1 5589 55488 55</p>
            <p>+1 6678 254445 41</p>
          </div>
        </div>

        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
          <div class="icon-box">
            <i class="bi bi-envelope"></i>
          </div>
          <div class="content">
            <h4>Email Addresses</h4>
            <p>info@example.com</p>
            <p>contact@example.com</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
        <h3>Get In Touch</h3>
        <p>We would love to hear from you! Please fill in the form below.</p>

        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit" class="btn">Send Message</button>
            </div>

          </div>
        </form>

      </div>
    </div>

  </div>

</div>

</section>

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">M-tech</span>
          </a>
          
      </div>
    </div>

    
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('') }}/assets_landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('') }}/assets_landing/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('') }}/assets_landing/vendor/aos/aos.js"></script>
  <script src="{{ url('') }}/assets_landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ url('') }}/assets_landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ url('') }}/assets_landing/vendor/purecounter/purecounter_vanilla.js"></script>

  <script src="{{ url('') }}/assets_landing/js/main.js"></script>

</body>

</html>