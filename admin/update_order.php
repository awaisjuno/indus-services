<?php

    include '../config/config.php';
    include 'temp.php';

    $order_id = $_GET['order_id'];

    //Update status
    $update = "UPDATE `order` SET status = 'done' WHERE order_id = '$order_id' AND is_delete = '0'";
    $run = mysqli_query($con, $update);
    if($run) {
        echo "<script>alert('Successfully Updated')</script>";
        echo "<script>window.open('". base_url() ."admin/order', '_self')</script>";
    } else {
        echo "<script>alert('Some thing went wrong.')</script>";
        echo "<script>window.open('". base_url() ."admin/order', '_self')</script>";
    }

?>