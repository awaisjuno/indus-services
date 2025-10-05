<?php
    //session_start();
    include '../config/config.php';
    //include '../config/session.php';
    include 'temp.php';
    
    $user_id = $_GET['user_id'];

?>

    <div class="card">

        <div class="card-head">
            <h3>Technique Reviews</h3>
        </div>

        <div class="card-body">

            <table class='styled-table'>

                <tr>
                    <th>Review ID</th>
                    <th></th>
                    <th>Stars</th>
                    <th>Comments</th>
                    <th>Hide</th>
                </tr>

                <?php 
                
                    $review = "SELECT * FROM order_reviews WHERE user_id='$user_id'";
                    $run = mysqli_query($con, $review);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                            <td>". $row['review_id'] ."</td>
                            <td>". $row['star'] ."</td>
                            <td>". $row['client_review'] ."</td>
                            <td>
                                <a href='#'>Hide</a>
                            </td>
                        </tr>";

                    }
                
                ?>

            </table>

        </div>

    </div>