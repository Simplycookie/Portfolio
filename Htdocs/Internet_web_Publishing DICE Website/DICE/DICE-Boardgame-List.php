<?php include("Base.php");
    // 1) Get Event code from URL (edit1.php?bcode=P001)
    $code = $_GET["BG_ID"] ?? "1";

    // If no code provided, stop with message
    if ($code == "") {
        die("Missing boardgame code. Example: edit1.php?BG_ID=1");
    }

    // 2) Fetch Event record
    $sql = "SELECT * FROM boardgames WHERE BG_ID = $code";
    $BG = mysqli_query($connect, $sql);

    if (!$BG) {
        die("SQL error: " . mysqli_error($connect));
    }

    $Boardgame  = mysqli_fetch_assoc($BG);

    if (!$Boardgame) {
        die("No boardgame found for ID: " . htmlspecialchars($code));
    }
    $ID = $Boardgame['BG_ID'];
    $Name = $Boardgame['BG_Name'];
    $Image = $Boardgame['BG_Image'];
    $Des = $Boardgame['BG_Des'];
    $Des2 = $Boardgame['BG_Des2'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- make the title look like "DICE - *Insert boardgame name here*" -->
    <title id="boardTitleDesc">DICE - <?php echo $Name?></title>
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
                    <a href="contact.php">Contact Us</a>
                    <p>|</p>
                    <div id="authStateButton"></div>
                </div>
            </div>
        </nav>

        </header>

        <body>
            <!-- BOARDGAME DESCRIPTION -->
             <div style="margin-top:30px; margin-left:100px;">
                <a class="returning" href="DICE-Boardgame-Hangout.php"><- Return</a>
             </div>
             <div class="events-detail-container" style="margin-bottom:40px">

                    <div class="detail-image">
                        <!-- Add game image here -->
                        <img id="boardImage" src="assets/<?php echo $Image?>" alt="Boardgame Image">
                    </div>

                    <div class="detail-right">
                        <!-- Boardgame name here -->
                        <h1 class="subhead1" style="margin-bottom: 10px;" id="boardName"><?php echo $Name?></h1>

                        <h1 style="margin-bottom: 10px; font-size: 30px;">Game Description</h1>
                        <!-- Boardgame description here -->
                        <p id="boardDesc" style="margin-bottom: 30px;" ><?php echo $Des?></p>

                        <h1 style="margin-bottom: 10px; font-size: 30px;">Game Details</h1>
                        <!-- Boardgame details here -->
                        <p id="boardDetails" style="margin-bottom: 30px;"><?php echo $Des2?></p>
                    </div>
                </div>
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
