<?php
    include '../../config/config.php';

    header("Content-Type: application/json");

    // Check if required fields exist
    if (!isset($_POST['user_id']) || !isset($_POST['order_id']) || !isset($_FILES['img'])) {
        echo json_encode([
            "status" => "error",
            "message" => "user_id, order_id and img are required."
        ]);
        exit;
    }

    $user_id = intval($_POST['user_id']);
    $order_id = intval($_POST['order_id']);
    $tech_id = isset($_POST['tech_id']) ? intval($_POST['tech_id']) : 0;

    // File upload
    $targetDir = "../../assets/completion_photos/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = time() . "_" . basename($_FILES["img"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
        $dbPath = "assets/completion_photos/" . $fileName;

        // Save to DB
        $sql = "INSERT INTO technician_order_photo (tech_id, user_id, order_id, img_path, created_at, is_active, is_delete)
                VALUES ('$tech_id', '$user_id', '$order_id', '$dbPath', NOW(), '1', '0')";
        $run = mysqli_query($con, $sql);

        if ($run) {
            echo json_encode([
                "status" => "success",
                "message" => "Photo uploaded successfully",
                "file_url" => $dbPath
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Database insert failed: " . mysqli_error($con)
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to upload image."
        ]);
    }
?>
