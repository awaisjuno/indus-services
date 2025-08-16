<?php
session_start();
include '../config/config.php';
include 'temp.php';

// ===== Handle Export =====
if (isset($_POST['action']) && $_POST['action'] === 'export' && !empty($_POST['selected_orders'])) {
    $selectedOrders = array_map('intval', $_POST['selected_orders']);
    $ids = implode(',', $selectedOrders);

    $sqlExport = "
        SELECT 
            o.order_id,
            u.email AS customer_email,
            sc.sub_category AS service_name,
            o.date,
            rl.rate AS amount,
            o.status
        FROM `order` o
        JOIN user u ON o.user_id = u.user_id
        JOIN sub_category sc ON o.sub_id = sc.sub_id
        LEFT JOIN rate_list rl ON o.rate_list_id = rl.rate_id
        WHERE o.is_delete = '0' AND o.order_id IN ($ids)
        ORDER BY o.order_id DESC
    ";
    $resultExport = mysqli_query($con, $sqlExport);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="selected_orders.csv"');

    $output = fopen('php://output', 'w');
    fputcsv($output, ['Order ID', 'Customer Email', 'Service', 'Date', 'Amount', 'Status']);

    while ($row = mysqli_fetch_assoc($resultExport)) {
        fputcsv($output, [
            $row['order_id'],
            $row['customer_email'],
            $row['service_name'],
            date('d-M-Y', strtotime($row['date'])),
            $row['amount'],
            $row['status']
        ]);
    }
    fclose($output);
    exit;
}

// ===== Queries for Two Panels =====
$newOrders = mysqli_query($con, "
    SELECT 
        o.order_id,
        u.email AS customer_email,
        sc.sub_category AS service_name,
        o.date,
        rl.rate AS amount,
        o.status
    FROM `order` o
    JOIN user u ON o.user_id = u.user_id
    JOIN sub_category sc ON o.sub_id = sc.sub_id
    LEFT JOIN rate_list rl ON o.rate_list_id = rl.rate_id
    WHERE o.is_delete = '0' AND o.status = 0
    ORDER BY o.order_id DESC
");

$doneOrders = mysqli_query($con, "
    SELECT 
        o.order_id,
        u.email AS customer_email,
        sc.sub_category AS service_name,
        o.date,
        rl.rate AS amount,
        o.status
    FROM `order` o
    JOIN user u ON o.user_id = u.user_id
    JOIN sub_category sc ON o.sub_id = sc.sub_id
    LEFT JOIN rate_list rl ON o.rate_list_id = rl.rate_id
    WHERE o.is_delete = '0' AND o.status = 1
    ORDER BY o.order_id DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/admin.css">
</head>
<body>
<div class="main-content">
    <div class="header">
        <h1>Order Management</h1>
        <div class="user-info">
            <img src="<?= base_url() ?>assets/img/user.png" alt="User">
            <span><?= $_SESSION['email'] ?? 'Admin User' ?></span>
        </div>
    </div>

    <!-- ===== New Orders Panel ===== -->
    <div class="content-section">
        <h2>New Orders</h2>
        <form method="post">
            <table cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-new"></th>
                        <th>Order ID</th>
                        <th>Customer Email</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($newOrders) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($newOrders)): ?>
                            <tr>
                                <td><input type="checkbox" name="selected_orders[]" value="<?= $row['order_id'] ?>"></td>
                                <td>#<?= $row['order_id'] ?></td>
                                <td><?= htmlspecialchars($row['customer_email']) ?></td>
                                <td><?= htmlspecialchars($row['service_name']) ?></td>
                                <td><?= date('d M Y', strtotime($row['date'])) ?></td>
                                <td><?= number_format($row['amount'], 2) ?></td>
                                <td><span>Pending</span></td>
                                <td><a href="<?= base_url()?>admin/update_order.php?order_id=<?= $row['order_id']?>">Done</a></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="8">No new orders</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div style="margin-top: 20px;">
                <button type="submit" name="action" value="export" class="btn btn-success">Export New Orders</button>
            </div>
        </form>
    </div>

    <!-- ===== Done Orders Panel ===== -->
    <div class="content-section">
        <h2>Done Orders</h2>
        <form method="post">
            <table cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-done"></th>
                        <th>Order ID</th>
                        <th>Customer Email</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($doneOrders) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($doneOrders)): ?>
                            <tr>
                                <td><input type="checkbox" name="selected_orders[]" value="<?= $row['order_id'] ?>"></td>
                                <td>#<?= $row['order_id'] ?></td>
                                <td><?= htmlspecialchars($row['customer_email']) ?></td>
                                <td><?= htmlspecialchars($row['service_name']) ?></td>
                                <td><?= date('d M Y', strtotime($row['date'])) ?></td>
                                <td><?= number_format($row['amount'], 2) ?></td>
                                <td><span>Done</span></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="7">No done orders</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div style="margin-top: 20px;">
                <button type="submit" name="action" value="export" class="btn btn-success">Export Done Orders</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('select-all-new').addEventListener('change', function() {
    document.querySelectorAll('input[name="selected_orders[]"]').forEach(cb => cb.checked = this.checked);
});
document.getElementById('select-all-done').addEventListener('change', function() {
    document.querySelectorAll('input[name="selected_orders[]"]').forEach(cb => cb.checked = this.checked);
});
</script>
</body>
</html>
