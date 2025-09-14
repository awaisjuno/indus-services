<?php
    session_start();
    include 'config/config.php';
    include 'temp/header.php';
?>

<!-- Blog Section -->
<section id="blogs" class="popular-blogs section">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Latest Blogs</h2>
      <p>Insights, tips & updates from our experts</p>
    </div>

    <div class="services-grid">
      <?php 
      if(isset($con) && $con) {
          $sel = "SELECT * FROM blog WHERE is_active = '1' AND is_delete = '0' ORDER BY published_date DESC LIMIT 3";
          $run = mysqli_query($con, $sel);
          
          if(mysqli_num_rows($run) > 0) {
              while($row = mysqli_fetch_assoc($run)) {
                  
                  // Slug for URL
                  $slug = strtolower($row['category']);
                  $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
                  $slug = trim($slug, '-');

                  // Image path
                  $image_path = !empty($row['blog_img']) ? base_url().'assets/blog/'.$row['blog_img'] : base_url().'assets/blog/default.jpg';

                  echo '
                  <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img-container">
                      <img src="'.$image_path.'" alt="Blog Image" class="service-img">
                      <div class="service-badge">'.htmlspecialchars($row['category']).'</div>
                    </div>
                    <div class="service-content">
                      <h3>'.substr(strip_tags($row['blog_content']), 0, 60).'...</h3>
                      <p><small>'.date("F d, Y", strtotime($row['published_date'])).'</small></p>
                      <a href="blog.php?id='.$row['blog_id'].'" class="btn">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>';
              }
          } else {
              echo '<div class="col-12 text-center"><p>No blogs found.</p></div>';
          }
      } else {
          echo '<div class="col-12 text-center"><p>Database connection error. Please try again later.</p></div>';
      }
      ?>
    </div>
  </div>
</section>

