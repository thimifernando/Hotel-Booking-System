-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2024 at 04:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exampleblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `mobile` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `content`, `mobile`, `img`, `status`, `created_at`, `updated_at`) VALUES
(45, 43, 'fdgb', 'ergfds', 1234567890, 'blogs/dFTMxaO09Dd2iIKmc5By326XA4wLIR7mvwzEdfFA.jpg', '0', '2024-03-06', '2024-03-06'),
(46, 42, 'fgrgf', 'dsvdfdfvg', 716359264, 'blogs/oOWwkUZmIXJNbGBLUc8ZBRkNSO8NhQT7CJE2YKXW.jpg', '0', '2024-05-31', '2024-05-31'),
(47, 43, 'Nadee d', 'xsdsds', 774902773, 'blogs/ucxat4zzZyvxREDRTOEZ4c9owfUqNGMWm2GjVSo4.png', '0', '2024-05-31', '2024-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pool` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `mobile`, `check_in`, `check_out`, `parent`, `child`, `city`, `pool`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nadeesh Malaka Chathuranga', 'nadee@gmail.com', '0774902773', '2024-06-27 20:53:00', '2024-06-20 20:53:00', '1', '3', 'Polgasowita', '1', 0, '2024-06-05 09:58:27', '2024-06-05 09:58:27'),
(2, 'hiransa', 'hiransa@gmail.com', '0774902748', '2024-06-28 12:59:00', '2024-06-11 20:59:00', '4', '1', 'piliyandala', '1', 0, '2024-06-05 09:59:31', '2024-06-05 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `body` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 35, 'UnLike', '2023-07-30', '2023-07-30'),
(2, 35, 'Like', '2023-07-30', '2023-07-30'),
(3, 35, '', '2023-07-30', '2023-07-30'),
(12, 35, 'Like', '2023-08-01', '2023-08-01'),
(13, 35, 'Like', '2023-08-05', '2023-08-05'),
(14, 35, 'Like', '2023-08-05', '2023-08-05'),
(15, 35, 'Like', '2023-08-19', '2023-08-19'),
(16, 35, 'Like', '2023-08-19', '2023-08-19'),
(17, 43, 'Like', '2024-03-06', '2024-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_06_05_073040_create_bookings_table', 1),
(2, '2024_06_05_080352_remove_column_from_bookings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `type` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `referance` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `user_role`, `password`, `phone`, `created_at`, `updated_at`) VALUES
(34, 'test10', 'test0@gmail.com', 'US', '$2y$10$Aw3z3WJvoRD3rmU7FRUcDOBCuqkYToup8GV.K/ModKRRvxFmNNNbS', 781743457, '2023-07-30', '2023-07-30'),
(35, 'Thimira Hiransha', 'thimi@gmail.com', 'US', '$2y$10$mjHVtf4OP1WzmD8Y.JSEIO1bOPLoZVFNl89lgdNcGSwTwAHmE8b5e', 713485900, '2023-07-30', '2023-08-01'),
(36, 'sss', 't@gmail.com', 'US', '$2y$10$pPSMd09edxHa45N1oUsot.i3foNkhErcf4aLwfJu0qMrPu1C3or8q', 713485900, '2023-07-31', '2023-07-31'),
(37, 'Thimira', 'hiransha@gmail.com', 'US', '$2y$10$r/V068wdFaXjXcsAmn2Maeh/Yz9o1dDmYkn03P51fXlHzHKF2TTdW', 713485922, '2023-08-19', '2023-08-19'),
(38, 'Thimira', 'hiransha2@gmail.com', 'US', '$2y$10$q2uw75V28utLqxmS//UcluXj2NQfI2EDDOGQv1gEeEfSHs1EJGNVy', 781743412, '2023-08-19', '2023-08-19'),
(39, 'Kumuditha', 'kumu@gmail.com', 'US', '$2y$10$gCRcXe9pCvWmJuoVXrpGQOEajH43/Q./EI6Pebms5rqyepGGLzhEe', 713485111, '2023-08-19', '2023-08-19'),
(40, '21ew2d', 'qwe@gmail.com', 'US', '$2y$10$a9EU1ZmTWZdTsXTnRxJXDuByca1KgnZEyqqJ6.7nxyGIGQ1/lxNiO', 781743459, '2023-08-19', '2023-08-19'),
(41, 'ywyw', 'qqqae@gmail.com', 'US', '$2y$10$40mmCZWK7Sm32MiwYpdPauDIYxdXCxBLujjEupTFQgKzy4edoDvWC', 781743451, '2023-08-19', '2023-08-19'),
(42, 'sachini', 'sachi@gmail.com', 'US', '$2y$10$V4Qf.2oCW714cdeqJWACb.ICQZZB01NsGkVJzuyuHEOdspjk/rZQe', 781743458, '2023-09-22', '2023-09-22'),
(43, 'admin', 'admin@gmail.com', 'ADMIN', '$2y$10$h0VNdtLjDUQFoTALQnv5NOEN3zevlncnBl7dx2LnIfx69cCcTmu46', 761739259, '2024-03-06', '2024-03-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
