-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 05:50 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_detail_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_order`, `id_masakan`, `keterangan`, `status_detail_order`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'manis', 'Siap', '2019-04-01 01:00:09', '2019-04-01 01:10:51'),
(2, 1, 1, '2', 'Belum', '2019-04-01 01:11:30', '2019-04-01 01:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-03-31 17:00:00', NULL),
(2, 'waiter', '2019-03-31 17:00:00', NULL),
(3, 'kasir', '2019-03-31 17:00:00', NULL),
(4, 'owner', '2019-03-31 17:00:00', NULL),
(5, 'pelanggan', '2019-03-31 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id` int(10) NOT NULL,
  `nama_masakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_masakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id`, `nama_masakan`, `foto`, `harga`, `status_masakan`, `created_at`, `updated_at`) VALUES
(1, 'Nasi Putih', 'upload/JnYWpNmfUKK2ZYI4MzeiF4SJLBldtKYVIwpMxR74.jpeg', '5000', 'Tersedia', '2019-03-31 20:53:09', '2019-03-31 20:53:09'),
(3, 'Ayam bakar kremes', 'upload/ksDko96dzuP38DEUwJKdAWceKSq51jdBVDYZTkao.jpeg', '12000', 'Habis', '2019-03-31 21:19:21', '2019-03-31 21:19:21'),
(5, 'Mie goreng Sosis', 'upload/QqKStaNJRiZIbDayxnJWtyab8IGbZRTkzR1iFX7z.jpeg', '15000', 'Tersedia', '2019-04-01 00:01:16', '2019-04-01 00:01:16'),
(6, 'Cumi goreng tepung', 'upload/r1pzw2r7PRhO0t0nE4ZFGmiFlF3qHQ4f1cNQODkZ.png', '30000', 'Habis', '2019-04-01 01:12:46', '2019-04-01 01:12:46'),
(7, 'Es Teh', 'upload/ChoPFL1xNFXXxwWntgXtRm3R9QT2ASXk9bOh7XAZ.jpeg', '4000', 'Tersedia', '2019-04-01 01:13:18', '2019-04-01 01:13:18'),
(8, 'Mie goreng sea food', 'upload/OgwpRUfWBeNyb8Zd1aLKiufzxIZ1L9xtyE0tMbH0.jpeg', '18000', 'Tersedia', '2019-04-01 19:15:36', '2019-04-01 19:15:36'),
(9, 'Jus Buah', 'upload/yDUdtGlxsgXCJZg6rti8uwYzqGBjanVbKRFfqVHk.jpeg', '10000', 'Tersedia', '2019-04-01 19:16:35', '2019-04-01 19:16:35'),
(10, 'Ayam Bakar Kecap', 'upload/lGT1G3haMY7gBgUEBZaV9VY6NICbvm04aK0nymUv.jpeg', '12000', 'Habis', '2019-04-01 19:17:21', '2019-04-01 19:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_03_29_065239_create_level_tabel', 1),
(2, '2019_03_29_065952_create_masakan_tabel', 2),
(3, '2019_03_29_070012_create_detail_order_tabel', 3),
(4, '2019_03_29_070024_create_order_tabel', 4),
(5, '2019_03_29_070044_create_transaksi_tabel', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-04-01', 5, 'baik', 'Siap', '2019-03-31 23:37:03', '2019-04-01 00:05:54'),
(3, 2, '2019-04-01', 4, 'bagus', 'Belum', '2019-04-01 00:04:50', '2019-04-01 00:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_order`, `tanggal`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, 5, 3, '2019-04-12', 70000, '2019-04-01 00:20:52', '2019-04-01 19:58:48'),
(5, 4, 3, '2019-04-20', 250000, '2019-04-01 00:32:33', '2019-04-01 00:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `id_level`, `nama_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@ukk.com', '$2y$10$w.JkzQ2Vdn2Y7BbNoAetRe4P5gcD9GB18lc0Zyj0ttNcXtqNnNyL2', 1, 'admin1', 'jI2JKE1YMfvB8zK0s5JdnEEIseXZxp4LKhXMn8yQK6ULSj7GzkRbZrz98kZU', NULL, '2019-03-31 20:06:49'),
(2, 'waiter', 'waiter@ukk.com', '$2y$10$FZufIQqr6rBYXoJZj6b2ouJcFMdWnyjXy4QaKuoXOKLgBsU0U.YnO', 2, 'waiter1', NULL, '2019-03-31 19:37:24', '2019-03-31 19:37:24'),
(3, 'kasir', 'kasir@ukk.com', '$2y$10$QBLL.GkLfJUsF9Enw5BPa.o5Fxt2Rdx9TYY2bggWf/r64dNxLFpUy', 3, 'kasir1', NULL, '2019-03-31 20:08:20', '2019-03-31 20:08:20'),
(4, 'owner', 'owner@ukk.com', '$2y$10$LIHMPVudpvvURjRNPseV0.FlXXwpdpMyLkNFWJMlEdqp2IqY8mRAO', 4, 'owner1', NULL, '2019-03-31 20:16:17', '2019-03-31 20:16:17'),
(5, 'pelanggan', 'pelanggan@ukk.com', '$2y$10$m9FabLwDRPnljtiztW856O578lR2KxKKcjPXkWEBDB3VB9ApHpMx2', 5, 'pelanggan1', 'YhWwO32FdAunWdxQqdjCGq5fZYXrwc5V8uhSZkcWR4YwvWBItUzJpnLETSzt', '2019-03-31 21:42:32', '2019-03-31 21:42:32'),
(6, 'pelanggan2', 'pelanggan2@ukk.com', '$2y$10$SYQEr.v03JZ/Szz545ABM.UxVzQ8XgeZ4VUdmrSlpNFar2LyDQ8RG', 5, 'pelanggan2', NULL, '2019-04-01 00:21:47', '2019-04-01 00:21:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
