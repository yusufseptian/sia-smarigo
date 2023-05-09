-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Host: localhost:3306
-- Waktu pembuatan: 09 Bulan Mei 2023 pada 06.14
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10
=======
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2023 pada 05.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.12
>>>>>>> 36e9f9eea420a0b61d16515cc5e05530b42d96c3

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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nip` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `no_hp`, `email`, `alamat`, `jabatan`, `pendidikan_terakhir`, `photo`) VALUES
(1, 'sudarmiyati', 'f0c413d1d4719bcb155e58dc3fd137a0', 1413123331, 'Sudarmiyati, S.Pd', 'Kebumen', '1969-11-04', 'Perempuan', '+62892813181', 'bueti@gmail.com', 'Petahunan ', 'Guru Mapel', 'S1', 'aiony-haust-3TLl_97HNJo-unsplash.jpg'),
(6, 'rizka', '81dc9bdb52d04dc20036dbd8313ed055', 110112783, 'Rizka, S.Pd', 'Lesung Batu Muda', '1995-06-13', 'Perempuan', '+622279696131', 'rizka@mail.com', 'Jalan Parangtritis, KM 9,7', 'Guru Mapel', 'S1 ', '22.jpg'),
(9, '5190411039', '81dc9bdb52d04dc20036dbd8313ed055', 8493759, 'yusuf sep', 'semarang', '2023-02-21', 'Laki-laki', '+62894738593', 'soepsep@gmail.com', 'me,dej,ma', 'guru', 's1', 'avatar.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int NOT NULL,
  `mapel_id` int NOT NULL,
  `guru_id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
  `jam_mengajar` varchar(20) NOT NULL,
  `tahun_ajaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `mapel_id`, `guru_id`, `kelas_id`, `hari`, `jam_mengajar`, `tahun_ajaran`) VALUES
(8, 8, 9, 4, 'Senin', '1', 8),
(9, 9, 6, 2, 'Selasa', '2', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tugas`
--

CREATE TABLE `kategori_tugas` (
  `kt_id` int NOT NULL,
  `kt_nama` varchar(50) NOT NULL,
  `kt_deskripsi` text,
  `kt_tanggal` date NOT NULL,
  `kt_kkm` float NOT NULL,
  `kt_bobot` float NOT NULL,
  `kt_jadwal_id` int NOT NULL,
  `kt_created_at` datetime NOT NULL,
  `kt_edited_at` datetime DEFAULT NULL,
  `kt_deleted_at` datetime DEFAULT NULL,
  `kt_assessed_at` datetime DEFAULT NULL,
  `kt_value_changed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_tugas`
--

INSERT INTO `kategori_tugas` (`kt_id`, `kt_nama`, `kt_deskripsi`, `kt_tanggal`, `kt_kkm`, `kt_bobot`, `kt_jadwal_id`, `kt_created_at`, `kt_edited_at`, `kt_deleted_at`, `kt_assessed_at`, `kt_value_changed_at`) VALUES
(1, 'Tugas Harian', 'Mencari berita terkait pengamalan sila-sila pancasila dalam kehidupan sehari-hari.', '2023-04-26', 75, 5, 9, '2023-04-27 14:28:32', '2023-04-30 12:18:23', NULL, '2023-04-23 15:11:35', '2023-04-29 15:12:18'),
(2, 'UTS', 'Ujian tengah semester', '2023-04-28', 80, 20, 9, '2023-04-27 15:32:40', '2023-04-29 19:19:27', NULL, '2023-04-29 19:19:27', NULL),
(3, 'UAS', 'Ujian Akhir Semester', '2023-05-08', 75, 75, 9, '2023-05-06 17:42:44', '2023-05-06 17:42:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `kode_kelas` varchar(3) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `id_ta` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `id_ta`) VALUES
(2, '7B', 'VII B', 1),
(4, '7C', 'VII C', 1),
(5, '7A', 'VII A', 1),
(7, '8A', 'VIII A', 3),
(11, 'k01', '11', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int NOT NULL,
  `kode_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(100) NOT NULL,
  `kategori_mapel` enum('Kelompok A (Umum)','Kelompok B (Umum)','Kelompok C (Peminatan)') NOT NULL,
  `jurusan_mapel` enum('IPA','IPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `kode_matapelajaran`, `nama_matapelajaran`, `kategori_mapel`, `jurusan_mapel`) VALUES
(8, 'mp01', 'Pendidikan Agama dan Budi Pekerti', 'Kelompok A (Umum)', 'IPA'),
(9, 'mp02', 'Pendidikan Pancasila dan Kewarganegaraan', 'Kelompok A (Umum)', 'IPA'),
(10, 'mp03', 'Bahasa Indonesia', 'Kelompok A (Umum)', 'IPA'),
(11, 'mp04 ', 'Matematika', 'Kelompok A (Umum)', 'IPA'),
(12, 'mp05', 'Sejarah Indonesia', 'Kelompok A (Umum)', 'IPA'),
(13, 'mp06', 'Bahasa Inggris', 'Kelompok A (Umum)', 'IPA'),
(14, 'mp07', 'Seni Budaya', 'Kelompok B (Umum)', 'IPA'),
(15, 'mp08', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'Kelompok B (Umum)', 'IPA'),
(16, 'mp09', 'Prakarya dan Kewirausahaan', 'Kelompok B (Umum)', 'IPA'),
(17, 'mp10', 'Muatan Lokal : Bahasa Jawa', 'Kelompok B (Umum)', 'IPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_akademik`
--

CREATE TABLE `nilai_akademik` (
  `na_id` int NOT NULL,
  `na_kategori_id` int NOT NULL,
  `na_siswa_id` int NOT NULL,
  `na_nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_akademik`
--

INSERT INTO `nilai_akademik` (`na_id`, `na_kategori_id`, `na_siswa_id`, `na_nilai`) VALUES
(1, 1, 1, 100),
(2, 1, 3, 80),
(3, 1, 4, 70),
(4, 1, 5, 70),
(5, 2, 1, 100),
(6, 2, 3, 100),
(7, 2, 4, 100),
(8, 2, 5, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nis_siswa` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `username`, `password`, `nama`, `no_hp`, `pekerjaan`, `nis_siswa`, `alamat`) VALUES
(5, 'ncipp', '81dc9bdb52d04dc20036dbd8313ed055', 'sipaa', '819381', 'tidur', '5191', 'sewonderlan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengumuman` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `pengumuman`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman UTS', 'Pengumuman ini berisi tentang uts yang akan diselenggarakan', '2023-01-29', '2023-01-29'),
(2, 'Pramuka', 'Hari Jumat harap membawa perlengkapan pramuka untuk kelas 8!', '2023-01-29', '2023-02-10'),
(4, 'PENGUMUMAN UAS', 'ini pengumuman', '2023-02-04', '0000-00-00'),
(5, 'Lomba Agustusan', 'Tanggal 15-17 diadakan pentas seni!', '2023-02-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int NOT NULL,
  `id_ta` int DEFAULT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `id_ta`, `semester`, `mulai`, `selesai`) VALUES
(7, 8, 'ganjil', '2023-04-07 09:26:22', NULL),
(8, 8, 'genap', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int NOT NULL,
  `nis` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `username`, `password`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `id_kelas`, `alamat`, `no_hp`, `photo`) VALUES
(1, 5191, '5191', '81dc9bdb52d04dc20036dbd8313ed055', 'Assabilla Cut Kusuma', 'Jakarta', '2008-12-04', 'Perempuan', 2, 'Petahunan Sempor RT 04/01, Ds. Sempor', '+62892813181', '22.jpg'),
(3, 5181, '5181', '81dc9bdb52d04dc20036dbd8313ed055', 'Desya', 'Lesung Batu Muda', '2023-01-12', 'Perempuan', 2, 'Jalan Parangtritis, KM 9,7', '082279696793', 'istockphoto-1304361511-612x6123.jpg'),
(4, 5172, '5199', '81dc9bdb52d04dc20036dbd8313ed055', 'Wahdah', 'Jakarta', '2003-09-28', 'Perempuan', 2, 'Desa Jatinegara RT 10, RW 02 Kec. Sempor, Kab. Kebumen, Jawa Tengah', '+622279696131', 'teacher_(1).png'),
(5, 1234, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Gading Saptono', 'Klaten', '2003-09-28', '', 2, 'Gg. Bakau No. 288, Prambanan 59317, Klaten', '0827725272', '1680679935_e4a5118624d5ded30106.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`) VALUES
(8, '2019/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','guru','siswa','orangtua') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_sessions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_sessions`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'N', ''),
(2, 'Citra', 'e260eab6a7c45d139631f72b55d8506b', 'citra@gmail.com', 'guru', 'N', ''),
(4, 'adminn', '81dc9bdb52d04dc20036dbd8313ed055', 'adminn@mail.com', 'admin', 'N', '');

--
-- Indexes for dumped tables
--

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
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD PRIMARY KEY (`kt_id`),
  ADD KEY `kt_jadwal_id` (`kt_jadwal_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

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
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
<<<<<<< HEAD
  MODIFY `kt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
  MODIFY `kt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
>>>>>>> 36e9f9eea420a0b61d16515cc5e05530b42d96c3

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  MODIFY `na_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `matapelajaran` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD CONSTRAINT `kategori_tugas_ibfk_1` FOREIGN KEY (`kt_jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  ADD CONSTRAINT `nilai_akademik_ibfk_1` FOREIGN KEY (`na_kategori_id`) REFERENCES `kategori_tugas` (`kt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nilai_akademik_ibfk_2` FOREIGN KEY (`na_siswa_id`) REFERENCES `siswa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tahun_ajaran` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
