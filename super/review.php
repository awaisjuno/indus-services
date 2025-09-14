<?php
    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
    
?>

    <div class="card">

        <div class="card-header">
            <h3>All Reviews</h3>
        </div>

        <div class="card-body">

            <table class="styled-table">

                <tr>
                    <th>Review ID</th>
                    <th>User</th>
                    <th>Star</th>
                    <th>Message</th>
                </tr>

                <?php 
                
                    $review = "SELECT 
                        orv.review_id,
                        orv.order_id,
                        orv.user_id,
                        orv.star,
                        orv.client_review,
                        orv.img AS review_img,
                        orv.date,
                        u.first_name,
                        u.last_name,
                        u.img AS user_img,
                        u.mobile
                    FROM order_reviews AS orv
                    INNER JOIN user_detail AS u
                        ON orv.user_id = u.user_id
                    WHERE orv.is_delete = '0' 
                    AND u.is_delete = '0';
                    ";

                    $run = mysqli_query($con, $review);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                            <td>". $row['review_id'] ."</td>
                            <td>". $row['first_name'] ." ". $row['last_name'] ."</td>
                            <td>". $row['star'] ."</td>
                            <td>". $row['client_review'] ."</td>
                        </tr>";

                    }
                
                ?>

            </table>

        </div>

    </div>