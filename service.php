<?php
include 'config/config.php';
include 'temp/header.php';

$slug = mysqli_real_escape_string($con, $_GET['slug']);
$subCategoryName = ucwords(str_replace('-', ' ', $slug));

$sel = "SELECT * FROM sub_category WHERE sub_category='$subCategoryName'";
$run = mysqli_query($con, $sel);

$row = mysqli_fetch_assoc($run);

?>

<!-- Hero Section -->
<section class="services-hero py-5" style="background: linear-gradient(135deg, #fff9e6 0%, #fff0cc 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="display-4 fw-bold mb-4" style="color: #fdc411;"><?= $row['sub_category']?></h1>
        <p class="lead mb-4"><?= $row['description']?></p>
        <div class="d-flex gap-3">
          <a href="<?= base_url()?>options/<?= $row['sub_category']?>" class="btn btn-primary btn-lg px-4" style="width: 150px; background-color: #fdc411; border-color: #fdc411; color: #000;">Our Services</a>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="<?= base_url()?>assets/services/<?= $row['img']?>" alt="Professional cleaning team" class="img-fluid rounded-3 shadow-lg" style="max-height: 400px; width: 100%; object-fit: cover;">
      </div>
    </div>
  </div>
</section>

<!-- 5/5 Rating Section -->
<section class="py-5" style="background-color: #fffdf5; padding-top: 80px !important;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 text-center mb-4 mb-lg-0">
        <div class="display-3 fw-bold" style="color: #fdc411;">5.0</div>
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
      <span class="fw-bold" style="color: #fdc411;">OUR SERVICES</span>
      <h2 class="display-5 fw-bold mb-3">Our Other Services</h2>
      <p class="lead text-muted mx-auto" style="max-width: 700px;">Discover our complete range of professional home services tailored for Abu Dhabi residents.</p>
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
              <div class="service-image-container" style="height: 200px; overflow: hidden;">
                <img src="'.$image.'" alt="'.htmlspecialchars($row['sub_category']).'" class="img-fluid w-100 h-100" style="object-fit: cover;">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="h4 mb-3">' . htmlspecialchars($row['sub_category']) . '</h3>
                <p class="text-muted mb-4">' . htmlspecialchars($row['description']) . '</p>
                <a href="' . base_url() . 'service/' . htmlspecialchars($slug) . '" class="btn btn-primary stretched-link" style="background-color: #fdc411; border-color: #fdc411; color: #000;">View Details</a>
              </div>
            </div>
          </div>';
      }
      ?>
    </div>

    <!-- CTA Section -->
    <div class="rounded-3 p-5 mt-5 text-white" style="background-color: #fdc411;">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h3 class="h2 mb-3">Ready to experience premium home services?</h3>
          <p class="mb-0">Book your service today and get 15% off your first cleaning!</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
          <a href="contact.php" class="btn btn-dark btn-lg px-4" style="background: #000; color: #fff;">Book Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="py-5 bg-light" style="padding-top: 80px !important;">
  <div class="container">
    <div class="text-center mb-5">
      <span class="fw-bold" style="color: #fdc411;">CLIENT FEEDBACK</span>
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

<?php include 'temp/footer.php'; ?>

<style>
.services-hero {
  padding: 5rem 0;
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

.btn-outline-primary:hover {
  background-color: #fdc411;
  color: white !important;
}

.rating-card {
  transition: all 0.3s ease;
}

.rating-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(253, 196, 17, 0.2) !important;
}

.service-image-container {
  transition: all 0.3s ease;
}

.card:hover .service-image-container {
  transform: scale(1.05);
}

/* Added spacing for testimonials */
.testimonials-spacing {
  margin-top: 80px;
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