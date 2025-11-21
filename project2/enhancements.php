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
