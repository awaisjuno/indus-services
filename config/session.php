<?php
session_start();

if (isset($_SESSION['user_id'])) {
    echo $_SESSION['user_id'];
} else {
    echo "Not logged in";
}

// If you want to restrict access:
//if (!isset($_SESSION['user_id'])) {
    //header("Location: ../signin.php");
    //exit();
//}
?>
