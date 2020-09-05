-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 03:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `row_id` int(11) NOT NULL,
  `former_register_no` varchar(5) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch` varchar(50) NOT NULL,
  `bank_account_no` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`row_id`, `former_register_no`, `bank_name`, `bank_branch`, `bank_account_no`, `amount`, `date`) VALUES
(3, 'FID1', 'HNB', 'Batticaloa', '22202002436', 50000, '2020-08-15 13:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `row_id` int(11) NOT NULL,
  `farmer_reg_no` varchar(5) NOT NULL,
  `farmer_name` varchar(50) NOT NULL,
  `farmer_nic` varchar(13) NOT NULL,
  `farmer_mobileno` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`row_id`, `farmer_reg_no`, `farmer_name`, `farmer_nic`, `farmer_mobileno`, `date`) VALUES
(19, 'FID1', 'test', '35765', '(444) 444-4444', '2020-08-15 10:04:43'),
(22, 'FID2', 'sajas', '970130675v', '(077) 046-3244', '2020-08-15 13:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `paddy_buy`
--

CREATE TABLE `paddy_buy` (
  `row_id` int(11) NOT NULL,
  `farmer_reg_no` varchar(10) NOT NULL,
  `paddy_type` varchar(50) NOT NULL,
  `1kg_buy_price` double NOT NULL,
  `reason_less_buy_price` varchar(250) NOT NULL,
  `total_weight` double NOT NULL,
  `total_amount` double NOT NULL,
  `reg_center_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paddy_buy`
--

INSERT INTO `paddy_buy` (`row_id`, `farmer_reg_no`, `paddy_type`, `1kg_buy_price`, `reason_less_buy_price`, `total_weight`, `total_amount`, `reg_center_name`, `date`) VALUES
(33, 'FID1', 'samba', 343, 'dgfg', 400, 137200, 'dbsjbj', '2020-09-05 10:10:13'),
(35, 'FID1', 'samba', 132, 'dgjfnm', 99, 13068, 'dbsjbj', '2020-09-05 10:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `paddy_issue`
--

CREATE TABLE `paddy_issue` (
  `row_id` int(11) NOT NULL,
  `paddy_issue_id` varchar(10) NOT NULL,
  `paddy_type` varchar(50) NOT NULL,
  `total_weight` varchar(250) NOT NULL,
  `1kg_selling_amount` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `vachile_name` varchar(50) NOT NULL,
  `reginal_center_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paddy_issue`
--

INSERT INTO `paddy_issue` (`row_id`, `paddy_issue_id`, `paddy_type`, `total_weight`, `1kg_selling_amount`, `total_amount`, `supplier_name`, `vachile_name`, `reginal_center_name`, `date`) VALUES
(9, 'PSID1', 'samba', '1000', '354', '354000', 'sajas', 'TN', 'dbsjbj', '2020-09-05 10:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `paddy_price`
--

CREATE TABLE `paddy_price` (
  `row_id` int(11) NOT NULL,
  `paddy_type` varchar(50) NOT NULL,
  `1kg_buy_price` double NOT NULL,
  `1kg_selling_price` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paddy_price`
--

INSERT INTO `paddy_price` (`row_id`, `paddy_type`, `1kg_buy_price`, `1kg_selling_price`, `date`) VALUES
(5, 'samba', 1324, 465, '2020-09-05 12:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `paddy_type`
--

CREATE TABLE `paddy_type` (
  `row_id` int(11) NOT NULL,
  `paddy_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paddy_type`
--

INSERT INTO `paddy_type` (`row_id`, `paddy_name`, `date`) VALUES
(5, 'nfbdn', '2020-09-05 12:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `reginal_center`
--

CREATE TABLE `reginal_center` (
  `row_id` int(11) NOT NULL,
  `reg_center_id` varchar(50) NOT NULL,
  `reg_center_name` varchar(100) NOT NULL,
  `reg_center_telno` int(15) NOT NULL,
  `reg_center_email` varchar(50) NOT NULL,
  `reg_center_address` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reginal_center`
--

INSERT INTO `reginal_center` (`row_id`, `reg_center_id`, `reg_center_name`, `reg_center_telno`, `reg_center_email`, `reg_center_address`, `date`) VALUES
(2, 'fdnjgb', 'dbsjbj', 3546, 's@g.c', 'ndbfndbn', '2020-08-13 07:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `total_weight` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`total_weight`, `date`) VALUES
(155, '2020-09-05 10:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `row_id` int(11) NOT NULL,
  `suplier_name` varchar(50) NOT NULL,
  `suplier_nic` varchar(15) NOT NULL,
  `suplier_phoneno` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`row_id`, `suplier_name`, `suplier_nic`, `suplier_phoneno`, `date`) VALUES
(3, 'sajas', '970130675v', 770463244, '2020-08-15 12:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(2, 'sajas', 'sajas@gmail.com', 'manager', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(3, 'admin', 'admin@gmail.com', 'admin', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(4, 'test', 'test@gmail.com', 'manager', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(5, 'finace', 'f@gmail.com', 'financeofficer', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(6, 'nfdbn', 'ds@gmail.com', 'storekeeper', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(7, 'clerck', 'clerck@gmail.com', 'clerk', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(8, 'collection', 'col@gmail.com', 'collectionofficer', 'd205dea0dd18a4c5676dcd50e3187843'),
(9, 'sajas', 'ds@g.c', 'clerk', '083f1733bd95e16226d5d0f173512728'),
(10, 'nfbsn', 'd@g.c', 'admin', '0699f054e84878aac7e822bca345b812'),
(11, 'fmfndm', 's@g.c', 'manager', '0699f054e84878aac7e822bca345b812'),
(12, 'sss', 's@g.c', 'financeofficer', '0699f054e84878aac7e822bca345b812'),
(13, 'nnn', 'd@g.c', 'financeofficer', '0699f054e84878aac7e822bca345b812'),
(14, 'n', 'd@g.c', 'manager', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(15, 's', 's@g.c', 'financeofficer', '9d9066e04a7ea65fd94bfcec3191f6fc'),
(16, 's', 's@g.c', 'financeofficer', '9d9066e04a7ea65fd94bfcec3191f6fc');

-- --------------------------------------------------------

--
-- Table structure for table `vechiles`
--

CREATE TABLE `vechiles` (
  `row_id` int(11) NOT NULL,
  `vech_name` varchar(50) NOT NULL,
  `vech_type` varchar(50) NOT NULL,
  `vech_no` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vechiles`
--

INSERT INTO `vechiles` (`row_id`, `vech_name`, `vech_type`, `vech_no`, `date`) VALUES
(2, 'TN', 'VAN', '2235SF', '2020-08-15 12:49:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `paddy_buy`
--
ALTER TABLE `paddy_buy`
  ADD PRIMARY KEY (`row_id`) USING BTREE;

--
-- Indexes for table `paddy_issue`
--
ALTER TABLE `paddy_issue`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `paddy_price`
--
ALTER TABLE `paddy_price`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `paddy_type`
--
ALTER TABLE `paddy_type`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `reginal_center`
--
ALTER TABLE `reginal_center`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vechiles`
--
ALTER TABLE `vechiles`
  ADD PRIMARY KEY (`row_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `paddy_buy`
--
ALTER TABLE `paddy_buy`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `paddy_issue`
--
ALTER TABLE `paddy_issue`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paddy_price`
--
ALTER TABLE `paddy_price`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paddy_type`
--
ALTER TABLE `paddy_type`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reginal_center`
--
ALTER TABLE `reginal_center`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vechiles`
--
ALTER TABLE `vechiles`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
