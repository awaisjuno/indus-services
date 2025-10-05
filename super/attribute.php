<?php 

    $sub_id = $_GET['sub_id'];
    
    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';

?>
    
    <div class="content">

        <!---Add New attribute-->
        <div class="card">
            <div class="card-header">
                <h3>Add New Attribute</h3>
            </div>

            <div class="card-body">
                <form method="POST">
                    <!-- Category (dropdown) -->
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category_id" class="form-input" required>
                            <option value="">Select Category</option>
                            <?php
                                // Fetch sub categories
                                $sub_sql = "SELECT sub_id, sub_category FROM sub_category WHERE is_active=1";
                                $sub_run = mysqli_query($con, $sub_sql);
                                while ($sub = mysqli_fetch_assoc($sub_run)) {

                                    echo "<option value='".$sub['sub_id']."'>".$sub['sub_category']."</option>";

                                }
                            ?>
                        </select>
                    </div>

                    <!-- Attribute Name -->
                    <div class="form-group">
                        <label>Attribute Name *</label>
                        <input type="text" name="attribute_name" class="form-input" required>
                    </div>

                    <!-- Input Type -->
                    <div class="form-group">
                        <label>Input Type *</label>
                        <select name="input_type" class="form-input" required>
                            <option value="text">Text</option>
                            <option value="textarea">Textarea</option>
                            <option value="select">Select</option>
                            <option value="radio">Radio</option>
                            <option value="checkbox">Checkbox</option>
                        </select>
                    </div>

                    <!-- Options (only for select, radio, checkbox) -->
                    <div class="form-group">
                        <label>Options (comma separated)</label>
                        <input type="text" name="options" class="form-input" placeholder="e.g. Small, Medium, Large">
                    </div>

                    <!-- Required -->
                    <div class="form-group">
                        <label>Is Required?</label>
                        <select name="is_required" class="form-input">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <button name="button" type="submit" class="btn btn-primary">Save Attribute</button>
                </form>

                <?php 
                
                    if(isset($_POST['button'])) {

                        $category_id = $_POST['category_id'];
                        $attribute_name = $_POST['attribute_name'];
                        $input_type = $_POST['input_type'];
                        $options = $_POST['options'];
                        $is_required = $_POST['is_required'];

                        // Insert into attributes table
                        $insert = "INSERT INTO attributes (category_id, attribute_name, input_type, options, is_required, is_active) 
                                VALUES ('$category_id', '$attribute_name', '$input_type', '$options', '$is_required', 1)";
                        $run = mysqli_query($con, $insert);

                        if($run){
                            echo "<p style='color:green;'>Attribute Saved Successfully!</p>";
                        } else {
                            echo "<p style='color:red;'>Error: ".mysqli_error($con)."</p>";
                        }

                    }
                
                ?>
            </div>
        </div>


    </div>