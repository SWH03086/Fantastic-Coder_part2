<!-- THIS IS THE HEADER.INC -->
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

/* THE HIDDEN CHECKBOX */
#toggleSidebar {
  display: none;
}

/* STYLING FOR SIDEBAR */
.sidebar {
  position: fixed;
  right: -250px;
  top: 0;
  width: 250px;
  height: 100%;
  background-color: #111;
  color: white;
  padding-top: 90px;
  transition: right 0.5s;
  z-index: 1001; 
  border-left: 2px solid rgb(8, 103, 244);
  display: flex;
  flex-direction: column;   
}

/* SIDEBAR LINKS */
.sidebar a {
  display: block;
  padding: 15px 20px;
  color: white;
  text-decoration: none;
}

.sidebar a:hover {
  background-color: #575757;
}

/* OPEN BUTTON */
label.open-btn {
  position: fixed;
  top: 20px;
  right: 20px;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  z-index: 1002; 
border: 2px solid rgb(8, 103, 244);
}

/* Slide sidebar in when checked */
#toggleSidebar:checked ~ .sidebar {
  right: 0;
}

/* FULL-SCREEN OVERLAY */
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: transparent; 
  display: none;
  z-index: 1000; 
}


.bottom-fixed {
  margin-top: auto;     
  padding: 15px 20px;
  background: #222;
  text-align: center;
  border-top: 2px solid rgb(8, 103, 244);
}






/* SHOW OVERLAY WHEN SIDEBAR IS OPENED */
#toggleSidebar:checked ~ .overlay {
  display: block;
}
</style>
</head>
<body>

<!-- CHECKBOX TO CONTROL SIDEBAR -->
<input type="checkbox" id="toggleSidebar">

<!-- BUTTON TO OPEN SIDEBAR -->
<label for="toggleSidebar" class="open-btn">☰ Menu</label>

<!-- SIDEBAR -->
<div class="sidebar">
  <a href="login.php">Login</a>
  <a href="signup.php">Sign up</a>
  <a href="manage.php">Manage</a>
  <a href="logout.php" class="bottom-fixed">Log out</a>
</div>

<!-- OVERLAY TO CLOSE SIDEBAR -->
<label for="toggleSidebar" class="overlay"></label>

</body>
</html>

<header class="site-header" role="banner">
    <div class="header-top">
        <!-- Clickable Logo -->
        <a href="index.php" class="logo-link">
            <img src="images/W_Corp._Logo.png" alt="W Corp Logo - Home" class="logo">
        </a>

        <!-- HEADER TEXTS -->
        <div class="header-text">
            <h3>The official home page of Work Corporation!</h3>
            <h1>W Corp welcomes you!</h1>
        </div>
    </div>

    <!-- NAVIGATION -->
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
