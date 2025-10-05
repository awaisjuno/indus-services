<?php
    
    session_start();
    include 'config/config.php';
    include 'temp/header.php';
    
    //$service_type = $_GET['type'] ?? null;
    $category = $_GET['category'] ?? null;
    
    $category = ucwords(str_replace('-', ' ', $category));
    //$category = "Maintenance";

    $sel = "SELECT * FROM sub_category WHERE sub_category='$category'";
    
    $run = mysqli_query($con, $sel);

    $row = mysqli_fetch_assoc($run); 

    $service_id = $row['sub_id'];

    //Fetch Inputs
    $inputs = "SELECT * FROM category_attribute WHERE category_id=$service_id";
    $run_input = mysqli_query($con, $inputs);

    
?>


<style>
    :root {
        --primary: #fdc411; /* Your theme color */
        --primary-light: #fff3d1;
        --primary-dark: #e6b800;
        --secondary: #3f37c9;
        --accent: #f72585;
        --dark: #1a1a2e;
        --light: #f8f9fa;
        --gray: #6c757d;
        --success: #4cc9f0;
        --warning: #f8961e;
        --danger: #ef233c;
        --white: #ffffff;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --radius: 12px;
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        background-color: #fefefe;
        color: var(--dark);
        line-height: 1.6;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    h1, h2, h3 {
        font-weight: 700;
        margin-top: 0;
        line-height: 1.2;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
        color: var(--dark);
    }

    h2 {
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }

    h3 {
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }

    .service-description {
        color: var(--gray);
        margin-bottom: 2rem;
        font-size: 1.1rem;
        max-width: 600px;
    }

    /* Card Styles */
    .card {
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 2rem;
        margin-bottom: 1.5rem;
        transition: var(--transition);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 1.75rem;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--dark);
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        font-family: inherit;
        transition: var(--transition);
        background-color: var(--white);
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(253, 196, 17, 0.2);
        outline: none;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
        line-height: 1.5;
    }

    /* Select Dropdown */
    .select-wrapper {
        position: relative;
    }

    .select-wrapper::after {
        content: "⌄";
        position: absolute;
        top: 50%;
        right: 1rem;
        transform: translateY(-50%);
        pointer-events: none;
        color: var(--gray);
        font-size: 1.2rem;
    }

    select.form-control {
        appearance: none;
        padding-right: 2.5rem;
    }

    /* Checkbox and Radio Styles */
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 0.5rem 0;
    }

    .checkbox-group input[type="checkbox"],
    .checkbox-group input[type="radio"] {
        width: 20px;
        height: 20px;
        margin: 0;
        accent-color: var(--primary);
    }

    .checkbox-group label {
        margin-bottom: 0;
        font-weight: 500;
        cursor: pointer;
        user-select: none;
    }

    /* Button Styles */
    .btn {
        background: var(--primary);
        color: var(--dark);
        border: none;
        padding: 1rem 2rem;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        box-shadow: 0 2px 5px rgba(253, 196, 17, 0.3);
    }

    .btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(253, 196, 17, 0.4);
    }

    .btn:active {
        transform: translateY(0);
    }

    /* Layout Styles */
    .booking-container {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 2rem;
        margin-top: 2rem;
    }

    .price-sidebar {
        position: sticky;
        top: 2rem;
        align-self: start;
    }

    /* Price Card */
    .price-card {
        background: var(--primary);
        color: var(--dark);
        border-radius: var(--radius);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        text-align: center;
        box-shadow: 0 4px 10px rgba(253, 196, 17, 0.2);
    }

    .price-value {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0.5rem 0;
    }

    .price-per {
        opacity: 0.9;
        font-size: 1rem;
        font-weight: 500;
    }

    .price-details {
        background: var(--white);
        border-radius: var(--radius);
        padding: 1.5rem;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .price-line {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.75rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #f1f3f9;
    }

    .price-line:last-child {
        border-bottom: none;
    }

    .total-price {
        display: flex;
        justify-content: space-between;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 2px solid #f1f3f9;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .notice {
        margin-top: 1.5rem;
        padding: 1rem;
        background-color: var(--primary-light);
        border-radius: 8px;
        font-size: 0.9rem;
        color: var(--dark);
        border-left: 4px solid var(--primary);
    }

    /* Date and Time Picker */
    .datetime-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .booking-container {
            grid-template-columns: 1fr;
        }
        
        .price-sidebar {
            position: static;
        }
    }

    @media (max-width: 576px) {
        .datetime-group {
            grid-template-columns: 1fr;
        }
        
        h1 {
            font-size: 2rem;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animated {
        animation: fadeIn 0.4s ease-out forwards;
    }

    /* Theme Accents */
    .theme-accent {
        color: var(--primary);
    }




:root {
    --theme-primary: #fdc411;
    --theme-primary-dark: #e6b00f;
    --theme-primary-light: #fde8a1;
    --theme-text: #2c3e50;
    --theme-text-light: #6c757d;
    --theme-bg: #f8f9fa;
    --theme-border: #e9ecef;
}

.service-selection-container {
    background: var(--theme-bg);
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    margin: 1.5rem 0;
}

.form-section {
    padding: 1rem 0;
    border-bottom: 1px solid var(--theme-border);
}

.form-section:last-child {
    border-bottom: none;
}

.selection-title {
    color: var(--theme-text);
    font-weight: 700;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

/* Service Option Groups - 3 options per row */
.service-option-group {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.75rem;
}

.service-option {
    width: 100%;
}

.service-option input[type="checkbox"],
.service-option input[type="radio"] {
    display: none;
}

.service-option label {
    display: block;
    padding: 0.75rem 0.5rem;
    background: white;
    border: 2px solid var(--theme-border);
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
    color: var(--theme-text);
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    min-height: 50px;
}

.service-option label:hover {
    border-color: var(--theme-primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(253, 196, 17, 0.1);
}

.service-option input[type="checkbox"]:checked + label,
.service-option input[type="radio"]:checked + label {
    background: var(--theme-primary);
    color: var(--theme-text);
    border-color: var(--theme-primary);
    box-shadow: 0 4px 8px rgba(253, 196, 17, 0.2);
}

.yes-option input[type="radio"]:checked + label {
    background: #28a745;
    color: white;
    border-color: #28a745;
}

.no-option input[type="radio"]:checked + label {
    background: #dc3545;
    color: white;
    border-color: #dc3545;
}

/* Compact Form Controls */
.form-group-custom {
    margin-bottom: 0.75rem;
}

.form-control-custom, .form-select-custom {
    width: 100%;
    padding: 0.6rem 0.8rem;
    font-size: 0.9rem;
    border-radius: 8px;
    border: 2px solid var(--theme-border);
    background: white;
    transition: all 0.3s ease;
    color: var(--theme-text);
    height: 45px;
}

.form-control-custom:focus, .form-select-custom:focus {
    outline: none;
    border-color: var(--theme-primary);
    box-shadow: 0 0 0 0.2rem rgba(253, 196, 17, 0.25);
}

.textarea-custom {
    resize: vertical;
    min-height: 80px;
    height: auto;
}

.file-input {
    padding: 0.5rem 0.8rem;
    height: auto;
}

.file-input::file-selector-button {
    background: var(--theme-primary);
    color: var(--theme-text);
    border: none;
    padding: 0.4rem 0.8rem;
    border-radius: 5px;
    margin-right: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.85rem;
}

.file-input::file-selector-button:hover {
    background: var(--theme-primary-dark);
}

/* Date and Time Inputs */
input[type="date"].form-control-custom,
input[type="time"].form-control-custom {
    padding: 0.5rem 0.8rem;
}

/* Responsive Design */
@media (max-width: 992px) {
    .service-option-group {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .service-option-group {
        grid-template-columns: 1fr;
    }
    
    .service-selection-container {
        padding: 1rem;
    }
    
    .form-control-custom, .form-select-custom {
        padding: 0.6rem 0.8rem;
        font-size: 0.9rem;
    }
    
    .selection-title {
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .service-selection-container {
        padding: 0.75rem;
        margin: 1rem 0;
    }
    
    .form-section {
        padding: 0.75rem 0;
    }
    
    .service-option label {
        padding: 0.6rem 0.4rem;
        font-size: 0.85rem;
        min-height: 45px;
    }
}

/* Single Selection Styles */
.single-selection .service-option-group {
    grid-template-columns: repeat(3, 1fr);
}

.single-selection .service-option input[type="radio"]:checked + label {
    background: var(--theme-primary);
    color: var(--theme-text);
    border-color: var(--theme-primary);
    box-shadow: 0 4px 8px rgba(253, 196, 17, 0.2);
}

/* Required field indicator */
.required-field::after {
    content: " *";
    color: #dc3545;
}
</style>

<script>
    // Add visual feedback when options are selected
document.addEventListener('DOMContentLoaded', function() {
    const serviceOptions = document.querySelectorAll('.service-option input');
    
    serviceOptions.forEach(input => {
        // Set initial state
        if (input.checked) {
            input.parentElement.classList.add('selected');
        }
        
        // Add change event listener
        input.addEventListener('change', function() {
            // For checkboxes
            if (this.type === 'checkbox') {
                if (this.checked) {
                    this.parentElement.classList.add('selected');
                } else {
                    this.parentElement.classList.remove('selected');
                }
            }
            
            // For radio buttons
            if (this.type === 'radio') {
                // Remove selected class from all options in the same group
                const groupName = this.name;
                document.querySelectorAll(`input[name="${groupName}"]`).forEach(radio => {
                    radio.parentElement.classList.remove('selected');
                });
                
                // Add selected class to the checked option
                if (this.checked) {
                    this.parentElement.classList.add('selected');
                }
            }
        });
    });
    
    // Add focus effects for form controls
    const formControls = document.querySelectorAll('.form-control-custom, .form-select-custom');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        control.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>

<div class="container animated">
    <h1>Book Your <span class="theme-accent">Service</span></h1>
    <p class="service-description">Schedule professional services at your convenience with our easy booking system.</p>
    
    <div class="booking-container">
        <div class="card">
            <h2>Service Details</h2>
            
            <form method="POST">
            
                <!-- Service-specific dynamic inputs -->
                <div class="service-selection-container">
                    <?php 
                    // Reset the pointer to loop through inputs again
                    mysqli_data_seek($run_input, 0);
                    while ($input = mysqli_fetch_assoc($run_input)) { ?>
                        <div class="form-section mb-4">
                            <h3 class="selection-title"><?= htmlspecialchars($input['attribute_name']) ?></h3>

                            <?php if ($input['input_type'] == 'text') { ?>
                                <div class="form-group-custom">
                                    <input type="text" name="attr_<?= $input['id'] ?>" class="form-control-custom" placeholder="Enter <?= htmlspecialchars($input['attribute_name']) ?>">
                                </div>

                            <?php } elseif ($input['input_type'] == 'textarea') { ?>
                                <div class="form-group-custom">
                                    <textarea name="attr_<?= $input['id'] ?>" class="form-control-custom textarea-custom" rows="4" placeholder="Describe <?= htmlspecialchars($input['attribute_name']) ?>"></textarea>
                                </div>

                            <?php } elseif ($input['input_type'] == 'select') { 
                                $options = explode(',', $input['options']); ?>
                                <div class="form-group-custom">
                                    <select name="attr_<?= $input['id'] ?>" class="form-select-custom">
                                        <option value="">Please Select</option>
                                        <?php foreach ($options as $option) { ?>
                                            <option value="<?= trim($option) ?>"><?= trim($option) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            <?php } elseif ($input['input_type'] == 'checkbox') { 
                                // CHANGED: Convert checkbox to radio for single selection
                                $options = explode(',', $input['options']); ?>
                                <div class="service-option-group single-selection">
                                    <?php foreach ($options as $option) { 
                                        $option_trimmed = trim($option);
                                        $icon_class = get_icon_for_option($option_trimmed);
                                        ?>
                                        <div class="service-option">
                                            <!-- CHANGED: Changed from checkbox to radio -->
                                            <input type="radio" name="attr_<?= $input['id'] ?>" value="<?= $option_trimmed ?>" id="attr_<?= $input['id'] ?>_<?= sanitize_id($option_trimmed) ?>">
                                            <label for="attr_<?= $input['id'] ?>_<?= sanitize_id($option_trimmed) ?>">
                                                <i class="<?= $icon_class ?> service-icon"></i>
                                                <?= $option_trimmed ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>

                            <?php } elseif ($input['input_type'] == 'radio') { 
                                $options = explode(',', $input['options']); ?>
                                <div class="service-option-group">
                                    <?php foreach ($options as $option) { 
                                        $option_trimmed = trim($option);
                                        $is_yes_no = is_yes_no_question($input['attribute_name']);
                                        $option_class = $is_yes_no ? ($option_trimmed === 'Yes' || stripos($option_trimmed, 'yes') !== false ? 'yes-option' : 'no-option') : '';
                                        $icon_class = get_icon_for_radio($option_trimmed, $is_yes_no);
                                        ?>
                                        <div class="service-option <?= $option_class ?>">
                                            <input type="radio" name="attr_<?= $input['id'] ?>" value="<?= $option_trimmed ?>" id="attr_<?= $input['id'] ?>_<?= sanitize_id($option_trimmed) ?>">
                                            <label for="attr_<?= $input['id'] ?>_<?= sanitize_id($option_trimmed) ?>">
                                                <i class="<?= $icon_class ?>"></i>
                                                <?= $option_trimmed ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>

                            <?php } elseif ($input['input_type'] == 'number') { ?>
                                <div class="form-group-custom">
                                    <input type="number" name="attr_<?= $input['id'] ?>" class="form-control-custom" placeholder="Enter <?= htmlspecialchars($input['attribute_name']) ?>">
                                </div>

                            <?php } elseif ($input['input_type'] == 'email') { ?>
                                <div class="form-group-custom">
                                    <input type="email" name="attr_<?= $input['id'] ?>" class="form-control-custom" placeholder="Enter <?= htmlspecialchars($input['attribute_name']) ?>">
                                </div>

                            <?php } elseif ($input['input_type'] == 'tel') { ?>
                                <div class="form-group-custom">
                                    <input type="tel" name="attr_<?= $input['id'] ?>" class="form-control-custom" placeholder="Enter <?= htmlspecialchars($input['attribute_name']) ?>">
                                </div>

                            <?php } elseif ($input['input_type'] == 'date') { ?>
                                <div class="form-group-custom">
                                    <input type="date" name="attr_<?= $input['id'] ?>" class="form-control-custom">
                                </div>

                            <?php } elseif ($input['input_type'] == 'time') { ?>
                                <div class="form-group-custom">
                                    <input type="time" name="attr_<?= $input['id'] ?>" class="form-control-custom">
                                </div>

                            <?php } elseif ($input['input_type'] == 'file') { ?>
                                <div class="form-group-custom">
                                    <input type="file" name="attr_<?= $input['id'] ?>" class="form-control-custom file-input">
                                </div>

                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                
                <!-- Date and Time Selection -->
                <div class="form-group">
                    <div class="date-time-group">
                        <div>
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" value="2025-08-31" min="2025-08-31">
                        </div>
                        <div>
                            <label for="time">Time</label>
                            <select id="time" name="time">
                                <option value="">Please Select Time</option>
                                <option value="08:00">8:00 AM</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="17:00">5:00 PM</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div class="form-group">
                    <div class="form-title">Anything else you want to describe</div>
                    <textarea name="description" style="height: 200px;" placeholder="Please provide any special instructions or details about your cleaning needs..."></textarea>
                </div>
                
                <!-- Price Calculation -->
                <div class="price-display">
                    <div>Estimated Price:</div>
                    <div class="price" id="priceDisplay">AED 100</div>
                </div>

                <button name="submit" class="btn">Submit</button>
                
            </form>
            
            <?php

                if (isset($_POST['submit'])) {

                    $cat_id   = $row['sub_id'] ?? null;
                    $type     = '.';//$_GET['type'] ?? null;
                    $duration = $_POST['hours'] ?? null;
                    $date     = $_POST['date'] ?? null;
                    $time     = $_POST['time'] ?? null;
                    $info     = $_POST['description'] ?? null;
                    $user_id  = $_SESSION['user_id'] ?? null;
                    $status   = 0;
                    $mood     = $_POST['payment_mode'] ?? 'cash';
                    $code     = uniqid();
                    $date_now = date("Y-m-d");

                    // If service type is quotation, price should be NULL
                    $price = ($service_type == 'quotation') ? '' : null;

                    // Payment mode
                    $payment_mode = ($mood == 'card') ? 1 : 0;


                    // ----------------------------
                    // Fetch buffer settings
                    // ----------------------------
                    $buffer_q = "SELECT hour, min FROM buffer 
                                WHERE sub_id = '$cat_id' AND is_active='1' AND is_delete='0' LIMIT 1";
                    $buffer_r = mysqli_query($con, $buffer_q);
                    $buffer   = mysqli_fetch_assoc($buffer_r);

                    $buffer_hour = $buffer['hour'] ?? 0;
                    $buffer_min  = $buffer['min'] ?? 0;

                    // User selected datetime
                    $selectedDateTime = strtotime($date . ' ' . $time);

                    // Current time
                    $now = time();

                    // Required minimum time (now + buffer)
                    $bufferSeconds = ($buffer_hour * 3600) + ($buffer_min * 60);
                    $allowedTime   = $now + $bufferSeconds;

                    if ($selectedDateTime < $allowedTime) {
                        echo "<script>alert('You must schedule at least {$buffer_hour} hour(s) and {$buffer_min} minute(s) from now.');</script>";
                    }                    

                    // Insert order
                    $insert = "INSERT INTO `order` 
                            (user_id, sub_id, type, duration, selected_date, selected_time, additional, payment_mode, status, code, created_at) 
                            VALUES ('$user_id', '$cat_id', '$type', '$duration', '$date', '$time', '$info', '$payment_mode', '$status', '$code', '$date_now')";

                    $run = mysqli_query($con, $insert);

                    if ($run) {
                        $order_id = mysqli_insert_id($con);

                        // Loop through all POST inputs to find dynamic attributes
                        foreach ($_POST as $key => $value) {
                            if (strpos($key, 'attr_') === 0) {
                                $attr_id = str_replace('attr_', '', $key);

                                // Handle multiple values (checkboxes) - NOW SINGLE VALUES ONLY
                                $attr_value = $value;

                                // Fetch attribute name from category_attribute table
                                $attr_name = '';
                                $q = mysqli_query($con, "SELECT attribute_name FROM category_attribute WHERE id='$attr_id'");
                                if ($q && mysqli_num_rows($q) > 0) {
                                    $res = mysqli_fetch_assoc($q);
                                    $attr_name = $res['attribute_name'];
                                }

                                // Insert into order_attributes table
                                $insertAttr = "INSERT INTO order_attributes 
                                            (order_id, attribute_name, attribute_value, is_active, is_delete) 
                                            VALUES (
                                                '$order_id', 
                                                '".mysqli_real_escape_string($con, $attr_name)."', 
                                                '".mysqli_real_escape_string($con, $attr_value)."', 
                                                1, 
                                                0
                                            )";
                                mysqli_query($con, $insertAttr);
                            }
                        }

                        // Redirect to process page
                        echo "<script>window.open('" . base_url() . "process.php?order=$code', '_self')</script>";
                    } else {
                        echo "<script>alert('Something went wrong.')</script>";
                        echo "<script>window.open('" . base_url() . "', '_self')</script>";
                    }
                }

            ?>



            
        </div>
        
        <div class="price-sidebar">
            
            <div class="price-card">
                <div class="price-value"><?= $row['price']?></div>
                <div class="price-per">for 2 hours service</div>
            </div>
            
                <?php

                    $discount_q = "SELECT discount FROM discount 
                                WHERE sub_id = '{$row['sub_id']}' 
                                AND is_active = '1' 
                                AND is_delete = '0' 
                                LIMIT 1";
                    $discount_r = mysqli_query($con, $discount_q);
                    $discount_row = mysqli_fetch_assoc($discount_r);

                    $discount_percent = $discount_row['discount'] ?? 0;

                    // --- Price Calculation ---
                    $base_price = $row['price'];
                    $discount_amount = ($discount_percent > 0) ? ($base_price * $discount_percent / 100) : 0;
                    $price_after_discount = $base_price - $discount_amount;

                    // Example: duration fee fixed for now
                    $duration_fee = 80; 
                    $subtotal = $price_after_discount + $duration_fee;

                    // VAT 5%
                    $vat = round($subtotal * 0.05);

                    // Final total
                    $total = $subtotal + $vat;

                ?>
                
                <div class="price-details">
                    <div class="price-line">
                        <span>Base Price:</span>
                        <?php if ($discount_percent > 0) { ?>
                            <span>
                                <del style="color:#888;"><?= number_format($base_price) ?> AED</del>
                                <?= number_format($price_after_discount) ?> AED
                                <small style="color:green;">(-<?= $discount_percent ?>%)</small>
                            </span>
                        <?php } else { ?>
                            <span><?= number_format($base_price) ?> AED</span>
                        <?php } ?>
                    </div>

                    <div class="price-line">
                        <span>Duration (2 hours):</span>
                        <span>+<?= number_format($duration_fee) ?> AED</span>
                    </div>

                    <div class="price-line">
                        <span>VAT (5%):</span>
                        <span>+<?= number_format($vat) ?> AED</span>
                    </div>

                    <div class="total-price">
                        <span>Total Amount:</span>
                        <span><?= number_format($total) ?> AED</span>
                    </div>
                </div>
                
                <div class="notice">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 8px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    Final price may vary based on service requirements
                </div>
        </div>
    </div>
</div>

<script>
// Set minimum date to today and default time to next full hour
document.addEventListener('DOMContentLoaded', function() {
    // Date picker
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('service_date');
    dateInput.min = today;
    
    // Set default to today
    dateInput.value = today;
    
    // Time picker - set to next full hour
    const now = new Date();
    const nextHour = new Date(now.getTime() + 60 * 60 * 1000);
    const hours = String(nextHour.getHours()).padStart(2, '0');
    document.getElementById('service_time').value = `${hours}:00`;
    
    // Update price when duration changes
    const hoursSelect = document.getElementById('hours');
    const priceValue = document.querySelector('.price-value');
    const priceLines = document.querySelectorAll('.price-details .price-line');
    const totalPrice = document.querySelector('.total-price span:last-child');
    
    hoursSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const duration = parseInt(this.value);
        const basePrice = 100;
        let total = 0;
        
        if (duration === 1) {
            total = 100;
            updatePriceDisplay(basePrice, 0, total);
        } else if (duration === 2) {
            total = 180;
            updatePriceDisplay(basePrice, 80, total);
        } else if (duration === 3) {
            total = 250;
            updatePriceDisplay(basePrice, 150, total);
        } else if (duration === 4) {
            total = 300;
            updatePriceDisplay(basePrice, 200, total);
        }
        
        priceValue.textContent = `${total} AED`;
        document.querySelector('.price-per').textContent = `for ${duration} hour${duration > 1 ? 's' : ''} service`;
    });
    
    function updatePriceDisplay(base, durationFee, total) {
        const vat = Math.round(total * 0.05);
        
        priceLines[0].querySelector('span:last-child').textContent = `${base} AED`;
        priceLines[1].querySelector('span:last-child').textContent = `+${durationFee} AED`;
        priceLines[2].querySelector('span:last-child').textContent = `+${vat} AED`;
        totalPrice.textContent = `${total + vat} AED`;
    }
});
</script>

<?php include 'temp/footer.php';?>