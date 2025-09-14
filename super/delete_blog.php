<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';

    if (isset($_GET['blog_id'])) {
        $blog_id = intval($_GET['blog_id']); 
        
        $del = "DELETE FROM blogs WHERE blog_id = '$blog_id'";
        $run = mysqli_query($con, $del);

        if ($run) {
            header("Location: manage_blogs.php?msg=deleted");
            exit();
        } else {
            echo "Error deleting blog: " . mysqli_error($con);
        }
    } else {
        echo "Invalid request.";
    }

?>
