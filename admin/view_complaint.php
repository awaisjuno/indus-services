<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
    
    $id = $_GET['id'];

    //Fetch Secify Complaine
    $comp = "
        SELECT c.complaint_id, c.subject, c.message, c.complaint_type, c.status, c.created_at,
            u.first_name, u.last_name, u.img, u.mobile
        FROM complaints c
        INNER JOIN user_detail u ON c.user_id = u.user_id
        WHERE c.is_active = '1' 
        AND u.is_active = '1'
        AND c.complaint_id = '$id'
    ";
    $run = mysqli_query($con, $comp);
    $row = mysqli_fetch_assoc($run);
    
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
                <h3>View Complaint</h3>
            </div>

            <div class="panel-body">

                <table class="table">

                    <tr>
                        <th>Complaint ID</th>
                        <td><?= $row['complaint_id']?></td>
                    </tr>

                    <tr>
                        <th>User</th>
                        <td><?= $row['first_name']?> <?= $row['last_name']?></td>
                    </tr>

                    <tr>
                        <th>Message</th>
                        <td><?= $row['message']?></td>
                    </tr>

                    <tr>
                        <th>Complaint Type</th>
                        <td><?= $row['complaint_type']?></td>
                    </tr>

                    <tr>
                        <th>Stauts</th>
                        <td>
                            <?php
                            
                                if($row['status'] == 0) {
                                    echo "<span>Un Seen</span>";
                                } else if($row == '1') {
                                    echo "<a href='". base_url() ."seen_complaint.php?complaint_id=". $row['id'] ."'>Seen</a>";
                                } else if($row == '2') {
                                    echo "<span>Resloved</span>";
                                }
                             
                            ?>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>