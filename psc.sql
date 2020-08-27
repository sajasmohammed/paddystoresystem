-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 07:16 PM
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
  `former_register_no` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_branch` varchar(50) NOT NULL,
  `bank_account_no` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`row_id`, `former_register_no`, `bank_name`, `bank_branch`, `bank_account_no`, `amount`, `date`) VALUES
(1, 'dsfs', 'hnb', 'sammanthurai', '222222222222', 46454, '2020-08-13 17:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `row_id` int(11) NOT NULL,
  `farmer_reg_no` varchar(50) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `farmer_nic` varchar(13) NOT NULL,
  `farmer_mobileno` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paddy_buy`
--

CREATE TABLE `paddy_buy` (
  `row_id` int(11) NOT NULL,
  `farmer_reg_no` varchar(100) NOT NULL,
  `paddy_type` varchar(100) NOT NULL,
  `1kg_buy_price` double NOT NULL,
  `reason_less_buy_price` varchar(250) NOT NULL,
  `total_weight` double NOT NULL,
  `total_amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paddy_buy`
--

INSERT INTO `paddy_buy` (`row_id`, `farmer_reg_no`, `paddy_type`, `1kg_buy_price`, `reason_less_buy_price`, `total_weight`, `total_amount`, `date`) VALUES
(2, 'dsfs', 'samba', 240, 'djsnfdj', 490, 119560, '2020-08-11 14:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `paddy_issue`
--

CREATE TABLE `paddy_issue` (
  `row_id` int(11) NOT NULL,
  `paddy_issue_id` varchar(11) NOT NULL,
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
(2, 'fdg', 'keeri', '350', '50', '17500', '', '', '', '2020-08-12 11:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `paddy_price`
--

CREATE TABLE `paddy_price` (
  `row_id` int(11) NOT NULL,
  `paddy_type` varchar(100) NOT NULL,
  `1kg_buy_price` double NOT NULL,
  `1kg_selling_price` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paddy_price`
--

INSERT INTO `paddy_price` (`row_id`, `paddy_type`, `1kg_buy_price`, `1kg_selling_price`, `date`) VALUES
(4, 'samba', 243, 657, '2020-08-11 10:26:25'),
(5, 'samba', 132, 465, '2020-08-11 10:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `paddy_type`
--

CREATE TABLE `paddy_type` (
  `row_id` int(11) NOT NULL,
  `paddy_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paddy_type`
--

INSERT INTO `paddy_type` (`row_id`, `paddy_name`, `date`) VALUES
(1, 'keeri samba', '2020-08-11 10:57:16');

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
  `row_id` int(11) NOT NULL,
  `paddy_type` varchar(100) NOT NULL,
  `total_wieght` double NOT NULL,
  `reg_center_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
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
(8, 'collection', 'col@gmail.com', 'collectionofficer', 'd205dea0dd18a4c5676dcd50e3187843');

-- --------------------------------------------------------

--
-- Table structure for table `vechiles`
--

CREATE TABLE `vechiles` (
  `row_id` int(11) NOT NULL,
  `vech_name` varchar(100) NOT NULL,
  `vech_type` varchar(100) NOT NULL,
  `vech_no` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`row_id`);

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
-- Indexes for table `stock`
--
ALTER TABLE `stock`
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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `paddy_buy`
--
ALTER TABLE `paddy_buy`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paddy_issue`
--
ALTER TABLE `paddy_issue`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paddy_price`
--
ALTER TABLE `paddy_price`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paddy_type`
--
ALTER TABLE `paddy_type`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reginal_center`
--
ALTER TABLE `reginal_center`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vechiles`
--
ALTER TABLE `vechiles`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
