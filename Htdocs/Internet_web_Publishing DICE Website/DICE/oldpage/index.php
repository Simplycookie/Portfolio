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
        <link rel="stylesheet" href="global.css">
        <link rel="stylesheet" href="home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Texturina:ital,opsz,wght@0,12..72,100..900;1,12..72,100..900&display=swap" rel="stylesheet">

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
                        <a href="service.php">Service</a>
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
        <section id="about_us" class = "box" > 

            <div class="about-container">
                <div class="about_text">
                    <h1 class="subhead1">About D.I.C.E.</h1>
                    <p class="s1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>

                <div class="about_image">
                    <img src="assets/DICE_LOGO.png" alt="DICE logo" style="width: 350px; height: auto;">
                </div>
            </div>

        </section>

<!-- FEATURED EVENTS-->
        <section id="featured-events">
            <a class = "featured-container" href="featured-events.html" target="_blank">
                    <div>
                        <h1 class="subhead2">Featured Events</h1>
                    </div>
            </a>
            <?php
                        echo "<div class='event-card'>\n";
                        $id = $FT_event['Event_ID'];
                        $eventforfeature = mysqli_query($connect,"Select * from dice_event where Event_ID = $id");
                        while($FTrow = mysqli_fetch_assoc($eventforfeature)){
                            $FTimage = $FTrow['Event_Image'];
                            $FTname = $FTrow['Event_Name'];
                            $FTdes = $FT_event['FT_Des'];
                            echo "\t\t\t\t<img src='images/$FTimage' class='event-image' alt='$FTname'/>\n";
                            echo "\t\t\t\t<div class='event-content'>\n";
                            echo "\t\t\t\t\t<h3 class='event-title'>$FTname</h3>\n";
                            echo "\t\t\t\t\t<p class='event-description'>$FTdes</p>\n";
                            echo "\t\t\t\t\t<div class='event-actions'>\n";
                            $FTlink = $FT_event['Event_Page'];
                            echo "\t\t\t\t\t\t<a class='event-action-button' href='$FTlink' target='_blank'>\n";
                            echo "\t\t\t\t\t\tView Details<img class='dice-idle' src='assets/D20_idle.png' alt='DICE D20'>\n";
                            echo "\t\t\t\t\t\t<img class='dice-hover' src='assets/D20_hover.png' alt='DICE D20'>\n</a>";
                            echo "\t\t\t\t\t</div>\n";
                            echo "\t\t\t\t</div>\n";
                            echo "\t\t\t</div>\n";
                        }
                        ?>
        </section>

<!-- EVENTS BY DICE-->

        <section class="box">

            <div style="text-align: center;">
                <h1 class="subhead3">Events By D.I.C.E</h1>
            </div>

            <div class="events-container" id="eventsGrid">
                
                <!-- DICE BOARDGAME HANGOUT -->
                <div class="event-card">
                    <img class="event-image" src="<?php echo $Boardgame['FT_Image']?>" alt="DICE Boardgame Hangout">

                    <div class="event-content">
                        <h3 class="event-title">DICE Boardgames Hangout</h3>
                        <p class="event-description"><?php echo $Boardgame['FT_Des']?></p>

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
                    <img class="event-image" src="<?php echo $League['FT_Image']?>" alt="DICE League">

                    <div class="event-content">
                        <h3 class="event-title">DICE League</h3>
                        <p class="event-description"><?php echo $League['FT_Des']?></p>

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
                    <img class="event-image" src="<?php echo $Society['FT_Image']?>" alt="DICE Society">

                    <div class="event-content">
                        <h3 class="event-title">DICE Society</h3>
                        <p class="event-description"><?php echo $Society['FT_Des']?></p>

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
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSdeOoJcF2CvIXBWTKIClFuyG_qX3yYqvHssyTe7R2MSk8jqPg/viewform" target="_blank">
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
</html>
