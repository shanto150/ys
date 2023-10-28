-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: ys
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `add_technicians`
--

DROP TABLE IF EXISTS `add_technicians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `add_technicians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_id` bigint(20) unsigned NOT NULL,
  `tech_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_log_id` (`log_id`),
  KEY `idx_status` (`tech_status`),
  CONSTRAINT `add_technicians_log_id_foreign` FOREIGN KEY (`log_id`) REFERENCES `service_logs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_technicians`
--

LOCK TABLES `add_technicians` WRITE;
/*!40000 ALTER TABLE `add_technicians` DISABLE KEYS */;
INSERT INTO `add_technicians` VALUES (1,7,'Closed','পাওয়ার আসে না দেখো','2023-10-06 02:12:38','2023-10-06 10:54:05','shohag','shohag'),(2,7,'Closed','আতিক পাওয়ার দেখো','2023-10-06 02:14:17','2023-10-22 12:29:38','shohag','shohag'),(3,8,'Closed','লাইট সমস্যা','2023-10-23 07:46:52','2023-10-23 07:51:00','shohag','shohag'),(4,5,'Open','dfr','2023-10-28 04:47:24','2023-10-28 04:47:24','shohag',NULL);
/*!40000 ALTER TABLE `add_technicians` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emps`
--

DROP TABLE IF EXISTS `emps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desig` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_distrit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `machine_id` int(11) unsigned DEFAULT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile_personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile_official` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emps`
--

LOCK TABLES `emps` WRITE;
/*!40000 ALTER TABLE `emps` DISABLE KEYS */;
INSERT INTO `emps` VALUES (6,'Rahim','Black','Nimmo','Toktokis','HK',1,'2023-07-12','2023-07-12',NULL,'B+','Islam','Male','Confirmed','23423','01765637368',33339,'1','Mirpur, Dhaka, Bangladesh',NULL,'/res/images/ProImage/11072023-1689117205.png','2023-07-11 17:11:07','2023-07-14 22:52:24',NULL,NULL,NULL),(7,'Mutaleb','Binary','Trading',NULL,NULL,2,'2023-07-15','2023-07-15',NULL,'B+','Islam','Male','Confirmed','017133483478','0171847483',8888,'1','Uttara, Dhaka, Bangladesh',NULL,'/res/images/ProImage/15072023-1689396467.png','2023-07-14 22:47:47','2023-07-14 22:47:47',NULL,NULL,NULL),(8,'Rahim','Black','Nimmo','Toktokis','HK',3,'2023-07-12','2023-07-12',NULL,'B+','Islam','Male','Confirmed','23423','01765637368',12000,'1',NULL,NULL,NULL,'2023-08-23 13:02:48','2023-08-23 13:02:48','rahim@gmail.com',NULL,NULL),(9,'Rahim','Black','Nimmo','Toktokis','HK',4,'2023-07-12','2023-07-12','222222222','B+','Islam','Male','Confirmed','23423','01765637368',33339,'1','Mirpur, Dhaka, Bangladesh','Mirpur, Dhaka, Bangladesh',NULL,'2023-08-23 13:06:37','2023-08-28 12:43:22','ra@ga.com','$2y$10$QBxDVjyiaGPseFbbrnFND.9BOuWKQNV83lZzRPowzj2SczmBCtSNS',NULL),(10,'Karim','Technician','Zabbar','Khatun','Barishal',5,'2023-08-24','2023-08-24','77777777','B+','Islam','Male','Confirmed','011323653','01713776655',20000,'1','Dhaka','Barishal',NULL,'2023-08-23 13:27:41','2023-08-23 13:27:41','ka@gmail.com',NULL,NULL),(11,'Wylie Mayo','Reprehenderit sit m','Gage Edwards','Ferdinand Hatfield','Enim laudantium nih',6,'1999-06-10','2013-05-24','50','A-','Buddhism','Female','Contractual','In et quia ut eiusmo','Vitae fugit anim co',68,'1','Dolore sed fugiat a','Nulla ea fugiat eli',NULL,'2023-08-23 13:30:50','2023-08-23 13:30:50','xyxesa@mailinator.com',NULL,NULL),(12,'Vielka Noel','Anim ullam vel nesci','Claudia Haley','Calista Francis','Animi eveniet eum',7,'1971-03-25','1992-05-28','36','B+','Buddhism','Male','Probationary','Aperiam qui magnam q','Asperiores in repreh',47,'1','Dolore dolor eos ex','Eius sit non ullam',NULL,'2023-08-23 14:01:19','2023-08-23 14:01:19','gypebuvuhu@mailinator.com',NULL,NULL),(13,'Shohag','Porro saepe asperior','Ryder Day','Leila Hayes','Eos voluptas sint v',8,'1977-09-21','1976-04-20','11','A+','Islam','Other','Confirmed','Incidunt mollitia q','Aliquam in id labore',41,'1','Sunt temporibus poss','Similique hic nihil',NULL,'2023-08-23 14:05:03','2023-08-23 14:23:01','cojedeka@mailinator.com','$2y$10$z.xfzRVY05bsvKZPnfMYp.B.EJUFy4eTFHIdCCE7KZJTKdE/8FTDe','Admin'),(14,'Shakaouth','Enim vel nihil dolor','Phoebe Snider','Kay Peck','Aut aspernatur volup',9,'1977-03-30','1979-09-28','45','AB+','Buddhism','Other','Confirmed','Aspernatur excepteur','Est lorem vitae plac',87,'1','Labore aliqua Repud','Nemo sed ullam id pr',NULL,'2023-08-23 14:38:57','2023-08-23 15:03:11','tixafany21@mailinator.com','$2y$10$Em2D3ubEVNc4ULasY7sbCeeFIkj8QHPZQqRPeSZ9cpg69bsryTR/y','Technician'),(15,'Atiq','Tech Tead','Keegan Bray','Cullen Sweeney','Itaque aliquip sunt',10,'1976-03-01','2016-07-17','147453243453678','A+','Islam','Male','Confirmed','01713121212','01713131313',12000,'1','Dhaka','Dhaka',NULL,'2023-08-30 11:54:54','2023-08-30 12:07:16','za@gmail.com','$2y$10$uBnXt3JKLFpoP7NYcp95Gev1eBIjSF1Xvs19b0bTWDOxL9whHkiZm','Technician');
/*!40000 ALTER TABLE `emps` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER insert_machine_id
    BEFORE INSERT
    ON emps FOR EACH ROW
BEGIN
DECLARE sm INT;
      SELECT ifnull(max(machine_id),0)+1 INTO sm FROM emps;
      set new.machine_id=sm;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER insert_new_user
    AFTER INSERT
    ON emps FOR EACH ROW
BEGIN
  insert into users(name, email,password,role,status,machine_id) values (new.name, new.email,new.pass,new.role,new.status,new.machine_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER update_user AFTER UPDATE ON ys.emps FOR EACH ROW
BEGIN
  update users set name=new.name , email=new.email,role=new.role,status=new.status,password=new.pass where machine_id=new.machine_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(9,'2023_07_01_094013_create_emps_table',2),(11,'2023_08_07_185747_create_service_logs_table',3),(13,'2023_08_21_173619_create_add_technicians_table',4),(14,'2023_08_21_210036_tech_status_to_add_technicians_table',5),(16,'2023_08_31_111140_create_price_lists_table',6),(19,'2023_09_01_084122_create_technician_items_table',7),(22,'2023_10_11_174831_create_pre_invoices_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_invoices`
--

DROP TABLE IF EXISTS `pre_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pre_invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_id` bigint(20) unsigned NOT NULL,
  `invoice_month` date NOT NULL,
  `invoice_item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(11,2) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sl` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pre_invoices_log_id_invoice_month_invoice_item_id_unique` (`log_id`,`invoice_month`,`invoice_item_id`),
  CONSTRAINT `pre_invoices_log_id_foreign` FOREIGN KEY (`log_id`) REFERENCES `service_logs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_invoices`
--

LOCK TABLES `pre_invoices` WRITE;
/*!40000 ALTER TABLE `pre_invoices` DISABLE KEYS */;
INSERT INTO `pre_invoices` VALUES (1,7,'2023-10-03','16',2,'Pcs','600',300.00,'test1','2023-10-22 13:36:39','2023-10-22 13:36:39','shohag','2121',NULL,1),(2,7,'2023-10-01','17',2,'Pcs','120',60.00,NULL,'2023-10-22 13:36:39','2023-10-22 13:36:39','shohag','2121',NULL,2),(3,7,'2023-10-01','48',1,'Trip','500',500.00,'test3','2023-10-22 13:36:39','2023-10-22 13:36:39','shohag','2121',NULL,3),(4,8,'2023-10-01','36',2,'Pcs','500',250.00,'রর','2023-10-23 07:57:40','2023-10-23 07:57:40','shohag','2121',NULL,1),(5,8,'2023-10-15','48',1,'Trip','500',500.00,'জজ','2023-10-23 07:57:40','2023-10-23 07:57:40','shohag','2121',NULL,2);
/*!40000 ALTER TABLE `pre_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_lists`
--

DROP TABLE IF EXISTS `price_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price_lists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes' COMMENT 'Yes/No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_lists`
--

LOCK TABLES `price_lists` WRITE;
/*!40000 ALTER TABLE `price_lists` DISABLE KEYS */;
INSERT INTO `price_lists` VALUES (1,'1/4 Copper Pipe (Per Fit)','Feet',35.00,'Yes',NULL,NULL),(2,'10 W Fan Motor','Pcs',650.00,'Yes',NULL,NULL),(3,'16 W Fan Motor','Pcs',850.00,'Yes',NULL,NULL),(4,'2 Pin Plug (Per Unit)','Pcs',70.00,'Yes',NULL,NULL),(5,'3 Pin Plug','Pcs',80.00,'Yes',NULL,NULL),(6,'5 W Fan Motor','Pcs',600.00,'Yes',NULL,NULL),(7,'Aluminum Joint','Joint',600.00,'Yes',NULL,NULL),(8,'Axial Fan motor','Pcs',900.00,'Yes',NULL,NULL),(9,'Axial Fan motor_Repair','Pcs',350.00,'Yes',NULL,NULL),(10,'Box Fan','Pcs',550.00,'Yes',NULL,NULL),(11,'Capacitor (372 L)','Pcs',230.00,'Yes',NULL,NULL),(12,'Capacitor (400 L)','Pcs',550.00,'Yes',NULL,NULL),(13,'Capillary Tube (Per Ft)','Feet',15.00,'Yes',NULL,NULL),(14,'Chamber (120 L-820 L)','Pcs',1800.00,'Yes',NULL,NULL),(15,'Chamber Receiver','Pcs',300.00,'Yes',NULL,NULL),(16,'Chamber Repair ','Pcs',300.00,'Yes',NULL,NULL),(17,'Charging valve','Pcs',60.00,'Yes',NULL,NULL),(18,'Combine Board','Pcs',350.00,'Yes',NULL,NULL),(19,'Compressor Oil','Pcs',200.00,'Yes',NULL,NULL),(20,'Compressor Plate','Pcs',800.00,'Yes',NULL,NULL),(21,'Condenser','Pcs',650.00,'Yes',NULL,NULL),(22,'Denting','Pcs',800.00,'Yes',NULL,NULL),(23,'Door Clamps','Pcs',300.00,'Yes',NULL,NULL),(24,'Door Spring (820 L)','Pcs',700.00,'Yes',NULL,NULL),(25,'Door Switch','Pcs',100.00,'Yes',NULL,NULL),(26,'Door Washer','Pcs',10.00,'Yes',NULL,NULL),(27,'Door Wheel (820 L)','Pcs',550.00,'Yes',NULL,NULL),(28,'Fan Blade','Pcs',150.00,'Yes',NULL,NULL),(29,'Flexible Wire (Per Yard)','Yard',85.00,'Yes',NULL,NULL),(30,'Flexible Pipe (per Ft)','Feet',25.00,'Yes',NULL,NULL),(31,'Foam Spray (Per Unit)','Pcs',450.00,'Yes',NULL,NULL),(32,'Gas Charge','Pcs',1000.00,'Yes',NULL,NULL),(33,'Gasket','Pcs',680.00,'Yes',NULL,NULL),(34,'Insulation','Set',80.00,'Yes',NULL,NULL),(35,'Net 3/4','Set',450.00,'Yes',NULL,NULL),(36,'LED Light 1 Feet','Pcs',250.00,'Yes',NULL,NULL),(37,'LED Light 4 Feet','Pcs',400.00,'Yes',NULL,NULL),(38,'LED Power Supply','Pcs',380.00,'Yes',NULL,NULL),(39,'Light Holder','Pcs',40.00,'Yes',NULL,NULL),(40,'Gasket Magnet (Per Ft)','Feet',25.00,'Yes',NULL,NULL),(41,'Painting (Per Feet)','Feet',140.00,'Yes',NULL,NULL),(42,'Relay / Overload','Pcs',250.00,'Yes',NULL,NULL),(43,'Silicon Glue','Pcs',60.00,'Yes',NULL,NULL),(44,'Strainer','Pcs',70.00,'Yes',NULL,NULL),(45,'Thermostat','Pcs',220.00,'Yes',NULL,NULL),(46,'Water Pipe/ Drain Pipe','Pcs',70.00,'Yes',NULL,NULL),(47,'Wheel','Pcs',200.00,'Yes',NULL,NULL),(48,'Service Charge','Trip',500.00,'Yes',NULL,NULL),(49,'Others','Actual',0.00,'Yes',NULL,NULL),(50,'Trans. Charge','Trip',0.00,'Yes',NULL,NULL),(51,'Trans. Charge (From TBL)','Trip',850.00,'Yes',NULL,NULL);
/*!40000 ALTER TABLE `price_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_logs`
--

DROP TABLE IF EXISTS `service_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `outlet_code` int(11) NOT NULL,
  `visi_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi_size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outlet_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complains` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `se_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asm_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `db_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_date` date NOT NULL,
  `assigned_date` date DEFAULT NULL,
  `first_response_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `status` tinytext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Start,Hold,Pending,Working,Close',
  `job_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `failure_analysis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pending_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pulled_delivered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` bigint(11) unsigned DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_invoice_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'No',
  PRIMARY KEY (`id`),
  KEY `service_logs_log_date_outlet_code_visi_size_status_index` (`log_date`,`outlet_code`,`visi_size`,`status`(255))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_logs`
--

LOCK TABLES `service_logs` WRITE;
/*!40000 ALTER TABLE `service_logs` DISABLE KEYS */;
INSERT INTO `service_logs` VALUES (1,83467,'8332','L-736','mobir tea.','mirpur uttara, dhaka, bangladesh','017164838','0173637463',NULL,'Fan not working','mirpur','Dhaka',NULL,'hossain',NULL,'2023-08-18','2023-08-18','2023-08-18',NULL,'Received',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-17 18:19:23','2023-08-18 05:41:28','sss',7,'1',NULL,'No'),(2,83738,'8372','U938','masud confacnory','Uttara, dhaka, Bangladesh','0182728278','07168354235',NULL,'Water lickage','Uttara','Dhaka',NULL,'ambar enterprice',NULL,'2023-08-19',NULL,NULL,NULL,'Assigned',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-17 18:49:25','2023-08-18 05:42:03','lg',6,'1',NULL,'No'),(3,345344,'73683','H736','Zakaria Brand','Dhaka Mirpur','01713456744','01714736382',NULL,'Sound','Mirpur','Dhaka',NULL,'Harun',NULL,'2023-08-18',NULL,NULL,NULL,'Received',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-18 05:53:43','2023-08-18 10:20:51','Fee',7,'1',NULL,'No'),(4,83467,'35544','L-736','mobir tea.','mirpur uttara, dhaka, bangladesh','017164838','0173637463',NULL,'Lorem ipsum dolor sit amet consectetur','mirpur','Dhaka',NULL,'hossain',NULL,'2023-08-20','2023-08-22','2023-08-22',NULL,'Assigned',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-20 09:03:14','2023-08-20 09:07:49',NULL,7,'1',NULL,'No'),(5,1212,'2121','21','Shant Store','mirpur 10','01713665544','01716453765',NULL,'fan not working','dhaka','mirpur',NULL,'mansur',NULL,'2023-08-31','2023-08-31','2023-08-31',NULL,'Assigned',NULL,NULL,NULL,NULL,NULL,NULL,'2023-08-30 12:09:00','2023-09-01 17:39:54','HP',0,'Shakaouth',NULL,'No'),(6,1111,'1111','1','One Shop','Dhaka','22222222222','11111111111',NULL,'Thanda Hoi na','Jatrabari','Dhaka',NULL,'Kaifa',NULL,'2023-09-01',NULL,NULL,NULL,'Closed',NULL,NULL,NULL,NULL,NULL,NULL,'2023-09-01 17:18:25','2023-10-22 12:49:58','Hp',NULL,'Shakaouth',NULL,'No'),(7,1212,'2121','732 L','Shant Store','Pallabi, Mirpur 11, Dhaka, Bangladesh','01713665544','01716453765',NULL,'Power Problem','dhaka','mirpur',NULL,'mansur',NULL,'2023-10-02',NULL,NULL,NULL,'Closed',NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-02 10:22:34','2023-10-22 13:36:39','7Up',NULL,'Shakaouth',NULL,'Yes'),(8,1212,'2121','835 L','Shant Store','mirpur 10','01713665544','01716453765',NULL,'Light Problem','dhaka','mirpur',NULL,'mansur',NULL,'2023-10-23','2023-10-23','2023-10-23',NULL,'Closed',NULL,NULL,NULL,NULL,NULL,NULL,'2023-10-23 07:45:31','2023-10-23 07:57:40','Pepsi',NULL,'shohag',NULL,'Yes');
/*!40000 ALTER TABLE `service_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technician_items`
--

DROP TABLE IF EXISTS `technician_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technician_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `add_techni_id_fk` bigint(20) unsigned DEFAULT NULL,
  `log_id` bigint(20) unsigned NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `request_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_item_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `technician_items_log_id_foreign` (`log_id`),
  CONSTRAINT `technician_items_log_id_foreign` FOREIGN KEY (`log_id`) REFERENCES `service_logs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technician_items`
--

LOCK TABLES `technician_items` WRITE;
/*!40000 ALTER TABLE `technician_items` DISABLE KEYS */;
INSERT INTO `technician_items` VALUES (1,1,7,8,9,'Main',NULL,NULL,NULL,'পাওয়ার আসে না দেখো',NULL,'2023-10-06 02:12:38','2023-10-06 02:12:38','shohag',NULL),(2,1,7,9,8,'Require','10',1,'Pcs','ata lagbe',NULL,'2023-10-06 02:13:13','2023-10-06 02:13:13','Shakaouth',NULL),(3,2,7,8,10,'Main',NULL,NULL,NULL,'আতিক পাওয়ার দেখো',NULL,'2023-10-06 02:14:17','2023-10-06 02:14:17','shohag',NULL),(4,2,7,10,8,'Install','16',2,'Pcs','kaj ses','res/images/timage/06102023-1696580120.jpg','2023-10-06 02:15:20','2023-10-06 02:15:20','Atiq',NULL),(5,2,7,10,8,'Install','17',2,'Pcs','kaj ses','res/images/timage/06102023-1696580120.jpg','2023-10-06 02:15:20','2023-10-06 02:15:20','Atiq',NULL),(6,3,8,8,10,'Main',NULL,NULL,NULL,'লাইট সমস্যা',NULL,'2023-10-23 07:46:52','2023-10-23 07:46:52','shohag',NULL),(7,3,8,10,8,'Install','36',2,'Pcs','kaj ses','res/images/timage/23102023-1698068978.png','2023-10-23 07:49:38','2023-10-23 07:49:38','Atiq',NULL),(8,4,5,8,10,'Main',NULL,NULL,NULL,'dfr',NULL,'2023-10-28 04:47:24','2023-10-28 04:47:24','shohag',NULL),(9,4,5,10,8,'Require','10',5,'Pcs','lagbe..',NULL,'2023-10-28 04:49:00','2023-10-28 05:06:52','Atiq',NULL);
/*!40000 ALTER TABLE `technician_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `machine_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'shohag','so@gmail.com',NULL,'$2y$10$uBnXt3JKLFpoP7NYcp95Gev1eBIjSF1Xvs19b0bTWDOxL9whHkiZm',NULL,NULL,NULL,'Gx61vK87Ap1T0wHexYG8I469l4IQW3pUEyGORW5hIOGkWVwgNUNGeiWAKisR','2023-07-01 14:55:23','2023-07-01 14:55:23','Admin',1,8),(2,'Shakaouth','sk@gmail.com',NULL,'$2y$10$uBnXt3JKLFpoP7NYcp95Gev1eBIjSF1Xvs19b0bTWDOxL9whHkiZm',NULL,NULL,NULL,'Y3nHx5k1IkDb5luihKD4Wza5CQcPuMILFnjsZKLGmlVKHJCrgWGSpe0GiYvT',NULL,NULL,'Technician',1,9),(4,'Atiq','za@gmail.com',NULL,'$2y$10$uBnXt3JKLFpoP7NYcp95Gev1eBIjSF1Xvs19b0bTWDOxL9whHkiZm',NULL,NULL,NULL,'IkBq7SZ2VErx81u1pCOttwpD76J2KhbFpDupmbOrDrQBuydyJS9bVaoczxjL',NULL,NULL,'Technician',1,10);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ys'
--

--
-- Dumping routines for database 'ys'
--
/*!50003 DROP FUNCTION IF EXISTS `f_invoice_item_name` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `f_invoice_item_name`(item_id int) RETURNS varchar(300) CHARSET utf8mb4
BEGIN
  DECLARE sname varchar(300);
  	set sname=(select name FROM price_lists where id=item_id);
  RETURN sname;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_req_type_bn` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `f_req_type_bn`(req_type varchar(300)) RETURNS varchar(300) CHARSET utf8mb4
BEGIN
  DECLARE sname varchar(300);
  
  if(req_type='Install') then
  	set sname='লাগিয়েছি';
    elseif (req_type='Require') then 
    set sname='লাগবে';
    else
    set sname='মন্তব্য';
    end if;
    
  RETURN sname;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_staff_name` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `f_staff_name`(staff_id int) RETURNS varchar(300) CHARSET utf8mb4
BEGIN
  DECLARE sname varchar(300);
  	set sname=(select name FROM emps where machine_id=staff_id);
  RETURN sname;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `log_wise_sum` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `log_wise_sum`(item_id int) RETURNS int(11)
BEGIN
  DECLARE sname int(11);
  	set sname=(select sum(total_amount) from pre_invoices pi2 where log_id =item_id);
  RETURN sname;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-28 18:15:11
