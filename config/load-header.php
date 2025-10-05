<?php 

    $currentRoute = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    // Get the base path from base_url()
    $basePath = trim(parse_url(base_url(), PHP_URL_PATH), '/'); 

    if ($basePath && strpos($currentRoute, $basePath) === 0) {
        $currentRoute = substr($currentRoute, strlen($basePath));
        $currentRoute = trim($currentRoute, '/');
    }

    if ($currentRoute === '' || $currentRoute === false) {
        $currentRoute = '/';
    }

    // --- Fetch SEO data from DB ---
    $currentRoute = mysqli_real_escape_string($con, $currentRoute); 
    $sql = "SELECT * FROM pages WHERE route='$currentRoute'";
    $result = mysqli_query($con, $sql);

    $page = mysqli_fetch_assoc($result);

?>
