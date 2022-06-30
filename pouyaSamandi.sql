-- MySQL dump 10.13  Distrib 8.0.11, for macos10.13 (x86_64)
--
-- Host: localhost    Database: pouya_samandi
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `experiences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `headline` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences`
--

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` VALUES (27,'✏️ Teaching Experience'),(28,'? Researching Experience'),(29,'? Work Experience');
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `explanations`
--

DROP TABLE IF EXISTS `explanations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `explanations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `explanation` varchar(750) COLLATE utf32_unicode_ci DEFAULT NULL,
  `explainable_type` varchar(45) COLLATE utf32_unicode_ci DEFAULT NULL,
  `explainable_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `explanations`
--

LOCK TABLES `explanations` WRITE;
/*!40000 ALTER TABLE `explanations` DISABLE KEYS */;
INSERT INTO `explanations` VALUES (240,'• Computer: Solidworks, Matlab, Python, Adamas, Mathematica and C++.','App\\Models\\Skill',37),(242,'• Microcontrollers: AVR and Arduino (open source electronic platform).','App\\Models\\Skill',37),(244,'• Lots of successful experiences in team-working.','App\\Models\\Skill',37),(247,'✔️ TOEFL score: 98 out of 120 (R:24, L:28, S:24, W: 22).','App\\Models\\Skill',38),(248,'✔︎ Persian (native) English (fluent) Arabic ( familiar).','App\\Models\\Skill',38),(258,'سشیشسیسشیشس',NULL,NULL),(259,'asaSAsaSaaS',NULL,NULL),(260,'sadsadsadsadsadsa',NULL,NULL),(261,'aSas',NULL,NULL),(262,'AsaSas',NULL,NULL),(263,'aSasaSasaSsaS',NULL,NULL),(264,'asaSasaSAsaSs',NULL,NULL),(265,'aSasaSasaSa',NULL,NULL),(266,'bgfgfdgdfgdfg',NULL,NULL),(267,'الللات',NULL,NULL),(268,'شسشسشس',NULL,NULL),(269,'sadksakdkjasd',NULL,NULL),(270,'testtttt1234',NULL,NULL),(272,'testtttt123411Q','kkkj',NULL),(273,'nbnb','msmaMS',NULL),(280,'Professor Habibnejad has been chosen as one of the highest-ranked scientists in 2017(top 1%). I passed one of my best courses called “Introduction to Robotics” with him. Email: hkorayem@iust.ac.ir.','App\\Models\\Refree',6),(283,'Working with Dr. Davie as my supervisor is one of my biggest achievements. He has graduated as one of the most talented students from McGill University and is one of the well-known professors in the field of control and mechatronics. Email: markazi@iust.ac.ir.','App\\Models\\Refree',4),(285,'It is a great honor to work with Dr.Khanmirza as a co-supervisor.\r\nAs a young professor, he shows great experience in his craft and is considered one of the best professors in the field of control and robotics. Email: khanmirza@iust.ac.ir','App\\Models\\Refree',5),(287,'Professor Habibnejad has been chosen as one of the highest-ranked scientists in 2017(top 1%). I passed one of my best courses called “Introduction to Robotics” with him. Email: hkorayem@iust.ac.ir.','App\\Models\\Refree',NULL),(288,'Dr. Alamdar recently received his Ph.D. from Sharif University. He has been working as a project manager at Sina Medical Robotics Company. Working under his supervision has led to my scientific and research progress. Email: alireza.alamdar@gmail.com.','App\\Models\\Refree',7),(306,'mnmmnmn','App\\Http\\Controllers\\Skill\\Skill',NULL),(307,'kjjkjk','App\\Http\\Controllers\\Skill\\Skill',NULL),(332,'• Designing and fabricating of robotic finger with a novel design.','App\\Models\\Experience',28),(333,'• \"Linear Control\", Mechanical Engineering Department.(Teacher Assistant), fall 2018.','App\\Models\\Experience',27),(334,'• Kinematic calibration of Sina-flex surgical robot by using Optimization and Machine Learning methods.','App\\Models\\Experience',28),(335,'• Control of a Two-Wheeled Walker Robot for Balance Enhancement.','App\\Models\\Experience',28),(336,'• Designing and fabricating a new concept of laparoscopic tool for Sina-flex surgical robot.','App\\Models\\Experience',28),(337,'• Teaching High school Mathematics and Physics to Talash High School student, 2014-2016.','App\\Models\\Experience',27),(338,'• Design and fabrication of dexterous robotic fingerfor B.Sc. final thesis.','App\\Models\\Experience',28),(339,'• 2 DOF Robot With 2 Prismatic Joint And A Camera To Detect A Red-Point.','App\\Models\\Experience',28),(340,'• Designing and fabricating a device for determining center of gravity for a complex body.','App\\Models\\Experience',28),(341,'• Calibrating the temperature sensor with 0.1°C precision.','App\\Models\\Experience',28),(342,'• Researching and designing PIG (device for cleaning pipeline system automatically and performing NDT.','App\\Models\\Experience',28),(343,'• Researching and Writing a paper about Aviation biofuels with a group of B.Sc. Students.','App\\Models\\Experience',28),(344,'• Internship, Otad Sana\'at Company (Working hours: 140). Summer 2016-2017 Automation Engineering, Mechatronic Systems, and Robotics','App\\Models\\Experience',29),(345,'• School counselor, Talash High School, Tehran, Iran. 2014-2016','App\\Models\\Experience',29),(346,'• Working and Researching at Sina medical and Robotic Co. January 2019','App\\Models\\Experience',29);
/*!40000 ALTER TABLE `explanations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_setting`
--

DROP TABLE IF EXISTS `home_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `home_setting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_setting`
--

LOCK TABLES `home_setting` WRITE;
/*!40000 ALTER TABLE `home_setting` DISABLE KEYS */;
INSERT INTO `home_setting` VALUES (1,'image','595399877.png'),(2,'first_name','Pouya'),(3,'last_name','Samandi'),(4,'slogan','DREAM BIG, WORK HARD, BE RELIABLE'),(5,'short_desc','Graduate B.Sc. student, Iran University of Science and Technology (IUST)'),(6,'life_goals','I personally believe that God has made us for a purpose and we should help one another to the fullest by using our knowledge and strength. I found my path by studying science and applying it to real life scenarios. No matter where a person live, it is my duty to help bring a more convenient and easier way of living for him. Waking up each morning makes me realize how much I would strive to accomplish world peace and become a part of history that shapes this very planet we call earth.'),(7,'about_me','I\'ve received my B.Sc. Mechanical Engineering degree from Iran University of Science and Technology. Currently, I\'m working and researching at Sina Medical and Robotics Co. and planning to pursue my education through a graduating program at an accredited university. My main interests are machine learning, robotics, and control engineering. after studying robotics at the university and doing some projects in these fields, they\'ve become my keen interests. As time passes I feel more attached to my field of study and they\'ve become a major part in my life.');
/*!40000 ALTER TABLE `home_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `media_url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `type` int DEFAULT NULL,
  `mediaText_id` int DEFAULT NULL,
  `desc_id` int DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `twoInRow` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `desc_id` (`desc_id`),
  KEY `mediaText_id` (`mediaText_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `description_ibfk` FOREIGN KEY (`desc_id`) REFERENCES `explanations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `media_ibfk_1` FOREIGN KEY (`mediaText_id`) REFERENCES `media_text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_ibfk_4` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (98,'1814358962.png',0,82,NULL,26,1),(99,'783617531.png',0,83,NULL,26,1),(103,'https://www.youtube.com/embed/6TzaqW4kdQk',1,87,NULL,27,1),(104,'https://www.youtube.com/embed/tOSGJEEAEmE',1,86,NULL,27,1),(114,'kkhkhkhhkkhkhhk',1,NULL,NULL,NULL,NULL),(117,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_text`
--

DROP TABLE IF EXISTS `media_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `media_text` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mediaText` text CHARACTER SET utf32 COLLATE utf32_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_text`
--

LOCK TABLES `media_text` WRITE;
/*!40000 ALTER TABLE `media_text` DISABLE KEYS */;
INSERT INTO `media_text` VALUES (80,'Sina-flex data mining for kinematic calibration'),(81,'Integrated Model of Human Walking with Walker Robot in Two Dimensions'),(82,'first: interaction force between a human and walker robot second: implemented torque in the walker wheel'),(83,'first: human relative walking path                                     second: implemented torque on the ankle'),(84,'render model of a robotic finger, named Yasin in Solidworks.'),(85,'Analyzing the designed model in ADAMS'),(86,'3 DOF robotic finger. The robot has been designed By SolidWorks and fabricated by a 3D-printer.'),(87,'The robot has three actuators and the Arduino controls them. The design                                     has                                     been improved and the results will be published.'),(88,'the measured outputs voltage convert to temperature by using ٍIstine-Heart equation.');
/*!40000 ALTER TABLE `media_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (15,'2014_10_12_000000_create_users_table',1),(16,'2014_10_12_100000_create_password_resets_table',2),(17,'2020_08_27_133813_create_students_table',3),(18,'2020_09_04_083442_create_experience_table',4),(19,'2020_09_04_125222_add_pic_path_to_experience_table',5),(20,'2020_09_06_093006_create_education_table',6),(21,'2020_09_07_052633_create_university_rankings_table',7),(22,'2020_09_07_090357_create_publication_table',8),(23,'2020_09_07_113323_create_interest_table',9),(24,'2020_09_08_093506_create_skill_table',10),(25,'2020_09_08_135810_create_refree_table',11),(26,'2020_09_11_054859_create_project_table',12),(27,'2020_09_11_055752_create_media_text_table',13),(28,'2020_09_11_073027_create_home_setting_table',14),(29,'2020_08_29_093939_reset',15),(30,'2020_09_11_122711_drop_table_description',16),(31,'2021_01_30_133633_create_description_table',0),(32,'2021_01_30_133633_create_education_table',0),(33,'2021_01_30_133633_create_experience_table',0),(34,'2021_01_30_133633_create_home_setting_table',0),(35,'2021_01_30_133633_create_interest_table',0),(36,'2021_01_30_133633_create_link_table',0),(37,'2021_01_30_133633_create_media_table',0),(38,'2021_01_30_133633_create_media_text_table',0),(39,'2021_01_30_133633_create_password_resets_table',0),(40,'2021_01_30_133633_create_project_table',0),(41,'2021_01_30_133633_create_publication_table',0),(42,'2021_01_30_133633_create_refree_table',0),(43,'2021_01_30_133633_create_skill_table',0),(44,'2021_01_30_133633_create_sub_project_table',0),(45,'2021_01_30_133633_create_university_rankings_table',0),(46,'2021_01_30_133633_create_users_table',0),(47,'2021_01_30_133634_add_foreign_keys_to_description_table',0),(48,'2021_01_30_133634_add_foreign_keys_to_link_table',0),(49,'2021_01_30_133634_add_foreign_keys_to_media_table',0),(50,'2021_01_30_133634_add_foreign_keys_to_sub_project_table',0),(51,'2021_01_30_133731_create_description_table',0),(52,'2021_01_30_133731_create_education_table',0),(53,'2021_01_30_133731_create_experience_table',0),(54,'2021_01_30_133731_create_home_setting_table',0),(55,'2021_01_30_133731_create_interest_table',0),(56,'2021_01_30_133731_create_link_table',0),(57,'2021_01_30_133731_create_media_table',0),(58,'2021_01_30_133731_create_media_text_table',0),(59,'2021_01_30_133731_create_password_resets_table',0),(60,'2021_01_30_133731_create_project_table',0),(61,'2021_01_30_133731_create_publication_table',0),(62,'2021_01_30_133731_create_refree_table',0),(63,'2021_01_30_133731_create_skill_table',0),(64,'2021_01_30_133731_create_sub_project_table',0),(65,'2021_01_30_133731_create_university_rankings_table',0),(66,'2021_01_30_133731_create_users_table',0),(67,'2021_01_30_133732_add_foreign_keys_to_description_table',0),(68,'2021_01_30_133732_add_foreign_keys_to_link_table',0),(69,'2021_01_30_133732_add_foreign_keys_to_media_table',0),(70,'2021_01_30_133732_add_foreign_keys_to_sub_project_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `background_color` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section_id` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (19,'Kinematic Calibration Of Sina-Flex Surgical Robot By Using Optimization And                     Machine Learning Methods.','#FFFFFF','Kinematic-Calibration'),(26,'Control Of A Two-Wheeled Walker Robot For Balance Enhancement.','#F5F5F5','Walker-Robot-Control'),(27,'B.Sc Thesis, Dexterous Robotic Hand Named Yasin','#FFFFFF','Dexterous-Robotic-Finger'),(28,'Design And Fabrication Of A New Robot Finger, Biennial International Experimental Solid Mechanics, Conference 2017, Tehran, Iran.','#F5F5F5','Robot-Finger'),(29,'Calibrating Temperature Sensor And Measuring Ambient Temperature.','#FFFFFF','Calibrating-Temperature-Sensor'),(30,'Pipeline Intelligent Gauge (PIG).','#F5F5F5','Pipeline-Intelligent-Gauge'),(31,'Designing And Fabricating A Device For Determining Center Of Mass For A Complex Body.','#FFFFFF','Mass-detection'),(32,'Working And Researching At Sina Medical And Robotics Co.','#F5F5F5','Work-experience'),(33,'Trainee At Otad Sanat Company For 350 Hours.','#FFFFFF','Trainees');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `publication` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication`
--

LOCK TABLES `publication` WRITE;
/*!40000 ALTER TABLE `publication` DISABLE KEYS */;
/*!40000 ALTER TABLE `publication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refrees`
--

DROP TABLE IF EXISTS `refrees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `refrees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refrees`
--

LOCK TABLES `refrees` WRITE;
/*!40000 ALTER TABLE `refrees` DISABLE KEYS */;
INSERT INTO `refrees` VALUES (4,'Prof. Davaie markazi',NULL,NULL),(5,'Dr.Esmail Khanmirza',NULL,NULL),(6,'Prof. Moharam Habibnejad Korayem',NULL,'Picture.jpeg'),(7,'Dr. Alireza Alamdar',NULL,NULL);
/*!40000 ALTER TABLE `refrees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `skill` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (37,'Programming Languages and Tools'),(38,'languages');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_project`
--

DROP TABLE IF EXISTS `sub_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sub_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `project_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_project`
--

LOCK TABLES `sub_project` WRITE;
/*!40000 ALTER TABLE `sub_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `university_rankings`
--

DROP TABLE IF EXISTS `university_rankings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `university_rankings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `university_rankings`
--

LOCK TABLES `university_rankings` WRITE;
/*!40000 ALTER TABLE `university_rankings` DISABLE KEYS */;
/*!40000 ALTER TABLE `university_rankings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Parsa Samandi','parsasamandizadeh@gmail.com',NULL,'$2y$10$JDAtrfLd0BCpOAyRE/hnV.9Ldh53xl3G8RQdBApCwTRAfdvFXk1Cm',NULL,'2020-09-11 04:04:33','2020-09-11 04:04:33'),(7,'سشیسی','سشیشسیس',NULL,'$2y$10$.xJMTBJxJQ4ssJY5Iz8DRuuSytkxm7Ow81tr2zq.uo4oDvLr4RYNi',NULL,NULL,NULL);
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

-- Dump completed on 2022-05-10  0:04:22
