<?php
require 'db.php'; 
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); 
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['member_id'], $_POST['status'])) {
    $member_id = intval($_POST['member_id']); 
    $status = $_POST['status']; 

    $valid_statuses = ['Active', 'Inactive', 'Disabled'];
    
    if (in_array($status, $valid_statuses)) {
        try {
  
            $stmt = $pdo->prepare("UPDATE members SET status = :status WHERE id = :id");

            $stmt->execute(['status' => $status, 'id' => $member_id]);
        } catch (PDOException $e) {

            $_SESSION['error'] = "Failed to update the status: " . $e->getMessage();
            header('Location: dashboard.php');
            exit;
        }
    } else {
      
        $_SESSION['error'] = "Invalid status selected.";
        header('Location: dashboard.php');
        exit;
    }
} else {
  
    $_SESSION['error'] = "Invalid request.";
    header('Location: dashboard.php');
    exit;
}

header('Location: dashboard.php');
exit;
?>