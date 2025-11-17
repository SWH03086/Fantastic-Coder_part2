
<?php

require_once("settings.php");


if (isset($_SESSION['manager']) && isset($_SESSION['username'])) {
    unset($_SESSION['manager']);
    unset($_SESSION['username']);
    session_destroy();
}

$lockout_duration = 60; 

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['lockout_time'])) {
    $_SESSION['lockout_time'] = 0;
}

if ($_SESSION['lockout_time'] > 0 && time() > $_SESSION['lockout_time']) {
    $_SESSION['login_attempts'] = 0;   
    $_SESSION['lockout_time'] = 0;     
}

if ($_SESSION['lockout_time'] > 0 && time() < $_SESSION['lockout_time']) {
    $remaining = $_SESSION['lockout_time'] - time();
    die("Too many failed attempts. Please wait $remaining seconds before trying again.");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login_success = false;
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM manager WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed = $row['password']; 
        if (password_verify($password, $hashed)) {  
        $login_success = true; 
        $_SESSION['manager'] = $username;
        header("Location: manage.php");
        exit;
    }
}
     


    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        $login_success = true; 
        $_SESSION['login_attempts'] = 0;
        $_SESSION['lockout_time'] = 0;

        exit;
    }
    
        
if (!$login_success) {
    $_SESSION['login_attempts']++;

    if ($_SESSION['login_attempts'] >= 3) {
        if ($_SESSION['lockout_time'] == 0) {
            $_SESSION['lockout_time'] = time() + $lockout_duration;
        }
        die("Too many failed attempts. Please wait $lockout_duration seconds before trying again.");
    } else {
        echo "Incorrect username or password. Attempt {$_SESSION['login_attempts']} of 3.";
    }
} else {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['lockout_time'] = 0;
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
        <h1>Login</h1>
    <form method="post" action="login.php">
        <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br><hr><br>
    <input type="submit" value="Login" class="btn-submit">

        </div>
</form>
<hr><br>
<p>Don't have an account? <a href="signup.php" class="btn-submit">Sign up here</a>.</p><br>
<p>You are the new manager? <a href="enhancements.php" class="btn-submit">Sign up here</a>.</p>
        </main> 
</div>
</body>

</html>


<!-- AI use in this file: 
Prompts: help me fix this fail login attempts code it not working <my og code> 
Output: the above code about fail login attempt(the above code is not 100% AI generated, I fixed some parts of it myself, but the main logic is from AI, and I cannot find the chat where I ask AI to fix this so I'm very sorry for this inconvenience)
AI is also used in this file to find errors (mostly typo errors) and suggest solutions to fix them, but the prompts and output are too long to be shown here, and the changes are minor.
-->