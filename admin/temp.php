<script>
function checkNotifications() {
    fetch("get_notifications.php")
        .then(response => response.text())
        .then(count => {
            count = parseInt(count.trim()) || 0; // ensure it's a number

            if (count > 0) {
                document.title = `(${count}) Indus Services - Admin Panel`;

                // Play sound if new orders come
                if (!window.lastCount || count > window.lastCount) {
                    let audio = new Audio("assets/mixkit-tile-game-reveal-960.wav");
                    audio.play();
                }
            } else {
                document.title = "Indus Services - Admin Panel";
            }

            window.lastCount = count; // store last count
        })
        .catch(error => console.error("Error fetching notifications:", error));
}

// Run every 5 seconds
setInterval(checkNotifications, 5000);
checkNotifications(); // run immediately
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pageTitle">Indus Services - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--Font awesome cdn--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <style>
        :root {
            --primary: #fdc411;
            --primary-dark: #e6b00e;
            --secondary: #2c3e50;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --danger: #e74c3c;
            --warning: #f39c12;
            --info: #3498db;
            --text: #333333;
            --text-light: #7f8c8d;
            --border: #dfe6e9;
            --sidebar-width: 250px;
            --header-height: 70px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Roboto', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: var(--text);
            overflow-x: hidden;
        }

        /* Layout */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--secondary);
            color: white;
            position: fixed;
            height: 100vh;
            transition: var(--transition);
            z-index: 1000;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            color: var(--primary);
            font-weight: 700;
            font-size: 24px;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .sidebar-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            margin: 5px 0 0;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            border-left: 4px solid transparent;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(253, 196, 17, 0.1);
            color: white;
            border-left: 4px solid var(--primary);
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .menu-item.active {
            color: var(--primary);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
        }

        /* Header */
        .header {
            height: var(--header-height);
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left h1 {
            font-size: 24px;
            color: var(--secondary);
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            border: 2px solid var(--primary);
        }

        .user-info h4 {
            font-size: 14px;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .user-info p {
            font-size: 12px;
            color: var(--text-light);
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        /* Content Area */
        .content {
            padding: 25px;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            display: flex;
            align-items: center;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: rgba(253, 196, 17, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary);
            font-size: 24px;
        }

        .stat-info h3 {
            font-size: 24px;
            margin: 0;
            color: var(--secondary);
            font-family: 'Roboto', sans-serif;
        }

        .stat-info p {
            margin: 5px 0 0;
            color: var(--text-light);
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
        }

        /* Charts and Tables */
        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .chart-container, .recent-orders {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            height: 380px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
        }

        .section-header h2 {
            font-size: 18px;
            color: var(--secondary);
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        .chart-canvas-container {
            height: 300px;
            position: relative;
        }

        /* Table */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th, .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border);
            font-family: 'Poppins', sans-serif;
        }

        .data-table th {
            background-color: #f8f9fa;
            color: var(--secondary);
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
        }

        .data-table tr:hover {
            background-color: #f8f9fa;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        .status-completed {
            background: rgba(39, 174, 96, 0.1);
            color: var(--success);
        }

        .status-pending {
            background: rgba(243, 156, 18, 0.1);
            color: var(--warning);
        }

        .status-cancelled {
            background: rgba(231, 76, 60, 0.1);
            color: var(--danger);
        }
        
        .form-control {
            width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 8px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .row {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }

        /* Toggle button for mobile */
        .menu-toggle {
            display: none;
            background: var(--primary);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            margin-right: 15px;
        }

        @media (max-width: 992px) {
            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
        
        
/* Panel Default Styles */
.panel-default {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    overflow: hidden;
}

/* Panel Heading */
.panel-heading {
    background: #fdc411;
    color: white;
    padding: 15px 20px;
    border-bottom: 1px solid #e0e0e0;
}

.panel-heading h3 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 600;
}

/* Panel Body */
.panel-body {
    padding: 20px;
    background: #fafafa;
}

/* Table Styles */
.table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
}

.table th,
.table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #495057;
    border-top: 1px solid #e0e0e0;
}

.table tr:hover {
    background-color: #f8f9fa;
}

/* Badge Styles */
.badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 500;
}

.badge-warning {
    background-color: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.badge-info {
    background-color: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
}

.badge-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

/* Responsive Table */
@media (max-width: 768px) {
    .panel-body {
        padding: 15px;
        overflow-x: auto;
    }
    
    .table {
        min-width: 600px;
    }
    
    .table th,
    .table td {
        padding: 8px 10px;
        font-size: 0.9rem;
    }
}

/* Alternate row coloring for better readability */
.table tr:nth-child(even) {
    background-color: #fafafa;
}

.table tr:nth-child(even):hover {
    background-color: #f1f3f5;
}


/* Navigation Tabs */
.nav-tabs {
    display: flex;
    list-style: none;
    border-bottom: 2px solid #e2e8f0;
    margin-bottom: 20px;
    padding: 0;
    flex-wrap: wrap;
}

.nav-tabs li {
    margin-right: 5px;
    margin-bottom: 5px;
}

.nav-tabs a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #4a5568;
    font-weight: 500;
    border-radius: 5px 5px 0 0;
    transition: all 0.3s;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-bottom: none;
}

.nav-tabs a:hover {
    background: #edf2f7;
    color: #2d3748;
}

.nav-tabs a.active {
    background: #fff;
    color: #2d3748;
    border-bottom: 3px solid #4299e1;
    position: relative;
    top: 1px;
    margin-bottom: -1px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .nav-tabs {
        flex-wrap: wrap;
    }
    
    .nav-tabs li {
        margin-bottom: 5px;
    }
    
    .nav-tabs a {
        padding: 8px 12px;
        font-size: 0.9rem;
    }
}
.btn-yellow {
    padding: 8px;
    margin-top: 10px;
    border: 0px;
    background: #fdc411;
    border-radius: 5px;
    color: #fff;
}


/* Form Layout Styles */
.form-row {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.form-group {
    padding: 0 10px;
    margin-bottom: 15px;
    width: 100%;
}

/* Two columns on medium screens and up */
@media (min-width: 768px) {
    .form-group.col-6 {
        width: 50%;
    }
}

/* Form element styling */
.form-control {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    margin-top: 5px;
}

.form-label {
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

.btn {
    background-color: #fdc411;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    margin: 10px;
}

.btn:hover {
    background-color: #fdc411;
}

/* Panel styling */
.panel {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.panel-heading {
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
}

.panel-heading h3 {
    margin: 0;
    font-size: 18px;
}

.panel-body {
    padding: 20px;
}

.btn-assign {
    background-color: #fdc411;
    padding: 10px;
    color: #fff;
    text-decoration: none;
}

.btn-details {
        background-color: #2c3e50;
    padding: 10px;
    color: #fff;
    text-decoration: none;
}
.btn-delete {
    background: red;
    padding: 10px;
    color: #fff;
    border-radius: 5px;
}



/* Notifications */
.notifications {
    position: relative;
    margin-right: 20px;
    cursor: pointer;
    font-size: 18px;
    color: #000;
}

.notifications:hover {
    color: #000;
}

.notifications .badge {
    position: absolute;
    top: -5px;
    right: -10px;
    background: #e74c3c;
    color: #fff;
    font-size: 10px;
    font-weight: bold;
    padding: 2px 5px;
    border-radius: 50%;
}


    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Indus Services</h2>
                <p>Admin Panel</p>
            </div>
            
            <nav class="sidebar-menu">
                <a href="<?= base_url()?>admin/dashboard.php" class="menu-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="<?= base_url()?>admin/order.php" class="menu-item">
                    <i class="fas fa-shopping-cart"></i>
                    <span>All Orders</span>
                </a>
                <a href="<?= base_url()?>admin/manullay-order.php" class="menu-item">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Manullay Order</span>
                </a>
                <a href="<?= base_url()?>admin/reschedule.php" class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Reschedule Order</span>
                </a>
                <a href="<?= base_url()?>admin/technician-job.php" class="menu-item">
                    <i class="fas fa-tools"></i>
                    <span>Technician Job</span>
                </a>
                <a href="<?= base_url()?>admin/complaints.php" class="menu-item">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>All Complaints</span>
                </a>
                <a href="<?= base_url()?>signout" class="menu-item">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>