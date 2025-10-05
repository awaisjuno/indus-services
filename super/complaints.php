<?php
    include '../config/config.php';
    include 'temp.php';
?>

    <div class="card">

        <div class="card-head">
            <h3>Complaints</h3>
        </div>

        <div class="card-body">

            <table class="styled-table">

                <tr>
                    <th>Complaint ID</th>
                    <th>User</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Complaint Type</th>
                    <th>Status</th>
                </tr>

                <?php 
                
                    $sel = "SELECT c.*, ud.first_name, ud.last_name, ud.mobile, ud.img 
                            FROM complaints c
                            LEFT JOIN user_detail ud ON c.user_id = ud.user_id
                            WHERE c.is_active = 1";                    
                    $run = mysqli_query($con, $sel);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                            <td>". $row['complaint_id'] ."</td>
                            <td>". $row['first_name'] ." ". $row['last_name'] ."</td>
                            <td>". $row['subject'] ."</td>
                            <td>". $row['message'] ."</td>
                            <td>". $row['complaint_type'] ."</td>
                            <td>". $row['status'] ."</td>
                        </tr>";

                    }
                
                ?>

            </table>

        </div>

    </div>
