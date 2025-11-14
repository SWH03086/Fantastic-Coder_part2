<!-- header.inc -->
<header class="site-header" role="banner">
    <div class="header-top">
        <!-- Clickable Logo -->
        <a href="index.php" class="logo-link">
            <img src="images/W_Corp._Logo.png" alt="W Corp Logo - Home" class="logo">
        </a>

        <!-- Header Text -->
        <div class="header-text">
            <h3>The official home page of Work Corporation!</h3>
            <h1>W Corp welcomes you!</h1>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="nav-bar" role="navigation" aria-label="Main navigation">
        <?php
        // Get current page filename (e.g., "about.php", "apply.php")
        $current_page = basename($_SERVER['PHP_SELF']);
        ?>

        <a href="index.php" 
           class="<?php echo $current_page === 'index.php' ? 'active' : ''; ?>">
            Home
        </a>
        <a href="jobs.php" 
           class="<?php echo $current_page === 'jobs.php' ? 'active' : ''; ?>">
            Jobs
        </a>
        <a href="apply.php" 
           class="<?php echo $current_page === 'apply.php' ? 'active' : ''; ?>">
            Apply
        </a>
        <a href="about.php" 
           class="<?php echo $current_page === 'about.php' ? 'active' : ''; ?>">
            About Us
        </a>
        
        
    </nav>

    <hr class="header-divider">
</header>
