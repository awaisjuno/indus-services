<?php 

    include '../config/config.php';
    $del_id = $_GET['id'];

    //Delete Query
    $del = "DELETE FROM sub_category WHERE sub_id='$del_id'";
    $run = mysqli_query($con, $del);
    if($run) {
        echo "<script>window.open('". base_url() ."admin/services', '_self')</script>";
    } else {
        echo "<script>alert('Some thing went Wrong.')</script>";
        echo "<script>window.open('". base_url() ."admin/services', '_self')</script>";
    }


?>