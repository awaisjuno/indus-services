<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indus Services - User Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url()?>assets/css/client.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="<?= base_url()?>assets/img/logoi.png" class="header_logo" alt="Logo" />
            </div>
            
            <div class="user-profile-sidebar">

                <img src="<?= base_url()?>assets/img/<?= $row['img']?>" class="user-img" alt="User Img" />
                <div class="user-info-sidebar">
                    <h3><?= $row['first_name']?> <?= $row['last_name']?></h3>
                    <p>Premium Member</p>
                </div>
            </div>
            
            <div class="sidebar-menu">
                <a href="<?= base_url()?>client/dashboard.php" class="menu-item active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="<?= base_url()?>client/booking.php" class="menu-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>My Bookings</span>
                </a>
                <a href="<?= base_url()?>client/edit_profile.php" class="menu-item">
                    <i class="fas fa-user-edit"></i>
                    <span>Edit Profile</span>
                </a>
                <a href="<?= base_url()?>client/review.php" class="menu-item">
                    <i class="fas fa-star"></i>
                    <span>My Reviews</span>
                </a>
                <a href="<?= base_url()?>client/complaint.php" class="menu-item">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Complaints</span>
                </a>
                <a href="<?= base_url()?>client/password.php" class="menu-item">
                    <i class="fas fa-key"></i>
                    <span>Change Password</span>
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
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search for services...">
                </div>
                
                <div class="header-actions">
                    <div class="notification-bell">
                        <i class="fas fa-bell"></i>
                        <span class="notification-count">3</span>
                    </div>
                    
                    <div class="user-profile">
                        <img src="<?= base_url()?>assets/img/<?= $row['img']?>" class="menu-icon-user" alt="Img" />
                        <div class="user-info">
                            <h4><?= $row['first_name']?> <?= $row['last_name']?></h4>
                            <p>Premium User</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content">
