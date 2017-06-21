-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 01:00 PM
-- Server version: 5.6.31
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_golden_pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collections`
--

CREATE TABLE IF NOT EXISTS `tbl_collections` (
  `col_id` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_collections`
--

INSERT INTO `tbl_collections` (`col_id`, `cus_id`, `amount`, `timestamp`) VALUES
(1, 29, 1482.00, '2017-06-09 14:28:12'),
(2, 29, 1482.00, '2017-06-09 14:29:56'),
(3, 30, 1482.72, '2017-06-09 14:29:56'),
(4, 31, 14814.72, '2017-06-09 14:29:56'),
(5, 32, 1477.44, '2017-06-09 14:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `cus_id` int(11) NOT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `tin` int(11) DEFAULT NULL,
  `terms` varchar(45) DEFAULT NULL,
  `opidno` varchar(45) DEFAULT NULL,
  `bstyle` varchar(45) DEFAULT NULL,
  `address` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cus_id`, `full_name`, `tin`, `terms`, `opidno`, `bstyle`, `address`, `timestamp`) VALUES
(5, 'Rose Pharmacy', 234567890, '45 days', '123456ABC', 'Whole Saler', 'Gingoog City', '2017-05-30 08:41:26'),
(6, 'Rika Drug Store', 123456789, 'COD', 'IN1234', 'Whole Saler', 'Malaybalay, Bukidnon', '2017-06-02 15:36:22'),
(7, 'Mercury Drug Store', 1542739, '30 days', 'abc4421', 'Whole Saler', 'Gingoog City', '2017-06-06 14:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `lname`, `fname`, `mname`, `position`, `timestamp`) VALUES
(17, 'Barro Jr.', 'Napoleon', 'Cominguez', 'Staff', '2017-06-06 14:29:19'),
(18, 'Barro Sr.', 'Napoleon', 'Puno', 'Staff', '2017-06-06 14:30:14'),
(16, 'Omelda', 'Dario', 'A.', 'Manager', '2017-05-30 08:40:23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_overdue`
--
CREATE TABLE IF NOT EXISTS `tbl_overdue` (
`sales_id` int(11)
,`sales_no` int(11)
,`cus_id` int(11)
,`dates` date
,`prepared_by` varchar(45)
,`checked_by` varchar(45)
,`VAT` int(11)
,`total_amount` float(11,2)
,`total_sales` float(11,2)
,`amount_net` float(11,2)
,`status` varchar(45)
,`due_date` date
,`timestamp` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE IF NOT EXISTS `tbl_payments` (
  `pay_id` int(11) NOT NULL,
  `sales_no` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `pay_type` varchar(45) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `balance` float(11,2) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`pay_id`, `sales_no`, `cus_id`, `pay_type`, `amount`, `balance`, `timestamp`) VALUES
(2, 1, 5, 'Cash', 1304.16, 0.00, '2017-06-03 14:37:21'),
(11, 2, 5, 'Cash', 14190.50, 0.00, '2017-06-09 12:41:20'),
(12, 4, 5, 'Cash', 1500.00, 12690.50, '2017-06-09 12:43:32'),
(14, 11, 5, 'Cash', 1000.00, 482.00, '2017-06-09 12:44:02'),
(15, 3, 5, 'Cash', 127.50, 1354.50, '2017-06-13 09:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentsdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_paymentsdetails` (
  `pd_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `pay_type` varchar(45) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paymentsdetails`
--

INSERT INTO `tbl_paymentsdetails` (`pd_id`, `pay_id`, `pay_type`, `amount`, `timestamp`) VALUES
(1, 2, 'Check', 1304.16, '2017-06-06 15:36:08'),
(8, 11, 'Cash', 1000.00, '2017-06-09 12:41:20'),
(9, 11, 'Cash', 14190.50, '2017-06-09 12:41:33'),
(10, 12, 'Cash', 1000.00, '2017-06-09 12:43:32'),
(12, 14, 'Cash', 1000.00, '2017-06-09 12:44:03'),
(13, 12, 'Cash', 1500.00, '2017-06-13 00:03:49'),
(14, 15, 'Cash', 127.50, '2017-06-13 09:02:37');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_productOut`
--
CREATE TABLE IF NOT EXISTS `tbl_productOut` (
`id` int(11)
,`sales_no` int(11)
,`prod_id` int(11)
,`quantity` int(11)
,`amount` float(11,2)
,`timestamp` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `price` float(11,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `lot_no` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `name`, `description`, `price`, `expiry_date`, `quantity`, `packing`, `lot_no`, `timestamp`) VALUES
(5, 'Biogesic Paracetamol', 'For headache and paint re-leaver.', 123.50, '2019-07-01', 19, '50mg', 'abc123', '2017-05-30 08:42:37'),
(6, 'Cotrimoxacol', 'Sample', 123.56, '2019-07-01', 7, '100mg Tablet', '1234567890', '2017-06-02 10:06:48'),
(7, 'Alcohol', 'Rabbing Alcohol.', 1234.56, '2018-11-01', 19, '50g', 'asd1234', '2017-06-02 10:07:33'),
(8, 'Betadine', 'Anti-ceptic.', 123.12, '2019-07-11', 7, '40mg', 'azx23', '2017-06-02 10:08:11'),
(9, 'Metoprolol', 'Tambal Highblood or hypertension.', 180.00, '2019-02-01', 95, '50mg', 'Avc12', '2017-06-09 10:30:45'),
(10, 'Neozep', 'Paracetamol', 1400.00, '2019-07-01', 118, '500mg Tablet', '1bc123', '2017-06-20 07:20:09'),
(11, 'Multivitamins ', 'Paracetamol', 5000.00, '2019-01-01', 115, '500 mg Capsule', 'cdo123', '2017-06-20 07:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `sales_id` int(11) NOT NULL,
  `sales_no` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `prepared_by` varchar(45) DEFAULT NULL,
  `checked_by` varchar(45) DEFAULT NULL,
  `VAT` int(11) DEFAULT NULL,
  `total_amount` float(11,2) DEFAULT NULL,
  `total_sales` float(11,2) DEFAULT NULL,
  `amount_net` float(11,2) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `due_date` date NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`sales_id`, `sales_no`, `cus_id`, `dates`, `prepared_by`, `checked_by`, `VAT`, `total_amount`, `total_sales`, `amount_net`, `status`, `due_date`, `timestamp`) VALUES
(2, 1, 5, '2017-06-03', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 1482.00, 177.84, 1304.16, 'PAID', '2017-06-03', '2017-05-30 08:46:20'),
(3, 2, 5, '2017-05-30', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 15190.50, 1822.86, 13367.64, 'PAID', '0000-00-00', '2017-05-30 08:46:59'),
(4, 3, 5, '0000-00-00', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 1482.00, 177.84, 1304.16, 'PARTIALLY PAID', '0000-00-00', '2017-05-30 09:15:11'),
(5, 4, 5, '2017-05-30', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 15190.50, 1822.86, 13367.64, 'PARTIALLY PAID', '0000-00-00', '2017-05-30 09:16:37'),
(8, 7, 5, '2017-05-30', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 1482.00, 177.84, 1304.16, 'UNPAID', '2017-06-06', '2017-05-30 09:22:11'),
(13, 11, 5, '2017-05-30', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 0, 1482.00, 133.38, 1348.62, 'OVERDUE', '2017-06-09', '2017-05-30 13:12:02'),
(14, 12, 5, '0000-00-00', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 3454.16, 414.50, 3039.66, 'UNPAID', '0000-00-00', '2017-06-02 10:32:09'),
(15, 13, 5, '0000-00-00', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 19256.88, 2310.83, 16946.05, 'CANCELLED', '2017-06-10', '2017-06-02 10:35:04'),
(16, 14, 5, '0000-00-00', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 16296.72, 1955.61, 14341.11, 'CANCELLED', '0000-00-00', '2017-06-02 15:11:04'),
(17, 15, 5, '0000-00-00', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 14814.72, 1777.77, 13036.95, 'UNPAID', '2017-06-04', '2017-06-02 15:22:36'),
(18, 16, 6, '0000-00-00', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 2960.16, 355.22, 2604.94, 'UNPAID', '2017-07-18', '2017-06-03 13:56:26'),
(19, 17, 5, '2017-06-03', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 1477.44, 177.29, 1300.15, 'UNPAID', '2017-07-18', '2017-06-03 13:58:23'),
(20, 18, 6, '2017-06-03', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 1482.72, 177.93, 1304.79, 'UNPAID', '2017-07-13', '2017-06-03 13:59:21'),
(21, 19, 5, '0000-00-00', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 1477.44, 177.29, 1300.15, 'UNPAID', '2017-06-03', '2017-06-03 14:18:28'),
(22, 20, 6, '2017-06-04', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 2954.88, 354.59, 2600.29, 'UNPAID', '2017-07-04', '2017-06-04 02:05:22'),
(23, 21, 5, '2017-06-06', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 2964.72, 355.77, 2608.95, 'UNPAID', '2017-07-21', '2017-06-06 14:22:11'),
(24, 22, 7, '2017-06-06', 'Barro Jr., Napoleon Cominguez. ', 'Barro Jr., Napoleon Cominguez. ', 12, 16292.16, 1955.06, 14337.10, 'UNPAID', '2017-07-06', '2017-06-06 14:42:07'),
(25, 23, 7, '2017-06-09', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 4140.00, 496.80, 3643.20, 'UNPAID', '2017-07-09', '2017-06-09 10:31:59'),
(26, 24, 7, '2017-06-13', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 1482.00, 177.84, 1304.16, 'CANCELLED', '2017-07-13', '2017-06-13 00:04:36'),
(27, 25, 7, '2017-06-20', 'Omelda, Dario A.. ', 'Omelda, Dario A.. ', 12, 40923.70, 4910.84, 36012.86, 'UNPAID', '2017-07-20', '2017-06-20 07:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_salesdetails` (
  `id` int(11) NOT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_salesdetails`
--

INSERT INTO `tbl_salesdetails` (`id`, `sales_no`, `prod_id`, `quantity`, `amount`, `timestamp`) VALUES
(2, 1, 5, 12, 1482.00, '2017-05-30 08:42:53'),
(3, 2, 5, 123, 15190.50, '2019-05-30 08:46:54'),
(4, 3, 5, 12, 1482.00, '2017-05-30 09:14:03'),
(5, 4, 5, 123, 15190.50, '2017-05-30 09:16:35'),
(6, 7, 5, 12, 1482.00, '2017-05-30 09:21:57'),
(7, 0, 5, 12, 1482.00, '2017-05-30 10:20:18'),
(15, 11, 5, 12, 1482.00, '2017-05-30 13:09:44'),
(26, 12, 8, 12, 1477.44, '2017-06-02 10:10:17'),
(27, 12, 6, 12, 1482.72, '2017-06-02 10:10:30'),
(28, 12, 5, 4, 494.00, '2017-06-02 10:13:12'),
(40, 15, 7, 12, 14814.72, '2017-06-02 15:22:35'),
(41, 16, 6, 12, 1482.72, '2017-06-03 13:56:20'),
(42, 16, 8, 12, 1477.44, '2017-06-03 13:56:23'),
(43, 17, 8, 12, 1477.44, '2017-06-03 13:58:22'),
(44, 18, 6, 12, 1482.72, '2017-06-03 13:59:08'),
(46, 19, 8, 12, 1477.44, '2017-06-03 14:18:26'),
(48, 20, 8, 24, 2954.88, '2017-06-04 02:04:40'),
(50, 21, 5, 12, 1482.00, '2017-06-06 14:21:55'),
(51, 21, 6, 12, 1482.72, '2017-06-06 14:22:03'),
(52, 22, 8, 12, 1477.44, '2017-06-06 14:41:17'),
(53, 22, 7, 12, 14814.72, '2017-06-06 14:41:22'),
(57, 23, 9, 23, 4140.00, '2017-06-09 10:31:31'),
(58, 29, NULL, NULL, NULL, '2017-06-09 14:20:51'),
(59, 30, NULL, NULL, NULL, '2017-06-09 14:20:51'),
(60, 31, NULL, NULL, NULL, '2017-06-09 14:20:51'),
(61, 32, NULL, NULL, NULL, '2017-06-09 14:20:51'),
(62, 29, NULL, NULL, NULL, '2017-06-09 14:21:41'),
(63, 30, NULL, NULL, NULL, '2017-06-09 14:21:41'),
(64, 31, NULL, NULL, NULL, '2017-06-09 14:21:41'),
(65, 32, NULL, NULL, NULL, '2017-06-09 14:21:41'),
(66, 29, NULL, NULL, NULL, '2017-06-09 14:26:43'),
(67, 30, NULL, NULL, NULL, '2017-06-09 14:26:44'),
(68, 31, NULL, NULL, NULL, '2017-06-09 14:26:44'),
(69, 32, NULL, NULL, NULL, '2017-06-09 14:26:44'),
(70, 25, 11, 5, 25000.00, '2017-06-20 07:22:57'),
(71, 25, 10, 5, 7000.00, '2017-06-20 07:23:01'),
(72, 25, 9, 5, 900.00, '2017-06-20 07:23:05'),
(73, 25, 8, 5, 615.60, '2017-06-20 07:23:09'),
(74, 25, 7, 5, 6172.80, '2017-06-20 07:23:13'),
(75, 25, 6, 5, 617.80, '2017-06-20 07:23:19'),
(76, 25, 5, 5, 617.50, '2017-06-20 07:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE IF NOT EXISTS `tbl_useraccounts` (
  `uid` int(11) NOT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`uid`, `lname`, `password`, `timestamp`) VALUES
(5, 'Omelda', 'dario123', '2017-05-30 08:40:33'),
(6, 'Barro Jr.', 'nap123', '2017-06-06 14:32:02');

-- --------------------------------------------------------

--
-- Structure for view `tbl_overdue`
--
DROP TABLE IF EXISTS `tbl_overdue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_overdue` AS select `tbl_sales`.`sales_id` AS `sales_id`,`tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,`tbl_sales`.`dates` AS `dates`,`tbl_sales`.`prepared_by` AS `prepared_by`,`tbl_sales`.`checked_by` AS `checked_by`,`tbl_sales`.`VAT` AS `VAT`,`tbl_sales`.`total_amount` AS `total_amount`,`tbl_sales`.`total_sales` AS `total_sales`,`tbl_sales`.`amount_net` AS `amount_net`,`tbl_sales`.`status` AS `status`,`tbl_sales`.`due_date` AS `due_date`,`tbl_sales`.`timestamp` AS `timestamp` from `tbl_sales` where ((`tbl_sales`.`status` <> 'PAID') and (cast(`tbl_sales`.`due_date` as date) <= curdate()));

-- --------------------------------------------------------

--
-- Structure for view `tbl_productOut`
--
DROP TABLE IF EXISTS `tbl_productOut`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_productOut` AS select `tbl_salesdetails`.`id` AS `id`,`tbl_salesdetails`.`sales_no` AS `sales_no`,`tbl_salesdetails`.`prod_id` AS `prod_id`,`tbl_salesdetails`.`quantity` AS `quantity`,`tbl_salesdetails`.`amount` AS `amount`,`tbl_salesdetails`.`timestamp` AS `timestamp` from `tbl_salesdetails` where (cast(`tbl_salesdetails`.`timestamp` as date) between '2017-01-01' and '2019-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_collections`
--
ALTER TABLE `tbl_collections`
  ADD PRIMARY KEY (`col_id`),
  ADD KEY `col_id` (`col_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`lname`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_paymentsdetails`
--
ALTER TABLE `tbl_paymentsdetails`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`sales_no`),
  ADD KEY `sales_id` (`sales_id`);

--
-- Indexes for table `tbl_salesdetails`
--
ALTER TABLE `tbl_salesdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `lname_UNIQUE` (`lname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_collections`
--
ALTER TABLE `tbl_collections`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_paymentsdetails`
--
ALTER TABLE `tbl_paymentsdetails`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_salesdetails`
--
ALTER TABLE `tbl_salesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD CONSTRAINT `lname` FOREIGN KEY (`lname`) REFERENCES `tbl_employee` (`lname`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
