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

    $data = json_decode(file_get_contents("php://input"), true);

    $email = isset($data['email']) ? trim($data['email']) : '';
    $password = isset($data['password']) ? trim($data['password']) : '';

    if ($email == '' || $password == '') {
        echo json_encode([
            "status" => "error",
            "message" => "Email and password are required."
        ]);
        exit;
    }

    $sel = "SELECT * FROM user WHERE email = '$email' AND is_delete = '0' AND is_active = '1' LIMIT 1";
    $run = mysqli_query($con, $sel);

    if (mysqli_num_rows($run) == 0) {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid email or password."
        ]);
        exit;
    }

    $user = mysqli_fetch_assoc($run);

    if (!password_verify($password, $user['password'])) {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid email or password."
        ]);
        exit;
    }

    $sel2 = "SELECT first_name, last_name, mobile, img 
            FROM user_detail 
            WHERE user_id = '".$user['user_id']."' LIMIT 1";
    $run2 = mysqli_query($con, $sel2);
    $details = mysqli_fetch_assoc($run2);

    $token = bin2hex(random_bytes(32));
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = date("H:i:s");
    $date = date("Y-m-d");

    $ins = "INSERT INTO user_token (token, ip_address, user_id, time, date, is_active, is_delete) 
            VALUES ('$token', '$ip', '".$user['user_id']."', '$time', '$date', '1', '0')";
    mysqli_query($con, $ins);

    echo json_encode([
        "status" => "success",
        "message" => "Login successful",
        "user" => [
            "id" => $user['user_id'],
            "email" => $user['email'],
            "role" => $user['role'],
            "first_name" => $details['first_name'] ?? "",
            "last_name" => $details['last_name'] ?? "",
            "mobile" => $details['mobile'] ?? "",
            "img" => $details['img'] ?? "",
            "token" => $token
        ]
    ]);

?>
