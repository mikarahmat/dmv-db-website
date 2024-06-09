-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Jun 07, 2024 at 02:47 AM
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
-- Database: `dmv`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `officeName` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `date`, `startTime`, `endTime`, `officeName`, `description`, `ID`) VALUES
(1, '2023-04-06', '10:01:21', '12:01:21', 'Central Jakarta Office', 'Penalty discussion', 13),
(6, '2023-04-09', '16:18:00', '19:22:00', 'Central Jakarta Office', 'Extending Vehicle Registration', 10),
(8, '2023-04-19', '16:54:00', '22:57:00', 'Central Jakarta Office', 'Speeding Ticket Issue', 10),
(10, '2023-12-31', '12:34:00', '14:34:00', 'Bogor City Office', 'Vehicle registration transfer', 11),
(12, '2023-12-14', '12:45:00', '13:45:00', 'West Jakarta Office', 'Vehicle registration', 8);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `officeName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`officeName`, `address`) VALUES
('Bandung City Office', 'Bandung, Bandung Regency'),
('Bogor City Office', 'Bogor, Bogor Regency'),
('Bogor Office 2', 'Bogor, Bogor Regency'),
('Central Jakarta Office', 'Bundaran HI, DKI Jakarta'),
('East Bekasi Office', 'Bekasi Jaya, Bekasi Regency'),
('North Cikarang Office', 'Jababeka, Bekasi Regency'),
('South Tangerang Office', 'BSD, Tangerang Regency'),
('South Tangerang Office 2', 'BSD, Tangerang Regency'),
('Surabaya Office', 'Tegalsari, Surabaya'),
('West Cikarang Office', 'Jababeka, Bekasi Regency'),
('West Jakarta Office', 'Palmerah, DKI Jakarta'),
('Yogyakarta Office', 'Sleman, Sleman Regency');

-- --------------------------------------------------------

--
-- Table structure for table `penalty_ticket`
--

CREATE TABLE `penalty_ticket` (
  `ticketID` int(11) NOT NULL,
  `plate` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `issueDate` date NOT NULL,
  `dueDate` date NOT NULL,
  `status` enum('unpaid','paid') NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penalty_ticket`
--

INSERT INTO `penalty_ticket` (`ticketID`, `plate`, `description`, `amount`, `issueDate`, `dueDate`, `status`, `ID`) VALUES
(4, 'B 2193 HDN', 'Running red light', 200000.00, '2023-04-08', '2023-04-15', 'unpaid', 11),
(9, 'P 134 LAP', 'Speeding', 1000000.00, '2023-04-08', '2023-04-08', 'unpaid', 10),
(10, 'B 2193 HDN', 'Harassment', 99999999.99, '2023-04-08', '2023-04-15', 'paid', 11),
(11, 'B 2193 HDN', 'Racism', 2000000.00, '2023-10-31', '2023-01-10', 'unpaid', 11),
(12, 'B 3 MWE', 'Absent license plate', 250000.00, '2023-04-09', '2023-04-16', 'paid', 8);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `fName`, `lName`, `username`, `password`, `email`, `phone`, `address`, `role`) VALUES
(1, '-', '-', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '-', '-', 'admin'),
(8, 'Mika', 'Rahmat', 'mikarahmat', '3708d647459a15f5232ed9407809fdcd', 'mikarahmatramadhan14@gmail.com', '0812-8373-7833', 'Palmerah', 'customer'),
(9, 'Rifki', 'Immanuel', 'rifsiing', '103d92748704879925234628340a99b6', 'rifkisinaga@gmail.com', '0812-6465-0702', 'Medan', 'customer'),
(10, 'Daffa', 'Ananda', 'MDAnandaB', 'c77108fe3e285caa6757dc152fd42b72', 'nandakece@gmail.com', '0811-1804-041', 'Cikarang', 'customer'),
(11, 'Fitra', 'Hafidz', 'Idong', '9d205dc25983777e26ddf0c9333a00f3', 'idonsepeg@gmail.com', '0895-8031-31159', 'Garut', 'customer'),
(12, 'Reyhan', 'Winarto', 'hanskuy', '4e5deb851139e6bd1ec8c9e9b05b2163', 'reyhanwinarto@gmail.com', '0818-9000-9336', 'Ciamis', 'customer'),
(13, 'Fairuz', 'Suhendi', 'fazdrop', '12afaa5b720a63462c0a38f31b0fe692', 'fairuzkeren@gmail.com', '0812-8077-9356', 'Cileungsi', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrationID` int(11) NOT NULL,
  `plate` varchar(20) NOT NULL,
  `registrationDate` date NOT NULL,
  `expiryDate` date NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registrationID`, `plate`, `registrationDate`, `expiryDate`, `ID`) VALUES
(2, 'B 2193 HDN', '2024-11-07', '2029-11-07', 11),
(3, 'B 3 MWE', '2023-11-14', '2028-11-14', 8),
(4, 'B 3242 FFA', '2020-03-30', '2025-03-30', 9),
(0, 'B 3276 BCD', '2023-12-12', '2028-12-12', 11),
(5, 'B 365 OFC', '2023-04-07', '2028-04-07', 13),
(6, 'B 6969 SUI', '2022-02-02', '2027-02-02', 12),
(7, 'P 134 LAP', '2021-09-20', '2026-09-20', 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionID` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `officeName` varchar(50) NOT NULL,
  `ticketID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `amount`, `date`, `officeName`, `ticketID`, `ID`) VALUES
(1, 10000.00, '2023-04-03', 'East Bekasi Office', 9, 10),
(2, 500000.00, '2023-03-22', 'Yogyakarta Office', 10, 11),
(4, 2000000.00, '2023-12-13', 'East Bekasi Office', 11, 11),
(5, 2000000.00, '2023-04-05', 'Bogor City Office', 4, 11),
(6, 500000.00, '2023-04-09', 'Bogor Office 2', 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicleID` varchar(20) NOT NULL,
  `plate` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicleID`, `plate`, `model`, `year`, `ID`) VALUES
('0001', 'B 3 MWE', 'BMW M4 Competition', '2022', 8),
('0002', 'B 2193 HDN', 'Suzuki Carry', '2010', 11),
('0003', 'B 3242 FFA', 'Lexus LS400', '1992', 9),
('0005', 'P 134 LAP', 'Toyota Starlet GT Turbo', '1995', 10),
('0006', 'B 365 OFC', 'Honda Brio', '2018', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `officeName` (`officeName`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`officeName`);

--
-- Indexes for table `penalty_ticket`
--
ALTER TABLE `penalty_ticket`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `penalty_ticket_ibfk_2` (`plate`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`plate`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `officeName` (`officeName`),
  ADD KEY `ticketID` (`ticketID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicleID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `vehicles_ibfk_2` (`plate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penalty_ticket`
--
ALTER TABLE `penalty_ticket`
  MODIFY `ticketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`officeName`) REFERENCES `offices` (`officeName`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `register` (`ID`);

--
-- Constraints for table `penalty_ticket`
--
ALTER TABLE `penalty_ticket`
  ADD CONSTRAINT `penalty_ticket_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `register` (`ID`),
  ADD CONSTRAINT `penalty_ticket_ibfk_2` FOREIGN KEY (`plate`) REFERENCES `registration` (`plate`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `register` (`ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`officeName`) REFERENCES `offices` (`officeName`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`ticketID`) REFERENCES `penalty_ticket` (`ticketID`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `register` (`ID`),
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`plate`) REFERENCES `registration` (`plate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
