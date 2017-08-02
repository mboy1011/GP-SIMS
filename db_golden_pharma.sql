-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2017 at 09:33 AM
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
-- Table structure for table `tbl_CM`
--

CREATE TABLE IF NOT EXISTS `tbl_CM` (
  `cm_id` int(11) DEFAULT NULL,
  `cm_no` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `cm_reason` text,
  `cm_date` date DEFAULT NULL,
  `cm_totalAmount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_CMdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_CMdetails` (
  `cmd_id` int(11) NOT NULL,
  `cm_no` int(11) DEFAULT NULL,
  `cmd_particulars` varchar(45) DEFAULT NULL,
  `cmd_qty` int(11) DEFAULT NULL,
  `cmd_price` float(11,2) DEFAULT NULL,
  `cmd_amount` float(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collections`
--

CREATE TABLE IF NOT EXISTS `tbl_collections` (
  `col_id` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_CR`
--

CREATE TABLE IF NOT EXISTS `tbl_CR` (
  `cr_id` int(11) NOT NULL,
  `cr_no` int(11) NOT NULL,
  `cr_date` date DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `cm_totalSales` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_CR`
--

INSERT INTO `tbl_CR` (`cr_id`, `cr_no`, `cr_date`, `cus_id`, `cm_totalSales`, `timestamp`) VALUES
(1, 2, '2017-08-01', 1, 1500.25, '2017-08-01 07:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_CRdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_CRdetails` (
  `crd_id` int(11) NOT NULL,
  `cr_no` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_CRdetails`
--

INSERT INTO `tbl_CRdetails` (`crd_id`, `cr_no`, `sales_no`, `amount`, `timestamp`) VALUES
(1, 2, 2, '5000', '2017-08-01 07:33:37');

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
  `discount1` float(11,2) NOT NULL,
  `discount2` float(11,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cus_id`, `full_name`, `tin`, `terms`, `opidno`, `bstyle`, `address`, `discount1`, `discount2`, `timestamp`) VALUES
(1, 'Lyjieme Barro', 101199, '30 days', 'abc123', 'Whole Saler', 'Brgy 24-A Gingoog City', 0.00, 0.00, '2017-07-27 08:17:59'),
(2, 'Mary Jane T. Barro', 91170, '40 days', 'dce345', 'Whole Saler', 'Brgy 24-A Gingoog City', 0.00, 0.00, '2017-07-27 08:17:59'),
(3, 'Napoleon', 12269, '50 days', 'efc443', 'Whole Saler', 'Brgy 24-A Gingoog City', 0.00, 0.00, '2017-07-27 08:17:59'),
(4, 'Mercury Drug Store', 101199, '30 Days', 'PIC120', 'Whole Saler', 'Iligan City', 0.00, 0.00, '2017-07-27 08:18:43'),
(5, 'Jellie', 23455, '30 Days', '', 'Whole Sale', 'Brgy. 18-A Gingoog City', 0.00, 0.00, '2017-07-29 05:46:07'),
(6, 'Gerard Mandam', 0, '30 Days', '', 'Whole Saler', 'Gingoog City', 0.00, 0.00, '2017-07-29 06:23:18'),
(7, 'Justine Joy Botero', 0, '15 Days', '', 'Whole Sale', 'Gingoog City, SAA', 10.00, 0.00, '2017-07-29 06:24:16');

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
(18, 'Bacus', 'Jellie Rose', 'Quta', 'Staff', '2017-07-10 05:25:02'),
(17, 'Barro Jr.', 'Napoleon', 'Cominguez', 'Staff', '2017-06-06 14:29:19'),
(16, 'Omelda', 'Darios', 'A.', 'Manager', '2017-05-30 08:40:23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_expired_products`
--
CREATE TABLE IF NOT EXISTS `tbl_expired_products` (
`prod_id` int(11)
,`name` varchar(45)
,`description` varchar(255)
,`price` float(11,2)
,`expiry_date` date
,`quantity` int(11)
,`packing` varchar(45)
,`lot_no` varchar(45)
,`timestamp` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_monthly_products_out`
--
CREATE TABLE IF NOT EXISTS `tbl_monthly_products_out` (
`Total` decimal(32,0)
,`Month` varchar(9)
,`Year` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_monthly_sales_report`
--
CREATE TABLE IF NOT EXISTS `tbl_monthly_sales_report` (
`Total` double(19,2)
,`MONTH` varchar(9)
,`Year` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_outofstocks`
--
CREATE TABLE IF NOT EXISTS `tbl_outofstocks` (
`prod_id` int(11)
,`name` varchar(45)
,`description` varchar(255)
,`price` float(11,2)
,`expiry_date` date
,`quantity` int(11)
,`packing` varchar(45)
,`lot_no` varchar(45)
,`status` varchar(15)
,`timestamp` timestamp
);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`pay_id`, `sales_no`, `cus_id`, `pay_type`, `amount`, `balance`, `timestamp`) VALUES
(1, 1, 1, 'Cash', 1000.00, 900.50, '2017-07-04 15:30:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paymentsdetails`
--

INSERT INTO `tbl_paymentsdetails` (`pd_id`, `pay_id`, `pay_type`, `amount`, `timestamp`) VALUES
(1, 1, 'Cash', 1000.00, '2017-07-04 15:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_PO`
--

CREATE TABLE IF NOT EXISTS `tbl_PO` (
  `po_no` int(11) NOT NULL,
  `sup_id` varchar(45) DEFAULT NULL,
  `po_date` date DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_POdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_POdetails` (
  `pod_no` int(11) NOT NULL,
  `po_no` int(11) DEFAULT NULL,
  `prod_name` varchar(45) DEFAULT NULL,
  `prod_description` text,
  `prod_packing` varchar(45) DEFAULT NULL,
  `prod_maker` varchar(45) DEFAULT NULL,
  `prod_price` varchar(45) DEFAULT NULL,
  `prod_qty` varchar(45) DEFAULT NULL,
  `prod_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `lot_no` varchar(45) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ACTIVE',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `name`, `description`, `price`, `expiry_date`, `quantity`, `packing`, `lot_no`, `status`, `timestamp`) VALUES
(1, 'Mefenamic Acid', 'NON-STEROIDAL ANTI-INFLAMMATORY DRUG', 950.25, '2018-01-01', 9, '500 mg Tablet', '090', 'EXPIRING', '2017-07-04 15:27:55'),
(2, 'Neozep', 'For sneezing and cough.', 1500.00, '2017-07-07', 0, '60mg', '123abc', 'OUT OF STOCKS', '2017-07-07 12:32:01'),
(3, 'Neozep', 'For cough and sneezing.', 300.00, '2017-07-15', 79, '500mg', 'abc123', 'EXPIRING', '2017-07-15 10:32:49'),
(4, 'Neozep', '', 100.00, '2019-01-02', 83, '600mg', '1bc246', 'ACTIVE', '2017-07-15 10:53:22'),
(5, 'Multivitamins', 'For health.', 150.75, '2019-09-01', 1, '500mg', 'abc-123a', 'ACTIVE', '2017-07-22 04:30:09'),
(6, 'Carlidox', 'Doxycycline ', 150.00, '2019-04-30', 0, '100 MG Capsule', 'FC012', 'OUT OF STOCKS', '2017-07-26 02:40:36'),
(7, 'Neozep', 'Solmux', 250.00, '2019-11-30', 1, '150mg', '1033BC', 'ACTIVE', '2017-07-27 07:21:01'),
(8, 'Neozep', 'Solmux', 100.00, '2019-07-31', 99, '100mg Tablet', '1bc123', 'ACTIVE', '2017-07-27 07:21:42');

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
  `discount1` float(11,2) NOT NULL,
  `discount2` float(11,2) NOT NULL,
  `status` varchar(45) NOT NULL,
  `due_date` date NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`sales_id`, `sales_no`, `cus_id`, `dates`, `prepared_by`, `checked_by`, `VAT`, `total_amount`, `total_sales`, `amount_net`, `discount1`, `discount2`, `status`, `due_date`, `timestamp`) VALUES
(1, 1, 1, '2017-07-04', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 1900.50, 228.06, 1672.44, 0.00, 0.00, 'CANCELLED', '2017-08-03', '2017-07-04 15:29:47'),
(2, 2, 1, '2017-08-01', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 2850.75, 342.09, 2508.66, 0.00, 0.00, 'CANCELLED', '2017-08-31', '2017-07-04 15:56:05'),
(3, 3, 1, '2017-07-05', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 950.25, 114.03, 836.22, 0.00, 0.00, 'CANCELLED', '2017-08-04', '2017-07-04 23:01:51'),
(4, 4, 1, '2017-07-05', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 4751.25, 570.15, 4181.10, 0.00, 0.00, 'CANCELLED', '2017-08-04', '2017-07-05 04:59:15'),
(6, 5, 1, '2017-07-10', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 9502.50, 1140.30, 8362.20, 0.00, 0.00, 'CANCELLED', '2017-08-09', '2017-07-10 05:35:37'),
(7, 6, 1, '2017-07-15', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 3600.00, 432.00, 3168.00, 0.00, 0.00, 'UNPAID', '2017-08-14', '2017-07-15 10:33:05'),
(8, 7, 1, '2017-07-15', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 26400.00, 2828.57, 23571.43, 0.00, 0.00, 'UNPAID', '2017-08-14', '2017-07-15 10:49:17'),
(9, 8, 2, '2017-07-15', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 4.00, 514.29, 4285.71, 0.00, 0.00, 'CANCELLED', '2017-08-14', '2017-07-15 12:06:56'),
(10, 9, 4, '2017-07-15', 'Bridget Alcantara', 'Cerilo Alcantara', 12, 4800.00, 514.29, 4285.71, 0.00, 0.00, 'UNPAID', '2017-09-03', '2017-07-15 13:31:04'),
(11, 10, 1, '2017-07-26', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 1809.00, 193.82, 1615.18, 0.00, 0.00, 'CANCELLED', '2017-08-25', '2017-07-26 01:31:02'),
(12, 11, 1, '2017-07-26', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 950.25, 101.81, 848.44, 0.00, 0.00, 'UNPAID', '2017-08-25', '2017-07-26 03:10:51'),
(13, 12, 1, '2017-07-27', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 600.00, 64.29, 535.71, 0.00, 0.00, 'UNPAID', '2017-08-26', '2017-07-27 01:34:10'),
(14, 13, 1, '2017-07-27', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 4401.25, 471.56, 3929.69, 0.00, 0.00, 'UNPAID', '2017-08-26', '2017-07-27 05:03:53'),
(15, 14, 1, '2017-07-28', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 1851.00, 198.32, 1652.68, 0.00, 0.00, 'UNPAID', '2017-08-27', '2017-07-28 05:40:36'),
(16, 15, 1, '2017-07-28', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 250.00, 26.79, 223.21, 0.00, 0.00, 'UNPAID', '2017-08-27', '2017-07-28 05:41:24'),
(22, 16, 3, '2017-07-28', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 1250.00, 133.93, 1116.07, 0.00, 0.00, 'UNPAID', '2017-09-16', '2017-07-28 06:05:12'),
(23, 17, 1, '2017-07-29', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 40.00, 4.29, 35.71, 0.00, 0.00, 'UNPAID', '2017-08-28', '2017-07-29 05:48:13'),
(24, 18, 5, '2017-07-29', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 300.00, 32.14, 267.86, 0.00, 0.00, 'UNPAID', '2017-08-28', '2017-07-29 05:49:22'),
(25, 19, 7, '2017-07-29', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 7204.50, 771.91, 6432.59, 0.10, 0.00, 'CANCELLED', '2017-08-13', '2017-07-29 06:25:50'),
(26, 20, 1, '2017-07-29', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 2940.50, 315.05, 2625.45, 0.00, 0.00, 'UNPAID', '2017-08-28', '2017-07-29 07:32:40'),
(27, 21, 1, '2017-08-02', 'Omelda, Darios A.. ', 'Omelda, Darios A.. ', 12, 2632.09, 282.01, 2350.09, 0.03, 0.00, 'UNPAID', '2017-09-01', '2017-08-02 02:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salesdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_salesdetails` (
  `id` int(11) NOT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(11,2) NOT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_salesdetails`
--

INSERT INTO `tbl_salesdetails` (`id`, `sales_no`, `prod_id`, `quantity`, `price`, `amount`, `timestamp`) VALUES
(1, 6, 3, 12, 0.00, 3600.00, '2017-07-15 10:33:03'),
(4, 7, 3, 88, 0.00, 26400.00, '2017-07-15 10:49:13'),
(5, 9, 3, 12, 0.00, 3600.00, '2017-07-15 13:28:43'),
(6, 9, 4, 12, 0.00, 1200.00, '2017-07-15 13:29:42'),
(9, 11, 1, 1, 0.00, 950.25, '2017-07-26 02:15:09'),
(14, 12, 1, 2, 300.00, 600.00, '2017-07-26 23:11:46'),
(18, 13, 1, 5, 500.25, 2501.25, '2017-07-27 04:55:56'),
(19, 13, 3, 5, 300.00, 1500.00, '2017-07-27 04:56:00'),
(21, 13, 4, 2, 200.00, 400.00, '2017-07-27 05:02:27'),
(22, 14, 8, 1, 100.00, 100.00, '2017-07-28 05:07:28'),
(23, 14, 7, 1, 250.00, 250.00, '2017-07-28 05:07:51'),
(24, 14, 4, 1, 100.00, 100.00, '2017-07-28 05:07:55'),
(25, 14, 3, 1, 300.00, 300.00, '2017-07-28 05:07:58'),
(26, 14, 5, 1, 150.75, 150.75, '2017-07-28 05:08:02'),
(27, 14, 1, 1, 950.25, 950.25, '2017-07-28 05:08:06'),
(28, 15, 7, 1, 250.00, 250.00, '2017-07-28 05:41:20'),
(32, 16, 7, 5, 250.00, 1250.00, '2017-07-28 06:05:11'),
(33, 17, 3, 2, 20.00, 40.00, '2017-07-29 05:47:45'),
(34, 18, 3, 1, 300.00, 300.00, '2017-07-29 05:49:21'),
(47, 20, 4, 2, 120.00, 240.00, '2017-07-29 07:31:17'),
(48, 20, 7, 2, 350.00, 700.00, '2017-07-29 07:31:24'),
(49, 20, 1, 2, 1000.25, 2000.50, '2017-07-29 07:31:39'),
(50, 21, 5, 18, 150.75, 2713.50, '2017-08-02 02:26:22');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_status`
--
CREATE TABLE IF NOT EXISTS `tbl_status` (
`status` varchar(45)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(45) DEFAULT NULL,
  `sup_address` varchar(45) DEFAULT NULL,
  `sup_compName` varchar(45) DEFAULT NULL,
  `sup_telNo` int(13) DEFAULT NULL,
  `sup_email` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE IF NOT EXISTS `tbl_useraccounts` (
  `uid` int(11) NOT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`uid`, `lname`, `password`, `timestamp`) VALUES
(5, 'Omelda', '$2y$10$REQwAUbSjQKTtPNGpc.IZO0hW2UsbFGDh.03VkknzRsX7asMA7c1e', '2017-05-30 08:40:33'),
(11, 'Barro Jr.', 'barro', '2017-06-30 14:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE IF NOT EXISTS `tbl_year` (
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`year`) VALUES
(2017);

-- --------------------------------------------------------

--
-- Structure for view `tbl_expired_products`
--
DROP TABLE IF EXISTS `tbl_expired_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_expired_products` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`expiry_date` <= (curdate() + interval 6 month));

-- --------------------------------------------------------

--
-- Structure for view `tbl_monthly_products_out`
--
DROP TABLE IF EXISTS `tbl_monthly_products_out`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_products_out` AS select sum(`tbl_salesdetails`.`quantity`) AS `Total`,monthname(`tbl_salesdetails`.`timestamp`) AS `Month`,year(`tbl_salesdetails`.`timestamp`) AS `Year` from `tbl_salesdetails` group by month(`tbl_salesdetails`.`timestamp`);

-- --------------------------------------------------------

--
-- Structure for view `tbl_monthly_sales_report`
--
DROP TABLE IF EXISTS `tbl_monthly_sales_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_sales_report` AS select sum(`tbl_sales`.`total_sales`) AS `Total`,monthname(`tbl_sales`.`dates`) AS `MONTH`,year(`tbl_sales`.`dates`) AS `Year` from `tbl_sales` where (`tbl_sales`.`status` <> 'CANCELLED') group by month(`tbl_sales`.`dates`);

-- --------------------------------------------------------

--
-- Structure for view `tbl_outofstocks`
--
DROP TABLE IF EXISTS `tbl_outofstocks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_outofstocks` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`status` AS `status`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`quantity` = 0);

-- --------------------------------------------------------

--
-- Structure for view `tbl_overdue`
--
DROP TABLE IF EXISTS `tbl_overdue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_overdue` AS select `tbl_sales`.`sales_id` AS `sales_id`,`tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,`tbl_sales`.`dates` AS `dates`,`tbl_sales`.`prepared_by` AS `prepared_by`,`tbl_sales`.`checked_by` AS `checked_by`,`tbl_sales`.`VAT` AS `VAT`,`tbl_sales`.`total_amount` AS `total_amount`,`tbl_sales`.`total_sales` AS `total_sales`,`tbl_sales`.`amount_net` AS `amount_net`,`tbl_sales`.`status` AS `status`,`tbl_sales`.`due_date` AS `due_date`,`tbl_sales`.`timestamp` AS `timestamp` from `tbl_sales` where ((`tbl_sales`.`status` <> 'PAID') and (cast(`tbl_sales`.`due_date` as date) <= curdate()));

-- --------------------------------------------------------

--
-- Structure for view `tbl_status`
--
DROP TABLE IF EXISTS `tbl_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_status` AS select `tbl_sales`.`status` AS `status`,count(0) AS `total` from `tbl_sales` where (`tbl_sales`.`status` = `tbl_sales`.`status`) group by `tbl_sales`.`status`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_CM`
--
ALTER TABLE `tbl_CM`
  ADD PRIMARY KEY (`cm_no`),
  ADD KEY `cm_id` (`cm_id`);

--
-- Indexes for table `tbl_CMdetails`
--
ALTER TABLE `tbl_CMdetails`
  ADD PRIMARY KEY (`cmd_id`);

--
-- Indexes for table `tbl_collections`
--
ALTER TABLE `tbl_collections`
  ADD PRIMARY KEY (`col_id`),
  ADD KEY `col_id` (`col_id`);

--
-- Indexes for table `tbl_CR`
--
ALTER TABLE `tbl_CR`
  ADD PRIMARY KEY (`cr_no`),
  ADD KEY `col_id` (`cr_id`);

--
-- Indexes for table `tbl_CRdetails`
--
ALTER TABLE `tbl_CRdetails`
  ADD PRIMARY KEY (`crd_id`),
  ADD KEY `crd_id` (`crd_id`);

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
-- Indexes for table `tbl_PO`
--
ALTER TABLE `tbl_PO`
  ADD PRIMARY KEY (`po_no`);

--
-- Indexes for table `tbl_POdetails`
--
ALTER TABLE `tbl_POdetails`
  ADD PRIMARY KEY (`pod_no`);

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
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`sup_id`);

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
-- AUTO_INCREMENT for table `tbl_CMdetails`
--
ALTER TABLE `tbl_CMdetails`
  MODIFY `cmd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_collections`
--
ALTER TABLE `tbl_collections`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_CR`
--
ALTER TABLE `tbl_CR`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_paymentsdetails`
--
ALTER TABLE `tbl_paymentsdetails`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_PO`
--
ALTER TABLE `tbl_PO`
  MODIFY `po_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_POdetails`
--
ALTER TABLE `tbl_POdetails`
  MODIFY `pod_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_salesdetails`
--
ALTER TABLE `tbl_salesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
