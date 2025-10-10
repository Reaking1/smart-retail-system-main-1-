<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // Not logged in, redirect to login page
    header("Location: login.php");
    exit;
}
?>
