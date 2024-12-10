<?php
require 'db.php';
session_start();

if (!isset($_SESSION['signup_data'])) {
    header('Location: new_admin.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    if (empty($email) || empty($username) || empty($password) || empty($repeat_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $repeat_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if the username already exists
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $error = "Username already exists.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Get the signup data from session
            $signup_data = $_SESSION['signup_data'];
            $stmt = $pdo->prepare("INSERT INTO admins (first_name, middle_name, last_name, username, password, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $signup_data['first_name'],
                $signup_data['middle_name'],
                $signup_data['last_name'],
                $username,
                $hashedPassword,
                $email,
                $signup_data['phone']
            ]);

            // Success message
            $success = "Admin registered successfully!";
            unset($_SESSION['signup_data']);  // Clear the session data
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Step 2</title>
    <link rel="stylesheet" href="Design/login_forms.css">
</head>
<body>
    <div class="container">
        <div class="login_form">
            <h2>Almost there...</h2>

            <!-- Display error or success message -->
            <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>

            <form method="POST" action="new_admin2.php">
                
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" id="password1" placeholder="Password" required>
                <input type="password" name="repeat_password" id="password2" placeholder="Repeat Password" required><br><br>
                <label>
                    <input type="checkbox" id="showPassword"> Show Password
                </label>
                <br>

                <button type="submit">Sign Up</button>
            </form>

            <div >
                <a class="arrow" href="new_admin.php">
                    <img src="assets/arrow.png" alt="Back">
                </a>
            </div>
        </div>
    </div>
    <script>
        const showPassword = document.getElementById('showPassword');
        const password1 = document.getElementById('password1');
        const password2 = document.getElementById('password2');

        showPassword.addEventListener('change', function () {
            const type = showPassword.checked ? 'text' : 'password';
            password1.type = type;
            password2.type = type;
    });
    </script>
</body>
</html>
