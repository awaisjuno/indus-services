<?php 

    include '../config/config.php';
    include 'temp.php'; 
    $sub_id = $_GET['sub_id'];

    // Select query
    $sel = "SELECT * FROM sub_category WHERE category_id=$sub_id";
    $run = mysqli_query($con, $sel);
?>

<style>
    /* Tab Styles */
    .tabs {
        border-bottom: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .tab-btn {
        padding: 10px 20px;
        background: none;
        border: none;
        border-bottom: 3px solid transparent;
        cursor: pointer;
        font-weight: 500;
        color: #555;
    }

    .tab-btn.active {
        border-bottom: 3px solid #FF6B35;
        color: #333;
    }

    /* Modal Styles */
    .modal-content {
        animation: modalopen 0.3s;
    }

    @keyframes modalopen {
        from {opacity: 0; transform: translateY(-20px)}
        to {opacity: 1; transform: translateY(0)}
    }
    
    /* Form Styles */
    .form-container {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 500;
        color: #555;
    }
    
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
    }
    
    .form-control:focus {
        border-color: #FF6B35;
        outline: none;
    }
    
    .checkbox-label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    
    .checkbox-label input {
        margin-right: 10px;
    }
    
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .btn-primary {
        background-color: #FF6B35;
        color: #fff;
    }
    
    .btn-primary:hover {
        background-color: #e05a2b;
    }
    
    /* Table Styles */
    .table-container {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    table th, table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    
    table th {
        background-color: #f9f9f9;
        color: #555;
        font-weight: 600;
    }
    
    table tr:hover {
        background-color: #f5f5f5;
    }
    
    .status {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .status.active {
        background-color: #4CAF50;
        color: #fff;
    }
    
    .status.inactive {
        background-color: #f44336;
        color: #fff;
    }
    
    .action-btn {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
        margin-right: 5px;
    }
    
    .edit-btn {
        background-color: #2196F3;
        color: #fff;
    }
    
    .delete-btn {
        background-color: #f44336;
        color: #fff;
    }
.action-buttons {
    display: flex;
    gap: 8px;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-edit {
    background-color: #2196F3;
    color: white;
}

.btn-edit:hover {
    background-color: #0b7dda;
}

.btn-delete {
    background-color: #f44336;
    color: white;
}

.btn-delete:hover {
    background-color: #da190b;
}

.btn i {
    margin-right: 6px;
    font-size: 12px;
}
</style>

<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Sub Categories Management</h1>
        <div class="user-info">
            <img src="<?= base_url()?>assets/img/user.png" alt="User">
            <span>Admin User</span>
        </div>
    </div>

    <div class="tabs">
        <button class="tab-btn active">Sub Categories</button>
    </div>

    <!-- Add Category Form -->
    <div class="form-container">
        <h2 class="margin-bottom">Add New Sub Category</h2>
        <form method="POST">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>

            <div class="from-group">
                <label>Image</label>
                <input type="file" class="form-control" name="img" required="required">
            </div>
            
            <button name="btn" type="submit" class="btn btn-primary">Add Category</button>
        </form>
        <?php 
        
            if(isset($_POST['btn'])) {

                $category_name = $_POST['category_name'];
                $img = '.';

                //Insert Query
                $insert = "INSERT INTO sub_category ('category_id', 'sub_category', 'img') VALUES ('$sub_id', '$category_name', '$img')";
                $run = mysqli_query($con, $insert);

                if($run) {
                    echo "<script>alert('Successfully Added.')</script>";
                } else {
                    echo "<script>alert('Some thing went wrong..')</script>";
                }

            }

        ?>
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
                <?php while($row = mysqli_fetch_assoc($run)): ?>
                <tr>
                    <td><?= $row['category_id'] ?></td>
                    <td><?= htmlspecialchars($row['sub_category']) ?></td>
                    <td>
                        <span class="status <?= $category['is_active'] == '1' ? 'active' : 'inactive' ?>">
                            <?= $row['is_active'] == '1' ? 'Active' : 'Inactive' ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="edit_category.php?id=<?= $row['category_id'] ?>" class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete_sub_category.php?id=<?= $row['category_id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this category?');">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <a href="rate_list.php?id=<?= $row['sub_id']?>" class="btn btn-edit">Rate List</a>
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