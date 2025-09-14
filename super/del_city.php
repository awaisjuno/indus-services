<?php

include '../config/config.php';

$city_id = $_GET['city_id'];

// Delete Query
$del = "DELETE FROM city WHERE city_id='$city_id'";
$run = mysqli_query($con, $del);

if ($run) {
    echo "<script>alert('Successfully Deleted.')</script>";
    echo "<script>window.open('" . base_url() . "super/city.php', '_self')</script>";
} else {
    echo "<script>alert('Something went wrong.')</script>";
    echo "<script>window.open('" . base_url() . "super/city.php', '_self')</script>";
}
?>
