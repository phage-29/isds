-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 10.20.12.32    Database: msgitdb
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Category` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'ICT Equipment Services'),(2,'Network Services'),(3,'Software/ System/ Application'),(4,'Account Management'),(5,'Activity-Based Assistance'),(6,'Others');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `divisions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Division` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisions`
--

LOCK TABLES `divisions` WRITE;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` VALUES (1,'ORD'),(2,'CPD'),(3,'IDD'),(4,'BDD'),(5,'FAD'),(6,'DTI Aklan'),(7,'DTI Antique'),(8,'DTI Capiz'),(9,'DTI Guimaras'),(10,'DTI Iloilo'),(11,'DTI Negros Occidental'),(12,'COA');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Equipment` varchar(255) NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  `Model` varchar(100) DEFAULT NULL,
  `SerialNumber` varchar(50) DEFAULT NULL,
  `DatePurchased` date DEFAULT NULL,
  `Warranty` date DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'In Storage',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `helpdesks`
--

DROP TABLE IF EXISTS `helpdesks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `helpdesks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `RequestNo` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `DivisionID` int NOT NULL,
  `DateRequested` date NOT NULL,
  `RequestType` enum('ICT Helpdesk','ICT Maintenance') DEFAULT 'ICT Helpdesk',
  `PropertyNo` varchar(45) DEFAULT NULL,
  `CategoryID` int NOT NULL,
  `SubCategoryID` int NOT NULL,
  `Complaints` text NOT NULL,
  `DatePreferred` date DEFAULT NULL,
  `TimePreferred` time DEFAULT NULL,
  `Medium` enum('ICT System','Phone','Memo','Intercom','Email') DEFAULT 'ICT System',
  `DateReceived` date DEFAULT NULL,
  `ReceivedBy` int DEFAULT NULL,
  `DateScheduled` date DEFAULT NULL,
  `RepairType` enum('Minor','Major') DEFAULT 'Minor',
  `RepairClassification` enum('Simple','Medium','Complex','Highly Technical') DEFAULT 'Simple',
  `DatetimeStarted` datetime DEFAULT NULL,
  `DatetimeFinished` datetime DEFAULT NULL,
  `Diagnosis` text,
  `Remarks` text,
  `ServicedBy` int DEFAULT NULL,
  `ApprovedBy` int DEFAULT NULL,
  `Status` enum('Pending','On Going','Completed','Denied','Cancelled','Unserviceable','Pre-Repair') DEFAULT 'Pending',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ServicePriority` enum('High','Medium','Low') DEFAULT 'Medium',
  `Csf` enum('Pending','Done') DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `RequestNo_UNIQUE` (`RequestNo`),
  KEY `fk1_idx` (`DivisionID`),
  KEY `fk2_idx` (`CategoryID`),
  KEY `fk3_idx` (`SubCategoryID`),
  KEY `fk4_idx` (`ReceivedBy`),
  KEY `fk5_idx` (`ServicedBy`),
  KEY `fk6_idx` (`ApprovedBy`),
  CONSTRAINT `fk1` FOREIGN KEY (`DivisionID`) REFERENCES `divisions` (`id`),
  CONSTRAINT `fk2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk3` FOREIGN KEY (`SubCategoryID`) REFERENCES `subcategories` (`id`),
  CONSTRAINT `fk4` FOREIGN KEY (`ReceivedBy`) REFERENCES `users` (`id`),
  CONSTRAINT `fk5` FOREIGN KEY (`ServicedBy`) REFERENCES `users` (`id`),
  CONSTRAINT `fk6` FOREIGN KEY (`ApprovedBy`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `helpdesks`
--

LOCK TABLES `helpdesks` WRITE;
/*!40000 ALTER TABLE `helpdesks` DISABLE KEYS */;
INSERT INTO `helpdesks` VALUES (2,'REQ-202308-00001','Anna','Panim','misr6.dti@gmail.com',12,'2023-08-16','ICT Helpdesk','',1,1,'Windows stock on loading','2023-08-16','09:30:00','ICT System','2023-08-16',5,'2023-08-16','Minor','Simple','2023-08-16 09:30:00','2023-08-16 09:50:00','Remove VGA and return','Done',5,2,'Completed','2023-11-21 07:09:11','2023-11-21 07:09:11','Medium','Pending'),(3,'REQ-202308-00002','Ariane','Reyes','misr6.dti@gmail.com',2,'2023-08-09','ICT Helpdesk','',1,3,'Toner Problem','2023-08-09','09:30:00','ICT System','2023-08-09',5,'2023-08-09','Minor','Simple','2023-08-09 09:30:00','2023-08-09 11:30:00','Replaced the toner','Done',5,2,'Completed','2023-11-21 07:12:29','2023-11-21 07:12:29','Medium','Pending'),(4,'REQ-202308-00003','Bella','Bonto','misr6.dti@gmail.com',5,'2023-08-09','ICT Helpdesk','',3,13,'Excel Editting','2023-08-09','09:30:00','ICT System','2023-08-01',2,'2023-08-01','Minor','Simple','2023-08-01 11:00:00','2023-08-01 13:30:00','Modify items from excel','Done',2,2,'Completed','2023-11-21 07:16:53','2023-11-21 07:16:53','Medium','Pending'),(5,'REQ-202308-00004','Bella','Bonto','misr6.dti@gmail.com',5,'2023-08-31','ICT Helpdesk','',2,5,'No IP Address','2023-08-09','09:30:00','ICT System','2023-08-31',4,'2023-08-01','Minor','Simple','2023-08-31 13:00:00','2023-08-31 14:30:00','Reset the network','Done',4,2,'Completed','2023-11-21 07:18:34','2023-11-21 07:18:34','Medium','Pending'),(8,'REQ-202311-00001','Rheyzia Marie','Elgario','misr6.dti@gmail.com',10,'2023-11-21','ICT Helpdesk','',1,4,'UPS','2023-11-21','21:00:00','ICT System','2023-11-21',5,'2023-11-21','Minor','Simple','2023-11-21 09:00:00','2023-11-21 09:15:00','Low voltage battery','Replace new battery and realign the on push button',4,3,'Completed','2023-11-21 07:28:18','2023-11-21 07:28:18','Medium','Pending'),(9,'REQ-202308-00005','Ma. Dorita','Chavez','misr6.dti@gmail.com',10,'2023-08-07','ICT Helpdesk','',1,1,'No signal or no display','2023-08-07','08:00:00','ICT System','2023-08-07',1,'2023-08-07','Minor','Simple','2023-08-07 08:00:00','2023-08-07 08:30:00','Transfer the VGA on the video card','done',1,2,'Completed','2023-11-21 07:28:33','2023-11-21 07:28:33','Medium','Pending'),(10,'REQ-202308-00006','Jeryll','Glory','misr6.dti@gmail.com',10,'2023-08-07','ICT Helpdesk','',1,1,'Setup PC for online application','2023-08-07','09:00:00','ICT System','2023-08-07',1,'2023-08-07','Minor','Simple','2023-08-07 09:00:00','2023-08-07 09:30:00','Set up the computer pc','done',1,2,'Completed','2023-11-21 07:31:42','2023-11-21 07:31:42','Medium','Pending'),(12,'REQ-202308-00007','Johna Raf','Montalvo','misr6.dti@gmail.com',4,'2023-08-22','ICT Helpdesk','',2,5,'No Internet Connection','2023-08-22','10:00:00','ICT System','2023-08-22',4,'2023-08-22','Minor','Simple','2023-08-22 10:00:00','2023-08-22 10:30:00','Trace lan cable source','done',4,2,'Completed','2023-11-21 07:34:08','2023-11-21 07:34:08','Medium','Pending'),(14,'REQ-202308-00008','Joy Anne','Erazo','misr6.dti@gmail.com',10,'2023-08-07','ICT Helpdesk','',1,1,'No bootable device detected','2023-08-07','11:00:00','ICT System','2023-08-07',4,'2023-08-07','Minor','Simple','2023-08-07 11:00:00','2023-08-07 11:30:00','Open lid and tighten the sata cable, rearrange and transfer the unit system','done',1,2,'Completed','2023-11-21 07:36:45','2023-11-21 07:36:45','Medium','Pending'),(16,'REQ-202308-00009','Joy Anne','Erazo','misr6.dti@gmail.com',10,'2023-08-22','ICT Helpdesk','',1,1,'Power Problem','2023-08-22','09:45:00','ICT System','2023-08-22',4,'2023-08-22','Minor','Simple','2023-08-22 09:45:00','2023-08-22 10:25:00','Connect an extension to power on connection','done',4,2,'Completed','2023-11-21 07:39:00','2023-11-21 07:39:00','Medium','Pending'),(17,'REQ-202308-00010','May Ann','Arca','misr6.dti@gmail.com',4,'2023-08-23','ICT Helpdesk','',1,3,'Printer error end of life','2023-08-23','11:45:00','ICT System','2023-08-23',1,'2023-08-23','Minor','Simple','2023-08-23 09:45:00','2023-08-23 10:25:00','Drained the waste pad and reset ink waste pad counter','done',1,2,'Completed','2023-11-21 07:40:33','2023-11-21 07:40:33','Medium','Pending'),(18,'REQ-202311-00004','NC','Carles','misr6.dti@gmail.com',10,'2023-11-22','ICT Helpdesk','',1,3,'End of life servvice','2023-11-14','09:00:00','ICT System','2023-10-31',4,'2023-11-14','Minor','Simple','2023-11-14 09:00:00','2023-11-16 13:00:00','Need reset and clogged ink tube','Reset, power ink flashing, and pump the ink tube',4,3,'Completed','2023-11-21 07:50:00','2023-11-22 01:19:46','Medium','Pending'),(20,'REQ-202311-00002','Johna Raf','Montalvo','johnarafmontalvo1@gmail.com',4,'2023-11-21','ICT Helpdesk','',2,5,'No internet connection ','2023-11-21','16:17:00','ICT System','2023-11-21',1,'2023-11-21','Minor','Simple','2023-08-15 16:19:00','2023-08-15 16:24:00','IP Address is Static changed to Dynamic','Done',1,2,'Completed','2023-11-21 08:19:47','2023-11-21 09:09:21','Medium','Pending'),(21,'REQ-202308-00011','Mia','Aujero','misr6.dti@gmail.com',2,'2023-08-15','ICT Helpdesk','',2,5,'No Internet Access','2023-08-15','10:00:00','ICT System','2023-08-15',4,'2023-08-15','Minor','Simple','2023-08-15 10:00:00','2023-08-15 10:10:00','Install network adapter','Done',4,2,'Completed','2023-11-21 08:56:28','2023-11-21 09:08:10','Medium','Pending'),(22,'REQ-202308-00012','Mia','Aujero','misr6.dti@gmail.com',2,'2023-08-29','ICT Helpdesk','',1,4,'External drive error','2023-08-29','10:00:00','ICT System','2023-08-29',1,'2023-08-29','Minor','Simple','2023-08-29 10:00:00','2023-08-29 10:10:00','Repair and troubleshoot external drive','Done',1,2,'Completed','2023-11-21 08:58:09','2023-11-21 08:58:09','Medium','Pending'),(24,'REQ-202308-00013','Shyn Mae','Bernales','misr6.dti@gmail.com',4,'2023-08-22','ICT Helpdesk','',1,1,'External drive error','2023-08-22','09:40:00','ICT System','2023-08-22',4,'2023-08-22','Minor','Simple','2023-08-22 09:40:00','2023-08-22 10:40:00','Set up System Unit','Done',4,2,'Completed','2023-11-21 09:00:15','2023-11-21 09:00:15','Medium','Pending'),(25,'REQ-202308-00014','Joy Anne','Erazo','misr6.dti@gmail.com',10,'2023-08-22','ICT Helpdesk','',4,14,'Office 365 problem','2023-08-22','14:00:00','ICT System','2023-08-22',4,'2023-08-22','Minor','Simple','2023-08-22 14:00:00','2023-08-22 14:15:00','Clear all cache','Done',4,2,'Completed','2023-11-21 09:02:11','2023-11-21 09:02:11','Medium','Pending'),(34,'REQ-202311-00003','Mary Jade','Gonzales','dace.phage@gmail.com',3,'2023-11-22','ICT Helpdesk','',2,5,'Connected but no internet connection','2023-11-22','08:11:00','ICT System','2023-11-22',1,NULL,'Minor','Simple','2023-11-22 08:12:00','2023-11-22 08:16:00','Connected to a low accuracy Wi-Fi, Re connected to dti r06','Done',1,2,'Completed','2023-11-22 00:11:56','2023-11-22 00:17:29','Medium','Pending'),(35,'REQ-202309-00008','Blessed Grace','Peñaflorida','misr6.dti@gmail.com',10,'2023-09-05','ICT Helpdesk','',2,5,'No internet connection','2023-11-22','08:27:00','ICT System','2023-09-05',5,'2023-09-05','Minor','Simple','2023-09-05 09:00:00','2023-09-05 09:20:00','Connect to the Internet','Done',5,2,'Completed','2023-11-22 00:33:06','2023-11-22 01:19:46','Medium','Pending'),(36,'REQ-202309-00009','Caesa','Nedula','misr6.dti@gmail.com',1,'2023-09-05','ICT Helpdesk','',1,1,'Monitor no display','2023-09-28','14:27:00','ICT System','2023-09-28',1,'2023-09-05','Minor','Simple','2023-09-28 02:00:00','2023-09-28 02:20:00','Cord not connected, reconnected','Done',1,1,'Completed','2023-11-22 00:35:22','2023-11-22 01:19:46','Medium','Pending'),(37,'REQ-202311-00006','NC','Janiuay','misr6.dti@gmail.com',10,'2023-11-22','ICT Helpdesk','',1,3,'End of life service','2023-11-16','15:00:00','ICT System','2023-11-16',4,'2023-11-16','Minor','Simple','2023-11-16 15:15:00','2023-11-16 16:00:00','End of life service and clogged ink tube','Reset and pump the ink tube',4,3,'Completed','2023-11-22 00:39:20','2023-11-22 01:19:46','Medium','Pending'),(38,'REQ-202309-00010','Faith','Cercado','misr6.dti@gmail.com',12,'2023-09-05','ICT Helpdesk','',1,1,'Lost connection in Monitor','2023-09-11','16:00:00','ICT System','2023-09-11',5,'2023-09-11','Minor','Simple','2023-09-11 16:00:00','2023-09-28 16:20:00','Remove the connector and return again to the system unit','Done',5,2,'Completed','2023-11-22 00:39:29','2023-11-22 01:19:46','Medium','Pending'),(39,'REQ-202309-00001','Jonathan','Benedicto','misr6.dti@gmail.com',5,'2023-09-18','ICT Helpdesk','',3,12,'DTR Enrollment','2023-09-18','16:00:00','ICT System','2023-09-18',1,'2023-09-18','Minor','Simple','2023-09-18 16:00:00','2023-09-18 16:20:00','Enrolled in DTR','Done',1,2,'Completed','2023-11-22 00:41:39','2023-11-22 00:41:39','Medium','Pending'),(40,'REQ-202311-00005','NC','San Joaquin','misr6.dti@gmail.com',10,'2023-11-22','ICT Helpdesk','',1,3,'End of life service','2023-11-16','15:00:00','ICT System','2023-11-16',4,'2023-11-17','Minor','Simple','2023-11-17 15:30:00','2023-11-17 16:00:00','End of life service','Reset',4,3,'Completed','2023-11-22 00:41:50','2023-11-22 01:19:46','Medium','Pending'),(41,'REQ-202309-00002','Jonathan','Tejida','misr6.dti@gmail.com',3,'2023-09-18','ICT Helpdesk','',1,3,'Requires Attention','2023-09-13','16:00:00','ICT System','2023-09-13',1,'2023-09-13','Minor','Simple','2023-09-13 16:00:00','2023-09-13 16:20:00','Troubleshoot Printer','Done',1,2,'Completed','2023-11-22 00:43:26','2023-11-22 00:43:26','Medium','Pending'),(42,'REQ-202309-00003','Judy','Sajo','misr6.dti@gmail.com',1,'2023-09-05','ICT Helpdesk','',5,21,'Set up AVR for Pres Con','2023-09-05','13:00:00','ICT System','2023-09-05',1,'2023-09-05','Minor','Simple','2023-09-05 13:00:00','2023-09-05 17:00:00','conduct technical assistance in Pres conference with regional director','Done',1,2,'Completed','2023-11-22 00:45:16','2023-11-22 00:45:16','Medium','Pending'),(43,'REQ-202309-00004','Lyndy Exzyle','Miranda','misr6.dti@gmail.com',5,'2023-09-05','ICT Helpdesk','',1,3,'Print Banding','2023-09-19','15:30:00','ICT System','2023-09-19',5,'2023-09-19','Minor','Simple','2023-09-19 15:30:00','2023-09-19 16:00:00','Power Flush','Done',5,2,'Completed','2023-11-22 00:48:28','2023-11-22 00:48:28','Medium','Pending'),(44,'REQ-202309-00005','Lyndy Exzyle','Miranda','misr6.dti@gmail.com',5,'2023-09-26','ICT Helpdesk','',1,3,'Print Banding','2023-09-26','13:00:00','ICT System','2023-09-26',5,'2023-09-26','Minor','Simple','2023-09-26 13:00:00','2023-09-26 13:25:00','Power Flush','Done',5,2,'Completed','2023-11-22 00:49:47','2023-11-22 00:49:47','Medium','Pending'),(45,'REQ-202309-00006','Ma. Dorita','Chavez','misr6.dti@gmail.com',10,'2023-09-22','ICT Helpdesk','',1,2,'Damaged hinge holder','2023-09-25','16:48:00','ICT System','2023-09-22',4,'2023-09-25','Minor','Simple','2023-09-25 17:00:00','2023-09-29 08:00:00','Repaired the damaged plastic mold by applying epoxy and wait until it hardened','Done',4,2,'Completed','2023-11-22 00:54:05','2023-11-22 02:59:33','Medium','Pending'),(46,'REQ-202309-00007','May Ann','Arca','misr6.dti@gmail.com',4,'2023-09-14','ICT Helpdesk','',1,1,'Keyboard not detected','2023-09-14','13:30:00','ICT System','2023-09-14',1,'2023-09-14','Minor','Simple','2023-09-14 01:30:00','2023-09-14 02:00:00','restart pc and re insert','Done',1,2,'Completed','2023-11-22 00:58:33','2023-11-22 00:58:33','Medium','Pending'),(55,'REQ-202309-00011','May Ann','Arca','misr6.dti@gmail.com',4,'2023-09-14','ICT Helpdesk','',1,1,'Keyboard not detected','2023-09-14','13:30:00','ICT System','2023-09-14',1,'2023-09-14','Minor','Simple','2023-09-14 13:30:00','2023-09-14 14:45:00','Preferable Reset PC','Done',1,2,'Completed','2023-11-22 01:23:12','2023-11-22 01:23:12','Medium','Pending'),(56,'REQ-202309-00012','May Ann','Arca','misr6.dti@gmail.com',4,'2023-09-14','ICT Helpdesk','',1,1,'Inaccessible drivers','2023-09-14','15:15:00','ICT System','2023-09-14',1,'2023-09-14','Minor','Simple','2023-09-14 15:15:00','2023-09-14 16:50:00','Reset settings and apps, uninstalled unnecessary application and optimize','Done',1,2,'Completed','2023-11-22 01:26:19','2023-11-22 01:26:19','Medium','Pending'),(57,'REQ-202309-00013','Rhea','Jocsing','misr6.dti@gmail.com',5,'2023-09-28','ICT Helpdesk','',1,4,'No Power','2023-09-28','09:00:00','ICT System','2023-09-28',1,'2023-09-28','Minor','Simple','2023-09-28 09:00:00','2023-09-28 09:15:00','Low voltage, Replace battery','Done',1,2,'Completed','2023-11-22 01:28:19','2023-11-22 01:28:19','Medium','Pending'),(58,'REQ-202309-00014','Rheyzia Marie','Elgario','misr6.dti@gmail.com',10,'2023-09-18','ICT Helpdesk','',3,12,'DTR Enrollment of new DMOs','2023-09-18','09:00:00','ICT System','2023-09-18',1,'2023-09-18','Minor','Simple','2023-09-18 09:00:00','2023-09-18 09:15:00','Low voltage, Replace battery','Done',1,2,'Completed','2023-11-22 01:36:16','2023-11-22 01:36:16','Medium','Pending'),(59,'REQ-202309-00015','Yolanda','Gallenero','misr6.dti@gmail.com',4,'2023-09-18','ICT Helpdesk','',2,5,'No Internet Connection','2023-09-20','13:00:00','ICT System','2023-09-20',1,'2023-09-20','Minor','Simple','2023-09-20 13:00:00','2023-09-20 14:00:00','Troubleshoot internet connection','Done',1,2,'Completed','2023-11-22 01:38:23','2023-11-22 01:38:23','Medium','Pending'),(60,'REQ-202309-00016','Daryl Mae','Salveron','misr6.dti@gmail.com',10,'2023-09-11','ICT Helpdesk','',1,2,'lost screw laptop','2023-09-11','13:00:00','ICT System','2023-09-11',4,'2023-09-11','Minor','Simple','2023-09-11 08:50:00','2023-09-11 09:04:00','Replace with spare screws','Done',4,2,'Completed','2023-11-22 01:43:03','2023-11-22 01:43:03','Medium','Pending'),(61,'REQ-202310-00001','Anelyn','Apiag','misr6.dti@gmail.com',10,'2023-10-03','ICT Helpdesk','',1,3,'No printer driver','2023-10-03','08:15:00','ICT System','2023-10-03',4,'2023-10-03','Minor','Simple','2023-10-03 08:15:00','2023-10-03 08:46:00','installed printer driver','done',4,2,'Completed','2023-11-22 06:19:12','2023-11-22 06:19:12','Medium','Pending'),(62,'REQ-202310-00002','Anne','Tortal','misr6.dti@gmail.com',10,'2023-10-16','ICT Helpdesk','',1,1,'System Update','2023-10-16','08:15:00','ICT System','2023-10-16',4,'2023-10-16','Minor','Simple','2023-10-16 08:15:00','2023-10-16 08:46:00','Proceed with system update','done',4,2,'Completed','2023-11-22 06:23:53','2023-11-22 06:23:53','Medium','Pending'),(63,'REQ-202310-00003','Anne','Tortal','misr6.dti@gmail.com',10,'2023-10-03','ICT Helpdesk','',2,5,'Connected with no internet connection','2023-10-03','08:15:00','ICT System','2023-10-03',4,'2023-10-03','Minor','Simple','2023-10-03 08:15:00','2023-10-03 08:46:00','Reset Wi-Fi driver','done',4,2,'Completed','2023-11-22 06:26:06','2023-11-22 06:26:06','Medium','Pending'),(64,'REQ-202311-00007','Dan Alfrei','Fuerte','dace.phage@gmail.com',1,'2023-11-22','ICT Helpdesk','',1,3,'No print','2023-11-22','14:35:00','ICT System','2023-11-22',1,'2023-11-24','Minor','Simple','2023-11-22 14:38:00','2023-11-22 14:41:00','wala naka saksak','functioning',1,2,'Completed','2023-11-22 06:35:46','2023-11-24 02:49:08','High','Pending'),(77,'REQ-202310-00004','Blessed Grace','Peñaflorida','misr6.dti@gmail.com',10,'2023-10-13','ICT Helpdesk','',1,1,'No bootable device','2023-10-13','09:00:00','ICT System','2023-10-13',4,'2023-10-13','Minor','Simple','2023-10-13 09:00:00','2023-10-13 10:30:00','Installed new windows OS','Done',4,2,'Completed','2023-11-22 08:32:01','2023-11-22 08:32:01','Medium','Pending'),(78,'REQ-202310-00005','Blessed Grace','Peñaflorida','misr6.dti@gmail.com',10,'2023-10-13','ICT Helpdesk','',1,1,'PC Windows Update','2023-10-13','09:00:00','ICT System','2023-10-13',4,'2023-10-13','Minor','Simple','2023-10-13 09:00:00','2023-10-13 10:30:00','Proceed with windows update','Done',4,2,'Completed','2023-11-22 08:41:56','2023-11-22 08:41:56','Medium','Pending'),(79,'REQ-202310-00006','Caesa','Nedula','misr6.dti@gmail.com',1,'2023-10-05','ICT Helpdesk','',1,3,'Paper Jam','2023-10-05','13:00:00','ICT System','2023-10-05',4,'2023-10-05','Minor','Simple','2023-10-05 13:00:00','2023-10-05 13:30:00','Removed the jammed paper','Done',4,2,'Completed','2023-11-22 08:44:20','2023-11-22 08:44:20','Medium','Pending'),(80,'REQ-202310-00007','Emily','Pasaporte','misr6.dti@gmail.com',5,'2023-10-04','ICT Helpdesk','',3,9,'Payroll Error','2023-10-04','13:00:00','ICT System','2023-10-04',4,'2023-10-04','Minor','Simple','2023-10-04 13:00:00','2023-10-04 13:30:00','Realign the IP Address of the payroll system','Done',4,2,'Completed','2023-11-22 08:47:12','2023-11-22 08:47:12','Medium','Pending'),(81,'REQ-202310-00008','Joy Anne','Erazo','misr6.dti@gmail.com',10,'2023-10-19','ICT Helpdesk','',1,3,'Print Missing Color','2023-10-19','08:23:00','ICT System','2023-10-19',1,'2023-10-19','Minor','Simple','2023-10-19 08:23:00','2023-10-19 16:48:00','Uninstalled old driver and reinstall, multiple head cleaning using Epson resetter','Done',1,2,'Completed','2023-11-22 08:50:16','2023-11-22 08:50:16','Medium','Pending'),(82,'REQ-202310-00009','Judy','Sajo','misr6.dti@gmail.com',10,'2023-10-05','ICT Helpdesk','',1,3,'Printer assistance','2023-10-05','09:00:00','ICT System','2023-10-05',1,'2023-10-05','Minor','Simple','2023-10-05 09:00:00','2023-10-05 09:30:00','Assisted in printing','Done',1,2,'Completed','2023-11-22 09:01:48','2023-11-22 09:01:48','Medium','Pending'),(83,'REQ-202310-00010','Judy','Sajo','misr6.dti@gmail.com',10,'2023-10-11','ICT Helpdesk','',6,23,'Convert link to QR Code','2023-10-11','13:00:00','ICT System','2023-10-11',1,'2023-10-11','Minor','Simple','2023-10-11 13:00:00','2023-10-11 13:20:00','Generated Customized QR Code','Done',1,2,'Completed','2023-11-22 09:03:27','2023-11-22 09:03:27','Medium','Pending'),(84,'REQ-202310-00011','Lyndy Exzyle','Miranda','misr6.dti@gmail.com',5,'2023-10-23','ICT Helpdesk','',1,1,'Updating of Operating system and other drivers','2023-10-23','10:00:00','ICT System','2023-10-23',3,'2023-10-23','Major','Simple','2023-10-23 10:20:00','2023-10-23 14:30:00','Updated operating system and drivers','Done',3,2,'Completed','2023-11-22 09:07:36','2023-11-22 09:07:36','Medium','Pending'),(85,'REQ-202310-00012','Ma. Kristine','Rosaldes','misr6.dti@gmail.com',5,'2023-10-04','ICT Helpdesk','',1,3,'Printer Error','2023-10-04','08:00:00','ICT System','2023-10-04',4,'2023-10-04','Minor','Simple','2023-10-04 08:00:00','2023-10-04 09:00:00','remove Foreign object inside printer','Done',4,2,'Completed','2023-11-22 09:13:11','2023-11-22 09:13:11','Medium','Pending'),(86,'REQ-202310-00013','Ma. Rose','Jayona','misr6.dti@gmail.com',10,'2023-10-10','ICT Helpdesk','',1,1,'Printer Error','2023-10-10','08:00:00','ICT System','2023-10-10',4,'2023-10-10','Minor','Simple','2023-10-10 08:00:00','2023-10-10 09:00:00','remove Foreign object inside printer','Done',4,2,'Completed','2023-11-22 09:28:21','2023-11-22 09:28:21','Medium','Pending'),(87,'REQ-202307-00001','Analyn ','Apiag','misr6@dti.gov.ph',10,'2023-07-11','ICT Helpdesk','',1,3,'printing problem','2023-07-11','08:00:00','ICT System','2023-07-11',4,'2023-07-11','Minor','Simple','2023-07-11 09:00:00','2023-07-11 14:00:00','check the printer setting','Done ',4,2,'Completed','2023-11-22 09:30:51','2023-11-22 09:30:51','Medium','Pending'),(88,'REQ-202311-00008','Arian','Reyes','misr6.dti@gmail.com',2,'2023-11-27','ICT Helpdesk','',1,1,'logging PC ','2023-11-27','08:30:00','ICT System','2023-11-27',4,'2023-11-27','Minor','Simple','2023-11-27 08:30:00','2023-11-27 02:33:00','UPGRADE TO SSD','DONE',4,2,'Completed','2023-11-22 09:34:15','2023-11-22 09:34:15','Medium','Pending'),(89,'REQ-202307-00002','Aurora','Alisen','misr6.dti@gmail.com',3,'2023-07-31','ICT Helpdesk','',1,1,'DISPLAY FREEZING ON START UP','2023-07-31','08:30:00','ICT System','2023-07-31',4,'2023-07-31','Minor','Simple','2023-07-31 08:30:00','2023-07-31 02:33:00','LOOOSE RAM AND HARD DISK, APPLY ERASUR IN RAM PINS','DONE',1,2,'Completed','2023-11-22 09:37:40','2023-11-22 09:37:40','Medium','Pending'),(90,'REQ-202307-00003','Bella','Bonto','BellaBonto@dti.gov.ph',5,'2023-07-11','ICT Helpdesk','',1,1,'EXCEL','2023-07-31','08:30:00','ICT System','2023-07-11',4,'2023-07-11','Minor','Simple','2023-07-11 08:30:00','2023-07-11 09:33:00','ADJUSTING FOR PRINTING AND SCANNING','DONE',4,2,'Completed','2023-11-22 09:39:44','2023-11-22 09:39:44','Medium','Pending'),(91,'REQ-202307-00004','Bella','Bonto','BellaBonto@dti.gov.ph',5,'2023-07-18','ICT Helpdesk','',1,1,'EXCEL','2023-07-18','08:30:00','ICT System','2023-07-18',4,'2023-07-18','Minor','Simple','2023-07-18 08:30:00','2023-07-18 09:30:00','ADJUSTING FOR PRINTING AND SCANNING','DONE',4,2,'Completed','2023-11-22 09:41:32','2023-11-22 09:41:32','Medium','Pending'),(92,'REQ-202307-00005','Bella','Bonto','BellaBonto@dti.gov.ph',5,'2023-07-18','ICT Helpdesk','',1,1,'EXCEL','2023-07-18','08:30:00','ICT System','2023-07-18',4,'2023-07-18','Minor','Simple','2023-07-18 08:30:00','2023-07-18 09:30:00','ADJUSTING PRINTING RANGE FOR PRINTING','DONE',4,2,'Completed','2023-11-22 09:42:39','2023-11-22 09:42:39','Medium','Pending'),(93,'REQ-202307-00006','Cathy','Pascua','misr6@dti.gov.ph',3,'2023-07-17','ICT Helpdesk','',1,4,'NEED ASSISTANCE FOR PRE-RECORDED MESSAGE OF ARD RACHEL','2023-07-17','08:30:00','ICT System','2023-07-17',4,'2023-07-18','Minor','Simple','2023-07-17 08:30:00','2023-07-17 09:30:00','SET UP Camera and record with the help of ma\\\'am judy sajo','DONE',4,2,'Completed','2023-11-22 09:45:24','2023-11-22 09:45:24','Medium','Pending'),(94,'REQ-202307-00007','Cathy','Pascua','misr6@dti.gov.ph',3,'2023-07-26','ICT Helpdesk','',1,1,'keyboard keys not working and printer installation','2023-07-26','08:30:00','ICT System','2023-07-26',1,'2023-07-26','Minor','Simple','2023-07-26 08:30:00','2023-07-26 09:30:00','replace keyboard and install driver','DONE',1,2,'Completed','2023-11-22 09:47:37','2023-11-22 09:47:37','Medium','Pending'),(95,'REQ-202307-00008','Ma. Dorita','Chavez','MaDoritaChavez.dti@gmail.com',10,'2023-07-25','ICT Helpdesk','',1,4,'low battery','2023-07-25','08:30:00','ICT System','2023-07-25',4,'2023-07-25','Minor','Simple','2023-07-25 08:30:00','2023-07-26 09:30:00','change off the UPS not using','DONE',4,2,'Completed','2023-11-22 09:53:26','2023-11-22 09:53:26','Medium','Pending'),(96,'REQ-202311-00009','Caesa','Nedula','misr6.dti@gmail.com',1,'2023-11-22','ICT Helpdesk','',1,2,'Laptop updating and BOD','2023-11-22','13:00:00','ICT System','2023-11-22',1,'2023-11-23','Major','Simple','2023-11-23 08:17:00','2023-11-23 08:17:00','corrupted OS','',1,2,'Completed','2023-11-23 00:17:53','2023-11-23 08:27:56','Medium','Pending'),(97,'REQ-202307-00009','May Ann','Arca','misr6@dti.gov.ph',4,'2023-07-26','ICT Helpdesk','',1,3,'Printer unrecognized and paused activity','2023-07-26','08:45:00','ICT System','2023-11-26',1,'2023-07-26','Minor','Simple','2023-07-26 09:01:00','2023-07-26 10:01:00','reinstall driver and configure printer preference','done',1,2,'Completed','2023-11-23 01:02:42','2023-11-23 01:02:42','Medium','Pending'),(98,'REQ-202307-00010','Rhea Jepee','Legario','misr6@dti.gov.ph',10,'2023-07-06','ICT Helpdesk','',1,3,'Printer software problem Epson scan unavailable','2023-07-06','08:45:00','ICT System','2023-07-06',1,'2023-07-06','Minor','Simple','2023-07-06 09:01:00','2023-07-06 10:01:00','Restart, reinstall scanner driver and initialize','done',1,2,'Completed','2023-11-23 01:06:06','2023-11-23 01:06:06','Medium','Pending'),(99,'REQ-202307-00011','Rhea Jepee','Legario','misr6@dti.gov.ph',10,'2023-07-26','ICT Helpdesk','',1,4,'Low battery','2023-07-06','08:45:00','ICT System','2023-07-06',4,'2023-07-06','Minor','Simple','2023-07-26 08:20:00','2023-07-26 08:30:00','Restart, reinstall scanner driver and initialize','done',4,2,'Completed','2023-11-23 01:08:51','2023-11-23 01:08:51','Medium','Pending'),(100,'REQ-202311-00010','Arel','Marco','misr6.dti@gmail.com',4,'2023-11-14','ICT Helpdesk','',5,18,'Logo of TNK for printing','2023-11-14','13:06:00','ICT System','2023-11-14',1,'2023-11-14','Minor','Simple','2023-11-14 13:06:00','2023-11-14 13:30:00','Created a customizable template of TNK logo','Done',1,2,'Completed','2023-11-23 01:11:02','2023-11-23 01:11:02','Medium','Pending'),(101,'REQ-202307-00012','Rheyzia Marie','Elgario','misr6@dti.gov.ph',10,'2023-07-14','ICT Helpdesk','',1,3,'Printer dont print color magenta','2023-07-14','08:00:00','ICT System','2023-07-14',4,'2023-07-06','Minor','Simple','2023-07-14 14:00:00','2023-07-14 14:15:00','Flash and clean the printer head','done and functioning',4,2,'Completed','2023-11-23 01:12:30','2023-11-23 01:12:30','Medium','Pending'),(102,'REQ-202307-00013','Rodolfo','Genillo','misr6@dti.gov.ph',10,'2023-07-31','ICT Helpdesk','',1,4,'Defective adapter','2023-07-31','08:00:00','ICT System','2023-07-31',1,'2023-07-31','Minor','Simple','2023-07-31 14:00:00','2023-07-31 14:15:00','replace adaptor','done and functioning',1,2,'Completed','2023-11-23 01:14:53','2023-11-23 01:14:53','Medium','Pending'),(103,'REQ-202307-00014','Sherlyn','Canales','misr6@dti.gov.ph',10,'2023-07-19','ICT Helpdesk','',1,3,'UPS and printer','2023-07-19','08:00:00','ICT System','2023-07-19',4,'2023-07-20','Minor','Simple','2023-07-20 09:00:00','2023-07-20 11:00:00','Defective paper senor. UPS new battery (s/n: kijo-12403146)','done and functioning',4,2,'Completed','2023-11-23 01:18:26','2023-11-23 01:18:26','Medium','Pending'),(104,'REQ-202307-00015','Sherlyn','Canales','misr6@dti.gov.ph',10,'2023-07-19','ICT Helpdesk','',1,2,'Laptop corrupt OS','2023-07-19','08:00:00','ICT System','2023-07-19',4,'2023-07-19','Minor','Simple','2023-07-19 10:00:00','2023-07-19 11:00:00','Install new OS','done and functioning',4,2,'Completed','2023-11-23 01:20:26','2023-11-23 01:20:26','Medium','Pending'),(105,'REQ-202307-00016','Sherlyn','Canales','misr6@dti.gov.ph',10,'2023-07-18','ICT Helpdesk','',1,3,'printer ink clogged','2023-07-18','08:00:00','ICT System','2023-07-18',4,'2023-07-18','Minor','Simple','2023-07-20 08:00:00','2023-07-24 09:00:00','hard flashing, clean, e pump the tube','done and the printer is now functioning',4,2,'Completed','2023-11-23 01:26:58','2023-11-23 01:26:58','Medium','Pending'),(106,'REQ-202307-00017','Sherlyn','Canales','misr6@dti.gov.ph',10,'2023-07-05','ICT Helpdesk','',1,3,'No printer driver','2023-07-05','08:00:00','ICT System','2023-07-06',4,'2023-07-06','Minor','Simple','2023-07-20 09:00:00','2023-07-06 02:00:00','Install printer driver','done ',4,2,'Completed','2023-11-23 01:28:53','2023-11-23 01:28:53','Medium','Pending'),(107,'REQ-202307-00018','Therese Grace','Marla','misr6@dti.gov.ph',2,'2023-07-26','ICT Helpdesk','',1,4,'Storage full','2023-07-26','08:00:00','ICT System','2023-07-26',4,'2023-07-26','Minor','Simple','2023-07-26 09:00:00','2023-07-26 02:00:00','Add additional 500gb HDD','done ',4,2,'Completed','2023-11-23 01:32:19','2023-11-23 01:32:19','Medium','Pending'),(108,'REQ-202310-00014','May Ann','Arca','misr6@dti.gov.ph',4,'2023-10-09','ICT Helpdesk','',5,21,'Set-up AVR','2023-10-09','08:00:00','ICT System','2023-10-09',1,'2023-11-09','Minor','Simple','2023-11-09 08:00:00','2023-10-09 12:00:00','setup AVR','done',1,2,'Completed','2023-11-23 02:20:34','2023-11-23 02:20:34','Medium','Pending'),(109,'REQ-202311-00011','Rheyzia Marie','Elgario','misr6@dti.gov.ph',10,'2023-11-10','ICT Helpdesk','',1,3,'Dirty and clogged printer head','2023-10-10','08:00:00','ICT System','2023-10-10',4,'2023-10-10','Minor','Simple','2023-10-10 10:29:00','2023-10-10 10:29:00','clean the nozzle and ink flushing','done',4,2,'Completed','2023-11-23 02:29:54','2023-11-23 02:29:54','Medium','Pending'),(110,'REQ-202310-00015','Rossel','Virtuoso','misr6@dti.gov.ph',3,'2023-10-20','ICT Helpdesk','',3,13,'setup and installation of bitdefender AVR','2023-10-20','08:00:00','ICT System','2023-10-20',2,'2023-10-20','Minor','Simple','2023-10-20 14:30:00','2023-10-20 15:30:00','install Bitdefender and generate BELAC','done',2,2,'Completed','2023-11-23 02:33:44','2023-11-23 02:33:44','Medium','Pending'),(111,'REQ-202310-00016','Thea Grace ','Cuer','misr6@dti.gov.ph',4,'2023-10-26','ICT Helpdesk','',2,5,'n','2023-10-26','08:00:00','ICT System','2023-10-26',4,'2023-10-26','Minor','Simple','2023-10-26 09:30:00','2023-10-26 09:35:00','Install wifi adapter (E220310023056005375','done',4,2,'Completed','2023-11-23 02:37:14','2023-11-23 02:37:14','Medium','Pending'),(112,'REQ-202311-00012','Jonathan','Tejida','angelopatrimonio@dti.gov.ph',10,'2023-11-23','ICT Helpdesk','',6,23,'Backup Files to External HDD','2023-11-23','10:39:00','ICT System','2023-11-23',3,'2023-11-23','Minor','Simple','2023-11-23 13:17:00','2023-11-23 13:17:00','Back up data to enclosure','Done',3,2,'Completed','2023-11-23 02:40:25','2023-11-23 08:27:38','Medium','Pending'),(113,'REQ-202310-00017','Ariane','Reyes','misr6.dti@gmail.com',2,'2023-10-09','ICT Helpdesk','',1,2,'Keybaord in laptop cannot function','2023-11-09','08:00:00','ICT System','2023-11-09',5,'2023-11-09','Minor','Simple','2023-11-09 09:30:00','2023-10-26 09:46:00','Go to device manager and update the keyboard','functioning',5,2,'Completed','2023-11-23 02:43:14','2023-11-23 02:43:14','Medium','Pending'),(114,'REQ-202310-00018','Francine','Demasis','misr6.dti@gmail.com',10,'2023-10-13','ICT Helpdesk','',3,12,'Request DTR FOR DIT iloilo','2023-10-13','08:00:00','ICT System','2023-10-13',1,'2023-10-14','Minor','Simple','2023-11-09 09:30:00','2023-10-26 09:46:00','Request DTR  for DTI iloilo','done',1,2,'Completed','2023-11-23 02:51:47','2023-11-23 02:51:47','Medium','Pending'),(115,'REQ-202310-00019','Francine','Demasis','misr6.dti@gmail.com',10,'2023-10-13','ICT Helpdesk','',3,13,'cell do not generate','2023-10-03','08:00:00','ICT System','2023-10-03',1,'2023-10-03','Minor','Simple','2023-11-03 09:30:00','2023-11-03 09:46:00','Vlookup function modified , re entered the function','done',1,2,'Completed','2023-11-23 03:01:25','2023-11-23 03:01:25','Medium','Pending'),(116,'REQ-202311-00013','Johna Raf','Montalvo','misr6@dti.gov.ph',4,'2023-11-03','ICT Helpdesk','',3,13,'DNS problem','2023-10-03','08:00:00','ICT System','2023-10-03',1,'2023-10-03','Minor','Simple','2023-11-03 10:30:00','2023-11-03 11:00:00','DNS problem','done',1,2,'Completed','2023-11-23 03:11:06','2023-11-23 03:11:06','Medium','Pending'),(117,'REQ-202311-00014','Judith','Kelly','misr6@dti.gov.ph',5,'2023-11-12','ICT Helpdesk','',1,3,'Printer error','2023-10-12','08:00:00','ICT System','2023-10-03',1,'2023-11-12','Minor','Simple','2023-11-12 10:30:00','2023-11-12 11:00:00','Restart the pc and head cleaning','done',5,2,'Completed','2023-11-23 03:12:58','2023-11-23 03:12:58','Medium','Pending'),(118,'REQ-202311-00015','Ma. Kristine','Rosaldes','misr6@dti.gov.ph',5,'2023-11-03','ICT Helpdesk','',2,5,'Connection with no internet connection','2023-10-03','08:00:00','ICT System','2023-10-03',1,'2023-11-03','Minor','Simple','2023-11-12 08:30:00','2023-11-12 09:00:00','DNS problem, set to static','done',1,2,'Completed','2023-11-23 03:29:03','2023-11-23 03:29:03','Medium','Pending'),(119,'REQ-202311-00016','Maria Victoria','Aspera','misr6@dti.gov.ph',5,'2023-11-06','ICT Helpdesk','',1,1,'The monitor did not function','2023-11-06','08:00:00','ICT System','2023-11-06',5,'2023-11-06','Minor','Simple','2023-11-06 08:30:00','2023-11-06 09:00:00','Change monitor ','Functioning',5,2,'Completed','2023-11-23 03:34:08','2023-11-23 03:34:08','Medium','Pending'),(120,'REQ-202311-00017','Mary ann ','Alteros','misr6@dti.gov.ph',10,'2023-11-14','ICT Helpdesk','',1,3,'No black ink','2023-11-14','08:00:00','ICT System','2023-11-14',1,'2023-11-14','Minor','Simple','2023-11-14 08:30:00','2023-11-14 09:00:00','No black ink and end of life service. pump ink tube to release the stack ink. reset','Done and Functioning',4,2,'Completed','2023-11-23 03:37:10','2023-11-23 03:40:19','Medium','Pending'),(121,'REQ-202311-00018','Mary Ann ','Alteros','misr6@dti.gov.ph',10,'2023-11-16','ICT Helpdesk','',1,1,'logging PC','2023-11-14','08:00:00','ICT System','2023-11-16',5,'2023-11-14','Minor','Simple','2023-11-14 08:00:00','2023-11-14 03:00:00','Defragment and clean all recycle bin , installing MS office','Done a',5,2,'Completed','2023-11-23 03:39:33','2023-11-23 03:39:33','Medium','Pending'),(122,'REQ-202311-00019','Rheyzia Marie','Elgario','misr6@dti.gov.ph',10,'2023-11-21','ICT Helpdesk','',1,4,'Low voltage','2023-11-21','08:00:00','ICT System','2023-11-21',4,'2023-11-21','Minor','Simple','2023-11-21 09:00:00','2023-11-14 09:15:00','Replace new battery and realign the on push button, brand kijo s/n: 12403193','Done and functioning',4,2,'Completed','2023-11-23 03:42:54','2023-11-23 03:42:54','Medium','Pending'),(123,'REQ-202311-00020','Rheyzia Marie','Elgario','misr6@dti.gov.ph',10,'2023-11-21','ICT Helpdesk','',1,4,'Low voltage','2023-11-21','08:00:00','ICT System','2023-11-21',4,'2023-11-21','Minor','Simple','2023-11-21 09:00:00','2023-11-21 09:15:00','Replace new battery and realign the on push button, brand kijo s/n: 12403193','Done and functioning',4,3,'Completed','2023-11-23 03:43:47','2023-11-23 03:43:47','Medium','Pending'),(124,'REQ-202311-00021','Sherlyn','Canales','misr6@dti.gov.ph',10,'2023-11-03','ICT Helpdesk','',2,8,'Connection with no internet connectio','2023-11-03','08:00:00','ICT System','2023-11-03',1,'2023-11-03','Minor','Simple','2023-11-03 09:00:00','2023-11-03 09:15:00','DNS problem','Done and functioning',1,2,'Completed','2023-11-23 03:47:29','2023-11-23 03:47:29','Medium','Pending'),(125,'REQ-202311-00022','Shyn Mea ','Bernales','misr6@dti.gov.ph',3,'2023-11-21','ICT Helpdesk','',1,3,'Printer blurred printing','2023-11-03','08:00:00','ICT System','2023-11-21',5,'2023-11-21','Minor','Simple','2023-11-21 14:00:00','2023-02-21 02:15:00','Power cleaning','Done ',5,2,'Completed','2023-11-23 03:57:06','2023-11-23 03:57:06','Medium','Pending'),(126,'REQ-202311-00023','Maria Victoria','Aspera','misr6@dti.gov.ph',5,'2023-11-10','ICT Helpdesk','',1,4,'Power supply and connection to PC','2023-11-10','20:00:00','ICT System','2023-11-10',4,'2023-11-10','Minor','Simple','2023-11-10 08:30:00','2023-11-10 20:45:00','check the power cord and check all related parts and check the printer connection','done and functioning',4,2,'Completed','2023-11-23 05:24:24','2023-11-23 05:24:24','Medium','Pending'),(127,'REQ-202311-00024','Ariane','Reyes','misr6.dti@gmail.com',2,'2023-11-27','ICT Helpdesk','',1,1,'logging','2023-11-27','20:30:00','ICT System','2023-11-27',4,'2023-11-27','Minor','Simple','2023-11-27 08:30:00','2023-11-27 14:00:00','done and functional','done',4,2,'Completed','2023-11-23 05:53:15','2023-11-23 05:53:15','Medium','Pending'),(128,'REQ-202311-00025','Ariane','Reyes','misr6.dti@gmail.com',2,'2023-11-27','ICT Helpdesk','',1,1,'logging pc','2023-11-27','20:30:00','ICT System','2023-11-27',4,'2023-11-27','Minor','Simple','2023-11-27 08:30:00','2023-11-27 14:00:00','done and functional','done',4,2,'Completed','2023-11-23 05:54:11','2023-11-23 05:54:11','Medium','Pending'),(129,'REQ-202307-00019','Ariane','Reyes','misr6.dti@gmail.com',2,'2023-07-27','ICT Helpdesk','',1,1,'logging pc','2023-07-27','20:30:00','ICT System','2023-07-27',4,'2023-07-27','Minor','Simple','2023-07-27 08:30:00','2023-07-27 14:00:00','done and functional','done',4,2,'Completed','2023-11-23 05:56:00','2023-11-23 05:56:00','Medium','Pending'),(130,'REQ-202307-00020','Ma. Dorita','Chavez','MaDoritaChavez.dti@gmail.com',10,'2023-07-26','ICT Helpdesk','',1,4,'low battery','2023-07-26','20:30:00','ICT System','2023-07-26',4,'2023-07-27','Minor','Simple','2023-07-26 17:00:00','2023-07-26 08:00:00','Change new battery','Turn off the UPS when not using',4,2,'Completed','2023-11-23 05:59:26','2023-11-23 05:59:26','Medium','Pending'),(131,'REQ-202307-00021','Elian Angel','Dagang','MaDoritaChavez.dti@gmail.com',10,'2023-07-31','ICT Helpdesk','',2,8,'Unserviceable network drivers, office applications, services and undetected network adapters','2023-07-31','20:30:00','ICT System','2023-07-31',4,'2023-07-31','Minor','Simple','2023-07-31 17:00:00','2023-07-31 08:00:00','tried to reinstall driver but failed, cloned the files, install new OS and transfer the files , install the necessary application','done',1,2,'Completed','2023-11-23 06:12:43','2023-11-23 06:12:43','Medium','Pending'),(132,'REQ-202307-00022','Glecita','Sojonia','MaDoritaChavez.dti@gmail.com',5,'2023-07-10','ICT Helpdesk','',1,1,'Mouse','2023-07-10','20:30:00','ICT System','2023-07-10',4,'2023-07-10','Minor','Simple','2023-07-10 08:00:00','2023-07-31 09:00:00','Replace new mouse','done',4,2,'Completed','2023-11-23 06:15:15','2023-11-23 06:15:15','Medium','Pending'),(133,'REQ-202307-00023','Glecita','Sojonia','misr6.dti@gmail.com',5,'2023-07-25','ICT Helpdesk','',1,3,'Paper','2023-07-25','20:30:00','ICT System','2023-07-25',4,'2023-07-25','Minor','Simple','2023-07-25 08:00:00','2023-07-25 09:00:00','check and removed the jammed paper','done',4,2,'Completed','2023-11-23 06:17:58','2023-11-23 06:17:58','Medium','Pending'),(134,'REQ-202307-00024','Glenda','Loloy','GlendaLoloy@dti.gov.ph',3,'2023-07-07','ICT Helpdesk','',1,3,'Printer','2023-07-07','20:30:00','ICT System','2023-07-07',4,'2023-07-07','Minor','Simple','2023-07-07 08:00:00','2023-07-07 09:00:00','Transfer and setup','done',4,2,'Completed','2023-11-23 06:20:23','2023-11-23 06:20:23','Medium','Pending'),(135,'REQ-202307-00025','Jeryl','Glory','misr6@dti.gov.ph',10,'2023-07-12','ICT Helpdesk','',1,4,'OS and defective HDD','2023-07-12','20:30:00','ICT System','2023-07-12',4,'2023-07-12','Minor','Simple','2023-07-12 08:00:00','2023-07-07 09:00:00','REFORMAT AND ADD A SEPERATE HDD for OS','done',4,2,'Completed','2023-11-23 06:23:36','2023-11-23 06:23:36','Medium','Pending'),(136,'REQ-202307-00026','Jeryl','Glory','misr6@dti.gov.ph',10,'2023-07-08','ICT Helpdesk','',1,1,'Setup PC for online application','2023-07-08','20:30:00','ICT System','2023-07-08',1,'2023-07-08','Minor','Simple','2023-07-07 08:00:00','2023-07-08 09:00:00','Connect all cables and insert network adapter','done',1,2,'Completed','2023-11-23 06:26:28','2023-11-23 06:26:28','Medium','Pending'),(137,'REQ-202307-00027','Johna Raf','Montalvo','misr6@dti.gov.ph',4,'2023-07-28','ICT Helpdesk','',1,4,'Inaccessible folder','2023-07-28','20:30:00','ICT System','2023-07-28',1,'2023-07-28','Minor','Simple','2023-07-28 08:00:00','2023-07-28 09:00:00','Scan drive, fix drive, duplicate flies to the root folder','done',1,2,'Completed','2023-11-23 06:30:17','2023-11-23 06:30:17','Medium','Pending'),(138,'REQ-202307-00028','Johna Raf','Montalvo','misr6@dti.gov.ph',4,'2023-07-24','ICT Helpdesk','',1,3,'Ink notification shows no ink','2023-07-24','20:30:00','ICT System','2023-07-24',1,'2023-07-24','Minor','Simple','2023-07-24 10:30:00','2023-07-24 10:43:00','Reset ink notification','done',1,2,'Completed','2023-11-23 06:32:30','2023-11-23 06:32:30','Medium','Pending'),(139,'REQ-202307-00029','Joy Anne ','Erazo','misr6@dti.gov.ph',10,'2023-07-08','ICT Helpdesk','',1,4,'No bootable device detected','2023-07-08','20:30:00','ICT System','2023-07-08',1,'2023-07-08','Minor','Simple','2023-07-08 08:30:00','2023-07-08 09:30:00','Open lid and tighten the chord, rearrange and transfer the units','done',1,2,'Completed','2023-11-23 06:37:05','2023-11-23 06:37:05','Medium','Pending'),(140,'REQ-202307-00030','Judith','Kelly','misr6@dti.gov.ph',5,'2023-07-26','ICT Helpdesk','',1,3,'broken parts on printer feeder','2023-07-26','20:30:00','ICT System','2023-07-26',1,'2023-07-26','Minor','Simple','2023-07-26 08:30:00','2023-07-26 09:30:00','Replace broken parts with span parts stocked','done',1,2,'Completed','2023-11-23 06:40:07','2023-11-23 06:40:07','Medium','Pending'),(141,'REQ-202311-00026','Mary Ann','Alteros','misr6@dti.gov.ph',10,'2023-11-17','ICT Helpdesk','',1,2,'Laptop','2023-11-17','15:30:00','ICT System','2023-11-17',4,'2023-11-17','Minor','Simple','2023-11-17 15:30:00','2023-11-17 16:00:00','End of life service. Reset','Done and functioning',4,3,'Completed','2023-11-23 08:53:25','2023-11-23 08:53:25','Medium','Pending'),(142,'REQ-202311-00027','Mary Ann','Alteros','misr6@dti.gov.ph',10,'2023-11-16','ICT Helpdesk','',1,2,'Laptop','2023-11-16','15:15:00','ICT System','2023-11-16',4,'2023-11-16','Minor','Simple','2023-11-16 15:30:00','2023-11-16 16:00:00','End of life service and stock ink tube. reset and pupm ink tube','Done and functioning',4,3,'Completed','2023-11-23 08:55:21','2023-11-23 08:55:21','Medium','Pending'),(143,'REQ-202311-00028','Mary Ann','Alteros','misr6@dti.gov.ph',10,'2023-11-14','ICT Helpdesk','',1,2,'Laptop','2023-11-14','09:00:00','ICT System','2023-11-14',4,'2023-11-14','Minor','Simple','2023-11-14 09:00:00','2023-11-14 13:00:00','reset, cleaned and flashing pump the ink tube','Done and functioning',4,3,'Completed','2023-11-23 08:58:20','2023-11-23 08:58:20','Medium','Pending'),(144,'REQ-202311-00029','Florenda','Abian','florendaoctoberianaabian@dti.gov.ph',3,'2023-11-22','ICT Helpdesk','',5,19,'AVP re: OTOP Accomplishment','2023-11-23','08:30:00','ICT System','2023-11-22',3,'2023-11-22','Minor','Simple','2023-11-22 13:10:00','2023-11-23 08:30:00','','Done',3,3,'Completed','2023-11-24 00:34:39','2023-11-24 00:34:39','Medium','Pending'),(148,'REQ-202311-00030','Shayne','Jornadal','shaynejornadal@dti.gov.ph',10,'2023-11-24','ICT Helpdesk','',3,12,'DTR for November 2023','2023-11-24','16:05:00','ICT System','2023-11-24',NULL,'2023-11-24','Minor','Simple','2023-11-24 15:55:00','2023-11-24 16:00:00','','',3,3,'Completed','2023-11-24 07:55:53','2023-11-24 08:16:27','Medium','Done'),(149,'REQ-202311-00031','Charlene Joy','Adeja','iloilo.dti@negosyocenter.gov.ph',10,'2023-11-24','ICT Helpdesk',NULL,3,13,'Request for List of MSMEs enrolled in DTI Programs','2023-11-24','16:14:00','Intercom','2023-11-24',3,'2023-11-24','Minor','Simple','2023-11-24 14:30:00','2023-11-24 16:15:00','','',3,3,'Completed','2023-11-24 08:17:25','2023-11-24 08:17:25','Low','Pending');
/*!40000 ALTER TABLE `helpdesks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hosts`
--

DROP TABLE IF EXISTS `hosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hosts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Host` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hosts`
--

LOCK TABLES `hosts` WRITE;
/*!40000 ALTER TABLE `hosts` DISABLE KEYS */;
INSERT INTO `hosts` VALUES (1,'Judith Guillo'),(2,'Ermelinda Pollentes');
/*!40000 ALTER TABLE `hosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meetings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ZoomNo` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `OfficeID` int NOT NULL,
  `DivisionID` int NOT NULL,
  `DateRequested` date NOT NULL,
  `Topic` text NOT NULL,
  `DateSchedule` date NOT NULL,
  `TimeStart` time NOT NULL,
  `TimeEnd` time NOT NULL,
  `HostID` int DEFAULT NULL,
  `MeetingID` varchar(45) DEFAULT NULL,
  `Passcode` varchar(45) DEFAULT NULL,
  `ZoomLink` text,
  `GeneratedBy` int DEFAULT NULL,
  `Remarks` text,
  `Status` enum('Pending','Scheduled','Unavailable','Cancelled') DEFAULT 'Pending',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `ZoomNo_UNIQUE` (`ZoomNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `CategoryID` int NOT NULL,
  `SubCategory` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`CategoryID`),
  KEY `fk7_idx` (`CategoryID`),
  CONSTRAINT `fk7` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (1,1,'Desktop'),(2,1,'Laptop'),(3,1,'Printer'),(4,1,'Others'),(5,2,'Internet Access'),(6,2,'LAN'),(7,2,'Network Sharing'),(8,2,'Others'),(9,3,'Payroll'),(10,3,'eNGAS'),(11,3,'HR System'),(12,3,'DTR System'),(13,3,'Others'),(14,4,'O365 Account'),(15,4,'IHRIS'),(16,4,'eNGAS'),(17,4,'Others'),(18,5,'Graphics'),(19,5,'Video Editting'),(20,5,'Pitch Deck/PPT Presentation'),(21,5,'Set up Venue'),(22,5,'Others'),(23,6,'Others'),(24,3,'iMMIS');
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` enum('Admin','Staff','Student') NOT NULL DEFAULT 'Student',
  `ChangePassword` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dan Alfrei','Celestial','Fuerte','dace.phage@gmail.com','09818098637','Iloilo City','MIS_Fuerte','$2y$10$x.MVSTG2t568RBDpQ/OOaO5fk0MHz0J0U7NISgryX/ZqFYaKX1M8i','Admin',NULL),(2,'Angelo','G.','Patrimonio','angelopatrimonio@dti.gov.ph','09123456789','Iloilo City','MIS_Ghelo','$2y$10$XUBbkqJMSrfqeKC1O27omeEsz.Jucxz3DkcvkvFyTrCgFfiOemaLu','Admin',NULL),(3,'Bemy John',NULL,'Collado','bemyjohncollado@dti.gov.ph','09123456789','Iloilo City','MIS_Collado','$2y$10$XUBbkqJMSrfqeKC1O27omeEsz.Jucxz3DkcvkvFyTrCgFfiOemaLu','Admin',NULL),(4,'Kristopher Gerard',NULL,'Jovero','kristophergerard13@gmail.com','09123456789','Iloilo City','MIS_Jovero','$2y$10$XUBbkqJMSrfqeKC1O27omeEsz.Jucxz3DkcvkvFyTrCgFfiOemaLu','Staff',NULL),(5,'Ana Grace',NULL,'Barba','barbaanagrace98@gmail.com','09123456789','Iloilo City','GIP_Ana','$2y$10$XUBbkqJMSrfqeKC1O27omeEsz.Jucxz3DkcvkvFyTrCgFfiOemaLu','Staff',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-24 17:12:26
