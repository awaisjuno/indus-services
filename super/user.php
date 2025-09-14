<?php
    include '../config/config.php';
    include 'temp.php';
?>

<div class="content">
    <div class="card">
        <div class="card-header">
            <h3>Active Accounts</h3>
        </div>

        <div class="card-body">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $user_sql = "SELECT * FROM `user`";
                        $run = mysqli_query($con, $user_sql);

                        if(mysqli_num_rows($run) > 0) {
                            while($row = mysqli_fetch_assoc($run)) {
                                
                                $user_id = $row['user_id'];
                                
                                // fetch user_detail for this user
                                $detail_sql = "SELECT * FROM user_detail WHERE user_id='$user_id'";
                                $run_detail = mysqli_query($con, $detail_sql);
                                $row_detail = mysqli_fetch_assoc($run_detail);

                                $fullName = $row_detail['first_name'] . " " . $row_detail['last_name'];

                                echo "<tr>
                                    <td>". htmlspecialchars($row['user_id']) ."</td>
                                    <td>". htmlspecialchars($fullName) ."</td>
                                    <td>". htmlspecialchars($row['email']) ."</td>
                                    <td>". htmlspecialchars($row_detail['mobile']) ."</td>
                                    <td>". htmlspecialchars($row['role']) ."</td>
                                    <td><a href='edit_user.php?id=". $row['user_id'] ."'>Edit</a></td>
                                    <td><a href='delete_user.php?id=". $row['user_id'] ."' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a></td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No users found</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
