-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2023 pada 20.10
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `list_deskripsi`
--
ALTER TABLE `list_deskripsi`
  ADD PRIMARY KEY (`listdesk_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `list_deskripsi`
--
ALTER TABLE `list_deskripsi`
  MODIFY `listdesk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
