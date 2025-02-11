-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 09:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `beosztasok`
--

CREATE TABLE `beosztasok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `muszakokid` bigint(20) NOT NULL,
  `szemelyid` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berek`
--

CREATE TABLE `berek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `szemelyid` bigint(20) NOT NULL,
  `alapber` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bermodositas`
--

CREATE TABLE `bermodositas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `szemelyid` bigint(20) NOT NULL,
  `bermodositas` int(11) NOT NULL,
  `datum` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dolgozok`
--

CREATE TABLE `dolgozok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `esemenyek`
--

CREATE TABLE `esemenyek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datum` date NOT NULL,
  `esemeny_neve` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `felhasznalonev` varchar(255) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `szerep` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalonev`, `jelszo`, `szerep`, `created_at`, `updated_at`) VALUES
(1, 'nikecareer', '123456', 'hr', NULL, NULL),
(2, 'shellpath', '654321', 'pu', NULL, NULL),
(5, 'viola123', 'admin123', 'admin', NULL, NULL);

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
(2, '2025_01_11_195910_create_nyilvantartas_table', 1),
(4, '2025_01_11_200950_create_felhasznalok_table', 2),
(7, '2025_01_11_203534_create_esemenyek_table', 3),
(8, '2025_01_11_204555_create_sessions_table', 3),
(9, '2025_01_15_074821_create_berek_table', 4),
(10, '2025_01_15_074853_create_beosztasok_table', 4),
(11, '2025_01_15_074916_create_bermodositas_table', 4),
(12, '2025_01_15_074952_create_muszakok_table', 4),
(13, '2025_01_17_152214_create_dolgozok_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `muszakok`
--

CREATE TABLE `muszakok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `oraszam` varchar(255) NOT NULL,
  `muszaknev` varchar(255) NOT NULL,
  `idopont` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muszakok`
--

INSERT INTO `muszakok` (`id`, `oraszam`, `muszaknev`, `idopont`, `created_at`, `updated_at`) VALUES
(1, '4', 'aaa', '2025-02-11 10:10:00', NULL, NULL),
(2, '12', 'bbb', '2025-02-10 10:15:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nyilvantartas`
--

CREATE TABLE `nyilvantartas` (
  `DolgozoID` bigint(20) UNSIGNED NOT NULL,
  `Keresztnev` varchar(255) NOT NULL,
  `Vezeteknev` varchar(255) NOT NULL,
  `Szuletesi_datum` varchar(255) NOT NULL,
  `Anyja_neve` varchar(255) NOT NULL,
  `Tajszam` varchar(255) NOT NULL,
  `Adoszam` varchar(255) NOT NULL,
  `Bankszamlaszam` varchar(255) NOT NULL,
  `Cim` varchar(255) NOT NULL,
  `Allampolgarsag` varchar(255) NOT NULL,
  `Tartozkodasi_hely` varchar(255) NOT NULL,
  `Szemelyigazolvany_szam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefonszam` varchar(255) NOT NULL,
  `Munkakor` varchar(255) NOT NULL,
  `Megjegyzés` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nyilvantartas`
--

INSERT INTO `nyilvantartas` (`DolgozoID`, `Keresztnev`, `Vezeteknev`, `Szuletesi_datum`, `Anyja_neve`, `Tajszam`, `Adoszam`, `Bankszamlaszam`, `Cim`, `Allampolgarsag`, `Tartozkodasi_hely`, `Szemelyigazolvany_szam`, `Email`, `Telefonszam`, `Munkakor`, `Megjegyzés`, `created_at`, `updated_at`) VALUES
(1, 'Péter', 'Kovács', '1995.03.05', 'Virág Lili', '867 530 912', '32155599-2-10', '20018054-00000000-11711034', 'Budapest, Rákóczi u., 1192', 'magyar', 'Budapest', '2-111111-5555', 'peter33@gmail.com', '06703335677', 'hr', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Nf0ZjPoDBwIaps2hr1Hydp44k28j2nib45ApyEs6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNFc1bHY0R3NJQjQzMWZxdXJlcHBQOGtDRTEzckZDQ2gwT1dLaExBdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWdpc3RyeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoiaXNBZG1pbiI7YjoxO30=', 1739296385),
('QwW0bpV9x8KTCRIlSTuh1vgD7m0gZSzKF0stgf2s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieFdnNDU2d3pWU2trWnVCcVgwMk85bTdoS3RmWnYwcFdhM01JanozSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWdpc3RyeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NzoiaXNBZG1pbiI7YjoxO30=', 1739298298),
('YRn5Fd7Ki2tLXG9bKaH3onOH81jerFTAji6kY0Ki', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiMTZvTlBpenpIb2pjZXc4OGk4UDJtbzRYZ1pkVms0dHRVYkpSenBVVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93b3JrdGltZSI7fXM6NzoiaXNBZG1pbiI7YjoxO30=', 1739305059);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beosztasok`
--
ALTER TABLE `beosztasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berek`
--
ALTER TABLE `berek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bermodositas`
--
ALTER TABLE `bermodositas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dolgozok`
--
ALTER TABLE `dolgozok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esemenyek`
--
ALTER TABLE `esemenyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalok_felhasznalonev_unique` (`felhasznalonev`),
  ADD UNIQUE KEY `felhasznalok_szerep_unique` (`szerep`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muszakok`
--
ALTER TABLE `muszakok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  ADD PRIMARY KEY (`DolgozoID`);

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
-- AUTO_INCREMENT for table `beosztasok`
--
ALTER TABLE `beosztasok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berek`
--
ALTER TABLE `berek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bermodositas`
--
ALTER TABLE `bermodositas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dolgozok`
--
ALTER TABLE `dolgozok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `muszakok`
--
ALTER TABLE `muszakok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
