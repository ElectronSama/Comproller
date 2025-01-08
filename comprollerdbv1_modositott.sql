-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 08:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comproller`
--

-- --------------------------------------------------------

--
-- Table structure for table `comprollerfelhasznalok`
--

CREATE TABLE `comprollerfelhasznalok` (
  `FelhasznaloID` int(11) NOT NULL,
  `Felhasznalonev` varchar(50) NOT NULL,
  `JelszoHash` varchar(255) NOT NULL,
  `DolgozoID` int(11) NOT NULL,
  `Jogosultsag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dolgozok`
--

CREATE TABLE `dolgozok` (
  `DolgozoID` int(11) NOT NULL,
  `Nev` varchar(100) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Telefonszam` varchar(15) DEFAULT NULL,
  `Munkakor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dolgozok`
--

INSERT INTO `dolgozok` (`DolgozoID`, `Nev`, `Email`, `Telefonszam`, `Munkakor`) VALUES
(1, 'teszt', 'teszt@gmail.com', '1', 'teszt'),
(2, 'valaki1', 'valaki1@gmail.com', '2', 'valami1'),
(3, 'valaki2', 'valaki2@gmail.com', '3', 'valami2');

-- --------------------------------------------------------

--
-- Table structure for table `dolgozokreszletek`
--

CREATE TABLE `dolgozokreszletek` (
  `ReszletID` int(11) NOT NULL,
  `DolgozoID` int(11) NOT NULL,
  `Cim` varchar(255) DEFAULT NULL,
  `SzuletesiDatum` date DEFAULT NULL,
  `BankszamlaSzam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dolgozokreszletek`
--

INSERT INTO `dolgozokreszletek` (`ReszletID`, `DolgozoID`, `Cim`, `SzuletesiDatum`, `BankszamlaSzam`) VALUES
(1, 1, 'teszcím 1', '1995-01-01', '11111111-11111111-11'),
(2, 2, 'teszcím 2', '2025-01-01', '11111111-11111111-12'),
(3, 3, 'tesztcím 3', '2024-01-01', '11111111-11111111-13');

-- --------------------------------------------------------

--
-- Table structure for table `dolgozok_muszakok`
--

CREATE TABLE `dolgozok_muszakok` (
  `DolgozoMuszakID` int(11) NOT NULL,
  `DolgozoID` int(11) NOT NULL,
  `MuszakID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_11_25_192800_create_sessions_table', 1),
(2, '2024_12_26_155045_create_dolgozos_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `muszakok`
--

CREATE TABLE `muszakok` (
  `MuszakID` int(11) NOT NULL,
  `Kezdet` datetime NOT NULL,
  `Veg` datetime NOT NULL,
  `Leiras` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('yrL7DtTyou9lvKgcPe8OZuRtqTWEasAlLQHQMiY7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:134.0) Gecko/20100101 Firefox/134.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTEZmVEZaY1VVektnNkc3b1JoaVRXUms5ZHNzd2Fqa2diRnNmb0NGUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kb2xnb3pvayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736364435);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comprollerfelhasznalok`
--
ALTER TABLE `comprollerfelhasznalok`
  ADD PRIMARY KEY (`FelhasznaloID`),
  ADD UNIQUE KEY `Felhasznalonev` (`Felhasznalonev`),
  ADD KEY `DolgozoID` (`DolgozoID`);

--
-- Indexes for table `dolgozok`
--
ALTER TABLE `dolgozok`
  ADD PRIMARY KEY (`DolgozoID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `dolgozokreszletek`
--
ALTER TABLE `dolgozokreszletek`
  ADD PRIMARY KEY (`ReszletID`),
  ADD KEY `DolgozoID` (`DolgozoID`);

--
-- Indexes for table `dolgozok_muszakok`
--
ALTER TABLE `dolgozok_muszakok`
  ADD PRIMARY KEY (`DolgozoMuszakID`),
  ADD KEY `DolgozoID` (`DolgozoID`),
  ADD KEY `MuszakID` (`MuszakID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muszakok`
--
ALTER TABLE `muszakok`
  ADD PRIMARY KEY (`MuszakID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comprollerfelhasznalok`
--
ALTER TABLE `comprollerfelhasznalok`
  MODIFY `FelhasznaloID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dolgozok`
--
ALTER TABLE `dolgozok`
  MODIFY `DolgozoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dolgozokreszletek`
--
ALTER TABLE `dolgozokreszletek`
  MODIFY `ReszletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dolgozok_muszakok`
--
ALTER TABLE `dolgozok_muszakok`
  MODIFY `DolgozoMuszakID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `muszakok`
--
ALTER TABLE `muszakok`
  MODIFY `MuszakID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comprollerfelhasznalok`
--
ALTER TABLE `comprollerfelhasznalok`
  ADD CONSTRAINT `comprollerfelhasznalok_ibfk_1` FOREIGN KEY (`DolgozoID`) REFERENCES `dolgozok` (`DolgozoID`);

--
-- Constraints for table `dolgozokreszletek`
--
ALTER TABLE `dolgozokreszletek`
  ADD CONSTRAINT `dolgozokreszletek_ibfk_1` FOREIGN KEY (`DolgozoID`) REFERENCES `dolgozok` (`DolgozoID`);

--
-- Constraints for table `dolgozok_muszakok`
--
ALTER TABLE `dolgozok_muszakok`
  ADD CONSTRAINT `dolgozok_muszakok_ibfk_1` FOREIGN KEY (`DolgozoID`) REFERENCES `dolgozok` (`DolgozoID`),
  ADD CONSTRAINT `dolgozok_muszakok_ibfk_2` FOREIGN KEY (`MuszakID`) REFERENCES `muszakok` (`MuszakID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
