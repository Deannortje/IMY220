-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 09:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbu17326622`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbaimages`
--

CREATE TABLE `tbaimages` (
  `album_id` int(11) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `imagecollect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbaimages`
--

INSERT INTO `tbaimages` (`album_id`, `filename`, `imagecollect_id`) VALUES
(1, 'car.jpg', 1),
(1, 'maxresdefault.jpg', 2),
(1, 'mtb.jpg', 3),
(1, 'LetsGO.jpg', 4),
(1, 'mtb.jpg', 5),
(2, 'car.jpg', 6),
(2, 'skydiving.jpg', 7),
(2, 'kitesurfing.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbalbumcomments`
--

CREATE TABLE `tbalbumcomments` (
  `CommentText` varchar(256) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `timestampComment` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbalbums`
--

CREATE TABLE `tbalbums` (
  `caption` varchar(256) NOT NULL,
  `cHeading` varchar(256) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `hashtags` varchar(256) NOT NULL,
  `album_id` int(11) NOT NULL,
  `timestampDT` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbalbums`
--

INSERT INTO `tbalbums` (`caption`, `cHeading`, `filename`, `hashtags`, `album_id`, `timestampDT`, `user_id`) VALUES
('Living Life On The Edge Part 3', 'BaseJump', 'basejump.jpg', '#epic #sick #cool #fun #rush', 1, '2020-10-05 21:41:54', 6),
('Fun day', 'LETS GO', 'Skateboarding.jpg', '#epic #sick #cool #fun #rush', 2, '2020-10-05 22:36:24', 6),
('Fun day', 'AWESOME', 'boba-fett-helmet-star-wars-artwork-wallpaper-preview.jpg', '#epic #sick #cool #fun #rush', 3, '2020-11-02 18:44:07', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbcomments`
--

CREATE TABLE `tbcomments` (
  `comment_id` int(11) NOT NULL,
  `CommentText` text NOT NULL,
  `image_id` int(11) NOT NULL,
  `timestampComment` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbcomments`
--

INSERT INTO `tbcomments` (`comment_id`, `CommentText`, `image_id`, `timestampComment`, `user_id`) VALUES
(1, '1st Comment', 27, '2020-10-04 20:10:15', 3),
(2, 'marker@IMY220.co.za: Hello2', 27, '2020-10-04 21:23:05', 5),
(3, 'marker@IMY220.co.za: I love you!!!!!!!', 22, '2020-10-04 21:24:28', 5),
(4, 'marker@IMY220.co.za: lets go comments', 27, '2020-10-04 21:44:22', 5),
(5, 'marker@IMY220.co.za: Nice Air', 23, '2020-10-04 21:45:50', 5),
(6, 'marker@IMY220.co.za: Dust is a must', 25, '2020-10-04 21:46:52', 5),
(7, 'marker@IMY220.co.za: Hot Wheels', 26, '2020-10-04 22:04:11', 5),
(8, 'marker@IMY220.co.za: Hot Wheels', 26, '2020-10-04 22:04:37', 5),
(9, 'marker@IMY220.co.za: Snow Snow Snow XD', 30, '2020-10-04 22:07:23', 5),
(10, 'marker@IMY220.co.za: High In The Sky', 28, '2020-10-04 22:09:23', 5),
(11, 'marker@IMY220.co.za: Another Comment Goes Here and this one i want to go over 2 Lines', 27, '2020-10-05 10:09:41', 5),
(12, 'marker@IMY220.co.za: Another One', 27, '2020-10-05 10:10:21', 5),
(13, 'marker@IMY220.co.za: Another ONE', 27, '2020-10-05 10:10:36', 5),
(14, 'marker@IMY220.co.za: Another One times 2', 27, '2020-10-05 10:10:59', 5),
(15, 'michael.nortje@me.com: 1st', 37, '2020-10-05 23:53:12', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbfollowers`
--

CREATE TABLE `tbfollowers` (
  `ff_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `followed_username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbgallery`
--

CREATE TABLE `tbgallery` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `cHeading` varchar(256) NOT NULL,
  `caption` varchar(256) NOT NULL,
  `hashtags` varchar(256) NOT NULL,
  `timestampDT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbgallery`
--

INSERT INTO `tbgallery` (`image_id`, `user_id`, `filename`, `cHeading`, `caption`, `hashtags`, `timestampDT`) VALUES
(17, 3, 'LetsGO.jpg', '1ST TIME', 'I CAN DO IT', '#COOL #WILD #SICK #IDK', '2020-09-09 16:01:51'),
(19, 3, 'basejump.jpg', 'YAYNESS', 'FUN', '#COOL #WILD #SICK #IDK #BASEJUMPING', '2020-09-09 16:01:51'),
(20, 3, 'car.jpg', 'car', 'car', '#COOL #WILD #SICK #IDK', '2020-09-09 16:01:51'),
(21, 3, 'mtb.jpg', 'AWESOME', 'Fun day', '#epic', '2020-09-09 21:01:16'),
(22, 5, 'mtb.jpg', 'AWESOME', 'Fun day', '#epic', '2020-09-09 21:58:05'),
(23, 5, 'surf.jpg', 'LETS GO', 'Living Life On The Edge', '#epic #sick #cool #fun #rush', '2020-09-09 21:59:44'),
(25, 5, 'LetsGO.jpg', 'WOW', 'Absolutely killing it', '#epic #sick #cool #fun #rush', '2020-09-09 22:11:47'),
(26, 5, 'car.jpg', 'Epic', 'Living Life On The Edge Part 2', '#epic #sick #cool #fun #rush', '2020-09-09 22:29:08'),
(27, 5, 'Skateboarding.jpg', 'Skate IT', 'Skate Pics @me', '#epic #sick #cool #fun #rush', '2020-09-09 22:38:12'),
(28, 5, 'basejump.jpg', 'BaseJump', 'Living Life On The Edge Part 3', '#epic #sick #cool #fun #rush', '2020-09-09 22:39:03'),
(29, 5, 'kitesurfing.jpg', 'Kite Surfer', 'Absolutely killing it', '#epic #sick #cool #fun #rush', '2020-09-09 22:39:34'),
(30, 5, 'snowboarding.jpg', 'Snow', 'Awesome pictures', '#epic #sick #cool #fun #rush', '2020-09-09 22:41:19'),
(31, 3, 'Sgt.Josh.jpg', 'AWESOME', 'Fun day', '#epic #sick #cool #fun #rush', '2020-09-10 13:58:40'),
(32, 3, 'Sgt.Josh.jpg', 'AWESOME', 'Fun day', '#epic #sick #cool #fun #rush', '2020-09-10 14:03:19'),
(33, 6, 'maxresdefault.jpg', 'AWESOME', 'Absolutely killing it', '#epic #sick #cool #fun #rush', '2020-10-05 19:42:44'),
(35, 6, 'snowboarding.jpg', 'AWESOME', 'Absolutely killing it', '#epic #sick #cool #fun #rush', '2020-10-05 21:25:06'),
(36, 6, 'surf.jpg', 'LETS GO', 'Living Life On The Edge', '#epic #sick #cool #fun #rush', '2020-10-05 21:25:33'),
(37, 6, 'Skateboarding.jpg', 'Skate IT', 'Absolutely killing it', '#epic #sick #cool #fun #rush', '2020-10-05 21:26:10'),
(38, 6, 'skydiving.jpg', 'AWESOME', 'Absolutely killing it', '#epic #sick #cool #fun #rush', '2020-10-05 21:35:33'),
(39, 6, 'mtb.jpg', 'AWESOME', 'Fun day', '#epic #sick #cool #fun #rush', '2020-10-05 21:38:04'),
(40, 7, 'sean-grady-the-mandalorian.jpg', 'AWESOME', 'Fun day', '#epic #sick #cool #fun #rush', '2020-11-02 18:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(128) NOT NULL,
  `profileImage` text NOT NULL DEFAULT 'defaultPP.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`user_id`, `username`, `name`, `surname`, `email`, `birthdate`, `password`, `profileImage`) VALUES
(1, 'FirstMarker@IMY220.co.za', 'Marker1', 'IMY', 'FirstMarker@IMY220.co.za', '2019-06-12', '4321', 'defaultPP.png'),
(2, 'Bond.James@gmail.com', 'James', 'Bond', 'Bond.James@gmail.com', '2020-09-02', '1234', 'defaultPP.png'),
(3, 'dean.nortje@me.com', 'Dean', 'Nortje', 'dean.nortje@me.com', '2020-08-30', '1234', 'defaultPP.png'),
(4, 'Chantelle@gmail.com', 'Chantelle', 'Streutker', 'Chantelle@gmail.com', '2020-09-12', '1234', 'defaultPP.png'),
(5, 'newUser@gmail.com', 'Us3r', 'Watts', 'user@IMY220.com', '2020-01-20', '1234', 'defaultPP.png'),
(6, 'michael.nortje@me.com', 'Mike', 'Nortje', 'michael.nortje@me.com', '1993-09-28', '654', 'defaultPP.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbaimages`
--
ALTER TABLE `tbaimages`
  ADD PRIMARY KEY (`imagecollect_id`);

--
-- Indexes for table `tbalbumcomments`
--
ALTER TABLE `tbalbumcomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbalbums`
--
ALTER TABLE `tbalbums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `tbcomments`
--
ALTER TABLE `tbcomments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbfollowers`
--
ALTER TABLE `tbfollowers`
  ADD PRIMARY KEY (`ff_id`);

--
-- Indexes for table `tbgallery`
--
ALTER TABLE `tbgallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbaimages`
--
ALTER TABLE `tbaimages`
  MODIFY `imagecollect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbalbumcomments`
--
ALTER TABLE `tbalbumcomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbalbums`
--
ALTER TABLE `tbalbums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbcomments`
--
ALTER TABLE `tbcomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbfollowers`
--
ALTER TABLE `tbfollowers`
  MODIFY `ff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbgallery`
--
ALTER TABLE `tbgallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
