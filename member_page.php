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
            <div class="greeting">Good Day, <?php echo htmlspecialchars($username); ?>!</div>
            <p class ="status">Status: <strong><?php echo htmlspecialchars($status); ?></strong></p>
            <p class ="current-plan">Current Plan: <strong><?php echo htmlspecialchars($membership_type); ?></strong></p>
            <p class ="start-date">Start Date: <strong><?php echo htmlspecialchars($membership_start_date); ?></strong></p>
            <p class ="end-date">End Date: <strong><?php echo htmlspecialchars($membership_end_date); ?></strong></p>

            <!-- pagawa ako kulay pula error message sa css-->
            <?php if ($status === 'Disabled'): ?> 
                <p class="disabled-message">You are currently disabled and cannot choose a membership plan. Contact an Admin.</p>
            <?php endif; ?>

            <form action="change_membership.php" method="POST">
            <h2 class="select-plan-header">Select Your Membership Plan</h2> 

            <div class="plan-section plan-bronze">
    <h2>One Day Pass ₱69/day</h2>
    <p>Enjoy full access to all gym facilities for a single day.</p>
    <input type="radio" id="plan-one-day" name="plan" value="One Day" <?php echo ($membership_type === 'One Day') ? 'checked' : ''; ?>>
    <label for="plan-one-day" class="radio-label">Select</label>
</div>

<div class="plan-section plan-silver">
    <h2>Weekly Plan ₱369/week </h2>
    <p>Get a week's worth of unlimited access to the gym, ideal for short-term fitness goals.</p>
    <input type="radio" id="plan-weekly" name="plan" value="Weekly" <?php echo ($membership_type === 'Weekly') ? 'checked' : ''; ?>>
    <label for="plan-weekly" class="radio-label">Select</label>
</div>

<div class="plan-section plan-gold">
    <h2>Monthly Plan ₱1369/month </h2>
    <p>Perfect for consistent workouts, offering access for 30 days with flexible renewal options</p>
    <input type="radio" id="plan-monthly" name="plan" value="Monthly" <?php echo ($membership_type === 'Monthly') ? 'checked' : ''; ?>>
    <label for="plan-monthly" class="radio-label">Select</label>
</div>

<div class="plan-section plan-diamond">
    <h2>Yearly Plan ₱13,699/year </h2>
    <p>Save with a full-year commitment, providing unlimted access for 12 months at best rate</p>
    <input type="radio" id="plan-yearly" name="plan" value="Yearly" <?php echo ($membership_type === 'Yearly') ? 'checked' : ''; ?>>
    <label for="plan-yearly" class="radio-label">Select</label>
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