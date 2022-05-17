-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: medicine
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `doc_types`
--

DROP TABLE IF EXISTS `doc_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doc_types` (
  `id` int NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `type_desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_types`
--

LOCK TABLES `doc_types` WRITE;
/*!40000 ALTER TABLE `doc_types` DISABLE KEYS */;
INSERT INTO `doc_types` VALUES (1,'miss','Miss Death'),(2,'mr_scd','Mr Suicide'),(3,'dr_kill','Dr Kill'),(4,'dr_vader','Dr Vader');
/*!40000 ALTER TABLE `doc_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medrequest`
--

DROP TABLE IF EXISTS `medrequest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medrequest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_type` int DEFAULT NULL,
  `date_t` date DEFAULT NULL,
  `status` varchar(45) DEFAULT 'NEW',
  PRIMARY KEY (`id`),
  KEY `id_user_idx` (`id_user`),
  KEY `id_types_idx` (`id_type`),
  CONSTRAINT `id_types` FOREIGN KEY (`id_type`) REFERENCES `doc_types` (`id`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medrequest`
--

LOCK TABLES `medrequest` WRITE;
/*!40000 ALTER TABLE `medrequest` DISABLE KEYS */;
INSERT INTO `medrequest` VALUES (10,1,1,'2022-05-17','NEW'),(11,2,2,'2022-05-17','NEW'),(12,3,3,'2022-05-17','NEW'),(13,4,3,'2022-05-17','NEW'),(14,5,1,'2022-05-17','NEW'),(15,6,4,'2022-05-17','NEW'),(16,7,2,'2022-05-17','NEW'),(17,8,1,'2022-05-17','NEW'),(18,9,3,'2022-05-17','NEW');
/*!40000 ALTER TABLE `medrequest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Igor','063-07-777'),(2,'Jhon','066-77-777'),(3,'Miller','777-77-777'),(4,'Junior','066-07-777'),(5,'Oliver','063-07-778'),(6,'Senior','777-77-777'),(7,'asdas','066-03-075'),(8,'Monro','066-77-777'),(9,'Smith','011-07-177');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'medicine'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-17 17:51:07
