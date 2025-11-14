
    <?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "job";
    $conn = mysqli_connect($host, $user, $pwd, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
