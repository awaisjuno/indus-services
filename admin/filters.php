<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';    

    // Capture filters from GET
    $status = $_GET['status'] ?? '';
    $service_location = $_GET['service_location'] ?? '';
    $issues = $_GET['issues'] ?? '';
    $start_date = $_GET['start_date'] ?? '';
    $end_date = $_GET['end_date'] ?? '';

    // Base query
    $query = "
        SELECT 
            o.order_id, o.code, o.selected_date, o.selected_time, o.additional, o.status,
            u.first_name, u.last_name, u.mobile
        FROM `order` o
        LEFT JOIN user_detail u ON o.user_id = u.user_id
        WHERE 1=1
    ";

    // Apply filters
    if ($status !== '') {
        $query .= " AND o.status = '".mysqli_real_escape_string($con, $status)."'";
    }

    if (!empty($service_location)) {
        $query .= " AND o.additional LIKE '%".mysqli_real_escape_string($con, $service_location)."%'";
    }

    if (!empty($issues)) {
        $query .= " AND o.additional LIKE '%".mysqli_real_escape_string($con, $issues)."%'";
    }

    if (!empty($start_date) && !empty($end_date)) {
        $query .= " AND DATE(o.selected_date) BETWEEN '".mysqli_real_escape_string($con, $start_date)."' 
                    AND '".mysqli_real_escape_string($con, $end_date)."'";
    }

    // Run query
    $result = mysqli_query($con, $query);

?>

<div class="main-content">

            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Order Management </h1>
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


    <div class="content">

        <div class="panel pane-default">

            <div class="panel-heading">
                <h3><i class="fa fa-list-alt"></i> Results</h3>
            </div>

            <div class="panel-body">

                <table class="table">

                    <tr>
                        <th>Order ID</th>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Customer</th>
                        <th>Issue</th>
                        <th>Status</th>
                    </tr>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $statusText = match($row['status']) {
                                0 => 'Pending',
                                1 => 'Completed',
                                2 => 'Canceled',
                                3 => 'Unconfirmed',
                                4 => 'Not Serviced',
                                default => 'Unknown'
                            };

                            echo "<tr>
                                <td>".htmlspecialchars($row['order_id'])."</td>
                                <td>".htmlspecialchars($row['code'])."</td>
                                <td>".htmlspecialchars($row['selected_date'])."</td>
                                <td>".htmlspecialchars($row['selected_time'])."</td>
                                <td>".htmlspecialchars($row['first_name'].' '.$row['last_name'])."</td>
                                <td>".htmlspecialchars($row['additional'])."</td>
                                <td>$statusText</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No orders found for selected filters.</td></tr>";
                    }
                    ?>

                </table>

            </div>

        </div>

    </div>

</div>
