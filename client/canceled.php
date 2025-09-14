<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';

    $user_id = $_SESSION['user_id'];
    $order_id = $_GET['order_id'];

    //Check Order

    //Check if cacnelation record already exist



?>

    <div class="page-title">
        <div>
            <h1>Order Cancellation Request</h1>
            <p>Please fill out the form below to request the cancellation of your order.</p>
        </div>
    </div>

    <div class="bookings-list">

        <div class="booking-card">

            <div class="booking-header">

                <h3>Order Cancellation Form</h3>

            </div>

            <div class="booking-body">

                <form method="POST">

                    <div class="form-group">
                        <label for="reason">Reason for Cancellation *</label>
                        <select class="form-control" id="reason" name="reason" required>
                            <option value="">-- Select Reason --</option>
                            <option value="Changed my mind">Changed my mind</option>
                            <option value="Ordered by mistake">Ordered by mistake</option>
                            <option value="Found a better option">Found a better option</option>
                            <option value="Delay in delivery">Delay in delivery</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comments">Additional Comments (Optional)</label>
                        <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit_cancel" class="btn btn-danger">
                            Submit Cancellation Request
                        </button>
                    </div>

                </form>

                <?php 
                
                    if(isset($_POST['submit_cancel'])) {

                        $reason = $_POST['reason'];
                        $comments = $_POST['comments'];

                        //Insert the Data
                        $insert = "INSERT INTO order_cancellation_detail (`order_id`, `user_id`, `reason`, `comments`, `status`) 
                                VALUES ('$order_id', '$user_id', '$reason', '$comments', 'Approved')";
                        $run = mysqli_query($con, $insert);

                        if($run) {
                            echo "<script>alert('Successfully Put Request of the Cancellation')</script>";
                        } else {
                            echo "<script>alert('Something went wrong..')</script>";
                        }

                        //Update Colum of the Table order: is_canceled
                        $update = "UPDATE `order` SET is_canceled = 1 WHERE order_id = '$order_id'";
                        $run_ca = mysqli_query($con, $update);

                        if($run_ca) {
                            echo "<script>alert('Order marked as canceled.')</script>";
                        } else {
                            echo "<script>alert('Failed to update order.')</script>";
                        }


                    }

                
                ?>


            </div>

        </div>

    </div>

<?php //include 'footer.php'; ?>
