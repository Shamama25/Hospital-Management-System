-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 01:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_appointment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(10) UNSIGNED NOT NULL,
  `AName` varchar(30) DEFAULT NULL,
  `Gender` varchar(6) NOT NULL,
  `Phone_No` varchar(11) NOT NULL,
  `Admin_password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `AName`, `Gender`, `Phone_No`, `Admin_password`) VALUES
(1, 'Qaiser Shehryar', 'Male', '03157706957', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_Id` int(10) UNSIGNED NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` varchar(50) DEFAULT NULL,
  `Patient_Id` int(10) UNSIGNED DEFAULT NULL,
  `Doctor_Id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appointment_Id`, `Date`, `Time`, `Patient_Id`, `Doctor_Id`) VALUES
(21, '2023-09-14', '8:00 PM - 9:00 PM', 20, 2),
(22, '2023-09-15', '9:00 AM - 10:00 AM', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_Id` int(10) UNSIGNED NOT NULL,
  `DName` varchar(30) DEFAULT NULL,
  `Speciality` varchar(30) NOT NULL,
  `Fee` double DEFAULT NULL,
  `DGender` varchar(6) DEFAULT NULL,
  `Admin_Id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doctor_Id`, `DName`, `Speciality`, `Fee`, `DGender`, `Admin_Id`) VALUES
(1, 'Badar Butt', 'Eye Specialist', 4800, 'Male', 1),
(2, 'Ghulam Ruqia', 'Eye Specialist', 5000, 'Female', 1),
(5, 'Qamar Askari', 'Neurologist', 4200, 'Male', 1),
(6, 'Muiz Butt', 'Neurologist', 3000, 'Male', 1),
(7, 'Misbah  Rauf', 'Neurologist', 2000, 'Female', 1),
(8, 'Shamama Tarif', 'Heart Specialist', 4800, 'Female', 1),
(9, 'Moaz Aslam', 'Heart Specialist', 2000, 'Male', 1),
(10, 'Asad Masood', 'Heart Specialist', 3500, 'Male', 1),
(11, 'Rukhsar Tariq', 'Ear Specialist', 4000, 'Female', 1),
(12, 'Vaniza Shahid', 'Ear Specialist', 3500, 'Female', 1),
(13, 'Huzaifa Rauf', 'Ear Specialist', 2000, 'Male', 1),
(14, 'Sumaira Hayat Khan', 'Dentist', 4500, 'Female', 1),
(16, 'Nameeqa Firdous', 'Gynecologist', 4800, 'Female', 1),
(17, 'Shazma Noor', 'Gynecologist', 4000, 'Female', 1),
(18, 'Numaira Nawaz', 'Gynecologist', 3000, 'Female', 1),
(19, 'Sara Meer', 'Gynecologist', 2500, 'Female', 1),
(20, 'Huma Sadiq', 'Psychiatrists', 4500, 'Female', 1),
(21, 'Waqas Tariq Dar', 'Psychiatrists', 4000, 'Male', 1),
(23, 'Isha Loak', 'Psychiatrists', 2500, 'Female', 1),
(24, 'Saleh Rashid', 'Nutritionist', 2000, 'Male', 1),
(28, 'Humble Hassan', 'Nutritionist', 3500, 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_time`
--

CREATE TABLE `doctor_time` (
  `Doctor_Id` int(10) UNSIGNED NOT NULL,
  `Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_time`
--

INSERT INTO `doctor_time` (`Doctor_Id`, `Time`) VALUES
(1, '8:00 PM - 9:00 PM'),
(1, '9:00 AM - 10:00 AM'),
(2, '8:00 PM - 9:00 PM'),
(2, '9:00 AM - 10:00 AM'),
(5, '2:00 PM - 3:00 PM'),
(5, '9:00 AM - 10:00 AM'),
(6, '8:00 PM - 9:00 PM'),
(6, '9:00 AM - 10:00 AM'),
(7, '2:00 PM - 3:00 PM'),
(7, '8:00 PM - 9:00 PM'),
(8, '2:00 PM - 3:00 PM'),
(8, '8:00 PM - 9:00 PM'),
(8, '9:00 AM - 10:00 AM'),
(9, '2:00 PM - 3:00 PM'),
(10, '8:00 PM - 9:00 PM'),
(10, '9:00 AM - 10:00 AM'),
(11, '2:00 PM - 3:00 PM'),
(11, '8:00 PM - 9:00 PM'),
(11, '9:00 AM - 10:00 AM'),
(12, '2:00 PM - 3:00 PM'),
(12, '9:00 AM - 10:00 AM'),
(13, '2:00 PM - 3:00 PM'),
(13, '8:00 PM - 9:00 PM'),
(14, '2:00 PM - 3:00 PM'),
(14, '8:00 PM - 9:00 PM'),
(16, '2:00 PM - 3:00 PM'),
(16, '8:00 PM - 9:00 PM'),
(16, '9:00 AM - 10:00 AM'),
(17, '2:00 PM - 3:00 PM'),
(17, '8:00 PM - 9:00 PM'),
(18, '8:00 PM - 9:00 PM'),
(19, '9:00 AM - 10:00 AM'),
(20, '2:00 PM - 3:00 PM'),
(20, '8:00 PM - 9:00 PM'),
(20, '9:00 AM - 10:00 AM'),
(21, '2:00 PM - 3:00 PM'),
(21, '9:00 AM - 10:00 AM'),
(23, '2:00 PM - 3:00 PM'),
(23, '8:00 PM - 9:00 PM'),
(23, '9:00 AM - 10:00 AM'),
(24, '2:00 PM - 3:00 PM'),
(24, '9:00 AM - 10:00 AM'),
(28, '2:00 PM - 3:00 PM'),
(28, '8:00 PM - 9:00 PM'),
(28, '9:00 AM - 10:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_Id` int(10) UNSIGNED NOT NULL,
  `Text` varchar(1000) NOT NULL,
  `Date` date NOT NULL,
  `Patient_Id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_Id`, `Text`, `Date`, `Patient_Id`) VALUES
(13, 'very nice application.', '2023-09-12', 15),
(14, 'Very amzaing application', '2023-09-14', 24),
(15, 'Best Application', '2023-09-14', 20);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_Id` int(10) UNSIGNED NOT NULL,
  `PName` varchar(30) DEFAULT NULL,
  `Phone_No` varchar(11) NOT NULL,
  `PGender` varchar(6) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Doctor_Id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_Id`, `PName`, `Phone_No`, `PGender`, `Age`, `Doctor_Id`) VALUES
(15, 'Ali Butt', '03157706957', 'Male', 44, 2),
(16, 'Laiba', '03157716352', 'Female', 22, 8),
(20, 'usama', '03157306152', 'Female', 55, 24),
(24, 'Nimra', '03157706948', 'Female', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sir`
--

CREATE TABLE `sir` (
  `name` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_Id`),
  ADD KEY `appointment_ibfk_1` (`Patient_Id`),
  ADD KEY `appointment_ibfk_2` (`Doctor_Id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doctor_Id`),
  ADD KEY `doctor_ibfk_1` (`Admin_Id`);

--
-- Indexes for table `doctor_time`
--
ALTER TABLE `doctor_time`
  ADD PRIMARY KEY (`Doctor_Id`,`Time`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_Id`),
  ADD KEY `feedback_ibfk_1` (`Patient_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_Id`),
  ADD KEY `patient_ibfk_1` (`Doctor_Id`);

--
-- Indexes for table `sir`
--
ALTER TABLE `sir`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Doctor_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Patient_Id`) REFERENCES `patient` (`Patient_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`Doctor_Id`) REFERENCES `doctor` (`Doctor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Admin_Id`) REFERENCES `admin` (`Admin_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_time`
--
ALTER TABLE `doctor_time`
  ADD CONSTRAINT `doctor_time_ibfk_1` FOREIGN KEY (`Doctor_Id`) REFERENCES `doctor` (`Doctor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Patient_Id`) REFERENCES `patient` (`Patient_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Doctor_Id`) REFERENCES `doctor` (`Doctor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
