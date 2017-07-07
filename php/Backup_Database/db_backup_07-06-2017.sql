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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_customers VALUES("1","Mercury Drug Store","1234567890","30 Days","ABC234","Whole Saler","Gingoog City","2017-07-04 23:28:47");


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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO tbl_employee VALUES("17","Barro Jr.","Napoleon","Cominguez","Staff","2017-06-06 22:29:19");
INSERT INTO tbl_employee VALUES("16","Omelda","Darios","A.","Manager","2017-05-30 16:40:23");


DROP TABLE IF EXISTS tbl_monthly_products_out;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_products_out` AS select sum(`tbl_salesdetails`.`quantity`) AS `Total`,monthname(`tbl_salesdetails`.`timestamp`) AS `Month`,year(`tbl_salesdetails`.`timestamp`) AS `Year` from `tbl_salesdetails` group by month(`tbl_salesdetails`.`timestamp`);

INSERT INTO tbl_monthly_products_out VALUES("3","July","2017");
INSERT INTO tbl_monthly_products_out VALUES("3","August","2017");


DROP TABLE IF EXISTS tbl_monthly_sales_report;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_monthly_sales_report` AS select sum(`tbl_sales`.`total_sales`) AS `Total`,monthname(`tbl_sales`.`dates`) AS `MONTH`,year(`tbl_sales`.`dates`) AS `Year` from `tbl_sales` where (`tbl_sales`.`status` <> 'CANCELLED') group by month(`tbl_sales`.`dates`);

INSERT INTO tbl_monthly_sales_report VALUES("342.09","July","2017");
INSERT INTO tbl_monthly_sales_report VALUES("342.09","August","2017");


DROP TABLE IF EXISTS tbl_overdue;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_overdue` AS select `tbl_sales`.`sales_id` AS `sales_id`,`tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,`tbl_sales`.`dates` AS `dates`,`tbl_sales`.`prepared_by` AS `prepared_by`,`tbl_sales`.`checked_by` AS `checked_by`,`tbl_sales`.`VAT` AS `VAT`,`tbl_sales`.`total_amount` AS `total_amount`,`tbl_sales`.`total_sales` AS `total_sales`,`tbl_sales`.`amount_net` AS `amount_net`,`tbl_sales`.`status` AS `status`,`tbl_sales`.`due_date` AS `due_date`,`tbl_sales`.`timestamp` AS `timestamp` from `tbl_sales` where ((`tbl_sales`.`status` <> 'PAID') and (cast(`tbl_sales`.`due_date` as date) <= curdate()));



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
  `description` text,
  `price` float(11,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `lot_no` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_products VALUES("1","Mefenamic Acid","NON-STEROIDAL ANTI-INFLAMMATORY DRUG","950.25","2018-11-01","14","500 mg Tablet","090","2017-07-04 23:27:55");


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
  `status` varchar(45) NOT NULL,
  `due_date` date NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_no`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tbl_sales VALUES("1","1","1","2017-07-04","Omelda, Darios A.. ","Omelda, Darios A.. ","12","1900.50","228.06","1672.44","PARTIALLY PAID","2017-08-03","2017-07-04 23:29:47");
INSERT INTO tbl_sales VALUES("2","2","1","2017-08-01","Omelda, Darios A.. ","Omelda, Darios A.. ","12","2850.75","342.09","2508.66","UNPAID","2017-08-31","2017-07-04 23:56:05");
INSERT INTO tbl_sales VALUES("3","3","1","2017-07-05","Omelda, Darios A.. ","Omelda, Darios A.. ","12","950.25","114.03","836.22","UNPAID","2017-08-04","2017-07-05 07:01:51");
INSERT INTO tbl_sales VALUES("4","4","1","2017-07-05","Omelda, Darios A.. ","Omelda, Darios A.. ","12","4751.25","570.15","4181.10","CANCELLED","2017-08-04","2017-07-05 12:59:15");


DROP TABLE IF EXISTS tbl_salesdetails;

CREATE TABLE `tbl_salesdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_no` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tbl_salesdetails VALUES("1","1","1","2","1900.50","2017-07-04 23:29:36");
INSERT INTO tbl_salesdetails VALUES("2","2","1","3","2850.75","2017-08-01 23:56:03");
INSERT INTO tbl_salesdetails VALUES("3","3","1","1","950.25","2017-07-05 07:01:49");


DROP TABLE IF EXISTS tbl_status;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbl_status` AS select `tbl_sales`.`status` AS `status`,count(0) AS `total` from `tbl_sales` where (`tbl_sales`.`status` = `tbl_sales`.`status`) group by `tbl_sales`.`status`;

INSERT INTO tbl_status VALUES("CANCELLED","1");
INSERT INTO tbl_status VALUES("PARTIALLY PAID","1");
INSERT INTO tbl_status VALUES("UNPAID","2");


DROP TABLE IF EXISTS tbl_useraccounts;

CREATE TABLE `tbl_useraccounts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `lname_UNIQUE` (`lname`),
  CONSTRAINT `lname` FOREIGN KEY (`lname`) REFERENCES `tbl_employee` (`lname`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO tbl_useraccounts VALUES("5","Omelda","$2y$10$REQwAUbSjQKTtPNGpc.IZO0hW2UsbFGDh.03VkknzRsX7asMA7c1e","2017-05-30 16:40:33");
INSERT INTO tbl_useraccounts VALUES("11","Barro Jr.","$2y$10$EEAxh0WMekoMzOKEo2fZs.mjp.MWRfWFM5cTvNK/szx0x.WDkuGXO","2017-06-30 22:15:28");


