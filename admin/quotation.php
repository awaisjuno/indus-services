<?php 
session_start();
include '../config/config.php';
include 'temp.php';

// Fetch only quotation orders
$sel = "
    SELECT 
        o.order_id,
        o.user_id,
        o.sub_id,
        o.duration,
        o.selected_date,
        o.selected_time,
        o.additional,
        o.payment_mode,
        o.price,
        o.status,
        o.code,
        o.type,  -- ensure this column exists in your table
        u.first_name,
        u.last_name,
        u.mobile,
        u.img AS user_img,
        s.sub_category,
        s.service_type,
        s.price AS sub_price,
        s.img AS sub_img,
        c.city_code
    FROM `order` o
    LEFT JOIN user_detail u 
        ON o.user_id = u.user_id AND u.is_active='1' AND u.is_delete='0'
    LEFT JOIN sub_category s 
        ON o.sub_id = s.sub_id AND s.is_active='1' AND s.is_delete='0'
    LEFT JOIN order_detail od 
        ON od.order_id = o.order_id AND od.is_active='1' AND od.is_delete='0'
    LEFT JOIN city c 
        ON od.city = c.city_id AND c.is_active='1' AND c.is_delete='0'
    WHERE o.is_active='1' AND o.is_delete='0' AND o.type='quotation'
    ORDER BY o.order_id DESC
";
$run = mysqli_query($con, $sel) or die("Query Error: " . mysqli_error($con));
?>

<style>
/* Table Styles */
.table-container { overflow-x: auto; }
table { width: 100%; border-collapse: collapse; }
th, td { padding: 15px; text-align: left; border-bottom: 1px solid var(--light-gray); }
th { background-color: var(--light); font-weight: 600; color: var(--dark); }
tr:hover { background-color: #f8f9fa; }

/* Badge Styles */
.badge { padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 500; }
.badge-success { background-color: #e6f4ee; color: #0d6832; }
.badge-warning { background-color: #fff8e6; color: #b38700; }
.badge-info { background-color: #e6f4ff; color: #0066cc; }

/* Buttons */
.btn { 
    padding: 8px 15px; 
    border-radius: 5px; 
    font-size: 0.9rem; 
    font-weight: 500; 
    cursor: pointer; 
    border: none; 
    transition: all 0.3s; 
    text-decoration: none; 
    display: inline-flex; 
    align-items: center; 
    gap: 6px; 
}
.btn-view   { background-color: var(--info); color: white; }
.btn-edit   { background-color: var(--success); color: white; }
.btn-delete { background-color: var(--danger); color: white; }
.btn-assign { background-color: #17a2b8; color: white; }
.btn-excel  { background-color: var(--excel); color: white; padding: 8px 16px; }

/* Checkbox */
.checkbox-cell { width: 40px; text-align: center; }
input[type="checkbox"] { width: 18px; height: 18px; cursor: pointer; }

/* Header Alignment */
.panel-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
}
.panel-heading h3 { margin: 0; font-size: 1.2rem; font-weight: 600; }

/* Responsive */
@media (max-width: 768px) {
    .panel-heading { flex-direction: column; gap: 10px; align-items: flex-start; }
}
</style>

<main class="main-content">
    <header class="header">
        <div class="header-left">
            <button class="menu-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>
            <h1>Quotation Orders</h1>
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
                <h3>Quotation Orders List</h3>
                <button class="btn btn-excel" id="exportBtn">
                    <i class="fas fa-file-export"></i> Export to Excel
                </button>
            </div>

            <div class="panel-body">
                <div class="table-container">
                    <table class="table" id="ordersTable">
                        <thead>
                            <tr>
                                <th class="checkbox-cell"><input type="checkbox" id="selectAll"></th>
                                <th>Order</th>
                                <th>User</th>
                                <th>Subscription</th>
                                <th>Duration</th>
                                <th>Selected Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($run) > 0): ?>
                                <?php while($order = mysqli_fetch_assoc($run)): ?>
                                    <tr>
                                        <td class="checkbox-cell"><input type="checkbox" class="rowCheckbox"></td>
                                        <td><?= htmlspecialchars($order['city_code']) ?>-<?= htmlspecialchars($order['order_id']) ?></td>
                                        <td>
                                            <?= htmlspecialchars($order['first_name']." ".$order['last_name']) ?><br>
                                            <small><?= htmlspecialchars($order['mobile']) ?></small>
                                        </td>
                                        <td><?= htmlspecialchars($order['sub_category']) ?></td>
                                        <td><?= htmlspecialchars($order['duration']) ?> days</td>
                                        <td><?= htmlspecialchars($order['selected_date']) ?></td>
                                        <td><?= htmlspecialchars($order['selected_time']) ?></td>
                                        <td>
                                            <?php 
                                                $badgeClass = 'badge-info';
                                                if($order['status'] == 'Active') $badgeClass = 'badge-success';
                                                elseif($order['status'] == 'Pending') $badgeClass = 'badge-warning';
                                            ?>
                                            <span class="badge <?= $badgeClass ?>"><?= htmlspecialchars($order['status']) ?></span>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="view_order.php?id=<?= $order['order_id'] ?>" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                                <a href="edit_order.php?id=<?= $order['order_id'] ?>" class="btn btn-edit"><i class="fas fa-edit"></i></a>
                                                <a href="assign_order.php?id=<?= $order['order_id'] ?>" class="btn btn-assign"><i class="fas fa-user-plus"></i></a>
                                                <a href="delete_order.php?id=<?= $order['order_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="9" style="text-align:center;">No quotation orders found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- content -->
</main>
