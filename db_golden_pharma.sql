-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 04:08 AM
-- Server version: 5.6.36
-- PHP Version: 7.1.2

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
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_CM`
--

CREATE TABLE IF NOT EXISTS `tbl_CM` (
  `cm_id` int(11) NOT NULL,
  `cm_no` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `cm_reason` text,
  `cm_date` date DEFAULT NULL,
  `cm_totalAmount` float(11,2) DEFAULT NULL,
  `salesman` varchar(45) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_CMdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_CMdetails` (
  `cmd_id` int(11) NOT NULL,
  `cm_no` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `cmd_qty` int(11) DEFAULT NULL,
  `cmd_price` float(11,2) DEFAULT NULL,
  `cmd_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `cr_totalSales` float(11,2) DEFAULT NULL,
  `pay_type` varchar(10) NOT NULL,
  `check_no` int(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `lname`, `fname`, `mname`, `position`, `timestamp`) VALUES
(0, 'Admin', '', NULL, 'Super Admin', '2017-09-26 13:01:00'),
(16, 'Doe', 'John', 'A.', 'Manager', '2017-05-30 08:40:23'),
(17, 'Doe', 'Jane', 'B.', 'Staff', '2017-06-06 14:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE IF NOT EXISTS `tbl_expenses` (
  `ex_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `ex_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_expensesLast`
--
CREATE TABLE IF NOT EXISTS `tbl_expensesLast` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_expensesToday`
--
CREATE TABLE IF NOT EXISTS `tbl_expensesToday` (
);

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
-- Stand-in structure for view `tbl_monthly_expenses`
--
CREATE TABLE IF NOT EXISTS `tbl_monthly_expenses` (
`Total` double(19,2)
,`MONTH` varchar(9)
,`Year` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_monthly_income`
--
CREATE TABLE IF NOT EXISTS `tbl_monthly_income` (
`Total` double(19,2)
,`Month` varchar(9)
,`Year` int(4)
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
-- Table structure for table `tbl_PO`
--

CREATE TABLE IF NOT EXISTS `tbl_PO` (
  `po_id` int(11) NOT NULL,
  `po_no` int(11) NOT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `po_totalAmount` float(11,2) NOT NULL,
  `po_date` date DEFAULT NULL,
  `noted_by` text NOT NULL,
  `prepare_by` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_POdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_POdetails` (
  `pod_no` int(11) NOT NULL,
  `po_no` int(11) DEFAULT NULL,
  `prod_name` text,
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
  `brand_type` int(11) NOT NULL,
  `price` float(11,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `lot_no` varchar(45) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'STOCKS ON HAND',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `total_discount` float(11,2) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'UNPAID',
  `due_date` date NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbl_SOA`
--
CREATE TABLE IF NOT EXISTS `tbl_SOA` (
`sales_no` int(11)
,`cus_id` int(11)
,`dates` varchar(10)
,`due_date` date
,`terms` varchar(45)
,`total` float(11,2)
,`DEBIT` double(19,2)
,`CREDIT` double
,`status` varchar(45)
,`BALANCE` decimal(11,2)
);

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
  `sup_telNo` varchar(13) DEFAULT NULL,
  `sup_email` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE IF NOT EXISTS `tbl_useraccounts` (
  `uid` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`uid`, `emp_id`, `username`, `usertype`, `password`, `timestamp`) VALUES
(0, 0, 'root', 'admin', '$2y$10$CtRjar6CkH0rRBYi3qndm.qtSUYQOglnrYMd7Bjm7dE3ZuVHVfsRO', '2017-09-26 12:59:21'),
(1, 16, 'admin', 'admin', '$2y$10$REQwAUbSjQKTtPNGpc.IZO0hW2UsbFGDh.03VkknzRsX7asMA7c1e', '2017-09-15 09:55:21'),
(2, 17, 'user', 'user', '$2y$10$uyQn/RL/jIN6fOeYeuUJt.onihvI.WJ82NsAY68ACyXEd/ri8GiIG', '2017-10-06 03:35:05');

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
-- Structure for view `tbl_expensesLast`
--
DROP TABLE IF EXISTS `tbl_expensesLast`;
-- in use(#1356 - View 'db_golden_pharma.tbl_expensesLast' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Structure for view `tbl_expensesToday`
--
DROP TABLE IF EXISTS `tbl_expensesToday`;
-- in use(#1356 - View 'db_golden_pharma.tbl_expensesToday' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Structure for view `tbl_expired_products`
--
DROP TABLE IF EXISTS `tbl_expired_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_expired_products` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`expiry_date` <= (curdate() + interval 12 month));

-- --------------------------------------------------------

--
-- Structure for view `tbl_monthly_expenses`
--
DROP TABLE IF EXISTS `tbl_monthly_expenses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_expenses` AS select sum(`tbl_expenses`.`ex_amount`) AS `Total`,monthname(`tbl_expenses`.`ex_date`) AS `MONTH`,year(`tbl_expenses`.`ex_date`) AS `Year` from `tbl_expenses` group by month(`tbl_expenses`.`ex_date`);

-- --------------------------------------------------------

--
-- Structure for view `tbl_monthly_income`
--
DROP TABLE IF EXISTS `tbl_monthly_income`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_income` AS select sum(`tbl_CR`.`cr_totalSales`) AS `Total`,monthname(`tbl_CR`.`cr_date`) AS `Month`,year(`tbl_CR`.`cr_date`) AS `Year` from `tbl_CR` group by month(`tbl_CR`.`cr_date`);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_outofstocks` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`status` AS `status`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where ((`tbl_products`.`quantity` = 0) and (`tbl_products`.`status` = 'OUT OF STOCKS'));

-- --------------------------------------------------------

--
-- Structure for view `tbl_overdue`
--
DROP TABLE IF EXISTS `tbl_overdue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_overdue` AS select `tbl_sales`.`sales_id` AS `sales_id`,`tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,`tbl_sales`.`dates` AS `dates`,`tbl_sales`.`prepared_by` AS `prepared_by`,`tbl_sales`.`checked_by` AS `checked_by`,`tbl_sales`.`VAT` AS `VAT`,`tbl_sales`.`total_amount` AS `total_amount`,`tbl_sales`.`total_sales` AS `total_sales`,`tbl_sales`.`amount_net` AS `amount_net`,`tbl_sales`.`status` AS `status`,`tbl_sales`.`due_date` AS `due_date`,`tbl_sales`.`timestamp` AS `timestamp` from `tbl_sales` where ((`tbl_sales`.`status` <> 'PAID') and (`tbl_sales`.`status` <> 'CANCELLED') and (cast(`tbl_sales`.`due_date` as date) <= curdate()));

-- --------------------------------------------------------

--
-- Structure for view `tbl_SOA`
--
DROP TABLE IF EXISTS `tbl_SOA`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_SOA` AS select `tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,date_format(`tbl_sales`.`dates`,'%m-%d-%Y') AS `dates`,`tbl_sales`.`due_date` AS `due_date`,`tbl_customers`.`terms` AS `terms`,`tbl_sales`.`total_amount` AS `total`,(select ifnull(sum(`tbl_CM`.`cm_totalAmount`),0) from `tbl_CM` where (`tbl_CM`.`sales_no` = `tbl_sales`.`sales_no`)) AS `DEBIT`,(select ifnull(sum(`tbl_CRdetails`.`amount`),0) from `tbl_CRdetails` where (`tbl_CRdetails`.`sales_no` = `tbl_sales`.`sales_no`)) AS `CREDIT`,`tbl_sales`.`status` AS `status`,cast(((`tbl_sales`.`total_amount` - (select ifnull(sum(`tbl_CM`.`cm_totalAmount`),0) from `tbl_CM` where (`tbl_CM`.`sales_no` = `tbl_sales`.`sales_no`))) - (select ifnull(sum(`tbl_CRdetails`.`amount`),0) from `tbl_CRdetails` where (`tbl_CRdetails`.`sales_no` = `tbl_sales`.`sales_no`))) as decimal(11,2)) AS `BALANCE` from (`tbl_sales` join `tbl_customers` on((`tbl_customers`.`cus_id` = `tbl_sales`.`cus_id`)));

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
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_CM`
--
ALTER TABLE `tbl_CM`
  ADD PRIMARY KEY (`cm_no`),
  ADD KEY `cm_id` (`cm_id`),
  ADD KEY `cm_id_2` (`cm_id`);

--
-- Indexes for table `tbl_CMdetails`
--
ALTER TABLE `tbl_CMdetails`
  ADD PRIMARY KEY (`cmd_id`);

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
  ADD KEY `crd_id` (`crd_id`),
  ADD KEY `crd_id_2` (`crd_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`),
  ADD KEY `emp_id_3` (`emp_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `tbl_PO`
--
ALTER TABLE `tbl_PO`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `tbl_POdetails`
--
ALTER TABLE `tbl_POdetails`
  ADD PRIMARY KEY (`pod_no`),
  ADD KEY `pod_no` (`pod_no`);

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
  ADD UNIQUE KEY `emp_id_UNIQUE` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_CM`
--
ALTER TABLE `tbl_CM`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_CMdetails`
--
ALTER TABLE `tbl_CMdetails`
  MODIFY `cmd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_CR`
--
ALTER TABLE `tbl_CR`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_CRdetails`
--
ALTER TABLE `tbl_CRdetails`
  MODIFY `crd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_PO`
--
ALTER TABLE `tbl_PO`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_POdetails`
--
ALTER TABLE `tbl_POdetails`
  MODIFY `pod_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_salesdetails`
--
ALTER TABLE `tbl_salesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employee` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
