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

$stmt = $pdo->prepare("SELECT username, membership_type, membership_start_date, membership_end_date FROM members WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if ($user) {

    $username = $user['username'];
    $membership_type = $user['membership_type'];
    $membership_start_date = $user['membership_start_date'];
    $membership_end_date = $user['membership_end_date'];
} else {
   
    $error = "User data not found.";
    $username = '';
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
    <link rel="stylesheet" href="Design/indexDesign.css">
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
            <p>Current Plan: <strong><?php echo htmlspecialchars($membership_type); ?></strong></p>
            <p>Start Date: <strong><?php echo htmlspecialchars($membership_start_date); ?></strong></p>
            <p>End Date: <strong><?php echo htmlspecialchars($membership_end_date); ?></strong></p>

            <?php if ($error): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php elseif ($success): ?>
                <p style="color:green;"><?php echo $success; ?></p>
            <?php endif; ?>

            <form method="POST">
                <h3>Select Your Membership Plan</h3>
                <label>
                    <input type="radio" name="plan" value="day pass" <?php echo ($membership_type === 'day pass') ? 'checked' : ''; ?>> Day Pass
                </label><br>
                <label>
                    <input type="radio" name="plan" value="weekly" <?php echo ($membership_type === 'weekly') ? 'checked' : ''; ?>> Weekly
                </label><br>
                <label>
                    <input type="radio" name="plan" value="monthly" <?php echo ($membership_type === 'monthly') ? 'checked' : ''; ?>> Monthly
                </label><br>
                <label>
                    <input type="radio" name="plan" value="yearly" <?php echo ($membership_type === 'yearly') ? 'checked' : ''; ?>> Yearly
                </label><br><br>

                <button type="submit">Update Plan</button>
            </form>

            <form action="logout.php" method="POST" style="margin-top: 20px;">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
