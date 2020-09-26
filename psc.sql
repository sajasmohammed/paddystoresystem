-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 03:56 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `paddy_type`
--

CREATE TABLE `paddy_type` (
  `row_id` int(11) NOT NULL,
  `paddy_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(0, '2020-09-06 11:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `row_id` int(11) NOT NULL,
  `suplier_name` varchar(50) NOT NULL,
  `suplier_nic` varchar(15) NOT NULL,
  `suplier_phoneno` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `department`, `password`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin', '', '9d9066e04a7ea65fd94bfcec3191f6fc');

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
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paddy_buy`
--
ALTER TABLE `paddy_buy`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paddy_issue`
--
ALTER TABLE `paddy_issue`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paddy_price`
--
ALTER TABLE `paddy_price`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paddy_type`
--
ALTER TABLE `paddy_type`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reginal_center`
--
ALTER TABLE `reginal_center`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vechiles`
--
ALTER TABLE `vechiles`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
