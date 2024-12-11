<?php
require 'db.php'; 
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin) {

        $hashedPassword = $admin;
        if (password_verify($password, $hashedPassword['password'])) {
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['username'] = $admin['username'];  //store username also
            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Wrong password.";
        }
    } else {
        $error = "User not found. Maybe you are not an Admin...";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="Design/login_forms.css">
</head>
<body>
    <div class="container">
        <div class="login_form">
            <h1>Admin Login</h1>
            <?php 
            if (!empty($error)) {
             echo "<p style='color:red;'>$error</p>"; 
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

