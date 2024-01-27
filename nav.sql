-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2024 at 12:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipo`
--

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(11) NOT NULL,
  `subnav` varchar(255) DEFAULT NULL,
  `nav` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `subnav`, `nav`, `url`, `status`) VALUES
(1, 'Find Pincode', 'Tools', 'Pincode', 1),
(2, 'Find Bank', 'Tools', 'Ifsc', 1),
(3, 'SIP Calculator', 'Calculators', 'sip_calculator', 1),
(4, 'Lumpsum Calculator', 'Calculators', 'lumpsum_calculator', 1),
(5, 'Home', 'Ipo', 'Ipo', 1),
(6, 'Upcoming Ipo\'s', 'Ipo', 'upcomingIpo', 1),
(7, 'GMP of Ipo', 'Ipo', 'greyMarketIpo', 1),
(8, 'SME of Ipo', 'Ipo', 'smeMarketIpo', 1),
(9, 'Subscription Status', 'Ipo', 'subscriptionStatus', 1),
(10, 'Ipo Forms', 'Ipo', 'ipoForms', 1),
(11, 'Ipo BuyBack', 'Ipo', 'sharesBuyBack', 1),
(12, 'Crypto', 'Crypto', 'Crypto', 1),
(13, 'screener', 'Crypto', 'screener', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
