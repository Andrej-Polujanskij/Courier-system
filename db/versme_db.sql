-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2021 at 08:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `versme_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `sender_name` text COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `sender_contact` text COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `recipient_name` text COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `recipient_contact` text COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `from_city_id` varchar(30) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `to_city_id` varchar(30) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `weigth_id` varchar(30) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `size_id` varchar(30) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `price` varchar(30) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `status` int(2) NOT NULL,
  `parcel_worker_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_contact`, `recipient_name`, `recipient_contact`, `from_city_id`, `to_city_id`, `weigth_id`, `size_id`, `price`, `status`, `parcel_worker_id`) VALUES
(1, '0000000000', 'Testautas2 siuntejas2', '112345', 'Test2 Gavejas2', '864445878', '1', '2', '2', '1', '20', 2, 4),
(8, '6134e14aa99b38.14232348', 'Algis Alganauskas', '823838238', 'Petras Gavauskas', '2342532123', '8', '6', '2', '3', '359', 3, 0),
(13, '614757800a1e90.93873830', 'Kunigunda Ahiene', '3706621212222', 'Kostas Kutauskas', '862154658', '4', '5', '2', '3', '30', 1, 16),
(58, '614793806c0995.39965013', 'Testacivius Test', '243234234', 'Gavejus test', '4234234', '2', '7', '3', '3', '35', 3, 2),
(59, '61481dfdcb7365.82798384', 'Tom Holand', '868456666', 'Piter Parker', '864441233', '3', '10', '3', '2', '30', 1, 6),
(60, '6149816535df35.37840798', 'hawk eye', '885522111', 'Natash Romanov', '878485868', '9', '5', '3', '1', '25', 2, 14),
(61, '614985b5086708.53768011', 'Kim Kardashian', '848586888', 'Kanie West', '88112233', '9', '10', '1', '3', '25', 1, NULL),
(62, '614b6c146b8fb7.15694134', 'Tom Hanks', '87545658', 'Elizabet Ellow', '898789555', '4', '5', '1', '1', '15', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(30) NOT NULL,
  `full_name` varchar(200) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `contact_number` varchar(100) COLLATE utf8mb4_lithuanian_ci NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `full_name`, `contact_number`, `city_id`) VALUES
(2, 'Jonas Jonavicius', '5666666', 2),
(4, 'Jonas basanavicius', '5666666', 1),
(5, 'Tony  Stark', '865544789', 3),
(6, 'Brius Benner', '889966555', 3),
(14, 'Cris Hampton', '845545321', 9),
(16, 'Lui Anderson', '881112223', 4),
(17, 'Brad Simpnos', '89995556', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
