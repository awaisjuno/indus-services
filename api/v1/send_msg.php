<?php 
    include '../../config/config.php';
    header("Content-Type: application/json");

    // Allow only POST method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode([
            "success" => false,
            "message" => "Only POST method is allowed."
        ]);
        http_response_code(405);
        exit;
    }

    // Capture values from POST request
    $send_id     = isset($_POST['send_id']) ? intval($_POST['send_id']) : 0;
    $receiver_id = isset($_POST['receiver_id']) ? intval($_POST['receiver_id']) : 0;
    $content     = isset($_POST['content']) ? trim($_POST['content']) : '';
    $img         = isset($_POST['img']) ? trim($_POST['img']) : '';
    $status      = 0;

    // Validate input
    if ($send_id === 0 || $receiver_id === 0 || $content === '') {
        echo json_encode([
            "success" => false,
            "message" => "Required fields missing"
        ]);
        exit;
    }

    // Function to check if user exists
    function userExists($con, $user_id) {
        $stmt = $con->prepare("SELECT user_id FROM user WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        return $exists;
    }

    // Validate sender and receiver
    if (!userExists($con, $send_id)) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid sender_id (user not found)"
        ]);
        exit;
    }

    if (!userExists($con, $receiver_id)) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid receiver_id (user not found)"
        ]);
        exit;
    }

    // Insert message if both users exist
    $stmt = mysqli_prepare(
        $con,
        "INSERT INTO message (sender_id, receiver_id, content, img, status) VALUES (?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param($stmt, "iissi", $send_id, $receiver_id, $content, $img, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode([
            "success" => true,
            "message" => "Message sent successfully",
            "message_id" => mysqli_insert_id($con)
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Database error: " . mysqli_error($con)
        ]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
?>
