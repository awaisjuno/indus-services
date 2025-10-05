<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';    
?>

        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Manual Order Creation</h1>
                </div>
                
                <div class="header-right">
                    <div class="user-profile">
                        <img src="<?= base_url()?>assets/img/<?= $row['img']?>" alt="Admin User">
                        <div class="user-info">
                            <h4><?= $row['first_name']?> <?= $row['last_name']?></h4>
                            <p>Administrator</p>
                        </div>
                    </div>
                </div>
            </header>


    <div class="content">

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3> Order Create</h3>
            </div>

            <div class="panel-body">

                <form method="POST">

                    <div class="form-row">

                        <div class="form-group col-6">
                            <?= form_label('Client First Name *')?>
                            <input type="text" class="form-control" name="first_name" required="required" />
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Client Last Name *')?>
                            <input type="text" class="form-control" name="last_name" required="required" />
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Client Email *')?>
                            <input type="email" class="form-control" name="email" required="required" />
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Client Mobile *')?>
                            <input type="text" class="form-control" name="mobile" required="required" />
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Select Service *')?>
                            <select name="service" class="form-control">
                                <option value="">-- Select Service --</option>
                                <?php 
                                
                                    // Fetch Services
                                    $service = "SELECT * FROM service";
                                    $run = mysqli_query($con, $service);

                                    while ($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='" . $row['service_id'] . "'>" . $row['service_name'] . "</option>";
                                    }
                                
                                ?>

                            </select>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Select Service Categoy *')?>
                            <select name="service" class="form-control">
                                <option value="">-- Select Service Categoy --</option>
                                <?php 
                                
                                    // Fetch Services
                                    $service = "SELECT * FROM sub_category WHERE is_active = 1";
                                    $run = mysqli_query($con, $service);

                                    while ($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='" . $row['sub_id'] . "'>" . $row['sub_category'] . "</option>";
                                    }
                                
                                ?>

                            </select>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Technician *')?>
                            <select name="technician" class="form-control">
                                
                                <?php
                                
                                    // Fetch Services
                                    $service = "SELECT * FROM user WHERE role='technician'";
                                    $run = mysqli_query($con, $service);

                                    while ($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='" . $row['user_id'] . "'>" . $row['email'] . "</option>";
                                    }
                                
                                ?>

                            </select>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Time *')?>
                            <input type="time" class="form-control" name="time" required="required" />
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Date *')?>
                            <input type="date" class="form-control" name="date" required="required" />
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('City Code *') ?>
                            <select name="city" class="form-control" required>
                                <option value="">-- Select City --</option>
                                <?php 
                                    $city = "SELECT * FROM city ORDER BY city_name ASC";
                                    $run = mysqli_query($con, $city);

                                    while ($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='" . $row['city_id'] . "'>" . $row['city_code'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <?= form_label('Location Link *')?>
                            <input type="text" name="location_link" required="required" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Complete Address *')?>
                            <textarea name="address" class="form-control" style="height: 100px;" required="required"></textarea>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Additional Notes *')?>
                            <textarea name="note" class="form-control" style="height: 100px;" required="required"></textarea>
                        </div>
                    
                    </div>

                    <button name="save" class="btn">Save</button>

                </form>

                <?php 
                
                if (isset($_POST['save'])) {
                    // Sanitize inputs
                    $first_name     = mysqli_real_escape_string($con, $_POST['first_name']);
                    $last_name      = mysqli_real_escape_string($con, $_POST['last_name']);
                    $email          = mysqli_real_escape_string($con, $_POST['email']);
                    $mobile         = mysqli_real_escape_string($con, $_POST['mobile']);
                    $service_type   = intval($_POST['service']); // from service_type
                    $sub_category   = intval($_POST['sub_category']); // renamed from service
                    $technician     = intval($_POST['technician']);
                    $time           = mysqli_real_escape_string($con, $_POST['time']);
                    $date           = mysqli_real_escape_string($con, $_POST['date']);
                    $city           = intval($_POST['city']);
                    $location_link  = mysqli_real_escape_string($con, $_POST['location_link']);
                    $address        = mysqli_real_escape_string($con, $_POST['address']);
                    $note           = mysqli_real_escape_string($con, $_POST['note']);
                    $created_at     = date("Y-m-d H:i:s");

                    // Step 1: Insert into user
                    $user_sql = "INSERT INTO user (email, role, is_manual, is_active, is_delete) 
                                VALUES ('$email', 'client', 1, 1, 0)";
                    if (mysqli_query($con, $user_sql)) {
                        $user_id = mysqli_insert_id($con);

                        // Step 2: Insert into user_detail
                        $detail_sql = "INSERT INTO user_detail (user_id, first_name, last_name, mobile, img, is_active, is_delete) 
                                    VALUES ('$user_id', '$first_name', '$last_name', '$mobile', '', 1, 0)";
                        mysqli_query($con, $detail_sql);

                        // Step 3: Insert into order
                        $order_sql = "INSERT INTO `order` 
                                        (user_id, sub_id, type, selected_date, selected_time, additional, team_id, status, created_at, is_active, is_delete) 
                                    VALUES 
                                        ('$user_id', '$sub_category', '$service_type', '$date', '$time', '$note', '$technician', 0, '$created_at', 1, 0)";
                        
                        if (mysqli_query($con, $order_sql)) {
                            echo "<script>alert('Order created successfully!');</script>";
                            echo "<script>window.open('". base_url() ."orders/list.php', '_self')</script>";
                        } else {
                            echo "<div class='alert alert-danger mt-3'>Error inserting order: " . mysqli_error($con) . "</div>";
                        }

                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error creating user: " . mysqli_error($con) . "</div>";
                    }
                }
                ?>

            </div>

        </div>
