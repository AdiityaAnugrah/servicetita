-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2025 pada 15.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tita_progres`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_user` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `wo` varchar(225) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nopol` varchar(225) NOT NULL,
  `progres` varchar(225) NOT NULL,
  `job_stop` varchar(225) NOT NULL,
  `mobil` varchar(225) NOT NULL,
  `warna` varchar(225) NOT NULL,
  `asuransi` varchar(225) NOT NULL,
  `est_keluar` date NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `bengkel` varchar(225) NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `wo`, `tgl_masuk`, `nopol`, `progres`, `job_stop`, `mobil`, `warna`, `asuransi`, `est_keluar`, `tanggal_keluar`, `keterangan`, `bengkel`, `user_id`, `create_at`, `update_at`) VALUES
(1, 'A2505002', '2025-06-16', 'H 1234 HH', 'KELUAR', '', '', 'HITAM', 'BCA', '2025-06-28', '2025-06-16 22:43:55', '-', 'TITANIUM', '', '2025-06-16 21:18:48', '2025-06-16 22:43:55'),
(2, 'a1111111', '2025-06-16', 'H 1234 QQ', 'KELUAR', '', 'BYD', 'HITAM', 'BCA', '2025-06-28', '2025-06-16 22:50:51', '-', 'TITANIUM', '', '2025-06-16 22:48:20', '2025-06-16 22:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `wo` varchar(225) NOT NULL,
  `progres` varchar(225) NOT NULL,
  `job_stop` varchar(225) NOT NULL,
  `nopol` varchar(225) NOT NULL,
  `mobil` varchar(225) NOT NULL,
  `warna` varchar(225) NOT NULL,
  `action` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `wo`, `progres`, `job_stop`, `nopol`, `mobil`, `warna`, `action`, `keterangan`, `user_id`, `create_at`, `update_at`) VALUES
(1, 'A2505002', 'BONGKAR', '', 'H 1234 HH', '', 'HITAM', 'Unit mobil sedang dalam proses bongkar', '', '', '2025-06-16 21:18:54', '2025-06-16 21:18:54'),
(2, 'A2505002', 'DEMPUL', '', 'H 1234 HH', '', 'HITAM', 'Unit mobil sedang dalam proses dempul', '', '', '2025-06-16 21:18:59', '2025-06-16 21:18:59'),
(3, 'A2505002', 'CAT', '', 'H 1234 HH', '', 'HITAM', 'Unit mobil sedang dalam proses cat', '', '', '2025-06-16 21:19:04', '2025-06-16 21:19:04'),
(4, 'A2505002', 'POLES', '', 'H 1234 HH', '', 'HITAM', 'Unit mobil sedang dalam proses poles', '', '', '2025-06-16 21:19:09', '2025-06-16 21:19:09'),
(5, 'A2505002', 'QC', '', 'H 1234 HH', '', 'HITAM', 'Unit mobil sedang dalam proses QC', '', '', '2025-06-16 21:19:14', '2025-06-16 21:19:14'),
(6, 'A2505002', 'SIAP KELUAR', '', 'H 1234 HH', '', 'HITAM', 'Unit mobil sedang dalam proses bongkar', '', '', '2025-06-16 22:41:08', '2025-06-16 22:41:08'),
(10, 'A2505002', 'KELUAR', '', 'H 1234 HH', '', 'HITAM', 'Unit mobil sedang dalam proses bongkar', '', '', '2025-06-16 22:43:55', '2025-06-16 22:43:55'),
(11, 'a1111111', 'BONGKAR', '', 'H 1234 QQ', 'BYD', 'HITAM', 'Unit mobil sedang dalam proses bongkar', '', '', '2025-06-16 22:48:26', '2025-06-16 22:48:26'),
(12, 'a1111111', 'DEMPUL', '', 'H 1234 QQ', 'BYD', 'HITAM', 'Unit mobil sedang dalam proses dempul', '', '', '2025-06-16 22:48:31', '2025-06-16 22:48:31'),
(13, 'a1111111', 'CAT', '', 'H 1234 QQ', 'BYD', 'HITAM', 'Unit mobil sedang dalam proses cat', '', '', '2025-06-16 22:48:36', '2025-06-16 22:48:36'),
(14, 'a1111111', 'POLES', '', 'H 1234 QQ', 'BYD', 'HITAM', 'Unit mobil sedang dalam proses poles', '', '', '2025-06-16 22:48:41', '2025-06-16 22:48:41'),
(15, 'a1111111', 'FINISHING', '', 'H 1234 QQ', 'BYD', 'HITAM', 'Unit mobil sedang dalam proses Finishing', '', '', '2025-06-16 22:49:18', '2025-06-16 22:49:18'),
(16, 'a1111111', 'SIAP KELUAR', '', 'H 1234 QQ', 'BYD', 'HITAM', 'Unit mobil sedang dalam proses bongkar', '', '', '2025-06-16 22:50:45', '2025-06-16 22:50:45'),
(17, 'a1111111', 'KELUAR', '', 'H 1234 QQ', 'BYD', 'HITAM', 'Unit mobil sedang dalam proses bongkar', '', '', '2025-06-16 22:50:51', '2025-06-16 22:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `label` varchar(225) NOT NULL,
  `fitur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
