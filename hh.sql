-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2011 at 12:34 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hh`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `name`) VALUES
(1, 'Admin'),
(2, 'Support Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE IF NOT EXISTS `group_permission` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `group_id` int(6) NOT NULL,
  `permission_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `group_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permission_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(6) NOT NULL,
  `created_date` int(20) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ticket`
--


-- --------------------------------------------------------

--
-- Table structure for table `ticket_reply`
--

CREATE TABLE IF NOT EXISTS `ticket_reply` (
  `ticket_reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `comment` text NOT NULL,
  `created_date` int(25) NOT NULL,
  PRIMARY KEY (`ticket_reply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ticket_reply`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `display_name` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` int(20) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `online_time` int(20) NOT NULL,
  `date_registered` int(20) NOT NULL,
  `habbo_name` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `verify_key` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE IF NOT EXISTS `user_permission` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `permission_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_permission`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
