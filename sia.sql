-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 03:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun1`
--

CREATE TABLE `akun1` (
  `id_akun1` int(6) UNSIGNED NOT NULL,
  `kode_akun1` varchar(6) NOT NULL,
  `nama_akun1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akun1`
--

INSERT INTO `akun1` (`id_akun1`, `kode_akun1`, `nama_akun1`) VALUES
(1, '1', 'Aktiva'),
(2, '2', 'Kewajiban'),
(3, '3', 'Modal'),
(4, '4', 'Pendapatan'),
(5, '5', 'Beban');

-- --------------------------------------------------------

--
-- Table structure for table `akun2`
--

CREATE TABLE `akun2` (
  `id_akun2` int(6) UNSIGNED NOT NULL,
  `kode_akun2` int(6) UNSIGNED NOT NULL,
  `nama_akun2` varchar(40) NOT NULL,
  `kode_akun1` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akun2`
--

INSERT INTO `akun2` (`id_akun2`, `kode_akun2`, `nama_akun2`, `kode_akun1`) VALUES
(1, 11, 'Aktiva Lancar', 1),
(2, 12, 'Aktiva Tetap', 1),
(3, 21, 'Utang Jangka Pendek', 2),
(4, 22, 'Utang Jangka Panjang', 2),
(5, 31, 'Modal Pemilik', 3),
(6, 32, 'Prive Pemilik', 3),
(7, 41, 'Pendapatan Tour Travel', 4),
(8, 42, 'Pendapatan Export Import', 4),
(9, 51, 'Beban Usaha', 5),
(10, 52, 'Beban Diluar Usaha', 5),
(13, 43, 'Pendapatan Lainnya', 4);

-- --------------------------------------------------------

--
-- Table structure for table `akun3`
--

CREATE TABLE `akun3` (
  `id_akun3` int(6) UNSIGNED NOT NULL,
  `kode_akun3` int(6) UNSIGNED NOT NULL,
  `nama_akun3` varchar(70) NOT NULL,
  `kode_akun2` int(6) UNSIGNED NOT NULL,
  `kode_akun1` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akun3`
--

INSERT INTO `akun3` (`id_akun3`, `kode_akun3`, `nama_akun3`, `kode_akun2`, `kode_akun1`) VALUES
(1, 1101, 'Kas', 11, 1),
(2, 1102, 'Piutang Usaha', 11, 1),
(3, 1103, 'Perlengkapan Kantor', 11, 1),
(4, 1104, 'Sewa Dibayar di muka', 11, 1),
(5, 1105, 'Asuransi Dibayar di muka', 11, 1),
(6, 1201, 'Peralatan Kantor', 12, 1),
(7, 1202, 'Akumulasi Penyusutan P.Kantor', 12, 1),
(8, 1203, 'Tanah', 12, 1),
(9, 2101, 'Utang Usaha', 21, 2),
(10, 2102, 'Utang Gaji', 21, 2),
(11, 2103, 'Pendapatan diterima di muka', 21, 2),
(12, 2201, 'Utang Hipotek', 22, 2),
(13, 2202, 'Utang Obligasi', 22, 2),
(14, 3101, 'Modal', 31, 3),
(15, 3201, 'Prive Tuan Tamer', 32, 3),
(16, 4101, 'Pendapatan Jasa Tour & Travel', 41, 4),
(17, 4201, 'Pendapatan Export Import', 42, 4),
(18, 5101, 'Beban Gaji', 51, 5),
(19, 5102, 'Beban Iklan', 51, 5),
(20, 5103, 'Beban Asuransi', 51, 5),
(21, 5104, 'Beban Wifi', 51, 5),
(22, 5105, 'Beban Listrik', 51, 5),
(23, 5106, 'Beban Sewa', 51, 5),
(24, 5107, 'Beban Penyusutan Perlat Kantor', 51, 5),
(25, 5108, 'Beban Perlengkapan Kantor', 51, 5),
(26, 5201, 'Beban Bunga', 52, 5),
(28, 1106, 'Pinjaman Karyawan', 11, 1),
(29, 4301, 'Pendapatan Lainnya', 43, 4);

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:08:32', 1),
(2, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:18:12', 1),
(3, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:19:33', 1),
(4, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:20:43', 1),
(5, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:22:21', 1),
(6, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:24:17', 1),
(7, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:25:03', 1),
(8, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:27:07', 1),
(9, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:28:12', 1),
(10, '::1', 'julfi@gmail.com', 1, '2023-02-22 23:28:56', 1),
(11, '::1', 'julfi@gmail.com', 1, '2023-02-23 01:01:51', 1),
(12, '::1', 'julfi@gmail.com', 1, '2023-02-23 20:55:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2023-01-22-180319', 'App\\Database\\Migrations\\CreateAkun1', 'default', 'App', 1674411678, 1),
(5, '2023-01-24-150629', 'App\\Database\\Migrations\\CreateAkun2', 'default', 'App', 1674573858, 2),
(6, '2023-01-26-022947', 'App\\Database\\Migrations\\CreateAkun3', 'default', 'App', 1674792592, 3),
(7, '2023-01-31-064819', 'App\\Database\\Migrations\\CreateTransaksi', 'default', 'App', 1675220247, 4),
(8, '2023-02-01-035126', 'App\\Database\\Migrations\\CreateNilai', 'default', 'App', 1675228596, 5),
(9, '2023-02-13-074229', 'App\\Database\\Migrations\\CreateStatus', 'default', 'App', 1676274621, 6),
(16, '2023-02-19-021312', 'App\\Database\\Migrations\\CreatePenyesuaian', 'default', 'App', 1676779914, 7),
(17, '2023-02-19-022033', 'App\\Database\\Migrations\\CreateNilaiPenyesuaian', 'default', 'App', 1676779915, 7),
(19, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1677128668, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(5) UNSIGNED NOT NULL,
  `id_transaksi` int(5) UNSIGNED NOT NULL,
  `kode_akun3` int(6) UNSIGNED NOT NULL,
  `debit` float UNSIGNED NOT NULL,
  `kredit` float UNSIGNED NOT NULL,
  `id_status` int(5) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_transaksi`, `kode_akun3`, `debit`, `kredit`, `id_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 16, 1101, 30000000, 0, 5, '2023-02-19 19:43:14', '2023-02-20 22:21:06', NULL),
(17, 16, 3101, 0, 30000000, 5, '2023-02-19 19:43:14', '2023-02-20 22:21:06', NULL),
(18, 17, 1103, 800000, 0, 5, '2023-02-19 19:44:00', '2023-02-20 22:21:06', NULL),
(19, 17, 1101, 0, 800000, 5, '2023-02-19 19:44:00', '2023-02-20 22:21:06', NULL),
(20, 18, 5104, 180000, 0, 5, '2023-02-19 19:44:43', '2023-02-20 22:21:06', NULL),
(21, 18, 1101, 0, 180000, 5, '2023-02-19 19:44:43', '2023-02-20 22:21:06', NULL),
(22, 19, 1101, 2800000, 0, 1, '2023-02-20 20:28:05', '2023-02-20 22:21:06', NULL),
(23, 19, 4101, 0, 2800000, 1, '2023-02-20 20:28:05', '2023-02-20 22:21:06', NULL),
(24, 20, 1101, 5000000, 0, 1, '2023-02-20 20:35:43', '2023-02-20 22:21:06', NULL),
(25, 20, 4101, 0, 5000000, 1, '2023-02-20 20:35:43', '2023-02-20 22:21:06', NULL),
(26, 21, 5105, 100000, 0, 5, '2023-02-20 22:21:51', '2023-02-20 22:21:51', NULL),
(27, 21, 1101, 0, 100000, 5, '2023-02-20 22:21:51', '2023-02-20 22:21:51', NULL),
(28, 22, 3201, 1000000, 0, 5, '2023-02-21 00:41:20', '2023-02-21 00:41:20', NULL),
(29, 22, 1101, 0, 1000000, 5, '2023-02-21 00:41:20', '2023-02-21 00:41:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilaipenyesuaian`
--

CREATE TABLE `tbl_nilaipenyesuaian` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_penyesuaian` int(5) UNSIGNED NOT NULL,
  `kode_akun3` int(6) UNSIGNED NOT NULL,
  `debit` float UNSIGNED NOT NULL,
  `kredit` float UNSIGNED NOT NULL,
  `id_status` int(5) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nilaipenyesuaian`
--

INSERT INTO `tbl_nilaipenyesuaian` (`id`, `id_penyesuaian`, `kode_akun3`, `debit`, `kredit`, `id_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 3, 5108, 500000, 0, 5, '2023-02-20 08:11:56', '2023-02-20 21:30:58', NULL),
(6, 3, 1103, 0, 500000, 5, '2023-02-20 08:11:56', '2023-02-20 21:30:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyesuaian`
--

CREATE TABLE `tbl_penyesuaian` (
  `id_penyesuaian` int(5) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `nilai` float NOT NULL,
  `waktu` int(12) NOT NULL,
  `jumlah` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_penyesuaian`
--

INSERT INTO `tbl_penyesuaian` (`id_penyesuaian`, `tanggal`, `deskripsi`, `nilai`, `waktu`, `jumlah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '2023-02-20', 'Perlengkapan Kantor', 500000, 1, 500000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(6) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status`) VALUES
(1, 'Penerimaan'),
(2, 'Pengeluaran'),
(3, 'Investasi Masuk'),
(4, 'Investasi Keluar'),
(5, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(5) UNSIGNED NOT NULL,
  `kwitansi` varchar(4) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `ketjurnal` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `kwitansi`, `tanggal`, `deskripsi`, `ketjurnal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, '0001', '2023-02-06', 'Modal Awal', 'Modal Awal Bulan', NULL, NULL, NULL),
(17, '0002', '2023-02-07', 'Perlengkapan Kantor', 'Perlengkapan Kantor', NULL, NULL, NULL),
(18, '0003', '2023-02-13', 'Beban Wifi', 'Beban Wifi', NULL, NULL, NULL),
(19, '0004', '2023-02-21', 'Pendapatan Jasa', 'Pendapatan Jasa dari pembookingan hotel dan paket umroh', NULL, NULL, NULL),
(20, '0005', '2023-02-22', 'Pendapatan Jasa', 'Pendapatan Jasa dari pembookingan hotel dan paket umroh', NULL, NULL, NULL),
(21, '0006', '2023-02-25', 'Beban Listrik', 'Beban Listrik', NULL, NULL, NULL),
(22, '0007', '2023-02-25', 'Prive', 'Prive Mr. Tamer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `gbr` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `gbr`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'julfi@gmail.com', 'julfiowitt', NULL, 'default.png', '$2y$10$jv1oDZCaphkxr72sSm3Myusk2hT0FoPJYSSDux9OgzKjAQvLA8yZa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-02-22 23:07:23', '2023-02-22 23:07:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun1`
--
ALTER TABLE `akun1`
  ADD PRIMARY KEY (`id_akun1`);

--
-- Indexes for table `akun2`
--
ALTER TABLE `akun2`
  ADD PRIMARY KEY (`id_akun2`),
  ADD KEY `akun2_kode_akun1_foreign` (`kode_akun1`);

--
-- Indexes for table `akun3`
--
ALTER TABLE `akun3`
  ADD PRIMARY KEY (`id_akun3`),
  ADD KEY `akun3_kode_akun1_foreign` (`kode_akun1`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `tbl_nilai_id_transaksi_foreign` (`id_transaksi`);

--
-- Indexes for table `tbl_nilaipenyesuaian`
--
ALTER TABLE `tbl_nilaipenyesuaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_nilaipenyesuaian_id_penyesuaian_foreign` (`id_penyesuaian`);

--
-- Indexes for table `tbl_penyesuaian`
--
ALTER TABLE `tbl_penyesuaian`
  ADD PRIMARY KEY (`id_penyesuaian`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun1`
--
ALTER TABLE `akun1`
  MODIFY `id_akun1` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `akun2`
--
ALTER TABLE `akun2`
  MODIFY `id_akun2` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `akun3`
--
ALTER TABLE `akun3`
  MODIFY `id_akun3` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_nilaipenyesuaian`
--
ALTER TABLE `tbl_nilaipenyesuaian`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_penyesuaian`
--
ALTER TABLE `tbl_penyesuaian`
  MODIFY `id_penyesuaian` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun2`
--
ALTER TABLE `akun2`
  ADD CONSTRAINT `akun2_kode_akun1_foreign` FOREIGN KEY (`kode_akun1`) REFERENCES `akun1` (`id_akun1`);

--
-- Constraints for table `akun3`
--
ALTER TABLE `akun3`
  ADD CONSTRAINT `akun3_kode_akun1_foreign` FOREIGN KEY (`kode_akun1`) REFERENCES `akun1` (`id_akun1`);

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilaipenyesuaian`
--
ALTER TABLE `tbl_nilaipenyesuaian`
  ADD CONSTRAINT `tbl_nilaipenyesuaian_id_penyesuaian_foreign` FOREIGN KEY (`id_penyesuaian`) REFERENCES `tbl_penyesuaian` (`id_penyesuaian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
