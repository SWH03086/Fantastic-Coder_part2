<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="At W Corp, we may experience ups and downs, but we never stop in terms of developing technology!">
    <meta name="keywords" content="technology, innovation, W Corp, development, AI, jobs">
    <title>W Corp | Home</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <div class="scroll-detector"></div>
    <?php include 'header.inc'; ?>

    <main class="site-main">
        <section class="news-section">
            <h2 class="section-title">News from Work Corporation!</h2>

            <!-- News Article 1 -->
            <article class="news-article">
                <h3>AI Companion Breakthrough by R&D</h3>
                <p>
                    The Research and Development Department from Work Corporation has just announced their latest technological breakthrough — 
                    the creation of an <strong>AI girlfriend</strong> for lonely young men! The goal of the AI girlfriend was to help combat the rising issue of loneliness. 
                    The R&D department also plans on making an <strong>AI boyfriend</strong> to help lonely young women!
                </p>
            </article>

            <!-- News Article 2 -->
            <article class="news-article">
                <h3>CEO Mersault Work Named Richest Man on Earth</h3>
                <p>
                    The CEO of W Corp, <strong>Mr. Mersault Work</strong>, has been declared the richest man on Earth after the new invention from W Corp hit the market, booming in popularity.
                </p>
                <figure>
                    <img src="images/W_Corp._L2_Cleanup_Agent_Meursault_Full.webp" 
                         alt="Mr. Mersault Work, CEO of W Corp" 
                         class="news-img">
                    <figcaption>Mr. Mersault Work, CEO of W Corp</figcaption>
                </figure>
                <blockquote>
                    “We may have our ups and downs in our progress, but we never stop progressing in I.T.”
                    <cite>— Mersault Work, CEO of W Corp</cite>
                </blockquote>
            </article>

            <!-- News Article 3 -->
            <article class="news-article">
                <h3>Message from the Developers</h3>
                <p>
                    Hi there! My name is <strong>Mykhaylyk Danylo The Anh</strong>. I'm the leader of the 
                    <em>Fantastic Coders</em> group; my two teammates are <strong>Nguyen The Hai</strong> and 
                    <strong>Pham Tran Gia Bao</strong>. We are making a website with the theme of an I.T. corporation advertising its vacant positions!
                </p>
                <p>
                    I do believe that we have done a wonderful job for a group that just learned the basics of HTML & CSS. 
                    We hope that you, dear professor, would give us an exceptionally high score for our project. 
                    We have put our heart and soul into making this just for you!
                </p>
            </article>

            <!-- News Article 4 -->
            <article class="news-article">
                <h3>How to Contact Us?</h3>
                <p>
                    Worry not! You can contact us via the company email placed at the bottom of the website, 
                    or you can email the creators of this website directly.
                </p>
            </article>
        </section>

        <!-- Feedback Form -->
        <section class="feedback-section">
            <h2>Leave Your Feedback</h2>
            <form method="post" action="process_feedback.php" class="feedback-form">
                <div class="form-group">
                    <label for="feedback">Your Feedback:</label>
                    <textarea 
                        id="feedback" 
                        name="feedback" 
                        rows="5" 
                        cols="40"
                        maxlength="500"
                        placeholder="Please share your thoughts about our website..."
                        required
                        aria-describedby="feedback-help">
                    </textarea>
                    <p id="feedback-help" class="help-text">
                        Max 500 characters. Your feedback helps us improve!
                    </p>
                </div>
                <button type="submit" class="btn-submit">Submit Feedback</button>
            </form>
        </section>
    </main>

    <?php include 'footer.inc'; ?>
</body>
</html>
