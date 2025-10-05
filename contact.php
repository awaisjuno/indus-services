<?php
session_start();
include 'config/config.php';
include 'config/load-header.php';
include 'temp/header.php';
?>

<style>
:root {
    --primary: #fdc411;
    --primary-dark: #e6b000;
    --dark: #1a1a1a;
    --dark-light: #2d2d2d;
    --light: #f8f9fa;
    --gray: #6c757d;
    --gray-light: #e9ecef;
    --white: #ffffff;
    --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    --shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.12);
    --transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    --border-radius: 16px;
}

/* Contact Section */
.contact-section {
    padding: 120px 0 100px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.contact-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Hero Section */
.contact-hero {
    text-align: center;
    margin-bottom: 80px;
    position: relative;
}

.contact-hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 20px;
    line-height: 1.2;
}

.contact-hero p {
    font-size: 1.3rem;
    color: var(--gray);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.hero-accent {
    position: absolute;
    width: 200px;
    height: 200px;
    background: linear-gradient(135deg, rgba(253, 196, 17, 0.1) 0%, rgba(253, 196, 17, 0.05) 100%);
    border-radius: 50%;
    top: -50px;
    right: 10%;
    z-index: 0;
}

/* Contact Grid Layout */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 80px;
    align-items: start;
}

/* Contact Information Side */
.contact-info-side {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

/* Contact Cards */
.contact-cards {
    display: grid;
    grid-template-columns: 1fr;
    gap: 25px;
}

.contact-card {
    background: var(--white);
    border-radius: var(--border-radius);
    padding: 35px 30px;
    box-shadow: var(--shadow);
    transition: var(--transition);
    border-left: 4px solid var(--primary);
    position: relative;
    overflow: hidden;
}

.contact-card:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(253, 196, 17, 0.03) 0%, transparent 100%);
    z-index: 0;
}

.contact-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-hover);
}

.contact-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--dark);
    font-size: 1.6rem;
    position: relative;
    z-index: 1;
    box-shadow: 0 8px 20px rgba(253, 196, 17, 0.3);
}

.contact-card h4 {
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 12px;
    color: var(--dark);
    position: relative;
    z-index: 1;
}

.contact-card p {
    color: var(--gray);
    margin: 0;
    position: relative;
    z-index: 1;
    line-height: 1.6;
    font-size: 1.05rem;
}

/* Map Section */
.map-section {
    margin-top: 40px;
}

.map-container {
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    height: 300px;
    position: relative;
    transition: var(--transition);
}

.map-container:hover {
    box-shadow: var(--shadow-hover);
    transform: translateY(-5px);
}

.map-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    padding: 20px;
    color: white;
    font-weight: 500;
}

/* Contact Form Side */
.contact-form-side {
    background: var(--white);
    border-radius: var(--border-radius);
    padding: 50px 45px;
    box-shadow: var(--shadow);
    position: relative;
    overflow: hidden;
}

.contact-form-side:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
}

.form-header {
    margin-bottom: 40px;
    text-align: center;
}

.form-header h3 {
    font-size: 2.2rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 15px;
}

.form-header p {
    color: var(--gray);
    font-size: 1.1rem;
    line-height: 1.6;
}

/* Enhanced Form Styles */
.form-group {
    margin-bottom: 28px;
    position: relative;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-control {
    width: 100%;
    padding: 18px 22px;
    border: 2px solid var(--gray-light);
    border-radius: 12px;
    font-size: 1.05rem;
    transition: var(--transition);
    background: var(--white);
    font-family: 'Inter', sans-serif;
    color: var(--dark);
}

.form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(253, 196, 17, 0.15);
    outline: none;
    transform: translateY(-2px);
}

textarea.form-control {
    resize: vertical;
    min-height: 180px;
    line-height: 1.6;
}

/* Floating Labels */
.floating-label {
    position: absolute;
    top: 18px;
    left: 22px;
    color: var(--gray);
    transition: var(--transition);
    pointer-events: none;
    background: var(--white);
    padding: 0 8px;
    font-size: 1.05rem;
}

.form-control:focus + .floating-label,
.form-control:not(:placeholder-shown) + .floating-label {
    top: -12px;
    font-size: 0.9rem;
    color: var(--primary);
    font-weight: 600;
    background: var(--white);
    padding: 0 10px;
}

/* Submit Button */
.submit-container {
    text-align: center;
    margin-top: 30px;
}

.send-msg {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: var(--dark);
    border: none;
    padding: 18px 45px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 12px;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 8px 25px rgba(253, 196, 17, 0.3);
    position: relative;
    overflow: hidden;
}

.send-msg:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: var(--transition);
}

.send-msg:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(253, 196, 17, 0.4);
}

.send-msg:hover:before {
    left: 100%;
}

/* Status Messages */
.form-status {
    margin: 25px 0;
}

.loading, .error-message, .sent-message {
    display: none;
    padding: 18px 24px;
    border-radius: 12px;
    text-align: center;
    font-weight: 500;
    font-size: 1.05rem;
}

.loading {
    background-color: var(--gray-light);
    color: var(--gray);
}

.error-message {
    background-color: #ffe6e6;
    color: #d63031;
    border-left: 4px solid #d63031;
}

.sent-message {
    background-color: #e8f5e9;
    color: #2e7d32;
    border-left: 4px solid #4caf50;
}

/* Success Alert */
.alert-success {
    background-color: #e8f5e9;
    color: #2e7d32;
    padding: 18px 24px;
    border-radius: 12px;
    margin-bottom: 25px;
    border-left: 4px solid #4caf50;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Floating Background Elements */
.floating-element {
    position: absolute;
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, rgba(253, 196, 17, 0.08) 0%, rgba(253, 196, 17, 0.03) 100%);
    border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    animation: float 25s infinite linear;
    z-index: 0;
}

.floating-element:nth-child(1) {
    top: 15%;
    left: 5%;
    animation-duration: 30s;
}

.floating-element:nth-child(2) {
    bottom: 20%;
    right: 8%;
    width: 80px;
    height: 80px;
    animation-duration: 35s;
    animation-direction: reverse;
}

@keyframes float {
    0% {
        transform: translate(0, 0) rotate(0deg);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    }
    25% {
        transform: translate(20px, 20px) rotate(90deg);
        border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%;
    }
    50% {
        transform: translate(0, 40px) rotate(180deg);
        border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%;
    }
    75% {
        transform: translate(-20px, 20px) rotate(270deg);
        border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%;
    }
    100% {
        transform: translate(0, 0) rotate(360deg);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .contact-grid {
        gap: 60px;
    }
    
    .contact-form-side {
        padding: 40px 35px;
    }
}

@media (max-width: 991px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 50px;
    }
    
    .contact-hero h1 {
        font-size: 3rem;
    }
    
    .contact-section {
        padding: 100px 0 80px;
    }
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    .contact-hero h1 {
        font-size: 2.5rem;
    }
    
    .contact-hero p {
        font-size: 1.1rem;
    }
    
    .contact-form-side {
        padding: 35px 25px;
    }
    
    .form-header h3 {
        font-size: 1.9rem;
    }
    
    .contact-card {
        padding: 30px 25px;
    }
}

@media (max-width: 576px) {
    .contact-hero h1 {
        font-size: 2.2rem;
    }
    
    .contact-section {
        padding: 80px 0 60px;
    }
    
    .contact-form-side {
        padding: 30px 20px;
    }
    
    .form-control {
        padding: 16px 20px;
    }
}
</style>

<!-- Floating Background Elements -->
<div class="floating-element"></div>
<div class="floating-element"></div>

<!-- Premium Contact Section -->
<section class="contact-section">
    <div class="contact-container">
        <!-- Hero Section -->
        <div class="contact-hero">
            <div class="hero-accent"></div>
            <h1>Get In Touch With Us</h1>
            <p>We're here to assist you with any inquiries or service requests. Reach out to our dedicated team for personalized support and expert solutions.</p>
        </div>

        <div class="contact-grid">
            <!-- Contact Information Side -->
            <div class="contact-info-side">
                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Our Location</h4>
                        <p>Abu Dhabi Island, Musaffah Industrial, Abu Dhabi, UAE</p>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email Us</h4>
                        <p>info@indusservices.ae</p>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Call Us</h4>
                        <p>02 558 4651</p>
                    </div>

                </div>
            </div>

            <!-- Contact Form Side -->
            <div class="contact-form-side">
                <div class="form-header">
                    <h3>Send Us a Message</h3>
                    <p>Fill out the form below and we'll get back to you within 24 hours</p>
                </div>
                
                <form method="POST" id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder=" " required>
                            <label for="name" class="floating-label">Your Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder=" " required>
                            <label for="email" class="floating-label">Your Email</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder=" " required>
                        <label for="subject" class="floating-label">Subject</label>
                    </div>
                    
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" rows="6" placeholder=" " required></textarea>
                        <label for="message" class="floating-label">Your Message</label>
                    </div>
                    
                    <div class="form-status">
                        <div class="loading">Sending your message...</div>
                        <div class="error-message">There was an error sending your message. Please try again.</div>
                        <div class="sent-message">Your message has been sent successfully. We'll get back to you soon!</div>
                    </div>
                    
                    <div class="submit-container">
                        <button name="submit" class="send-msg" type="submit">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </div>
                </form>
                
                <!-- PHP Success Message -->
                <?php if (isset($_POST['submit'])): ?>
                    <div class="alert-success">
                        <i class="fas fa-check-circle"></i> 
                        Your message has been sent successfully. Thank you!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const loading = document.querySelector('.loading');
    const errorMessage = document.querySelector('.error-message');
    const sentMessage = document.querySelector('.sent-message');
    
    // Floating label functionality
    const formInputs = document.querySelectorAll('.form-control');
    formInputs.forEach(input => {
        // Check on page load if inputs have values
        if (input.value !== '') {
            input.parentElement.classList.add('focused');
        }
        
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (this.value === '') {
                this.parentElement.classList.remove('focused');
            }
        });
    });
    
    // Form submission handling
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading
        loading.style.display = 'block';
        errorMessage.style.display = 'none';
        sentMessage.style.display = 'none';
        
        // Simulate form submission (replace with actual AJAX call)
        setTimeout(function() {
            loading.style.display = 'none';
            
            // For demo purposes, always show success
            // In real implementation, check response from server
            sentMessage.style.display = 'block';
            contactForm.reset();
            
            // Reset floating labels
            formInputs.forEach(input => {
                input.parentElement.classList.remove('focused');
            });
            
            // Scroll to success message
            sentMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 2000);
    });
});
</script>


<?php include 'temp/footer.php';?>