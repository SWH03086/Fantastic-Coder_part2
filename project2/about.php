<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="At W Corp, we may experience ups and downs, but we never stop in terms of developing technology!">
    <meta name="keywords" content="technology, innovation, W Corp, development">
    <title>W Corp About Us Page</title>
    <link rel="stylesheet" href="style/styles.css">

</head>

<!--Main part of the webpage-->
<body>
    <header class="site-header">
  <div class="header-top">
    <img src="images/W_Corp._Logo.png" alt="W Corp logo" class="logo">
    <div class="header-text">
      <h3>The official home page of Work Corporation!</h3>
      <h1>W Corp welcomes you!</h1>
    </div>

    <!--The navigation bar-->
  </div>
        <nav class="nav-bar">
            <a href="index.html">Home page</a>
            <a href="about.html">About Us</a>
            <a href="apply.html">Apply</a>
            <a href="jobs.html">Jobs</a>
        </nav>
        <hr>
    </header>

    <h2>Fantastic coders</h2>
    <p>Some information about us!!!</p>

    <!--Fieldset detailing the member's names, interests & student IDs-->
    <fieldset class="fs">
        <legend class="le">Members</legend>
    <ul>
        <li>Pham Tran Gia Bao
            <p class="aboutp">Student id: SWH03086</p>
            <ul>
                <li>Free time: Mondays & Sundays</li>
                <li>Class days: Tuesday mornings + Thursdays + Friday afternoons</li>
            </ul>
            
            </li>
        <li>Nguyen The Hai
            <p class="aboutp">Student id: SWH03089</p>
            <ul>
                <li>Free time: None</li>
                <li>Class days: Wednesday mornings + Thursday afternoons + Fridays</li>
            </ul>
            </li>
        <li>Mykhaylyk Danylo The Anh  
            <p class="aboutp">Student id: SWH02970</p>
            <ul>
                <li>Free time: Mondays + Tuesdays + Wednesday afternoons + Thursday mornings + Saturdays + Sundays</li>
                <li>Class day: Wednesday mornings + Thursday afternoons + Fridays</li>
            </ul>
            </li>
    </ul>
    </fieldset>

    <!--The part where we display our professor's portrait-->
    <fieldset class="fs1">
        <legend>Our turtor</legend>
    <p>Ms. Nguyen Thuy Linh</p>
    <figure>
        <img src="images/ourturtor.png" class="turtor">
        <figcaption>A beautiful lady and an wonderful teacher</figcaption>
    </figure>
    </fieldset>


    <!--This is the fieldset for the group members contribution and role-->
    <fieldset class="fs2">
        <legend>Each members contribution to this website</legend>
    <dl>
        <dt>Pham Tran Gia Bao</dt>
        <dd>Position Descriptions and job application pages</dd>
        <dt>Nguyen The Hai</dt>
        <dd>About our group page</dd>
        <dt>Mykhaylyk Danylo The Anh</dt>
        <dd>Home page</dd>
    </dl>
    <figure>
        <img src="images/groupphoto.png" class="aboutimg">
        <figcaption class="af">Our group</figcaption>
    </figure>

    </fieldset>

    <!--This is the group member's interests table-->
    <table class="at">
        <thead>
            <tr>
                <th colspan="3" class="abouttable">Members Interests</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="abouttable">Pham Tran Gia Bao</th>
            <th class="abouttable">Nguyen The Hai</th>
            <th class="abouttable">Mykhaylyk Danylo The Anh</th>
        </tr>
        
        <tr>
            <td class="abouttable">Playing games</td>
            <td class="abouttable">Playing video games</td>
            <td class="abouttable">Playing video games</td>
        </tr>
        <tr>
            <td class="abouttable">Piano </td>
            <td class="abouttable">Listening to music</td>
            <td class="abouttable">Drink coffee and tea</td>
        <tr>
            <td class="abouttable">Reading japanese novels</td>
            <td class="abouttable">Eat</td>
            <td class="abouttable">Sleep and eat</td>
        </tr>
        </tbody>
        </table>

    <!--The footer of the website-->
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
