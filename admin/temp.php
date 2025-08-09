<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indus Services - Admin Panel</title>
    <link rel="stylesheet" href="http://localhost/indus-services/assets/css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Indus Services</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                
                <h3>Management</h3>
                <li>
                    <a href="#" onclick="toggleSubmenu('orders')"><i class="fas fa-box-open"></i> Orders <i class="fas fa-chevron-down float-right" style="float: right; font-size: 0.8rem;"></i></a>
                    <ul id="orders" class="submenu">
                        <li><a href="#">New Orders</a></li>
                        <li><a href="#">Processing</a></li>
                        <li><a href="#">Completed</a></li>
                        <li><a href="#">Cancelled</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" onclick="toggleSubmenu('services')"><i class="fas fa-tools"></i> Services <i class="fas fa-chevron-down float-right" style="float: right; font-size: 0.8rem;"></i></a>
                    <ul id="services" class="submenu">
                        <li><a href="#">All Services</a></li>
                        <li><a href="#">Add New</a></li>
                        <li><a href="#">Categories</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" onclick="toggleSubmenu('complaints')"><i class="fas fa-exclamation-circle"></i> Complaints <i class="fas fa-chevron-down float-right" style="float: right; font-size: 0.8rem;"></i></a>
                    <ul id="complaints" class="submenu">
                        <li><a href="#">New</a></li>
                        <li><a href="#">In Progress</a></li>
                        <li><a href="#">Resolved</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>