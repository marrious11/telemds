-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 12:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telemeds_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `specialty` text DEFAULT NULL,
  `urgency` enum('routine','soon','urgent') DEFAULT 'routine',
  `attachment` varchar(255) DEFAULT NULL,
  `time_slot` datetime DEFAULT NULL,
  `status` enum('pending','confirmed','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `specialty`, `urgency`, `attachment`, `time_slot`, `status`, `created_at`) VALUES
(1, NULL, 1, NULL, 'routine', NULL, '2025-06-15 10:00:00', 'pending', '2025-06-13 04:31:11'),
(2, NULL, 2, NULL, 'routine', NULL, '2025-06-16 14:30:00', 'pending', '2025-06-13 04:31:11'),
(3, NULL, 1, NULL, 'routine', NULL, '2025-06-15 10:00:00', 'pending', '2025-06-13 04:34:08'),
(4, NULL, 2, NULL, 'routine', NULL, '2025-06-16 14:30:00', 'pending', '2025-06-13 04:34:08'),
(34, 51, NULL, 'i am sick', 'urgent', NULL, '2025-06-14 00:56:00', 'pending', '2025-06-14 09:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `action`, `details`, `created_at`) VALUES
(1, 9, 'login_success', 'User logged in', '2025-06-14 07:29:27'),
(2, 9, 'login_success', 'User logged in', '2025-06-14 07:39:51'),
(3, 13, 'password_reset_failed', 'Invalid address:  (From): ', '2025-06-14 08:35:56'),
(4, 8, 'password_reset_failed', 'Invalid address:  (From): ', '2025-06-14 08:36:00'),
(5, 8, 'password_reset_failed', 'Invalid address:  (From): ', '2025-06-14 08:36:06'),
(6, 8, 'password_reset_failed', 'Invalid address:  (From): ', '2025-06-14 08:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialty`) VALUES
(13, 'Dr. John Akafor', 'General'),
(14, 'Dr. Jane Atem', 'Cardiology'),
(15, 'Dr. Emily Ashly', 'Dermatology'),
(16, 'Dr. John Akafor', 'General'),
(17, 'Dr. Jane Atem', 'Cardiology'),
(18, 'Dr. Emily Ashly', 'Dermatology'),
(19, 'Bob Doctor', ''),
(20, 'Ngassi', ''),
(21, 'Frank', ''),
(22, 'Sally', ''),
(23, 'Tumbu John', ''),
(24, 'Tabe', '');

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `record_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('patient','doctor') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `created_at`, `reset_token`, `reset_expires`) VALUES
(1, 'Alice', 'alice@example.com', '1234567890', 'password1', 'patient', '2025-06-13 04:06:52', NULL, NULL),
(2, 'Bob Doctor', 'bob@example.com', '0987654321', 'password2', 'doctor', '2025-06-13 04:06:52', NULL, NULL),
(8, 'Marrious Marrious', 'sohmarrious@gmail.com', '0652863664', '$2y$10$1PvajPx.R2ZB6uU7wY/3e.DVOnI5tnBz5yGLUhR3oq4205XZs5SPm', 'patient', '2025-06-13 09:27:28', '69fb2a009dd00e4372ad2558be78869055742f0f0639e566027b9033a329d15f', '2025-06-14 10:36:09'),
(9, 'tabe', 'tabenathanael@gmail.com', '6 71 36 40 89', '$2y$10$lTkRR998cRxXNQf8rLxSg.fEr3r37G8d59.cp/NzlAB8dV4Ozlhom', 'patient', '2025-06-13 09:28:53', NULL, NULL),
(13, 'sedis wiliam', 'williamsedis@gmail.com', NULL, '', '', '2025-06-14 01:42:44', '87aaca6349997d527a0065b91cfd20a99b5a87309ebc6eb1444cfc22ac1389bb', '2025-06-14 10:35:56'),
(39, 'Bob Doctor', 'bobdoctor@example.com', NULL, '$2y$10$wH8Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6', 'doctor', '2025-06-14 08:56:23', NULL, NULL),
(40, 'Ngassi', 'ngassi@example.com', NULL, '$2y$10$wH8Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6', 'doctor', '2025-06-14 08:56:23', NULL, NULL),
(41, 'Frank', 'frank@example.com', NULL, '$2y$10$wH8Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6', 'doctor', '2025-06-14 08:56:23', NULL, NULL),
(42, 'Sally', 'sally@example.com', NULL, '$2y$10$wH8Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6', 'doctor', '2025-06-14 08:56:23', NULL, NULL),
(43, 'Tumbu John', 'tumbujohn@example.com', NULL, '$2y$10$wH8Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6', 'doctor', '2025-06-14 08:56:23', NULL, NULL),
(51, 'Tumbu John', 'tumbujohn3@gmail.com', '682307565', '$2y$10$iJZx3zx6iTHrLTE31sqT7OkjzBX1Q5rLfV5fUJQveKqiwjQl8OCHu', 'patient', '2025-06-14 09:55:59', NULL, NULL),
(52, 'Tabe', 'tabenathanael2@gmail.com', '682307565', '$2y$10$EZ0nPKaEPKGuFDRwrMWgBuEerZwqXabVcCkRbEbFQZqp/S6me4E8G', 'doctor', '2025-06-14 10:41:34', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
