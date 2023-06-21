-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2023 pada 20.11
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapegrisa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `deskripsi_nilai_akhir`
--

CREATE TABLE `deskripsi_nilai_akhir` (
  `dna_id` int(11) NOT NULL,
  `dna_jadwal_id` int(11) NOT NULL,
  `dna_siswa_id` int(11) NOT NULL,
  `dna_kategori` enum('pengetahuan','keterampilan') NOT NULL,
  `dna_deskripsi` text DEFAULT NULL,
  `dna_semester_id` int(11) NOT NULL,
  `dna_created_at` datetime NOT NULL,
  `dna_created_by` int(11) NOT NULL,
  `dna_edited_at` datetime DEFAULT NULL,
  `dna_edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `deskripsi_nilai_akhir`
--

INSERT INTO `deskripsi_nilai_akhir` (`dna_id`, `dna_jadwal_id`, `dna_siswa_id`, `dna_kategori`, `dna_deskripsi`, `dna_semester_id`, `dna_created_at`, `dna_created_by`, `dna_edited_at`, `dna_edited_by`) VALUES
(9, 18, 24, 'pengetahuan', 'Baik dalam menyikapi permasalahan yang sedang terjadi.', 13, '2023-06-17 01:44:19', 6, '2023-06-17 01:49:54', 6),
(10, 18, 25, 'pengetahuan', 'Baik dalam menyikapi permasalahan yang sedang terjadi.', 13, '2023-06-17 01:44:19', 6, '2023-06-17 01:49:54', 6),
(11, 18, 26, 'pengetahuan', 'Baik dalam menyikapi permasalahan yang sedang terjadi.', 13, '2023-06-17 01:44:19', 6, '2023-06-17 01:49:54', 6),
(12, 18, 24, 'keterampilan', 'Sangat baik dalam membuat dan menyajikan pidato', 13, '2023-06-17 01:50:29', 6, '2023-06-17 01:50:29', NULL),
(13, 18, 25, 'keterampilan', 'Sangat baik dalam membuat dan menyajikan pidato', 13, '2023-06-17 01:50:29', 6, '2023-06-17 01:50:29', NULL),
(14, 18, 26, 'keterampilan', 'Sangat baik dalam membuat dan menyajikan pidato', 13, '2023-06-17 01:50:29', 6, '2023-06-17 01:50:29', NULL),
(15, 23, 15, 'keterampilan', 'Sangat baik dalam membuat dan menyajikan pidato', 13, '2023-06-17 01:50:53', 6, '2023-06-17 01:50:53', NULL),
(16, 23, 16, 'keterampilan', 'Sangat baik dalam membuat dan menyajikan pidato', 13, '2023-06-17 01:50:53', 6, '2023-06-17 01:50:53', NULL),
(17, 23, 17, 'keterampilan', 'Sangat baik dalam membuat dan menyajikan pidato', 13, '2023-06-17 01:50:53', 6, '2023-06-17 01:50:53', NULL),
(18, 23, 15, 'pengetahuan', 'Baik dalam menyikapi permasalahan yang sedang terjadi.', 13, '2023-06-17 01:51:10', 6, '2023-06-17 01:51:10', NULL),
(19, 23, 16, 'pengetahuan', 'Baik dalam menyikapi permasalahan yang sedang terjadi.', 13, '2023-06-17 01:51:10', 6, '2023-06-17 01:51:10', NULL),
(20, 23, 17, 'pengetahuan', 'Baik dalam menyikapi permasalahan yang sedang terjadi.', 13, '2023-06-17 01:51:10', 6, '2023-06-17 01:51:10', NULL),
(21, 17, 24, 'pengetahuan', 'Belajar terus ya', 13, '2023-06-17 02:07:12', 1, '2023-06-17 02:07:27', 1),
(22, 17, 25, 'pengetahuan', 'Jangan Menyerah', 13, '2023-06-17 02:07:12', 1, '2023-06-17 02:07:27', 1),
(23, 17, 26, 'pengetahuan', 'Tingkatkan pretasimu', 13, '2023-06-17 02:07:12', 1, '2023-06-17 02:07:27', 1),
(24, 17, 24, 'keterampilan', 'Sudah lancar', 13, '2023-06-17 02:09:00', 1, '2023-06-17 02:09:00', NULL),
(25, 17, 25, 'keterampilan', 'Di perjelas tiap katanya lagi', 13, '2023-06-17 02:09:00', 1, '2023-06-17 02:09:00', NULL),
(26, 17, 26, 'keterampilan', 'Sudah bagus', 13, '2023-06-17 02:09:00', 1, '2023-06-17 02:09:00', NULL),
(27, 22, 15, 'pengetahuan', 'Bagus', 13, '2023-06-17 02:09:23', 1, '2023-06-17 02:09:23', NULL),
(28, 22, 16, 'pengetahuan', 'Bagus', 13, '2023-06-17 02:09:23', 1, '2023-06-17 02:09:23', NULL),
(29, 22, 17, 'pengetahuan', 'Bagus', 13, '2023-06-17 02:09:23', 1, '2023-06-17 02:09:23', NULL),
(30, 22, 15, 'keterampilan', 'Sudah baik', 13, '2023-06-17 02:09:54', 1, '2023-06-17 02:09:54', NULL),
(31, 22, 16, 'keterampilan', 'Bagus sekali', 13, '2023-06-17 02:09:54', 1, '2023-06-17 02:09:54', NULL),
(32, 22, 17, 'keterampilan', 'Ditingkatkan lebih baik lagi', 13, '2023-06-17 02:09:54', 1, '2023-06-17 02:09:54', NULL),
(33, 20, 24, 'pengetahuan', 'Kegagalan merupakan kesempatan untuk memulai lagi dengan lebih cerdas', 13, '2023-06-17 02:31:56', 9, '2023-06-17 02:31:56', NULL),
(34, 20, 25, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 13, '2023-06-17 02:31:56', 9, '2023-06-17 02:31:56', NULL),
(35, 20, 26, 'pengetahuan', 'Belajar dengan giat ya', 13, '2023-06-17 02:31:56', 9, '2023-06-17 02:31:56', NULL),
(36, 20, 24, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasi', 13, '2023-06-17 02:32:50', 9, '2023-06-17 02:32:50', NULL),
(37, 20, 25, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 13, '2023-06-17 02:32:50', 9, '2023-06-17 02:32:50', NULL),
(38, 20, 26, 'keterampilan', 'Satu-satunya tempat di mana kesuksesan datang sebelum adanya bekerja adalah kamus', 13, '2023-06-17 02:32:50', 9, '2023-06-17 02:32:50', NULL),
(39, 24, 15, 'pengetahuan', 'Satu-satunya tempat di mana kesuksesan datang sebelum adanya bekerja adalah kamus', 13, '2023-06-17 02:36:17', 9, '2023-06-17 02:36:17', NULL),
(40, 24, 16, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 13, '2023-06-17 02:36:17', 9, '2023-06-17 02:36:17', NULL),
(41, 24, 17, 'pengetahuan', 'Rahasia sukses adalah melakukan hal-hal umum yang tidak biasa dengan baik', 13, '2023-06-17 02:36:17', 9, '2023-06-17 02:36:17', NULL),
(42, 21, 24, 'pengetahuan', 'Jangan pernah berhenti belajar, karena hidup tak pernah berhenti mengajarkan.', 13, '2023-06-17 02:36:30', 11, '2023-06-17 02:36:30', NULL),
(43, 21, 25, 'pengetahuan', 'Jangan pernah berhenti belajar, karena hidup tak pernah berhenti mengajarkan.', 13, '2023-06-17 02:36:30', 11, '2023-06-17 02:36:30', NULL),
(44, 21, 26, 'pengetahuan', 'Jangan pernah berhenti belajar, karena hidup tak pernah berhenti mengajarkan.', 13, '2023-06-17 02:36:30', 11, '2023-06-17 02:36:30', NULL),
(45, 24, 15, 'keterampilan', 'Rahasia sukses adalah melakukan hal-hal umum yang tidak biasa dengan baik', 13, '2023-06-17 02:36:52', 9, '2023-06-17 02:36:52', NULL),
(46, 24, 16, 'keterampilan', 'Rahasia sukses adalah melakukan hal-hal umum yang tidak biasa dengan baik', 13, '2023-06-17 02:36:52', 9, '2023-06-17 02:36:52', NULL),
(47, 24, 17, 'keterampilan', 'Rahasia sukses adalah melakukan hal-hal umum yang tidak biasa dengan baik', 13, '2023-06-17 02:36:52', 9, '2023-06-17 02:36:52', NULL),
(48, 21, 24, 'keterampilan', 'Rahasia untuk menjadi maju adalah dengan segera memulai tindakan', 13, '2023-06-17 02:36:55', 11, '2023-06-17 02:36:55', NULL),
(49, 21, 25, 'keterampilan', 'Rahasia untuk menjadi maju adalah dengan segera memulai tindakan', 13, '2023-06-17 02:36:55', 11, '2023-06-17 02:36:55', NULL),
(50, 21, 26, 'keterampilan', 'Rahasia untuk menjadi maju adalah dengan segera memulai tindakan', 13, '2023-06-17 02:36:55', 11, '2023-06-17 02:36:55', NULL),
(51, 26, 15, 'keterampilan', 'Fokuslah menjadi produktif', 13, '2023-06-17 02:38:42', 11, '2023-06-17 02:38:42', NULL),
(52, 26, 16, 'keterampilan', 'Fokuslah menjadi produktif', 13, '2023-06-17 02:38:42', 11, '2023-06-17 02:38:42', NULL),
(53, 26, 17, 'keterampilan', 'Fokuslah menjadi produktif', 13, '2023-06-17 02:38:42', 11, '2023-06-17 02:38:42', NULL),
(54, 26, 15, 'pengetahuan', 'Persiapkan hari ini sebaik-baiknya untuk menghadapi hari esok yang baru.', 13, '2023-06-17 02:39:04', 11, '2023-06-17 02:39:04', NULL),
(55, 26, 16, 'pengetahuan', 'Persiapkan hari ini sebaik-baiknya untuk menghadapi hari esok yang baru.', 13, '2023-06-17 02:39:04', 11, '2023-06-17 02:39:04', NULL),
(56, 26, 17, 'pengetahuan', 'Persiapkan hari ini sebaik-baiknya untuk menghadapi hari esok yang baru.', 13, '2023-06-17 02:39:04', 11, '2023-06-17 02:39:04', NULL),
(57, 19, 24, 'pengetahuan', 'Sesulit apapun pelajaran, jangan pernah meragukan potensimu sendiri.', 13, '2023-06-17 02:49:58', 12, '2023-06-17 02:49:58', NULL),
(58, 19, 25, 'pengetahuan', 'Sesulit apapun pelajaran, jangan pernah meragukan potensimu sendiri.', 13, '2023-06-17 02:49:58', 12, '2023-06-17 02:49:58', NULL),
(59, 19, 26, 'pengetahuan', 'Sesulit apapun pelajaran, jangan pernah meragukan potensimu sendiri.', 13, '2023-06-17 02:49:58', 12, '2023-06-17 02:49:58', NULL),
(60, 19, 24, 'keterampilan', 'Sesulit apapun pelajaran, jangan pernah meragukan potensimu sendiri.', 13, '2023-06-17 02:50:10', 12, '2023-06-17 02:50:10', NULL),
(61, 19, 25, 'keterampilan', 'Sesulit apapun pelajaran, jangan pernah meragukan potensimu sendiri.', 13, '2023-06-17 02:50:10', 12, '2023-06-17 02:50:10', NULL),
(62, 19, 26, 'keterampilan', 'Sesulit apapun pelajaran, jangan pernah meragukan potensimu sendiri.', 13, '2023-06-17 02:50:10', 12, '2023-06-17 02:50:10', NULL),
(63, 25, 15, 'pengetahuan', 'Tingkatkan lebih lagi', 13, '2023-06-17 02:51:01', 12, '2023-06-17 02:51:01', NULL),
(64, 25, 16, 'pengetahuan', 'Hayoo jangan malas ya', 13, '2023-06-17 02:51:01', 12, '2023-06-17 02:51:01', NULL),
(65, 25, 17, 'pengetahuan', 'Mulai di mana kamu berada. Gunakan apa yang kamu miliki. Lakukan apa yang kamu bisa', 13, '2023-06-17 02:51:01', 12, '2023-06-17 02:51:01', NULL),
(66, 25, 15, 'keterampilan', 'Mulai di mana kamu berada. Gunakan apa yang kamu miliki. Lakukan apa yang kamu bisa', 13, '2023-06-17 02:51:16', 12, '2023-06-17 02:51:16', NULL),
(67, 25, 16, 'keterampilan', 'Mulai di mana kamu berada. Gunakan apa yang kamu miliki. Lakukan apa yang kamu bisa', 13, '2023-06-17 02:51:16', 12, '2023-06-17 02:51:16', NULL),
(68, 25, 17, 'keterampilan', 'Mulai di mana kamu berada. Gunakan apa yang kamu miliki. Lakukan apa yang kamu bisa', 13, '2023-06-17 02:51:16', 12, '2023-06-17 02:51:16', NULL),
(69, 17, 24, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:06', 1, '2023-06-17 03:19:06', NULL),
(70, 17, 25, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:06', 1, '2023-06-17 03:19:06', NULL),
(71, 17, 26, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:06', 1, '2023-06-17 03:19:06', NULL),
(72, 17, 24, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:17', 1, '2023-06-17 03:19:17', NULL),
(73, 17, 25, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:17', 1, '2023-06-17 03:19:17', NULL),
(74, 17, 26, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:17', 1, '2023-06-17 03:19:17', NULL),
(75, 22, 15, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:28', 1, '2023-06-17 03:21:10', 1),
(76, 22, 16, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil ', 14, '2023-06-17 03:19:28', 1, '2023-06-17 03:21:10', 1),
(77, 22, 17, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:28', 1, '2023-06-17 03:21:10', 1),
(78, 22, 15, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:38', 1, '2023-06-17 03:19:38', NULL),
(79, 22, 16, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:38', 1, '2023-06-17 03:19:38', NULL),
(80, 22, 17, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:19:38', 1, '2023-06-17 03:19:38', NULL),
(81, 18, 24, 'pengetahuan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:14', 6, '2023-06-17 03:31:14', NULL),
(82, 18, 25, 'pengetahuan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:14', 6, '2023-06-17 03:31:14', NULL),
(83, 18, 26, 'pengetahuan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:14', 6, '2023-06-17 03:31:14', NULL),
(84, 18, 24, 'keterampilan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:32', 6, '2023-06-17 03:31:32', NULL),
(85, 18, 25, 'keterampilan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:32', 6, '2023-06-17 03:31:32', NULL),
(86, 18, 26, 'keterampilan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:32', 6, '2023-06-17 03:31:32', NULL),
(87, 23, 15, 'pengetahuan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:44', 6, '2023-06-17 03:31:44', NULL),
(88, 23, 16, 'pengetahuan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:44', 6, '2023-06-17 03:31:44', NULL),
(89, 23, 17, 'pengetahuan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:44', 6, '2023-06-17 03:31:44', NULL),
(90, 20, 24, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:31:53', 9, '2023-06-17 03:31:53', NULL),
(91, 20, 25, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:31:53', 9, '2023-06-17 03:31:53', NULL),
(92, 20, 26, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:31:53', 9, '2023-06-17 03:31:53', NULL),
(93, 23, 15, 'keterampilan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:58', 6, '2023-06-17 03:31:58', NULL),
(94, 23, 16, 'keterampilan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:58', 6, '2023-06-17 03:31:58', NULL),
(95, 23, 17, 'keterampilan', 'Jangan membuang waktu belajarmu karena apa yang kamu pelajari akan berguna untuk masa depanmu', 14, '2023-06-17 03:31:58', 6, '2023-06-17 03:31:58', NULL),
(96, 24, 15, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:06', 9, '2023-06-17 03:32:06', NULL),
(97, 24, 16, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:06', 9, '2023-06-17 03:32:06', NULL),
(98, 24, 17, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:06', 9, '2023-06-17 03:32:06', NULL),
(99, 20, 24, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:18', 9, '2023-06-17 03:32:18', NULL),
(100, 20, 25, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:18', 9, '2023-06-17 03:32:18', NULL),
(101, 20, 26, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:18', 9, '2023-06-17 03:32:18', NULL),
(102, 24, 15, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:33', 9, '2023-06-17 03:32:33', NULL),
(103, 24, 16, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:33', 9, '2023-06-17 03:32:33', NULL),
(104, 24, 17, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:32:33', 9, '2023-06-17 03:32:33', NULL),
(105, 19, 24, 'pengetahuan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:29', 12, '2023-06-17 03:40:29', NULL),
(106, 19, 25, 'pengetahuan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:29', 12, '2023-06-17 03:40:29', NULL),
(107, 19, 26, 'pengetahuan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:29', 12, '2023-06-17 03:40:29', NULL),
(108, 25, 15, 'pengetahuan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:42', 12, '2023-06-17 03:40:42', NULL),
(109, 25, 16, 'pengetahuan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:42', 12, '2023-06-17 03:40:42', NULL),
(110, 25, 17, 'pengetahuan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:42', 12, '2023-06-17 03:40:42', NULL),
(111, 19, 24, 'keterampilan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:51', 12, '2023-06-17 03:40:51', NULL),
(112, 19, 25, 'keterampilan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:51', 12, '2023-06-17 03:40:51', NULL),
(113, 19, 26, 'keterampilan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:40:52', 12, '2023-06-17 03:40:52', NULL),
(114, 25, 15, 'keterampilan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:41:00', 12, '2023-06-17 03:41:00', NULL),
(115, 25, 16, 'keterampilan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:41:00', 12, '2023-06-17 03:41:00', NULL),
(116, 25, 17, 'keterampilan', 'Praktek membuat kita benar, pengulangan membuat kita sempurna', 14, '2023-06-17 03:41:00', 12, '2023-06-17 03:41:00', NULL),
(117, 21, 24, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:20', 11, '2023-06-17 03:41:20', NULL),
(118, 21, 25, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:20', 11, '2023-06-17 03:41:20', NULL),
(119, 21, 26, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:20', 11, '2023-06-17 03:41:20', NULL),
(120, 21, 24, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:35', 11, '2023-06-17 03:41:35', NULL),
(121, 21, 25, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:35', 11, '2023-06-17 03:41:35', NULL),
(122, 21, 26, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:35', 11, '2023-06-17 03:41:35', NULL),
(123, 26, 15, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:55', 11, '2023-06-17 03:41:55', NULL),
(124, 26, 16, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:55', 11, '2023-06-17 03:41:55', NULL),
(125, 26, 17, 'pengetahuan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:41:55', 11, '2023-06-17 03:41:55', NULL),
(126, 26, 15, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:42:12', 11, '2023-06-17 03:42:12', NULL),
(127, 26, 16, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:42:12', 11, '2023-06-17 03:42:12', NULL),
(128, 26, 17, 'keterampilan', 'Bagaimanapun sulitnya hidup ini, akan selalu ada sesuatu yang dapat kamu lakukan dan berhasil', 14, '2023-06-17 03:42:12', 11, '2023-06-17 03:42:12', NULL),
(129, 27, 15, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:05', 1, '2023-06-22 00:09:55', 1),
(130, 27, 16, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:05', 1, '2023-06-22 00:09:55', 1),
(131, 27, 17, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:05', 1, '2023-06-22 00:09:55', 1),
(132, 27, 15, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:14', 1, '2023-06-17 04:01:14', NULL),
(133, 27, 16, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:14', 1, '2023-06-17 04:01:14', NULL),
(134, 27, 17, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:14', 1, '2023-06-17 04:01:14', NULL),
(135, 28, 24, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:25', 1, '2023-06-17 04:01:25', NULL),
(136, 28, 25, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:25', 1, '2023-06-17 04:01:25', NULL),
(137, 28, 26, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:25', 1, '2023-06-17 04:01:25', NULL),
(138, 28, 24, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:34', 1, '2023-06-17 04:01:34', NULL),
(139, 28, 25, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:34', 1, '2023-06-17 04:01:34', NULL),
(140, 28, 26, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:01:34', 1, '2023-06-17 04:01:34', NULL),
(141, 29, 15, 'pengetahuan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:03', 6, '2023-06-17 04:06:03', NULL),
(142, 29, 16, 'pengetahuan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:03', 6, '2023-06-17 04:06:03', NULL),
(143, 29, 17, 'pengetahuan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:03', 6, '2023-06-17 04:06:03', NULL),
(144, 29, 15, 'keterampilan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:21', 6, '2023-06-17 04:06:21', NULL),
(145, 29, 16, 'keterampilan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:21', 6, '2023-06-17 04:06:21', NULL),
(146, 29, 17, 'keterampilan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:21', 6, '2023-06-17 04:06:21', NULL),
(147, 30, 24, 'pengetahuan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:30', 6, '2023-06-17 04:06:30', NULL),
(148, 30, 25, 'pengetahuan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:30', 6, '2023-06-17 04:06:30', NULL),
(149, 30, 26, 'pengetahuan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:30', 6, '2023-06-17 04:06:30', NULL),
(150, 30, 24, 'keterampilan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:40', 6, '2023-06-17 04:06:40', NULL),
(151, 30, 25, 'keterampilan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:40', 6, '2023-06-17 04:06:40', NULL),
(152, 30, 26, 'keterampilan', 'Tidak ada kata tua untuk belajar.', 15, '2023-06-17 04:06:40', 6, '2023-06-17 04:06:40', NULL),
(153, 33, 12, 'pengetahuan', 'Sedikit kemajuan setiap hari di dalam dirimu menambah sesuatu hingga hasil yang besar', 15, '2023-06-17 04:13:36', 11, '2023-06-17 04:13:36', NULL),
(154, 33, 13, 'pengetahuan', 'Sedikit kemajuan setiap hari di dalam dirimu menambah sesuatu hingga hasil yang besar', 15, '2023-06-17 04:13:36', 11, '2023-06-17 04:13:36', NULL),
(155, 33, 14, 'pengetahuan', 'Sedikit kemajuan setiap hari di dalam dirimu menambah sesuatu hingga hasil yang besar', 15, '2023-06-17 04:13:36', 11, '2023-06-17 04:13:36', NULL),
(156, 33, 12, 'keterampilan', 'Sedikit kemajuan setiap hari di dalam dirimu menambah sesuatu hingga hasil yang besar', 15, '2023-06-17 04:13:58', 11, '2023-06-17 04:13:58', NULL),
(157, 33, 13, 'keterampilan', 'Sedikit kemajuan setiap hari di dalam dirimu menambah sesuatu hingga hasil yang besar', 15, '2023-06-17 04:13:58', 11, '2023-06-17 04:13:58', NULL),
(158, 33, 14, 'keterampilan', 'Sedikit kemajuan setiap hari di dalam dirimu menambah sesuatu hingga hasil yang besar', 15, '2023-06-17 04:13:58', 11, '2023-06-17 04:13:58', NULL),
(159, 35, 12, 'pengetahuan', 'Jangan pernah menyerah, memulai adalah selalu hal yang tersulit.', 15, '2023-06-17 04:14:25', 11, '2023-06-17 04:14:25', NULL),
(160, 35, 13, 'pengetahuan', 'Jangan pernah menyerah, memulai adalah selalu hal yang tersulit.', 15, '2023-06-17 04:14:25', 11, '2023-06-17 04:14:25', NULL),
(161, 35, 14, 'pengetahuan', 'Jangan pernah menyerah, memulai adalah selalu hal yang tersulit.', 15, '2023-06-17 04:14:25', 11, '2023-06-17 04:14:25', NULL),
(162, 35, 12, 'keterampilan', 'Jangan pernah menyerah, memulai adalah selalu hal yang tersulit.', 15, '2023-06-17 04:14:35', 11, '2023-06-17 04:14:35', NULL),
(163, 35, 13, 'keterampilan', 'Jangan pernah menyerah, memulai adalah selalu hal yang tersulit.', 15, '2023-06-17 04:14:35', 11, '2023-06-17 04:14:35', NULL),
(164, 35, 14, 'keterampilan', 'Jangan pernah menyerah, memulai adalah selalu hal yang tersulit.', 15, '2023-06-17 04:14:35', 11, '2023-06-17 04:14:35', NULL),
(165, 37, 12, 'pengetahuan', 'Do your best at every opportunity that you have.', 15, '2023-06-17 04:15:03', 11, '2023-06-17 04:15:03', NULL),
(166, 37, 13, 'pengetahuan', 'Do your best at every opportunity that you have.', 15, '2023-06-17 04:15:03', 11, '2023-06-17 04:15:03', NULL),
(167, 37, 14, 'pengetahuan', 'Do your best at every opportunity that you have.', 15, '2023-06-17 04:15:03', 11, '2023-06-17 04:15:03', NULL),
(168, 37, 12, 'keterampilan', 'Do your best at every opportunity that you have.', 15, '2023-06-17 04:15:14', 11, '2023-06-17 04:15:14', NULL),
(169, 37, 13, 'keterampilan', 'Do your best at every opportunity that you have.', 15, '2023-06-17 04:15:14', 11, '2023-06-17 04:15:14', NULL),
(170, 37, 14, 'keterampilan', 'Do your best at every opportunity that you have.', 15, '2023-06-17 04:15:14', 11, '2023-06-17 04:15:14', NULL),
(171, 31, 15, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:17:50', 9, '2023-06-17 04:17:50', NULL),
(172, 31, 16, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:17:50', 9, '2023-06-17 04:17:50', NULL),
(173, 31, 17, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:17:50', 9, '2023-06-17 04:17:50', NULL),
(174, 31, 15, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:01', 9, '2023-06-17 04:18:01', NULL),
(175, 31, 16, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:01', 9, '2023-06-17 04:18:01', NULL),
(176, 31, 17, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:01', 9, '2023-06-17 04:18:01', NULL),
(177, 32, 24, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:14', 9, '2023-06-17 04:18:14', NULL),
(178, 32, 25, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:14', 9, '2023-06-17 04:18:14', NULL),
(179, 32, 26, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:14', 9, '2023-06-17 04:18:14', NULL),
(180, 32, 24, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:23', 9, '2023-06-17 04:18:23', NULL),
(181, 32, 25, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:23', 9, '2023-06-17 04:18:23', NULL),
(182, 32, 26, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:23', 9, '2023-06-17 04:18:23', NULL),
(183, 34, 9, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:33', 9, '2023-06-17 04:18:33', NULL),
(184, 34, 10, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:33', 9, '2023-06-17 04:18:33', NULL),
(185, 34, 11, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:33', 9, '2023-06-17 04:18:33', NULL),
(186, 34, 9, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:46', 9, '2023-06-17 04:18:46', NULL),
(187, 34, 10, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:46', 9, '2023-06-17 04:18:46', NULL),
(188, 34, 11, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:46', 9, '2023-06-17 04:18:46', NULL),
(189, 36, 9, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:56', 9, '2023-06-17 04:18:56', NULL),
(190, 36, 10, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:56', 9, '2023-06-17 04:18:56', NULL),
(191, 36, 11, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:18:56', 9, '2023-06-17 04:18:56', NULL),
(192, 36, 9, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:04', 9, '2023-06-17 04:19:04', NULL),
(193, 36, 10, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:04', 9, '2023-06-17 04:19:04', NULL),
(194, 36, 11, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:04', 9, '2023-06-17 04:19:04', NULL),
(195, 38, 9, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:16', 9, '2023-06-17 04:19:16', NULL),
(196, 38, 10, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:16', 9, '2023-06-17 04:19:16', NULL),
(197, 38, 11, 'pengetahuan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:16', 9, '2023-06-17 04:19:16', NULL),
(198, 38, 9, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:29', 9, '2023-06-17 04:19:29', NULL),
(199, 38, 10, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:29', 9, '2023-06-17 04:19:29', NULL),
(200, 38, 11, 'keterampilan', 'Sukses tidak akan datang kepadamu begitu saja. Kamu yang harus pergi menjemput dan mengambilnya', 15, '2023-06-17 04:19:29', 9, '2023-06-17 04:19:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `ekskul_id` int(11) NOT NULL,
  `ekskul_nama` varchar(50) NOT NULL,
  `ekskul_predikat` enum('A','B','C') NOT NULL,
  `ekskul_deskripsi` text NOT NULL,
  `ekskul_nond_id` int(11) NOT NULL,
  `ekskul_created_at` datetime NOT NULL,
  `ekskul_created_by` int(11) NOT NULL,
  `ekskul_edited_at` datetime NOT NULL,
  `ekskul_edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`ekskul_id`, `ekskul_nama`, `ekskul_predikat`, `ekskul_deskripsi`, `ekskul_nond_id`, `ekskul_created_at`, `ekskul_created_by`, `ekskul_edited_at`, `ekskul_edited_by`) VALUES
(22, 'Basket', 'A', 'Tetap semangat berdoa selalu', 8, '2023-06-17 02:41:07', 9, '2023-06-17 02:42:13', 9),
(23, 'Voli', 'A', 'Selalu latihan setiap hari', 10, '2023-06-17 02:45:21', 9, '2023-06-17 02:45:46', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `no_hp`, `email`, `alamat`, `jabatan`, `pendidikan_terakhir`, `photo`) VALUES
(1, 'agus', 'MTIzNA==', '5549610363269727', 'Agus Markus Leimina', 'Kebumen', '1970-09-07', 'Laki-laki', '0895411798663', 'agus.markus@gmail.com', 'Bulus, Tambaksari, Kec. Kuwarasan', 'Guru', 'S1', '1685111378_7be80d7b3f16cd9d9351.jpg'),
(6, 'Agustin', 'MTIzNA==', '5472874534222970', 'Agustin Sukawati', 'Kebumen', '1971-08-14', 'Perempuan', '0895410445252', 'agustinsukawati1@gmail.com', 'Bono, Baleagung, Grabag', 'Guru', 'S1', '1686071659_6f8847089ba86606c44e.jpg'),
(9, 'Andika', 'MTIzNA==', '1529601300569092', 'Andika Wahyu Perdana', 'Kebumen', '1992-01-18', 'Laki-laki', '087737725031\n', 'AWahyu162@gmail.com\n', 'Petahunan, Sempor\n, Kec. Sempor\n', 'Guru', 'S1', '1686128562_261bc9eb538a7dfa54c8.jpg'),
(11, 'Anindita', 'MTIzNA==', '2573060914503942', 'Anindita Ardhe Imani\n', 'Kebumen', '1992-05-04', 'Perempuan', '082241565625', 'ardheanindita@yahoo.com\n', 'Wonokriyo, Kec. Gombong\n', 'Guru', 'S1', '1686645912_e07f65bb48ed451ed397.jpeg'),
(12, 'Anita', 'MTIzNA==', '6564459844908321', 'Anita Nurwidia\r\n', 'Klaten', '1979-05-05', 'Perempuan', '088227297231', 'anitaelva12@gmail.com\r\n', 'Wero, Kec. Gombong', 'Guru', 'S1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `mapel_kkm` tinyint(3) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `wali_kelas_id` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
  `jam_mengajar` varchar(20) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `mapel_id`, `mapel_kkm`, `guru_id`, `kelas_id`, `wali_kelas_id`, `hari`, `jam_mengajar`, `tahun_ajaran`) VALUES
(17, 8, 0, 1, 4, 6, 'Kamis', '1', 11),
(18, 9, 0, 6, 4, 6, 'Kamis', '4', 11),
(19, 11, 0, 12, 4, 6, 'Rabu', '3', 11),
(20, 10, 0, 9, 4, 6, 'Jumat', '1', 11),
(21, 12, 0, 11, 4, 6, 'Kamis', '2', 11),
(22, 8, 0, 1, 2, 9, 'Senin', '3', 11),
(23, 9, 0, 6, 2, 9, 'Selasa', '3', 11),
(24, 9, 0, 9, 2, 9, 'Jumat', '3', 11),
(25, 11, 0, 12, 2, 9, 'Rabu', '2', 11),
(26, 10, 0, 11, 2, 9, 'Kamis', '1', 11),
(27, 8, 0, 1, 5, 1, 'Senin', '1', 12),
(28, 8, 0, 1, 7, 9, 'Senin', '2', 12),
(29, 9, 0, 6, 5, 1, 'Selasa', '1', 12),
(30, 9, 0, 6, 7, 9, 'Selasa', '2', 12),
(31, 10, 0, 9, 5, 1, 'Rabu', '1', 12),
(32, 10, 0, 9, 7, 9, 'Rabu', '2', 12),
(33, 8, 0, 11, 4, 6, 'Kamis', '3', 12),
(34, 8, 0, 9, 2, 12, 'Kamis', '2', 12),
(35, 9, 0, 11, 4, 6, 'Kamis', '1', 12),
(36, 9, 0, 9, 2, 12, 'Senin', '3', 12),
(37, 13, 0, 11, 4, 6, 'Jumat', '1', 12),
(38, 13, 0, 9, 2, 12, 'Jumat', '2', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tugas`
--

CREATE TABLE `kategori_tugas` (
  `kt_id` int(11) NOT NULL,
  `kt_nama` varchar(50) NOT NULL,
  `kt_jenis` enum('pengetahuan','keterampilan') NOT NULL,
  `kt_deskripsi` text DEFAULT NULL,
  `kt_tanggal` date NOT NULL,
  `kt_kkm` float NOT NULL,
  `kt_bobot` float NOT NULL,
  `kt_jadwal_id` int(11) NOT NULL,
  `kt_semester_id` int(11) NOT NULL,
  `kt_created_at` datetime NOT NULL,
  `kt_edited_at` datetime DEFAULT NULL,
  `kt_deleted_at` datetime DEFAULT NULL,
  `kt_assessed_at` datetime DEFAULT NULL,
  `kt_value_changed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_tugas`
--

INSERT INTO `kategori_tugas` (`kt_id`, `kt_nama`, `kt_jenis`, `kt_deskripsi`, `kt_tanggal`, `kt_kkm`, `kt_bobot`, `kt_jadwal_id`, `kt_semester_id`, `kt_created_at`, `kt_edited_at`, `kt_deleted_at`, `kt_assessed_at`, `kt_value_changed_at`) VALUES
(5, 'Tugas Harian', 'pengetahuan', 'Membuat artikel tentang Patriotisme', '2023-06-12', 70, 20, 18, 13, '2023-06-17 00:52:11', '2023-06-17 01:10:58', NULL, '2023-06-17 01:10:58', NULL),
(6, 'Tugas Harian 1', 'pengetahuan', 'Merangkum materi perihal bab kurban', '2023-06-06', 70, 20, 17, 13, '2023-06-17 00:59:49', '2023-06-17 01:15:28', NULL, '2023-06-17 01:13:31', '2023-06-17 01:15:28'),
(7, 'UTS', 'pengetahuan', 'Ulangan Tengah Semester', '2023-06-12', 70, 30, 17, 13, '2023-06-17 01:02:11', '2023-06-17 02:00:20', NULL, '2023-06-17 02:00:20', NULL),
(8, 'UTS', 'pengetahuan', 'Ujian Tengah Semester', '2023-06-13', 70, 40, 18, 13, '2023-06-17 01:02:12', '2023-06-17 01:11:29', NULL, '2023-06-17 01:11:29', NULL),
(9, 'UA', 'pengetahuan', 'Ujian Akhir Semester', '2023-06-21', 70, 40, 18, 13, '2023-06-17 01:05:14', '2023-06-17 01:11:45', NULL, '2023-06-17 01:11:45', NULL),
(10, 'Ulangan Harian', 'pengetahuan', 'Ulangan harian siswa mapel pendidikan agama', '2023-04-20', 70, 20, 17, 13, '2023-06-17 01:07:55', '2023-06-17 02:03:22', NULL, '2023-06-17 02:03:22', NULL),
(11, 'Tugas Harian', 'pengetahuan', 'Mencari berita dan membuat rangkuman terkait rancangan undang-undang', '2023-06-01', 70, 20, 18, 14, '2023-06-17 01:13:19', '2023-06-17 03:17:04', NULL, '2023-06-17 03:17:04', NULL),
(12, 'Praktek Membaca Surat Alquran', 'keterampilan', 'Membaca beberapa surat yang telah ditunjuk oleh guru mengajar', '2023-06-12', 70, 100, 17, 13, '2023-06-17 01:18:04', '2023-06-17 01:36:42', NULL, '2023-06-17 01:36:42', NULL),
(13, 'UAS', 'pengetahuan', 'Ulangan Akhir Semester', '2023-05-24', 70, 30, 17, 13, '2023-06-17 01:34:39', '2023-06-17 02:05:51', NULL, '2023-06-17 02:05:51', NULL),
(14, 'Praktek berpidato', 'keterampilan', 'Membuat pidato terkait perjuangan kemerdekaan dan mempresentasikan di depan kelas', '2023-06-06', 70, 100, 18, 13, '2023-06-17 01:34:47', '2023-06-17 01:35:02', NULL, '2023-06-17 01:35:02', NULL),
(15, 'UTS', 'pengetahuan', 'Ulangan Tengah Semester', '2023-04-18', 70, 50, 22, 13, '2023-06-17 01:35:24', '2023-06-17 01:37:03', NULL, '2023-06-17 01:37:03', NULL),
(16, 'UAS', 'pengetahuan', 'Ulangan Akhir Semester', '2023-06-16', 70, 50, 22, 13, '2023-06-17 01:35:55', '2023-06-17 01:37:30', NULL, '2023-06-17 01:37:30', NULL),
(17, 'Praktek Membaca Surat Alquran', 'keterampilan', 'Praktek membaca surat alquran yang ditunjuk guru mapel', '2023-06-06', 70, 100, 22, 13, '2023-06-17 01:38:24', '2023-06-17 01:38:41', NULL, '2023-06-17 01:38:41', NULL),
(18, 'Tugas Harian', 'pengetahuan', 'Membuat artikel terkait RUU KUHP', '2023-06-19', 70, 20, 23, 13, '2023-06-17 01:40:17', '2023-06-17 01:41:41', NULL, '2023-06-17 01:41:41', NULL),
(19, 'UTS', 'pengetahuan', 'Ujian Tengah Semester', '2023-06-15', 70, 40, 23, 13, '2023-06-17 01:40:50', '2023-06-17 01:41:56', NULL, '2023-06-17 01:41:56', NULL),
(20, 'UAS', 'pengetahuan', 'Ujian Akhir Semester', '2023-06-21', 70, 40, 23, 13, '2023-06-17 01:41:31', '2023-06-17 01:42:13', NULL, '2023-06-17 01:42:13', NULL),
(21, 'Praktek berpidato', 'keterampilan', 'Membuat pidato terkait perjuangan kemerdekaan dan mempresentasikan di depan kelas', '2023-06-19', 70, 100, 23, 13, '2023-06-17 01:42:59', '2023-06-17 01:43:13', NULL, '2023-06-17 01:43:13', NULL),
(22, 'UTS', 'pengetahuan', 'Ulangan Tengah Semester', '2023-04-28', 75, 50, 20, 13, '2023-06-17 02:17:26', '2023-06-17 02:19:09', NULL, '2023-06-17 02:19:09', NULL),
(23, 'UAS', 'pengetahuan', 'Ulangan Akhir Semester', '2023-06-08', 75, 50, 20, 13, '2023-06-17 02:18:04', '2023-06-17 02:19:25', NULL, '2023-06-17 02:19:25', NULL),
(24, 'UTS', 'pengetahuan', 'Ujian Tengah Semester', '2023-06-15', 70, 50, 21, 13, '2023-06-17 02:18:45', '2023-06-17 02:20:25', NULL, '2023-06-17 02:20:25', NULL),
(25, 'UAS', 'pengetahuan', 'Ujian Akhir Semester', '2023-06-21', 70, 50, 21, 13, '2023-06-17 02:19:16', '2023-06-17 02:20:39', NULL, '2023-06-17 02:20:39', NULL),
(26, 'Membaca Puisi', 'keterampilan', '', '2023-05-25', 75, 100, 20, 13, '2023-06-17 02:20:03', '2023-06-17 02:20:24', NULL, '2023-06-17 02:20:24', NULL),
(27, 'UTS', 'pengetahuan', '', '2023-06-13', 70, 50, 26, 13, '2023-06-17 02:28:40', '2023-06-17 02:29:20', NULL, '2023-06-17 02:29:20', NULL),
(28, 'UAS', 'pengetahuan', '', '2023-06-20', 70, 50, 26, 13, '2023-06-17 02:29:09', '2023-06-17 02:29:35', NULL, '2023-06-17 02:29:35', NULL),
(29, 'UTS', 'pengetahuan', 'Ulangan Tengah Semester', '2023-05-24', 75, 50, 24, 13, '2023-06-17 02:29:11', '2023-06-17 02:29:50', NULL, '2023-06-17 02:29:50', NULL),
(30, 'UAS', 'pengetahuan', 'Ulangan Akhir Semester', '2023-06-13', 75, 50, 24, 13, '2023-06-17 02:29:30', '2023-06-17 02:30:13', NULL, '2023-06-17 02:30:13', NULL),
(31, 'Membaca Undang-undang', 'keterampilan', 'Membaca undang-undang di depan kelas dilihat teman sekelas', '2023-05-26', 75, 100, 24, 13, '2023-06-17 02:31:12', '2023-06-17 02:31:19', NULL, '2023-06-17 02:31:19', NULL),
(32, 'Kliping Sejarah Indonesia', 'keterampilan', 'Membuat kliping terkait salah satu peristiwa pra kemerdekaan Indonesia', '2023-06-13', 70, 100, 21, 13, '2023-06-17 02:31:31', '2023-06-17 02:31:43', NULL, '2023-06-17 02:31:43', NULL),
(33, 'Puisi', 'keterampilan', 'Membuat dan membaca puisi dengan tema lingkungan', '2023-06-21', 70, 100, 26, 13, '2023-06-17 02:35:23', '2023-06-17 02:35:34', NULL, '2023-06-17 02:35:34', NULL),
(34, 'UTS', 'pengetahuan', '', '2023-06-15', 70, 50, 19, 13, '2023-06-17 02:45:15', '2023-06-17 02:46:01', NULL, '2023-06-17 02:46:01', NULL),
(35, 'UAS', 'pengetahuan', '', '2023-06-19', 70, 50, 19, 13, '2023-06-17 02:45:31', '2023-06-17 02:45:46', NULL, '2023-06-17 02:45:46', NULL),
(36, 'Studi Kasus', 'keterampilan', 'Menyelesaikan studi kasus secara mandiri di depan kelas', '2023-06-27', 70, 100, 19, 13, '2023-06-17 02:47:28', '2023-06-17 02:48:43', NULL, '2023-06-17 02:48:43', NULL),
(37, 'UTS', 'pengetahuan', 'Ulangan Tengah Semester', '2023-05-04', 70, 50, 25, 13, '2023-06-17 02:47:57', '2023-06-17 02:48:43', NULL, '2023-06-17 02:48:43', NULL),
(38, 'UAS', 'pengetahuan', 'Ulangan Akhir Semester', '2023-06-14', 70, 50, 25, 13, '2023-06-17 02:48:18', '2023-06-17 02:49:16', NULL, '2023-06-17 02:49:16', NULL),
(39, 'Studi Kasus', 'keterampilan', '', '2023-05-03', 70, 100, 25, 13, '2023-06-17 02:49:57', '2023-06-17 02:50:08', NULL, '2023-06-17 02:50:08', NULL),
(40, 'UTS', 'pengetahuan', '', '2023-05-30', 70, 50, 17, 14, '2023-06-17 03:15:23', '2023-06-17 03:15:59', NULL, '2023-06-17 03:15:59', NULL),
(41, 'UTS', 'pengetahuan', '', '2023-06-26', 70, 40, 18, 14, '2023-06-17 03:15:29', '2023-06-17 03:16:46', NULL, '2023-06-17 03:16:46', NULL),
(42, 'UAS', 'pengetahuan', '', '2023-06-09', 70, 50, 17, 14, '2023-06-17 03:15:40', '2023-06-17 03:17:43', NULL, '2023-06-17 03:17:43', NULL),
(43, 'UAS', 'pengetahuan', '', '2023-06-30', 70, 40, 18, 14, '2023-06-17 03:16:22', '2023-06-17 03:17:21', NULL, '2023-06-17 03:17:21', NULL),
(44, 'Praktek Membaca Surat Alquran', 'keterampilan', '', '2023-05-31', 70, 100, 17, 14, '2023-06-17 03:16:27', '2023-06-17 03:17:28', NULL, '2023-06-17 03:17:28', NULL),
(45, 'UTS', 'pengetahuan', '', '2023-05-31', 70, 50, 22, 14, '2023-06-17 03:16:51', '2023-06-17 03:17:15', NULL, '2023-06-17 03:17:15', NULL),
(46, 'UAS', 'pengetahuan', '', '2023-05-19', 70, 50, 22, 14, '2023-06-17 03:17:04', '2023-06-17 03:18:04', NULL, '2023-06-17 03:18:04', NULL),
(47, 'Praktek Membaca Surat Alquran', 'keterampilan', '', '2023-06-09', 70, 50, 22, 14, '2023-06-17 03:18:22', '2023-06-17 03:18:38', NULL, '2023-06-17 03:18:38', NULL),
(48, 'Kliping Pengamalan Pancasila', 'keterampilan', 'Membuat klipping terkait dengan pengamalan pancasila dalam kehidupan sehari-hari', '2023-06-29', 70, 100, 18, 14, '2023-06-17 03:18:48', '2023-06-17 03:19:00', NULL, '2023-06-17 03:19:00', NULL),
(49, 'UTS', 'pengetahuan', '', '2023-06-21', 70, 50, 23, 14, '2023-06-17 03:20:21', '2023-06-17 03:29:26', NULL, '2023-06-17 03:29:26', NULL),
(50, 'UAS', 'pengetahuan', '', '2023-06-29', 70, 50, 23, 14, '2023-06-17 03:29:16', '2023-06-17 03:29:37', NULL, '2023-06-17 03:29:37', NULL),
(51, 'Kliping Pengamalan Pancasila', 'keterampilan', '', '2023-06-21', 70, 100, 23, 14, '2023-06-17 03:30:18', '2023-06-17 03:30:33', NULL, '2023-06-17 03:30:33', NULL),
(52, 'UTS', 'pengetahuan', '', '2023-05-31', 70, 50, 20, 14, '2023-06-17 03:30:34', '2023-06-17 03:30:52', NULL, '2023-06-17 03:30:52', NULL),
(53, 'UAS', 'pengetahuan', '', '2023-06-09', 70, 50, 20, 14, '2023-06-17 03:30:45', '2023-06-17 03:31:05', NULL, '2023-06-17 03:31:05', NULL),
(54, 'Membaca Puisi', 'keterampilan', '', '2023-05-25', 70, 100, 20, 14, '2023-06-17 03:31:27', '2023-06-17 03:31:36', NULL, '2023-06-17 03:31:36', NULL),
(55, 'UTS', 'pengetahuan', '', '2023-06-15', 70, 50, 19, 14, '2023-06-17 03:36:00', '2023-06-17 03:36:21', NULL, '2023-06-17 03:36:21', NULL),
(56, 'UAS', 'pengetahuan', '', '2023-06-21', 70, 50, 19, 14, '2023-06-17 03:36:15', '2023-06-17 03:36:34', NULL, '2023-06-17 03:36:34', NULL),
(57, 'Studi kasus', 'keterampilan', '', '2023-06-22', 70, 100, 19, 14, '2023-06-17 03:37:14', '2023-06-17 03:37:26', NULL, '2023-06-17 03:37:26', NULL),
(58, 'UTS', 'pengetahuan', '', '2023-06-01', 70, 50, 21, 14, '2023-06-17 03:37:31', '2023-06-17 03:37:51', NULL, '2023-06-17 03:37:51', NULL),
(59, 'UAS', 'pengetahuan', '', '2023-06-20', 70, 50, 21, 14, '2023-06-17 03:37:43', '2023-06-17 03:38:24', NULL, '2023-06-17 03:38:24', NULL),
(60, 'UTS', 'pengetahuan', '', '2023-06-17', 70, 50, 25, 14, '2023-06-17 03:37:53', '2023-06-17 03:38:17', NULL, '2023-06-17 03:38:17', NULL),
(61, 'UAS', 'pengetahuan', '', '2023-06-23', 70, 50, 25, 14, '2023-06-17 03:38:08', '2023-06-17 03:38:31', NULL, '2023-06-17 03:38:31', NULL),
(62, 'Kliping Sejarah', 'keterampilan', '', '2023-06-01', 70, 100, 21, 14, '2023-06-17 03:38:53', '2023-06-17 03:39:09', NULL, '2023-06-17 03:39:09', NULL),
(63, 'Studi kasus', 'keterampilan', '', '2023-06-17', 70, 100, 25, 14, '2023-06-17 03:39:07', '2023-06-17 03:39:19', NULL, '2023-06-17 03:39:19', NULL),
(64, 'UTS', 'pengetahuan', '', '2023-05-25', 70, 50, 26, 14, '2023-06-17 03:39:31', '2023-06-17 03:40:06', NULL, '2023-06-17 03:40:06', NULL),
(65, 'UAS', 'pengetahuan', '', '2023-06-08', 70, 50, 26, 14, '2023-06-17 03:39:47', '2023-06-17 03:40:34', NULL, '2023-06-17 03:40:34', NULL),
(66, 'Membaca Puisi', 'keterampilan', '', '2023-05-29', 70, 100, 26, 14, '2023-06-17 03:40:56', '2023-06-17 03:44:31', NULL, '2023-06-17 03:41:04', NULL),
(67, 'UTS', 'pengetahuan', '', '2023-06-17', 70, 50, 29, 15, '2023-06-17 03:58:35', '2023-06-17 03:58:59', NULL, '2023-06-17 03:58:59', NULL),
(68, 'Ujian', 'pengetahuan', '', '2023-05-31', 70, 100, 27, 15, '2023-06-17 03:58:44', '2023-06-17 03:58:53', NULL, '2023-06-17 03:58:53', NULL),
(69, 'UAS', 'pengetahuan', '', '2023-06-24', 70, 50, 29, 15, '2023-06-17 03:58:50', '2023-06-17 03:59:33', NULL, '2023-06-17 03:59:33', NULL),
(70, 'Praktek Sholat', 'keterampilan', '', '2023-06-01', 70, 100, 27, 15, '2023-06-17 03:59:23', '2023-06-17 03:59:29', NULL, '2023-06-17 03:59:29', NULL),
(71, 'Ujian', 'pengetahuan', '', '2023-06-01', 70, 100, 28, 15, '2023-06-17 03:59:51', '2023-06-17 03:59:57', NULL, '2023-06-17 03:59:57', NULL),
(72, 'Praktek berpidato', 'keterampilan', '', '2023-06-17', 70, 100, 29, 15, '2023-06-17 03:59:57', '2023-06-17 04:00:06', NULL, '2023-06-17 04:00:06', NULL),
(73, 'Praktek Sholat', 'keterampilan', '', '2023-06-10', 70, 100, 28, 15, '2023-06-17 04:00:27', '2023-06-17 04:00:37', NULL, '2023-06-17 04:00:37', NULL),
(74, 'UTS', 'pengetahuan', '', '2023-06-17', 70, 50, 30, 15, '2023-06-17 04:00:33', '2023-06-17 04:00:53', NULL, '2023-06-17 04:00:53', NULL),
(75, 'UAS', 'pengetahuan', '', '2023-06-17', 70, 50, 30, 15, '2023-06-17 04:00:46', '2023-06-17 04:01:08', NULL, '2023-06-17 04:01:08', NULL),
(76, 'Praktek berpidato', 'keterampilan', '', '2023-06-17', 70, 100, 30, 15, '2023-06-17 04:01:34', '2023-06-17 04:01:46', NULL, '2023-06-17 04:01:46', NULL),
(77, 'Ujian', 'pengetahuan', '', '2023-06-08', 70, 100, 31, 15, '2023-06-17 04:09:40', '2023-06-17 04:09:54', NULL, '2023-06-17 04:09:54', NULL),
(78, 'Ujian', 'pengetahuan', '', '2023-06-17', 70, 100, 33, 15, '2023-06-17 04:09:51', '2023-06-17 04:10:00', NULL, '2023-06-17 04:10:00', NULL),
(79, 'Praktek Pantun', 'keterampilan', '', '2023-06-14', 70, 100, 31, 15, '2023-06-17 04:10:31', '2023-06-17 04:10:38', NULL, '2023-06-17 04:10:38', NULL),
(80, 'Membaca Alquran', 'keterampilan', '', '2023-06-17', 70, 100, 33, 15, '2023-06-17 04:10:38', '2023-06-17 04:10:44', NULL, '2023-06-17 04:10:44', NULL),
(81, 'Ujian', 'pengetahuan', '', '2023-05-17', 70, 100, 32, 15, '2023-06-17 04:11:00', '2023-06-17 04:12:57', NULL, '2023-06-17 04:11:20', NULL),
(82, 'Ujian', 'pengetahuan', '', '2023-06-17', 70, 100, 35, 15, '2023-06-17 04:11:07', '2023-06-17 04:11:13', NULL, '2023-06-17 04:11:13', NULL),
(83, 'Praktek berpidato', 'keterampilan', '', '2023-06-17', 70, 100, 35, 15, '2023-06-17 04:11:31', '2023-06-17 04:11:42', NULL, '2023-06-17 04:11:42', NULL),
(84, 'Praktek Pantun', 'keterampilan', '', '2023-06-10', 70, 100, 32, 15, '2023-06-17 04:11:46', '2023-06-17 04:13:14', NULL, '2023-06-17 04:11:54', NULL),
(85, 'Ujian', 'pengetahuan', '', '2023-06-17', 70, 100, 37, 15, '2023-06-17 04:12:19', '2023-06-17 04:12:26', NULL, '2023-06-17 04:12:26', NULL),
(86, 'Ujian', 'pengetahuan', '', '2023-06-09', 70, 100, 34, 15, '2023-06-17 04:12:34', '2023-06-17 04:13:44', NULL, '2023-06-17 04:13:44', NULL),
(87, 'Membaca Naskah', 'keterampilan', '', '2023-06-17', 70, 100, 37, 15, '2023-06-17 04:12:50', '2023-06-17 04:12:57', NULL, '2023-06-17 04:12:57', NULL),
(88, 'Praktek Membaca Surat Alquran', 'keterampilan', '', '2023-06-06', 70, 100, 34, 15, '2023-06-17 04:14:43', '2023-06-17 04:14:52', NULL, '2023-06-17 04:14:52', NULL),
(89, 'Ujian', 'pengetahuan', '', '2023-06-02', 70, 100, 36, 15, '2023-06-17 04:15:16', '2023-06-17 04:15:25', NULL, '2023-06-17 04:15:25', NULL),
(90, 'Baca UUD', 'keterampilan', '', '2023-06-06', 70, 100, 36, 15, '2023-06-17 04:15:45', '2023-06-17 04:15:51', NULL, '2023-06-17 04:15:51', NULL),
(91, 'Ujian', 'pengetahuan', '', '2023-05-24', 70, 100, 38, 15, '2023-06-17 04:16:42', '2023-06-17 04:16:50', NULL, '2023-06-17 04:16:50', NULL),
(92, 'Praktek Dialog', 'keterampilan', '', '2023-06-06', 70, 100, 38, 15, '2023-06-17 04:17:15', '2023-06-17 04:17:23', NULL, '2023-06-17 04:17:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(3) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `wali_kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `id_ta`, `wali_kelas_id`) VALUES
(2, '001', 'X IPA ', 1, 12),
(4, '002', 'X IPS', 1, 6),
(5, '003', 'XI MIPA', 1, 1),
(7, '004', 'XI IPS', 3, 9),
(11, '005', 'XII MIPA', 8, NULL),
(12, '006', 'XII IPS ', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_deskripsi`
--

CREATE TABLE `list_deskripsi` (
  `listdesk_id` int(11) NOT NULL,
  `listdesk_guru_id` int(11) NOT NULL,
  `listdesk_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_deskripsi`
--

INSERT INTO `list_deskripsi` (`listdesk_id`, `listdesk_guru_id`, `listdesk_deskripsi`) VALUES
(13, 1, 'tanggung jawab; yaitu sikap dalam melaksanakan tugas dan kewajiban yang seharusnya dilaksanakan'),
(15, 1, 'berikhtiyar dalam setiap usaha dan berserah diri'),
(16, 1, 'Tetap Semangat belajarnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int(11) NOT NULL,
  `kode_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(100) NOT NULL,
  `kkm_mapel` tinyint(3) UNSIGNED NOT NULL,
  `kategori_mapel` enum('Kelompok A (Umum)','Kelompok B (Umum)','Kelompok C (Peminatan)') NOT NULL,
  `jurusan_mapel` enum('IPA','IPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `kode_matapelajaran`, `nama_matapelajaran`, `kkm_mapel`, `kategori_mapel`, `jurusan_mapel`) VALUES
(8, 'mp01', 'Pendidikan Agama dan Budi Pekerti', 70, 'Kelompok A (Umum)', 'IPA'),
(9, 'mp02', 'Pendidikan Pancasila dan Kewarganegaraan', 75, 'Kelompok A (Umum)', 'IPA'),
(10, 'mp03', 'Bahasa Indonesia', 75, 'Kelompok A (Umum)', 'IPA'),
(11, 'mp04 ', 'Matematika', 70, 'Kelompok A (Umum)', 'IPA'),
(12, 'mp05', 'Sejarah Indonesia', 76, 'Kelompok A (Umum)', 'IPA'),
(13, 'mp06', 'Bahasa Inggris', 75, 'Kelompok A (Umum)', 'IPA'),
(14, 'mp07', 'Seni Budaya', 72, 'Kelompok B (Umum)', 'IPA'),
(15, 'mp08', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 76, 'Kelompok B (Umum)', 'IPA'),
(16, 'mp09', 'Prakarya dan Kewirausahaan', 70, 'Kelompok B (Umum)', 'IPA'),
(17, 'mp10', 'Muatan Lokal : Bahasa Jawa', 70, 'Kelompok B (Umum)', 'IPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akademik`
--

CREATE TABLE `nilai_akademik` (
  `na_id` int(11) NOT NULL,
  `na_kategori_id` int(11) NOT NULL,
  `na_siswa_id` int(11) NOT NULL,
  `na_nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_akademik`
--

INSERT INTO `nilai_akademik` (`na_id`, `na_kategori_id`, `na_siswa_id`, `na_nilai`) VALUES
(13, 5, 24, 80),
(14, 5, 25, 90),
(15, 5, 26, 85),
(16, 8, 24, 80),
(17, 8, 25, 80),
(18, 8, 26, 80),
(19, 9, 24, 85),
(20, 9, 25, 85),
(21, 9, 26, 85),
(22, 6, 24, 92),
(23, 6, 25, 90),
(24, 6, 26, 88),
(25, 14, 24, 90),
(26, 14, 25, 90),
(27, 14, 26, 90),
(28, 12, 24, 85),
(29, 12, 25, 85),
(30, 12, 26, 85),
(31, 15, 15, 89),
(32, 15, 16, 89),
(33, 15, 17, 89),
(34, 16, 15, 90),
(35, 16, 16, 90),
(36, 16, 17, 90),
(37, 17, 15, 89),
(38, 17, 16, 89),
(39, 17, 17, 90),
(40, 18, 15, 80),
(41, 18, 16, 80),
(42, 18, 17, 80),
(43, 19, 15, 83),
(44, 19, 16, 88),
(45, 19, 17, 85),
(46, 20, 15, 88),
(47, 20, 16, 90),
(48, 20, 17, 87),
(49, 21, 15, 90),
(50, 21, 16, 95),
(51, 21, 17, 90),
(52, 7, 24, 85),
(53, 7, 25, 85),
(54, 7, 26, 85),
(55, 10, 24, 87),
(56, 10, 25, 88),
(57, 10, 26, 86),
(58, 13, 24, 90),
(59, 13, 25, 90),
(60, 13, 26, 89),
(61, 22, 24, 95),
(62, 22, 25, 90),
(63, 22, 26, 93),
(64, 23, 24, 90),
(65, 23, 25, 90),
(66, 23, 26, 90),
(67, 26, 24, 89),
(68, 26, 25, 86),
(69, 26, 26, 87),
(70, 24, 24, 87),
(71, 24, 25, 88),
(72, 24, 26, 89),
(73, 25, 24, 90),
(74, 25, 25, 95),
(75, 25, 26, 92),
(76, 27, 15, 80),
(77, 27, 16, 80),
(78, 27, 17, 80),
(79, 28, 15, 90),
(80, 28, 16, 90),
(81, 28, 17, 90),
(82, 29, 15, 86),
(83, 29, 16, 85),
(84, 29, 17, 82),
(85, 30, 15, 80),
(86, 30, 16, 84),
(87, 30, 17, 81),
(88, 31, 15, 80),
(89, 31, 16, 80),
(90, 31, 17, 80),
(91, 32, 24, 87),
(92, 32, 25, 90),
(93, 32, 26, 85),
(94, 33, 15, 90),
(95, 33, 16, 92),
(96, 33, 17, 90),
(97, 35, 24, 80),
(98, 35, 25, 80),
(99, 35, 26, 80),
(100, 34, 24, 93),
(101, 34, 25, 93),
(102, 34, 26, 93),
(103, 36, 24, 75),
(104, 36, 25, 76),
(105, 36, 26, 77),
(106, 37, 15, 69),
(107, 37, 16, 75),
(108, 37, 17, 79),
(109, 38, 15, 70),
(110, 38, 16, 75),
(111, 38, 17, 73),
(112, 39, 15, 80),
(113, 39, 16, 80),
(114, 39, 17, 80),
(115, 40, 24, 90),
(116, 40, 25, 90),
(117, 40, 26, 90),
(118, 41, 24, 85),
(119, 41, 25, 87),
(120, 41, 26, 89),
(121, 11, 24, 95),
(122, 11, 25, 91),
(123, 11, 26, 90),
(124, 45, 15, 80),
(125, 45, 16, 80),
(126, 45, 17, 80),
(127, 43, 24, 80),
(128, 43, 25, 83),
(129, 43, 26, 88),
(130, 44, 24, 80),
(131, 44, 25, 80),
(132, 44, 26, 80),
(133, 42, 24, 80),
(134, 42, 25, 80),
(135, 42, 26, 80),
(136, 46, 15, 80),
(137, 46, 16, 80),
(138, 46, 17, 80),
(139, 47, 15, 80),
(140, 47, 16, 80),
(141, 47, 17, 80),
(142, 48, 24, 95),
(143, 48, 25, 95),
(144, 48, 26, 95),
(145, 49, 15, 80),
(146, 49, 16, 80),
(147, 49, 17, 80),
(148, 50, 15, 90),
(149, 50, 16, 90),
(150, 50, 17, 90),
(151, 51, 15, 95),
(152, 51, 16, 95),
(153, 51, 17, 95),
(154, 52, 24, 80),
(155, 52, 25, 80),
(156, 52, 26, 80),
(157, 53, 24, 80),
(158, 53, 25, 80),
(159, 53, 26, 80),
(160, 54, 24, 80),
(161, 54, 25, 80),
(162, 54, 26, 80),
(163, 55, 24, 80),
(164, 55, 25, 80),
(165, 55, 26, 80),
(166, 56, 24, 75),
(167, 56, 25, 76),
(168, 56, 26, 74),
(169, 57, 24, 77),
(170, 57, 25, 72),
(171, 57, 26, 71),
(172, 58, 24, 80),
(173, 58, 25, 80),
(174, 58, 26, 80),
(175, 60, 15, 80),
(176, 60, 16, 87),
(177, 60, 17, 88),
(178, 59, 24, 80),
(179, 59, 25, 80),
(180, 59, 26, 80),
(181, 61, 15, 90),
(182, 61, 16, 87),
(183, 61, 17, 81),
(184, 62, 24, 80),
(185, 62, 25, 80),
(186, 62, 26, 80),
(187, 63, 15, 87),
(188, 63, 16, 86),
(189, 63, 17, 85),
(190, 64, 15, 90),
(191, 64, 16, 90),
(192, 64, 17, 90),
(193, 65, 15, 90),
(194, 65, 16, 90),
(195, 65, 17, 90),
(196, 66, 15, 90),
(197, 66, 16, 90),
(198, 66, 17, 90),
(199, 68, 15, 89),
(200, 68, 16, 89),
(201, 68, 17, 89),
(202, 67, 15, 80),
(203, 67, 16, 89),
(204, 67, 17, 87),
(205, 70, 15, 80),
(206, 70, 16, 80),
(207, 70, 17, 80),
(208, 69, 15, 90),
(209, 69, 16, 87),
(210, 69, 17, 84),
(211, 71, 24, 90),
(212, 71, 25, 90),
(213, 71, 26, 90),
(214, 72, 15, 80),
(215, 72, 16, 87),
(216, 72, 17, 85),
(217, 73, 24, 85),
(218, 73, 25, 85),
(219, 73, 26, 85),
(220, 74, 24, 80),
(221, 74, 25, 80),
(222, 74, 26, 80),
(223, 75, 24, 89),
(224, 75, 25, 87),
(225, 75, 26, 84),
(226, 76, 24, 87),
(227, 76, 25, 86),
(228, 76, 26, 84),
(229, 77, 15, 89),
(230, 77, 16, 87),
(231, 77, 17, 78),
(232, 78, 12, 80),
(233, 78, 13, 80),
(234, 78, 14, 80),
(235, 79, 15, 89),
(236, 79, 16, 89),
(237, 79, 17, 89),
(238, 80, 12, 80),
(239, 80, 13, 80),
(240, 80, 14, 80),
(241, 82, 12, 80),
(242, 82, 13, 80),
(243, 82, 14, 80),
(244, 81, 24, 87),
(245, 81, 25, 86),
(246, 81, 26, 89),
(247, 83, 12, 80),
(248, 83, 13, 80),
(249, 83, 14, 80),
(250, 84, 24, 89),
(251, 84, 25, 87),
(252, 84, 26, 87),
(253, 85, 12, 80),
(254, 85, 13, 80),
(255, 85, 14, 80),
(256, 87, 12, 80),
(257, 87, 13, 80),
(258, 87, 14, 80),
(259, 86, 9, 89),
(260, 86, 10, 89),
(261, 86, 11, 98),
(262, 88, 9, 80),
(263, 88, 10, 80),
(264, 88, 11, 80),
(265, 89, 9, 89),
(266, 89, 10, 89),
(267, 89, 11, 89),
(268, 90, 9, 90),
(269, 90, 10, 90),
(270, 90, 11, 90),
(271, 91, 9, 80),
(272, 91, 10, 80),
(273, 91, 11, 80),
(274, 92, 9, 80),
(275, 92, 10, 80),
(276, 92, 11, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_non_akademik`
--

CREATE TABLE `nilai_non_akademik` (
  `non_id` int(11) NOT NULL,
  `non_kelas_id` int(11) NOT NULL,
  `non_wali_kelas_id` int(11) NOT NULL,
  `non_semester_id` int(11) NOT NULL,
  `non_created_by` int(11) NOT NULL,
  `non_created_at` datetime NOT NULL,
  `non_edited_by` int(11) DEFAULT NULL,
  `non_edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_non_akademik`
--

INSERT INTO `nilai_non_akademik` (`non_id`, `non_kelas_id`, `non_wali_kelas_id`, `non_semester_id`, `non_created_by`, `non_created_at`, `non_edited_by`, `non_edited_at`) VALUES
(2, 4, 6, 13, 6, '2023-06-17 02:03:19', NULL, '2023-06-17 02:03:19'),
(3, 2, 9, 13, 9, '2023-06-17 02:41:07', NULL, '2023-06-17 02:41:07'),
(4, 4, 6, 14, 6, '2023-06-17 03:33:33', NULL, '2023-06-17 03:33:33'),
(5, 2, 9, 14, 9, '2023-06-17 03:34:47', NULL, '2023-06-17 03:34:47'),
(6, 5, 1, 15, 1, '2023-06-17 04:06:49', NULL, '2023-06-17 04:06:49'),
(7, 4, 6, 15, 6, '2023-06-17 04:07:32', NULL, '2023-06-17 04:07:32'),
(8, 7, 9, 15, 9, '2023-06-17 04:21:12', NULL, '2023-06-17 04:21:12'),
(9, 2, 12, 15, 12, '2023-06-17 04:23:59', NULL, '2023-06-17 04:23:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_non_akademik_detail`
--

CREATE TABLE `nilai_non_akademik_detail` (
  `nond_id` int(11) NOT NULL,
  `nond_non_id` int(11) NOT NULL,
  `nond_siswa_id` int(11) NOT NULL,
  `nond_spiritual_predikat` enum('Baik','Cukup','Sedang') NOT NULL,
  `nond_spiritual_deskripsi` text NOT NULL,
  `nond_sosial_predikat` enum('Baik','Cukup','Sedang') NOT NULL,
  `nond_sosial_deskripsi` text NOT NULL,
  `nond_sakit` int(10) UNSIGNED NOT NULL,
  `nond_izin` int(10) UNSIGNED NOT NULL,
  `nond_tanpa_keterangan` int(10) UNSIGNED NOT NULL,
  `nond_catatan_wali_kelas` text NOT NULL,
  `nond_catatan_ortu` text DEFAULT NULL,
  `nond_created_by` int(11) NOT NULL,
  `nond_created_at` datetime NOT NULL,
  `nond_edited_by` int(11) DEFAULT NULL,
  `nond_edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_non_akademik_detail`
--

INSERT INTO `nilai_non_akademik_detail` (`nond_id`, `nond_non_id`, `nond_siswa_id`, `nond_spiritual_predikat`, `nond_spiritual_deskripsi`, `nond_sosial_predikat`, `nond_sosial_deskripsi`, `nond_sakit`, `nond_izin`, `nond_tanpa_keterangan`, `nond_catatan_wali_kelas`, `nond_catatan_ortu`, `nond_created_by`, `nond_created_at`, `nond_edited_by`, `nond_edited_at`) VALUES
(5, 2, 24, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 2, 2, 0, 'Nilai akadmik dan non-akademik yang bagu. Pertahankan.', NULL, 6, '2023-06-17 02:03:19', 6, '2023-06-17 02:03:41'),
(6, 2, 25, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 1, 0, 0, 'Nilai akadmik dan non-akademik yang bagu. Pertahankan', NULL, 6, '2023-06-17 02:04:43', 6, '2023-06-17 02:04:57'),
(7, 2, 26, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 0, 0, 0, 'Nilai akadmik dan non-akademik yang bagu. Pertahankan', NULL, 6, '2023-06-17 02:10:46', NULL, '2023-06-17 02:10:46'),
(8, 3, 15, 'Baik', 'Berdoa sebelum dan sesudah melaksanakan kegiatan', 'Baik', 'Disiplin; yaitu perilaku tertib dan patuh pada peraturan', 3, 1, 0, 'Jadilah juara di setiap masa', NULL, 9, '2023-06-17 02:41:07', 9, '2023-06-17 02:42:13'),
(9, 3, 16, 'Baik', 'Menjalankan ibadah sesuai agama dan kepercayaan yang dianut', 'Baik', 'Jujur; yaitu perilaku dapat dipercaya dalam perkataan, sikap dan perbuatan', 7, 3, 0, 'Tingkatkan kedisiplinan kehadiran', NULL, 9, '2023-06-17 02:43:50', NULL, '2023-06-17 02:43:50'),
(10, 3, 17, 'Baik', 'Mengucapkan salam di awal dan akhir kegiatan', 'Baik', 'Percaya diri; yaitu keyakinan pada kemampuan diri dalam melakukan perbuatan', 1, 1, 0, 'Sudah baik tingkatkan', NULL, 9, '2023-06-17 02:45:21', 9, '2023-06-17 02:45:46'),
(11, 4, 24, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 1, 1, 0, 'Ambillah pelajaran dimasa lalu, jadikanlah motivasi untuk masa yang akan datang', NULL, 6, '2023-06-17 03:33:33', NULL, '2023-06-17 03:33:33'),
(12, 4, 25, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 1, 1, 0, 'Ambillah pelajaran dimasa lalu, jadikanlah motivasi untuk masa yang akan datang', NULL, 6, '2023-06-17 03:34:06', NULL, '2023-06-17 03:34:06'),
(13, 4, 26, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 1, 1, 0, 'Ambillah pelajaran dimasa lalu, jadikanlah motivasi untuk masa yang akan datang', NULL, 6, '2023-06-17 03:34:45', NULL, '2023-06-17 03:34:45'),
(14, 5, 15, 'Baik', 'Berdoa sebelum dan sesudah melaksanakan kegiatan', 'Baik', 'Santun; yaitu sikap yang baik dalam pergaulan, baik dalam perkataan maupun perbuatan', 1, 1, 0, 'Belajar lebih giat', NULL, 9, '2023-06-17 03:34:47', NULL, '2023-06-17 03:34:47'),
(15, 5, 16, 'Baik', 'Berdoa sebelum dan sesudah melaksanakan kegiatan', 'Baik', 'Tanggung jawab; yaitu sikap dalam melaksanakan tugas dan kewajiban yang seharusnya dilaksanakan', 2, 1, 0, 'Belajar lebih giat', NULL, 9, '2023-06-17 03:35:41', NULL, '2023-06-17 03:35:41'),
(16, 5, 17, 'Baik', 'Berikhtiyar dalam setiap usaha dan berserah diri', 'Baik', 'Tanggung jawab; yaitu sikap dalam melaksanakan tugas dan kewajiban yang seharusnya dilaksanakan', 0, 0, 0, 'Belajar lebih giat', NULL, 9, '2023-06-17 03:36:22', NULL, '2023-06-17 03:36:22'),
(17, 6, 15, 'Baik', 'berikhtiyar dalam setiap usaha dan berserah diri', 'Baik', 'tanggung jawab; yaitu sikap dalam melaksanakan tugas dan kewajiban yang seharusnya dilaksanakan', 1, 1, 0, 'Tetap Semangat belajarnya', NULL, 1, '2023-06-17 04:06:49', NULL, '2023-06-17 04:06:49'),
(18, 6, 16, 'Baik', 'memelihara hubungan dengan sesama ciptaan Tuhan', 'Baik', 'tanggung jawab; yaitu sikap dalam melaksanakan tugas dan kewajiban yang seharusnya dilaksanakan', 0, 0, 0, 'Tetap Semangat belajar pasti bisa', NULL, 1, '2023-06-17 04:07:26', NULL, '2023-06-17 04:07:26'),
(19, 7, 12, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 2, 1, 0, 'Jangan pernah kehilangan harapan, karena itu adalah kunci untuk meraih semua mimpimu.', NULL, 6, '2023-06-17 04:07:32', NULL, '2023-06-17 04:07:32'),
(20, 7, 13, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 2, 2, 0, 'Jangan pernah kehilangan harapan, karena itu adalah kunci untuk meraih semua mimpimu.', NULL, 6, '2023-06-17 04:08:01', NULL, '2023-06-17 04:08:01'),
(21, 6, 17, 'Baik', 'berdoa sebelum dan sesudah melaksanakan kegiatan', 'Baik', 'santun; yaitu sikap yang baik dalam pergaulan, baik dalam perkataan maupun perbuatan', 3, 2, 0, 'Belajar yang rajin ', NULL, 1, '2023-06-17 04:08:02', NULL, '2023-06-17 04:08:02'),
(22, 7, 14, 'Baik', 'Rajin dalam beribadah', 'Baik', 'Baik dalam berteman dan bersosial', 2, 2, 0, 'Jangan pernah kehilangan harapan, karena itu adalah kunci untuk meraih semua mimpimu.', NULL, 6, '2023-06-17 04:08:29', NULL, '2023-06-17 04:08:29'),
(23, 8, 24, 'Baik', 'menjalankan ibadah sesuai agama dan kepercayaan yang dianut', 'Baik', 'santun; yaitu sikap yang baik dalam pergaulan, baik dalam perkataan maupun perbuatan', 1, 1, 0, 'Belajar lah yang semngat', NULL, 9, '2023-06-17 04:21:12', NULL, '2023-06-17 04:21:12'),
(24, 8, 25, 'Baik', 'menjalankan ibadah sesuai agama dan kepercayaan yang dianut', 'Baik', 'gotong royong; yaitu tolong-menolong, berbagi tugas maupun bekerja sama dengan orang lain untuk mencapai tujuan bersama', 2, 1, 0, 'Belajar', NULL, 9, '2023-06-17 04:21:56', NULL, '2023-06-17 04:21:56'),
(25, 8, 26, 'Baik', 'bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa', 'Baik', 'gotong royong; yaitu tolong-menolong, berbagi tugas maupun bekerja sama dengan orang lain untuk mencapai tujuan bersama', 1, 1, 0, 'Belajar ya', NULL, 9, '2023-06-17 04:22:36', NULL, '2023-06-17 04:22:36'),
(26, 9, 9, 'Baik', 'bersyukur atas nikmat dan karunia Tuhan Yang Maha Esa', 'Baik', 'santun; yaitu sikap yang baik dalam pergaulan, baik dalam perkataan maupun perbuatan', 1, 1, 0, 'Giat belajar', NULL, 12, '2023-06-17 04:23:59', NULL, '2023-06-17 04:23:59'),
(27, 9, 10, 'Baik', 'menghormati orang lain yang menjalankan ibadahnya masing-masing (toleransi)', 'Baik', 'santun; yaitu sikap yang baik dalam pergaulan, baik dalam perkataan maupun perbuatan', 1, 12, 0, 'Kurangi izin keluar', NULL, 12, '2023-06-17 04:24:34', NULL, '2023-06-17 04:24:34'),
(28, 9, 11, 'Baik', 'menghormati orang lain yang menjalankan ibadahnya masing-masing (toleransi)', 'Baik', 'santun; yaitu sikap yang baik dalam pergaulan, baik dalam perkataan maupun perbuatan', 3, 1, 0, 'Harus banyak belajar', NULL, 12, '2023-06-17 04:25:02', NULL, '2023-06-17 04:25:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nis_siswa` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `username`, `password`, `nama`, `no_hp`, `pekerjaan`, `nis_siswa`, `alamat`) VALUES
(8, 'Ahmad', 'MTIzNA==', 'Ahmad Sarino', '085750942769', 'Buruh', 3453, 'Jatiroto'),
(9, 'Ratiman', 'MTIzNA==', 'Ratiman', '08277288262', 'Petani', 27, 'Kalipurwo'),
(10, 'Samsul', 'MTIzNA==', 'Samsul Bahari', '083156980795', 'Buruh', 3427, 'Petahunan'),
(11, 'Mairan', 'MTIzNA==', 'Mairan Marsito', '083131178922', 'Buruh', 3454, 'Kaliputih'),
(12, 'supenda', 'MTIzNA==', 'Supenda', '083869752666', 'Wirausaha', 3455, 'Semanding'),
(13, 'Suratman', 'MTIzNA==', 'Suratman', '083820774890', 'Buruh', 3456, 'Kalipurwo'),
(14, 'sumislam', 'MTIzNA==', 'Sumislam', '083153948365', 'Buruh', 3428, 'Selokerto'),
(15, 'Nasrudin', 'MTIzNA==', 'Nasrudin', '083154836763', 'Buruh', 3429, 'Lemahduwur'),
(16, 'Jajang', 'MTIzNA==', 'Jajang Achmad Suhada', '083867299650', 'Buruh', 3457, 'Petahunan'),
(17, 'Parimin', 'MTIzNA==', 'Parimin', '083838052711', 'Wiraswasta', 3430, 'Romagunung'),
(18, 'sadir', 'MTIzNA==', 'Sadir Mulyadi', '08882608440', 'Pedagang', 3431, 'Karangreja'),
(19, 'Riyanto', 'MTIzNA==', 'Riyanto', '085643093960', 'Buruh', 3432, 'Kalibeji'),
(20, 'Marto', 'MTIzNA==', 'Marto Suwito', '081325549895', 'Buruh', 2476, 'Gunungmujil'),
(21, 'Giriyanto', 'MTIzNA==', 'Giriyanto', '083899368795', 'PNS', 3459, 'Kalimangir'),
(22, 'Poniman', 'MTIzNA==', 'Poniman', '088238797682', 'Buruh', 3433, 'Tunjungseto'),
(23, 'Suparto', 'MTIzNA==', 'Suparto', '085700216831', 'Karyawan Swasta', 3477, 'Kalipurwo'),
(24, 'Hadi', 'MTIzNA==', 'Hadi Sugiyanto', '083111705987', 'Buruh', 3434, 'Semanding'),
(25, 'Edi', 'MTIzNA==', 'Edi Siswanto', '088215836871', 'Wiraswasta', 3435, 'Karangreja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengumuman` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `pengumuman`, `created_at`, `updated_at`) VALUES
(1, 'Hari Kartini', 'Pada 21 April 2023, SMA PGRI 1 Gombong melaksanakan upacara peringatan hari Kartini. Bapak/Ibu Guru dan Karyawan mengadakan lomba masak mie goreng, sedangkan siswa-siswi SMA PGRI 1 Gombong melaksanakan kebersihan lingkungan sekolah.', '2023-01-29', '2023-01-29'),
(2, 'Pramuka', 'Hari Jumat harap membawa perlengkapan pramuka untuk kelas 9 ya!', '2023-01-29', '2023-02-10'),
(4, 'SMA PGRI 1 Gombong Peduli Pencegahan Covid-19', 'PENCEGAHAN PERSEBARAN COVID-19\r\n1. Cuci tangan dengan sabun\r\n2. Jaga jarak 1 sampai 2 meter dalam berkomunikasi\r\n3. Isolasi diri di rumah\r\n4. Tidak berada dan menghindari kerumunan', '2023-02-04', '0000-00-00'),
(6, 'Hari Kartini', 'Diharap Menggunakan baju adat', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `prestasi_id` int(11) NOT NULL,
  `prestasi_nama` varchar(50) NOT NULL,
  `prestasi_deskripsi` text NOT NULL,
  `prestasi_nond_id` int(11) NOT NULL,
  `prestasi_created_at` datetime NOT NULL,
  `prestasi_created_by` int(11) NOT NULL,
  `prestasi_edited_at` datetime NOT NULL,
  `prestasi_edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`prestasi_id`, `prestasi_nama`, `prestasi_deskripsi`, `prestasi_nond_id`, `prestasi_created_at`, `prestasi_created_by`, `prestasi_edited_at`, `prestasi_edited_by`) VALUES
(5, 'Juara Baca Puisi Antar Kabupaten', 'Juara Harapan 1 di tingkat Kabupaten', 8, '2023-06-17 02:42:13', 9, '2023-06-17 02:42:13', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT NULL,
  `mulai_by` int(11) DEFAULT NULL,
  `selesai_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `id_ta`, `semester`, `mulai`, `selesai`, `mulai_by`, `selesai_by`) VALUES
(13, 11, 'ganjil', '2023-06-16 16:05:09', '2023-06-17 03:13:24', 4, 4),
(14, 11, 'genap', '2023-06-17 03:13:24', '2023-06-17 03:47:31', 4, 4),
(15, 12, 'ganjil', '2023-06-17 03:47:39', NULL, 4, NULL),
(16, 12, 'genap', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `username`, `password`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `id_kelas`, `alamat`, `no_hp`, `photo`) VALUES
(9, '3453', 'Adinda', 'MTIzNA==', 'Adinda Putri Setiya Ningrum', 'Kebumen', '2004-06-27', 'Perempuan', 2, 'DK Tengah, Desa/Kel. Jladri, Jladri', '085865976260', '1686924925_a3ebe5c61d92b5810a4f.jpg'),
(10, '0027', 'Alfin', 'MTIzNA==', 'Alfin Nofaldi', 'Kebumen', '2004-11-22', 'Laki-laki', 2, 'Purwogondo, Desa/Kel. Kalipurwo, Kalipurwo', '08', '1686925645_689150bac8a0135ec45e.jpg'),
(11, '3427', 'Anggita', 'MTIzNA==', 'Anggita Destian', 'Kebumen', '2004-12-22', 'Perempuan', 2, 'Petahunan, Desa/Kel. Sempor, Sempor', '083156980795', '1686925728_1d19d668dd06be4197e2.jpg'),
(12, '3454', 'Arif', 'MTIzNA==', 'Arif Musafa', 'Kebumen', '2004-06-23', 'Laki-laki', 4, 'Kaliputih, Desa/Kel. Sempor, Sempor', '083131178922', '1686926258_f04be5b726a040abb26e.jpg'),
(13, '3455', 'Arjuna', 'MTIzNA==', 'Arjuna Agung Maulana', 'Kebumen', '2004-06-24', 'Laki-laki', 4, 'Desa/Kel. Semanding, Semanding', '083869752666', '1686926348_b947b3807fc566d789ee.jpg'),
(14, '3456', 'Astrid', 'MTIzNA==', 'Astrid Haning Febriana', 'Kebumen', '2004-02-10', 'Perempuan', 4, 'KALIPURWO, Desa/Kel. Kalipurwo, Kalipurwo', '083820774890', '1686926468_484e133c26b1f38df1a9.jpg'),
(15, '3428', 'Azizah', 'MTIzNA==', 'Azizah Nur Vadila', 'Kebumen', '2003-07-29', 'Perempuan', 5, 'Legok, Desa/Kel. Selokerto, Selokerto', '083153948365', '1686926551_70ffd038cd688d95d41f.jpg'),
(16, '3429', 'Azrul', 'MTIzNA==', 'Azrul Zulmi', 'Kebumen', '2004-05-12', 'Perempuan', 5, 'Lemahduwur, Desa/Kel. Lemahduwur, Lemahduwur', '083154836763', '1686926640_48ce5192ca828abee4ad.jpg'),
(17, '3457', 'Bayu', 'MTIzNA==', 'Bayu Andika', 'Kebumen', '2004-12-27', 'Laki-laki', 5, 'Petahunan, Desa/Kel. Sempor, Sempor', '083867299650', '1686926806_15c7e816492096e23b33.jpg'),
(18, '3430', 'Candra', 'MTIzNA==', 'Candra Rahmat Hidayat', 'Kebumen', '2004-10-08', 'Laki-laki', NULL, 'Romagunung, Desa/Kel. Tunjungseto, Tunjungseto', '083838052711', '1686926901_4973de101ffb0f66aef7.jpg'),
(19, '3431', 'Citra', 'MTIzNA==', 'Citra Rahayu', 'Kebumen', '2002-04-05', 'Perempuan', NULL, 'Karangreja, Desa/Kel. Sikayu, Sikayu', '08882608440', '1686926967_8040ee04c115a1c751c8.jpg'),
(20, '3432', 'Dani', 'MTIzNA==', 'Dani Setiawan', 'Kebumen', '2004-03-03', 'Laki-laki', NULL, 'Kaligede, Desa/Kel. Kalibeji, Kalibeji', '085643093960', '1686927072_6997765bf2548c340814.jpg'),
(21, '2476', 'Destramoko', 'MTIzNA==', 'Destramoko Ari Sadewo', 'Kebumen', '2004-12-30', 'Laki-laki', NULL, 'Desa/Kel. Gunungmujil, Gunungmujil', '08', '1686927157_030bbb8650a30325b1f0.jpg'),
(22, '3459', 'Egi', 'MTIzNA==', 'Egi Kusuma Pradana', 'Kebumen', '2005-03-03', 'Laki-laki', NULL, 'Kalimangir, Desa/Kel. Giyanti, Giyanti', '083899368795', '1686927224_d56bb0bb5d5fea9df32a.jpg'),
(23, '3433', 'Else', 'MTIzNA==', 'Else Lusy', 'Kebumen', '2004-04-07', 'Perempuan', NULL, 'ROMA GUNUNG, Desa/Kel. Tunjungseto, Tunjungseto', '088238797682', '1686927290_04df27e8fdb74fa39b6d.jpg'),
(24, '3477', 'Erik', 'MTIzNA==', 'Erik Budi Irawan', 'Kebumen', '2003-07-03', 'Laki-laki', 7, 'Kalipurwo, Desa/Kel. Kalipurwo, Kalipurwo', '08', '1686927361_519b0103518bbd2ca94b.jpg'),
(25, '3434', 'Ernanda', 'MTIzNA==', 'Ernanda Wulan Febrianti', 'Kebumen', '2004-02-14', 'Perempuan', 7, 'Desa/Kel. Semanding, Semanding', '083111705987', '1686927416_304de1762ce174c808ee.jpg'),
(26, '3435', 'Eva', 'MTIzNA==', 'Eva Kurniawati', 'Kebumen', '2004-07-11', 'Perempuan', 7, 'Desa/Kel. Sikayu, Sikayu', '088215836871', '1686927514_1bf07556c3b915806a1b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `kkm` tinyint(3) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `kkm`, `created_by`, `created_at`, `edited_by`, `edited_at`) VALUES
(11, '2021/2022', 70, 4, '2023-06-16 16:03:37', 0, NULL),
(12, '2022/2023', 70, 4, '2023-06-17 03:47:31', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','guru','siswa','orangtua') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_sessions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_sessions`) VALUES
(1, 'admin', 'MTIzNA==', 'admin@gmail.com', 'admin', 'N', ''),
(2, 'Citra', 'MTIzNA==', 'citra@gmail.com', 'guru', 'N', ''),
(4, 'adminn', 'MTIzNA==', 'adminn@mail.com', 'admin', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `deskripsi_nilai_akhir`
--
ALTER TABLE `deskripsi_nilai_akhir`
  ADD PRIMARY KEY (`dna_id`),
  ADD KEY `dna_jadwal_id` (`dna_jadwal_id`),
  ADD KEY `dna_siswa_id` (`dna_siswa_id`),
  ADD KEY `dna_semester_id` (`dna_semester_id`);

--
-- Indeks untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`ekskul_id`),
  ADD KEY `ekstrakulikuler_ibfk_1` (`ekskul_nond_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `wali_kelas_id` (`wali_kelas_id`);

--
-- Indeks untuk tabel `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD PRIMARY KEY (`kt_id`),
  ADD KEY `kt_jadwal_id` (`kt_jadwal_id`),
  ADD KEY `kt_semester_id` (`kt_semester_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `wali_kelas_id` (`wali_kelas_id`);

--
-- Indeks untuk tabel `list_deskripsi`
--
ALTER TABLE `list_deskripsi`
  ADD PRIMARY KEY (`listdesk_id`);

--
-- Indeks untuk tabel `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  ADD PRIMARY KEY (`na_id`),
  ADD KEY `na_kategori_id` (`na_kategori_id`),
  ADD KEY `na_siswa_id` (`na_siswa_id`);

--
-- Indeks untuk tabel `nilai_non_akademik`
--
ALTER TABLE `nilai_non_akademik`
  ADD PRIMARY KEY (`non_id`),
  ADD KEY `nilai_non_akademik_ibfk_1` (`non_kelas_id`),
  ADD KEY `nilai_non_akademik_ibfk_2` (`non_semester_id`),
  ADD KEY `nilai_non_akademik_ibfk_3` (`non_wali_kelas_id`);

--
-- Indeks untuk tabel `nilai_non_akademik_detail`
--
ALTER TABLE `nilai_non_akademik_detail`
  ADD PRIMARY KEY (`nond_id`),
  ADD KEY `nond_siswa_id` (`nond_siswa_id`),
  ADD KEY `nilai_non_akademik_detail_ibfk_2` (`nond_non_id`);

--
-- Indeks untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`prestasi_id`),
  ADD KEY `prestasi_ibfk_1` (`prestasi_nond_id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `deskripsi_nilai_akhir`
--
ALTER TABLE `deskripsi_nilai_akhir`
  MODIFY `dna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `ekskul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  MODIFY `kt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `list_deskripsi`
--
ALTER TABLE `list_deskripsi`
  MODIFY `listdesk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  MODIFY `na_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT untuk tabel `nilai_non_akademik`
--
ALTER TABLE `nilai_non_akademik`
  MODIFY `non_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nilai_non_akademik_detail`
--
ALTER TABLE `nilai_non_akademik_detail`
  MODIFY `nond_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `prestasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `deskripsi_nilai_akhir`
--
ALTER TABLE `deskripsi_nilai_akhir`
  ADD CONSTRAINT `deskripsi_nilai_akhir_ibfk_1` FOREIGN KEY (`dna_jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deskripsi_nilai_akhir_ibfk_2` FOREIGN KEY (`dna_siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deskripsi_nilai_akhir_ibfk_3` FOREIGN KEY (`dna_semester_id`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD CONSTRAINT `ekstrakulikuler_ibfk_1` FOREIGN KEY (`ekskul_nond_id`) REFERENCES `nilai_non_akademik_detail` (`nond_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `matapelajaran` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id_guru`);

--
-- Ketidakleluasaan untuk tabel `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD CONSTRAINT `kategori_tugas_ibfk_1` FOREIGN KEY (`kt_jadwal_id`) REFERENCES `jadwal` (`jadwal_id`),
  ADD CONSTRAINT `kategori_tugas_ibfk_2` FOREIGN KEY (`kt_jadwal_id`) REFERENCES `jadwal` (`jadwal_id`),
  ADD CONSTRAINT `kategori_tugas_ibfk_3` FOREIGN KEY (`kt_semester_id`) REFERENCES `semester` (`id_semester`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id_guru`);

--
-- Ketidakleluasaan untuk tabel `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  ADD CONSTRAINT `nilai_akademik_ibfk_1` FOREIGN KEY (`na_kategori_id`) REFERENCES `kategori_tugas` (`kt_id`),
  ADD CONSTRAINT `nilai_akademik_ibfk_2` FOREIGN KEY (`na_siswa_id`) REFERENCES `siswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai_non_akademik`
--
ALTER TABLE `nilai_non_akademik`
  ADD CONSTRAINT `nilai_non_akademik_ibfk_1` FOREIGN KEY (`non_kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_non_akademik_ibfk_2` FOREIGN KEY (`non_semester_id`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_non_akademik_ibfk_3` FOREIGN KEY (`non_wali_kelas_id`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_non_akademik_detail`
--
ALTER TABLE `nilai_non_akademik_detail`
  ADD CONSTRAINT `nilai_non_akademik_detail_ibfk_1` FOREIGN KEY (`nond_siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_non_akademik_detail_ibfk_2` FOREIGN KEY (`nond_non_id`) REFERENCES `nilai_non_akademik` (`non_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`prestasi_nond_id`) REFERENCES `nilai_non_akademik_detail` (`nond_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
