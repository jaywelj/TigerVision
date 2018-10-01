-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 01:13 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tigervision`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminlogin`
--

CREATE TABLE `tbl_adminlogin` (
  `admin_adminName` varchar(25) NOT NULL,
  `admin_firstName` varchar(25) NOT NULL,
  `admin_lastName` varchar(25) NOT NULL,
  `admin_password` varchar(25) NOT NULL,
  `admin_contactNum` varchar(15) NOT NULL,
  `admin_image` longblob,
  `admin_accessLevel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chosendestination`
--

CREATE TABLE `tbl_chosendestination` (
  `cd_ID` int(11) NOT NULL,
  `cd_destinationID` int(11) NOT NULL,
  `cd_npID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_createnewpackage`
--

CREATE TABLE `tbl_createnewpackage` (
  `np_ID` int(11) NOT NULL,
  `np_pricePerHead` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destination`
--

CREATE TABLE `tbl_destination` (
  `destination_ID` int(11) NOT NULL,
  `destination_name` varchar(25) NOT NULL,
  `destination_address` varchar(200) NOT NULL,
  `destination_contacts` varchar(50) NOT NULL,
  `destination_email` varchar(50) NOT NULL,
  `destination_city` varchar(50) NOT NULL,
  `destination_link` text NOT NULL,
  `destination_image` longblob NOT NULL,
  `destination_description` text NOT NULL,
  `destination_pricemin` double NOT NULL,
  `destination_pricemax` double NOT NULL,
  `destination_adminName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_destination`
--

INSERT INTO `tbl_destination` (`destination_ID`, `destination_name`, `destination_address`, `destination_contacts`, `destination_email`, `destination_city`, `destination_link`, `destination_image`, `destination_description`, `destination_pricemin`, `destination_pricemax`, `destination_adminName`) VALUES
(11, 'Manila Ocean Park', 'Luneta', '0919827435', 'manilaoceanpark@yahoo.com', 'Manila City', '', 0x756d696461682e6a7067, 'Umi Sonoda', 500, 900, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packageimage`
--

CREATE TABLE `tbl_packageimage` (
  `image_ID` int(11) NOT NULL,
  `image_picture` longblob NOT NULL,
  `image_packageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservationform`
--

CREATE TABLE `tbl_reservationform` (
  `form_userID` int(11) NOT NULL,
  `form_firstName` varchar(25) NOT NULL,
  `form_lastName` varchar(25) NOT NULL,
  `form_contactNum` varchar(15) NOT NULL,
  `form_emailAdd` varchar(50) NOT NULL,
  `form_address` varchar(50) NOT NULL,
  `form_dateApplied` date NOT NULL,
  `form_plannedDate` date NOT NULL,
  `form_packageID` int(11) DEFAULT NULL,
  `form_npID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservationlist`
--

CREATE TABLE `tbl_reservationlist` (
  `reserve_ID` int(11) NOT NULL,
  `reserve_status` varchar(10) NOT NULL,
  `reserve_userID` int(11) NOT NULL,
  `reserve_adminName` varchar(25) NOT NULL,
  `reserve_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tourpackage`
--

CREATE TABLE `tbl_tourpackage` (
  `package_ID` int(11) NOT NULL,
  `package_name` varchar(25) NOT NULL,
  `package_description` varchar(255) NOT NULL,
  `packageimage` longblob NOT NULL,
  `package_pricePerHead` varchar(10) NOT NULL,
  `package_destinationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  ADD PRIMARY KEY (`admin_adminName`);

--
-- Indexes for table `tbl_chosendestination`
--
ALTER TABLE `tbl_chosendestination`
  ADD PRIMARY KEY (`cd_ID`),
  ADD KEY `cd_destinationID` (`cd_destinationID`);

--
-- Indexes for table `tbl_createnewpackage`
--
ALTER TABLE `tbl_createnewpackage`
  ADD PRIMARY KEY (`np_ID`);

--
-- Indexes for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  ADD PRIMARY KEY (`destination_ID`),
  ADD KEY `fk_adminName` (`destination_adminName`);

--
-- Indexes for table `tbl_packageimage`
--
ALTER TABLE `tbl_packageimage`
  ADD PRIMARY KEY (`image_ID`),
  ADD KEY `fk_packageID` (`image_packageID`);

--
-- Indexes for table `tbl_reservationform`
--
ALTER TABLE `tbl_reservationform`
  ADD PRIMARY KEY (`form_userID`),
  ADD KEY `form_packageID` (`form_packageID`),
  ADD KEY `form_npID` (`form_npID`);

--
-- Indexes for table `tbl_reservationlist`
--
ALTER TABLE `tbl_reservationlist`
  ADD PRIMARY KEY (`reserve_ID`),
  ADD KEY `reserve_adminName` (`reserve_adminName`),
  ADD KEY `reserve_userID` (`reserve_userID`);

--
-- Indexes for table `tbl_tourpackage`
--
ALTER TABLE `tbl_tourpackage`
  ADD PRIMARY KEY (`package_ID`),
  ADD KEY `fk_destID` (`package_destinationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chosendestination`
--
ALTER TABLE `tbl_chosendestination`
  MODIFY `cd_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_createnewpackage`
--
ALTER TABLE `tbl_createnewpackage`
  MODIFY `np_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  MODIFY `destination_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_packageimage`
--
ALTER TABLE `tbl_packageimage`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reservationform`
--
ALTER TABLE `tbl_reservationform`
  MODIFY `form_userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reservationlist`
--
ALTER TABLE `tbl_reservationlist`
  MODIFY `reserve_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tourpackage`
--
ALTER TABLE `tbl_tourpackage`
  MODIFY `package_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
