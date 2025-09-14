<?php
    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php'; 
?>

    <div class="content">

        <div class="card">

            <div class="card-header">
                <h3>Add Discount to Service</h3>
            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="form-group mt-3">
                        <label>Discount in % *</label>
                        <input type="text" class="form-input" name="per" required>
                    </div>

                    <div class="form-group mt-3">
                        <label>Services</label>
                        <select name="service" class="form-input">
                            <?php 
                            
                                $sel = "SELECT * FROM sub_category WHERE is_active=1";
                                $run = mysqli_query($con, $sel);
                                while($row = mysqli_fetch_assoc($run)) {
                                    echo "<option value='". $row['sub_id'] ."'>". $row['sub_category'] ."</option>";
                                }
                            
                            ?>
                        </select>
                        
                        <button name="submit">Submit</button>
                    </div>

                </form>

                <?php 
                
                    if(isset($_POST['submit'])) {

                        //Caupture Inputs
                        $per = $_POST['per'];
                        $service = $_POST['service'];

                        //Insert Query
                        $insert = "INSERT INTO discount (sub_id, discount) VALUES ('$service', '$per')";  
                        $run = mysqli_query($con, $insert);
                        if($run) {
                            echo "<script>alert('Succssfully Updated.')</script>";
                        } else {
                            echo "<script>alert('Error...')</script>";
                        }

                    }
                
                ?>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <h3>Discount Apply</h3>
            </div>

            <div class="card-body">

                <table class="styled-table">

                    <tr>
                        <th>Service ID</th>
                        <th>Service Name</th>
                        <th>Percentage</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php 
                    
                        $sel = "
                            SELECT d.discount_id, d.discount, d.is_active, d.is_delete, 
                                s.sub_category 
                            FROM discount d
                            INNER JOIN sub_category s ON d.sub_id = s.sub_id
                        ";
                        
                        $run = mysqli_query($con, $sel);
                        
                        while($row = mysqli_fetch_assoc($run)) {

                            echo "<tr>
                                <td>". $row['discount_id'] ."</td>
                                <td>". $row['sub_category'] ."</td>
                                <td>". $row['discount'] ."</td>
                                <td>
                                    <a href='#'>Edit</a>
                                </td>
                                <td>
                                    <a href='". base_url() ."super/del_discount.php?dis_id=". $row['discount_id'] ."'>Delete</a>
                                </td>
                            </tr>";

                        }

                    
                    ?>

                </table>

            </div>

        </div>

    </div>