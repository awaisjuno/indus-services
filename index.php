<?php 
    include 'config/config.php';
    include 'temp/header.php';
?>

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="container">
        <h1>Premium Home & Maintenance Solutions</h1>
        <p>Reliable, professional, and affordable services for your home and business.</p>
        <a href="#contact" class="btn">Get a Free Quote</a>
    </div>
</section>

<!-- Popular Services Section -->
<section class="popular-services">
    <div class="container">
        <h2>Our Most Popular Services in Abu Dhabi</h2>
        <div class="services-row">
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3>Professional Cleaning Services Abu Dhabi</h3>
                <p>Top-rated cleaning solutions for homes and offices across the UAE capital.</p>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-hammer"></i>
                </div>
                <h3>Handyman Services</h3>
                <p>Skilled professionals for all your home repair and installation needs.</p>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Maintenance Services</h3>
                <p>Comprehensive property upkeep from AC to electrical systems.</p>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <i class="fas fa-truck-moving"></i>
                </div>
                <h3>House Moving And Relocation</h3>
                <p>Stress-free relocation services with careful handling of your belongings.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us">
    <div class="container">
        <h2>Why Choose Us?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-star"></i>
                <h3>5-Star Rated</h3>
                <p>Consistently top-rated service provider in Abu Dhabi</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-users"></i>
                <h3>Trusted Professionals</h3>
                <p>Background-checked, experienced technicians</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Quality Guarantee</h3>
                <p>We stand behind our work with satisfaction guarantee</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-clock"></i>
                <h3>24/7 Availability</h3>
                <p>Emergency services available round the clock</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-it-works">
    <div class="container">
        <h2>How It Works?</h2>
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Request Service</h3>
                <p>Contact us via phone, website or app</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Get a Quote</h3>
                <p>Receive transparent pricing upfront</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Schedule Appointment</h3>
                <p>Choose a convenient time slot</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3>Enjoy Quality Service</h3>
                <p>Our experts deliver exceptional results</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services" id="services">
    <div class="container">
        <h2>Our Comprehensive Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <i class="fas fa-broom"></i>
                <h3>Cleaning & Pest Control</h3>
                <p>From deep cleaning to pest removal, we keep your space spotless.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-home"></i>
                <h3>Home Upgrade</h3>
                <p>Carpentry, plumbing, electrical, and more for a better home.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-tools"></i>
                <h3>Maintenance</h3>
                <p>AC, appliances, remodeling, and garden care.</p>
            </div>
            <div class="service-card">
                <i class="fas fa-truck-moving"></i>
                <h3>Moving & Storage</h3>
                <p>Stress-free moving, storage, and junk removal.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Us -->
<section class="about" id="about">
    <div class="container">
        <h2>About Indus Services</h2>
        <p>We are a trusted provider of home maintenance and improvement services, delivering quality work with professionalism and care. Our team of experts ensures your home is in the best hands.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact" id="contact">
    <div class="container">
        <h2>Contact Us</h2>
        <form id="contact-form">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <input type="tel" placeholder="Phone Number">
            <select required>
                <option value="" disabled selected>Select a Service</option>
                <optgroup label="Cleaning & Pest Control">
                    <option>Pest Control</option>
                    <option>Maid Service</option>
                    <option>Deep Cleaning</option>
                </optgroup>
                <optgroup label="Home Upgrade">
                    <option>Carpentry</option>
                    <option>Plumbing</option>
                </optgroup>
            </select>
            <textarea placeholder="Your Message"></textarea>
            <button type="submit" class="btn">Send Request</button>
        </form>
    </div>
</section>

<?php include 'temp/footer.php';?>