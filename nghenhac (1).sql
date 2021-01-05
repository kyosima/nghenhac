-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 05, 2021 at 12:43 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nghenhac`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `ofuser` varchar(255) NOT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `banknumber` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `ofuser`, `bankname`, `username`, `banknumber`, `updated_at`, `created_at`) VALUES
(1, 'mevivu', 'Vietcombank', 'Nguyễn Chính Hưng', '00000000', '2021-01-04 04:43:50', '2021-01-04 04:43:50'),
(2, 'kira', NULL, NULL, NULL, '2021-01-04 04:43:50', '2021-01-04 04:43:50'),
(3, 'mevivu2', NULL, NULL, NULL, '2021-01-04 06:56:21', '2021-01-04 06:56:21'),
(4, 'mevivu3', NULL, NULL, NULL, '2021-01-04 07:27:10', '2021-01-04 07:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `ofrole` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `price_per_video` bigint(20) NOT NULL,
  `quantity_video` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Nguyễn Chính Hưng',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ofrole`, `package`, `price_per_video`, `quantity_video`, `updated_at`, `created_at`) VALUES
(1, 1, 200, 10000, 4, '2020-12-31 07:16:42', '2020-12-31 07:16:42'),
(2, 2, 400, 10000, 7, '2020-12-31 07:16:42', '2020-12-31 07:16:42'),
(3, 3, 600, 10000, 12, '2020-12-31 07:16:51', '2020-12-31 07:16:51'),
(4, 0, 999, 10000, 999999, '2020-12-31 07:16:51', '2020-12-31 07:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `statistical`
--

CREATE TABLE `statistical` (
  `id` int(11) NOT NULL,
  `ofuser` varchar(255) NOT NULL,
  `count_video` int(11) NOT NULL,
  `today` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statistical`
--

INSERT INTO `statistical` (`id`, `ofuser`, `count_video`, `today`, `updated_at`, `created_at`) VALUES
(1, 'mevivu', 999999, '2021-01-05', '2021-01-04 03:15:08', '2021-01-04 03:15:08'),
(2, 'kira', 7, '0000-00-00', '2021-01-04 03:15:08', '2021-01-04 03:15:08'),
(3, 'mevivu2', 12, '2021-01-04', '2021-01-04 06:56:21', '2021-01-04 06:56:21'),
(4, 'mevivu3', 2, '2021-01-05', '2021-01-04 07:27:10', '2021-01-04 07:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `upgrate`
--

CREATE TABLE `upgrate` (
  `id` int(11) NOT NULL,
  `ofuser` varchar(255) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `role` int(11) NOT NULL,
  `bill` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upgrate`
--

INSERT INTO `upgrate` (`id`, `ofuser`, `amount`, `role`, `bill`, `status`, `updated_at`, `created_at`) VALUES
(1, 'mevivu', 0, 0, 'ornate-vip-gold-background-art-vector-51653.jpg', 2, '2020-12-29 06:13:41', '2020-12-29 06:13:41'),
(2, 'kira', 0, 0, 'z1.jpg', 1, '2020-12-31 04:33:09', '2020-12-31 04:33:09'),
(3, 'mevivu', 200000, 0, 'z4.jpg', 2, '2021-01-04 04:21:38', '2021-01-04 04:21:38'),
(4, 'mevivu', 200000, 0, 'z4.jpg', 2, '2021-01-04 04:22:31', '2021-01-04 04:22:31'),
(5, 'mevivu2', 600000, 0, 'building.png', 1, '2021-01-04 06:56:21', '2021-01-04 06:56:21'),
(6, 'mevivu3', 200000, 0, 'account.png', 1, '2021-01-04 07:27:10', '2021-01-04 07:27:10'),
(7, 'mevivu3', 200000, 2, 'play.png', 1, '2021-01-04 07:38:50', '2021-01-04 07:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL,
  `wallet` bigint(20) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `status`, `role`, `wallet`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mevivu', 'Nguyễn Chính Hưng', 'kirabbo2ytt@gmail.com', 1, 0, 990000001, '$2y$10$PDqTmAXjFsp2ox6B/4.iDuzu.ABZ2FxO2VHT39bkr/74SF6BQ2qE6', NULL, NULL, NULL),
(2, 'kira', 'Nguyễn Chính Hưng', 'nc.hung0806@gmail.coma', 1, 0, 1000000, '$2y$10$PY4CVxSee/epudphgS3ZzerB07ZiJBTEm9SuJ9vq9MEFwxLwvJz72', NULL, NULL, NULL),
(3, 'kirabboy', 'Nguyễn Chính Hưng', 'nc.hung0806@gmail.com', 1, 3, 1111, '$2y$10$OC5OH308Y0InVSThPDy0P.0s57eINF/jDiiQsB/5nVP/zQO4Nq2ZK', NULL, NULL, NULL),
(4, 'mevivu1', 'Nguyễn Chính Hưng', 'nc.hung0806@gmail.com', 1, 3, 0, '$2y$10$tICEvx522GODHYPmJiota.vhiUPMnM.9cOG/4C9crw/ktLpsr1WeC', NULL, NULL, NULL),
(5, 'mevivu2', 'Nguyễn Chính Hưng', 'nc.hung0806@gmail.com', 2, 3, 0, '$2y$10$NJx/NhaHEjVTM5nHvJts0eyj9SiYc0hkKuG6.gupHQbuCvIv8rFGe', NULL, NULL, NULL),
(6, 'mevivu3', 'Nguyễn Chính Hưng', 'nc.hung0806@gmail.com', 1, 2, 50000, '$2y$10$2M9.johYXNOyn2J4fuBosO9atsMICOfVniQJrnojgveqL3knXtPtq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `viewer` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `link`, `viewer`, `updated_at`, `created_at`) VALUES
(2, 'ĐÔ TRƯỞNG | ĐẠT G | OFFICIAL MV', 'ljN7Pv3cnIo', ',6,6,6,6,6', '2021-01-05 03:21:10', '2021-01-05 03:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawn`
--

CREATE TABLE `withdrawn` (
  `id` int(11) NOT NULL,
  `ofuser` varchar(255) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdrawn`
--

INSERT INTO `withdrawn` (`id`, `ofuser`, `amount`, `status`, `updated_at`, `created_at`) VALUES
(1, 'mevivu', 9999999, 1, '2021-01-04 05:12:27', '2021-01-04 05:12:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ofuser` (`ofuser`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrate`
--
ALTER TABLE `upgrate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawn`
--
ALTER TABLE `withdrawn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upgrate`
--
ALTER TABLE `upgrate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawn`
--
ALTER TABLE `withdrawn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
