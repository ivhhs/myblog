-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: 192.168.10.10    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.2

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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `markdown_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'adfasdf','afsdafds',1,1,'2017-05-18 00:55:56','2017-05-18 00:55:56',1,'asdfasdf'),(2,'这是标题','发萨达发射的发射的发射的发射的发射的\r\n发射的发射的发f发射的发射的发\r\n发射的发射的发\r\n阿斯顿发射的发射的发\r\n发散发射的发射的发',1,2,'2017-05-18 01:06:49','2017-05-18 01:06:49',1,'这是描述'),(3,'这是新闻标题','发射的发散大赛的发',1,2,'2017-05-18 01:48:52','2017-05-18 01:48:52',1,'发射的发射的发'),(4,'这是新闻标题','发射的发散大赛的发',1,2,'2017-05-18 01:48:52','2017-05-18 01:48:52',1,'发射的发射的发'),(5,'发射的发射的发','发射的发射的发',0,2,'2017-05-18 01:49:59','2017-05-18 01:49:59',2,'阿斯顿发射的发'),(6,'发射的发射的发','发射的发射的发',1,2,'2017-05-18 01:52:18','2017-05-18 01:52:18',1,'阿斯顿发射的发'),(10,'标题','文章内容\r\n阿达萨达萨达\r\nasdasdasd\r\nfasdfasdfdfasf\r\n啊发射的发\r\n士大夫阿斯顿\r\n阿达时发生的发\r\n阿斯顿发射的发\r\n阿斯顿发射的发\r\n阿斯顿发射的发',1,1,'2017-05-18 03:38:51','2017-05-18 03:38:51',1,'描述'),(11,'新编辑器','<p>\r\n	发射的发射的发\r\n</p>\r\n<p>\r\n	阿斯顿发射的发\r\n</p>\r\n<p>\r\n	发射的发射的发\r\n</p>\r\n<p>\r\n	阿斯顿发射的发射的发\r\n</p>\r\n<p>\r\n	阿斯顿发射的发散\r\n</p>\r\n<p>\r\n	阿三发射的发\r\n</p>',1,1,'2017-05-18 05:58:24','2017-05-18 05:58:24',3,'发散发射的发射的发'),(13,'发萨达发射的发','<img src=\"/upload/images/201705/18/1/cVVlHe3S24.jpg\" alt=\"\" />发射的发射的发',1,1,'2017-05-18 07:18:44','2017-05-18 07:19:00',1,'发射的发射的发');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 15:33:37
