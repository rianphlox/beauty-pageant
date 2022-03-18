-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 05:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pageant`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE `contestants` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `about` text NOT NULL,
  `church_group` varchar(191) NOT NULL,
  `kc_link` varchar(191) NOT NULL,
  `vote_count` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `fullname`, `about`, `church_group`, `kc_link`, `vote_count`, `image_path`) VALUES
(1, 'Ifechukwu Eze', 'Ifechukwu Eze is an amazing writer, singer and philanthropist. She loves God and she loves winning souls.', 'GROUP 2', 'https://kingschat.com/1', 0, 'uploads/gallery_img-01.jpg'),
(2, 'Esther Daniel', 'Esther Daniel is an amazing writer and script-writer. She loves God and she loves singing.', 'GROUP 2', 'https://kingschat.com/2', 0, 'uploads/gallery_img-06.jpg'),
(3, 'Blessing Ariana', 'Blessing Ariana is an amazing songwriter, singer and pianist.', 'GROUP 1', 'https://kingschat.com/3', 0, 'uploads/gallery_img-09.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
