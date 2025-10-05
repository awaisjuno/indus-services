<?php 
    session_start();
    include '../config/config.php';
    include 'temp.php';
    
    // Fetch orders with user, sub_category & city details
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
        u.first_name,
        u.last_name,
        u.mobile,
        u.img AS user_img,
        s.sub_category,
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
    WHERE o.is_active='1' AND o.is_delete='0'
    ORDER BY o.order_id DESC
";

    $run = mysqli_query($con, $sel) or die("Query Error: " . mysqli_error($con));
?>
<!---------------- CSS Styles ---------------->
<style>
    .table-container { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; font-size: 14px; }
    th, td { padding: 6px 8px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background-color: #f8f9fa; font-weight: 600; }
    tr:hover { background-color: #f9f9f9; }

    .badge { padding: 2px 8px; border-radius: 12px; font-size: 0.75rem; font-weight: 500; }
    .badge-success { background-color: #e6f4ee; color: #0d6832; }
    .badge-warning { background-color: #fff8e6; color: #b38700; }
    .badge-info { background-color: #e6f4ff; color: #0066cc; }

    .btn { padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; text-decoration: none; margin: 0 1px; display:inline-block; }
    .btn-view   { background: #17a2b8; color: #fff; }
    .btn-edit   { background: #28a745; color: #fff; }
    .btn-assign { background: #007bff; color: #fff; }
    .btn-delete { background: #dc3545; color: #fff; }
    .btn:hover { opacity: 0.9; }
</style>

<div class="card">
    <div class="card-header">
        <h3>Orders Report</h3>
    </div>
    
    <div class="card-body">
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>User</th>
                        <th>Service</th>
                        <th>Duration</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($run) > 0): ?>
                        <?php while($order = mysqli_fetch_assoc($run)): ?>
                            <tr>
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
                                    <a href="view_order.php?id=<?= $order['order_id'] ?>" class="btn btn-view">View</a>
                                    <a href="edit_order.php?id=<?= $order['order_id'] ?>" class="btn btn-edit">Edit</a>
                                    <a href="assign_order.php?id=<?= $order['order_id'] ?>" class="btn btn-assign">Assign</a>
                                    <a href="delete_order.php?id=<?= $order['order_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="8" style="text-align:center;">No orders found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
