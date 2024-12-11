CREATE DATABASE  IF NOT EXISTS `w3gym` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `w3gym`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: w3gym
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Carl Nicolas','Mamaril','Navarro','Nicol_as','$2y$10$WmJY032H.W0bUmECzW/8OeVCFSeH9VxyD7BxMbmqQmvBXcOw.Cf5i','202311511@gordoncollege.edu.ph','09668769887'),(4,'Lhar Jashtine','Manansala','Militante','Lhar','$2y$10$sdA2WFKO.xaele74Ak9Rceqlna45olxw.Lq6PR4BTh4RDemo6lnji','202311643@gordoncollege.edu.ph','09304186139'),(5,'Jay Carlo','Vinuya','Dimapilis','Jay_Carlo','$2y$10$/0wx/ulYbzZWL62DdbFq..Ww.FC6ZjKcIlUFCzLRVm4ylEnV8s1my','202310935@gordoncollege.edu.ph','09997212840'),(6,'Michael Angelo','Mendez','Caliguia','Raven','$2y$10$C.vzrodGI2cQ0gkMZpuwOuO1TAHTKgWzFs3Bzbu2qPN8DJ0x5yo7G','michaelcaliguia089@gmail.com','09163947670');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `join_date` date NOT NULL DEFAULT curdate(),
  `membership_type` enum('One Day','Weekly','Monthly','Yearly','Expired') DEFAULT NULL,
  `membership_start_date` date DEFAULT curdate(),
  `membership_end_date` date GENERATED ALWAYS AS (case when `membership_type` = 'Monthly' then `membership_start_date` + interval 1 month when `membership_type` = 'Yearly' then `membership_start_date` + interval 1 year when `membership_type` = 'Weekly' then `membership_start_date` + interval 1 week when `membership_type` = 'One Day' then `membership_start_date` + interval 1 day else NULL end) STORED,
  `status` enum('Active','Disabled') DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `email`, `phone`, `join_date`, `membership_type`, `membership_start_date`, `status`, `updated_at`) VALUES (1,'Juan','','Dela Cruz','juanDC_123','$2y$10$PGAYsX05ygyplT7i7JvJbO1G9Xruwwn6vdihYWXyyMolUHTupfVIS','juanDC@gmail.com','09877812431','2024-12-11','One Day','2024-12-12','Active','2024-12-11 16:27:27');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-12  0:31:44
