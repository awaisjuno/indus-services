<?php 
    $user_id = $_GET['id'];
    include '../config/config.php';

    // First delete from user_detail
    $deleteDetail = "DELETE FROM user_detail WHERE user_id = '$user_id'";
    mysqli_query($con, $deleteDetail);

    // Then delete from user
    $deleteUser = "DELETE FROM user WHERE user_id = '$user_id'";
    mysqli_query($con, $deleteUser);

    if(mysqli_affected_rows($con) > 0){
        
        echo "<script>alert('Succesfully Deleted.')</script>";
        echo "<script>window.open('". base_url() ."super/user.php', '_self')</script>";
        
    } else {
        echo "<script>alert('Error while Deleted.')</script>";
        echo "<script>window.open('". base_url() ."super/user.php', '_self')</script>";
    }
?>
