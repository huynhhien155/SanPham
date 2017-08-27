-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2017 at 12:19 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `poi_id` int(11) NOT NULL,
  `poi_name` varchar(25) NOT NULL,
  `joining_date` datetime NOT NULL,
  `poi_lat` varchar(20) NOT NULL,
  `poi_kana` varchar(25) NOT NULL,
  `poi_lon` varchar(25) NOT NULL,
  `icon_lat` varchar(25) NOT NULL,
  `icon_lon` varchar(25) NOT NULL,
  `group_id` varchar(25) NOT NULL,
  `point_type` varchar(25) NOT NULL,
  `icon_type` varchar(25) NOT NULL,
  `next_voice_id` varchar(25) NOT NULL,
  `voice_id` varchar(25) NOT NULL,
  `admin_id` varchar(25) NOT NULL,
  `ev_flag` varchar(25) NOT NULL,
  `tourist_detail` varchar(25) NOT NULL,
  `business_hours` varchar(25) NOT NULL,
  `parking` varchar(25) NOT NULL,
  `closing_day` varchar(25) NOT NULL,
  `pay` varchar(25) NOT NULL,
  `credit_card` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`poi_id`, `poi_name`, `joining_date`, `poi_lat`, `poi_kana`, `poi_lon`, `icon_lat`, `icon_lon`, `group_id`, `point_type`, `icon_type`, `next_voice_id`, `voice_id`, `admin_id`, `ev_flag`, `tourist_detail`, `business_hours`, `parking`, `closing_day`, `pay`, `credit_card`) VALUES
(10, 'hien79', '2017-08-23 11:44:25', '$2y$11$W7TTxY0Jr3fAn', 'hien2', 'hien4', 'hien5', 'hien6', 'G1', 'ccc', '', 'hien7', 'hien8', 'ccc', 'No', '', '', '', '', '', ''),
(11, 'ttdggd', '2017-08-23 11:45:21', '$2y$11$9ibzeyp07LYlH', 'dgdsgdg', 'sdsdsd', 'sdsdg', 'sdggsdg', 'G1', 'ccc', '', 'gddsggd', 'dgdgsdg', 'ccc', 'No', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`poi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `poi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
