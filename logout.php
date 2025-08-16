<?php
require_once 'db.php';
require_once 'functions.php';

$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

set_flash('success', 'You have been logged out.');
header("Location: login.php");
exit;
