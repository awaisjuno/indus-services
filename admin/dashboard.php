<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
    //$user = checkRole(['admin']);
    
?>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Dashboard</h1>
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


<!-- Content Area -->
            <div class="content">
                <!-- Dashboard Cards -->
                <div class="dashboard-cards">
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-info">
                            <h3>152</h3>
                            <p>Total Orders</p>
                        </div>
                    </div>
                    
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="stat-info">
                            <h3>28</h3>
                            <p>Pending Quotes</p>
                        </div>
                    </div>
                    
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>5</h3>
                            <p>Open Complaints</p>
                        </div>
                    </div>
                    
                    <div class="card stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stat-info">
                            <h3>12</h3>
                            <p>Rescheduled Orders</p>
                        </div>
                    </div>
                </div>

                <!-- Traffic and Orders Charts -->
                <div class="row">
                    <div class="chart-container">
                        <div class="section-header">
                            <h2>Website Traffic</h2>
                            <a href="#" class="view-all">View Report</a>
                        </div>
                        <div class="chart-canvas-container">
                            <canvas id="trafficChart"></canvas>
                        </div>
                    </div>
                    
                    <div class="chart-container">
                        <div class="section-header">
                            <h2>Orders Overview</h2>
                            <a href="#" class="view-all">View Report</a>
                        </div>
                        <div class="chart-canvas-container">
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            
<?php include 'footer.php';?>