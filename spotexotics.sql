-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 04:51 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotexotics`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `created_at`) VALUES
(1, 'BMW', '2019-02-18 14:43:50'),
(2, 'Mercedes', '2019-02-18 14:43:56'),
(3, 'Audi', '2019-02-18 14:44:02'),
(4, 'VW', '2019-02-18 14:44:11'),
(5, 'Volvo', '2019-02-18 14:44:31'),
(6, 'Bugatti', '2019-02-18 14:44:35'),
(7, 'Pagani', '2019-02-18 14:44:41'),
(8, 'Ferrari', '2019-02-18 14:44:53'),
(9, 'Lamborghini', '2019-02-18 14:45:06'),
(10, 'Maserati', '2019-02-18 14:45:18'),
(12, 'Mclaren', '2019-02-18 14:46:02'),
(13, 'Aston Martin', '2019-02-18 14:46:12'),
(14, 'Bentley', '2019-02-18 14:46:21'),
(15, 'Land Rover', '2019-02-18 14:46:33'),
(16, 'Dodge', '2019-02-18 14:46:46'),
(17, 'Chevrolet', '2019-02-18 14:46:52'),
(18, 'Koenigsegg', '2019-02-18 14:47:08'),
(19, 'Alfa Romeo', '2019-02-20 14:34:17'),
(20, 'Porsche', '2019-02-20 15:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`, `brand_id`, `created_at`) VALUES
(1, 'M2', 1, '2019-02-18 14:48:36'),
(2, 'M3', 1, '2019-02-18 14:48:44'),
(3, 'M4', 1, '2019-02-18 14:48:50'),
(4, 'M5', 1, '2019-02-18 14:48:56'),
(5, 'M6', 1, '2019-02-18 14:49:01'),
(6, 'M850i', 1, '2019-02-18 14:49:09'),
(7, 'X3M', 1, '2019-02-18 14:49:15'),
(8, 'X4M', 1, '2019-02-18 14:49:25'),
(9, 'X5M', 1, '2019-02-18 14:49:30'),
(10, 'X6M', 1, '2019-02-18 14:49:40'),
(11, 'Z4', 1, '2019-02-18 14:49:46'),
(12, 'X7 M50d', 1, '2019-02-18 14:50:12'),
(13, 'AMG GT', 2, '2019-02-18 14:50:30'),
(14, 'A45 AMG', 2, '2019-02-18 14:50:38'),
(15, 'C63 AMG', 2, '2019-02-18 14:50:49'),
(16, 'E63 AMG', 2, '2019-02-18 14:50:57'),
(17, 'CLS 63 AMG', 2, '2019-02-18 14:51:05'),
(18, 'G63 AMG', 2, '2019-02-18 14:51:16'),
(19, 'GLC 63 AMG', 2, '2019-02-18 14:51:26'),
(20, 'SLS AMG', 2, '2019-02-18 14:51:32'),
(21, 'GLE 63 AMG', 2, '2019-02-18 14:51:43'),
(22, 'GLS 63 AMG', 2, '2019-02-18 14:51:52'),
(23, 'SLR', 2, '2019-02-18 14:52:14'),
(24, 'F12', 8, '2019-02-19 16:01:55'),
(25, '458 Italia / Spider', 8, '2019-02-19 16:02:13'),
(26, '488 GTB / Spider', 8, '2019-02-19 16:02:26'),
(27, '812 Superfast', 8, '2019-02-19 16:02:33'),
(30, 'F430', 8, '2019-02-19 16:03:59'),
(31, '360', 8, '2019-02-19 16:04:07'),
(32, 'Hucaran', 9, '2019-02-19 16:04:27'),
(33, 'Aventador', 9, '2019-02-19 16:04:34'),
(34, 'Urus', 9, '2019-02-19 16:04:41'),
(35, 'Gallardo', 9, '2019-02-19 16:04:57'),
(36, 'Enzo', 8, '2019-02-20 14:22:55'),
(37, 'LaFerrari', 8, '2019-02-20 14:23:05'),
(38, 'California', 8, '2019-02-20 14:23:13'),
(39, 'Portofino', 8, '2019-02-20 14:23:22'),
(40, 'GTC4Lusso', 8, '2019-02-20 14:23:32'),
(41, 'FF', 8, '2019-02-20 14:23:42'),
(42, 'R8', 3, '2019-02-20 14:24:15'),
(43, 'SQ7', 3, '2019-02-20 14:24:21'),
(44, 'Q8', 3, '2019-02-20 14:24:25'),
(45, 'S8', 3, '2019-02-20 14:24:32'),
(46, 'S6 / RS6', 3, '2019-02-20 14:24:38'),
(47, 'S5 / RS5', 3, '2019-02-20 14:25:22'),
(48, 'S4 / RS4', 3, '2019-02-20 14:25:31'),
(49, 'TT', 3, '2019-02-20 14:25:40'),
(50, 'S3 / RS3', 3, '2019-02-20 14:26:03'),
(51, 'Golf GTI / R', 4, '2019-02-20 14:26:23'),
(52, 'Tuareg', 4, '2019-02-20 14:26:51'),
(53, 'Arteon', 4, '2019-02-20 14:27:07'),
(54, 'Passat', 4, '2019-02-20 14:27:25'),
(55, 'XC90', 5, '2019-02-20 14:27:34'),
(56, 'Veyron', 6, '2019-02-20 14:27:42'),
(57, 'Chiron', 6, '2019-02-20 14:27:49'),
(58, 'Zonda', 7, '2019-02-20 14:28:03'),
(59, 'Huayra', 7, '2019-02-20 14:28:11'),
(60, 'Grandturismo', 10, '2019-02-20 14:28:19'),
(61, 'Grandcabrio', 10, '2019-02-20 14:28:32'),
(62, 'Levante', 10, '2019-02-20 14:28:39'),
(63, 'Quattroporte', 10, '2019-02-20 14:29:01'),
(64, 'Ghibli', 10, '2019-02-20 14:29:10'),
(65, '600LT', 12, '2019-02-20 14:29:31'),
(66, '675LT', 12, '2019-02-20 14:29:39'),
(67, '720S', 12, '2019-02-20 14:29:48'),
(68, '650S', 12, '2019-02-20 14:29:57'),
(69, 'P1', 12, '2019-02-20 14:30:07'),
(70, 'Senna', 12, '2019-02-20 14:30:16'),
(71, 'DB11', 13, '2019-02-20 14:31:33'),
(72, 'Vantage', 13, '2019-02-20 14:31:40'),
(73, 'DBS', 13, '2019-02-20 14:31:47'),
(74, 'Rapide', 13, '2019-02-20 14:31:54'),
(75, 'Vanquish', 13, '2019-02-20 14:32:07'),
(76, 'Bentayga', 14, '2019-02-20 14:32:16'),
(77, 'Continetal GT', 14, '2019-02-20 14:32:29'),
(78, 'Sport SVR', 15, '2019-02-20 14:32:37'),
(79, 'Velar', 15, '2019-02-20 14:32:44'),
(80, 'Charger', 16, '2019-02-20 14:32:51'),
(81, 'Viper', 16, '2019-02-20 14:32:59'),
(82, 'Camaro', 17, '2019-02-20 14:33:07'),
(83, 'Regera', 18, '2019-02-20 14:33:14'),
(84, 'Agera', 18, '2019-02-20 14:33:23'),
(85, '4C', 19, '2019-02-20 14:34:32'),
(86, '8C', 19, '2019-02-20 14:34:37'),
(87, 'Stelvio Quadrifoglio', 19, '2019-02-20 14:34:49'),
(88, 'Giulia Quadrifoglio', 19, '2019-02-20 14:35:22'),
(89, '991', 20, '2019-02-20 15:04:57'),
(90, '992', 20, '2019-02-20 15:05:04'),
(91, 'Carrera GT', 20, '2019-02-20 15:05:14'),
(92, '918', 20, '2019-02-20 15:05:20'),
(93, 'Panamera', 20, '2019-02-20 15:05:26'),
(94, 'Cayenne', 20, '2019-02-20 15:05:33'),
(95, 'Macan', 20, '2019-02-20 15:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `images`, `created_at`) VALUES
(1, 'Aston Martin Valkyrie', 'The Aston Martin Valkyrie (also called through its code-names as AM-RB 001 and Nebula) is a limited production hybrid electric sports car collaboratively built by British automobile manufacturer Aston Martin, Red Bull Racing and several other manufacturers.', '[\"assets\\/images\\/Aston-Martin-Valkyrie-001-2-e1541160356971-800x450.jpg\",\"assets\\/images\\/Aston-Martin-Valkyrie-2.jpg\",\"assets\\/images\\/Aston-Martin-Valkyrie-3.jpg\"]', '2019-04-23 14:50:14'),
(2, 'McLaren Speedtail', 'A car like no other. A pure fusion of science and art in automotive form. The Speedtail is McLarenâ€™s first ever Hyper-GT. Our most aerodynamically efficient car ever. And the fastest McLaren to date. With a pioneering 1050PS hybrid powertrain at its core. It brings together unprecedented levels of innovation and elegance to create a new benchmark in automotive design. And offers owners extraordinary opportunity for bespoke personalisation.\r\nIts iconic three seat configuration puts the driver centre-stage â€“ and a jaw-dropping elongated body makes it as much a work of art as a masterpiece of technology. This is McLarenâ€™s brand new entrant to the Ultimate Series. This is the Speedtail.', '[\"assets\\/images\\/ml1.jpg\",\"assets\\/images\\/ml2.jpg\",\"assets\\/images\\/ml3.jpg\"]', '2019-04-23 14:52:09'),
(3, 'Porsche 992', 'The Porsche 992 is the internal designation for the eighth generation of the rear engine sports car produced by the German automobile manufacturer Porsche. It was officially introduced at the Porsche Experience Center, Los Angeles on November 27, 2018. It launched in European markets in early 2019.', '[\"assets\\/images\\/racing-yellow-992-porsche-911-photographed-next-to-911-carrera-t-looks-brilliant-131145_1.jpg\",\"assets\\/images\\/rp_-_992_hockenheim-95.jpg\",\"assets\\/images\\/rp-992-hockenheim-91.jpg\"]', '2019-04-23 14:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `brand` int(10) NOT NULL,
  `model` int(10) NOT NULL,
  `spotter` int(10) NOT NULL,
  `images` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `views` int(10) NOT NULL,
  `total_votes` int(10) NOT NULL,
  `daily_votes` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `date_of_birth` timestamp NULL DEFAULT NULL,
  `city` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `profile_image`, `email`, `password`, `date_of_birth`, `city`, `country`, `created_at`, `admin`) VALUES
(1, 'John', 'Doe', 'John-Doe-55', 'assets/images/profile.png', 'johndoe@gmail.com', '$2y$10$EwSk8JfhUSXI2NAz/R4HfOiCj.e9ssBj.TvJkb0ffVgXMbWoFdkqi', '1994-03-19 23:00:00', 'Cetinje', 'Montenegro', '2019-05-16 13:47:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
