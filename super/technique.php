<?php
    //session_start();
    include '../config/config.php';
    //include '../config/session.php';
    include 'temp.php';
    
?>


    <div class="card">

        <div class="card-header">
            <h3>Technique Accounts</h3>
        </div>

        <div class="card-body">

            <table class="styled-table">

                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Reviews</th>
                    <th>Remove Access</th>
                </tr>

                <?php 
                            
                    $sel = "SELECT u.*, ud.first_name, ud.last_name, ud.mobile, ud.img 
                    FROM user u 
                    LEFT JOIN user_detail ud ON u.user_id = ud.user_id
                    WHERE u.is_active='1' AND u.role='technician'";

                    $run = mysqli_query($con, $sel);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                            <td>". $row['user_id'] ."</td>
                            <td>". $row['first_name'] ."</td>
                            <td>". $row['last_name'] ."</td>
                            <td>". $row['email'] ."</td>
                            <td>
                                <a href='". base_url() ."super/reviews.php?user_id=". $row['user_id'] ."'>Reviews</a>
                            </td>
                            <td>
                                <a href='". base_url() ."super/remove_tech.php?user_id=". $row['user_id'] ."'>Remove</a>
                            </td>
                        </tr>";

                    }
                
                ?>

            </table>

        </div>

    </div>