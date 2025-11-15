
<?php

require_once("settings.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $_SESSION['manager'] = $username;

    $query = "SELECT * FROM manager WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: manage.php");
        exit;
    }
        else{
        echo "Incorrect username or password.";}
        }

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    }
        else{
        echo "Incorrect username or password.";}
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
<p>Don't have an account? <a href="signup.php" class="btn-submit">Sign up here</a>.</p>
        </main> 
</div>
</body>

</html>


