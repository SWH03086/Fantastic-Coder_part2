<?php
// settings.php - Database Configuration
// DO NOT use root in production! Create a dedicated user.

// === Database Credentials ===
$host    = 'localhost';
$user    = 'root';           // CHANGE IN PRODUCTION
$pwd     = '';               // CHANGE IN PRODUCTION
$sql_db  = 'job';            // Your database name

// === Error Reporting (Development Only) ===
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// === Create Connection (Object-Oriented) ===
$conn = new mysqli($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    // Log error in production, don't expose details
    error_log("DB Connection failed: " . $conn->connect_error);
    die("Database connection failed. Please try again later.");
}

// === Set Charset ===
$conn->set_charset('utf8mb4');

// === Optional: Set Timezone (Vietnam) ===
$conn->query("SET time_zone = '+07:00'");
?>
