-- phpMyAdmin SQL Dump
-- version 3.3.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2011 at 05:48 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `direct_image_upload`
--

CREATE TABLE IF NOT EXISTS `direct_image_upload` (
  `direct_image_upload_id` int(10) NOT NULL auto_increment,
  `segment` varchar(50) NOT NULL,
  `product_table` varchar(50) NOT NULL,
  `product_table_column` varchar(50) NOT NULL,
  `product_master_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `source_path` text NOT NULL,
  `source_file_name` text NOT NULL,
  `destination_path` text NOT NULL,
  `destination_file_name` text NOT NULL,
  `image_sizes` varchar(255) NOT NULL,
  `created_by` int(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `modify_by` int(1) NOT NULL,
  `modify_on` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `is_active` int(1) NOT NULL default '0',
  `is_delete` int(1) NOT NULL default '0',
  PRIMARY KEY  (`direct_image_upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `direct_image_upload`
--

