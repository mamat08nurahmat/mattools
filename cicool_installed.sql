-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cicool_installed
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `aauth_group_to_group`
--

DROP TABLE IF EXISTS `aauth_group_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) unsigned NOT NULL,
  `subgroup_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`subgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_group_to_group`
--

LOCK TABLES `aauth_group_to_group` WRITE;
/*!40000 ALTER TABLE `aauth_group_to_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_group_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_groups`
--

DROP TABLE IF EXISTS `aauth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_groups`
--

LOCK TABLES `aauth_groups` WRITE;
/*!40000 ALTER TABLE `aauth_groups` DISABLE KEYS */;
INSERT INTO `aauth_groups` VALUES (1,'Admin','Superadmin Group'),(2,'Public','Public Group'),(3,'Default','Default Access Group'),(4,'Member','Member Access Group');
/*!40000 ALTER TABLE `aauth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_login_attempts`
--

DROP TABLE IF EXISTS `aauth_login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_login_attempts`
--

LOCK TABLES `aauth_login_attempts` WRITE;
/*!40000 ALTER TABLE `aauth_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_perm_to_group`
--

DROP TABLE IF EXISTS `aauth_perm_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_perm_to_group`
--

LOCK TABLES `aauth_perm_to_group` WRITE;
/*!40000 ALTER TABLE `aauth_perm_to_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_perm_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_perm_to_user`
--

DROP TABLE IF EXISTS `aauth_perm_to_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_perm_to_user`
--

LOCK TABLES `aauth_perm_to_user` WRITE;
/*!40000 ALTER TABLE `aauth_perm_to_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_perm_to_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_perms`
--

DROP TABLE IF EXISTS `aauth_perms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_perms`
--

LOCK TABLES `aauth_perms` WRITE;
/*!40000 ALTER TABLE `aauth_perms` DISABLE KEYS */;
INSERT INTO `aauth_perms` VALUES (1,'menu_dashboard',NULL),(2,'menu_crud_builder',NULL),(3,'menu_api_builder',NULL),(4,'menu_page_builder',NULL),(5,'menu_form_builder',NULL),(6,'menu_menu',NULL),(7,'menu_auth',NULL),(8,'menu_user',NULL),(9,'menu_group',NULL),(10,'menu_access',NULL),(11,'menu_permission',NULL),(12,'menu_api_documentation',NULL),(13,'menu_web_documentation',NULL),(14,'menu_settings',NULL),(15,'user_list',NULL),(16,'user_update_status',NULL),(17,'user_export',NULL),(18,'user_add',NULL),(19,'user_update',NULL),(20,'user_update_profile',NULL),(21,'user_update_password',NULL),(22,'user_profile',NULL),(23,'user_view',NULL),(24,'user_delete',NULL),(25,'blog_list',NULL),(26,'blog_export',NULL),(27,'blog_add',NULL),(28,'blog_update',NULL),(29,'blog_view',NULL),(30,'blog_delete',NULL),(31,'form_list',NULL),(32,'form_export',NULL),(33,'form_add',NULL),(34,'form_update',NULL),(35,'form_view',NULL),(36,'form_manage',NULL),(37,'form_delete',NULL),(38,'crud_list',NULL),(39,'crud_export',NULL),(40,'crud_add',NULL),(41,'crud_update',NULL),(42,'crud_view',NULL),(43,'crud_delete',NULL),(44,'rest_list',NULL),(45,'rest_export',NULL),(46,'rest_add',NULL),(47,'rest_update',NULL),(48,'rest_view',NULL),(49,'rest_delete',NULL),(50,'group_list',NULL),(51,'group_export',NULL),(52,'group_add',NULL),(53,'group_update',NULL),(54,'group_view',NULL),(55,'group_delete',NULL),(56,'permission_list',NULL),(57,'permission_export',NULL),(58,'permission_add',NULL),(59,'permission_update',NULL),(60,'permission_view',NULL),(61,'permission_delete',NULL),(62,'access_list',NULL),(63,'access_add',NULL),(64,'access_update',NULL),(65,'menu_list',NULL),(66,'menu_add',NULL),(67,'menu_update',NULL),(68,'menu_delete',NULL),(69,'menu_save_ordering',NULL),(70,'menu_type_add',NULL),(71,'page_list',NULL),(72,'page_export',NULL),(73,'page_add',NULL),(74,'page_update',NULL),(75,'page_view',NULL),(76,'page_delete',NULL),(77,'blog_list',NULL),(78,'blog_export',NULL),(79,'blog_add',NULL),(80,'blog_update',NULL),(81,'blog_view',NULL),(82,'blog_delete',NULL),(83,'setting',NULL),(84,'setting_update',NULL),(85,'dashboard',NULL),(86,'extension_list',NULL),(87,'extension_activate',NULL),(88,'extension_deactivate',NULL);
/*!40000 ALTER TABLE `aauth_perms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_pms`
--

DROP TABLE IF EXISTS `aauth_pms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_pms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_pms`
--

LOCK TABLES `aauth_pms` WRITE;
/*!40000 ALTER TABLE `aauth_pms` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_pms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_user`
--

DROP TABLE IF EXISTS `aauth_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_user`
--

LOCK TABLES `aauth_user` WRITE;
/*!40000 ALTER TABLE `aauth_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_user_to_group`
--

DROP TABLE IF EXISTS `aauth_user_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_user_to_group`
--

LOCK TABLES `aauth_user_to_group` WRITE;
/*!40000 ALTER TABLE `aauth_user_to_group` DISABLE KEYS */;
INSERT INTO `aauth_user_to_group` VALUES (1,1),(1,3);
/*!40000 ALTER TABLE `aauth_user_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_user_variables`
--

DROP TABLE IF EXISTS `aauth_user_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_user_variables`
--

LOCK TABLES `aauth_user_variables` WRITE;
/*!40000 ALTER TABLE `aauth_user_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_user_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_users`
--

DROP TABLE IF EXISTS `aauth_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `oauth_uid` text,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `top_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_users`
--

LOCK TABLES `aauth_users` WRITE;
/*!40000 ALTER TABLE `aauth_users` DISABLE KEYS */;
INSERT INTO `aauth_users` VALUES (1,'admin@admin.com',NULL,NULL,'5711aa2253ac62088bf34f79f8ccd82e41bdbcf32e7670772d2a1e1746a9be9b','admin','admin','',0,'2019-03-04 14:31:11','2019-03-04 14:31:11','2019-03-04 08:31:03',NULL,NULL,NULL,NULL,NULL,'127.0.0.1');
/*!40000 ALTER TABLE `aauth_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `tags` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewers` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'Hello Wellcome To Cicool Builder','Hello-Wellcome-To-Ciool-Builder','greetings from our team I hope to be happy! ','wellcome.jpg','greetings','1','publish','admin',0,'2019-03-04 08:31:03','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_category` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_category`
--

LOCK TABLES `blog_category` WRITE;
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
INSERT INTO `blog_category` VALUES (1,'Technology',''),(2,'Lifestyle','');
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captcha` (
  `captcha_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captcha`
--

LOCK TABLES `captcha` WRITE;
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_options`
--

DROP TABLE IF EXISTS `cc_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) NOT NULL,
  `option_value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_options`
--

LOCK TABLES `cc_options` WRITE;
/*!40000 ALTER TABLE `cc_options` DISABLE KEYS */;
INSERT INTO `cc_options` VALUES (1,'active_theme','cicool'),(2,'favicon','default.png'),(3,'site_name','CICOOL DEV');
/*!40000 ALTER TABLE `cc_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cc_session`
--

DROP TABLE IF EXISTS `cc_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cc_session` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cc_session`
--

LOCK TABLES `cc_session` WRITE;
/*!40000 ALTER TABLE `cc_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `cc_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud`
--

DROP TABLE IF EXISTS `crud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crud` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud`
--

LOCK TABLES `crud` WRITE;
/*!40000 ALTER TABLE `crud` DISABLE KEYS */;
/*!40000 ALTER TABLE `crud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud_custom_option`
--

DROP TABLE IF EXISTS `crud_custom_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crud_custom_option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_custom_option`
--

LOCK TABLES `crud_custom_option` WRITE;
/*!40000 ALTER TABLE `crud_custom_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `crud_custom_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud_field`
--

DROP TABLE IF EXISTS `crud_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crud_field` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `crud_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_field`
--

LOCK TABLES `crud_field` WRITE;
/*!40000 ALTER TABLE `crud_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `crud_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud_field_validation`
--

DROP TABLE IF EXISTS `crud_field_validation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crud_field_validation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_field_validation`
--

LOCK TABLES `crud_field_validation` WRITE;
/*!40000 ALTER TABLE `crud_field_validation` DISABLE KEYS */;
/*!40000 ALTER TABLE `crud_field_validation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud_input_type`
--

DROP TABLE IF EXISTS `crud_input_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crud_input_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_input_type`
--

LOCK TABLES `crud_input_type` WRITE;
/*!40000 ALTER TABLE `crud_input_type` DISABLE KEYS */;
INSERT INTO `crud_input_type` VALUES (1,'input','0',0,'input'),(2,'textarea','0',0,'text'),(3,'select','1',0,'select'),(4,'editor_wysiwyg','0',0,'editor'),(5,'password','0',0,'password'),(6,'email','0',0,'email'),(7,'address_map','0',0,'address_map'),(8,'file','0',0,'file'),(9,'file_multiple','0',0,'file_multiple'),(10,'datetime','0',0,'datetime'),(11,'date','0',0,'date'),(12,'timestamp','0',0,'timestamp'),(13,'number','0',0,'number'),(14,'yes_no','0',0,'yes_no'),(15,'time','0',0,'time'),(16,'year','0',0,'year'),(17,'select_multiple','1',0,'select_multiple'),(18,'checkboxes','1',0,'checkboxes'),(19,'options','1',0,'options'),(20,'true_false','0',0,'true_false'),(21,'current_user_username','0',0,'user_username'),(22,'current_user_id','0',0,'current_user_id'),(23,'custom_option','0',1,'custom_option'),(24,'custom_checkbox','0',1,'custom_checkbox'),(25,'custom_select_multiple','0',1,'custom_select_multiple'),(26,'custom_select','0',1,'custom_select');
/*!40000 ALTER TABLE `crud_input_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crud_input_validation`
--

DROP TABLE IF EXISTS `crud_input_validation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crud_input_validation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crud_input_validation`
--

LOCK TABLES `crud_input_validation` WRITE;
/*!40000 ALTER TABLE `crud_input_validation` DISABLE KEYS */;
INSERT INTO `crud_input_validation` VALUES (1,'required','no','input, file, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes, true_false, address_map, custom_option, custom_checkbox, custom_select_multiple, custom_select, file_multiple','','',''),(2,'max_length','yes','input, number, text, select, password, email, editor, yes_no, time, year, select_multiple, options, checkboxes, address_map','','','numeric'),(3,'min_length','yes','input, number, text, select, password, email, editor, time, year, select_multiple, address_map','','','numeric'),(4,'valid_email','no','input, email','','',''),(5,'valid_emails','no','input, email','','',''),(6,'regex','yes','input, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes','','yes','callback_valid_regex'),(7,'decimal','no','input, number, text, select','','',''),(8,'allowed_extension','yes','file, file_multiple','ex : jpg,png,..','','callback_valid_extension_list'),(9,'max_width','yes','file, file_multiple','','','numeric'),(10,'max_height','yes','file, file_multiple','','','numeric'),(11,'max_size','yes','file, file_multiple','... kb','','numeric'),(12,'max_item','yes','file_multiple','','','numeric'),(13,'valid_url','no','input, text','','',''),(14,'alpha','no','input, text, select, password, editor, yes_no','','',''),(15,'alpha_numeric','no','input, number, text, select, password, editor','','',''),(16,'alpha_numeric_spaces','no','input, number, text,select, password, editor','','',''),(17,'valid_number','no','input, number, text, password, editor, true_false','','yes',''),(18,'valid_datetime','no','input, datetime, text','','yes',''),(19,'valid_date','no','input, datetime, date, text','','yes',''),(20,'valid_max_selected_option','yes','select_multiple, custom_select_multiple, custom_checkbox, checkboxes','','yes','numeric'),(21,'valid_min_selected_option','yes','select_multiple, custom_select_multiple, custom_checkbox, checkboxes','','yes','numeric'),(22,'valid_alpha_numeric_spaces_underscores','no','input, text,select, password, editor','','yes',''),(23,'matches','yes','input, number, text, password, email','any field','no','callback_valid_alpha_numeric_spaces_underscores'),(24,'valid_json','no','input, text, editor','','yes',' '),(25,'valid_url','no','input, text, editor','','no',' '),(26,'exact_length','yes','input, text, number','0 - 99999*','no','numeric'),(27,'alpha_dash','no','input, text','','no',''),(28,'integer','no','input, text, number','','no',''),(29,'differs','yes','input, text, number, email, password, editor, options, select','any field','no','callback_valid_alpha_numeric_spaces_underscores'),(30,'is_natural','no','input, text, number','','no',''),(31,'is_natural_no_zero','no','input, text, number','','no',''),(32,'less_than','yes','input, text, number','','no','numeric'),(33,'less_than_equal_to','yes','input, text, number','','no','numeric'),(34,'greater_than','yes','input, text, number','','no','numeric'),(35,'greater_than_equal_to','yes','input, text, number','','no','numeric'),(36,'in_list','yes','input, text, number, select, options','','no','callback_valid_multiple_value'),(37,'valid_ip','no','input, text','','no','');
/*!40000 ALTER TABLE `crud_input_validation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_custom_attribute`
--

DROP TABLE IF EXISTS `form_custom_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_custom_attribute` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `attribute_value` text NOT NULL,
  `attribute_label` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_custom_attribute`
--

LOCK TABLES `form_custom_attribute` WRITE;
/*!40000 ALTER TABLE `form_custom_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_custom_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_custom_option`
--

DROP TABLE IF EXISTS `form_custom_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_custom_option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_custom_option`
--

LOCK TABLES `form_custom_option` WRITE;
/*!40000 ALTER TABLE `form_custom_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_custom_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_field`
--

DROP TABLE IF EXISTS `form_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_field` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `placeholder` text,
  `auto_generate_help_block` varchar(10) DEFAULT NULL,
  `help_block` text,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_field`
--

LOCK TABLES `form_field` WRITE;
/*!40000 ALTER TABLE `form_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_field_validation`
--

DROP TABLE IF EXISTS `form_field_validation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_field_validation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_field_validation`
--

LOCK TABLES `form_field_validation` WRITE;
/*!40000 ALTER TABLE `form_field_validation` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_field_validation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keys`
--

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
INSERT INTO `keys` VALUES (1,0,'361353FB3793E4867910414AC2133643',0,0,0,NULL,'2019-03-04 01:31:03');
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `icon_color` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'MAIN NAVIGATION','label','','administrator/dashboard',1,0,'',1,1),(2,'Dashboard','menu','','administrator/dashboard',2,0,'fa-dashboard',1,1),(3,'CRUD Builder','menu','','administrator/crud',3,0,'fa-table',1,1),(4,'API Builder','menu','','administrator/rest',4,0,'fa-code',1,1),(5,'Page Builder','menu','','administrator/page',5,0,'fa-file-o',1,1),(6,'Form Builder','menu','','administrator/form',6,0,'fa-newspaper-o',1,1),(7,'Blog','menu','','administrator/blog',7,0,'fa-file-text-o',1,1),(8,'Menu','menu','','administrator/menu',8,0,'fa-bars',1,1),(9,'Auth','menu','','',9,0,'fa-shield',1,1),(10,'User','menu','','administrator/user',10,9,'',1,1),(11,'Groups','menu','','administrator/group',11,9,'',1,1),(12,'Access','menu','','administrator/access',12,9,'',1,1),(13,'Permission','menu','','administrator/permission',13,9,'',1,1),(14,'API Keys','menu','','administrator/keys',14,9,'',1,1),(15,'Extension','menu','','administrator/extension',15,0,'fa-puzzle-piece',1,1),(16,'OTHER','label','','',16,0,'',1,1),(17,'Settings','menu','text-red','administrator/setting',17,0,'fa-circle-o',1,1),(18,'Web Documentation','menu','text-blue','administrator/doc/web',18,0,'fa-circle-o',1,1),(19,'API Documentation','menu','text-yellow','administrator/doc/api',19,0,'fa-circle-o',1,1),(20,'Home','menu','','/',1,0,'',2,1),(21,'Blog','menu','','blog',4,0,'',2,1),(22,'Dashboard','menu','','administrator/dashboard',5,0,'',2,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_type`
--

DROP TABLE IF EXISTS `menu_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_type`
--

LOCK TABLES `menu_type` WRITE;
/*!40000 ALTER TABLE `menu_type` DISABLE KEYS */;
INSERT INTO `menu_type` VALUES (1,'side menu',NULL),(2,'top menu',NULL);
/*!40000 ALTER TABLE `menu_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fresh_content` text NOT NULL,
  `keyword` text,
  `description` text,
  `link` varchar(200) DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_block_element`
--

DROP TABLE IF EXISTS `page_block_element`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_block_element` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_preview` varchar(200) NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `content_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_block_element`
--

LOCK TABLES `page_block_element` WRITE;
/*!40000 ALTER TABLE `page_block_element` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_block_element` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rest`
--

DROP TABLE IF EXISTS `rest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rest` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `x_api_key` varchar(20) DEFAULT NULL,
  `x_token` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rest`
--

LOCK TABLES `rest` WRITE;
/*!40000 ALTER TABLE `rest` DISABLE KEYS */;
/*!40000 ALTER TABLE `rest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rest_field`
--

DROP TABLE IF EXISTS `rest_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rest_field` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rest_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_api` varchar(10) DEFAULT NULL,
  `show_update_api` varchar(10) DEFAULT NULL,
  `show_detail_api` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rest_field`
--

LOCK TABLES `rest_field` WRITE;
/*!40000 ALTER TABLE `rest_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `rest_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rest_field_validation`
--

DROP TABLE IF EXISTS `rest_field_validation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rest_field_validation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rest_field_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rest_field_validation`
--

LOCK TABLES `rest_field_validation` WRITE;
/*!40000 ALTER TABLE `rest_field_validation` DISABLE KEYS */;
/*!40000 ALTER TABLE `rest_field_validation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rest_input_type`
--

DROP TABLE IF EXISTS `rest_input_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rest_input_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rest_input_type`
--

LOCK TABLES `rest_input_type` WRITE;
/*!40000 ALTER TABLE `rest_input_type` DISABLE KEYS */;
INSERT INTO `rest_input_type` VALUES (1,'input','0','input'),(2,'timestamp','0','timestamp'),(3,'file','0','file');
/*!40000 ALTER TABLE `rest_input_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-04 14:35:27
