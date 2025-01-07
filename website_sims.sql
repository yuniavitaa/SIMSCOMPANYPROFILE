-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2025 pada 20.33
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
-- Database: `website_sims`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `payment_method` enum('transfer','gopay','shoppepay','dana') NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('sedang_verifikasi','sudah_verifikasi','belum_valid') DEFAULT 'sedang_verifikasi',
  `package_name` varchar(255) NOT NULL,
  `package_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`id`, `pendaftaran_id`, `nama`, `email`, `nomor_hp`, `payment_method`, `bukti_pembayaran`, `created_at`, `updated_at`, `status`, `package_name`, `package_price`) VALUES
(51, 58, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'dana', '1735284249_b430fe03b8ba7f281be2.png', '2024-12-27 07:24:02', '2024-12-27 07:24:02', 'sudah_verifikasi', 'Paket Menengah', 2500000.00),
(52, 59, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'transfer', '1735284344_79f61b0c5aef28d4ff71.png', '2024-12-27 07:25:36', '2024-12-27 07:25:36', 'belum_valid', 'Paket Dasar', 1500000.00),
(53, 60, 'Pak Lukman', 'lukman@gmail.com', '08636363636', 'transfer', '1735610743_b8dda52e34d95d534735.png', '2024-12-31 02:04:28', '2024-12-31 02:04:28', 'belum_valid', 'Paket Premium', 4000000.00),
(54, 61, 'Ado', 'ado@gmail.com', '0826', 'dana', '1735719253_2dbcc7265479f9f5a090.jpg', '2025-01-01 08:13:45', '2025-01-01 08:13:45', 'sedang_verifikasi', 'Paket Dasar', 1500000.00),
(55, 62, 'Ahmad Ramadhan', 'ahmad@gmail.com', '087652525262', 'transfer', '1735831544_65456297b03830790330.png', '2025-01-02 15:25:35', '2025-01-02 15:25:35', 'sudah_verifikasi', 'Paket Dasar', 1500000.00),
(56, 63, 'lala', 'lala@gmail.com', '0865321442', 'dana', '1736078470_2aba9ad6a094b9e732b8.jpeg', '2025-01-05 12:00:44', '2025-01-05 12:00:44', 'sedang_verifikasi', 'Paket Premium', 4000000.00),
(57, 64, 'lala', 'lala@gmail.com', '082672252627282', 'gopay', '1736079373_93272f1428113da91e2f.jpeg', '2025-01-05 05:16:05', '2025-01-05 05:16:13', 'sedang_verifikasi', 'Paket Menengah', 2500000.00),
(59, 66, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'transfer', '1736173361_27a64582bae55a6d641d.png', '2025-01-06 14:22:07', '2025-01-06 14:22:07', 'belum_valid', 'Paket Premium', 4000000.00),
(60, 67, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082327328658', 'transfer', '', '2025-01-07 15:36:22', '2025-01-07 15:36:22', 'sedang_verifikasi', 'Paket Dasar', 1500000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `keperluan`, `pesan`, `created_at`, `updated_at`) VALUES
(3, 'Pertanyaan', 'Keperluan untuk bertemu secara langsung', NULL, NULL),
(4, 'Keperluan', 'Pesan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-11-24-121111', 'App\\Database\\Migrations\\CreatePendaftaranAnggotaTable', 'default', 'App', 1732548689, 1),
(2, '2024-11-25-150214', 'App\\Database\\Migrations\\CreateContactMessagesTable', 'default', 'App', 1732550142, 2),
(3, '2024-11-28-014026', 'App\\Database\\Migrations\\CreatePendaftaranAnggota', 'default', 'App', 1732804810, 3),
(4, '2024-11-28-014119', 'App\\Database\\Migrations\\CreateBuktiPembayaranTable', 'default', 'App', 1732810421, 4),
(5, '2024-11-28-155633', 'App\\Database\\Migrations\\CreatePendaftaranAnggota', 'default', 'App', 1732810421, 4),
(6, '2024-11-29-025432', 'App\\Database\\Migrations\\CreatePendaftaranAnggota', 'default', 'App', 1732849476, 5),
(7, '2024-11-29-025504', 'App\\Database\\Migrations\\CreateBuktiPembayaranTable', 'default', 'App', 1732849476, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `recipient` varchar(100) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_anggota`
--

CREATE TABLE `pendaftaran_anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `domisili` varchar(50) NOT NULL,
  `perusahaan` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` text DEFAULT NULL,
  `id_type` enum('ktp','sims','pasport') NOT NULL,
  `nomor_id` varchar(50) NOT NULL,
  `gender` enum('laki-laki','perempuan') NOT NULL,
  `payment_method` enum('transfer','gopay','shoppepay','dana') NOT NULL,
  `paket_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `package_name` varchar(255) NOT NULL,
  `package_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pendaftaran_anggota`
--

INSERT INTO `pendaftaran_anggota` (`id`, `nama_lengkap`, `email`, `nomor_hp`, `domisili`, `perusahaan`, `jabatan`, `alamat_perusahaan`, `id_type`, `nomor_id`, `gender`, `payment_method`, `paket_id`, `created_at`, `updated_at`, `package_name`, `package_price`) VALUES
(49, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'dana', NULL, '2024-12-20 10:48:45', '2024-12-20 10:48:45', 'Paket Dasar', 1500000.00),
(50, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'gopay', NULL, '2024-12-20 10:52:11', '2024-12-20 10:52:11', 'Paket Premium', 4000000.00),
(51, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'transfer', NULL, '2024-12-20 10:57:29', '2024-12-20 10:57:29', 'Paket Premium', 4000000.00),
(52, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'shoppepay', NULL, '2024-12-20 10:59:41', '2024-12-20 10:59:41', 'Paket Premium', 4000000.00),
(53, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'shoppepay', NULL, '2024-12-25 08:34:39', '2024-12-25 08:34:39', 'Paket Dasar', 1500000.00),
(54, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'dana', NULL, '2024-12-26 09:20:07', '2024-12-26 09:20:07', 'Paket Premium', 4000000.00),
(55, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'CEO', 'hjkk', 'sims', '340404827262626', 'laki-laki', 'transfer', NULL, '2024-12-26 09:40:14', '2024-12-26 09:40:14', 'Paket Menengah', 2500000.00),
(56, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'CEO', 'Sleman', 'sims', '340404827262626', 'laki-laki', 'transfer', NULL, '2024-12-27 02:11:44', '2024-12-27 02:11:44', 'Paket Dasar', 1500000.00),
(57, 'Ahmad Ramadhan', 'ahmad@gmail.com', '0865321442', 'Jogja', 'PT ABC', 'CTO', 'Jl ABC', 'pasport', '12345678', 'laki-laki', 'shoppepay', NULL, '2024-12-27 07:15:50', '2024-12-27 07:15:50', 'Paket Premium', 4000000.00),
(58, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'dana', NULL, '2024-12-27 07:24:02', '2024-12-27 07:24:02', 'Paket Menengah', 2500000.00),
(59, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Jogja', 'ktp', '340404827262626', 'laki-laki', 'transfer', NULL, '2024-12-27 07:25:36', '2024-12-27 07:25:36', 'Paket Dasar', 1500000.00),
(60, 'Pak Lukman', 'lukman@gmail.com', '08636363636', 'Sleman', 'PT XXY', 'Dosen', 'Sleman', 'ktp', '027272626', 'laki-laki', 'transfer', NULL, '2024-12-31 02:04:28', '2024-12-31 02:04:28', 'Paket Premium', 4000000.00),
(61, 'Ado', 'ado@gmail.com', '0826', 'Sleman', 'PT XXY', 'CTO', 'a', 'ktp', '12345678', 'laki-laki', 'dana', NULL, '2025-01-01 08:13:45', '2025-01-01 08:13:45', 'Paket Dasar', 1500000.00),
(62, 'Ahmad Ramadhan', 'ahmad@gmail.com', '087652525262', 'Sleman', 'PT XYZ', 'Karyawan', 'Sleman', 'ktp', '340495959559', 'laki-laki', 'transfer', NULL, '2025-01-02 15:25:35', '2025-01-02 15:25:35', 'Paket Dasar', 1500000.00),
(63, 'lala', 'lala@gmail.com', '0865321442', 'Jogja', 'PT XXY', 'CTO', 'Sleman', 'ktp', '340404827262626', 'perempuan', 'dana', NULL, '2025-01-05 12:00:44', '2025-01-05 12:00:44', 'Paket Premium', 4000000.00),
(64, 'lala', 'lala@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Ceo', 'Sleamn', 'ktp', '23848484', 'laki-laki', 'gopay', NULL, '2025-01-05 12:16:05', '2025-01-05 12:16:05', 'Paket Menengah', 2500000.00),
(65, 'lala', 'lala@gmail.com', '082672252627282', 'Sleman', 'PT ABC', 'Ceo', 'c', 'ktp', '340404827262626', 'laki-laki', 'shoppepay', NULL, '2025-01-05 12:47:17', '2025-01-05 12:47:17', 'Paket Dasar', 1500000.00),
(66, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082672252627282', 'Sleman', 'PT XXY', 'Karyawan', 'Minggir,Sleman,Yogyakarta.', 'ktp', '340404827262626', 'laki-laki', 'transfer', NULL, '2025-01-06 14:22:07', '2025-01-06 14:22:07', 'Paket Premium', 4000000.00),
(67, 'Ahmad Ramadhan', 'ahmad@gmail.com', '082327328658', 'Sleman', 'PT XXY', 'Karyawan', 'Sleman', 'ktp', '340404827262626', 'laki-laki', 'transfer', NULL, '2025-01-07 15:36:22', '2025-01-07 15:36:22', 'Paket Dasar', 1500000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posting`
--

INSERT INTO `posting` (`id`, `title`, `content`, `image`, `category`, `created_at`, `updated_at`) VALUES
(4, 'PT SIMS', 'jskdhawidhaiwd', 'Media.png', 'Blog', '2024-12-20 17:05:59', '2024-12-20 17:08:31'),
(5, 'PT SIMS', 'Judul', 'Media 2.png', 'Teknologi', '2024-12-20 17:07:00', '2024-12-20 17:08:45'),
(6, 'Judul', 'konten', 'Media 3.png', 'Teknologi', '2024-12-20 17:09:20', '2024-12-20 17:09:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `fullname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `date_create`, `date_update`, `role`, `fullname`) VALUES
(1, 'yuni@gmail.com', '$2y$10$WvpNxV/vwnXuY8ntDQGnh.nT2OW8pJXnaxnRVYAw5Hbax9cG4GzHu', '2024-11-03 14:33:54', '2024-12-20 16:18:25', 'admin', 'Yuni Avita'),
(15, 'ahmad@gmail.com', '$2y$10$NUzU2WZSOorCZaZtIVSE8.YEjis3NsWtcfmP6kcDujvGXbVmJy7ye', '2024-12-03 23:28:22', '2024-12-03 23:28:22', 'member', 'Ahmad Ramadhan'),
(21, 'cindy@gmail.com', '$2y$10$odBgWxiZhYrKjZ4OzNTup.gBa.CLLk81Tq.tG2HLnt1UZ1VRJjwUC', '2024-12-19 01:03:32', '2024-12-19 01:03:32', 'member', 'Cindy Intania'),
(29, 'azam@gmail.com', '$2y$10$YPUsI4lPAADe7h/OXHpuZuKAPFk2T5InKlJ13vs6Th31//PIA1iw6', '2024-12-23 15:14:33', '2024-12-23 15:14:33', 'member', 'Azam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukti_pembayaran_pendaftaran_id_foreign` (`pendaftaran_id`);

--
-- Indeks untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran_anggota`
--
ALTER TABLE `pendaftaran_anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paket_id` (`paket_id`);

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE `posting`
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
-- AUTO_INCREMENT untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran_anggota`
--
ALTER TABLE `pendaftaran_anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD CONSTRAINT `bukti_pembayaran_pendaftaran_id_foreign` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran_anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
