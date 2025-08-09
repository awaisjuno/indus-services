<?php 
    include '../config/config.php';
    include 'temp.php';

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id <= 0) {
        die("Invalid ID");
    }

    $sel = "SELECT * FROM category WHERE category_id = $id";
    $run = mysqli_query($con, $sel);
    $row = mysqli_fetch_assoc($run);
?>

<div class="main-content">
    <div class="header">
        <h1>Categories Management</h1>
        <div class="user-info">
            <img src="<?= base_url()?>assets/img/user.png" alt="User">
            <span>Admin User</span>
        </div>
    </div>

    <div class="form-container">
        <h2 class="margin-bottom">Edit New Category</h2>
        <form method="POST">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['category_name']) ?>" id="category_name" name="category_name" required>
            </div>
            
            <button type="submit" name="update" class="btn btn-primary">Edit Category</button>
        </form>

        <?php 
            if (isset($_POST['update'])) {
                $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
                $update = "UPDATE category SET category_name = '$category_name' WHERE category_id = $id";
                $run = mysqli_query($con, $update);
                if ($run) {
                    echo "<script>alert('Successfully Updated.')</script>";
                    echo "<script>window.open('http://localhost/indus-services/admin/services', '_self')</script>";
                } else {
                    echo "<script>alert('Update failed: " . mysqli_error($con) . "');</script>";
                }
            }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>
