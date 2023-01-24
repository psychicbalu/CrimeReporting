-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2019 at 04:24 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accused`
--

CREATE TABLE `tbl_accused` (
  `accused_id` int(11) NOT NULL auto_increment,
  `complaints_id` int(11) NOT NULL,
  `accused_name` varchar(50) NOT NULL,
  `accused_address` varchar(300) NOT NULL,
  `accused_email` varchar(100) NOT NULL,
  `accused_phno` varchar(20) NOT NULL,
  `accused_status` varchar(50) NOT NULL,
  PRIMARY KEY  (`accused_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `tbl_accused`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'Password1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_awareness`
--

CREATE TABLE `tbl_awareness` (
  `awareness_id` int(11) NOT NULL auto_increment,
  `awareness_title` varchar(200) NOT NULL,
  `awareness_description` varchar(500) NOT NULL,
  `awareness_file` varchar(300) NOT NULL,
  `awareness_date` varchar(20) NOT NULL,
  PRIMARY KEY  (`awareness_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_awareness`
--

INSERT INTO `tbl_awareness` (`awareness_id`, `awareness_title`, `awareness_description`, `awareness_file`, `awareness_date`) VALUES
(1, 'SECURITY', 'When you create a password,use a strong Password.', 'Screenshot (51).png', '2019-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `complaints_id` int(11) NOT NULL auto_increment,
  `dist_id` int(11) NOT NULL,
  `station_reg_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_description` varchar(1000) NOT NULL,
  `complaint_proof` varchar(300) NOT NULL,
  `complaint_status` varchar(100) NOT NULL,
  `complaint_date` varchar(20) NOT NULL,
  PRIMARY KEY  (`complaints_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_complaints`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_msg`
--

CREATE TABLE `tbl_contact_msg` (
  `msg_id` int(11) NOT NULL auto_increment,
  `msg_name` varchar(20) NOT NULL,
  `msg_phno` varchar(20) NOT NULL,
  `msg_email` varchar(100) NOT NULL,
  `msg_subject` varchar(200) NOT NULL,
  `msg_content` varchar(1000) NOT NULL,
  PRIMARY KEY  (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_contact_msg`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_reg`
--

CREATE TABLE `tbl_customer_reg` (
  `customer_id` int(11) NOT NULL auto_increment,
  `customer_name` varchar(50) NOT NULL,
  `customer_gender` varchar(20) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phno` varchar(20) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `customer_password` varchar(30) NOT NULL,
  `customer_reg_date` varchar(20) NOT NULL,
  `dist_id` int(11) NOT NULL,
  PRIMARY KEY  (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_customer_reg`
--

INSERT INTO `tbl_customer_reg` (`customer_id`, `customer_name`, `customer_gender`, `customer_address`, `customer_email`, `customer_phno`, `customer_username`, `customer_password`, `customer_reg_date`, `dist_id`) VALUES
(1, 'RAMEEZ', 'Male', 'Manoli House,\r\nDesham PO,\r\nAluva', 'rameez@gmail.com', '9875642548', 'rameez', 'Password1', '2019-12-15', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `des_id` int(11) NOT NULL auto_increment,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`des_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_designation`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `dist_id` int(11) NOT NULL auto_increment,
  `dist_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`dist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_district`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `nid` int(11) NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `n_title` varchar(30) NOT NULL,
  `n_des` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY  (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`nid`, `customer_id`, `n_title`, `n_des`, `status`) VALUES
(1, 1, 'Welcome', 'RAMEEZ Welcome to Crime Investigation Department.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officer_reg`
--

CREATE TABLE `tbl_officer_reg` (
  `officer_reg_id` int(11) NOT NULL auto_increment,
  `officer_name` varchar(50) NOT NULL,
  `officer_address` varchar(300) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `officer_email` varchar(100) NOT NULL,
  `officer_phno` varchar(20) NOT NULL,
  `station_reg_id` int(11) NOT NULL,
  `des_id` int(11) NOT NULL,
  PRIMARY KEY  (`officer_reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_officer_reg`
--

INSERT INTO `tbl_officer_reg` (`officer_reg_id`, `officer_name`, `officer_address`, `dist_id`, `officer_email`, `officer_phno`, `station_reg_id`, `des_id`) VALUES
(1, 'BIJU POULOSE', 'Abcd House,\r\nAluva PO\r\nErnakulam', 8, 'cidbiju@gmail.com', '9985467895', 1, 11),
(2, 'SHAJI KA', 'Abcd House ,\r\nPerumbavoor PO,\r\nErnakulam', 8, 'cidshaji@gmail.com', '9874563214', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `station_reg_id` int(11) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  PRIMARY KEY  (`rating_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `customer_id`, `station_reg_id`, `rating`, `feedback`) VALUES
(1, 1, 1, '4', 'Quick Responce');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_station_reg`
--

CREATE TABLE `tbl_station_reg` (
  `station_reg_id` int(11) NOT NULL auto_increment,
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
  PRIMARY KEY  (`station_reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_station_reg`
--

INSERT INTO `tbl_station_reg` (`station_reg_id`, `station_name`, `station_address`, `dist_id`, `station_email`, `station_phno`, `station_website`, `station_username`, `station_password`, `station_proof`, `station_reg_date`, `status`) VALUES
(1, 'ALUVA', 'Aluva, Ernakulam\r\nKerala', 8, 'cidaluva@gmail.com', '9756248654', 'http://Stationaluva.com', 'aluva', 'Password1', 'StationName-aluva_469563.png', '2019-12-15', '1');
