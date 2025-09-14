<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Indus Service</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Sofia&display=swap" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= base_url()?>assets/css/main.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      font-family: "Archivo", sans-serif;
      margin: 0;
      padding: 0;
      overflow-x: hidden; /* Prevent horizontal scrolling */
      background-color: #f8f9fa; /* Light background for the body */
    }
    
    /* Main container for content */
    .main-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
      position: relative;
    }
    
    /* Header Scroll Effect */
    .header {
      background-color: rgba(255, 255, 255, 1);
      transition: all 0.4s ease;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      padding: 15px 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05); /* Subtle border */
    }
    
    .header.scrolled {
      background-color: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(5px);
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      padding: 10px 0;
    }
    
    /* Header inner container */
    .header-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    /* Preloader Styles */
    .indus-preloader {
      position: fixed;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Montserrat', sans-serif;
    }

    .indus-preloader-animation {
      position: relative;
      height: 100vh;
      color: #000000;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s 0.3s forwards;
    }

    .indus-abs {
      position: absolute;
      height: 100vh;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }

    .indus-animation-1 {
      flex-direction: row;
      gap: 15px;
    }

    .indus-animation-2 {
      flex-direction: column;
    }

    .indus-h3 {
      font-size: clamp(2rem, 5vw, 4rem);
      margin: 0;
      opacity: 0;
      text-transform: uppercase;
      letter-spacing: 3px;
      font-weight: 500;
    }

    .indus-thin {
      font-weight: 300;
    }

    /* Text Animation */
    .indus-animation-1 p:nth-child(1) {
      animation: slideUp 0.8s 0.5s cubic-bezier(0.19, 1, 0.22, 1) forwards;
    }
    .indus-animation-1 p:nth-child(2) {
      animation: slideUp 0.8s 0.7s cubic-bezier(0.19, 1, 0.22, 1) forwards;
    }
    .indus-animation-1 p:nth-child(3) {
      animation: slideUp 0.8s 0.9s cubic-bezier(0.19, 1, 0.22, 1) forwards;
    }
    .indus-animation-1 p:nth-child(4) {
      animation: slideUp 0.8s 1.1s cubic-bezier(0.19, 1, 0.22, 1) forwards;
    }

    /* Reveal Animation */
    .indus-reveal-frame {
      position: relative;
      padding: 0 30px;
      overflow: hidden;
      margin-top: 40px;
    }

    .indus-reveal-box {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #fdc411;
      transform: scaleX(0);
      transform-origin: left;
      animation: reveal 1.2s 1.8s cubic-bezier(0.77, 0, 0.175, 1) forwards;
    }

    .indus-animation-2 .indus-h3 {
      animation: fadeIn 0.5s 2.3s forwards;
      font-size: clamp(1rem, 2vw, 1.5rem);
      letter-spacing: 5px;
      color: #000000;
    }

    /* Animations */
    @keyframes fadeIn {
      to { opacity: 1; }
    }

    @keyframes slideUp {
      from { 
        opacity: 0;
        transform: translateY(30px);
      }
      to { 
        opacity: 1;
        transform: translateY(0);
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
    }

    @keyframes reveal {
      from { transform: scaleX(0); }
      to { transform: scaleX(1); }
    }

    /* Navigation Styles */
    .navmenu ul {
      display: flex;
      align-items: center;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .navmenu li {
      position: relative;
    }

    .navmenu a {
      display: flex;
      align-items: center;
      color: #333;
      padding: 10px 12px;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 500;
      white-space: nowrap;
    }

    /* Logo styles */
    .logo-container {
      display: flex;
      align-items: center;
      padding: 5px 0;
      border-right: 1px solid rgba(0, 0, 0, 0.1); /* Subtle border */
      padding-right: 20px;
      margin-right: 20px;
    }

    .logo-container img {
      transition: all 0.3s ease;
    }

    .header.scrolled .logo-container img {
      transform: scale(0.95);
    }

    /* Language Selector Styles */
    .language-selector {
      margin-left: 10px;
      position: relative;
    }

    .language-selector .dropdown-toggle {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 8px 12px;
      border-radius: 6px;
      transition: all 0.3s ease;
      color: #333;
      font-weight: 500;
    }

    .language-selector .dropdown-toggle:hover {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .language-selector .dropdown-toggle i {
      font-size: 1.1rem;
    }

    .language-selector .dropdown-menu {
      min-width: 140px;
      border: none;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      padding: 8px 0;
      margin-top: 10px;
    }

    .language-selector .dropdown-item {
      padding: 8px 16px;
      display: flex;
      align-items: center;
      transition: all 0.2s ease;
    }

    .language-selector .dropdown-item.active {
      background-color: #f8f9fa;
      color: #000;
    }

    .language-selector .dropdown-item:hover {
      background-color: #f8f9fa;
    }

    .language-selector .dropdown-item i {
      color: #fdc411;
    }

    /* Sign In Button Styles - Simplified */
    .btn-signin {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #fdc411;
      color: #000;
      padding: 12px 20px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.95rem;
      line-height: 1.5;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border: none;
      transition: all 0.2s ease;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      position: relative;
      margin-left: 10px;
      margin-right: 10px;
      min-width: 100px;
      height: 44px;
      box-sizing: border-box;
      text-decoration: none;
      cursor: pointer;
    }

    .btn-signin:hover {
      color: #000;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-signin i {
      margin-right: 8px;
      font-size: 1rem;
    }

    .navmenu li:hover>a, .navmenu .active, .navmenu .active:focus {
      color: #000;
    }

    .navmenu a, .navmenu a:focus {
      color: #000;
    }

    /* Mobile responsiveness */
    @media (max-width: 992px) {
        
      .header-inner {
        padding: 0 15px;
      }
      
      .logo-container {
        border-right: none;
        padding-right: 0;
        margin-right: 0;
      }
      
      .indus-animation-1 {
        flex-direction: column;
        gap: 5px;
      }
      
      .indus-h3 {
        letter-spacing: 1px;
      }
      
      .indus-reveal-frame {
        margin-top: 20px;
      }
      
      .navmenu ul {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .navmenu li {
        margin: 5px 0;
        width: 100%;
      }
      
      .language-selector {
        margin-left: 0;
      }
      
      .language-selector .dropdown-toggle span {
        display: none;
      }
      
      .language-selector .dropdown-menu {
        position: static !important;
        transform: none !important;
      }
      
      .btn-signin {
        width: 100%;
        margin: 10px 0;
        padding: 12px 20px;
        justify-content: center;
      }
    }

    /* Hide when loaded */
    .indus-preloader.indus-hidden {
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.8s ease;
    }

    /* Hide the default Google Translate UI elements */
    .goog-te-banner-frame.skiptranslate,
    .goog-te-gadget-icon,
    #goog-gt-tt,
    .goog-te-balloon-frame,
    .goog-te-menu-value { display: none !important; }
    body { top: 0 !important; }

  </style>
</head>

<body class="index-page">

  <!-- Hidden Google Translate Element -->
  <div id="google_translate_element" style="display: none;"></div>

  <!-- Main Header -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-inner">
      <a href="<?= base_url()?>" class="logo-container">
        <img src="<?= base_url()?>assets/img/logoi.png" width="100" height="50" alt="Indus Services Logo">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url()?>about.php">About Us</a></li>
          <li><a href="<?= base_url()?>#contact">Contact Us</a></li>
          <li><a href="<?= base_url()?>#services">Services</a></li>
          <?php if (!empty($_SESSION['user_id'])): ?>
            <li><a href="<?= base_url()?>client/edit_profile.php">
              <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></a></li>
          <?php else: ?>
            <li>
              <a href="<?= base_url() ?>signin" class="btn-signin">
                <i class="fa-solid fa-screwdriver-wrench"></i> Sign In
              </a>
            </li>
          <?php endif; ?>
          <li class="dropdown language-selector">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
              <i class="bi bi-translate"></i>
              <span class="d-none d-md-inline">EN</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item active" href="#"><i class="bi bi-check-lg me-2"></i>English</a></li>
              <li><a class="dropdown-item" href="#"><span class="me-2">العربية</span></a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <!-- [Your page content goes here…] -->

  <!-- Vendor JS Files -->
  <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url()?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Google Translate Widget -->
  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,ar',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
      }, 'google_translate_element');
    }
  </script>
  <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <!-- Preloader, Scroll, and Language Switch Logic -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Preloader animation
      setTimeout(function () {
        const preloader = document.querySelector('.indus-preloader');
        if (preloader) {
          preloader.classList.add('indus-hidden');
          setTimeout(() => { preloader.style.display = 'none'; }, 800);
        }
      }, 3500);

      // Header scroll effect
      const header = document.querySelector('.header');
      window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 50);
      });
      if (window.scrollY > 50) header.classList.add('scrolled');

      // Language selector event handling
      const langItems = document.querySelectorAll(".language-selector .dropdown-item");
      langItems.forEach(item => {
        item.addEventListener("click", function (e) {
          e.preventDefault();
          langItems.forEach(i => i.classList.remove("active"));
          this.classList.add("active");

          const langText = this.textContent.trim().toLowerCase();
          const langCode = /arabic|العربية/.test(langText) ? "ar" : "en";

          const toggleSpan = document.querySelector(".language-selector .dropdown-toggle span");
          if (toggleSpan) toggleSpan.textContent = langCode.toUpperCase();

          // Trigger Google Translate
          const combo = document.querySelector("select.goog-te-combo");
          if (combo) {
            combo.value = langCode;
            combo.dispatchEvent(new Event("change"));
          }
        });
      });
    });
  </script>