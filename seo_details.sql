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
-- Table structure for table `seo_details`
--

CREATE TABLE `seo_details` (
  `id` int(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_canonicals` varchar(255) NOT NULL,
  `seo_page` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo_details`
--

INSERT INTO `seo_details` (`id`, `seo_title`, `seo_desc`, `seo_keys`, `seo_canonicals`, `seo_page`) VALUES
(1, 'Mainboard and SME Upcoming IPOs', 'Stay ahead with upcoming Mainboard and SME IPOs. Access valuable information to maximize your investment potential.', 'upcoming ipo, ipo, pre ipo investing, pre ipo investing, upcoming ipos, new ipo stocks, new ipo, ipos this week, upcoming ipos 2024, best ipo stocks', 'http://localhost/ipo/Ipo', 'Ipo'),
(2, 'Live Grey Market Premium of IPOs', 'Real-time IPO Grey Market Premiums at your fingertips. Stay informed, stay ahead. Evaluate IPOs with accurate market pricing data today!', 'gmp, ipo, grey market premium, cgmp, ipo investment, new ipo stocks, new ipo, ipos this week, upcoming ipos 2024, best ipo stocks', 'http://localhost/ipo/greyMarketIpo', 'greyMarketIpo'),
(3, 'Expert Advice on SME IPO Applications', 'Discover the latest IPO details for Small and Medium-sized Enterprises (SME) on our website, providing valuable insights for investors', 'sme ipo, sme, ipo, sme loans, sme business loan, ipo stocks, upcoming ipos, pre ipo, new ipo, nse sme ipo ', 'http://localhost/ipo/smeMarketIpo', 'smeMarketIpo'),
(4, 'IPO Subscription Status - Live from BSE and NSE 2024', 'The IPO subscription live status of IPO in 2024. Check how many times Mainboard IPO over-subscribed in QIB, NII and Retail category at BSE, NSE in real-time', 'ipo subscription status , ipo subscription ,subscription of ipo, subscribe, subscription of ipo, ipo subscription, pre ipo investing', 'http://localhost/ipo/subscriptionStatus', 'subscriptionStatus'),
(5, 'IPO Forms, Download ASBA IPO Forms, BSE & NSE IPO Forms', 'IPO Forms - Download Mainline IPO and SME IPO forms online. NSE IPO form & BSE IPO form PDF for IPO Application is available for download online', 'ipo forms, forms, donwload forms, ipo forms download, ', 'http://localhost/ipo/ipoForms', 'ipoForms'),
(6, 'Upcoming Buyback 2024, Latest Buyback of Shares in India', 'Share Buyback 2024 - Find the latest share Buyback 2024 offers from the companies with record dates, prices, buyback types and more details ', 'shares buyback, ipo, ipo shares buyback, buyback of shares, buyback share, share buyback, buyback', 'http://localhost/ipo/sharesBuyBack', 'sharesBuyBack'),
(7, 'Upcoming IPOs in 2024, List of Latest IPO in India', 'Upcoming IPO 2024: List of upcoming IPOs and new IPO calendar at one click with IPO details, date, lot size, allotment, and more. Invest in Upcoming IPOs', 'upcoming, upcoming ipo, ipo chittorgarh, chittorgarh ipo, ipos, ipo upcoming, gmp of ipo, new ipos, latest ipo', 'http://localhost/ipo/upcomingIpo', 'upcomingIpo'),
(8, 'SIP Calculator: Systematic Investment Plan Calculator Online', 'Systematic Investment Plan calculator is a tool that helps you determine the returns you can avail when parking your funds in such investment tools', 'lumpsum calculator, lump sum sip calculator, sip lumpsum calculator, lump sum investment calculator, lumpsum investment, lumpsum investment calculator, Lumpsum calc, calculator', 'http://localhost/ipo/sip_calculator', 'sip_calculator'),
(9, 'Lumpsum Calculator: Lumpsum Investment Plan Calculator', 'Calculate Returns for Lumpsum Investments online Lumpsum Calculator and make the best plan to achieve your financial goals', 'lumpsum calculator, lump sum calculator , investment calculator lump sum , lumpsum sip calculator , calculator, lumpsum', 'http://localhost/ipo/lumpsum_calculator', 'lumpsum_calculator'),
(10, 'Find Bank Details from IFSC | Easy Search Tips', 'Instantly retrieve bank details using IFSC code. Our user-friendly platform ensures quick access to essential information for hassle-free transactions.', 'ifsc code search, search by ifsc code, ifsc code find, find ifsc code, find bank by ifsc, find branch, ifsc code, bank ifsc ', 'http://localhost/ipo/Ifsc', 'Ifsc'),
(11, 'Post Office Finder: Find Post Office from Pincode - Quick Search Tool', 'Find post office details from pincode with our quick and reliable search tool. Locate your nearest post office effortlessly now!', 'pincode, post office, find pincode, find post office, postal code', 'http://localhost/ipo/Pincode', 'Pincode'),
(12, 'Real-time Stocks, Index, Futures, Forex & Bitcoin Charts', 'Explore real-time stock, index, and Forex charts. Stay informed and make confident investment decisions. Start tracking your favorite assets today!', 'dollar index, forex, crypto, dollar, bitcoin, trading, market, us market,. exchange, crypto exchang, btc, usdt, xauusd', 'http://localhost/ipo/symbols', 'symbols'),
(13, 'Real-time Stocks, Index, Futures, Forex & Bitcoin Charts ', 'Discover top stocks for your portfolio with our stock screener tool. Filter, analyze, and take action on the best investment opportunities today', 'screener, forex screener, forex investing, investing forex, forex live signals, forex signals live, tradingview', 'http://localhost/ipo/screener', 'screener'),
(14, 'Home - Crypto: Your Gateway to the World of Cryptocurrency', 'Unlock the possibilities of cryptocurrency right from your home. Equip yourself with the knowledge to make informed decisions and investments', 'crypto, forex, usd , dollar, market, us market, bitcoin, trading view, tradingview, ', 'http://localhost/ipo/Crypto', 'Crypto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seo_details`
--
ALTER TABLE `seo_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seo_details`
--
ALTER TABLE `seo_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
