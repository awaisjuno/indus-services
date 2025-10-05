<?php

include '../config/config.php';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Use backticks around `order`
$result = mysqli_query($con, "SELECT COUNT(*) AS count FROM `order` WHERE is_seen = 0");

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);
echo $row['count'];
?>
