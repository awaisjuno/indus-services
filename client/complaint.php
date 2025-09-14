<?php

        session_start();
        include '../config/config.php';
        include '../config/session.php';
        include 'temp.php';

        $success_msg = $error_msg = '';

        if (isset($_POST['submit'])) {
            $user_id        = $_SESSION['user_id'];
            $subject        = mysqli_real_escape_string($con, trim($_POST['subject']));
            $message        = mysqli_real_escape_string($con, trim($_POST['message']));
            $complaint_type = mysqli_real_escape_string($con, trim($_POST['complaint_type']));

            // Insert complaint
            $sql = "INSERT INTO complaints (user_id, subject, message, complaint_type) 
                    VALUES ('$user_id', '$subject', '$message', '$complaint_type')";
            
            if (mysqli_query($con, $sql)) {
                $success_msg = "Your complaint has been submitted successfully!";
            } else {
                $error_msg = "Error: " . mysqli_error($con);
            }
        }

        // Fetch complaints of logged-in user
        $user_id = $_SESSION['user_id'];
        $query   = "SELECT * FROM complaints WHERE user_id = '$user_id' AND is_delete = '0' ORDER BY created_at DESC";
        $result  = mysqli_query($con, $query);
?>


<style>
    /* Panel Styling */
.panel-default {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.08);
    background: #fff;
    margin: 0;         /* remove outer margin */
    padding: 0;        /* remove inner padding */
}

.panel-header {
    padding: 8px 12px; /* reduced padding */
    border-bottom: 1px solid #eee;
    background: #f9f9f9;
    border-radius: 10px 10px 0 0;
    margin: 0;
}

.panel-title {
    margin: 0;
    font-size: 16px;   /* slightly smaller */
    font-weight: 600;
    color: #333;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;         /* remove margin */
    font-size: 13px;   /* smaller font */
    border-radius: 10px;
    overflow: hidden;
}

.table thead {
    background: #f0f0f0; /* light gray instead of blue */
    color: #333;
}

.table thead th {
    padding: 8px 10px;  /* compact padding */
    text-align: left;
    font-weight: 600;
    font-size: 13px;
}

.table tbody tr {
    border-bottom: 1px solid #eee;
    transition: background 0.2s;
}

.table tbody tr:hover {
    background: #fafafa;
}

.table td {
    padding: 8px 10px;  /* compact padding */
    vertical-align: top;
    color: #333;
}

/* Status Badges */
.badge {
    padding: 4px 8px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 600;
    display: inline-block;
    min-width: 60px;
    text-align: center;
}

</style>


<div class="panel-default">
    <div class="panel-header">
        <h2 class="panel-title">Submit Complaint</h2>
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

        <form id="complaintForm" action="" method="POST">
            <div class="form-group">
                <label class="form-label">Subject *</label>
                <input type="text" name="subject" id="subject" class="form-control" required>
            </div>
            
<div class="form-group">
    <label>Order *</label>
    <select class="form-control" name="order_id" required>
        <option value="">-- Select Order --</option>
        <?php 
        $user_id = $_SESSION['user_id'];
        $sel = "SELECT order_id, code, selected_date, status 
                FROM `order` 
                WHERE user_id='$user_id'";
        $run = mysqli_query($con, $sel);

        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_assoc($run)) {
                $label = "Order #" . $row['order_id'] . " - " . $row['code'] . " (" . $row['selected_date'] . ")";
                echo "<option value='". $row['order_id'] ."'>". $label ."</option>";
            }
        } else {
            echo "<option value=''>No orders found</option>";
        }
        ?>
    </select>
</div>


            <div class="form-group">
                <label class="form-label">Complaint Type *</label>
                <select name="complaint_type" id="complaint_type" class="form-control" required>
                    <option value="">-- Select Type --</option>
                    <option value="Service">Service</option>
                    <option value="Billing">Billing</option>
                    <option value="Technical">Technical</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Message *</label>
                <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-block">Submit Complaint</button>
        </form>
    </div>
</div>

<!-- ====================== Complaint List Panel ====================== -->
<div class="panel-default" style="margin-top:20px;">
    <div class="panel-header">
        <h2 class="panel-title">My Complaints</h2>
    </div>
    <div class="panel-body">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Subject</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['complaint_id'] ?></td>
                        <td><?= htmlspecialchars($row['subject']) ?></td>
                        <td><?= htmlspecialchars($row['complaint_type']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                        <td>
                            <?php 
                                if ($row['status'] == 0) echo "<span class='badge badge-warning'>Unseen</span>";
                                elseif ($row['status'] == 1) echo "<span class='badge badge-info'>Seen</span>";
                                elseif ($row['status'] == 2) echo "<span class='badge badge-success'>Resolved</span>";
                            ?>
                        </td>
                        <td><?= date("d M Y h:i A", strtotime($row['created_at'])) ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No complaints submitted yet.</p>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('complaintForm');
    form.addEventListener('submit', function(e) {
        const subject = document.getElementById('subject').value.trim();
        const type = document.getElementById('complaint_type').value.trim();
        const message = document.getElementById('message').value.trim();

        if (!subject || !type || !message) {
            e.preventDefault();
            alert("Please fill in all fields before submitting.");
        }
    });
});
</script>
