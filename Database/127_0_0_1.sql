-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 05:41 PM
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
(10, 1, 1, 2, 'hoo', '2023-02-27 14:51:07'),
(11, 1, 2, 4, 'hii', '2023-04-11 18:56:03'),
(12, 1, 2, 4, 'hii', '2023-04-11 18:59:37'),
(13, 1, 2, 4, 'hooo', '2023-04-11 18:59:54'),
(14, 1, 2, 4, 'hello', '2023-04-11 19:01:12'),
(15, 1, 2, 4, 'mmm', '2023-04-11 19:03:42'),
(16, 1, 2, 4, 'mm', '2023-04-11 19:03:56'),
(17, 1, 2, 4, 'hhhhhhhhhhhhhhhhh', '2023-04-11 19:04:46'),
(18, 1, 2, 4, 'hhjshs', '2023-04-11 19:10:14'),
(19, 1, 2, 4, 'fahdjslgfs', '2023-04-11 19:11:46'),
(20, 1, 4, 2, 'Client messaging', '2023-04-11 19:16:30'),
(21, 1, 4, 2, 'Hello', '2023-04-12 18:44:07');

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
(4, 3, 'testing', '', '2023-02-27 11:02:27', NULL),
(6, 4, 'Unable to login', '', '2023-03-13 18:04:57', NULL),
(9, 4, 'qwdefg', '', '2023-03-27 16:43:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `currency_name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `currency`, `currency_name`) VALUES
(1, 'Afghanistan', 'AFN', 'Afghani'),
(2, 'Albania', 'ALL', 'Lek'),
(3, 'Algeria', 'DZD', 'Algerian Dinar'),
(4, 'American Samoa', 'USD', 'US Dollar'),
(5, 'Andorra', 'EUR', 'Euro'),
(6, 'Angola', 'AOA', 'Kwanza'),
(7, 'Anguilla', 'XCD', 'East Caribbean Dollar'),
(8, 'Antarctica', NULL, NULL),
(9, 'Antigua and Barbuda', 'XCD', 'East Caribbean Dollar'),
(10, 'Argentina', 'ARS', 'Argentine Peso'),
(11, 'Armenia', 'AMD', 'Armenian Dram'),
(12, 'Aruba', 'AWG', 'Aruban Florin'),
(13, 'Australia', 'AUD', 'Australian Dollar'),
(14, 'Austria', 'EUR', 'Euro'),
(15, 'Azerbaijan', 'AZN', 'Azerbaijanian Manat'),
(16, 'Bahamas', 'BSD', 'Bahamian Dollar'),
(17, 'Bahrain', 'BHD', 'Bahraini Dinar'),
(18, 'Bangladesh', 'BDT', 'Taka'),
(19, 'Barbados', 'BBD', 'Barbados Dollar'),
(20, 'Belarus', 'BYR', 'Belarussian Ruble'),
(21, 'Belgium', 'EUR', 'Euro'),
(22, 'Belize', 'BZD', 'Belize Dollar'),
(23, 'Benin', 'XOF', 'CFA Franc BCEAO'),
(24, 'Bermuda', 'BMD', 'Bermudian Dollar'),
(25, 'Bhutan', 'INR', 'Indian Rupee'),
(26, 'Bolivia, Plurinational State of', 'BOB', 'Boliviano'),
(27, 'Bonaire, Sint Eustatius and Saba', 'USD', 'US Dollar'),
(28, 'Bosnia and Herzegovina', 'BAM', 'Convertible Mark'),
(29, 'Botswana', 'BWP', 'Pula'),
(30, 'Bouvet Island', 'NOK', 'Norwegian Krone'),
(31, 'Brazil', 'BRL', 'Brazilian Real'),
(32, 'British Indian Ocean Territory', 'USD', 'US Dollar'),
(33, 'Brunei Darussalam', 'BND', 'Brunei Dollar'),
(34, 'Bulgaria', 'BGN', 'Bulgarian Lev'),
(35, 'Burkina Faso', 'XOF', 'CFA Franc BCEAO'),
(36, 'Burundi', 'BIF', 'Burundi Franc'),
(37, 'Cambodia', 'KHR', 'Riel'),
(38, 'Cameroon', 'XAF', 'CFA Franc BEAC'),
(39, 'Canada', 'CAD', 'Canadian Dollar'),
(40, 'Cape Verde', 'CVE', 'Cabo Verde Escudo'),
(41, 'Cayman Islands', 'KYD', 'Cayman Islands Dollar'),
(42, 'Central African Republic', 'XAF', 'CFA Franc BEAC'),
(43, 'Chad', 'XAF', 'CFA Franc BEAC'),
(44, 'Chile', 'CLP', 'Chilean Peso'),
(45, 'China', 'CNY', 'Yuan Renminbi'),
(46, 'Christmas Island', 'AUD', 'Australian Dollar'),
(47, 'Cocos (Keeling) Islands', 'AUD', 'Australian Dollar'),
(48, 'Colombia', 'COP', 'Colombian Peso'),
(49, 'Comoros', 'KMF', 'Comoro Franc'),
(50, 'Congo', 'XAF', 'CFA Franc BEAC'),
(51, 'Congo, the Democratic Republic of the', NULL, NULL),
(52, 'Cook Islands', 'NZD', 'New Zealand Dollar'),
(53, 'Costa Rica', 'CRC', 'Costa Rican Colon'),
(54, 'Croatia', 'HRK', 'Croatian Kuna'),
(55, 'Cuba', 'CUP', 'Cuban Peso'),
(56, 'Curaçao', 'ANG', 'Netherlands Antillean Guilder'),
(57, 'Cyprus', 'EUR', 'Euro'),
(58, 'Czech Republic', 'CZK', 'Czech Koruna'),
(59, 'Côte d\'Ivoire', 'XOF', 'CFA Franc BCEAO'),
(60, 'Denmark', 'DKK', 'Danish Krone'),
(61, 'Djibouti', 'DJF', 'Djibouti Franc'),
(62, 'Dominica', 'XCD', 'East Caribbean Dollar'),
(63, 'Dominican Republic', 'DOP', 'Dominican Peso'),
(64, 'Ecuador', 'USD', 'US Dollar'),
(65, 'Egypt', 'EGP', 'Egyptian Pound'),
(66, 'El Salvador', 'USD', 'US Dollar'),
(67, 'Equatorial Guinea', 'XAF', 'CFA Franc BEAC'),
(68, 'Eritrea', 'ERN', 'Nakfa'),
(69, 'Estonia', 'EUR', 'Euro'),
(70, 'Ethiopia', 'ETB', 'Ethiopian Birr'),
(71, 'Falkland Islands (Malvinas)', 'FKP', 'Falkland Islands Pound'),
(72, 'Faroe Islands', 'DKK', 'Danish Krone'),
(73, 'Fiji', 'FJD', 'Fiji Dollar'),
(74, 'Finland', 'EUR', 'Euro'),
(75, 'France', 'EUR', 'Euro'),
(76, 'French Guiana', 'EUR', 'Euro'),
(77, 'French Polynesia', 'XPF', 'CFP Franc'),
(78, 'French Southern Territories', 'EUR', 'Euro'),
(79, 'Gabon', 'XAF', 'CFA Franc BEAC'),
(80, 'Gambia', 'GMD', 'Dalasi'),
(81, 'Georgia', 'GEL', 'Lari'),
(82, 'Germany', 'EUR', 'Euro'),
(83, 'Ghana', 'GHS', 'Ghana Cedi'),
(84, 'Gibraltar', 'GIP', 'Gibraltar Pound'),
(85, 'Greece', 'EUR', 'Euro'),
(86, 'Greenland', 'DKK', 'Danish Krone'),
(87, 'Grenada', 'XCD', 'East Caribbean Dollar'),
(88, 'Guadeloupe', 'EUR', 'Euro'),
(89, 'Guam', 'USD', 'US Dollar'),
(90, 'Guatemala', 'GTQ', 'Quetzal'),
(91, 'Guernsey', 'GBP', 'Pound Sterling'),
(92, 'Guinea', 'GNF', 'Guinea Franc'),
(93, 'Guinea-Bissau', 'XOF', 'CFA Franc BCEAO'),
(94, 'Guyana', 'GYD', 'Guyana Dollar'),
(95, 'Haiti', 'USD', 'US Dollar'),
(96, 'Heard Island and McDonald Islands', 'AUD', 'Australian Dollar'),
(97, 'Holy See (Vatican City State)', 'EUR', 'Euro'),
(98, 'Honduras', 'HNL', 'Lempira'),
(99, 'Hong Kong', 'HKD', 'Hong Kong Dollar'),
(100, 'Hungary', 'HUF', 'Forint'),
(101, 'Iceland', 'ISK', 'Iceland Krona'),
(102, 'India', 'INR', 'Indian Rupee'),
(103, 'Indonesia', 'IDR', 'Rupiah'),
(104, 'Iran, Islamic Republic of', 'IRR', 'Iranian Rial'),
(105, 'Iraq', 'IQD', 'Iraqi Dinar'),
(106, 'Ireland', 'EUR', 'Euro'),
(107, 'Isle of Man', 'GBP', 'Pound Sterling'),
(108, 'Israel', 'ILS', 'New Israeli Sheqel'),
(109, 'Italy', 'EUR', 'Euro'),
(110, 'Jamaica', 'JMD', 'Jamaican Dollar'),
(111, 'Japan', 'JPY', 'Yen'),
(112, 'Jersey', 'GBP', 'Pound Sterling'),
(113, 'Jordan', 'JOD', 'Jordanian Dinar'),
(114, 'Kazakhstan', 'KZT', 'Tenge'),
(115, 'Kenya', 'KES', 'Kenyan Shilling'),
(116, 'Kiribati', 'AUD', 'Australian Dollar'),
(117, 'Korea, Democratic People\'s Republic of', 'KPW', 'North Korean Won'),
(118, 'Korea, Republic of', 'KRW', 'Won'),
(119, 'Kuwait', 'KWD', 'Kuwaiti Dinar'),
(120, 'Kyrgyzstan', 'KGS', 'Som'),
(121, 'Lao People\'s Democratic Republic', 'LAK', 'Kip'),
(122, 'Latvia', 'EUR', 'Euro'),
(123, 'Lebanon', 'LBP', 'Lebanese Pound'),
(124, 'Lesotho', 'ZAR', 'Rand'),
(125, 'Liberia', 'LRD', 'Liberian Dollar'),
(126, 'Libya', 'LYD', 'Libyan Dinar'),
(127, 'Liechtenstein', 'CHF', 'Swiss Franc'),
(128, 'Lithuania', 'EUR', 'Euro'),
(129, 'Luxembourg', 'EUR', 'Euro'),
(130, 'Macao', 'MOP', 'Pataca'),
(131, 'Macedonia, the Former Yugoslav Republic of', 'MKD', 'Denar'),
(132, 'Madagascar', 'MGA', 'Malagasy Ariary'),
(133, 'Malawi', 'MWK', 'Kwacha'),
(134, 'Malaysia', 'MYR', 'Malaysian Ringgit'),
(135, 'Maldives', 'MVR', 'Rufiyaa'),
(136, 'Mali', 'XOF', 'CFA Franc BCEAO'),
(137, 'Malta', 'EUR', 'Euro'),
(138, 'Marshall Islands', 'USD', 'US Dollar'),
(139, 'Martinique', 'EUR', 'Euro'),
(140, 'Mauritania', 'MRO', 'Ouguiya'),
(141, 'Mauritius', 'MUR', 'Mauritius Rupee'),
(142, 'Mayotte', 'EUR', 'Euro'),
(143, 'Mexico', 'MXN', 'Mexican Peso'),
(144, 'Micronesia, Federated States of', 'USD', 'US Dollar'),
(145, 'Moldova, Republic of', 'MDL', 'Moldovan Leu'),
(146, 'Monaco', 'EUR', 'Euro'),
(147, 'Mongolia', 'MNT', 'Tugrik'),
(148, 'Montenegro', 'EUR', 'Euro'),
(149, 'Montserrat', 'XCD', 'East Caribbean Dollar'),
(150, 'Morocco', 'MAD', 'Moroccan Dirham'),
(151, 'Mozambique', 'MZN', 'Mozambique Metical'),
(152, 'Myanmar', 'MMK', 'Kyat'),
(153, 'Namibia', 'ZAR', 'Rand'),
(154, 'Nauru', 'AUD', 'Australian Dollar'),
(155, 'Nepal', 'NPR', 'Nepalese Rupee'),
(156, 'Netherlands', 'EUR', 'Euro'),
(157, 'New Caledonia', 'XPF', 'CFP Franc'),
(158, 'New Zealand', 'NZD', 'New Zealand Dollar'),
(159, 'Nicaragua', 'NIO', 'Cordoba Oro'),
(160, 'Niger', 'XOF', 'CFA Franc BCEAO'),
(161, 'Nigeria', 'NGN', 'Naira'),
(162, 'Niue', 'NZD', 'New Zealand Dollar'),
(163, 'Norfolk Island', 'AUD', 'Australian Dollar'),
(164, 'Northern Mariana Islands', 'USD', 'US Dollar'),
(165, 'Norway', 'NOK', 'Norwegian Krone'),
(166, 'Oman', 'OMR', 'Rial Omani'),
(167, 'Pakistan', 'PKR', 'Pakistan Rupee'),
(168, 'Palau', 'USD', 'US Dollar'),
(169, 'Palestine, State of', NULL, NULL),
(170, 'Panama', 'USD', 'US Dollar'),
(171, 'Papua New Guinea', 'PGK', 'Kina'),
(172, 'Paraguay', 'PYG', 'Guarani'),
(173, 'Peru', 'PEN', 'Nuevo Sol'),
(174, 'Philippines', 'PHP', 'Philippine Peso'),
(175, 'Pitcairn', 'NZD', 'New Zealand Dollar'),
(176, 'Poland', 'PLN', 'Zloty'),
(177, 'Portugal', 'EUR', 'Euro'),
(178, 'Puerto Rico', 'USD', 'US Dollar'),
(179, 'Qatar', 'QAR', 'Qatari Rial'),
(180, 'Romania', 'RON', 'New Romanian Leu'),
(181, 'Russian Federation', 'RUB', 'Russian Ruble'),
(182, 'Rwanda', 'RWF', 'Rwanda Franc'),
(183, 'Réunion', 'EUR', 'Euro'),
(184, 'Saint Barthélemy', 'EUR', 'Euro'),
(185, 'Saint Helena, Ascension and Tristan da Cunha', 'SHP', 'Saint Helena Pound'),
(186, 'Saint Kitts and Nevis', 'XCD', 'East Caribbean Dollar'),
(187, 'Saint Lucia', 'XCD', 'East Caribbean Dollar'),
(188, 'Saint Martin (French part)', 'EUR', 'Euro'),
(189, 'Saint Pierre and Miquelon', 'EUR', 'Euro'),
(190, 'Saint Vincent and the Grenadines', 'XCD', 'East Caribbean Dollar'),
(191, 'Samoa', 'WST', 'Tala'),
(192, 'San Marino', 'EUR', 'Euro'),
(193, 'Sao Tome and Principe', 'STD', 'Dobra'),
(194, 'Saudi Arabia', 'SAR', 'Saudi Riyal'),
(195, 'Senegal', 'XOF', 'CFA Franc BCEAO'),
(196, 'Serbia', 'RSD', 'Serbian Dinar'),
(197, 'Seychelles', 'SCR', 'Seychelles Rupee'),
(198, 'Sierra Leone', 'SLL', 'Leone'),
(199, 'Singapore', 'SGD', 'Singapore Dollar'),
(200, 'Sint Maarten (Dutch part)', 'ANG', 'Netherlands Antillean Guilder'),
(201, 'Slovakia', 'EUR', 'Euro'),
(202, 'Slovenia', 'EUR', 'Euro'),
(203, 'Solomon Islands', 'SBD', 'Solomon Islands Dollar'),
(204, 'Somalia', 'SOS', 'Somali Shilling'),
(205, 'South Africa', 'ZAR', 'Rand'),
(206, 'South Georgia and the South Sandwich Islands', NULL, NULL),
(207, 'South Sudan', 'SSP', 'South Sudanese Pound'),
(208, 'Spain', 'EUR', 'Euro'),
(209, 'Sri Lanka', 'LKR', 'Sri Lanka Rupee'),
(210, 'Sudan', 'SDG', 'Sudanese Pound'),
(211, 'Suriname', 'SRD', 'Surinam Dollar'),
(212, 'Svalbard and Jan Mayen', 'NOK', 'Norwegian Krone'),
(213, 'Swaziland', 'SZL', 'Lilangeni'),
(214, 'Sweden', 'SEK', 'Swedish Krona'),
(215, 'Switzerland', 'CHF', 'Swiss Franc'),
(216, 'Syrian Arab Republic', 'SYP', 'Syrian Pound'),
(217, 'Taiwan, Province of China', 'TWD', 'New Taiwan Dollar'),
(218, 'Tajikistan', 'TJS', 'Somoni'),
(219, 'Tanzania, United Republic of', 'TZS', 'Tanzanian Shilling'),
(220, 'Thailand', 'THB', 'Baht'),
(221, 'Timor-Leste', 'USD', 'US Dollar'),
(222, 'Togo', 'XOF', 'CFA Franc BCEAO'),
(223, 'Tokelau', 'NZD', 'New Zealand Dollar'),
(224, 'Tonga', 'TOP', 'Pa’anga'),
(225, 'Trinidad and Tobago', 'TTD', 'Trinidad and Tobago Dollar'),
(226, 'Tunisia', 'TND', 'Tunisian Dinar'),
(227, 'Turkey', 'TRY', 'Turkish Lira'),
(228, 'Turkmenistan', 'TMT', 'Turkmenistan New Manat'),
(229, 'Turks and Caicos Islands', 'USD', 'US Dollar'),
(230, 'Tuvalu', 'AUD', 'Australian Dollar'),
(231, 'Uganda', 'UGX', 'Uganda Shilling'),
(232, 'Ukraine', 'UAH', 'Hryvnia'),
(233, 'United Arab Emirates', 'AED', 'UAE Dirham'),
(234, 'United Kingdom', 'GBP', 'Pound Sterling'),
(235, 'United States', 'USD', 'US Dollar'),
(236, 'United States Minor Outlying Islands', 'USD', 'US Dollar'),
(237, 'Uruguay', 'UYU', 'Peso Uruguayo'),
(238, 'Uzbekistan', 'UZS', 'Uzbekistan Sum'),
(239, 'Vanuatu', 'VUV', 'Vatu'),
(240, 'Venezuela, Bolivarian Republic of', 'VEF', 'Bolivar'),
(241, 'Viet Nam', 'VND', 'Dong'),
(242, 'Virgin Islands, British', 'USD', 'US Dollar'),
(243, 'Virgin Islands, U.S.', 'USD', 'US Dollar'),
(244, 'Wallis and Futuna', 'XPF', 'CFP Franc'),
(245, 'Western Sahara', 'MAD', 'Moroccan Dirham'),
(246, 'Yemen', 'YER', 'Yemeni Rial'),
(247, 'Zambia', 'ZMW', 'Zambian Kwacha'),
(248, 'Zimbabwe', 'ZWL', 'Zimbabwe Dollar'),
(249, 'Åland Islands', 'EUR', 'Euro');

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
  `post_region` int(20) NOT NULL,
  `min_purchase_amount` int(20) NOT NULL,
  `max_purchase_amount` int(20) NOT NULL,
  `created_by` int(20) DEFAULT NULL,
  `post_slug` varchar(225) NOT NULL,
  `post_status` enum('1','2') NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cw_posts`
--

INSERT INTO `cw_posts` (`_id`, `product_id`, `post_title`, `post_image`, `post_content`, `post_region`, `min_purchase_amount`, `max_purchase_amount`, `created_by`, `post_slug`, `post_status`, `created_date`) VALUES
(1, 1, 'post title1', 'mutualFunds1.png', 'testing', 1, 500, 10000, 3, 'post', '1', '2023-02-26 16:22:11'),
(2, 3, 'post title3', 'Image Content3', 'intrade trading', 1, 500, 2000, 3, 'intrade', '1', '2023-02-27 05:29:20'),
(3, 4, 'post title4', 'Image Content4', 'Bitcoin', 1, 100, 30000, 3, 'bitcoin', '1', '2023-04-04 22:41:54'),
(4, 5, 'post title5', 'Image Content5', 'Shares', 1, 150, 50000, 3, 'shares', '', '2023-04-04 22:43:37'),
(5, 2, 'post title2', 'Image Content2', 'Stocks', 1, 300, 40000, 3, 'stocks', '1', '2023-04-04 22:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`_id`, `activity`, `created_date`) VALUES
(1, 'Neha(client) chatted with Sreehari(RM)', '2023-03-20 17:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`_id`, `user_id`, `message`) VALUES
(1, 4, 'You got a new post'),
(2, 4, 'New post');

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
(1, 1, 'Treasury Bond', 'treasuryBond.png', 5000, 50000, 'treasury bond', 'treasury bond', '1', '2023-02-26 04:32:10', '2023-02-26 04:32:10'),
(2, 2, 'Stocks', 'stocks1.png', 100, 100000, 'Intrade', 'Intrade', '1', '2023-02-26 04:32:55', '2023-02-26 04:32:55'),
(3, 3, 'Tax Saver MF', 'taxSaverMf.png', 100, 1000, 'mutual funds', 'tax saving', '1', '2023-03-10 17:18:14', '2023-03-10 17:18:14'),
(4, 4, 'Bitcoin', 'bitcoin.png', 2000, 100, 'Bitcoin', 'bitcoin', '1', '2023-04-04 22:32:58', '2023-04-04 22:32:58'),
(5, 5, 'Shares', 'realEstate.png', 15000, 120, 'Shares', 'shares', '1', '2023-04-04 22:36:06', '2023-04-04 22:36:06');

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
(1, 'Bond', 'Content Image1', '1'),
(2, 'Equity', 'Content Image2', '1'),
(3, 'Mutual Fund', 'Content Image3', '1'),
(4, 'Cryptocurrencies', 'Content Image4', '1'),
(5, 'Real Estate Investment Trusts (REITs)', 'Content Image5', '1');

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
(3, 3, 1, '0', '2023-03-06 16:26:21');

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
(1, 4, 4),
(2, 5, 2),
(3, 1, 2);

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
(1, 'sreehari', 's', 'admin@gmail.com', '9497126857', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '1', '12345', '1', '2023-02-26 00:22:27', '2023-02-26 00:22:27'),
(2, 'Kiran', 'r', 'rm@gmail.com', '8921995853', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '2', '3456', '1', '2023-02-26 04:03:38', '2023-02-26 04:03:38'),
(3, 'Amal', 'm', 'cw@gmail.com', '854216952', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '3', '8456', '1', '2023-02-27 05:08:43', '2023-02-27 05:08:43'),
(4, 'Neha', 'S', 'client@gmail.com', '854216888', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '4', '8411', '1', '2023-02-27 05:08:43', '2023-02-27 05:08:43'),
(5, 'Jack', 'Thomas', 'client1@gmail.com', '07589767718', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '4', '4332', '1', '2023-03-08 01:44:10', '2023-03-08 01:44:10'),
(7, 'Merry', 'Watson', 'rm1@gmail.com', '07689771221', '$2y$16$81x5jTTM6zXJ6VW.qb5WIeW7WKmiqvALWgSrb5zIQWiEKIw26ih7S', '2', '5322', '1', '2023-03-09 23:23:48', '2023-03-09 23:23:48');

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
  `image` text NOT NULL,
  `bio` text DEFAULT NULL,
  `user_country` int(20) DEFAULT NULL,
  `user_created_date` datetime NOT NULL,
  `user_last_updated _on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`_id`, `user_id`, `user_products_ids`, `user_min_purchase_power`, `user_max_purchase_power`, `image`, `bio`, `user_country`, `user_created_date`, `user_last_updated _on`) VALUES
(1, 2, '3', '500', '2000', '', 'I am expertise in  Mutual Funds', 1, '2023-02-26 04:29:41', '2023-02-26 04:29:41'),
(2, 1, '4', '100', '10000', '', 'I am blog writer', 1, '2023-02-26 17:58:50', '2023-02-26 17:58:50'),
(3, 3, '3', '100', '100000', '', 'I am the super user for this app', 1, '2023-02-27 05:17:25', '2023-02-27 05:17:25'),
(4, 4, '3', '500', '2000', '', 'I am  interested in investing in Mutual Funds', 1, '2023-02-28 05:17:25', '2023-02-28 05:17:25'),
(5, 5, '4', '500', '1000', '', 'I am interested in investing in Bitcoin', 1, '2023-03-08 01:55:24', '2023-03-08 01:55:24'),
(6, 7, '4', '100', '10000', '', 'I am expertise in  Bitcoin', 1, '2023-03-10 00:07:00', '2023-03-10 00:07:00');

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cw_posts`
--
ALTER TABLE `cw_posts`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `read_post`
--
ALTER TABLE `read_post`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rm_sentpost`
--
ALTER TABLE `rm_sentpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
