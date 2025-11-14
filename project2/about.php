<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="At W Corp, we may experience ups and downs, but we never stop in terms of developing technology!">
    <meta name="keywords" content="technology, innovation, W Corp, development">
    <title>W Corp | About Us</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <?php include 'header.inc'; ?>

    <main>
        <section>
            <h2>Fantastic Coders</h2>
            <p>Some information about us!</p>
        </section>

        <!-- Team Members List -->
        <section>
            <fieldset class="fs">
                <legend class="le">Members</legend>
                <ul>
                    <li>
                        <strong>Pham Tran Gia Bao</strong>
                        <p class="aboutp">Student ID: SWH03086</p>
                        <ul>
                            <li>Free time: Mondays & Sundays</li>
                            <li>Class days: Tuesday mornings + Thursdays + Friday afternoons</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Nguyen The Hai</strong>
                        <p class="aboutp">Student ID: SWH03089</p>
                        <ul>
                            <li>Free time: None</li>
                            <li>Class days: Wednesday mornings + Thursday afternoons + Fridays</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Mykhaylyk Danylo The Anh</strong>
                        <p class="aboutp">Student ID: SWH02970</p>
                        <ul>
                            <li>Free time: Mondays + Tuesdays + Wednesday afternoons + Thursday mornings + Saturdays + Sundays</li>
                            <li>Class days: Wednesday mornings + Thursday afternoons + Fridays</li>
                        </ul>
                    </li>
                </ul>
            </fieldset>
        </section>

        <!-- Tutor Section -->
        <section>
            <fieldset class="fs1">
                <legend>Our Tutor</legend>
                <p>Ms. Nguyen Thuy Linh</p>
                <figure>
                    <img src="images/ourtutor.png" alt="Ms. Nguyen Thuy Linh - Our Tutor" class="tutor">
                    <figcaption>A beautiful lady and a wonderful teacher</figcaption>
                </figure>
            </fieldset>
        </section>

        <!-- Contributions -->
        <section>
            <fieldset class="fs2">
                <legend>Each Member's Contribution to This Website</legend>
                <dl>
                    <dt>Pham Tran Gia Bao</dt>
                    <dd>Position Descriptions and Job Application Pages</dd>

                    <dt>Nguyen The Hai</dt>
                    <dd>About Our Group Page</dd>

                    <dt>Mykhaylyk Danylo The Anh</dt>
                    <dd>Home Page</dd>
                </dl>

                <figure>
                    <img src="images/groupphoto.png" alt="W Corp Team Group Photo" class="aboutimg">
                    <figcaption class="af">Our Group</figcaption>
                </figure>
            </fieldset>
        </section>

        <!-- Interests Table -->
        <section>
            <table class="at" aria-labelledby="interests-caption">
                <caption id="interests-caption" class="abouttable">Members' Interests</caption>
                <thead>
                    <tr>
                        <th scope="col">Pham Tran Gia Bao</th>
                        <th scope="col">Nguyen The Hai</th>
                        <th scope="col">Mykhaylyk Danylo The Anh</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Playing games</td>
                        <td>Playing video games</td>
                        <td>Playing video games</td>
                    </tr>
                    <tr>
                        <td>Piano</td>
                        <td>Listening to music</td>
                        <td>Drink coffee and tea</td>
                    </tr>
                    <tr>
                        <td>Reading Japanese novels</td>
                        <td>Eat</td>
                        <td>Sleep and eat</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <?php include 'footer.inc'; ?>
</body>
</html>
