<?php 
    session_start();
    include '../config/config.php';
    include 'temp.php';
    
    $order_id = $_GET['order_id'] ?? null;
?>

<main class="main-content">
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="menu-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>
            <h1>Order Management</h1>
        </div>
        <div class="header-right">
            <div class="user-profile">
                <!-- Assuming you have session data for admin -->
                <img src="<?= base_url()?>assets/img/<?= $_SESSION['img'] ?? 'default.png' ?>" alt="Admin User">
                <div class="user-info">
                    <h4><?= $_SESSION['first_name'] ?? 'Admin' ?> <?= $_SESSION['last_name'] ?? '' ?></h4>
                    <p>Administrator</p>
                </div>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Assign Task</h3>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label>Order ID</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($order_id) ?>" disabled />
                    </div>

                    <div class="form-group">
                        <label>Assign to Technician</label>
                        <select class="form-control" name="technician" required>
                            <option value="" disabled selected>-- Select Technician --</option>
                            <?php
                                $sel = "SELECT u.user_id, d.first_name, d.last_name
                                        FROM user u
                                        INNER JOIN user_detail d ON u.user_id = d.user_id
                                        WHERE u.role = 'technician' 
                                          AND u.is_active = '1' AND u.is_delete = '0'
                                          AND d.is_active = '1' AND d.is_delete = '0'";
                                
                                $run = mysqli_query($con, $sel);
                                while($tech = mysqli_fetch_assoc($run)) {
                                    $user_id = htmlspecialchars($tech['user_id']);
                                    $full_name = htmlspecialchars($tech['first_name'] . " " . $tech['last_name']);
                                    echo "<option value='$user_id'>$full_name</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <button type="submit" name="assign" class="btn btn-yellow">Assign</button>
                </form>

                <?php 
                    if (isset($_POST['assign'])) {
                        $tech_id = $_POST['technician'] ?? null;

                        if ($order_id && $tech_id) {
                            // Insert into order_assign
                            $ins = "INSERT INTO order_assign (order_id, user_id) VALUES ('$order_id', '$tech_id')";
                            $run = mysqli_query($con, $ins);

                            if ($run) {
                                echo "<script>alert('Task Assigned Successfully!');window.location.href='order.php';</script>";
                            } else {
                                echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
                            }
                        } else {
                            echo "<script>alert('Please select a technician.');</script>";
                        }
                    }                
                ?>
            </div>
        </div>
    </div>
</main>
