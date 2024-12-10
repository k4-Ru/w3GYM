<?php

require 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['step1'])) {
        
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];

      
        if (empty($first_name) || empty($last_name) || empty($phone)) {
            $error = "First name, last name, and phone number are required.";
        } else {
            
            session_start();
            $_SESSION['signup_data'] = [
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'phone' => $phone
            ];
            header('Location: signup2.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title> 
    <link rel="stylesheet" href="Design/login_forms.css">
</head>
<body>
    <div class="container">
        <div class="login_form">
             <h2>Signup</h2>

                 <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

                <form method="POST" action="signup.php">
                
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="middle_name" placeholder="Middle Name">
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="text" name="phone" placeholder="Phone Number" pattern="\d{11}" required >
                <br><br>

                <button type="submit" name="step1">Next</button>

            </form>

            <div >
                <a class="arrow" href="login.php">
                    <img src="assets/arrow.png" alt="Back">
                </a>
            </div>
        </div>
    </div>
</body>
</html>
