<?php include("Base.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICE - Featured Events</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="featured-events.css">
    
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
                        <a href="contact.php">Contact Us</a>
                        <p>|</p>
                        <a href="loginpage.php">Login</a>
                    </div>
                </div>
            </nav>
            
            <!-- CATEGORY TITLE -->
            <section style = "height: 350px;">

                <h1 class="categorytitle">DICE Featured Events</h1>

            </section>

        </header>

<section class="box">

    <main class="events-container">

        <div class="events-filter">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="repeat">Repeating</button>
            <button class="filter-btn" data-filter="onetime">One Time</button>
        </div>

        <div class="events-grid" id="eventsGrid">

            <!-- Event 1 -->
            <div class="event-card" data-category="repeat">
                <img src="assets/boardgame-hangout.jpg" alt="DICE Boardgame Hangout" class="event-image">
                
                <div class="event-content">
                    <h3 class="event-title">DICE Boardgames Hangout</h3>
                    <span class="event-category">Repeating Event</span>

                    <p class="event-description">
                        A casual board game hangout to play, relax, and have fun together.
                </div>

                <div class="event-actions">
                    <a href="DICE-Boardgame-Hangout.php" class="event-action-button">
                        View Details
                        <img class="icon-idle" src="assets/D20_idle.png" alt="Icon Idle">
                        <img class="icon-hover" src="assets/D20_hover.png" alt="Icon Hover">
                    </a>
                </div>
            </div>


            <!-- Event 2 -->
            <div class="event-card" data-category="repeat">
                <img src="assets/league.jpg" alt="DICE League" class="event-image">
                
                <div class="event-content">
                    <h3 class="event-title">DICE League</h3>
                    <span class="event-category">Repeating</span>

                    <p class="event-description">
                        A D&D one-shot set in a shared universe that ties into a larger story.
                    </p>
                </div>

                <div class="event-actions">
                    <a href="DICE-League.php" class="event-action-button">
                        View Details
                        <img class="icon-idle" src="assets/D20_idle.png" alt="Icon Idle">
                        <img class="icon-hover" src="assets/D20_hover.png" alt="Icon Hover">
                    </a>
                </div>
            </div>

            <!-- Event 3 -->
            <div class="event-card" data-category="repeat">
                <img src="assets/society.jpg" alt="DICE Society" class="event-image">
                
                <div class="event-content">
                    <h3 class="event-title">DICE Society</h3>
                    <span class="event-category">Repeating</span>

                    <p class="event-description">
                        A Pathfinder one-shot set in a shared universe that connects to a larger story.
                    </p>
                </div>

                <div class="event-actions">
                    <a href="DICE-Society.php" class="event-action-button">
                        View Details
                        <img class="icon-idle" src="assets/D20_idle.png" alt="Icon Idle">
                        <img class="icon-hover" src="assets/D20_hover.png" alt="Icon Hover">
                    </a>
                </div>
            </div>

            <!-- Event 4 -->
            <div class="event-card" data-category="onetime">
                <img src="assets/urmu-boardgames.jpg" alt="DICE and UR-MU Boardgames Day" class="event-image">
                
                <div class="event-content">
                    <h3 class="event-title">DICE & Ur-Mu Boardgames Day</h3>
                    <span class="event-category">One time</span>


                    <p class="event-description">
                        A collaboration between DICE MMU and +N by UR-MU where museum visitors get to 
                        experience culturally significant board games that represent the themes of the museum.
                    </p>
                </div>

                <div class="event-actions">
                    <a href="DICE-Event-Booking.php" class="event-action-button">
                        Book now
                        <img class="icon-idle" src="assets/D20_idle.png" alt="Icon Idle">
                        <img class="icon-hover" src="assets/D20_hover.png" alt="Icon Hover">
                    </a>
                </div>
            </div>
        </div>

    </main>

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

<script src="auth-state.js"></script>

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

</body>
</html>
