<?php 

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';

    $order_id = $_GET['order_id'];


    $sql = "
    SELECT 
        o.*, 
        u.*, 
        ud.*, 
        s.*
    FROM `order` AS o
    JOIN `user` AS u ON o.user_id = u.user_id
    JOIN `user_detail` AS ud ON u.user_id = ud.user_id
    JOIN `sub_category` AS s ON o.sub_id = s.sub_id
    WHERE o.order_id = '$order_id'
    ";

    $result = mysqli_query($con, $sql);

    $order = mysqli_fetch_assoc($result);

?>

<style>
            .content {
            padding: 30px;
        }

        .page-title {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title h1 {
            font-size: 28px;
            color: var(--dark);
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .page-title p {
            color: #6c757d;
            font-size: 16px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
        }

        /* Order Details Styles */
        .order-details-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .order-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 25px;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f1f1f1;
        }

        .order-id {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
        }

        .order-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .status-confirmed {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
        }

        .order-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-group {
            margin-bottom: 20px;
        }

        .info-label {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .info-value {
            font-size: 16px;
            color: var(--dark);
            font-weight: 600;
        }

        .customer-section {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
            padding-top: 15px;
            border-top: 1px solid #f1f1f1;
        }

        .customer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            background: #f5f7f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 20px;
        }

        .customer-info h3 {
            font-size: 18px;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .customer-info p {
            color: #6c757d;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .service-section {
            margin-top: 25px;
        }

        .service-card {
            display: flex;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .service-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(253, 196, 17, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 20px;
        }

        .service-details h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .service-details p {
            color: #6c757d;
            font-size: 14px;
            line-height: 1.5;
        }

        .timeline-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .timeline-title {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--dark);
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline:before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 25px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -30px;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--secondary);
            border: 4px solid white;
            box-shadow: 0 0 0 2px var(--secondary);
        }

        .timeline-content {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
        }

        .timeline-date {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        .timeline-text {
            font-size: 15px;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .timeline-status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--secondary);
            color: var(--primary);
            border-color: var(--secondary);
        }

        .btn-primary:hover {
            background: #f9a602;
            border-color: #f9a602;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: white;
            color: #6c757d;
        }

        .btn-secondary:hover {
            background: #f8f9fa;
            color: var(--dark);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .order-details-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                text-align: center;
            }
            
            .sidebar-header h2, .sidebar-header p, .user-profile-sidebar, .menu-item span {
                display: none;
            }
            
            .menu-item i {
                margin-right: 0;
                font-size: 18px;
            }
            
            .main-content {
                margin-left: 70px;
                width: calc(100% - 70px);
            }
            
            .search-box {
                width: 200px;
            }
        }
        
        @media (max-width: 768px) {
            .header {
                padding: 0 15px;
            }
            
            .search-box {
                width: 150px;
            }
            
            .content {
                padding: 15px;
            }
            
            .user-info {
                display: none;
            }

            .page-title {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .order-info-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
        
</style>

            <!-- Content Area -->
                <div class="page-title">
                    <div>
                        <h1>Order Details</h1>
                        <p>View detailed information about your service order</p>
                    </div>
                    <a href="https://guestly.pk/indus/client/booking.php" class="back-button">
                        <i class="fas fa-arrow-left"></i> Back to Orders
                    </a>
                </div>

                <div class="order-details-container">
                    <div class="left-column">
                        <!-- Order Information Card -->
                        <div class="order-card">
                            <div class="order-header">
                                <div class="order-id">Order #IN789456</div>
                                <div class="order-status status-confirmed">Confirmed</div>
                            </div>
                            
                            <div class="order-info-grid">
                                <div class="info-group">
                                    <div class="info-label">Order Name</div>
                                    <div class="info-value"><?= $order['sub_category']?></div>
                                </div>
                                
                                <div class="info-group">
                                    <div class="info-label">Order Date</div>
                                    <div class="info-value"><?= $order['selected_date']?></div>
                                </div>
                                
                                <div class="info-group">
                                    <div class="info-label">Service Time</div>
                                    <div class="info-value"><?= $order['selected_time']?></div>
                                </div>
                                
                                <div class="info-group">
                                    <div class="info-label">Service Duration</div>
                                    <div class="info-value"></div>
                                </div>
                                
                                <div class="info-group">
                                    <div class="info-label">Service Frequency</div>
                                    <div class="info-value">One-time</div>
                                </div>
                                
                                <div class="info-group">
                                    <div class="info-label">Payment Method</div>
                                    <div class="info-value">Credit Card</div>
                                </div>
                                
                                <div class="info-group">
                                    <div class="info-label">Payment Status</div>
                                    <div class="info-value">Paid</div>
                                </div>
                                
                                <div class="info-group">
                                    <div class="info-label">Total Amount</div>
                                    <div class="info-value"><?= $order['price']?> AED</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Service Information Card -->
                        <div class="order-card">
                            <div class="order-header">
                                <div class="order-id">Service Information</div>
                            </div>
                            
                            <div class="service-section">
                                <div class="service-card">
                                    <div class="service-icon">
                                        <i class="fas fa-broom"></i>
                                    </div>
                                    <div class="service-details">
                                        <h3><?= $order['sub_category']?></h3>
                                        <p><?= $order['description']?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="action-buttons">
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Reschedule Order
                                </a>
                                <a href="#" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel Order
                                </a>
                                <a href="#" class="btn btn-secondary">
                                    <i class="fas fa-file-invoice"></i> Download Invoice
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="right-column">
                        <!-- Order Timeline Card -->
                        <div class="timeline-card">
                            <h3 class="timeline-title">Order Timeline</h3>
                            
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-date">Oct 10, 2023 - 2:30 PM</div>
                                        <div class="timeline-text">Order placed successfully</div>
                                        <span class="timeline-status status-confirmed">Completed</span>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-date">Oct 11, 2023 - 9:15 AM</div>
                                        <div class="timeline-text">Payment confirmed</div>
                                        <span class="timeline-status status-confirmed">Completed</span>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-date">Oct 12, 2023 - 4:45 PM</div>
                                        <div class="timeline-text">Service professional assigned</div>
                                        <span class="timeline-status status-confirmed">Completed</span>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-date">Oct 15, 2023 - 10:00 AM</div>
                                        <div class="timeline-text">Service in progress</div>
                                        <span class="timeline-status status-confirmed">In Progress</span>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <div class="timeline-date">Oct 15, 2023 - 12:00 PM</div>
                                        <div class="timeline-text">Service completion</div>
                                        <span class="timeline-status">Pending</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>

    <script>
        // Simple JavaScript for demonstration purposes
        document.addEventListener('DOMContentLoaded', function() {
            // You can add interactivity here if needed
            console.log('Order details page loaded');
        });
    </script>
</body>
</html>