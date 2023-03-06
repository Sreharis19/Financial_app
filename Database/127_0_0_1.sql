-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 05:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financial_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `_id` int(20) NOT NULL,
  `cw_post_id` int(20) NOT NULL,
  `send_by` int(20) NOT NULL,
  `send_to` int(20) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`_id`, `cw_post_id`, `send_by`, `send_to`, `message`, `created_date`) VALUES
(1, 1, 1, 2, 'Hii There are new exciting investment opertunities, do you like to know more', '2023-02-27 02:31:04'),
(2, 1, 2, 1, 'yes i would', '2023-02-27 02:32:26'),
(3, 1, 1, 2, 'great', '2023-02-27 02:32:43'),
(4, 1, 2, 1, 'is that in equity ?', '2023-02-27 02:32:58'),
(5, 1, 1, 2, 'yes, i will send you the details via email', '2023-02-27 02:33:29'),
(6, 1, 1, 2, 'can you please tell me about your investment amount', '2023-02-27 02:48:29'),
(7, 1, 1, 2, 'also please send your email id', '2023-02-27 03:32:47'),
(8, 1, 1, 2, 'tell me when you are available for a call !', '2023-02-27 02:51:40'),
(9, 2, 1, 2, 'Hii', '2023-02-27 11:16:51'),
(10, 1, 1, 2, 'hoo', '2023-02-27 14:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `comments` text NOT NULL,
  `admin_reply` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `replied_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `comments`, `admin_reply`, `created_on`, `replied_on`) VALUES
(1, 1, 'couldn\'t acess chat', 'try reloading the website', '2023-02-27 03:21:32', '2023-02-27 03:20:42'),
(2, 1, 'testing', '', '2023-02-27 03:46:18', NULL),
(4, 3, 'testing', '', '2023-02-27 11:02:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cw_posts`
--

CREATE TABLE `cw_posts` (
  `_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `post_title` varchar(225) NOT NULL,
  `post_image` varchar(225) NOT NULL,
  `post_content` text NOT NULL,
  `created_by` int(20) DEFAULT NULL,
  `post_slug` varchar(225) NOT NULL,
  `post_status` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cw_posts`
--

INSERT INTO `cw_posts` (`_id`, `product_id`, `post_title`, `post_image`, `post_content`, `created_by`, `post_slug`, `post_status`, `created_date`) VALUES
(1, 1, 'test', '', 'testing', 3, 'post', '1', '2023-02-26 16:22:11'),
(2, 1, 'test', 'testing', 'intrade trading', 3, 'intrade', '1', '2023-02-27 05:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(20) NOT NULL,
  `product_category_id` int(20) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_image` varchar(225) NOT NULL,
  `product_amount` float NOT NULL,
  `product_max_quantity` float NOT NULL,
  `product_description` text NOT NULL,
  `product_benefits` text NOT NULL,
  `product_status` enum('0','1') NOT NULL,
  `product_created_on` datetime NOT NULL,
  `product_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `product_name`, `product_image`, `product_amount`, `product_max_quantity`, `product_description`, `product_benefits`, `product_status`, `product_created_on`, `product_updated_on`) VALUES
(1, 1, 'Treasury Bond', '', 5000, 50000, 'treasury bond', 'test', '1', '2023-02-26 04:32:10', '2023-02-26 04:32:10'),
(2, 2, 'Equity', '', 100, 100000, 'Intrade', 'Intrade', '1', '2023-02-26 04:32:55', '2023-02-26 04:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `category_image` varchar(225) DEFAULT NULL,
  `category_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `category_image`, `category_status`) VALUES
(1, 'Equity', 'Treasury Bond', '1'),
(2, 'Bond', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `read_post`
--

CREATE TABLE `read_post` (
  `_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `post_read_status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '0 - Unread Post, 1 - Read Post',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `read_post`
--

INSERT INTO `read_post` (`_id`, `user_id`, `post_id`, `post_read_status`, `created_date`) VALUES
(1, 1, 1, '1', '2023-03-05 16:17:12'),
(2, 2, 1, '0', '2023-03-05 16:20:12'),
(3, 2, 1, '0', '2023-03-06 16:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `rm_sentpost`
--

CREATE TABLE `rm_sentpost` (
  `id` int(11) NOT NULL,
  `post_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rm_sentpost`
--

INSERT INTO `rm_sentpost` (`id`, `post_id`, `user_id`) VALUES
(1, 1, 2),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(20) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_contact` varchar(225) DEFAULT NULL,
  `user_password` varchar(225) DEFAULT NULL,
  `user_type` enum('1','2','3','4') NOT NULL COMMENT '1-Administrator,2-Relation Manager, 3 - Content Writer, 4- Customer',
  `user_token` varchar(225) NOT NULL,
  `user_status` enum('0','1') NOT NULL COMMENT '0-Not active,1-Active',
  `user_created_date` datetime NOT NULL,
  `user_last_updated _on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `first_name`, `last_name`, `user_email`, `user_contact`, `user_password`, `user_type`, `user_token`, `user_status`, `user_created_date`, `user_last_updated _on`) VALUES
(1, 'sreehari', 's', 'sreeharis19@gmail.com', '9497126857', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '4', '12345', '1', '2023-02-26 00:22:27', '2023-02-26 00:22:27'),
(2, 'Kiran', 'r', 'kiran.r@mailinator.com', '8921995853', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '4', '3456', '1', '2023-02-26 04:03:38', '2023-02-26 04:03:38'),
(3, 'Amal', 'm', 'cw@gmail.com', '854216952', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '3', '8456', '1', '2023-02-27 05:08:43', '2023-02-27 05:08:43'),
(4, 'Neha', 'S', 'client@gmail.com', '854216888', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '4', '8411', '1', '2023-02-27 05:08:43', '2023-02-27 05:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_products_ids` varchar(225) NOT NULL,
  `user_min_purchase_power` varchar(225) DEFAULT NULL,
  `user_max_purchase_power` varchar(225) DEFAULT NULL,
  `user_created_date` datetime NOT NULL,
  `user_last_updated _on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`_id`, `user_id`, `user_products_ids`, `user_min_purchase_power`, `user_max_purchase_power`, `user_created_date`, `user_last_updated _on`) VALUES
(1, 2, '1#2#12#999', '500', '2000', '2023-02-26 04:29:41', '2023-02-26 04:29:41'),
(2, 1, '1#2', NULL, NULL, '2023-02-26 17:58:50', '2023-02-26 17:58:50'),
(3, 3, '1#2', NULL, NULL, '2023-02-27 05:17:25', '2023-02-27 05:17:25'),
(4, 4, '1#2#12#311', '500', '2000', '2023-02-28 05:17:25', '2023-02-28 05:17:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_posts`
--
ALTER TABLE `cw_posts`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `read_post`
--
ALTER TABLE `read_post`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `rm_sentpost`
--
ALTER TABLE `rm_sentpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cw_posts`
--
ALTER TABLE `cw_posts`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `read_post`
--
ALTER TABLE `read_post`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rm_sentpost`
--
ALTER TABLE `rm_sentpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
