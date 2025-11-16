<!-- header.inc -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CSS Only Slidebar with Close</title>
<link rel="stylesheet" href="style/styles.css">
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
}

/* Hidden checkbox */
#toggleSidebar {
  display: none;
}

/* Sidebar styling */
.sidebar {
  position: fixed;
  right: -250px;
  top: 0;
  width: 250px;
  height: 100%;
  background-color: #111;
  color: white;
  padding-top: 60px;
  transition: right 0.5s;
  z-index: 1001; /* above overlay */
}

/* Sidebar links */
.sidebar a {
  display: block;
  padding: 15px 20px;
  color: white;
  text-decoration: none;
}

.sidebar a:hover {
  background-color: #575757;
}

/* Open button */
label.open-btn {
  position: fixed;
  top: 20px;
  right: 20px;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  z-index: 1002; /* above everything */
}

/* Slide sidebar in when checked */
#toggleSidebar:checked ~ .sidebar {
  right: 0;
}

/* Full-screen overlay */
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: transparent; /* invisible but clickable */
  display: none; /* hidden by default */
  z-index: 1000; /* below sidebar */
}

/* Show overlay when sidebar is open */
#toggleSidebar:checked ~ .overlay {
  display: block;
}
</style>
</head>
<body>

<!-- Checkbox to control sidebar -->
<input type="checkbox" id="toggleSidebar">

<!-- Button to open sidebar -->
<label for="toggleSidebar" class="open-btn">☰ Menu</label>

<!-- Sidebar -->
<div class="sidebar">
  <a href="login.php">Login</a>
  <a href="signup.php">Sign up</a>
<a href="manage.php">Manage</a>
  <a href="logout.php">Log out</a>
</div>

<!-- Overlay to close sidebar -->
<label for="toggleSidebar" class="overlay"></label>

</body>
</html>

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

  
</header>
