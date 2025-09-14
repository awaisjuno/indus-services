<?php
include '../config/config.php';
include 'temp.php';

if (isset($_GET['sub_id'])) {
    $sub_id = intval($_GET['sub_id']);
    
    // Delete query
    $del = "DELETE FROM sub_category WHERE sub_id = $sub_id";
    $run = mysqli_query($con, $del);

    if ($run) {
        echo "<script>alert('Sub-category deleted successfully!'); window.location='category.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No sub_id provided.";
}
?>
