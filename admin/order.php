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
                <h3><i class="fa-solid fa-filter"></i> Refine By</h3>
            </div>

            <div class="panel-body">

                <form method="POST">

                    <div class="form-row">
                        <div class="form-group col-12">
                            <?= form_label('Order Status *')?>
                            <select name="status" class="form-control" required>
                                <option value="canceled">Canceled</option>
                                <option value="unconfirmed">Un Confirmed</option>
                                <option value="completed">Completed</option>
                                <option value="not-serviced">Not Serviced</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>

                        <div class="form-group col-12">
                            <?= form_label('Service Location *') ?>
                            <?= form_input(array('type' => 'text', 'name' => 'service_location', 'class' => 'form-control')) ?>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Starting Date *')?>
                            <?= form_input(array('type' => 'date', 'name' => 'start_date', 'class' => 'form-control'))?>
                        </div>
                    
                        <div class="form-group col-6">
                            <?= form_label('Ending Date *')?>
                            <?= form_input(array('type' => 'date', 'name' => 'end_date', 'class' => 'form-control'))?>
                        </div>
                    </div>

                    <button name="submit" class="btn">Search</button>

                </form>

                <?php
                
                    if(isset($_POST['submit'])) {

                        $status = $_POST['status'];
                        $service_location = $_POST['service_location'];
                        $issues = $_POST['issues'];
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];

                        // Redirect with GET params
                        echo "<script>
                            window.location.href = 'filters.php?status=$status&service_location=$service_location&issues=$issues&start_date=$start_date&end_date=$end_date';
                        </script>";
                        exit;

                    }
                
                ?>

            </div>

        </div>

        <!--Pending Orders--->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3><i class="fa fa-clock-o"></i> Pending Orders</h3>
            </div>

            <div class="panel-body">

                <table class="table">
                    <tr>
                        <th>Order Date</th>
                        <th>Order ID / Service Details</th>
                        <th>Appointment Time</th>
                        <th>Customer</th>
                        <th>ST</th> 
                        <th>Technician</th>
                        <th>Action</th>
                    </tr>

<?php 
$pending = "
    SELECT 
        o.order_id, o.code, o.selected_date, o.selected_time, o.additional, o.status,
        c.first_name AS customer_first, c.last_name AS customer_last, c.mobile AS customer_mobile,
        oa.user_id AS assigned_user_id,
        t.first_name AS tech_first, t.last_name AS tech_last,
        s.*
    FROM `order` o
    LEFT JOIN user_detail c ON o.user_id = c.user_id
    LEFT JOIN order_assign oa ON o.order_id = oa.order_id
    LEFT JOIN user_detail t ON oa.user_id = t.user_id
    LEFT JOIN sub_category s ON o.sub_id = s.sub_id
    WHERE o.status = 0
";


$run = mysqli_query($con, $pending);

while ($row = mysqli_fetch_assoc($run)) {
    echo "<tr>
        <td>". htmlspecialchars($row['selected_date']) ."</td>
        <td>
            Order #". $row['order_id'] ." (". htmlspecialchars($row['code']) .")<br>
            <small>". htmlspecialchars($row['sub_category']) ."</small>
        </td>
        <td>". htmlspecialchars($row['selected_time']) ."</td>
        <td>". htmlspecialchars($row['customer_first'].' '.$row['customer_last']) ."</td>
        <td>". htmlspecialchars($row['additional']) ."</td>
        <td>";

    if (!empty($row['assigned_user_id'])) {
        echo htmlspecialchars($row['tech_first'].' '.$row['tech_last']);
    } else {
        echo "<a href='assgin_order.php?order_id=". $row['order_id'] ."' class='btn btn-assign'>Assign To</a>";
    }

    echo "</td>
        <td>
            <a href='order_details.php?order_id=". $row['order_id'] ."' class='btn btn-details'>Order Details</a>
        </td>
    </tr>";
}
?>



                </table>


            </div>

        </div>

    </div>

    <script>
    // Validation for date range
    document.querySelector("form").addEventListener("submit", function(e) {
        let startDate = document.querySelector("[name='start_date']").value;
        let endDate   = document.querySelector("[name='end_date']").value;
        if ((startDate && !endDate) || (!startDate && endDate)) {
            e.preventDefault();
            alert("Please select both Starting Date and Ending Date together.");
        }
    });
    </script>