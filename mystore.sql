-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 06:15 PM
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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Brands_id` int(11) NOT NULL,
  `Brands_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brands_id`, `Brands_title`) VALUES
(1, 'Omega'),
(2, 'Rolex'),
(3, 'Timex'),
(4, 'Citizen'),
(5, 'Samsung'),
(6, 'Apple'),
(7, 'Seiko'),
(8, 'Cartier'),
(9, 'Huwawei'),
(10, 'Casio');

-- --------------------------------------------------------

--
-- Table structure for table `cart_deatils`
--

CREATE TABLE `cart_deatils` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_deatils`
--

INSERT INTO `cart_deatils` (`product_id`, `ip_address`, `quantity`) VALUES
(1, '127.0.0.1', 2),
(5, '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_id` int(11) NOT NULL,
  `Category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Category_title`) VALUES
(1, 'Digital Watches'),
(2, 'Luxary Watches'),
(3, 'Smart Watches'),
(4, 'Quartz Watches'),
(5, 'Solar Watches');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_descrption` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_descrption`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Digital Casio F19', 'Top of the best digital watches list is one of their bestselling watches and what is classed as “easy-reader”. \r\n', 'Digital, Casio', 1, 10, 'Digital_casio.jpg', 'digital_casio2.jpg', 'Digital_casio3.jpg', '25000.00', '2024-01-08 16:55:16', 'true'),
(2, 'Digital Huwawei', 'HUAWEI WATCH FIT new provides precise and real-time workout metrics for 12 professional sport modes including running, swimming, cycling and rope jumping. \r\n', 'Digital, Huwawei', 1, 9, 'Digital_huwawei.jpg', 'Digital_huwawei2.jpg', 'Digital_huwawei3.jpg', '45000.00', '2024-01-08 16:55:17', 'true'),
(3, 'Digital Timex F2-1', 'A lovely retro-style watch with an expanding stainless steel watch.  This watch has a much better backlight than other digital watches.\r\n', 'Digital, Timex', 1, 3, 'Digital_timex.jpg', 'Digital_timex2.jpg', 'Digital_timex3.jpg', '38000.00', '2024-01-08 16:55:17', 'true'),
(4, 'Luxary Cartier M29', 'At Cartier, everything begins with the design. The Maison’s obsession for pure lines, precise shapes.\r\n', 'Luxary, Cartier', 2, 8, 'luxary_cartier.jpg', 'luxary_cartier2.jpg', 'luxary_cartier3.jpg', '125000.00', '2024-01-08 16:55:17', 'true'),
(5, 'Luxary Rolex GMT master2', 'Rolex watches are crafted from the finest raw materials and assembled with scrupulous attention to detail. \r\n', 'Luxary, Rolex', 2, 2, 'luxary_rolex.jpg', 'luxary_rolex2.jpg', 'luxary_rolex3.jpg', '250000.00', '2024-01-08 16:55:17', 'true'),
(6, 'Luxary Seiko ', 'King Seiko is a mechanical watch brand that beautifully designed and finished mechanical watches with high accuracy.\r\n', 'Luxary, seiko', 2, 7, 'luxary_seiko.jpg', 'luxary_seiko2.jpg', 'luxary_seiko3.jpg', '152000.00', '2024-01-08 16:55:17', 'true'),
(7, 'Quartz citizen master eco', 'Taking it up a notch with the reinvented Citizen Perpetual Calendar Chrono timepiece with a 1/20 second chronograph. \r\n', 'Quartz, citizen', 4, 4, 'quartz_citizen.jpg', 'quartz_citizen2.jpg', 'quartz_citizen3.jpg', '145000.00', '2024-01-08 16:55:17', 'true'),
(8, 'Quartz Omega speedmaster', 'Cased in grade 2 titanium, the unique 45 mm chronograph can display true solar time at any location on Earth and Mars. \r\n', 'Quartz, Omega', 4, 1, 'quartz_omega.jpg', 'quartz_omega2.jpg', 'quartz_omega3.jpg', '220000.00', '2024-01-08 16:55:17', 'true'),
(9, 'Smart Apple series9', 'All Apple Watch Series 9 cases are swimproof and dustproof with a crack-resistant front crystal.\r\n', 'Apple, smart', 3, 6, 'smart_apple.jpg', 'smart_apple2.jpg', 'smart_apple3.jpg', '155000.00', '2024-01-08 16:55:17', 'true'),
(10, 'Smart Samsung Galaxy6', 'A big, circular view on your wrist Develop healthy sleeping habits Get detailed insights on your body and wellness.\r\n', 'Smart, Samsung, galaxy', 3, 5, 'smart_samsung.jpg', 'smart_samsung2.jpg', 'smart_samsung3.jpg', '135000.00', '2024-01-08 16:55:17', 'true'),
(11, 'Solar Casio ECB-2200', 'World time 38 time zones (38 cities + coordinated universal time), city code display, city name display.\r\n', 'Solar, Casio', 5, 10, 'solar_casio.jpg', 'solar_casio2.jpg', 'solar_casio3.jpg', '180000.00', '2024-01-08 16:55:17', 'true'),
(12, 'Solar Seiko SUT321', 'Operating for approx. 6 months (when fully charged), Stainless steel, Sapphire crystal.\r\n', 'Solar, Seiko', 5, 7, 'solar_seiko.jpg', 'solar_seiko2.jpg', 'solar_seiko3.jpg', '121500.00', '2024-01-08 16:55:17', 'true'),
(13, 'Solar Timex Expedition North', 'Take what you love about our Field Post 41 Solar.\r\n', 'Solar, Timex', 5, 3, 'solar_timex.jpg', 'solar_timex2.jpg', 'solar_timex3.jpg', '350000.00', '2024-01-08 16:55:17', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'jebesh', 'jebesh2006@gmail.com', '$2y$10$RlYTpTf/yWbX4PBMNmJ8OuMxsi1WN7o6Ruk4y47GcD.ln92TXBzf.', 'WhatsApp Image 2022-02-18 at 9.55.16 PM.jpeg', '127.0.0.1', 'Welimada, Uva', '0768816767'),
(3, 'Alan', 'stevealan55@gmail.com', '$2y$10$UHUqhBTvyZ8R9HqLQzKu2eweS01rD2UBTSdLrDGfBr4NV2U953/xa', 'WhatsApp Image 2022-02-18 at 9.55.16 PM.jpeg', '127.0.0.1', 'Welimada', '0768816767'),
(4, 'kamal', 'kamal@gmail.com', '$2y$10$LRsA3IED9uVEXKG2NdTDp.6otE7h1E8BdtUa4WEN/TJVrfqFo49hi', 'WhatsApp Image 2022-02-18 at 9.55.16 PM.jpeg', '127.0.0.1', 'welimada', '123456'),
(5, 'Vinoth', 'vinoth@gmail.com', '$2y$10$r3X7/ck2mQPfaphav6fr1.rVz1gOJv5GM8/XKSPsw4BW5NylpgjdK', 'WhatsApp Image 2022-02-18 at 9.55.16 PM.jpeg', '127.0.0.1', 'Welimada', '0768213'),
(6, 'abc', 'abc@gmail.com', '$2y$10$xYwkO2j2w1kt9Xen9m9Mze8lpdMIOnIY9V51ItgMFnN8FoeGqt6vq', 'WhatsApp Image 2022-02-18 at 9.55.16 PM.jpeg', '127.0.0.1', 'Welimada', '134'),
(7, 'User1', 'user1@gmail.com', '$2y$10$qqYke6JE6oNXF7SU.AcM1uqM4XB/Y1D8XGw9poRip.TEbbgKAk2K6', 'WhatsApp Image 2022-02-18 at 9.55.16 PM.jpeg', '127.0.0.1', 'Welimada', '0768816767');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Brands_id`);

--
-- Indexes for table `cart_deatils`
--
ALTER TABLE `cart_deatils`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `Brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
