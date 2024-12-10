<?php
require 'db.php'; 
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); 
    exit;
}

if (isset($_POST['member_id'])) {
    $member_id = intval($_POST['member_id']);
    
 
    $stmt = $pdo->prepare("DELETE FROM members WHERE id = :id");
    $stmt->execute(['id' => $member_id]);
}

header('Location: dashboard.php');
exit;
