<?php
require 'db.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $member_id = $_POST['member_id'];
    $status = $_POST['status']; 
    
    if ($status === 'Disabled') {

        $query = "UPDATE members SET status = 'Disabled' WHERE id = :member_id";
    } else {

        $query = "UPDATE members SET status = NULL WHERE id = :member_id";
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute([':member_id' => $member_id]);

    header('Location: dashboard.php?status=success');
    exit;
}
?>
