-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Jan 15. 08:59
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `comproller`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `beosztasok`
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
-- Tábla szerkezet ehhez a táblához `berek`
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
-- Tábla szerkezet ehhez a táblához `bermodositas`
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
-- Tábla szerkezet ehhez a táblához `esemenyek`
--

CREATE TABLE `esemenyek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `esemeny_neve` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
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
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalonev`, `jelszo`, `szerep`, `created_at`, `updated_at`) VALUES
(1, 'nikecareer', '123456', 'hr', NULL, NULL),
(2, 'shellpath', '123456', 'pu', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2025_01_11_195910_create_nyilvantartas_table', 1),
(4, '2025_01_11_200950_create_felhasznalok_table', 2),
(7, '2025_01_11_203534_create_esemenyek_table', 3),
(8, '2025_01_11_204555_create_sessions_table', 3),
(9, '2025_01_15_074821_create_berek_table', 4),
(10, '2025_01_15_074853_create_beosztasok_table', 4),
(11, '2025_01_15_074916_create_bermodositas_table', 4),
(12, '2025_01_15_074952_create_muszakok_table', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `muszakok`
--

CREATE TABLE `muszakok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leiras` varchar(255) NOT NULL,
  `muszaknev` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nyilvantartas`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `nyilvantartas`
--

INSERT INTO `nyilvantartas` (`DolgozoID`, `Keresztnev`, `Vezeteknev`, `Szuletesi_datum`, `Anyja_neve`, `Tajszam`, `Adoszam`, `Bankszamlaszam`, `Cim`, `Allampolgarsag`, `Tartozkodasi_hely`, `Szemelyigazolvany_szam`, `Email`, `Telefonszam`, `Munkakor`, `created_at`, `updated_at`) VALUES
(1, 'Péter', 'Kovács', '1995.03.05', 'Virág Lili', '867 530 912', '32155599-2-10', '20018054-00000000-11711034', 'Budapest, Rákóczi u., 1192', 'magyar', 'Budapest', '2-111111-5555', 'peter33@gmail.com', '06703335677', 'hr', NULL, NULL),
(2, 'Leander', 'Bán', '1991.06.02', 'Molnár Zoé', '233 540 411', '88832391-2-10', '30021555-00000000-12811130', 'Budapest, Gyáli út 50, 1097', 'magyar', 'Budapest', '2-222222-4444', 'ban11@gmail.com', '06301115678', 'pu', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sessions`
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
-- A tábla adatainak kiíratása `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IK1AAKtI1dfHadvdicXU4yv73A5b5ph3SnKQ9JKZ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFVvTWVIU04zODRBaHFqNHhHclVIQWptNnJjSzdURGp6d2RsSVhxdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly9sb2NhbGhvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1736678228),
('Y29UHKeadrZNUxHDZVt1xNfOQchMpC5RHuolNiJL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjl5eW1ocFF1SURKTHhyUWlOMHJMaThUbEU5MExaT1NOeUpqOEY3ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ldmVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1736926770);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `beosztasok`
--
ALTER TABLE `beosztasok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `berek`
--
ALTER TABLE `berek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `bermodositas`
--
ALTER TABLE `bermodositas`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `esemenyek`
--
ALTER TABLE `esemenyek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalok_felhasznalonev_unique` (`felhasznalonev`),
  ADD UNIQUE KEY `felhasznalok_szerep_unique` (`szerep`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `muszakok`
--
ALTER TABLE `muszakok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  ADD PRIMARY KEY (`DolgozoID`);

--
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `beosztasok`
--
ALTER TABLE `beosztasok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `berek`
--
ALTER TABLE `berek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `bermodositas`
--
ALTER TABLE `bermodositas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `muszakok`
--
ALTER TABLE `muszakok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
