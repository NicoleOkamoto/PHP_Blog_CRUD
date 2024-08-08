-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 09:31 PM
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
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `contentBlog` text NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `date`, `contentBlog`, `title`) VALUES
(22, '2024-04-01 22:59:52', 'Integer convallis eget turpis ut pellentesque. Maecenas varius turpis id nulla fringilla, sit amet venenatis nunc aliquet. Suspendisse potenti. Sed eu aliquet dui. Vestibulum hendrerit metus sed enim commodo, vitae dapibus ipsum viverra. Pellentesque convallis efficitur elit, at facilisis lorem venenatis nec. Fusce condimentum velit sed enim blandit, id auctor nunc varius. Integer elementum vel sapien at vehicula. In vehicula, quam et aliquam blandit, nulla velit faucibus enim, ac luctus dui lorem a metus. Nullam mattis metus eu tellus malesuada dictum. Curabitur volutpat vehicula mi, vitae scelerisque tortor.', 'Suspendisse potenti.'),
(23, '2024-04-01 23:22:16', 'Suspendisse potenti. Integer convallis eget turpis ut pellentesque. Maecenas varius turpis id nulla fringilla, sit amet venenatis nunc aliquet. Suspendisse potenti. Sed eu aliquet dui. Vestibulum hendrerit metus sed enim commodo, vitae dapibus ipsum viverra. Pellentesque convallis efficitur elit, at facilisis lorem venenatis nec. Fusce condimentum velit sed enim blandit, id auctor nunc varius. Integer elementum vel sapien at vehicula. In vehicula, quam et aliquam blandit, nulla velit faucibus enim, ac luctus dui lorem a metus. Nullam mattis metus eu tellus malesuada dictum. Curabitur volutpat vehicula mi, vitae scelerisque tortor.', 'Loren Ipsum'),
(24, '2024-04-04 19:44:20', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet'),
(27, '2024-04-05 17:30:26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Lorem ipsum'),
(29, '2024-04-05 17:30:26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'Lorem ipsum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
