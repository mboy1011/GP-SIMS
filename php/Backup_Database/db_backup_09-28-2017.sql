DROP TABLE IF EXISTS tbl_CM;

CREATE TABLE `tbl_CM` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_no` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `cm_reason` text,
  `cm_date` date DEFAULT NULL,
  `cm_totalAmount` float(11,2) DEFAULT NULL,
  `salesman` varchar(45) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cm_no`),
  KEY `cm_id` (`cm_id`),
  KEY `cm_id_2` (`cm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_CMdetails;

CREATE TABLE `tbl_CMdetails` (
  `cmd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_no` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `cmd_qty` int(11) DEFAULT NULL,
  `cmd_price` float(11,2) DEFAULT NULL,
  `cmd_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cmd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_CR;

CREATE TABLE `tbl_CR` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_no` int(11) NOT NULL,
  `cr_date` date DEFAULT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `cr_totalSales` float(11,2) DEFAULT NULL,
  `pay_type` varchar(10) NOT NULL,
  `check_no` int(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cr_no`),
  KEY `col_id` (`cr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_CRdetails;

CREATE TABLE `tbl_CRdetails` (
  `crd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_no` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`crd_id`),
  KEY `crd_id` (`crd_id`),
  KEY `crd_id_2` (`crd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_PO;

CREATE TABLE `tbl_PO` (
  `po_no` int(11) NOT NULL AUTO_INCREMENT,
  `sup_id` int(11) DEFAULT NULL,
  `po_totalAmount` float(11,2) NOT NULL,
  `po_date` date DEFAULT NULL,
  `noted_by` text NOT NULL,
  `prepare_by` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`po_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_POdetails;

CREATE TABLE `tbl_POdetails` (
  `pod_no` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` int(11) DEFAULT NULL,
  `prod_name` text,
  `prod_maker` varchar(45) DEFAULT NULL,
  `prod_price` varchar(45) DEFAULT NULL,
  `prod_qty` varchar(45) DEFAULT NULL,
  `prod_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pod_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_SOA;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_SOA` AS select `tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,date_format(`tbl_sales`.`dates`,'%m-%d-%Y') AS `dates`,`tbl_sales`.`due_date` AS `due_date`,`tbl_customers`.`terms` AS `terms`,`tbl_sales`.`total_amount` AS `total`,(select ifnull(sum(`tbl_CM`.`cm_totalAmount`),0) from `tbl_CM` where (`tbl_CM`.`sales_no` = `tbl_sales`.`sales_no`)) AS `DEBIT`,(select ifnull(sum(`tbl_CRdetails`.`amount`),0) from `tbl_CRdetails` where (`tbl_CRdetails`.`sales_no` = `tbl_sales`.`sales_no`)) AS `CREDIT`,`tbl_sales`.`status` AS `status`,format(((`tbl_sales`.`total_amount` - (select ifnull(sum(`tbl_CM`.`cm_totalAmount`),0) from `tbl_CM` where (`tbl_CM`.`sales_no` = `tbl_sales`.`sales_no`))) - (select ifnull(sum(`tbl_CRdetails`.`amount`),0) from `tbl_CRdetails` where (`tbl_CRdetails`.`sales_no` = `tbl_sales`.`sales_no`))),2) AS `BALANCE` from (`tbl_sales` join `tbl_customers` on((`tbl_customers`.`cus_id` = `tbl_sales`.`cus_id`)));



DROP TABLE IF EXISTS tbl_category;

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO tbl_employee VALUES("0","Admin","","","","2017-09-26 21:01:00");
INSERT INTO tbl_employee VALUES("18","Bacus","Jellie Rose","Quta","Staff","2017-07-10 13:25:02");
INSERT INTO tbl_employee VALUES("19","Barro","Lyjieme","Tomaquin","Member","2017-09-27 16:17:30");
INSERT INTO tbl_employee VALUES("17","Barro Jr.","Napoleon","Cominguez","Staff","2017-06-06 22:29:19");
INSERT INTO tbl_employee VALUES("16","Omelda","Dario","Q.","Manager","2017-05-30 16:40:23");


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



DROP TABLE IF EXISTS tbl_expensesLast;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_expensesLast` AS select `tbl_expenses`.`ex_id` AS `ex_id`,`tbl_expenses`.`cat_id` AS `cat_id`,`tbl_expenses`.`ex_date` AS `ex_date`,`tbl_expenses`.`ex_custName` AS `ex_custName`,`tbl_expenses`.`ex_amount` AS `ex_amount`,`tbl_expenses`.`timestamp` AS `timestamp` from `tbl_expenses` where (`tbl_expenses`.`ex_date` <= curdate());



DROP TABLE IF EXISTS tbl_expensesToday;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_expensesToday` AS select `tbl_expenses`.`ex_id` AS `ex_id`,`tbl_expenses`.`cat_id` AS `cat_id`,`tbl_expenses`.`ex_date` AS `ex_date`,`tbl_expenses`.`ex_custName` AS `ex_custName`,`tbl_expenses`.`ex_amount` AS `ex_amount`,`tbl_expenses`.`timestamp` AS `timestamp` from `tbl_expenses` where (`tbl_expenses`.`ex_date` = curdate());



DROP TABLE IF EXISTS tbl_expired_products;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_expired_products` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`expiry_date` <= (curdate() + interval 12 month));



DROP TABLE IF EXISTS tbl_monthly_expenses;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_expenses` AS select sum(`tbl_expenses`.`ex_amount`) AS `Total`,monthname(`tbl_expenses`.`ex_date`) AS `MONTH`,year(`tbl_expenses`.`ex_date`) AS `Year` from `tbl_expenses` group by month(`tbl_expenses`.`ex_date`);



DROP TABLE IF EXISTS tbl_monthly_income;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_income` AS select sum(`tbl_CR`.`cr_totalSales`) AS `Total`,monthname(`tbl_CR`.`cr_date`) AS `Month`,year(`tbl_CR`.`cr_date`) AS `Year` from `tbl_CR` group by month(`tbl_CR`.`cr_date`);



DROP TABLE IF EXISTS tbl_monthly_products_out;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_products_out` AS select sum(`tbl_salesdetails`.`quantity`) AS `Total`,monthname(`tbl_salesdetails`.`timestamp`) AS `Month`,year(`tbl_salesdetails`.`timestamp`) AS `Year` from `tbl_salesdetails` group by month(`tbl_salesdetails`.`timestamp`);



DROP TABLE IF EXISTS tbl_monthly_sales_report;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_sales_report` AS select sum(`tbl_sales`.`total_sales`) AS `Total`,monthname(`tbl_sales`.`dates`) AS `MONTH`,year(`tbl_sales`.`dates`) AS `Year` from `tbl_sales` where (`tbl_sales`.`status` <> 'CANCELLED') group by month(`tbl_sales`.`dates`);



DROP TABLE IF EXISTS tbl_outofstocks;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_outofstocks` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`status` AS `status`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`quantity` = 0);



DROP TABLE IF EXISTS tbl_overdue;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_overdue` AS select `tbl_sales`.`sales_id` AS `sales_id`,`tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,`tbl_sales`.`dates` AS `dates`,`tbl_sales`.`prepared_by` AS `prepared_by`,`tbl_sales`.`checked_by` AS `checked_by`,`tbl_sales`.`VAT` AS `VAT`,`tbl_sales`.`total_amount` AS `total_amount`,`tbl_sales`.`total_sales` AS `total_sales`,`tbl_sales`.`amount_net` AS `amount_net`,`tbl_sales`.`status` AS `status`,`tbl_sales`.`due_date` AS `due_date`,`tbl_sales`.`timestamp` AS `timestamp` from `tbl_sales` where ((`tbl_sales`.`status` <> 'PAID') and (`tbl_sales`.`status` <> 'CANCELLED') and (cast(`tbl_sales`.`due_date` as date) <= curdate()));



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
  `status` varchar(15) NOT NULL DEFAULT 'STOCKS ON HAND',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
  `status` varchar(45) NOT NULL DEFAULT 'UNPAID',
  `due_date` date NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_no`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_status;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_status` AS select `tbl_sales`.`status` AS `status`,count(0) AS `total` from `tbl_sales` where (`tbl_sales`.`status` = `tbl_sales`.`status`) group by `tbl_sales`.`status`;



DROP TABLE IF EXISTS tbl_supplier;

CREATE TABLE `tbl_supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(45) DEFAULT NULL,
  `sup_address` varchar(45) DEFAULT NULL,
  `sup_compName` varchar(45) DEFAULT NULL,
  `sup_telNo` varchar(13) DEFAULT NULL,
  `sup_email` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS tbl_useraccounts;

CREATE TABLE `tbl_useraccounts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `emp_id_UNIQUE` (`emp_id`),
  CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `tbl_employee` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tbl_useraccounts VALUES("0","0","root","admin","$2y$10$CtRjar6CkH0rRBYi3qndm.qtSUYQOglnrYMd7Bjm7dE3ZuVHVfsRO","2017-09-26 20:59:21");
INSERT INTO tbl_useraccounts VALUES("1","16","admin","admin","$2y$10$REQwAUbSjQKTtPNGpc.IZO0hW2UsbFGDh.03VkknzRsX7asMA7c1e","2017-09-15 17:55:21");
INSERT INTO tbl_useraccounts VALUES("5","19","mboy","user","$2y$10$qKm0ZY/KMd/WWlvf/f8eyeriH/dAjnhu68kh53oC4qiDbwwC9wkZS","2017-09-27 16:24:20");


DROP TABLE IF EXISTS tbl_year;

CREATE TABLE `tbl_year` (
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_year VALUES("2017");


