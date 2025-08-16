<?php
// functions.php
function set_flash($key, $message) {
    $_SESSION['flash'][$key] = $message;
}

function get_flash($key) {
    if (!empty($_SESSION['flash'][$key])) {
        $msg = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $msg;
    }
    return null;
}

function require_login() {
    if (empty($_SESSION['user'])) {
        set_flash('error', 'Please log in to access that page.');
        header("Location: login.php");
        exit;
    }
}
