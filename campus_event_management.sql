-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2026 at 10:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_event_managementt`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `action` text DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `role`, `action`, `ip_address`, `created_at`) VALUES
(1, 4, 'staff', 'User logged out', '::1', '2026-09-08 11:40:47'),
(2, 2, 'organizer', 'User logged in', '::1', '2026-09-08 11:40:59'),
(3, 2, 'organizer', 'Created event', '::1', '2026-09-08 11:41:31'),
(4, 2, 'organizer', 'Updated event finance', '::1', '2026-09-08 11:42:05'),
(5, 2, 'organizer', 'User logged out', '::1', '2026-09-08 11:42:29'),
(6, 3, 'admin', 'User logged in', '::1', '2026-09-08 11:42:38'),
(7, 3, 'admin', 'Changed event 1 status to approved', '::1', '2026-09-08 11:42:45'),
(8, 3, 'admin', 'User logged out', '::1', '2026-09-08 11:43:03'),
(9, 1, 'student', 'User logged in', '::1', '2026-09-08 11:43:12'),
(10, 1, 'student', 'Registered event ID 1', '::1', '2026-09-08 11:43:15'),
(11, 1, 'student', 'Cancelled registration ID 1', '::1', '2026-09-08 11:52:26'),
(12, 1, 'student', 'Registered event ID 1', '::1', '2026-09-08 11:52:29'),
(13, 1, 'student', 'User logged out', '::1', '2026-09-08 11:52:48'),
(14, 5, 'student', 'User logged in', '::1', '2026-09-08 11:53:30'),
(15, 5, 'student', 'Registered event ID 1', '::1', '2026-09-08 11:53:39'),
(16, 5, 'student', 'Payment completed and ticket generated for event 1', '::1', '2026-09-08 11:53:56'),
(17, 5, 'student', 'User logged out', '::1', '2026-09-08 11:54:26'),
(18, 4, 'staff', 'User logged in', '::1', '2026-09-08 11:54:38'),
(19, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-08 11:54:43'),
(20, 4, 'staff', 'User logged out', '::1', '2026-09-08 11:55:03'),
(21, 1, 'student', 'User logged in', '::1', '2026-09-08 11:55:12'),
(22, 1, 'student', 'User logged out', '::1', '2026-09-08 11:55:28'),
(23, 5, 'student', 'User logged in', '::1', '2026-09-08 11:55:35'),
(24, 5, 'student', 'User logged out', '::1', '2026-09-08 11:55:48'),
(25, 4, 'staff', 'User logged in', '::1', '2026-09-08 11:55:55'),
(26, 4, 'staff', 'Verified ticket TICKET-6A9FF75447733', '::1', '2026-09-08 11:55:59'),
(27, 4, 'staff', 'User logged out', '::1', '2026-09-08 11:56:44'),
(28, 5, 'student', 'User logged in', '::1', '2026-09-08 11:56:51'),
(29, 5, 'student', 'User logged out', '::1', '2026-09-08 11:56:58'),
(30, 4, 'staff', 'User logged in', '::1', '2026-09-08 11:57:07'),
(31, 4, 'staff', 'User logged out', '::1', '2026-09-08 12:00:28'),
(32, 4, 'staff', 'User logged in', '::1', '2026-09-08 12:00:36'),
(33, 4, 'staff', 'User logged out', '::1', '2026-09-08 12:01:47'),
(34, 4, 'staff', 'User logged in', '::1', '2026-09-08 12:01:54'),
(35, 4, 'staff', 'User logged out', '::1', '2026-09-08 12:02:21'),
(36, 1, 'student', 'User logged in', '::1', '2026-09-08 12:02:32'),
(37, 1, 'student', 'User logged out', '::1', '2026-09-08 12:02:49'),
(38, 4, 'staff', 'User logged in', '::1', '2026-09-08 12:02:56'),
(39, 4, 'staff', 'Verified ticket TICKET-753a434b-ab7b-11f1-8ff7-d843aeafdf82', '::1', '2026-09-08 12:03:01'),
(40, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-08 12:10:08'),
(41, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-08 12:10:15'),
(42, 4, 'staff', 'User logged out', '::1', '2026-09-08 12:10:38'),
(43, 3, 'admin', 'User logged in', '::1', '2026-09-08 12:10:43'),
(44, 3, 'admin', 'User logged in', '::1', '2026-09-08 12:22:13'),
(45, 3, 'admin', 'User logged out', '::1', '2026-09-08 12:24:50'),
(46, 4, 'staff', 'User logged in', '::1', '2026-09-08 12:24:57'),
(47, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-08 12:25:10'),
(48, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-08 12:25:20'),
(49, 4, 'staff', 'Updated payment ID 2 to paid', '::1', '2026-09-08 12:26:59'),
(50, 4, 'staff', 'User logged out', '::1', '2026-09-08 12:27:20'),
(51, 3, 'admin', 'User logged in', '::1', '2026-09-08 12:27:27'),
(52, 3, 'admin', 'Created new user admin2', '::1', '2026-09-08 12:30:41'),
(53, 3, 'admin', 'User logged out', '::1', '2026-09-08 12:30:50'),
(54, 6, 'admin', 'User logged in', '::1', '2026-09-08 12:30:59'),
(55, 6, 'admin', 'User logged out', '::1', '2026-09-08 12:31:30'),
(56, 1, 'student', 'User logged in', '::1', '2026-09-08 12:31:38'),
(57, 1, 'student', 'User logged out', '::1', '2026-09-08 12:32:00'),
(58, 2, 'organizer', 'User logged in', '::1', '2026-09-08 12:32:09'),
(59, 2, 'organizer', 'Updated event ID 1', '::1', '2026-09-08 12:48:37'),
(60, 2, 'organizer', 'User logged out', '::1', '2026-09-08 12:49:14'),
(61, 6, 'admin', 'User logged in', '::1', '2026-09-08 12:54:07'),
(62, 6, 'admin', 'User logged out', '::1', '2026-09-08 12:55:09'),
(63, 1, 'student', 'User logged in', '::1', '2026-09-08 12:55:17'),
(64, 1, 'student', 'User logged out', '::1', '2026-09-08 12:55:39'),
(65, 2, 'organizer', 'User logged in', '::1', '2026-09-08 12:55:46'),
(66, 2, 'organizer', 'User logged out', '::1', '2026-09-08 12:56:03'),
(67, 4, 'staff', 'User logged in', '::1', '2026-09-08 12:56:10'),
(68, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-08 12:56:37'),
(69, 4, 'staff', 'User logged out', '::1', '2026-09-08 12:56:53'),
(70, 4, 'staff', 'User logged in', '::1', '2026-09-09 14:44:50'),
(71, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-09 14:46:14'),
(72, 4, 'staff', 'User logged out', '::1', '2026-09-09 14:46:22'),
(73, 6, 'admin', 'User logged in', '::1', '2026-09-09 14:46:33'),
(74, 6, 'admin', 'User logged out', '::1', '2026-09-09 14:47:39'),
(75, 6, 'admin', 'User logged in', '::1', '2026-09-10 11:13:20'),
(76, 6, 'admin', 'User logged out', '::1', '2026-09-10 11:13:44'),
(77, 1, 'student', 'User logged in', '::1', '2026-09-10 11:13:53'),
(78, 1, 'student', 'User logged out', '::1', '2026-09-10 11:14:14'),
(79, 4, 'staff', 'User logged in', '::1', '2026-09-10 11:14:21'),
(80, 4, 'staff', 'User logged out', '::1', '2026-09-10 11:14:32'),
(81, 2, 'organizer', 'User logged in', '::1', '2026-09-10 11:14:40'),
(82, 2, 'organizer', 'User logged out', '::1', '2026-09-10 11:15:14'),
(83, 4, 'staff', 'User logged in', '::1', '2026-09-10 11:15:21'),
(84, 4, 'staff', 'User logged out', '::1', '2026-09-10 11:19:27'),
(85, 4, 'staff', 'User logged in', '::1', '2026-09-10 11:31:09'),
(86, 4, 'staff', 'User logged out', '::1', '2026-09-10 11:31:14'),
(87, 4, 'staff', 'User logged in', '::1', '2026-09-10 11:39:55'),
(88, 4, 'staff', 'User logged out', '::1', '2026-09-10 11:44:50'),
(89, 4, 'staff', 'User logged in', '::1', '2026-09-10 11:47:06'),
(90, 4, 'staff', 'User logged out', '::1', '2026-09-10 11:47:09'),
(91, 2, 'organizer', 'User logged in', '::1', '2026-09-10 11:51:09'),
(92, 2, 'organizer', 'Created event', '::1', '2026-09-10 11:51:45'),
(93, 2, 'organizer', 'Updated event finance', '::1', '2026-09-10 11:52:12'),
(94, 2, 'organizer', 'Updated event ID 2', '::1', '2026-09-10 11:52:25'),
(95, 2, 'organizer', 'User logged out', '::1', '2026-09-10 11:52:33'),
(96, 6, 'admin', 'User logged in', '::1', '2026-09-10 11:52:51'),
(97, 6, 'admin', 'Changed event 2 status to approved', '::1', '2026-09-10 11:52:57'),
(98, 6, 'admin', 'User logged out', '::1', '2026-09-10 11:53:13'),
(99, 1, 'student', 'User logged in', '::1', '2026-09-10 11:53:21'),
(100, 1, 'student', 'Registered event ID 2', '::1', '2026-09-10 11:53:25'),
(101, 1, 'student', 'Payment completed and ticket generated for event 2', '::1', '2026-09-10 11:53:44'),
(102, 1, 'student', 'User logged out', '::1', '2026-09-10 11:54:08'),
(103, 5, 'student', 'User logged in', '::1', '2026-09-10 11:54:14'),
(104, 5, 'student', 'Registered event ID 2', '::1', '2026-09-10 11:54:18'),
(105, 5, 'student', 'Payment completed and ticket generated for event 2', '::1', '2026-09-10 11:54:34'),
(106, 5, 'student', 'User logged out', '::1', '2026-09-10 11:54:58'),
(107, 4, 'staff', 'User logged in', '::1', '2026-09-10 11:55:06'),
(108, 4, 'staff', 'Created attendance list for event 2', '::1', '2026-09-10 11:55:17'),
(109, 4, 'staff', 'Updated payment ID 4 to paid', '::1', '2026-09-10 11:55:52'),
(110, 4, 'staff', 'Verified ticket TICKET-6AA29A48F2DE1', '::1', '2026-09-10 11:56:07'),
(111, 4, 'staff', 'Verified ticket TICKET-6AA29A7AB7A19', '::1', '2026-09-10 11:56:18'),
(112, 4, 'staff', 'Verified ticket TICKET-6AA29A7AB7A19', '::1', '2026-09-10 11:56:20'),
(113, 4, 'staff', 'User logged out', '::1', '2026-09-10 11:56:55'),
(114, 1, 'student', 'User logged in', '::1', '2026-09-10 11:57:02'),
(115, 1, 'student', 'User logged out', '::1', '2026-09-10 11:57:15'),
(116, 4, 'staff', 'User logged in', '::1', '2026-09-10 12:01:12'),
(117, 4, 'staff', 'User logged out', '::1', '2026-09-10 12:24:20'),
(118, 4, 'staff', 'User logged in', '::1', '2026-09-10 13:52:06'),
(119, 4, 'staff', 'User logged out', '::1', '2026-09-10 13:52:32'),
(120, 6, 'admin', 'User logged in', '::1', '2026-09-10 13:52:38'),
(121, 6, 'admin', 'User logged out', '::1', '2026-09-10 13:53:03'),
(122, 2, 'organizer', 'User logged in', '::1', '2026-09-10 13:53:18'),
(123, 2, 'organizer', 'User logged out', '::1', '2026-09-10 13:54:29'),
(124, 5, 'student', 'User logged in', '::1', '2026-09-10 13:54:40'),
(125, 5, 'student', 'User logged out', '::1', '2026-09-10 13:54:58'),
(127, 6, 'admin', 'User logged out', '::1', '2026-09-11 13:11:49'),
(128, 4, 'staff', 'User logged in', '::1', '2026-09-11 13:11:58'),
(129, 4, 'staff', 'User logged out', '::1', '2026-09-11 13:12:03'),
(130, 1, 'student', 'User logged in', '::1', '2026-09-11 13:12:11'),
(131, 1, 'student', 'User logged out', '::1', '2026-09-11 13:12:14'),
(132, 2, 'organizer', 'User logged in', '::1', '2026-09-11 13:12:23'),
(133, 2, 'organizer', 'User logged out', '::1', '2026-09-11 13:12:27'),
(134, 6, 'admin', 'User logged in', '::1', '2026-09-11 13:27:15'),
(135, 6, 'admin', 'User logged out', '::1', '2026-09-11 13:28:11'),
(136, 1, 'student', 'User logged in', '::1', '2026-09-11 13:43:52'),
(137, 1, 'student', 'User logged out', '::1', '2026-09-11 13:43:55'),
(138, 6, 'admin', 'User logged in', '::1', '2026-09-11 13:48:47'),
(139, 6, 'admin', 'User logged out', '::1', '2026-09-11 13:48:50'),
(140, 4, 'staff', 'User logged in', '::1', '2026-09-11 13:48:58'),
(141, 4, 'staff', 'User logged out', '::1', '2026-09-11 13:49:00'),
(142, 2, 'organizer', 'User logged in', '::1', '2026-09-11 13:49:13'),
(143, 2, 'organizer', 'User logged out', '::1', '2026-09-11 13:49:15'),
(144, 6, 'admin', 'User logged in', '::1', '2026-09-11 13:49:25'),
(145, 6, 'admin', 'User logged out', '::1', '2026-09-11 13:50:13'),
(146, 4, 'staff', 'User logged in', '::1', '2026-09-11 14:37:01'),
(147, 4, 'staff', 'User logged out', '::1', '2026-09-11 14:37:04'),
(148, 4, 'staff', 'User logged in', '::1', '2026-09-11 14:48:49'),
(149, 4, 'staff', 'User logged out', '::1', '2026-09-11 14:48:59'),
(150, 4, 'staff', 'User logged in', '::1', '2026-09-11 14:50:28'),
(151, 4, 'staff', 'User logged out', '::1', '2026-09-11 14:51:07'),
(152, 4, 'staff', 'User logged in', '::1', '2026-09-11 14:51:38'),
(153, 4, 'staff', 'User logged out', '::1', '2026-09-11 14:51:42'),
(154, 4, 'staff', 'User logged in', '::1', '2026-09-11 14:59:35'),
(155, 4, 'staff', 'User logged out', '::1', '2026-09-11 14:59:47'),
(156, 1, 'student', 'User logged in', '::1', '2026-09-11 14:59:54'),
(157, 1, 'student', 'User logged out', '::1', '2026-09-11 15:00:04'),
(158, 4, 'staff', 'User logged in', '::1', '2026-09-11 15:08:44'),
(159, 4, 'staff', 'User logged out', '::1', '2026-09-11 15:10:18'),
(160, 4, 'staff', 'User logged in', '::1', '2026-09-11 16:57:15'),
(161, 4, 'staff', 'User logged out', '::1', '2026-09-11 16:58:30'),
(162, 4, 'staff', 'User logged in', '::1', '2026-09-11 16:58:39'),
(163, 4, 'staff', 'User logged out', '::1', '2026-09-11 16:59:06'),
(164, 4, 'staff', 'User logged in', '::1', '2026-09-11 16:59:15'),
(165, 4, 'staff', 'User logged out', '::1', '2026-09-11 16:59:46'),
(166, 5, 'student', 'User logged in', '::1', '2026-09-11 16:59:55'),
(167, 5, 'student', 'User logged out', '::1', '2026-09-11 16:59:57'),
(168, 4, 'staff', 'User logged in', '::1', '2026-09-11 17:01:16'),
(169, 4, 'staff', 'User logged in', '::1', '2026-09-11 17:02:17'),
(170, 4, 'staff', 'User logged out', '::1', '2026-09-11 17:03:01'),
(171, 4, 'staff', 'User logged in', '::1', '2026-09-11 17:03:19'),
(172, 4, 'staff', 'User logged out', '::1', '2026-09-11 17:03:41'),
(173, 4, 'staff', 'User logged in', '::1', '2026-09-11 17:04:08'),
(174, 4, 'staff', 'User logged out', '::1', '2026-09-11 17:04:15'),
(175, 4, 'staff', 'User logged in', '::1', '2026-09-11 17:04:31'),
(176, 4, 'staff', 'User logged in', '::1', '2026-09-11 17:09:20'),
(177, 4, 'staff', 'User logged out', '::1', '2026-09-11 17:09:48'),
(178, 2, 'organizer', 'User logged in', '::1', '2026-09-11 17:09:56'),
(179, 2, 'organizer', 'User logged out', '::1', '2026-09-11 17:10:16'),
(180, 3, 'admin', 'User logged in', '::1', '2026-09-11 17:10:26'),
(181, 3, 'admin', 'User logged out', '::1', '2026-09-11 17:10:57'),
(182, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:03:26'),
(183, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:03:29'),
(184, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:03:39'),
(185, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:03:42'),
(186, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:03:57'),
(187, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:04:04'),
(188, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:04:35'),
(189, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:04:37'),
(190, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:14:14'),
(191, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:14:18'),
(192, 2, 'organizer', 'User logged in', '::1', '2026-09-12 12:14:26'),
(193, 2, 'organizer', 'Created event', '::1', '2026-09-12 12:14:58'),
(194, 2, 'organizer', 'User logged out', '::1', '2026-09-12 12:15:02'),
(195, 6, 'admin', 'User logged in', '::1', '2026-09-12 12:15:15'),
(196, 6, 'admin', 'Changed event 3 status to approved', '::1', '2026-09-12 12:15:41'),
(197, 6, 'admin', 'User logged out', '::1', '2026-09-12 12:15:49'),
(198, 1, 'student', 'User logged in', '::1', '2026-09-12 12:15:57'),
(199, 1, 'student', 'Registered event ID 3', '::1', '2026-09-12 12:16:01'),
(200, 1, 'student', 'Payment completed and ticket generated for event 3', '::1', '2026-09-12 12:16:19'),
(201, 1, 'student', 'User logged out', '::1', '2026-09-12 12:16:41'),
(202, 5, 'student', 'User logged in', '::1', '2026-09-12 12:16:50'),
(203, 5, 'student', 'Registered event ID 3', '::1', '2026-09-12 12:16:56'),
(204, 5, 'student', 'Payment completed and ticket generated for event 3', '::1', '2026-09-12 12:17:10'),
(205, 5, 'student', 'User logged out', '::1', '2026-09-12 12:17:20'),
(206, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:17:32'),
(207, 4, 'staff', 'Updated payment ID 6 to paid', '::1', '2026-09-12 12:17:40'),
(208, 4, 'staff', 'Verified ticket TICKET-6AA5429347E4E', '::1', '2026-09-12 12:17:52'),
(209, 4, 'staff', 'Verified ticket TICKET-6AA542C64D206', '::1', '2026-09-12 12:18:00'),
(210, 4, 'staff', 'Created attendance list for event 3', '::1', '2026-09-12 12:18:25'),
(211, 4, 'staff', 'Created attendance list for event 3', '::1', '2026-09-12 12:18:31'),
(212, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-12 12:18:48'),
(213, 4, 'staff', 'Verified ticket TICKET-6AA5429347E4E', '::1', '2026-09-12 12:19:50'),
(214, 4, 'staff', 'Verified ticket TICKET-6AA542C64D206', '::1', '2026-09-12 12:19:59'),
(215, 4, 'staff', 'Created attendance list for event 3', '::1', '2026-09-12 12:20:09'),
(216, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:20:45'),
(217, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:27:19'),
(218, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:29:03'),
(219, 4, 'staff', 'User logged in', '::1', '2026-09-12 12:31:04'),
(220, 4, 'staff', 'User logged out', '::1', '2026-09-12 12:36:19'),
(221, 6, 'admin', 'User logged in', '::1', '2026-09-13 06:11:55'),
(222, 6, 'admin', 'User logged out', '::1', '2026-09-13 06:13:41'),
(223, 1, 'student', 'User logged in', '::1', '2026-09-13 06:13:49'),
(224, 1, 'student', 'User logged out', '::1', '2026-09-13 06:14:21'),
(225, 2, 'organizer', 'User logged in', '::1', '2026-09-13 06:14:28'),
(226, 2, 'organizer', 'User logged out', '::1', '2026-09-13 06:15:02'),
(227, 4, 'staff', 'User logged in', '::1', '2026-09-13 06:15:24'),
(228, 4, 'staff', 'User logged out', '::1', '2026-09-13 06:16:36'),
(229, 6, 'admin', 'User logged in', '::1', '2026-09-13 06:17:11'),
(230, 6, 'admin', 'User logged out', '::1', '2026-09-13 06:26:29'),
(231, 6, 'admin', 'User logged in', '::1', '2026-09-13 06:27:55'),
(232, 6, 'admin', 'User logged in', '::1', '2026-09-13 06:30:58'),
(233, 6, 'admin', 'User logged in', '::1', '2026-09-13 06:40:20'),
(234, 6, 'admin', 'User logged out', '::1', '2026-09-13 06:46:07'),
(235, 4, 'staff', 'User logged in', '::1', '2026-09-13 06:46:20'),
(236, 4, 'staff', 'User logged out', '::1', '2026-09-13 06:51:43'),
(237, 6, 'admin', 'User logged in', '::1', '2026-09-13 06:51:50'),
(238, 6, 'admin', 'User logged out', '::1', '2026-09-13 06:51:59'),
(239, 4, 'staff', 'User logged in', '::1', '2026-09-13 06:52:04'),
(240, 4, 'staff', 'User logged out', '::1', '2026-09-13 06:54:09'),
(241, 1, 'student', 'User logged in', '::1', '2026-09-13 06:54:16'),
(242, 1, 'student', 'User logged out', '::1', '2026-09-13 07:02:01'),
(243, 6, 'admin', 'User logged in', '::1', '2026-09-13 07:02:08'),
(244, 6, 'admin', 'User logged out', '::1', '2026-09-13 07:02:15'),
(245, 4, 'staff', 'User logged in', '::1', '2026-09-13 07:02:21'),
(246, 4, 'staff', 'User logged out', '::1', '2026-09-13 07:02:35'),
(247, 5, 'student', 'User logged in', '::1', '2026-09-13 07:02:43'),
(248, 5, 'student', 'User logged out', '::1', '2026-09-13 07:05:45'),
(249, 6, 'admin', 'User logged in', '::1', '2026-09-13 07:05:54'),
(250, 6, 'admin', 'User logged out', '::1', '2026-09-13 07:06:05'),
(251, 4, 'staff', 'User logged in', '::1', '2026-09-13 07:06:16'),
(252, 4, 'staff', 'User logged out', '::1', '2026-09-13 07:06:26'),
(253, 2, 'organizer', 'User logged in', '::1', '2026-09-13 07:06:42'),
(254, 2, 'organizer', 'User logged out', '::1', '2026-09-13 07:12:00'),
(255, 6, 'admin', 'User logged in', '::1', '2026-09-13 07:12:08'),
(256, 6, 'admin', 'User logged out', '::1', '2026-09-13 07:12:17'),
(257, 1, 'student', 'User logged in', '::1', '2026-09-13 07:12:25'),
(258, 1, 'student', 'User logged out', '::1', '2026-09-13 07:12:33'),
(259, 4, 'staff', 'User logged in', '::1', '2026-09-13 07:12:39'),
(260, 4, 'staff', 'User logged out', '::1', '2026-09-13 07:12:52'),
(261, 2, 'organizer', 'User logged in', '::1', '2026-09-13 07:13:03'),
(262, 2, 'organizer', 'User logged out', '::1', '2026-09-13 07:13:11'),
(263, 5, 'student', 'User logged in', '::1', '2026-09-13 08:07:38'),
(264, 5, 'student', 'User logged out', '::1', '2026-09-13 08:09:53'),
(265, 2, 'organizer', 'User logged in', '::1', '2026-09-13 08:10:00'),
(266, 2, 'organizer', 'User logged out', '::1', '2026-09-13 08:11:12'),
(267, 6, 'admin', 'User logged in', '::1', '2026-09-13 08:11:41'),
(268, 6, 'admin', 'User logged out', '::1', '2026-09-13 08:12:19'),
(269, 4, 'staff', 'User logged in', '::1', '2026-09-13 08:12:26'),
(270, 4, 'staff', 'Created attendance list for event 1', '::1', '2026-09-13 08:12:32'),
(271, 4, 'staff', 'User logged out', '::1', '2026-09-13 08:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendance_status` enum('present','absent') DEFAULT 'absent',
  `attendance_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `event_id`, `student_id`, `attendance_status`, `attendance_date`) VALUES
(1, 1, 1, 'present', '2026-09-08'),
(2, 1, 5, 'present', '2026-09-08'),
(3, 2, 1, 'present', '2026-09-10'),
(4, 2, 5, 'present', '2026-09-10'),
(5, 3, 1, 'present', '2026-09-12'),
(6, 3, 5, 'present', '2026-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `event_name` varchar(150) NOT NULL,
  `event_category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `venue` varchar(150) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `registration_fee` decimal(10,2) DEFAULT 0.00,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `organizer_id`, `event_name`, `event_category`, `description`, `event_date`, `venue`, `capacity`, `registration_fee`, `status`, `created_at`) VALUES
(1, 2, 'fest', 'Cultural', 'asdasdasd', '2026-09-09', 'iccb', 2, 120.00, 'approved', '2026-09-08 11:41:31'),
(2, 2, 'valorant', 'Sports', 'adsda', '2026-09-11', 'military ground', 2, 246.00, 'approved', '2026-09-10 11:51:45'),
(3, 2, 'concert', 'Cultural', 'adsdasda', '2026-09-13', 'iccb', 2, 860.00, 'approved', '2026-09-12 12:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `event_finance`
--

CREATE TABLE `event_finance` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `estimated_budget` decimal(10,2) DEFAULT 0.00,
  `total_expense` decimal(10,2) DEFAULT 0.00,
  `expense_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_finance`
--

INSERT INTO `event_finance` (`id`, `event_id`, `estimated_budget`, `total_expense`, `expense_details`) VALUES
(1, 1, 120000.00, 50000.00, 'setup\r\n\r\n'),
(2, 2, 200000.00, 60000.00, 'pcs\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `payment_status` enum('pending','paid','rejected') DEFAULT 'pending',
  `payment_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `registration_id`, `student_id`, `event_id`, `amount`, `payment_method`, `transaction_id`, `payment_status`, `payment_date`, `created_at`) VALUES
(1, 1, 1, 1, 120.00, 'online', 'SasAD234234', 'paid', '2026-09-08 17:43:30', '2026-09-08 11:43:30'),
(2, 2, 5, 1, 120.00, 'offline', '', 'paid', '2026-09-08 18:26:59', '2026-09-08 11:53:56'),
(3, 3, 1, 2, 246.00, 'online', 'adsdadasd24324', 'paid', '2026-09-10 17:53:44', '2026-09-10 11:53:44'),
(4, 4, 5, 2, 246.00, 'offline', '', 'paid', '2026-09-10 17:55:52', '2026-09-10 11:54:34'),
(5, 5, 1, 3, 860.00, 'online', 'asdada34553456', 'paid', '2026-09-12 18:16:19', '2026-09-12 12:16:19'),
(6, 6, 5, 3, 860.00, 'offline', '', 'paid', '2026-09-12 18:17:40', '2026-09-12 12:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `registration_status` enum('registered','cancelled') DEFAULT 'registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `event_id`, `student_id`, `registration_date`, `registration_status`) VALUES
(1, 1, 1, '2026-09-08 11:52:29', 'registered'),
(2, 1, 5, '2026-09-08 11:53:39', 'registered'),
(3, 2, 1, '2026-09-10 11:53:25', 'registered'),
(4, 2, 5, '2026-09-10 11:54:18', 'registered'),
(5, 3, 1, '2026-09-12 12:16:01', 'registered'),
(6, 3, 5, '2026-09-12 12:16:56', 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `ticket_code` varchar(100) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `ticket_status` enum('valid','used') DEFAULT 'valid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `registration_id`, `ticket_code`, `qr_code`, `ticket_status`, `created_at`) VALUES
(1, 1, 'TICKET-753a434b-ab7b-11f1-8ff7-d843aeafdf82', 'QR-753a4363-ab7b-11f1-8ff7-d843aeafdf82', 'valid', '2026-09-08 11:50:16'),
(2, 2, 'TICKET-6A9FF75447733', 'TICKET-6A9FF75447733', 'valid', '2026-09-08 11:53:56'),
(3, 3, 'TICKET-6AA29A48F2DE1', 'TICKET-6AA29A48F2DE1', 'valid', '2026-09-10 11:53:44'),
(4, 4, 'TICKET-6AA29A7AB7A19', 'TICKET-6AA29A7AB7A19', 'valid', '2026-09-10 11:54:34'),
(5, 5, 'TICKET-6AA5429347E4E', 'TICKET-6AA5429347E4E', 'valid', '2026-09-12 12:16:19'),
(6, 6, 'TICKET-6AA542C64D206', 'TICKET-6AA542C64D206', 'valid', '2026-09-12 12:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('student','organizer','staff','admin') NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `password_hash`, `role`, `status`, `profile_image`, `created_at`) VALUES
(1, 'rayhan', 'student@gmail.com', '01632882759', '$2y$10$WDu5dF5Z3qW0g82DbEQmq.MZxLHPKuxi9zbFtngr6M1wDNhJJQa/C', 'student', 'active', NULL, '2026-09-08 09:18:51'),
(2, 'rayhan .', 'organizer@gmail.com', '01632882759', '$2y$10$5QXIUXcVJ1NMJNwa.cNZMe.JnCyRF.dHWb7sUYRE0oNHBmpSW3j.a', 'organizer', 'active', NULL, '2026-09-08 09:19:31'),
(3, 'System Admin', 'admin@gmail.com', '01700000000', '$2y$10$GCkTnXOcxgqd9x6/A1DHA.7os23tyyy8YkSuCo.F5.Dyx0wHXHt6G', 'admin', 'active', NULL, '2026-09-08 09:56:15'),
(4, 'staf', 'staf@gmail.com', '01632882759', '$2y$10$bG/AvELfRnk39YxDO2hPRuCjc6GMGfAvzsyErh6F3l4Y5YrITrLla', 'staff', 'active', NULL, '2026-09-08 11:05:02'),
(5, 'student2', 'student2@gmail.com', '01632882759', '$2y$10$2o9xGsvoF8wMawDKwvVPRuXKRdBx.3fT6qJarH2Yu2yK9BrOcxv/y', 'student', 'active', NULL, '2026-09-08 11:53:19'),
(6, 'admin2', 'admin2@gmail.com', '01632882759', '$2y$10$G1ccP13UXr1PwaJAGcSqBez13dYdPlWSLtml.f2OJ/dNj6IJNgGke', 'admin', 'active', NULL, '2026-09-08 12:30:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizer_id` (`organizer_id`);

--
-- Indexes for table `event_finance`
--
ALTER TABLE `event_finance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_code` (`ticket_code`),
  ADD KEY `registration_id` (`registration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_finance`
--
ALTER TABLE `event_finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`organizer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_finance`
--
ALTER TABLE `event_finance`
  ADD CONSTRAINT `event_finance_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
