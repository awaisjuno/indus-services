<?php 

    function base_url()
    {
        return 'http://localhost/indus-services/';
    }

    //Database Connection
    $con = mysqli_connect('localhost', 'root', '', 'indus_services');
    
    if(!$con) {
        echo "<script>alert('Some Went Wrong.. DB Connection..')</script>";
    }

    $userName = null;

    if (isset($_SESSION['user_id'])) {
        $user_id = intval($_SESSION['user_id']); // sanitize
        $sel = "SELECT first_name, last_name FROM user_detail WHERE user_id='$user_id' LIMIT 1";
        $run = mysqli_query($con, $sel);

        if ($run && mysqli_num_rows($run) > 0) {
            $row = mysqli_fetch_assoc($run);
            $userName = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
        }
    }

?>