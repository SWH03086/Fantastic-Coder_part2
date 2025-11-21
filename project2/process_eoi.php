<?php

require_once("settings.php");      

/* ---------- 1. CSRF protection ---------- */

/* ---------- 2. Only accept POST ---------- */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: pages/apply.php");
    exit;
}

/* ---------- 4. Helper: safe output ---------- */
function esc($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/* ---------- 5. Retrieve & sanitise ---------- */
$job_ref      = esc($_POST['job_ref'] ?? '');
$first_name   = esc($_POST['first_name'] ?? '');
$last_name    = esc($_POST['last_name'] ?? '');
$dob_raw      = esc($_POST['dob'] ?? '');
$gender       = esc($_POST['gender'] ?? '');
$street       = esc($_POST['street'] ?? '');
$suburb       = esc($_POST['suburb'] ?? '');
$state        = esc($_POST['state'] ?? '');
$postcode     = esc($_POST['postcode'] ?? '');
$email        = esc($_POST['email'] ?? '');
$phone        = esc($_POST['phone'] ?? '');
$skills       = $_POST['skills'] ?? [];
$other_skills = esc($_POST['other_skills'] ?? '');

/* ---------- 6. Validation ---------- */
$errors = [];

/* Job reference (must be one of the three valid codes) */
$job_ref = esc($_POST['job_ref'] ?? '');
$valid_refs = [];

$sql = "SELECT job_ref FROM job_list";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $valid_refs[] = $row['job_ref'];
    }
}

/* Validate job_ref */
if (!in_array($job_ref, $valid_refs, true)) {
    $errors[] = "Invalid job reference.";
}


/* Names */
if (!preg_match('/^[A-Za-z]{1,20}$/', $first_name)) {
    $errors[] = "First name: letters only, max 20 chars.";
}
if (!preg_match('/^[A-Za-z]{1,20}$/', $last_name)) {
    $errors[] = "Last name: letters only, max 20 chars.";
}

/* DOB – dd/mm/yyyy → MySQL DATE */
if (!preg_match('#^(\d{2})/(\d{2})/(\d{4})$#', $dob_raw, $m)) {
    $errors[] = "DOB must be dd/mm/yyyy.";
} else {
    $day   = $m[1];
    $month = $m[2];
    $year  = $m[3];
    if (!checkdate($month, $day, $year)) {
        $errors[] = "Invalid date of birth.";
    } else {
        $dob = "$year-$month-$day";               // ready for DB
    }
}

/* Gender */
if (!in_array($gender, ['Male','Female','Other'])) {
    $errors[] = "Gender is required.";
}

/* Address */
if ($street === '') $errors[] = "Street address required.";
if (strlen($suburb) > 40) $errors[] = "Suburb max 40 chars.";
if (!in_array($state, ['VIC','NSW','QLD','NT','WA','SA','TAS','ACT'])) {
    $errors[] = "Invalid state.";
}
if (!preg_match('/^\d{4}$/', $postcode)) {
    $errors[] = "Postcode must be 4 digits.";
}

/* Postcode ↔ State match (AU rules) */

$postcodeRanges = [
    'VIC' => [[3000,3999],[8000,8999]],
    'NSW' => [[1000,1999],[2000,2999],[2600,2619]],
    'QLD' => [[4000,4999],[9000,9999]],
    'WA'  => [[6000,6999]],
    'SA'  => [[5000,5999]],
    'TAS' => [[7000,7999]],
    'NT'  => [['0800','0999']],
    'ACT' => [['0200','0299'],['2600','2899']]
];

$valid = false;
foreach ($postcodeRanges[$state] ?? [] as $range) {
    if ($postcode >= $range[0] && $postcode <= $range[1]) {
        $valid = true; break;
    }
}
if (!$valid) $errors[] = "Postcode does not match selected state.";

/* Contact */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email required.";
}
if (!preg_match('/^[0-9\s]{8,12}$/', $phone)) {
    $errors[] = "Phone: 8–12 digits (spaces OK).";
}

/* Skills */
$skills_str = is_array($skills) ? implode(', ', array_map('esc', $skills)) : '';
if ($skills_str === '' && $other_skills === '') {
    $errors[] = "Select or describe at least one skill.";
}

/* ---------- 7. If errors → show them ---------- */

/*fix this html inside echo*/
if ($errors) {
    echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'>
          <title>Errors</title><link rel='stylesheet' href='style/styles.css'></head><body>
          <div style='max-width:600px;margin:2rem auto;padding:2rem;background:#ffebee;
                      border:1px solid #f44336;border-radius:12px;'>
          <h2>Application failed</h2><ul style='color:#c62828;'>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul><p><a href='apply.php' style='color:#1976d2;'>← Back</a></p></div></body></html>";
    exit;
}

/* ---------- 8. Create table (if missing) ---------- */
$create = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_ref VARCHAR(10) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    gender ENUM('Male','Female','Other') NOT NULL,
    street VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state CHAR(3) NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    skills VARCHAR(255),
    other_skills TEXT,
    status ENUM('New','Current','Final') DEFAULT 'New',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX(job_ref),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($create);

/* ---------- 9. Insert with prepared statement ---------- */
$insert = "INSERT INTO eoi
    (job_ref, first_name, last_name, dob, gender, street, suburb,
     state, postcode, email, phone, skills, other_skills)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($insert);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

/* *** THIS IS THE FIXED LINE (was line ~100) *** */
$stmt->bind_param(
    "sssssssssssss",               // 13 placeholders → 13 values
    $job_ref, $first_name, $last_name, $dob, $gender,
    $street, $suburb, $state, $postcode,
    $email, $phone, $skills_str, $other_skills
);

if ($stmt->execute()) {
    $eoi_id = $conn->insert_id;
    $stmt->close();
    $conn->close();

    /* ---------- 10. Success page ---------- */

    /*fix this html inside echo*/
    echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'>
          <title>Success</title><link rel='stylesheet' href='style/styles.css'></head><body>
          <div style='max-width:600px;margin:2rem auto;padding:2rem;background:#e8f5e9;
                      border:1px solid #4caf50;border-radius:12px;text-align:center;'>
          <h2>Application submitted!</h2>
          <p>Thank you <strong>" . esc($first_name . ' ' . $last_name) . "</strong>.</p>
          <p><strong>EOI #</strong> $eoi_id</p>
          <p><strong>Status:</strong> <span style='color:#2e7d32;font-weight:600;'>New</span></p>
          <p><a href='apply.php' style='background:#1976d2;color:#fff;padding:.75rem 1.5rem;
               border-radius:6px;text-decoration:none;'>Apply again</a></p>
          </div></body></html>";
} else {
    echo "<h2>Database error</h2><p>" . $stmt->error . "</p>";
    $stmt->close();
    $conn->close();
}
?>
