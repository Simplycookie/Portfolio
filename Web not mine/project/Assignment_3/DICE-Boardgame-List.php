<?php include("Base.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="">DICE - Boardgame Description</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="boardgames.css">
    
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
                    </div>
                </div>
            </nav>

        </header>

        <body>
            <!-- BOARDGAME DESCRIPTION -->
             <div style="margin-top:30px; margin-left:100px;">
                <a class="returning" href="DICE-Boardgame-Hangout.php"><-Return</a>
             </div>
             <div class="events-detail-container">

                    <div class="detail-image">
                        <img id="boardimage" src="assets/image.jpg" alt="Boardgame Image">
                    </div>

                    <div class="detail-right">
                        <h1 class="subhead1" id="boardgamename">Boardgame Name</h1>
                        <p style="font-size: 24px; margin-bottom:5px; margin-top: 0;">Player Range</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias quisquam beatae excepturi incidunt quod at corrupti perspiciatis tempore accusantium harum, maiores error officia, ullam vero provident dolor voluptas! Placeat, dicta?</p>
                        <p style="font-size: 24px; margin-bottom:5px;">Time Average</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias quisquam beatae excepturi incidunt quod at corrupti perspiciatis tempore accusantium harum, maiores error officia, ullam vero provident dolor voluptas! Placeat, dicta?</p>
                    </div>
                </div>

            <section class = "box">
            <div class="boarddetail" style="margin-top:40px;">
                        <h1>Game Description</h1>
                        <p id="boardgamedesc" >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis eaque voluptatem commodi fugit harum esse dolore dicta similique optio, amet explicabo. Explicabo amet quis nemo accusantium, aspernatur esse. Vel, eum!</p>
                    </div>

                
            </section>
        </body>
<!-- footer -->
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
                                <li><a href="service.php">Services</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
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
