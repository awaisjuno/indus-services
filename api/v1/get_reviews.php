<?php
    include '../../config/config.php';

    header("Content-Type: application/json");

    // Allow only POST method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode([
            "status" => "error",
            "message" => "Only POST method is allowed."
        ]);
        http_response_code(405);
        exit;
    }

    // Capture raw input
    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = isset($data['user_id']) ? intval($data['user_id']) : 0;

    if ($user_id <= 0) {
        echo json_encode([
            "status" => "error",
            "message" => "User ID is required."
        ]);
        exit;
    }

    // Fetch reviews by user_id
    $sql = "SELECT review_id, order_id, user_id, star, client_review, date 
            FROM order_reviews 
            WHERE user_id = '$user_id' 
              AND is_delete = '0' 
              AND is_active = '1'
            ORDER BY date DESC";

    $result = mysqli_query($con, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo json_encode([
            "status" => "success",
            "message" => "No reviews found.",
            "reviews" => []
        ]);
        exit;
    }

    // Collect reviews
    $reviews = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $reviews[] = [
            "review_id" => $row['review_id'],
            "order_id" => $row['order_id'],
            "user_id" => $row['user_id'],
            "star" => $row['star'],
            "client_review" => $row['client_review'],
            "date" => $row['date']
        ];
    }

    // Success response
    echo json_encode([
        "status" => "success",
        "message" => "Reviews fetched successfully.",
        "reviews" => $reviews
    ]);
?>
