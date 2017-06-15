-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2017 at 09:37 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_30_161801_dipa_tahunAnggaran', 1),
(4, '2017_05_30_161847_dipa_satKerja', 1),
(5, '2017_05_30_162028_dipa_program', 1),
(6, '2017_05_30_162048_dipa_kegiatan', 1),
(7, '2017_05_30_162105_dipa_output', 1),
(8, '2017_05_30_162127_dipa_suboutput', 1),
(9, '2017_05_30_162156_dipa_komponen', 1),
(10, '2017_05_30_162211_dipa_subkomponen', 1),
(11, '2017_05_30_162227_dipa_akun', 1),
(12, '2017_05_30_162240_dipa_rincian', 1),
(13, '2017_06_01_220552_add_soft_deletes_user', 1),
(14, '2017_06_02_084707_update_enum_user', 1),
(15, '2017_06_04_042949_add_id_satker_user', 1),
(16, '2017_06_04_090352_add_enum_detail_akun', 1),
(17, '2017_06_04_205747_change_field_satuan', 1),
(18, '2017_06_06_101227_dipa_pembayaran', 1),
(19, '2017_06_06_102836_dipa_pembayaran_syarat', 1),
(20, '2017_06_06_103611_dipa_pembayaran_checklist_spp', 1),
(21, '2017_06_06_104251_dipa_pembayaran_checklist_spm', 1),
(22, '2017_06_06_104510_dipa_pembayaran_checklist_sp2d', 1),
(23, '2017_06_06_104750_dipa_pembayaran_checklist_sinkronisasi_saiba', 1),
(24, '2017_06_06_105910_dipa_pembayaran_checklist_sinkronisasi_simak', 1),
(25, '2017_06_06_110209_dipa_pembayaran_checklist_sinkronisasi_perlengkapan', 1),
(26, '2017_06_08_182337_update_akun_again', 1),
(27, '2017_06_09_170410_update_enum_pmb', 1),
(28, '2017_06_10_033531_change_date_pembayaran', 1),
(29, '2017_06_15_075051_set_null_syarat', 1);

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
(1, 'AK01', 'AKUN 01', 1, '2017-06-15 12:00:27', '2017-06-15 12:00:27'),
(2, 'AK02', 'AKUN 02', 1, '2017-06-15 12:00:44', '2017-06-15 12:00:44'),
(3, 'AK03', 'AKUN 03', 1, '2017-06-15 12:00:59', '2017-06-15 12:00:59');

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
  `dipa_jenis_akun` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_id_akun` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_akun_detail`
--

INSERT INTO `tbl_dipa_akun_detail` (`dipa_id_detail_akun`, `dipa_nama_detail`, `dipa_volume`, `dipa_satuan`, `dipa_harga_satuan`, `dipa_jenis_akun`, `dipa_id_akun`, `created_at`, `updated_at`) VALUES
(1, 'DETAIL AKUN 01', 2, 'ORANG', 5000, '1', 3, '2017-06-15 12:03:08', '2017-06-15 12:03:08'),
(2, 'DETAIL AKUN 02', 3, 'ORANG', 35000, '2', 3, '2017-06-15 12:03:56', '2017-06-15 12:03:56'),
(3, 'Detail Akun 03', 5, 'Orang', 500000, '1', 3, '2017-06-15 12:57:30', '2017-06-15 12:57:30');

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
(1, 'KGT01', 'KEGIATAN 01', 1, '2017-06-15 11:55:52', '2017-06-15 11:55:52'),
(2, 'KGT02', 'KEGIATAN 02', 1, '2017-06-15 11:56:41', '2017-06-15 11:56:41');

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
(1, 'KP01', 'KOMPONEN 01', 1, '2017-06-15 11:58:53', '2017-06-15 11:58:53'),
(2, 'KP02', 'KOMPONEN 02', 1, '2017-06-15 11:59:15', '2017-06-15 11:59:15');

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
(1, 'OP01', 'OUTPUT 01', 2, '2017-06-15 11:57:02', '2017-06-15 11:57:02'),
(2, 'OP02', 'OUTPUT 02', 2, '2017-06-15 11:57:25', '2017-06-15 11:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pembayaran`
--

CREATE TABLE `tbl_dipa_pembayaran` (
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `dipa_pembayaran_tanggal` date DEFAULT NULL,
  `dipa_jenis_pembayaran` enum('1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_pembayaran_nilai` double NOT NULL,
  `dipa_pembayaran_keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_pembayaran_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_id_detail_akun` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pembayaran`
--

INSERT INTO `tbl_dipa_pembayaran` (`dipa_pembayaran_id`, `dipa_pembayaran_tanggal`, `dipa_jenis_pembayaran`, `dipa_pembayaran_nilai`, `dipa_pembayaran_keterangan`, `dipa_pembayaran_status`, `dipa_id_detail_akun`, `created_at`, `updated_at`) VALUES
(2, '2017-06-15', '1', 5000, 'PEMBAYARAN KE 1', '1', 1, '2017-06-15 12:09:34', '2017-06-15 12:14:51'),
(6, '2017-06-15', '1', 5000, 'Pembayaran Ke 2', '1', 1, '2017-06-15 12:31:04', '2017-06-15 12:56:06'),
(7, '2017-06-15', '1', 50000, 'Pembayaran Pertama', '1', 2, '2017-06-15 12:56:55', '2017-06-15 12:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pmb_check_sink_perlengkapan`
--

CREATE TABLE `tbl_dipa_pmb_check_sink_perlengkapan` (
  `dipa_pmb_check_sink_id` int(10) UNSIGNED NOT NULL,
  `dipa_tanggal_sink` datetime NOT NULL,
  `dipa_sink_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_status_sink` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pmb_check_sink_perlengkapan`
--

INSERT INTO `tbl_dipa_pmb_check_sink_perlengkapan` (`dipa_pmb_check_sink_id`, `dipa_tanggal_sink`, `dipa_sink_keterangan`, `dipa_status_sink`, `dipa_pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, '0000-00-00 00:00:00', '', '0', 2, '2017-06-15 13:02:10', '2017-06-15 13:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pmb_check_sink_saiba`
--

CREATE TABLE `tbl_dipa_pmb_check_sink_saiba` (
  `dipa_pmb_check_sink_id` int(10) UNSIGNED NOT NULL,
  `dipa_tanggal_sinkronisasi` datetime NOT NULL,
  `dipa_sinkronisasi_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_status_sinki` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pmb_check_sink_saiba`
--

INSERT INTO `tbl_dipa_pmb_check_sink_saiba` (`dipa_pmb_check_sink_id`, `dipa_tanggal_sinkronisasi`, `dipa_sinkronisasi_keterangan`, `dipa_status_sinki`, `dipa_pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, '0000-00-00 00:00:00', '', '0', 2, '2017-06-15 13:02:10', '2017-06-15 13:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pmb_check_sink_simak`
--

CREATE TABLE `tbl_dipa_pmb_check_sink_simak` (
  `dipa_pmb_check_sink_id` int(10) UNSIGNED NOT NULL,
  `dipa_tanggal_sink` datetime NOT NULL,
  `dipa_sink_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_status_sink` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pmb_check_sink_simak`
--

INSERT INTO `tbl_dipa_pmb_check_sink_simak` (`dipa_pmb_check_sink_id`, `dipa_tanggal_sink`, `dipa_sink_keterangan`, `dipa_status_sink`, `dipa_pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, '2017-06-15 08:06:31', '', '1', 2, '2017-06-15 13:02:10', '2017-06-15 13:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pmb_check_sp2d`
--

CREATE TABLE `tbl_dipa_pmb_check_sp2d` (
  `dipa_pmb_check_sp2d_id` int(10) UNSIGNED NOT NULL,
  `dipa_sp2d_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_sp2d_nilai` double NOT NULL,
  `dipa_sp2d_tanggal` datetime NOT NULL,
  `dipa_sp2d_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pmb_check_sp2d`
--

INSERT INTO `tbl_dipa_pmb_check_sp2d` (`dipa_pmb_check_sp2d_id`, `dipa_sp2d_no`, `dipa_sp2d_nilai`, `dipa_sp2d_tanggal`, `dipa_sp2d_keterangan`, `dipa_pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, '01', 5000, '2017-06-16 00:00:00', 'Coba 01.1.1', 2, '2017-06-15 13:05:40', '2017-06-15 13:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pmb_check_spm`
--

CREATE TABLE `tbl_dipa_pmb_check_spm` (
  `dipa_pmb_check_spm_id` int(10) UNSIGNED NOT NULL,
  `dipa_spm_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_spm_nilai` double NOT NULL,
  `dipa_spm_tanggal` datetime NOT NULL,
  `dipa_spm_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pmb_check_spm`
--

INSERT INTO `tbl_dipa_pmb_check_spm` (`dipa_pmb_check_spm_id`, `dipa_spm_no`, `dipa_spm_nilai`, `dipa_spm_tanggal`, `dipa_spm_keterangan`, `dipa_pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, '01', 5000, '2017-06-16 00:00:00', 'Coba 01.1', 2, '2017-06-15 13:05:02', '2017-06-15 13:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pmb_check_spp`
--

CREATE TABLE `tbl_dipa_pmb_check_spp` (
  `dipa_pmb_check_spp_id` int(10) UNSIGNED NOT NULL,
  `dipa_spp_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_spp_nilai` double NOT NULL,
  `dipa_spp_tanggal` datetime NOT NULL,
  `dipa_spp_keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipa_sinkronisasi_simak` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_sinkronisasi_saiba` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_sinkronisasi_perlengkapan` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pmb_check_spp`
--

INSERT INTO `tbl_dipa_pmb_check_spp` (`dipa_pmb_check_spp_id`, `dipa_spp_no`, `dipa_spp_nilai`, `dipa_spp_tanggal`, `dipa_spp_keterangan`, `dipa_sinkronisasi_simak`, `dipa_sinkronisasi_saiba`, `dipa_sinkronisasi_perlengkapan`, `dipa_pembayaran_id`, `created_at`, `updated_at`) VALUES
(1, '01', 5000, '2017-06-16 00:00:00', 'Coba 01', '1', '1', '1', 2, '2017-06-15 13:02:10', '2017-06-15 13:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dipa_pmb_syarat`
--

CREATE TABLE `tbl_dipa_pmb_syarat` (
  `dipa_pmb_syarat_id` int(10) UNSIGNED NOT NULL,
  `dipa_syarat_1` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_dokumen_syarat_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_syarat_2` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_dokumen_syarat_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_syarat_3` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_dokumen_syarat_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_syarat_4` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_dokumen_syarat_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_syarat_5` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_dokumen_syarat_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_syarat_6` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_dokumen_syarat_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_syarat_7` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `dipa_dokumen_syarat_7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dipa_pmb_syarat`
--

INSERT INTO `tbl_dipa_pmb_syarat` (`dipa_pmb_syarat_id`, `dipa_syarat_1`, `dipa_dokumen_syarat_1`, `dipa_syarat_2`, `dipa_dokumen_syarat_2`, `dipa_syarat_3`, `dipa_dokumen_syarat_3`, `dipa_syarat_4`, `dipa_dokumen_syarat_4`, `dipa_syarat_5`, `dipa_dokumen_syarat_5`, `dipa_syarat_6`, `dipa_dokumen_syarat_6`, `dipa_syarat_7`, `dipa_dokumen_syarat_7`, `dipa_pembayaran_id`, `created_at`, `updated_at`) VALUES
(2, '1', '1497554049pacman.jpg', '1', '0', '1', '0', '1', '1497554049pacman.jpg', '1', '0', '1', '0', '1', '1497554049pacman.jpg', 2, '2017-06-15 12:09:34', '2017-06-15 12:14:51'),
(6, '1', '1497555064pacman.jpg', '1', '0', '1', '0', '1', '0', '1', '0', '1', '1497555124pacman.jpg', '1', '0', 6, '2017-06-15 12:31:04', '2017-06-15 12:56:08'),
(7, '1', '1497556616pacman.jpg', '1', NULL, '1', NULL, '1', NULL, '1', NULL, '1', NULL, '1', NULL, 7, '2017-06-15 12:56:56', '2017-06-15 12:56:56');

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
(1, 'PRG01', 'PROGRAM 01', 3, 3, '2017-06-15 11:54:26', '2017-06-15 11:54:55'),
(2, 'PRG02', 'PROGRAM 02', 3, 3, '2017-06-15 11:55:14', '2017-06-15 11:55:14');

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
(1, 'SKP01', 'SUB KOMPONEN 01', 2, '2017-06-15 11:59:42', '2017-06-15 11:59:42'),
(2, 'SKP02', 'SUB KOMPONEN 02', 2, '2017-06-15 11:59:58', '2017-06-15 11:59:58');

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
(1, 'SOP01', 'SUB OUTPUT 01', 1, '2017-06-15 11:57:55', '2017-06-15 11:57:55'),
(2, 'SOP02', 'SUB OUTPUT 02', 1, '2017-06-15 11:58:15', '2017-06-15 11:58:15');

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
  `dipa_jenis_pengguna` enum('1','2','3','4','5','6','7','8') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'admin', 'Admin 01', '$2y$10$ANnBIlm0zyV3LPEUeaUL1edu/CATFda4GSnZFRgbPh.WiQzYJv0Vi', '1', '1', NULL, '5ppwA8VWkDIzhwiCwDD1WW8OEri7DzPzeVYwU1fxsYVhtDKrkHiAfmnFcdWm', NULL, NULL, NULL),
(2, 'kpa01', 'KPA 01', '$2y$10$VlC5b1N.enMZ4WQyVEdUL.Gokw/Cdc/vInsRmfFyX3po83RWUcWh.', '1', '2', NULL, NULL, '2017-06-15 11:30:24', '2017-06-15 11:30:24', NULL),
(3, 'kpa02', 'KPA 02', '$2y$10$yBh3EqE6rEdEHyky01kddO2BXdlzKQx3BD8WGm2o0qz4AC4kTaYge', '1', '2', NULL, NULL, '2017-06-15 11:33:32', '2017-06-15 11:33:32', NULL),
(4, 'ppk01', 'PPK 01', '$2y$10$FuDqVlr8odB8Xx.STMZxOe7PUDIDujrRWBbf9NLf821aVidWt93Dq', '1', '3', 3, 'LT2QXAiO6TbXQJnU9lGeBSVnGnId4VxW89YFBLyUhHif3rOQVzTesJ6XBBgM', '2017-06-15 11:34:22', '2017-06-15 12:59:39', NULL),
(5, 'ppk02', 'PPK 02', '$2y$10$j9jxC9UN3crg9c1J0otcAefXDtKs6e7.kp251ZpimW.Lf3hMbkPlG', '1', '3', 2, NULL, '2017-06-15 11:34:45', '2017-06-15 11:34:45', NULL),
(6, 'satker01', 'Staf Pengelolah 01', '$2y$10$MRL/FY5jm4MOOLJvZGAa7OzREqN0q3h66C73RA6DMdp0YYo6ba/X2', '1', '4', 3, 'Me9dS11TS1KRyvJ7lKUO4W8NvmXkjBGEBz5M7tB8o1lG4SSXIChGMvkVk7xX', '2017-06-15 11:36:27', '2017-06-15 11:37:35', NULL),
(7, 'satker02', 'Staf Pengelolah 02', '$2y$10$wrtDlnSkCUY9O9aMEmrmSOCyVaRecqBcJHQ.zeRn9C8VD4RBypu9S', '1', '4', 4, NULL, '2017-06-15 11:37:09', '2017-06-15 11:37:09', NULL),
(8, 'ppspm01', 'PPSPM 01', '$2y$10$JP6gOpiWCPenHH.PLYj5lOXFALVLTYwFGjDJyIgW4vAGnGL2AiihW', '1', '5', NULL, 'oY2MKXv3aaLCEzNRfoDxv7aPoiEdlcXL0TkEEp5eh2fdntHS0byptJEgZ74P', '2017-06-15 11:39:07', '2017-06-15 11:39:07', NULL),
(9, 'ppspm02', 'PPSPM 02', '$2y$10$E5q6zPgMeeWN2YHw1r9FFe20Rd8dZ3oSQ0CsjsEEKhNdXQCva0d2u', '1', '5', NULL, NULL, '2017-06-15 11:39:30', '2017-06-15 11:39:30', NULL),
(10, 'simak', 'Operator SIMAK', '$2y$10$f32YDP2Mf/rq.SJa24M1GO2muYF57b1ZeVGXKMpvLKJGYP3X7Fojq', '1', '6', NULL, NULL, '2017-06-15 11:40:00', '2017-06-15 11:41:12', NULL),
(11, 'saiba', 'Operator SAIBA', '$2y$10$x8CUKS/HolaK6nM5M6qNneA/5Kmfm7pRgtd0HSKMSF.CXFiHLuLkq', '1', '7', NULL, NULL, '2017-06-15 11:40:51', '2017-06-15 11:40:51', NULL),
(12, 'perlengkapan', 'Operator Perlengkapan', '$2y$10$Fednrb.0kF2JlloLbxPSTOlnPb/G8mudW1sPNPdOdfqZ8Y2rgW8Da', '1', '8', NULL, NULL, '2017-06-15 11:41:37', '2017-06-15 11:41:37', NULL),
(13, 'bendahara', 'Bendahara', '$2y$10$ek762IxH/jp/vRQcocrsK.2gYYq0qaGR1mNO6AJ3a0EBa6Co7k7CO', '1', '', NULL, NULL, '2017-06-15 11:41:55', '2017-06-15 11:41:55', NULL);

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
(1, 'SATKER01', 'SATUAN KERJA 01', '1', '2017-06-15 11:08:17', '2017-06-15 11:08:17'),
(2, 'SATKER02', 'SATUAN KERJA 02', '1', '2017-06-15 11:09:37', '2017-06-15 11:09:37'),
(3, 'SATKER03', 'SATUAN KERJA 03', '1', '2017-06-15 11:10:08', '2017-06-15 11:10:08'),
(4, 'SATKER04', 'SATUAN KERJA 04', '1', '2017-06-15 11:10:49', '2017-06-15 11:10:49');

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
(1, 2015, '0'),
(2, 2016, '0'),
(3, 2017, '1');

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
-- Indexes for table `tbl_dipa_pembayaran`
--
ALTER TABLE `tbl_dipa_pembayaran`
  ADD PRIMARY KEY (`dipa_pembayaran_id`),
  ADD KEY `tbl_dipa_pembayaran_dipa_id_detail_akun_foreign` (`dipa_id_detail_akun`);

--
-- Indexes for table `tbl_dipa_pmb_check_sink_perlengkapan`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_perlengkapan`
  ADD PRIMARY KEY (`dipa_pmb_check_sink_id`),
  ADD KEY `tbl_dipa_pmb_check_sink_perlengkapan_dipa_pembayaran_id_foreign` (`dipa_pembayaran_id`);

--
-- Indexes for table `tbl_dipa_pmb_check_sink_saiba`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_saiba`
  ADD PRIMARY KEY (`dipa_pmb_check_sink_id`),
  ADD KEY `tbl_dipa_pmb_check_sink_saiba_dipa_pembayaran_id_foreign` (`dipa_pembayaran_id`);

--
-- Indexes for table `tbl_dipa_pmb_check_sink_simak`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_simak`
  ADD PRIMARY KEY (`dipa_pmb_check_sink_id`),
  ADD KEY `tbl_dipa_pmb_check_sink_simak_dipa_pembayaran_id_foreign` (`dipa_pembayaran_id`);

--
-- Indexes for table `tbl_dipa_pmb_check_sp2d`
--
ALTER TABLE `tbl_dipa_pmb_check_sp2d`
  ADD PRIMARY KEY (`dipa_pmb_check_sp2d_id`),
  ADD KEY `tbl_dipa_pmb_check_sp2d_dipa_pembayaran_id_foreign` (`dipa_pembayaran_id`);

--
-- Indexes for table `tbl_dipa_pmb_check_spm`
--
ALTER TABLE `tbl_dipa_pmb_check_spm`
  ADD PRIMARY KEY (`dipa_pmb_check_spm_id`),
  ADD KEY `tbl_dipa_pmb_check_spm_dipa_pembayaran_id_foreign` (`dipa_pembayaran_id`);

--
-- Indexes for table `tbl_dipa_pmb_check_spp`
--
ALTER TABLE `tbl_dipa_pmb_check_spp`
  ADD PRIMARY KEY (`dipa_pmb_check_spp_id`),
  ADD KEY `tbl_dipa_pmb_check_spp_dipa_pembayaran_id_foreign` (`dipa_pembayaran_id`);

--
-- Indexes for table `tbl_dipa_pmb_syarat`
--
ALTER TABLE `tbl_dipa_pmb_syarat`
  ADD PRIMARY KEY (`dipa_pmb_syarat_id`),
  ADD KEY `tbl_dipa_pmb_syarat_dipa_pembayaran_id_foreign` (`dipa_pembayaran_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_dipa_akun`
--
ALTER TABLE `tbl_dipa_akun`
  MODIFY `dipa_id_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_dipa_akun_detail`
--
ALTER TABLE `tbl_dipa_akun_detail`
  MODIFY `dipa_id_detail_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_dipa_kegiatan`
--
ALTER TABLE `tbl_dipa_kegiatan`
  MODIFY `dipa_id_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_dipa_komponen`
--
ALTER TABLE `tbl_dipa_komponen`
  MODIFY `dipa_id_komponen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_dipa_output`
--
ALTER TABLE `tbl_dipa_output`
  MODIFY `dipa_id_output` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_dipa_pembayaran`
--
ALTER TABLE `tbl_dipa_pembayaran`
  MODIFY `dipa_pembayaran_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_dipa_pmb_check_sink_perlengkapan`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_perlengkapan`
  MODIFY `dipa_pmb_check_sink_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_pmb_check_sink_saiba`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_saiba`
  MODIFY `dipa_pmb_check_sink_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_pmb_check_sink_simak`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_simak`
  MODIFY `dipa_pmb_check_sink_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_pmb_check_sp2d`
--
ALTER TABLE `tbl_dipa_pmb_check_sp2d`
  MODIFY `dipa_pmb_check_sp2d_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_pmb_check_spm`
--
ALTER TABLE `tbl_dipa_pmb_check_spm`
  MODIFY `dipa_pmb_check_spm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_pmb_check_spp`
--
ALTER TABLE `tbl_dipa_pmb_check_spp`
  MODIFY `dipa_pmb_check_spp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dipa_pmb_syarat`
--
ALTER TABLE `tbl_dipa_pmb_syarat`
  MODIFY `dipa_pmb_syarat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_dipa_program`
--
ALTER TABLE `tbl_dipa_program`
  MODIFY `dipa_id_program` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_dipa_sub_komponen`
--
ALTER TABLE `tbl_dipa_sub_komponen`
  MODIFY `dipa_id_sub_komponen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_dipa_sub_output`
--
ALTER TABLE `tbl_dipa_sub_output`
  MODIFY `dipa_id_sub_output` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `dipa_id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_satuan_kerja`
--
ALTER TABLE `tbl_satuan_kerja`
  MODIFY `dipa_id_satuan_kerja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_tahun_anggaran`
--
ALTER TABLE `tbl_tahun_anggaran`
  MODIFY `dipa_id_tahun_anggaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Constraints for table `tbl_dipa_pembayaran`
--
ALTER TABLE `tbl_dipa_pembayaran`
  ADD CONSTRAINT `tbl_dipa_pembayaran_dipa_id_detail_akun_foreign` FOREIGN KEY (`dipa_id_detail_akun`) REFERENCES `tbl_dipa_akun_detail` (`dipa_id_detail_akun`);

--
-- Constraints for table `tbl_dipa_pmb_check_sink_perlengkapan`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_perlengkapan`
  ADD CONSTRAINT `tbl_dipa_pmb_check_sink_perlengkapan_dipa_pembayaran_id_foreign` FOREIGN KEY (`dipa_pembayaran_id`) REFERENCES `tbl_dipa_pembayaran` (`dipa_pembayaran_id`);

--
-- Constraints for table `tbl_dipa_pmb_check_sink_saiba`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_saiba`
  ADD CONSTRAINT `tbl_dipa_pmb_check_sink_saiba_dipa_pembayaran_id_foreign` FOREIGN KEY (`dipa_pembayaran_id`) REFERENCES `tbl_dipa_pembayaran` (`dipa_pembayaran_id`);

--
-- Constraints for table `tbl_dipa_pmb_check_sink_simak`
--
ALTER TABLE `tbl_dipa_pmb_check_sink_simak`
  ADD CONSTRAINT `tbl_dipa_pmb_check_sink_simak_dipa_pembayaran_id_foreign` FOREIGN KEY (`dipa_pembayaran_id`) REFERENCES `tbl_dipa_pembayaran` (`dipa_pembayaran_id`);

--
-- Constraints for table `tbl_dipa_pmb_check_sp2d`
--
ALTER TABLE `tbl_dipa_pmb_check_sp2d`
  ADD CONSTRAINT `tbl_dipa_pmb_check_sp2d_dipa_pembayaran_id_foreign` FOREIGN KEY (`dipa_pembayaran_id`) REFERENCES `tbl_dipa_pembayaran` (`dipa_pembayaran_id`);

--
-- Constraints for table `tbl_dipa_pmb_check_spm`
--
ALTER TABLE `tbl_dipa_pmb_check_spm`
  ADD CONSTRAINT `tbl_dipa_pmb_check_spm_dipa_pembayaran_id_foreign` FOREIGN KEY (`dipa_pembayaran_id`) REFERENCES `tbl_dipa_pembayaran` (`dipa_pembayaran_id`);

--
-- Constraints for table `tbl_dipa_pmb_check_spp`
--
ALTER TABLE `tbl_dipa_pmb_check_spp`
  ADD CONSTRAINT `tbl_dipa_pmb_check_spp_dipa_pembayaran_id_foreign` FOREIGN KEY (`dipa_pembayaran_id`) REFERENCES `tbl_dipa_pembayaran` (`dipa_pembayaran_id`);

--
-- Constraints for table `tbl_dipa_pmb_syarat`
--
ALTER TABLE `tbl_dipa_pmb_syarat`
  ADD CONSTRAINT `tbl_dipa_pmb_syarat_dipa_pembayaran_id_foreign` FOREIGN KEY (`dipa_pembayaran_id`) REFERENCES `tbl_dipa_pembayaran` (`dipa_pembayaran_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
