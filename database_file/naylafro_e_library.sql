-- Adminer 4.8.1 MySQL 10.6.22-MariaDB-cll-lve dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE `activity_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) DEFAULT NULL,
  `deskripsi` varchar(191) NOT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `activity_logs` (`id`, `user_id`, `deskripsi`, `ip_address`, `created_at`, `updated_at`) VALUES
(1,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-17 09:13:58',	'2025-06-17 09:13:58'),
(2,	'1',	'Login sistem :Admin',	'36.77.109.251',	'2025-06-17 12:14:48',	'2025-06-17 12:14:48'),
(3,	'1',	'Logout sistem: Admin',	'36.77.109.251',	'2025-06-17 12:30:26',	'2025-06-17 12:30:26'),
(4,	'1',	'Login sistem :Admin',	'36.77.109.251',	'2025-06-17 12:38:50',	'2025-06-17 12:38:50'),
(5,	'1',	'Login sistem :Admin',	'36.77.109.251',	'2025-06-17 12:40:19',	'2025-06-17 12:40:19'),
(6,	'1',	'Logout sistem: Admin',	'36.77.109.251',	'2025-06-17 12:47:18',	'2025-06-17 12:47:18'),
(7,	'1',	'Login sistem :Admin',	'110.137.81.36',	'2025-06-18 08:28:17',	'2025-06-18 08:28:17'),
(8,	'1',	'Logout sistem: Admin',	'110.137.81.36',	'2025-06-18 08:29:55',	'2025-06-18 08:29:55'),
(9,	'1',	'Login sistem :Admin',	'110.137.81.36',	'2025-06-18 09:47:24',	'2025-06-18 09:47:24'),
(10,	'1',	'Login sistem :Admin',	'36.77.106.245',	'2025-06-20 17:24:48',	'2025-06-20 17:24:48'),
(11,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-21 16:49:23',	'2025-06-21 16:49:23'),
(12,	'1',	'Logout sistem: Admin',	'103.18.34.139',	'2025-06-21 16:49:29',	'2025-06-21 16:49:29'),
(13,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-21 17:07:15',	'2025-06-21 17:07:15'),
(14,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-22 04:02:11',	'2025-06-22 04:02:11'),
(15,	'1',	'Logout sistem: Admin',	'103.18.34.139',	'2025-06-22 04:02:46',	'2025-06-22 04:02:46'),
(16,	'4',	'Login sistem :Teguh Triatmojo',	'103.18.34.139',	'2025-06-22 04:08:11',	'2025-06-22 04:08:11'),
(17,	'4',	'Login sistem :Teguh Triatmojo',	'103.18.34.139',	'2025-06-22 04:08:36',	'2025-06-22 04:08:36'),
(18,	'4',	'Logout sistem: Teguh Triatmojo',	'103.18.34.139',	'2025-06-22 04:08:43',	'2025-06-22 04:08:43'),
(19,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-22 07:32:46',	'2025-06-22 07:32:46'),
(20,	'1',	'Login sistem :Admin',	'110.137.82.19',	'2025-06-22 07:42:42',	'2025-06-22 07:42:42'),
(21,	'1',	'Logout sistem: Admin',	'110.137.82.14',	'2025-06-22 10:11:25',	'2025-06-22 10:11:25'),
(22,	'1',	'Login sistem :Admin',	'110.137.82.14',	'2025-06-22 12:09:49',	'2025-06-22 12:09:49'),
(23,	'1',	'Login sistem :Admin',	'110.137.82.14',	'2025-06-22 13:02:59',	'2025-06-22 13:02:59'),
(24,	'3',	'Login sistem :Mahasiswa',	'114.10.95.119',	'2025-06-22 20:53:29',	'2025-06-22 20:53:29'),
(25,	'3',	'Logout sistem: Mahasiswa',	'114.10.95.119',	'2025-06-22 20:54:28',	'2025-06-22 20:54:28'),
(26,	'1',	'Login sistem :Admin',	'114.10.95.119',	'2025-06-22 20:54:35',	'2025-06-22 20:54:35'),
(27,	'1',	'Logout sistem: Admin',	'114.10.95.119',	'2025-06-22 20:55:01',	'2025-06-22 20:55:01'),
(28,	'3',	'Login sistem :Mahasiswa',	'114.10.95.119',	'2025-06-22 20:55:12',	'2025-06-22 20:55:12'),
(29,	'3',	'Logout sistem: Mahasiswa',	'114.10.95.119',	'2025-06-22 20:55:23',	'2025-06-22 20:55:23'),
(30,	'1',	'Login sistem :Admin',	'114.10.95.119',	'2025-06-22 20:55:30',	'2025-06-22 20:55:30'),
(31,	'1',	'Logout sistem: Admin',	'114.10.95.119',	'2025-06-22 20:56:11',	'2025-06-22 20:56:11'),
(32,	'3',	'Login sistem :Mahasiswa',	'114.10.95.119',	'2025-06-22 20:56:18',	'2025-06-22 20:56:18'),
(33,	'3',	'Logout sistem: Mahasiswa',	'114.10.95.119',	'2025-06-22 20:56:36',	'2025-06-22 20:56:36'),
(34,	'1',	'Login sistem :Admin',	'114.10.95.119',	'2025-06-22 21:07:05',	'2025-06-22 21:07:05'),
(35,	'1',	'Logout sistem: Admin',	'114.10.95.119',	'2025-06-22 21:07:21',	'2025-06-22 21:07:21'),
(36,	'3',	'Login sistem :Mahasiswa',	'114.10.95.119',	'2025-06-22 21:07:31',	'2025-06-22 21:07:31'),
(37,	'3',	'Logout sistem: Mahasiswa',	'114.10.95.119',	'2025-06-22 21:08:03',	'2025-06-22 21:08:03'),
(38,	'1',	'Login sistem :Admin',	'114.10.95.119',	'2025-06-22 21:08:11',	'2025-06-22 21:08:11'),
(39,	'1',	'Login sistem :Admin',	'118.99.98.224',	'2025-06-24 06:59:10',	'2025-06-24 06:59:10'),
(40,	'1',	'Logout sistem: Admin',	'118.99.98.224',	'2025-06-24 07:05:51',	'2025-06-24 07:05:51'),
(41,	'1',	'Login sistem :Admin',	'36.77.101.89',	'2025-06-24 13:24:58',	'2025-06-24 13:24:58'),
(42,	'1',	'Logout sistem: Admin',	'36.77.101.89',	'2025-06-24 13:26:22',	'2025-06-24 13:26:22'),
(43,	'1',	'Login sistem :Admin',	'36.77.101.89',	'2025-06-24 13:26:50',	'2025-06-24 13:26:50'),
(44,	'1',	'Logout sistem: Admin',	'36.77.101.89',	'2025-06-24 13:27:18',	'2025-06-24 13:27:18'),
(45,	'1',	'Login sistem :Admin',	'36.77.101.89',	'2025-06-24 13:27:27',	'2025-06-24 13:27:27'),
(46,	'1',	'Logout sistem: Admin',	'36.77.101.89',	'2025-06-24 13:27:33',	'2025-06-24 13:27:33'),
(47,	'1',	'Login sistem :Admin',	'36.77.101.89',	'2025-06-24 13:28:03',	'2025-06-24 13:28:03'),
(48,	'1',	'Logout sistem: Admin',	'36.77.101.89',	'2025-06-24 13:28:27',	'2025-06-24 13:28:27'),
(49,	'1',	'Login sistem :Admin',	'110.137.80.19',	'2025-06-27 08:48:27',	'2025-06-27 08:48:27'),
(50,	'1',	'Logout sistem: Admin',	'110.137.80.19',	'2025-06-27 09:11:36',	'2025-06-27 09:11:36'),
(51,	'1',	'Login sistem :Admin',	'110.137.80.19',	'2025-06-27 10:02:53',	'2025-06-27 10:02:53'),
(52,	'1',	'Logout sistem: Admin',	'110.137.80.19',	'2025-06-27 10:14:53',	'2025-06-27 10:14:53'),
(53,	NULL,	'Meminta kirim link reset password untuk email: teguhtriatmojo23@gmail.com',	'103.18.34.139',	'2025-06-29 16:11:37',	'2025-06-29 16:11:37'),
(54,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-29 16:11:47',	'2025-06-29 16:11:47'),
(55,	'1',	'Melakukan perubahan password : Admin',	'103.18.34.139',	'2025-06-29 16:17:13',	'2025-06-29 16:17:13'),
(56,	'1',	'Melakukan perubahan password : Admin',	'103.18.34.139',	'2025-06-29 16:18:29',	'2025-06-29 16:18:29'),
(57,	'1',	'Logout sistem: Admin',	'103.18.34.139',	'2025-06-29 16:18:41',	'2025-06-29 16:18:41'),
(58,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-29 16:18:50',	'2025-06-29 16:18:50'),
(59,	'1',	'Logout sistem: Admin',	'103.18.34.139',	'2025-06-29 16:19:20',	'2025-06-29 16:19:20'),
(60,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-06-29 16:41:16',	'2025-06-29 16:41:16'),
(61,	'3',	'Login sistem :Mahasiswa',	'36.68.54.245',	'2025-07-02 15:13:27',	'2025-07-02 15:13:27'),
(62,	'3',	'Logout sistem: Mahasiswa',	'36.68.54.245',	'2025-07-02 15:13:46',	'2025-07-02 15:13:46'),
(63,	'1',	'Login sistem :Admin',	'36.68.54.245',	'2025-07-02 15:13:53',	'2025-07-02 15:13:53'),
(64,	'1',	'Login sistem :Admin',	'110.137.80.99',	'2025-07-03 05:23:13',	'2025-07-03 05:23:13'),
(65,	'1',	'Logout sistem: Admin',	'110.137.80.99',	'2025-07-03 05:24:26',	'2025-07-03 05:24:26'),
(66,	'1',	'Login sistem :Admin',	'110.137.80.99',	'2025-07-03 05:24:49',	'2025-07-03 05:24:49'),
(67,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-07-11 10:25:25',	'2025-07-11 10:25:25'),
(68,	'1',	'Login sistem :Admin',	'110.137.82.25',	'2025-07-12 06:11:49',	'2025-07-12 06:11:49'),
(69,	'1',	'Logout sistem: Admin',	'110.137.82.25',	'2025-07-12 06:13:59',	'2025-07-12 06:13:59'),
(70,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-07-12 08:30:30',	'2025-07-12 08:30:30'),
(71,	'1',	'Logout sistem: Admin',	'103.18.34.139',	'2025-07-12 08:32:09',	'2025-07-12 08:32:09'),
(72,	'1',	'Login sistem :Admin',	'110.137.82.92',	'2025-07-12 08:35:28',	'2025-07-12 08:35:28'),
(73,	'1',	'Logout sistem: Admin',	'110.137.82.92',	'2025-07-12 08:37:48',	'2025-07-12 08:37:48'),
(74,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-07-12 10:03:45',	'2025-07-12 10:03:45'),
(75,	'1',	'Logout sistem: Admin',	'103.18.34.139',	'2025-07-12 10:04:38',	'2025-07-12 10:04:38'),
(76,	'1',	'Login sistem :Admin',	'2404:c0:9830::4832:cbc0',	'2025-07-12 10:37:46',	'2025-07-12 10:37:46'),
(77,	'1',	'Logout sistem: Admin',	'2404:c0:9830::4832:cbc0',	'2025-07-12 10:38:53',	'2025-07-12 10:38:53'),
(78,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-07-12 10:39:15',	'2025-07-12 10:39:15'),
(79,	'1',	'Login sistem :Admin',	'2404:c0:9830::4832:cbc0',	'2025-07-12 10:39:26',	'2025-07-12 10:39:26'),
(80,	'1',	'Logout sistem: Admin',	'103.18.34.139',	'2025-07-12 10:39:53',	'2025-07-12 10:39:53'),
(81,	'1',	'Logout sistem: Admin',	'2404:c0:9830::4832:cbc0',	'2025-07-12 10:40:16',	'2025-07-12 10:40:16'),
(82,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-07-12 10:41:33',	'2025-07-12 10:41:33'),
(83,	'1',	'Login sistem :Admin',	'2404:c0:9830::4832:cbc0',	'2025-07-12 10:51:43',	'2025-07-12 10:51:43'),
(84,	'1',	'Login sistem :Admin',	'103.18.34.139',	'2025-07-14 09:37:52',	'2025-07-14 09:37:52');

DROP TABLE IF EXISTS `bukus`;
CREATE TABLE `bukus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(191) NOT NULL,
  `penulis` varchar(191) NOT NULL,
  `isbn` varchar(191) DEFAULT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `deskripsi` text DEFAULT NULL,
  `gambar_sampul` varchar(191) DEFAULT NULL,
  `penerbit_id` bigint(20) unsigned DEFAULT NULL,
  `prodi_id` bigint(20) unsigned DEFAULT NULL,
  `kategori_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bukus_isbn_unique` (`isbn`),
  KEY `bukus_penerbit_id_foreign` (`penerbit_id`),
  KEY `bukus_prodi_id_foreign` (`prodi_id`),
  KEY `bukus_kategori_id_foreign` (`kategori_id`),
  KEY `bukus_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bukus` (`id`, `judul`, `penulis`, `isbn`, `tahun_terbit`, `jumlah`, `deskripsi`, `gambar_sampul`, `penerbit_id`, `prodi_id`, `kategori_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	'Laskar Pelangi',	'Andrea Hirata',	NULL,	2005,	11,	'Laskar Pelangi adalah kisah nyata tentang persahabatan sejumlah siswa SD Muhammadiyah Gantong di Belitung',	'buku-covers/1749752006_IMG_20240324_163154_148.jpg',	1,	1,	1,	NULL,	'2025-06-12 11:13:26',	'2025-06-22 20:54:04'),
(2,	'asas',	'dsds',	NULL,	2021,	12,	NULL,	'buku-covers/1751520228_WhatsApp Image 2025-07-01 at 11.31.56_a45acf19.jpg',	1,	1,	1,	NULL,	'2025-07-03 05:23:48',	'2025-07-03 05:23:48');

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `ebooks`;
CREATE TABLE `ebooks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(191) NOT NULL,
  `penulis` varchar(191) NOT NULL,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `prodi_id` bigint(20) unsigned DEFAULT NULL,
  `uploaded_by` bigint(20) unsigned NOT NULL,
  `file_url` varchar(191) NOT NULL,
  `gambar_sampul` varchar(191) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `izin_unduh` tinyint(1) NOT NULL DEFAULT 0,
  `penerbit_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ebooks_kategori_id_foreign` (`kategori_id`),
  KEY `ebooks_prodi_id_foreign` (`prodi_id`),
  KEY `ebooks_uploaded_by_foreign` (`uploaded_by`),
  KEY `ebooks_penerbit_id_foreign` (`penerbit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ebooks` (`id`, `judul`, `penulis`, `kategori_id`, `prodi_id`, `uploaded_by`, `file_url`, `gambar_sampul`, `deskripsi`, `izin_unduh`, `penerbit_id`, `created_at`, `updated_at`) VALUES
(1,	'jendela biru',	'Andrea Hirata',	1,	NULL,	1,	'ebooks/1749753921_PROPOSAL_PENELITIAN_DENDI[1].pdf',	NULL,	'fiksi',	1,	1,	'2025-06-12 11:45:21',	'2025-06-12 11:45:21');

DROP TABLE IF EXISTS `ebook_readings`;
CREATE TABLE `ebook_readings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `ebook_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ebook_readings_ebook_id_foreign` (`ebook_id`),
  KEY `ebook_readings_user_id_ebook_id_index` (`user_id`,`ebook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ebook_readings` (`id`, `user_id`, `ebook_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'2025-06-20 18:30:22',	'2025-06-20 18:30:22'),
(2,	3,	1,	'2025-06-22 21:07:40',	'2025-06-22 21:07:40'),
(3,	3,	1,	'2025-06-22 21:07:42',	'2025-06-22 21:07:42'),
(4,	3,	1,	'2025-06-22 21:07:44',	'2025-06-22 21:07:44');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `galeris`;
CREATE TABLE `galeris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `urut` int(11) NOT NULL,
  `foto` varchar(191) DEFAULT NULL,
  `judul` varchar(191) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `galeris` (`id`, `urut`, `foto`, `judul`, `deskripsi`, `tipe`, `created_at`, `updated_at`) VALUES
(1,	1,	'foto/1752300829_img-20250712-wa0003.jpeg',	'Diskusi angkatan 21',	'Mahasiswa informatika diskusi untuk skripsi',	'1',	'2025-07-12 06:13:49',	'2025-07-12 06:13:49');

DROP TABLE IF EXISTS `informasis`;
CREATE TABLE `informasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(191) NOT NULL,
  `icon` varchar(191) NOT NULL,
  `min_kapasitas` int(11) NOT NULL,
  `maks_kapasitas` int(11) NOT NULL,
  `info` varchar(191) NOT NULL,
  `warna` varchar(191) NOT NULL,
  `waktu_buka` time NOT NULL,
  `waktu_tutup` time NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `informasis` (`id`, `judul`, `icon`, `min_kapasitas`, `maks_kapasitas`, `info`, `warna`, `waktu_buka`, `waktu_tutup`, `fasilitas`, `created_at`, `updated_at`) VALUES
(1,	'Ruang Baca',	'fa-book-reader',	50,	80,	'Suasana tenang untuk belajar mandiri',	'info',	'08:00:00',	'20:00:00',	'\"Meja belajar individual, Pencahayaan optimal, Ac dan ventilasi baik\"',	'2025-07-12 08:32:04',	'2025-07-12 08:32:04'),
(2,	'Ruang diskusi',	'Fas fa-info',	12,	15,	'Ruangan ini bisa dijadikan untuk berdiskusi',	'warning',	'09:00:00',	'15:00:00',	'\"Bdgahv, Gab\"',	'2025-07-12 08:37:37',	'2025-07-12 08:37:37');

DROP TABLE IF EXISTS `jam_layanans`;
CREATE TABLE `jam_layanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hari` varchar(191) NOT NULL,
  `waktu_buka` time NOT NULL,
  `waktu_tutup` time NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jam_layanans` (`id`, `hari`, `waktu_buka`, `waktu_tutup`, `catatan`, `created_at`, `updated_at`) VALUES
(1,	'Senin',	'08:00:00',	'16:00:00',	NULL,	'2025-06-16 20:21:32',	'2025-06-17 12:16:46');

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `kategoris`;
CREATE TABLE `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategoris` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1,	'fiksi',	'cerita fiksi',	'2025-06-12 11:11:30',	'2025-06-12 11:11:30');

DROP TABLE IF EXISTS `layanans`;
CREATE TABLE `layanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) NOT NULL,
  `icon` varchar(191) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `layanans` (`id`, `nama`, `icon`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1,	'Peminjaman Buku',	'fas fa-book',	'Maksimal 5 buku fisik untuk 14 hari',	'2025-06-16 20:21:32',	'2025-06-16 20:21:32');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'0001_01_01_000002_create_jobs_table',	1),
(4,	'2025_06_06_081120_create_prodis_table',	1),
(5,	'2025_06_06_170546_create_kategoris_table',	1),
(6,	'2025_06_06_170938_create_bukus_table',	1),
(7,	'2025_06_06_170948_create_ebooks_table',	1),
(8,	'2025_06_06_183044_create_peminjamans_table',	1),
(9,	'2025_06_08_173940_create_ebook_readings_table',	1),
(10,	'2025_06_11_141334_create_penerbits_table',	1),
(11,	'2025_06_17_024248_create_prosedurs_table',	2),
(12,	'2025_06_17_024456_create_jam_layanans_table',	2),
(13,	'2025_06_17_024616_create_layanans_table',	2),
(14,	'2025_06_17_153542_create_activity_logs_table',	3),
(15,	'2025_07_02_213638_create_reviews_table',	4),
(16,	'2025_07_11_144326_create_galeris_table',	5),
(17,	'2025_07_12_135142_create_informasis_tables',	6),
(18,	'2025_07_12_163614_create_peraturans_tables',	7);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('teguhtriatmojo23@gmail.com',	'$2y$12$2P7FQAoeM8r1BmXTSEYdF..6he3C63FAZiVR5.24MQV3fsPH1T64O',	'2025-06-29 16:11:37'),
('dendhi83@gmail.com',	'$2y$12$HcH9qEni75lW1ArFiakBBOmKLK0PxdZCLVjPCxr3A0rTb3YdTFXFW',	'2025-06-24 13:27:38');

DROP TABLE IF EXISTS `peminjamans`;
CREATE TABLE `peminjamans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `buku_id` bigint(20) unsigned DEFAULT NULL,
  `status` enum('menunggu','dipinjam','dikembalikan','terlambat','dibatalkan') NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `tanggal_setujui` date DEFAULT NULL,
  `tanggal_batal` date DEFAULT NULL,
  `denda` decimal(10,2) NOT NULL DEFAULT 0.00,
  `catatan_pinjam` text DEFAULT NULL,
  `catatan_kembali` text DEFAULT NULL,
  `catatan_batal` text DEFAULT NULL,
  `disetujui_oleh` bigint(20) unsigned DEFAULT NULL,
  `dibatalkan_oleh` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjamans_user_id_foreign` (`user_id`),
  KEY `peminjamans_buku_id_foreign` (`buku_id`),
  KEY `peminjamans_disetujui_oleh_foreign` (`disetujui_oleh`),
  KEY `peminjamans_dibatalkan_oleh_foreign` (`dibatalkan_oleh`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `peminjamans` (`id`, `user_id`, `buku_id`, `status`, `tanggal_pinjam`, `tanggal_jatuh_tempo`, `tanggal_kembali`, `tanggal_setujui`, `tanggal_batal`, `denda`, `catatan_pinjam`, `catatan_kembali`, `catatan_batal`, `disetujui_oleh`, `dibatalkan_oleh`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'dikembalikan',	'2025-06-12',	'2025-06-19',	'2025-06-12',	'2025-06-12',	NULL,	6239.86,	NULL,	NULL,	NULL,	1,	NULL,	'2025-06-12 11:13:51',	'2025-06-12 11:14:36'),
(2,	1,	1,	'dikembalikan',	'2025-06-12',	'2025-06-19',	'2025-06-12',	'2025-06-12',	NULL,	6238.94,	NULL,	NULL,	NULL,	1,	NULL,	'2025-06-12 11:14:50',	'2025-06-12 11:15:55'),
(3,	1,	1,	'dikembalikan',	'2025-06-12',	'2025-06-19',	'2025-06-12',	'2025-06-12',	NULL,	6227.38,	NULL,	NULL,	NULL,	1,	NULL,	'2025-06-12 11:29:32',	'2025-06-12 11:32:33'),
(4,	1,	1,	'dibatalkan',	'2025-06-13',	'2025-06-20',	NULL,	NULL,	'2025-06-12',	0.00,	NULL,	NULL,	'Ditolak oleh admin',	NULL,	1,	'2025-06-12 11:32:47',	'2025-06-12 11:33:20'),
(5,	1,	1,	'dikembalikan',	'2025-06-12',	'2025-06-10',	'2025-06-12',	'2025-06-12',	NULL,	-2773.54,	NULL,	NULL,	NULL,	1,	NULL,	'2025-06-12 11:33:39',	'2025-06-12 11:33:53'),
(6,	1,	1,	'dikembalikan',	'2025-06-12',	'2025-06-09',	'2025-06-12',	'2025-06-12',	NULL,	-3774.09,	NULL,	NULL,	NULL,	1,	NULL,	'2025-06-12 11:34:11',	'2025-06-12 11:34:41'),
(7,	3,	1,	'dipinjam',	'2025-06-23',	'2025-06-30',	NULL,	'2025-06-23',	NULL,	0.00,	NULL,	NULL,	NULL,	1,	NULL,	'2025-06-22 20:54:04',	'2025-06-22 20:55:34');

DROP TABLE IF EXISTS `penerbits`;
CREATE TABLE `penerbits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_penerbit` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penerbits_kode_penerbit_unique` (`kode_penerbit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `penerbits` (`id`, `kode_penerbit`, `nama`, `alamat`, `kota`, `telepon`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1,	'PUB001',	'Gramedia Pustaka Utama',	'bandung',	'bandung',	'0827323112',	'gramedia23@gmail.com',	'https://e-library.naylafrozenfood.my.id',	'2025-06-12 11:11:09',	'2025-06-12 11:11:09');

DROP TABLE IF EXISTS `peraturans`;
CREATE TABLE `peraturans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `urut` int(11) NOT NULL,
  `text` varchar(191) NOT NULL,
  `tipe` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `peraturans` (`id`, `urut`, `text`, `tipe`, `created_at`, `updated_at`) VALUES
(1,	1,	'Gagagg',	'1',	'2025-07-12 10:38:13',	'2025-07-12 10:38:13'),
(2,	2,	'Gwgwgw',	'1',	'2025-07-12 10:38:24',	'2025-07-12 10:38:24'),
(3,	1,	'Gagaga',	'2',	'2025-07-12 10:38:33',	'2025-07-12 10:38:33'),
(4,	2,	'Gagagj',	'2',	'2025-07-12 10:38:43',	'2025-07-12 10:38:43');

DROP TABLE IF EXISTS `prodis`;
CREATE TABLE `prodis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prodis_kode_unique` (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `prodis` (`id`, `kode`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1,	'TK',	'Teknik Komputer',	'sekolah tinggi teknologi payakumbuh',	'2025-06-12 11:09:31',	'2025-06-12 11:09:31');

DROP TABLE IF EXISTS `prosedurs`;
CREATE TABLE `prosedurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `urut` int(11) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `prosedurs` (`id`, `urut`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1,	1,	'Pendaftaran Anggota',	'Daftar sebagai anggota melalui website atau langsung di perpustakaan',	'2025-06-16 20:21:32',	'2025-06-16 20:21:32'),
(2,	2,	'Verifikasi Data',	'Verifikasi data diri dan email Anda',	'2025-06-16 20:21:32',	'2025-06-16 20:21:32');

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9HraRF5ZCTliXjz35uaKPKZYqNUWvkJoYeMjiWDM',	1,	'2404:c0:9830::4832:cbc0',	'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWHI3WmF2TGU2MmJFbERhRXJ2RGN3YTM1MnlwNHJ4UTRBbGFJNU5BNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vZS1saWJyYXJ5Lm5heWxhZnJvemVuZm9vZC5teS5pZC9NYXN0ZXJEYXRhL2J1a3UiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',	1752318128),
('NVSnsWPyaHJYBZuNVWM3br6MtaWpWua7JgsgL415',	NULL,	'110.137.83.225',	'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEZoRk5UWldMU1k1c1hrUkJDd1gySkE3V3R2RnJGQ2Q0WWhqWXZOMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vZS1saWJyYXJ5Lm5heWxhZnJvemVuZm9vZC5teS5pZC9sb2dpbiI7fX0=',	1752460030),
('Ph2blfK7I2OQAP0DKk11WOAHSCF3rJUNVkqSVowD',	1,	'103.18.34.139',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoianlEcWRaOFVHRTRzcHZkUDIxR1B4Z3h3cEk4VmhNYU8wOTl5a3hlbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vZS1saWJyYXJ5Lm5heWxhZnJvemVuZm9vZC5teS5pZC9yZXZpZXdzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',	1752317062),
('qTFU4aoy4zE2IwcMQsLTuwZV9VUS6ALQF6585FxD',	1,	'103.18.34.139',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmhqRE9xUVk1UmZ2ZGkzZmJaRVpFQ2swSkcwQ0p4RG1NRlJyTUhDSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vZS1saWJyYXJ5Lm5heWxhZnJvemVuZm9vZC5teS5pZC9sYXBvcmFuL2FuZ2dvdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',	1752486248);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL DEFAULT 'mahasiswa',
  `npm` varchar(191) DEFAULT NULL,
  `nidn` varchar(191) DEFAULT NULL,
  `foto` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prodi_id` bigint(20) unsigned DEFAULT NULL,
  `status_aktif` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_prodi_id_foreign` (`prodi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `email_verified_at`, `username`, `password`, `role`, `npm`, `nidn`, `foto`, `remember_token`, `created_at`, `updated_at`, `prodi_id`, `status_aktif`) VALUES
(1,	'Admin',	'dendhi83@gmail.com',	NULL,	'admin',	'$2y$12$FqxQDGh7ErO5GqzJbbKg6eSXgIZP98qGEC0wfw66tykG6eT3Wg2FK',	'admin',	NULL,	NULL,	NULL,	NULL,	'2025-06-11 10:31:04',	'2025-07-14 09:38:20',	1,	'1'),
(2,	'Dosen',	'dosen@gmail.com',	NULL,	'dosen',	'$2y$12$kMoHZcJbVe/4Abhfw0FcgOYV8RNmSPWeehkJguTFB6owHujp3QJwi',	'dosen',	NULL,	'1234567890',	NULL,	NULL,	'2025-06-11 10:31:04',	'2025-06-11 10:31:04',	NULL,	'1'),
(3,	'Mahasiswa',	'mahasiswa@gmail.com',	NULL,	'mahasiswa',	'$2y$12$2Mf.1k0Q/Q7JF8bEyZh6i.gMBQ6FCQKXQR.puOE/a.MPluc1Qmavi',	'mahasiswa',	'1234567890',	NULL,	NULL,	NULL,	'2025-06-11 10:31:05',	'2025-06-11 10:31:05',	NULL,	'1'),
(4,	'Teguh Triatmojo',	'teguhtriatmojo23@gmail.com',	NULL,	'teguh',	'$2y$12$jsyk.EXvmotczL0O6PVSouwkt8VhBzPCeM01Krmi.vAbiD30Bt8uW',	'mahasiswa',	'4444444',	NULL,	NULL,	'dC22ZuiNZO3ZvIk9YxLAhlnKT7kjY27nIAbDm6nQcU4nb2uTaDzWktPnrFEy',	'2025-06-22 04:02:41',	'2025-06-22 04:08:00',	1,	'1');

-- 2025-07-15 05:48:47
