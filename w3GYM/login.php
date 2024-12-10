<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM members WHERE username = ?");
    $stmt->execute([$username]);
    $member = $stmt->fetch();

    if ($member) {

        $hashedPassword = $member;
        if (password_verify($password, $hashedPassword['password'])) {
            $_SESSION['id'] = $member['id'];
            header('Location: member_page.php');
            exit;
        } else {
            $error = "Wrong password.";
        }
    } else {
        $error = "User not found.Have you tried signing up?...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>w3GYM</title>
    <link rel="stylesheet" href="Design/login_forms.css">
</head>

<body>
    <div class="container">
        <div class="login_form">
            <h2>Login</h2>
            <?php 
            if (!empty($error)) {
                echo "<p class='error-message'>$error</p>"; 
            }
            ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label>
                    <input type="checkbox" id="showPassword"> Show Password
                </label>
                <br>
                <button type="submit">Login</button>
            </form>
            <form action="signup.php" method="GET" style="margin-top: 10px;">
                <button type="submit">Sign Up</button>
            </form>

            <div >
                <a class="arrow" href="index.php">
                    <img src="assets/arrow.png" alt="Back to Home">
                </a>
            </div>
        </div>
    </div>

    <script>

        const showPassword = document.getElementById('showPassword');
        const password = document.getElementById('password');

        showPassword.addEventListener('change', function() {
            if (showPassword.checked) {
                password.type = 'text'; 
            } else {
                password.type = 'password'; 
            }
        });
    </script>
</body>

</html>
