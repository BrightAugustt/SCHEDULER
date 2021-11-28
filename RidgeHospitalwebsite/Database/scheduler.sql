-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 09:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancer`
--

CREATE TABLE `cancer` (
  `patientID` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `age` int(100) NOT NULL,
  `details` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `patientID` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `age` int(100) NOT NULL,
  `details` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dentistry`
--

CREATE TABLE `dentistry` (
  `patientID` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `age` int(100) NOT NULL,
  `details` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dentistry`
--

INSERT INTO `dentistry` (`patientID`, `fname`, `lname`, `date`, `email`, `gender`, `age`, `details`) VALUES
('ESS 234', 'Bright', 'Augustt', '2021-11-26T23:23', 'BrightAppiahAugustt@gmail.com', '', 18, 'Require a thorough mouth check bleeding gums');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'ayeyi.mills@gmail.com', '$2y$10$fm43L8PN3DgrmNiSTYBXzOJcnEarphtCFxIDeOLDOcLXe3cFxzTAu'),
(2, 'augusttbright@gmail.com', '$2y$10$.1CY//F8kaBli6dhzqwwBOIuurbDkYsZP8hgBvyE3zw7qr.DyV.66'),
(3, 'asamoahgyan@gmail.com', '$2y$10$F9XEqOUhhfluHNaZ8VgFfenaY97TzDKEFSAfECZ8w3IUjOZIHJHPa'),
(4, 'chrissteven@gamil.com', '$2y$10$Ty3duTR57FTfwKBAT4rq9OxAr3CbsfCr28CB7baIzOHnXd4Z6huHa'),
(5, 'stevensmith@gmail.com', '$2y$10$PeszynfgH4SWScRzYWwZKubNHBw5TB9Secesj0gTCRiDFPFVjUtu2');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `patientID` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `age` int(100) NOT NULL,
  `items` varchar(225) NOT NULL,
  `details` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`patientID`, `fname`, `lname`, `date`, `gender`, `age`, `items`, `details`, `email`) VALUES
('ESS 123', 'Bright', 'Augustt', '2021-11-26T23:21', '', 18, 'Paracetamol', '', 'bright.augustt@ashesi.edu.gh');

-- --------------------------------------------------------

--
-- Table structure for table `surgery`
--

CREATE TABLE `surgery` (
  `patientID` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `age` int(100) NOT NULL,
  `procedure1` varchar(225) NOT NULL,
  `details` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `patientID` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `age` int(100) NOT NULL,
  `details` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`patientID`, `fname`, `lname`, `date`, `email`, `gender`, `age`, `details`) VALUES
('ESS 789', 'Bright', 'Augustt', '2021-11-26T23:24', 'BrightAppiahAugustt@gmail.com', '', 45, 'Taking his first vaccine shot at 3pm.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `dentistry`
--
ALTER TABLE `dentistry`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`patientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
