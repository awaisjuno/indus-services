<?php

    if (!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = "Please sign in to continue.";
        echo "<script>alert('Please sign in to continue.')</script>";
        //header("Location: " . base_url() . "signin.php");
        //exit();
    }
    
    $user_id = $_SESSION['user_id'];
    //$user_id = 11;
    $user_sql = "SELECT * FROM user_detail WHERE user_id='$user_id' AND is_active='1' AND is_delete='0'";
    $run = mysqli_query($con, $user_sql);
    
    //if (!$row = mysqli_fetch_assoc($run)) {
        //session_destroy();
        //header("Location: " . base_url() . "signin.php");
        //exit(); 
    //}
    
    
    //Check Role
    $role = "SELECT * FROM user WHERE user_id='$user_id'";
    $run_role = mysqli_query($con, $role);
    $row_role = mysqli_fetch_assoc($run_role);
    
    $row_role = $row_role['role'];
    $_SESSION['role'] = $role;
    
    $current_folder = basename(dirname($_SERVER['PHP_SELF']));

    // Define allowed folders for each role
    $roleFolders = [
        'user'  => 'client',
        'admin' => 'admin',
        'super' => 'super'
    ];

    // If current folder doesn’t match the role’s folder → redirect
    if (isset($roleFolders[$role]) && $current_folder !== $roleFolders[$role]) {
        header("Location: /" . $roleFolders[$role] . "/");
        exit;
    }
    
?>
