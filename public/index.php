<?php
define('BASE_PATH', dirname(__DIR__)); // Define the base path
include_once BASE_PATH . '/app/models/Student.php';
include_once BASE_PATH . '/app/controllers/StudentController.php';
include_once BASE_PATH . '/routes/api.php';

header("Content-Type: application/json");
?>