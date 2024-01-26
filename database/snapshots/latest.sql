
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `campuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `campuses` WRITE;
/*!40000 ALTER TABLE `campuses` DISABLE KEYS */;
INSERT INTO `campuses` VALUES (1,'ACCESS','2023-12-25 05:38:01','2023-12-25 05:38:01'),(2,'TACURONG','2023-12-25 05:38:01','2023-12-25 05:38:01'),(3,'ISULAN','2023-12-25 05:38:01','2023-12-25 05:38:01'),(4,'LUTAYAN','2023-12-25 05:38:01','2023-12-25 05:38:01'),(5,'BAGUMBAYAN','2023-12-25 05:38:01','2023-12-25 05:38:01'),(6,'KALAMANSIG','2023-12-25 05:38:01','2023-12-25 05:38:01'),(7,'PALIMBANG','2023-12-25 05:38:01','2023-12-25 05:38:01');
/*!40000 ALTER TABLE `campuses` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `degree_programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `degree_programs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `degree_programs` WRITE;
/*!40000 ALTER TABLE `degree_programs` DISABLE KEYS */;
INSERT INTO `degree_programs` VALUES (1,'Doctor of Philosophy in Biology','2023-12-25 05:38:02','2023-12-25 05:38:02'),(2,'Doctor of Technology Education','2023-12-25 05:38:02','2023-12-25 05:38:02'),(3,'PhD in Education major in Physical Education','2023-12-25 05:38:02','2023-12-25 05:38:02'),(4,'Doctor of Education Major in Educational Management','2023-12-25 05:38:02','2023-12-25 05:38:02'),(5,'PhD in Education Major in Curriculum Development','2023-12-25 05:38:02','2023-12-25 05:38:02');
/*!40000 ALTER TABLE `degree_programs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(125) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `hei_disconnection_reasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hei_disconnection_reasons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `hei_disconnection_reasons` WRITE;
/*!40000 ALTER TABLE `hei_disconnection_reasons` DISABLE KEYS */;
/*!40000 ALTER TABLE `hei_disconnection_reasons` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `higher_education_institutes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `higher_education_institutes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `higher_education_institutes` WRITE;
/*!40000 ALTER TABLE `higher_education_institutes` DISABLE KEYS */;
INSERT INTO `higher_education_institutes` VALUES (1,'Abra State Institute of Science and Technology','2023-12-25 05:38:01','2023-12-25 05:38:01'),(2,'Adamson University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(3,'Adventist International Institute of Advanced Studies','2023-12-25 05:38:01','2023-12-25 05:38:01'),(4,'Adventist University of the Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(5,'Aklan State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(6,'Aldersgate College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(7,'AMA Computer University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(8,'Angeles University Foundation','2023-12-25 05:38:01','2023-12-25 05:38:01'),(9,'Aquinas University of Legazpi','2023-12-25 05:38:01','2023-12-25 05:38:01'),(10,'Arellano University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(11,'Asia Pacific College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(12,'Asian Institute of Journalism and Communication','2023-12-25 05:38:01','2023-12-25 05:38:01'),(13,'Asian Institute of Management','2023-12-25 05:38:01','2023-12-25 05:38:01'),(14,'Asian Institute of Maritime Studies','2023-12-25 05:38:01','2023-12-25 05:38:01'),(15,'Asian Social Institute','2023-12-25 05:38:01','2023-12-25 05:38:01'),(16,'Assumption College San Lorenzo','2023-12-25 05:38:01','2023-12-25 05:38:01'),(17,'Ateneo de Davao University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(18,'Ateneo de Manila University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(19,'Ateneo de Naga University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(20,'Ateneo de Zamboanga University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(21,'Aurora State College of Technology','2023-12-25 05:38:01','2023-12-25 05:38:01'),(22,'Baliuag University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(23,'Bataan Peninsula State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(24,'Batangas State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(25,'Benguet State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(26,'Bicol University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(27,'Biliran Province State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(28,'Bohol Island State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(29,'Bukidnon State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(30,'Bulacan Agricultural State College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(31,'Bulacan State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(32,'Cagayan State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(33,'Camarines Norte State College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(34,'Camarines Sur Polytechnic Colleges','2023-12-25 05:38:01','2023-12-25 05:38:01'),(35,'Capitol University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(36,'Capiz State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(37,'Caraga State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(38,'Catanduanes State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(39,'Cavite State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(40,'Cebu Doctors\' University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(41,'Cebu Institute of Medicine','2023-12-25 05:38:01','2023-12-25 05:38:01'),(42,'Cebu Institute of Technology','2023-12-25 05:38:01','2023-12-25 05:38:01'),(43,'Cebu Normal University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(44,'Cebu Technological University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(45,'Central Colleges of the Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(46,'Central Luzon State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(47,'Central Mindanao University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(48,'Central Philippine Adventist College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(49,'Central Philippine University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(50,'Centro Escolar University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(51,'Chiang Kai Shek College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(52,'Christ the King College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(53,'Colegio de Dagupan','2023-12-25 05:38:01','2023-12-25 05:38:01'),(54,'Colegio de San Juan de Letran','2023-12-25 05:38:01','2023-12-25 05:38:01'),(55,'College of the Holy Spirit','2023-12-25 05:38:01','2023-12-25 05:38:01'),(56,'Cor Jesu College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(57,'Davao Doctors College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(58,'De La Salle Lipa','2023-12-25 05:38:01','2023-12-25 05:38:01'),(59,'De La Salle Medical and Health Sciences Institute','2023-12-25 05:38:01','2023-12-25 05:38:01'),(60,'De La Salle University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(61,'De La Salle-College of Saint Benilde','2023-12-25 05:38:01','2023-12-25 05:38:01'),(62,'Don Bosco Technical College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(63,'Don Honorio Ventura Technological State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(64,'Don Mariano Marcos Memorial State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(65,'Eastern Samar State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(66,'Eastern Visayas State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(67,'Emilio Aguinaldo College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(68,'Eulogio Amang\" Rodriguez Institute of Science and Techno\"','2023-12-25 05:38:01','2023-12-25 05:38:01'),(69,'Father Saturnino Urios University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(70,'FEATI University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(71,'FEU Institute of Technology','2023-12-25 05:38:01','2023-12-25 05:38:01'),(72,'Filamer Christian University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(73,'Guagua National Colleges','2023-12-25 05:38:01','2023-12-25 05:38:01'),(74,'Guimaras State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(75,'Holy Angel University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(76,'Holy Cross of Davao College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(77,'Holy Name University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(78,'Holy Trinity University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(79,'Ilocos Sur Polytechnic State College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(80,'Iloilo Science and Technology University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(81,'Isabela State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(82,'John B. Lacson Foundation Maritime University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(83,'José Rizal University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(84,'La Consolacion College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(85,'La Consolacion College Manila','2023-12-25 05:38:01','2023-12-25 05:38:01'),(86,'La Consolacion University Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(87,'La Salle University, Ozamiz City','2023-12-25 05:38:01','2023-12-25 05:38:01'),(88,'Laguna State Polytechnic University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(89,'Leyte Normal University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(90,'Liceo de Cagayan University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(91,'Lipa City Colleges','2023-12-25 05:38:01','2023-12-25 05:38:01'),(92,'Lorma Colleges','2023-12-25 05:38:01','2023-12-25 05:38:01'),(93,'Lourdes College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(94,'Lyceum of the Philippines University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(95,'Lyceum-Northwestern University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(96,'Manila Central University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(97,'Manuel L. Quezon University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(98,'Manuel S. Enverga University Foundation','2023-12-25 05:38:01','2023-12-25 05:38:01'),(99,'Mapúa University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(100,'Mariano Marcos State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(101,'Marinduque State College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(102,'Meycauayan College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(103,'Mindanao State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(104,'Mindanao State University - Iligan Institute of Technolog','2023-12-25 05:38:01','2023-12-25 05:38:01'),(105,'Misamis Oriental State College of Agriculture and Technol','2023-12-25 05:38:01','2023-12-25 05:38:01'),(106,'Mountain View College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(107,'National College of Business and Arts','2023-12-25 05:38:01','2023-12-25 05:38:01'),(108,'National Defense College of the Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(109,'National Teachers College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(110,'National University, Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(111,'Negros Oriental State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(112,'New Era University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(113,'Northern Luzon Adventist College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(114,'Northwest Samar State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(115,'Northwestern University, Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(116,'Notre Dame of Dadiangas University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(117,'Notre Dame of Kidapawan College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(118,'Notre Dame of Marbel University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(119,'Notre Dame University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(120,'Nueva Ecija University of Science and Technology','2023-12-25 05:38:01','2023-12-25 05:38:01'),(121,'Nueva Vizcaya State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(122,'Olivarez College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(123,'Our Lady of Fatima University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(124,'Palawan State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(125,'Pamantasan ng Lungsod ng Maynila','2023-12-25 05:38:01','2023-12-25 05:38:01'),(126,'Pangasinan State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(127,'Partido State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(128,'Pasig Catholic College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(129,'PATTS College of Aeronautics','2023-12-25 05:38:01','2023-12-25 05:38:01'),(130,'Philippine Christian University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(131,'Philippine Normal University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(132,'Philippine School of Business Administration','2023-12-25 05:38:01','2023-12-25 05:38:01'),(133,'Polytechnic University of the Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(134,'President Ramon Magsaysay State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(135,'Quirino State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(136,'Republic Central Colleges','2023-12-25 05:38:01','2023-12-25 05:38:01'),(137,'Rizal Technological University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(138,'Romblon State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(139,'Sacred Heart College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(140,'Saint Joseph Institute of Technology','2023-12-25 05:38:01','2023-12-25 05:38:01'),(141,'Saint Jude College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(142,'Saint Louis University, Baguio City','2023-12-25 05:38:01','2023-12-25 05:38:01'),(143,'Saint Mary\'s University of Bayombong','2023-12-25 05:38:01','2023-12-25 05:38:01'),(144,'Saint Michael\'s College of Laguna','2023-12-25 05:38:01','2023-12-25 05:38:01'),(145,'Saint Pedro Poveda College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(146,'Samar State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(147,'San Beda University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(148,'San Sebastian College-Recoletos de Cavite','2023-12-25 05:38:01','2023-12-25 05:38:01'),(149,'Santa Isabel College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(150,'Siena College of Taytay','2023-12-25 05:38:01','2023-12-25 05:38:01'),(151,'Silliman University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(152,'Sorsogon State College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(153,'Southern Leyte State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(154,'Southern Luzon State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(155,'Southwestern University - PHINMA','2023-12-25 05:38:01','2023-12-25 05:38:01'),(156,'St. Joseph\'s College of Quezon City','2023-12-25 05:38:01','2023-12-25 05:38:01'),(157,'St. Louis College Valenzuela','2023-12-25 05:38:01','2023-12-25 05:38:01'),(158,'St. Luke\'s College of Medicine - WHQM','2023-12-25 05:38:01','2023-12-25 05:38:01'),(159,'St. Mary\'s College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(160,'St. Paul University Dumaguete','2023-12-25 05:38:01','2023-12-25 05:38:01'),(161,'St. Paul University Iloilo','2023-12-25 05:38:01','2023-12-25 05:38:01'),(162,'St. Paul University Manila','2023-12-25 05:38:01','2023-12-25 05:38:01'),(163,'St. Paul University Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(164,'St. Paul University Quezon City','2023-12-25 05:38:01','2023-12-25 05:38:01'),(165,'St. Paul University Surigao','2023-12-25 05:38:01','2023-12-25 05:38:01'),(166,'St. Scholastica\'s College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(167,'STI West Negros University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(168,'Sultan Kudarat State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(169,'Surigao del Sur State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(170,'Tarlac Agricultural University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(171,'Tarlac State University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(172,'Technological Institute of the Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(173,'Technological University of the Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(174,'The Philippine Women\'s University','2023-12-25 05:38:01','2023-12-25 05:38:01'),(175,'The University of Manila','2023-12-25 05:38:01','2023-12-25 05:38:01'),(176,'Trinity University of Asia','2023-12-25 05:38:01','2023-12-25 05:38:01'),(177,'Union Christian College','2023-12-25 05:38:01','2023-12-25 05:38:01'),(178,'Universidad de Sta. Isabel','2023-12-25 05:38:01','2023-12-25 05:38:01'),(179,'Universidad de Zamboanga','2023-12-25 05:38:01','2023-12-25 05:38:01'),(180,'University of Antique','2023-12-25 05:38:01','2023-12-25 05:38:01'),(181,'University of Asia and the Pacific','2023-12-25 05:38:01','2023-12-25 05:38:01'),(182,'University of Baguio','2023-12-25 05:38:01','2023-12-25 05:38:01'),(183,'University of Batangas','2023-12-25 05:38:01','2023-12-25 05:38:01'),(184,'University of Bohol','2023-12-25 05:38:01','2023-12-25 05:38:01'),(185,'University of Cagayan Valley','2023-12-25 05:38:01','2023-12-25 05:38:01'),(186,'University of Cebu','2023-12-25 05:38:01','2023-12-25 05:38:01'),(187,'University of Eastern Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(188,'University of Iloilo - PHINMA','2023-12-25 05:38:01','2023-12-25 05:38:01'),(189,'University of La Salette','2023-12-25 05:38:01','2023-12-25 05:38:01'),(190,'University of Luzon','2023-12-25 05:38:01','2023-12-25 05:38:01'),(191,'University of Mindanao','2023-12-25 05:38:01','2023-12-25 05:38:01'),(192,'University of Negros Occidental - Recoletos','2023-12-25 05:38:01','2023-12-25 05:38:01'),(193,'University of Northern Philippines','2023-12-25 05:38:01','2023-12-25 05:38:01'),(194,'University of Nueva Caceres','2023-12-25 05:38:01','2023-12-25 05:38:01'),(195,'University of Pangasinan - PHINMA','2023-12-25 05:38:01','2023-12-25 05:38:01'),(196,'University of Perpetual Help System DALTA','2023-12-25 05:38:01','2023-12-25 05:38:01'),(197,'University of Perpetual Help System Jonelta','2023-12-25 05:38:01','2023-12-25 05:38:01'),(198,'University of Rizal System','2023-12-25 05:38:01','2023-12-25 05:38:01'),(199,'University of Saint Louis','2023-12-25 05:38:01','2023-12-25 05:38:01'),(200,'University of San Agustin','2023-12-25 05:38:01','2023-12-25 05:38:01'),(201,'University of San Carlos','2023-12-25 05:38:01','2023-12-25 05:38:01'),(202,'University of San Jose-Recoletos','2023-12-25 05:38:01','2023-12-25 05:38:01'),(203,'University of Santo Tomas','2023-12-25 05:38:01','2023-12-25 05:38:01'),(204,'University of Science and Technology of Southern Philippi','2023-12-25 05:38:01','2023-12-25 05:38:01'),(205,'University of Southern Mindanao','2023-12-25 05:38:01','2023-12-25 05:38:01'),(206,'University of Southern Philippines Foundation','2023-12-25 05:38:01','2023-12-25 05:38:01'),(207,'University of St. La Salle','2023-12-25 05:38:01','2023-12-25 05:38:01'),(208,'University of the Assumption','2023-12-25 05:38:01','2023-12-25 05:38:01'),(209,'University of the Cordilleras','2023-12-25 05:38:01','2023-12-25 05:38:01'),(210,'University of the East','2023-12-25 05:38:01','2023-12-25 05:38:01'),(211,'University of the East Ramon Magsaysay','2023-12-25 05:38:01','2023-12-25 05:38:01'),(212,'University of the Immaculate Conception','2023-12-25 05:38:01','2023-12-25 05:38:01'),(213,'University of the Philippines Baguio','2023-12-25 05:38:01','2023-12-25 05:38:01'),(214,'University of the Philippines Diliman','2023-12-25 05:38:02','2023-12-25 05:38:02'),(215,'University of the Philippines in the Visayas','2023-12-25 05:38:02','2023-12-25 05:38:02'),(216,'University of the Philippines Los Baños','2023-12-25 05:38:02','2023-12-25 05:38:02'),(217,'University of the Philippines Manila','2023-12-25 05:38:02','2023-12-25 05:38:02'),(218,'University of the Philippines Mindanao','2023-12-25 05:38:02','2023-12-25 05:38:02'),(219,'University of the Philippines System','2023-12-25 05:38:02','2023-12-25 05:38:02'),(220,'University of the Visayas','2023-12-25 05:38:02','2023-12-25 05:38:02'),(221,'Virgen Milagrosa University Foundation','2023-12-25 05:38:02','2023-12-25 05:38:02'),(222,'Visayas State University','2023-12-25 05:38:02','2023-12-25 05:38:02'),(223,'Wesleyan University-Philippines','2023-12-25 05:38:02','2023-12-25 05:38:02'),(224,'West Visayas State University','2023-12-25 05:38:02','2023-12-25 05:38:02'),(225,'Western Institute of Technology','2023-12-25 05:38:02','2023-12-25 05:38:02'),(226,'Western Mindanao State University','2023-12-25 05:38:02','2023-12-25 05:38:02'),(227,'Western Philippines University','2023-12-25 05:38:02','2023-12-25 05:38:02'),(228,'Xavier University-Ateneo de Cagayan','2023-12-25 05:38:02','2023-12-25 05:38:02'),(229,'Zamboanga State College of Marine Sciences and Technology','2023-12-25 05:38:02','2023-12-25 05:38:02');
/*!40000 ALTER TABLE `higher_education_institutes` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(125) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_11_18_143206_create_scholarship_types_table',1),(6,'2023_11_18_143247_create_campuses_table',1),(7,'2023_11_18_143316_create_higher_education_institutes_table',1),(8,'2023_11_18_143406_create_scholarship_categories_table',1),(9,'2023_11_18_143435_create_degree_programs_table',1),(10,'2023_11_18_143507_create_scholarship_statuses_table',1),(11,'2023_11_18_143508_create_hei_disconnection_reasons_table',1),(12,'2023_11_18_143509_create_scholars_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(125) NOT NULL,
  `token` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(125) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(125) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `scholars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scholars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_photo` varchar(125) DEFAULT NULL,
  `first_name` varchar(125) NOT NULL,
  `last_name` varchar(125) NOT NULL,
  `middle_initial` varchar(125) DEFAULT NULL,
  `full_name` varchar(125) GENERATED ALWAYS AS (concat(`first_name`,' ',ifnull(concat(`middle_initial`,'.'),''),' ',`last_name`)) VIRTUAL,
  `alt_full_name` varchar(125) GENERATED ALWAYS AS (concat(`last_name`,', ',`first_name`,' ',ifnull(concat(`middle_initial`,'.'),''))) VIRTUAL,
  `campus_id` bigint(20) unsigned NOT NULL,
  `scholarship_type_id` bigint(20) unsigned NOT NULL,
  `scholarship_category_id` bigint(20) unsigned DEFAULT NULL,
  `degree_program_id` bigint(20) unsigned NOT NULL,
  `higher_education_institute_id` bigint(20) unsigned NOT NULL,
  `hei_disconnection_reason_id` bigint(20) unsigned DEFAULT NULL,
  `scholarship_status_id` bigint(20) unsigned NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `status` varchar(125) DEFAULT NULL,
  `extension_period` varchar(125) DEFAULT NULL,
  `date_of_graduation` date DEFAULT NULL,
  `end_of_service_obligation_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `connected_to_hei` tinyint(1) NOT NULL DEFAULT 1,
  `extension_requested` tinyint(1) NOT NULL DEFAULT 0,
  `extension_status` varchar(125) DEFAULT NULL,
  `reentry_plan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT json_array() CHECK (json_valid(`reentry_plan`)),
  `updates` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT json_array() CHECK (json_valid(`updates`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scholars_campus_id_foreign` (`campus_id`),
  KEY `scholars_scholarship_type_id_foreign` (`scholarship_type_id`),
  KEY `scholars_scholarship_category_id_foreign` (`scholarship_category_id`),
  KEY `scholars_degree_program_id_foreign` (`degree_program_id`),
  KEY `scholars_higher_education_institute_id_foreign` (`higher_education_institute_id`),
  KEY `scholars_hei_disconnection_reason_id_foreign` (`hei_disconnection_reason_id`),
  KEY `scholars_scholarship_status_id_foreign` (`scholarship_status_id`),
  CONSTRAINT `scholars_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`),
  CONSTRAINT `scholars_degree_program_id_foreign` FOREIGN KEY (`degree_program_id`) REFERENCES `degree_programs` (`id`),
  CONSTRAINT `scholars_hei_disconnection_reason_id_foreign` FOREIGN KEY (`hei_disconnection_reason_id`) REFERENCES `hei_disconnection_reasons` (`id`),
  CONSTRAINT `scholars_higher_education_institute_id_foreign` FOREIGN KEY (`higher_education_institute_id`) REFERENCES `higher_education_institutes` (`id`),
  CONSTRAINT `scholars_scholarship_category_id_foreign` FOREIGN KEY (`scholarship_category_id`) REFERENCES `scholarship_categories` (`id`),
  CONSTRAINT `scholars_scholarship_status_id_foreign` FOREIGN KEY (`scholarship_status_id`) REFERENCES `scholarship_statuses` (`id`),
  CONSTRAINT `scholars_scholarship_type_id_foreign` FOREIGN KEY (`scholarship_type_id`) REFERENCES `scholarship_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `scholars` WRITE;
/*!40000 ALTER TABLE `scholars` DISABLE KEYS */;
INSERT INTO `scholars` VALUES (1,'0cb81a3962ca50f8736a1e0b1298adcf.png','Dayna','Renner','K','Dayna K. Renner','Renner, Dayna K.',1,6,NULL,5,180,NULL,2,'2016-07-17','2020-07-17',NULL,NULL,NULL,NULL,NULL,1,0,NULL,'[{\"plan\":\"adwad\",\"date\":\"2023-11-29\"},{\"plan\":\"31dwdawd\",\"date\":\"2023-12-23\"}]','[{\"date\":\"2023-10-25T14:26:38+00:00\",\"details\":\"cawcaw\\ncawc\\nwac\\naw\\nc\\nwaccawcaw\"}]','2023-12-25 05:38:15','2023-12-25 06:26:38'),(2,'0e2e5aa2191bed9ea5a40a1b38fcb32c.png','Electa','Aufderhar','P','Electa P. Aufderhar','Aufderhar, Electa P.',2,6,NULL,3,76,NULL,2,'2016-05-22','2022-05-22',NULL,NULL,NULL,NULL,NULL,1,0,NULL,'[]','[{\"date\":\"2023-12-25T14:27:16+00:00\",\"details\":\"dawdawddawdwa dawdaw dawd awd\"}]','2023-12-25 05:38:15','2023-12-25 06:27:16'),(3,'5ba795cc7b595487f7cd04a906195df4.png','Bradford','Lindgren','E','Bradford E. Lindgren','Lindgren, Bradford E.',2,2,NULL,3,164,NULL,3,'2017-11-05','2023-11-05',NULL,NULL,NULL,NULL,NULL,1,0,NULL,'[]','[]','2023-12-25 05:38:15','2023-12-25 05:38:15'),(4,'d0a667df4e4f814b60f0e3c96c6de23e.png','Micheal','Koss','T','Micheal T. Koss','Koss, Micheal T.',4,5,NULL,5,141,NULL,4,'2018-08-17','2022-08-17',NULL,NULL,NULL,NULL,NULL,1,0,NULL,'[]','[]','2023-12-25 05:38:15','2023-12-25 05:38:15'),(5,'aedbe333e3e1357492693f6fa1e20d0a.png','Addie','Jast','0','Addie 0. Jast','Jast, Addie 0.',2,6,NULL,3,206,NULL,2,'2020-02-12','2024-02-12',NULL,NULL,NULL,NULL,NULL,1,0,NULL,'[]','[]','2023-12-25 05:38:15','2023-12-25 05:38:15');
/*!40000 ALTER TABLE `scholars` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `scholarship_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scholarship_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `scholarship_categories` WRITE;
/*!40000 ALTER TABLE `scholarship_categories` DISABLE KEYS */;
INSERT INTO `scholarship_categories` VALUES (1,'A','2023-12-25 05:38:02','2023-12-25 05:38:02'),(2,'D','2023-12-25 05:38:02','2023-12-25 05:38:02'),(3,'E','2023-12-25 05:38:02','2023-12-25 05:38:02'),(4,'F','2023-12-25 05:38:02','2023-12-25 05:38:02'),(5,'Special Provision','2023-12-25 05:38:02','2023-12-25 05:38:02');
/*!40000 ALTER TABLE `scholarship_categories` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `scholarship_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scholarship_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `scholarship_statuses` WRITE;
/*!40000 ALTER TABLE `scholarship_statuses` DISABLE KEYS */;
INSERT INTO `scholarship_statuses` VALUES (1,'Ongoing','2023-12-25 05:38:01','2023-12-25 05:38:01'),(2,'Completed','2023-12-25 05:38:01','2023-12-25 05:38:01'),(3,'For BOR Approval','2023-12-25 05:38:01','2023-12-25 05:38:01'),(4,'No Progress','2023-12-25 05:38:01','2023-12-25 05:38:01');
/*!40000 ALTER TABLE `scholarship_statuses` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `scholarship_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scholarship_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `scholarship_types` WRITE;
/*!40000 ALTER TABLE `scholarship_types` DISABLE KEYS */;
INSERT INTO `scholarship_types` VALUES (1,'Institutional','2023-12-25 05:38:01','2023-12-25 05:38:01'),(2,'CHED K-12 (Doctoral)','2023-12-25 05:38:01','2023-12-25 05:38:01'),(3,'CHED K-12 ( Masteral)','2023-12-25 05:38:01','2023-12-25 05:38:01'),(4,'CHED SIKAP','2023-12-25 05:38:01','2023-12-25 05:38:01'),(5,'DOST','2023-12-25 05:38:01','2023-12-25 05:38:01'),(6,'FOREIGN SCHOLARSHIP','2023-12-25 05:38:01','2023-12-25 05:38:01'),(7,'OTHER SCHOLARSHIP','2023-12-25 05:38:01','2023-12-25 05:38:01');
/*!40000 ALTER TABLE `scholarship_types` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jules Marcelino','admin@gmail.com',NULL,'$2y$12$psfZFmGorsk2SGdqnukKnOYgdKo.PC2P/nCk/8Nr/Ouv472D7/m3a',NULL,'2023-12-25 05:37:59','2023-12-25 05:37:59'),(2,'Jules Wesley Marcelino','juleswesley.marcelino@sksu.edu.ph',NULL,'$2y$12$PS0gPS/mHCcxvt47EHMoK.4yAp6ajozASKtlpDA/SM1fEr5tG4d6q',NULL,'2023-12-25 05:38:02','2023-12-25 05:38:02');
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

