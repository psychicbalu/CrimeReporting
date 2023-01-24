-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2019 at 03:34 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

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
(13, 46, 'xc', 'zcx', 'xzc@gmail.com', '12123234', 'Active'),
(14, 47, 'xc', 'zcx', 'xzc@gmail.com', '12123234', 'Active'),
(15, 48, 'zX', 'zX', 'xzc@gmail.com', '12123234', 'Active'),
(16, 49, 'gokul', 'vayanadu', 'gokul@gmail.com', '1234567890', 'Active'),
(17, 50, 'dgfgdf', 'z', 'dcDSsd@gmail.com', '1234567890', 'Active'),
(18, 51, 'aaa', 'aas', 'fyd@gmail.com', '1234567890', 'Active'),
(19, 52, 'tfgh', 'ghjk', 'dcDSsd@gmail.com', '1111111111', 'Active'),
(32, 65, 'szxcsc', 'zxczcxzxz', 'scsxcds@gmail.com', '3224234234', 'Active'),
(33, 66, 'erjhgjh', 'yuygggkjkjkl', 'abcd@gmail.com', '1234567890', 'Active'),
(34, 67, 'erjhgjh', 'yuygggkjkjkl', 'abcd@gmail.com', '1234567890', 'Active'),
(35, 68, 'dgnfgmhgg', 'dfnghgfhfghgn', 'gokul@gmail.com', '3224234234', 'Active'),
(36, 69, 'ghgvh', '', '', '', 'Active'),
(53, 86, 'JOKER', 'Jocker House Abcd123', 'joker@gmail.com', '1111111111', 'Active'),
(54, 87, '', '', '', '', 'Active'),
(55, 88, '', '', '', '', 'Active'),
(56, 89, '', '', '', '', 'Active'),
(57, 90, 'FGFH', 'Fghgfhgh Gfgfh Fgfhg', '', '', 'Active'),
(58, 91, 'AVOO', 'Fdhgjj Cvg Hghj\r\nYjyik ', '', '', 'Active'),
(59, 91, '', '', '', '', 'Active'),
(60, 92, '', '', '', '', 'Active'),
(61, 93, 'ETHO ORUVAN', 'Abcd\r\nPerumbavoor\r\nAngamaly', 'fyd@gmail.com', '1234567890', 'Active'),
(64, 96, '', '', '', '', 'Active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_awareness`
--

INSERT INTO `tbl_awareness` (`awareness_id`, `awareness_title`, `awareness_description`, `awareness_file`, `awareness_date`) VALUES
(1, 'xxdvd', 'dv', '3.jpg', '2019-10-02'),
(3, 'aps', 'most wanted criminal', 'wolf_minimalism_art_vector_115878_3840x2160.jpg', '2019-10-03'),
(4, 'com', 'etdrfh', 'file.png', '2019-11-12'),
(7, 'UFDJGUFHHF', 'Hgccccccccccccccccc', '', '2019-11-12');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaints_id`, `dist_id`, `station_reg_id`, `customer_id`, `complaint_title`, `complaint_description`, `complaint_proof`, `complaint_status`, `complaint_date`) VALUES
(50, 6, 9, 7, 'cz', 'zxczxc', 'pic1.jpg', 'Rejected', '2019-10-03'),
(51, 6, 9, 7, 'absd', 'estdu', '30906.jpg', 'Completed', '2019-10-14'),
(52, 6, 9, 8, 'seasdrfghj', 'retyghj', '30906.jpg', 'Completed', '2019-10-15'),
(66, 6, 9, 7, 'fdfy', 'thutyiiuyuoiouip\r\nyuiuo 877 .,', 'wolf_minimalism_art_vector_115878_3840x2160.jpg', 'On Going', '2019-10-17'),
(67, 6, 9, 7, 'fdfy', 'thutyiiuyuoiouip\r\nyuiuo 877 .,', 'wolf_minimalism_art_vector_115878_3840x2160.jpg', 'Rejected', '2019-10-17'),
(83, 6, 9, 7, 'sizetest', 'dfgfhgfjghjghk', 'CustomerId-7_897054.jpg', 'Completed', '2019-10-17'),
(84, 6, 9, 7, 'FGFH', 'Deeeeeeeescrip', 'CustomerId-7_538492.png', 'Rejected', '2019-10-17'),
(85, 6, 9, 7, 'vvvvvvvvv', 'erfgdfgsdfdg', 'CustomerId-7_710422.mp4', 'Pending', '2019-10-17'),
(86, 6, 9, 7, 'AYYYYO', 'Enne kollan nokkunne', 'CustomerId-7_914740.pdf', 'Pending', '2019-10-19'),
(89, 6, 9, 7, 'UNLINK TEST', 'Check test unlink', 'CustomerId-7_168918.png', 'Pending', '2019-10-21'),
(91, 6, 9, 7, 'NO PROOF', 'Fhghb, fgjghkh ', '', 'Pending', '2019-10-23'),
(92, 6, 9, 7, 'MY COMPLAINT', 'Just for complgfhf', 'CustomerId-7_650390.png', 'Pending', '2019-11-03'),
(93, 6, 9, 7, 'SOMEONE TRY TO FOLLOW ME', 'Respected dir iahdsh jkhdskh jdbjhkjk hdh jdjjs jsjdjjd jhdjhjsd jhdj. auiem nee poda nee poda pattilla... njan pokilla nee aara enna ninte vicharam nee poda potta enikku pokan patttilaa. nee poda marangoda. this is a case abot follw. someone is ty to follow me please help me afer some times i have no idea about who am i,, please help me', 'CustomerId-7_703993.png', 'Pending', '2019-11-09'),
(96, 11, 11, 7, 'PENDING TEST', 'Dgfghgfhghghgggg', 'CustomerId-7_888753.png', 'Pending', '2019-11-14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_contact_msg`
--

INSERT INTO `tbl_contact_msg` (`msg_id`, `msg_name`, `msg_phno`, `msg_email`, `msg_subject`, `msg_content`) VALUES
(1, 'c ', '12', 'zx@gmail.com', 'sxd', 'as'),
(2, 'xzc', '12313', 'zx@gmail.com', 'ds', 'dzv'),
(3, '', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_customer_reg`
--

INSERT INTO `tbl_customer_reg` (`customer_id`, `customer_name`, `customer_gender`, `customer_address`, `customer_email`, `customer_phno`, `customer_username`, `customer_password`, `customer_reg_date`, `dist_id`) VALUES
(7, 'RAMEEZ', 'Male', 'Aluvaa', 'rameez@gmail.com', '1234567890', 'rameez', 'Password1', '2019-10-03', 6),
(8, 'abcd', 'Male', 'ytytf', 'ab@gmail.com', 'fghnbn', 'abcd', '12345', '2019-10-15', 11),
(10, 'USER', 'Female', 'User House\r\nPerumbavoor\r\nErnakulam', 'user@g.com', '1234567890', 'user123', 'Password1', '2019-11-14', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `des_id` int(11) NOT NULL auto_increment,
  `des_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`des_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`des_id`, `des_name`) VALUES
(1, 'constable'),
(3, 'SI'),
(7, 'sub si'),
(8, 'CI'),
(9, 'BD'),
(13, 'BB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `dist_id` int(11) NOT NULL auto_increment,
  `dist_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`dist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dist_id`, `dist_name`) VALUES
(6, 'IDUKKI'),
(8, 'KASARGOD'),
(10, 'KOTTAYAM'),
(11, 'ERNAKULAM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_officer_reg`
--

INSERT INTO `tbl_officer_reg` (`officer_reg_id`, `officer_name`, `officer_address`, `dist_id`, `officer_email`, `officer_phno`, `station_reg_id`, `des_id`) VALUES
(4, 'aps', 'abcddgh', 11, 'aps', '4535435', 11, 3),
(7, 'baiju', 'dxsdvdfv', 6, 'fdbvcbf', 'bcvbgcb', 9, 7),
(12, 'rameez', 'ertyy', 6, 'jkl@gmail.com', '1111111111', 9, 3),
(13, 'asssa', 'asa', 6, 'rameez@gmail.com', '4567891230', 9, 1),
(14, 'itsme', 'sadsa', 6, 'fg', 'rgfdgf', 9, 1),
(20, 'CHEGU ITTALY', 'Ghgdhgc\r\nHjffhfhf 88', 6, 'che12332112@gmail.com', '1233211288', 9, 4),
(24, 'VBVNVBM', 'Xgfhgnhfhfghfghhg', 6, 'rameez@gmail.com', '1111111111', 9, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `customer_id`, `station_reg_id`, `rating`, `feedback`) VALUES
(17, 7, 10, '4', 'peru good'),
(18, 7, 9, '4', 'goooood');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_station_reg`
--

INSERT INTO `tbl_station_reg` (`station_reg_id`, `station_name`, `station_address`, `dist_id`, `station_email`, `station_phno`, `station_website`, `station_username`, `station_password`, `station_proof`, `station_reg_date`, `status`) VALUES
(9, 'ALUVA', 'Aluva Perumbavoor', 6, 'aluva@gmail.com', '1234567890', 'http://www.abc.com', 'aluva', 'Password1', 'StationRegId-9_428737.png', '2019-10-03', '1'),
(11, 'ANGAMALY', 'Angamaly P O\r\nAngamaly,\r\nErnakulam', 11, 'cidangamaly@gmail.com', '1111111111', '', 'angamaly', 'Password1', 'StationName-angamaly_974446.png', '2019-11-14', '1');
