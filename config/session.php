<?php
// Start the session
session_start();

// If the user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>
