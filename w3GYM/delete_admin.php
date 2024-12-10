<?php
require 'db.php'; 
session_start();

// Check if the admin is logged in. If not, redirect to the login page.
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

// Check if the admin is trying to delete their own account
if (isset($_POST['admin_id']) && $_POST['admin_id'] == $_SESSION['admin_id']) {
    $_SESSION['message'] = "You cannot delete your own account."; // Store message in session
    header('Location: list_admins.php'); // Redirect back to the dashboard
    exit;
}

// Proceed with deleting other admin accounts
if (isset($_POST['admin_id'])) {
    $member_id = intval($_POST['admin_id']);
    
    // Prepare the SQL statement to delete the admin
    $stmt = $pdo->prepare("DELETE FROM admins WHERE admin_id = :id");
    $stmt->execute(['id' => $member_id]);
}

// After deletion, redirect back to the dashboard
header('Location: list_admins.php');
exit;
