-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2023 pada 18.44
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `waktu_awal_mulai_kerja` time NOT NULL,
  `waktu_akhir_mulai_kerja` time NOT NULL,
  `waktu_awal_pulang_kerja` time NOT NULL,
  `waktu_akhir_pulang_kerja` time NOT NULL,
  `waktu_awal_istirahat` time NOT NULL,
  `waktu_akhir_istirahat` time NOT NULL,
  `potongan_gaji` int(11) NOT NULL,
  `tipe_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `waktu_awal_mulai_kerja`, `waktu_akhir_mulai_kerja`, `waktu_awal_pulang_kerja`, `waktu_akhir_pulang_kerja`, `waktu_awal_istirahat`, `waktu_akhir_istirahat`, `potongan_gaji`, `tipe_karyawan`) VALUES
(1, '07:00:00', '08:05:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 50000, 1),
(2, '07:00:00', '08:05:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 50000, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
