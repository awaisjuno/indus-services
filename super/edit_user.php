<?php 

    $user_id = $_GET['id'];
    include '../config/config.php';
    include 'temp.php';

    // Fetch User
    $user = "SELECT * FROM user WHERE user_id = '$user_id'";
    $run = mysqli_query($con, $user);
    $row = mysqli_fetch_assoc($run);

    // Update Role
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_role = $_POST['role'];
        $update = "UPDATE user SET role = '$new_role' WHERE user_id = '$user_id'";
        if (mysqli_query($con, $update)) {
            echo "<script>alert('Role Updated Successfully'); window.location='user.php';</script>";
        } else {
            echo "<script>alert('Error Updating Role');</script>";
            echo "<script>alert('Role Updated Successfully'); window.location='user.php';</script>";
        }
    }

?>

<div class="card">
    <div class="card-header">
        <h3>Change Role of User</h3>
    </div>
    
    <div class="card-body">
        <form method="POST">
            
            <div class="form-group">
                <label class="form-label required">User Email</label>
                <input type="text" class="form-input" value="<?= htmlspecialchars($row['email']); ?>" readonly>
            </div>
            
            <div class="form-group mt-3">
                <label class="form-label required">Change Role</label>
                <select name="role" class="form-input" required>
                    <option value="">-- Select Role --</option>
                    <option value="technician" <?= ($row['role'] == 'Technician') ? 'selected' : ''; ?>>Technician</option>
                    <option value="admin" <?= ($row['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                </select>
            </div>
            
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Update Role</button>
            </div>
            
        </form>
    </div>
</div>
