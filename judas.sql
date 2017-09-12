-- Respaldo de la Base de Datos
-- Fecha: jueves 10 noviembre 2016 - 00:18:09
--
-- Version: 1.1.1, del 18 de Marzo de 2005, insidephp@gmail.com
-- Soporte y Updaters: http://insidephp.sytes.net
--
-- Host: `localhost`    Database: `uesjt`
-- ------------------------------------------------------
-- Server version 10.1.9-MariaDB

--
-- Table structure for table `assigments`
--

DROP TABLE IF EXISTS assigments;
CREATE TABLE `assigments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objective` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_grade` int(11) NOT NULL,
  `id_subjet` int(11) NOT NULL,
  `id_period` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assigments`
--

LOCK TABLES assigments WRITE;
UNLOCK TABLES;


--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS attendances;
CREATE TABLE `attendances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assistance` int(11) NOT NULL,
  `inattendances` int(11) NOT NULL,
  `id_year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendances`
--

LOCK TABLES attendances WRITE;
INSERT INTO attendances VALUES('1', '25', '5', '1', '10', '6', '1', '2016-11-10 00:14:24', '2016-11-10 00:14:24');
UNLOCK TABLES;


--
-- Table structure for table `califications`
--

DROP TABLE IF EXISTS califications;
CREATE TABLE `califications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cualitative` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuantitative` int(11) DEFAULT NULL,
  `continue_eval` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_period` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subjet` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `califications`
--

LOCK TABLES califications WRITE;
INSERT INTO califications VALUES('1', 'Excelente', '20', 'A', '3', '1', '6', '1', '2016-11-10 00:14:57', '2016-11-10 00:14:57');
UNLOCK TABLES;


--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS documents;
CREATE TABLE `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

LOCK TABLES documents WRITE;
UNLOCK TABLES;


--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS grades;
CREATE TABLE `grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_grade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

LOCK TABLES grades WRITE;
INSERT INTO grades VALUES('1', '1er Grado', 'U', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO grades VALUES('2', '2do Grado', 'A', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO grades VALUES('3', '2do Grado', 'B', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO grades VALUES('4', '3er Grado', 'U', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO grades VALUES('5', '4to Grado', 'U', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO grades VALUES('6', '5to Grado', 'U', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO grades VALUES('7', '6to Grado', 'A', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO grades VALUES('8', '6to Grado', 'B', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
UNLOCK TABLES;


--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS lists;
CREATE TABLE `lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `list_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lists`
--

LOCK TABLES lists WRITE;
INSERT INTO lists VALUES('1', 'Cuadernos de una línea', '6', '2016-11-10 00:08:34', '2016-11-10 00:08:34');
UNLOCK TABLES;


--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS migrations;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

LOCK TABLES migrations WRITE;
INSERT INTO migrations VALUES('2015_08_05_213742_create_alltables_table', '1');
UNLOCK TABLES;


--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS payments;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `bill_number` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

LOCK TABLES payments WRITE;
INSERT INTO payments VALUES('1', 'Noviembre', 'Efectivo', '09/11/2016', '5000', '120458710', '7', '', '2016-11-10 00:09:14', '2016-11-10 00:09:14');
UNLOCK TABLES;


--
-- Table structure for table `periods`
--

DROP TABLE IF EXISTS periods;
CREATE TABLE `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `period_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fromdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `todate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `periods`
--

LOCK TABLES periods WRITE;
INSERT INTO periods VALUES('1', '3er Lapso', '06/03/2017', '09/06/2017', 'A', '1', '2016-11-10 00:11:37', '2016-11-10 00:11:37');
INSERT INTO periods VALUES('2', '2do Lapso', '16/01/2017', '03/03/2017', 'A', '1', '2016-11-10 00:11:37', '2016-11-10 00:11:37');
INSERT INTO periods VALUES('3', '1er Lapso', '01/08/2016', '16/12/2016', 'A', '1', '2016-11-10 00:11:37', '2016-11-10 00:11:37');
UNLOCK TABLES;


--
-- Table structure for table `periodyear`
--

DROP TABLE IF EXISTS periodyear;
CREATE TABLE `periodyear` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `periodyear`
--

LOCK TABLES periodyear WRITE;
INSERT INTO periodyear VALUES('1', '2016-2017', 'A', '2016-11-10 00:11:37', '2016-11-10 00:11:37');
UNLOCK TABLES;


--
-- Table structure for table `pv_grasub`
--

DROP TABLE IF EXISTS pv_grasub;
CREATE TABLE `pv_grasub` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `subjet_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pv_grasub`
--

LOCK TABLES pv_grasub WRITE;
INSERT INTO pv_grasub VALUES('1', '1', '1', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('2', '1', '2', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('3', '1', '3', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('4', '1', '4', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('5', '1', '5', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('6', '1', '6', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('7', '1', '7', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('8', '1', '8', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('9', '1', '9', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('10', '1', '10', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('11', '1', '11', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('12', '1', '12', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('13', '1', '13', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('14', '1', '14', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('15', '2', '1', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('16', '2', '2', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('17', '2', '3', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('18', '2', '4', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('19', '2', '5', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('20', '2', '6', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('21', '2', '7', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('22', '2', '8', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('23', '2', '9', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('24', '2', '10', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('25', '2', '11', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('26', '2', '12', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO pv_grasub VALUES('27', '2', '13', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('28', '2', '14', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('29', '3', '1', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('30', '3', '2', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('31', '3', '3', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('32', '3', '4', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('33', '3', '5', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('34', '3', '6', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('35', '3', '7', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('36', '3', '8', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('37', '3', '9', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('38', '3', '10', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('39', '3', '11', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('40', '3', '12', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('41', '3', '13', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('42', '3', '14', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('43', '7', '1', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('44', '7', '2', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('45', '7', '3', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('46', '7', '4', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('47', '7', '5', '2016-11-09 23:48:27', '2016-11-09 23:48:27');
INSERT INTO pv_grasub VALUES('48', '7', '6', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('49', '7', '7', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('50', '7', '8', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('51', '7', '9', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('52', '7', '10', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('53', '7', '11', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('54', '7', '12', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('55', '7', '13', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('56', '7', '14', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('57', '4', '17', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('58', '4', '2', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('59', '4', '3', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('60', '4', '4', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('61', '4', '5', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('62', '4', '6', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('63', '4', '7', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('64', '4', '8', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('65', '4', '9', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('66', '4', '10', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('67', '4', '11', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('68', '4', '12', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('69', '4', '13', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('70', '4', '14', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('71', '5', '16', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('72', '5', '17', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('73', '5', '2', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('74', '5', '3', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('75', '5', '4', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('76', '5', '5', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('78', '5', '6', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('79', '5', '7', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('80', '5', '8', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('81', '5', '9', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('82', '5', '10', '2016-11-09 23:48:28', '2016-11-09 23:48:28');
INSERT INTO pv_grasub VALUES('83', '5', '11', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('84', '5', '12', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('85', '5', '13', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('86', '5', '14', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('87', '6', '15', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('88', '6', '2', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('89', '6', '3', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('90', '6', '4', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('91', '6', '5', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('92', '6', '6', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('93', '6', '7', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('94', '6', '8', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('95', '6', '9', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('97', '6', '10', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('98', '6', '11', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('99', '6', '12', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('100', '6', '14', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('101', '8', '15', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('102', '8', '2', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('103', '8', '4', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('104', '8', '5', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('105', '8', '6', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('106', '8', '7', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('107', '8', '8', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('108', '8', '9', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('109', '8', '10', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('110', '8', '11', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('111', '8', '12', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('112', '8', '14', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('113', '8', '15', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('114', '8', '16', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('115', '8', '17', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
INSERT INTO pv_grasub VALUES('116', '8', '18', '2016-11-09 23:48:29', '2016-11-09 23:48:29');
UNLOCK TABLES;


--
-- Table structure for table `pv_payparents`
--

DROP TABLE IF EXISTS pv_payparents;
CREATE TABLE `pv_payparents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pv_payparents`
--

LOCK TABLES pv_payparents WRITE;
INSERT INTO pv_payparents VALUES('1', '7', '1', '2016-11-10 00:09:14', '2016-11-10 00:09:14');
UNLOCK TABLES;


--
-- Table structure for table `pv_represents`
--

DROP TABLE IF EXISTS pv_represents;
CREATE TABLE `pv_represents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pv_represents`
--

LOCK TABLES pv_represents WRITE;
INSERT INTO pv_represents VALUES('1', '6', '7', '2016-11-10 00:02:19', '2016-11-10 00:02:19');
UNLOCK TABLES;


--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS schedules;
CREATE TABLE `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_grade` int(11) NOT NULL,
  `id_subjet` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedules`
--

LOCK TABLES schedules WRITE;
INSERT INTO schedules VALUES('1', '1', '1', '1', '1', 'A', '2016-11-10 00:11:55', '2016-11-10 00:11:55');
INSERT INTO schedules VALUES('2', '1', '2', '1', '2', 'A', '2016-11-10 00:12:05', '2016-11-10 00:12:05');
INSERT INTO schedules VALUES('3', '1', '3', '1', '4', 'A', '2016-11-10 00:12:24', '2016-11-10 00:12:24');
INSERT INTO schedules VALUES('4', '1', '4', '1', '5', 'A', '2016-11-10 00:12:37', '2016-11-10 00:12:37');
INSERT INTO schedules VALUES('5', '1', '5', '1', '6', 'A', '2016-11-10 00:12:50', '2016-11-10 00:12:50');
INSERT INTO schedules VALUES('6', '1', '6', '2', '1', 'A', '2016-11-10 00:13:03', '2016-11-10 00:13:03');
INSERT INTO schedules VALUES('7', '1', '7', '2', '2', 'A', '2016-11-10 00:13:16', '2016-11-10 00:13:16');
INSERT INTO schedules VALUES('8', '1', '8', '2', '4', 'A', '2016-11-10 00:13:40', '2016-11-10 00:13:40');
UNLOCK TABLES;


--
-- Table structure for table `subjets`
--

DROP TABLE IF EXISTS subjets;
CREATE TABLE `subjets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_sub` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjets`
--

LOCK TABLES subjets WRITE;
INSERT INTO subjets VALUES('1', 'Lectura y Caligrafía', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO subjets VALUES('2', 'Ciencias y Tecnologías', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO subjets VALUES('3', 'Castellano', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO subjets VALUES('4', 'Sociales', '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO subjets VALUES('5', 'Seguridad Vial', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO subjets VALUES('6', 'Matemáticas', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO subjets VALUES('7', 'Deporte', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO subjets VALUES('8', 'Bailoterapia', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO subjets VALUES('9', 'Inglés', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO subjets VALUES('10', 'Proyecto', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO subjets VALUES('11', 'Artes Plásticas', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
INSERT INTO subjets VALUES('12', 'Interculturalidad', '2016-11-09 23:48:26', '2016-11-09 23:48:26');
UNLOCK TABLES;


--
-- Table structure for table `upermissions`
--

DROP TABLE IF EXISTS upermissions;
CREATE TABLE `upermissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upermissions`
--

LOCK TABLES upermissions WRITE;
UNLOCK TABLES;


--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ci` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `birthdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(11) NOT NULL,
  `status_login` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `years_service` int(11) DEFAULT NULL,
  `er_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `allergies` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicines` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `back_medical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `disabled_period_id` int(11) DEFAULT NULL,
  `id_grade` int(11) DEFAULT NULL,
  `id_year` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

LOCK TABLES users WRITE;
INSERT INTO users VALUES('1', 'sucri93@gmail.com', '$2y$10$hr350MrbctGzHLEAcNmWe.WsoVcgCjE/qzd86PlRI/oKjOAW/jYhS', '20325891', 'V-24.597.378', 'Susana', 'Lares', 'sucri93@gmail.com', '20', '24/03/1995', 'F', NULL, 'Juan Griego', 'A', '1', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO users VALUES('2', 'francisco032729@gmail.com', '$2y$10$Y8zkR4cPpT6ORLKz0VUXLOxZ8BbAdffNqxCv1jkvTABjmIJ0mM9q.', '6446189', 'V-6.446.189', 'Francisco', 'Hernández', 'francisco032729@gmail.com', '50', '19/06/1965', 'M', NULL, 'El Cercado', 'A', '1', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO users VALUES('3', 'kaleidy17@gmail.com', '$2y$10$47PJTaMjh5MWdfYowdte0u296uY.VV.Extp29HPfuCgsPQ6qWHUPe', '19512013', 'V-19.512.013', 'Kaleidy', 'Hernández', 'kaleidy17@gmail.com', '24', '20/03/1991', 'F', NULL, 'Santa Ana', 'A', '1', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO users VALUES('4', 'yelitzarojas578@gmail.com', '$2y$10$YDTsREzeFvFz3SgKN4PJiexAjpRPQxwcNIruxoBctwGvEhPKsDvjy', '13669760', 'V-13.669.760', 'Yelitza', 'Rojas', 'yelitzarojas578@gmail.com', '38', '30/07/1977', 'F', NULL, 'Las Cabreras', 'A', '1', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO users VALUES('5', 'unidadsanjudastadeo@gmail.com', '$2y$10$Y8zkR4cPpT6ORLKz0VUXLOxZ8BbAdffNqxCv1jkvTABjmIJ0mM9q.', '6446189', 'V-6.868.266', 'Jitza', 'González', 'unidadsanjudastadeo@gmail.com', '50', '30/07/1977', 'F', NULL, 'El Cercado', 'A', '1', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-09 23:48:25', '2016-11-09 23:48:25');
INSERT INTO users VALUES('6', NULL, NULL, NULL, 'V-24437221', 'Mildred', 'Figueroa', NULL, '21', '24/11/1994', 'F', NULL, 'Guacuco', 'A', '4', 'D', '../../../assets/images/fotoscarnet/MildredFigueroa1.jpg', NULL, NULL, NULL, NULL, '(0412) 125-8515', 'Nada', 'Atamel, ibuprofeno, buscapina, alivet', 'Ninguno', NULL, NULL, NULL, '1', NULL, NULL, '2016-11-10 00:00:42', '2016-11-10 00:00:42');
INSERT INTO users VALUES('7', 'cleydedacorte@gmail.com', '$2y$10$GphqGZAlDn209KK2GQQBi.SCFtpFwZ0w1O98a3r/BHfiU/1GAGFD2', '24108548', 'V-24.108.548', 'Cleyde', 'Da Corte', 'cleydedacorte@gmail.com', '23', '04/09/1993', 'F', '(0412) 894-6565', 'Miami - EEUU', 'A', '3', 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-10 00:02:19', '2016-11-10 00:02:19');
INSERT INTO users VALUES('8', 'abdalisalvarado@gmail.com', '$2y$10$TyxWqyNJZJDM5cT1M.H8m.J0cG1pap2qYFOEBryUsLDwnIMrllubO', '20325889', 'V-20.325.897', 'Abdalis', 'Alvarado', 'abdalisalvarado@gmail.com', '25', '26/09/1991', 'F', '(0141) 297-4748', 'Argentina', 'A', '2', 'A', NULL, 'C', 'Abogado', '10/10/2005', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, '2016-11-10 00:04:13', '2016-11-10 00:04:13');
UNLOCK TABLES;



-- Respaldo de la Base de Datos Completo.