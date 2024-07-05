-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Jul 2024 pada 06.49
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simaung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'b8b541e955ff4e4059987eb63e359d4a', '2024-03-12 14:06:28'),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '21b6178fc20d222cddc9730b7ce4b34c', '2024-03-12 17:17:18'),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5d5eb852ecd5d918a0c2c0dc69ba7c69', '2024-03-26 23:45:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '127.0.0.1', 'orenji@gmail.com', 1, '2024-03-12 11:14:13', 1),
(2, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-12 14:03:42', 0),
(3, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-12 14:07:09', 1),
(4, '127.0.0.1', 'ifansz', NULL, '2024-03-12 14:13:56', 0),
(5, '127.0.0.1', 'ifansz', NULL, '2024-03-12 14:14:22', 0),
(6, '127.0.0.1', 'ifansz', NULL, '2024-03-12 14:14:37', 0),
(7, '127.0.0.1', 'ifanszoro@gmail.com', NULL, '2024-03-12 16:50:20', 0),
(8, '127.0.0.1', 'ifans07', NULL, '2024-03-12 16:50:57', 0),
(9, '127.0.0.1', 'ifanszoro@gmail.com', NULL, '2024-03-12 16:52:57', 0),
(10, '127.0.0.1', 'ifanszoro@gmail.com', NULL, '2024-03-12 16:53:27', 0),
(11, '127.0.0.1', 'ifanszoro@gmail.com', NULL, '2024-03-12 16:54:21', 0),
(12, '127.0.0.1', 'zoro90', NULL, '2024-03-12 16:58:31', 0),
(13, '127.0.0.1', 'orenji@gmail.com', NULL, '2024-03-12 16:58:55', 0),
(14, '127.0.0.1', 'jamal@gmail.com', NULL, '2024-03-12 16:59:18', 0),
(15, '127.0.0.1', 'seijurozoro@gmail.com', 4, '2024-03-12 17:17:34', 1),
(16, '127.0.0.1', 'ifanszoro@gmail.com', NULL, '2024-03-12 17:17:58', 0),
(17, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-12 17:18:21', 1),
(18, '127.0.0.1', 'hkjhgkjd', NULL, '2024-03-12 17:19:41', 0),
(19, '127.0.0.1', 'dsfkajda', NULL, '2024-03-12 17:28:33', 0),
(20, '127.0.0.1', 'ifanszoro@gmail.com', NULL, '2024-03-12 21:56:59', 0),
(21, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-12 21:58:14', 1),
(22, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-19 21:00:22', 1),
(23, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-19 22:41:29', 1),
(24, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-19 22:43:47', 1),
(25, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-20 11:41:01', 1),
(26, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-20 15:03:32', 1),
(27, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-20 20:29:52', 1),
(28, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-21 23:06:18', 1),
(29, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-21 23:08:21', 1),
(30, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-23 12:42:16', 1),
(31, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-23 16:45:13', 1),
(32, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-23 16:48:39', 1),
(33, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-23 19:22:31', 1),
(34, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-23 22:31:10', 1),
(35, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-24 11:52:06', 1),
(36, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-24 17:24:01', 1),
(37, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-24 19:53:22', 1),
(38, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-25 09:22:40', 1),
(39, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-25 21:33:26', 1),
(40, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-26 21:05:48', 1),
(41, '127.0.0.1', 'tes@gmail.com', 5, '2024-03-26 23:31:50', 1),
(42, '127.0.0.1', 'ifansz94@gmail.com', 2, '2024-03-26 23:45:07', 0),
(43, '127.0.0.1', 'ifansz94@gmail.com', 2, '2024-03-26 23:45:54', 1),
(44, '127.0.0.1', 'tes@gmail.com', 0, '2024-03-26 23:49:19', 1),
(45, '127.0.0.1', 'tes@gmail.com', 0, '2024-03-26 23:49:59', 1),
(46, '127.0.0.1', 'ifansz94@gmail.com', 2, '2024-03-26 23:50:58', 1),
(47, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-26 23:51:21', 1),
(48, '127.0.0.1', 'tes@gmail.com', 0, '2024-03-26 23:53:16', 1),
(49, '127.0.0.1', 'ifansz94@gmail.com', 2, '2024-03-26 23:53:33', 1),
(50, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-27 14:03:38', 1),
(51, '::1', 'ifanszoro@gmail.com', 3, '2024-03-27 18:53:14', 1),
(52, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-03-27 21:58:37', 1),
(53, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-04-01 12:08:08', 1),
(54, '127.0.0.1', 'ifansz94@gmail.com', 2, '2024-04-01 19:17:53', 1),
(55, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-04-01 19:40:57', 1),
(56, '127.0.0.1', 'ifanszoro@gmail.com', 3, '2024-04-02 20:01:04', 1),
(57, '192.168.1.5', 'ifanszoro@gmail.com', 3, '2024-04-06 13:40:45', 1),
(58, '192.168.1.10', 'ifansz94@gmail.com', 2, '2024-04-06 23:07:34', 1),
(59, '192.168.1.10', 'ifansz94@gmail.com', NULL, '2024-04-06 23:30:06', 0),
(60, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-06 23:30:21', 1),
(61, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-07 13:54:26', 1),
(62, '192.168.1.11', 'ifanszoro@gmail.com', 3, '2024-04-07 17:01:00', 1),
(63, '192.168.1.11', 'ifansz94@gmail.com', 2, '2024-04-07 17:01:43', 1),
(64, '192.168.1.11', 'ifansz94@gmail.com', 2, '2024-04-07 17:59:14', 1),
(65, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-07 22:35:54', 1),
(66, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-08 13:39:27', 1),
(67, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-08 21:44:00', 1),
(68, '192.168.1.11', 'ifanszoro@gmail.com', 3, '2024-04-08 21:50:58', 1),
(69, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-09 13:44:55', 1),
(70, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-10 19:14:08', 1),
(71, '192.168.1.10', 'ifanszoro@gmail.com', NULL, '2024-04-10 21:16:33', 0),
(72, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-10 21:16:44', 1),
(73, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-11 13:42:58', 1),
(74, '192.168.1.10', 'tes', NULL, '2024-04-11 13:55:58', 0),
(75, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-11 13:56:20', 1),
(76, '192.168.1.4', 'tes@gmail.com', 99, '2024-04-11 14:08:18', 1),
(77, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-11 14:28:18', 1),
(78, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-11 19:00:11', 1),
(79, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-11 21:20:17', 1),
(80, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-12 20:41:56', 1),
(81, '192.168.1.5', 'tes@gmail.com', 99, '2024-04-12 23:11:21', 1),
(82, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-13 10:24:37', 1),
(83, '192.168.1.2', 'tes', NULL, '2024-04-13 11:49:58', 0),
(84, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-13 11:50:21', 1),
(85, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-13 19:11:33', 1),
(86, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-13 23:50:41', 1),
(87, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-14 09:57:44', 1),
(88, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-14 14:59:25', 1),
(89, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-14 19:14:10', 1),
(90, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-14 21:48:07', 1),
(91, '192.168.1.2', 'ifanszoro@gmail.com', 3, '2024-04-15 00:27:02', 1),
(92, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-15 13:19:33', 1),
(93, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-15 19:57:49', 1),
(94, '192.168.1.2', 'ifanszoro@gmail.com', 3, '2024-04-16 21:49:12', 1),
(95, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-16 21:51:32', 1),
(96, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-16 21:59:35', 1),
(97, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-17 15:19:36', 1),
(98, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-17 20:28:13', 1),
(99, '192.168.1.4', 'tes@gmail.com', 99, '2024-04-17 21:20:28', 1),
(100, '192.168.1.4', 'tes@gmail.com', 99, '2024-04-17 21:20:53', 1),
(101, '192.168.1.4', 'tes@gmail.com', 99, '2024-04-17 23:23:08', 1),
(102, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-18 17:22:11', 1),
(103, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-18 18:09:35', 1),
(104, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-18 19:02:40', 1),
(105, '192.168.1.11', 'tes@gmail.com', 99, '2024-04-18 19:08:27', 1),
(106, '192.168.1.11', 'ifanszoro@gmail.com', 3, '2024-04-18 19:09:39', 1),
(107, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-20 09:14:18', 1),
(108, '192.168.1.6', 'tes', NULL, '2024-04-20 10:40:01', 0),
(109, '192.168.1.6', 'tes@gmail.com', 99, '2024-04-20 10:40:18', 1),
(110, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-20 12:39:58', 1),
(111, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-20 18:18:56', 1),
(112, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-21 15:11:23', 1),
(113, '192.168.1.10', 'tes', NULL, '2024-04-22 11:37:14', 0),
(114, '192.168.1.10', 'tes', NULL, '2024-04-22 11:37:23', 0),
(115, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-22 11:37:44', 1),
(116, '192.168.1.10', 'tes', NULL, '2024-04-22 23:54:09', 0),
(117, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-22 23:54:25', 1),
(118, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-23 10:46:35', 1),
(119, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-23 15:15:26', 1),
(120, '192.168.1.10', 'ifanszoro@gmail.com', 3, '2024-04-23 15:28:15', 1),
(121, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-23 15:39:34', 1),
(122, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-23 22:16:02', 1),
(123, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-24 11:11:23', 1),
(124, '192.168.1.2', 'tes', NULL, '2024-04-26 15:32:10', 0),
(125, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-26 15:32:27', 1),
(126, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-26 15:34:01', 1),
(127, '192.168.1.4', 'ifanszoro@gmail.com', 3, '2024-04-26 16:09:50', 1),
(128, '192.168.1.4', 'tes@gmail.com', 99, '2024-04-26 16:23:36', 1),
(129, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-26 19:17:05', 1),
(130, '192.168.1.2', 'ifanszoro@gmail.com', 3, '2024-04-26 23:12:40', 1),
(131, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-27 10:40:08', 1),
(132, '192.168.1.4', 'ifanszoro@gmail.com', 3, '2024-04-27 11:49:30', 1),
(133, '192.168.1.6', 'tes@gmail.com', 99, '2024-04-27 13:29:12', 1),
(134, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-27 13:53:45', 1),
(135, '192.168.1.4', 'tes@gmail.com', 99, '2024-04-27 16:01:08', 1),
(136, '192.168.1.4', 'ifanszoro@gmail.com', 3, '2024-04-27 16:07:35', 1),
(137, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-27 20:35:17', 1),
(138, '192.168.1.11', 'ifanszoro@gmail.com', 3, '2024-04-27 23:44:42', 1),
(139, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-28 10:27:53', 1),
(140, '192.168.1.2', 'ifanszoro@gmail.com', 3, '2024-04-28 10:31:59', 1),
(141, '192.168.1.10', 'tes@gmail.com', 99, '2024-04-28 19:01:29', 1),
(142, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-29 07:23:49', 1),
(143, '192.168.1.2', 'tes', NULL, '2024-04-29 11:16:36', 0),
(144, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-29 11:16:44', 1),
(145, '192.168.1.2', 'tes', NULL, '2024-04-29 15:31:30', 0),
(146, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-29 15:31:39', 1),
(147, '192.168.1.39', 'tes@gmail.com', 99, '2024-04-29 15:44:02', 1),
(148, '192.168.1.39', 'ifanszoro@gmail.com', 3, '2024-04-29 15:44:53', 1),
(149, '192.168.1.2', 'tes', NULL, '2024-04-29 23:01:00', 0),
(150, '192.168.1.2', 'tes', NULL, '2024-04-29 23:01:08', 0),
(151, '192.168.1.2', 'tes', NULL, '2024-04-29 23:01:22', 0),
(152, '192.168.1.2', 'tes', NULL, '2024-04-29 23:01:46', 0),
(153, '192.168.1.2', 'ifanszoro@gmail.com', NULL, '2024-04-29 23:04:13', 0),
(154, '192.168.1.2', 'ifanszoro@gmail.com', 3, '2024-04-29 23:05:03', 1),
(155, '192.168.1.2', 'tes@gmail.com', 99, '2024-04-29 23:05:26', 1),
(156, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-01 21:30:41', 1),
(157, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-02 12:08:12', 1),
(158, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-02 22:11:03', 1),
(159, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-03 14:31:11', 1),
(160, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-03 15:44:31', 1),
(161, '192.168.1.11', 'tes@gmail.com', 99, '2024-05-03 16:53:26', 1),
(162, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-04 09:17:05', 1),
(163, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-05 17:36:31', 1),
(164, '192.168.1.124', 'tes', NULL, '2024-05-07 20:59:16', 0),
(165, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-07 20:59:42', 1),
(166, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-07 22:43:48', 1),
(167, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-08 22:56:56', 1),
(168, '192.168.1.124', 'tes', NULL, '2024-05-09 20:53:46', 0),
(169, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-09 20:54:23', 1),
(170, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-11 10:57:33', 1),
(171, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-11 14:29:56', 1),
(172, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-14 14:01:00', 1),
(173, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-18 19:02:30', 1),
(174, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-19 15:36:10', 1),
(175, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-20 08:10:18', 1),
(176, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-25 15:03:17', 1),
(177, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-25 15:42:03', 1),
(178, '192.168.1.124', 'tes@gmail.com', 99, '2024-05-25 22:05:44', 1),
(179, '192.168.1.124', 'ifansz94@gmail.com', 2, '2024-05-27 09:03:31', 1),
(180, '192.168.1.124', 'ifansz94@gmail.com', 2, '2024-05-27 13:03:31', 1),
(181, '192.168.1.124', 'ifansz94@gmail.com', 2, '2024-05-28 11:46:15', 1),
(182, '192.168.1.124', 'ifans07', NULL, '2024-05-28 12:41:43', 0),
(183, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-05-28 12:42:36', 1),
(184, '192.168.1.124', 'ifansz94@gmail.com', 2, '2024-05-28 12:52:01', 1),
(185, '192.168.1.124', 'ifansz94@gmail.com', NULL, '2024-05-28 18:55:04', 0),
(186, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-05-28 18:55:20', 1),
(187, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-05-30 12:39:28', 1),
(188, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-05-30 21:19:28', 1),
(189, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-01 10:54:23', 1),
(190, '192.168.1.11', 'ifanszoro@gmail.com', 3, '2024-06-01 11:03:07', 1),
(191, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-02 11:37:39', 1),
(192, '192.168.1.124', 'tes@gmail.com', 99, '2024-06-02 13:56:40', 1),
(193, '192.168.1.124', 'tes', NULL, '2024-06-02 19:06:38', 0),
(194, '192.168.1.124', 'tes@gmail.com', 99, '2024-06-02 19:06:47', 1),
(195, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-03 20:21:23', 1),
(196, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-06 11:57:01', 1),
(197, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-06 16:52:22', 1),
(198, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-06 21:48:30', 1),
(199, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-10 09:38:02', 1),
(200, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-12 10:02:40', 1),
(201, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-18 09:40:31', 1),
(202, '192.168.1.124', 'tes', NULL, '2024-06-23 10:43:37', 0),
(203, '192.168.1.124', 'tes@gmail.com', 99, '2024-06-23 10:43:54', 1),
(204, '192.168.1.124', 'tes@gmail.com', 99, '2024-06-23 10:52:43', 1),
(205, '192.168.1.124', 'ifanszoro@gmail.com', NULL, '2024-06-28 10:04:06', 0),
(206, '192.168.1.124', 'ifanszoro@gmail.com', 3, '2024-06-28 10:04:21', 1),
(207, '192.168.1.124', 'tes', NULL, '2024-06-29 13:56:23', 0),
(208, '192.168.1.124', 'tes@gmail.com', 99, '2024-06-29 13:57:37', 1),
(209, '192.168.1.124', 'tes@gmail.com', 99, '2024-06-29 19:05:28', 1),
(210, '192.168.1.124', 'tes@gmail.com', 99, '2024-06-29 21:53:48', 1),
(211, '192.168.1.8', 'tes@gmail.com', 99, '2024-06-30 16:43:24', 1),
(212, '192.168.1.8', 'tes@gmail.com', 99, '2024-07-02 11:17:55', 1),
(213, '192.168.1.8', 'tes@gmail.com', 99, '2024-07-03 10:27:25', 1),
(214, '192.168.1.8', 'tes@gmail.com', 99, '2024-07-04 19:27:33', 1),
(215, '192.168.1.8', 'ifanszoro@gmail.com', NULL, '2024-07-04 20:49:00', 0),
(216, '192.168.1.8', 'ifanszoro@gmail.com', 3, '2024-07-04 20:49:21', 1),
(217, '::1', 'tes@gmail.com', 99, '2024-07-05 09:24:51', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:08:01'),
(2, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:11:46'),
(3, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:17:44'),
(4, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:19:10'),
(5, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:22:30'),
(6, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:28:05'),
(7, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:33:31'),
(8, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:34:21'),
(9, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 22:52:58'),
(10, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 23:36:29'),
(11, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 23:38:55'),
(12, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 23:40:06'),
(13, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '5c5fe67a8f2c983f3926a1c0727bcd63', '2024-03-26 23:42:33'),
(14, 'ifansz94@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '661c97b1cbe94aa4f1ba4ead7b9252af', '2024-03-26 23:44:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1710211731, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cicilanpiutang`
--

CREATE TABLE `tb_cicilanpiutang` (
  `id` int NOT NULL,
  `id_piutang` int NOT NULL,
  `id_dompet` int NOT NULL,
  `id_user` int NOT NULL,
  `catatan_cicilan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jml_cicilan` int NOT NULL,
  `tanggal` date NOT NULL,
  `status_cicilan` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_cicilanpiutang`
--

INSERT INTO `tb_cicilanpiutang` (`id`, `id_piutang`, `id_dompet`, `id_user`, `catatan_cicilan`, `jml_cicilan`, `tanggal`, `status_cicilan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 99, 'horeee', 1000000, '2024-02-04', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 99, 'hmm...', 500000, '2024-02-04', 1, '2024-02-04 17:28:25', '2024-02-04 17:28:25'),
(3, 1, 2, 99, 'horeee', 500000, '2024-02-04', 0, '2024-02-04 18:00:47', '2024-02-04 18:00:47'),
(4, 1, 2, 99, 'horeee', 750000, '2024-02-04', 0, '2024-02-04 18:01:39', '2024-02-04 18:01:39'),
(5, 1, 2, 99, 'hm....', 2000000, '2024-02-04', 1, '2024-02-04 18:05:32', '2024-02-04 18:05:32'),
(6, 1, 2, 99, 'Ketik catatan . . .', 1000000, '2024-02-04', 0, '2024-02-04 18:26:22', '2024-02-04 18:26:22'),
(7, 1, 2, 99, 'Ketik catatan . . .', 1000000, '2024-02-04', 0, '2024-02-04 18:26:56', '2024-02-04 18:26:56'),
(8, 1, 2, 99, 'Ketik catatan . . .', 2000000, '2024-02-05', 1, '2024-02-05 16:32:56', '2024-02-05 16:32:56'),
(9, 1, 2, 99, 'Ketik catatan . . .', 1000000, '2024-02-05', 0, '2024-02-05 16:37:09', '2024-02-05 16:37:09'),
(10, 2, 1, 99, 'Ketik catatan . . .', 500000, '2024-02-07', 1, '2024-02-07 12:18:02', '2024-02-07 12:18:02'),
(11, 2, 2, 99, 'Ketik catatan . . .', 250000, '2024-02-07', 0, '2024-02-07 17:10:13', '2024-02-07 17:10:13'),
(12, 3, 1, 99, 'Ketik catatan . . .', 500000, '2024-02-07', 1, '2024-02-07 21:18:54', '2024-02-07 21:18:54'),
(13, 3, 1, 99, 'Ketik catatan . . .', 150000, '2024-02-07', 1, '2024-02-07 21:19:31', '2024-02-07 21:19:31'),
(14, 3, 2, 99, 'Ketik catatan . . .', 150000, '2024-02-07', 0, '2024-02-07 21:19:57', '2024-02-07 21:19:57'),
(15, 6, 1, 99, 'cicil dulu bos', 500000, '2024-02-09', 0, '2024-02-09 23:54:02', '2024-02-09 23:54:02'),
(16, 5, 3, 99, 'Lunas', 100000, '2024-02-10', 0, '2024-02-10 00:03:36', '2024-02-10 00:03:36'),
(17, 4, 3, 99, 'cicil segini dulu bos', 500000, '2024-02-10', 0, '2024-02-10 00:06:19', '2024-02-10 00:06:19'),
(18, 7, 6, 3, 'cicil 1', 500000, '2024-03-24', 0, '2024-03-24 16:48:32', '2024-03-24 16:48:32'),
(19, 7, 6, 3, 'cicil dikit dulu', 100000, '2024-04-08', 0, '2024-04-08 21:49:06', '2024-04-08 21:49:06'),
(20, 6, 4, 99, 'lunas', 500000, '2024-04-13', 0, '2024-04-13 12:19:13', '2024-04-13 12:19:13'),
(21, 10, 6, 3, 'Langsung bayar lunas', 1000000, '2024-05-30', 0, '2024-05-30 13:45:20', '2024-05-30 13:45:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dompet`
--

CREATE TABLE `tb_dompet` (
  `id_dompet` int NOT NULL,
  `nama_dompet` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `saldo` int NOT NULL,
  `saldo_awal` int NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dompet`
--

INSERT INTO `tb_dompet` (`id_dompet`, `nama_dompet`, `saldo`, `saldo_awal`, `status`, `created_at`, `updated_at`, `slug`, `id_user`) VALUES
(0, 'optional', 0, 0, 1, NULL, '2024-05-03 16:52:43', '', 0),
(1, 'CIMB', 9703500, 5000000, 0, NULL, '2024-05-03 17:04:00', '', 99),
(2, 'BRI', 10254000, 13000000, 1, NULL, '2024-05-04 11:28:02', '', 99),
(3, 'Cash', 1710350, 500000, 0, NULL, '2024-04-28 19:12:55', '', 99),
(4, 'BCA', 1100000, 500000, 0, NULL, '2024-05-03 17:05:41', '', 99),
(6, 'BRI', 4073825, 12000000, 0, '2024-03-23 19:26:36', '2024-07-04 20:50:58', '', 3),
(7, 'Test Pinjam', 5500000, 20000000, 0, '2024-04-08 14:24:33', '2024-06-12 10:08:59', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int NOT NULL,
  `gaji` int NOT NULL,
  `tanggal_gajian` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `iddompet` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `gaji`, `tanggal_gajian`, `created_at`, `updated_at`, `slug`, `id_user`, `iddompet`) VALUES
(1, 2853862, 27, '2023-11-28 06:31:32', '2023-11-28 06:31:32', 'h92^%wS!E8MmQ$d665d301543cee71.62139025', 0, 0),
(6, 5000000, 27, '2024-04-26 23:02:59', '2024-04-27 16:01:43', '9vr01PCLuWOtMa7no6662bc2235fcd07.53081002', 99, 1),
(7, 2877685, 27, '2024-04-26 23:13:06', '2024-04-27 00:10:44', 'Et7ZQ42nvqWwT1yF5z662bc482612703.52456499', 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_icon`
--

CREATE TABLE `tb_icon` (
  `id` int NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `id` int NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `harga` int NOT NULL,
  `catatan` text NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_inventory`
--

INSERT INTO `tb_inventory` (`id`, `nama_barang`, `harga`, `catatan`, `status`, `created_at`, `updated_at`, `slug`, `id_user`) VALUES
(1, 'Natur Shampoo', 46000, 'Extract Ginseng 270ML (beli di ruby)', 0, '2024-04-20 10:30:02', '2024-04-20 13:43:47', '76c4r9VXp@.K$oD&662328aa3e5693.61838840', 99),
(3, 'Natur Tonik', 36150, 'Extract Ginseng 90ML (beli di ruby)', 0, '2024-04-20 20:32:14', '2024-04-20 20:41:53', '82BC-m3b9uYcO_J26623b5ceedadb2.78854707', 99),
(4, 'Pond&#039;s Men', 35500, 'FF Acne Solution 100G', 0, '2024-04-20 20:42:55', '2024-04-20 20:43:11', '^.so4Q8-h_2JVU6f6623b84f364158.91835864', 99),
(5, 'Natur SHP', 15500, 'Tea tree oil 80ML', 0, '2024-04-20 20:50:19', '2024-04-20 20:50:19', '0Y4EJ57RTkqvfr6623ba0b497db9.86919793', 99),
(6, 'Wi-Fi', 250000, 'berlangganan di MyRepublic', 0, '2024-04-23 22:28:12', '2024-04-23 22:28:12', 'ok93TvYX4B0HbyWxw86627c57c46cb46.56149447', 99),
(7, 'Hatomugi', 30000, 'Beli di shoope (skin conditioner toner)', 0, '2024-05-30 12:42:16', '2024-05-30 13:42:43', 'QTl7kex2ZV9hC30csG665803a8e11b19.41190100', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_user` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`, `icon`, `created_at`, `updated_at`, `id_user`, `slug`) VALUES
(1, 'Makanan', 'fa-solid fa-bowl-food', '2024-06-29 15:39:13', '2024-07-03 12:55:22', 99, 'ijlk3291ln'),
(2, 'Listrik', 'fa-solid fa-bolt', '2024-07-02 12:38:49', '2024-07-02 12:38:49', 99, 'kjdfa7923kdaldk'),
(3, 'Lain - lain', 'fa-solid fa-list', '2024-07-03 12:07:12', '2024-07-04 19:45:44', 99, 'cQs1bz8L67uqW2HJnV6684ce701c9287.16006378'),
(4, 'Hiburan', 'fa-solid fa-dice', '2024-07-03 12:53:38', '2024-07-03 12:53:38', 99, 'nwiYAV37vM694DTxup6684d9522ab2a5.92191891'),
(5, 'Belanja', 'fa-solid fa-bag-shopping', '2024-07-03 13:00:23', '2024-07-03 13:00:23', 99, 'XG0v9Kyxi512DapkSJ6684dae72c5318.89789212'),
(6, 'Hadiah', 'fa-solid fa-gift', '2024-07-03 13:02:34', '2024-07-03 13:02:34', 99, 'XbuPqgN08U9Oc26fjA6684db6aa94c51.12710816');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kebutuhan`
--

CREATE TABLE `tb_kebutuhan` (
  `id` int NOT NULL,
  `kebutuhan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tanggal_pakai` date NOT NULL,
  `tanggal_habis` date NOT NULL,
  `periode` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_dompet` int NOT NULL,
  `id_user` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kebutuhan`
--

INSERT INTO `tb_kebutuhan` (`id`, `kebutuhan`, `harga`, `catatan`, `created_at`, `updated_at`, `tanggal_pakai`, `tanggal_habis`, `periode`, `status`, `id_dompet`, `id_user`, `slug`) VALUES
(1, 'Perawatan rambut', 200000, 'shampoo, conditioner, hair tonic, serum, hair vitamin', '0000-00-00', NULL, '0000-00-00', '0000-00-00', 'Saturday, 2023-11-11 18:29:31', 0, 4, 99, ''),
(3, 'Bensin 1Bln', 250000, 'uang 250k untuk 1 bulan', '0000-00-00', '2024-01-21 13:12:39', '0000-00-00', '0000-00-00', 'Sunday, 2024-01-21 13:12:21', 0, 3, 99, ''),
(6, 'Kasih ortu', 500000, 'berikan uang kepada ortu 1 bulan sekali', '0000-00-00', NULL, '0000-00-00', '0000-00-00', 'Saturday, 2023-11-11 18:32:50', 0, 2, 99, ''),
(7, 'Wifi bulanan', 250000, 'berlangganan di myrepublic', '2024-02-04', '2024-02-04 15:16:07', '0000-00-00', '0000-00-00', '', 1, 0, 99, ''),
(8, 'Wi-Fi', 250000, 'Berlangganan di ISP MyRepublic', '2024-03-23', '2024-03-23 19:48:00', '0000-00-00', '0000-00-00', '', 1, 0, 3, ''),
(10, 'Natur Shampoo', 46000, 'percobaan', '2024-04-28', '2024-04-28 16:27:15', '0000-00-00', '0000-00-00', '2024-04-28 16:25', 0, 0, 99, ''),
(11, 'Natur Tonik', 36150, 'percobaan', '2024-04-28', '2024-04-28 19:12:55', '0000-00-00', '0000-00-00', '2024-04-28 19:12', 1, 0, 99, ''),
(12, 'Ganti oli', 80000, 'percobaan', '2024-05-04', '2024-05-04 11:28:02', '0000-00-00', '0000-00-00', 'Saturday, 2024-05-04 11:20:18', 0, 12, 99, ''),
(13, 'Wi-Fi', 250000, 'percobaan', '2024-05-04', '2024-05-04 11:20:17', '0000-00-00', '0000-00-00', '2024-05-04 11:19', 1, 1, 99, ''),
(14, 'Wi-Fi', 250000, 'berlangganan di myrepublic', '2024-06-01', '2024-06-01 11:06:34', '0000-00-00', '0000-00-00', '2024-06-25 16:04', 1, 6, 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lamapenggunaan`
--

CREATE TABLE `tb_lamapenggunaan` (
  `id` int NOT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_penggunaan` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lamapenggunaan`
--

INSERT INTO `tb_lamapenggunaan` (`id`, `nama_barang`, `catatan`, `tanggal_mulai`, `tanggal_selesai`, `status_penggunaan`, `created_at`, `updated_at`, `slug`, `id_user`) VALUES
(1, 'Shampoo', 'gunakanlah secukupnya, jangan boros', '2023-11-08', '2024-05-25', 1, NULL, '2024-05-25 15:15:45', '', 99),
(2, 'Sabun muka', 'pond\'s men acne solution (acne defense + oil fighter facial foam)', '2023-11-01', '2023-11-23', 1, NULL, NULL, '', 99),
(4, 'Hatomugi', 'Skin conditioner (pelembap muka)', '2024-02-20', '2024-05-25', 1, '2024-02-20 12:00:48', '2024-05-25 15:18:44', '', 99),
(5, 'sabun muka', 'percobaan nanti di hapus', '2024-03-24', '0000-00-00', 0, '2024-03-24 16:15:00', '2024-03-24 16:15:00', '', 3),
(7, 'Natur Shampoo', 'tes', '2024-05-25', '0000-00-00', 0, '2024-05-25 15:15:18', '2024-05-25 15:15:18', '', 99),
(8, 'Hatomugi (skin conditioner toner)', 'biasa beli di shopee', '2024-05-27', '0000-00-00', 0, '2024-05-30 12:44:25', '2024-05-30 12:44:25', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logaktivitas`
--

CREATE TABLE `tb_logaktivitas` (
  `id` int NOT NULL,
  `log_aktivitas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int NOT NULL,
  `id_dompet` int NOT NULL,
  `ke_iddompet` int NOT NULL,
  `id_piutang` int NOT NULL,
  `id_user` int NOT NULL,
  `biaya_tf` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_logaktivitas`
--

INSERT INTO `tb_logaktivitas` (`id`, `log_aktivitas`, `jumlah`, `tanggal`, `catatan`, `created_at`, `updated_at`, `status`, `id_dompet`, `ke_iddompet`, `id_piutang`, `id_user`, `biaya_tf`, `slug`) VALUES
(1, 'Bensin', 29000, '2023-11-01', 'beli bensin di pertamina sayang2', '0000-00-00', NULL, 0, 3, 0, 0, 99, 0, ''),
(2, 'Geprek', 10000, '2023-11-01', 'utk makan malam', '0000-00-00', NULL, 0, 3, 0, 0, 99, 0, ''),
(3, 'Pulsa Listrik sebulan', 53500, '2023-10-31', 'pulsa listrik utk sebulan', '0000-00-00', NULL, 0, 1, 0, 0, 99, 0, ''),
(4, 'beli shampoo', 54000, '2023-11-06', 'belum kebeli hair tonic', '0000-00-00', NULL, 0, 2, 0, 0, 99, 0, ''),
(5, 'bahan salad buah', 72000, '2023-11-07', 'mayones, yogurt, susu kental manis, keju, buah melon', '0000-00-00', NULL, 0, 3, 0, 0, 99, 0, ''),
(7, 'Bayar WI-FI', 220000, '2023-11-11', 'langganan wifi dari iconnet', '0000-00-00', NULL, 4, 1, 0, 0, 99, 0, ''),
(8, 'Perawatan rambut', 200000, '2023-11-11', 'shampoo, conditioner, hair tonic, serum, hair vitamin', '0000-00-00', NULL, 4, 4, 0, 0, 99, 0, ''),
(9, 'Kasih ortu', 500000, '2023-11-11', 'berikan uang kepada ortu 1 bulan sekali', '0000-00-00', NULL, 4, 2, 0, 0, 99, 0, ''),
(10, 'Buku 48 Law of Power', 118500, '2023-11-11', 'Jangan lupa membeli buku ini', '0000-00-00', NULL, 3, 2, 0, 0, 99, 0, ''),
(11, 'Processor Intel Core I5-3470', 240000, '2023-11-11', 'Untuk membuat server baru', '0000-00-00', NULL, 3, 2, 0, 0, 99, 0, ''),
(12, 'bahan grill', 150000, '2023-11-12', 'sosis, daging ayam, daging sapi, jamur enoki', '0000-00-00', NULL, 0, 2, 0, 0, 99, 0, ''),
(13, 'beli bakso, natur hair tonic', 51000, '2023-11-13', 'beli bakso pong 15k, ganti uang ke dani 36k', '0000-00-00', NULL, 0, 2, 0, 0, 99, 0, ''),
(14, 'bensin', 30000, '2023-11-14', 'beli bensin full', '0000-00-00', NULL, 0, 2, 0, 0, 99, 0, ''),
(15, 'Beli geprek', 20000, '2023-11-15', 'geprek 2 + nasi, beli di belencong', '0000-00-00', NULL, 0, 3, 0, 0, 99, 0, ''),
(16, 'Duren 2', 25000, '2023-11-15', 'Duren sudah cukup utk dibeli', '0000-00-00', NULL, 0, 3, 0, 0, 99, 0, ''),
(17, 'pulsa listrik', 53500, '2023-11-25', 'pulsa listrik utk sebulan (75.40 kWh)', '2023-11-26', '2023-11-26 09:49:43', 0, 1, 0, 0, 99, 0, ''),
(18, 'Beli bensin', 31000, '2024-01-15', 'pembelian bensin bulan januari yang pertama', '2024-01-15', '2024-01-15 22:04:44', 0, 2, 0, 0, 99, 0, ''),
(19, 'Beli makanan', 25000, '2024-01-17', 'pembelian makanan pertama di bulan januari 2024', '2024-01-17', '2024-01-17 10:24:20', 0, 2, 0, 0, 99, 0, ''),
(20, 'Beras 15Kg', 240000, '2024-01-17', 'dipakai untuk sebulan', '2024-01-17', '2024-01-17 10:25:27', 4, 2, 0, 0, 99, 0, ''),
(21, 'Pulsa', 101500, '2024-01-17', 'Langsung beli paket internet/ kuota', '2024-01-17', '2024-01-17 21:57:16', 0, 1, 0, 0, 99, 0, ''),
(22, 'Transfer', 200000, '2024-01-18', 'transfer', '2024-01-18', '2024-01-18 15:36:27', 2, 2, 0, 0, 99, 0, ''),
(23, 'Transfer', 100000, '2024-01-18', 'transfer ke bca', '2024-01-18', '2024-01-18 15:40:11', 2, 2, 0, 0, 99, 0, ''),
(24, 'Transfer', 150000, '2024-01-18', 'tarik tunai', '2024-01-18', '2024-01-18 15:44:08', 2, 1, 0, 0, 99, 0, ''),
(25, 'Transfer', 200000, '2024-01-18', 'transfer ke bca', '2024-01-18', '2024-01-18 15:46:54', 2, 2, 4, 0, 99, 2500, ''),
(26, 'tarik kabel', 75000, '2024-01-20', 'biaya tarik kabel teknisi wifi myrepublic', '2024-01-20', '2024-01-20 15:39:39', 0, 3, 0, 0, 99, 0, ''),
(27, 'bonus', 300000, '2024-01-20', 'bonus bulan januari', '2024-01-20', '2024-01-20 15:48:50', 1, 1, 0, 0, 99, 0, ''),
(28, 'bonus', 300000, '2024-01-20', 'bonus bulan januari', '2024-01-20', '2024-01-20 15:49:44', 0, 1, 0, 0, 99, 0, ''),
(29, 'bonus', 300000, '2024-01-20', 'bonus bulan januari', '2024-01-20', '2024-01-20 15:51:22', 1, 1, 0, 0, 99, 0, ''),
(30, 'Transfer', 100000, '2024-01-20', 'transfer ke bca', '2024-01-20', '2024-01-20 16:36:23', 2, 2, 4, 0, 99, 0, ''),
(31, 'Bensin 1Bln', 250000, '2024-01-21', 'uang 250k untuk 1 bulan', '2024-01-21', '2024-01-21 13:12:39', 4, 1, 0, 0, 99, 0, ''),
(32, 'beli pulsa', 193000, '2024-01-28', 'utk beli kuota', '2024-01-28', '2024-01-28 21:49:02', 0, 1, 0, 0, 99, 0, ''),
(33, 'pulsa listrik', 53500, '2024-01-27', 'listrik untuk sebulan', '2024-01-28', '2024-01-28 21:51:25', 0, 1, 0, 0, 99, 0, ''),
(34, 'Beli pop mie(2)', 55000, '2024-01-30', 'tambahan ultramilk(2), sosis kenzler(2), yakult(1)', '2024-01-31', '2024-01-31 12:31:11', 0, 3, 0, 0, 99, 0, ''),
(35, 'bensin + isi angin', 40000, '2024-01-31', 'bulan ini', '2024-02-01', '2024-02-01 12:11:14', 0, 3, 0, 0, 99, 0, ''),
(36, 'ticket kolam + konsumsi', 90000, '2024-02-03', 'masuk kolam nirwana + beli sosis 4 (1 sosis 10k)', '2024-02-03', '2024-02-03 17:25:42', 0, 2, 0, 0, 99, 0, ''),
(37, 'ichi ocha + cukur rambut', 95000, '2024-02-03', 'promo ichi ocha di gede + cukur di gunungsari', '2024-02-03', '2024-02-03 17:28:01', 0, 2, 0, 0, 99, 0, ''),
(38, 'bensin', 30000, '2024-02-06', 'habis dari lotim', '2024-02-06', '2024-02-06 15:36:37', 0, 2, 0, 0, 99, 0, ''),
(39, 'belanja di indomaret', 22000, '2024-02-09', 'pop mie+sosis+susu', '2024-02-09', '2024-02-09 21:43:24', 0, 2, 0, 0, 99, 0, ''),
(42, 'Piutang', 500000, '2024-02-09', 'cicil dulu bos', '2024-02-09', '2024-02-09 23:54:02', 5, 1, 0, 0, 99, 0, ''),
(45, 'geprek + nasgor', 44000, '2024-02-17', 'geprek 2, nasgor 2', '2024-02-17', '2024-02-17 22:23:54', 0, 2, 0, 0, 99, 0, ''),
(46, 'pulsa listrik', 53000, '2024-02-17', 'lebih hemat lagi', '2024-02-17', '2024-02-17 22:24:36', 0, 2, 0, 0, 99, 0, ''),
(47, 'bayar teknisi myrepublic', 150000, '2024-02-19', 'tarik kabel + biaya kabel', '2024-02-19', '2024-02-19 17:17:04', 0, 2, 0, 0, 99, 0, ''),
(48, 'Jajan alfmart', 44000, '2024-02-19', 'sedak untuk teknisi myrepublic', '2024-02-19', '2024-02-19 17:18:40', 0, 2, 0, 0, 99, 0, ''),
(49, 'beli sikat + air minum 2', 25000, '2024-02-28', 'lebih hemat lagi', '2024-02-29', '2024-02-29 21:48:19', 0, 2, 0, 0, 99, 0, ''),
(50, 'sabun muka + sabun mandi', 60000, '2024-02-29', 'kafh + biore body wash', '2024-02-29', '2024-02-29 21:52:57', 0, 2, 0, 0, 99, 0, ''),
(52, 'For bukber', 300000, '2024-03-18', 'lebih hemat lagi (nombok dulu)', '2024-03-23', '2024-03-23 12:51:03', 0, 1, 0, 0, 99, 0, ''),
(53, 'Transfer', 1000000, '2024-03-10', 'ingat untuk setor tunai lagi sebesar 1jt', '2024-03-23', '2024-03-23 13:19:03', 2, 2, 3, 0, 99, 0, ''),
(54, 'kuota', 35000, '2024-03-24', 'percobaan nanti di hapus', '2024-03-24', '2024-03-24 12:21:12', 0, 6, 0, 0, 3, 0, ''),
(55, 'Piutang', 1500000, '2024-03-24', 'percobaan nanti di hapus', '2024-03-24', '2024-03-24 16:41:05', 6, 6, 0, 0, 3, 0, ''),
(56, 'Piutang', 500000, '2024-03-24', 'cicil 1', '2024-03-24', '2024-03-24 16:48:32', 5, 6, 0, 0, 3, 0, ''),
(57, 'Belanja di alfamart', 80000, '2024-03-24', 'mie 4 + susu ultra milk + 3 coki-coki', '2024-03-25', '2024-03-25 09:26:56', 0, 6, 0, 0, 3, 0, ''),
(58, 'Bayar Wi-Fi', 250000, '2024-03-25', 'MyRepublic angsuran ke 2', '2024-03-25', '2024-03-25 21:34:58', 0, 6, 0, 0, 3, 0, ''),
(59, 'Belanja di alfamart', 30000, '2024-03-25', 'alfan(yakult+nextstar), ifan(ultramilk) + parkir', '2024-03-25', '2024-03-25 21:38:19', 0, 6, 0, 0, 3, 0, ''),
(60, 'Bensin', 30000, '2024-03-26', 'full, beli di pom bensin kekalik', '2024-03-26', '2024-03-26 21:07:07', 0, 6, 0, 0, 3, 0, ''),
(61, 'beli kuota', 43000, '2024-03-26', '12GB XL (16500+26500)', '2024-03-27', '2024-03-27 14:09:29', 0, 6, 0, 0, 3, 0, ''),
(62, 'pulsa listrik', 53500, '2024-03-30', 'bulan Maret, lebih hemat lagi menggunakan listrik', '2024-04-02', '2024-04-02 20:03:48', 0, 6, 0, 0, 3, 0, ''),
(63, 'beli baju', 80000, '2024-04-02', 'lebih hemat lagi', '2024-04-02', '2024-04-02 20:05:28', 0, 6, 0, 0, 3, 0, ''),
(64, 'Beli celana', 70000, '2024-04-05', 'Celana utk sehari-hari', '2024-04-06', '2024-04-06 13:41:47', 0, 6, 0, 0, 3, 0, ''),
(65, 'Jajan', 60000, '2024-04-05', 'Susu di alfamart + bakso jenefer', '2024-04-06', '2024-04-06 13:43:42', 0, 6, 0, 0, 3, 0, ''),
(66, 'Mie goreng ayam geprek', 50000, '2024-04-06', 'pesen di grab (klo bisa lebih hemat lagi contoh: buat sendiri)', '2024-04-06', '2024-04-06 23:31:29', 0, 6, 0, 0, 3, 0, ''),
(67, 'tes', 10000, '2023-04-04', 'tes, nanti hapus', '2024-04-07', '2024-04-07 15:57:37', 0, 6, 0, 0, 3, 0, ''),
(69, 'Piutang', 100000, '2024-04-08', 'cicil dikit dulu', '2024-04-08', '2024-04-08 21:49:06', 5, 6, 0, 0, 3, 0, ''),
(70, 'Piutang', 500000, '2024-04-13', 'lunas', '2024-04-13', '2024-04-13 12:19:13', 5, 4, 0, 0, 99, 0, ''),
(71, 'Piutang', 2000000, '2024-04-08', 'Gadai motor', '2024-04-15', '2024-04-15 00:31:38', 6, 7, 0, 0, 3, 0, ''),
(72, 'Piutang', 1000000, '2024-04-14', 'Usaha cabai', '2024-04-15', '2024-04-15 00:33:11', 6, 7, 0, 0, 3, 0, ''),
(73, 'Transfer', 1000000, '2024-04-16', 'CIMB(1.500.000)->BRI(1.500.000)->Cash(1.000.000)', '2024-04-16', '2024-04-16 21:53:26', 2, 2, 3, 0, 99, 0, ''),
(74, 'Beli pomade', 73500, '2024-04-16', 'Add on : ultra milk, popmie 3, yakult, nipis madu', '2024-04-16', '2024-04-16 21:55:13', 0, 3, 0, 0, 99, 0, ''),
(75, 'Piutang', 500000, '2024-04-18', 'akan segera diganti', '2024-04-18', '2024-04-18 18:19:58', 6, 7, 0, 0, 3, 0, ''),
(76, 'pulsa listrik', 53000, '2024-04-21', 'lebih hemat lagi dalam menggunakan listrik', '2024-04-23', '2024-04-23 10:50:57', 0, 2, 0, 0, 99, 0, ''),
(77, 'geprek', 16000, '2024-04-22', '2 geprek + 2 sambal', '2024-04-23', '2024-04-23 10:58:53', 0, 3, 0, 0, 99, 0, ''),
(78, 'obat', 26000, '2024-04-22', 'obat gatal untuk amak', '2024-04-23', '2024-04-23 11:07:30', 0, 3, 0, 0, 99, 0, ''),
(79, 'bayar wi-fi', 250000, '2024-04-23', 'berlangganan di myrepublic', '2024-04-23', '2024-04-23 22:23:06', 0, 3, 0, 0, 99, 0, ''),
(80, 'belanja alfamart', 42000, '2024-04-23', 'susu ultramilk (1L) + mie sedap (1) + susu ultramilk (kecil) + nexstar (1)', '2024-04-23', '2024-04-23 22:25:58', 0, 3, 0, 0, 99, 0, ''),
(81, 'bayar tilang', 100000, '2024-04-25', 'polisi lagi cari uang tambahan', '2024-04-26', '2024-04-26 23:06:12', 0, 3, 0, 0, 99, 0, ''),
(82, 'Bensin', 30000, '2024-04-25', 'habis dari lotim', '2024-04-26', '2024-04-26 23:10:35', 0, 3, 0, 0, 99, 0, ''),
(83, 'Gaji', 2877685, '2024-04-27', 'Gaji bulan April', '2024-04-27', '2024-04-27 00:11:45', 1, 6, 0, 0, 3, 0, ''),
(84, 'Gaji', 5000000, '2024-04-27', 'Gaji bulan April', '2024-04-27', '2024-04-27 16:03:01', 1, 1, 0, 0, 99, 0, ''),
(85, 'Natur Shampoo', 46000, '2024-04-28', 'percobaan', '2024-04-28', '2024-04-28 16:27:15', 4, 3, 0, 0, 99, 0, ''),
(86, 'Natur Tonik', 36150, '2024-04-28', 'percobaan', '2024-04-28', '2024-04-28 19:12:55', 4, 3, 0, 0, 99, 0, ''),
(87, 'Piutang', 50000, '2024-04-29', 'percobaan', '2024-04-29', '2024-04-29 07:29:54', 6, 0, 0, 0, 99, 0, ''),
(88, 'Piutang', 50000, '2024-04-29', 'percobaan', '2024-04-29', '2024-04-29 07:38:52', 6, 0, 0, 0, 99, 0, ''),
(89, 'Piutang', 100000, '2024-04-29', 'percobaan', '2024-04-29', '2024-04-29 15:41:42', 6, 0, 0, 0, 99, 0, ''),
(90, 'Ganti oli', 80000, '2024-05-04', 'percobaan', '2024-05-04', '2024-05-04 11:28:02', 4, 2, 0, 0, 99, 0, ''),
(91, 'beli pisang keju', 15000, '2024-05-27', 'lebih hemat lagi', '2024-05-28', '2024-05-28 19:15:30', 0, 6, 0, 0, 3, 0, ''),
(92, 'Piutang', 1000000, '2024-05-30', 'Langsung bayar lunas', '2024-05-30', '2024-05-30 13:45:20', 5, 6, 0, 0, 3, 0, ''),
(93, 'pulsa three', 30000, '2024-05-27', 'sementara pake kartu alfin', '2024-05-30', '2024-05-30 21:20:34', 0, 6, 0, 0, 3, 0, ''),
(94, 'belanja di alfamart', 60000, '2024-05-30', 'mie 4 + ultramilk + yakult + nexstar + floridina + pocari + larutan', '2024-05-30', '2024-05-30 21:24:35', 0, 6, 0, 0, 3, 0, ''),
(95, 'bensin', 28000, '2024-05-31', 'isi full', '2024-06-01', '2024-06-01 10:57:10', 0, 6, 0, 0, 3, 0, ''),
(96, 'belanja', 30000, '2024-06-02', 'obat amak, mie 3, pisang keju', '2024-06-03', '2024-06-03 20:22:41', 0, 6, 0, 0, 3, 0, ''),
(97, 'beli buku', 313500, '2024-06-03', 'bicara itu ada seninya (79k), attitude is everything (89k), psychology of money (85k), psychology of', '2024-06-03', '2024-06-03 20:39:57', 0, 6, 0, 0, 3, 0, ''),
(98, 'beli mouse', 75000, '2024-06-04', 'beli di happy computer (mouse wireless)', '2024-06-06', '2024-06-06 11:58:31', 0, 6, 0, 0, 3, 0, ''),
(99, 'bensin', 28000, '2024-06-05', 'lebih hemat lagi', '2024-06-06', '2024-06-06 11:59:13', 0, 6, 0, 0, 3, 0, ''),
(100, 'print BA', 12000, '2024-06-06', 'pengeluaran yang opsional', '2024-06-06', '2024-06-06 16:54:33', 0, 6, 0, 0, 3, 0, ''),
(101, 'Beli ayam geprek', 10000, '2024-06-06', 'tidak dikasih sambel (beli di deket alfamart keri)', '2024-06-06', '2024-06-06 21:50:25', 0, 6, 0, 0, 3, 0, ''),
(102, 'kebutuhan grill', 99500, '2024-06-08', 'sosis yona 1kg + saus delmonte hot + jamur enoki', '2024-06-10', '2024-06-10 09:41:10', 0, 6, 0, 0, 3, 0, ''),
(103, 'bensin', 25000, '2024-06-08', 'bensin untuk ke klu (bayan)', '2024-06-10', '2024-06-10 09:42:33', 0, 6, 0, 0, 3, 0, ''),
(104, 'kelengkapan tambahan grill', 50500, '2024-06-08', 'air 2 (1500ml) +tisu paseo (250 sheet) + pikopi', '2024-06-10', '2024-06-10 09:48:57', 0, 6, 0, 0, 3, 0, ''),
(105, 'tiket masuk sendang gile', 20000, '2024-06-09', '1 orang 10000', '2024-06-10', '2024-06-10 09:55:09', 0, 6, 0, 0, 3, 0, ''),
(106, 'beli jajan', 76300, '2024-06-09', 'ultramilk (1L) + es krim 2 + air mineral (1.5L) + larutan + jajan 2', '2024-06-10', '2024-06-10 10:01:06', 0, 6, 0, 0, 3, 0, ''),
(107, 'bensin', 20000, '2024-06-09', 'buat balik ke kekeri (rumah)', '2024-06-10', '2024-06-10 10:01:55', 0, 6, 0, 0, 3, 0, ''),
(108, 'Transfer', 11000000, '2024-06-10', 'for aset', '2024-06-12', '2024-06-12 10:08:59', 2, 7, 6, 0, 3, 0, ''),
(109, 'Beli tanah', 23000000, '2024-06-10', 'tanah seluas 1.5are (aset kedepannya)', '2024-06-12', '2024-06-12 10:11:32', 0, 6, 0, 0, 3, 0, ''),
(110, 'pulsa listrik', 53000, '2024-06-28', '75.20 kWh', '2024-06-28', '2024-06-28 10:10:51', 0, 6, 0, 0, 3, 0, ''),
(111, 'gaji', 2881440, '2024-06-27', 'gaji periode juni, tgl gajian 27', '2024-06-28', '2024-06-28 10:14:07', 1, 6, 0, 0, 3, 0, ''),
(112, 'bensin', 48000, '2024-07-01', 'pertamax, beli di lotim pas pergi visit', '2024-07-04', '2024-07-04 20:50:58', 0, 6, 0, 0, 3, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_loginventory`
--

CREATE TABLE `tb_loginventory` (
  `id` int NOT NULL,
  `nama_inventory` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status_inventory` int NOT NULL,
  `status_periode` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penghitungperiode`
--

CREATE TABLE `tb_penghitungperiode` (
  `id` int NOT NULL,
  `nama_aktivitas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_penghitung` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penghitungperiode`
--

INSERT INTO `tb_penghitungperiode` (`id`, `nama_aktivitas`, `catatan`, `tanggal_mulai`, `tanggal_selesai`, `status_penghitung`, `created_at`, `updated_at`, `slug`, `id_user`) VALUES
(1, 'Panjangin rambut', 'sudah dirapikan (mulai panjangkan lagi utk di mullet)', '2023-12-30', '2024-05-25', 1, NULL, '2024-05-25 15:51:40', '', 99),
(3, 'pulsa listrik habis', 'kWh 75.40', '2023-11-25', '2023-11-30', 1, NULL, NULL, '', 99),
(4, 'pulsa listrik habis', 'untuk menghitung kapan pulsa listrik habis', '2024-03-24', '2024-06-06', 1, '2024-03-24 15:59:31', '2024-06-06 12:06:26', '', 3),
(5, 'Pulsa Listrik', '75.6 Kwh', '2024-05-01', '0000-00-00', 0, '2024-05-25 16:01:57', '2024-05-25 16:01:57', '', 99),
(6, 'Periode pulsa listrik', 'kWh 75.20', '2024-06-06', '2024-06-28', 1, '2024-06-06 12:05:43', '2024-06-28 10:06:13', '', 3),
(7, 'rambut panjang', 'hitung periode kira2 butuh berapa hari rambut jadi panjang', '2024-06-11', '0000-00-00', 0, '2024-06-12 10:06:11', '2024-06-12 10:06:11', '', 3),
(8, 'pulsa listrik habis', '75.20 kWh', '2024-06-28', '0000-00-00', 0, '2024-06-28 10:06:36', '2024-06-28 10:06:36', '', 3),
(9, 'No', 'no deskripsi', '2024-06-30', '0000-00-00', 0, '2024-07-04 20:53:36', '2024-07-04 20:53:36', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_piutang`
--

CREATE TABLE `tb_piutang` (
  `id` int NOT NULL,
  `nama_peminjam` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` int NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `catatan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `id_dompet` int NOT NULL,
  `id_user` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_piutang`
--

INSERT INTO `tb_piutang` (`id`, `nama_peminjam`, `nominal`, `tanggal_pinjam`, `catatan`, `status`, `id_dompet`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Saburo Uzumaki', 3500000, '2023-12-02 03:27:07', 'Butuh banget', 1, 1, 99, '2023-12-02 03:27:07', '2023-12-02 03:27:07'),
(2, 'Uzumaki Boruso', 500000, '2023-12-02 04:11:46', 'Utk beli hp', 1, 2, 99, '2023-12-02 04:11:46', '2023-12-02 04:11:46'),
(3, 'Roronoa Zoro', 1500000, '2024-02-07 11:14:06', 'beli pedang', 1, 2, 99, '2024-02-07 11:14:06', '2024-02-07 11:14:06'),
(4, 'd Luffy', 2000000, '2024-02-07 23:20:19', 'Beli mera-mera no mi (ace)', 1, 1, 99, '2024-02-07 23:20:45', '2024-05-03 16:52:43'),
(5, 'Tes Piutang', 100000, '2024-02-09 23:32:53', 'percobaan perhitungan cara double', 0, 2, 99, '2024-02-09 23:33:11', '2024-04-17 21:22:04'),
(6, 'Tes 2', 1000000, '2024-02-09 23:36:33', 'tes lagi ygy', 0, 2, 99, '2024-02-09 23:36:51', '2024-04-18 19:05:39'),
(7, 'Saburo Genjo', 1500000, '2024-03-24 16:39:35', 'percobaan nanti di hapus', 1, 6, 3, '2024-03-24 16:41:05', '2024-03-24 16:41:05'),
(8, 'Tanpa Nama', 2000000, '2024-04-08 14:25:59', 'testing aja', 1, 7, 3, '2024-04-08 14:26:37', '2024-04-08 14:26:37'),
(9, 'B bah', 2000000, '2024-04-08 00:30:47', 'Gadai motor', 1, 7, 3, '2024-04-15 00:31:38', '2024-04-15 00:31:38'),
(10, 'Rizal mus', 1000000, '2024-04-14 00:00:00', 'Usaha cabai', 0, 7, 3, '2024-04-15 00:33:11', '2024-05-30 13:46:08'),
(11, 'Maman Kamal', 500000, '2024-04-18 18:10:51', 'akan segera diganti', 1, 7, 3, '2024-04-18 18:19:58', '2024-04-18 18:19:58'),
(12, 'tes dua', 50000, '2024-04-29 07:28:01', 'percobaan', 1, 0, 99, '2024-04-29 07:29:54', '2024-04-29 07:29:54'),
(13, 'tes dua', 50000, '2024-04-29 07:38:34', 'percobaan', 1, 0, 99, '2024-04-29 07:38:52', '2024-04-29 07:38:52'),
(14, 'tes tiga', 200000, '2024-04-29 15:40:55', 'percobaan', 1, 0, 99, '2024-04-29 15:41:42', '2024-05-03 17:05:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rencana`
--

CREATE TABLE `tb_rencana` (
  `id` int NOT NULL,
  `rencana` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rencana`
--

INSERT INTO `tb_rencana` (`id`, `rencana`, `catatan`, `status`, `created_at`, `updated_at`, `slug`, `id_user`) VALUES
(1, 'Buat casing PC', 'dibuat dengan bahan kayu (stik eskrim) dan ditaruh dibawah meja', 0, '2023-11-26 11:21:28', '2023-11-26 11:35:14', '', 99),
(3, 'membuat web portfolio', 'selesaikan project2 kecil untuk di masukkan ke dalam portfolio', 0, '2023-11-26 15:38:37', '2023-11-26 15:38:37', '', 99),
(4, 'Buat home server', 'kumpulkan dana untuk beli PC lagi satu utk dijadikan home server', 0, '2024-01-28 23:18:49', '2024-01-28 23:18:49', '', 99),
(5, 'beli  kebutuhan olahraga', 'celana training / jogging + baju, sepatu training atau running', 0, '2024-01-28 23:21:13', '2024-01-28 23:21:13', '', 99),
(6, 'Buat NAS', 'menggunakan stb bekas', 0, '2024-03-24 15:45:04', '2024-03-24 15:45:04', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayatgaji`
--

CREATE TABLE `tb_riwayatgaji` (
  `id` int NOT NULL,
  `id_gaji` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_riwayatgaji`
--

INSERT INTO `tb_riwayatgaji` (`id`, `id_gaji`, `id_user`, `tanggal`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 0, '2023-11-28 16:53:47', 1, '2023-11-28 16:53:47', '2023-11-28 16:53:47', '.a~sDZk20n1+>OE96565aa9b222dc4.02536523'),
(2, 1, 0, '2023-11-28 16:53:54', 1, '2023-11-28 16:53:54', '2023-11-28 16:53:54', 'vD02l\'s9,?7)CXUg6565aaa2059364.34277058'),
(3, 7, 3, '2024-04-27 00:11:45', 0, '2024-04-27 00:11:45', '2024-04-27 00:11:45', ''),
(4, 6, 99, '2024-04-27 16:03:01', 0, '2024-04-27 16:03:01', '2024-04-27 16:03:01', 'Q3Bxz51YaJ9kDeV4fl662cb13540e2c7.54662641');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayatp`
--

CREATE TABLE `tb_riwayatp` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_riwayat` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_target`
--

CREATE TABLE `tb_target` (
  `id` int NOT NULL,
  `target` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cost` int NOT NULL,
  `tanggal_mulai` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_selesai` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `id_dompet` int NOT NULL,
  `id_user` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_target`
--

INSERT INTO `tb_target` (`id`, `target`, `cost`, `tanggal_mulai`, `tanggal_selesai`, `catatan`, `created_at`, `updated_at`, `status`, `id_dompet`, `id_user`, `slug`) VALUES
(1, 'Processor Intel Core I5-3470', 240000, 'Minggu, 2023-10-29 13:38:40', 'Saturday, 2023-11-11 23:51:43', 'Untuk membuat server baru', '0000-00-00', NULL, 0, 2, 99, ''),
(2, 'Buku 48 Law of Power', 118500, 'Rabu, 2023-10-18 16:45:13', 'Saturday, 2023-11-11 23:47:22', 'Jangan lupa membeli buku ini', '0000-00-00', NULL, 0, 2, 99, ''),
(4, 'Salad buah', 100000, 'Minggu, 2023-11-11 23:52:04', '', 'mau buat salad buah ukuran jumbo', '0000-00-00', NULL, 1, 0, 99, ''),
(5, 'Beli harddisk', 250000, 'Saturday, 2024-03-23 23:00:42', '', 'untuk buat server NAS', '2024-03-23', '2024-03-23 23:00:56', 1, 0, 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_todolist`
--

CREATE TABLE `tb_todolist` (
  `id` int NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_todolist`
--

INSERT INTO `tb_todolist` (`id`, `title`, `deskripsi`, `tanggal`, `created_at`, `updated_at`, `slug`, `id_user`) VALUES
(1, 'Membaca buku', 'buku atomic habits hal 180 an (minimal 1 lembar)', '0000-00-00 00:00:00', '2023-11-28 12:36:47', '2023-11-28 13:00:18', '5gh7!;CNcE61W[x`65656e5f7f5ba6.35881135', 99),
(8, 'Ngoding', 'minimal ketik 1 baris code', '2023-12-01 20:29:08', '2023-12-01 20:29:08', '2023-12-01 20:29:08', 'j8;1?OdA:t9o0L`F6569d1942a4b54.97657314', 99),
(10, 'Lari pagi hari', 'selesai sholat subuh di hari minggu, selasa, kamis', '2024-02-12 18:44:52', '2024-02-12 18:44:52', '2024-02-12 18:44:52', 'Jy9H.4l)%B3nq2E_65c9f6a4894925.71791015', 99),
(11, 'Baca buku', 'minimal 15 menit per harinya', '2024-03-24 15:33:40', '2024-03-24 15:33:40', '2024-03-24 15:33:40', 'pU;^a7:A48C3>ikQ65ffd7547f90b5.48755114', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'orenji@gmail.com', 'orenji21', '$2y$10$UKzRWp8Lev2LMb64Fhxz.OkhCtcLBj1o3rxGmUMbdZn0Vb3jhDgLO', '511690f5536565e9b06f9564d45e3204', NULL, '2024-03-12 17:57:12', NULL, NULL, NULL, 1, 0, '2024-03-12 11:13:58', '2024-03-12 16:57:12', NULL),
(2, 'ifansz94@gmail.com', 'ifansz', '$2y$10$dVPu4vLI3ZSvndgCJv4wBekIeJVORHqwHsHtS8CQNwNb/c8SuIFpe', NULL, '2024-03-26 23:44:48', NULL, NULL, NULL, NULL, 1, 0, '2024-03-12 11:48:27', '2024-03-26 23:45:30', NULL),
(3, 'ifanszoro@gmail.com', 'zoro90', '$2y$10$bqyG3Ghob0is3y8auJKsSOMRHaPPz3Y55r8QsoCu2yTeEEIMjMnHi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-03-12 14:02:36', '2024-03-12 14:06:28', NULL),
(4, 'seijurozoro@gmail.com', 'user2', '$2y$10$NHOEaCkMxB/JAloAdz/yuer6CP0fBSf0t.q/gM3Kc8.8R9VQpdJuW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-03-12 17:15:38', '2024-03-12 17:17:18', NULL),
(99, 'tes@gmail.com', 'tes', '$2y$10$i.h0daNwmBzCVGuWoC0/fecuptiYYT9LwKd.dW9EgWqtHpOpG5TC6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-03-26 23:31:32', '2024-03-26 23:31:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_cicilanpiutang`
--
ALTER TABLE `tb_cicilanpiutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_dompet`
--
ALTER TABLE `tb_dompet`
  ADD PRIMARY KEY (`id_dompet`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_icon`
--
ALTER TABLE `tb_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kebutuhan`
--
ALTER TABLE `tb_kebutuhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lamapenggunaan`
--
ALTER TABLE `tb_lamapenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_logaktivitas`
--
ALTER TABLE `tb_logaktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_loginventory`
--
ALTER TABLE `tb_loginventory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penghitungperiode`
--
ALTER TABLE `tb_penghitungperiode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_piutang`
--
ALTER TABLE `tb_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rencana`
--
ALTER TABLE `tb_rencana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_riwayatgaji`
--
ALTER TABLE `tb_riwayatgaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_riwayatp`
--
ALTER TABLE `tb_riwayatp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_target`
--
ALTER TABLE `tb_target`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_todolist`
--
ALTER TABLE `tb_todolist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_cicilanpiutang`
--
ALTER TABLE `tb_cicilanpiutang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_dompet`
--
ALTER TABLE `tb_dompet`
  MODIFY `id_dompet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_icon`
--
ALTER TABLE `tb_icon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kebutuhan`
--
ALTER TABLE `tb_kebutuhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_lamapenggunaan`
--
ALTER TABLE `tb_lamapenggunaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_logaktivitas`
--
ALTER TABLE `tb_logaktivitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `tb_loginventory`
--
ALTER TABLE `tb_loginventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penghitungperiode`
--
ALTER TABLE `tb_penghitungperiode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_piutang`
--
ALTER TABLE `tb_piutang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_rencana`
--
ALTER TABLE `tb_rencana`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatgaji`
--
ALTER TABLE `tb_riwayatgaji`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatp`
--
ALTER TABLE `tb_riwayatp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_target`
--
ALTER TABLE `tb_target`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_todolist`
--
ALTER TABLE `tb_todolist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
