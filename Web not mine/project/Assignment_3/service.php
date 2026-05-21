<?php include("Base.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICE - Service</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="home.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Texturina:wght@700&family=Josefin+Sans:wght@400;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <!-- NAVIGATION -->
        <nav class="navbar">
            <div class="nav-container">
                <a href="index.php" class="logo">D.I.C.E.</a>
                <div class="nav-links">
                    <a href="index.php#about_us">About Us</a>
                    <a href="index.php#featured_events">Events</a>
                    <a href="index.php#dice_registration">Club Registration</a>
                    <a href="service.php">Service</a>
                    <a href="contact.php">Contact Us</a>
                    <p>|</p>
                    <a href="loginpage.php">Login</a>
                </div>
            </div>
        </nav>

        <!-- CATEGORY TITLE -->
        <section style="height: 350px;">

            <h1 class="categorytitle">DICE Services</h1>

        </section>

    </header>

    <section class="box" style="padding: 80px 0">

        <div class="events-container" id="eventsGrid">

            <!-- DICE Boardgame Rental Service -->
            <div class="event-card">
                <img class="event-image" src="assets/boardgames_rental_img.png" alt="Boardgame Rental Service">

                <div class="event-title">
                    <h3>Boardgame Rental Service</h3>
                </div>
                <div class="event-content">
                    <p class="event-description">Want to play our games during our off hours? Book our rental services
                        so you can play at your specific times. Prices are dependant on the number of hours, distance of
                        the venue from MMU and number of participants. </p>

                    <div class="event-actions">
                        <a class="event-action-button" href="https://www.instagram.com/mmu.dice/" target="_blank">View
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
                            <a href="#">Instagram</a> |
                            <a href="#">Discord</a> |
                            <a href="#">Email</a>
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
                                <li><a href="#about_us">Services</a></li>
                                <li><a href="#dice_registration">Contact Us</a></li>
                            </ul>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
    </footer>


</body>

</html>