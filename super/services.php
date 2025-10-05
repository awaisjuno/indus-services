<?php
    include '../config/config.php';
    include 'temp.php';
?>

<div class="content">

    <div class="card">

        <div class="card-header">
            <h2>Add Service</h2>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="form-group">
                    <?= form_label('Service Name *')?>
                    <input type="text" name="service_name" class="form-input" required="required" />
                </div>

                <div class="form-group">
                    <?= form_label('Service Descrption *');?>
                    <textarea name="descrption" class="form-input"></textarea>
                </div>

                <button class="btn" name="btn">Submit</button>

            </form>

            <?php 
            
                if (isset($_POST['btn'])) {
                    // Capture values from form
                    $service_name = mysqli_real_escape_string($con, $_POST['service_name']);
                    $description = mysqli_real_escape_string($con, $_POST['descrption']);

                    // Build insert query
                    $insert = "INSERT INTO service (service_name, service_description)
                            VALUES ('$service_name', '$description')";

                    // Execute query
                    $run = mysqli_query($con, $insert);

                    // Check if insert was successful
                    if ($run) {
                        echo "<script>alert('Successfully Inserted');</script>";
                        echo "<script>window.open('". base_url() ."super/services.php', '_self')</script>";
                    } else {
                        echo "<script>alert('Insertion Failed: " . mysqli_error($con) . "');</script>";
                        echo "<script>window.open('". base_url() ."super/services.php', '_self')</script>";
                    }
                }
            
            ?>

        </div>

    </div>

    <div class="card">

        <div class="card-header">
            <h3>Our Services</h3>
        </div>

        <div class="card-body">

            <table class="styled-table">

                <tr>
                    <th>Service ID</th>
                    <th>Service Name</th>
                    <th>Service Descrption</th>
                    <th>Categories</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php 
                
                    $fetch = "SELECT * FROM service ORDER BY service_id DESC";
                    $run = mysqli_query($con, $fetch);

                    // Loop through results
                    if (mysqli_num_rows($run) > 0) {
                        while ($row = mysqli_fetch_assoc($run)) {
                            echo "<tr>
                                <td>" . $row['service_id'] . "</td>
                                <td>" . htmlspecialchars($row['service_name']) . "</td>
                                <td>" . htmlspecialchars($row['service_description']) . "</td>
                                <td>
                                    <a href='categories.php?service_id=". $row['service_id'] ."'>View</a>
                                </td>
                                <td>
                                    <a href='edit_service.php?id=". $row['service_id'] ."' title='Edit'>
                                        <i class='fas fa-edit'></i>
                                    </a>
                                </td>
                                <td>
                                    <a href='delete_service.php?id=". $row['service_id'] ."'>
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No services found.</td></tr>";
                    }
                
                ?>

            </table>

        </div>

    </div>

</div>