DROP TABLE IF EXISTS tbl_CM;

CREATE TABLE `tbl_CM` (
  `cm_id` int(11) DEFAULT NULL,
  `cm_no` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `cm_reason` text,
  `cm_date` date DEFAULT NULL,
  `cm_totalAmount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cm_no`),
  KEY `cm_id` (`cm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_CMdetails;

CREATE TABLE `tbl_CMdetails` (
  `cmd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_no` int(11) DEFAULT NULL,
  `cmd_particulars` varchar(45) DEFAULT NULL,
  `cmd_qty` int(11) DEFAULT NULL,
  `cmd_price` float(11,2) DEFAULT NULL,
  `cmd_amount` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`cmd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_CR;

CREATE TABLE `tbl_CR` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_no` int(11) NOT NULL,
  `cr_date` date DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `cr_totalSales` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cr_no`),
  KEY `col_id` (`cr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_CR VALUES("1","2","2017-08-01","1","1500.25","2017-08-01 15:33:00");


DROP TABLE IF EXISTS tbl_CRdetails;

CREATE TABLE `tbl_CRdetails` (
  `crd_id` int(11) NOT NULL,
  `cr_no` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`crd_id`),
  KEY `crd_id` (`crd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_CRdetails VALUES("1","2","2","1500.25","2017-08-01 15:33:37");


DROP TABLE IF EXISTS tbl_PO;

CREATE TABLE `tbl_PO` (
  `po_no` int(11) NOT NULL AUTO_INCREMENT,
  `sup_id` varchar(45) DEFAULT NULL,
  `po_totalAmount` float(11,2) NOT NULL,
  `po_date` date DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`po_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_POdetails;

CREATE TABLE `tbl_POdetails` (
  `pod_no` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` int(11) DEFAULT NULL,
  `prod_name` varchar(45) DEFAULT NULL,
  `prod_description` text,
  `prod_packing` varchar(45) DEFAULT NULL,
  `prod_maker` varchar(45) DEFAULT NULL,
  `prod_price` varchar(45) DEFAULT NULL,
  `prod_qty` varchar(45) DEFAULT NULL,
  `prod_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pod_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_category;

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO tbl_category VALUES("1","CNA C/A","2017-08-03 09:23:20");
INSERT INTO tbl_category VALUES("2","ECS C/A","2017-08-03 09:28:19");
INSERT INTO tbl_category VALUES("3","REBATES AND FLAPS","2017-08-03 09:28:19");
INSERT INTO tbl_category VALUES("4","ADS AND PROMO","2017-08-03 09:28:19");
INSERT INTO tbl_category VALUES("5","FUEL AND OIL","2017-08-03 09:28:19");
INSERT INTO tbl_category VALUES("6","REPAIR AND MAINTENANCE","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("7","MEAL ALLOWANCE","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("8","FARE AND TRANSPORTATION","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("9","MISC.","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("10","TAXES AND LICENSES","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("11","FREIGHT AND HANDLING","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("12","SALARIES AND WAGES","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("13","OFFICE SUPPLIES","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("14","LIGHT AND WATER","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("15","TELECOMMUNICATIONS","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("16","GOLDEN RENTAL","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("17","MCKLINE RENTAL","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("18","PHILHEALTH","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("19","OZAMIS-CHECK REIMBURSEMENT","2017-08-03 09:28:20");
INSERT INTO tbl_category VALUES("20","ALEX VILLANUEVA EXPENSES","2017-08-03 09:28:20");


DROP TABLE IF EXISTS tbl_collections;

CREATE TABLE `tbl_collections` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`col_id`),
  KEY `col_id` (`col_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_customers;

CREATE TABLE `tbl_customers` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(45) DEFAULT NULL,
  `tin` int(11) DEFAULT NULL,
  `terms` varchar(45) DEFAULT NULL,
  `opidno` varchar(45) DEFAULT NULL,
  `bstyle` varchar(45) DEFAULT NULL,
  `address` text,
  `discount1` float(11,2) NOT NULL,
  `discount2` float(11,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tbl_customers VALUES("1","Lyjieme Barro","101199","30 days","abc123","Whole Saler","Brgy 24-A Gingoog City","0.00","0.00","2017-07-27 16:17:59");
INSERT INTO tbl_customers VALUES("2","Mary Jane T. Barro","91170","40 days","dce345","Whole Saler","Brgy 24-A Gingoog City","0.00","0.00","2017-07-27 16:17:59");
INSERT INTO tbl_customers VALUES("3","Napoleon","12269","50 days","efc443","Whole Saler","Brgy 24-A Gingoog City","0.00","0.00","2017-07-27 16:17:59");
INSERT INTO tbl_customers VALUES("4","Mercury Drug Store","101199","30 Days","PIC120","Whole Saler","Iligan City","0.00","0.00","2017-07-27 16:18:43");
INSERT INTO tbl_customers VALUES("5","Jellie","23455","30 Days","","Whole Sale","Brgy. 18-A Gingoog City","0.00","0.00","2017-07-29 13:46:07");
INSERT INTO tbl_customers VALUES("6","Gerard Mandam","0","30 Days","","Whole Saler","Gingoog City","0.00","0.00","2017-07-29 14:23:18");
INSERT INTO tbl_customers VALUES("7","Justine Joy Botero","0","15 Days","","Whole Sale","Gingoog City, SAA","10.00","0.00","2017-07-29 14:24:16");


DROP TABLE IF EXISTS tbl_employee;

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(45) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lname`),
  KEY `emp_id` (`emp_id`),
  KEY `emp_id_2` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO tbl_employee VALUES("18","Bacus","Jellie Rose","Quta","Staff","2017-07-10 13:25:02");
INSERT INTO tbl_employee VALUES("17","Barro Jr.","Napoleon","Cominguez","Staff","2017-06-06 22:29:19");
INSERT INTO tbl_employee VALUES("16","Omelda","Darios","A.","Manager","2017-05-30 16:40:23");


DROP TABLE IF EXISTS tbl_expenses;

CREATE TABLE `tbl_expenses` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `ex_custName` varchar(45) DEFAULT NULL,
  `ex_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_expired_products;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_expired_products` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`expiry_date` <= (curdate() + interval 6 month));

INSERT INTO tbl_expired_products VALUES("1","Mefenamic Acid","NON-STEROIDAL ANTI-INFLAMMATORY DRUG","950.25","2018-01-01","0","500 mg Tablet","090","2017-07-04 23:27:55");
INSERT INTO tbl_expired_products VALUES("2","Neozep","For sneezing and cough.","1500.00","2017-07-07","0","60mg","123abc","2017-07-07 20:32:01");
INSERT INTO tbl_expired_products VALUES("3","Neozep","For cough and sneezing.","300.00","2017-07-15","79","500mg","abc123","2017-07-15 18:32:49");


DROP TABLE IF EXISTS tbl_monthly_products_out;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_products_out` AS select sum(`tbl_salesdetails`.`quantity`) AS `Total`,monthname(`tbl_salesdetails`.`timestamp`) AS `Month`,year(`tbl_salesdetails`.`timestamp`) AS `Year` from `tbl_salesdetails` group by month(`tbl_salesdetails`.`timestamp`);

INSERT INTO tbl_monthly_products_out VALUES("160","July","2017");
INSERT INTO tbl_monthly_products_out VALUES("27","August","2017");


DROP TABLE IF EXISTS tbl_monthly_sales_report;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_sales_report` AS select sum(`tbl_sales`.`total_sales`) AS `Total`,monthname(`tbl_sales`.`dates`) AS `MONTH`,year(`tbl_sales`.`dates`) AS `Year` from `tbl_sales` where (`tbl_sales`.`status` <> 'CANCELLED') group by month(`tbl_sales`.`dates`);

INSERT INTO tbl_monthly_sales_report VALUES("5123.04","July","2017");
INSERT INTO tbl_monthly_sales_report VALUES("1198.32","August","2017");


DROP TABLE IF EXISTS tbl_outofstocks;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_outofstocks` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`status` AS `status`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`quantity` = 0);

INSERT INTO tbl_outofstocks VALUES("1","Mefenamic Acid","NON-STEROIDAL ANTI-INFLAMMATORY DRUG","950.25","2018-01-01","0","500 mg Tablet","090","OUT OF STOCKS","2017-07-04 23:27:55");
INSERT INTO tbl_outofstocks VALUES("2","Neozep","For sneezing and cough.","1500.00","2017-07-07","0","60mg","123abc","OUT OF STOCKS","2017-07-07 20:32:01");
INSERT INTO tbl_outofstocks VALUES("6","Carlidox","Doxycycline ","150.00","2019-04-30","0","100 MG Capsule","FC012","OUT OF STOCKS","2017-07-26 10:40:36");


DROP TABLE IF EXISTS tbl_overdue;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_overdue` AS select `tbl_sales`.`sales_id` AS `sales_id`,`tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,`tbl_sales`.`dates` AS `dates`,`tbl_sales`.`prepared_by` AS `prepared_by`,`tbl_sales`.`checked_by` AS `checked_by`,`tbl_sales`.`VAT` AS `VAT`,`tbl_sales`.`total_amount` AS `total_amount`,`tbl_sales`.`total_sales` AS `total_sales`,`tbl_sales`.`amount_net` AS `amount_net`,`tbl_sales`.`status` AS `status`,`tbl_sales`.`due_date` AS `due_date`,`tbl_sales`.`timestamp` AS `timestamp` from `tbl_sales` where ((`tbl_sales`.`status` <> 'PAID') and (cast(`tbl_sales`.`due_date` as date) <= curdate()));

INSERT INTO tbl_overdue VALUES("1","1","1","2017-07-04","Omelda, Darios A.. ","Omelda, Darios A.. ","12","1900.50","228.06","1672.44","CANCELLED","2017-08-03","2017-07-04 23:29:47");


DROP TABLE IF EXISTS tbl_payments;

CREATE TABLE `tbl_payments` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_no` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `pay_type` varchar(45) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `balance` float(11,2) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_payments VALUES("1","1","1","Cash","1000.00","900.50","2017-07-04 23:30:40");


DROP TABLE IF EXISTS tbl_paymentsdetails;

CREATE TABLE `tbl_paymentsdetails` (
  `pd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_id` int(11) NOT NULL,
  `pay_type` varchar(45) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_paymentsdetails VALUES("1","1","Cash","1000.00","2017-07-04 23:30:40");


DROP TABLE IF EXISTS tbl_products;

CREATE TABLE `tbl_products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `lot_no` varchar(45) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ACTIVE',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tbl_products VALUES("1","Mefenamic Acid","NON-STEROIDAL ANTI-INFLAMMATORY DRUG","950.25","2018-01-01","0","500 mg Tablet","090","OUT OF STOCKS","2017-07-04 23:27:55");
INSERT INTO tbl_products VALUES("2","Neozep","For sneezing and cough.","1500.00","2017-07-07","0","60mg","123abc","OUT OF STOCKS","2017-07-07 20:32:01");
INSERT INTO tbl_products VALUES("3","Neozep","For cough and sneezing.","300.00","2017-07-15","79","500mg","abc123","EXPIRING","2017-07-15 18:32:49");
INSERT INTO tbl_products VALUES("4","Neozep","","100.00","2019-01-02","83","600mg","1bc246","ACTIVE","2017-07-15 18:53:22");
INSERT INTO tbl_products VALUES("5","Multivitamins","For health.","150.75","2019-09-01","1","500mg","abc-123a","ACTIVE","2017-07-22 12:30:09");
INSERT INTO tbl_products VALUES("6","Carlidox","Doxycycline ","150.00","2019-04-30","0","100 MG Capsule","FC012","OUT OF STOCKS","2017-07-26 10:40:36");
INSERT INTO tbl_products VALUES("7","Neozep","Solmux","250.00","2019-11-30","1","150mg","1033BC","ACTIVE","2017-07-27 15:21:01");
INSERT INTO tbl_products VALUES("8","Neozep","Solmux","100.00","2019-07-31","99","100mg Tablet","1bc123","ACTIVE","2017-07-27 15:21:42");


DROP TABLE IF EXISTS tbl_sales;

CREATE TABLE `tbl_sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_no`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO tbl_sales VALUES("1","1","1","2017-07-04","Omelda, Darios A.. ","Omelda, Darios A.. ","12","1900.50","228.06","1672.44","0.00","0.00","CANCELLED","2017-08-03","2017-07-04 23:29:47");
INSERT INTO tbl_sales VALUES("2","2","1","2017-08-01","Omelda, Darios A.. ","Omelda, Darios A.. ","12","2850.75","342.09","2508.66","0.00","0.00","CANCELLED","2017-08-31","2017-07-04 23:56:05");
INSERT INTO tbl_sales VALUES("3","3","1","2017-07-05","Omelda, Darios A.. ","Omelda, Darios A.. ","12","950.25","114.03","836.22","0.00","0.00","CANCELLED","2017-08-04","2017-07-05 07:01:51");
INSERT INTO tbl_sales VALUES("4","4","1","2017-07-05","Omelda, Darios A.. ","Omelda, Darios A.. ","12","4751.25","570.15","4181.10","0.00","0.00","CANCELLED","2017-08-04","2017-07-05 12:59:15");
INSERT INTO tbl_sales VALUES("6","5","1","2017-07-10","Omelda, Darios A.. ","Omelda, Darios A.. ","12","9502.50","1140.30","8362.20","0.00","0.00","CANCELLED","2017-08-09","2017-07-10 13:35:37");
INSERT INTO tbl_sales VALUES("7","6","1","2017-07-15","Omelda, Darios A.. ","Omelda, Darios A.. ","12","3600.00","432.00","3168.00","0.00","0.00","UNPAID","2017-08-14","2017-07-15 18:33:05");
INSERT INTO tbl_sales VALUES("8","7","1","2017-07-15","Omelda, Darios A.. ","Omelda, Darios A.. ","12","26400.00","2828.57","23571.43","0.00","0.00","UNPAID","2017-08-14","2017-07-15 18:49:17");
INSERT INTO tbl_sales VALUES("9","8","2","2017-07-15","Omelda, Darios A.. ","Omelda, Darios A.. ","12","4.00","514.29","4285.71","0.00","0.00","CANCELLED","2017-08-14","2017-07-15 20:06:56");
INSERT INTO tbl_sales VALUES("10","9","4","2017-07-15","Bridget Alcantara","Cerilo Alcantara","12","4800.00","514.29","4285.71","0.00","0.00","UNPAID","2017-09-03","2017-07-15 21:31:04");
INSERT INTO tbl_sales VALUES("11","10","1","2017-07-26","Omelda, Darios A.. ","Omelda, Darios A.. ","12","1809.00","193.82","1615.18","0.00","0.00","CANCELLED","2017-08-25","2017-07-26 09:31:02");
INSERT INTO tbl_sales VALUES("12","11","1","2017-07-26","Omelda, Darios A.. ","Omelda, Darios A.. ","12","950.25","101.81","848.44","0.00","0.00","UNPAID","2017-08-25","2017-07-26 11:10:51");
INSERT INTO tbl_sales VALUES("13","12","1","2017-07-27","Omelda, Darios A.. ","Omelda, Darios A.. ","12","600.00","64.29","535.71","0.00","0.00","UNPAID","2017-08-26","2017-07-27 09:34:10");
INSERT INTO tbl_sales VALUES("14","13","1","2017-07-27","Omelda, Darios A.. ","Omelda, Darios A.. ","12","4401.25","471.56","3929.69","0.00","0.00","UNPAID","2017-08-26","2017-07-27 13:03:53");
INSERT INTO tbl_sales VALUES("15","14","1","2017-07-28","Omelda, Darios A.. ","Omelda, Darios A.. ","12","1851.00","198.32","1652.68","0.00","0.00","UNPAID","2017-08-27","2017-07-28 13:40:36");
INSERT INTO tbl_sales VALUES("16","15","1","2017-07-28","Omelda, Darios A.. ","Omelda, Darios A.. ","12","250.00","26.79","223.21","0.00","0.00","UNPAID","2017-08-27","2017-07-28 13:41:24");
INSERT INTO tbl_sales VALUES("22","16","3","2017-07-28","Omelda, Darios A.. ","Omelda, Darios A.. ","12","1250.00","133.93","1116.07","0.00","0.00","UNPAID","2017-09-16","2017-07-28 14:05:12");
INSERT INTO tbl_sales VALUES("23","17","1","2017-07-29","Omelda, Darios A.. ","Omelda, Darios A.. ","12","40.00","4.29","35.71","0.00","0.00","UNPAID","2017-08-28","2017-07-29 13:48:13");
INSERT INTO tbl_sales VALUES("24","18","5","2017-07-29","Omelda, Darios A.. ","Omelda, Darios A.. ","12","300.00","32.14","267.86","0.00","0.00","UNPAID","2017-08-28","2017-07-29 13:49:22");
INSERT INTO tbl_sales VALUES("25","19","7","2017-07-29","Omelda, Darios A.. ","Omelda, Darios A.. ","12","7204.50","771.91","6432.59","0.10","0.00","CANCELLED","2017-08-13","2017-07-29 14:25:50");
INSERT INTO tbl_sales VALUES("26","20","1","2017-07-29","Omelda, Darios A.. ","Omelda, Darios A.. ","12","2940.50","315.05","2625.45","0.00","0.00","UNPAID","2017-08-28","2017-07-29 15:32:40");
INSERT INTO tbl_sales VALUES("27","21","1","2017-08-02","Omelda, Darios A.. ","Omelda, Darios A.. ","12","2632.09","282.01","2350.09","0.03","0.00","UNPAID","2017-09-01","2017-08-02 10:26:31");
INSERT INTO tbl_sales VALUES("28","22","1","2017-08-02","Omelda, Darios A.. ","Omelda, Darios A.. ","12","8552.25","916.31","7635.94","0.00","0.00","UNPAID","2017-09-01","2017-08-02 21:56:33");


DROP TABLE IF EXISTS tbl_salesdetails;

CREATE TABLE `tbl_salesdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_no` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(11,2) NOT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

INSERT INTO tbl_salesdetails VALUES("1","6","3","12","0.00","3600.00","2017-07-15 18:33:03");
INSERT INTO tbl_salesdetails VALUES("4","7","3","88","0.00","26400.00","2017-07-15 18:49:13");
INSERT INTO tbl_salesdetails VALUES("5","9","3","12","0.00","3600.00","2017-07-15 21:28:43");
INSERT INTO tbl_salesdetails VALUES("6","9","4","12","0.00","1200.00","2017-07-15 21:29:42");
INSERT INTO tbl_salesdetails VALUES("9","11","1","1","0.00","950.25","2017-07-26 10:15:09");
INSERT INTO tbl_salesdetails VALUES("14","12","1","2","300.00","600.00","2017-07-27 07:11:46");
INSERT INTO tbl_salesdetails VALUES("18","13","1","5","500.25","2501.25","2017-07-27 12:55:56");
INSERT INTO tbl_salesdetails VALUES("19","13","3","5","300.00","1500.00","2017-07-27 12:56:00");
INSERT INTO tbl_salesdetails VALUES("21","13","4","2","200.00","400.00","2017-07-27 13:02:27");
INSERT INTO tbl_salesdetails VALUES("22","14","8","1","100.00","100.00","2017-07-28 13:07:28");
INSERT INTO tbl_salesdetails VALUES("23","14","7","1","250.00","250.00","2017-07-28 13:07:51");
INSERT INTO tbl_salesdetails VALUES("24","14","4","1","100.00","100.00","2017-07-28 13:07:55");
INSERT INTO tbl_salesdetails VALUES("25","14","3","1","300.00","300.00","2017-07-28 13:07:58");
INSERT INTO tbl_salesdetails VALUES("26","14","5","1","150.75","150.75","2017-07-28 13:08:02");
INSERT INTO tbl_salesdetails VALUES("27","14","1","1","950.25","950.25","2017-07-28 13:08:06");
INSERT INTO tbl_salesdetails VALUES("28","15","7","1","250.00","250.00","2017-07-28 13:41:20");
INSERT INTO tbl_salesdetails VALUES("32","16","7","5","250.00","1250.00","2017-07-28 14:05:11");
INSERT INTO tbl_salesdetails VALUES("33","17","3","2","20.00","40.00","2017-07-29 13:47:45");
INSERT INTO tbl_salesdetails VALUES("34","18","3","1","300.00","300.00","2017-07-29 13:49:21");
INSERT INTO tbl_salesdetails VALUES("47","20","4","2","120.00","240.00","2017-07-29 15:31:17");
INSERT INTO tbl_salesdetails VALUES("48","20","7","2","350.00","700.00","2017-07-29 15:31:24");
INSERT INTO tbl_salesdetails VALUES("49","20","1","2","1000.25","2000.50","2017-07-29 15:31:39");
INSERT INTO tbl_salesdetails VALUES("50","21","5","18","150.75","2713.50","2017-08-02 10:26:22");
INSERT INTO tbl_salesdetails VALUES("51","22","1","9","950.25","8552.25","2017-08-02 21:56:30");


DROP TABLE IF EXISTS tbl_status;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_status` AS select `tbl_sales`.`status` AS `status`,count(0) AS `total` from `tbl_sales` where (`tbl_sales`.`status` = `tbl_sales`.`status`) group by `tbl_sales`.`status`;

INSERT INTO tbl_status VALUES("CANCELLED","8");
INSERT INTO tbl_status VALUES("UNPAID","14");


DROP TABLE IF EXISTS tbl_supplier;

CREATE TABLE `tbl_supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(45) DEFAULT NULL,
  `sup_address` varchar(45) DEFAULT NULL,
  `sup_compName` varchar(45) DEFAULT NULL,
  `sup_telNo` int(13) DEFAULT NULL,
  `sup_email` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_useraccounts;

CREATE TABLE `tbl_useraccounts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `lname_UNIQUE` (`lname`),
  CONSTRAINT `lname` FOREIGN KEY (`lname`) REFERENCES `tbl_employee` (`lname`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tbl_useraccounts VALUES("5","Omelda","$2y$10$REQwAUbSjQKTtPNGpc.IZO0hW2UsbFGDh.03VkknzRsX7asMA7c1e","2017-05-30 16:40:33");


DROP TABLE IF EXISTS tbl_year;

CREATE TABLE `tbl_year` (
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_year VALUES("2017");


