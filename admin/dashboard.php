<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
    //$user = checkRole(['admin']);
    
?>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Dashboard</h1>
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


<!-- Content Area -->
            <div class="content">
                <!-- Dashboard Cards -->
                <div class="dashboard-cards">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-info">
                        <?php 
                        
                        $sql = "SELECT COUNT(*) AS total_orders FROM `order`";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $totalOrders = $row['total_orders'];
                        
                        ?>
                            <h3><?= $totalOrders?></h3>
                            <p>Total Orders</p>
                        </div>
                    </div>
                    
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="stat-info">

                        <?php 
                        
                            // Count pending quotes (status = 0)
                            $sql = "SELECT COUNT(*) AS pending_quotes FROM `order` WHERE status = 0";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $pendingQuotes = $row['pending_quotes'];                        
                        
                        ?>
                            <h3><?= $pendingQuotes?></h3>
                            <p>Pending Quotes</p>
                        </div>
                    </div>
                    
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="stat-info">

                        <?php 
                                                    
                            $sql = "SELECT COUNT(*) AS total_complaints FROM `complaints`";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $totalComplaints = $row['total_complaints'];                        
                        
                        ?>
                            <h3><?= $totalComplaints?></h3>
                            <p>Open Complaints</p>
                        </div>
                    </div>
                    
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stat-info">


                            <?php 
                            
                                // Count rescheduled orders
                                $sql = "SELECT COUNT(*) AS rescheduled_orders FROM `order` WHERE is_reschedule = 1";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $rescheduledOrders = $row['rescheduled_orders'];                          
                            
                            ?>
                            <h3><?= $rescheduledOrders?></h3>
                            <p>Rescheduled Orders</p>
                        </div>
                    </div>
                </div>

                <!-- Traffic and Orders Charts -->
                <div class="row">
                    <div class="chart-container">
                        <div class="section-header">
                            <h2>Website Traffic</h2>
                            <a href="#" class="view-all">View Report</a>
                        </div>
                        <div class="chart-canvas-container">
                            <canvas id="trafficChart"></canvas>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="section-header">
                            <h2>Orders Overview</h2>
                            <a href="#" class="view-all">View Report</a>
                        </div>
                        <div class="chart-canvas-container">
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="row">
                    <div class="recent-orders full-width">
                        <div class="section-header">
                            <h2>Recent Orders</h2>
                            <a href="<?= base_url()?>admin/order.php" class="view-all">View All</a>
                        </div>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Appointment Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <?php 
                            
                            $order = "SELECT o.*, u.user_id, d.first_name, d.last_name
                                    FROM `order` o
                                    JOIN `user` u ON o.user_id = u.user_id
                                    JOIN `user_detail` d ON u.user_id = d.user_id
                                    WHERE o.is_active = 1
                                    ORDER BY o.order_id DESC
                                    LIMIT 6";

                            
                                $run = mysqli_query($con, $order);

                                while($row = mysqli_fetch_assoc($run)) {

                                    echo "<tr>
                                        <td>". $row['order_id'] ."</td>
                                        <td>". $row['first_name'] ." ". $row['last_name'] ."</td>
                                        <td>". $row['selected_date'] ."</td>
                                        <td>". $row['price'] ." AED</td>
                                    </tr>";

                                }

                            ?>

                        </table>
                    </div>
                </div>

                
            </div>

            
            
<?php include 'footer.php';?>