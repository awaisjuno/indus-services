<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    $contact_id = $_GET['contact_id'];

    //Delete Query
    $del = "DELETE FROM contact WHERE contact_id=$contact_id";
    $run = mysqli_query($con, $del);
    if($run) {
        echo "<script>alert('Successfully Deleted.')</script>";
        echo "<script>window.open('". base_url() ."super/contact.php', '_self')</script>";
    } else {
        echo "<script>alert('Some thing went wrong.')</script>";
        echo "<script>window.open('". base_url() ."super/contact.php', '_self')</script>";
    }
    
?>