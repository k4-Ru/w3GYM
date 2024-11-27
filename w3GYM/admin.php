<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: admin.php');
    exit;
}

if ($_SESSION['role'] == 'admin') {
    echo "<h1>Admin Dashboard</h1>";
    echo "<a href='members.php'>Manage Members</a><br>";
    echo "<a href='plans.php'>Manage Plans</a><br>";
} else {
    echo "<h1>Member Dashboard</h1>";
    echo "Welcome, member!";
}
?>
