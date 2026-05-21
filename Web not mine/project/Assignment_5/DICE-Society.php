<?php include("Base.php")?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">

        <title>DICE - Society</title>

        <link rel="stylesheet" href="boardgames.css">
        <link rel="stylesheet" href="global.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap"
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
                        <a href="contact.php">Contact Us</a>
                        <p>|</p>
                        <a href="loginpage.php">Login</a>
                        <div id="authStateButton"></div>
                    </div>
                </div>
            </nav>
            
            <!-- CATEGORY TITLE -->
            <section style = "height: 350px;">

                <h1 class="categorytitle">DICE Society</h1>

            </section>

        </header>

        <!-- EVENT DESCRIPTION -->
        <section id="event_desc" class = "box"> 

            <div class="events-detail-container">

                <div class="detail-image">
                    <img src="assets/society.jpg" alt="DICE Society Image">
                </div>

                <div class="detail-right">
                    <h1 class="subhead1">Event Description</h1>
                    <p class="s1" style="text-align:left;">
                        DICE Society is a fortnightly gathering dedicated to the deep tactics and 
                        rich lore of Pathfinder 2e. Every two weeks, members unite to build unique 
                        heroes and dive into immersive, narrator-led quests that emphasize collaborative 
                        storytelling.<br><br>Whether you are a seasoned adventurer or just picking up your 
                        first d20, you'll find a welcoming community ready to roll initiative.
                    </p>
                    <a href="DICE-Event-Booking.php" class="detail-calendar" target="_blank">Book Event</a>
                </div>  
            </div>

        </section>

        <!-- RULESET -->

        <section>
            <a class = "options-button" href="https://docs.google.com/document/d/1jPB4VCpQb2i1iCswREqhfdMFJEhR1IwvWCbi3ydP-NM/" target="_blank">
                    <div>
                        <h1>DICE Society Ruleset</h1>
                        <br>
                        <p>Read about the rules and regulations for DICE Society here.</p>
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
                            <a href="https://www.instagram.com/mmu.dice/">Instagram</a> |
                            <a href="https://linktr.ee/D.I.C.E">Discord</a> |
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
                                <li><a href="DICE-Event-Booking.php">Book Event</a></li>
                            </ul>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
    </footer>

    </body>
</html>
