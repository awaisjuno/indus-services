<?php
    session_start();
    include 'config/config.php';
    include 'config/session.php';
    include 'temp/header.php';
    
    $order_code = $_GET['order'] ?? '';
    
    // Process form submission
    if (isset($_POST['submit'])) {
        // Capture values
        $full_name = mysqli_real_escape_string($con, $_POST['name']);
        $email     = mysqli_real_escape_string($con, $_POST['email']);
        $phone     = mysqli_real_escape_string($con, $_POST['phone']);
        $area      = mysqli_real_escape_string($con, $_POST['area']);
        $city      = mysqli_real_escape_string($con, $_POST['city']);
        $building  = mysqli_real_escape_string($con, $_POST['building']);
        $notes     = mysqli_real_escape_string($con, $_POST['notes'] ?? '');
    
        // Find order_id from order table using code
        $orderQuery = "SELECT order_id FROM `order` WHERE code = '$order_code' LIMIT 1";
        $orderRes   = mysqli_query($con, $orderQuery);
        $orderRow   = mysqli_fetch_assoc($orderRes);
    
        if ($orderRow) {
            $order_id = $orderRow['order_id']; // Fixed variable name
            
            // Insert into order_detail table
            $insert = "INSERT INTO order_detail 
                      (order_id, code, full_name, email, phone, area, city, `option`, note)
                      VALUES 
                      ('$order_id', '$order_code', '$full_name', '$email', '$phone', '$area', '$city', '1', '$building $notes')";
    
            if (mysqli_query($con, $insert)) {
                echo "<script>alert('Details submitted successfully.');</script>";
                echo "<script>window.open('". base_url() ."', '_self');</script>";
                exit();
            } else {
                $error_message = "Database Error: " . mysqli_error($con);
            }
        } else {
            $error_message = "Invalid Order Code.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information Form</title>
    <style>
        :root {
            --primary: #fdc411; /* Your brand color */
            --primary-light: #fff3d1;
            --primary-dark: #e6b800;
            --secondary: #3a0ca3;
            --dark: #14213d;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Base Styles */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f8f9fa;
            color: var(--dark);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        /* Layout */
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
            background: linear-gradient(135deg, #f5f7ff 0%, #f8f9fa 100%);
        }

        .form-wrapper {
            width: 100%;
            max-width: 900px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .form-illustration {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--white) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }

        .form-illustration::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(253, 196, 17, 0.1) 0%, transparent 70%);
            transform: rotate(30deg);
        }

        .illustration-img {
            width: 100%;
            max-width: 300px;
            margin-bottom: 2rem;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.1));
        }

        .illustration-content {
            text-align: center;
            z-index: 1;
        }

        .illustration-content h3 {
            color: var(--dark);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .illustration-content p {
            color: var(--gray);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .form-container {
            padding: 3rem;
        }

        /* Form Header */
        .form-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .form-header h2 {
            color: var(--dark);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }

        .form-header h2::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .form-header p {
            color: var(--gray);
            font-size: 1rem;
            margin-top: 1rem;
        }

        /* Form Elements */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-label {
            position: absolute;
            left: 1rem;
            top: 0.9rem;
            color: var(--gray);
            font-size: 1rem;
            transition: var(--transition);
            pointer-events: none;
            background: var(--white);
            padding: 0 0.5rem;
            border-radius: 4px;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid var(--light-gray);
            border-radius: var(--radius-sm);
            font-size: 1rem;
            font-family: inherit;
            transition: var(--transition);
            background-color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(253, 196, 17, 0.2);
            outline: none;
        }

        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            top: -0.6rem;
            left: 0.8rem;
            font-size: 0.8rem;
            color: var(--primary);
            background: var(--white);
            z-index: 10;
        }

        /* Select Dropdown */
        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: "⌄";
            position: absolute;
            right: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--gray);
            font-size: 1rem;
        }

        select.form-control {
            appearance: none;
            padding-right: 2.5rem;
        }

        /* Button */
        .btn-submit {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: var(--radius-sm);
            background: var(--primary);
            color: var(--dark);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Form Footer */
        .form-footer {
            text-align: center;
            margin-top: 2rem;
            color: var(--gray);
            font-size: 0.85rem;
        }

        .form-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        /* Validation */
        .error-message {
            color: #ef233c;
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: none;
        }

        .form-control.error {
            border-color: #ef233c;
        }

        .form-control.error + .form-label {
            color: #ef233c;
        }

        .alert {
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-error {
            background-color: #ffebee;
            color: #d32f2f;
            border-left: 4px solid #d32f2f;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-wrapper {
                grid-template-columns: 1fr;
            }
            
            .form-illustration {
                display: none;
            }
            
            .form-container {
                padding: 2rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .form-group.full-width {
                grid-column: span 1;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animated {
            animation: fadeIn 0.6s ease-out forwards;
        }

        /* Floating Labels for Select */
        select:focus + .form-label,
        select:not([value=""]):not([value="null"]) + .form-label {
            top: -0.6rem;
            left: 0.8rem;
            font-size: 0.8rem;
            color: var(--primary);
            background: var(--white);
            z-index: 10;
        }
    </style>
</head>
<body>
<div class="main-content">
    <div class="form-wrapper animated">
        <!-- Illustration Section -->
        <div class="form-illustration">
            <div class="illustration-content">
                <svg class="illustration-img" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#fdc411" d="M250 400c-82.8 0-150-67.2-150-150s67.2-150 150-150 150 67.2 150 150-67.2 150-150 150zm0-280c-71.6 0-130 58.4-130 130s58.4 130 130 130 130-58.4 130-130-58.4-130-130-130z"/>
                    <path fill="#fdc411" d="M250 340c-49.7 0-90-40.3-90-90s40.3-90 90-90 90 40.3 90 90-40.3 90-90 90zm0-160c-38.7 0-70 31.3-70 70s31.3 70 70 70 70-31.3 70-70-31.3-70-70-70z"/>
                    <circle cx="250" cy="250" r="30" fill="#fdc411"/>
                    <path fill="#3a0ca3" d="M250 120c-7.7 0-14-6.3-14-14V50c0-7.7 6.3-14 14-14s14 6.3 14 14v56c0 7.7-6.3 14-14 14z"/>
                    <path fill="#3a0ca3" d="M250 450c-7.7 0-14-6.3-14-14v-56c0-7.7 6.3-14 14-14s14 6.3 14 14v56c0 7.7-6.3 14-14 14z"/>
                    <path fill="#3a0ca3" d="M380 250c0-7.7 6.3-14 14-14h56c7.7 0 14 6.3 14 14s-6.3 14-14 14h-56c-7.7 0-14-6.3-14-14z"/>
                    <path fill="#3a0ca3" d="M120 250c0-7.7 6.3-14 14-14h56c7.7 0 14 6.3 14 14s-6.3 14-14 14h-56c-7.7 0-14-6.3-14-14z"/>
                    <path fill="#3a0ca3" d="M341.4 158.6c-5.5-5.5-5.5-14.3 0-19.8l39.6-39.6c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-39.6 39.6c-5.5 5.5-14.3 5.5-19.8 0z"/>
                    <path fill="#3a0ca3" d="M158.6 341.4c-5.5-5.5-5.5-14.3 0-19.8l39.6-39.6c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-39.6 39.6c-5.5 5.5-14.3 5.5-19.8 0z"/>
                    <path fill="#3a0ca3" d="M341.4 341.4c5.5-5.5 5.5-14.3 0-19.8l-39.6-39.6c-5.5-5.5-14.3-5.5-19.8 0s-5.5 14.3 0 19.8l39.6 39.6c5.5 5.5 14.3 5.5 19.8 0z"/>
                    <path fill="#3a0ca3" d="M158.6 158.6c5.5-5.5 5.5-14.3 0-19.8l-39.6-39.6c-5.5-5.5-14.3-5.5-19.8 0s-5.5 14.3 0 19.8l39.6 39.6c5.5 5.5 14.3 5.5 19.8 0z"/>
                </svg>
                <h3>Let's Get Started</h3>
                <p>Fill out the form and our team will get back to you within 24 hours with the best service options.</p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="form-container">
            <div class="form-header">
                <h2>Contact Information</h2>
                <p>Please fill in your details so we can serve you better</p>
            </div>
            
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-error">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" id="contactForm">
                <!-- Name and Email -->
                <div class="form-grid">
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control" placeholder=" " value="<?= $row['first_name']?>" required>
                        <label for="name" class="form-label">Full Name</label>
                        <div class="error-message" id="name-error">Please enter your full name</div>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder=" " required>
                        <label for="email" class="form-label">Email Address</label>
                        <div class="error-message" id="email-error">Please enter a valid email</div>
                    </div>
                </div>
                
                <!-- Phone and Area -->
                <div class="form-grid">
                    <div class="form-group">
                        <input type="tel" id="phone"  value="<?= $row['mobile']?>" name="phone" class="form-control" placeholder=" " required>
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="error-message" id="phone-error">Please enter a valid phone number</div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" id="area" name="area" class="form-control" placeholder=" " required>
                        <label for="area" class="form-label">Area/Street</label>
                        <div class="error-message" id="area-error">Please enter your area/street</div>
                    </div>
                </div>
                
                <!-- City and Building -->
                <div class="form-grid">
                    <div class="form-group">
                        <div class="select-wrapper">
                            <select id="city" name="city" class="form-control" required>
                                <option value="" selected disabled></option>
                                <?php 
                                    $sel = "SELECT * FROM city";
                                    $run = mysqli_query($con, $sel);
                                    while($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='". $row['city_id'] ."'>". $row['city_name'] ."</option>";
                                    }
                                ?>
                            </select>
                            <label for="city" class="form-label">City</label>
                        </div>
                        <div class="error-message" id="city-error">Please select your city</div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" id="building" name="building" class="form-control" placeholder=" " required>
                        <label for="building" class="form-label">Apartment/Building</label>
                        <div class="error-message" id="building-error">Please enter your building</div>
                    </div>
                </div>
                
                <!-- Additional Notes -->
                <div class="form-group full-width">
                    <textarea id="notes" name="notes" class="form-control" placeholder=" " rows="4"></textarea>
                    <label for="notes" class="form-label">Additional Notes (Optional)</label>
                </div>
                
                <button type="submit" name="submit" class="btn-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    Submit Information
                </button>
                
                <div class="form-footer">
                    <p>We respect your privacy. Your information will not be shared. <br>By submitting, you agree to our <a href="#">Terms of Service</a>.</p>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Enhanced Form Validation
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        let isValid = true;
        
        // Validate Name
        const name = document.getElementById('name');
        if (name.value.trim() === '') {
            document.getElementById('name-error').style.display = 'block';
            name.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('name-error').style.display = 'none';
            name.classList.remove('error');
        }
        
        // Validate Email
        const email = document.getElementById('email');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            document.getElementById('email-error').style.display = 'block';
            email.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('email-error').style.display = 'none';
            email.classList.remove('error');
        }
        
        // Validate Phone
        const phone = document.getElementById('phone');
        const phoneRegex = /^[\d\s-]{8,15}$/;
        if (!phoneRegex.test(phone.value)) {
            document.getElementById('phone-error').style.display = 'block';
            phone.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('phone-error').style.display = 'none';
            phone.classList.remove('error');
        }
        
        // Validate Area
        const area = document.getElementById('area');
        if (area.value.trim() === '') {
            document.getElementById('area-error').style.display = 'block';
            area.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('area-error').style.display = 'none';
            area.classList.remove('error');
        }
        
        // Validate City
        const city = document.getElementById('city');
        if (city.value === '' || city.value === null) {
            document.getElementById('city-error').style.display = 'block';
            city.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('city-error').style.display = 'none';
            city.classList.remove('error');
        }
        
        // Validate Building
        const building = document.getElementById('building');
        if (building.value.trim() === '') {
            document.getElementById('building-error').style.display = 'block';
            building.classList.add('error');
            isValid = false;
        } else {
            document.getElementById('building-error').style.display = 'none';
            building.classList.remove('error');
        }
        
        if (!isValid) {
            e.preventDefault();
            // Scroll to first error
            const firstError = document.querySelector('.error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });
    
    // Phone number formatting
    document.getElementById('phone').addEventListener('input', function(e) {
        let x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
    });
    
    // Initialize select labels
    document.querySelectorAll('select').forEach(select => {
        // Check if already has a value
        if (select.value) {
            const label = select.parentElement.querySelector('.form-label');
            label.style.top = '-0.6rem';
            label.style.left = '0.8rem';
            label.style.fontSize = '0.8rem';
            label.style.color = '#fdc411';
            label.style.background = '#ffffff';
            label.style.zIndex = '10';
        }
        
        // Add change event
        select.addEventListener('change', function() {
            if (this.value) {
                const label = this.parentElement.querySelector('.form-label');
                label.style.top = '-0.6rem';
                label.style.left = '0.8rem';
                label.style.fontSize = '0.8rem';
                label.style.color = '#fdc411';
                label.style.background = '#ffffff';
                label.style.zIndex = '10';
            }
        });
    });
</script>

<?php include 'temp/footer.php'; ?>