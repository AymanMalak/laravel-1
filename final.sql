-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 07:33 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

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
(1, '2020_06_06_121527_create_users_table', 1),
(2, '2020_06_06_155526_create_tasks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `status` enum('opened','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'closed',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `desc`, `deadline`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ayman Task 1', 'desc', '2020-06-23 00:00:00', 'closed', 1, '2020-06-08 11:25:23', '2020-06-09 14:40:14'),
(2, 'Ahmed Task 1', 'desc', '2020-06-02 00:00:00', 'closed', 2, '2020-06-08 11:26:04', '2020-06-08 11:26:04'),
(3, 'Ali Task 1', 'desc', '2020-06-03 00:00:00', 'opened', 3, '2020-06-08 11:27:40', '2020-06-08 11:27:40'),
(4, 'Mohamed Task 1', 'desc', '2020-06-04 00:00:00', 'opened', 4, '2020-06-08 11:28:09', '2020-06-08 11:28:09'),
(5, 'Ayman Task 2', 'desc', '2020-06-30 00:00:00', 'closed', 1, '2020-06-08 13:30:23', '2020-06-09 14:39:59'),
(6, 'Ahmed Task 2', 'desc', '2020-06-08 15:30:23', 'opened', 2, '2020-06-08 13:30:23', '2020-06-08 13:30:23'),
(7, 'Ali Task 2', 'desc', '2020-06-03 00:00:00', 'closed', 3, '2020-06-08 13:30:23', '2020-06-08 13:30:23'),
(8, 'Mohamed Task 2', 'desc', '2020-06-08 15:30:23', 'closed', 4, '2020-06-08 13:30:23', '2020-06-08 13:30:23'),
(9, 'Ayman Task 3', 'desc', '2020-06-08 15:33:21', 'opened', 1, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(10, 'Ahmed Task 3', 'desc', '2020-06-08 15:33:21', 'closed', 2, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(11, 'Ali Task 3', 'desc', '2020-06-08 15:33:21', 'opened', 3, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(12, 'Mohamed Task 3', 'desc', '2020-06-08 15:33:21', 'opened', 4, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(13, 'Ayman Task 4', 'desc', '2020-06-08 15:33:21', 'closed', 1, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(14, 'Ahmed Task 4', 'desc', '2020-06-08 15:33:21', 'opened', 2, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(15, 'Ali Task 4', 'desc', '2020-06-08 15:33:21', 'closed', 3, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(16, 'Mohamed Task 4', 'desc', '2020-06-08 15:33:21', 'closed', 4, '2020-06-08 13:33:21', '2020-06-08 13:33:21'),
(17, 'Ayman Task 5', 'desc', '2020-06-08 15:38:29', 'opened', 1, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(18, 'Ahmed Task 5', 'desc', '2020-06-08 15:38:29', 'closed', 2, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(19, 'Ali Task 5', 'desc', '2020-06-08 15:38:29', 'opened', 3, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(20, 'Mohamed Task 5', 'desc', '2020-06-08 15:38:29', 'opened', 4, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(21, 'Ayman Task 6', 'desc', '2020-06-08 15:38:29', 'closed', 1, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(22, 'Ahmed Task 6', 'desc', '2020-06-08 15:38:29', 'opened', 2, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(23, 'Ali Task 6', 'desc', '2020-06-08 15:38:29', 'closed', 3, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(24, 'Mohamed Task 6', 'desc', '2020-06-08 15:38:29', 'closed', 4, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(25, 'Ayman Task 7', 'desc', '2020-06-21 00:00:00', 'closed', 4, '2020-06-08 13:38:29', '2020-06-09 14:48:08'),
(26, 'Ahmed Task 7', 'desc', '2020-06-08 15:38:29', 'closed', 2, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(27, 'Ali Task 7', 'desc', '2020-06-08 15:38:29', 'opened', 3, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(28, 'Mohamed Task 7', 'desc', '2020-06-08 15:38:29', 'opened', 4, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(29, 'Ayman Task 8', 'desc', '2020-06-22 00:00:00', 'closed', 2, '2020-06-08 13:38:29', '2020-06-09 14:46:34'),
(30, 'Ahmed Task 8', 'desc', '2020-06-08 15:38:29', 'opened', 2, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(31, 'Ali Task 8', 'desc', '2020-06-08 15:38:29', 'closed', 3, '2020-06-08 13:38:29', '2020-06-08 13:38:29'),
(32, 'Mohamed Task 9', 'desc', '2020-06-17 00:00:00', 'closed', 4, '2020-06-08 13:38:29', '2020-06-09 14:41:04'),
(33, 'task mail', 'desc', '2020-06-07 00:00:00', 'opened', 2, '2020-06-09 14:06:57', '2020-06-09 14:06:57'),
(34, 'new task', 'desc', '2020-06-16 00:00:00', 'opened', 1, '2020-06-09 15:18:17', '2020-06-09 15:18:17'),
(35, 'new task2', 'desc', '2020-06-24 00:00:00', 'closed', 2, '2020-06-09 15:19:30', '2020-06-09 15:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Ayman', 'aymanabdelmalak11@gmail.com', '$2y$10$80Z6JsmVcDOe7Kx14Sq.gufOI7ltrgKcaqSuqchvjZeJMYC4jwlNa', 'admin', '2020-06-08 11:06:43', '2020-06-08 11:06:43'),
(2, 'Ahmed', 'ahmed@gmail.com', '$2y$10$UC.biYtpsBIqq3DeN8aSAeaBqHF5ahP4p/3vesJzjy2BQ5jlfu0ES', 'admin', '2020-06-08 11:08:19', '2020-06-08 11:08:19'),
(3, 'Ali', 'ali@gmail.com', '$2y$10$VeTMvppTJnblJEfgmgH7mOwYs18cHZ83J21N11aGBgZ1pV8JgLWz2', 'user', '2020-06-08 11:08:55', '2020-06-08 11:08:55'),
(4, 'Mohamed', 'mohamed@gmail.com', '$2y$10$5xQDetPc9q4a6GBttZPdqukybBq8JwTqRcmBEiNxfJrKFdu2mS.Yu', 'admin', '2020-06-08 11:15:11', '2020-06-08 11:15:11'),
(5, 'Ayman Malak 2', 'aymanmalak312@gmail.com', '$2y$10$LvI1h5SsWnloWTMeoZrpWeLsEa3cPuihCUjRuVEHdI6TEa0KPL3rm', 'admin', '2020-06-09 08:57:52', '2020-06-09 08:57:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
