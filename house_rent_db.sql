-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 09:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flat`
--

CREATE TABLE `tbl_flat` (
  `id` int(11) NOT NULL,
  `flat_name` varchar(20) NOT NULL,
  `owner_username` varchar(20) NOT NULL,
  `location_details` varchar(100) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `flat_type` varchar(20) NOT NULL,
  `masterbed` int(11) NOT NULL,
  `bed` int(11) NOT NULL,
  `balcony` int(11) NOT NULL,
  `washroom` int(11) NOT NULL,
  `flat_details` varchar(200) DEFAULT NULL,
  `flat_price` int(11) NOT NULL,
  `isPublished` int(11) NOT NULL,
  `available_from` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_flat`
--

INSERT INTO `tbl_flat` (`id`, `flat_name`, `owner_username`, `location_details`, `location_id`, `flat_type`, `masterbed`, `bed`, `balcony`, `washroom`, `flat_details`, `flat_price`, `isPublished`, `available_from`, `created_at`, `updated_at`) VALUES
(1, 'F121', 'shovon', NULL, 2, 'Family', 1, 3, 2, 2, NULL, 20000, 1, '07-November-2016', '2016-11-04 12:12:42', '2016-11-05 07:29:04'),
(2, 'aaaaaaaa', 'shovon', 'aaaaaaaaaaaaaaa', 1, 'Family', 2, 2, 1, 0, 'aaaaaaaa', 1111111111, 1, '30-November-2016', '2016-11-04 12:17:48', '2016-11-05 07:18:10'),
(3, 'F121', 'shovon', 'aaaaaaaaaaaaaaa', 2, 'Family', 0, 0, 0, 0, 'aaaaaaaa', 1234, 1, '27-November-2016', '2016-11-04 12:26:15', '2016-11-05 07:18:04'),
(4, 'F1212', 'shovon', 'aaaaaaaaaaaaaaa', 2, 'Bechelor', 0, 0, 0, 0, 'aaaaaaaa', 1234, 1, '28-November-2016', '2016-11-04 12:29:12', '2016-11-05 07:17:57'),
(5, 'F12100', 'shovon', 'sssssss', 1, 'Family', 0, 3, 0, 0, 'aaaaaaaa', 100, 1, '06-November-2016', '2016-11-04 15:18:59', '2016-11-05 07:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2016-11-03 07:11:33', '2016-11-03 07:11:33'),
(2, 'Chittagong', '2016-11-03 07:11:33', '2016-11-03 07:11:33'),
(3, 'Rajshahi', '2016-11-03 07:15:48', '2016-11-03 07:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '0',
  `email` varchar(40) NOT NULL,
  `mobile` int(20) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_owner`
--

INSERT INTO `tbl_owner` (`id`, `username`, `password`, `user_role`, `email`, `mobile`, `createdat`, `updatedat`) VALUES
(1, 'shovon', '123456', 0, 'ash@f.com', 1675954877, '2016-11-03 18:39:27', '2016-11-03 18:39:27'),
(2, 'shovon1', '123456', 0, 'ash@f.com', 1675954877, '2016-11-03 18:44:32', '2016-11-03 18:44:32'),
(3, 'asif', '123456', 0, 'ash@f.com', 165, '2016-11-03 18:49:07', '2016-11-03 18:49:07'),
(4, 'asif2', '123456', 0, 'ash@f.com', 54564, '2016-11-03 18:50:17', '2016-11-03 18:50:17'),
(5, 'aaaaa', '12345', 0, 'asadsa@ga.ca', 16, '2016-11-04 06:00:12', '2016-11-04 06:00:12'),
(6, 'admin', 'admin', 1, 'abc@admin.com', 1675, '2016-11-04 09:54:38', '2016-11-04 09:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `total_view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sublocation`
--

CREATE TABLE `tbl_sublocation` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `sublocation` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sublocation`
--

INSERT INTO `tbl_sublocation` (`id`, `location_id`, `sublocation`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mirpur', '2016-11-03 07:36:22', '2016-11-03 07:36:22'),
(2, 1, 'Dhanmondi', '2016-11-03 07:36:22', '2016-11-03 07:36:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_flat`
--
ALTER TABLE `tbl_flat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sublocation`
--
ALTER TABLE `tbl_sublocation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_flat`
--
ALTER TABLE `tbl_flat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sublocation`
--
ALTER TABLE `tbl_sublocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
