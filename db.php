<?php
// db.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "auth_demo";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$conn) {
    die("DB connection failed: " . htmlspecialchars(mysqli_connect_error()));
}

// Simple global escaper
function e($value) { return htmlspecialchars($value ?? "", ENT_QUOTES, 'UTF-8'); }
