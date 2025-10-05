<?php

    header("Content-Type: application/json");

    $valid_user = "apiuser";
    $valid_pass = "apipassword";

    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        $_SERVER['PHP_AUTH_USER'] !== $valid_user || $_SERVER['PHP_AUTH_PW'] !== $valid_pass) {

        header('WWW-Authenticate: Basic realm="Secure API"');
        header('HTTP/1.0 401 Unauthorized');
        echo json_encode([
            "success" => false,
            "message" => "Unauthorized access"
        ]);
        exit;
    }

?>
