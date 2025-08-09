<?php 
    include '../config/config.php';
    include 'temp.php'; 
    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
        
        $query = "INSERT INTO category (category_name) VALUES ('$category_name')";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            echo "<script>alert('Category added successfully!');</script>";
        } else {
            echo "<script>alert('Error adding category: " . mysqli_error($con) . "');</script>";
        }
    }
    
    // Fetch existing categories
    $categories = mysqli_query($con, "SELECT * FROM category WHERE is_delete = '0' ORDER BY category_name");
?>

<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Categories Management</h1>
        <div class="user-info">
            <img src="<?= base_url()?>assets/img/user.png" alt="User">
            <span>Admin User</span>
        </div>
    </div>

    <div class="tabs">
        <button class="tab-btn active">Categories</button>
    </div>

    <!-- Add Category Form -->
    <div class="form-container">
        <h2 class="margin-bottom">Add New Category</h2>
        <form method="POST">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>

    <!-- Categories List -->
    <div class="table-container">
        <h2 class="margin-bottom">Existing Categories</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($category = mysqli_fetch_assoc($categories)): ?>
                <tr>
                    <td><?= $category['category_id'] ?></td>
                    <td><?= htmlspecialchars($category['category_name']) ?></td>
                    <td>
                        <span class="status <?= $category['is_active'] == '1' ? 'active' : 'inactive' ?>">
                            <?= $category['is_active'] == '1' ? 'Active' : 'Inactive' ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="edit_category.php?id=<?= $category['category_id'] ?>" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete_category.php?id=<?= $category['category_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this category?');">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <a href="<?= base_url()?>admin/sub_category.php?sub_id=<?= $category['category_id']?>" class="btn btn-edit">
                                View Sub Category
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content" style="background: #fff; padding: 20px; border-radius: 5px; max-width: 500px; margin: 50px auto;">
        <h2>Edit Category</h2>
        <form id="editForm" method="POST" action="update_category.php">
            <input type="hidden" id="edit_id" name="category_id">
            
            <div class="form-group">
                <label for="edit_name">Category Name</label>
                <input type="text" class="form-control" id="edit_name" name="category_name" required>
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" id="edit_active" name="is_active"> Active Category
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Category</button>
            <button type="button" class="btn" onclick="document.getElementById('editModal').style.display='none'" style="margin-left: 10px;">Cancel</button>
        </form>
    </div>
</div>

<script>
    // Edit Category Function
    function editCategory(id, name, isActive) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_active').checked = isActive == '1';
        document.getElementById('editModal').style.display = 'block';
    }
    
    // Delete Category Function
    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            window.location.href = 'delete_category.php?id=' + id;
        }
    }
    
    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php include 'footer.php'; ?>