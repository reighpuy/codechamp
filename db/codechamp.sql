-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 10:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codechamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc_user`
--

CREATE TABLE `cc_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_grup_id` bigint(20) UNSIGNED NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `user_regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_user` varchar(255) DEFAULT NULL,
  `foto_user` varchar(128) NOT NULL,
  `user_level` smallint(3) UNSIGNED NOT NULL DEFAULT 1,
  `exp_user` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cc_user`
--

INSERT INTO `cc_user` (`user_id`, `user_grup_id`, `password_user`, `email_user`, `user_regdate`, `nama_user`, `foto_user`, `user_level`, `exp_user`) VALUES
(1, 2, '81dc9bdb52d04dc20036dbd8313ed055', 'd@gmail.com', '2018-01-11 04:38:27', 'Muhamad Khadaffy', 'hwang-yeji.jpg', 1, 0),
(2, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'elsa@gmail.com', '2024-06-02 07:04:34', 'Asyffa Elsa', 'default-avatar.png', 1, 0),
(3, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'kayla@gmail.com', '2024-06-04 06:36:06', 'Kayla Aulia', 'default-avatar.png', 1, 0),
(4, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'tyas@gmail.com', '2024-06-05 07:27:51', 'Adetyas Alfarizza', 'default-avatar.png', 1, 0),
(5, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'nanda@gmail.com', '2024-06-05 07:28:29', 'Nanda Nurvika', 'default-avatar.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `jawaban_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban_soal_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban_detail` text NOT NULL,
  `jawaban_benar` tinyint(1) NOT NULL DEFAULT 0,
  `jawaban_aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`jawaban_id`, `jawaban_soal_id`, `jawaban_detail`, `jawaban_benar`, `jawaban_aktif`) VALUES
(1, 1, '\r\n			<p>HyperText Markup Language</p>\r\n			', 1, 1),
(2, 1, '\r\n			<p>HighText Machine Language</p>\r\n			', 0, 1),
(3, 1, '\r\n			<p>HyperText and Links Markup Language</p>\r\n			', 0, 1),
(4, 1, '\r\n			<p>HyperTool Markup Language</p>\r\n			', 0, 1),
(5, 2, '\r\n			<p>&lt;p&gt;</p>\r\n			', 1, 1),
(6, 2, '\r\n			<p>&lt;h1&gt;</p>\r\n			', 0, 1),
(7, 2, '\r\n			<p>&lt;br&gt;</p>\r\n			', 0, 1),
(8, 2, '\r\n			<p>&lt;div&gt;</p>\r\n			', 0, 1),
(9, 3, '\r\n			<p>&lt;img&gt;</p>\r\n			', 1, 1),
(10, 3, '\r\n			<p>&lt;picture&gt;</p>\r\n			', 0, 1),
(11, 3, '\r\n			<p>&lt;image&gt;</p>\r\n			', 0, 1),
(12, 3, '\r\n			<p>&lt;graphic&gt;</p>\r\n			', 0, 1),
(13, 4, '\r\n			<p>href</p>\r\n			', 0, 1),
(14, 4, '\r\n			<p>src</p>\r\n			', 1, 1),
(15, 4, '\r\n			<p>link</p>\r\n			', 0, 1),
(16, 4, '\r\n			<p>url</p>\r\n			', 0, 1),
(17, 5, '\r\n			<p>&lt;a&gt;</p>\r\n			', 1, 1),
(18, 5, '\r\n			<p>&lt;link&gt;</p>\r\n			', 0, 1),
(19, 5, '\r\n			<p>&lt;href&gt;</p>\r\n			', 0, 1),
(20, 5, '\r\n			<p>&lt;nav&gt;</p>\r\n			', 0, 1),
(21, 7, '<p>git create</p>\r\n', 0, 1),
(22, 7, '<p>git init</p>\r\n', 1, 1),
(23, 7, '<p>git start</p>\r\n', 0, 1),
(24, 7, '<p>git new</p>\r\n', 0, 1),
(25, 8, '<p>git push</p>\r\n', 1, 1),
(26, 8, '<p>git pull</p>\r\n', 0, 1),
(27, 8, '<p>git fetch</p>\r\n', 0, 1),
(28, 8, '<p>git commit</p>\r\n', 0, 1),
(29, 9, '<p>Mengunduh repositori dari repositori jarak jauh</p>\r\n', 1, 1),
(30, 9, '<p>Menggabungkan dua cabang</p>\r\n', 0, 1),
(31, 9, '<p>Membuat commit baru</p>\r\n', 0, 1),
(32, 9, '<p>Menghapus cabang</p>\r\n', 0, 1),
(33, 10, '<p>git log</p>\r\n', 1, 1),
(34, 10, '<p>git show</p>\r\n', 0, 1),
(35, 10, '<p>git status</p>\r\n', 0, 1),
(36, 10, '<p>git history</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `konfigurasi_id` int(11) NOT NULL,
  `konfigurasi_kode` varchar(50) NOT NULL,
  `konfigurasi_isi` varchar(500) NOT NULL,
  `konfigurasi_keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`konfigurasi_id`, `konfigurasi_kode`, `konfigurasi_isi`, `konfigurasi_keterangan`) VALUES
(1, 'link_login_operator', 'ya', 'Menampilkan Link Login Operator'),
(2, 'cbt_nama', 'Codechamp', 'Nama Aplikasi'),
(3, 'cbt_keterangan', 'Kursus Online Berbahasa Indonesia', 'Keterangan Aplikasi'),
(4, 'cbt_mobile_lock_xambro', 'tidak', 'Melakukan Lock pada browser mobile agar menggunakan Xambro Saja'),
(5, 'cbt_informasi', '<p>Silahkan pilih Tes yang diikuti dari daftar tes yang tersedia dibawah ini. Apabila tes tidak muncul, silahkan menghubungi Operator yang bertugas.</p>\r\n', 'Informasi yang diberika di Dashboard peserta tes\'');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `modul_id` bigint(20) UNSIGNED NOT NULL,
  `modul_nama` varchar(255) NOT NULL,
  `modul_aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`modul_id`, `modul_nama`, `modul_aktif`) VALUES
(1, 'Default', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('181tolk0v0h5lrdqh67853vcv19ghbf7', '::1', 1717575985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537353932333b),
('2712o9l1eo69uf4jclhedmkv7dv960mq', '::1', 1717573670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537333637303b757365725f69647c733a313a2231223b757365725f6578707c733a313a2230223b757365725f677275705f69647c733a313a2232223b7465735f757365725f69647c733a31313a226440676d61696c2e636f6d223b7465735f6e616d617c733a31363a224d7568616d6164204b68616461666679223b7465735f67726f75707c733a31323a224265726c616e6767616e616e223b7465735f67726f75705f69647c733a313a2232223b70617373776f72645f757365727c733a33323a223831646339626462353264303464633230303336646264383331336564303535223b656d61696c5f757365727c733a31313a226440676d61696c2e636f6d223b757365725f726567646174657c733a31393a22323031382d30312d31312031313a33383a3237223b6e616d615f757365727c733a31363a224d7568616d6164204b68616461666679223b666f746f5f757365727c733a31343a226877616e672d79656a692e6a7067223b757365725f6c6576656c7c733a313a2231223b6578705f757365727c733a313a2230223b),
('3ll4hsap1mc03qnfd67g1c79vpluavas', '::1', 1717572767, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537323736373b757365725f69647c733a313a2231223b757365725f6578707c733a333a22323030223b757365725f677275705f69647c733a313a2232223b7465735f757365725f69647c733a31313a226440676d61696c2e636f6d223b7465735f6e616d617c733a31363a224d7568616d6164204b68616461666679223b7465735f67726f75707c733a31323a224265726c616e6767616e616e223b7465735f67726f75705f69647c733a313a2232223b),
('6d9p3lmj3tsfnm3u7oklbp8n1vra7ufv', '::1', 1717572455, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537323435353b757365725f69647c733a313a2231223b757365725f6578707c733a333a22323030223b757365725f677275705f69647c733a313a2232223b),
('6hj1060qe4i2lk57tf23mj9g04btaqgc', '::1', 1717572590, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537323539303b757365725f69647c733a353a2261646d696e223b6e616d617c733a31353a224d7568616d6164204b686461666679223b6c6576656c7c733a353a2261646d696e223b),
('9u3sl03hb253h84r8tjkobt945rka70t', '::1', 1717573996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537333937363b757365725f69647c733a313a2231223b757365725f6578707c733a313a2230223b757365725f677275705f69647c733a313a2232223b70617373776f72645f757365727c733a33323a223831646339626462353264303464633230303336646264383331336564303535223b656d61696c5f757365727c733a31313a226440676d61696c2e636f6d223b757365725f726567646174657c733a31393a22323031382d30312d31312031313a33383a3237223b6e616d615f757365727c733a31363a224d7568616d6164204b68616461666679223b666f746f5f757365727c733a31343a226877616e672d79656a692e6a7067223b757365725f6c6576656c7c733a313a2231223b6578705f757365727c733a313a2230223b),
('dls3k9hntjie6rnobukr0dfq5eui7a21', '::1', 1717572122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537323132323b),
('hupe4reav2bneuvsb75gbd34mlfdphqj', '::1', 1717574012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537343031323b757365725f69647c733a353a2261646d696e223b6e616d617c733a31353a224d7568616d6164204b686461666679223b6c6576656c7c733a353a2261646d696e223b),
('icdvshtnamrrhmeac4lkahus1nva869c', '::1', 1717573976, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537333937363b757365725f69647c733a313a2231223b757365725f6578707c733a313a2230223b757365725f677275705f69647c733a313a2232223b7465735f757365725f69647c733a31313a226440676d61696c2e636f6d223b7465735f6e616d617c733a31363a224d7568616d6164204b68616461666679223b7465735f67726f75707c733a31323a224265726c616e6767616e616e223b7465735f67726f75705f69647c733a313a2232223b70617373776f72645f757365727c733a33323a223831646339626462353264303464633230303336646264383331336564303535223b656d61696c5f757365727c733a31313a226440676d61696c2e636f6d223b757365725f726567646174657c733a31393a22323031382d30312d31312031313a33383a3237223b6e616d615f757365727c733a31363a224d7568616d6164204b68616461666679223b666f746f5f757365727c733a31343a226877616e672d79656a692e6a7067223b757365725f6c6576656c7c733a313a2231223b6578705f757365727c733a313a2230223b),
('lindi18gv17sgluvoft55nesf8bj8ld5', '::1', 1717573069, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537333036393b757365725f69647c733a313a2231223b757365725f6578707c733a313a2230223b757365725f677275705f69647c733a313a2232223b7465735f757365725f69647c733a31313a226440676d61696c2e636f6d223b7465735f6e616d617c733a31363a224d7568616d6164204b68616461666679223b7465735f67726f75707c733a31323a224265726c616e6767616e616e223b7465735f67726f75705f69647c733a313a2232223b),
('omd3lt6kbiks0j8ssv3ghetqhh53j013', '::1', 1717574012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313731373537343031323b);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `soal_topik_id` bigint(20) UNSIGNED NOT NULL,
  `soal_detail` text NOT NULL,
  `soal_tipe` smallint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Pilihan ganda, 2=essay, 3=jawaban singkat',
  `soal_kunci` text DEFAULT NULL COMMENT 'Kunci untuk soal jawaban singkat',
  `soal_difficulty` smallint(6) NOT NULL DEFAULT 1,
  `soal_aktif` tinyint(1) NOT NULL DEFAULT 0,
  `soal_inline_answers` tinyint(1) NOT NULL DEFAULT 0,
  `soal_auto_next` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`soal_id`, `soal_topik_id`, `soal_detail`, `soal_tipe`, `soal_kunci`, `soal_difficulty`, `soal_aktif`, `soal_inline_answers`, `soal_auto_next`) VALUES
(1, 1, '\r\n			<p>Apa kepanjangan dari HTML ?</p>\r\n			', 1, NULL, 1, 1, 0, 0),
(2, 1, '\r\n			<p>Tag HTML mana yang digunakan untuk membuat paragraf ?</p>\r\n			', 1, NULL, 1, 1, 0, 0),
(3, 1, '\r\n			<p>Tag HTML mana yang digunakan untuk menampilkan gambar ?</p>\r\n			', 1, NULL, 1, 1, 0, 0),
(4, 1, '\r\n			<p>Atribut HTML mana yang digunakan untuk menentukan URL dari gambar dalam tag &lt;img&gt; ?</p>\r\n			', 1, NULL, 1, 1, 0, 0),
(5, 1, '\r\n			<p>Tag HTML mana yang digunakan untuk membuat hyperlink ?</p>\r\n			', 1, NULL, 1, 1, 0, 0),
(6, 2, '<p>Apa itu Git ?</p>\r\n', 3, 'git', 1, 1, 0, 0),
(7, 2, '<p>Perintah apa yang digunakan untuk membuat repositori baru di Git ?</p>\r\n', 1, '', 1, 1, 0, 0),
(8, 2, '<p>Perintah Git apa yang digunakan untuk mengunggah perubahan lokal ke repositori jarak jauh ?</p>\r\n', 1, '', 1, 1, 0, 0),
(9, 2, '<p>Apa fungsi dari perintah <em>git clone</em> ?</p>\r\n', 1, '', 1, 1, 0, 0),
(10, 2, '<p>Bagaimana cara melihat riwayat commit di Git ?</p>\r\n', 1, '', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `tes_id` bigint(20) UNSIGNED NOT NULL,
  `tes_nama` varchar(255) NOT NULL,
  `tes_detail` text NOT NULL,
  `tes_results_to_users` tinyint(1) NOT NULL DEFAULT 0,
  `tes_detail_to_users` tinyint(1) NOT NULL DEFAULT 0,
  `tes_score_right` decimal(10,2) DEFAULT 1.00,
  `tes_score_wrong` decimal(10,2) DEFAULT 0.00,
  `tes_score_unanswered` decimal(10,2) DEFAULT 0.00,
  `tes_max_score` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tes_token` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`tes_id`, `tes_nama`, `tes_detail`, `tes_results_to_users`, `tes_detail_to_users`, `tes_score_right`, `tes_score_wrong`, `tes_score_unanswered`, `tes_max_score`, `tes_token`) VALUES
(1, 'Kursus Berlangganan', 'Materi Khusus Pengguna Berlangganan', 1, 1, 1.00, 0.00, 0.00, 5.00, 0),
(2, 'Kursus Gratis', 'Materi gratis', 1, 1, 1.00, 0.00, 0.00, 5.00, 0),
(3, 'HTML', 'Materi mengenai HTML', 1, 1, 1.00, 0.00, 0.00, 5.00, 0),
(4, 'Materi HTML', 'Materi mengenai HTML', 1, 1, 1.00, 0.00, 0.00, 5.00, 0),
(5, 'Materi Git', 'Materi mengenai Git', 1, 1, 1.00, 0.00, 0.00, 5.00, 0),
(6, 'Git', 'Materi mengenai Git', 1, 1, 1.00, 0.00, 0.00, 5.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tesgrup`
--

CREATE TABLE `tesgrup` (
  `tstgrp_tes_id` bigint(20) UNSIGNED NOT NULL,
  `tstgrp_grup_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tesgrup`
--

INSERT INTO `tesgrup` (`tstgrp_tes_id`, `tstgrp_grup_id`) VALUES
(2, 1),
(3, 1),
(6, 1),
(1, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tes_soal`
--

CREATE TABLE `tes_soal` (
  `tessoal_id` bigint(20) UNSIGNED NOT NULL,
  `tessoal_tesuser_id` bigint(20) UNSIGNED NOT NULL,
  `tessoal_user_ip` varchar(39) DEFAULT NULL,
  `tessoal_soal_id` bigint(20) UNSIGNED NOT NULL,
  `tessoal_jawaban_text` text DEFAULT NULL,
  `tessoal_creation_time` datetime DEFAULT NULL,
  `tessoal_change_time` datetime DEFAULT NULL,
  `tessoal_nilai` decimal(10,2) DEFAULT NULL,
  `tessoal_ragu` int(1) NOT NULL DEFAULT 0 COMMENT '1=ragu, 0=tidak ragu',
  `tessoal_order` smallint(6) NOT NULL DEFAULT 1,
  `tessoal_num_answers` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `tessoal_comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tes_soal_jawaban`
--

CREATE TABLE `tes_soal_jawaban` (
  `soaljawaban_tessoal_id` bigint(20) UNSIGNED NOT NULL,
  `soaljawaban_jawaban_id` bigint(20) UNSIGNED NOT NULL,
  `soaljawaban_selected` smallint(6) NOT NULL DEFAULT -1,
  `soaljawaban_order` smallint(6) NOT NULL DEFAULT 1,
  `soaljawaban_position` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tes_token`
--

CREATE TABLE `tes_token` (
  `token_id` int(11) NOT NULL,
  `token_isi` varchar(20) NOT NULL,
  `token_user_id` int(11) NOT NULL,
  `token_ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `token_aktif` int(11) NOT NULL DEFAULT 1 COMMENT 'Umur Token dalam menit, 1 = 1 hari penuh',
  `token_tes_id` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tes_topik_set`
--

CREATE TABLE `tes_topik_set` (
  `tset_id` bigint(20) UNSIGNED NOT NULL,
  `tset_tes_id` bigint(20) UNSIGNED NOT NULL,
  `tset_topik_id` bigint(20) UNSIGNED NOT NULL,
  `tset_tipe` smallint(6) NOT NULL DEFAULT 1,
  `tset_difficulty` smallint(6) NOT NULL DEFAULT 1,
  `tset_jumlah` smallint(6) NOT NULL DEFAULT 1,
  `tset_jawaban` smallint(6) NOT NULL DEFAULT 0,
  `tset_acak_jawaban` int(11) NOT NULL DEFAULT 1,
  `tset_acak_soal` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tes_topik_set`
--

INSERT INTO `tes_topik_set` (`tset_id`, `tset_tes_id`, `tset_topik_id`, `tset_tipe`, `tset_difficulty`, `tset_jumlah`, `tset_jawaban`, `tset_acak_jawaban`, `tset_acak_soal`) VALUES
(1, 1, 2, 0, 1, 5, 4, 1, 1),
(2, 2, 1, 0, 1, 5, 4, 1, 1),
(3, 3, 1, 0, 1, 5, 4, 1, 1),
(4, 4, 1, 0, 1, 5, 4, 1, 1),
(5, 5, 2, 0, 1, 5, 4, 1, 1),
(6, 6, 2, 0, 1, 5, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tes_user`
--

CREATE TABLE `tes_user` (
  `tesuser_id` bigint(20) UNSIGNED NOT NULL,
  `tesuser_tes_id` bigint(20) UNSIGNED NOT NULL,
  `tesuser_user_id` bigint(20) UNSIGNED NOT NULL,
  `tesuser_status` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `tesuser_creation_time` datetime NOT NULL,
  `tesuser_comment` text DEFAULT NULL,
  `tesuser_token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `topik_id` bigint(20) UNSIGNED NOT NULL,
  `topik_modul_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `topik_nama` varchar(255) NOT NULL,
  `topik_detail` text DEFAULT NULL,
  `topik_aktif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`topik_id`, `topik_modul_id`, `topik_nama`, `topik_detail`, `topik_aktif`) VALUES
(1, 1, 'HTML', 'Materi mengenai HTML', 1),
(2, 1, 'Git', 'Materi mengenai Git', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_berlangganan` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `status_transaksi` int(1) NOT NULL COMMENT '1. belum dibayar, 2. menunggu konfirmasi, 3. berhasil berlangganan',
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `keterangan`, `level`, `ts`) VALUES
(1, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Muhamad Khdaffy', '', 'admin', '2015-07-29 18:12:03'),
(2, 'tutor', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Tutor', 'Tutor', 'operator-soal', '2018-03-30 12:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_akses`
--

CREATE TABLE `user_akses` (
  `id` int(11) NOT NULL,
  `level` varchar(75) NOT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `add` int(2) NOT NULL DEFAULT 1 COMMENT '0=false, 1=true',
  `edit` int(2) NOT NULL DEFAULT 1 COMMENT '0=false, 1=true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_akses`
--

INSERT INTO `user_akses` (`id`, `level`, `kode_menu`, `add`, `edit`) VALUES
(254, 'operator-soal', 'modul-daftar', 1, 1),
(255, 'operator-soal', 'modul-filemanager', 1, 1),
(256, 'operator-soal', 'modul-import', 1, 1),
(257, 'operator-soal', 'modul-soal', 1, 1),
(258, 'operator-soal', 'modul-topik', 1, 1),
(259, 'operator-tes', 'tes-hasil-operator', 1, 1),
(260, 'operator-tes', 'tes-token', 1, 1),
(481, 'admin', 'laporan-analisis-butir-soal', 1, 1),
(482, 'admin', 'peserta-kartu', 1, 1),
(483, 'admin', 'peserta-group', 1, 1),
(484, 'admin', 'peserta-daftar', 1, 1),
(485, 'admin', 'modul-daftar', 1, 1),
(486, 'admin', 'tes-daftar', 1, 1),
(487, 'admin', 'tool-backup', 1, 1),
(488, 'admin', 'tes-evaluasi', 1, 1),
(489, 'admin', 'tool-exportimport-soal', 1, 1),
(490, 'admin', 'modul-filemanager', 1, 1),
(491, 'admin', 'tes-hasil', 1, 1),
(492, 'admin', 'peserta-import', 1, 1),
(493, 'admin', 'modul-import', 1, 1),
(494, 'admin', 'modul-import-word', 1, 1),
(496, 'admin', 'user_level', 1, 1),
(497, 'admin', 'user_menu', 1, 1),
(498, 'admin', 'user_atur', 1, 1),
(499, 'admin', 'user-zyacbt', 1, 1),
(500, 'admin', 'laporan-rekap', 1, 1),
(501, 'admin', 'modul-soal', 1, 1),
(502, 'admin', 'tes-tambah', 1, 1),
(503, 'admin', 'tes-token', 1, 1),
(504, 'admin', 'modul-topik', 1, 1),
(505, 'admin', 'transaksi', 1, 1),
(506, 'admin', 'daftar_transaksi', 1, 1),
(507, 'admin', 'riwayat_transaksi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_grup`
--

CREATE TABLE `user_grup` (
  `grup_id` bigint(20) UNSIGNED NOT NULL,
  `grup_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_grup`
--

INSERT INTO `user_grup` (`grup_id`, `grup_nama`) VALUES
(2, 'Berlangganan'),
(1, 'Gratis');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `keterangan`) VALUES
(1, 'admin', 'Administrator'),
(2, 'operator-soal', 'Operator Soal'),
(3, 'operator-tes', 'Operator Tes');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `log` varchar(250) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `tipe` int(11) NOT NULL DEFAULT 1 COMMENT '0=parent, 1=child',
  `parent` varchar(50) DEFAULT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL DEFAULT '#',
  `icon` varchar(75) NOT NULL DEFAULT 'fa fa-circle-o',
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `tipe`, `parent`, `kode_menu`, `nama_menu`, `url`, `icon`, `urutan`) VALUES
(1, 0, '', 'user', 'Pengaturan', '#', 'fa fa-user', 20),
(3, 1, 'user', 'user_atur', 'Pengaturan User', 'manager/useratur', 'fa fa-circle-o', 5),
(4, 1, 'user', 'user_level', 'Pengaturan Level', 'manager/userlevel', 'fa fa-circle-o', 6),
(5, 1, 'user', 'user_menu', 'Pengaturan Menu', 'manager/usermenu', 'fa fa-circle-o', 7),
(6, 0, '', 'modul', 'Data Materi', '#', 'fa fa-book', 1),
(7, 1, 'modul', 'modul-daftar', 'Daftar Soal Materi', 'manager/modul_daftar', 'fa fa-circle-o', 5),
(8, 1, 'modul', 'modul-topik', 'Kategori Materi', 'manager/modul_topik', 'fa fa-circle-o', 2),
(10, 0, '', 'peserta', 'Data Pengguna', '#', 'fa fa-users', 2),
(11, 1, 'peserta', 'peserta-daftar', 'Daftar Peserta Kursus', 'manager/peserta_daftar', 'fa fa-circle-o', 2),
(12, 1, 'peserta', 'peserta-group', 'Daftar Kategori Peserta', 'manager/peserta_group', 'fa fa-circle-o', 1),
(13, 1, 'peserta', 'peserta-import', 'Import Data Peserta', 'manager/peserta_import', 'fa fa-circle-o', 5),
(14, 0, '', 'tes', 'Data Kursus', '#', 'fa fa-tasks', 4),
(15, 1, 'tes', 'tes-tambah', 'Tambah Kursus', 'manager/tes_tambah', 'fa fa-circle-o', 1),
(16, 1, 'tes', 'tes-daftar', 'Daftar Kursus', 'manager/tes_daftar', 'fa fa-circle-o', 2),
(17, 1, 'tes', 'tes-hasil', 'Hasil Pengerjaan', 'manager/tes_hasil', 'fa fa-circle-o', 6),
(18, 1, 'modul', 'modul-soal', 'Soal Materi', 'manager/modul_soal', 'fa fa-circle-o', 3),
(19, 1, 'tes', 'tes-token', 'Token', 'manager/tes_token', 'fa fa-circle-o', 8),
(22, 1, 'modul', 'modul-filemanager', 'File Manager', 'manager/modul_filemanager', 'fa fa-circle-o', 6),
(24, 1, 'modul', 'modul-import', 'Import Soal Spreadsheet', 'manager/modul_import', 'fa fa-circle-o', 4),
(25, 1, 'tes', 'tes-evaluasi', 'Evaluasi Kursus', 'manager/tes_evaluasi', 'fa fa-circle-o', 5),
(28, 1, 'tes', 'tes-hasil-operator', 'Hasil Tes Operator', 'manager/tes_hasil_operator', 'fa fa-circle-o', 10),
(30, 0, '', 'tool', 'Tool', '#', 'fa fa-wrench', 6),
(31, 1, 'tool', 'tool-backup', 'Database', 'manager/tool_backup', 'fa fa-database', 1),
(32, 1, 'tes-laporan', 'laporan-rekap', 'Rekap Hasil Tes', 'manager/laporan_rekap_hasil', 'fa fa-circle-o', 7),
(33, 1, 'tool', 'tool-exportimport-soal', 'Export / Import Soal', 'manager/tool_exportimport_soal', 'fa fa-circle-o', 2),
(34, 1, 'user', 'user-zyacbt', 'Pengaturan ZYACBT', 'manager/pengaturan_zyacbt', 'fa fa-circle-o', 1),
(37, 1, 'peserta', 'peserta-kartu', 'Cetak Kartu Peserta', 'manager/peserta_kartu', 'fa fa-circle-o', 5),
(38, 0, '', 'tes-laporan', 'Laporan', '#', 'fa fa-print', 5),
(41, 1, 'tes-laporan', 'laporan-analisis-butir-soal', 'Analisis Butir Soal', 'manager/laporan_analisis_butir_soal', 'fa fa-circle-o', 1),
(42, 1, 'tes-laporan', 'laporan-analisis-soal', 'Analisis Soal', 'manager/laporan_analisis_soal', 'fa fa-circle-o', 2),
(43, 1, 'modul', 'modul-import-word', 'Import Soal Word', 'manager/modul_import_word', 'fa fa-circle-o', 4),
(45, 0, '', 'transaksi', 'Data Transaksi', '#', 'fa fa-book', 3),
(46, 1, 'transaksi', 'daftar_transaksi', 'Daftar Transaksi', 'manager/berlangganan', 'fa fa-circle-o', 1),
(47, 1, 'transaksi', 'riwayat_transaksi', 'Riwayat Transaksi', 'manager/berlangganan/riwayat_transaksi', 'fa fa-circle-o', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_user`
--
ALTER TABLE `cc_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_grupid_cc_user` (`user_grup_id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`jawaban_id`),
  ADD KEY `p_answer_question_id` (`jawaban_soal_id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`konfigurasi_id`),
  ADD UNIQUE KEY `konfigurasi_kode` (`konfigurasi_kode`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`modul_id`),
  ADD UNIQUE KEY `ak_module_name` (`modul_nama`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `p_question_subject_id` (`soal_topik_id`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`tes_id`),
  ADD UNIQUE KEY `ak_test_name` (`tes_nama`);

--
-- Indexes for table `tesgrup`
--
ALTER TABLE `tesgrup`
  ADD PRIMARY KEY (`tstgrp_tes_id`),
  ADD KEY `kuisgrp_grup_id` (`tstgrp_grup_id`),
  ADD KEY `tstgrp_grup_id` (`tstgrp_grup_id`);

--
-- Indexes for table `tes_soal`
--
ALTER TABLE `tes_soal`
  ADD PRIMARY KEY (`tessoal_id`),
  ADD UNIQUE KEY `ak_testuser_question` (`tessoal_tesuser_id`,`tessoal_soal_id`),
  ADD KEY `p_testlog_question_id` (`tessoal_soal_id`),
  ADD KEY `p_testlog_testuser_id` (`tessoal_tesuser_id`);

--
-- Indexes for table `tes_soal_jawaban`
--
ALTER TABLE `tes_soal_jawaban`
  ADD PRIMARY KEY (`soaljawaban_tessoal_id`,`soaljawaban_jawaban_id`),
  ADD KEY `p_logansw_answer_id` (`soaljawaban_jawaban_id`),
  ADD KEY `p_logansw_testlog_id` (`soaljawaban_tessoal_id`);

--
-- Indexes for table `tes_token`
--
ALTER TABLE `tes_token`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `token_user_id` (`token_user_id`);

--
-- Indexes for table `tes_topik_set`
--
ALTER TABLE `tes_topik_set`
  ADD PRIMARY KEY (`tset_id`),
  ADD KEY `p_tsubset_test_id` (`tset_tes_id`),
  ADD KEY `tsubset_subject_id` (`tset_topik_id`);

--
-- Indexes for table `tes_user`
--
ALTER TABLE `tes_user`
  ADD PRIMARY KEY (`tesuser_id`),
  ADD UNIQUE KEY `ak_testuser` (`tesuser_tes_id`,`tesuser_user_id`,`tesuser_status`),
  ADD KEY `p_testuser_user_id` (`tesuser_user_id`),
  ADD KEY `p_testuser_test_id` (`tesuser_tes_id`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`topik_id`),
  ADD UNIQUE KEY `ak_subject_name` (`topik_modul_id`,`topik_nama`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akses_kode_menu` (`kode_menu`),
  ADD KEY `akses_level` (`level`);

--
-- Indexes for table `user_grup`
--
ALTER TABLE `user_grup`
  ADD PRIMARY KEY (`grup_id`),
  ADD UNIQUE KEY `group_name` (`grup_nama`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_menu` (`kode_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_user`
--
ALTER TABLE `cc_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `jawaban_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `konfigurasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `modul_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `tes_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tes_soal`
--
ALTER TABLE `tes_soal`
  MODIFY `tessoal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tes_token`
--
ALTER TABLE `tes_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tes_topik_set`
--
ALTER TABLE `tes_topik_set`
  MODIFY `tset_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tes_user`
--
ALTER TABLE `tes_user`
  MODIFY `tesuser_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `topik_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_akses`
--
ALTER TABLE `user_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT for table `user_grup`
--
ALTER TABLE `user_grup`
  MODIFY `grup_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cc_user`
--
ALTER TABLE `cc_user`
  ADD CONSTRAINT `FK_grupid_cc_user` FOREIGN KEY (`user_grup_id`) REFERENCES `user_grup` (`grup_id`);

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`jawaban_soal_id`) REFERENCES `soal` (`soal_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tesgrup`
--
ALTER TABLE `tesgrup`
  ADD CONSTRAINT `FK_grupid` FOREIGN KEY (`tstgrp_grup_id`) REFERENCES `user_grup` (`grup_id`),
  ADD CONSTRAINT `tesgrup_ibfk_1` FOREIGN KEY (`tstgrp_tes_id`) REFERENCES `tes` (`tes_id`);

--
-- Constraints for table `tes_soal`
--
ALTER TABLE `tes_soal`
  ADD CONSTRAINT `tes_soal_ibfk_1` FOREIGN KEY (`tessoal_tesuser_id`) REFERENCES `tes_user` (`tesuser_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tes_soal_ibfk_2` FOREIGN KEY (`tessoal_soal_id`) REFERENCES `soal` (`soal_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `tes_soal_jawaban`
--
ALTER TABLE `tes_soal_jawaban`
  ADD CONSTRAINT `tes_soal_jawaban_ibfk_1` FOREIGN KEY (`soaljawaban_tessoal_id`) REFERENCES `tes_soal` (`tessoal_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tes_soal_jawaban_ibfk_2` FOREIGN KEY (`soaljawaban_jawaban_id`) REFERENCES `jawaban` (`jawaban_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `tes_token`
--
ALTER TABLE `tes_token`
  ADD CONSTRAINT `tes_token_ibfk_1` FOREIGN KEY (`token_user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_topik_set`
--
ALTER TABLE `tes_topik_set`
  ADD CONSTRAINT `tes_topik_set_ibfk_1` FOREIGN KEY (`tset_tes_id`) REFERENCES `tes` (`tes_id`),
  ADD CONSTRAINT `tes_topik_set_ibfk_2` FOREIGN KEY (`tset_topik_id`) REFERENCES `topik` (`topik_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `tes_user`
--
ALTER TABLE `tes_user`
  ADD CONSTRAINT `tes_user_ibfk_1` FOREIGN KEY (`tesuser_tes_id`) REFERENCES `tes` (`tes_id`),
  ADD CONSTRAINT `tes_user_ibfk_2` FOREIGN KEY (`tesuser_user_id`) REFERENCES `cc_user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `user_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_akses`
--
ALTER TABLE `user_akses`
  ADD CONSTRAINT `user_akses_ibfk_2` FOREIGN KEY (`kode_menu`) REFERENCES `user_menu` (`kode_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_akses_ibfk_3` FOREIGN KEY (`level`) REFERENCES `user_level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
