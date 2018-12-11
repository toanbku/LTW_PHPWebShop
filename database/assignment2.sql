-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 08:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'women'),
(2, 'men'),
(3, 'bag'),
(4, 'shoes'),
(5, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `content` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `content`, `percent`) VALUES
(1, 'VNVODICH', 100);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `transaction_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`transaction_id`, `user_id`, `total_cost`, `status`, `created`) VALUES
('87d4205e3a88759064642518c9124451', 5, 425.79, 'Pending', '2018-12-11 19:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `kind` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='products that can be added to cart';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `kind`, `created`, `modified`) VALUES
(1, 'Lightweight Jacket', 'Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.', '58.79', '1', '2018-12-04 15:36:18', '2018-12-04 15:36:18'),
(27, 'San Antonio Spurs Kawhi Leonard #2 \nAdidas Black T-Shirt', '&lt;p&gt;Kawhi Leonard San Antonio Spurs T shirt, made by Adidas the official on court producers of NBA apparel and jerseys.&lt;/p&gt;\r\n&lt;p&gt;Leonard and 2 are printed on the back in authentic font.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Basic Print&lt;/li&gt;\r\n&lt;li&gt;Officially licensed NBA Product&lt;/li&gt;\r\n&lt;li&gt;NBA Hologram Sticker&lt;/li&gt;\r\n&lt;li&gt;Mens Sizing&lt;/li&gt;\r\n&lt;li&gt;100% Cotton&lt;/li&gt;\r\n&lt;li&gt;Adidas &quot;Go To Tee&quot;&lt;/li&gt;\r\n&lt;/ul&gt;', '99.99', '2', '2016-10-28 20:49:40', '2016-10-28 05:49:40'),
(28, 'LaMarcus Aldridge San Antonio Spurs NBA Adidas Player Black T-Shirt', '&lt;p&gt;Looks like a jersey, wears like a tee -- this 100% cotton Adidas NBA player name and number t-shirt sports screen prints of your favorite player\'s name and number, plus team graphics on the chest.&lt;/p&gt;\r\n&lt;p&gt;Officially licensed by the NBA.&lt;/p&gt;', '49.99', '3', '2016-10-28 20:52:43', '2016-10-28 05:52:43'),
(29, 'Tim Duncan San Antonio Spurs Jersey Name and Number T-Shirt', '&lt;p&gt;Cheer on Tim Duncan and the Spurs as they begin their road to repeating as NBA champions.&lt;/p&gt;\r\n&lt;p&gt;Show your support for Duncan and the San Antonio Spurs in your very own black Spurs Name and Number Tee.&lt;/p&gt;', '39.99', '4', '2016-10-28 20:56:23', '2016-10-28 05:56:23'),
(30, 'Women\'s Customized San Antonio Spurs Black Replica Basketball Jersey', '&lt;p&gt;San Antonio Spurs Custom Jerseys with any name and number.&lt;/p&gt;\r\n&lt;p&gt;Choose the style and size.&lt;/p&gt;\r\n&lt;p&gt;There\'s no better way to prove your loyalty than to make this jersey your own.&lt;/p&gt;', '45.99', '5', '2016-10-28 20:58:02', '2016-10-28 05:58:02'),
(31, 'Klay Thompson Golden State Warriors Jersey Name and Number T-Shirt', '&lt;p&gt;It\'s Splash Time!&lt;/p&gt;\r\n&lt;p&gt;Make sure to show your support for the second half of the splash bros and get your very own Warriors Name and Number Tee.&lt;/p&gt;', '29.99', '1', '2016-10-28 20:59:20', '2016-10-28 05:59:20'),
(32, 'Stephen Curry Golden State Warriors #30 NBA Youth Climalite Player T-Shirt Blue', '&lt;p&gt;Featuring your favorite player\'s name and number on back with team logo at front, this Climalite polyester t-shirt provides the ultimate display of pride for a die-hard fan!&lt;/p&gt;', '29.99', '1', '2016-10-28 21:03:19', '2016-10-28 06:03:19'),
(33, 'Adidas Men\'s NBA Golden State Warriors-Kevin Durant #35-Mesh Logo T-Shirt', '&lt;p&gt;Show off how excited you are to welcome Kevin Durant to you Golden State Warriors with this Mesh Logo Tee from adidas.&lt;/p&gt;\r\n&lt;p&gt;It features cool graphics made from jersey like mesh and has KD\'s name and number on the back.&lt;/p&gt;\r\n&lt;p&gt;A great look, whether you\'re at the game, or a friends house watching the new look Warriors.&lt;/p&gt;', '29.99', '1', '2016-10-28 21:05:30', '2016-10-28 06:05:30'),
(34, 'Klay Thompson Golden State Warriors Charcoal Chinese New Year Name and Number T-shirt', '&lt;p&gt;Cheer on Klay all the way to the NBA Finals in style with this unique Chinese New Year Jersey Name and Number t-shirt by adidas.&lt;/p&gt;', '29.99', '2', '2016-10-28 21:06:34', '2016-10-28 06:06:34'),
(35, 'Kevin Durant #35 Women\'s Replica Name and Number Short Sleeve', '&lt;p&gt;Let everyone know who you will be cheering for this season in the adidas U Series high density name &amp;amp; number tee.&lt;/p&gt;\r\n&lt;p&gt;Adidas is the official outfitter of the NBA and this tee is the authentic take down name &amp;amp; number tee of your MVP.&lt;/p&gt;\r\n&lt;p&gt;A high density screen print on a soft cotton tee is a must have for every true NBA fan.&lt;/p&gt;', '32.24', '2', '2016-10-28 21:08:05', '2016-10-28 06:08:05'),
(36, 'LeBron James Men\'s Navy Cleveland Cavaliers adidas Swingman Jersey', '&lt;p&gt;Prove you are the #1 LeBron James fan with this Swingman jersey from adidas!&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;This Swingman is the ultimate Cleveland Cavaliers jersey. Whether it\'s going to the game, spending time with your friends or anything in-between - this jersey does it all.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The Swingman includes adidas Climacool &amp;reg; performance mesh fabrication and one layer twill wordmark, name &amp;amp; number applications.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;The NBA Swingman jersey - the most authentic Swingman ever made.&lt;/p&gt;', '109.93', '2', '2016-10-28 21:08:52', '2016-10-28 06:08:52'),
(37, 'NBA Cleveland Cavaliers Kyrie Irving #2 Men\'s Replica Jersey', '&lt;p&gt;Detailed to look like a real NBA jersey and priced to make you cheer!&lt;/p&gt;\r\n&lt;p&gt;This quality NBA Adidas Replica Revolution Jersey features screen printed team graphic, screen printed player name and number on the front and back, tagless collar, and embroidered Adidas and NBA logo\'s on the front.&lt;/p&gt;\r\n&lt;p&gt;This new style Adidas replica jersey is made of breathable, easy-care 100% polyester with Clima Cool fabrication. Officially licensed by the NBA.&lt;/p&gt;', '46.99', '2', '2016-10-28 21:09:44', '2016-10-28 06:09:44'),
(38, 'Kevin Love Cleveland Cavaliers #0 NBA Youth Road Jersey Wine', '&lt;p&gt;Detailed to look like a real NBA jersey, sized for a youth, and priced to make you cheer!&lt;/p&gt;\r\n&lt;p&gt;This quality NBA Adidas Replica Jersey features screen printed team graphic, screen printed player name and number on the front and back, tagless collar, and embroidered Adidas and NBA logo\'s on the front.&lt;/p&gt;\r\n&lt;p&gt;Perfect for your child or for gift giving. Made of breathable, easy-care 100% polyester with Clima Cool fabrication. Officially licensed by the NBA.', '29.99', '3', '2016-10-28 21:46:06', '2016-10-28 06:46:06'),
(40, 'For Mens San Antonio Spurs Kawhi Leonard #2 Cream White Christmas Day Swingman Basketball Jersey', '&lt;p&gt;This is 100% mesh polyester breathable and quick-dry jersey.&lt;/p&gt;\r\n&lt;p&gt;Player name and number graphics deliver classic style. priced to make you cheer.&lt;/p&gt;\r\n&lt;p&gt;It will be the best gift for you or your friend and family.&lt;/p&gt;', '32.00', '3', '2016-11-02 20:15:38', '2016-11-02 05:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='image files related to a product';

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
(105, 1, 'product-detail-01.jpg', '2018-12-05 10:38:00', '2018-12-04 15:38:41'),
(106, 1, 'product-detail-02.jpg', '2018-12-04 15:39:12', '2018-12-04 15:39:12'),
(107, 1, 'product-detail-03.jpg', '2018-12-04 15:39:36', '2018-12-04 15:39:36'),
(83, 30, 'p41.jpg', '2016-10-28 20:58:02', '2016-10-28 05:58:02'),
(82, 29, 'p32.jpg', '2016-10-28 20:56:23', '2016-10-28 05:56:23'),
(81, 29, 'p31.jpg', '2016-10-28 20:56:23', '2016-10-28 05:56:23'),
(80, 28, 'p22.jpg', '2016-10-28 20:52:43', '2016-10-28 05:52:43'),
(79, 28, 'p21.jpg', '2016-10-28 20:52:43', '2016-10-28 05:52:43'),
(77, 27, 'p11.jpg', '2016-10-28 20:49:40', '2016-10-28 05:49:40'),
(78, 27, 'p12.jpg', '2016-10-28 20:49:40', '2016-10-28 05:49:40'),
(84, 31, 'p51.jpg', '2016-10-28 20:59:20', '2016-10-28 05:59:20'),
(85, 31, 'p52.jpg', '2016-10-28 20:59:20', '2016-10-28 05:59:20'),
(86, 32, 'p61.jpg', '2016-10-28 21:03:19', '2016-10-28 06:03:19'),
(87, 32, 'p62.jpg', '2016-10-28 21:03:19', '2016-10-28 06:03:19'),
(89, 33, 'p71.jpg', '2016-10-28 21:05:30', '2016-10-28 06:05:30'),
(90, 33, 'p72.jpg', '2016-10-28 21:05:30', '2016-10-28 06:05:30'),
(91, 34, 'p81.jpg', '2016-10-28 21:06:34', '2016-10-28 06:06:34'),
(92, 34, 'p82.jpg', '2016-10-28 21:06:34', '2016-10-28 06:06:34'),
(93, 34, 'p83.jpg', '2016-10-28 21:06:34', '2016-10-28 06:06:34'),
(94, 35, 'p91.jpg', '2016-10-28 21:08:05', '2016-10-28 06:08:05'),
(95, 35, 'p92.jpg', '2016-10-28 21:08:05', '2016-10-28 06:08:05'),
(96, 36, 'p101.jpg', '2016-10-28 21:08:52', '2016-10-28 06:08:52'),
(97, 36, 'p102.jpg', '2016-10-28 21:08:52', '2016-10-28 06:08:52'),
(98, 36, 'p103.jpg', '2016-10-28 21:08:52', '2016-10-28 06:08:52'),
(99, 37, 'p111.jpg', '2016-10-28 21:09:44', '2016-10-28 06:09:44'),
(100, 37, 'p112.jpg', '2016-10-28 21:09:44', '2016-10-28 06:09:44'),
(101, 37, 'p113.jpg', '2016-10-28 21:09:44', '2016-10-28 06:09:44'),
(102, 38, 'p121.jpg', '2016-10-28 21:46:06', '2016-10-28 06:46:06'),
(103, 38, 'p122.jpg', '2016-10-28 21:46:06', '2016-10-28 06:46:06'),
(104, 40, 'p131.jpg', '2016-11-02 20:15:38', '2016-11-02 05:15:38'),
(51, 14, 'gardman-r687-4-tier-mini-greenhouse-1.jpg', '0000-00-00 00:00:00', '2015-03-19 01:45:42'),
(52, 14, 'gardman-r687-4-tier-mini-greenhouse-2.jpg', '0000-00-00 00:00:00', '2015-03-19 01:45:42'),
(53, 15, 'spalding-nba-street-basketball-1.jpg', '0000-00-00 00:00:00', '2015-03-19 01:48:34'),
(54, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-1.jpg', '0000-00-00 00:00:00', '2015-03-19 02:02:25'),
(55, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-2.jpg', '0000-00-00 00:00:00', '2015-03-19 02:02:25'),
(56, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-3.jpg', '0000-00-00 00:00:00', '2015-03-19 02:02:25'),
(57, 16, 'bandai-hobby-thousand-sunny-model-ship-one-piece-grand-ship-collection-4.jpg', '0000-00-00 00:00:00', '2015-03-19 02:02:25'),
(59, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-2.jpg', '0000-00-00 00:00:00', '2015-03-19 02:07:20'),
(73, 17, '29097235540_b2fefed80d_k.jpg', '2016-09-17 22:01:17', '2016-09-17 07:01:17'),
(74, 25, '14194449_1363884933625826_1306807357_n.jpg', '2016-09-18 01:03:15', '2016-09-17 10:03:15'),
(61, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-4.jpg', '0000-00-00 00:00:00', '2015-03-19 02:07:20'),
(71, 17, 'bandai-tamashii-nations-nami-new-world-ver-one-piece-figuartszero-bandai-tamashii-nations-5.jpg', '2016-08-17 15:53:17', '2016-08-17 00:53:17'),
(67, 19, 'products.jpg', '0000-00-00 00:00:00', '2015-03-25 20:29:34'),
(69, 20, 'tp-link-mr3420-2.jpg', '2016-08-08 14:12:59', '2016-08-07 23:12:59'),
(70, 21, 'd-link-universal-modem.jpg', '2016-08-08 14:24:19', '2016-08-07 23:24:19'),
(75, 25, '29097235540_b2fefed80d_k.jpg', '2016-09-18 01:03:15', '2016-09-17 10:03:15'),
(76, 20, 'aaa.png', '2016-10-13 16:31:58', '2016-10-13 01:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_pass_identity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `email`, `forgot_pass_identity`, `firstName`, `lastName`, `type`, `modified`) VALUES
(5, 'root', '25d55ad283aa400af464c76d713c07ad', 'root@gmail.com', '', 'Nguyens', 'CÃ´ng Phuong1', 2, '2018-12-11 20:41:49'),
(6, 'toan', 'e10adc3949ba59abbe56e057f20f883e', 'toanbku@gmail.com', 'fb7a2fbae3c9d598cb2e905ffdbb5096', 'Nguyá»…n PhÆ°Æ¡ng', 'VÆ°Æ¡ng', 1, '2018-12-11 19:23:15'),
(14, 'aaa', 'e10adc3949ba59abbe56e057f20f883e', 'aa@gmail.com', '', 'Ho', 'Quang Toan', 1, '0000-00-00 00:00:00'),
(18, 'phuongvuong', 'e10adc3949ba59abbe56e057f20f883e', 'phuongvuong@gmail.com', '', 'Phuong', 'Vuong', 1, '0000-00-00 00:00:00'),
(19, 'vana', 'e10adc3949ba59abbe56e057f20f883e', 'asssa@gmail.com', '', 'Nguyá»…n VÄƒn', 'ToÃ n1', 1, '2018-12-11 19:20:03'),
(20, 'hcmut', 'e10adc3949ba59abbe56e057f20f883e', '1613594@hcmut.edu.vn', '0fc2388693f5b78b6baa1c7bf55d502a', 'Quang', 'Toan', 1, '2018-12-11 18:19:08'),
(21, 'viethung', 'e10adc3949ba59abbe56e057f20f883e', 'viethungcse@gmail.com', '', 'Nguyen', 'Viet Hung', 1, '0000-00-00 00:00:00'),
(22, 'thib', '827ccb0eea8a706c4c34a16891f84e7b', 'tranthib@gmail.com', '', 'Tran', 'Thi B', 1, '0000-00-00 00:00:00'),
(23, 'thic', 'e10adc3949ba59abbe56e057f20f883e', 'thic@gmail.com', '', 'Phan Thi', 'CC', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
