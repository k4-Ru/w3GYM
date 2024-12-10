<?php
require 'db.php'; 
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); 
    exit;
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['member_id'], $_POST['status'])) {
    $member_id = intval($_POST['member_id']); // Ensure member_id is an integer
    $status = $_POST['status']; // Get the status value

    // Define valid statuses
    $valid_statuses = ['Active', 'Inactive', 'Disabled'];
    
    // Check if the status is valid
    if (in_array($status, $valid_statuses)) {
        try {
            // Prepare the update query
            $stmt = $pdo->prepare("UPDATE members SET status = :status WHERE id = :id");
            // Execute the query with the provided parameters
            $stmt->execute(['status' => $status, 'id' => $member_id]);
        } catch (PDOException $e) {
            // Handle potential database errors
            $_SESSION['error'] = "Failed to update the status: " . $e->getMessage();
            header('Location: dashboard.php');
            exit;
        }
    } else {
        // If the status is invalid, set an error message
        $_SESSION['error'] = "Invalid status selected.";
        header('Location: dashboard.php');
        exit;
    }
} else {
    // If the POST data is incomplete, handle the error
    $_SESSION['error'] = "Invalid request.";
    header('Location: dashboard.php');
    exit;
}

// Redirect back to the dashboard
header('Location: dashboard.php');
exit;
?>
