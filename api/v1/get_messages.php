<?php

    include '../../config/config.php';
    header("Content-Type: application/json");

    // Allow only GET method
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        echo json_encode([
            "success" => false,
            "message" => "Invalid request method. Only GET allowed."
        ]);
        exit;
    }

    // Capture user_id from GET
    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

    // Reject if user_id is 0
    if ($user_id === 0) {
        echo json_encode([
            "success" => false,
            "message" => "user_id is required and must be greater than 0"
        ]);
        exit;
    }

    // Check user_id in database
    $stmt = $con->prepare("SELECT user_id FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode([
            "success" => false,
            "message" => "User not found"
        ]);
        exit;
    }

    // If user exists
    $user = $result->fetch_assoc();

    echo json_encode([
        "success" => true,
        "user_id" => $user['user_id'],
        "message" => "User exists"
    ]);

    $stmt->close();
    $con->close();

?>