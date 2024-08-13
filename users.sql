-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 03:56 PM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `quantity`, `price`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '', 1, 0, 0, 6, '2024-08-02 13:21:05', '2024-08-02 13:21:05'),
(4, '', 1, 0, 0, 7, '2024-08-02 13:24:09', '2024-08-02 13:24:09'),
(63, 'Bolt', 3, 1000, 1, 12, '2024-08-12 14:24:18', '2024-08-13 12:48:53'),
(69, 'Fastrack', 1, 5999, 1, 4, '2024-08-12 18:55:32', '2024-08-12 18:55:32'),
(70, 'Sonata', 1, 2000, 1, 5, '2024-08-12 18:55:38', '2024-08-12 18:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `pincoode` int(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `email`, `address1`, `address2`, `pincoode`, `created_at`, `update_at`) VALUES
(1, 'pradip ghetiya', '8320372567', 'pradip@gamil.com', 'university rajkot', 'university rajkot', 360005, '2024-08-02 13:30:22', '2024-08-02 13:55:27'),
(2, 'umang bojani', '9812340921', 'umang@gmail.com', 'university rajkot', 'university rajkot.', 361250, '2024-08-02 13:31:17', '2024-08-02 13:55:37'),
(3, 'jeet ', '1234456761\r\n', 'jeet123@gmail.com', 'university rajkot', 'university rajkot', 360005, '2024-08-02 13:31:55', '2024-08-02 13:56:08'),
(4, 'heet', '982189218911', 'heet1313@gmail.com', 'university rajkot', 'university rajkot', 360005, '2024-08-02 13:32:43', '2024-08-02 13:32:43'),
(5, 'prashant', '97234 89123', 'prashant@gmail.com', 'university road rajkot.', 'university road rajkot', 360001, '2024-08-02 13:44:10', '2024-08-02 13:44:10'),
(6, 'raj godhani', '9877552233', 'raj12@gmail.com', 'university road rajkot', 'university road rajkot ', 360001, '2024-08-02 13:45:32', '2024-08-02 13:45:32'),
(7, 'dev ghetiya', '9898123445', 'dev1213@gmail.com', 'university rajkot\r\n', 'university rajkot', 360001, '2024-08-02 13:55:01', '2024-08-02 13:55:01'),
(8, 'jeet patel', '8320372829', 'jeet123@gmail.com', 'xyz', 'xyz2', 360001, '2024-08-05 14:02:44', '2024-08-05 14:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `items_orders`
--

CREATE TABLE `items_orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_orders`
--

INSERT INTO `items_orders` (`id`, `order_id`, `product_id`, `name`, `price`, `quantity`, `total`, `created_at`, `update_at`) VALUES
(1, 2, 4, 'Fastrack', 5.00, 3, 15, '2024-08-12 12:40:28', NULL),
(2, 2, 7, 'Timex', 999.00, 2, 1998, '2024-08-12 12:40:28', NULL),
(3, 2, 10, 'Police', 8.00, 3, 24, '2024-08-12 12:40:28', NULL),
(4, 2, 2, 'Titan', 4.00, 1, 4, '2024-08-12 12:40:28', NULL),
(5, 2, 12, 'Bolt', 1.00, 1, 1, '2024-08-12 12:40:28', NULL),
(6, 2, 3, 'Casio', 3.00, 1, 3, '2024-08-12 12:40:28', NULL),
(7, 4, 4, 'Fastrack', 5.00, 1, 5, '2024-08-12 12:40:28', NULL),
(8, 4, 5, 'Sonata', 2.00, 2, 4, '2024-08-12 12:40:28', NULL),
(9, 4, 3, 'Casio', 3.00, 1, 3, '2024-08-12 12:40:28', NULL),
(10, 5, 2, 'Titan', 4.00, 1, 4, '2024-08-12 12:40:28', NULL),
(11, 6, 7, 'Timex', 999.00, 1, 999, '2024-08-12 12:40:28', NULL),
(12, 6, 9, 'Diesel', 9.00, 1, 9, '2024-08-12 12:40:28', NULL),
(13, 7, 7, 'Timex', 999.00, 1, 999, '2024-08-12 12:40:28', NULL),
(14, 7, 6, 'Fossil', 2.00, 1, 2, '2024-08-12 12:40:28', NULL),
(15, 8, 7, 'Timex', 999.00, 1, 999, '2024-08-12 12:40:28', NULL),
(16, 8, 28, 'watch 14', 3.00, 1, 3, '2024-08-12 12:40:28', NULL),
(17, 8, 29, 'watch 14', 999.00, 1, 999, '2024-08-12 12:40:28', NULL),
(18, 8, 3, 'Casio', 3.00, 1, 3, '2024-08-12 12:40:28', NULL),
(19, 9, 2, 'Titan', 4.00, 1, 4, '2024-08-12 12:40:28', NULL),
(20, 10, 2, 'Titan', 4.00, 7, 28, '2024-08-12 12:40:28', NULL),
(21, 10, 30, 'watch 14', 2.00, 10, 20, '2024-08-12 12:40:28', NULL),
(22, 10, 29, 'watch 14', 999.00, 15, 14985, '2024-08-12 12:40:28', NULL),
(23, 10, 27, 'fossil', 1.00, 1, 1, '2024-08-12 12:40:28', NULL),
(24, 10, 7, 'Timex', 999.00, 1, 999, '2024-08-12 12:40:28', NULL),
(25, 10, 9, 'Diesel', 9.00, 2, 18, '2024-08-12 12:40:28', NULL),
(26, 10, 31, 'watch 14', 8.00, 1, 8, '2024-08-12 12:40:28', NULL),
(27, 10, 32, 'watch 14', 8.00, 1, 8, '2024-08-12 12:40:28', NULL),
(28, 11, 7, 'Timex', 999.00, 2, 1998, '2024-08-12 12:40:28', NULL),
(29, 11, 27, 'fossil', 1.00, 2, 2, '2024-08-12 12:40:28', NULL),
(30, 12, 33, 'watch 15', 1999.00, 1, 1999, '2024-08-12 12:56:24', NULL),
(31, 13, 3, 'Casio', 3999.00, 1, 3999, '2024-08-12 14:10:58', NULL),
(32, 13, 7, 'Timex', 999.00, 2, 1998, '2024-08-12 14:10:58', NULL),
(33, 14, 12, 'Bolt', 1000.00, 2, 2000, '2024-08-12 14:21:34', NULL),
(34, 14, 27, 'fossil', 1000.00, 5, 5000, '2024-08-12 14:21:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`id`, `user_id`, `name`, `address`, `phone`, `email`, `total_amount`, `order_date`, `payment_method`, `created_at`, `update_at`) VALUES
(1, 1, 'pradip ghetiya', 'z', '8320372567', 'pradip@gmail.com', 2045.00, '2024-08-11 06:41:53', '', '2024-08-12 12:41:06', NULL),
(2, 1, 'pradip ghetiya', 'xyz', '8320372567', 'pradip@gmail.com', 2045.00, '2024-08-11 06:46:50', '', '2024-08-12 12:41:06', NULL),
(3, 1, 'pradip ghetiya', 'xyz', '8320372567', 'pradip@gmail.com', 0.00, '2024-08-11 06:48:22', '', '2024-08-12 12:41:06', NULL),
(4, 1, 'pradip ghetiya', 'Pradip', '8320372567', 'pradip@gmail.com', 12.00, '2024-08-11 06:49:31', '', '2024-08-12 12:41:06', NULL),
(5, 1, 'pradip', 'za', '8320372567', 'pradip@gmail.com', 4.00, '2024-08-11 06:52:31', '', '2024-08-12 12:41:06', NULL),
(6, 1, 'qq', 'qw', '8320372567', 'pradip@gmail.com', 1008.00, '2024-08-11 07:07:55', '', '2024-08-12 12:41:06', NULL),
(7, 1, 'pradip', 'xyt', '8320372567', 'pradip@gmail.com', 1001.00, '2024-08-11 07:11:15', '', '2024-08-12 12:41:06', NULL),
(8, 1, 'pradip ghetiya', 'as', '8320372567', 'pradip@gmail.com', 2004.00, '2024-08-11 19:17:31', '', '2024-08-12 12:41:06', NULL),
(9, 1, 'prashant', 'as', '8320372567', 'pradip@gmail.com', 4.00, '2024-08-11 19:22:18', 'credit_card', '2024-08-12 12:41:06', NULL),
(10, 1, 'pradip ghetiya', 'ass', '8320372567', 'pradip12@gmail.com', 16067.00, '2024-08-11 19:43:13', 'credit_card', '2024-08-12 12:41:06', NULL),
(11, 1, 'kishan', 'unnecessary', '1233456677', 'kishan@gmail.com', 2000.00, '2024-08-11 19:46:42', 'paypal', '2024-08-12 12:41:06', NULL),
(12, 1, 'pradip ghetiya', 'qwe', '8320372567', 'pradip12@gmail.com', 1999.00, '2024-08-12 12:56:24', 'cash_on_delivery', '2024-08-12 12:56:24', NULL),
(13, 1, 'umang', 'as', '8320372567', 'umang@gamil.com', 5997.00, '2024-08-12 14:10:58', 'cash_on_delivery', '2024-08-12 14:10:58', NULL),
(14, 1, 'pradip ghetiya', 'as', '8320372567', 'pradip@gmail.com', 7000.00, '2024-08-12 14:21:34', 'credit_card', '2024-08-12 14:21:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` int(7) NOT NULL,
  `hsn_code` int(10) DEFAULT NULL,
  `deception` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `price`, `hsn_code`, `deception`, `type`, `image`, `created_at`, `update_at`) VALUES
(2, 'Titan', 2, 4999, 10290329, 'neo splash analog watch - for man', 'upi', 'image/1.jpg', '2024-08-02 04:11:23', '2024-08-07 04:35:46'),
(3, 'Casio', 2, 3999, 102905540, 'vintage black dial silver steel watch', 'smart', 'image/2.jpeg', '2024-08-02 04:13:14', '2024-08-07 04:35:55'),
(4, 'Fastrack', 1, 5999, 10929494, 'exactly analog watch for man', 'smart', 'image/3.jpeg', '2024-08-02 04:15:44', '2024-08-07 04:36:06'),
(5, 'Sonata', 5, 2000, 10929478, 'grnts collection anlong watch for man', 'cod', 'image/4.jpeg\r\n', '2024-08-02 04:18:31', '2024-08-07 04:39:25'),
(6, 'Fossil', 3, 2000, 10929990, 'briggs anlong watch for man', 'cod', 'image/5.jpg', '2024-08-02 04:20:04', '2024-08-07 04:40:46'),
(9, 'Diesel', 1, 9999, 10909982, 'amlong watch form - man/woman', 'upi', 'image/7.jpeg', '2024-08-02 04:25:53', '2024-08-07 04:43:44'),
(10, 'Police', 1, 8999, 10988982, 'ss-24 amlong watch form - man', 'upi', 'image/8.jpg', '2024-08-02 04:27:40', '2024-08-07 04:45:58'),
(11, 'Noise', 1, 2999, 10984433, 'amlong smart watch form - man', 'cod', 'image/9.jpeg', '2024-08-02 04:28:59', '2024-08-07 04:47:14'),
(12, 'Bolt', 2, 1000, 10203040, '', 'cash', 'image/10.jpeg\r\n', '2024-08-02 13:06:52', '2024-08-07 04:48:14'),
(27, 'fossil', 2, 1000, 10203040, 'ztyfg', 'smart', 'image/1.jpg', '2024-08-11 06:58:12', '2024-08-11 06:58:12'),
(28, 'watch 14', 0, 3005, 1929239, 'xylophone', 'smart', 'image/1.jpg', '2024-08-11 07:14:40', '2024-08-11 07:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `email`, `created_at`, `update_at`) VALUES
(1, 'pradip', '$2y$10$JMuS5qLyz0iaCryiXQWyl.GA0pmwbMDqVq1vSaB8fTiOgVkZYAyCe', 'pradip@gmail.com', '2024-08-12 12:41:45', NULL),
(2, 'umang', '$2y$10$kPTNH8JTE/yGgjyk8irtleztD/dfYBoTbUosEl..KI6uuhu8oei/W', 'umang@gamil.com', '2024-08-12 12:41:45', NULL),
(4, 'pradip', '$2y$10$aTqU6inJdY6qstWkDS36K.1igS6HlaoBeVllakCC2irF.dS2r4uaW', 'pradip@gmail.com', '2024-08-12 12:41:45', NULL),
(5, 'pradip', '$2y$10$waGPZLuMQqPIloWSpNSTe.U5ESdZqpR/wsBENJDF96.NwV5iIdNEy', 'pradip@gmail.com', '2024-08-12 12:41:45', NULL),
(6, 'ravi', '$2y$10$4tfJYQi7Oy2NTk/7Uylfwum92R1otpX0A7T2LO3qzQUQ.HEVYiq/m', 'ravi@gmail.com', '2024-08-12 12:41:45', NULL),
(7, 'kishan ', '$2y$10$2qMfkoi66jkEHvpUhKINm.RANcpS6fY/VZpT6Mez2aHgKQupotpaq', 'kishan@gmail.com', '2024-08-12 12:41:45', NULL),
(8, 'jeet', '$2y$10$L5sROsxfRqws5aNVGq5nIORsZ5sgPURCbN1oo9WOTmXjQc6IsyiOO', 'jeet@gmail.com', '2024-08-12 12:50:50', NULL),
(9, 'umang', '$2y$10$5h.FmNN1ix7F/b6/Z9l5fOuGZrW.Cm.6fzREBYwsRNZdi8g32Sh/y', 'umang@gamil.com', '2024-08-12 14:13:21', NULL),
(10, 'umang', '$2y$10$oskuJWwd3rFhtbJwfgfLkOhqgGdFL1STjQ5yfLeUIDMO4eA3R49QO', 'umang@gamil.com', '2024-08-13 12:43:55', NULL),
(11, 'umang', '$2y$10$1/nqd.lI6jUJE3kQQjPhmurBfSiDRdCBKQv/CCD1i9p8d4YwbBq4a', 'umang@gamil.com', '2024-08-13 12:44:31', NULL),
(12, 'umang', '$2y$10$R9TOSglLrksSPZbHok9WreXPHAnzj4wlY2/S9OueU6rA6pINf4QtS', 'umang@gamil.com', '2024-08-13 12:44:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppings`
--

CREATE TABLE `shoppings` (
  `id` int(10) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(6) NOT NULL,
  `total` int(7) NOT NULL,
  `discount` int(5) NOT NULL,
  `final_bill` int(8) NOT NULL,
  `taxation` int(2) NOT NULL,
  `bill_status` varchar(7) NOT NULL,
  `offer_code` varchar(10) NOT NULL,
  `total_to_pay` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_orders`
--
ALTER TABLE `items_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppings`
--
ALTER TABLE `shoppings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items_orders`
--
ALTER TABLE `items_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shoppings`
--
ALTER TABLE `shoppings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
