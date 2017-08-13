-- MySQL dump 10.13  Distrib 5.6.31, for Linux (i686)
--
-- Host: localhost    Database: db_golden_pharma
-- ------------------------------------------------------
-- Server version	5.6.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_CM`
--

DROP TABLE IF EXISTS `tbl_CM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_CM`
--

LOCK TABLES `tbl_CM` WRITE;
/*!40000 ALTER TABLE `tbl_CM` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_CM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_CMdetails`
--

DROP TABLE IF EXISTS `tbl_CMdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_CMdetails` (
  `cmd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_no` int(11) DEFAULT NULL,
  `cmd_particulars` varchar(45) DEFAULT NULL,
  `cmd_qty` int(11) DEFAULT NULL,
  `cmd_price` float(11,2) DEFAULT NULL,
  `cmd_amount` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`cmd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_CMdetails`
--

LOCK TABLES `tbl_CMdetails` WRITE;
/*!40000 ALTER TABLE `tbl_CMdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_CMdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_CR`
--

DROP TABLE IF EXISTS `tbl_CR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_CR`
--

LOCK TABLES `tbl_CR` WRITE;
/*!40000 ALTER TABLE `tbl_CR` DISABLE KEYS */;
INSERT INTO `tbl_CR` VALUES (1,2,'2017-08-01',1,1500.25,'Cash',0,'2017-08-01 07:33:00'),(2,3,'2017-08-10',1,2000.00,'Check',12345,'2017-08-10 11:58:18'),(3,4,'2017-08-10',5,1000.00,'Check',123567,'2017-08-10 12:03:40'),(4,5,'2017-08-10',1,2600.00,'Check',0,'2017-08-10 12:26:44'),(5,6,'2017-08-10',1,25400.00,'Check',12346789,'2017-08-10 12:45:04'),(6,7,'2017-08-10',1,100.00,'11',657,'2017-08-10 12:53:50'),(7,8,'2017-08-11',1,234.00,'11',0,'2017-08-11 01:10:13'),(8,9,'2017-08-11',5,300.00,'18',0,'2017-08-11 01:12:29'),(9,10,'2017-09-01',6,100.00,'24',0,'2017-08-11 14:35:19');
/*!40000 ALTER TABLE `tbl_CR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_CRdetails`
--

DROP TABLE IF EXISTS `tbl_CRdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_CRdetails` (
  `crd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_no` int(11) DEFAULT NULL,
  `sales_no` int(11) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`crd_id`),
  KEY `crd_id` (`crd_id`),
  KEY `crd_id_2` (`crd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_CRdetails`
--

LOCK TABLES `tbl_CRdetails` WRITE;
/*!40000 ALTER TABLE `tbl_CRdetails` DISABLE KEYS */;
INSERT INTO `tbl_CRdetails` VALUES (2,2,2,'1500.25','2017-08-01 07:33:37'),(13,3,6,'1000','2017-08-10 11:57:19'),(14,3,7,'1000','2017-08-10 11:57:24'),(15,4,23,'1000','2017-08-10 12:03:33'),(16,5,6,'2600','2017-08-10 12:23:53'),(19,6,7,'25400','2017-08-10 12:44:54'),(20,7,11,'100','2017-08-10 12:53:30'),(22,8,11,'234','2017-08-11 01:10:11'),(23,9,18,'300','2017-08-11 01:12:23'),(24,10,24,'100','2017-08-11 14:35:02');
/*!40000 ALTER TABLE `tbl_CRdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_PO`
--

DROP TABLE IF EXISTS `tbl_PO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_PO` (
  `po_no` int(11) NOT NULL AUTO_INCREMENT,
  `sup_id` varchar(45) DEFAULT NULL,
  `po_totalAmount` float(11,2) NOT NULL,
  `po_date` date DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`po_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_PO`
--

LOCK TABLES `tbl_PO` WRITE;
/*!40000 ALTER TABLE `tbl_PO` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_PO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_POdetails`
--

DROP TABLE IF EXISTS `tbl_POdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_POdetails`
--

LOCK TABLES `tbl_POdetails` WRITE;
/*!40000 ALTER TABLE `tbl_POdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_POdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (1,'CNA C/A','2017-08-03 01:23:20'),(2,'ECS C/A','2017-08-03 01:28:19'),(3,'REBATES AND FLAPS','2017-08-03 01:28:19'),(4,'ADS AND PROMO','2017-08-03 01:28:19'),(5,'FUEL AND OIL','2017-08-03 01:28:19'),(6,'REPAIR AND MAINTENANCE','2017-08-03 01:28:20'),(7,'MEAL ALLOWANCE','2017-08-03 01:28:20'),(8,'FARE AND TRANSPORTATION','2017-08-03 01:28:20'),(9,'MISC.','2017-08-03 01:28:20'),(10,'TAXES AND LICENSES','2017-08-03 01:28:20'),(11,'FREIGHT AND HANDLING','2017-08-03 01:28:20'),(12,'SALARIES AND WAGES','2017-08-03 01:28:20'),(13,'OFFICE SUPPLIES','2017-08-03 01:28:20'),(14,'LIGHT AND WATER','2017-08-03 01:28:20'),(15,'TELECOMMUNICATIONS','2017-08-03 01:28:20'),(16,'GOLDEN RENTAL','2017-08-03 01:28:20'),(17,'MCKLINE RENTAL','2017-08-03 01:28:20'),(18,'PHILHEALTH','2017-08-03 01:28:20'),(19,'OZAMIS-CHECK REIMBURSEMENT','2017-08-03 01:28:20'),(20,'ALEX VILLANUEVA EXPENSES','2017-08-03 01:28:20');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_collections`
--

DROP TABLE IF EXISTS `tbl_collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_collections` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`col_id`),
  KEY `col_id` (`col_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_collections`
--

LOCK TABLES `tbl_collections` WRITE;
/*!40000 ALTER TABLE `tbl_collections` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_customers`
--

LOCK TABLES `tbl_customers` WRITE;
/*!40000 ALTER TABLE `tbl_customers` DISABLE KEYS */;
INSERT INTO `tbl_customers` VALUES (1,'Lyjieme Barro',101199,'30 days','abc123','Whole Saler','Brgy 24-A Gingoog City',0.00,0.00,'2017-07-27 08:17:59'),(2,'Mary Jane T. Barro',91170,'40 days','dce345','Whole Saler','Brgy 24-A Gingoog City',0.00,0.00,'2017-07-27 08:17:59'),(3,'Napoleon',12269,'50 days','efc443','Whole Saler','Brgy 24-A Gingoog City',0.00,0.00,'2017-07-27 08:17:59'),(5,'Jellie',23455,'30 Days','','Whole Sale','Brgy. 18-A Gingoog City',0.00,0.00,'2017-07-29 05:46:07'),(6,'Gerard Mandam',0,'30 Days','','Whole Saler','Gingoog City',1.00,0.00,'2017-07-29 06:23:18'),(7,'Justine Joy Botero',0,'15 Days','','Whole Sale','Gingoog City, SAA',10.00,0.00,'2017-07-29 06:24:16'),(8,'Jorge Nicol Dagoc',10111,'20 days','aaa222','Whole Saler','Brgy 20, Gingoog City',0.00,0.00,'2017-08-07 06:19:16');
/*!40000 ALTER TABLE `tbl_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employee`
--

LOCK TABLES `tbl_employee` WRITE;
/*!40000 ALTER TABLE `tbl_employee` DISABLE KEYS */;
INSERT INTO `tbl_employee` VALUES (18,'Bacus','Jellie Rose','Quta','Staff','2017-07-10 05:25:02'),(17,'Barro Jr.','Napoleon','Cominguez','Staff','2017-06-06 14:29:19'),(16,'Omelda','Darios','A.','Manager','2017-05-30 08:40:23');
/*!40000 ALTER TABLE `tbl_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_expenses`
--

DROP TABLE IF EXISTS `tbl_expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_expenses` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `ex_custName` varchar(45) DEFAULT NULL,
  `ex_amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_expenses`
--

LOCK TABLES `tbl_expenses` WRITE;
/*!40000 ALTER TABLE `tbl_expenses` DISABLE KEYS */;
INSERT INTO `tbl_expenses` VALUES (1,1,'2017-08-03','Napoleon',15000.00,'2017-08-03 07:16:59'),(2,2,'2017-09-03','Justine Joy',1000.00,'2017-08-03 07:17:27'),(3,2,'2017-08-04','Lyjieme Barro',1000.00,'2017-08-04 07:05:53'),(4,9,'2017-08-04','Ruel Amorado',150.00,'2017-08-04 07:07:03'),(5,2,'2017-09-01','Mary Jane Barro',1500.00,'2017-08-04 07:17:38');
/*!40000 ALTER TABLE `tbl_expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `tbl_expensesLast`
--

DROP TABLE IF EXISTS `tbl_expensesLast`;
/*!50001 DROP VIEW IF EXISTS `tbl_expensesLast`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_expensesLast` AS SELECT 
 1 AS `ex_id`,
 1 AS `cat_id`,
 1 AS `ex_date`,
 1 AS `ex_custName`,
 1 AS `ex_amount`,
 1 AS `timestamp`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_expensesToday`
--

DROP TABLE IF EXISTS `tbl_expensesToday`;
/*!50001 DROP VIEW IF EXISTS `tbl_expensesToday`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_expensesToday` AS SELECT 
 1 AS `ex_id`,
 1 AS `cat_id`,
 1 AS `ex_date`,
 1 AS `ex_custName`,
 1 AS `ex_amount`,
 1 AS `timestamp`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_expired_products`
--

DROP TABLE IF EXISTS `tbl_expired_products`;
/*!50001 DROP VIEW IF EXISTS `tbl_expired_products`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_expired_products` AS SELECT 
 1 AS `prod_id`,
 1 AS `name`,
 1 AS `description`,
 1 AS `price`,
 1 AS `expiry_date`,
 1 AS `quantity`,
 1 AS `packing`,
 1 AS `lot_no`,
 1 AS `timestamp`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_monthly_expenses`
--

DROP TABLE IF EXISTS `tbl_monthly_expenses`;
/*!50001 DROP VIEW IF EXISTS `tbl_monthly_expenses`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_monthly_expenses` AS SELECT 
 1 AS `Total`,
 1 AS `MONTH`,
 1 AS `Year`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_monthly_income`
--

DROP TABLE IF EXISTS `tbl_monthly_income`;
/*!50001 DROP VIEW IF EXISTS `tbl_monthly_income`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_monthly_income` AS SELECT 
 1 AS `Total`,
 1 AS `Month`,
 1 AS `Year`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_monthly_products_out`
--

DROP TABLE IF EXISTS `tbl_monthly_products_out`;
/*!50001 DROP VIEW IF EXISTS `tbl_monthly_products_out`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_monthly_products_out` AS SELECT 
 1 AS `Total`,
 1 AS `Month`,
 1 AS `Year`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_monthly_sales_report`
--

DROP TABLE IF EXISTS `tbl_monthly_sales_report`;
/*!50001 DROP VIEW IF EXISTS `tbl_monthly_sales_report`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_monthly_sales_report` AS SELECT 
 1 AS `Total`,
 1 AS `MONTH`,
 1 AS `Year`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_outofstocks`
--

DROP TABLE IF EXISTS `tbl_outofstocks`;
/*!50001 DROP VIEW IF EXISTS `tbl_outofstocks`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_outofstocks` AS SELECT 
 1 AS `prod_id`,
 1 AS `name`,
 1 AS `description`,
 1 AS `price`,
 1 AS `expiry_date`,
 1 AS `quantity`,
 1 AS `packing`,
 1 AS `lot_no`,
 1 AS `status`,
 1 AS `timestamp`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tbl_overdue`
--

DROP TABLE IF EXISTS `tbl_overdue`;
/*!50001 DROP VIEW IF EXISTS `tbl_overdue`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_overdue` AS SELECT 
 1 AS `sales_id`,
 1 AS `sales_no`,
 1 AS `cus_id`,
 1 AS `dates`,
 1 AS `prepared_by`,
 1 AS `checked_by`,
 1 AS `VAT`,
 1 AS `total_amount`,
 1 AS `total_sales`,
 1 AS `amount_net`,
 1 AS `status`,
 1 AS `due_date`,
 1 AS `timestamp`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payments`
--

LOCK TABLES `tbl_payments` WRITE;
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;
INSERT INTO `tbl_payments` VALUES (1,1,1,'Cash',1000.00,900.50,'2017-07-04 15:30:40');
/*!40000 ALTER TABLE `tbl_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_paymentsdetails`
--

DROP TABLE IF EXISTS `tbl_paymentsdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_paymentsdetails` (
  `pd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_id` int(11) NOT NULL,
  `pay_type` varchar(45) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paymentsdetails`
--

LOCK TABLES `tbl_paymentsdetails` WRITE;
/*!40000 ALTER TABLE `tbl_paymentsdetails` DISABLE KEYS */;
INSERT INTO `tbl_paymentsdetails` VALUES (1,1,'Cash',1000.00,'2017-07-04 15:30:40');
/*!40000 ALTER TABLE `tbl_paymentsdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_products`
--

LOCK TABLES `tbl_products` WRITE;
/*!40000 ALTER TABLE `tbl_products` DISABLE KEYS */;
INSERT INTO `tbl_products` VALUES (1,'Mefenamic Acid','Paracetamol',950.25,'2018-01-01',7,'500 mg Tablet','090','EXPIRING','2017-07-04 15:27:55'),(2,'Neozep','Paracetamol',1500.00,'2017-07-07',0,'60mg','123abc','OUT OF STOCKS','2017-07-07 12:32:01'),(3,'Neozep','Paracetamol',300.00,'2017-07-15',76,'500mg','abc123','EXPIRING','2017-07-15 10:32:49'),(4,'Neozep','Paracetamol',100.00,'2019-01-02',80,'600mg','1bc246','ACTIVE','2017-07-15 10:53:22'),(5,'Multivitamins','Paracetamol',150.75,'2019-09-01',1,'500mg','abc-123a','ACTIVE','2017-07-22 04:30:09'),(6,'Carlidox','Doxycycline ',150.00,'2019-04-30',5,'100 MG Capsule','FC012','ACTIVE','2017-07-26 02:40:36'),(7,'Neozep','Paracetamol',250.00,'2019-11-30',1,'150mg','1033BC','ACTIVE','2017-07-27 07:21:01'),(8,'Neozep','Paracetamol',100.00,'2019-07-31',97,'100mg Tablet','1bc123','ACTIVE','2017-07-27 07:21:42'),(9,'Neozep','Paracetamol',123.50,'2019-02-13',12,'60mg','095bdu0','ACTIVE','2017-08-11 13:03:29');
/*!40000 ALTER TABLE `tbl_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sales`
--

DROP TABLE IF EXISTS `tbl_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sales`
--

LOCK TABLES `tbl_sales` WRITE;
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
INSERT INTO `tbl_sales` VALUES (1,1,1,'2017-07-04','Omelda, Darios A.. ','Omelda, Darios A.. ',12,1900.50,228.06,1672.44,0.00,0.00,'CANCELLED','2017-08-03','2017-07-04 15:29:47'),(2,2,1,'2017-08-01','Omelda, Darios A.. ','Omelda, Darios A.. ',12,2850.75,342.09,2508.66,0.00,0.00,'CANCELLED','2017-08-31','2017-07-04 15:56:05'),(3,3,1,'2017-07-05','Omelda, Darios A.. ','Omelda, Darios A.. ',12,950.25,114.03,836.22,0.00,0.00,'CANCELLED','2017-08-04','2017-07-04 23:01:51'),(4,4,1,'2017-07-05','Omelda, Darios A.. ','Omelda, Darios A.. ',12,4751.25,570.15,4181.10,0.00,0.00,'CANCELLED','2017-08-04','2017-07-05 04:59:15'),(6,5,1,'2017-07-10','Omelda, Darios A.. ','Omelda, Darios A.. ',12,9502.50,1140.30,8362.20,0.00,0.00,'CANCELLED','2017-08-09','2017-07-10 05:35:37'),(7,6,1,'2017-07-15','Omelda, Darios A.. ','Omelda, Darios A.. ',12,3600.00,432.00,3168.00,0.00,0.00,'PAID','2017-08-14','2017-07-15 10:33:05'),(8,7,1,'2017-07-15','Omelda, Darios A.. ','Omelda, Darios A.. ',12,26400.00,2828.57,23571.43,0.00,0.00,'PAID','2017-08-14','2017-07-15 10:49:17'),(9,8,2,'2017-07-15','Omelda, Darios A.. ','Omelda, Darios A.. ',12,4.00,514.29,4285.71,0.00,0.00,'CANCELLED','2017-08-14','2017-07-15 12:06:56'),(11,10,1,'2017-07-26','Omelda, Darios A.. ','Omelda, Darios A.. ',12,1809.00,193.82,1615.18,0.00,0.00,'CANCELLED','2017-08-25','2017-07-26 01:31:02'),(12,11,1,'2017-07-26','Omelda, Darios A.. ','Omelda, Darios A.. ',12,950.25,101.81,848.44,0.00,0.00,'PARTIALLY PAID','2017-08-25','2017-07-26 03:10:51'),(13,12,1,'2017-07-27','Omelda, Darios A.. ','Omelda, Darios A.. ',12,600.00,64.29,535.71,0.00,0.00,'UNPAID','2017-08-26','2017-07-27 01:34:10'),(14,13,1,'2017-07-27','Omelda, Darios A.. ','Omelda, Darios A.. ',12,4401.25,471.56,3929.69,0.00,0.00,'UNPAID','2017-08-26','2017-07-27 05:03:53'),(15,14,1,'2017-07-28','Omelda, Darios A.. ','Omelda, Darios A.. ',12,1851.00,198.32,1652.68,0.00,0.00,'UNPAID','2017-08-27','2017-07-28 05:40:36'),(16,15,1,'2017-07-28','Omelda, Darios A.. ','Omelda, Darios A.. ',12,250.00,26.79,223.21,0.00,0.00,'UNPAID','2017-08-27','2017-07-28 05:41:24'),(22,16,3,'2017-07-28','Omelda, Darios A.. ','Omelda, Darios A.. ',12,1250.00,133.93,1116.07,0.00,0.00,'UNPAID','2017-09-16','2017-07-28 06:05:12'),(23,17,1,'2017-07-29','Omelda, Darios A.. ','Omelda, Darios A.. ',12,40.00,4.29,35.71,0.00,0.00,'UNPAID','2017-08-28','2017-07-29 05:48:13'),(24,18,5,'2017-07-29','Omelda, Darios A.. ','Omelda, Darios A.. ',12,300.00,32.14,267.86,0.00,0.00,'PAID','2017-08-28','2017-07-29 05:49:22'),(25,19,7,'2017-07-29','Omelda, Darios A.. ','Omelda, Darios A.. ',12,7204.50,771.91,6432.59,10.00,0.00,'CANCELLED','2017-08-13','2017-07-29 06:25:50'),(26,20,1,'2017-07-29','Omelda, Darios A.. ','Omelda, Darios A.. ',12,2940.50,315.05,2625.45,0.00,0.00,'UNPAID','2017-08-28','2017-07-29 07:32:40'),(27,21,1,'2017-08-02','Omelda, Darios A.. ','Omelda, Darios A.. ',12,2632.09,282.01,2350.09,3.00,0.00,'UNPAID','2017-09-01','2017-08-02 02:26:31'),(28,22,1,'2017-08-02','Omelda, Darios A.. ','Omelda, Darios A.. ',12,8552.25,916.31,7635.94,0.00,0.00,'CANCELLED','2017-09-01','2017-08-02 13:56:33'),(29,23,5,'2017-08-04','Omelda, Darios A.. ','Omelda, Darios A.. ',12,2842.49,304.55,2537.94,1.00,1.00,'UNPAID','2017-09-03','2017-08-04 10:05:45'),(30,24,6,'2017-08-04','Omelda, Darios A.. ','Omelda, Darios A.. ',12,297.00,31.82,265.18,1.00,0.00,'PARTIALLY PAID','2017-09-03','2017-08-04 10:19:08'),(31,25,6,'2017-08-04','Omelda, Darios A.. ','Omelda, Darios A.. ',12,99.00,10.61,88.39,1.00,0.00,'UNPAID','2017-09-03','2017-08-04 10:25:12'),(32,26,6,'2017-08-11','Omelda, Darios A.. ','Omelda, Darios A.. ',12,2822.24,302.38,2519.86,1.00,0.00,'CANCELLED','2017-09-10','2017-08-11 01:14:31');
/*!40000 ALTER TABLE `tbl_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_salesdetails`
--

DROP TABLE IF EXISTS `tbl_salesdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_salesdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_no` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(11,2) NOT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_salesdetails`
--

LOCK TABLES `tbl_salesdetails` WRITE;
/*!40000 ALTER TABLE `tbl_salesdetails` DISABLE KEYS */;
INSERT INTO `tbl_salesdetails` VALUES (1,6,3,12,0.00,3600.00,'2017-07-15 10:33:03'),(4,7,3,88,0.00,26400.00,'2017-07-15 10:49:13'),(9,11,1,1,0.00,950.25,'2017-07-26 02:15:09'),(14,12,1,2,300.00,600.00,'2017-07-26 23:11:46'),(18,13,1,5,500.25,2501.25,'2017-07-27 04:55:56'),(19,13,3,5,300.00,1500.00,'2017-07-27 04:56:00'),(21,13,4,2,200.00,400.00,'2017-07-27 05:02:27'),(22,14,8,1,100.00,100.00,'2017-07-28 05:07:28'),(23,14,7,1,250.00,250.00,'2017-07-28 05:07:51'),(24,14,4,1,100.00,100.00,'2017-07-28 05:07:55'),(25,14,3,1,300.00,300.00,'2017-07-28 05:07:58'),(26,14,5,1,150.75,150.75,'2017-07-28 05:08:02'),(27,14,1,1,950.25,950.25,'2017-07-28 05:08:06'),(28,15,7,1,250.00,250.00,'2017-07-28 05:41:20'),(32,16,7,5,250.00,1250.00,'2017-07-28 06:05:11'),(33,17,3,2,20.00,40.00,'2017-07-29 05:47:45'),(34,18,3,1,300.00,300.00,'2017-07-29 05:49:21'),(47,20,4,2,120.00,240.00,'2017-07-29 07:31:17'),(48,20,7,2,350.00,700.00,'2017-07-29 07:31:24'),(49,20,1,2,1000.25,2000.50,'2017-07-29 07:31:39'),(50,21,5,18,150.75,2713.50,'2017-08-02 02:26:22'),(51,23,3,2,300.00,600.00,'2017-08-04 10:05:24'),(52,23,4,2,100.00,200.00,'2017-08-04 10:05:30'),(53,23,8,2,100.00,200.00,'2017-08-04 10:05:36'),(54,23,1,2,950.25,1900.50,'2017-08-04 10:05:42'),(55,24,3,1,300.00,300.00,'2017-08-04 10:19:04'),(56,25,4,1,100.00,100.00,'2017-08-04 10:25:09');
/*!40000 ALTER TABLE `tbl_salesdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
/*!50001 DROP VIEW IF EXISTS `tbl_status`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tbl_status` AS SELECT 
 1 AS `status`,
 1 AS `total`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tbl_supplier`
--

DROP TABLE IF EXISTS `tbl_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_useraccounts`
--

DROP TABLE IF EXISTS `tbl_useraccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_useraccounts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `lname_UNIQUE` (`lname`),
  CONSTRAINT `lname` FOREIGN KEY (`lname`) REFERENCES `tbl_employee` (`lname`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_useraccounts`
--

LOCK TABLES `tbl_useraccounts` WRITE;
/*!40000 ALTER TABLE `tbl_useraccounts` DISABLE KEYS */;
INSERT INTO `tbl_useraccounts` VALUES (5,'Omelda','$2y$10$REQwAUbSjQKTtPNGpc.IZO0hW2UsbFGDh.03VkknzRsX7asMA7c1e','2017-05-30 08:40:33'),(6,'Bacus','$2y$10$axVwHOx1t7XuAOEb6PRHBuBgkn/S2Zmpo7XvOX2af9dsHZyB02qXy','2017-08-07 03:40:07');
/*!40000 ALTER TABLE `tbl_useraccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_year`
--

DROP TABLE IF EXISTS `tbl_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_year` (
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_year`
--

LOCK TABLES `tbl_year` WRITE;
/*!40000 ALTER TABLE `tbl_year` DISABLE KEYS */;
INSERT INTO `tbl_year` VALUES (2017);
/*!40000 ALTER TABLE `tbl_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `tbl_expensesLast`
--

/*!50001 DROP VIEW IF EXISTS `tbl_expensesLast`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_expensesLast` AS select `tbl_expenses`.`ex_id` AS `ex_id`,`tbl_expenses`.`cat_id` AS `cat_id`,`tbl_expenses`.`ex_date` AS `ex_date`,`tbl_expenses`.`ex_custName` AS `ex_custName`,`tbl_expenses`.`ex_amount` AS `ex_amount`,`tbl_expenses`.`timestamp` AS `timestamp` from `tbl_expenses` where (`tbl_expenses`.`ex_date` < curdate()) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_expensesToday`
--

/*!50001 DROP VIEW IF EXISTS `tbl_expensesToday`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_expensesToday` AS select `tbl_expenses`.`ex_id` AS `ex_id`,`tbl_expenses`.`cat_id` AS `cat_id`,`tbl_expenses`.`ex_date` AS `ex_date`,`tbl_expenses`.`ex_custName` AS `ex_custName`,`tbl_expenses`.`ex_amount` AS `ex_amount`,`tbl_expenses`.`timestamp` AS `timestamp` from `tbl_expenses` where (`tbl_expenses`.`ex_date` = curdate()) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_expired_products`
--

/*!50001 DROP VIEW IF EXISTS `tbl_expired_products`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_expired_products` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`expiry_date` <= (curdate() + interval 12 month)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_monthly_expenses`
--

/*!50001 DROP VIEW IF EXISTS `tbl_monthly_expenses`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_monthly_expenses` AS select sum(`tbl_expenses`.`ex_amount`) AS `Total`,monthname(`tbl_expenses`.`ex_date`) AS `MONTH`,year(`tbl_expenses`.`ex_date`) AS `Year` from `tbl_expenses` group by month(`tbl_expenses`.`ex_date`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_monthly_income`
--

/*!50001 DROP VIEW IF EXISTS `tbl_monthly_income`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_monthly_income` AS select sum(`tbl_CR`.`cr_totalSales`) AS `Total`,monthname(`tbl_CR`.`cr_date`) AS `Month`,year(`tbl_CR`.`cr_date`) AS `Year` from `tbl_CR` group by month(`tbl_CR`.`cr_date`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_monthly_products_out`
--

/*!50001 DROP VIEW IF EXISTS `tbl_monthly_products_out`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_monthly_products_out` AS select sum(`tbl_salesdetails`.`quantity`) AS `Total`,monthname(`tbl_salesdetails`.`timestamp`) AS `Month`,year(`tbl_salesdetails`.`timestamp`) AS `Year` from `tbl_salesdetails` group by month(`tbl_salesdetails`.`timestamp`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_monthly_sales_report`
--

/*!50001 DROP VIEW IF EXISTS `tbl_monthly_sales_report`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_monthly_sales_report` AS select sum(`tbl_sales`.`total_sales`) AS `Total`,monthname(`tbl_sales`.`dates`) AS `MONTH`,year(`tbl_sales`.`dates`) AS `Year` from `tbl_sales` where (`tbl_sales`.`status` <> 'CANCELLED') group by month(`tbl_sales`.`dates`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_outofstocks`
--

/*!50001 DROP VIEW IF EXISTS `tbl_outofstocks`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_outofstocks` AS select `tbl_products`.`prod_id` AS `prod_id`,`tbl_products`.`name` AS `name`,`tbl_products`.`description` AS `description`,`tbl_products`.`price` AS `price`,`tbl_products`.`expiry_date` AS `expiry_date`,`tbl_products`.`quantity` AS `quantity`,`tbl_products`.`packing` AS `packing`,`tbl_products`.`lot_no` AS `lot_no`,`tbl_products`.`status` AS `status`,`tbl_products`.`timestamp` AS `timestamp` from `tbl_products` where (`tbl_products`.`quantity` = 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_overdue`
--

/*!50001 DROP VIEW IF EXISTS `tbl_overdue`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_overdue` AS select `tbl_sales`.`sales_id` AS `sales_id`,`tbl_sales`.`sales_no` AS `sales_no`,`tbl_sales`.`cus_id` AS `cus_id`,`tbl_sales`.`dates` AS `dates`,`tbl_sales`.`prepared_by` AS `prepared_by`,`tbl_sales`.`checked_by` AS `checked_by`,`tbl_sales`.`VAT` AS `VAT`,`tbl_sales`.`total_amount` AS `total_amount`,`tbl_sales`.`total_sales` AS `total_sales`,`tbl_sales`.`amount_net` AS `amount_net`,`tbl_sales`.`status` AS `status`,`tbl_sales`.`due_date` AS `due_date`,`tbl_sales`.`timestamp` AS `timestamp` from `tbl_sales` where ((`tbl_sales`.`status` <> 'PAID') and (`tbl_sales`.`status` <> 'CANCELLED') and (cast(`tbl_sales`.`due_date` as date) <= curdate())) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tbl_status`
--

/*!50001 DROP VIEW IF EXISTS `tbl_status`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tbl_status` AS select `tbl_sales`.`status` AS `status`,count(0) AS `total` from `tbl_sales` where (`tbl_sales`.`status` = `tbl_sales`.`status`) group by `tbl_sales`.`status` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-13  2:14:37
