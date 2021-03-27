-- MySQL dump 10.13  Distrib 5.5.20, for Win32 (x86)
--
-- Host: localhost    Database: dbprof
-- ------------------------------------------------------
-- Server version	5.5.20-log

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
-- Table structure for table `tblpay`
--

DROP TABLE IF EXISTS `tblpay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empnum` varchar(30) NOT NULL,
  `school` varchar(255) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `ms` varchar(50) NOT NULL,
  `dater` date NOT NULL,
  `timer` time NOT NULL,
  `sked_in` time NOT NULL,
  `sked_out` time NOT NULL,
  `sked_set` time NOT NULL,
  `rpd` decimal(7,2) NOT NULL,
  `sss` varchar(30) NOT NULL,
  `tin` varchar(30) NOT NULL,
  `sssd` decimal(7,2) NOT NULL,
  `taxd` decimal(7,2) NOT NULL,
  `phid` decimal(7,2) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpay`
--

LOCK TABLES `tblpay` WRITE;
/*!40000 ALTER TABLE `tblpay` DISABLE KEYS */;
INSERT INTO `tblpay` VALUES (9,'11-007-1           ','SJCB','BSCS    ','Married    ','2014-03-16','01:54:07','08:00:00','17:00:00','00:00:00',488.30,'33-930-153','300-986-384   ',0.00,0.00,0.00,'Active'),(10,'11-007-2 ','SJCB','BSBA ','Married ','2014-03-16','01:55:10','08:00:00','17:00:00','00:00:00',440.00,'33-930-15453','300-984-111',0.00,0.00,0.00,'Active'),(11,'11-007-3 ','SJCB','BSIS ','Married ','2014-03-16','01:56:15','08:00:00','17:00:00','00:00:00',470.00,'23-930-431-32','302-491-191',0.00,0.00,0.00,'Active'),(12,'11-007-4 ','SJCB','BSIT ','Single ','2014-03-16','01:57:28','08:00:00','17:00:00','00:00:00',467.00,'30-293-441','330-938-144',0.00,0.00,0.00,'Active'),(13,'11-007-5 ','SJCB','BSED ','Single ','2014-03-16','01:58:24','08:00:00','17:00:00','00:00:00',448.00,'32-913-422','24-143-423',0.00,0.00,0.00,'Active'),(14,'11-007-6  ','SJCB','BSCS  ','Married ','2014-03-16','01:59:31','08:00:00','17:00:00','00:00:00',450.48,'33-2341-451 ','300-984-143 ',0.00,0.00,0.00,'Active'),(15,'11-007-7 ','SJCB','BSPE ','Married ','2014-03-16','02:00:26','08:00:00','17:00:00','00:00:00',420.00,'22-941-180','413-493-133',0.00,0.00,0.00,'Active'),(16,'11-007-8 ','SJCB','BSBA ','Single ','2014-03-16','02:01:40','08:00:00','17:00:00','00:00:00',560.00,'33-143-334','300-164-291',0.00,0.00,0.00,'Active'),(17,'11-007-9 ','SJCB','BSCS ','Single','2014-03-16','02:02:58','08:00:00','17:00:00','00:00:00',436.00,'33-231-437','300-987-421',0.00,0.00,0.00,'Active'),(18,'11-009-10 ','SJCB','BSCS ','Married ','2014-03-16','02:04:37','08:00:00','17:00:00','00:00:00',513.00,'13-371-814','400-913-172',0.00,0.00,0.00,'Active'),(19,'11-008-72 ','SJCB','BSCS ','Single ','2014-03-16','02:06:03','08:00:00','17:00:00','00:00:00',428.00,'43-193-481','300-924-124',0.00,0.00,0.00,'Active'),(21,'11-003-2 ','SJCB','BSCS ','Single ','2014-03-16','02:37:26','14:00:00','22:00:00','00:00:00',556.00,'31-431-641','600-420-134',0.00,0.00,0.00,'Active'),(26,'1111111111','SJCB','1111111111','1111111111','2014-03-21','09:26:00','00:00:00','00:00:00','00:00:00',0.00,'99999.99','99999.99',99999.99,99999.99,99999.99,'Active'),(27,'','SJCB','','','2014-03-30','16:15:19','00:00:00','00:00:00','00:00:00',0.00,'','',0.00,0.00,0.00,'---');
/*!40000 ALTER TABLE `tblpay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprof`
--

DROP TABLE IF EXISTS `tblprof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblprof` (
  `id` int(11) NOT NULL DEFAULT '0',
  `empnum` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactnum` varchar(20) NOT NULL,
  `ctrlnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprof`
--

LOCK TABLES `tblprof` WRITE;
/*!40000 ALTER TABLE `tblprof` DISABLE KEYS */;
INSERT INTO `tblprof` VALUES (3,'11-007-1','lgbautista@yahoo.com           ','299-6300           ',4),(4,'11-007-2','hdbuenaventura@yahoo.com ','235-2572 ',5),(5,'11-007-3','egblas@yahoo.com ','233-2312 ',6),(6,'11-007-4','mmdioquino@yahoo.com ','972-2531 ',7),(7,'11-007-5','mdoliveros@yahoo.com ','422-9556 ',8),(8,'11-007-6','vtrepia@yahoo.com  ','325-6219  ',9),(9,'11-007-7','rpsantos@yahoo.com ','722-5931 ',10),(10,'11-007-8','asartiola@yahoo.com ','422-6917 ',11),(11,'11-007-9','aesagun@yahoo.com ','531-4211 ',12),(12,'11-009-10','svvillanueva@msn.com ','784-1317 ',13),(13,'11-008-72','ncpolicarpio@gmail.com ','472-1673 ',14),(14,'11-008-14','librarian@msn.com','342-771-3',15),(15,'11-008-42','everest@gmail.com','342-7421',16),(16,'13-174-4','sison@yahoo.com','421-4721',17),(17,'xxx','xxx','xxx',43),(0,'','','',0);
/*!40000 ALTER TABLE `tblprof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrecord`
--

DROP TABLE IF EXISTS `tblrecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblrecord` (
  `id` int(11) NOT NULL DEFAULT '0',
  `empnum` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `timeset` time NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrecord`
--

LOCK TABLES `tblrecord` WRITE;
/*!40000 ALTER TABLE `tblrecord` DISABLE KEYS */;
INSERT INTO `tblrecord` VALUES (81,'11-007-1','2014-03-26','10:39:18','10:40:25','00:01:07','G. ','Levy  ','Bautista '),(82,'11-007-1','2014-03-26','10:46:10','11:06:08','00:19:58','G. ','Levy  ','Bautista '),(83,'11-007-2','2014-03-26','10:46:16','11:06:13','00:19:57','T.','Henry David','Buenaventura'),(84,'11-007-3','2014-03-26','10:46:34','11:07:31','00:20:57','G.','Emmanuel','Blas'),(85,'11-007-4','2014-03-26','10:46:41','11:07:38','00:20:57','M.','Michelle','Dioquino'),(86,'11-007-5','2014-03-26','10:46:50','11:07:47','00:20:57','D.','Ma. Fatima','Oliveros'),(87,'11-007-6','2014-03-26','10:47:07','11:08:04','00:20:57','T. ','Veronica ','Repia '),(88,'11-007-7','2014-03-26','10:47:16','11:08:12','00:20:56','P.','Reynaldo','Santos'),(89,'11-007-8','2014-03-26','10:48:11','11:08:21','00:20:10','S.','Amor','Artiola'),(90,'11-007-9','2014-03-26','10:48:21','11:08:28','00:20:07','E.','Arsenio','Sagun Jr.'),(91,'11-009-10','2014-03-26','10:48:52','11:08:55','00:20:03','V.','Santiago','Villanueva'),(92,'11-008-72','2014-03-26','10:49:12','11:09:06','00:19:54','C.','Naneth','Policarpio'),(93,'11-003-2','2014-03-26','10:49:37','11:09:15','00:19:38','V.','Eyestrain','Tapar'),(94,'11-007-1','2014-03-26','11:25:18','11:49:43','00:24:25','G. ','Levy  ','Bautista '),(95,'11-007-2','2014-03-26','11:25:22','11:49:57','00:24:35','T.','Henry David','Buenaventura'),(96,'11-007-3','2014-03-26','11:25:27','11:50:02','00:24:35','G.','Emmanuel','Blas'),(97,'11-007-4','2014-03-26','11:25:31','11:50:07','00:24:36','M.','Michelle','Dioquino'),(98,'11-007-5','2014-03-26','11:25:36','11:50:18','00:24:42','D.','Ma. Fatima','Oliveros'),(99,'11-007-6','2014-03-26','11:25:40','11:50:23','00:24:43','T. ','Veronica ','Repia '),(100,'11-007-7','2014-03-26','11:25:48','11:50:28','00:24:40','P.','Reynaldo','Santos'),(101,'11-007-8','2014-03-26','11:25:54','11:50:34','00:24:40','S.','Amor','Artiola'),(102,'11-007-9','2014-03-26','11:25:59','11:50:39','00:24:40','E.','Arsenio','Sagun Jr.'),(103,'11-009-10','2014-03-26','11:26:06','11:50:46','00:24:40','V.','Santiago','Villanueva'),(104,'11-008-72','2014-03-26','11:26:24','11:50:57','00:24:33','C.','Naneth','Policarpio'),(105,'11-003-2','2014-03-26','11:26:33','11:51:07','00:24:34','V.','Eyestrain','Tapar'),(1,'11-007-1','2014-03-27','09:45:12','12:31:28','02:46:16','G. ','Levy  ','Bautista '),(2,'11-007-2','2014-03-27','09:45:18','12:31:40','02:46:22','T.','Henry David','Buenaventura'),(3,'11-007-3','2014-03-27','09:45:24','12:31:44','02:46:20','G.','Emmanuel','Blas'),(4,'11-007-4','2014-03-27','09:45:28','12:31:56','02:46:28','M.','Michelle','Dioquino'),(5,'11-007-5','2014-03-27','09:45:36','12:32:00','02:46:24','D.','Ma. Fatima','Oliveros'),(6,'11-007-6','2014-03-27','09:45:41','12:32:07','02:46:26','T. ','Veronica ','Repia '),(7,'11-007-7','2014-03-27','09:45:50','12:32:25','02:46:35','P.','Reynaldo','Santos'),(8,'11-007-8','2014-03-27','09:45:56','12:32:31','02:46:35','S.','Amor','Artiola'),(9,'11-007-9','2014-03-27','09:46:11','12:32:37','02:46:26','E.','Arsenio','Sagun Jr.'),(10,'11-009-10','2014-03-27','09:46:18','12:32:47','02:46:29','V.','Santiago','Villanueva'),(11,'11-008-72','2014-03-27','09:46:29','12:33:03','02:46:34','C.','Naneth','Policarpio'),(12,'11-003-2','2014-03-27','09:46:35','12:33:11','02:46:36','V.','Eyestrain','Tapar'),(14,'11-007-1','2014-03-28','10:40:37','10:50:22','00:09:45','G. ','Levy  ','Bautista '),(25,'11-007-1','2014-03-28','10:50:30','11:02:17','00:11:47','G. ','Levy  ','Bautista '),(26,'11-007-1','2014-03-28','11:02:23','11:02:44','00:00:21','G. ','Levy  ','Bautista '),(27,'11-007-1','2014-03-28','11:02:53','11:04:21','00:01:28','G. ','Levy  ','Bautista '),(28,'11-007-1','2014-03-28','11:04:30','11:06:25','00:01:55','G. ','Levy  ','Bautista '),(29,'11-007-1','2014-03-28','11:06:41','11:06:46','00:00:05','G. ','Levy  ','Bautista '),(30,'11-007-1','2014-03-28','11:08:30','11:10:03','00:01:33','G. ','Levy  ','Bautista '),(31,'11-007-1','2014-03-28','11:10:13','11:13:14','00:03:01','G. ','Levy  ','Bautista '),(32,'11-007-1','2014-03-28','11:13:22','11:14:17','00:00:55','G. ','Levy  ','Bautista '),(33,'11-007-1','2014-03-28','11:14:23','11:16:02','00:01:39','G. ','Levy  ','Bautista '),(34,'11-007-1','2014-03-28','11:16:38','11:18:19','00:01:41','G. ','Levy  ','Bautista '),(35,'11-007-1','2014-03-28','11:18:24','11:21:08','00:02:44','G. ','Levy  ','Bautista '),(36,'11-007-1','2014-03-28','11:21:12','11:22:04','00:00:52','G. ','Levy  ','Bautista '),(37,'11-007-1','2014-03-28','11:22:08','11:23:14','00:01:06','G. ','Levy  ','Bautista '),(38,'11-007-1','2014-03-28','11:23:16','11:24:21','00:01:05','G. ','Levy  ','Bautista '),(39,'11-007-1','2014-03-28','11:24:25','11:25:05','00:00:40','G. ','Levy  ','Bautista '),(40,'11-007-1','2014-03-28','11:25:09','11:28:32','00:03:23','G. ','Levy  ','Bautista '),(41,'11-007-1','2014-03-28','11:28:36','11:29:25','00:00:49','G. ','Levy  ','Bautista '),(15,'11-007-2','2014-03-28','10:40:47','11:31:08','00:50:21','T.','Henry David','Buenaventura'),(42,'11-007-2','2014-03-28','11:31:13','11:31:41','00:00:28','T.','Henry David','Buenaventura'),(43,'11-007-2','2014-03-28','11:31:44','11:32:08','00:00:24','T.','Henry David','Buenaventura'),(44,'11-007-2','2014-03-28','11:32:15','11:33:01','00:00:46','T.','Henry David','Buenaventura'),(45,'11-007-2','2014-03-28','11:33:06','11:33:32','00:00:26','T.','Henry David','Buenaventura'),(46,'11-007-2','2014-03-28','11:33:36','11:34:16','00:00:40','T.','Henry David','Buenaventura'),(47,'11-007-2','2014-03-28','11:34:21','11:35:10','00:00:49','T.','Henry David','Buenaventura'),(48,'11-007-2','2014-03-28','11:35:13','11:35:32','00:00:19','T.','Henry David','Buenaventura'),(49,'11-007-2','2014-03-28','11:35:36','11:35:50','00:00:14','T.','Henry David','Buenaventura'),(50,'11-007-2','2014-03-28','11:35:53','11:36:50','00:00:57','T.','Henry David','Buenaventura'),(51,'11-007-2','2014-03-28','11:36:55','11:37:27','00:00:32','T.','Henry David','Buenaventura'),(52,'11-007-2','2014-03-28','11:37:31','11:38:50','00:01:19','T.','Henry David','Buenaventura'),(53,'11-007-2','2014-03-28','11:38:53','11:41:50','00:02:57','T.','Henry David','Buenaventura'),(54,'11-007-2','2014-03-28','11:41:59','11:43:24','00:01:25','T.','Henry David','Buenaventura'),(55,'11-007-2','2014-03-28','11:43:27','11:44:06','00:00:39','T.','Henry David','Buenaventura'),(56,'11-007-2','2014-03-28','11:44:10','11:44:38','00:00:28','T.','Henry David','Buenaventura'),(57,'11-007-2','2014-03-28','11:44:41','11:46:14','00:01:33','T.','Henry David','Buenaventura'),(58,'11-007-2','2014-03-28','11:46:18','11:46:41','00:00:23','T.','Henry David','Buenaventura'),(16,'11-007-4','2014-03-28','10:41:05','11:46:54','01:05:49','M.','Michelle','Dioquino'),(59,'11-007-2','2014-03-28','11:46:44','11:49:17','00:02:33','T.','Henry David','Buenaventura'),(61,'11-007-2','2014-03-28','11:51:56','11:52:05','00:00:09','T.','Henry David','Buenaventura'),(62,'11-007-1','2014-03-28','11:52:34','11:52:47','00:00:13','G. ','Levy  ','Bautista '),(63,'11-007-1','2014-03-28','11:53:45','11:53:56','00:00:11','G. ','Levy  ','Bautista '),(64,'11-007-1','2014-03-28','11:56:05','11:56:29','00:00:24','G. ','Levy  ','Bautista '),(65,'11-007-1','2014-03-28','11:57:10','11:59:14','00:02:04','G. ','Levy  ','Bautista '),(66,'11-007-2','2014-03-28','11:57:17','11:59:19','00:02:02','T.','Henry David','Buenaventura'),(60,'11-007-4','2014-03-28','11:46:59','11:59:34','00:12:35','M.','Michelle','Dioquino'),(17,'11-007-5','2014-03-28','10:41:09','11:59:42','01:18:33','D.','Ma. Fatima','Oliveros'),(18,'11-007-6','2014-03-28','10:41:21','11:59:52','01:18:31','T. ','Veronica ','Repia '),(19,'11-007-7','2014-03-28','10:41:26','12:00:02','01:18:36','P.','Reynaldo','Santos'),(20,'11-007-8','2014-03-28','10:41:30','12:00:09','01:18:39','S.','Amor','Artiola'),(21,'11-007-9','2014-03-28','10:41:40','12:00:17','01:18:37','E.','Arsenio','Sagun Jr.'),(22,'11-009-10','2014-03-28','10:41:47','12:00:29','01:18:42','V.','Santiago','Villanueva'),(23,'11-008-72','2014-03-28','10:41:54','12:00:39','01:18:45','C.','Naneth','Policarpio'),(24,'11-003-2','2014-03-28','10:42:00','12:00:47','01:18:47','V.','Eyestrain','Tapar'),(67,'11-007-1','2014-03-28','12:04:49','12:05:11','00:00:22','G. ','Levy  ','Bautista '),(68,'11-007-2','2014-03-28','12:05:30','12:05:36','00:00:06','T.','Henry David','Buenaventura'),(69,'11-007-1','2014-03-28','12:06:04','12:06:10','00:00:06','G. ','Levy  ','Bautista '),(70,'11-007-1','2014-03-28','12:49:32','12:50:09','00:00:37','G. ','Levy  ','Bautista '),(71,'11-007-1','2014-03-28','12:54:52','12:55:06','00:00:14','G. ','Levy  ','Bautista '),(73,'11-007-2','2014-03-30','14:25:10','14:25:23','00:00:13','T.','Henry David','Buenaventura'),(72,'11-007-1','2014-03-30','14:24:47','14:25:40','00:00:53','G. ','Levy  ','Bautista '),(75,'11-007-2','2014-03-30','14:26:29','14:26:56','00:00:27','T.','Henry David','Buenaventura'),(76,'11-12-13','2014-03-30','16:31:19','16:31:35','00:00:16','p','prodigalp','galp'),(77,'11-007-2','2014-03-31','09:39:10','10:12:58','00:33:48','T. ','Henry David ','Buenaventura ');
/*!40000 ALTER TABLE `tblrecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblts`
--

DROP TABLE IF EXISTS `tblts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empnum` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `timeset` time NOT NULL,
  `mname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblts`
--

LOCK TABLES `tblts` WRITE;
/*!40000 ALTER TABLE `tblts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gtype` varchar(40) NOT NULL,
  `role` varchar(10) NOT NULL,
  `ctrlnum` int(11) NOT NULL,
  `empnum` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` VALUES (4,'Levy     ','Bautista    ','G.    ','lgbautista','827ccb0eea8a706c4c34a16891f84e7b','Professor','2',0,'11-007-1'),(5,'Henry David ','Buenaventura ','T. ','hdbuenaventura','827ccb0eea8a706c4c34a16891f84e7b','Professor','3',0,'11-007-2'),(6,'Emmanuel ','Blas ','G. ','egblas','827ccb0eea8a706c4c34a16891f84e7b','Professor','3',0,'11-007-3'),(7,'Michelle ','Dioquino ','M. ','mmdioquino','827ccb0eea8a706c4c34a16891f84e7b','Professor','2',0,'11-007-4'),(8,'Ma. Fatima ','Oliveros ','D. ','mdoliveros','827ccb0eea8a706c4c34a16891f84e7b','Professor','3',0,'11-007-5'),(9,'Veronica  ','Repia  ','T.  ','vtrepia','827ccb0eea8a706c4c34a16891f84e7b','Professor','2',0,'11-007-6'),(10,'Reynaldo ','Santos ','P. ','rpsantos','827ccb0eea8a706c4c34a16891f84e7b','Professor','3',0,'11-007-7'),(11,'Amor ','Artiola ','S. ','asartiola','827ccb0eea8a706c4c34a16891f84e7b','Professor','2',0,'11-007-8'),(12,'Arsenio ','Sagun Jr. ','E. ','aesagun','827ccb0eea8a706c4c34a16891f84e7b','Professor','2',0,'11-007-9'),(13,'Santiago ','Villanueva ','V. ','svvillanueva','827ccb0eea8a706c4c34a16891f84e7b','Professor','2',0,'11-009-10'),(14,'Naneth ','Policarpio ','C. ','ncpolicarpio','827ccb0eea8a706c4c34a16891f84e7b','Professor','1',0,'11-008-72'),(0,'Eyestrain ','Tapar ','V. ','eyestrain','827ccb0eea8a706c4c34a16891f84e7b','Professor','4',0,'11-003-2');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-31 10:17:35
