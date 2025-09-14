<?php
session_start();
include 'config/config.php';
include 'temp/header.php';
?>

<script>
    
// FAQ toggle functionality
document.addEventListener('DOMContentLoaded', function() {
  const faqItems = document.querySelectorAll('.faq-item h3');
  
  faqItems.forEach(item => {
    item.addEventListener('click', function() {
      // Toggle active class on parent item
      const parentItem = this.parentElement;
      parentItem.classList.toggle('active');
      
      // Toggle icon between plus and minus
      const icon = this.querySelector('.faq-toggle');
      if (parentItem.classList.contains('active')) {
        icon.classList.remove('bi-plus-lg');
        icon.classList.add('bi-dash-lg');
      } else {
        icon.classList.remove('bi-dash-lg');
        icon.classList.add('bi-plus-lg');
      }
    });
  });
});
</script>

<style>
    /* FAQ Section Styles */
.faq-item {
  margin-bottom: 15px;
  border-radius: 8px;
  background: #fff;
  box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 0, 0, 0.03);
}

.faq-item h3 {
  padding: 20px;
  margin: 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 1.1rem;
  font-weight: 600;
  color: #2a2a2a;
}

.faq-item h3 .num {
  color: #fdc411;
  margin-right: 10px;
  font-weight: 700;
}

.faq-item h3 .question {
  flex: 1;
}

.faq-item h3 .faq-toggle {
  margin-left: 15px;
  transition: all 0.3s ease;
  color: #fdc411;
}

.faq-item .faq-content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease;
  padding: 0 20px;
}

.faq-item.active .faq-content {
  max-height: 300px;
  padding: 0 20px 20px;
}

.faq-item.active {
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
}

.faq-item:hover {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}
</style>

  <!-- Indus Services Preloader - White Background -->
  <div class="indus-preloader">
    <div class="indus-preloader-animation">
      <div class="indus-abs indus-animation-1">
        <p class="indus-h3 indus-thin">Welcome</p>
        <p class="indus-h3">to</p>
        <p class="indus-h3 indus-thin">Indus</p>
        <p class="indus-h3">Services</p>
      </div>
      <div class="indus-abs indus-animation-2">
        <div class="indus-reveal-frame">
          <p class="indus-reveal-box"></p>
          <p class="indus-h3 indus-thin">indusservices.ae</p>
        </div>
      </div>
    </div>
  </div>


<main class="main">


<!-- Hero Section with Updated Image Slider -->
<section id="hero" class="hero dark-background" style="padding: 0px;">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      
      <!-- Slide 1 -->
      <div class="carousel-item active" style="position: relative;">
        <img src="<?= base_url()?>assets/img/pexels-tima-miroshnichenko-6195125.jpg" class="d-block w-100" alt="Modern home">
        <div class="slider-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #fdc115; opacity: 0.05;"></div>
        <div class="carousel-caption">
          <div class="container" data-aos="fade-up">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="100">
              <div class="hero-tag">
                <i class="bi bi-rocket-takeoff"></i>
                <span>Premium Home Services</span>
              </div>
              <h1>Transforming <span class="highlight">Houses into Pristine</span> Well Maintained Homes</h1>
              <p class="lead">Our certified professionals deliver exceptional cleaning, maintenance, and moving services designed specifically for Abu Dhabi homes and businesses.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item" style="position: relative;">
        <img src="<?= base_url()?>assets/img/pexels-tima-miroshnichenko-6195277.jpg" class="d-block w-100" alt="Cleaning service">
        <div class="slider-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #fdc115; opacity: 0.05;"></div>
        <div class="carousel-caption">
          <div class="container" data-aos="fade-up">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="100">
              <div class="hero-tag">
                <i class="bi bi-stars"></i>
                <span>5-Star Rated Service</span>
              </div>
              <h1>Trusted by <span class="highlight">Thousands of Families</span> Across Abu Dhabi</h1>
              <p class="lead">Experience the difference with our award-winning home services team, delivering consistent quality since 2008.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3 (Optional: Add a third caption or keep it visual only) -->
      <div class="carousel-item" style="position: relative;">
        <img src="<?= base_url()?>assets/img/pexels-tima-miroshnichenko-6195111.jpg" class="d-block w-100" alt="Modern home">
        <div class="slider-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #fdc115; opacity: 0.05;"></div>
        <div class="carousel-caption">
          <div class="container" data-aos="fade-up">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="100">
              <div class="hero-tag">
                <i class="bi bi-house-check"></i>
                <span>Complete Home Care</span>
              </div>
              <h1>Professional <span class="highlight">Cleaning & Maintenance</span> You Can Count On</h1>
              <p class="lead">Reliable and efficient services tailored to your home's unique needs.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const heroCarousel = document.querySelector('#carouselExampleSlidesOnly');
    new bootstrap.Carousel(heroCarousel, {
      interval: 5000, // Adjust to your desired slide interval
      ride: 'carousel'
    });
  });
</script>


<!-- Horizontal Scrolling Marquee -->
<section class="services-marquee">
  <div class="marquee-wrapper">
    <div class="marquee-track">
      <!-- Marquee Items -->
      <div class="marquee-item">
        <i class="bi bi-bug-fill"></i>
        <span>Pest Control</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-bucket-fill"></i>
        <span>Maid Service</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-broom"></i>
        <span>Deep Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-lamp-fill"></i>
        <span>Sofa Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Carpet Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-hammer"></i>
        <span>Carpentry</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-tools"></i>
        <span>Handyman</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-lightning-charge-fill"></i>
        <span>Electrical</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-droplet-fill"></i>
        <span>Plumbing</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-brush-fill"></i>
        <span>Painting</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-gear-fill"></i>
        <span>Maintenance</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-snow"></i>
        <span>AC Maintenance & Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-plug-fill"></i>
        <span>Appliance Repair & Installation</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-house-gear-fill"></i>
        <span>Remodeling and Maintenance</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-tree-fill"></i>
        <span>Garden Maintenance</span>
      </div>
      
      <!-- Duplicate items for seamless looping -->
      <div class="marquee-item">
        <i class="bi bi-bug-fill"></i>
        <span>Pest Control</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-bucket-fill"></i>
        <span>Maid Service</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-broom"></i>
        <span>Deep Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-lamp-fill"></i>
        <span>Sofa Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Carpet Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-hammer"></i>
        <span>Carpentry</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-tools"></i>
        <span>Handyman</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-lightning-charge-fill"></i>
        <span>Electrical</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-droplet-fill"></i>
        <span>Plumbing</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-brush-fill"></i>
        <span>Painting</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-gear-fill"></i>
        <span>Maintenance</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-snow"></i>
        <span>AC Maintenance & Cleaning</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-plug-fill"></i>
        <span>Appliance Repair & Installation</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-house-gear-fill"></i>
        <span>Remodeling and Maintenance</span>
      </div>
      <div class="marquee-item">
        <i class="bi bi-tree-fill"></i>
        <span>Garden Maintenance</span>
      </div>
    </div>
  </div>
</section>

<style>

.services-marquee .marquee-track {
  display: flex;
  gap: 2rem; /* spacing between items */
  animation: marquee 30s linear infinite;
}

.services-marquee .marquee-track:hover {
  animation-play-state: paused; /* Stop animation on hover */
}

@keyframes marquee {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-50%);
  }
}

  .services-marquee {
    background: #fdc411;
    padding: 10px 0;
    width: 100%;
    overflow: hidden;
    position: relative;
  }

  .marquee-wrapper {
    width: 100%;
    overflow: hidden;
    position: relative;
  }

  .marquee-track {
    display: inline-block;
    white-space: nowrap;
    animation: marquee 40s linear infinite;
    padding-right: 20px;
  }

  .marquee-item {
    display: inline-flex;
    align-items: center;
    padding: 0 18px;
    font-size: 1.1rem;
    font-weight: 600;
    height: 36px;
    color: white;
    border-right: 1px solid rgba(255,255,255,0.3);
  }

  .marquee-item i {
    font-size: 1.2rem;
    margin-right: 8px;
  }

  @keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
</style>

<!-- Trusted Service Experts Section -->
<section class="trusted-experts py-5">
  <div class="container">
    <div class="section-header text-center mb-5" data-aos="fade-up">
      <h2 class="display-5 fw-bold mb-3">Why Choose Indus Service?</h2>
      <p class="lead text-muted">We're committed to delivering exceptional service with complete peace of mind</p>
    </div>
    
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-icon mb-3">
            <div class="icon-wrapper">
              <i class="fas fa-user-shield fa-3x"></i>
            </div>
          </div>
          <h3 class="h5 mb-3 fw-bold">Trusted Service Experts</h3>
          <p class="mb-0 text-muted">Licensed and background-checked professionals who meet our high standards</p>
        </div>
      </div>
      
      <!-- Card 2 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-icon mb-3">
            <div class="icon-wrapper">
              <i class="fas fa-star fa-3x"></i>
            </div>
          </div>
          <h3 class="h5 mb-3 fw-bold">Rated 5/5 Stars</h3>
          <p class="mb-0 text-muted">From 956+ satisfied customer reviews</p>
        </div>
      </div>
      
      <!-- Card 3 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-icon mb-3">
            <div class="icon-wrapper">
              <i class="fas fa-shield-alt fa-3x"></i>
            </div>
          </div>
          <h3 class="h5 mb-3 fw-bold">AED 1000 Protection</h3>
          <p class="mb-0 text-muted">Damage protection guarantee on all services</p>
        </div>
      </div>
      
      <!-- Card 4 -->
      <div class="col-md-6 col-lg-3">
        <div class="feature-card text-center p-4 h-100" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-icon mb-3">
            <div class="icon-wrapper">
              <i class="fas fa-hand-holding-usd fa-3x"></i>
            </div>
          </div>
          <h3 class="h5 mb-3 fw-bold">Pay After Service</h3>
          <p class="mb-0 text-muted">Only pay when you're completely satisfied</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Trusted Experts Section Styling */
  .trusted-experts {
    background: linear-gradient(135deg, #fffdf5 0%, #fff9e6 100%);
    position: relative;
    overflow: hidden;
  }
  
  .trusted-experts::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('https://www.transparenttextures.com/patterns/light-paper-fibers.png');
    opacity: 0.1;
    pointer-events: none;
  }
  
  .section-header h2 {
    color: #2a2a2a;
    position: relative;
    display: inline-block;
  }
  
  .section-header h2::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: #fdc411;
    border-radius: 3px;
  }
  
  .feature-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.03);
    position: relative;
    overflow: hidden;
    z-index: 1;
  }
  
  .feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }
  
  .feature-card::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: #fdc411;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.3s ease;
    z-index: -1;
  }
  
  .feature-card:hover::after {
    transform: scaleX(1);
    transform-origin: left;
  }
  
  .icon-wrapper {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(253, 196, 17, 0.1);
    border-radius: 50%;
    color: #fdc411;
    transition: all 0.3s ease;
  }
  
  .feature-card:hover .icon-wrapper {
    background: #fdc411;
    color: white;
    transform: rotateY(180deg);
  }
  
  .feature-card h3 {
    color: #333;
    transition: color 0.3s ease;
  }
  
  .feature-card:hover h3 {
    color: #000;
  }
  
  /* Responsive adjustments */
  @media (max-width: 768px) {
    .feature-card {
      text-align: center;
    }
    
    .icon-wrapper {
      width: 70px;
      height: 70px;
    }
  }


</style>

<!-- Our Most Popular Services Section -->
<section id="services" class="popular-services section">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Our Most Popular Services in Abu Dhabi</h2>
      <p>Premium home services trusted by thousands of residents</p>
    </div>

    <div class="services-grid">
      <?php 
      // Check connection first
      if(isset($con) && $con) {
            $sel = "SELECT * FROM sub_category WHERE display = 1 AND is_active = 1";
          $run = mysqli_query($con, $sel);
          
          if(mysqli_num_rows($run) > 0) {
              while($row = mysqli_fetch_assoc($run)) {
                  // Create URL-friendly slug
                  $slug = strtolower($row['sub_category']);
                  $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
                  $slug = trim($slug, '-');
                  
                  // Get image path using your base_url()
                  $image_path = !empty($row['img']) ? base_url().'assets/services/'.$row['img'] : base_url().'assets/services/default-service.jpg';
                  
                  echo '
                  <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img-container">
                      <img src="'.$image_path.'" alt="'.htmlspecialchars($row['sub_category']).'" class="service-img">
                      <div class="service-badge">Popular</div>
                    </div>
                    <div class="service-content">
                      <h3>'.htmlspecialchars($row['sub_category']).'</h3>
                      <p>'.htmlspecialchars($row['description']).'</p>
                      <a href="service/'.$slug.'" class="btn">Get Started <i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>';
              }
          } else {
              echo '<div class="col-12 text-center"><p>No services found.</p></div>';
          }
      } else {
          echo '<div class="col-12 text-center"><p>Database connection error. Please try again later.</p></div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section id="stats" class="stats section trusted-experts">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6 col-md-12">
        <div class="stats-overview text-center text-lg-start" data-aos="fade-right" data-aos-delay="200">
          <h3>Our growth in numbers</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod magna vel libero tincidunt, in finibus nisi faucibus. Proin vel erat nec orci sagittis ullamcorper vel at urna.</p>
        </div>
      </div>

      <div class="col-lg-6 col-md-12">
        <div class="stats-grid" data-aos="zoom-in" data-aos-delay="300">
          <div class="stats-card">
            <div class="stats-icon">
              <i class="bi bi-people-fill"></i>
            </div>
            <div class="stats-content">
              <div class="stats-number">
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span><span class="plus">+</span>
              </div>
              <p>Satisfied Customers</p>
            </div>
          </div>

          <div class="stats-card">
            <div class="stats-icon">
              <i class="bi bi-folder2-open"></i>
            </div>
            <div class="stats-content">
              <div class="stats-number">
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span><span class="plus">+</span>
              </div>
              <p>Services Completed</p>
            </div>
          </div>

          <div class="stats-card">
            <div class="stats-icon">
              <i class="bi bi-headset"></i>
            </div>
            <div class="stats-content">
              <div class="stats-number">
                <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span><span class="plus">+</span>
              </div>
              <p>Satisfaction Rate</p>
            </div>
          </div>

          <div class="stats-card">
            <div class="stats-icon">
              <i class="bi bi-person-workspace"></i>
            </div>
            <div class="stats-content">
              <div class="stats-number">
                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span><span class="plus">+</span>
              </div>
              <p>Trained Professionals</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>What Our Clients Say</h2>
    <p>Hear from satisfied customers who trusted IndusServices for their home service needs in Abu Dhabi</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">
      <!-- Testimonial Item 1 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonial-item">
          <div class="stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>
          <p>IndusServices transformed my home with their deep cleaning service. The team was professional, thorough, and left every corner sparkling. I've never seen my sofa look so new after their cleaning!</p>
          <div class="testimonial-footer">
            <div class="testimonial-author">
              <img src="assets/img/person/person-f-5.webp" alt="Sarah K." class="img-fluid rounded-circle" loading="lazy">
              <div>
                <h5>Sarah K.</h5>
                <span>Al Reem Island Resident</span>
              </div>
            </div>
            <div class="quote-icon">
              <i class="bi bi-quote"></i>
            </div>
          </div>
        </div>
      </div><!-- End Testimonial Item -->

      <!-- Testimonial Item 2 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial-item">
          <div class="stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>
          <p>The movers were incredibly careful with all our belongings during our relocation to Khalifa City. They packed everything securely and the temperature-controlled storage was a lifesaver while we waited for our new home to be ready.</p>
          <div class="testimonial-footer">
            <div class="testimonial-author">
              <img src="assets/img/person/person-m-3.webp" alt="Ahmed R." class="img-fluid rounded-circle" loading="lazy">
              <div>
                <h5>Ahmed R.</h5>
                <span>Relocated Family</span>
              </div>
            </div>
            <div class="quote-icon">
              <i class="bi bi-quote"></i>
            </div>
          </div>
        </div>
      </div><!-- End Testimonial Item -->

      <!-- Testimonial Item 3 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial-item">
          <div class="stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>
          <p>Their AC maintenance service saved us during the summer heat! The technician was knowledgeable, fixed our unit quickly, and gave us great advice for maintenance. Now our villa stays perfectly cool.</p>
          <div class="testimonial-footer">
            <div class="testimonial-author">
              <img src="assets/img/person/person-m-7.webp" alt="Khalid A." class="img-fluid rounded-circle" loading="lazy">
              <div>
                <h5>Khalid A.</h5>
                <span>Villa Owner, Mohammed Bin Zayed City</span>
              </div>
            </div>
            <div class="quote-icon">
              <i class="bi bi-quote"></i>
            </div>
          </div>
        </div>
      </div><!-- End Testimonial Item -->

      <!-- Testimonial Item 4 -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="testimonial-item">
          <div class="stars">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
          </div>
          <p>I use their weekly maid service and couldn't be happier. The cleaners are consistent, trustworthy, and pay attention to all the details I request. My apartment has never been so consistently clean!</p>
          <div class="testimonial-footer">
            <div class="testimonial-author">
              <img src="assets/img/person/person-f-9.webp" alt="Fatima S." class="img-fluid rounded-circle" loading="lazy">
              <div>
                <h5>Fatima S.</h5>
                <span>Busy Professional, Corniche Area</span>
              </div>
            </div>
            <div class="quote-icon">
              <i class="bi bi-quote"></i>
            </div>
          </div>
        </div>
      </div><!-- End Testimonial Item -->
    </div>
  </div>
</section><!-- /Testimonials Section -->

<!-- How We Work Section -->
<section id="how-we-work" class="how-we-work section trusted-experts">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>How We Work</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="steps-wrapper">
      <div class="step-item" data-aos="fade-right" data-aos-delay="200">
        <div class="step-content">
          <div class="step-icon">
            <i class="bi bi-lightbulb"></i>
          </div>
          <div class="step-info">
            <span class="step-number">Step 01</span>
            <h3>Service Request</h3>
            <p>Tell us about your home service needs through our website, app, or phone call. We'll ask key questions to understand your specific requirements.</p>
          </div>
        </div>
      </div><!-- End Step Item -->

      <div class="step-item" data-aos="fade-left" data-aos-delay="300">
        <div class="step-content">
          <div class="step-icon">
            <i class="bi bi-gear"></i>
          </div>
          <div class="step-info">
            <span class="step-number">Step 02</span>
            <h3>Free Assessment</h3>
            <p>Our expert will visit your property for evaluation (if needed) and provide a detailed quote with transparent pricing and service scope.</p>
          </div>
        </div>
      </div><!-- End Step Item -->

      <div class="step-item" data-aos="fade-right" data-aos-delay="400">
        <div class="step-content">
          <div class="step-icon">
            <i class="bi bi-bar-chart"></i>
          </div>
          <div class="step-info">
            <span class="step-number">Step 03</span>
            <h3>Professional Service</h3>
            <p>Our certified technicians arrive on time with proper equipment to complete the job efficiently while maintaining the highest quality standards.</p>
          </div>
        </div>
      </div><!-- End Step Item -->

      <div class="step-item" data-aos="fade-left" data-aos-delay="500">
        <div class="step-content">
          <div class="step-icon">
            <i class="bi bi-check2-circle"></i>
          </div>
          <div class="step-info">
            <span class="step-number">Step 04</span>
            <h3>Quality Assurance</h3>
            <p>We conduct final inspections, clean up the work area, and ensure your complete satisfaction before considering the job done.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Faq Section -->
<section id="faq" class="faq section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Frequently Asked Questions</h2>
    <p>Get answers to common questions about our home services in Abu Dhabi</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="faq-tabs mb-5">
          <ul class="nav nav-pills justify-content-center" id="faqTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#faq-general" type="button" role="tab" aria-controls="general" aria-selected="true">
                <i class="bi bi-house-door me-2"></i>Services
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pricing-tab" data-bs-toggle="pill" data-bs-target="#faq-pricing" type="button" role="tab" aria-controls="pricing" aria-selected="false">
                <i class="bi bi-currency-exchange me-2"></i>Pricing
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="support-tab" data-bs-toggle="pill" data-bs-target="#faq-support" type="button" role="tab" aria-controls="support" aria-selected="false">
                <i class="bi bi-headset me-2"></i>Support
              </button>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="faqTabContent">
          <!-- Services FAQs -->
          <div class="tab-pane fade show active" id="faq-general" role="tabpanel" aria-labelledby="general-tab">
            <div class="faq-list">
              <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                <h3>
                  <span class="num">1</span>
                  <span class="question">What areas in Abu Dhabi do you serve?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>We provide home services across all areas of Abu Dhabi including Abu Dhabi Island, Khalifa City, Mohammed Bin Zayed City, and Musaffah. Our teams can reach you anywhere within the emirate.</p>
                </div>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <h3>
                  <span class="num">2</span>
                  <span class="question">Are your cleaners and technicians trained professionals?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>Yes, all our staff undergo rigorous training and background checks. Our technicians are licensed professionals with experience in their respective fields, whether it's cleaning, maintenance, or moving services.</p>
                </div>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <h3>
                  <span class="num">3</span>
                  <span class="question">Do I need to provide any equipment or supplies?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>No, we bring all necessary equipment, tools, and cleaning supplies. For specialized cleaning products you prefer, you may provide them, but our teams come fully prepared with high-quality, eco-friendly supplies.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Pricing FAQs -->
          <div class="tab-pane fade" id="faq-pricing" role="tabpanel" aria-labelledby="pricing-tab">
            <div class="faq-list">
              <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                <h3>
                  <span class="num">1</span>
                  <span class="question">How is pricing determined for your services?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>Pricing depends on the service type, property size, and job complexity. We provide transparent quotes after understanding your specific needs. You'll always know the cost before we begin any work.</p>
                </div>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <h3>
                  <span class="num">2</span>
                  <span class="question">Do you offer any discounts for regular service?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>Yes, we offer special packages and discounts for recurring services like weekly/monthly cleaning contracts or annual maintenance plans. Contact us to discuss the best option for your needs.</p>
                </div>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <h3>
                  <span class="num">3</span>
                  <span class="question">What payment methods do you accept?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>We accept cash, credit/debit cards, and bank transfers. Payment is due upon completion of service unless you have a corporate account with us.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Support FAQs -->
          <div class="tab-pane fade" id="faq-support" role="tabpanel" aria-labelledby="support-tab">
            <div class="faq-list">
              <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                <h3>
                  <span class="num">1</span>
                  <span class="question">What are your working hours?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>Our customer support is available 7 days a week from 8AM to 8PM. Services can be scheduled during these hours, with emergency services available 24/7 for urgent maintenance needs.</p>
                </div>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <h3>
                  <span class="num">2</span>
                  <span class="question">What if I need to reschedule or cancel my appointment?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>You can reschedule or cancel up to 12 hours before your appointment without penalty. For cancellations within 12 hours, a small fee may apply depending on the service type.</p>
                </div>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <h3>
                  <span class="num">3</span>
                  <span class="question">How does your damage protection policy work?</span>
                  <i class="bi bi-plus-lg faq-toggle"></i>
                </h3>
                <div class="faq-content">
                  <p>We're fully insured and offer AED 1000 protection coverage per incident. If any damage occurs during our service, we'll either repair it or compensate you up to this amount, after verification.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact section trusted-experts">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact Us</h2>
    <p>Get in touch with our team for any inquiries or service requests</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-6">
        <div class="map-container mb-4 mb-lg-0" style="height: 100%; min-height: 400px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3638.490523213575!2d54.36229631543139!3d24.2423847741536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43348a67e24b%3A0xff45e502e1ceb7e2!2sBurj%20Khalifa!5e0!3m2!1sen!2sae!4v1629297212345!5m2!1sen!2sae" 
                  width="100%" 
                  height="100%" 
                  style="border:0; border-radius: 8px;" 
                  allowfullscreen="" 
                  loading="lazy">
          </iframe>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="contact-info-container mb-4">
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="contact-info-card h-100">
                <div class="contact-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <h4>Location</h4>
                <p>Abu Dhabi Island, Musaffah Industrial, Abu Dhabi, UAE</p>
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <div class="contact-info-card h-100">
                <div class="contact-icon">
                  <i class="bi bi-envelope"></i>
                </div>
                <h4>Email</h4>
                <p>info@indusservices.ae</p>
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <div class="contact-info-card h-100">
                <div class="contact-icon">
                  <i class="bi bi-telephone"></i>
                </div>
                <h4>Call</h4>
                <p>02 558 4651</p>
              </div>
            </div>
            
            <div class="col-md-6 mb-3">
              <div class="contact-info-card h-100">
                <div class="contact-icon">
                  <i class="bi bi-clock"></i>
                </div>
                <h4>Open Hours</h4>
                <p>Daily: 8:00 AM – 8:00 PM</p>
              </div>
            </div>
          </div>
        </div>

        <div class="contact-form-container">
          <form action="forms/contact.php" method="post" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center">
              <button type="submit">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php include 'temp/footer.php'; ?>

<script>
// Initialize the carousel with autoplay
document.addEventListener('DOMContentLoaded', function() {
  const heroCarousel = new bootstrap.Carousel('#heroCarousel', {
    interval: 5000,
    ride: 'carousel',
    wrap: true
  });
  
  // Reinitialize AOS on slide change
  document.getElementById('heroCarousel').addEventListener('slid.bs.carousel', function() {
    AOS.refresh();
  });

  // FAQ toggle functionality
  const faqItems = document.querySelectorAll('.faq-item h3');
  faqItems.forEach(item => {
    item.addEventListener('click', function() {
      const parent = this.parentElement;
      parent.classList.toggle('active');
    });
  });

  // Initialize PureCounter
  if (typeof PureCounter !== 'undefined') {
    new PureCounter();
  }

  // Contact form submission handling
  const contactForm = document.querySelector('.php-email-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      const loading = this.querySelector('.loading');
      const error = this.querySelector('.error-message');
      const sent = this.querySelector('.sent-message');
      
      loading.style.display = 'block';
      error.style.display = 'none';
      sent.style.display = 'none';
      
      // This is where you would normally make an AJAX call
      // For demo purposes, we'll simulate a successful submission
      setTimeout(() => {
        loading.style.display = 'none';
        sent.style.display = 'block';
        contactForm.reset();
      }, 1500);
    });
  }
});
</script>  