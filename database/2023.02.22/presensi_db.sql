-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2023 pada 02.32
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
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe_karyawan` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_lembur` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `terlambat` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'administrator', '2023-02-22 08:11:32', '2023-02-22 08:11:32'),
(2, 'PNS', '2023-02-22 08:11:32', '2023-02-22 08:11:32'),
(3, 'honorer', '2023-02-22 08:11:32', '2023-02-22 08:11:32'),
(4, 'magang', '2023-02-22 08:11:32', '2023-02-22 08:11:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_karyawan`
--

CREATE TABLE `tipe_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tipe_karyawan`
--

INSERT INTO `tipe_karyawan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pegawai Negeri Sipil', '2023-02-20 19:16:25', '2023-02-20 19:16:25'),
(2, 'Honorer', '2023-02-20 19:16:25', '2023-02-20 19:16:25'),
(3, 'Magang', '2023-02-20 19:16:25', '2023-02-20 19:16:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_active`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$Yl8SIO8UfTXMAUQ.I2F25u4jomVx90cOXFBalu6svyVs4N40w2jGu', 1, 1, '2023-02-22 08:10:53', '2023-02-22 08:10:53'),
(2, 'pns', '$2y$10$Yl8SIO8UfTXMAUQ.I2F25u4jomVx90cOXFBalu6svyVs4N40w2jGu', 1, 2, '2023-02-22 08:12:37', '2023-02-22 08:12:37'),
(3, 'honorer', '$2y$10$Yl8SIO8UfTXMAUQ.I2F25u4jomVx90cOXFBalu6svyVs4N40w2jGu', 1, 3, '2023-02-22 08:12:37', '2023-02-22 08:12:37'),
(4, 'magang', '$2y$10$Yl8SIO8UfTXMAUQ.I2F25u4jomVx90cOXFBalu6svyVs4N40w2jGu', 1, 4, '2023-02-22 08:12:37', '2023-02-22 08:12:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_karyawan`
--
ALTER TABLE `tipe_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tipe_karyawan`
--
ALTER TABLE `tipe_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
