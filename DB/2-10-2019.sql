-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2019 at 07:56 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_accused`
--

INSERT INTO `tbl_accused` (`accused_id`, `complaints_id`, `accused_name`, `accused_address`, `accused_email`, `accused_phno`, `accused_status`) VALUES
(1, 34, 'dxvxcg', 'xvxcv', 'sdlihfsuild', 'ihzsduilg', 'Active'),
(2, 35, 'dxg', 'dfxgcfxg', 'fchgf', 'xg', 'Active'),
(3, 36, 'dxg', 'dfxgcfxg', 'fchgf', 'xg', 'Active'),
(4, 38, 'rameez', 'aluva', 'ra@gmail.com', '1234567890', 'Active'),
(5, 39, 'rameez13', 'aluva1', 'rameez@gmail.com', '1234567890', 'Active'),
(6, 40, 'yoonu123', 'panchayathroad123', 'yk123@gmail.com', '2312310000', 'Active'),
(7, 41, 'aps123', 'address', '123@gmail.com', '1232423', 'Active'),
(8, 42, 'dgfh', 'sdgdf', 'dfgf', 'sdgdf', 'Active'),
(9, 43, 'rasdsdf', 'sdg', 'sdfdf', '124345', 'Active'),
(10, 44, 'rasdsdf', 'sdg', 'sdfdf', '124345', 'Active'),
(11, 44, 'rasdsdf', 'sdg', 'sdfdf', '124345', 'Active'),
(12, 45, 'kgxjkhg', '', '', '', 'Active'),
(13, 46, 'xc', 'zcx', 'xzc@gmail.com', '12123234', 'Active'),
(14, 47, 'xc', 'zcx', 'xzc@gmail.com', '12123234', 'Active'),
(15, 48, 'zX', 'zX', 'xzc@gmail.com', '12123234', 'Active');

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
(1, 'admin', 'ad');

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
(1, 'xxdvd', 'dv', '3.jpg', '2019-10-02');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaints_id`, `dist_id`, `station_reg_id`, `customer_id`, `complaint_title`, `complaint_description`, `complaint_proof`, `complaint_status`, `complaint_date`) VALUES
(44, 6, 6, 4, 'abcd123', 'asfdfg', '227391_Ring-1.jpg', 'On Going', '2019-08-30'),
(46, 0, 6, 0, '', '', '', 'Pending', '2019-09-23'),
(47, 0, 6, 0, '', '', '', 'Pending', '2019-09-23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_contact_msg`
--

INSERT INTO `tbl_contact_msg` (`msg_id`, `msg_name`, `msg_phno`, `msg_email`, `msg_subject`, `msg_content`) VALUES
(1, 'c ', '12', 'zx@gmail.com', 'sxd', 'as'),
(2, 'xzc', '12313', 'zx@gmail.com', 'ds', 'dzv');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_customer_reg`
--

INSERT INTO `tbl_customer_reg` (`customer_id`, `customer_name`, `customer_gender`, `customer_address`, `customer_email`, `customer_phno`, `customer_username`, `customer_password`, `customer_reg_date`, `dist_id`) VALUES
(1, 'yoonas', '', 'yk farmhouse', 'yk@gmail.com', '0097564452', 'yunas kollamkudy', 'yoonas', '2019-07-18', 11),
(2, 'yoonas', '', 'yk farmhouse', 'yk@gmail.com', '0097564452', 'yunas kollamkudy', 'yoonas', '2019-07-18', 11),
(3, 'htrythukuit', 'Male', 'uytuyuirtui8y\r\nuktjy\r\nkyutrf', 'yfyt', 'mhjkg', 'yryryr6y6r', 'ghfhfh', '2019-07-18', 8),
(4, 'test', 'Male', 'abcdefg', 'test@gmail.com', '1234567890', 'test123', '123456', '2019-08-01', 10),
(5, 'sdfd', 'Female', 'dszf', 'letinshajohnson@gmail.com', '23234', '', 'asd', '2019-09-26', 8),
(6, 'sdfd', 'Female', 'dszf', 'letinshajohnson@gmail.com', '23234', 'asd', 'asd', '2019-09-26', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `des_id` int(11) NOT NULL auto_increment,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`des_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`des_id`, `des_name`) VALUES
(1, 'constable'),
(3, 'SI'),
(4, 'ci'),
(5, ''),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `dist_id` int(11) NOT NULL auto_increment,
  `dist_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`dist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dist_id`, `dist_name`) VALUES
(6, 'IDUKKI'),
(8, 'KASARGOD'),
(9, 'KOLLAM'),
(10, 'KOTTAYAM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_officer_reg`
--

INSERT INTO `tbl_officer_reg` (`officer_reg_id`, `officer_name`, `officer_address`, `dist_id`, `officer_email`, `officer_phno`, `station_reg_id`, `des_id`) VALUES
(1, 'aaaa', 'khuilkg', 9, 'iuiug', 'ilh;ioh', 0, 1),
(2, 'abcd', 'dgdfg', 9, 'sffh', 'dfgfgh', 0, 1),
(3, 'abcd', 'sfcsd', 9, 'sfsd', 'sdgdfv', 2, 1),
(4, 'aps', 'abcddgh', 6, 'aps', '4535435', 3, 3),
(5, 'abcd', 'df', 6, '', '', 3, 1),
(6, 'hgf', '', 6, '', '', 3, 1),
(7, 'baiju', 'dxsdvdfv', 6, 'fdbvcbf', 'bcvbgcb', 4, 3),
(8, 'fdcbcxv', 'fbcgvn', 6, 'gfnhv', 'gjhvm', 4, 3),
(9, 'hbmbnm', 'vncmbv', 6, 'bnmbnm', 'vnbm', 4, 3);

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
(1, 6, 6, '3', 'dfvdxf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_station_reg`
--

INSERT INTO `tbl_station_reg` (`station_reg_id`, `station_name`, `station_address`, `dist_id`, `station_email`, `station_phno`, `station_website`, `station_username`, `station_password`, `station_proof`, `station_reg_date`, `status`) VALUES
(3, 'abcd12', 'perumbavoor12', 6, 'letinshajohnson@gmail.com', '123456', 'abcd123.com', 'abcd1234', '123456', '227394_Music-2.jpg', '2019-08-22', '1'),
(4, 'Perumbavoor', 'abcd@ 123', 6, 'abc', '1234567', 'adsfghg', 'station222', '123456', '239878_Fashion Men-10.jpg', '2019-09-19', '1'),
(5, 'abcd', 'rt', 10, 'hfg', 'h', 'ytf', 'tyf', 'uy', '', '2019-09-22', '1'),
(6, 'DCzsdf', 'cvv', 8, 'zx@gmail.com', '23234', 'dfv', 'asd123', 'asd', '', '2019-09-26', '1');
