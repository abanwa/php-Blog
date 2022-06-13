-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2022 at 06:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0 COMMENT '0 = visible, 1 = hidden, 2 = deleted',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `navbar_status`, `status`, `created_at`) VALUES
(1, 'HTML', 'html-tutorial', 'HTML is a scripting language', 'HTML', 'HTML is a scripting language and it\'s good', 'html tutorial. html crashed course', 0, 0, '2022-03-15 12:21:15'),
(3, 'PHP', 'php-tutorial', 'PHP is a scripting Programming Language', 'PHP Tutorial', 'PHP is a scripting Programming Language and it\'s good', 'PHP is a Programming Language . php crash course', 0, 0, '2022-03-15 12:27:29'),
(4, 'Laraval', 'laraval', 'Laraval Solution', 'Laraval Tutorial', 'Laraval Tutorial', 'Laraval Tutorial', 0, 0, '2022-03-30 16:47:48'),
(5, 'React JS', 'react.js', 'React JS Tutorial', 'React JS Tutorial', 'React JS Tutorial', 'React JS Tutorial', 0, 0, '2022-03-30 16:49:20'),
(6, 'Codeigniter', 'codeigniter', 'Codeigniter Tutorial', 'Codeigniter Tutorial', 'Codeigniter Tutorial', 'Codeigniter Tutorial', 0, 0, '2022-03-30 16:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`) VALUES
(3, 1, 'HTML lesson', 'html-tutorial', 'html description', '1648643009.png', 'Good HTML', 'Learn HTML', 'Lesson Good HTML description', 0, '2022-03-20 09:49:31'),
(6, 3, 'abanwa', 'html-tutorial', 'DGSHtjfgj', '1648644921.jpg', 'fgfhjkjlkl', 'lgdfghkjeaertsyd', 'dsftyshzbvxdf', 0, '2022-03-30 12:55:21'),
(9, 4, 'Laraval 8', 'learn-laraval', '<p>laraval 8 is the latest PHP frame work</p>', '1650549959.', 'php laraval html', 'learn laraval', 'laraval php', 0, '2022-04-21 14:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin,2=superadmin',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role_as`, `status`, `created_at`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '1234567890', 2, 0, '2022-03-12 11:10:24'),
(2, 'abanwa', 'chinaza', 'abanwachinaza@gmail.com', '1234567890', 1, 0, '2022-03-12 11:16:00'),
(12, 'oc', 'nachi', 'ocnachi@gmail.com', '1234567890', 0, 0, '2022-03-15 10:32:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
