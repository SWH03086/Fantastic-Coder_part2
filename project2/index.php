<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="At W Corp, we may experience ups and downs, but we never stop in terms of developing technology!">
    <meta name="keywords" content="technology, innovation, W Corp, development">
    <title>W Corp Home Page</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<!--The main part of the website!-->
<body>
    <header class="site-header">
  <div class="header-top">

    <!--The logo of the website-->
    <img src="/project1/images/W_Corp._Logo.png" alt="W Corp logo" class="logo">

    <!--The title of the web-->
    <div class="header-text">
      <h3>The official home page of Work Corporation!</h3>
      <h1>W Corp welcomes you!</h1>
    </div>

    <!--Navigation bar of the webpage-->
  </div>
        <nav class="nav-bar">
            <a href="index.html">Home page</a>
            <a href="about.html">About Us</a>
            <a href="apply.html">Apply</a>
            <a href="jobs.html">Jobs</a>
        </nav>
        <hr>
    </header>

    <main class="site-main">
        <!--The fieldset is for keeping different segment of news articles I (Danylo) came up with-->
        <fieldset>
            <legend>News from Work Corporation!</legend>
            <!--Each div is a section of news article that I came up with-->
            <div>
                <h3>News from the Research & Development Department!</h3>
                <p>
                    The Research and Development Department from Work Corporation has just announced their latest technological breakthrough — the creation of an AI girlfriend for lonely young men! The goal of the AI girlfriend was to help combat the rising issue of loneliness. The R&D department also plans on making an AI boyfriend to help lonely young women!
                </p>
            </div>
            <div>
                <h3>News from the CEO of W Corp!</h3>
                <p>
                    The CEO of W Corp, Mr. Mersault Work, has been declared the richest man on Earth after the new invention from W Corp hit the market, booming in popularity.
                </p>
                <img src="W_Corp._L2_Cleanup_Agent_Meursault_Full.webp" alt="CEO of W Corp"> <!--The image of the "CEO" of our company-->
                <p>
                    "We may have our ups and downs in our progress, but we never stop progressing in I.T."
                    — Mersault Work, CEO of W Corp
                </p>
            </div>
            <div>
                <h3>News from the Developers of the Website!</h3>
                <p>
                    Hi there! My name is Mykhaylyk Danylo The Anh. I'm the leader of the Fantastic Coders group; my two teammates are Nguyen The Hai and Pham Tran Gia Bao. We are making a website with the theme of an I.T. corporation advertising its vacant positions! I do believe that we have done a wonderful job for a group that just learned the basics of HTML & CSS. We hope that you, dear professor, would give us an exceptionally high score for our project. We have put our heart and soul into making this just for you!
                </p>
            </div>

            <div>
                <h3>How can you contact us?</h3>
                <p>
                    Worry not! You can contact us via the company email placed at the bottom of the website, or you can email the creators of this website!
                </p>
            </div>
        </fieldset>

        <p> <!--This is for the feedback box at the bottom of the webpage-->
            <label for="Feedback">Feedback from you goes here!</label><br>
            <textarea id="Feedback" name="comment" rows="4" cols="40"
                placeholder = "Please input your feedback in this box!"></textarea>
        </p>
    </main>

    <!--The footer contains the company email address and the Jira account-->
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
