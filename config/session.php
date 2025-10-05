<?php

$current_folder = basename(dirname($_SERVER['PHP_SELF']));

$roleFolders = [
    'user'  => 'client',
    'admin' => 'admin',
    'super' => 'super'
];

if (in_array($current_folder, $roleFolders)) {

    if (!isset($_SESSION['user_id'])) {
        $_SESSION['error'] = "Please sign in to continue.";
        header("Location: " . base_url() . "signin.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $user_sql = "SELECT * FROM user_detail 
                 WHERE user_id='$user_id' 
                   AND is_active='1' 
                   AND is_delete='0'";
    $run = mysqli_query($con, $user_sql);

    if (!$row = mysqli_fetch_assoc($run)) {
        session_destroy();
        header("Location: " . base_url() . "signin.php");
        exit(); 
    }

    $role_sql = "SELECT role FROM user WHERE user_id='$user_id'";
    $run_role = mysqli_query($con, $role_sql);
    $row_role = mysqli_fetch_assoc($run_role);

    if ($row_role) {
        $role = $row_role['role'];
        $_SESSION['role'] = $role;
    } else {
        session_destroy();
        header("Location: " . base_url() . "signin.php");
        exit();
    }

    if (isset($roleFolders[$role]) && $current_folder !== $roleFolders[$role]) {
        // Define base project folder
        $basePath = "/indus"; // <-- adjust if your project folder name is different
        
        // Redirect to correct folder
        header("Location: " . $basePath . "/" . $roleFolders[$role] . "/dashboard.php");
        exit;
    }
}
?>
