-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `re`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `status` enum('seen','unseen','resolved','pending') DEFAULT 'unseen',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_type`, `status`, `name`, `email`, `contact`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Industry mentorship', 'Mentee', 'unseen', 'addd', 'bds.ashu@gmail.com', '2222222', 'gbfgf', '2024-04-04 08:25:01', '2024-04-04 08:25:01'),
(2, 'Industry mentorship', 'Mentee', 'unseen', 'addd', 'bds.ashu@gmail.com', 'nhhn', 'gg', '2024-04-04 08:26:24', '2024-04-04 08:26:24'),
(3, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', '33333', 'gfbdgfdgfdgf', '2024-04-04 08:27:33', '2024-04-04 08:27:33'),
(4, 'Industry mentorship', 'Mentee', 'unseen', 'addd', 'bds.ashu@gmail.com', '2222222', 'dcdcdc', '2024-04-04 08:34:45', '2024-04-04 08:34:45'),
(5, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', 'ddd', 'dfdf', '2024-04-04 08:36:33', '2024-04-04 08:36:33'),
(6, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', '33333', 'gbdgbf', '2024-04-04 08:45:02', '2024-04-04 08:45:02'),
(7, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', '33333', 'ffg', '2024-04-04 08:45:32', '2024-04-04 08:45:32'),
(8, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', '33333', 'ghg', '2024-04-04 08:47:31', '2024-04-04 08:47:31'),
(9, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', '33333', 'hjjgh', '2024-04-04 08:48:58', '2024-04-04 08:48:58'),
(10, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', '33333', 'mjjm', '2024-04-04 08:52:38', '2024-04-04 08:52:38'),
(11, 'Industry mentorship', 'Mentor', 'unseen', 'fvdfvd', 'bds.ashu@gmail.com', '33333', 'ddfd', '2024-04-04 09:00:02', '2024-04-04 09:00:02'),
(12, 'Placement Automation', 'student', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'yhyjh', '2024-04-04 10:09:53', '2024-04-04 10:09:53'),
(13, 'Placement Automation', 'corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'yhyjh', '2024-04-04 10:10:30', '2024-04-04 10:10:30'),
(14, 'Campus To Corporate Engagement', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'hhy', '2024-04-04 10:29:39', '2024-04-04 10:29:39'),
(15, 'Pdp', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'gbgb', '2024-04-04 10:44:20', '2024-04-04 10:44:20'),
(16, 'Institutional Subscription', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'gtgfg', '2024-04-04 10:53:46', '2024-04-04 10:53:46'),
(17, 'virtual Mock Interview', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'd', '2024-04-04 11:10:03', '2024-04-04 11:10:03'),
(18, 'International Collaboration', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'dcdccd', '2024-04-04 11:18:52', '2024-04-04 11:18:52'),
(19, 'Workshops / Seminars', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'dcd', '2024-04-04 11:30:59', '2024-04-04 11:30:59'),
(20, 'PDP', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'gbfgbf', '2024-04-04 11:37:55', '2024-04-04 11:37:55'),
(21, 'Global Immersion Program', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'dfdff', '2024-04-04 11:38:52', '2024-04-04 11:38:52'),
(22, 'Corporate Services', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'rgfdgrd', '2024-04-04 11:52:06', '2024-04-04 11:52:06'),
(23, 'Corporate Training', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'gbgh', '2024-04-04 11:53:28', '2024-04-04 11:53:28'),
(24, 'Corporate Collaborations', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'tht', '2024-04-04 12:00:00', '2024-04-04 12:00:00'),
(25, 'Corporate Collaborations', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'fddf', '2024-04-04 12:06:32', '2024-04-04 12:06:32'),
(26, 'Career Progression', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'dffdr', '2024-04-04 12:08:15', '2024-04-04 12:08:15'),
(27, 'Campus Hiring', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'fvvb', '2024-04-04 12:15:07', '2024-04-04 12:15:07'),
(28, 'Executive Program', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'gbgbf', '2024-04-04 14:39:13', '2024-04-04 14:39:13'),
(29, 'Global Corporate Meet', 'Corporate', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'jjhj', '2024-04-04 14:52:54', '2024-04-04 14:52:54'),
(30, 'Contact Us', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'ddcdcdc', '2024-04-04 15:20:17', '2024-04-04 15:20:17'),
(31, 'Enquiry NOW', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'dfdffde', '2024-04-05 05:39:57', '2024-04-05 05:39:57'),
(32, 'Enquiry NOW', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'vgffgvvf', '2024-04-05 05:40:54', '2024-04-05 05:40:54'),
(33, 'Enquiry NOW', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'nhhg', '2024-04-05 05:41:23', '2024-04-05 05:41:23'),
(34, 'Enquiry NOW', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'fvdfv', '2024-04-05 09:37:45', '2024-04-05 09:37:45'),
(35, 'Contact Us', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'v vvf', '2024-04-05 12:17:57', '2024-04-05 12:17:57'),
(36, 'Contact Us', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'dedede', '2024-04-05 12:18:18', '2024-04-05 12:18:18'),
(37, 'Campus To Corporate Engagement', 'Colleges', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'fvgf', '2024-04-05 12:18:56', '2024-04-05 12:18:56'),
(38, 'Placement Automation', 'collage', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'deded', '2024-04-05 12:22:59', '2024-04-05 12:22:59'),
(39, 'Contact Us', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'gtgtgt', '2024-04-05 12:33:54', '2024-04-05 12:33:54'),
(40, 'Contact Us', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'bgbgb', '2024-04-05 12:35:13', '2024-04-05 12:35:13'),
(41, 'Enquiry NOW', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', '65y66y5y6yht', '2024-04-05 17:37:21', '2024-04-05 17:37:21'),
(42, 'Enquiry NOW', 'Contact Us', 'unseen', 'Ashutosh Kumar', 'bds.ashu@gmail.com', '07667236815', 'dsde', '2024-04-05 17:39:52', '2024-04-05 17:39:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
