-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 02:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_complain`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `f_users` (`vid` INT, `vkind` INT) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
    DECLARE vuser VARCHAR(50);
	
	IF vkind = 1 THEN -- name
	  SELECT `name` INTO vuser FROM users
	    WHERE id = vid;
	ELSEIF vkind = 2 THEN -- avatar image
	  SELECT `avatar` INTO vuser FROM users
	    WHERE id = vid;
	ELSEIF vkind = 3 THEN -- email
	  SELECT `email` INTO vuser FROM users
	    WHERE id = vid;
	END IF;
	
	RETURN vuser;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `auto_numbers`
--

CREATE TABLE `auto_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `auto_numbers`
--

INSERT INTO `auto_numbers` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(1, 'd0079d3e751f227e3d4d836afc1b2c2f', 5, '2019-11-19 08:15:55', '2019-11-19 08:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiket_id` int(10) UNSIGNED NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 : belum di tangani; 1 : Di tangani; 2 : NG;',
  `notif` int(1) DEFAULT NULL COMMENT '0 : Terkirim 1: dibaca',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `kode`, `auto_kode`, `tiket_id`, `pesan`, `to_user_id`, `status`, `notif`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(23, 'DL408', 'PROD0001', 26, 'Cek setap proses kerja dan cari solusi perbaikan yang  tepat.', 6, 4, 1, 4, NULL, '2020-02-06 23:39:17', NULL),
(24, 'DL408', 'PROD0001', 26, 'Cek setap proses kerja dan cari solusi perbaikan yang  tepat.', 7, 4, 1, 4, NULL, '2020-02-06 23:39:17', NULL),
(26, '1011A123', 'PROD0002', 28, 'Cek semua sepatu artikel 1011A123 yang sudah diproduksi\r\nCari initi permasalahannya dan buat solusi agar masalah ini tidak terjadi kembali', 5, 4, 1, 4, NULL, '2020-02-07 21:51:19', NULL),
(27, '1011A123', 'PROD0002', 28, 'Cek semua sepatu artikel 1011A123 yang sudah diproduksi\r\nCari initi permasalahannya dan buat solusi agar masalah ini tidak terjadi kembali', 6, 4, 1, 4, NULL, '2020-02-07 21:51:19', NULL),
(28, '1011A123', 'PROD0002', 28, 'Cek semua sepatu artikel 1011A123 yang sudah diproduksi\r\nCari initi permasalahannya dan buat solusi agar masalah ini tidak terjadi kembali', 7, 4, 1, 4, NULL, '2020-02-07 21:51:19', NULL),
(32, 'D3K0Q', 'PROD0003', 30, 'Cek ulang semua sepatu yang sudah diproduksi.\r\nCari penyebab terjadinya masalah kerut di  upper dan buat solusinya.', 5, 4, 1, 4, NULL, '2020-02-11 22:37:05', NULL),
(33, 'D3K0Q', 'PROD0003', 30, 'Cek ulang semua sepatu yang sudah diproduksi.\r\nCari penyebab terjadinya masalah kerut di  upper dan buat solusinya.', 7, 4, 1, 4, NULL, '2020-02-11 22:37:05', NULL),
(34, 'D3K0Q', 'PROD0003', 30, 'Cek ulang semua sepatu yang sudah diproduksi.\r\nCari penyebab terjadinya masalah kerut di  upper dan buat solusinya.', 6, 4, 1, 4, NULL, '2020-02-11 22:37:05', NULL),
(35, 'D2K4N', 'PROD0004', 31, 'cek proses produksi dan buat solusi perbaikannya', 5, 4, 1, 4, NULL, '2020-02-18 08:11:27', NULL),
(36, 'D2K4N', 'PROD0004', 31, 'cek proses produksi dan buat solusi perbaikannya', 6, 4, 1, 4, NULL, '2020-02-18 08:11:27', NULL),
(37, 'D2K4N', 'PROD0004', 31, 'cek proses produksi dan buat solusi perbaikannya', 0, 4, 1, 4, NULL, '2020-02-18 08:11:27', NULL);

--
-- Triggers `memo`
--
DELIMITER $$
CREATE TRIGGER `tr_tiket_memo` AFTER INSERT ON `memo` FOR EACH ROW BEGIN
	UPDATE mstiket  SET status = 1 AND notif = 1 WHERE id = NEW.tiket_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `memotiket`
--

CREATE TABLE `memotiket` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tiket_id` int(10) UNSIGNED NOT NULL,
  `memo_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='digunakan untuk memo yang sedang di kerjakan oleh masing masing bagian\r\n' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_menu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu`, `sub_menu`, `parent_id`, `link`, `icon`, `is_active`, `target`, `created_at`, `updated_at`) VALUES
(100, 'Dashboard', NULL, 0, NULL, 'home', 1, 'dashboard', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(200, 'User Management', NULL, 0, NULL, 'users', 1, 'user', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(201, NULL, 'User Profile', 200, 'user-profile', 'users', 0, 'rofile', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(202, NULL, 'List User', 200, 'list-user', NULL, 1, 'list-user', '2020-01-15 15:14:01', '2020-01-15 15:14:04'),
(300, 'Komplain', NULL, 0, NULL, 'list', 1, 'complain', '2019-08-22 08:16:05', '2019-08-22 08:16:08'),
(301, '', 'Tiket', 300, 'tiket', 'list', 1, 'tiket', '2019-08-22 08:16:05', '2019-08-22 08:16:08'),
(302, '', 'History', 300, 'tiket-history', 'history', 1, 'history', '2019-08-22 08:16:05', '2019-08-22 08:16:08'),
(400, 'Memo', NULL, 0, NULL, 'book', 1, 'complain', '2019-10-16 03:39:10', '2019-10-16 03:39:13'),
(401, NULL, 'create Memo', 400, 'create-memo', 'book', 1, 'list', '2019-10-16 03:41:06', '2019-10-16 03:41:08'),
(402, NULL, 'List Tiket', 400, 'tiket-list', NULL, 1, 'tiket-list', '2020-01-15 13:29:27', '2020-01-15 13:29:30'),
(500, 'Inspeksi', NULL, 0, NULL, 'zoom-in', 1, 'inspeksi', '2019-10-16 03:42:46', '2019-10-16 03:42:48'),
(501, '', 'Cek', 500, 'inspek', 'zoom-in', 1, 'inspeksi', '2019-10-16 03:52:21', '2019-10-16 03:52:23'),
(600, 'Laporan', NULL, 0, NULL, 'file-text', 1, 'laporan', '2019-10-16 03:48:06', '2019-10-16 03:48:09'),
(601, '', 'Laporan Tiket', 600, 'laporan-tiket', 'file-text', 1, 'laporan-tiket', '2019-10-16 03:49:34', '2019-10-16 03:49:37'),
(700, 'Checking', NULL, 0, NULL, 'award', 1, 'pmqacek', '2019-11-28 14:40:14', '2019-11-28 14:40:21'),
(701, NULL, 'Cek', 700, 'pmqa-cek', NULL, 1, 'pmqa-cek', '2019-11-28 14:40:18', '2019-11-28 14:40:23'),
(702, NULL, 'Produck Cek', 700, 'produck-cek', NULL, 1, 'produck-cek', '2020-01-10 12:37:21', '2020-01-10 12:37:28'),
(800, 'History', NULL, 0, NULL, 'book', 1, 'historys', '2019-11-28 14:42:07', '2019-11-28 14:42:10'),
(801, NULL, 'memo', 800, 'history-memo', NULL, 1, 'history-memo', '2019-11-28 14:43:01', '2019-11-28 14:43:03'),
(802, NULL, 'Rekapitulasi Data Komplain', 800, 'chart-report', NULL, 1, 'chart-report', '2020-02-25 14:50:43', '2020-02-25 14:50:47'),
(900, 'Timeline', NULL, 0, NULL, 'activity', 1, 'timeline', '2019-12-01 02:51:19', '2019-12-01 02:51:24'),
(901, '', 'status', 900, 'list-status', NULL, 1, 'list-status', '2020-01-10 12:37:23', '2020-01-10 12:37:25'),
(1000, 'Inspeksi', NULL, 0, NULL, 'zoom-in', 1, 'inspeksi', '2019-10-16 03:42:46', '2019-10-16 03:42:48'),
(1001, NULL, 'Result', 1000, 'result-inspeck', NULL, 1, 'result-inspeck', '2020-01-16 13:44:28', '2020-01-16 13:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 100, '2019-08-22 08:09:47', '2019-08-22 08:09:49'),
(2, 1, 200, '2019-08-22 08:09:51', '2019-08-22 08:09:53'),
(3, 6, 100, '2019-08-29 06:05:05', '2019-08-29 06:05:08'),
(4, 6, 300, '2019-08-29 06:20:05', '2019-08-29 06:20:07'),
(6, 2, 100, '2019-10-16 03:39:35', '2019-10-16 03:39:36'),
(7, 2, 400, '2019-10-16 03:39:57', '2019-10-16 03:39:59'),
(8, 2, 1000, '2019-10-16 03:43:12', '2019-10-16 03:43:13'),
(9, 2, 600, '2019-10-16 03:48:29', '2019-10-16 03:48:30'),
(10, 4, 100, '2019-11-28 13:52:06', '2019-11-28 13:52:11'),
(11, 5, 100, '2019-11-28 14:40:39', '2019-11-28 14:40:42'),
(12, 4, 500, '2019-11-28 14:43:45', '2019-11-28 14:43:46'),
(13, 5, 700, '2019-11-28 14:43:58', '2019-11-28 14:44:00'),
(14, 5, 800, '2019-11-28 14:44:16', '2019-11-28 14:44:19'),
(15, 4, 800, '2019-11-28 14:44:16', '2019-11-28 14:44:16'),
(16, 3, 100, '2019-11-28 14:44:16', '2019-11-28 14:44:16'),
(17, 3, 1000, '2020-01-22 13:55:24', '2020-01-22 13:55:26'),
(18, 3, 600, '2019-11-28 14:44:16', '2019-11-28 14:44:16'),
(19, 6, 900, '2019-12-01 02:54:15', '2019-12-01 02:54:20'),
(20, 5, 600, '2020-01-15 15:14:56', '2020-01-15 15:14:59'),
(21, 4, 600, '2020-01-15 15:15:34', '2020-01-15 15:15:37'),
(22, 3, 800, '2019-11-28 14:46:11', '2019-11-28 14:46:14'),
(25, 6, 600, '2020-01-30 15:13:27', '2020-01-30 15:13:30'),
(29, 2, 800, '2020-02-06 13:46:19', '2020-02-06 13:46:23'),
(30, 1, 600, '2020-02-11 15:39:12', '2020-02-11 15:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(63, '2014_10_12_000000_create_users_table', 1),
(64, '2014_10_12_100000_create_password_resets_table', 1),
(65, '2017_08_03_055212_create_auto_numbers', 1),
(66, '2019_08_22_135831_create_table_menus', 1),
(67, '2019_08_22_140302_create_table_roles', 1),
(68, '2019_08_22_140523_create_menu_role_table', 1),
(69, '2019_08_22_141041_create_table_mstiket', 1),
(70, '2019_10_16_100620_create_memotiket_table', 1),
(71, '2019_10_16_100822_create_memo_table', 1),
(72, '2019_10_16_100846_create_msinspek_table', 1),
(73, '2019_11_19_141917_create_msproduck_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msinspek`
--

CREATE TABLE `msinspek` (
  `id` int(10) UNSIGNED NOT NULL,
  `tiket_id` int(10) UNSIGNED NOT NULL,
  `memo_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hasil Inspeksi berupa OK/NG',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0 : belum cek; 1 : Oke Cek PMPA; 2 : NG;',
  `notif` int(11) DEFAULT '0' COMMENT '0 : baru, 1, process, 2, waiting Approved',
  `kind_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `msinspek`
--

INSERT INTO `msinspek` (`id`, `tiket_id`, `memo_id`, `category`, `result`, `description`, `images`, `status`, `notif`, `kind_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(24, 26, 23, 'Onitsuka Tiger', 'OK', 'Hasil pengecekan dari proses perbaikan tidak ada masalah.', 'pmqa/images/5o37bLIHR7l9odjq846yspUYSKIf8cqmETbz87HE.jpeg', 1, 0, 'P', 7, NULL, '2020-02-06 23:49:18', '2020-02-06 23:49:18'),
(26, 28, 27, 'Running', 'OK', 'Hasil pengecekan dari hasil perbaikan OK\r\nPengecekan sepatu yang sudah diproduksi menemukan 25% sepatu Ng.\r\n25% sepatu yang NG akan dilakukan produksi kembali', 'pmqa/images/6x2Jl7hjhQ9jLNcYwmV9PDnAMlsSjvDYjDnUfqOp.png', 1, 0, 'P', 7, NULL, '2020-02-07 22:08:41', '2020-02-07 22:08:41'),
(27, 30, 34, 'Onitsuka Tiger', 'OK', 'Semua sepatu  yang suah diproduksi telah selesai dicek ulang, hasilnya ditemukan 35% sepatu kerut.\r\n35% sepatu NG akan diproduksi ulang.\r\nPengecekan hasil perbaikan sudah OK.', 'pmqa/images/5XPakjVKEqceAGcUTKhmDqcXscS5jBQAXIj3ehYz.jpeg', 1, 0, 'P', 7, NULL, '2020-02-11 23:06:24', '2020-02-11 23:06:24'),
(28, 31, 36, 'Onitsuka Tiger', 'OK', 'inti masalah sudah sesuai dengan perbaikan yang dilakukan \r\nhasil OK', '', 1, 0, 'P', 7, NULL, '2020-02-18 08:18:08', '2020-02-18 08:18:08');

--
-- Triggers `msinspek`
--
DELIMITER $$
CREATE TRIGGER `tr_ins_cekMemo` AFTER INSERT ON `msinspek` FOR EACH ROW BEGIN
	IF NEW.result = 'OK' THEN
		UPDATE `memo` SET notif = 1, `status` = 1 WHERE `tiket_id` = NEW.tiket_id ;
		UPDATE mstiket SET notif = 3, `status` = 3 WHERE `id` = NEW.tiket_id;
	ELSE 
		UPDATE `memo` SET notif = 1, `status` = 2 WHERE `tiket_id` = NEW.tiket_id ;
		UPDATE mstiket SET notif = 3, `status` = 3 WHERE `id` = NEW.tiket_id;
	END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mskind`
--

CREATE TABLE `mskind` (
  `id` int(5) UNSIGNED NOT NULL,
  `kind_id` varchar(5) NOT NULL,
  `kind_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mskind`
--

INSERT INTO `mskind` (`id`, `kind_id`, `kind_name`) VALUES
(1, 'Q', 'Product'),
(2, 'P', 'Production');

-- --------------------------------------------------------

--
-- Table structure for table `msproduck`
--

CREATE TABLE `msproduck` (
  `id` int(10) UNSIGNED NOT NULL,
  `tiket_id` int(10) UNSIGNED NOT NULL,
  `memo_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Cutting, Sewing, Assembling',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0 : belum cek; 1 : Oke Cek PMPA; 2 : NG;',
  `notif` int(11) DEFAULT '0' COMMENT '0 : baru, 1, process, 2: PMQA Cek; 3, waiting Approved',
  `kind_id` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `msproduck`
--

INSERT INTO `msproduck` (`id`, `tiket_id`, `memo_id`, `category`, `result`, `description`, `images`, `status`, `notif`, `kind_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, 26, 23, 'Onitsuka Tiger', 'Assembling', 'Inti permasalahan terdapat pada proses pola sepatu. Penempatan outsole miring tidak sesuai bentuk sepatu sehingga pola sepatu menjadi miring, dan ketika proses penempelan outsole ke upper mengikuti garis pola yang miring. \r\n\r\nSolusinya diadakan meeting dan pembelajaran ulang kepada operator. Ditambahkan sinar laser pada mesin pola agar ketika pola bisa terlihat garis tengah sepatu.', 'inspek/images/iPKQ3WM5B5S1vo0vF1cZNuqKuY0aJwkKGHNcVeJH.jpeg', 1, 2, 'P', 6, NULL, '2020-02-06 23:46:31', '2020-02-06 23:46:31'),
(11, 28, 27, 'Running', 'Stockfit', 'Inti masalahnya yaitu adanya penumpukan di konveyor sehingga lem terlanjur mengering dan proses penempelanpun menjadi lama.\r\nKecepatan konveyor harus stabil sesuai dengan SOP dan proses penempelan outsole jangan terlalu lama.', 'inspek/images/R9SGyH6yJ0xUtnSUbU50U2X9rOFmZAB7DkCWeMfW.png', 1, 2, 'P', 6, NULL, '2020-02-07 21:57:13', '2020-02-07 21:57:13'),
(13, 30, 34, 'Onitsuka Tiger', 'Sewing', 'Inti masalah berasal dari proses jahit antara quarter dan vamp tidak sejajar.\r\nLakukan pembelajaran ulang pada operator jahit harus sesuai SOP', 'inspek/images/Oo28hDu8WIhG26yj08BjtXlkqvgTwCusEdceSyGX.jpeg', 1, 2, 'P', 6, NULL, '2020-02-11 22:59:10', '2020-02-11 22:59:10'),
(14, 31, 36, 'Onitsuka Tiger', 'Cutting', 'Masalah proses press suhu tidak sesuai SOP\r\nsolusinya proses press harus mengikuti SOP', 'inspek/images/6axJAerXAxDWYO8qnLiEOAfw0GQHHqRkQMOF4N3e.jpeg', 1, 2, 'P', 6, NULL, '2020-02-18 08:13:55', '2020-02-18 08:13:55');

--
-- Triggers `msproduck`
--
DELIMITER $$
CREATE TRIGGER `tr_ins_produk` AFTER INSERT ON `msproduck` FOR EACH ROW BEGIN
	UPDATE memo SET notif = 1, `status` = 1 WHERE `tiket_id` = NEW.tiket_id AND memo.`id` = new.memo_id;
	UPDATE mstiket SET notif = 2, `status` = 1 WHERE `id` = NEW.tiket_id;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mstiket`
--

CREATE TABLE `mstiket` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_complain` enum('PRODUCT','PRODUCTION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0 : baru, 1: Process; 2 :  Not Good; 3 : Persetujuan; 4 : Closed;',
  `notif` int(11) DEFAULT '0' COMMENT '0 : new;  1 : untuk memo; 2: untuk ke pmqa; 3 : kembali ke Direktur untuk persetujuan;',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mstiket`
--

INSERT INTO `mstiket` (`id`, `category`, `kode`, `jenis_complain`, `images`, `description`, `status`, `notif`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(26, 'Onitsuka Tiger', 'DL408', 'PRODUCT', 'images/SEtNq1aYT6yWHFhHm3QRrwElCYIiryd7ii0o8rOS.png', 'Order No. IY2001112S-01 terdapat masalah sepatu miring', 4, 4, 2, 4, NULL, NULL, '2020-02-06 23:33:08', '2020-02-06 23:50:29'),
(28, 'Running', '1011A123', 'PRODUCT', 'images/91v4zQQ94MBkskbv6UuQhc9UKl2Al256wbhkyVky.png', 'Order No. IY2001113S-01\r\nDitemukan masalah outsole dan midsole lekang dengan persentase NG 30% ekspor negara china.', 4, 4, 2, 4, NULL, NULL, '2020-02-07 21:47:45', '2020-02-07 22:10:28'),
(30, 'Onitsuka Tiger', 'D3K0Q', 'PRODUCT', 'images/Az0TRH5SZEuKjMFw9rFUs7C8m5dlSXRorfABiku2.png', 'Order No. IY2001321S-01 \r\nDitemukan masalah upper kerut dengan persentase NG 15%.\r\nEkspor tujuan negara Singapur.', 4, 4, 2, 4, NULL, NULL, '2020-02-11 22:30:05', '2020-02-11 23:08:22'),
(31, 'Onitsuka Tiger', 'D2K4N', 'PRODUCT', 'images/6q10bX34L20H3awg46uqRaIJ3qIoD4AkJzbAYZJF.png', 'ORDER 11214082 ditemukan NG sekitar 30%', 4, 4, 2, 4, NULL, NULL, '2020-02-18 08:06:15', '2020-02-18 08:20:07');

--
-- Triggers `mstiket`
--
DELIMITER $$
CREATE TRIGGER `tr_upd_mstiket` AFTER UPDATE ON `mstiket` FOR EACH ROW BEGIN
	if(NEW.status = 4)then
		update memo set memo.status = 4  
			where memo.tiket_id = NEW.id
			AND memo.kode = NEW.kode;
	end if;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(2, 'Direktur', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(3, 'Manager Produksi', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(4, 'Kepala Bagian', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(5, 'PMQA', '2019-08-22 01:05:12', '2019-08-22 01:05:12'),
(6, 'Member', '2019-08-22 01:05:12', '2019-08-22 01:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '6',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '/images/userpic.jpg',
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `role_id`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', 'admin@mail.com', NULL, '$2y$10$jl/kQqTR1OlhW83fWVGr2.9fzmjSd55MaBBtIgYLMMWRHG9wupUQa', 1, '/images/userpic.jpg', 'ACTIVE', 'Teyrrwl5DpOI1aQcfBIPp1QT9aLKommcI5cpQv4zG3dOe64fOCel1C6qi1nR', '2019-08-22 01:07:30', '2019-08-22 01:07:30'),
(2, 'Costumer', 'cs@mail.com', 'cs@mail.com', NULL, '$2y$10$yrpuZPjty29IabV8Yr1Pyu7Z8nR/4dpQeo5CL.TMecQw/7T7K.kfq', 6, '/images/userpic.jpg', 'ACTIVE', 'pZWmlkatlPvzWlr04xaDsNA6B06ejnKIpF86c7uiYc105dv9A7dazfoefwp2', '2019-08-28 23:04:22', '2019-08-28 23:04:22'),
(3, 'cs2', 'cs2@mail.com', 'cs2@mail.com', NULL, '$2y$10$FiMQAsiXhOFBYsWmFRk.uOWVd03F8n1sL.v4F9xyUUTt/LKm.KRi2', 6, '/images/userpic.jpg', 'ACTIVE', 'Xbh3kdBubO0dz9NG25XyVmiGgj45T9ofiy7vnv46GURGht4oyJ4MIXd4cnED', '2019-08-28 23:16:33', '2019-08-28 23:16:33'),
(4, 'Direktur', 'direktur@mail.com', 'direktur@mail.com', NULL, '$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK', 2, '/images/userpic.jpg', 'ACTIVE', 'Avsdpx7nElhh4zsEcSCqVHt5Bu3x9FZ1mepuU5kdKa41tFTuvCRWc20C2bvP', '2019-10-15 19:47:22', '2019-10-15 19:47:22'),
(5, 'Manager Produksi', 'manager@mail.com', 'manager@mail.com', NULL, '$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK', 3, '/images/userpic.jpg', 'ACTIVE', 'lRuV78MtrqSl5qFInbryObQk5B7W8cVwGq7o9fwNA8T6nK5jZZUivwFOTVYN', '2019-10-15 19:47:22', '2019-10-15 19:47:22'),
(6, 'Kepala Bagian', 'bagian@mail.com', 'bagian@mail.com', NULL, '$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK', 4, '/images/userpic.jpg', 'ACTIVE', 's3uVBXohHPyZigIRS9zcA8ACxJnt8CMoHy3TpJOlqvykY7zTPiWC5ELwRDY0', '2019-10-15 19:47:22', '2019-10-15 19:47:22'),
(7, 'PMQA', 'pmqa@mail.com', 'pmqa@mail.com', NULL, '$2y$10$rw3hqj2LVEs8RUvBzUNxEOslT2pnqTIc3pb7WsdqwflXSbnRKBILK', 5, '/images/userpic.jpg', 'ACTIVE', '3qKrL1JXjcFxHCEV2QNUmr9vREDYBkxZV3FBFtSCi25voUQbcyDQC7UCtCv4', '2019-10-15 19:47:22', '2020-02-06 14:45:45'),
(8, 'test', 'test@test.com', 'test@test.com', NULL, '$2y$10$VraxOPfWVg1441EI7EBpAuYl943aos6MrRQGCQUuqqE6ICBpQf1qW', 6, '/images/userpic.jpg', 'ACTIVE', '40817e9YsY64vDtTSMKoxkPhiGsBzDcGkpQMDRHJ4bhWBFNmjeTnO0Xi545q', '2020-01-25 03:26:16', '2020-01-25 03:26:16'),
(9, 'Ridwan', 'admin2@mail.com', 'admin2@mail.com', NULL, '$2y$10$8cPdoowusdb34J8zp3WECe7NAecjd6Kg8wrRqcXK9VZ6B7cz99dtO', 1, '/avatar/SDzG3fNKPg9uMw8FtNEFCfIpAAOIGAJXZAVYjKPZ.jpeg', 'INACTIVE', NULL, '2020-01-28 07:45:02', '2020-01-28 09:08:11');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vcount`
-- (See below for the actual view)
--
CREATE TABLE `vcount` (
`percent` decimal(41,0)
,`ab` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpercent`
-- (See below for the actual view)
--
CREATE TABLE `vpercent` (
`persent` decimal(42,0)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vprogres`
-- (See below for the actual view)
--
CREATE TABLE `vprogres` (
`id` int(11) unsigned
,`category` varchar(100)
,`kode` varchar(100)
,`jenis_complain` varchar(10)
,`images` varchar(200)
,`stat` varchar(200)
,`description` mediumtext
,`tanggal` timestamp
,`users` int(11)
,`percent` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtimehistory`
-- (See below for the actual view)
--
CREATE TABLE `vtimehistory` (
`id` int(11) unsigned
,`category` varchar(100)
,`kode` varchar(100)
,`jenis_complain` varchar(10)
,`images` varchar(200)
,`stat` varchar(200)
,`description` mediumtext
,`tanggal` timestamp
,`users` int(11)
,`urutan` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtimeline`
-- (See below for the actual view)
--
CREATE TABLE `vtimeline` (
`id` int(11) unsigned
,`category` varchar(100)
,`kode` varchar(100)
,`jenis_complain` varchar(10)
,`images` varchar(200)
,`stat` varchar(200)
,`description` mediumtext
,`tanggal` timestamp
,`users` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_check`
-- (See below for the actual view)
--
CREATE TABLE `v_check` (
`id` int(11) unsigned
,`tiket_id` int(11) unsigned
,`memo_id` int(11) unsigned
,`category` varchar(100)
,`result` varchar(200)
,`description` mediumtext
,`images` varchar(200)
,`status` int(11)
,`notif` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vcount`
--
DROP TABLE IF EXISTS `vcount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcount`  AS  (select sum(`l`.`percent`) AS `percent`,count(`l`.`id`) AS `ab` from `vprogres` `l` group by `l`.`id` having (sum(`l`.`percent`) < 100)) ;

-- --------------------------------------------------------

--
-- Structure for view `vpercent`
--
DROP TABLE IF EXISTS `vpercent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpercent`  AS  (select round(avg(`aa`.`percent`),0) AS `persent`,count(0) AS `count` from `vcount` `aa`) ;

-- --------------------------------------------------------

--
-- Structure for view `vprogres`
--
DROP TABLE IF EXISTS `vprogres`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vprogres`  AS  select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,'New Tiket' AS `stat`,`a`.`description` AS `description`,`a`.`created_at` AS `tanggal`,`a`.`created_by` AS `users`,15 AS `percent` from `mstiket` `a` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,NULL AS `images`,'Memo Tiket' AS `stat`,`b`.`pesan` AS `description`,`b`.`created_at` AS `tanggal`,`b`.`created_by` AS `users`,20 AS `percent` from (`mstiket` `a` left join `memo` `b` on((`a`.`id` = `b`.`tiket_id`))) group by `a`.`id`,`a`.`category`,`a`.`kode` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users`,20 AS `percent` from ((`msproduck` `d` join `mstiket` `a` on((`a`.`id` = `d`.`tiket_id`))) left join `msinspek` `c` on(((`d`.`tiket_id` = `c`.`tiket_id`) and (`d`.`kind_id` = `c`.`kind_id`)))) union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users`,(case when (`d`.`kind_id` = 'Q') then 30 when (`d`.`kind_id` = 'P') then 20 end) AS `percent` from (`msinspek` `d` join `mstiket` `a` on((`a`.`id` = `d`.`tiket_id`))) where (`d`.`kind_id` in ('Q','P')) union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,(case when (`a`.`status` = 4) then 'CLOSED' end) AS `stat`,'Approved by' AS `description`,`a`.`created_at` AS `tanggal`,`a`.`updated_by` AS `users`,25 AS `percent` from `mstiket` `a` where (`a`.`status` = 4) ;

-- --------------------------------------------------------

--
-- Structure for view `vtimehistory`
--
DROP TABLE IF EXISTS `vtimehistory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtimehistory`  AS  select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,NULL AS `images`,'Memo Tiket' AS `stat`,`b`.`pesan` AS `description`,`b`.`created_at` AS `tanggal`,`b`.`created_by` AS `users`,1 AS `urutan` from (`mstiket` `a` left join `memo` `b` on((`a`.`id` = `b`.`tiket_id`))) group by `a`.`id`,`a`.`category`,`a`.`kode` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users`,2 AS `urutan` from ((`msproduck` `d` join `mstiket` `a` on((`a`.`id` = `d`.`tiket_id`))) left join `msinspek` `c` on(((`d`.`tiket_id` = `c`.`tiket_id`) and (`d`.`kind_id` = `c`.`kind_id`)))) union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users`,3 AS `urutan` from (`msinspek` `d` join `mstiket` `a` on((`a`.`id` = `d`.`tiket_id`))) where (`d`.`kind_id` in ('Q','P')) union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,(case when (`a`.`status` = 4) then 'CLOSED' end) AS `stat`,'Approved by' AS `description`,`a`.`created_at` AS `tanggal`,`a`.`updated_by` AS `users`,4 AS `urutan` from `mstiket` `a` where (`a`.`status` = 4) ;

-- --------------------------------------------------------

--
-- Structure for view `vtimeline`
--
DROP TABLE IF EXISTS `vtimeline`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtimeline`  AS  select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,'New Tiket' AS `stat`,`a`.`description` AS `description`,`a`.`created_at` AS `tanggal`,`a`.`created_by` AS `users` from `mstiket` `a` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,NULL AS `images`,'Memo Tiket' AS `stat`,`b`.`pesan` AS `description`,`b`.`created_at` AS `tanggal`,`b`.`created_by` AS `users` from (`mstiket` `a` left join `memo` `b` on((`a`.`id` = `b`.`tiket_id`))) group by `a`.`id`,`a`.`category`,`a`.`kode` union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users` from ((`msproduck` `d` join `mstiket` `a` on((`a`.`id` = `d`.`tiket_id`))) left join `msinspek` `c` on(((`d`.`tiket_id` = `c`.`tiket_id`) and (`d`.`kind_id` = `c`.`kind_id`)))) union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`d`.`images` AS `images`,`d`.`result` AS `result`,`d`.`description` AS `description`,`d`.`created_at` AS `tanggal`,`d`.`created_by` AS `users` from (`msinspek` `d` join `mstiket` `a` on((`a`.`id` = `d`.`tiket_id`))) where (`d`.`kind_id` = 'Q') union all select `a`.`id` AS `id`,`a`.`category` AS `category`,`a`.`kode` AS `kode`,`a`.`jenis_complain` AS `jenis_complain`,`a`.`images` AS `images`,(case when (`a`.`status` = 4) then 'CLOSED' end) AS `stat`,'Approved by' AS `description`,`a`.`created_at` AS `tanggal`,`a`.`updated_by` AS `users` from `mstiket` `a` where (`a`.`status` = 4) ;

-- --------------------------------------------------------

--
-- Structure for view `v_check`
--
DROP TABLE IF EXISTS `v_check`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_check`  AS  select `a`.`id` AS `id`,`a`.`tiket_id` AS `tiket_id`,`a`.`memo_id` AS `memo_id`,`a`.`category` AS `category`,`a`.`result` AS `result`,`a`.`description` AS `description`,`a`.`images` AS `images`,`a`.`status` AS `status`,`a`.`notif` AS `notif` from `msinspek` `a` union all select `a`.`id` AS `id`,`a`.`tiket_id` AS `tiket_id`,`a`.`memo_id` AS `memo_id`,`a`.`category` AS `category`,`a`.`result` AS `result`,`a`.`description` AS `description`,`a`.`images` AS `images`,`a`.`status` AS `status`,`a`.`notif` AS `notif` from `msproduck` `a` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_numbers`
--
ALTER TABLE `auto_numbers`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_tiket_memo` (`tiket_id`);

--
-- Indexes for table `memotiket`
--
ALTER TABLE `memotiket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `menu_role_role_id_foreign` (`role_id`) USING BTREE,
  ADD KEY `menu_role_menu_id_foreign` (`menu_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `msinspek`
--
ALTER TABLE `msinspek`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mskind`
--
ALTER TABLE `mskind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msproduck`
--
ALTER TABLE `msproduck`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mstiket`
--
ALTER TABLE `mstiket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `users_username_unique` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_numbers`
--
ALTER TABLE `auto_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `memotiket`
--
ALTER TABLE `memotiket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `msinspek`
--
ALTER TABLE `msinspek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mskind`
--
ALTER TABLE `mskind`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `msproduck`
--
ALTER TABLE `msproduck`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mstiket`
--
ALTER TABLE `mstiket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `memo`
--
ALTER TABLE `memo`
  ADD CONSTRAINT `fk_tiket_memo` FOREIGN KEY (`tiket_id`) REFERENCES `mstiket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
