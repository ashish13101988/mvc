-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 06:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slimapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_slim4`
--

CREATE TABLE `users_slim4` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_slim4`
--

INSERT INTO `users_slim4` (`id`, `name`, `email`, `phone`, `password`, `user_role`, `email_verified`, `created_at`, `modified_at`) VALUES
(37, 'ashish kumar', 'ashish@ninjacoder.com', 'NA', '$2y$10$ORN398sUsX6/YeH5VaMWsew6MpGB4iUzYSF3aXRo3KV/usThogbwC', 0, 0, '2020-05-13 18:35:20', '0000-00-00 00:00:00'),
(38, 'demo user', 'demouser1@mail.com', 'NA', '$2y$10$v15xoSrFuBmCgL6bkZvXCOGk514kK3iJQum9uVsrv5KLhjJq/kSi.', 0, 0, '2020-05-13 18:37:20', '0000-00-00 00:00:00'),
(39, 'demo usertwo', 'demouser2@gmail.com', 'NA', '$2y$10$Y6W.G.gV/2TmzH5Rvw5kLOKdSh8VvdF7uZSlSdR3pe1v5IyxLypS6', 0, 0, '2020-05-13 18:41:30', '0000-00-00 00:00:00'),
(40, 'demo userthree', 'demouser3@gmail.com', 'NA', '$2y$10$pDuk9IwLRQM/hyH5Taldo.LN35iNk6BVMaImtMy49BeG/NTA9fDrG', 0, 0, '2020-05-13 18:43:20', '0000-00-00 00:00:00'),
(41, 'demo userfour', 'demouser4@mail.com', 'NA', '$2y$10$SC7ahTaWCA/gL9VWLRva0.b102s2I59z8ch9wYh5VmF.iEVLXsCjq', 0, 0, '2020-05-13 18:52:22', '0000-00-00 00:00:00'),
(42, 'test user', 'testuser@mail.com', 'NA', '$2y$10$0vQr6L77y8zBFNwf9q1X1.vn8PDuDiTSodia2BvaE9yqJ2aU/A1oK', 0, 0, '2020-05-13 18:56:50', '0000-00-00 00:00:00'),
(43, 'as as', 'ashish13101988@gmail.com', 'NA', '$2y$10$2XyFav9qZHHjbJsTA8cYWemakqUfpozWJoj3xmyJLCEdqCM.adE/G', 0, 0, '2020-05-13 20:05:14', '0000-00-00 00:00:00'),
(44, 'ashish asdf', 'ashish1234@gmail.com', 'NA', '$2y$10$XrvNFlx0r.PBYaVGwTCmbeD6jM9uzK53as4b8IRze.otJPd5qqBx6', 0, 0, '2020-05-13 20:16:42', '0000-00-00 00:00:00'),
(45, 'ashish kumar', 'ash13ish@ninjacoder.com', 'NA', '$2y$10$Xu5u77yLSRvDDpBo3esjOuX7a6bc.qz2jAI0howidx886Wv.psI9W', 0, 0, '2020-05-13 20:32:56', '0000-00-00 00:00:00'),
(46, 'ashish kumar', 'ashish72@ninjacoder.com', 'NA', '$2y$10$T/51YXqGeUHQvZkJELI8Vev0dpvRbB9X9Foww/60Q9UAz5jPdpo5a', 0, 0, '2020-05-13 20:34:32', '0000-00-00 00:00:00'),
(47, 'test userfive', 'demouser4@gmail.com', 'NA', '$2y$10$TxATKMtIM8nQ.9mhSEVbB.FrWWJrWlqPhi/XZhP1ios7rWxMufNLC', 0, 0, '2020-05-14 05:50:20', '0000-00-00 00:00:00'),
(48, 'ashishashish', 'ashish134@gmail.com', 'NA', '$2y$10$7CYbVzZwSfAfZ6lPcSqbbufy/l.SYOf7uf.ybeyxLDhlGhU1jhPDK', 0, 0, '2020-05-17 18:06:28', '0000-00-00 00:00:00'),
(49, 'john deo', 'johndeo@gmail.com', 'NA', '$2y$10$g41.zJl6ZOIPRp3uiISgY.oaxjOMCJj3BCV50FLJLDWuMcmBKrJFu', 0, 0, '2020-05-17 18:08:21', '0000-00-00 00:00:00'),
(50, 'the event', 'theevent@gmail.com', 'NA', '$2y$10$/xSFraImTpo7EMw21mMElOLN3ET.pWyE5DjBkEZ7eaHLpUWTo531G', 0, 0, '2020-05-18 16:45:28', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_slim4`
--
ALTER TABLE `users_slim4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_slim4`
--
ALTER TABLE `users_slim4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
