-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: isdsdb
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (2,'jdane@gmail.com','Jane','Dane','Address'),(17,'jdoe@gmail.com','John','Doe','Address'),(18,'test@gmail.com','Test','Test','Addresss'),(20,'Airi@gmail.com','Airi','Satou','Address'),(21,'Angelica@gmail.com','Angelica','Ramos','Address'),(22,'Ashton@gmail.com','Ashton','Cox','Addresss'),(23,'Bradley@gmail.com','Bradley','Greer','Address'),(24,'Brenden@gmail.com','Brenden','Wagner','Address'),(25,'BrielleWilliamson@gmail.com','Brielle','Williamson','Addresss'),(26,'BrunoNash@gmail.com','Bruno','Nash','Address'),(27,'CaesarVance@gmail.com','Caesar','Vance','Address'),(28,'CaraStevens@gmail.com','Cara','Stevens','Addresss');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `HelpdeskID` int NOT NULL,
  `FileName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `filefk_idx` (`HelpdeskID`),
  CONSTRAINT `filefk` FOREIGN KEY (`HelpdeskID`) REFERENCES `helpdesks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,17,'6568209666e3d.png'),(2,20,'65682155d676d.png');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
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
  `CategoryID` int NOT NULL,
  `SubCategoryID` int NOT NULL,
  `PreferredSchedule` datetime DEFAULT NULL,
  `Complaint` text NOT NULL,
  `RequestedBy` int NOT NULL,
  `DateRequested` date NOT NULL,
  `RequestType` enum('ICT Helpdesk','ICT Maintenance') DEFAULT 'ICT Helpdesk',
  `ServicePriority` enum('High','Medium','Low') DEFAULT 'Medium',
  `RepairType` enum('Minor','Major') DEFAULT 'Minor',
  `RepairClassification` enum('Simple','Medium','Complex','Highly Technical') DEFAULT 'Simple',
  `AssignedStaff` int DEFAULT NULL,
  `DateReceived` date DEFAULT NULL,
  `DateScheduled` date DEFAULT NULL,
  `DatetimeStarted` datetime DEFAULT NULL,
  `DatetimeFinished` datetime DEFAULT NULL,
  `Diagnosis` text,
  `Remarks` text,
  `ServicedBy` int DEFAULT NULL,
  `ApprovedBy` int DEFAULT NULL,
  `Medium` enum('ICT System','Phone','Memo','Intercom','Email') DEFAULT 'ICT System',
  `PropertyNo` varchar(45) DEFAULT NULL,
  `Csf` enum('Pending','Done') DEFAULT 'Pending',
  `Status` enum('Open','Pending','Completed','Denied','Cancelled','Unserviceable','Pre-Repair') DEFAULT 'Open',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `RequestNo_UNIQUE` (`RequestNo`),
  KEY `fk2_idx` (`CategoryID`),
  KEY `fk3_idx` (`SubCategoryID`),
  KEY `fk4_idx` (`AssignedStaff`),
  KEY `fk5_idx` (`ServicedBy`),
  KEY `fk6_idx` (`ApprovedBy`),
  CONSTRAINT `fk2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk3` FOREIGN KEY (`SubCategoryID`) REFERENCES `subcategories` (`id`),
  CONSTRAINT `fk4` FOREIGN KEY (`AssignedStaff`) REFERENCES `users` (`id`),
  CONSTRAINT `fk5` FOREIGN KEY (`ServicedBy`) REFERENCES `users` (`id`),
  CONSTRAINT `fk6` FOREIGN KEY (`ApprovedBy`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `helpdesks`
--

LOCK TABLES `helpdesks` WRITE;
/*!40000 ALTER TABLE `helpdesks` DISABLE KEYS */;
INSERT INTO `helpdesks` VALUES (14,'REQ-202311-00001',1,1,'2023-11-30 06:29:00','Monitor ko wala naga gana',1,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Cancelled','2023-11-30 05:30:08','2023-11-30 06:22:38'),(15,'REQ-202311-00002',1,2,'2023-11-30 06:30:00','no bootable device',1,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Cancelled','2023-11-30 05:30:59','2023-11-30 05:38:51'),(16,'REQ-202311-00003',1,3,'2023-11-30 06:33:00','Wala gagana akon printer',1,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Open','2023-11-30 05:34:05','2023-11-30 05:34:05'),(17,'REQ-202311-00004',1,1,'2023-11-30 06:40:00','no power',1,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Open','2023-11-30 05:41:42','2023-11-30 05:41:42'),(18,'REQ-202311-00005',1,1,'2023-11-30 06:41:00','asdasdas',1,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Cancelled','2023-11-30 05:42:02','2023-11-30 06:22:43'),(19,'REQ-202311-00006',1,1,'2023-11-30 06:43:00','asdasdasdas',1,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Open','2023-11-30 05:43:43','2023-11-30 05:43:43'),(20,'REQ-202311-00007',1,1,'2023-11-30 06:44:00','adasdas',1,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Open','2023-11-30 05:44:53','2023-11-30 05:44:53'),(21,'REQ-202311-00008',2,6,'2023-11-30 09:12:00','asdasdas',3,'2023-11-30','ICT Helpdesk','Medium','Minor','Simple',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ICT System',NULL,'Pending','Cancelled','2023-11-30 08:12:04','2023-11-30 08:12:17');
/*!40000 ALTER TABLE `helpdesks` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (1,1,'Desktop'),(2,1,'Laptop'),(3,1,'Printer'),(4,1,'Others'),(5,2,'Internet Access'),(6,2,'LAN'),(7,2,'Network Sharing'),(8,2,'Others'),(9,3,'Payroll'),(10,3,'eNGAS'),(11,3,'HR System'),(12,3,'DTR System'),(13,3,'Others'),(14,4,'O365 Account'),(15,4,'IHRIS'),(16,4,'eNGAS'),(17,4,'Others'),(18,5,'Graphics'),(19,5,'Video Editting'),(20,5,'Pitch Deck/PPT Presentation'),(21,5,'Set up Venue'),(22,5,'Others'),(23,6,'Others');
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
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `LastName` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Position` varchar(45) DEFAULT NULL,
  `Email` varchar(45) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Sex` enum('Male','Female') DEFAULT NULL,
  `Address` varchar(100) NOT NULL,
  `ClientType` enum('Citizen','Business','Government') DEFAULT NULL,
  `Phone` varchar(20) NOT NULL,
  `DivisionID` int DEFAULT NULL,
  `PWD` enum('Yes','No') DEFAULT 'No',
  `Username` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `TempPassword` varchar(45) DEFAULT NULL,
  `Role` enum('Employee','Officer','Staff','Admin') DEFAULT 'Employee',
  `Status` enum('Available','Unavailable','Loaded') DEFAULT 'Available',
  `Activation` enum('Activated','Deactivated') DEFAULT 'Activated',
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Dan Alfrei','Celestial','Fuerte','iMMIS/NC Technical Support Staff','dace.phage@gmail.com','2000-09-29','Male','Iloilo City Proper','Government','09818098637',1,'No','MIS_Fuerte','$2y$10$6vdxsWWG0W/e.0Z/caLHjuD1QR0YpeInE2sNzDLip7cRD5zzNxKcW',NULL,'Employee','Available','Activated','2023-11-30 07:45:45','2023-11-30 07:46:54');
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

-- Dump completed on 2023-11-30 17:30:21
