-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 09:13 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(55) NOT NULL,
  `ct_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`, `name`, `ct_date`) VALUES
(1, 'varun', 'varunraj@123', 'Varun Raj', '2014-07-06 05:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `exam_event`
--

CREATE TABLE IF NOT EXISTS `exam_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person1` varchar(50) NOT NULL,
  `person2` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tot_pts` int(11) NOT NULL,
  `tot_ans` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_event`
--

CREATE TABLE IF NOT EXISTS `quiz_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `program` text NOT NULL,
  `op1` varchar(50) NOT NULL,
  `op2` varchar(50) NOT NULL,
  `op3` varchar(50) NOT NULL,
  `op4` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL,
  `pts` int(11) NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_by` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `quiz_event`
--

INSERT INTO `quiz_event` (`id`, `question`, `program`, `op1`, `op2`, `op3`, `op4`, `ans`, `pts`, `modify_time`, `modify_by`) VALUES
(37, ' Smaller page tables are implemented as a set of _______.', '', 'queues', 'stacks', ' counters', ' registers', '4', 10, '2014-08-11 06:37:37', 0),
(38, 'A file control block contains the information about', '', ' file ownership', 'file permissions', 'location of file contents', ' all of the mentioned', '4', 10, '2014-08-11 06:38:44', 0),
(39, 'Which protocol establishes the initial logical connection between a server and a client?', '', ' transmission control protocol', 'user datagram protocol', 'mount protocol', 'datagram congestion control protocol', '3', 10, '2014-08-11 06:39:49', 0),
(40, ' The request and release of resources are ___________.', '', 'command line statements', ' interrupts', 'system calls', ' special programs', '3', 10, '2014-08-11 06:41:06', 0),
(41, 'If the sum of the working ? set sizes increases, exceeding the total number of available frames', '', 'then the process crashes', 'the memory overflows', 'the system crashes', ' the operating system selects a process to suspend', '4', 10, '2014-08-13 05:43:12', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
