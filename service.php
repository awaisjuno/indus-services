<?php

  session_start();
  include 'config/config.php';
  include 'temp/header.php';

  // Get slug from URL
  $slug = $_GET['slug'] ?? null;

  $slug = mysqli_real_escape_string($con, $_GET['slug']);
  $subCategoryName = str_replace('-', ' ', $slug);
  $subCategoryName = ucwords($subCategoryName);

  $sel = "SELECT * FROM sub_category 
          WHERE LOWER(sub_category) = LOWER('$subCategoryName')";

  $run = mysqli_query($con, $sel);

  // Check if any record found
  if (!$run || mysqli_num_rows($run) === 0) {
      echo "<script>alert('No matching category found.'); window.location.href='" . base_url() . "';</script>";
      exit;
  }

  $row = mysqli_fetch_assoc($run);

?>


<style>
  .benefits-list {
    margin: 2rem 0;
  }

.benefit-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}
.benefit-icon {
    color: #28a745;
    margin-right: 12px;
    font-size: 1.3rem;
}
.verification-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    animation: pulse 2s infinite;
}
</style>


<!-- Hero Section -->
<section class="services-hero py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="display-4 fw-bold mb-4 hero-title"><?= $row['sub_category']?></h1>
        <p class="lead mb-4"><?= $row['description']?></p>

                    <div class="benefits-list">
                        <div class="benefit-item">
                            <i class="fas fa-check-circle benefit-icon"></i>
                            <span>Professional &amp; Experienced Team</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle benefit-icon"></i>
                            <span>Quality Guaranteed Services</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle benefit-icon"></i>
                            <span>24/7 Customer Support</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-check-circle benefit-icon"></i>
                            <span>Flexible Scheduling</span>
                        </div>
                    </div>

        <div class="row g-3">
            <?php 
                $cat = strtolower(str_replace(' ', '-', $row['sub_category']));
                
                    // Show both buttons for regular services
                    echo '<div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="'.base_url().'options/'.$cat.'" class="btn w-100 book-service-btn">Book Service</a>
                    </div>';
            ?>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="<?= base_url()?>assets/services/<?= $row['img']?>" alt="Professional cleaning team" class="img-fluid rounded-3 shadow-lg hero-image">
        <div class="verification-badge">
                        <i class="fas fa-check"></i>
                    </div>
      </div>
    </div>
  </div>
</section>

<!-- 5/5 Rating Section -->
<section class="py-5 rating-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 text-center mb-4 mb-lg-0">
        <div class="display-3 fw-bold rating-number">5.0</div>
        <div class="text-warning mb-2">
          <i class="bi bi-star-fill fs-3"></i>
          <i class="bi bi-star-fill fs-3"></i>
          <i class="bi bi-star-fill fs-3"></i>
          <i class="bi bi-star-fill fs-3"></i>
          <i class="bi bi-star-fill fs-3"></i>
        </div>
        <p class="mb-0">Average Rating</p>
      </div>
      <div class="col-lg-8">
        <div class="row g-3">
          <!-- Rating 1 -->
          <div class="col-md-4">
            <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm rating-card">
              <img src="https://randomuser.me/api/portraits/women/45.jpg" width="50" height="50" class="rounded-circle me-3" alt="User">
              <div>
                <div class="text-warning mb-1">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <h6 class="mb-0">Layla Ahmed</h6>
              </div>
            </div>
          </div>
          
          <!-- Rating 2 -->
          <div class="col-md-4">
            <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm rating-card">
              <img src="https://randomuser.me/api/portraits/men/75.jpg" width="50" height="50" class="rounded-circle me-3" alt="User">
              <div>
                <div class="text-warning mb-1">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <h6 class="mb-0">Omar Khalid</h6>
              </div>
            </div>
          </div>
          
          <!-- Rating 3 -->
          <div class="col-md-4">
            <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm rating-card">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" width="50" height="50" class="rounded-circle me-3" alt="User">
              <div>
                <div class="text-warning mb-1">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <h6 class="mb-0">Aisha Mohammed</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services Grid -->
<section id="services" class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <span class="fw-bold services-subtitle">OUR SERVICES</span>
      <h2 class="display-5 fw-bold mb-3">Our Other Services</h2>
      <p class="lead text-muted mx-auto services-description">Discover our complete range of professional home services tailored for Abu Dhabi residents.</p>
    </div>

    <div class="row g-4">
      <?php 
      $sel = "SELECT * FROM sub_category WHERE is_active='1'";
      $run = mysqli_query($con, $sel);
      while($row = mysqli_fetch_assoc($run)) {
          // Create URL-friendly slug
          $slug = strtolower($row['sub_category']);
          $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
          $slug = trim($slug, '-');
          
          // Get image path
          $image = !empty($row['img']) ? base_url().'assets/services/'.$row['img'] : base_url().'assets/services/default-service.jpg';
          
          echo '
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all overflow-hidden">
              <div class="service-image-container">
                <img src="'.$image.'" alt="'.htmlspecialchars($row['sub_category']).'" class="img-fluid w-100 h-100 service-image">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="h4 mb-3">' . htmlspecialchars($row['sub_category']) . '</h3>
                <p class="text-muted mb-4">' . htmlspecialchars($row['description']) . '</p>
                <a href="' . base_url() . 'service/' . htmlspecialchars($slug) . '" class="btn btn-primary stretched-link service-details-btn">View Details</a>
              </div>
            </div>
          </div>';
      }
      ?>
    </div>

    <!-- CTA Section -->
    <div class="rounded-3 p-5 mt-5 text-white cta-section">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h3 class="h2 mb-3">Ready to experience premium home services?</h3>
          <p class="mb-0">Book your service today and get 15% off your first cleaning!</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
          <a href="contact.php" class="btn btn-dark btn-lg px-4 cta-button">Book Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="py-5 bg-light testimonials-section">
  <div class="container">
    <div class="text-center mb-5">
      <span class="fw-bold testimonials-subtitle">CLIENT FEEDBACK</span>
      <h2 class="display-5 fw-bold mb-3">What Our Clients Say</h2>
    </div>
    
    <div class="row g-4">
      <!-- Testimonial 1 -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="https://randomuser.me/api/portraits/women/43.jpg" width="60" height="60" class="rounded-circle" alt="Client">
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1">Sarah Al Mansoori</h5>
                <div class="text-warning">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
              </div>
            </div>
            <p class="mb-0">"The deep cleaning service transformed my apartment! The team was professional and paid attention to every detail."</p>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 2 -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" width="60" height="60" class="rounded-circle" alt="Client">
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1">Ahmed Khalifa</h5>
                <div class="text-warning">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
              </div>
            </div>
            <p class="mb-0">"Regular cleaning service saves me so much time. They're always punctual and do an excellent job."</p>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 3 -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" width="60" height="60" class="rounded-circle" alt="Client">
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1">Fatima Mohammed</h5>
                <div class="text-warning">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                </div>
              </div>
            </div>
            <p class="mb-0">"The carpet cleaning removed stains I thought were permanent. Very impressed with the results!"</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* General Styles */
.services-hero {
  padding: 5rem 0;
  background: linear-gradient(135deg, #fff9e6 0%, #fff0cc 100%);
}

.hero-title {
  color: #fdc411;
}

.hero-image {
  max-height: 400px;
  width: 100%;
  object-fit: cover;
}

.rating-section {
  background-color: #fffdf5;
  padding-top: 80px !important;
}

.rating-number {
  color: #fdc411;
}

.rating-card {
  transition: all 0.3s ease;
}

.rating-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(253, 196, 17, 0.2) !important;
}

.services-subtitle {
  color: #fdc411;
}

.services-description {
  max-width: 700px;
}

.service-image-container {
  height: 200px;
  overflow: hidden;
  transition: all 0.3s ease;
}

.service-image {
  object-fit: cover;
}

.card:hover .service-image-container {
  transform: scale(1.05);
}

.hover-shadow {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-shadow:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.stretched-link::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  content: "";
}

.service-details-btn {
  background-color: #fdc411;
  border-color: #fdc411;
  color: #000;
  font-weight: 600;
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  transition: all 0.3s ease;
}

.service-details-btn:hover {
  background-color: #e6b00f;
  border-color: #e6b00f;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(253, 196, 17, 0.3);
}

.cta-section {
  background-color: #fdc411;
}

.cta-button {
  background: #000;
  color: #fff;
  font-weight: 600;
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  transition: all 0.3s ease;
}

.cta-button:hover {
  background: #333;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.testimonials-section {
  padding-top: 80px !important;
}

.testimonials-subtitle {
  color: #fdc411;
}

/* Button Styles */
.book-service-btn {
  background-color: #fdc411;
  border-color: #fdc411;
  color: #000;
  font-weight: 600;
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  transition: all 0.3s ease;
  display: inline-block;
  text-align: center;
  border: 1px solid transparent;
}

.book-service-btn:hover {
  background-color: #e6b00f;
  border-color: #e6b00f;
  color: #000;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(253, 196, 17, 0.3);
  text-decoration: none;
}

.customized-quotes-btn {
  background-color: #343a40;
  border-color: #343a40;
  color: #fff;
  font-weight: 600;
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  transition: all 0.3s ease;
  display: inline-block;
  text-align: center;
  border: 1px solid transparent;
}

.customized-quotes-btn:hover {
  background-color: #23272b;
  border-color: #1d2124;
  color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.15);
  text-decoration: none;
}

/* Center single button for quotation services */
.services-hero .row.g-3 .col-lg-6:only-child {
  margin: 0 auto;
  float: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .services-hero .row.g-3 {
    margin-left: -0.5rem;
    margin-right: -0.5rem;
  }
  
  .services-hero .col-lg-6 {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }
  
  /* Center single button on mobile */
  .services-hero .row.g-3 .col-lg-6:only-child {
    width: 100%;
    max-width: 300px;
  }
}
</style>

<script>
// Initialize AOS animations if needed
document.addEventListener('DOMContentLoaded', function() {
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true
    });
  }
});
</script>

<?php include 'temp/footer.php'; ?>
