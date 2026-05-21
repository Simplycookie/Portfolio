<?php include("Base.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICE Club - Dashboard</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Texturina:wght@700&family=Josefin+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
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

    <main class="dashboard-container">
        <h1>My Dashboard</h1>
        <div id="profileCard"></div>
        <h2>My Bookings</h2>
        <div id="bookingsList"></div>
        <p>
        <?php if(isset($_GET['id'])){
            $id = $_GET['id'];
            $bookingtb = mysqli_query($connect,"SELECT * FROM booking WHERE User_ID = $id AND isDeleted=0");
            while($booking = mysqli_fetch_assoc($bookingtb)){
                $booking_ID = $booking['Event_ID'];
                $eventtb = mysqli_query($connect,"SELECT * FROM dice_event WHERE Event_ID = $booking_ID");
                $event = mysqli_fetch_assoc($eventtb);
                $Name =  $event['Event_Name'];
                $date = $event['Event_Date'];
                $Time = $event['Event_Time'];
                $BK_ID = $booking['BK_ID'];
                $BK_QTY = $booking['BK_Quantity'];
                echo "Event: $Name $date $Time<br>\n";
                echo "ID: $BK_ID QTY: $BK_QTY <br>\n";
            }


        } ?>
        </p>
    </main> 

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
                                <li><a href="review.html">Leave a Review</a><li>
                            </ul>
                        </td>
                    </tr>

                </table>

            </div>
        </div>
    </footer>
</body>
<script>
</script>

</html>