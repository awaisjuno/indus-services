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
                    <h1>Technician Jobs</h1>
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
                <h3>Technician Jobs Search</h3>
            </div>

            <div class="panel-body">

                <form method="POST">

                    <div class="form-row">

                        <div class="form-group col-6">
                            <?= form_label('Date *')?>
                            <?= form_input(array('type' => 'date', 'class' => 'form-control', 'name' => 'date', 'required' => 'required'))?>
                        </div>
                        
                        <div class="form-group col-6">
                            <?= form_label('Technician *')?>
                            <select name="user" class="form-control">
                                
                                <?php 
                                
                                    // Fetch Services
                                    $service = "SELECT * FROM user WHERE role='technician'";
                                    $run = mysqli_query($con, $service);

                                    while ($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='" . $row['user_id'] . "'>" . $row['email'] . "</option>";
                                    }
                                
                                ?>

                            </select>
                        </div>

                        <button class="btn" name="search">Search</button>

                    </div>
                
                </form>

                <?php 

                    if (isset($_POST['search'])) {
                        $date = mysqli_real_escape_string($con, $_POST['date']);
                        $technician_id = intval($_POST['technician']);

                        // Query: join order_assign with order
                        $sql = "
                            SELECT 
                                o.order_id, 
                                o.selected_date, 
                                o.selected_time, 
                                o.additional, 
                                o.status,
                                oa.user_id AS technician_id
                            FROM order_assign oa
                            INNER JOIN `order` o ON oa.order_id = o.order_id
                            WHERE oa.user_id = '$technician_id'
                            AND o.selected_date = '$date'
                            ORDER BY o.selected_time ASC
                        ";
                        
                        $result = mysqli_query($con, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered mt-3'>";
                            echo "<thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Note</th>
                                        <th>Status</th>
                                    </tr>
                                </thead><tbody>";
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['order_id']}</td>
                                        <td>{$row['selected_date']}</td>
                                        <td>{$row['selected_time']}</td>
                                        <td>{$row['additional']}</td>
                                        <td>{$row['status']}</td>
                                    </tr>";
                            }

                            echo "</tbody></table>";
                        } else {
                            echo "<div class='alert alert-warning mt-3'>No jobs found for this technician on $date</div>";
                        }
                    }

                ?>

            </div>

        </div>

    </div>