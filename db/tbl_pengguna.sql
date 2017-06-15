-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2017 at 03:14 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `dipa_id_pengguna` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_pengguna` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_password_pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_pengguna_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `dipa_jenis_pengguna` enum('1','2','3','4','5','6','7','8','9') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_id_satuan_kerja` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`dipa_id_pengguna`, `username`, `dipa_nama_pengguna`, `dipa_password_pengguna`, `dipa_pengguna_status`, `dipa_jenis_pengguna`, `dipa_id_satuan_kerja`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Ali Usmann', '$2a$06$kgm8UUwKQOuTG./wAjDRiOlIHAdY1H2RUMeB84ClHbuUJCtdMgeXO', '1', '1', NULL, 'EyOZaUIkksSstwo1YMbkg3yPjnp9EUgKZL0XQNARAG67sCtPCO9FWfDZgKU3', NULL, '2017-06-04 01:44:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`dipa_id_pengguna`),
  ADD UNIQUE KEY `tbl_pengguna_username_unique` (`username`),
  ADD KEY `tbl_pengguna_dipa_id_satuan_kerja_foreign` (`dipa_id_satuan_kerja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `dipa_id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD CONSTRAINT `tbl_pengguna_dipa_id_satuan_kerja_foreign` FOREIGN KEY (`dipa_id_satuan_kerja`) REFERENCES `tbl_satuan_kerja` (`dipa_id_satuan_kerja`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
