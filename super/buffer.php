<?php
    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
    
?>

<div class="content">

    <div class="card">

        <div class="card-header">
            <h3>Apply Buffer Settings</h3>
        </div>

        <div class="card-body">

                <form method="POST">

                    <div class="form-group mt-3">
                        <label>Minutes</label>
                        <input type="text" class="form-input" name="miun" required>
                    </div>

                    <div class="form-group mt-3">
                        <label>Hours</label>
                        <input type="text" class="form-input" name="hour" required>
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
                        
                        <button class="btn btn-primary" name="submit">Submit</button>
                    </div>

                </form>

            <?php 

                if (isset($_POST['submit'])) {

                    // Capture form inputs
                    $minutes = $_POST['miun'];
                    $hours   = $_POST['hour'];
                    $service = $_POST['service'];

                    // First check if the service already exists in buffer
                    $check = "SELECT * FROM buffer WHERE sub_id = '".mysqli_real_escape_string($con, $service)."' AND is_delete = 0";
                    $check_run = mysqli_query($con, $check);

                    if (mysqli_num_rows($check_run) > 0) {
                        // Already exists
                        echo "<div class='alert alert-warning'>This service already exists in buffer!</div>";
                    } else {
                        // Insert query
                        $insert = "
                            INSERT INTO buffer (hour, min, sub_id) 
                            VALUES (
                                '".mysqli_real_escape_string($con, $hours)."',
                                '".mysqli_real_escape_string($con, $minutes)."',
                                '".mysqli_real_escape_string($con, $service)."'
                            )
                        ";

                        $run = mysqli_query($con, $insert);

                        if ($run) {
                            echo "<div class='alert alert-success'>Buffer added successfully!</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
                        }
                    }
                }

                
            ?>


        </div>
    </div>

    <div class="card">

       <div class="card-header">
            <h3>All Buffer Settings</h3>
       </div>         

       <div class="card-body">

            <table class="styled-table">

                <tr>
                    <th>Buffer ID</th>
                    <th>Minutes</th>
                    <th>Hour</th>
                    <th>Service Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php 
                
                    $blog = "
                        SELECT b.buffer_id, b.hour, b.min, b.is_active, b.is_delete,
                            s.sub_category, s.sub_id
                        FROM buffer b
                        INNER JOIN sub_category s ON b.sub_id = s.sub_id
                    ";
                    $run = mysqli_query($con, $blog);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                            <td>". $row['buffer_id'] ."</td>
                            <td>". $row['min'] ."</td>
                            <td>". $row['hour'] ."</td>
                            <td>". $row['sub_category'] ."</td>
                            <td>
                                <a href='edit_buffer.php?blog_id=". $row['buffer_id'] ."' class='btn btn-edit'>Edit</a>
                            </td>
                            <td>
                                <a href='delete_buffer.php?blog_id=". $row['buffer_id'] ."' class='btn btn-delete'>Delete</a>
                            </td>
                        </tr>";

                    }
                
                ?>

            </table>

       </div>

    </div>

</div>