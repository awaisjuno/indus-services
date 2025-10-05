<?php 

    include '../../config/config.php';
    header("Content-Type: application/json");

    // Allow only POST method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode([
            "status" => "error",
            "message" => "Only POST method is allowed."
        ]);
        exit;
    }

    // Get token from request
    $data = json_decode(file_get_contents("php://input"), true);
    $token = isset($data['token']) ? trim($data['token']) : '';

    if ($token === '') {
        echo json_encode([
            "status" => "error",
            "message" => "Token is required."
        ]);
        exit;
    }

    // Check token in DB
    $sel = "SELECT * FROM user_token 
            WHERE token = '$token' 
              AND is_active = '1' 
              AND is_delete = '0' 
              AND is_expire = '0' 
            LIMIT 1";

    $run = mysqli_query($con, $sel);

    if (!$run || mysqli_num_rows($run) == 0) {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid or expired token."
        ]);
        exit;
    }

    $userToken = mysqli_fetch_assoc($run);

    // Expire the token
    $upd = "UPDATE user_token 
            SET is_expire = '1' 
            WHERE token = '$token'";

    if (mysqli_query($con, $upd)) {
        echo json_encode([
            "status" => "success",
            "message" => "Logout successful."
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Database error: " . mysqli_error($con)
        ]);
    }

?>
