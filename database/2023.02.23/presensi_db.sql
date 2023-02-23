-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2023 pada 17.49
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
  `NIP_PNS` varchar(30) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe_karyawan` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `tempat_lahir` varchar(60) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_user`, `NIP`, `NIP_PNS`, `nama`, `tipe_karyawan`, `email`, `nomor_hp`, `alamat`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(1, 2, '1600018015', NULL, 'Muhammad Insan Kamil', 1, 'muhammad.kamil@jatis.com', '0891513123123', '', '', '', NULL, '2023-02-22 09:06:18', '2023-02-22 09:06:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_presensi`
--

CREATE TABLE `kategori_presensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_presensi`
--

INSERT INTO `kategori_presensi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Absen Datang', '2023-02-23 20:25:25', '2023-02-23 20:25:25'),
(2, 'Absen Pulang', '2023-02-23 20:25:25', '2023-02-23 20:25:25'),
(3, 'Absen Mulai Istirahat', '2023-02-23 20:25:25', '2023-02-23 20:25:25'),
(4, 'Absen Selesai Istirahat', '2023-02-23 20:25:25', '2023-02-23 20:25:25');

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
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id`, `id_karyawan`, `tanggal_lembur`, `durasi`, `jam_mulai`, `jam_selesai`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-02-22', 1, '10:37:00', '11:37:00', '', 0, '2023-02-22 10:37:29', '2023-02-22 10:37:29'),
(2, 1, '2023-02-22', 1, '11:08:00', '12:08:00', '', 0, '2023-02-22 11:08:10', '2023-02-22 11:08:10'),
(3, 1, '2023-02-23', 2, '21:14:00', '22:14:00', '', 0, '2023-02-22 11:14:31', '2023-02-22 11:14:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `waktu_mulai_kerja` time NOT NULL,
  `waktu_akhir_kerja` time NOT NULL,
  `potongan_gaji` int(11) NOT NULL,
  `tipe_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `waktu_mulai_kerja`, `waktu_akhir_kerja`, `potongan_gaji`, `tipe_karyawan`) VALUES
(1, '07:00:00', '08:05:00', 50000, 1),
(2, '07:00:00', '08:05:00', 50000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `terlambat` tinyint(1) NOT NULL,
  `kategori_presensi` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `id_karyawan`, `terlambat`, `kategori_presensi`, `created_at`, `deleted_at`) VALUES
(1, 1, 1, 1, '2023-02-22 10:33:19', '2023-02-22 10:33:19');

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
-- Indeks untuk tabel `kategori_presensi`
--
ALTER TABLE `kategori_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_presensi`
--
ALTER TABLE `kategori_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
