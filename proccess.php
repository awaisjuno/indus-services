<?php 

include 'config/config.php';
session_start();
//if (!isset($_SESSION['user_id'])) {
    //echo "<script>alert('Please login to continue'); window.location.href='signin.php';</script>";
    //exit();
//}

$user_id = 1;
$sub_id  = $_GET['id'] ?? 0;
$date    = date('Y-m-d');

// Validate input
if (!is_numeric($sub_id)) {
    echo "<script>alert('Invalid Service ID'); window.location.href='". base_url() ."';</script>";
    exit();
}

// Use backticks for table/column names if reserved words
$insert = "INSERT INTO `order` (`user_id`, `sub_id`, `date`, `status`) 
           VALUES ('$user_id', '$sub_id', '$date', '0')";

$run = mysqli_query($con, $insert);

if ($run) {
    echo "<script>alert('Successfully placed order. We will contact you soon.');</script>";
    echo "<script>window.open('". base_url() ."', '_self');</script>";
} else {
    // Display the actual MySQL error for debugging
    echo "<pre>MySQL Error: " . mysqli_error($con) . "</pre>";
}
?>
