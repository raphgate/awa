-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2019 at 03:57 PM
-- Server version: 10.1.38-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chuqxnoo_awanetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `secret_question` varchar(250) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `secret_question`, `answer`) VALUES
(1, 'Gabriel', 'Eze', 'gabbi@gmail.com', '0846746787', 'b6c4e28b8995de94ebecab66624ed7c5a271b82c', 'how old are you?', '98');

-- --------------------------------------------------------

--
-- Table structure for table `challange`
--

CREATE TABLE `challange` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `challange_img` varchar(50) NOT NULL,
  `key_terms` varchar(255) NOT NULL,
  `date_of_event` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `writer` varchar(200) NOT NULL,
  `creator` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `project_id` int(11) NOT NULL,
  `date_made` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `writer`, `creator`, `comment`, `project_id`, `date_made`) VALUES
(1, 'Elochukwu Azubuike', 0, 'Insurmountable', 6, '1555496106'),
(2, 'Elochukwu Azubuike', 0, 'This work is good but, there is a problem with it.', 6, '1555496752'),
(3, 'Elochukwu Azubuike', 0, 'Yo! this work is cool but, some shit just ain\'t right', 0, '1555509086'),
(4, 'Elochukwu Azubuike', 0, 'asas', 0, '1555509098'),
(5, 'Elochukwu Azubuike', 0, 'its cool but...', 4, '1555509215'),
(6, 'Elochukwu Azubuike', 0, 'Yo!', 4, '1555510796'),
(7, 'Elochukwu Azubuike', 0, 'This is not even a comment, I am just testing to see if anything will happen. When am ready to comment, ya\'ll will know.', 5, '1555511302'),
(8, 'Elochukwu Azubuike', 0, 'Whats up nigga?', 5, '1555511866'),
(9, 'Elochukwu Azubuike', 0, 'Looks like this shit is working', 5, '1555511915'),
(10, 'Elochukwu Azubuike', 0, 'qwertyuio', 5, '1555511965'),
(11, 'Gabriel Eze', 0, 'This is really nice.', 11, '1557948782');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `followID` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `date_followed` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `viewer` int(11) NOT NULL,
  `date_liked` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetup`
--

CREATE TABLE `meetup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `event_photo` varchar(50) NOT NULL,
  `convener` varchar(50) NOT NULL,
  `convener_photo` varchar(50) NOT NULL,
  `date_of_event` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetup_speakers`
--

CREATE TABLE `meetup_speakers` (
  `id` int(11) NOT NULL,
  `meetup_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `portfolio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` longtext NOT NULL,
  `projectType` varchar(25) NOT NULL,
  `works` varchar(5000) NOT NULL,
  `softwares` varchar(5000) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `tags` varchar(500) NOT NULL,
  `coverArt` varchar(500) NOT NULL,
  `albumID` varchar(25) NOT NULL,
  `views` int(11) NOT NULL,
  `date_added` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `email`, `user_id`, `project_name`, `project_description`, `projectType`, `works`, `softwares`, `status`, `tags`, `coverArt`, `albumID`, `views`, `date_added`) VALUES
(4, '', 7, 'Tadashimelo Arts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Album', '[\"0.184872001552998039.jpg\",\"0.187341001552998039.jpg\",\"0.197475001552998039.jpg\",\"0.200293001552998039.jpg\"]', 'Photoshop, Illustrator and After effects', 'approved', '', '15529980394.png', 'ABM-1552998039', 66, '19-03-2019'),
(5, '', 7, 'Ingolsdat Arts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Album', '[\"0.833547001552998160.jpg\",\"0.834693001552998160.jpg\",\"0.835819001552998160.jpg\"]', 'Photoshop, Illustrator and After effects', 'approved', '', '1552998160welcomes.png', 'ABM-1552998160', 14, '19-03-2019'),
(6, '', 7, 'El mejor de Art', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Single', '', 'Adobe illustrator, photoshop and lightroom', 'rejected', '', '1552998393slid.png', 'SGL-47564565456', 24, '19-03-2019'),
(9, '', 7, 'Business cards', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Album', '[\"0.540535001553016769.jpg\",\"0.541822001553016769.jpg\",\"0.542962001553016769.jpg\"]', 'Photoshop, illustrator and after effects', 'approved', '', '15530167691513702058biz-card.jpg', 'ABM-1553016769', 8, '19-03-2019'),
(10, '', 7, 'Las mujeres', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Single', '', 'Coreldraw and Adobe Photoshop', 'approved', '', '1553098678image.jpg', 'SGL-1553098678', 11, '20-03-2019'),
(11, '', 8, 'Varosha', '', 'Single', '', 'Sketch up, Vray', 'approved', '', '155774509533.jpg', 'SGL-1557745095', 4, '13-05-2019'),
(12, '', 10, 'Ice crown', 'A crown melts and drips down.', 'Single', '', 'FlipaClip', 'approved', '', '1557746274E42115C6-48AE-424A-ADD7-6F07ED6741E3.MOV', 'SGL-1557746274', 4, '13-05-2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_OB` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `reg_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `city`, `state`, `country`, `password`, `date_OB`, `description`, `skills`, `reg_date`) VALUES
(1, 'Raphael', 'Faluyi', 'raphael.falo@gmail.com', 'HOUSTON', 'TX', 'United States', '$2y$10$M1n55cbaxajM4/Nan4v3GOenlezrJGMqigUXrXVsUGPtBo8a2YQQS', NULL, NULL, NULL, '25-02-2019 (18:23:pm)'),
(2, 'Raphael', 'Faluyi', 'raphael@raphgate.com', 'HOUSTON', 'TX', 'United States', '$2y$10$b0KWde4I/ZxDp5hN2.7qteJOj0rNhuN1B9zRbuHIOr.dXKddJaOUm', NULL, NULL, NULL, '08-02-2019 (22:56:pm)'),
(3, 'Raphael', 'Faluyi', 'rfaluyi@gmail.com', 'HOUSTON', 'TX', 'United States', '$2y$10$8PoV90xLMW7sjrwvWFRNgu4TPvEEPjk0ZyZFtI52lz4OeR1Dsk2b2', NULL, NULL, NULL, '26-02-2019 (17:13:pm)'),
(7, 'Elochukwu', 'Azubuike', 'tadashimelo@gmail.com', 'Ogidi', 'Anambra', 'Nigeria', 'd19b994790dbc22ed5bed3c81c8d094d7eeb53f2', NULL, NULL, NULL, '16-03-2019'),
(8, 'Anselem', 'Nkoro', 'anselemnkoro@gmail.com', 'Famagusta', 'Famagusta', 'Cyprus', '39ccdf0fcb2c4eabffd978b1ad13a0c79d27511a', NULL, NULL, NULL, '13-05-2019'),
(9, 'Abraham Akanlingba', 'Adamu', 'akanlingba@gmail.com', 'Accra', 'Greater Accra', 'Ghana', 'aa11ad7754e97aeef39003e93f96f171ab97573d', NULL, NULL, NULL, '13-05-2019'),
(10, 'Oreoluwa', 'Sanni', 'oresanni@gmail.com', 'Lagos', 'Lagos', 'Nigeria', '05a713e81953b5c971acc19a1b06bf2dcbcb5ebd', NULL, NULL, NULL, '13-05-2019'),
(11, 'Godwin', 'Yoh', 'godwinyoh@yahoo.com', 'Akoka', 'Yaba', 'Nigeria', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, '13-05-2019'),
(12, 'Yunus', 'Taofeek', 'tyunus2009@gmail.com', 'iikorodu', 'lagos', 'nigeria', '43d6fccb7a24a840b404068a69845afa58af93d2', NULL, NULL, NULL, '13-05-2019'),
(13, 'Raphael', 'F', 'raphael.falo1@gmail.com', 'Houston', 'Tx', 'USA', '13eea0af8fdcad800537c15cd4456f225e7209ad', NULL, NULL, NULL, '13-05-2019'),
(14, 'Junior', 'Rockstone', 'nofearsrockstone@gmail.com', 'Accra', 'Accra', 'Ghana', '6dc4b7be786bedda81e4216c0daaf9813e4072c3', NULL, NULL, NULL, '13-05-2019'),
(15, 'Akinkunmi', 'Adegun', 'akinkunmiadegun@gmail.com', 'Isolo', 'Lagos', 'Nigeria', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, NULL, NULL, '13-05-2019'),
(16, 'Kelvin', 'Atemie-hart', 'atemiehartkelvin@rocketmail.com', 'Lagos', 'Lagos', 'Nigeria', '6ff6342fa10497e8816f328c1e9fc1428cebb88b', NULL, NULL, NULL, '14-05-2019'),
(17, 'Jacob', 'Gad', 'jacobgad522@gmail.com', 'Abuja', 'FCT', 'Nigeria', '3a1621da362fe83c22f269faac669bc9b927a5cf', NULL, NULL, NULL, '14-05-2019'),
(18, 'Adeniyi', 'Lawal', 'muslawmy@gmail.cim', 'Ota', 'Ogun', 'Nigeria', 'f872caad177d67bbe18c119d0505f2d3caa02af3', NULL, NULL, NULL, '14-05-2019'),
(19, 'maxwell', 'udoji', 'mana2000ng@yahoo.com', 'Trans-ekulu', 'Enugu', 'Nigeria', '5eba941a14d261057be8db738bdd747e9c1d0d16', NULL, NULL, NULL, '14-05-2019'),
(20, 'Gabriel', 'Eze', 'gbrjnr@outlook.com', 'Port Harcourt', 'Rivers', 'Nigeria', '6b78b8fc40d02f7a589e0da05822b05d3f2ac84b', NULL, NULL, NULL, '15-05-2019'),
(21, 'max', 'max', 'drmayor2004@yahoo.com', 'lagos', 'lagfos', 'nigeria', '3a9f59cedf2ff4821a22ef7014b0a4d7bdd57bff', NULL, NULL, NULL, '17-05-2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challange`
--
ALTER TABLE `challange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`followID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`);

--
-- Indexes for table `meetup`
--
ALTER TABLE `meetup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetup_speakers`
--
ALTER TABLE `meetup_speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `followID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
