<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';

    // Get booking ID from query string
    if (!isset($_GET['id'])) {
        die("Invalid request");
    }
    $order_id = intval($_GET['id']);

    // Fetch booking details
    $sql = "SELECT o.order_id, o.selected_date, o.selected_time, s.sub_category
            FROM `order` o
            LEFT JOIN sub_category s ON o.sub_id = s.sub_id
            WHERE o.order_id='$order_id' AND o.user_id='{$_SESSION['user_id']}'";
    $run = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($run);

    if (!$row) {
        die("Booking not found.");
    }
?>

<div class="panel-default">
    <div class="panel-header">
        <h2 class="panel-title">Reschedule Booking</h2>
    </div>
    <div class="panel-body">
        <?php if (!empty($success_msg)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?= $success_msg ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error_msg)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?= $error_msg ?>
            </div>
        <?php endif; ?>

        <form id="rescheduleForm" action="" method="POST">
            <!-- Hidden booking ID -->
            <input type="hidden" name="order_id" value="<?= $row['order_id'] ?>">

            <div class="form-group">
                <label class="form-label">Service</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['sub_category']) ?>" disabled>
            </div>

            <div class="form-group">
                <label class="form-label">Current Date</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['selected_date']) ?>" disabled>
            </div>

            <div class="form-group">
                <label class="form-label">Current Time</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['selected_time']) ?>" disabled>
            </div>

            <div class="form-group">
                <label class="form-label">New Date *</label>
                <input type="date" class="form-control" name="new_date" required>
            </div>

            <div class="form-group">
                <label class="form-label">New Time *</label>
                <input type="time" class="form-control" name="new_time" required>
            </div>

            <div class="form-group">
                <label class="form-label">Reason (Optional)</label>
                <textarea name="reason" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-block">Update Booking</button>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $order_id = intval($_POST['order_id']);
                $new_date = mysqli_real_escape_string($con, $_POST['new_date']);
                $new_time = mysqli_real_escape_string($con, $_POST['new_time']);
                $reason   = mysqli_real_escape_string($con, $_POST['reason']);

                $update = "UPDATE `order` 
                           SET selected_date='$new_date', selected_time='$new_time', status='Rescheduled'
                           WHERE order_id='$order_id' AND user_id='{$_SESSION['user_id']}'";

                if (mysqli_query($con, $update)) {
                    $success_msg = "Booking rescheduled successfully!";
                } else {
                    $error_msg = "Error updating booking: " . mysqli_error($con);
                }
            }
        ?>
    </div>
</div>

<script>
document.getElementById('rescheduleForm').addEventListener('submit', function(e){
    const newDate = document.querySelector("[name='new_date']").value;
    const newTime = document.querySelector("[name='new_time']").value;

    if(!newDate || !newTime){
        e.preventDefault();
        alert("Please select new date and time");
    }
});
</script>
