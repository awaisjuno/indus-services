<?php 

    include '../config/config.php';
    $id = $_GET['id'];
    
    //Delete Query
    $del = "DELETE FROM reschedule WHERE reschedule_id='$id'";

    $run = mysqli_query($con, $del);

    if($run) {
        echo "<script>alert('Successfully Deleted.')</script>";
        echo "<script>window.open('". base_url() ."admin/reschedule.php', '_self')</script>";
    } else {
        echo "<script>alert('Some thing went Wrong.')</script>";
        echo "<script>window.open('". base_url() ."admin/reschedule.php', '_self')</script>";
    }

?>