<?php

error_reporting(E_ALL);       // Report all errors
ini_set('display_errors', 1);

include '../config/config.php';
include 'temp.php';

$sub_id = mysqli_real_escape_string($con, $_GET['sub_id']);

// Fetch Data
$sel = "SELECT * FROM sub_category WHERE sub_id='$sub_id'";
$run = mysqli_query($con, $sel);
$row = mysqli_fetch_assoc($run);

?>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Edit Sub Category</h3>
        </div>
        
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <!-- Sub Category Name -->
                <div class="form-group mt-3">
                    <label class="form-label required">Sub Category</label>
                    <input type="text" class="form-input" value="<?= $row['sub_category']?>" name="sub_category" required>
                </div>

                <!-- Description -->
                <div class="form-group mt-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-input" name="description" rows="3"><?= $row['description']?></textarea>
                </div>

                <!-- Service Type -->
                <div class="form-group mt-3">
                    <label class="form-label">Service Type</label>
                    <input type="text" class="form-input" value="<?= $row['service_type']?>" name="service_type">
                </div>

                <!-- Price -->
                <div class="form-group mt-3">
                    <label class="form-label">Price</label>
                    <input type="number" value="<?= $row['price']?>" class="form-input" name="price" required>
                </div>

                <!-- Image Upload -->
                <div class="form-group mt-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-input" name="img" accept="image/*">
                    <?php if (!empty($row['img'])): ?>
                        <p>Current: <img src="../assets/services/<?= $row['img']?>" width="80"></p>
                    <?php endif; ?>
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>

            </form>
            
            <?php 

            if (isset($_POST['update'])) {
                // Capture inputs
                $sub_category  = mysqli_real_escape_string($con, $_POST['sub_category']);
                $description   = mysqli_real_escape_string($con, $_POST['description']);
                $service_type  = mysqli_real_escape_string($con, $_POST['service_type']);
                $price         = mysqli_real_escape_string($con, $_POST['price']);
                $display       = 1;

                // Handle image upload
                $img = $row['img']; // keep old image if new one not uploaded
                if (!empty($_FILES['img']['name'])) {
                    $img_name = time() . "_" . basename($_FILES['img']['name']);
                    $target   = __DIR__ . "/../assets/services/" . $img_name;
            
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
                        $img = $img_name;
                    } else {
                        echo "<p style='color:red;'>Image upload failed!</p>";
                    }
                }
            
                // Update Query
                $upd = "UPDATE sub_category SET 
                            sub_category='$sub_category', 
                            description='$description', 
                            service_type='$service_type', 
                            price='$price', 
                            img='$img', 
                            display='$display'
                        WHERE sub_id='$sub_id'";
            
                if (mysqli_query($con, $upd)) {
                    echo "<p style='color:green;'>Sub Category updated successfully!</p>";
                } else {
                    echo "<p style='color:red;'>Error: " . mysqli_error($con) . "</p>";
                }
            }

            ?>
        </div>
    </div>
</div>
