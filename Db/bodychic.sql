-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 06:10 AM
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
-- Database: `bodychic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `thumbnail`, `status`, `created_at`) VALUES
(19, 'Dresses', '1575863561banner1.jpg', 'Active', '2024-07-09 07:46:00.772728'),
(20, 'Hugging Dresses', '1640776434banner1.jpg', 'Active', '2024-07-09 07:47:08.112206');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `details` varchar(50) NOT NULL,
  `tone` varchar(20) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'Active',
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `image`, `details`, `tone`, `status`, `created_at`) VALUES
(3, 'pink', '1259797890pinkColor.png', 'I prefer Light color cloths more', 'Fair', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `bodytype` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'Active',
  `created_at` varchar(6) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `name`, `image`, `bodytype`, `gender`, `category`, `details`, `status`, `created_at`) VALUES
(4, 'westerns', '714907084grid1.jpg', 'All', 'Female', 'Hand bags', 'Indain wear for collage and schools', 'Active', '2024-0'),
(5, 'westerns', '604404310left1.jpg', 'Hourglass', 'Female', 'Dresses', 'Western wear for collage and schools', 'Active', '2024-0'),
(6, 'Casual', '417582758styleCasula.jpg', 'Hourglass', 'Female', 'Dress', 'Casual outfits for office and schools.', 'Active', '2024-0'),
(7, 'Sporty', '1179198209indexSporty.jpeg', 'All', 'Female', 'Dresses', 'Sporty dresses for gym and yoga.', 'Active', '2024-0'),
(8, 'Indian', '105639344shop-4.jpg', 'All', 'Female', 'Dress', 'Indain wear for collage and schools', 'Active', '2024-0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `bust_size` int(12) NOT NULL,
  `waist_size` int(12) NOT NULL,
  `high_hip_size` int(12) NOT NULL,
  `hip_size` int(12) NOT NULL,
  `Body_shape` varchar(12) NOT NULL,
  `colorTone` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'Active',
  `crated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `bust_size`, `waist_size`, `high_hip_size`, `hip_size`, `Body_shape`, `colorTone`, `status`, `crated_at`) VALUES
(2, 'Harsika', 'kumariharsika8@gmail.com', '202cb962ac59075b964b', 7883447773, 0, 0, 0, 0, '0', '', 'Active', '2024-07-19 10:16:22.035449'),
(4, 'sheetal', 'sheetal02@gmail.com', '81dc9bdb52d04dc20036', 7883448973, 0, 0, 0, 0, '0', '', 'Active', '2024-07-19 19:02:21.228826'),
(5, 'sheetal kri', 'kumarishetal@gmail.com', '81dc9bdb52d04dc20036', 782467554, 0, 0, 0, 0, '0', '', 'Active', '2024-07-19 19:17:49.224204'),
(9, 'Harsika Kumari', 'harsika@lpu.in', '81dc9bdb52d04dc20036', 7883447773, 0, 0, 0, 0, '', '', 'Active', '2024-07-20 04:04:49.493047');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
