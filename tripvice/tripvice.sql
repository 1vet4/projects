-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 02:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripvice`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `review_id` int(5) NOT NULL,
  `author_id` int(5) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table stores data of all comments made on the website';

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `review_id`, `author_id`, `comment`) VALUES
(7, 1, 7, 'very good');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `filename` varchar(200) DEFAULT '',
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table stores data of a review';

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `title`, `type`, `address`, `description`, `likes`, `dislikes`, `approved`, `user_id`, `filename`, `image`) VALUES
(13, 'asd', 'restaurant', 'asd', 'asd', 0, 0, 1, 54, 'background.jpg', 0x36343864643732633431333232),
(14, 'gtgt', 'hotel', 'tgt', 'gtgt', 0, 0, 1, 54, 'background.jpg', 0x36343864643733333738353730),
(15, 'ere', 'Activity', 'rer', 'rere', 0, 0, 1, 54, 'background.jpg', 0x36343864643961353462303538),
(16, 'qqq', 'Hotel', 'qq', 'qqq', 0, 0, 1, 54, 'background.jpg', 0x36343865353964616539616537),
(17, 'kk', 'Museum', 'kk', 'kk', 0, 0, 1, 54, 'background.jpg', 0x36343865353965366361393833),
(18, 'sbf', 'Hotel', 'bfbf', 'bf', 0, 0, 1, 54, 'background.jpg', 0x36343865356238636631383737),
(19, 'nbnb', 'Restaurant', 'bnb', 'bnb', 0, 0, 1, 54, 'background.jpg', 0x36343865653266303731396635666f746b65312e6a706567),
(21, 'm', 'Hotel', 'm', 'm', 0, 0, 1, 54, 'fotke.png', 0x36343865656530386466646661666f746b652e706e67),
(24, 'q', 'Restaurant', 'q', 'q', 0, 0, 1, 54, 'fotke1.jpeg', ''),
(25, 'j', 'Museum', 'j', 'j', 0, 0, 1, 54, 'DFD_level_0.jpg', ''),
(26, 'b', 'Restaurant', 'b', 'b', 0, 0, 1, 54, 'fotke2.jpg', ''),
(27, 'er', 'Restaurant', 'err', 'er', 0, 0, 0, 54, 'DFD_level_0.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table stores data of all users, including admins';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `admin`) VALUES
(17, 'a', 'aa@gmail.com', '$2y$10$0ZjytT8dfdZNh/6njAkfsepY3lAcf7y064cgNMdPtO31upmf5mS1m', 0),
(18, 'a', 'a@gmail.com', '$2y$10$9xkzZdBO/085Vrx4RCKnoebzZ1imzxyfij0qVpPOow5PX594eE3e.', 0),
(50, 'admin', 'admin@gmail.com', 'admin', 1),
(51, 'admin1', 'admin1@gmail.com', '$2a$12$Q6nfMvAXdLjrCYhrxHkEnuciCHf5EbEJb.ZalJ3JazZQVvwo/tL7K', 1),
(52, 'bb', 'bbb@gmail.com', '$2y$10$bx4oIKlCkQMtEwS0atJLJejbCGUAX4CAKBcQUQoInyawLQJGRIZDC', 0),
(53, 'bb', 'abbb@gmail.com', '$2y$10$fGpvTtKFYqafQB4.6JpPb.F02MUX52G54hXabml.cvRi2RLojm5/S', 0),
(54, 'ttt', 'ttt@g.com', '$2y$10$zoow13RKGukphAa/gMvJMOftciNMnRqOS8pdlbLOWQdQTAmruTGmW', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
