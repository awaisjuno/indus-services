<?php 
    session_start();
    include 'config/config.php';
    include 'config/load-header.php';
    include 'temp/header.php';
?>

<style>
        .privacy-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            padding: 100px 0;
            color: white;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 2rem;
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
        }
        
        .privacy-nav {
            position: sticky;
            top: 100px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .privacy-nav .nav-link {
            color: var(--dark-color);
            padding: 0.5rem 0;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }
        
        .privacy-nav .nav-link:hover, .privacy-nav .nav-link.active {
            color: var(--primary-color);
            border-left-color: var(--primary-color);
            padding-left: 10px;
        }
        
        .privacy-content {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            padding: 2rem;
        }
        
        .policy-card {
            border-left: 4px solid var(--primary-color);
            background-color: rgba(252, 189, 27, 0.05);
            border-radius: 0 8px 8px 0;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .policy-card:hover {
            transform: translateY(-3px);
        }
        
        .policy-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .highlight-box {
            background-color: rgba(252, 189, 27, 0.1);
            border-left: 4px solid var(--primary-color);
            padding: 1.5rem;
            margin: 2rem 0;
            border-radius: 0 8px 8px 0;
        }
        
        .data-list {
            list-style-type: none;
            padding-left: 0;
        }
        
        .data-list li {
            padding: 0.5rem 0;
            position: relative;
            padding-left: 1.5rem;
        }
        
        .data-list li:before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--primary-color);
        }
        
        .contact-info {
            background-color: var(--light-color);
            padding: 2rem;
            border-radius: 8px;
            text-align: center;
            margin-top: 2rem;
        }
        
        .contact-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        .contact-link:hover {
            text-decoration: underline;
        }
        
        .breadcrumb {
            background-color: transparent;
            padding: 1rem 0;
        }
        
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .breadcrumb-item.active {
            color: var(--gray-color);
        }
        
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .back-to-top:hover {
            background-color: var(--dark-color);
            color: white;
            transform: translateY(-3px);
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .data-icon {
            background-color: var(--primary-color);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: white;
            font-size: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .privacy-hero {
                padding: 60px 0;
            }
            
            .privacy-nav {
                position: static;
                margin-bottom: 1rem;
            }
        }
</style>


    <!-- Hero Section -->
    <section class="privacy-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold text-white mb-4">PRIVACY POLICY</h1>
                    <p class="lead text-white mb-0">Your privacy and data security are our top priorities</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Navigation Sidebar -->
                <div class="col-lg-3 mb-4">
                    <div class="privacy-nav">
                        <h5 class="mb-3">Quick Navigation</h5>
                        <nav class="nav flex-column">
                            <a class="nav-link active" href="#introduction">Introduction</a>
                            <a class="nav-link" href="#policy-applies">How Policy Applies</a>
                            <a class="nav-link" href="#personal-data">Personal Data</a>
                            <a class="nav-link" href="#data-collection">Data Collection</a>
                            <a class="nav-link" href="#data-usage">Data Usage</a>
                            <a class="nav-link" href="#cookies">Cookies</a>
                            <a class="nav-link" href="#data-disclosure">Data Disclosure</a>
                            <a class="nav-link" href="#your-rights">Your Rights</a>
                            <a class="nav-link" href="#data-removal">Data Removal</a>
                            <a class="nav-link" href="#data-transfer">Data Transfer</a>
                            <a class="nav-link" href="#data-security">Data Security</a>
                            <a class="nav-link" href="#data-retention">Data Retention</a>
                            <a class="nav-link" href="#business-transitions">Business Transitions</a>
                            <a class="nav-link" href="#user-content">User Content</a>
                            <a class="nav-link" href="#policy-updates">Policy Updates</a>
                        </nav>
                    </div>
                </div>
                
                <!-- Privacy Content -->
                <div class="col-lg-9">
                    <div class="privacy-content">
                        <!-- Introduction Section -->
                        <div id="introduction" class="mb-5">
                            <h2 class="section-title">Welcome to Indus Services Privacy Policy</h2>
                            <p>Indus Services, sometimes known as "we" or "us," is in the business of offering home services as well as virtual services that connect clients with experts. This policy outlines our relationship concerning the collection, storage, use, and disclosure of personally identifiable information that has been shared with us.</p>
                            
                            <div class="policy-card">
                                <p>If you're accessing or using our website <a href="https://Indusservices.ae/" class="contact-link">https://Indusservices.ae/</a> or our platform to get your homework done or opting for services that Indus Services offers you on or through our website. This policy simplifies professionals for home work and on-demand services as known as Experts.</p>
                            </div>
                            
                            <p>We as Indus Services, commit to protecting your personal information securely with this privacy policy validation. Your data is collected and it is kept for further services. Kindly note that we won't share any of your details with any third party. This policy is to explain how we use your data and its process.</p>
                            
                            <p>Kindly understand that the word Terms has the same meaning that relates to our Terms and Conditions. Please go through this policy that is true to the Terms.</p>
                            
                            <div class="highlight-box">
                                <h5><i class="fas fa-shield-alt me-2"></i>Your Privacy Matters</h5>
                                <p class="mb-0">By using our services, you directly assure that you have read and agreed to this policy and the continuing process. Refer to Section 1 to understand the terms of how this Policy applies to you.</p>
                            </div>
                        </div>

                        <!-- How Policy Applies Section -->
                        <div id="policy-applies" class="mb-5">
                            <h2 class="section-title">How This Policy Applies to You</h2>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">1</span> Policy Application</h5>
                                <p>(a) This Policy applies to individuals who have access to or avail of any of our Services. "You" is referred to the end-user or the individual who is using our platform. As said before, by using our platform, you are agreeing to gather, store, and use your personal information as we collect it.</p>
                            </div>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">2</span> Policy Updates</h5>
                                <p>(b) We reserve the Privacy Policy and refine it constantly. We also request you review it as well. It is also important that we have access to your accurate and current personal data. Please update your personal data changes during our service period.</p>
                            </div>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">3</span> Third-Party Services</h5>
                                <p>(c) Our platform might tend to add third-party links or websites, plugins, or any other services in the upcoming days as the name of "Third-Party Services" By clicking and enabling those links you agree to share your personal data with that third party to use it. We are neither responsible nor control these Third party services and we are also not responsible for their privacy policy. While using third-party links or websites we recommend you read their privacy policy.</p>
                            </div>
                        </div>

                        <!-- Personal Data Section -->
                        <div id="personal-data" class="mb-5">
                            <h2 class="section-title">Personal Data Required to Access Our Services</h2>
                            
                            <div class="policy-card">
                                <div class="data-icon">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <h5>Types of Personal Data We Collect</h5>
                                <p>(a) The different personal data that we collect include:</p>
                                <ul class="data-list">
                                    <li><strong>Contact information:</strong> your email address or home address, location and mobile numbers.</li>
                                    <li><strong>Your profile:</strong> Information like your name, username or similar identifiers, photographs and gender.</li>
                                    <li><strong>Marketing data:</strong> your address, email address, feedback, and comments. We also have a record of your chat and call records that communicate with our professionals through the platform.</li>
                                    <li><strong>Technical data:</strong> Includes your IP address, browser type, internet service provider, your operating system details, access time, pages viewed, your device ID & type, how often you visit our site, service usage, clicks, date and location.</li>
                                    <li><strong>Transaction data:</strong> Details of our home service and expert service, you can avail of a limited portion of credit and debit card details for tracking and saving the card for future payments.</li>
                                    <li><strong>Data usage:</strong> Other information includes how you use our services, your activity, details listing, booking history, your taps & clicks and other technical data.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">2</span> Aggregated Data</h5>
                                <p>(b) We also collect, use and disclose your personal information that is shared with us like statistical or demographic information. The aggregated data can be derived from your personal data under the law. According to our policy, we treat the combined data as personal data which can be used as one.</p>
                            </div>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">3</span> Consequences of Not Providing Data</h5>
                                <p>(c) What if you are not providing any personal data? We collect personal data by law and under terms and if you fail to provide your personal data, then you may not be able to continue with the contract. If you're not ready to share your personal data then we may cancel or limit your access to the services.</p>
                            </div>
                        </div>

                        <!-- Data Collection Section -->
                        <div id="data-collection" class="mb-5">
                            <h2 class="section-title">How We Collect Your Personal Data</h2>
                            
                            <div class="policy-card">
                                <div class="data-icon">
                                    <i class="fas fa-database"></i>
                                </div>
                                <h5>Data Collection Methods</h5>
                                <p>We follow certain ways to collect your personal data from you including:</p>
                                <p>(a) With direct personal interaction with you and collect the personal data. The details you need to provide us with are:</p>
                                <ul class="data-list">
                                    <li>Provide your personal data by creating an account or valid profile on our platform.</li>
                                    <li>Get benefited from any of our services.</li>
                                    <li>Participate in polls or online surveys and enter the promotion.</li>
                                    <li>Active marketing communications by commenting, linking and marketing the services.</li>
                                    <li>Address the problem that you face on our platform, and our services also provide us with feedback to improvise it.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Data Usage Section -->
                        <div id="data-usage" class="mb-5">
                            <h2 class="section-title">How We Use Your Personal Data</h2>
                            
                            <div class="policy-card">
                                <div class="data-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <h5>Purposes of Data Usage</h5>
                                <p>(a) Personal data can be used only if the law permits us to do so. Your personal data is provided only with professional services. The times when we use professional data are:</p>
                                <ul class="data-list">
                                    <li>It is necessary to verify your identity with registration as a user. It creates an account on the specified platform.</li>
                                    <li>Provide you with Services</li>
                                    <li>To provide you with professional services</li>
                                    <li>Monitor trends and personalize your experience</li>
                                    <li>Use the information and feedback we receive from you to improve the functionality of our Services</li>
                                    <li>Improving customer service to effectively respond to your service requests</li>
                                    <li>Processing payments and tracking transactions</li>
                                    <li>We will notify you periodically about changes to our services, send you information and updates regarding the services you have availed of, and send you occasional company news and updates related to us or the services, to manage our relationship with you.</li>
                                    <li>To assist with the facilitation of the Professional services offered to you, including sending you information and updates about the Professional services you have availed of.</li>
                                    <li>Marketing and advertising for the services.</li>
                                    <li>Meeting legal requirements.</li>
                                </ul>
                            </div>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">2</span> Communications</h5>
                                <p>(b) By using our Services and opening an account on the Platform, you accept and understand that you are giving us, our service providers, associate partners, and affiliates permission to contact you by phone, email, or other means. You require this information so that we would provide you with the Services, make sure you are aware of all the features of the Services, and for other connected needs.</p>
                            </div>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">3</span> Information Sharing</h5>
                                <p>(c) You agree and acknowledge that we may gather, compile, and share any information about you to provide the Services to you, whether or not you directly transmit it to us (via the Services or otherwise), including but not limited to personal correspondence like emails, instructions from you, etc. This may comprise, but is not limited to, service providers who offer or seek to offer you professional services, as well as merchants, social media platforms, third-party service providers, storage facilities, data analytics businesses, consultants, attorneys, and auditors. In conjunction with the aforementioned goals, we might potentially disclose this information to other organizations in the Indus Services.</p>
                            </div>
                            
                            <div class="policy-card">
                                <h5><span class="policy-number">4</span> Legal Disclosures</h5>
                                <p>(d) You accept and agree that we may share data without your permission when obliged to do so by law or by any governmental body or authority. The disclosures are given in good faith and are thought to be required for this Policy's or the Terms' enforcement. Furthermore, such disclosures are made to abide by all rules and regulations that may be in force.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- Footer Section (Copied from your existing code) -->
    <?php include 'temp/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    // Update active nav link
                    document.querySelectorAll('.privacy-nav .nav-link').forEach(link => {
                        link.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });
        
        // Update active nav link on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('.privacy-content > div');
            const navLinks = document.querySelectorAll('.privacy-nav .nav-link');
            
            let currentSection = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 150;
                if(window.scrollY >= sectionTop) {
                    currentSection = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if(link.getAttribute('href') === `#${currentSection}`) {
                    link.classList.add('active');
                }
            });
        });
        
        // Back to top button visibility
        window.addEventListener('scroll', function() {
            const backToTopButton = document.querySelector('.back-to-top');
            if(window.scrollY > 300) {
                backToTopButton.style.display = 'flex';
            } else {
                backToTopButton.style.display = 'none';
            }
        });
    </script>