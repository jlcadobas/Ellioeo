-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 03:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ellioeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`) VALUES
(1, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1679571442/ellioeo/1_gkzmyh.png'),
(2, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1679571444/ellioeo/2_jd8rkj.png'),
(3, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1679571444/ellioeo/3_trdcsa.png'),
(4, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1679571443/ellioeo/4_fdqxmi.png'),
(5, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1679571443/ellioeo/5_buig7d.png'),
(11, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1686720157/ellioeo/6_nmecht.jpg'),
(12, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1686720701/ellioeo/7_qcwewg.png'),
(13, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1686720725/ellioeo/8_oqafcd.png'),
(14, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1686720947/ellioeo/9_uiybgh.png'),
(15, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1686721196/ellioeo/10_i2c2gx.png'),
(16, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1686743176/ellioeo/11_o4ukv6.png'),
(17, 'https://res.cloudinary.com/dysyk3hmj/image/upload/v1686743577/ellioeo/12_g6rfxy.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
