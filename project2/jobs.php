<?php
include_once "header.inc";
require_once "settings.php";

/*
==========================================
 CONNECT TO MYSQL SERVER ONLY
==========================================
*/
$conn = @mysqli_connect($host, $user, $pwd);
if (!$conn) {
    echo "<p class='error'>Could not connect to MySQL server.</p>";
    exit();
}

/*
==========================================
 CHECK IF DATABASE 'job' EXISTS
==========================================
*/
$db_check = mysqli_query($conn, "SHOW DATABASES LIKE 'job';");

if (mysqli_num_rows($db_check) == 0) {
    mysqli_query($conn, "CREATE DATABASE job");
}

/* Select DB */
mysqli_select_db($conn, "job");

/*
==========================================
 CHECK IF TABLE job_list EXISTS
 IF NOT, CREATE + INSERT SAMPLE DATA
==========================================
*/
$table_check = mysqli_query($conn, "SHOW TABLES LIKE 'job_list';");

if (mysqli_num_rows($table_check) == 0) {

    $create = "
    CREATE TABLE job_list (
        job_ref VARCHAR(5) PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        requirements TEXT NOT NULL,
        salary VARCHAR(50),
        contract_type VARCHAR(50),
        location VARCHAR(50),
        closing_date DATE
    )";

    mysqli_query($conn, $create);

    $insert = "
    INSERT INTO job_list VALUES
    ('DEV01','Junior PHP Developer','Develop backend features and fix bugs.',
     '• PHP\n• MySQL\n• HTML/CSS','$800–$1200','Full-time','Ho Chi Minh City','2025-12-30'),

    ('DS02','Data Analyst Intern','Assist with data cleaning and reporting.',
     '• SQL\n• Excel\n• Python','$300–$500','Internship','Hanoi','2025-12-15'),

    ('UX03','UI/UX Designer','Design clean and modern interfaces.',
     '• Figma\n• Adobe XD','$900–$1500','Full-time','Ho Chi Minh City','2025-11-30'),

    ('IT04','IT Support Officer','Provide technical support to staff.',
     '• Troubleshooting\n• Networking','$700–$1100','Full-time','Da Nang','2025-12-31'),

    ('MKT05','Digital Marketing Assistant','Assist with marketing campaigns.',
     '• Social media\n• Canva','$600–$1000','Part-time','Ho Chi Minh City','2025-12-20');
    ";

    mysqli_query($conn, $insert);
}

/*
==========================================
 GET ALL JOBS
==========================================
*/
$query = "SELECT * FROM job_list";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore exciting IT career opportunities at W Corp.">
    <title>W Corp | Job Opportunities</title>
</head>

<body>



<div class="container">
    <main class="site-main">
        <header class="page-header">
            <h1>Current Job Opportunities</h1>
            <p>Explore our exciting career opportunities and find your perfect role in technology.</p>
        </header>

        <?php
        if (mysqli_num_rows($result) == 0) {
            echo "<p>No jobs available.</p>";
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <article class='job-position'>
                    <header>
                        <h2 itemprop='title'>{$row['title']}</h2>
                        <a href='apply.php?job_ref={$row['job_ref']}' class='btn-apply'>Apply Now</a>
                    </header>

                    <dl class='job-details'>
                        <dt>Reference Number:</dt><dd itemprop='identifier'>{$row['job_ref']}</dd>
                        <dt>Salary Range:</dt><dd itemprop='baseSalary'>{$row['salary']}</dd>
                        <dt>Location:</dt><dd itemprop='jobLocation'>{$row['location']}</dd>
                        <dt>Contract:</dt><dd>{$row['contract_type']}</dd>
                        <dt>Closing Date:</dt><dd>{$row['closing_date']}</dd>
                    </dl>

                    <section class='job-description'>
                        <h3>Description</h3>
                        <p itemprop='description'>{$row['description']}</p>
                    </section>

                    <section class='job-responsibilities'>
                        <h3>Requirements</h3>
                        <ul itemprop='responsibilities'>
                ";

                foreach (explode("\n", $row['requirements']) as $req) {
                    echo "<li>" . htmlspecialchars($req) . "</li>";
                }

                echo "
                        </ul>
                    </section>
                </article>
                ";
            }
        }
        ?>
    </main>

    <aside class="side-info">
        <h3>Why Join W Corp?</h3>
        <div class="benefit">
            <h4>Company Benefits</h4>
            <ul>
                <li>Competitive salary with annual reviews</li>
                <li>Professional development & training</li>
                <li>Flexible and remote work options</li>
                <li>Retirement savings plan</li>
                <li>Modern office & latest tech</li>
            </ul>
        </div>
    </aside>
</div>

<?php include 'footer.inc'; ?>

</body>
</html>

<?php mysqli_close($conn); ?>
