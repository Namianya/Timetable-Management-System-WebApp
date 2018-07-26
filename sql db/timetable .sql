-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2015 at 02:57 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE IF NOT EXISTS `allocation` (
  `Room` varchar(10) NOT NULL,
  `Day` char(15) NOT NULL,
  `Time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`Room`, `Day`, `Time`) VALUES
('OH 14', 'monday', '8am-11am'),
('OH 14', 'monday', '11am-2pm'),
('OH 14', 'monday', '2pm-5pm'),
('OH 14', 'tuesday', '2pm-5pm'),
('OH 14', 'tuesday', '11am-2pm'),
('OH 14', 'Wednesday', '8am-11am'),
('OH 14', 'Wednesday', '11am-2pm'),
('Oh 14', 'wednesday', '2pm-5pm'),
('Oh 14', 'tuesday', '8am-11am'),
('Oh 11', 'tuesday', '2pm-5pm'),
('Oh 11', 'monday', '2pm-5pm'),
('TH LAB A', 'monday', '8am-11am'),
('TH LAB A', 'monday', '11am-2pm'),
('TH LAB A', 'monday', '2pm-5pm'),
('TH LAB A', 'tuesday', '2pm-5pm'),
('TH LAB A', 'tuesday', '11am-2pm'),
('TH LAB A', 'tuesday', '8am-11am'),
('TH LAB A', 'wednesday', '8am-11am'),
('TH LAB A', 'wednesday', '11am-2pm'),
('TH LAB A', 'wednesday', '2pm-5pm');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `telno` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`number`, `name`, `telno`, `email`) VALUES
(1, 'Mr Kioko', 725695782, 'kioko@cuea.edu'),
(2, 'Mr Kamau', 722461062, 'kamau@cuea.edu'),
(3, 'Mr Mirugi', 727799352, 'wmirugi@cuea.edu ');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `Query` varchar(100) NOT NULL,
  `subject` char(15) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`Query`, `subject`, `sender`, `id`) VALUES
('please add cmt 200 Semi-conductor theory to the timetable.', 'Unit Allocation', 'lec1', 9),
('Students taking Cmt 109 Database systems are requesting for offering of Cmt 302 Adnance database sys', 'Other', 'lec2', 10),
('please reallocate cmt 200', 'Unit ReAllocati', 'lec2', 11);

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE IF NOT EXISTS `table` (
  `unit` varchar(40) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL,
  `lecturer` varchar(40) NOT NULL,
  PRIMARY KEY (`unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temptable`
--

CREATE TABLE IF NOT EXISTS `temptable` (
  `code` varchar(20) NOT NULL,
  `unit` varchar(40) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL,
  `lecturer` varchar(40) NOT NULL,
  `ID` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temptable`
--

INSERT INTO `temptable` (`code`, `unit`, `day`, `time`, `room`, `lecturer`, `ID`) VALUES
('CMT 100', 'Physics For Computer Science I', 'monday', '11am-2pm', 'Oh 11', 'Mr Musyoki', 2),
('CMT 102', 'Fundamentals Of Computing', 'monday', '8am-11am', 'Oh 11', 'Mr Kioko', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL,
  `hint` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `secondname` varchar(30) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`number`, `username`, `password`, `id`, `hint`, `firstname`, `secondname`) VALUES
(7, 'admin1', 'oliver', 'administrator', 'law', 'alex', 'kamau'),
(8, 'lec1', 'limo', 'lecturer', 'manyasi', 'lameck', 'akida'),
(9, '1019741', 'tuwai', 'student', 'kiptoo', 'oliver', 'limo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
