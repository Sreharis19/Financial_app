-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 07:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
(1, 2, 2, 4, 'Hii', '2023-04-17 17:11:38'),
(2, 2, 2, 4, 'Would you like to know more about this !', '2023-04-17 17:12:02'),
(3, 2, 4, 2, 'Hello', '2023-04-17 17:12:49'),
(4, 2, 4, 2, 'I would like to know more on this', '2023-04-17 17:12:54');

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
  `replied_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `comments`, `admin_reply`, `created_on`, `replied_on`) VALUES
(1, 1, 'couldn\'t acess chat', 'try reloading the website', '2023-02-27 03:21:32', '2023-02-27 03:20:42'),
(2, 1, 'Cant see list', '', '2023-02-27 03:46:18', NULL),
(4, 3, 'Getting error message', '', '2023-02-27 11:02:27', NULL),
(9, 4, 'Couldn\'t accesss login', '', '2023-03-27 16:43:22', NULL),
(12, 4, 'Unable to select product', '', '2023-04-17 17:29:26', '2023-04-17 17:29:26'),
(13, 2, 'issue', '', '2023-04-17 17:38:48', '2023-04-17 17:38:48');

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
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cw_posts`
--

INSERT INTO `cw_posts` (`_id`, `product_id`, `post_title`, `post_image`, `post_content`, `post_region`, `min_purchase_amount`, `max_purchase_amount`, `created_by`, `post_slug`, `post_status`, `created_date`) VALUES
(1, 1, 'Mutual Funds: What They Are and How to Invest', 'mutualFunds1.png', 'Mutual funds definition\nMutual funds are companies that pool money from investors to purchase stocks, bonds and other assets. Mutual funds create a more diversified portfolio than most investors could on their own. \"Mutual funds\" are a category that include index funds, bond funds and target-date funds.\n\nMutual fund investors don’t directly own the stock or other investments held by the fund, but they do share equally in the profits or losses of the fund’s total holdings — hence the “mutual” in mutual funds.\n\n» NerdWallet\'s roundup of the best brokers for mutual funds\n\nWhy invest in mutual funds?\nMutual funds are a relatively hands-off way to invest in many different assets at once — within a single mutual fund, you could gain exposure to hundreds of stocks, bonds or other investments. Mutual funds are popular among investors who don\'t want to pick and choose individual investments themselves, but want to benefit from the stock market\'s historically high average annual returns.\n\nActive vs. passive mutual funds\nA mutual fund\'s fees and performance will depend on whether it is actively or passively managed.\n\nPassively managed funds invest to align with a specific benchmark. They try to match the performance of a market index (such as the S&P 500), and therefore typically don’t require management by a professional. That translates into lower overhead for the fund, which means passive mutual funds often carry lower fees than actively managed funds.\n\nTypes of mutual funds for passive investing\nHere are two types of mutual funds popular for passive investing:\n\nIndex funds are made up of stocks or bonds that are listed on a particular index, so the risk aims to mirror the risk of that index, as do the returns. If you own an S&P 500 index fund and you hear that the S&P 500 was up 3% for the day, that means your index fund should be up about that much, too.\n\nExchange-traded funds can be traded like individual stocks, but offer the diversification benefits of mutual funds. In many cases, ETFs will have a lower minimum investment than index funds. ETFs may be more tax-efficient than index funds.\n\nActively managed funds have a professional manager or management team making decisions about how to invest the fund\'s money. Often, they try to outperform the market or a benchmark index, but studies have shown passive investing strategies often deliver better returns.', 1, 500, 10000, 3, 'post', '1', '2023-02-26 16:22:11'),
(2, 3, 'Intraday Trading Tips, Strategies & Basic Rules', 'trading.png', 'Intraday trading is riskier than investing in the regular stock market. Most traders, especially beginners, lose money in intraday trading because of the high volatility of the stock markets. Convention says that one should not risk over two per cent of their total trading capital on a single trade to ensure the right risk management in intraday trading. It is important, especially for beginners, to understand the basics of such trading to avoid losses – the risk of ignorance is greater than the market risk itself.\n\nTips for Intraday Trading\nBelow are a few tips for intraday trading in Indian share market which will help investors in making the right decision:\n\nChoose Two or Three Liquid Shares\nIntraday trading involves squaring open positions before the end of the trading session. This is why it is recommended to choose two or three large-cap shares that are highly liquid. Investing in mid-size or small-caps can result in the investor having to hold these shares because of low trading volumes.\n\nDevelop an informed short-term trajectory beforehand and stick to it\nFollowing points are essential pieces of a short term trajectory:\n\nDetermine your entry level and target price beforehand. It is common for a person’s psychology to change after purchasing the shares. As a result, you may sell even if the price sees a nominal increase. Due to this, you may lose the opportunity to take advantage of higher gains because of the price increase.\nBook your profits once the target is reached. Uninformed greed may drive you to keep a stock beyond the necessary time-frame and increase the risk of a fall in prices. If you insist on staying on, make sure you readjust a stop-loss price to meet the new expectations.\nStop loss is a trigger that is used to automatically sell the shares if the price falls below a specified limit. For investors who have used short-selling, stop loss reduces loss in case the price rises beyond their expectations.\n\nRealign your strategy for intraday trading (as opposed to long-term investment)\nValue investment adopts fundamentals while the former considers the technical details. It is common for day traders to take delivery of shares in case the target price is not met. He or she then waits for the price to recover to earn back his or her money. This is not recommended because the stock may not be worthy of investing, as it was purchased only for a shorter duration.\n\nResearch Your Wishlist Thoroughly\nInvestors are advised to include 8 to 10 shares in their wish lists and research these in depth. Knowing about corporate events, such as mergers, bonus dates, stock splits, dividend payments, etc., along with their technical levels is important. Using the Internet for finding resistance and support levels will also be beneficial. Ofcourse, researching the fundamental concepts and jargon of the stock market is necessary.\n', 1, 500, 2000, 3, 'intrade', '1', '2023-02-27 05:29:20'),
(3, 4, 'What Type of Crypto Investor are You? Best Trading Strategies of 2023', 'bitcoin1.png', 'It’s natural to see big price swings for \ncrypto assets\n, but sustaining prolonged losses usually isn’t a good sign for any investment.\n\nBe wary of new arrivals to the cryptocurrency space. Although many investors are drawn to new projects, do your own research before \ninvesting\n your hard-earned dollars. Unfortunately, scams regularly pop up on the market, so it\'s important to scrutinize every project and rule out ones that show red flags regarding their credibility or trustworthiness.\n\n\nWhen you go all-in on a particular coin, it’s a good idea not to overextend yourself. Even the most reputable \ncryptocurrencies\n like Bitcoin and ETH are very volatile against fiat currencies like the dollar. If possible, don’t invest money that you might need in the near future.\n\nAlso, setting your investment goals before you enter the market is a good idea. Of course, buying low and selling high is generally a good plan. But if you\'re jumping into a single crypto asset, map out your \nlong-term strategy\n.\n\nAre you planning to hold it for the long term? Or just until your portfolio hits a specific number? You can put these goals into practice by using platforms like Kraken to set a stop loss price or how much profit to take once a certain price is reached.\n\n\n\n\nInvesting in ICOs\nAn ICO (Initial Coin Offering) is like an Initial Public Offering (IPO) where investors in a crypto project receive a token instead of stock in a company. Typically, ICOs are used to raise funds for a crypto project by selling their native token to early supporters at a very low price—usually denominated in popular coins like BTC or ETH. \n\nThis opportunity to get in early could pay off in the long run. For example, Ethereum’s 2014 ICO raised several million dollars over the launch period. But it’s important to be on the lookout for scams, as some ICOs have gotten away with millions of dollars. For example, Modern Tech’s ICO got away with $660 million in ICO earnings while investors got practically nothing. \n\nReading the whitepaper is one way to root out potential scams. Dive into the document\'s details and try spotting anything that doesn’t add up. Doing your research on the founders can go a long way to protect your investments.\n\nHunting for microcap altcoins\nBeginner investors tend to get started with well-known tokens, but the hunt for microcap altcoins can be lucrative if you find a winner.\n\nTypically, microcap altcoins have a small market capitalization in the range of $50 million or less. If you\'re able to invest in a popular microcap coin early, it’s possible to see a major upswing in your investment. A few examples include Modefi and Argello.\n\nHowever, there are risks tied to investing in smaller coins. Some compare microcap coins to the penny \nstocks\n of the crypto world. Though it’s possible to make a profit, it’s not always easy to distinguish winners from losers, which can make it feel like a gamble. If you\'re planning to buy and hold for the long term, that could backfire if the coin turns out to be a bust.\n\nTrading popular narratives\nAs you build your portfolio in any asset class, paying attention to popular trading narratives can pay off, and there are plenty of opinions out there. One popular trading narrative is that Ethereum is deflationary after the merge, but this is still debated by the community.', 1, 100, 30000, 3, 'bitcoin', '1', '2023-04-04 22:41:54'),
(4, 5, '10 best long-term investments in April 2023', 'shares.png', 'One of the best ways to secure your financial future is to invest, and one of the best ways to invest is over the long term. It may have been tempting over the past few years to deviate from a long-term approach and chase quick returns. But it’s more important than ever to focus on investing for the long haul while sticking to your game plan.\n\nInvestors today have many ways to invest their money and can choose the level of risk that they’re willing to take to meet their needs. You can opt for very safe options such as a certificate of deposit (CD) or dial up the risk – and the potential return! – with investments such as stocks, mutual funds or ETFs.\n\nIn fact, stocks were Americans’ second-most popular choice for long-term investments, behind only real estate, according to a recent Bankrate survey. Both categories feature prominently in the list below.\n\n\nOr you can do a little of everything, diversifying your portfolio so that it tends to do well in almost any investment environment.\n\nNeed expert guidance when it comes to managing your investments or planning for retirement?\n\nBankrate’s AdvisorMatch can connect you to a CFP® professional to help you achieve your financial goals.\n\nOverview: Top long-term investments in April 2023\n1. Growth stocks\nOverview: In the world of stock investing, growth stocks are the Ferraris. They promise high growth and along with it, high investment returns. Growth stocks are often tech companies, but they don’t have to be.\n\nThey generally plow all their profits back into the business, so they rarely pay out a dividend, at least not until their growth slows.\n\nWho are they good for?: If you’re going to buy individual growth stocks, you’ll want to analyze the company carefully, and that can take a lot of time.\n\nAnd because of the volatility in growth stocks, you’ll want to have a high risk tolerance or commit to holding the stocks for at least three to five years.\n\nRisks: Growth stocks can be risky because often investors will pay a lot for the stock relative to the company’s earnings.\n\nSo when a bear market or a recession arrives, these stocks can lose a lot of value very quickly. It’s like their sudden popularity disappears in an instant. However, growth stocks have been some of the best performers over time.\n\n\nRewards: The world’s biggest companies – the Alphabets and the Amazons – have been high-growth companies, so the reward is potentially limitless if you can find the right company.\n\nWhere to get them: You can purchase them at any online broker that offers stock trading.\n\n2. Stock funds\nOverview: A stock fund contains a collection of stocks, often unified by a specific theme or categorization, such as American stocks or large stocks. The fund company charges a fee for this product, but it can be very low.\n\nWho are they good for?: If you’re not quite up for spending the time and effort analyzing individual stocks, then a stock fund – either an ETF or a mutual fund – can be a great option.\n\nA stock fund is an excellent choice for an investor who wants to be more aggressive by using stocks but doesn’t have the time or desire to make investing a full-time hobby.\n\nRisks: A stock fund is less risky than buying individual positions and less work, too.\n\nBut it can still move quite a bit in any given year, perhaps losing as much as 30 percent or even gaining 30 percent in some of its more extreme years.\n\nIf you buy a fund that’s not broadly diversified – for example, a fund based on one industry – be aware that your fund will be less diversified than one based on a broad index such as the S&P 500. So if you purchased a fund based on the chemicals industry, it may have a lot of exposure to oil prices. If oil prices rise, then it’s likely that many of the stocks in the fund could take a hit.\n\nRewards: A stock fund is going to be less work to own and follow than individual stocks, but because you own more companies – and not all of them are going to excel in any given year – your returns should be more stable. With a stock fund, you’ll also have plenty of potential upside. Here are some of the best index funds.\n\nIf you buy a broadly diversified fund – such as an S&P 500 index fund or a Nasdaq-100 index fund – you’re going to get many high-growth stocks as well as many others. But you’ll have a diversified and safer set of companies than if you own just a few individual stocks.\n\nBy buying a stock fund, you’ll get the weighted average return of all the companies in the fund, so the fund will generally be less volatile than if you had held just a few stocks.\n\nWhere to get them: You can purchase them at virtually any online broker that offers ETF and mutual funds.', 1, 150, 50000, 3, 'shares', '', '2023-04-04 22:43:37'),
(5, 2, '3 investment ideas for a Stocks and Shares ISA', ' realEstate.png', 'A chance to beat the market\nAn alternative to tracker funds is actively-managed funds. These also provide diversified exposure to the stock market. However, unlike tracker funds, they’re managed by portfolio managers. These investment professionals aim to beat the market over time by picking individual stocks for their funds.\n\nAn advantage of investing in these funds is that it’s possible to achieve higher returns than the broader stock market.\n\nThe main disadvantage is the fees. Generally speaking, fees for actively-managed products are considerably higher than those for tracker funds.\n\nOne fund I hold in high regard is Fundsmith Equity. It’s a global equity fund managed by Terry Smith. It has a great track record having returned about 16% per year since its inception in late 2010 (versus 11% for the stock market). Past performance isn’t an indicator of future performance though. Over the last year, it’s only returned about 4%.\n\nEven higher returns?\nA third idea is investing in individual stocks. Now this approach is riskier than investing in tracker funds or actively-managed products. When buying individual stocks, an investor has more exposure to individual company risks.\n\nHowever, on the flip side, the rewards can be bigger. Pick the right stocks, and the returns can be very impressive.\n\nFor example, investing £5,000 in London Stock Exchange Group 10 years ago, would now equate to around £31,000 (plus dividends). Investing $5,000 in Tesla (which is listed in the US) a decade ago would now amount to about $380,000.\n\n\n1M\n\n\nNow, not every stock is going to perform like these. For every London Stock Exchange Group or Tesla, there are plenty of stocks that have tanked over the last decade.\n\nThe key to this investment approach therefore, is diversification. By investing in a variety of stocks across different industries and markets, investors can set themselves up for success.\n\nDon’t miss this top growth pick for the ‘cost of living crisis’\nWhile the media raves about Google and Amazon, this lesser-known stock has quietly grown 880% – with a:\n\nGreater than 20X increase in margins\nNearly 60% compounded revenue growth over 5 years – more than Apple, Amazon and Google!\nA 3,000% earnings explosion\nOf course, past performance is no guarantee of future results. However, we think it’s stronger now than ever before. Amazingly, you may never have heard of this company.\n\nYet there’s a 1-in-3 chance you’ve used one of its 250 brands. Many are household names with millions of monthly website visitors, and that often help consumers compare items, shop around and save.\n\nNow, as the ‘cost of living crisis’ bites, we believe its influence could soar. And that might bring imminent new gains to investors who’re in position today. So please, don’t leave without your FREE report, ‘One Top Growth Stock from The Motley Fool’.\n\nClaim your FREE copy now\n\nShould you invest, the value of your investment may rise or fall and your capital is at risk. Before investing, your individual circumstances should be assessed. Consider taking independent financial advice.', 1, 300, 40000, 3, 'stocks', '1', '2023-04-04 22:44:51');

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
  `product_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `product_updated_on` datetime NOT NULL DEFAULT current_timestamp()
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
(3, 1, 2),
(4, 2, 4);

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
  `user_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_updated _on` datetime NOT NULL DEFAULT current_timestamp()
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
  `user_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_updated _on` datetime NOT NULL DEFAULT current_timestamp()
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
  MODIFY `_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `rm_sentpost`
--
ALTER TABLE `rm_sentpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
