<?php 

    $service_id = isset($_GET['service_id']) ? intval($_GET['service_id']) : null;
    include '../config/config.php';
    include 'temp.php';

?>

    <div class="content">

        <div class="card">

            <div class="card-header">
                <h3>Add New Service Category</h3>
            </div>

            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <?= form_label('Category Name *')?>
                        <input type="text" class="form-input" name="category_name" required="required" />
                    </div>

                    <div class="form-group">
                        <?= form_label('Category Description *')?>
                        <textarea name="description" class="form-input"></textarea>
                    </div>

                    <div class="form-group">
                        <?= form_label('Select Service *')?>
                        <select name="service" class="form-input">
                            <option value="">-- Select Service --</option>
                            <?php 
                            
                                $fetch = "SELECT * FROM service ORDER BY service_id DESC";
                                $run = mysqli_query($con, $fetch);
                                if (mysqli_num_rows($run) > 0) {

                                    while ($row = mysqli_fetch_assoc($run)) {

                                        echo "<option value='". $row['service_id'] ."'>". $row['service_name'] ."</option>";

                                    }

                                }
                            
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <?= form_label('Category Image *')?>
                        <input type="file" name="img" requried="required">
                    </div>

                    <button class="btn" name="add">Add</button>

                </form>
                
                <?php

                    if (isset($_POST['add'])) {

                        // Sanitize and capture input values
                        $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
                        $description = mysqli_real_escape_string($con, $_POST['description']);
                        $service_id = mysqli_real_escape_string($con, $_POST['service']);

                        // Handle the uploaded image
                        $image = $_FILES['img']['name'];
                        $tmp = $_FILES['img']['tmp_name'];

                        $unique_name = time() . '_' . basename($image);
                        $upload_path = "assets/img/" . $unique_name;

                        // Move the uploaded file
                        if (move_uploaded_file($tmp, $upload_path)) {
                            // Insert into database
                            $insert = "INSERT INTO sub_category (
                                            sub_category, 
                                            description, 
                                            img, 
                                            display, 
                                            type_id, 
                                            service_id, 
                                            file
                                        ) VALUES (
                                            '$category_name', 
                                            '$description', 
                                            '$unique_name', 
                                            '0',              -- default display
                                            '0',              -- default type_id
                                            '$service_id', 
                                            '',
                                        )";

                            $run = mysqli_query($con, $insert);

                            if ($run) {
                                echo "<script>alert('Category Added Successfully');</script>";
                            } else {
                                echo "<script>alert('Database Error: " . mysqli_error($con) . "');</script>";
                            }
                        } else {
                            echo "<script>alert('Image upload failed.');</script>";
                        }
                    }

                ?>


            </div>

        </div>

    </div>