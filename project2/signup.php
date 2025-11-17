<?php
require_once("settings.php");
$errors = [];
$success = "";
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if (empty($username)) {
        $errors[] = "Username is required.";
    } else {

        $stmt = $conn->prepare("SELECT username FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Username already taken.";
        }

        $stmt->close();
    }


    if (empty($errors)) {

        $insert = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt2 = $conn->prepare($insert);
        $stmt2->bind_param("ss", $username, $password);

        if ($stmt2->execute()) {
             $success = "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            $errors[] = "Database error: " . $stmt2->error;
        }


        $stmt2->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
  <div class="login-container">
    <main class="form-main">
      <h1>Signup</h1>
      <?php if (!empty($errors)) {
                echo '<div style="color:red; margin-bottom:15px;">';
                foreach ($errors as $e) echo "<p>$e</p>";
                echo '</div>';
            }
            if ($success) {
                echo '<div style="color:green; margin-bottom:15px;">' . $success . '</div>';
            }
            ?>
      <form method="post" action="signup.php">
        <div class="form-group">
          <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>
    <input type="hidden" name="token" value="abc123">
    <input type="submit" value="Sign up" class="btn-submit">
        </div>
      </form>
      <hr> <br>
      <p>Already have an account? <a href="login.php" class="btn-submit">Login here</a>.</p>
    </main>
  </div>

    
    

</body>

</html>