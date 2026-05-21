<?php include("Base.php") ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">

    <title>DICE - Contact Us</title>

    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="global.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- NAVIGATION -->
        <nav class="navbar">
            <div class="nav-container">
                <a href="index.php" class="logo">D.I.C.E.</a>
                <div class="nav-links">
                    <a href="index.php#about_us">About Us</a>
                    <a href="index.php#featured_events">Events</a>
                    <a href="index.php#dice_registration">Club Registration</a>
                    <a href="contact.php">Contact Us</a>
                    <p>|</p>
                    <div id="authStateButton"></div>
                </div>
            </div>
        </nav>

        <!-- CATEGORY TITLE -->
        <section style="height: 350px;">

            <h1 class="categorytitle">DICE Contact Information</h1>

        </section>

    </header>

    <section class="box" style="padding: 80px 0">

        <div class="events-container" id="eventsGrid">

            <!-- DICE Instagram -->
            <div class="event-card">
                <img class="event-image" src="assets/instagram_logo.png" alt="Instagram">

                <div class="event-title">
                    <h3>Instagram</h3>
                </div>
                <div class="event-content">
                    <p class="event-description">Follow us for updates on our event and special announcements.
                        such as our yearly capstone event, The Guild's Masquerade</p>

                    <div class="event-actions">
                        <a class="event-action-button" href="https://www.instagram.com/mmu.dice/" target="_blank">View
                            Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

            <!-- DICE Discord -->
            <div class="event-card">
                <img class="event-image" src="assets/discord_logo.png" alt="Discord">

                <div class="event-title">
                    <h3>Discord</h3>
                </div>

                <div class="event-content">
                    <p class="event-description">Our main platform for communication where club members can
                        chat, have fun and participate in DICE Role Play (RP). All events and announcements will be made
                        through here.</p>

                    <div class="event-actions">
                        <a class="event-action-button" href="https://discord.com/invite/pw47jQh" target="_blank">View
                            Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

            <!-- DICE Email -->
            <div class="event-card">
                <img class="event-image" src="assets/email_logo.png" alt="Email">

                <div class="event-title">
                    <h3>Email</h3>
                </div>
                <div class="event-content">
                    <p class="event-description">Have any questions? Feel free to click the link below to send
                        us an email, and a member of our party will get back to you as soon as the long rest is over.
                    </p>

                    <div class="event-actions">
                        <a class="event-action-button" href="mailto:d.i.c.e.mmu.cyber@gmail.com" target="_blank">View
                            Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- footer -->
<footer id="footer">
        <div>


            <div class="footer-container">

                <div>
                    <a href="index.php" class="footer-logo">
                        <img src="assets/DICE_LOGO.png" alt="DICE Logo">
                    </a>
                    <div>
                        <p>&copy; 2026 D.I.C.E. MMU | Dive into Imagination for Creative Entertainment</p>
                        <div class="social-links">
                            <a href="https://www.instagram.com/mmu.dice/">Instagram</a> |
                            <a href="https://discord.com/invite/pw47jQh">Discord</a> |
                            <a href="mailto:d.i.c.e.mmu.cyber@gmail.com">Email</a>
                        </div>
                    </div>
                </div>
                <table>

                    <tr>
                        <th>General</th>
                        <th>Events</th>
                        <th>Others</th>
                    </tr>

                    <tr>
                        <td>
                            <ul>
                                <li><a href="index.php#featured_events">Featured Events</a></li>
                                <li><a href="index.php#about_us">About Us</a></li>
                                <li><a href="index.php#dice_registration">Club Registration</a></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li><a href="DICE-Boardgame-Hangout.php" target="_blank">DICE Boardgame<br>Hangout</a>
                                </li>
                                <li><a href="DICE-League.php" target="_blank">DICE League</a></li>
                                <li><a href="DICE-Society.php" target="_blank">DICE Society</a></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="review.html">Leave a Review</a><li>
                            </ul>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
    </footer>

</body>
<script src="auth-state.js"></script>
</html>