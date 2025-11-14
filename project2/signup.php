/*need css*/
<?php
require_once("settings.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
$username = trim($_POST['username']);
$password = trim($_POST['password']);

$query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "✅ Signup successful. You can now <a href='login.html'>login</a>.";
} else {
  echo "❌ Signup failed. Please try again.";
}}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
  

    <form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="hidden" name="token" value="abc123">
    <input type="submit" value="Sign up">
<p>Already have an account? <a href="login.php">Login here</a>.</p>
</body>

</html>