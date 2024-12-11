<?php
require 'db.php'; 
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}


if (isset($_POST['admin_id']) && $_POST['admin_id'] == $_SESSION['admin_id']) {
    $_SESSION['message'] = "You cannot delete your own account."; 
    header('Location: list_admins.php'); 
    exit;
}

if (isset($_POST['admin_id'])) {
    $member_id = intval($_POST['admin_id']);

    $stmt = $pdo->prepare("DELETE FROM admins WHERE admin_id = :id");
    $stmt->execute(['id' => $member_id]);
}

header('Location: list_admins.php');
exit;
