<?php

require_once("settings.php");

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Check username
    if (empty($username)) {
        $errors[] = "Username is required.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM manager WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $errors[] = "Username already taken.";
        }
        $stmt->close();
    }

    // Password rules
    $pattern = "/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/";

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match($pattern, $password)) {
        $errors[] = "Password must be at least 8 characters, include 1 uppercase letter, 1 number, and 1 special character (!@#$%^&*).";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO manager (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed);
        if ($stmt->execute()) {
            $success = "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            $errors[] = "Database error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Registration</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <div class="login-container">
        <main class="form-main">
            <h1>Manager Registration</h1>

            <?php
            if (!empty($errors)) {
                echo '<div style="color:red; margin-bottom:15px;">';
                foreach ($errors as $e) echo "<p>$e</p>";
                echo '</div>';
            }
            if ($success) {
                echo '<div style="color:green; margin-bottom:15px;">' . $success . '</div>';
            }
            ?>

            <form method="post" action="enhancements.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required><br><br>

                    <label for="password">Password:</label>

                    <input type="password" name="password" required>
                    <p>Password must be at least 8 characters, include 1 uppercase letter, 1 number, and 1 special character (!@#$%^&*).</p>

                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" required><br><br>

                    <hr><br>
                    <input type="submit" value="Register" class="btn-submit">
                </div>
            </form>
            <hr><br>
            <p>Already have an account? <a href="login.php" class="btn-submit">Login here</a>.</p>
        </main>
    </div>
</body>
</html>
<!--
AI use in this file:
Prompts: how do i increase security in my sign up php file
Output:

Validate and Sanitize Inputs

Never trust user input.

Use PHP functions to sanitize:

$username = trim($_POST['username']);
$username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

3. Use Strong Password Handling

Never store passwords in plain text.

Use password_hash() and password_verify():

$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash before saving

// When logging in:
if (password_verify($password, $hashedPasswordFromDB)) {
    // Password correct
}


Enforce strong password rules:

Minimum 8–12 characters

At least one uppercase, lowercase, number, and special character

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W]).{8,}$/', $password)) {
    die("Password is too weak.");
}

4. Protect Against SQL Injection

Always use prepared statements with parameterized queries:

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hashedPassword);
$stmt->execute();


Do not directly insert user input into SQL.
5. Use CSRF Protection

Add a token to prevent Cross-Site Request Forgery:

// Generate token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Include hidden field in form
<input type="hidden" name="csrf_token" value="<?php //echo $_SESSION['csrf_token']; ?>">

// Check token on submission
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("Invalid CSRF token");
}

6. Limit Registration Attempts

Prevent brute force attacks by limiting requests per IP:

// Simple example: store attempts in session or database
if ($_SESSION['signup_attempts'] > 5) {
    die("Too many attempts. Try later.");
}




And the above AI-generated code is also used in other files to enhance security for the overall website.

AI is also used in this file to find errors (mostly typo errors) and suggest solutions to fix them, but the prompts and output are too long to be shown here, and the changes are minor.
-->