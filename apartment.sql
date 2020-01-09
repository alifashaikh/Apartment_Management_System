-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 09:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment`
--
CREATE DATABASE IF NOT EXISTS `apartment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `apartment`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getBuilding`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getBuilding` ()  SELECT * FROM building$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(1, 'Alifa', 'admin@gmail.com', 9535983024, '1234'),
(2, 'Zayan', 'zayan@gmail.com', 9880380239, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

DROP TABLE IF EXISTS `apartment`;
CREATE TABLE `apartment` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `apartmentNum` bigint(20) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`id`, `bid`, `apartmentNum`, `description`) VALUES
(16, 9, 701, 'Greens view with 2BHK ,3 Balconies and 1552 sqft'),
(17, 9, 704, 'Road view with 3BHK ,3 Balconies and 1752 sqft'),
(18, 9, 804, 'Penthouse 4BHK ,5 Balconies and 2125 sqft'),
(19, 10, 901, 'Beach view with 2BHK ,3 Balconies and 2125 sqft'),
(20, 10, 906, 'Greens view with 3BHK ,3 Balconies and 2752 sqft'),
(21, 12, 701, 'Garden view with 2BHK ,3 Balconies and 1652 sqft'),
(23, 12, 104, 'Road view with 2BHK ,2 Balconies and 1452 sqft'),
(24, 13, 301, 'Road view with 2BHK ,3 Balconies and 1822 sqft'),
(25, 14, 1506, 'Penthouse 5BHK ,7 Balconies and 5255 sqft'),
(26, 14, 1302, 'Valley veiw 3BHK ,4 Balconies and 3255 sqft'),
(27, 15, 503, 'Beach view with 3BHK ,3 Balconies and 2125 sqft'),
(28, 16, 602, 'Garden view with 2BHK ,3 Balconies and 1852 sqft');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Developer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `Name`, `Address`, `Developer`) VALUES
(9, 'The Mirage', 'Kunjibettu,Udupi', 'Famous Developers'),
(10, 'Ivory Towers', 'Falnir,Mangalore', 'Mohtisham'),
(12, 'City Gate Apartments', 'Shantinagar Junction', 'City Developers'),
(13, 'Bianca', 'Ajjarkad', 'Sai Radha'),
(14, 'The Royal Embassy', 'End point,Manipal ', 'Malpe Manipal Builders'),
(15, 'Allegro', 'Vaselane,Mangalore', 'Allegro Builders'),
(16, 'Atlantis', 'Bendoor Well', 'Inland Builders');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `owned` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `name`, `email`, `password`, `mobile`, `owned`) VALUES
(13, 'Alifa', 'alifa@gmail.com', '1234', 9535983024, '9'),
(14, 'Wasim', 'wass@gmail.com', '1234', 8867881735, '10'),
(15, 'Nabhan', 'nab@gmail.com', '1234', 9880968024, '12'),
(16, 'Rahid', 'rahid@gmail.com', '1234', 9852147630, '13'),
(17, 'Aiza', 'aiza@gmail.com', '1234', 8745123690, '14'),
(20, 'Ayaan', 'ayaan@gmail.com', '1234', 8654793210, '15');

--
-- Triggers `owner`
--
DROP TRIGGER IF EXISTS `logs`;
DELIMITER $$
CREATE TRIGGER `logs` AFTER INSERT ON `owner` FOR EACH ROW INSERT INTO owner_log VALUES(null, NEW.id, 'inserted', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `owner_log`
--

DROP TABLE IF EXISTS `owner_log`;
CREATE TABLE `owner_log` (
  `id` int(11) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_log`
--

INSERT INTO `owner_log` (`id`, `ownerid`, `action`, `cdate`) VALUES
(3, 13, 'inserted', '2019-12-01 18:35:07'),
(4, 14, 'inserted', '2019-12-01 18:35:32'),
(5, 15, 'inserted', '2019-12-01 18:36:02'),
(6, 16, 'inserted', '2019-12-01 18:36:33'),
(7, 17, 'inserted', '2019-12-01 18:36:57'),
(8, 20, 'inserted', '2019-12-01 23:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `rent_log`
--

DROP TABLE IF EXISTS `rent_log`;
CREATE TABLE `rent_log` (
  `id` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent_log`
--

INSERT INTO `rent_log` (`id`, `rent`, `tid`, `oid`) VALUES
(1, 5000, 12, 13),
(2, 12000, 13, 14),
(3, 6000, 14, 13),
(4, 15000, 15, 14),
(5, 12000, 16, 14),
(6, 14000, 17, 17),
(7, 16420, 18, 17),
(8, 6000, 24, 16),
(9, 9000, 25, 13),
(10, 10000, 26, 13),
(11, 0, 38, 13),
(12, 8210, 39, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE `tenant` (
  `id` int(11) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `building` varchar(50) NOT NULL,
  `apartment` varchar(10) NOT NULL,
  `rent` int(11) NOT NULL,
  `date` date NOT NULL,
  `oid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `tname`, `email`, `password`, `mobile`, `building`, `apartment`, `rent`, `date`, `oid`) VALUES
(14, 'Ayesha', 'aish@gmail.com', '', 7320145689, '9', '17', 6000, '2019-12-01', '13'),
(15, 'Rishan', 'rish@gmail.com', '', 8647593210, '10', '20', 15000, '2019-12-01', '14'),
(16, 'Hasim', 'hash@gmail.com', '', 6547823910, '10', '19', 12000, '2019-12-01', '14'),
(17, 'Fouziya', 'fouziya@gmail.com', '', 6325410987, '14', '25', 14000, '2019-12-02', '17'),
(18, 'Nafia', 'nafia@gmail.com', '', 9635820147, '14', '26', 16420, '2019-12-02', '17'),
(24, 'Sama', 'sam@gmail.com', '', 8321456970, '13', '24', 6000, '2019-12-02', '16'),
(25, 'Alman', 'alman@gmail.com', '', 7654893210, '9', '16', 9000, '2019-12-02', '13'),
(38, '', '', '', 0, '', '', 0, '2019-12-02', '13'),
(39, 'Muzain', 'muz@gmail.com', '', 9874526310, '9', '18', 8210, '2019-12-02', '13');

--
-- Triggers `tenant`
--
DROP TRIGGER IF EXISTS `entry`;
DELIMITER $$
CREATE TRIGGER `entry` AFTER INSERT ON `tenant` FOR EACH ROW INSERT INTO rent_log VALUES(null, NEW.rent, NEW.id, NEW.oid)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`,`apartmentNum`) USING BTREE,
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `owner_log`
--
ALTER TABLE `owner_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_log`
--
ALTER TABLE `rent_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id`,`rent`) USING BTREE,
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rent` (`rent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `owner_log`
--
ALTER TABLE `owner_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rent_log`
--
ALTER TABLE `rent_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
