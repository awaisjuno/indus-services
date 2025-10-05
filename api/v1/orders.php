<?php 

    include '../../config/config.php';
    header("Content-Type: application/json");

    // Capture user_id from API
    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

    if ($user_id === 0) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid user_id"
        ]);
        exit;
    }

    // Check if user_id exists in order_assign table
    $stmt = mysqli_prepare($con, "
        SELECT assign_id, order_id, status 
        FROM order_assign 
        WHERE user_id = ? AND is_delete = '0' AND is_active = '1' 
        LIMIT 1
    ");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode([
            "success" => true,
            "message" => "User exists in order_assign",
            "data" => $row
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "No record found for this user_id in order_assign"
        ]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

?>
