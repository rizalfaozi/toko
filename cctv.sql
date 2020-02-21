-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2020 at 02:39 AM
-- Server version: 5.5.60-0+deb8u1
-- PHP Version: 5.6.40-0+deb8u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cctv`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `setting`, `menu_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Honda Motor', 'honda-motor', 'utama', 0, '2020-02-09 16:48:11', '2020-02-09 16:53:57', NULL),
(14, 'Yamaha', 'yamaha', 'utama', 0, '2020-02-09 16:48:23', '2020-02-09 16:48:23', NULL),
(15, 'Kawasaki', 'kawasaki', 'utama', 0, '2020-02-09 16:48:41', '2020-02-09 16:48:41', NULL),
(16, 'Suzuki', 'suzuki', 'utama', 0, '2020-02-09 16:48:55', '2020-02-09 16:48:55', NULL),
(17, 'Toyota Mobil', 'toyota-mobil', 'utama', 0, '2020-02-09 16:50:00', '2020-02-09 16:54:59', NULL),
(18, 'Honda Mobil', 'honda-mobil', 'utama', 0, '2020-02-09 16:54:14', '2020-02-09 16:54:14', NULL),
(19, 'YZF-R15', 'yzf-150', 'submenu', 14, '2020-02-09 16:56:52', '2020-02-09 16:58:47', NULL),
(20, 'Ninja 150', 'ninja-150', 'submenu', 15, '2020-02-09 16:58:25', '2020-02-09 16:58:25', NULL),
(21, 'KLX 150', 'klx-150', 'submenu', 15, '2020-02-09 16:58:25', NULL, NULL),
(22, 'Jazz', 'jazz', 'submenu', 18, '2020-02-14 17:26:17', '2020-02-14 17:26:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_08_000002_create_users_table', 1),
(2, '2019_01_08_100003_create_password_resets_table', 1),
(7, '2019_12_15_123049_create_brands_table', 2),
(10, '2019_12_19_092227_create_products_table', 5),
(11, '2019_12_19_130004_create_reports_table', 6),
(12, '2019_12_19_145928_create_testimonis_table', 6),
(13, '2020_01_07_155415_create_stocks_table', 7),
(14, '2020_01_07_161402_create_mixes_table', 8),
(15, '2020_02_14_215332_create_materials_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mixes`
--

CREATE TABLE IF NOT EXISTS `mixes` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) unsigned NOT NULL,
  `sub_brand_id` int(11) NOT NULL,
  `recin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `talk` int(11) NOT NULL,
  `katalis` int(11) NOT NULL,
  `met` int(11) NOT NULL,
  `dempul` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mixes`
--

INSERT INTO `mixes` (`id`, `name`, `brand_id`, `sub_brand_id`, `recin`, `talk`, `katalis`, `met`, `dempul`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Winglet', 15, 20, '100', 100, 100, 100, 1, '2020-02-14 02:10:47', NULL, NULL),
(14, 'Body Kit Bemper', 18, 22, '100', 100, 100, 100, 1, '2020-02-14 05:26:42', NULL, NULL),
(15, 'Cover Tangki', 15, 20, '100', 100, 100, 100, 1, '2020-02-15 03:16:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `sub_brand_id` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `noted` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `sub_brand_id`, `price`, `description`, `theme`, `color`, `photo`, `status`, `noted`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Winglet', 15, 20, '7000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'batik', '-', 'files/photo/20200214173531.jpg', 1, 'Order Minimal 5 pasang (seri) & berlaku kelipatannya', 'winglet', '2020-02-14 02:39:46', '2020-02-16 00:09:53', NULL),
(3, 'Body Kit Bemper', 18, 22, '5000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Costum', 'Costum', 'files/photo/20200214172821.jpg', 1, 'Order Minimal 5 pasang (seri) & berlaku kelipatannya', 'body-kit-bemper', '2020-02-14 05:26:50', '2020-02-16 00:09:13', NULL),
(4, 'Cover Tangki', 15, 20, '7000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '-', '-', 'files/photo/20200215155947.jpg', 1, 'Order Minimal 5 pasang (seri) & berlaku kelipatannya', 'cover-tangki', '2020-02-15 15:59:48', '2020-02-16 00:09:34', NULL),
(5, 'Spoiler', 18, 22, '5000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '-', '-', 'files/photo/20200215160431.jpg', 1, 'Order Minimal 5 pasang (seri) & berlaku kelipatannya', 'spoiler', '2020-02-15 16:04:31', '2020-02-16 00:10:13', NULL),
(6, 'Side Kit Left', 18, 22, '2500000', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'batik', '-', 'files/photo/20200215200229.jpg', 1, '', 'side-kit-left', '2020-02-15 18:24:41', '2020-02-16 00:08:20', NULL),
(7, 'Side Kit Right', 18, 22, '5000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', '-', '-', 'files/photo/20200215200518.jpg', 1, '', 'side-kit-right', '2020-02-15 20:05:18', '2020-02-16 00:08:02', NULL),
(8, 'Spoiler', 14, 19, '5000000', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', '-', '-', 'files/photo/20200215200826.jpg', 1, 'Order Minimal 5 pasang (seri) & berlaku kelipatannya', 'spoiler', '2020-02-15 20:08:26', '2020-02-16 00:07:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
`id` int(10) unsigned NOT NULL,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `ip_address`, `name`, `email`, `phone`, `address`, `product_id`, `product_name`, `city`, `qty`, `price`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '10.0.2.2', 'rizal faozi', 'ryzal_aditya@rocketmail.com', '085726242220', 'jalan gejayan ctx 9a', 2, 'Winglet', 'yogayakarta', 1, 7000000, 0, 'tes', '2020-02-17 05:23:25', NULL, NULL),
(4, '10.0.2.2', 'rizal faozi', 'ryzal_aditya@rocketmail.com', '085726242220', 'jalan gejayan ctx 9a', 2, 'Winglet', 'yogayakarta', 1, 7000000, 0, 'tes', '2020-02-18 10:59:45', NULL, NULL),
(5, '10.0.2.2', 'rizal faozi', 'ryzal_aditya@rocketmail.com', '085726242220', 'jalan gejayan ctx 9a', 6, 'Side Kit Left', 'yogayakarta', 1, 2500000, 0, 'jjj', '2020-02-18 11:57:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_crop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `products_id`, `status`, `foto`, `foto_crop`, `created_at`, `updated_at`, `deleted_at`, `slug`) VALUES
(1, 'Kami Hadir Untuk Anda | H...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 1, 'files/photo/20200217144450-ori-.jpg', 'files/photo/20200217144450-crop-.jpg', '2020-02-14 16:54:18', '2020-02-17 14:44:51', NULL, 'kami-hadir-untuk-anda-h-'),
(2, 'Kami Hadir Untuk Anda | H...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 1, 'files/photo/20200217144347-ori-.jpg', 'files/photo/20200217144347-crop-.jpg', '2020-02-14 16:55:04', '2020-02-17 14:43:47', NULL, 'kami-hadir-untuk-anda-h-');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `total_size` int(11) NOT NULL,
  `other` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `qty`, `size`, `total_size`, `other`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Recin', 1, 600, 150, 'liter', '2020-01-07 16:05:23', '2020-01-07 16:05:23', NULL),
(2, 'Talk', 1, 600, 150, 'liter', '2020-01-07 16:07:10', '2020-01-07 16:07:10', NULL),
(3, 'Katalis', 1, 600, 150, 'liter', '2020-01-07 16:09:16', '2020-01-07 16:10:17', NULL),
(4, 'Met', 1, 300, 150, 'liter', '2020-01-07 16:09:35', '2020-01-07 16:09:35', NULL),
(5, 'Dempul', 5, 1, 4, 'lembar', '2020-01-07 16:10:00', '2020-01-07 16:10:00', NULL),
(11, 'Recin', 2, 600, 0, 'liter', '2020-02-17 10:54:18', '2020-02-17 10:54:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks_details`
--

CREATE TABLE IF NOT EXISTS `stocks_details` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `total_size` int(11) NOT NULL,
  `other` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deteted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_details`
--

INSERT INTO `stocks_details` (`id`, `name`, `total_size`, `other`, `created_at`, `updated_at`, `deteted_at`) VALUES
(1, 'Dempul', 2, 'Lembar', '2020-02-17 04:00:21', NULL, NULL),
(2, 'Met', 600, 'Liter', '2020-02-17 04:00:21', NULL, NULL),
(3, 'Talk', 600, 'Liter', '2020-02-17 04:00:21', NULL, NULL),
(4, 'Katalis', 600, 'Liter', '2020-02-17 04:00:21', NULL, NULL),
(5, 'Recin', 1200, 'Liter', '2020-02-17 10:54:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `photo`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rizal faozi', 'admin@gmail.com', '$2y$10$xO8Ok9FTVhPMf5vF0OMb2.Q8oJ8dSRXfEuw1h0Oz4w4qcFxfuSBRK', '09988', 'files/photo/20200105041654.jpg', 'admin', 1, 'O98q7mjBLA0KxuS7v88sCGzIxxyKa2yjfJLRc0k1iUrwAfhCNCxAXPYFpFQi', '2019-11-27 14:33:47', '2020-01-05 04:16:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixes`
--
ALTER TABLE `mixes`
 ADD PRIMARY KEY (`id`), ADD KEY `brand_id` (`brand_id`), ADD KEY `sub_brand_id` (`sub_brand_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
 ADD PRIMARY KEY (`id`), ADD KEY `reports_product_id_foreign` (`product_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
 ADD PRIMARY KEY (`id`), ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks_details`
--
ALTER TABLE `stocks_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mixes`
--
ALTER TABLE `mixes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stocks_details`
--
ALTER TABLE `stocks_details`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mixes`
--
ALTER TABLE `mixes`
ADD CONSTRAINT `mixes_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
ADD CONSTRAINT `reports_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
ADD CONSTRAINT `sliders_product_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
