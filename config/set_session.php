<?php
session_start();
$_SESSION['user_id'] = 123;
echo "Session set!";
