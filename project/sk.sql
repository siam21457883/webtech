-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 08:43 PM
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
-- Database: `sk`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('lost','found') NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `status`, `image`, `created_time`) VALUES
(1, 'any', 'any', 'lost', '459906648_122100177416526007_5622417870702222916_n.jpg', '2024-09-23 10:00:12'),
(5, 'if found please return', 'breed : persian\r\n\r\nage: 6 months\r\n\r\ncontact : 011122343', 'lost', '459486963_551707744186143_1197254453607273224_n.jpg', '2024-09-23 11:09:33'),
(6, 'Odd eye cat', 'Breed : Unknown\r\nAge : unknown\r\ncontact : 1234566', 'found', '459298198_122175448574136839_4166350837968957545_n.jpg', '2024-09-23 08:03:39'),
(12, 'lost cat', 'breed : bengal desi\r\nage : 1 year\r\ncontact : 12342325', 'found', '459760603_1083352356465443_8162205572912741962_n.jpg', '2024-09-23 08:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `contact_number`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'siam@gmail.com', '$2y$10$EPZ13wm2B/A27ACyCqslZurohFBIkRKN.qkttUmPnRg9juOHtAXBO', NULL, 'other', '2024-09-21 11:06:15', '2024-09-21 11:06:15'),
(2, 'abir@gmail.com', '$2y$10$tTxRPNCJZLCaZzTIFi8sA.EAsc3Lr0qHNzS3HG3qj6M3VtCBrlID6', '666666666666666', '', '2024-09-21 11:51:13', '2024-09-23 16:16:03'),
(3, 'hello@gmail.com', '$2y$10$UcUC6dkZEclibOeHJHqGMeVqc3/5zgEYi/A3yUd3dbC9mfYP2p4SS', NULL, 'other', '2024-09-23 12:13:53', '2024-09-23 12:13:53'),
(4, 'user@gmail.com', '$2y$10$XShgQW4NRyb6VisbRc67Se/13L.w0Kd4US3URSvyd51oQ7T0ay9ia', NULL, 'other', '2024-09-23 17:02:02', '2024-09-23 17:02:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
