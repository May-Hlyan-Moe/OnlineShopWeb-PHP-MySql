-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 01:59 PM
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
-- Database: `finalProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `title_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_date`, `modified_date`, `title_images`) VALUES
(7, 'Card Holders', '2024-03-03 21:51:33', '2024-03-09 18:03:05', 'card-holder005.jpg'),
(9, 'Daily Purses', '2024-03-04 20:23:43', '2024-03-05 21:13:46', 'daily-purse003.jpg'),
(11, 'Evening Bags', '2024-03-05 21:15:33', '2024-03-08 14:03:05', 'evening-bag001.jpg'),
(12, 'Leather Backpacks', '2024-03-08 14:06:40', '2024-03-15 18:56:43', 'leather-bag001.jpg'),
(13, 'School Backpacks', '2024-03-15 19:07:38', '2024-03-15 19:07:38', 'school-bag003.jpg'),
(15, 'Travel Backpacks', '2024-03-15 19:24:51', '2024-03-15 19:24:51', 'travel-backpack001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(12) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `ig_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `phone`, `email`, `address`, `fb_link`, `ig_link`, `twitter_link`) VALUES
(1, '+959 123123121', 'bagluxe001@gmail.com', 'No.123, Main Sreet, Thaketa Township, Yangon', 'www.facebook.com/....', 'www.instagram.com/...', 'www.twitter.com/....');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `price` int(12) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `reached_date` datetime NOT NULL,
  `expired_date` datetime NOT NULL,
  `material` varchar(255) NOT NULL,
  `width` varchar(12) NOT NULL,
  `height` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `brand`, `review`, `price`, `photo`, `category_id`, `reached_date`, `expired_date`, `material`, `width`, `height`) VALUES
(9, 'Card Holder 001', 'Chanel', 'Light & clean', 199, 'card-holder001.jpg', 7, '2024-03-03 22:24:59', '2024-07-09 11:59:51', 'leather', '3.375', '2.225'),
(10, 'Card Holder 002', 'Chanel', 'light & clean', 199, 'card-holder002.jpg', 7, '2024-03-03 22:57:32', '2024-07-09 12:34:30', 'leather', '3.375', '2.125'),
(11, 'Daily Purse 001', 'mimi', 'clean & white', 399, 'daily-purse001.jpg', 9, '2024-03-04 20:25:38', '2024-07-04 15:01:14', 'leather', '9', '5'),
(12, 'Daily Purse 002', 'mimi', 'white', 399, 'daily-pruse002.jpg', 9, '2024-03-04 20:29:46', '2024-07-04 15:00:54', 'leather', '9', '5'),
(13, 'Daily Purse 003', 'Dior', 'white', 599, 'daily-purse003.jpg', 9, '2024-03-04 20:33:33', '2024-07-04 15:03:33', 'leather', '8', '6'),
(14, 'Evening Bag 001', 'mimu', 'white', 499, 'evening-bag001.jpg', 11, '2024-03-05 21:18:35', '2024-07-09 11:36:05', 'leather', '8', '7'),
(15, 'Evening Bag 002', 'mimu', 'white', 499, 'evening-bag002.jpg', 11, '2024-03-05 21:24:03', '2024-07-09 11:36:43', 'leather', '6', '6'),
(17, 'Daily Purse 004', 'Chanel', 'white', 499, 'daily-pruse004.jpg', 9, '2024-03-08 17:22:14', '2024-07-08 11:52:14', 'leather', '9', '6'),
(18, 'Daily Purse 005', 'miu miu', 'white', 599, 'daily-pruse005.jpg', 9, '2024-03-08 17:24:21', '2024-07-08 11:54:21', 'leather', '9', '7'),
(19, 'Card Holder 003', 'Charles & Kerth', 'white', 199, 'card-holder003.jpg', 7, '2024-03-15 18:09:49', '2024-07-15 12:39:49', 'leather', '3.375', '2.125'),
(20, 'Card Holder 004', 'Yangoods', 'white', 199, 'card-holder004.jpg', 7, '2024-03-15 18:11:12', '2024-07-15 12:41:12', 'leather', '3.375', '2.125'),
(21, 'Card Holder 005', 'Coach', 'white', 199, 'card-holder005.jpg', 7, '2024-03-15 18:12:06', '2024-07-15 12:42:06', 'leather', '3.375', '2.125'),
(22, 'Card Holder 006', 'Yangoods', 'white', 199, 'card-holder006.jpg', 7, '2024-03-15 18:12:49', '2024-07-15 12:42:49', 'leather', '3.375', '2.125'),
(23, 'Card Holder 007', 'Parada', 'white', 199, 'card-holder007.jpg', 7, '2024-03-15 18:13:52', '2024-07-15 12:43:52', 'leather', '3.375', '2.125'),
(24, 'Card Holder 008', 'Dior', 'pink', 199, 'card-holder008.jpg', 7, '2024-03-15 18:14:33', '2024-07-15 12:44:33', 'leather', '3.375', '2.125'),
(25, 'Card Holder 009', 'Charles & Kerth', 'two colors', 199, 'card-holder009.jpg', 7, '2024-03-15 18:15:25', '2024-07-15 12:45:25', 'leather', '3.375', '2.125'),
(26, 'Card Holder 010', 'Forever Young', 'brown', 199, 'card-holder010.jpg', 7, '2024-03-15 18:16:19', '2024-07-15 12:46:19', 'leather', '3.375', '2.125'),
(27, 'Card Holder 011', 'Forever Young', 'pink', 199, 'card-holder011.jpg', 7, '2024-03-15 18:17:09', '2024-07-15 12:47:09', 'leather', '3.375', '2.125'),
(28, 'Card Holder 012', 'Forever Young', 'blue', 199, 'card-holder012.jpg', 7, '2024-03-15 18:17:46', '2024-07-15 12:47:46', 'leather', '3.375', '2.125'),
(29, 'Card Holder 013', 'Forever Young', 'baby green', 199, 'card-holder013.jpg', 7, '2024-03-15 18:18:43', '2024-07-15 12:48:43', 'leather', '3.375', '2.125'),
(30, 'Card Holder 014', 'Kangaroo', 'pink', 199, 'card-holder014.jpg', 7, '2024-03-15 18:19:45', '2024-07-15 12:49:45', 'leather', '3.375', '2.125'),
(31, 'Daily Purse 006', 'Coach', 'white', 499, 'daily-purse006.jpg', 9, '2024-03-15 18:24:39', '2024-07-15 12:54:39', 'leather', '9', '7'),
(32, 'Daily Purse 007', 'Forever Young', 'white', 499, 'daily-purse007.jpg', 9, '2024-03-15 18:25:30', '2024-07-15 12:55:30', 'leather', '9', '7'),
(33, 'Daily Purse 008', 'Chanal', 'white', 499, 'daily-purse008.jpg', 9, '2024-03-15 18:26:17', '2024-07-15 12:56:17', 'leather', '9', '7'),
(34, 'Daily Purse 009', 'Dior', 'white', 499, 'daily-purse009.jpg', 9, '2024-03-15 18:26:58', '2024-07-15 12:56:58', 'leather', '9', '7'),
(35, 'Daily Purse 010', 'Chanal', 'white', 499, 'daily-purse010.jpg', 9, '2024-03-15 18:28:02', '2024-07-15 12:58:02', 'leather', '7', '5'),
(36, 'Daily Purse 011', 'Forever Young', 'white', 499, 'daily-purse011.jpg', 9, '2024-03-15 18:28:40', '2024-07-15 12:58:40', 'leather', '9', '7'),
(37, 'Daily Purse 012', 'Coach', 'white', 499, 'daily-purse012.jpg', 9, '2024-03-15 18:29:18', '2024-07-15 12:59:18', 'leather', '9', '7'),
(38, 'Daily Purse 013', 'Charles & Kerth', 'white', 499, 'daily-purse013.jpg', 9, '2024-03-15 18:29:54', '2024-07-15 12:59:54', 'leather', '9', '7'),
(39, 'Daily Purse 014', 'Prada', 'white', 499, 'daily-purse014.jpg', 9, '2024-03-15 18:32:05', '2024-07-15 13:02:05', 'leather', '9', '7'),
(40, 'Daily Purse 015', 'Forever Young', 'white', 499, 'daily-purse015.jpg', 9, '2024-03-15 18:32:38', '2024-07-15 13:02:38', 'leather', '9', '7'),
(41, 'Daily Purse 016', 'Charles & Kerth', 'white', 499, 'daily-purse016.jpg', 9, '2024-03-15 18:33:13', '2024-07-15 13:03:13', 'leather', '9', '7'),
(42, 'Daily Purse 017', 'Coach', 'white', 499, 'daily-purse017.jpg', 9, '2024-03-15 18:33:44', '2024-07-15 13:03:44', 'leather', '9', '7'),
(43, 'Daily Purse 018', 'Dior', 'white', 499, 'daily-purse018.jpg', 9, '2024-03-15 18:34:28', '2024-07-15 13:04:28', 'leather', '9', '7'),
(44, 'Daily Purse 019', 'miu miu', 'white', 499, 'daily-purse019.jpg', 9, '2024-03-15 18:35:09', '2024-07-15 13:05:09', 'leather', '9', '7'),
(45, 'Daily Purse 020', 'Charles & Kerth', 'white', 499, 'daily-purse020.jpg', 9, '2024-03-15 18:35:56', '2024-07-15 13:05:56', 'leather', '9', '7'),
(46, 'Daily Purse 021', 'Forever Young', 'white', 499, 'daily-purse021.jpg', 9, '2024-03-15 18:36:27', '2024-07-15 13:06:27', 'leather', '9', '7'),
(47, 'Daily Purse 022', 'Forever Young', 'white', 499, 'daily-purse022.jpg', 9, '2024-03-15 18:37:01', '2024-07-15 13:07:01', 'leather', '9', '7'),
(48, 'Daily Purse 023', 'miu miu', 'white', 499, 'daily-purse023.jpg', 9, '2024-03-15 18:37:36', '2024-07-15 13:07:36', 'leather', '9', '7'),
(49, 'Daily Purse 024', 'Coach', 'white', 499, 'daily-purse024.jpg', 9, '2024-03-15 18:38:11', '2024-07-15 13:08:11', 'leather', '9', '7'),
(50, 'Daily Purse 025', 'Chanal', 'white', 499, 'daily-purse025.jpg', 9, '2024-03-15 18:38:49', '2024-07-15 13:08:49', 'leather', '9', '7'),
(51, 'Evening Bag 003', 'Forever Young', 'white', 699, 'evening-bag003.jpg', 11, '2024-03-15 18:43:02', '2024-07-15 13:13:02', 'leather', '9', '7'),
(52, 'Evening Bag 004', 'Coach', 'white', 699, 'evening-bag004.jpg', 11, '2024-03-15 18:43:51', '2024-07-15 13:13:51', 'fancy', '9', '7'),
(53, 'Evening Bag 005', 'Coach', 'white', 699, 'evening-bag005.jpg', 11, '2024-03-15 18:44:33', '2024-07-15 13:14:33', 'fancy', '9', '7'),
(54, 'Evening Bag 006', 'Charles & Kerth', 'white', 699, 'evening-bag006.jpg', 11, '2024-03-15 18:45:21', '2024-07-15 13:15:21', 'fancy', '7', '5'),
(55, 'Evening Bag 007', 'Coach', 'white', 699, 'evening-bag007.jpg', 11, '2024-03-15 18:46:13', '2024-07-15 13:16:13', 'leather', '7', '5'),
(56, 'Evening Bag 008', 'Forever Young', 'white', 699, 'evening-bag008.jpg', 11, '2024-03-15 18:46:49', '2024-07-15 13:16:49', 'leather', '9', '7'),
(57, 'Evening Bag 009', 'Forever Young', 'white', 699, 'evening-bag009.jpg', 11, '2024-03-15 18:47:28', '2024-07-15 13:17:28', 'fancy', '9', '7'),
(58, 'Evening Bag 010', 'Yangoods', 'white', 699, 'evening-bag010.jpg', 11, '2024-03-15 18:48:09', '2024-07-15 13:18:09', 'leather', '9', '7'),
(59, 'Leather Backpack 001', 'Forever Young', 'white', 699, 'leather-bag001.jpg', 12, '2024-03-15 18:58:24', '2024-07-15 13:29:19', 'leather', '14', '18'),
(60, 'Leather Backpack 002', 'Coach', 'black', 699, 'leather-bag002.jpg', 12, '2024-03-15 18:59:52', '2024-07-15 13:29:52', 'leather', '14', '18'),
(61, 'Leather Backpack 003', 'miu miu', 'white', 699, 'leather-bag003.jpg', 12, '2024-03-15 19:00:27', '2024-07-15 13:30:27', 'leather', '14', '18'),
(62, 'Leather Backpack 004', 'Chanal', 'white', 699, 'leather-bag004.jpg', 12, '2024-03-15 19:00:59', '2024-07-15 13:30:59', 'leather', '14', '18'),
(63, 'Leather Backpack 005', 'Dior', 'white', 699, 'leather-bag005.jpg', 12, '2024-03-15 19:01:29', '2024-07-15 13:31:29', 'leather', '14', '18'),
(64, 'Leather Backpack 006', 'Coach', 'white', 699, 'leather-bag006.jpg', 12, '2024-03-15 19:02:03', '2024-07-15 13:32:03', 'leather', '14', '18'),
(65, 'Leather Backpack 007', 'Charles & Kerth', 'white', 699, 'leather-bag007.jpg', 12, '2024-03-15 19:02:46', '2024-07-15 13:32:46', 'leather', '14', '18'),
(66, 'Leather Backpack 008', 'Chanal', 'white', 699, 'leather-bag008.jpg', 12, '2024-03-15 19:03:16', '2024-07-15 13:33:16', 'leather', '14', '18'),
(67, 'Leather Backpack 009', 'Charles & Kerth', 'white', 699, 'leather-bag009.jpg', 12, '2024-03-15 19:04:12', '2024-07-15 13:34:12', 'leather', '14', '18'),
(68, 'Leather Backpack 010', 'Coach', 'white', 699, 'leather-bag010.jpg', 12, '2024-03-15 19:04:50', '2024-07-15 13:34:50', 'leather', '14', '18'),
(69, 'School Backpack 001', 'Forever Young', 'cherry ', 399, 'school-bag001.jpg', 13, '2024-03-15 19:10:10', '2024-07-15 13:40:10', 'nylon', '14', '18'),
(70, 'School Backpack 002', 'Forever Young', 'tulip ', 399, 'school-bag002.jpg', 13, '2024-03-15 19:10:49', '2024-07-15 13:40:49', 'nylon', '14', '18'),
(71, 'School Backpack 003', 'Coach', 'white & toy', 399, 'school-bag003.jpg', 13, '2024-03-15 19:11:28', '2024-07-15 13:41:28', 'nylon', '14', '18'),
(72, 'School Backpack 004', 'Coach', 'white', 399, 'school-bag004.jpg', 13, '2024-03-15 19:12:19', '2024-07-15 13:42:19', 'nylon', '14', '18'),
(73, 'School Backpack 005', 'Forever Young', 'melody ', 399, 'school-bag005.jpg', 13, '2024-03-15 19:12:55', '2024-07-15 13:42:55', 'nylon', '14', '18'),
(74, 'School Backpack 006', 'Forever Young', 'white', 399, 'school-bag006.jpg', 13, '2024-03-15 19:13:23', '2024-07-15 13:43:23', 'nylon', '14', '18'),
(75, 'School Backpack 007', 'Forever Young', 'kitty', 399, 'school-bag007.jpg', 13, '2024-03-15 19:14:02', '2024-07-15 13:44:02', 'nylon', '14', '18'),
(76, 'School Backpack 008', 'Forever Young', 'flower', 399, 'school-bag008.jpg', 13, '2024-03-15 19:14:43', '2024-07-15 13:44:43', 'nylon', '14', '18'),
(77, 'School Backpack 009', 'Dior', 'white', 399, 'school-bag009.jpg', 13, '2024-03-15 19:15:11', '2024-07-15 13:45:11', 'nylon', '14', '18'),
(78, 'School Backpack 010', 'Forever Young', 'white', 399, 'school-bag010.jpg', 13, '2024-03-15 19:15:45', '2024-07-15 13:45:45', 'nylon', '14', '18'),
(79, 'Travel Backpack 001', 'Forever Young', 'white', 699, 'travel-backpack001.jpg', 15, '2024-03-15 19:26:55', '2024-07-15 13:56:55', 'nylon', '14', '18'),
(80, 'Travel Backpack 002', 'Forever Young', 'brown', 699, 'travel-backpack002.jpg', 15, '2024-03-15 19:27:42', '2024-07-15 13:57:42', 'nylon', '14', '18'),
(81, 'Travel Backpack 003', 'Forever Young', 'black', 699, 'travel-backpack003.jpg', 15, '2024-03-15 19:28:17', '2024-07-15 13:58:17', 'nylon', '14', '18'),
(82, 'Travel Backpack 004', 'Forever Young', 'gray', 699, 'travel-backpack004.jpg', 15, '2024-03-15 19:28:52', '2024-07-15 13:58:52', 'nylon', '14', '18'),
(83, 'Travel Backpack 005', 'Forever Young', 'baby green', 699, 'travel-backpack005.jpg', 15, '2024-03-15 19:29:26', '2024-07-15 13:59:26', 'nylon', '14', '18'),
(84, 'Travel Backpack 006', 'Forever Young', 'green', 699, 'travel-backpack006.jpg', 15, '2024-03-15 19:29:57', '2024-07-15 13:59:57', 'nylon', '14', '18');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(12) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `item_id`, `order_id`, `qty`) VALUES
(21, 58, 38, 1),
(22, 50, 38, 2),
(23, 14, 39, 1),
(24, 80, 39, 1),
(25, 60, 39, 1),
(26, 71, 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `visa_card` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `ordered_date` datetime NOT NULL,
  `received_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone_no`, `visa_card`, `address`, `status`, `ordered_date`, `received_date`) VALUES
(38, 'may', 'may001@gmail.com', '+959 123123121', '12123123', 'Taunggyi', 1, '2024-03-15 18:51:42', '2024-03-16 22:54:06'),
(39, 'may', 'may001@gmail.com', '+959 123123121', '12123123', 'Taunggyi', 0, '2024-03-16 22:40:50', '2024-03-23 17:10:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
