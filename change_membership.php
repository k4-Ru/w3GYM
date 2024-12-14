<?php
session_start();
require 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$member_id = $_SESSION['id'];
$query = "SELECT username, status, membership_type, membership_start_date, membership_end_date FROM members WHERE id = :member_id";
$stmt = $pdo->prepare($query);
$stmt->execute([':member_id' => $member_id]);
$member = $stmt->fetch();

if (!$member) {
    echo "Member not found.";
    exit;
}

$username = $member['username'];
$status = $member['status'];
$membership_type = $member['membership_type'];
$membership_start_date = $member['membership_start_date'];
$membership_end_date = $member['membership_end_date'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $membership_type = $_POST['membership_type'];

    if ($status === 'Disabled') {
        $_SESSION['status'] = 'disabled';
        header('Location: member_page.php');
        exit;
    }

    $query = "UPDATE members SET membership_type = :membership_type, membership_start_date = CURDATE(), 
              membership_end_date = CASE 
                  WHEN :membership_type = 'One Day' THEN CURDATE() + INTERVAL 1 DAY
                  WHEN :membership_type = 'Weekly' THEN CURDATE() + INTERVAL 7 DAY
                  WHEN :membership_type = 'Monthly' THEN CURDATE() + INTERVAL 1 MONTH
                  WHEN :membership_type = 'Yearly' THEN CURDATE() + INTERVAL 1 YEAR
                  ELSE NULL
              END, status = 'Active' WHERE id = :member_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':membership_type' => $membership_type,
        ':member_id' => $member_id
    ]);

    $_SESSION['status'] = 'success';
    header('Location: member_page.php');
    exit;
}
