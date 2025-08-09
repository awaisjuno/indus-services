<?php 

    include 'config/config.php';
    $user_id = $_SESSION['user_id'];
    $sub_id = $_GET['id'];
    $date = date('Y-m-d');

    //Insert Data in the Table
    $insert = "INSERT INTO order ('user_id', 'sub_id', 'date', 'status') VALUES ('$user_id', '$sub_id', '$date', '0')"; 
    $run = mysqli_query($con, $insert);
    if($run) {
        echo "<script>alert('Sucessfully Put Order. we will contact you Soon.')</script>";
        echo "<script>window.open('". base_url() ."', '_self')</script>";
    } else {
        echo "<script>alert('Some Thing Went Wrong.')</script>";
        echo "<script>window.open('". base_url() ."', '_self')</script>";
    }


?>