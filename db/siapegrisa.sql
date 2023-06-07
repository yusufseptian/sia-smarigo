-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Bulan Mei 2023 pada 15.33
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

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
  `dna_id` int NOT NULL,
  `dna_jadwal_id` int NOT NULL,
  `dna_siswa_id` int NOT NULL,
  `dna_kategori` enum('pengetahuan','keterampilan') COLLATE utf8mb4_general_ci NOT NULL,
  `dna_deskripsi` text COLLATE utf8mb4_general_ci,
  `dna_semester_id` int NOT NULL,
  `dna_created_at` datetime NOT NULL,
  `dna_created_by` int NOT NULL,
  `dna_edited_at` datetime DEFAULT NULL,
  `dna_edited_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `deskripsi_nilai_akhir`
--

INSERT INTO `deskripsi_nilai_akhir` (`dna_id`, `dna_jadwal_id`, `dna_siswa_id`, `dna_kategori`, `dna_deskripsi`, `dna_semester_id`, `dna_created_at`, `dna_created_by`, `dna_edited_at`, `dna_edited_by`) VALUES
(1, 9, 1, 'pengetahuan', 'Oke', 7, '2023-05-25 18:27:56', 6, '2023-05-25 19:10:13', 6),
(2, 9, 3, 'pengetahuan', 'Bagus', 7, '2023-05-25 18:27:56', 6, '2023-05-25 19:10:13', 6),
(3, 9, 4, 'pengetahuan', 'Sip', 7, '2023-05-25 18:27:56', 6, '2023-05-25 19:10:13', 6),
(4, 9, 5, 'pengetahuan', 'Iya', 7, '2023-05-25 18:27:56', 6, '2023-05-25 19:10:13', 6),
(5, 9, 1, 'keterampilan', 'Bagus..', 7, '2023-05-25 19:10:36', 6, '2023-05-25 19:10:36', NULL),
(6, 9, 3, 'keterampilan', 'Bagus..', 7, '2023-05-25 19:10:36', 6, '2023-05-25 19:10:36', NULL),
(7, 9, 4, 'keterampilan', 'Bagus..', 7, '2023-05-25 19:10:36', 6, '2023-05-25 19:10:36', NULL),
(8, 9, 5, 'keterampilan', 'Bagus..', 7, '2023-05-25 19:10:36', 6, '2023-05-25 19:10:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `ekskul_id` int NOT NULL,
  `ekskul_nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ekskul_predikat` enum('A','B','C') COLLATE utf8mb4_general_ci NOT NULL,
  `ekskul_deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `ekskul_nond_id` int NOT NULL,
  `ekskul_created_at` datetime NOT NULL,
  `ekskul_created_by` int NOT NULL,
  `ekskul_edited_at` datetime NOT NULL,
  `ekskul_edited_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`ekskul_id`, `ekskul_nama`, `ekskul_predikat`, `ekskul_deskripsi`, `ekskul_nond_id`, `ekskul_created_at`, `ekskul_created_by`, `ekskul_edited_at`, `ekskul_edited_by`) VALUES
(17, 'Osis', 'A', 'a', 3, '2023-05-19 00:01:20', 9, '2023-05-19 01:06:23', 9),
(19, 'Futsal', 'A', 'a', 3, '2023-05-19 01:01:15', 9, '2023-05-19 01:06:23', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `nip` int NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan_terakhir` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `username`, `password`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `no_hp`, `email`, `alamat`, `jabatan`, `pendidikan_terakhir`, `photo`) VALUES
(1, 'sudarmiyati', '098f6bcd4621d373cade4e832627b4f6', 1413123331, 'Sudarmiyati, S.Pd', 'Kebumen', '1969-11-04', 'Perempuan', '+62892813181', 'bueti@gmail.com', 'Petahunan ', 'Guru', 'S1', '1685111378_7be80d7b3f16cd9d9351.jpg'),
(6, 'rizka', '81dc9bdb52d04dc20036dbd8313ed055', 110112783, 'Rizka, S.Pd', 'Lesung Batu Muda', '1995-06-13', 'Perempuan', '+622279696131', 'rizka@mail.com', 'Jalan Parangtritis, KM 9,7', 'Guru Mapel', 'S1 ', '22.jpg'),
(9, '5190411039', '81dc9bdb52d04dc20036dbd8313ed055', 12345, 'yusuf sep', 'semarang', '2023-02-21', 'Laki-laki', '+62894738593', 'yos@gmail.com', 'muntilan', 'guru', 'nganu', '1685087380_105ea947b5f3bd610be9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int NOT NULL,
  `mapel_id` int NOT NULL,
  `mapel_kkm` tinyint UNSIGNED NOT NULL,
  `guru_id` int NOT NULL,
  `kelas_id` int NOT NULL,
  `wali_kelas_id` int DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mengajar` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_ajaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `mapel_id`, `mapel_kkm`, `guru_id`, `kelas_id`, `wali_kelas_id`, `hari`, `jam_mengajar`, `tahun_ajaran`) VALUES
(8, 8, 70, 9, 2, 9, 'Senin', '2', 8),
(9, 9, 75, 6, 2, 9, 'Selasa', '2', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tugas`
--

CREATE TABLE `kategori_tugas` (
  `kt_id` int NOT NULL,
  `kt_nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kt_jenis` enum('pengetahuan','keterampilan') COLLATE utf8mb4_general_ci NOT NULL,
  `kt_deskripsi` text COLLATE utf8mb4_general_ci,
  `kt_tanggal` date NOT NULL,
  `kt_kkm` float NOT NULL,
  `kt_bobot` float NOT NULL,
  `kt_jadwal_id` int NOT NULL,
  `kt_semester_id` int NOT NULL,
  `kt_created_at` datetime NOT NULL,
  `kt_edited_at` datetime DEFAULT NULL,
  `kt_deleted_at` datetime DEFAULT NULL,
  `kt_assessed_at` datetime DEFAULT NULL,
  `kt_value_changed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_tugas`
--

INSERT INTO `kategori_tugas` (`kt_id`, `kt_nama`, `kt_jenis`, `kt_deskripsi`, `kt_tanggal`, `kt_kkm`, `kt_bobot`, `kt_jadwal_id`, `kt_semester_id`, `kt_created_at`, `kt_edited_at`, `kt_deleted_at`, `kt_assessed_at`, `kt_value_changed_at`) VALUES
(1, 'Tugas Harian', 'pengetahuan', 'Mencari berita terkait pengamalan sila-sila pancasila dalam kehidupan sehari-hari.', '2023-04-26', 75, 10, 9, 7, '2023-04-27 14:28:32', '2023-05-13 15:59:59', NULL, '2023-04-23 15:11:35', '2023-04-29 15:12:18'),
(2, 'UTS', 'pengetahuan', 'Ujian tengah semester', '2023-04-28', 80, 25, 9, 7, '2023-04-27 15:32:40', '2023-05-12 18:11:03', NULL, '2023-04-29 19:19:27', NULL),
(3, 'Tugas harian 2', 'pengetahuan', 'Mencari berita', '2023-05-14', 70, 12, 9, 7, '2023-05-12 13:40:28', '2023-05-12 18:10:49', NULL, NULL, NULL),
(4, 'UAS', 'pengetahuan', 'ujian', '2023-05-18', 75, 30, 9, 7, '2023-05-12 18:02:40', '2023-05-12 18:03:39', NULL, '2023-05-12 18:03:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `kode_kelas` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kelas` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `id_ta` int DEFAULT NULL,
  `wali_kelas_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `id_ta`, `wali_kelas_id`) VALUES
(2, '7B', 'VII B', 1, 9),
(4, '7C', 'VII C', 1, 6),
(5, '7A', 'VII A', 1, NULL),
(7, '8A', 'VIII A', 3, NULL),
(11, 'k01', '11', 8, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int NOT NULL,
  `kode_matapelajaran` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_matapelajaran` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kkm_mapel` tinyint UNSIGNED NOT NULL,
  `kategori_mapel` enum('Kelompok A (Umum)','Kelompok B (Umum)','Kelompok C (Peminatan)') COLLATE utf8mb4_general_ci NOT NULL,
  `jurusan_mapel` enum('IPA','IPS') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `kode_matapelajaran`, `nama_matapelajaran`, `kkm_mapel`, `kategori_mapel`, `jurusan_mapel`) VALUES
(8, 'mp01', 'Pendidikan Agama dan Budi Pekerti', 70, 'Kelompok A (Umum)', 'IPA'),
(9, 'mp02', 'Pendidikan Pancasila dan Kewarganegaraan', 75, 'Kelompok A (Umum)', 'IPA'),
(10, 'mp03', 'Bahasa Indonesia', 0, 'Kelompok A (Umum)', 'IPA'),
(11, 'mp04 ', 'Matematika', 0, 'Kelompok A (Umum)', 'IPA'),
(12, 'mp05', 'Sejarah Indonesia', 0, 'Kelompok A (Umum)', 'IPA'),
(13, 'mp06', 'Bahasa Inggris', 0, 'Kelompok A (Umum)', 'IPA'),
(14, 'mp07', 'Seni Budaya', 0, 'Kelompok B (Umum)', 'IPA'),
(15, 'mp08', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 0, 'Kelompok B (Umum)', 'IPA'),
(16, 'mp09', 'Prakarya dan Kewirausahaan', 0, 'Kelompok B (Umum)', 'IPA'),
(17, 'mp10', 'Muatan Lokal : Bahasa Jawa', 0, 'Kelompok B (Umum)', 'IPA');

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
(8, 2, 5, 100),
(9, 4, 1, 90),
(10, 4, 3, 80),
(11, 4, 4, 75),
(12, 4, 5, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_non_akademik`
--

CREATE TABLE `nilai_non_akademik` (
  `non_id` int NOT NULL,
  `non_kelas_id` int NOT NULL,
  `non_wali_kelas_id` int NOT NULL,
  `non_semester_id` int NOT NULL,
  `non_created_by` int NOT NULL,
  `non_created_at` datetime NOT NULL,
  `non_edited_by` int DEFAULT NULL,
  `non_edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_non_akademik`
--

INSERT INTO `nilai_non_akademik` (`non_id`, `non_kelas_id`, `non_wali_kelas_id`, `non_semester_id`, `non_created_by`, `non_created_at`, `non_edited_by`, `non_edited_at`) VALUES
(1, 2, 9, 7, 9, '2023-05-18 04:12:05', NULL, '2023-05-18 04:12:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_non_akademik_detail`
--

CREATE TABLE `nilai_non_akademik_detail` (
  `nond_id` int NOT NULL,
  `nond_non_id` int NOT NULL,
  `nond_siswa_id` int NOT NULL,
  `nond_spiritual_predikat` enum('Baik','Cukup','Sedang') COLLATE utf8mb4_general_ci NOT NULL,
  `nond_spiritual_deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `nond_sosial_predikat` enum('Baik','Cukup','Sedang') COLLATE utf8mb4_general_ci NOT NULL,
  `nond_sosial_deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `nond_sakit` int UNSIGNED NOT NULL,
  `nond_izin` int UNSIGNED NOT NULL,
  `nond_tanpa_keterangan` int UNSIGNED NOT NULL,
  `nond_catatan_wali_kelas` text COLLATE utf8mb4_general_ci NOT NULL,
  `nond_catatan_ortu` text COLLATE utf8mb4_general_ci,
  `nond_created_by` int NOT NULL,
  `nond_created_at` datetime NOT NULL,
  `nond_edited_by` int DEFAULT NULL,
  `nond_edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_non_akademik_detail`
--

INSERT INTO `nilai_non_akademik_detail` (`nond_id`, `nond_non_id`, `nond_siswa_id`, `nond_spiritual_predikat`, `nond_spiritual_deskripsi`, `nond_sosial_predikat`, `nond_sosial_deskripsi`, `nond_sakit`, `nond_izin`, `nond_tanpa_keterangan`, `nond_catatan_wali_kelas`, `nond_catatan_ortu`, `nond_created_by`, `nond_created_at`, `nond_edited_by`, `nond_edited_at`) VALUES
(3, 1, 1, 'Baik', 'Memiliki sikap spiritual yang sangat baik, rajin beribadah serta toleran pada agama yang berbeda', 'Baik', 'Memiliki sikap sosial yang baik seperti sopan, disiplin, bertanggung jawab dan aktif dalam hidup bersosial', 2, 1, 0, 'Tingkatkan prestasimu dan diiringi dengan do\'a supaya prestasimu lebih baik', NULL, 9, '2023-05-18 04:20:32', 9, '2023-05-19 01:06:23'),
(4, 1, 3, 'Baik', 'Bagus', 'Baik', 'Sip', 2, 1, 0, 'Mantap', NULL, 9, '2023-05-19 01:07:02', NULL, '2023-05-19 01:07:02');

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
  `nis_siswa` int NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `username`, `password`, `nama`, `no_hp`, `pekerjaan`, `nis_siswa`, `alamat`) VALUES
(6, 'hans', 'd41d8cd98f00b204e9800998ecf8427e', 'handoko to', '8943843', '', 5191, 'muntilan');

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
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `prestasi_id` int NOT NULL,
  `prestasi_nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prestasi_deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `prestasi_nond_id` int NOT NULL,
  `prestasi_created_at` datetime NOT NULL,
  `prestasi_created_by` int NOT NULL,
  `prestasi_edited_at` datetime NOT NULL,
  `prestasi_edited_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`prestasi_id`, `prestasi_nama`, `prestasi_deskripsi`, `prestasi_nond_id`, `prestasi_created_at`, `prestasi_created_by`, `prestasi_edited_at`, `prestasi_edited_by`) VALUES
(1, 'Juara membuat sistem', 'ok', 3, '2023-05-18 04:20:32', 9, '2023-05-19 01:06:23', 9),
(3, 'Juara tarik tambang hitam', 'ok', 3, '2023-05-19 01:01:15', 9, '2023-05-19 01:06:23', 9);

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
  `username` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `id_kelas` int DEFAULT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `username`, `password`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `id_kelas`, `alamat`, `no_hp`, `photo`) VALUES
(1, 5191, '5191', 'd41d8cd98f00b204e9800998ecf8427e', 'Assabilla Cut Kusumaa', 'Jakarta', '2008-12-04', 'Perempuan', 2, 'Petahunan Sempor RT 04/01, Ds. Sempor', '+62892813182', '1685109947_5f7ba7d9e98e5edb8d0d.jpg'),
(3, 5181, '5181', '81dc9bdb52d04dc20036dbd8313ed055', 'Desya', 'Lesung Batu Muda', '2023-01-12', 'Perempuan', 2, 'Jalan Parangtritis, KM 9,7', '082279696793', '1685109930_12449a44f84caeee6634.jpg'),
(4, 5172, '5199', '81dc9bdb52d04dc20036dbd8313ed055', 'Wahdah', 'Jakarta', '2003-09-28', 'Perempuan', 2, 'Desa Jatinegara RT 10, RW 02 Kec. Sempor, Kab. Kebumen, Jawa Tengah', '+622279696131', 'teacher_(1).png'),
(5, 1234, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Gading Saptono', 'Klaten', '2003-09-28', '', 2, 'Gg. Bakau No. 288, Prambanan 59317, Klaten', '0827725272', '1680679935_e4a5118624d5ded30106.webp'),
(7, 849312, 'yuda', '81dc9bdb52d04dc20036dbd8313ed055', 'yudhaa', 'magelang', '0000-00-00', 'Laki-laki', NULL, 'hfdjf', '843943', '1685089671_250b88e7f2b06c6d991c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int NOT NULL,
  `tahun_ajaran` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kkm` tinyint UNSIGNED NOT NULL,
  `created_by` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `edited_by` int NOT NULL,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `kkm`, `created_by`, `created_at`, `edited_by`, `edited_at`) VALUES
(8, '2019/2020', 75, 0, NULL, 2, '2023-05-23 15:38:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('admin','guru','siswa','orangtua') COLLATE utf8mb4_general_ci NOT NULL,
  `blokir` enum('N','Y') COLLATE utf8mb4_general_ci NOT NULL,
  `id_sessions` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
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
  MODIFY `dna_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `ekskul_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `kt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `nilai_akademik`
--
ALTER TABLE `nilai_akademik`
  MODIFY `na_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `nilai_non_akademik`
--
ALTER TABLE `nilai_non_akademik`
  MODIFY `non_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nilai_non_akademik_detail`
--
ALTER TABLE `nilai_non_akademik_detail`
  MODIFY `nond_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `prestasi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Ketidakleluasaan untuk tabel `deskripsi_nilai_akhir`
--
ALTER TABLE `deskripsi_nilai_akhir`
  ADD CONSTRAINT `deskripsi_nilai_akhir_ibfk_1` FOREIGN KEY (`dna_jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `deskripsi_nilai_akhir_ibfk_2` FOREIGN KEY (`dna_siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `deskripsi_nilai_akhir_ibfk_3` FOREIGN KEY (`dna_semester_id`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD CONSTRAINT `ekstrakulikuler_ibfk_1` FOREIGN KEY (`ekskul_nond_id`) REFERENCES `nilai_non_akademik_detail` (`nond_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`mapel_id`) REFERENCES `matapelajaran` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `kategori_tugas`
--
ALTER TABLE `kategori_tugas`
  ADD CONSTRAINT `kategori_tugas_ibfk_1` FOREIGN KEY (`kt_jadwal_id`) REFERENCES `jadwal` (`jadwal_id`),
  ADD CONSTRAINT `kategori_tugas_ibfk_2` FOREIGN KEY (`kt_jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `kategori_tugas_ibfk_3` FOREIGN KEY (`kt_semester_id`) REFERENCES `semester` (`id_semester`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`wali_kelas_id`) REFERENCES `guru` (`id_guru`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `nilai_non_akademik_ibfk_1` FOREIGN KEY (`non_kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `nilai_non_akademik_ibfk_2` FOREIGN KEY (`non_semester_id`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `nilai_non_akademik_ibfk_3` FOREIGN KEY (`non_wali_kelas_id`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `nilai_non_akademik_detail`
--
ALTER TABLE `nilai_non_akademik_detail`
  ADD CONSTRAINT `nilai_non_akademik_detail_ibfk_1` FOREIGN KEY (`nond_siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `nilai_non_akademik_detail_ibfk_2` FOREIGN KEY (`nond_non_id`) REFERENCES `nilai_non_akademik` (`non_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`prestasi_nond_id`) REFERENCES `nilai_non_akademik_detail` (`nond_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tahun_ajaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
