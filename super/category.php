<?php
    include '../config/config.php';
    include 'temp.php';
    
?>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Add Sub Category</h3>
        </div>
        
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                
                <!-- Service Category Dropdown -->
                <div class="form-group mt-3">
                    <label class="form-label required">Service Category</label>
                    <select class="form-input" name="category_id" required>
                        <option value="">-- Select Category --</option>
                        <?php 
                            $sel = "SELECT * FROM services WHERE is_active=1";
                            $run = mysqli_query($con, $sel);
                            while($row = mysqli_fetch_assoc($run)){
                                echo "<option value='".$row['id']."'>".$row['service_name']."</option>";
                            }
                        ?>
                    </select>
                </div>

                <!-- Sub Category Name -->
                <div class="form-group mt-3">
                    <label class="form-label required">Sub Category</label>
                    <input type="text" class="form-input" name="sub_category" required>
                </div>

                <!-- Description -->
                <div class="form-group mt-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-input" name="description" rows="3"></textarea>
                </div>

                <!-- Service Type -->
                <div class="form-group mt-3">
                    <label class="form-label">Service Type</label>
                    <input type="text" class="form-input" name="service_type">
                </div>

                <!-- Price -->
                <div class="form-group mt-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-input" name="price" required>
                </div>

                <!-- Image Upload -->
                <div class="form-group mt-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-input" name="img" accept="image/*">
                </div>

                <!-- Submit Button -->
                <div class="form-group mt-4">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                </div>

            </form>
            
            <?php 

                if (isset($_POST['save'])) {
                    // Capture inputs
                    $category_id   = mysqli_real_escape_string($con, $_POST['category_id']);
                    $sub_category  = mysqli_real_escape_string($con, $_POST['sub_category']);
                    $description   = mysqli_real_escape_string($con, $_POST['description']);
                    $service_type  = mysqli_real_escape_string($con, $_POST['service_type']);
                    $price         = mysqli_real_escape_string($con, $_POST['price']);
                    $display = 1;


                    // Handle image upload
                    $img = "";
                    if (!empty($_FILES['img']['name'])) {
                        $img_name = time() . "_" . basename($_FILES['img']['name']);
                        $target   = __DIR__ . "/../assets/services/" . $img_name;
                
                        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
                            $img = $img_name;
                        } else {
                            echo "<p style='color:red;'>Image upload failed!</p>";
                        }
                    }
                
                    // Insert Query
                    $ins = "INSERT INTO sub_category 
                            (category_id, sub_category, description, service_type, price, img, display) 
                            VALUES 
                            ('$category_id', '$sub_category', '$description', '$service_type', '$price', '$img', '$display')";
                
                    if (mysqli_query($con, $ins)) {
                        echo "<p style='color:green;'>Sub Category added successfully!</p>";
                    } else {
                        echo "<p style='color:red;'>Error: " . mysqli_error($con) . "</p>";
                    }
                }



            ?>
        </div>
    </div>
    
    <div class="card">
        
        <div class="card-header">
            
            <h3>Avabile Services</h3>
            
        </div>
        
        <div class="card-body">
            
            <table class="styled-table">
                
                <tr>
                    <th>Service ID</th>
                    <th>Sub Category</th>
                    <th>Description</th>
                    <th>Service Type</th>
                    <th>Price</th>
                </tr>
                
                <?php 
                
                    $sel = "SELECT * FROM sub_category";
                    $run = mysqli_query($con, $sel);
                    while($row = mysqli_fetch_assoc($run)) {
                        
                        echo "<tr>
                            <td>". $row['sub_id'] ."</td>
                            <td>". $row['sub_category'] ."</td>
                            <td>". $row['description'] ."</td>
                            <td>". $row['service_type'] ."</td>
                            <td>". $row['price'] ."</td>
                            <td>
                                <a href='edit_service.php?sub_id=". $row['sub_id'] ."' class='btn btn-edit'>Edit</a>
                            </td>
                            <td>
                                <a href='delete_category.php?sub_id=". $row['sub_id'] ."' class='btn btn-delete'>Delete</a>
                            </td>
                        </tr>";
                        
                    }
                
                ?>
                
            </table>
            
        </div>
        
    </div>
</div>
