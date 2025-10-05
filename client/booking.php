<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';

    // Get logged-in user ID (from session)
    $user_id = $_SESSION['user_id'];

    // Fetch orders of this user (without order_assign and technician join)
    $sel = "
        SELECT 
            o.order_id,
            o.selected_date,
            o.selected_time,
            o.status,
            o.price,
            o.payment_mode,
            o.is_assgin,
            s.sub_category,
            u.first_name AS customer_first_name,
            u.last_name AS customer_last_name,
            u.mobile AS customer_mobile,
            c.city_name
        FROM `order` o
        LEFT JOIN user_detail u ON o.user_id = u.user_id
        LEFT JOIN sub_category s ON o.sub_id = s.sub_id
        LEFT JOIN order_detail od ON o.order_id = od.order_id
        LEFT JOIN city c ON od.city = c.city_id
        WHERE o.user_id = '$user_id'
        ORDER BY o.order_id DESC
    ";


    $run = mysqli_query($con, $sel) or die("Query Error: " . mysqli_error($con));
?>

    <div class="page-title">
        <div>
            <h1>My Bookings</h1>
            <p>View and manage all your service bookings</p>
        </div>
        <a href="<?= base_url()?>" class="action-btn btn-primary">
            <i class="fas fa-plus"></i> New Booking
        </a>
    </div>

    <div class="bookings-list">
        <?php if(mysqli_num_rows($run) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($run)): ?>
                <div class="booking-card">
                    <div class="booking-header">
                        <div class="booking-id"> <?= $row['order_id']?> <?= date("Ymd", strtotime($row['selected_date'])) . $row['order_id']; ?></div>
                        <div class="booking-date">
                            <i class="far fa-calendar-alt"></i> Booked on: <?= htmlspecialchars($row['selected_date']) ?>
                        </div>
                    </div>
                    <div class="booking-body">
                        <div class="booking-service">
                            <div class="service-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="service-info">
                                <h3><?= htmlspecialchars($row['sub_category']) ?></h3>
                            </div>
                        </div>
                        <div class="booking-details">
                            <div class="detail-item">
                                <div class="detail-icon"><i class="fas fa-calendar-day"></i></div>
                                <div class="detail-content"><strong>Date:</strong> <?= htmlspecialchars($row['selected_date']) ?></div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-icon"><i class="fas fa-clock"></i></div>
                                <div class="detail-content"><strong>Time:</strong> <?= htmlspecialchars($row['selected_time']) ?></div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="detail-content"><strong>City:</strong> <?= htmlspecialchars($row['city_name']) ?></div>
                            </div>
                        </div>
                        <div class="booking-status">
                            <?php 
                            // Map database status values to text + CSS class
                            $statusLabels = [
                                0 => 'Pending',
                                1 => 'Confirmed',
                                2 => 'Completed'
                            ];

                            $statusClasses = [
                                0 => 'status-pending',
                                1 => 'status-confirmed',
                                2 => 'status-completed'
                            ];

                            // Ensure we always get a valid label/class (fallback: Pending)
                            $currentStatus = (int)$row['status'];
                            $statusText = $statusLabels[$currentStatus] ?? 'Pending';
                            $statusClass = $statusClasses[$currentStatus] ?? 'status-pending';
                            ?>

                            <span class="status-badge <?= $statusClass; ?>">
                                <?= htmlspecialchars($statusText) ?>
                            </span>

                        </div>
                    </div>
                    <div class="booking-footer">
                        <div class="technician-info">
                            <strong>Technician:</strong>
                            <?php 
                                if (!$row['is_assgin']== '') { 

                                    $order_id = $row['order_id'];

                                    // Fetch assigned technicians for this order
                                    $user = "
                                        SELECT ud.first_name, ud.last_name 
                                        FROM order_assign oa
                                        INNER JOIN user_detail ud ON oa.user_id = ud.user_id
                                        WHERE oa.order_id = '$order_id'
                                    ";
                                    $run = mysqli_query($con, $user);

                                    // Check if any technician is assigned
                                    if (mysqli_num_rows($run) > 0) {
                                        while ($tech = mysqli_fetch_assoc($run)) {
                                            echo $tech['first_name'] . ' ' . $tech['last_name'] . "<br>";
                                        }
                                    } else {
                                        echo "<span>Not Assigned</span>";
                                    }
 
                                }
                            ?>
                        </div>
                        <div class="booking-actions">
                            <a href="<?= base_url() ?>client/rescheduled.php?id=<?= $row['order_id'] ?>" 
                                   class="action-btn btn-secondary">
                                   <i class="fas fa-edit"></i> Reschedule
                            </a>

                            <a href="<?= base_url() ?>client/canceled.php?order_id=<?= $row['order_id'] ?>" class="action-btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <a href="<?= base_url() ?>client/view_order.php?order_id=<?= $row['order_id'] ?>" class="action-btn btn-primary">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No bookings found</p>
        <?php endif; ?>
    </div>

<?php include 'footer.php'; ?>
