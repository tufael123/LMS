-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 09:44 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libery`
--
CREATE DATABASE IF NOT EXISTS `libery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `libery`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', '0125454512'),
(2, 'admin2', 'admin2@gmail.com', 'admin123', '099999999');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `author`, `description`, `cat_id`, `qty`, `photo`) VALUES
(6, 'Java', 'Pranto', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 6, 0, 'dcff8ce932f96721cb67075c42e190c9.jpg'),
(8, 'Jokes Book', 'MR. Right', 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt', 10, 2, 'book-1659717_1280.jpg'),
(9, 'Python', 'Nur', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 12, 1, 'kadarius-seegars-2HvavRLZjYM-unsplash.jpg'),
(11, 'Enter', 'tasif', 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt', 10, 2, 'kadarius-seegars-2HvavRLZjYM-unsplash.jpg'),
(13, 'Math', 'Abul Kalam', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 6, 2, 'download.jpeg'),
(14, 'AI Book', 'Ayon sir', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 6, 7, 'book-1659717_1280.jpg'),
(15, 'Database', 'Asif Sir', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 6, 1, '978-1-4842-0877-9.jpeg'),
(16, 'Operating System', 'Parves Islam', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 14, 5, 'book-1659717_1280.jpg'),
(17, 'C Programming', 'Rafi', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 13, 2, 'download (1).jpeg'),
(18, 'Project Work 2', 'Arman', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 15, 3, 'download (2).jpeg'),
(19, 'Stoy', 'NDAJ', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 11, 1, 'book-1659717_1280.jpg'),
(21, 'Discreate Math', 'Md. Shahid', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 14, 3, 'download (2).jpeg'),
(22, 'physics', 'Noyon', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 12, 5, 'dcff8ce932f96721cb67075c42e190c9.jpg'),
(23, 'physics', 'Noyon', 'This Book is a Written by a Professional writer. It was a educational book. This Book  will help students properly', 12, 5, 'dcff8ce932f96721cb67075c42e190c9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE `book_request` (
  `req_id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `hqty` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `req_status` int(11) NOT NULL DEFAULT '0',
  `dec_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`req_id`, `book_name`, `author`, `cat_name`, `hqty`, `days`, `book_id`, `user_id`, `req_status`, `dec_reason`) VALUES
(11, 'Java', 'Pranto', 'Study', 1, 1, 6, 15, 1, ''),
(12, 'Bhutor Book', 'Bhoot', 'Horor', 1, 1, 8, 15, 1, ''),
(13, 'Python', 'Maymuna', 'Study', 1, 1, 9, NULL, 1, ''),
(17, 'Java', 'Pranto', 'Study', 1, 1, 6, 15, 1, ''),
(18, 'physics', 'Noyon', 'Horor', 2, 3, 22, NULL, 0, ''),
(19, 'Database', 'Asif Sir', 'Study', 2, 6, 15, 18, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Study'),
(10, 'Entertainment'),
(11, 'DJ Book'),
(12, 'Horor'),
(13, 'Programing'),
(14, 'Project'),
(15, 'Basic'),
(16, 'realistic');

-- --------------------------------------------------------

--
-- Table structure for table `issued_book`
--

CREATE TABLE `issued_book` (
  `issue_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `req_id` int(11) DEFAULT NULL,
  `gqty` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `datee` varchar(255) DEFAULT NULL,
  `poss_return_date` varchar(255) NOT NULL,
  `user_return_date` varchar(255) NOT NULL,
  `return_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issued_book`
--

INSERT INTO `issued_book` (`issue_id`, `book_id`, `user_id`, `req_id`, `gqty`, `days`, `datee`, `poss_return_date`, `user_return_date`, `return_status`) VALUES
(8, 6, 15, 11, 1, 1, '2024-05-06', '2024-05-08', '2024-05-09', 1),
(9, 8, 15, 12, 1, 1, '2024-05-01', '2024-05-03', '2024-05-09', 1),
(10, 9, NULL, 13, 1, 1, '2024-05-06', '2024-05-08', '', 0),
(11, 6, 15, 17, 1, 1, '2024-05-11', '2024-05-12', '', 0),
(12, 15, 18, 19, 3, 6, '2024-07-10', '2024-07-16', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `dod` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `g_phone` varchar(255) NOT NULL,
  `per_careof` varchar(255) NOT NULL,
  `per_village` varchar(255) NOT NULL,
  `pdivi` varchar(255) NOT NULL,
  `pdist` varchar(255) NOT NULL,
  `p_posto` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `s_name`, `f_name`, `m_name`, `dod`, `blood`, `gender`, `phone`, `g_phone`, `per_careof`, `per_village`, `pdivi`, `pdist`, `p_posto`, `image`, `nid`, `email`, `password`, `status`) VALUES
(15, 'Omor Faruque Tanim', 'Abdul Hannan', 'Nazma begum', '2001-08-27', 'B+', 'Male', '01756569753', '01646269809', 'Self', 'Pirpur', 'Sylhet', 'Sylhet', 'Tuker Bazar', 'WhatsApp Image 2024-04-27 at 3.08.45 PM.jpeg', 'nid.JPG', 'uftanim2@gmail.com', 'tanim123', 1),
(17, 'Humayra Jannat', 'Juber Ahmed', 'Shipa Begum', '2006-06-13', 'B+', 'Female', '01999556678', '01999556678', 'Juber Ahmed', 'Boroi kandi', 'Sylhet', 'Sylhet', 'Dhaskin Surma', 'FB_IMG_15743068549271604.jpg', 'FB_IMG_15744355818703108.jpg', 'malihajannat132@gmail.com', 'maliha123', 1),
(18, 'Maymuna Marjan', 'Juber Ahmed', 'Shipa Begum', '2020-08-09', 'B+', 'Female', '01999556678', '01999556678', 'Juber Ahmed', 'Boroi kandi', 'Sylhet', 'Sylhet', 'Dhaskin Surma', 'FB_IMG_15742683257779969.jpg', 'FB_IMG_15865095961073616.jpg', 'maymunamarjan20@gmail.com', 'maymuna123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `book_request`
--
ALTER TABLE `book_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `issued_book`
--
ALTER TABLE `issued_book`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE SET NULL;

--
-- Constraints for table `book_request`
--
ALTER TABLE `book_request`
  ADD CONSTRAINT `book_request_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `book_request_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD CONSTRAINT `issued_book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `issued_book_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `issued_book_ibfk_3` FOREIGN KEY (`req_id`) REFERENCES `book_request` (`req_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
