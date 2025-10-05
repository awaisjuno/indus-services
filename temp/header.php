<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page['title']); ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url()?>assets/img/favicon.png">
    <meta name="description" content="<?php echo htmlspecialchars($page['description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page['keywords']); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($page['canonical_url']); ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page['og_title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page['og_description']); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page['og_image']); ?>">
    <meta property="og:type" content="<?php echo htmlspecialchars($page['og_type']); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($page['canonical_url']); ?>">

    <!-- Twitter -->
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page['twitter_title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page['twitter_description']); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($page['twitter_image']); ?>">
    <meta name="twitter:card" content="<?php echo htmlspecialchars($page['twitter_card_type']); ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&family=Montserrat:wght@100..900&family=Raleway:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Sofia&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url()?>assets/css/main.css" rel="stylesheet">

    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- External Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--Json Sechmea for the SEO-->
    <script src="<?= base_url()?>assets/js/json_schema.js"></script>

    <script src="<?= base_url()?>assets/js/landing_page.js"></script>
    
    <style>
        /* Header layout styles */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 10px 0;
        }
        
        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0 15px;
            gap: 15px;
        }
        
        .logo-phone-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .phone-info {
            display: flex;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;
            position: relative;
            padding-left: 45px;
            min-height: 45px;
            justify-content: center;
            gap: 2px;
        }
        
        .headphones-icon {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 25px;
            color: #2c3e50;
            z-index: 1;
        }
        
        .phone-number {
            font-weight: bold;
            font-size: 15px;
            color: #333;
            line-height: 1.1;
        }
        
        .hours {
            font-size: 11px;
            color: #666;
            line-height: 1.1;
        }
        
        /* Navigation menu spacing */
        .navmenu {
            position: relative;
        }
        
        .menu-items li a:hover {
            color: #fdc115;
        }
        
        .menu-items .fa-user,
        .menu-items .fa-screwdriver-wrench {
            margin-right: 4px;
            font-size: 14px;
        }
        
        /* Services Dropdown Styles - FIXED POSITIONING */
        .services-dropdown {
            position: relative;
        }
        
        .services-dropdown > a::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            margin-left: 5px;
            transition: transform 0.3s ease;
        }
        
        .services-dropdown:hover > a::after {
            transform: rotate(180deg);
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            width: 800px;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border-radius: 8px;
            padding: 25px;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            border: none;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        
        .services-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }
        
        .dropdown-column {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .dropdown-category {
            margin-bottom: 5px;
        }
        
        .dropdown-category-title {
            font-weight: 700;
            font-size: 16px;
            color: #2c3e50;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .dropdown-category-title i {
            color: #fdc115;
            font-size: 14px;
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #fdc115;
            transform: translateX(5px);
        }
        
        .dropdown-item i {
            font-size: 12px;
            color: #fdc115;
            width: 16px;
            text-align: center;
        }
        
        /* Mobile Navigation */
        .mobile-nav-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: #333;
            z-index: 1001;
            background: none;
            border: none;
        }
        
        /* Mobile Menu Styles */
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .mobile-menu-panel {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 320px;
            height: 100%;
            background: white;
            z-index: 1000;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        
        .mobile-menu-panel.active {
            right: 0;
        }
        
        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
            background: #f8f9fa;
        }
        
        .mobile-menu-logo {
            display: flex;
            align-items: center;
        }
        
        .mobile-menu-logo img {
            height: 40px;
        }
        
        .mobile-close-btn {
            font-size: 24px;
            background: none;
            border: none;
            color: #333;
            cursor: pointer;
        }
        
        .mobile-menu-items {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .mobile-menu-items li {
            border-bottom: 1px solid #f0f0f0;
        }
        
        .mobile-menu-items li:last-child {
            border-bottom: none;
        }
        
        .mobile-menu-items li a {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: all 0.2s ease;
        }
        
        .mobile-menu-items li a:hover {
            background-color: #f8f9fa;
            color: #fdc115;
        }
        
        .mobile-services-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            background: none;
            border: none;
            padding: 16px 20px;
            text-align: left;
            font-size: 16px;
            color: #333;
            cursor: pointer;
        }
        
        .mobile-services-toggle i {
            transition: transform 0.3s ease;
        }
        
        .mobile-services-toggle.active i {
            transform: rotate(180deg);
        }
        
        .mobile-services-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: #f8f9fa;
        }
        
        .mobile-services-menu.active {
            max-height: 500px;
        }
        
        .mobile-services-item {
            padding: 12px 20px 12px 40px;
            display: block;
            text-decoration: none;
            color: #555;
            font-size: 14px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .mobile-services-item:last-child {
            border-bottom: none;
        }
        
        .mobile-services-item:hover {
            background: #e9ecef;
            color: #fdc115;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .phone-info {
                display: none;
            }
            
            .headphones-icon {
                font-size: 28px;
            }
            
            .logo-phone-container {
                gap: 10px;
            }
            
            .menu-items {
                display: none;
            }
            
            .mobile-nav-toggle {
                display: block;
            }
            
            .dropdown-menu {
                width: 300px;
                grid-template-columns: 1fr;
                left: 50%;
                transform: translateX(-50%) translateY(10px);
            }
            
            .services-dropdown:hover .dropdown-menu {
                transform: translateX(-50%) translateY(0);
            }
        }
        
        @media (min-width: 769px) {
            .phone-info {
                display: flex;
            }
            
            .mobile-menu-overlay,
            .mobile-menu-panel {
                display: none;
            }
        }

        .phone-number a {
            text-decoration: none;
            color: inherit;
            font-weight: inherit;
            font-size: inherit;
        }

        .phone-number a:hover {
            color: #fdc115;
        }
    </style>
</head>
<body>

  <!-- Main Header -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="header-inner">
      <div class="logo-phone-container">
        <a href="<?= base_url()?>" class="logo-container">
          <img src="<?= base_url()?>assets/img/logoi.png" width="100" height="50" alt="Indus Services Logo">
        </a>

        <div class="phone-info">
          <i class="fa-solid fa-phone headphones-icon"></i>
          <span class="phone-number">
            <a href="tel:02-558-4651">
              02-558-4651
            </a>
          </span>
          <span class="hours">8AM to 8PM 7 Days/Week</span>
        </div>
      </div>

      <nav id="navmenu" class="navmenu">
        <ul class="menu-items">
          <li><a href="<?= base_url()?>about">About Us</a></li>
          <li class="services-dropdown">
            <a href="<?= base_url()?>#services">Services</a>
            <div class="dropdown-menu">
              <!-- Column 1 -->
              <div class="dropdown-column">
                <div class="dropdown-category">
                  <div class="dropdown-category-title">
                    <i class="fa-solid fa-broom"></i>
                    Cleaning & Pest Control
                  </div>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Pest Control
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Maid Service (Hourly)
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Deep Cleaning
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Sofa Cleaning
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Carpet Cleaning
                  </a>
                </div>
                
                <div class="dropdown-category">
                  <div class="dropdown-category-title">
                    <i class="fa-solid fa-toolbox"></i>
                    Maintenance
                  </div>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    AC Maintenance & Cleaning
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Appliance Repair & Installation
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Remodelling and Maintenance
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Garden Maintenance
                  </a>
                </div>
              </div>
              
              <!-- Column 2 -->
              <div class="dropdown-column">
                <div class="dropdown-category">
                  <div class="dropdown-category-title">
                    <i class="fa-solid fa-house-chimney"></i>
                    Home Upgrade
                  </div>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Carpentry
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Handyman
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Electrical
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Plumbing
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Painting
                  </a>
                </div>
                
                <div class="dropdown-category">
                  <div class="dropdown-category-title">
                    <i class="fa-solid fa-truck-moving"></i>
                    Moving & Storage
                  </div>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Movers and Packers
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    One Item Move
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Storage (Temperature Control)
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Junk Removal
                  </a>
                </div>
              </div>
              
              <!-- Column 3 -->
              <div class="dropdown-column">
                <div class="dropdown-category">
                  <div class="dropdown-category-title">
                    <i class="fa-solid fa-building"></i>
                    Company
                  </div>
                  <a href="<?= base_url()?>#contact" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Contact Us
                  </a>
                  <a href="<?= base_url()?>about" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    About Us
                  </a>
                </div>
                
                <div class="dropdown-category">
                  <div class="dropdown-category-title">
                    <i class="fa-solid fa-star"></i>
                    Why Choose Us?
                  </div>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Professional Staff
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    Quality Guarantee
                  </a>
                  <a href="#" class="dropdown-item">
                    <i class="fa-solid fa-chevron-right"></i>
                    24/7 Support
                  </a>
                </div>
              </div>
            </div>
          </li>
          <li><a href="<?= base_url()?>#contact">Contact Us</a></li>
          <?php if (!empty($_SESSION['user_id'])): ?>
            <li><a href="<?= base_url()?>client/edit_profile.php">
              <i class="fa-solid fa-user"></i>
              <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></a></li>
          <?php else: ?>
            <li><a href="<?= base_url()?>signin" class="btn-signin">
              <i class="fa-solid fa-screwdriver-wrench hidden-xs"></i> Sign In</a></li>
          <?php endif; ?>
        </ul>
        <button class="mobile-nav-toggle d-xl-none">
          <i class="bi bi-list"></i>
        </button>
      </nav>
    </div>
  </header>

  <!-- Mobile Menu Overlay -->
  <div class="mobile-menu-overlay"></div>

  <!-- Mobile Menu Panel -->
  <div class="mobile-menu-panel">
    <div class="mobile-menu-header">
      <div class="mobile-menu-logo">
        <img src="<?= base_url()?>assets/img/logoi.png" alt="Indus Services Logo">
      </div>
      <button class="mobile-close-btn">
        <i class="bi bi-x-lg"></i>
      </button>
    </div>
    
    <ul class="mobile-menu-items">
      <li><a href="<?= base_url()?>about">About Us</a></li>
      <li>
        <button class="mobile-services-toggle">
          Services
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="mobile-services-menu">
          <!-- Cleaning & Pest Control -->
          <a href="#" class="mobile-services-item">Pest Control</a>
          <a href="#" class="mobile-services-item">Maid Service (Hourly)</a>
          <a href="#" class="mobile-services-item">Deep Cleaning</a>
          <a href="#" class="mobile-services-item">Sofa Cleaning</a>
          <a href="#" class="mobile-services-item">Carpet Cleaning</a>
          
          <!-- Home Upgrade -->
          <a href="#" class="mobile-services-item">Carpentry</a>
          <a href="#" class="mobile-services-item">Handyman</a>
          <a href="#" class="mobile-services-item">Electrical</a>
          <a href="#" class="mobile-services-item">Plumbing</a>
          <a href="#" class="mobile-services-item">Painting</a>
          
          <!-- Maintenance -->
          <a href="#" class="mobile-services-item">AC Maintenance & Cleaning</a>
          <a href="#" class="mobile-services-item">Appliance Repair & Installation</a>
          <a href="#" class="mobile-services-item">Remodelling and Maintenance</a>
          <a href="#" class="mobile-services-item">Garden Maintenance</a>
          
          <!-- Moving & Storage -->
          <a href="#" class="mobile-services-item">Movers and Packers</a>
          <a href="#" class="mobile-services-item">One Item Move</a>
          <a href="#" class="mobile-services-item">Storage (Temperature Control)</a>
          <a href="#" class="mobile-services-item">Junk Removal</a>
          
          <!-- Company -->
          <a href="<?= base_url()?>#contact" class="mobile-services-item">Contact Us</a>
          <a href="<?= base_url()?>about" class="mobile-services-item">About Us</a>
        </div>
      </li>
      <li><a href="<?= base_url()?>#contact">Contact Us</a></li>
      <?php if (!empty($_SESSION['user_id'])): ?>
        <li><a href="<?= base_url()?>client/edit_profile.php">
          <i class="fa-solid fa-user"></i>
          My Profile</a></li>
      <?php else: ?>
        <li><a href="<?= base_url()?>signin" class="btn-signin">
          <i class="fa-solid fa-screwdriver-wrench"></i> Sign In</a></li>
      <?php endif; ?>
    </ul>
  </div>

  <!-- Vendor JS -->
  <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url()?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Mobile menu functionality
      const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
      const mobileCloseBtn = document.querySelector('.mobile-close-btn');
      const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
      const mobileMenuPanel = document.querySelector('.mobile-menu-panel');
      const mobileServicesToggle = document.querySelector('.mobile-services-toggle');
      const mobileServicesMenu = document.querySelector('.mobile-services-menu');
      
      // Open mobile menu
      mobileNavToggle.addEventListener('click', function() {
        mobileMenuOverlay.classList.add('active');
        mobileMenuPanel.classList.add('active');
        document.body.style.overflow = 'hidden';
      });
      
      // Close mobile menu
      function closeMobileMenu() {
        mobileMenuOverlay.classList.remove('active');
        mobileMenuPanel.classList.remove('active');
        document.body.style.overflow = '';
        // Close services menu when closing mobile menu
        mobileServicesToggle.classList.remove('active');
        mobileServicesMenu.classList.remove('active');
      }
      
      mobileCloseBtn.addEventListener('click', closeMobileMenu);
      mobileMenuOverlay.addEventListener('click', closeMobileMenu);
      
      // Toggle mobile services menu
      mobileServicesToggle.addEventListener('click', function() {
        this.classList.toggle('active');
        mobileServicesMenu.classList.toggle('active');
      });
      
      // Close menu when clicking on a link
      const mobileMenuLinks = document.querySelectorAll('.mobile-menu-items a, .mobile-services-item');
      mobileMenuLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
      });
      
      // Handle window resize
      window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
          closeMobileMenu();
        }
      });
    });
  </script>