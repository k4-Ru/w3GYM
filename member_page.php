<?php
require 'db.php';

session_start();

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

            <!-- pagawa ako kulay pula error message sa css-->
            <?php if ($status === 'Disabled'): ?> 
                <div class="error">You are currently disabled and cannot choose a membership plan. Contact an Admin.</div>
            <?php endif; ?>

            <form action="change_membership.php" method="POST">
                <h1>Select Your Membership Plan</h1>

                <div class="plan-section">
                    <h2>One Day Pass</h2>
                    <p>Access to the gym for one day.</p>
                    <label>
                        <input type="radio" name="membership_type" value="One Day" <?php echo ($membership_type === 'One Day') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <div class="plan-section">
                    <h2>Weekly Plan</h2>
                    <p>Enjoy unlimited gym access for one week.</p>
                    <label>
                        <input type="radio" name="membership_type" value="Weekly" <?php echo ($membership_type === 'Weekly') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <div class="plan-section">
                    <h2>Monthly Plan</h2>
                    <p>Unlimited access to the gym for a month.</p>
                    <label>
                        <input type="radio" name="membership_type" value="Monthly" <?php echo ($membership_type === 'Monthly') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <div class="plan-section">
                    <h2>Yearly Plan</h2>
                    <p>Enjoy the gym facilities for an entire year.</p>
                    <label>
                        <input type="radio" name="membership_type" value="Yearly" <?php echo ($membership_type === 'Yearly') ? 'checked' : ''; ?>> Select
                    </label>
                </div>

                <?php if ($status !== 'Disabled'): ?>
                    <button type="submit">Update Plan</button>
                <?php endif; ?>
            </form>

            <form action="logout.php" method="POST" style="margin-top: 20px;">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
