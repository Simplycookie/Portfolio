<?php include("Base.php") ?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>DICE - Boardgame Hangout</title>

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
                    <div id="authStateButton"></div>
                </div>
            </div>
        </nav>

        <!-- CATEGORY TITLE -->
        <section style="height: 350px;">

            <h1 class="categorytitle">DICE Boardgame Hangout</h1>

        </section>

    </header>

    <!-- EVENT DESCRIPTION -->
    <section id="event_desc" class = "box"> 

            <div class="events-detail-container">

                <div class="detail-image">
                    <img src="assets/boardgame-hangout.jpg" alt="DICE Boardgame Hangout Image">
                </div>

                <div class="detail-right">
                    <h1 class="subhead1">Event Description</h1>
                    <p class="s1">
                        DICE Boardgames Hangout is a bi-weekly board game session where 
                        members gather every two weeks to play, socialise, and explore a 
                        variety of tabletop games in a relaxed and welcoming environment.
                        <br><br>
                        The event features a mix of strategy games, party games, card games 
                        and social deduction titles catering to both experienced players and beginners.
                    </p>
                    <a href="DICE-Event-Booking.php" class="detail-calendar" target="_blank">Book Event</a>
                </div>  
            </div>

        </section>

    <!-- BOARDGAMES AVAIL -->
    <section class="box">

        <h1 class="subhead2" style="margin-bottom: 80px;">DICE Boardgame Collection</h1>


        <div class="boardgames-container">

            <!-- BOARDGAMES -->
            <div class="boardgame-card">
                <img class="boardgame-image" src="assets/nasi-lemak-board.png" alt="Nasi Lemak Card Game">

                <div class="boardgame-title">
                    <h3>Nasi Lemak The Game</h3>
                </div>
                <div class="boardgame-content">
                    <span class="boardgame-category">Cards</span>
                    <span class="boardgame-category">Casual</span>
                    <span class="boardgame-category">PVP</span>

                    <div class="boardgame-actions">
                        <a class="boardgame-action-button" href="DICE-Boardgame-List.php?BG_ID=1" target="_blank">View
                            Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

            <div class="boardgame-card">
                <img class="boardgame-image" src="assets/due-quest-board.png" alt="Duo Quest Card Game">


                <div class="boardgame-title">
                    <h3>Duo Quest</h3>
                </div>
                <div class="boardgame-content">
                    <span class="boardgame-category">Board Game</span>
                    <span class="boardgame-category">Casual</span>
                    <span class="boardgame-category">Co-Op</span>

                    <div class="boardgame-actions">
                        <a class="boardgame-action-button" href="DICE-Boardgame-List.php?BG_ID=2" target="_blank">View
                            Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

            <div class="boardgame-card">
                <img class="boardgame-image" src="assets/root-board.jpg" alt="Root Boardgame">


                <div class="boardgame-title">
                    <h3>Root</h3>
                </div>
                <div class="boardgame-content">
                    <span class="boardgame-category">Board Game</span>
                    <span class="boardgame-category">Strategy</span>
                    <span class="boardgame-category">PVP</span>

                    <div class="boardgame-actions">
                        <a class="boardgame-action-button" href="DICE-Boardgame-List.php?BG_ID=3" target="_blank">View
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
                                <li><a href="DICE-Event-Booking.php">Book Event</a></li>
                                <li><a href="review.php">Leave a Review</a><li>
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