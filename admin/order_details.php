<?php 
    session_start();
    include '../config/config.php';
    include 'temp.php';
    
    $order_id = $_GET['order_id'] ?? null;

    $order = "
        SELECT 
            o.order_id, o.code, o.selected_date, o.selected_time, o.additional, o.status,
            u.first_name, u.last_name, u.mobile,
            od.order_detail_id, od.code AS detail_code, od.full_name, od.email, od.phone,
            od.area, od.city AS city_id, 
            c.city_name, c.city_code,
            od.option, od.note,
            s.sub_category,
            ua.assign_id, ua.status AS assign_status,
            au.first_name AS assign_first_name, au.last_name AS assign_last_name, au.mobile AS assign_mobile, au.img AS assign_img
        FROM `order` o
        LEFT JOIN user_detail u ON o.user_id = u.user_id
        LEFT JOIN order_detail od ON o.order_id = od.order_id
        LEFT JOIN city c ON od.city = c.city_id
        LEFT JOIN sub_category s ON o.sub_id = s.sub_id
        LEFT JOIN order_assign ua ON o.order_id = ua.order_id
        LEFT JOIN user_detail au ON ua.user_id = au.user_id
        WHERE o.order_id = $order_id
    ";

    $run = mysqli_query($con, $order);
    $order_row = mysqli_fetch_assoc($run);
    

?>

<style>
    .sub-heading {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 10px;
    }
</style>

        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Order Details</h1>
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
                        <h3><i class="fa fa-tasks"></i> Mange Order</h3>
                    </div>

                    <div class="panel-body">

                        <table class="table">

                            <tr>
                                <th>Client Name *</th>
                                <td><?= $order_row['first_name']?> <?= $order_row['last_name']?></td>
                            </tr>

                            <tr>
                                <th>Client Email * </th>
                                <td><?= $order_row['email']?></td>
                            </tr>

                            <tr>
                                <th>Client Mobile * </th>
                                <td><?= $order_row['mobile']?></td>
                            </tr>

                            <tr>
                                <th>Service Categoy *</th>
                                <td> <?= $order_row['sub_category']?></td>
                            </tr>

                            <tr>
                                <th>Technician *</th>
                                <td>
                                    <?php 
                                        if (!empty($row['assign_first_name'])) {
                                            echo $row['assign_first_name'] . ' ' . $row['assign_last_name'] . ' (' . $row['assign_mobile'] . ')';
                                        } else {
                                            echo "Not Assigned";
                                        }
                                    ?>
                                </td>
                            </tr>

                        </table>

                        <h3 class="sub-heading">Details</h3>

                        <table class="table">

                            <tr>
                                <th>Selected Time *</th>
                                <td><?= $order_row['selected_time']?></td>
                            </tr>
                            <tr>
                                <th>Selected Date</th>
                                <td><?= $order_row['selected_date']?></td>
                            </tr>
                            <tr>
                                <th>City Code</th>
                                <td><?= $order_row['city_code']?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?= $order_row['area']?></td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </main>
