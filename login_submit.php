<?php
require_once 'db.php';
require_once 'functions.php';

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

if ($email === '' || $pass === '') {
    set_flash('error', 'Email and password are required.');
    header("Location: login.php");
    exit;
}

$sql = "SELECT id, name, email, password_hash FROM users WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user || !password_verify($pass, $user['password_hash'])) {
    set_flash('error', 'Invalid email or password.');
    header("Location: login.php");
    exit;
}

// Good login: harden session
session_regenerate_id(true);
$_SESSION['user'] = [
    'id'    => $user['id'],
    'name'  => $user['name'],
    'email' => $user['email']
];

set_flash('success', 'Welcome back, ' . $user['name'] . '!');
header("Location: dashboard.php");
exit;
