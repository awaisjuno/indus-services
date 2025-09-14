<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';    
    
    // Fetch logged-in user info
    $user_id = $_SESSION['user_id'];
    $user_sql = "SELECT * FROM user_detail WHERE user_id='$user_id' AND is_active='1' AND is_delete='0'";
    $user_run = mysqli_query($con, $user_sql);
    
    if (!$row = mysqli_fetch_assoc($user_run)) {
        session_destroy();
        header("Location: " . base_url() . "signin.php");
        exit();
    }
    
    // Fetch complaints with user info
    $sel = "
        SELECT 
            c.complaint_id,
            c.user_id,
            c.subject,
            c.message,
            c.complaint_type,
            c.status,
            c.created_at,
            u.first_name,
            u.last_name,
            u.mobile
        FROM complaints c
        LEFT JOIN user_detail u 
            ON c.user_id = u.user_id AND u.is_active='1' AND u.is_delete='0'
        WHERE c.is_active='1' AND c.is_delete='0'
        ORDER BY c.complaint_id DESC
    ";
    $run = mysqli_query($con, $sel) or die("Query Error: " . mysqli_error($con));
?>

<main class="main-content">
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <button class="menu-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>
            <h1>Complaints Management</h1>
        </div>
        <div class="header-right">
            <div class="user-profile">
                <img src="<?= base_url() ?>assets/img/<?= htmlspecialchars($row['img']) ?>" alt="Admin User">
                <div class="user-info">
                    <h4><?= htmlspecialchars($row['first_name']) ?> <?= htmlspecialchars($row['last_name']) ?></h4>
                    <p>Administrator</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Complaints List</h3>
            </div>

            <div class="panel-body">
                <div class="table-container">
                    <table class="table" id="complaintsTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Mobile</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($run) > 0): ?>
                                <?php while($complaint = mysqli_fetch_assoc($run)): ?>
                                    <tr>
                                        <td><?= $complaint['complaint_id'] ?></td>
                                        <td><?= htmlspecialchars($complaint['first_name'] . ' ' . $complaint['last_name']) ?></td>
                                        <td><small><?= htmlspecialchars($complaint['mobile']) ?></small></td>
                                        <td><?= htmlspecialchars($complaint['subject']) ?></td>
                                        <td><?= htmlspecialchars($complaint['message']) ?></td>
                                        <td><?= htmlspecialchars($complaint['complaint_type']) ?></td>
                                        <td>
                                            <?php
                                                $badgeClass = 'badge-info';
                                                $statusText = '';
                                                if($complaint['status'] == 0) {
                                                    $badgeClass = 'badge-warning';
                                                    $statusText = 'Unseen';
                                                } elseif($complaint['status'] == 1) {
                                                    $badgeClass = 'badge-info';
                                                    $statusText = 'Seen';
                                                } elseif($complaint['status'] == 2) {
                                                    $badgeClass = 'badge-success';
                                                    $statusText = 'Resolved';
                                                }
                                            ?>
                                            <span class="badge <?= $badgeClass ?>"><?= $statusText ?></span>
                                        </td>
                                        <td><?= $complaint['created_at'] ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="view_complaint.php?id=<?= $complaint['complaint_id'] ?>" class="btn btn-view"><i class="fas fa-eye"></i></a>
                                                <a href="delete_complaint.php?id=<?= $complaint['complaint_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="9" style="text-align:center;">No complaints found</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- content -->
</main>

<!-- Styles -->
<style>
.table-container { overflow-x: auto; }
table { width: 100%; border-collapse: collapse; }
th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
th { background-color: #f2f2f2; font-weight: bold; }
.badge { padding: 5px 10px; border-radius: 15px; font-size: 0.85rem; }
.badge-success { background-color: #e6f4ee; color: #0d6832; }
.badge-warning { background-color: #fff8e6; color: #b38700; }
.badge-info { background-color: #e6f4ff; color: #0066cc; }
.btn { padding: 6px 12px; border-radius: 5px; text-decoration: none; color: white; display: inline-flex; align-items: center; gap: 4px; }
.btn-view { background-color: #17a2b8; }
.btn-delete { background-color: #dc3545; }
.action-buttons { display: flex; gap: 5px; }
</style>
