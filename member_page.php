<?php
require 'db.php';
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['id'];
$error = '';
$success = '';

$stmt = $pdo->prepare("SELECT username, membership_type, membership_start_date, status, membership_end_date FROM members WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if ($user) {
    $username = $user['username'];
    $membership_type = $user['membership_type'];
    $membership_start_date = $user['membership_start_date'];
    $membership_end_date = $user['membership_end_date'];

    $currentDate = date('Y-m-d');
    if ($membership_end_date && $currentDate > $membership_end_date) {
        $status = 'expired';

        $stmt = $pdo->prepare("UPDATE members SET status = ? WHERE id = ?");
        $stmt->execute(['expired', $userId]);
    }
    $status = $user['status'];
} else {
    $error = "User data not found.";
    $username = '';
    $status = '';
    $membership_type = '';
    $membership_start_date = '';
    $membership_end_date = '';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedPlan = $_POST['plan'] ?? null;

    if (!$selectedPlan) {
        $error = "Please select a plan.";
    } else {
        $stmt = $pdo->prepare("UPDATE members SET membership_type = ?, membership_start_date = CURRENT_DATE WHERE id = ?");
        $stmt->execute([$selectedPlan, $userId]);

        $success = "Your plan has been updated to '$selectedPlan'.";
        $stmt = $pdo->prepare("SELECT membership_type, membership_start_date, membership_end_date FROM members WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();

        if ($user) {
            $membership_type = $user['membership_type'];
            $membership_start_date = $user['membership_start_date'];
            $membership_end_date = $user['membership_end_date'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Page</title>
    <link rel="stylesheet" href="Design/member_page.css">
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <header>Good Day, <?php echo htmlspecialchars($username); ?>!</header>
            <p>Status: <strong><?php echo htmlspecialchars($status); ?></strong></p>
            <p>Current Plan: <strong><?php echo htmlspecialchars($membership_type); ?></strong></p>
            <p>Start Date: <strong><?php echo htmlspecialchars($membership_start_date); ?></strong></p>
            <p>End Date: <strong><?php echo htmlspecialchars($membership_end_date); ?></strong></p>

            <?php if ($error): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php elseif ($success): ?>
                <p style="color:green;"><?php echo $success; ?></p>
            <?php endif; ?>

            <form method="POST">
                <h1>Select Your Membership Plan</h1>

                <div class="plan-section">
                    <h2>One Day Pass</h2>
                    <p>Access to the gym for one day.</p>
                    <label>
                        <input type="radio" name="plan" value="One Day" <?php echo ($membership_type === 'One Day') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <div class="plan-section">
                    <h2>Weekly Plan</h2>
                    <p>Enjoy unlimited gym access for one week.</p>
                    <label>
                        <input type="radio" name="plan" value="weekly" <?php echo ($membership_type === 'Weekly') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <div class="plan-section">
                    <h2>Monthly Plan</h2>
                    <p>Unlimited access to the gym for a month.</p>
                    <label>
                        <input type="radio" name="plan" value="monthly" <?php echo ($membership_type === 'Monthly') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <div class="plan-section">
                    <h2>Yearly Plan</h2>
                    <p>Enjoy the gym facilities for an entire year.</p>
                    <label>
                        <input type="radio" name="plan" value="yearly" <?php echo ($membership_type === 'Yearly') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <button type="submit">Update Plan</button>
            </form>

            <form action="logout.php" method="POST" style="margin-top: 20px;">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
