-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 12:19 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dipa_papua`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2017_05_30_161801_dipa_tahunAnggaran', 1),
(28, '2017_05_30_161847_dipa_satKerja', 1),
(29, '2017_05_30_162028_dipa_program', 1),
(30, '2017_05_30_162048_dipa_kegiatan', 1),
(31, '2017_05_30_162105_dipa_output', 1),
(32, '2017_05_30_162127_dipa_suboutput', 1),
(33, '2017_05_30_162156_dipa_komponen', 1),
(34, '2017_05_30_162211_dipa_subkomponen', 1),
(35, '2017_05_30_162227_dipa_akun', 1),
(36, '2017_05_30_162240_dipa_rincian', 1),
(37, '2017_06_01_220552_add_soft_deletes_user', 1),
(38, '2017_06_02_084707_update_enum_user', 1),
(39, '2017_06_04_042949_add_id_satker_user', 2),
(40, '2017_06_04_090352_add_enum_detail_akun', 2),
(41, '2017_06_04_205747_change_field_satuan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_akun`
--

CREATE TABLE `tbl_dipa_akun` (
  `dipa_id_akun` int(10) UNSIGNED NOT NULL,
  `dipa_kode_akun` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_akun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_id_sub_komponen` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_akun`
--

INSERT INTO `tbl_dipa_akun` (`dipa_id_akun`, `dipa_kode_akun`, `dipa_nama_akun`, `dipa_id_sub_komponen`, `created_at`, `updated_at`) VALUES
(1, 'AKN001', 'Akun Pertama', 1, '2017-06-05 03:06:58', '2017-06-05 03:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_akun_detail`
--

CREATE TABLE `tbl_dipa_akun_detail` (
  `dipa_id_detail_akun` int(10) UNSIGNED NOT NULL,
  `dipa_nama_detail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_volume` int(11) NOT NULL DEFAULT '0',
  `dipa_satuan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_harga_satuan` int(11) NOT NULL DEFAULT '0',
  `dipa_jenis_akun` enum('1','2','3','4','5','6','7','8','9','10') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_id_akun` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_kegiatan`
--

CREATE TABLE `tbl_dipa_kegiatan` (
  `dipa_id_kegiatan` int(10) UNSIGNED NOT NULL,
  `dipa_kode_kegiatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_kegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_id_program` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_kegiatan`
--

INSERT INTO `tbl_dipa_kegiatan` (`dipa_id_kegiatan`, `dipa_kode_kegiatan`, `dipa_nama_kegiatan`, `dipa_id_program`, `created_at`, `updated_at`) VALUES
(1, 'KGT001', 'Kegiatan Pertama', 1, '2017-06-05 03:03:40', '2017-06-05 03:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_komponen`
--

CREATE TABLE `tbl_dipa_komponen` (
  `dipa_id_komponen` int(10) UNSIGNED NOT NULL,
  `dipa_kode_komponen` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_komponen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_id_sub_output` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_komponen`
--

INSERT INTO `tbl_dipa_komponen` (`dipa_id_komponen`, `dipa_kode_komponen`, `dipa_nama_komponen`, `dipa_id_sub_output`, `created_at`, `updated_at`) VALUES
(1, 'KMP001', 'Komponen Pertama', 1, '2017-06-05 03:05:55', '2017-06-05 03:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_output`
--

CREATE TABLE `tbl_dipa_output` (
  `dipa_id_output` int(10) UNSIGNED NOT NULL,
  `dipa_kode_output` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_output` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_id_kegiatan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_output`
--

INSERT INTO `tbl_dipa_output` (`dipa_id_output`, `dipa_kode_output`, `dipa_nama_output`, `dipa_id_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'OPT01', 'Output Pertama', 1, '2017-06-05 03:04:38', '2017-06-05 03:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_program`
--

CREATE TABLE `tbl_dipa_program` (
  `dipa_id_program` int(10) UNSIGNED NOT NULL,
  `dipa_kode_program` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_program` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_id_tahun_anggaran` int(10) UNSIGNED NOT NULL,
  `dipa_id_satuan_kerja` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_program`
--

INSERT INTO `tbl_dipa_program` (`dipa_id_program`, `dipa_kode_program`, `dipa_nama_program`, `dipa_id_tahun_anggaran`, `dipa_id_satuan_kerja`, `created_at`, `updated_at`) VALUES
(1, 'PRG001', 'Program Pertama', 3, 1, '2017-06-05 03:03:05', '2017-06-05 03:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_sub_komponen`
--

CREATE TABLE `tbl_dipa_sub_komponen` (
  `dipa_id_sub_komponen` int(10) UNSIGNED NOT NULL,
  `dipa_kode_sub_komponen` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_sub_komponen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_id_komponen` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_sub_komponen`
--

INSERT INTO `tbl_dipa_sub_komponen` (`dipa_id_sub_komponen`, `dipa_kode_sub_komponen`, `dipa_nama_sub_komponen`, `dipa_id_komponen`, `created_at`, `updated_at`) VALUES
(1, 'SKP001', 'Sub Komponen Pertama', 1, '2017-06-05 03:06:20', '2017-06-05 03:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_sub_output`
--

CREATE TABLE `tbl_dipa_sub_output` (
  `dipa_id_sub_output` int(10) UNSIGNED NOT NULL,
  `dipa_kode_sub_output` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_nama_sub_output` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_id_output` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_sub_output`
--

INSERT INTO `tbl_dipa_sub_output` (`dipa_id_sub_output`, `dipa_kode_sub_output`, `dipa_nama_sub_output`, `dipa_id_output`, `created_at`, `updated_at`) VALUES
(1, 'SOP001', 'Sub Output Pertama', 1, '2017-06-05 03:05:10', '2017-06-05 03:05:10');

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
(1, 'jokowi', 'Joko Widodo', '$2a$06$./ID8bKbeapNvkk6UMecT.M6MMRk3OzxmoLDD5aDhkKEawdK8tZsW', '1', '1', NULL, 'nn0oVpUiryusIuG0q77xjzx0d7SroN5fI8dQEg2x6K9gpGIM7m3SXeDniUYz', NULL, NULL, NULL),
(3, 'tes', 'tes', '$2y$10$o4R29exLp4xfiWioHqgrhe/lJ47G/zvnuzXVF5EoqXnqUymHgiKhe', '1', '6', NULL, NULL, '2017-06-03 06:51:59', '2017-06-05 02:42:36', NULL),
(5, 'herbert', 'herbert', '$2y$10$IZ70QpfFEhzrS.ODIdeTQ.L9tLHAHPlRE9FCeSlAixjy9VFJDkJHK', '1', '4', 1, NULL, '2017-06-05 03:01:12', '2017-06-05 03:01:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan_kerja`
--

CREATE TABLE `tbl_satuan_kerja` (
  `dipa_id_satuan_kerja` int(10) UNSIGNED NOT NULL,
  `dipa_kode_satuan_kerja` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_satuan_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_satuan_kerja_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_satuan_kerja`
--

INSERT INTO `tbl_satuan_kerja` (`dipa_id_satuan_kerja`, `dipa_kode_satuan_kerja`, `dipa_satuan_kerja`, `dipa_satuan_kerja_status`, `created_at`, `updated_at`) VALUES
(1, '00011', 'Gay Officer 2', '1', '2017-06-05 02:01:52', '2017-06-05 02:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_anggaran`
--

CREATE TABLE `tbl_tahun_anggaran` (
  `dipa_id_tahun_anggaran` int(10) UNSIGNED NOT NULL,
  `dipa_tahun_anggaran` int(11) NOT NULL,
  `dipa_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tahun_anggaran`
--

INSERT INTO `tbl_tahun_anggaran` (`dipa_id_tahun_anggaran`, `dipa_tahun_anggaran`, `dipa_status`) VALUES
(1, 2010, '0'),
(2, 2011, '0'),
(3, 2012, '1'),
(4, 2013, '0'),
(5, 2015, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dipa_akun`
--
ALTER TABLE `tbl_dipa_akun`
  ADD PRIMARY KEY (`dipa_id_akun`),
  ADD KEY `tbl_dipa_akun_dipa_id_sub_komponen_foreign` (`dipa_id_sub_komponen`);

--
-- Indexes for table `tbl_dipa_akun_detail`
--
ALTER TABLE `tbl_dipa_akun_detail`
  ADD PRIMARY KEY (`dipa_id_detail_akun`),
  ADD KEY `tbl_dipa_akun_detail_dipa_id_akun_foreign` (`dipa_id_akun`);

--
-- Indexes for table `tbl_dipa_kegiatan`
--
ALTER TABLE `tbl_dipa_kegiatan`
  ADD PRIMARY KEY (`dipa_id_kegiatan`),
  ADD KEY `tbl_dipa_kegiatan_dipa_id_program_foreign` (`dipa_id_program`);

--
-- Indexes for table `tbl_dipa_komponen`
--
ALTER TABLE `tbl_dipa_komponen`
  ADD PRIMARY KEY (`dipa_id_komponen`),
  ADD KEY `tbl_dipa_komponen_dipa_id_sub_output_foreign` (`dipa_id_sub_output`);

--
-- Indexes for table `tbl_dipa_output`
--
ALTER TABLE `tbl_dipa_output`
  ADD PRIMARY KEY (`dipa_id_output`),
  ADD KEY `tbl_dipa_output_dipa_id_kegiatan_foreign` (`dipa_id_kegiatan`);

--
-- Indexes for table `tbl_dipa_program`
--
ALTER TABLE `tbl_dipa_program`
  ADD PRIMARY KEY (`dipa_id_program`),
  ADD KEY `tbl_dipa_program_dipa_id_tahun_anggaran_foreign` (`dipa_id_tahun_anggaran`),
  ADD KEY `tbl_dipa_program_dipa_id_satuan_kerja_foreign` (`dipa_id_satuan_kerja`);

--
-- Indexes for table `tbl_dipa_sub_komponen`
--
ALTER TABLE `tbl_dipa_sub_komponen`
  ADD PRIMARY KEY (`dipa_id_sub_komponen`),
  ADD KEY `tbl_dipa_sub_komponen_dipa_id_komponen_foreign` (`dipa_id_komponen`);

--
-- Indexes for table `tbl_dipa_sub_output`
--
ALTER TABLE `tbl_dipa_sub_output`
  ADD PRIMARY KEY (`dipa_id_sub_output`),
  ADD KEY `tbl_dipa_sub_output_dipa_id_output_foreign` (`dipa_id_output`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`dipa_id_pengguna`),
  ADD UNIQUE KEY `tbl_pengguna_username_unique` (`username`),
  ADD KEY `tbl_pengguna_dipa_id_satuan_kerja_foreign` (`dipa_id_satuan_kerja`);

--
-- Indexes for table `tbl_satuan_kerja`
--
ALTER TABLE `tbl_satuan_kerja`
  ADD PRIMARY KEY (`dipa_id_satuan_kerja`);

--
-- Indexes for table `tbl_tahun_anggaran`
--
ALTER TABLE `tbl_tahun_anggaran`
  ADD PRIMARY KEY (`dipa_id_tahun_anggaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_dipa_akun`
--
ALTER TABLE `tbl_dipa_akun`
  MODIFY `dipa_id_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_akun_detail`
--
ALTER TABLE `tbl_dipa_akun_detail`
  MODIFY `dipa_id_detail_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dipa_kegiatan`
--
ALTER TABLE `tbl_dipa_kegiatan`
  MODIFY `dipa_id_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_komponen`
--
ALTER TABLE `tbl_dipa_komponen`
  MODIFY `dipa_id_komponen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_output`
--
ALTER TABLE `tbl_dipa_output`
  MODIFY `dipa_id_output` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_program`
--
ALTER TABLE `tbl_dipa_program`
  MODIFY `dipa_id_program` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_sub_komponen`
--
ALTER TABLE `tbl_dipa_sub_komponen`
  MODIFY `dipa_id_sub_komponen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_sub_output`
--
ALTER TABLE `tbl_dipa_sub_output`
  MODIFY `dipa_id_sub_output` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `dipa_id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_satuan_kerja`
--
ALTER TABLE `tbl_satuan_kerja`
  MODIFY `dipa_id_satuan_kerja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_tahun_anggaran`
--
ALTER TABLE `tbl_tahun_anggaran`
  MODIFY `dipa_id_tahun_anggaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dipa_akun`
--
ALTER TABLE `tbl_dipa_akun`
  ADD CONSTRAINT `tbl_dipa_akun_dipa_id_sub_komponen_foreign` FOREIGN KEY (`dipa_id_sub_komponen`) REFERENCES `tbl_dipa_sub_komponen` (`dipa_id_sub_komponen`);

--
-- Constraints for table `tbl_dipa_akun_detail`
--
ALTER TABLE `tbl_dipa_akun_detail`
  ADD CONSTRAINT `tbl_dipa_akun_detail_dipa_id_akun_foreign` FOREIGN KEY (`dipa_id_akun`) REFERENCES `tbl_dipa_akun` (`dipa_id_akun`);

--
-- Constraints for table `tbl_dipa_kegiatan`
--
ALTER TABLE `tbl_dipa_kegiatan`
  ADD CONSTRAINT `tbl_dipa_kegiatan_dipa_id_program_foreign` FOREIGN KEY (`dipa_id_program`) REFERENCES `tbl_dipa_program` (`dipa_id_program`);

--
-- Constraints for table `tbl_dipa_komponen`
--
ALTER TABLE `tbl_dipa_komponen`
  ADD CONSTRAINT `tbl_dipa_komponen_dipa_id_sub_output_foreign` FOREIGN KEY (`dipa_id_sub_output`) REFERENCES `tbl_dipa_sub_output` (`dipa_id_sub_output`);

--
-- Constraints for table `tbl_dipa_output`
--
ALTER TABLE `tbl_dipa_output`
  ADD CONSTRAINT `tbl_dipa_output_dipa_id_kegiatan_foreign` FOREIGN KEY (`dipa_id_kegiatan`) REFERENCES `tbl_dipa_kegiatan` (`dipa_id_kegiatan`);

--
-- Constraints for table `tbl_dipa_program`
--
ALTER TABLE `tbl_dipa_program`
  ADD CONSTRAINT `tbl_dipa_program_dipa_id_satuan_kerja_foreign` FOREIGN KEY (`dipa_id_satuan_kerja`) REFERENCES `tbl_satuan_kerja` (`dipa_id_satuan_kerja`),
  ADD CONSTRAINT `tbl_dipa_program_dipa_id_tahun_anggaran_foreign` FOREIGN KEY (`dipa_id_tahun_anggaran`) REFERENCES `tbl_tahun_anggaran` (`dipa_id_tahun_anggaran`);

--
-- Constraints for table `tbl_dipa_sub_komponen`
--
ALTER TABLE `tbl_dipa_sub_komponen`
  ADD CONSTRAINT `tbl_dipa_sub_komponen_dipa_id_komponen_foreign` FOREIGN KEY (`dipa_id_komponen`) REFERENCES `tbl_dipa_komponen` (`dipa_id_komponen`);

--
-- Constraints for table `tbl_dipa_sub_output`
--
ALTER TABLE `tbl_dipa_sub_output`
  ADD CONSTRAINT `tbl_dipa_sub_output_dipa_id_output_foreign` FOREIGN KEY (`dipa_id_output`) REFERENCES `tbl_dipa_output` (`dipa_id_output`);

--
-- Constraints for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD CONSTRAINT `tbl_pengguna_dipa_id_satuan_kerja_foreign` FOREIGN KEY (`dipa_id_satuan_kerja`) REFERENCES `tbl_satuan_kerja` (`dipa_id_satuan_kerja`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
