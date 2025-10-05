<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indus Services - Super Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url()?>assets/css/panel.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2 class="heading">Indus Services</h2>
                <p>Super Admin Panel</p>
            </div>
            
            <div class="sidebar-menu">
                <a href="<?= base_url()?>super/dashboard.php" class="menu-item">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="<?= base_url()?>super/order.php" class="menu-item">
                    <i class="fas fa-list-alt"></i>
                    <span>All Orders</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Rescheduled Orders</span>
                </a>
                <a href="<?= base_url()?>super/review.php" class="menu-item">
                    <i class="fas fa-star"></i>
                    <span>All Order Reviews</span>
                </a>
                <a href="<?= base_url()?>super/complaints.php" class="menu-item">
                    <i class="fas fa-ticket-alt"></i>
                    <span>All Complaints</span>
                </a>
                <a href="<?= base_url()?>super/services.php" class="menu-item">
                    <i class="fas fa-th-large"></i>
                    <span>Services</span>
                </a>
                <a href="<?= base_url()?>super/city.php" class="menu-item">
                    <i class="fas fa-city"></i>
                    <span>Cities List</span>
                </a>
                <a href="<?= base_url()?>super/blog.php" class="menu-item">
                    <i class="fas fa-blog"></i>
                    <span>Blogs List</span>
                </a>
                <a href="<?= base_url()?>super/discount.php" class="menu-item">
                    <i class="fas fa-percent"></i>
                    <span>Discount Settings</span>
                </a>
                <a href="<?= base_url()?>super/buffer.php" class="menu-item">
                    <i class="fas fa-hourglass-half"></i>
                    <span>Buffer Time Settings</span>
                </a>
                <a href="<?= base_url()?>super/technique.php" class="menu-item">
                    <i class="fa-solid fa-hammer"></i>
                    <span>Technique</span>
                </a>
                <a href="<?= base_url()?>super/role.php" class="menu-item">
                    <i class="fas fa-user-tag"></i>
                    <span>Roles</span>
                </a>
                <a href="<?= base_url()?>signout.php" class="menu-item">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <h2 style="font-weight: bold;">Dashboard</h2>
                
                <div class="user-profile">
                    <div class="user-img">JS</div>
                    <div class="user-info">
                        <h4>DEMO</h4>
                        <p>Super Admin</p>
                    </div>
                </div>
            </div>
