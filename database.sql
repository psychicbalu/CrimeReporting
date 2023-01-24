-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_cid
CREATE DATABASE IF NOT EXISTS `db_cid` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_cid`;

-- Dumping structure for table db_cid.tbl_accused
CREATE TABLE IF NOT EXISTS `tbl_accused` (
  `accused_id` int(11) NOT NULL AUTO_INCREMENT,
  `complaints_id` int(11) NOT NULL,
  `accused_name` varchar(50) NOT NULL,
  `accused_address` varchar(300) NOT NULL,
  `accused_email` varchar(100) NOT NULL,
  `accused_phno` varchar(20) NOT NULL,
  `accused_status` varchar(50) NOT NULL,
  PRIMARY KEY (`accused_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_accused: ~1 rows (approximately)
DELETE FROM `tbl_accused`;
INSERT INTO `tbl_accused` (`accused_id`, `complaints_id`, `accused_name`, `accused_address`, `accused_email`, `accused_phno`, `accused_status`) VALUES
	(70, 1, 'TEST', 'THIS IS A TEST Address', 'baluanil007@gmail.com', '9847358195', 'Active');

-- Dumping structure for table db_cid.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_admin: ~0 rows (approximately)
DELETE FROM `tbl_admin`;
INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
	(1, 'admin', 'Password1');

-- Dumping structure for table db_cid.tbl_awareness
CREATE TABLE IF NOT EXISTS `tbl_awareness` (
  `awareness_id` int(11) NOT NULL AUTO_INCREMENT,
  `awareness_title` varchar(200) NOT NULL,
  `awareness_description` varchar(500) NOT NULL,
  `awareness_file` varchar(300) NOT NULL,
  `awareness_date` varchar(20) NOT NULL,
  PRIMARY KEY (`awareness_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_awareness: ~1 rows (approximately)
DELETE FROM `tbl_awareness`;
INSERT INTO `tbl_awareness` (`awareness_id`, `awareness_title`, `awareness_description`, `awareness_file`, `awareness_date`) VALUES
	(3, 'LINKS', 'Dont click unwanted link ', 'login.1674155522.png', '2023-01-19');

-- Dumping structure for table db_cid.tbl_complaints
CREATE TABLE IF NOT EXISTS `tbl_complaints` (
  `complaints_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `station_reg_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_description` varchar(1000) NOT NULL,
  `complaint_proof` varchar(300) NOT NULL,
  `complaint_status` varchar(100) NOT NULL,
  `complaint_date` varchar(20) NOT NULL,
  PRIMARY KEY (`complaints_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_complaints: ~1 rows (approximately)
DELETE FROM `tbl_complaints`;
INSERT INTO `tbl_complaints` (`complaints_id`, `dist_id`, `station_reg_id`, `customer_id`, `complaint_title`, `complaint_description`, `complaint_proof`, `complaint_status`, `complaint_date`) VALUES
	(1, 8, 1, 4, 'TEST', 'THIS IS A TEST Description', 'CustomerId-4_360083.png', 'Pending', '2023-01-19');

-- Dumping structure for table db_cid.tbl_contact_msg
CREATE TABLE IF NOT EXISTS `tbl_contact_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_name` varchar(20) NOT NULL,
  `msg_phno` varchar(20) NOT NULL,
  `msg_email` varchar(100) NOT NULL,
  `msg_subject` varchar(200) NOT NULL,
  `msg_content` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_contact_msg: ~0 rows (approximately)
DELETE FROM `tbl_contact_msg`;

-- Dumping structure for table db_cid.tbl_customer_reg
CREATE TABLE IF NOT EXISTS `tbl_customer_reg` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_gender` varchar(20) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phno` varchar(20) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_password` varchar(30) NOT NULL,
  `customer_reg_date` varchar(20) NOT NULL,
  `dist_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_customer_reg: ~1 rows (approximately)
DELETE FROM `tbl_customer_reg`;
INSERT INTO `tbl_customer_reg` (`customer_id`, `customer_name`, `customer_gender`, `customer_address`, `customer_email`, `customer_phno`, `customer_username`, `customer_password`, `customer_reg_date`, `dist_id`) VALUES
	(1, 'RAMEEZ', 'Male', 'Manoli House,\r\nDesham PO,\r\nAluva', 'rameez@gmail.com', '9875642548', 'rameez', 'Password1', '2019-12-15', 8),
	(4, 'BALUANILKUMAR', 'Male', 'Baluanil007@gmail.com', 'baluanil007@gmail.com', '9847358195', 'psychicbalu', 'Psychicbalu123', '2022-10-05', 8);

-- Dumping structure for table db_cid.tbl_designation
CREATE TABLE IF NOT EXISTS `tbl_designation` (
  `des_id` int(11) NOT NULL AUTO_INCREMENT,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY (`des_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_designation: ~13 rows (approximately)
DELETE FROM `tbl_designation`;
INSERT INTO `tbl_designation` (`des_id`, `des_name`) VALUES
	(1, 'DGP'),
	(2, 'ADGP'),
	(3, 'IGP'),
	(4, 'DIGP'),
	(5, 'SP'),
	(6, 'ASP'),
	(7, 'ACP'),
	(9, 'POLICE INSPECTOR'),
	(10, 'ASSISTANT POLICE INSPECTOR'),
	(11, 'POLICE SUB INSPECTOR'),
	(12, 'ASSISTANT POLICE SUB INSPECTOR'),
	(13, 'HEAD CONSTABLE'),
	(14, 'POLICE CONSTABLE');

-- Dumping structure for table db_cid.tbl_district
CREATE TABLE IF NOT EXISTS `tbl_district` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_district: ~14 rows (approximately)
DELETE FROM `tbl_district`;
INSERT INTO `tbl_district` (`dist_id`, `dist_name`) VALUES
	(1, 'KASARAGOD'),
	(2, 'KANNUR'),
	(3, 'WAYANAD'),
	(4, 'KOZHIKODE'),
	(5, 'MALAPPURAM'),
	(6, 'PALAKKAD'),
	(7, 'THRISSUR'),
	(8, 'ERNAKULAM'),
	(9, 'IDUKKI'),
	(10, 'KOTTAYAM'),
	(11, 'ALAPPUZHA'),
	(12, 'PATHANAMTHITTA'),
	(13, 'KOLLAM'),
	(14, 'THIRUVANANTHAPURAM');

-- Dumping structure for table db_cid.tbl_notification
CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `n_title` varchar(30) NOT NULL,
  `n_des` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_notification: ~1 rows (approximately)
DELETE FROM `tbl_notification`;
INSERT INTO `tbl_notification` (`nid`, `customer_id`, `n_title`, `n_des`, `status`) VALUES
	(1, 1, 'Welcome', 'RAMEEZ Welcome to Crime Investigation Department.', '0'),
	(2, 4, 'Welcome', 'BALUANILKUMAR Welcome to Crime Investigation Department.', '0'),
	(3, 4, 'Complaint Posted', 'Your Complaint TEST... dated on 2023-01-19 was Successfully Posted', '0');

-- Dumping structure for table db_cid.tbl_officer_reg
CREATE TABLE IF NOT EXISTS `tbl_officer_reg` (
  `officer_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `officer_name` varchar(50) NOT NULL,
  `officer_address` varchar(300) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `officer_email` varchar(100) NOT NULL,
  `officer_phno` varchar(20) NOT NULL,
  `station_reg_id` int(11) NOT NULL,
  `des_id` int(11) NOT NULL,
  PRIMARY KEY (`officer_reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_officer_reg: ~2 rows (approximately)
DELETE FROM `tbl_officer_reg`;
INSERT INTO `tbl_officer_reg` (`officer_reg_id`, `officer_name`, `officer_address`, `dist_id`, `officer_email`, `officer_phno`, `station_reg_id`, `des_id`) VALUES
	(1, 'BIJU POULOSE', 'Abcd House,\r\nAluva PO\r\nErnakulam', 8, 'cidbiju@gmail.com', '9985467895', 1, 11),
	(2, 'SHAJI KA', 'Abcd House ,\r\nPerumbavoor PO,\r\nErnakulam', 8, 'cidshaji@gmail.com', '9874563214', 1, 12);

-- Dumping structure for table db_cid.tbl_rating
CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `station_reg_id` int(11) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_rating: ~0 rows (approximately)
DELETE FROM `tbl_rating`;
INSERT INTO `tbl_rating` (`rating_id`, `customer_id`, `station_reg_id`, `rating`, `feedback`) VALUES
	(1, 1, 1, '4', 'Quick Responce');

-- Dumping structure for table db_cid.tbl_station_reg
CREATE TABLE IF NOT EXISTS `tbl_station_reg` (
  `station_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` varchar(100) NOT NULL,
  `station_address` varchar(300) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `station_email` varchar(100) NOT NULL,
  `station_phno` varchar(20) NOT NULL,
  `station_website` varchar(50) NOT NULL,
  `station_username` varchar(50) NOT NULL,
  `station_password` varchar(30) NOT NULL,
  `station_proof` varchar(500) NOT NULL,
  `station_reg_date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`station_reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_cid.tbl_station_reg: ~2 rows (approximately)
DELETE FROM `tbl_station_reg`;
INSERT INTO `tbl_station_reg` (`station_reg_id`, `station_name`, `station_address`, `dist_id`, `station_email`, `station_phno`, `station_website`, `station_username`, `station_password`, `station_proof`, `station_reg_date`, `status`) VALUES
	(1, 'ALUVA', 'Aluva, Ernakulam\r\nKerala', 8, 'stationaluva@gmail.com', '9756248654', 'http://Stationaluva.com', 'aluva', 'Password1', 'StationName-aluva_469563.png', '2019-12-15', '1'),
	(2, 'WAYANAD', 'This Is A Test Address', 3, 'wayanad@gmail.com', '9847358195', 'www.WAYANAD.com', 'wayanad', 'Wayanad@123', '', '2023-01-19', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
