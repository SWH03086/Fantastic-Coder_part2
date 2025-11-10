<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>W Corp | Job Application</title>
  <meta name="description" content="Apply for IT positions at W Corp. Fill in this form to register your interest.">
  <link rel="stylesheet" href="style/styles.css">
</head>

<body>
  <!-- ===== HEADER ===== -->
  <header class="site-header">
    <div class="header-top">
      <img src="/project1/images/W_Corp._Logo.png" alt="W Corp logo" class="logo">
      <div class="header-text">
        <h3>The official home page of Work Corporation!</h3>
        <h1>W Corp welcomes you!</h1>
      </div>
    </div>

    <nav class="nav-bar" aria-label="Main Navigation">
      <a href="index.html">Home page</a>
      <a href="about.html">About Us</a>
      <a href="apply.html" aria-current="page">Apply</a>
      <a href="jobs.html">Jobs</a>
    </nav>
    <hr>
  </header>

  <!-- ===== MAIN CONTENT ===== -->
  <main class="form-main">
    <h1>Job Application Form</h1>
    <section id="application-form" aria-describedby="form-desc">
      <p id="form-desc">
        Please fill out the form below to apply for a position at W Corp. All fields marked with an asterisk (*) are required.
      </p>

      <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php" novalidate>

        <!-- ===== Position Information ===== -->
        <fieldset>
          <legend>Position Information</legend>
          <div class="form-group">
            <label for="job-ref">Job Reference Number: *</label>
            <select id="job-ref" name="job-ref" required title="Select the job reference number you are applying for">
              <option value="">Please Select</option>
              <option value="IT5T1">IT5T1 - IT Support Technician</option>
              <option value="WD7F2">WD7F2 - Full Stack Web Developer</option>
              <option value="CS3A9">CS3A9 - Cybersecurity Analyst</option>
            </select>
          </div>
        </fieldset>

        <!-- ===== Personal Information ===== -->
        <fieldset>
          <legend>Personal Information</legend>

          <div class="form-group">
            <label for="first-name">First Name: *</label>
            <input type="text" id="first-name" name="first-name"
                   maxlength="20" pattern="[A-Za-z]+"
                   title="Only letters (A–Z) are allowed"
                   required>
          </div>

          <div class="form-group">
            <label for="last-name">Last Name: *</label>
            <input type="text" id="last-name" name="last-name"
                   maxlength="20" pattern="[A-Za-z]+"
                   title="Only letters (A–Z) are allowed"
                   required>
          </div>

          <div class="form-group">
            <label for="dob">Date of Birth: *</label>
            <input type="text" id="dob" name="dob"
                   pattern="\d{2}/\d{2}/\d{4}"
                   placeholder="dd/mm/yyyy"
                   title="Enter date as dd/mm/yyyy (e.g. 12/05/2000)"
                   required>
          </div>

          <fieldset class="gender-fieldset">
            <legend>Gender: *</legend>
            <div class="radio-group" role="radiogroup" aria-label="Gender selection">
              <input type="radio" id="male" name="gender" value="Male" required>
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
            <label for="street">Street Address: *</label>
            <input type="text" id="street" name="street"
                   maxlength="40"
                   title="Enter your street address (max 40 characters)"
                   required>
          </div>

          <div class="form-group">
            <label for="suburb">Suburb/Town: *</label>
            <input type="text" id="suburb" name="suburb"
                   maxlength="40"
                   title="Enter your suburb or town (max 40 characters)"
                   required>
          </div>

          <div class="form-group">
            <label for="state">State: *</label>
            <select id="state" name="state" required title="Select your state of residence">
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
            <label for="postcode">Postcode: *</label>
            <input type="text" id="postcode" name="postcode"
                   pattern="\d{4}"
                   title="Postcode must be exactly 4 digits"
                   required>
          </div>
        </fieldset>

        <!-- ===== Contact Information ===== -->
        <fieldset>
          <legend>Contact Information</legend>

          <div class="form-group">
            <label for="email">Email Address: *</label>
            <input type="email" id="email" name="email"
                   title="Enter a valid email, e.g. name@example.com"
                   required>
          </div>

          <div class="form-group">
            <label for="phone">Phone Number: *</label>
            <input type="tel" id="phone" name="phone"
                   pattern="[\d\s]{8,12}"
                   title="Phone number must be 8–12 digits (you may include spaces)"
                   required>
          </div>
        </fieldset>

        <!-- ===== Skills and Qualifications ===== -->
        <fieldset>
          <legend>Skills and Qualifications</legend>

          <div class="form-group">
            <label>Required Technical Skills: *</label>
            <div class="checkbox-group">
              <input type="checkbox" id="html" name="skills" value="HTML">
              <label for="html">HTML</label>

              <input type="checkbox" id="css" name="skills" value="CSS">
              <label for="css">CSS</label>

              <input type="checkbox" id="javascript" name="skills" value="JavaScript">
              <label for="javascript">JavaScript</label>

              <input type="checkbox" id="python" name="skills" value="Python">
              <label for="python">Python</label>

              <input type="checkbox" id="java" name="skills" value="Java">
              <label for="java">Java</label>

              <input type="checkbox" id="sql" name="skills" value="SQL">
              <label for="sql">SQL</label>

              <input type="checkbox" id="php" name="skills" value="PHP">
              <label for="php">PHP</label>

              <input type="checkbox" id="react" name="skills" value="React">
              <label for="react">React</label>
            </div>
          </div>

          <div class="form-group">
            <label for="other-skills">Other Skills:</label>
            <textarea id="other-skills" name="other-skills" rows="6"
                      placeholder="Please describe any other relevant skills, experience, or qualifications..."
                      title="Optional field — describe any additional skills here"></textarea>
          </div>
        </fieldset>

        <!-- ===== Buttons ===== -->
        <div class="form-actions">
          <button type="submit" class="btn-submit">Apply</button>
          <button type="reset" class="btn-reset">Reset Form</button>
        </div>
      </form>
    </section>
  </main>

  <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
    <p>
        Contact us via email!
        <a href="https://danyloswin123.atlassian.net/browse/CF">
            WorkCorporation@email.com
        </a>
    </p>
    </footer>
</body>
</html>
