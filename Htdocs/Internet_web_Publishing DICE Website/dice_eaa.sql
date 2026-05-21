-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dice_eaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `admin_password`) VALUES
(1, 'admin@dice.com', '123456'),
(4, 'Admin2@gmail.com', '321321');

-- --------------------------------------------------------

--
-- Table structure for table `boardgames`
--

CREATE TABLE `boardgames` (
  `BG_ID` int(11) NOT NULL,
  `BG_Name` varchar(50) NOT NULL,
  `BG_Image` varchar(150) NOT NULL,
  `BG_Des` longtext DEFAULT NULL,
  `BG_Des2` longtext DEFAULT NULL,
  `Isdeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boardgames`
--

INSERT INTO `boardgames` (`BG_ID`, `BG_Name`, `BG_Image`, `BG_Des`, `BG_Des2`, `Isdeleted`) VALUES
(1, 'Nasi Lemak', 'nasi-lemak-board.png', 'Set in a far-away village where Nasi Lemak, a traditional Malaysian delicacy, is highly sought after, players assume the roles of Nasi Lemak stall owners and compete to make the most packs of Nasi Lemak. Through collecting ingredients, trading, and utilizing action cards strategically, players aim to reach five Nasi Lemak packs or have the most packs by the end of the game. With its unique theme and engaging gameplay, Nasi Lemak offers an enjoyable and competitive experience for players as they strive to satisfy their customers\' cravings.', 'Publisher : The Nurts | Players : 2-5 | Time : 15 -30 mins', 0),
(2, 'Duo Quest', 'due-quest-board.png', 'Test your relationships with Duo Quest – a 2-4 player board game where you fight monsters by answering quirky and personal questions about each other. With 5 Monsters to play against (all with their own unique question themes) – Duo Quest is the perfect game to play to break the ice with someone, or to test how strong your bond is with your close ones!', 'Publisher : 1+1 Studios | Players : 2-4 | Time :  20-40 mins', 0),
(3, 'ROOT', 'root-board.jpg', 'Root is a game of adventure and war where 2 to 4 players battle for control of a vast wilderness.\r\n\r\nThe nefarious Marquise de Cat has seized the great woodland, intent on harvesting its riches. Under her rule, the many creatures of the forest have banded together. This Alliance will seek to strengthen its resources and subvert the rule of Cats. In this effort, the Alliance may enlist the help of the wandering Vagabonds who are able to move through the more dangerous woodland paths. Though some may sympathize with the Alliance’s hopes and dreams, these wanderers are old enough to remember the great birds of prey who once controlled the woods.\r\n\r\nMeanwhile, at the edge of the region, the proud, squabbling Eyrie have found a new commander who they hope will lead their faction to resume their ancient birthright.\r\n\r\nThe stage is set for a contest that will decide the fate of the great woodland. It is up to the players to decide which group will ultimately take root.', 'Publisher :  Leder Games | Players : 2-4 | Time : 60-90 mins', 0),
(4, 'Muffin time', 'placeholder.png', 'Miffin', '2-8 players', 1),
(5, 'Muffin time', 'placeholder.png', 'Muffin time', '2-8 players', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BK_ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL,
  `BK_Quantity` int(11) NOT NULL DEFAULT 1,
  `BK_Date` date NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `User_ID` int(11) NOT NULL DEFAULT 0,
  `BK_ranID` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ECat_ID` int(11) NOT NULL,
  `ECat_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ECat_ID`, `ECat_Name`) VALUES
(2, 'DICE_League'),
(3, 'DICE_Society'),
(4, 'Boardgames'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `dice_event`
--

CREATE TABLE `dice_event` (
  `Event_ID` int(11) NOT NULL,
  `Event_Name` varchar(100) NOT NULL,
  `Event_Des` longtext DEFAULT NULL,
  `Event_Actdes` longtext DEFAULT NULL,
  `Event_Image` varchar(150) NOT NULL DEFAULT 'placeholder.png',
  `Event_Time` text NOT NULL,
  `Event_Date` text NOT NULL,
  `isPassed` tinyint(1) NOT NULL DEFAULT 0,
  `Event_Category` int(11) DEFAULT 5,
  `Event_Price` double NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dice_event`
--

INSERT INTO `dice_event` (`Event_ID`, `Event_Name`, `Event_Des`, `Event_Actdes`, `Event_Image`, `Event_Time`, `Event_Date`, `isPassed`, `Event_Category`, `Event_Price`) VALUES
(1, 'DICE League T2', 'Placeholder', 'Placeholder', 'g-fren meme.png', '1pm - 6pm', '21st Feb onward', 0, 2, 5),
(2, 'DICE League T3', NULL, NULL, 'placeholder.png', '1pm - 6pm', '21st Feb onward', 0, 2, 5),
(3, 'DICE Society (Dawn of the wolves)', 'Pathfinder dnd experince', 'Dawn of the wolves, fight your way through the hoard of wolves', 'placeholder.png', '1pm - 6pm', '14th of March', 1, 3, 5),
(14, 'Boardgame Hangout', 'Boardgames hangout', 'Boardgames hangout', 'placeholder.png', '12pm-6pm', '14th February ', 1, 4, 20),
(15, 'DICE League T2 (1)', 'nah', 'cool quest', 'placeholder.png', '1pm - 6pm', '21st Feb', 1, 2, 5),
(16, 'Boardgame Hangout (30th feb)', 'Boardgames hangout', 'Tabletop games and card games', 'placeholder.png', '12pm - 6pm', '30th February ', 0, 4, 20),
(17, '(Trees of the Night) T2', 'Enjoy a thrilling dnd experince', 'Trees of the Night', 'placeholder.png', '1pm - 6pm', '14th of March', 1, 2, 5),
(18, '(Trees of dawn) T2 Dice League', 'DICE League', 'DICE League', 'placeholder.png', '1pm - 6pm', '14th of march', 1, 2, 5),
(19, 'IT society collab', 'IT society ', 'IT society ', 'placeholder.png', '3pm to 6pm', '15th of March', 1, 5, 5),
(20, 'IT society collab', 'IT society collab', 'IT society collab', 'Poster_glimpses_of_stories.png', '3pm to 6pm', '16th of March', 0, 5, 5),
(21, 'DND workshop', 'DND workshop', 'DND workshop', 'Infographic banner.png', '5pm to 8pm', '21th of March', 0, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `featured_events`
--

CREATE TABLE `featured_events` (
  `FT_ID` int(11) NOT NULL,
  `FT_Name` varchar(100) DEFAULT NULL,
  `Event_ID` int(11) NOT NULL,
  `Event_Page` mediumtext DEFAULT NULL,
  `FT_Image` varchar(150) NOT NULL DEFAULT 'assets/image.jpg',
  `FT_Des` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_events`
--

INSERT INTO `featured_events` (`FT_ID`, `FT_Name`, `Event_ID`, `Event_Page`, `FT_Image`, `FT_Des`) VALUES
(1, 'Featured Event', 14, 'DICE-Boardgame-Hangout.phpl', 'assets/image.jpg', 'Leasure and hangout with our various boardgames'),
(2, 'Boardgame hangout', 14, 'DICE-Boardgame-Hangout.html', 'assets/image.jpg', 'Leasure and hangout with our various boardgames'),
(3, 'DICE League', 1, 'DICE-League.html', 'assets/image.jpg', 'Explore the world of dnd through the fast paced Dice League seasion, uses the DND system, perfect for beginners'),
(4, 'DICE Society', 3, 'DICE-Society.html', 'assets/image.jpg', 'Experince the world of DICE Society through the pathfinder V2 system');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_ID` int(11) NOT NULL,
  `sale_Cost` float NOT NULL,
  `sale_Image` varchar(150) NOT NULL DEFAULT 'placeholder.png',
  `BK_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `position`) VALUES
(4, 'mutaz', 'motaz@gmail.com', 'senior');

-- --------------------------------------------------------

--
-- Table structure for table `website_user`
--

CREATE TABLE `website_user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` text NOT NULL,
  `User_Email` text NOT NULL,
  `User_PhNum` text NOT NULL,
  `User_Password` text NOT NULL,
  `Reg_Date` text DEFAULT NULL,
  `AgeConsent` text DEFAULT NULL,
  `Gaurd_Perm` text DEFAULT NULL,
  `Discord_Joined` text DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boardgames`
--
ALTER TABLE `boardgames`
  ADD PRIMARY KEY (`BG_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BK_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ECat_ID`) USING BTREE;

--
-- Indexes for table `dice_event`
--
ALTER TABLE `dice_event`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `FK_dice_event_categories` (`Event_Category`) USING BTREE;

--
-- Indexes for table `featured_events`
--
ALTER TABLE `featured_events`
  ADD PRIMARY KEY (`FT_ID`),
  ADD KEY `Event_ID` (`Event_ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_ID`),
  ADD KEY `FK_sales_booking` (`BK_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_user`
--
ALTER TABLE `website_user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boardgames`
--
ALTER TABLE `boardgames`
  MODIFY `BG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ECat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dice_event`
--
ALTER TABLE `dice_event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `featured_events`
--
ALTER TABLE `featured_events`
  MODIFY `FT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `website_user`
--
ALTER TABLE `website_user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK__event` FOREIGN KEY (`Event_ID`) REFERENCES `dice_event` (`Event_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_booking_website_user` FOREIGN KEY (`User_ID`) REFERENCES `website_user` (`User_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dice_event`
--
ALTER TABLE `dice_event`
  ADD CONSTRAINT `FK_dice_event_categories` FOREIGN KEY (`Event_Category`) REFERENCES `categories` (`ECat_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `featured_events`
--
ALTER TABLE `featured_events`
  ADD CONSTRAINT `Event_ID` FOREIGN KEY (`Event_ID`) REFERENCES `dice_event` (`Event_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `FK_sales_booking` FOREIGN KEY (`BK_ID`) REFERENCES `booking` (`BK_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
