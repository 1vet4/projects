-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 09:15 PM
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
  `photo` varchar(200) DEFAULT 'background.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table stores data of a review';

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `title`, `type`, `address`, `description`, `likes`, `dislikes`, `approved`, `user_id`, `photo`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 1, 1, 0, 123, 'background.jpg'),
(2, 'lol', 'lol', 'lol', 'ollo\r\n\r\n', 0, 0, 0, 123, 'background.jpg'),
(3, 'id8', '1', '1', '1', 0, 0, 0, 8, 'background.jpg'),
(4, '123', '123', '123', '123', 0, 0, 0, 9, 'background.jpg');

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
(3, 'asd', 'asd@gmail.com', '$2y$10$qY/DNIpNNTWtF', 0),
(4, '123', '123@gmail.com', '$2y$10$p.z.o9XKy.J4k', 0),
(5, 'new', 'new@gmail.com', '$2y$10$Oh1hUWMjp9qL9vOIwu5PAuOHaEFmLLM2aO3ALBwdUHCWr84Fzui8W', 0),
(6, 'naujas', 'naujas@gmail.com', '$2y$10$Q3CmTDPPWlJz26yI8nhDz.Rnb8CuOptjPqYiyF8y.aOGlI3a0EV1e', 0),
(7, 'naujas', 'naujas@gmail.com', '$2y$10$rk5nB3pOkIya6.8QOICLZ.YoAuamQjTuc0P3XfcA9SXaSy96iwQCK', 0),
(8, '1', '1@gmail.com', '$2y$10$6fJNgeShP8wx3bpzMugkxeUaZIMPkcRCoue/4D6w1jNU79Lef3Eom', 0),
(9, 'final', 'final@gmail.com', '$2y$10$EOI22sAdGK5PXoRGq9B.i.m1vUm34aRBxDxv4FuGve4wy2gk9HWXu', 0);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
