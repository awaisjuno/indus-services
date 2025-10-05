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
                <h1>Reschedule Orders</h1>
            </div>
            
            <div class="header-right">

                <!-- User Profile -->
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
                <h3>Search Order</h3>
            </div>

            <div class="panel-body">

                <form method="POST">

                    <div class="form-group">
                        <label>Order ID</label>
                        <input type="text" class="form-control" name="order_id" placeholder="Order ID" required="required" />
                    </div>

                    <div class="form-group">
                        <label>Reschedule Date</label>
                        <input type="date" class="form-control" name="reschedule_date" required="required" />
                    </div>

                    <div class="form-group">
                        <label>Reschedule Time</label>
                        <input type="time" class="form-control" name="reschedule_time" required="required" />
                    </div>
                    
                    <div class="form-group">
                        <label>Reason</label>
                        <textarea name="reason" class="form-control" required="required"></textarea>
                    </div>

                    <button name="btn" class="btn">Submit</button>

                </form>


                <?php 
                if (isset($_POST['btn'])) {

                    $order_id = $_POST['order_id'];
                    $reschedule_date = $_POST['reschedule_date'];
                    $reschedule_time = $_POST['reschedule_time'];
                    $reason = $_POST['reason'];
                    $current_date = date("Y-m-d");

                    // Check if order exists
                    $match = "SELECT * FROM `order` WHERE code = '$order_id'";
                    $run = mysqli_query($con, $match);

                    if (mysqli_num_rows($run) == 0) {
                        echo "<script>alert('Order ID not found.')</script>";
                    } else {
                        // Insert into reschedule table
                        $insert = "INSERT INTO `reschedule` 
                        (`order_id`, `current_date`, `new_date`, `new_time`, `reason`, `added_by`, `status`) 
                        VALUES 
                        ('$order_id', '$current_date', '$reschedule_date', '$reschedule_time', '$reason', 'admin', 'approved')";

                        $run_insert = mysqli_query($con, $insert);

                        if ($run_insert) {
                            // Update order status to rescheduled
                            $update = "UPDATE `order` SET status = 'rescheduled' WHERE order_id = '$order_id'";
                            mysqli_query($con, $update);

                            echo "<script>alert('Successfully Rescheduled.')</script>";
                        } else {
                            echo "<script>alert('Something went wrong.')</script>";
                        }
                    }
                }
                ?>


            </div>

        </div>

        <!--Display the Resedule which is in Pending-->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3>Reschedule Orders</h3>
            </div>

            <div class="panel-body">

<table class="table">
    <tr>
        <th>Reschedule ID</th>
        <th>Reschedule Date</th>
        <th>Reschedule Time</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>

    <?php 
        $sel = "SELECT * FROM reschedule";
        $run = mysqli_query($con, $sel);
        while($row = mysqli_fetch_assoc($run)) {
            echo "<tr>
                <td>". $row['reschedule_id'] ."</td>
                <td>". $row['new_date'] ."</td>
                <td>". $row['new_time'] ."</td>
                <td>". $row['reason'] ."</td>
                <td>". $row['status'] ."</td>
                <td>
                    <a href='delete_reschedule.php?id=".$row['reschedule_id']."' class='btn-delete' 
                       onclick=\"return confirm('Are you sure you want to delete this record?');\">
                       <i class='fa fa-trash'></i>
                    </a>
                </td>
            </tr>";
        }
    ?>
</table>


            </div>

        </div>

    </div>