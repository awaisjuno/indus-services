<?php 
    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';

    // Capture form inputs
    $status     = $_POST['status'];     // from dropdown
    $city       = $_POST['city'];       // city_id
    $start_date = $_POST['start_date']; // YYYY-MM-DD
    $end_date   = $_POST['end_date'];   // YYYY-MM-DD

?>


        <main class="main-content">
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

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3>Resutls</h3>
            </div>

            <div class="panel-body">

                <table class="table">

                    <tr>
                        <th>Order ID</th>
                        <th>Service Name</th>
                        <th>Customer Name</th>
                        <th>Booking Date</th>
                    </tr>

                </table>

            </div>

        </div>

    </div>
