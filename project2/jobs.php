<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore exciting IT career opportunities at W Corp: IT Support Technician, Full Stack Web Developer, and Cybersecurity Analyst.">
    <meta name="keywords" content="W Corp jobs, IT careers, web developer, cybersecurity, IT support">
    <title>W Corp | Job Opportunities</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <?php include 'header.inc'; ?>

    <div class="container">
        <main class="site-main">
            <header class="page-header">
                <h1>Current Job Opportunities</h1>
                <p>Explore our exciting career opportunities and find your perfect role in technology. We are committed to building a diverse and innovative team.</p>
            </header>

            <!-- Quick Navigation -->
            <nav class="job-nav" aria-label="Job positions">
                <ul>
                    <li><a href="#position1">IT Support Technician</a></li>
                    <li><a href="#position2">Full Stack Web Developer</a></li>
                    <li><a href="#position3">Cybersecurity Analyst</a></li>
                </ul>
            </nav>

            <!-- === POSITION 1 === -->
            <article id="position1" class="job-position" itemscope itemtype="http://schema.org/JobPosting">
                <header>
                    <h2 itemprop="title">IT Support Technician</h2>
                    <a href="pages/apply.php?ref=IT5T1" class="btn-apply">Apply Now</a>
                </header>

                <dl class="job-details">
                    <dt>Reference Number:</dt>
                    <dd itemprop="identifier">IT5T1</dd>

                    <dt>Position Title:</dt>
                    <dd itemprop="title">IT Support Technician</dd>

                    <dt>Salary Range:</dt>
                    <dd itemprop="baseSalary">$45,000 – $60,000 per annum</dd>

                    <dt>Reports To:</dt>
                    <dd itemprop="reportsTo">IT Support Manager</dd>
                </dl>

                <section class="job-description">
                    <h3>Position Description</h3>
                    <p itemprop="description">
                        We are seeking a dedicated and skilled IT Support Technician to join our dynamic technology team. This role involves providing comprehensive technical assistance to staff members, maintaining computer systems, and ensuring the smooth operation of our IT infrastructure...
                    </p>
                </section>

                <section class="job-responsibilities">
                    <h3>Key Responsibilities</h3>
                    <ul itemprop="responsibilities">
                        <li>Provide first and second-level technical support via phone, email, and in-person</li>
                        <li>Install, configure, and maintain hardware, software, and peripherals</li>
                        <li>Diagnose and resolve issues with desktops, laptops, printers, and mobile devices</li>
                        <!-- ... rest of list ... -->
                    </ul>
                </section>

                <div class="requirements-section">
                    <section>
                        <h3>Essential Qualifications</h3>
                        <ul itemprop="qualifications">
                            <li>Associate degree in IT or related field</li>
                            <li>2+ years hands-on IT support experience</li>
                            <!-- ... -->
                        </ul>
                    </section>

                    <section>
                        <h3>Preferable Qualifications</h3>
                        <ul>
                            <li>CompTIA A+, Network+, or Microsoft certifications</li>
                            <li>Mac OS and iOS support experience</li>
                            <!-- ... -->
                        </ul>
                    </section>
                </div>
            </article>

            <!-- === POSITION 2 & 3 (Abbreviated for space) === -->
            <!-- Use same structure as above -->

            <!-- POSITION 2: Full Stack Web Developer -->
            <article id="position2" class="job-position" itemscope itemtype="http://schema.org/JobPosting">
                <header>
                    <h2 itemprop="title">Full Stack Web Developer</h2>
                    <a href="pages/apply.php?ref=WD7F2" class="btn-apply">Apply Now</a>
                </header>
                <dl class="job-details">
                    <dt>Reference Number:</dt><dd itemprop="identifier">WD7F2</dd>
                    <dt>Salary Range:</dt><dd itemprop="baseSalary">$70,000 – $95,000</dd>
                    <dt>Reports To:</dt><dd itemprop="reportsTo">Development Team Lead</dd>
                </dl>
                <!-- Description, responsibilities, qualifications -->
            </article>

            <!-- POSITION 3: Cybersecurity Analyst -->
            <article id="position3" class="job-position" itemscope itemtype="http://schema.org/JobPosting">
                <header>
                    <h2 itemprop="title">Cybersecurity Analyst</h2>
                    <a href="pages/apply.php?ref=CS3A9" class="btn-apply">Apply Now</a>
                </header>
                <dl class="job-details">
                    <dt>Reference Number:</dt><dd itemprop="identifier">CS3A9</dd>
                    <dt>Salary Range:</dt><dd itemprop="baseSalary">$75,000 – $100,000</dd>
                    <dt>Reports To:</dt><dd itemprop="reportsTo">CISO</dd>
                </dl>
                <!-- Description, responsibilities, qualifications -->
            </article>
        </main>

        <!-- Aside: Company Benefits -->
        <aside class="side-info">
            <h3>Why Join W Corp?</h3>
            <div class="benefit">
                <h4>Company Benefits</h4>
                <p>We offer a comprehensive package to support your growth and wellbeing:</p>
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
