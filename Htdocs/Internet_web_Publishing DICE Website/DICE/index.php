<?php include("Base.php"); 
$result = mysqli_query($connect,"Select * From featured_events");
while($row = mysqli_fetch_assoc($result)){
    if($row['FT_Name'] == "Featured Event"){
        $FT_event = $row;
    }
    if($row['FT_Name'] == "Boardgame hangout"){
        $Boardgame = $row;
    }
    if($row['FT_Name'] == "DICE League"){
        $League = $row;
    }
    if($row['FT_Name'] == "DICE Society"){
        $Society = $row;
    }
}
?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>DICE</title>

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

        <section id="dice-banner">

            <img src="assets/Banner.png" alt="DICE Banner">

        </section>

    </header>

    <!-- ABOUT US -->
    <section id="about_us" class="box">

        <div class="about-container">
            <div class="about_text">
                <h1 class="subhead1">About D.I.C.E.</h1>
                <p class="s1">
                    Dive Into Imagination for Creative Entertainment (D.I.C.E) is a MMU University club dedicated to 
                    bringing people together through creativity, strategy, and immersive entertainment. 
                    We create a welcoming space where imagination meets interaction from tabletop games 
                    and role-playing adventures to collaborative storytelling and themed events.
                </p>
            </div>

            <div class="about_image">
                <img src="assets/DICE_LOGO.png" alt="DICE logo" style="width: 350px; height: auto;">
            </div>
        </div>

    </section>

    <!-- FEATURED EVENTS-->
    <section id="featured_events">
        <a class="featured-container" href="featured-events.php" target="_blank">
            <div>
                <h1 class="subhead2">Featured Events</h1>
            </div>
        </a>
    </section>

    <!-- EVENTS BY DICE-->

    <section class="box">

        <div style="text-align: center;">
            <h1 class="subhead3">Events By D.I.C.E</h1>
        </div>

        <div class="events-container" id="eventsGrid">

            <!-- DICE BOARDGAME HANGOUT -->
            <div class="event-card">
                <img class="event-image" src="assets/boardgame-hangout.jpg" alt="DICE Boardgame Hangout Image">

                <div class="event-title">
                    <h3>DICE Boardgames Hangout</h3>
                </div>
                <div class="event-content">
                    <p class="event-description">
                        A casual board game hangout to play, relax, and have fun together.
                    </p>

                    <div class="event-actions">
                        <a class="event-action-button" href="DICE-Boardgame-Hangout.php" target="_blank">View Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

            <!-- DICE League -->
            <div class="event-card">
                <img class="event-image" src="assets/league.jpg" alt="DICE League Image">

                <div class="event-title">
                    <h3>DICE League</h3>
                </div>

                <div class="event-content">
                    <p class="event-description">
                        A D&D one-shot set in a shared universe that ties into a larger story.
                    </p>

                    <div class="event-actions">
                        <a class="event-action-button" href="DICE-League.php" target="_blank">View Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

            <!-- DICE Society -->
            <div class="event-card">
                <img class="event-image" src="assets/society.jpg" alt="DICE Society Image">

                <div class="event-title">
                    <h3>DICE Society</h3>
                </div>
                <div class="event-content">
                    <p class="event-description">
                        A Pathfinder one-shot set in a shared universe that connects to a larger story.
                    </p>

                    <div class="event-actions">
                        <a class="event-action-button" href="DICE-Society.php" target="_blank">View Details
                            <img class="dice-idle" src="assets/D20_idle.png" alt="DICE D20">
                            <img class="dice-hover" src="assets/D20_hover.png" alt="DICE D20">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- DICE CLUB REGISTRATION-->

    <section id="dice_registration" class="Registration">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdeOoJcF2CvIXBWTKIClFuyG_qX3yYqvHssyTe7R2MSk8jqPg/viewform"
            target="_blank">
            <img src="assets/DICE_club_registration.png" alt="Dice Club Registration">
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

<script src="auth-state.js">
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const eventCards = document.querySelectorAll('.event-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

            eventCards.forEach(card => {
                if (filterValue === 'all') {
                    card.style.display = 'block';
                } else {
                    card.style.display =
                        card.getAttribute('data-category') === filterValue
                        ? 'block'
                        : 'none';
                }
            });
        });
    });
});
</script>

</html>