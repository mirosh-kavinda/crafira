-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 10:37 AM
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
-- Database: `crafira_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` double NOT NULL,
  `p_variety` int(11) NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_desc` varchar(100) NOT NULL,
  `p_category` varchar(50) NOT NULL,
  `p_src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_variety`, `p_stock`, `p_desc`, `p_category`, `p_src`) VALUES
(1, 'Anime Bleach Poster ', 250.33, 4, 20, 'Japanese Anime Bleach Poster \nKraft Paper Retro Posters \nHome Room Store Wall Decor Fans\' ', 'ART & COLLECTIBLES', 'images/Category/Art&Col/1/'),
(2, 'Ancient Coins', 500.12, 3, 10, 'Jesus relief commemorative coin Collection Arts Gifts Alloy Souvenir Gold Plated Coin Metal Antique ', 'ART & COLLECTIBLES', 'images/Category/Art&Col/2/'),
(3, 'Hand made Wood and Metal Art', 399, 4, 23, 'Hand made Wood and Metal Art Deco  Figure Skier Sking Down Hill Floor Art.\r\nCondition:\r\nUsedUsed\r\n', 'ART & COLLECTIBLES', 'images/Category/Art&Col/3/'),
(4, 'HAND MADE ENGLISH STERLING', 365, 4, 32, 'HAND MADE ENGLISH STERLING SILVER ARTS AND CRAFTS CHALICE GOBLET 2002 196g\n', 'ART & COLLECTIBLES', 'images/Category/Art&Col/4/'),
(5, 'Hand Made Foil Art of Snow White', 22.8, 4, 10, 'Hand Made Foil Art of Snow White and the Seven Dwarfs\r\nCondition:\r\nUsedUsed\r\nPrice:\r\nGBP 19.99\r\nAppr', 'ART & COLLECTIBLES', 'images/Category/Art&Col/5/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `email`, `password`, `address`, `telephone`) VALUES
(1, 'mirosh kavinda', 'mk@gmail.com', '7442', '', ''),
(4, 'sachith navodya', 'sachi@gmail.com', '7442', '', ''),
(5, 'dsfds', 'fdsf@gmail.com', 'dsfdsf', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
