-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 06:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_batch05`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `bName` varchar(20) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `bName`, `mName`, `phone`, `email`, `password`, `status`) VALUES
(3, 'Banani', 'Osman Easin', '0646962234', 'osman@gmail.com', '123456', 0),
(4, 'Khilgao', 'Osman', '01406564344', 'osman@gmail.com', '123456', 0),
(5, 'Mohakhali', 'Easin', '01646962234', 'showkateasin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(6, 'Khilgao Taltola', 'Osman', '01646962234', 'osman@gmail.com', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `des` text NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `costPrice` float NOT NULL,
  `salePrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `des`, `size`, `color`, `barcode`, `costPrice`, `salePrice`) VALUES
(6, 'Panjabi', '', 'M', '#716783', '002', 1500, 4500),
(7, 'Pant', ' Pant', 'M', '#ffffff', '003', 500, 2500),
(8, 'تُفّاح · شَجَرة تُفّاحٍ.', 'This is for Women', 'XL', '#2095bc', '741', 500, 700),
(9, 'Jeans', 'For Man', 'XL', '#2192a1', '123', 1000, 1500),
(10, ' تُفّاحٍ.اح ', 'For Everyone', 'XL', '#000000', '5252', 500, 1000),
(11, 'Payzama', 'for men', 'XL', '#871c1c', '123', 2000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_details`
--

CREATE TABLE `tbl_purchase_details` (
  `id` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `cName` varchar(50) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `br_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `price` float NOT NULL,
  `qnt` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_details`
--

INSERT INTO `tbl_purchase_details` (`id`, `pdate`, `cName`, `invoice`, `br_id`, `product_id`, `barcode`, `price`, `qnt`, `total`) VALUES
(5, '2022-11-03', 'asdf', '1234566', 3, 5, 1, 500, 5, 2500),
(7, '2022-11-06', 'sads', '1234566', 3, 5, 1, 500, 10, 5000),
(8, '2022-11-15', 'dg', '12354', 3, 7, 3, 500, 25, 12500),
(14, '2022-11-08', 'ABM', '123', 3, 5, 1, 500, 5, 2500),
(15, '2022-11-07', 'ABC', '123456', 3, 5, 1, 500, 10, 5000),
(16, '2022-11-07', 'ABC', '123456', 3, 6, 2, 1500, 5, 7500),
(17, '2022-11-07', 'asd', '321', 3, 5, 1, 500, 10, 5000),
(18, '2022-11-07', 'asdf', '0123', 3, 6, 2, 1500, 10, 15000),
(19, '2022-11-02', 'asdf', '0123', 3, 7, 3, 500, 5, 2500),
(20, '2022-11-07', 'saf', '0123', 3, 7, 3, 500, 10, 5000),
(21, '2022-11-07', 'sdfg', '0123', 3, 5, 1, 500, 5, 2500),
(22, '2022-11-07', 'sdfg', '0123', 3, 5, 1, 500, 5, 2500),
(23, '2022-11-08', 'fds', '456', 3, 5, 1, 500, 10, 5000),
(24, '2022-11-08', 'fds', '456', 3, 6, 2, 1500, 15, 22500),
(25, '2022-11-08', 'sdgdf', '456', 3, 5, 1, 500, 10, 5000),
(26, '2022-11-08', 'merchant', '0123456', 3, 5, 1, 500, 10, 5000),
(27, '2022-11-08', 'merchant', '0123456', 3, 7, 3, 500, 5, 2500),
(28, '2022-11-29', 'Merchant', '123456789', 3, 5, 1, 500, 10, 5000),
(29, '2022-11-29', 'Merchant', '123456789', 3, 6, 2, 1500, 5, 7500),
(30, '2022-11-29', 'Merchant', '123456789', 3, 7, 3, 500, 50, 25000),
(31, '2022-11-02', 'sdfg', '653654', 3, 5, 1, 500, 10, 5000),
(43, '2022-11-07', 'asfd', '324324', 3, 6, 2, 1500, 3, 4500),
(44, '2022-11-08', 'adsf', '1234566', 3, 5, 1, 500, 3, 1500),
(49, '2022-11-08', 'asdfsdaf', '123', 3, 5, 1, 500, 5, 2500),
(52, '2022-11-07', 'merchant', '0123654', 3, 5, 1, 500, 10, 5000),
(53, '2022-11-07', 'merchant', '0123654', 3, 6, 2, 1500, 5, 7500),
(54, '2022-11-07', 'merchant', '0123654', 3, 7, 3, 500, 10, 5000),
(57, '2022-11-10', 'fdsgdfg', '68768', 3, 5, 1, 500, 5, 2500),
(58, '2022-11-10', 'ABM Company', '123', 4, 8, 741, 500, 5, 2500),
(59, '0000-00-00', '', '', 4, 0, 0, 0, 0, 0),
(60, '2022-11-02', 'XYZ', '232', 4, 8, 741, 500, 20, 10000),
(61, '2022-11-09', 'Osman IT', '152', 4, 8, 741, 500, 10, 5000),
(62, '2022-11-10', 'Showkat IT', '258', 4, 5, 1, 500, 80, 40000),
(63, '2022-11-10', 'Showkat IT', '258', 4, 6, 2, 1500, 80, 40000),
(64, '2022-11-10', 'Showkat IT', '258', 4, 7, 3, 500, 80, 40000),
(65, '2022-11-10', 'SOFTGHOR', '565', 3, 8, 741, 500, 80, 40000),
(66, '2022-11-08', 'SOFT IT', '565', 3, 8, 741, 500, 80, 40000),
(67, '2022-11-10', 'iuyhg', '6', 3, 6, 2, 1500, 8, 12000),
(68, '2022-11-10', 'iuyhg', '6', 3, 7, 3, 500, 8, 12000),
(69, '2022-11-10', 'Osman', '123', 3, 9, 123, 1000, 8, 8000),
(70, '0000-00-00', '', '', 4, 0, 0, 0, 0, 0),
(71, '2022-11-10', 'ABC EFG', '125', 4, 9, 123, 1000, 8, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_summery`
--

CREATE TABLE `tbl_purchase_summery` (
  `id` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `company` varchar(50) NOT NULL,
  `invoice` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `dis` float NOT NULL,
  `dis_amount` float NOT NULL,
  `grand_total` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_summery`
--

INSERT INTO `tbl_purchase_summery` (`id`, `pdate`, `company`, `invoice`, `total_quantity`, `total_price`, `dis`, `dis_amount`, `grand_total`, `pay`, `due`, `br_id`) VALUES
(1, '2022-11-02', 'sdfg', 653654, 10, 5000, 20, 1000, 4000, 4000, 0, 3),
(2, '2022-11-07', 'merchant', 123654, 25, 17500, 15, 2625, 14875, 14000, -875, 3),
(3, '0000-00-00', '', 0, 0, 0, 0, 0, 0, 0, 0, 3),
(4, '2022-11-10', 'Showkat IT', 258, 240, 120000, 55, 66000, 54000, 2000, -52000, 4),
(5, '2022-11-10', 'SOFTGHOR', 565, 80, 40000, 50, 20000, 20000, 5000000, 4980000, 3),
(6, '2022-11-08', 'SOFT IT', 565, 160, 80000, 65, 52000, 28000, 100000, 72000, 3),
(7, '2022-11-10', 'ABC EFG', 125, 8, 8000, 10, 800, 7200, 10000, 2800, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `id` int(11) NOT NULL,
  `sdate` varchar(50) NOT NULL,
  `invoice` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` float NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales_details`
--

INSERT INTO `tbl_sales_details` (`id`, `sdate`, `invoice`, `product_id`, `sale_price`, `quantity`, `total_amount`, `br_id`) VALUES
(46, '9/11/2022', 2022001, 5, 2000, 2, 4000, 3),
(47, '9/11/2022', 2022002, 6, 4500, 1, 4500, 3),
(48, '9/11/2022', 2022003, 5, 2000, 1, 2000, 3),
(50, '9/11/2022', 2022004, 5, 2000, 10, 20000, 3),
(52, '10/11/2022', 2022005, 5, 2000, 1, 2000, 3),
(53, '10/11/2022', 2022005, 7, 2500, 3, 7500, 3),
(54, '10/11/2022', 2022005, 6, 4500, 5, 22500, 3),
(55, '10/11/2022', 2022006, 5, 2000, 10, 20000, 3),
(56, '10/11/2022', 2022007, 8, 700, 5, 3500, 4),
(57, '10/11/2022', 2022008, 9, 1500, 8, 12000, 4),
(58, '10/11/2022', 2022009, 0, 0, 0, 0, 4),
(59, '10/11/2022', 2022010, 9, 1500, 8, 12000, 4),
(60, '12/11/2022', 2022011, 6, 4500, 5, 22500, 3),
(61, '12/11/2022', 123, 6, 4500, 5, 22500, 6),
(62, '12/11/2022', 5252, 7, 2500, 10, 25000, 6),
(63, '12/11/2022', 1235, 6, 4500, 15, 67500, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_summery`
--

CREATE TABLE `tbl_sales_summery` (
  `id` int(11) NOT NULL,
  `sdate` varchar(10) NOT NULL,
  `invoice` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `dis` float NOT NULL,
  `dis_amount` float NOT NULL,
  `grand_total` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales_summery`
--

INSERT INTO `tbl_sales_summery` (`id`, `sdate`, `invoice`, `total_quantity`, `total_price`, `dis`, `dis_amount`, `grand_total`, `pay`, `due`, `br_id`) VALUES
(1, '08/11/2022', 2022024, 1, 13500, 15, 2025, 11475, 11000, 475, 3),
(2, '8/11/2022', 2022001, 2, 4000, 20, 800, 3200, 3200, 0, 3),
(3, '9/11/2022', 2022002, 1, 4500, 15, 675, 3825, 567, 3258, 3),
(11, '9/11/2022', 2022004, 10, 20000, 30, 6000, 14000, 1400, 12600, 3),
(12, '10/11/2022', 2022005, 5, 32000, 15, 4800, 27200, 27200, 0, 3),
(14, '10/11/2022', 2022006, 10, 20000, 10, 2000, 18000, 10, 17990, 3),
(15, '11/11/2022', 2022006, 10, 20000, 10, 2000, 18000, 10, 17990, 3),
(16, '10/11/2022', 2022007, 5, 3500, 0, 0, 0, 0, 0, 4),
(17, '12/11/2022', 2022011, 5, 22500, 15, 3375, 19125, 250000, -230875, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `product_id`, `br_id`, `qnt`) VALUES
(1, 5, 3, 126),
(2, 6, 3, 120),
(3, 7, 3, 167),
(4, 0, 3, 0),
(5, 8, 4, 190),
(6, 9, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_summery`
--
ALTER TABLE `tbl_purchase_summery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_summery`
--
ALTER TABLE `tbl_sales_summery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_purchase_summery`
--
ALTER TABLE `tbl_purchase_summery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_sales_summery`
--
ALTER TABLE `tbl_sales_summery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
