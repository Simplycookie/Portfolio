<?php include("Base.php")?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">

        <title>DICE - League</title>

        <link rel="stylesheet" href="league-society.css">
        <link rel="stylesheet" href="global.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap" rel="stylesheet">

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
                        <div id="authStateButton"></div>
                    </div>
                </div>
            </nav>
            
            <!-- CATEGORY TITLE -->
            <section style = "height: 350px;">

                <h1 class="categorytitle">DICE League</h1>

            </section>

        </header>

        <!-- EVENT DESCRIPTION -->
        <section id="event_desc" class = "box"> 

            <div class="events-detail-container">

                <div class="detail-image">
                    <img src="assets/image.jpg" alt="DICE logo">
                </div>

                <div class="detail-right">
                    <h1 class="subhead1">Event Description</h1>
                    <p class="s1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <a href="DICE-Calendar.html" class="detail-calendar" target="_blank">View Calendar</a>
                </div>  
            </div>

        </section>

        <!-- TIERS -->
        <section class="box">

            <h1 class="subhead2" style="margin-bottom: 80px;">DICE League Tiers</h1>

             <!-- RENT THE BOARDGAMES -->

            <section class="tiers-container">

            <div class = "tier-card">
                <a href="https://www.youtube.com/" target="_blank">
                        <div>
                            <h1>Tier 2</h1>
                            <br>
                            <p>Interested in renting our boardgames? Click here!</p>
                        </div>
                </a>
            </div>
            
            <div class = "tier-card">
                <a href="https://www.youtube.com/" target="_blank">
                        <div>
                            <h1>Tier 3</h1>
                            <br>
                            <p>Interested in renting our boardgames? Click here!</p>
                        </div>
                </a>
            </div>

            </section>

        
        </section>

        <!-- RULESET -->

        <section>
            <a class = "options-button" href="https://docs.google.com/document/d/1jPB4VCpQb2i1iCswREqhfdMFJEhR1IwvWCbi3ydP-NM/" target="_blank">
                    <div>
                        <h1>DICE League Ruleset</h1>
                        <br>
                        <p>Read about the rules and regulations for DICE League here.</p>
                    </div>
            </a>
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
