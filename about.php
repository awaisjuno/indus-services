<?php
session_start();
include 'config/config.php';
include 'config/load-header.php';
include 'temp/header.php';
?>

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="hero-content text-center">

                <h1 class="hero-title">ABOUT INDUS SERVICES</h1>
                <p class="hero-subtitle">Your trusted partner for all home service needs in Abu Dhabi</p>
            
        </div>
    </div>
</section>

<!-- Intro Section -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content">
            <div class="intro-text">
                <h2>We understand that no two spaces are the same</h2>
                <p>which is why we offer customized service solutions to reflect each client's unique needs and preferences. Our team of skilled professionals is dedicated to transforming your space into a functional and beautiful environment.</p>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Goal Section -->
<section class="vmgo-section">
    <div class="container">
        <div class="vmgo-grid">
            <div class="vmgo-card">
                <div class="vmgo-icon">
                    <i class="bi bi-eye"></i>
                </div>
                <h3>Our Vision</h3>
                <p>Our vision is to create home environments that not only reflect the unique personalities and aspirations of our clients but also enhance their daily living experience through thoughtful design and exceptional service.</p>
            </div>
            
            <div class="vmgo-card">
                <div class="vmgo-icon">
                    <i class="bi bi-bullseye"></i>
                </div>
                <h3>Our Mission</h3>
                <p>Through meticulous attention to detail and a passion for quality service, we aim to deliver home solutions that exceed expectations while maintaining the highest standards of professionalism and reliability.</p>
            </div>
            
            <div class="vmgo-card">
                <div class="vmgo-icon">
                    <i class="bi bi-flag"></i>
                </div>
                <h3>Our Goal</h3>
                <p>Our goal is to craft spaces that inspire creativity, foster connection, and promote well-being. We strive to build lasting relationships with our clients through trust, transparency, and exceptional results.</p>
            </div>
        </div>
    </div>
</section>

<!-- Crafting Spaces Section -->
<section class="crafting-section">
    <div class="container">
        <div class="crafting-content">
            <div class="crafting-text">
                <h2>Crafting Spaces That Inspire and Function</h2>
                <p>We believe that great design is a harmonious blend of inspiration and functionality. Our mission is to craft spaces that not only look beautiful but also serve your practical needs, enhancing your quality of life through thoughtful design solutions.</p>
            </div>
            <div class="crafting-image">
                <img src="https://images.unsplash.com/photo-1558002038-1055907df827?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Crafted Spaces">
            </div>
        </div>
    </div>
</section>

<!-- Services Highlights -->
<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Service Approach</h2>
            <p>Innovative solutions for your home service needs</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-house-door"></i>
                </div>
                <h3>Create Spaces That Inspire</h3>
                <p>Transform your living environment into a source of daily inspiration through our carefully curated service solutions.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-gear"></i>
                </div>
                <h3>Crafting Interiors That Enhance</h3>
                <p>Enhance the functionality and aesthetic appeal of your space with our expert interior service solutions.</p>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="bi bi-heart"></i>
                </div>
                <h3>Maximizing Comfort and Style</h3>
                <p>Find the perfect balance between comfort and contemporary style with our personalized approach to home services.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section">
    <div class="container">
        <div class="section-header">
            <h2>Why Choose Indus Services?</h2>
            <p>We go above and beyond to ensure your complete satisfaction</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-collection"></i>
                </div>
                <h3>Diverse Services</h3>
                <p>From plumbing and electrical work to home cleaning and renovations, we offer a wide array of services. Whatever your home needs, we have a professional ready to assist.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h3>Verified Professionals</h3>
                <p>We rigorously vet and verify all service providers to ensure they meet our high standards of quality, professionalism, and reliability. Your satisfaction and safety are our top priorities.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h3>Easy Booking</h3>
                <p>Our user-friendly platform allows you to browse services, compare quotes, and book professionals seamlessly. Say goodbye to the complexities of finding and scheduling home services.</p>
            </div>
            
        </div>
    </div>
</section>

<?php include 'temp/footer.php'; ?>

<style>
/* Variables */
:root {
    --primary: #2c3e50;
    --primary-light: #34495e;
    --accent: #e67e22;
    --accent-light: #f39c12;
    --light: #f8f9fa;
    --dark: #2c3e50;
    --text: #333333;
    --text-light: #6c757d;
    --white: #ffffff;
    --shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    --radius: 8px;
}



/* Hero Section */
.about-hero {
    padding: 100px 0 80px;
    background: var(--light);
}


.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 1.5rem;
    line-height: 1.1;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: var(--text-light);
    margin-bottom: 2.5rem;
    line-height: 1.6;
}

.hero-cta {
    display: flex;
    gap: 1rem;
}

.hero-image {
    position: relative;
}

.image-container {
    position: relative;
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
}

.image-container img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    display: block;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(44, 62, 80, 0.3), rgba(230, 126, 34, 0.2));
}

/* Intro Section */
.intro-section {
    padding: 80px 0;
    background: var(--white);
}

.intro-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

.intro-text h2 {
    font-size: 2.5rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.intro-text p {
    font-size: 1.125rem;
    color: var(--text-light);
    line-height: 1.7;
}

/* Vision Mission Goal Section */
.vmgo-section {
    padding: 80px 0;
    background: var(--light);
}

.vmgo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
}

.vmgo-card {
    background: var(--white);
    padding: 3rem 2rem;
    border-radius: var(--radius);
    text-align: center;
    box-shadow: var(--shadow);
    transition: transform 0.3s ease;
}

.vmgo-card:hover {
    transform: translateY(-5px);
}

.vmgo-icon {
    width: 80px;
    height: 80px;
    background: var(--accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.vmgo-icon i {
    font-size: 2rem;
    color: var(--white);
}

.vmgo-card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--dark);
}

.vmgo-card p {
    color: var(--text-light);
    line-height: 1.6;
}

/* Crafting Section */
.crafting-section {
    padding: 100px 0;
    background: var(--white);
}

.crafting-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.crafting-text h2 {
    font-size: 2.5rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.crafting-text p {
    font-size: 1.125rem;
    color: var(--text-light);
    line-height: 1.7;
}

.crafting-image img {
    width: 100%;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
}

/* Services Section */
.services-section {
    padding: 80px 0;
    background: var(--light);
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-header h2 {
    font-size: 2.5rem;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 1rem;
}

.section-header p {
    font-size: 1.125rem;
    color: var(--text-light);
    max-width: 600px;
    margin: 0 auto;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.service-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: var(--radius);
    text-align: center;
    box-shadow: var(--shadow);
    transition: transform 0.3s ease;
}

.service-card:hover {
    transform: translateY(-5px);
}

.service-icon {
    width: 70px;
    height: 70px;
    background: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.service-icon i {
    font-size: 1.75rem;
    color: var(--white);
}

.service-card h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--dark);
}

.service-card p {
    color: var(--text-light);
    line-height: 1.6;
}

/* Why Choose Us Section */
.why-choose-section {
    padding: 100px 0;
    background: var(--white);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.feature-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: var(--radius);
    text-align: center;
    box-shadow: var(--shadow);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: var(--accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.feature-icon i {
    font-size: 1.75rem;
    color: var(--white);
}

.feature-card h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--dark);
}

.feature-card p {
    color: var(--text-light);
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    padding: 80px 0;
    background: var(--primary);
    color: var(--white);
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.cta-content p {
    font-size: 1.125rem;
    margin-bottom: 2.5rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Buttons */
.btn {
    display: inline-block;
    padding: 0.875rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    cursor: pointer;
}

.btn-primary {
    background: var(--accent);
    color: var(--white);
}

.btn-primary:hover {
    background: var(--accent-light);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.btn-outline {
    background: transparent;
    color: var(--white);
    border-color: var(--white);
}

.btn-outline:hover {
    background: var(--white);
    color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hero-title {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .hero-content,
    .crafting-content {
        grid-template-columns: 1fr;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-cta,
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 100%;
        max-width: 250px;
        text-align: center;
    }
    
    .intro-text h2,
    .section-header h2,
    .crafting-text h2,
    .cta-content h2 {
        font-size: 2rem;
    }
    
    .vmgo-grid,
    .services-grid,
    .features-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .about-hero {
        padding: 80px 0 60px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .vmgo-card,
    .service-card,
    .feature-card {
        padding: 2rem 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.vmgo-card, .service-card, .feature-card');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // Initialize AOS animations if available
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    }
});
</script>