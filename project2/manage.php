<?php

require_once("settings.php"); 

if (!isset($_SESSION['manager'])) {
    header("Location: login.php");
    exit;
}
$message = "";
$result = null; 

// === HANDLE FORM SUBMISSIONS ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. List All EOIs
    if (isset($_POST['list_all'])) {
        $query = "SELECT * FROM eoi ORDER BY EOInumber DESC";
        $result = $conn->query($query);
    }

    // 2. List by Job Ref
    elseif (isset($_POST['list_by_job'])) {
        $job_ref = trim($_POST['job_ref']);
        if ($job_ref) {
            $stmt = $conn->prepare("SELECT * FROM eoi WHERE job_ref = ? ORDER BY EOInumber DESC");
            $stmt->bind_param("s", $job_ref);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $message = "Please enter a Job Reference.";
        }
    }

    // 3. List by Name
    elseif (isset($_POST['list_by_applicant'])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);

        $conditions = [];
        $params = [];
        $types = "";

        if ($first_name !== "") {
            $conditions[] = "first_name LIKE ?";
            $params[] = "%$first_name%";
            $types .= "s";
        }
        if ($last_name !== "") {
            $conditions[] = "last_name LIKE ?";
            $params[] = "%$last_name%";
            $types .= "s";
        }

        if (!empty($conditions)) {
            $sql = "SELECT * FROM eoi WHERE " . implode(" AND ", $conditions) . " ORDER BY EOInumber DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $message = "Please enter at least a first or last name.";
        }
    }

    // 4. Delete by Job Ref
    elseif (isset($_POST['delete_by_job'])) {
        $job_ref = trim($_POST['delete_job_ref']);
        if ($job_ref) {
            $stmt = $conn->prepare("DELETE FROM eoi WHERE job_ref = ?");
            $stmt->bind_param("s", $job_ref);
            if ($stmt->execute()) {
                $count = $stmt->affected_rows;
                $message = "Deleted $count EOI(s) with Job Ref '$job_ref'.";
            } else {
                $message = "Error: " . $stmt->error;
            }
        } else {
            $message = "Job Reference required.";
        }
    }

    // 5. Change Status
    elseif (isset($_POST['change_status'])) {
        $eoi_number = intval($_POST['eoi_number']);
        $status = $_POST['status'];

        $valid_statuses = ['New', 'Current', 'Final'];
        if ($eoi_number > 0 && in_array($status, $valid_statuses)) {
            $stmt = $conn->prepare("UPDATE eoi SET status = ? WHERE EOInumber = ?");
            $stmt->bind_param("si", $status, $eoi_number);
            if ($stmt->execute()) {
                $message = "EOI #$eoi_number status → <strong>$status</strong>.";
            } else {
                $message = "Error: " . $stmt->error;
            }
        } else {
            $message = "Invalid EOI number or status.";
        }
    }
    
    if (isset($_POST['sort'])) {
    $field = $_POST['sort_field'];
    $allowed = ["EOInumber", "job_ref", "first_name", "last_name", "dob", "status"];

    if (in_array($field, $allowed)) {
        $query = "SELECT * FROM eoi ORDER BY $field";
        $result = $conn->query($query);
    }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W Corp | Manage EOIs</title>
    <link rel="stylesheet" href="style/styles.css">
    <style>
        .manage-container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        .form-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
        .form-card { background: #f9f9f9; padding: 1.5rem; border-radius: 12px; border: 1px solid #ddd; }
        .form-card h3 { margin-top: 0; color: #0d47a1; }
        .form-row { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1rem; }
        label { font-weight: 600; }
        input, select, button { padding: 0.75rem; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; }
        button { background: #1976d2; color: white; cursor: pointer; font-weight: 600; transition: background 0.3s; }
        button:hover { background: #1565c0; }
        .message { padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-weight: 500; }
        .success { background: #e8f5e9; border: 1px solid #4caf50; color: #2e7d32; }
        .error { background: #ffebee; border: 1px solid #f44336; color: #c62828; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; font-size: 0.95rem; }
        th, td { padding: 0.75rem; border: 1px solid #ddd; text-align: left; }
        th { background: #0d47a1; color: white; }
        tr:nth-child(even) { background: #f9f9f9; color: #000 }
        tr:nth-child(odd) td {color: #fff;}
        .skills-list { white-space: pre-wrap; }
        @media (max-width: 768px) { table { font-size: 0.85rem; } }
    </style>
</head>
<body>
    <?php include 'header.inc'; ?>

    <div class="manage-container">
        <h1>Manage Expressions of Interest (EOIs)</h1>

        <?php if ($message): ?>
            <div class="message <?= strpos($message, 'Error') === false && strpos($message, 'Invalid') === false ? 'success' : 'error' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <div class="form-grid">
            <!-- List All -->
            <div class="form-card">
                <h3>List All EOIs</h3>
                <form method="post">
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                    <button type="submit" name="list_all">Show All</button>
                </form>
            </div>

            <!-- List by Job -->
            <div class="form-card">
                <h3>List by Job Reference</h3>
                <form method="post">
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                    <div class="form-row">
                        <label for="job_ref">Job reference:</label>
                        <input type="text" id="job_ref" name="job_ref" placeholder="e.g. IT5T1" required>
                    </div>
                    <button type="submit" name="list_by_job">Search</button>
                </form>
            </div>

            <!-- List by Name -->
            <div class="form-card">
                <h3>List by Applicant</h3>
                <form method="post">
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                    <div class="form-row">
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Optional">
                    </div>
                    <div class="form-row">
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Optional">
                    </div>
                    <button type="submit" name="list_by_applicant">Search</button>
                </form>
            </div>

            <!-- Delete -->
            <div class="form-card">
                <h3>Delete by Job Ref</h3>
                <form method="post" onsubmit="return confirm('Delete ALL EOIs for this job?');">
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                    <div class="form-row">
                        <label for="delete_job_ref">Job Ref:</label>
                        <input type="text" id="delete_job_ref" name="delete_job_ref" required>
                    </div>
                    <button type="submit" name="delete_by_job" style="background:#d32f2f;">Delete</button>
                </form>
            </div>

            <!-- Change Status -->
            <div class="form-card">
                <h3>Update EOI Status</h3>
                <form method="post">
                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                    <div class="form-row">
                        <label for="eoi_number">EOI #:</label>
                        <input type="number" id="eoi_number" name="eoi_number" min="1" required>
                    </div>
                    <div class="form-row">
                        <label for="status">New Status:</label>
                        <select id="status" name="status">
                            <option value="New">New</option>
                            <option value="Current">Current</option>
                            <option value="Final">Final</option>
                        </select>
                    </div>
                    <button type="submit" name="change_status">Update</button>
                </form>
            </div>
        </div>
<form method="post">

    <label for="sort_field">Sort by:</label>
    <select name="sort_field">
        <option value="EOInumber">EOI Number</option>
        <option value="job_ref">Job Reference</option>
        <option value="first_name">First Name</option>
        <option value="last_name">Last Name</option>
        <option value="dob">DOB</option>
        <option value="status">Status</option>
    </select>

    <button type="submit" name="sort">Sort</button>
</form>
<br><br>
        <!-- Results Table -->
        <?php if ($result && $result->num_rows > 0): ?>
            <h2>EOI Results (<?= $result->num_rows ?> found)</h2>
            <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>EOI #</th>
                            <th>Job Ref</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Skills</th>
                            <th>Other</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['EOInumber'] ?></td>
                                <td><?= htmlspecialchars($row['job_ref']) ?></td>
                                <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
                                <td><?= htmlspecialchars($row['dob']) ?></td>
                                <td><?= htmlspecialchars($row['gender']) ?></td>
                                <td>
                                    <?= htmlspecialchars($row['street']) ?><br>
                                    <?= htmlspecialchars($row['suburb'] . ', ' . $row['state'] . ' ' . $row['postcode']) ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($row['email']) ?><br>
                                    <?= htmlspecialchars($row['phone']) ?>
                                </td>
                                <td class="skills-list"><?= htmlspecialchars($row['skills']) ?></td>
                                <td><?= nl2br(htmlspecialchars($row['other_skills'])) ?></td>
                                <td><strong><?= htmlspecialchars($row['status']) ?></strong></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php elseif ($result !== null): ?>
            <p><em>No EOIs found matching your criteria.</em></p>
        <?php endif; ?>
    </div>

    <?php include 'footer.inc'; ?>
</body>
</html>

<?php
// Clean up
if (isset($stmt)) $stmt->close();
$conn->close();
?>
