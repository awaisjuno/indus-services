<?php 

    $id = $_GET['id'];
    include '../config/config.php';
    include 'temp.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Rate List</h1>
        <div class="user-info">
            <img src="<?= base_url()?>assets/img/user.png" alt="User">
            <span>Admin User</span>
        </div>
    </div>

    <!-- Add Category Form -->
    <div class="form-container">
        <h2 class="margin-bottom">Add New Rate</h2>
        <form method="POST">
            <div class="form-group">
                <label for="category_name">Hour</label>
                <input type="text" class="form-control" name="hour" required>
            </div>

            <div class="form-group">
                <label for="category_name">Rate</label>
                <input type="text" class="form-control" name="rate" required>
            </div>
            
            <p style="margin-bottom: 20px;">Automatically Save in the AED Currency</p>
            
            <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
        </form>
        <?php 
        
            if(isset($_POST['submit'])) {

                $hour = $_POST['hour'];
                $rate = $_POST['rate'];

                //insert query
                $insert = "INSERT INTO rate_list (`sub_cat_id`, `hour`, `rate`) VALUES ('$id', '$hour', '$rate')";
                $run = mysqli_query($con, $insert);
                if($run) {
                    echo "<script>alert('Successfully Added..')</script>";
                } else {
                    //echo "Error: " . mysqli_error($con);
                    echo "<script>alert('Some thing went wrong.')</script>";
                }

            }
        
        
        ?>
    </div>

    <!-- Categories List -->
    <div class="table-container">
        <h2 class="margin-bottom">Existing Rate List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hour</th>
                    <th>Rate</th>
                    <th>Delete</th>
                </tr>
                <?php 
                
                    $sel = "SELECT * FROM rate_list WHERE sub_cat_id='$id'";
                    $run = mysqli_query($con, $sel);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                        
                            <td>". $row['rate_id'] ."</td>
                            <td>". $row['hour'] ."</td>
                            <td>". $row['rate'] ."</td>
                            <td>
                                <a href='". base_url() ."admin/del_rate_list.php?id=". $row['rate_id'] ."' class='btn btn-delete'>Delete</a>
                            </td>
                        
                        </tr>";

                    }
                
                ?>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>