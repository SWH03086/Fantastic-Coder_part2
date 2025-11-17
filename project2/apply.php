<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W Corp | Job Application</title>
    <meta name="description" content="Apply for IT positions at W Corp. Fill in this form to register your interest.">
    <meta name="keywords" content="job application, IT jobs, W Corp, careers">
    <link rel="stylesheet" href="style/styles.css">
</head>
<?php require_once("settings.php"); 
$sql = "SELECT job_ref, title FROM job_list";
$result = $conn->query($sql);?>
<body>
    <div class="scroll-detector"></div>
    <?php include 'header.inc'; ?>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="form-main">
        <h1>Job Application Form</h1>

        <section id="application-form" aria-describedby="form-desc">
            <p id="form-desc">
                Please fill out the form below to apply for a position at W Corp. 
                All fields marked with an asterisk (<span class="required">*</span>) are required.
            </p>

            <form method="post" action="process_eoi.php" novalidate>
            

                <!-- ===== Position Information ===== -->
                <fieldset>
                    <legend>Position Information</legend>
                    <div class="form-group">
                        <label for="job-ref">Job Reference Number: <span class="required">*</span></label>
                        <select id="job-ref" name="job_ref" required aria-required="true">
                            <option value="">Please Select</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['job_ref'] . "'>" . $row['job_ref']."-".$row['title'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </fieldset>

                <!-- ===== Personal Information ===== -->
                <fieldset>
                    <legend>Personal Information</legend>

                    <div class="form-group">
                        <label for="first-name">First Name: <span class="required">*</span></label>
                        <input type="text" id="first-name" name="first_name"
                               maxlength="20" pattern="[A-Za-z]+" 
                               title="Only letters (A–Z) are allowed"
                               required aria-required="true">
                    </div>

                    <div class="form-group">
                        <label for="last-name">Last Name: <span class="required">*</span></label>
                        <input type="text" id="last-name" name="last_name"
                               maxlength="20" pattern="[A-Za-z]+"
                               title="Only letters (A–Z) are allowed"
                               required aria-required="true">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth: <span class="required">*</span></label>
                        <input type="text" id="dob" name="dob"
                               pattern="\d{2}/\d{2}/\d{4}"
                               placeholder="dd/mm/yyyy"
                               title="Enter date as dd/mm/yyyy (e.g. 12/05/2000)"
                               required aria-required="true">
                    </div>

                    <fieldset class="gender-fieldset">
                        <legend>Gender: <span class="required">*</span></legend>
                        <div class="radio-group" role="radiogroup" aria-labelledby="gender-legend">
                            <input type="radio" id="male" name="gender" value="Male" required aria-required="true">
                            <label for="male">Male</label>

                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female">Female</label>

                            <input type="radio" id="other" name="gender" value="Other">
                            <label for="other">Other</label>
                        </div>
                    </fieldset>
                </fieldset>

                <!-- ===== Address Details ===== -->
                <fieldset>
                    <legend>Address Details</legend>

                    <div class="form-group">
                        <label for="street">Street Address: <span class="required">*</span></label>
                        <input type="text" id="street" name="street"
                               maxlength="40"
                               required aria-required="true">
                    </div>

                    <div class="form-group">
                        <label for="suburb">Suburb/Town: <span class="required">*</span></label>
                        <input type="text" id="suburb" name="suburb"
                               maxlength="40"
                               required aria-required="true">
                    </div>

                    <div class="form-group">
                        <label for="state">State: <span class="required">*</span></label>
                        <select id="state" name="state" required aria-required="true">
                            <option value="">Please Select</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="postcode">Postcode: <span class="required">*</span></label>
                        <input type="text" id="postcode" name="postcode"
                               pattern="\d{4}"
                               maxlength="4"
                               title="Postcode must be exactly 4 digits"
                               required aria-required="true">
                    </div>
                </fieldset>

                <!-- ===== Contact Information ===== -->
                <fieldset>
                    <legend>Contact Information</legend>

                    <div class="form-group">
                        <label for="email">Email Address: <span class="required">*</span></label>
                        <input type="email" id="email" name="email"
                               required aria-required="true">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number: <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone"
                               pattern="[0-9\s]{8,12}"
                               title="Phone number must be 8–12 digits (spaces allowed)"
                               required aria-required="true">
                    </div>
                </fieldset>

                <!-- ===== Skills and Qualifications ===== -->
                <fieldset>
                    <legend>Skills and Qualifications</legend>

                    <div class="form-group">
                        <p><strong>Required Technical Skills: <span class="required">*</span></strong></p>
                        <div class="checkbox-group">
                            <?php
                            $skills = [
                                'html' => 'HTML',
                                'css' => 'CSS',
                                'javascript' => 'JavaScript',
                                'python' => 'Python',
                                'java' => 'Java',
                                'sql' => 'SQL',
                                'php' => 'PHP',
                                'react' => 'React'
                            ];
                            foreach ($skills as $id => $label) {
                                echo "<div class=\"checkbox-item\">";
                                echo "<input type=\"checkbox\" id=\"$id\" name=\"skills[]\" value=\"$label\">";
                                echo "<label for=\"$id\">$label</label>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                        <p class="help-text">Select all that apply. At least one skill is required.</p>
                    </div>

                    <div class="form-group">
                        <label for="other-skills">Other Skills:</label>
                        <textarea id="other-skills" name="other_skills" rows="6"
                                  placeholder="Please describe any other relevant skills, experience, or qualifications..."
                                  aria-describedby="other-skills-help"></textarea>
                        <p id="other-skills-help" class="help-text">Optional — describe any additional skills here.</p>
                    </div>
                </fieldset>

                <!-- ===== Buttons ===== -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">Submit Application</button>
                    <button type="reset" class="btn-reset">Reset Form</button>
                </div>
            </form>
        </section>
    </main>

    <?php include 'footer.inc'; ?>
</body>
</html>
