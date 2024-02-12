-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 02:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstruklaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` varchar(11) NOT NULL,
  `customer` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idcustomer`, `customer`) VALUES
('c-1', 'Angela'),
('c-10', 'Sekar'),
('c-2', 'Mawar'),
('c-3', 'Nisa'),
('c-4', 'Farid'),
('c-5', 'Fajar'),
('c-6', 'Maryn'),
('c-7', 'Cleo'),
('c-8', 'Tio'),
('c-9', 'Mala');

-- --------------------------------------------------------

--
-- Table structure for table `detaillaundry`
--

CREATE TABLE `detaillaundry` (
  `nolaundry` varchar(20) NOT NULL,
  `kodejenislaundry` varchar(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `hargatotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detaillaundry`
--

INSERT INTO `detaillaundry` (`nolaundry`, `kodejenislaundry`, `jumlah`, `hargatotal`) VALUES
('JL200216-001', 'kd-1', 2, 30000),
('JL200216-001', 'kd-3', 14, 84000),
('JL200216-001', 'kd-2', 2, 30000),
('JL200217-002', 'kd-1', 2, 30000),
('JL200217-002', 'kd-2', 2, 30000),
('JL200217-003', 'kd-2', 2, 30000),
('JL200217-003', 'kd-3', 10, 60000),
('JL200218-004', 'kd-1', 2, 30000),
('JL200219-005', 'kd-1', 4, 60000),
('JL200219-005', 'kd-2', 2, 30000),
('JL200220-006', 'kd-1', 1, 15000),
('JL200220-006', 'kd-2', 1, 15000),
('JL200220-006', 'kd-3', 5, 30000),
('JL200221-007', 'kd-3', 10, 60000),
('JL200222-008', 'kd-1', 1, 15000),
('JL200222-008', 'kd-2', 3, 45000),
('JL200222-008', 'kd-3', 4, 24000),
('JL200223-009', 'kd-3', 21, 126000),
('JL200221-007', 'kd-1', 1, 15000),
('JL20230609', 'kd-2', 3, 45000),
('JL20230609', 'kd-1', 1, 15000),
('JL20230609', 'kd-3', 3, 18000),
('JL200218-004', 'kd-2', 2, 30000),
('JL200217-002', 'kd-3', 1, 6000),
('JL200221-007', 'kd-2', 2, 30000),
('JL230713-010', 'kd-1', 3, 45000),
('JL230713-010', 'kd-2', 3, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `jenislaundry`
--

CREATE TABLE `jenislaundry` (
  `kodejenislaundry` varchar(11) NOT NULL,
  `namajenislaundry` varchar(45) DEFAULT NULL,
  `hargasatuan` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenislaundry`
--

INSERT INTO `jenislaundry` (`kodejenislaundry`, `namajenislaundry`, `hargasatuan`) VALUES
('kd-1', 'Cuci 12 KG ', 15000),
('kd-2', 'Kering 12 KG', 15000),
('kd-3', 'Jasa Setrika/ Diana', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `nolaundry` varchar(20) NOT NULL,
  `idcustomer` varchar(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `userid` varchar(11) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`nolaundry`, `idcustomer`, `tgl`, `userid`, `jam`, `total`) VALUES
('JL200216-001', 'c-1', '2020-02-16', 'u-1', '09:04:00', 144000),
('JL200217-002', 'c-2', '2020-02-17', 'u-2', '14:53:00', 66000),
('JL200217-003', 'c-3', '2020-02-17', 'u-3', '10:50:00', 90000),
('JL200218-004', 'c-4', '2020-02-18', 'u-4', '12:57:00', 60000),
('JL200219-005', 'c-5', '2020-02-19', 'u-5', '09:55:00', 90000),
('JL200220-006', 'c-6', '2020-02-20', 'u-2', '13:46:00', 60000),
('JL200221-007', 'c-7', '2020-02-21', 'u-3', '12:47:00', 105000),
('JL200222-008', 'c-8', '2020-02-22', 'u-4', '08:57:00', 84000),
('JL200223-009', 'c-9', '2020-02-23', 'u-1', '15:57:00', 126000),
('JL20230609', 'c-3', '2023-07-13', 'u-3', '10:34:00', 78000),
('JL230', '', '0000-00-00', '', '00:00:00', 0),
('JL230713-010', 'c-5', '2023-07-13', 'u-3', '11:01:00', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `user`) VALUES
('u-1', 'Ronbrot'),
('u-2', 'Sekala'),
('u-3', 'Cliffy'),
('u-4', 'Hairyn'),
('u-5', 'Hanni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `detaillaundry`
--
ALTER TABLE `detaillaundry`
  ADD KEY `nolaundry` (`nolaundry`),
  ADD KEY `kodejenislaundry` (`kodejenislaundry`);

--
-- Indexes for table `jenislaundry`
--
ALTER TABLE `jenislaundry`
  ADD PRIMARY KEY (`kodejenislaundry`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`nolaundry`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detaillaundry`
--
ALTER TABLE `detaillaundry`
  ADD CONSTRAINT `kodejenislaundry` FOREIGN KEY (`kodejenislaundry`) REFERENCES `jenislaundry` (`kodejenislaundry`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nolaundry` FOREIGN KEY (`nolaundry`) REFERENCES `laundry` (`nolaundry`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
