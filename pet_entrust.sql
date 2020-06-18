-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 
-- サーバのバージョン： 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_entrust`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `cost_table`
--

CREATE TABLE `cost_table` (
  `shop` text NOT NULL,
  `pet` text NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `cost_table`
--

INSERT INTO `cost_table` (`shop`, `pet`, `cost`) VALUES
('testshop', '大型犬', 6000),
('testshop', '中型犬', 5000),
('testshop', '小型犬', 4000),
('testshop2', '大型犬', 6500),
('testshop2', '中型犬', 5000),
('testshop2', '小型犬', 4000);

-- --------------------------------------------------------

--
-- テーブルの構造 `login_shop_table`
--

CREATE TABLE `login_shop_table` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `login_shop_table`
--

INSERT INTO `login_shop_table` (`id`, `name`, `email`, `password`, `address`, `comment`) VALUES
(1, 'testshop', 'sample@gmail.com', 'P@ssw0rd', '埼玉県八潮市', 'comment'),
(2, 'testshop2', 'sample@gmail.com', 'P@ssw0rd', '千葉県千葉市', 'comment');

-- --------------------------------------------------------

--
-- テーブルの構造 `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `login_table`
--

INSERT INTO `login_table` (`id`, `name`, `email`, `password`) VALUES
(1, 'ヨシモト', 'sample@gmail.com', 'P@ssw0rd'),
(2, 'testuser', 'sample@gmail.com', 'P@ssw0rd');

-- --------------------------------------------------------

--
-- テーブルの構造 `reserve_db`
--

CREATE TABLE `reserve_db` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pet` text NOT NULL,
  `cost` int(11) NOT NULL,
  `comment` text NOT NULL,
  `shop` text NOT NULL,
  `start_day` text NOT NULL,
  `end_day` text NOT NULL,
  `stat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `reserve_db`
--

INSERT INTO `reserve_db` (`id`, `user`, `pet`, `cost`, `comment`, `shop`, `start_day`, `end_day`, `stat`) VALUES
(1, 'ヨシモト', '大型犬', 6000, 'come', 'testshop', '2020-06-26', '2020-06-27', 'approve'),
(2, 'ヨシモト', '大型犬', 6500, 'come', 'testshop2', '2020-07-10', '2020-07-11', 'reserve'),
(3, 'testuser', '大型犬', 6500, 'demo', 'testshop2', '2020-06-26', '2020-06-27', 'reserve');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_shop_table`
--
ALTER TABLE `login_shop_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_db`
--
ALTER TABLE `reserve_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_shop_table`
--
ALTER TABLE `login_shop_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reserve_db`
--
ALTER TABLE `reserve_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
