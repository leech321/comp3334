-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2023 at 01:12 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `blog_id` varchar(255) NOT NULL DEFAULT (uuid()),
  `userid` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `ques` varchar(500) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`blog_id`, `userid`, `title`, `ques`, `path`) VALUES
('23674f7c-ded4-11ed-85e8-000c29804463', 'joe123', '123', '123', '/ClientPage/peter12.php'),
('8d293f1f-dece-11ed-85e8-000c29804463', 'joe123', '123', '123', '/ClientPage/joe123.php'),
('b5fdebae-decc-11ed-85e8-000c29804463', 'comp3334', 'dasdasda', 'adsdsa', '/ClientPage/peter.php'),
('b5fdede4-decc-11ed-85e8-000c29804463', 'admin', 'How are you', 'How are you', '/ClientPage/admin.php'),
('b5fdef3e-decc-11ed-85e8-000c29804463', 'peter', 'What is your name?', 'How can i know your name?', '/ClientPage/peter.php');

-- --------------------------------------------------------

--
-- Table structure for table `commentdata`
--

CREATE TABLE `commentdata` (
  `comment_id` varchar(255) NOT NULL DEFAULT (uuid()),
  `userid` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commentdata`
--

INSERT INTO `commentdata` (`comment_id`, `userid`, `comment`, `path`) VALUES
('b600b3d7-decc-11ed-85e8-000c29804463', 'comp3334', 'sadasoijd', '/Question/dasdasda.php'),
('b600b503-decc-11ed-85e8-000c29804463', 'peter', 'WOW my name will not tell you', '/Question/What is your name.php');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `userid` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` int NOT NULL,
  `housephoto` varchar(50) NOT NULL,
  `anti_csrf` varchar(255) DEFAULT NULL,
  `round` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`userid`, `password`, `email`, `phoneno`, `housephoto`, `anti_csrf`, `round`) VALUES
('admin', '1cd73874884db6a0f9f21d853d7e9eacdc773c39ee389060f5e96ae0bcb4773a', 'admin@gmail.com', 61234567, './img/2222-removebg-preview.png', 'a606d8c9068e63672b75b33b86f6f03b', 7),
('Comp3334', '020141b0381b7818bba0092671dc3524fb1b47cbc5dadec0334e38723906e0e4', 'comp3334@comp22.com', 12345678, './img/2222-removebg-preview.png', '8cf7758f3b9fbd091e3f3925bdbcd5ab', 3),
('joe123', 'f8aa14da2301e201e817f5b8667a36bb40c8ca49da69b3470a74d0f4ec194961', 'joe@123.com', 12345678, './img/2222-removebg-preview.png', '50eed39650099e6dd7515ee40616545d', 5),
('peter', 'c27603c64e459a2a018b7105efdcb949ac15cc3e3e0c00208acab0d6d324b825', 'peter@gmail.com', 65123456, './img/house-removebg-preview.png', '3ad32c3e79120cf020cc7f142de95eb5', 5),
('peter12', 'b03ddf3ca2e714a6548e7495e2a03f5e824eaac9837cd7f159c67b90fb4b7342', 'peter@peter.com', 12345678, './img/house-removebg-preview.png', 'ca4e5b919d52fefd22f847e040af7621', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `commentdata`
--
ALTER TABLE `commentdata`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
