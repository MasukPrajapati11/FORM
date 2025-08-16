<?php
require_once 'db.php';
require_once 'functions.php';

// Collect & basic sanitize
$name   = trim($_POST['name'] ?? '');
$email  = trim($_POST['email'] ?? '');
$pass   = $_POST['password'] ?? '';
$pass2  = $_POST['password_confirm'] ?? '';

// Persist old values for convenience
$_SESSION['old'] = ['name' => $name, 'email' => $email];

// Validation
if ($name === '' || $email === '' || $pass === '' || $pass2 === '') {
    set_flash('error', 'All fields are required.');
    header("Location: signup.php");
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    set_flash('error', 'Please enter a valid email address.');
    header("Location: signup.php");
    exit;
}
if (strlen($pass) < 6) {
    set_flash('error', 'Password must be at least 6 characters.');
    header("Location: signup.php");
    exit;
}
if ($pass !== $pass2) {
    set_flash('error', 'Passwords do not match.');
    header("Location: signup.php");
    exit;
}

// Check existing email
$sql = "SELECT id FROM users WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
if (mysqli_stmt_num_rows($stmt) > 0) {
    set_flash('error', 'Email is already registered.');
    header("Location: signup.php");
    exit;
}
mysqli_stmt_close($stmt);

// Insert user
$hash = password_hash($pass, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hash);

if (mysqli_stmt_execute($stmt)) {
    set_flash('success', 'Account created! You can log in now.');
    header("Location: login.php");
    exit;
} else {
    set_flash('error', 'Something went wrong. Please try again.');
    header("Location: signup.php");
    exit;
}
