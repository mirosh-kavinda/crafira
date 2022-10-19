-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 03:36 PM
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
-- Database: `crafira`
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
  `p_desc` varchar(200) NOT NULL,
  `p_category` varchar(50) NOT NULL,
  `p_src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_variety`, `p_stock`, `p_desc`, `p_category`, `p_src`) VALUES
(1, 'Home Made Canddle Holder', 250.33, 4, 20, 'Home Made Canddle Holder\nProduct Description\nCoconut Shell Canddle Holder\nHandmade\nMade in Sri Lanka', 'ART & COLLECTIBLES', 'images/Category/Art&Col/1/'),
(2, 'Srilankan Wild Elephant Paint', 500.12, 3, 10, 'Made in Sri Lanka\n100% Natural\nSrilanka culture', 'ART & COLLECTIBLES', 'images/Category/Art&Col/2/'),
(3, 'Devils mask Ginidal Raaksha 5\"', 399, 4, 23, 'A fire devil raksha (gini raksha, ginidal raksha) mask is a mask that Sri Lankans use a lot in festivals', 'ART & COLLECTIBLES', 'images/Category/Art&Col/3/'),
(4, 'HAND MADE ENGLISH STERLING', 365, 4, 32, 'HAND MADE ENGLISH STERLING SILVER ARTS AND CRAFTS CHALICE GOBLET 2002 196g\n', 'ART & COLLECTIBLES', 'images/Category/Art&Col/4/'),
(5, 'Hand Made Foil Art of Snow White', 22.8, 4, 10, 'Hand Made Foil Art of Snow White and the Seven Dwarfs\r\nCondition:\r\nUsedUsed\r\nPrice:\r\nGBP 19.99\r\nAppr', 'ART & COLLECTIBLES', 'images/Category/Art&Col/5/'),
(6, 'Black Leather Bracelets', 4.99, 6, 7, 'Leather Bracelets Jewelry for Men Women Concert Gifts', 'JEWELERY & ACCESSORIES', 'images/Category/Jewelery/1/'),
(7, 'Women Beach Anklet Leg Bracelet', 5.99, 5, 8, 'hell Beads Starfish Anklets for Women Beach Anklet Leg Bracelet', 'JEWELERY & ACCESSORIES', 'images/Category/Jewelery/2/'),
(8, 'Coconut Shell Earing ', 7.99, 3, 4, '100% hand made\nSrilankan culture\nDancing event\nUse coconut Shell', 'JEWELERY & ACCESSORIES', 'images/Category/Jewelery/3/'),
(9, ' Shell Tassel Earrings', 12.99, 5, 4, 'Earrings For Women Vintage Conch Starfish Gold Color', 'JEWELERY & ACCESSORIES', 'images/Category/Jewelery/4/'),
(10, 'Pearl Stone Shell Pendant Necklace', 14.99, 5, 8, 'Women Summer Star Heart Chain Choker Necklace', 'JEWELERY & ACCESSORIES', 'images/Category/Jewelery/5/'),
(11, 'Casual Women Batik Dress', 24.99, 5, 5, 'Ceylon Hand Made Batik Frock Traditional Quality', 'CLOTH & SHOES', 'images/Category/clothing/1/'),
(12, 'Handmade Traditional Batik Saree', 39.99, 3, 4, ' Batik Saree 100% Pure Cotton Fabric Fast Moving', 'CLOTH & SHOES', 'images/Category/clothing/2/'),
(13, 'COTTON BATIK SARONG', 25, 4, 6, 'HAND MADE BATIK SARONG QUALITY COTTON', 'CLOTH & SHOES', 'images/Category/clothing/3/'),
(14, 'Bamboo and Cane Regency  Chair', 999.99, 4, 4, 'Century Chair Co. Hickory N.C. Bamboo and Cane Regency Armchair, Mid century', 'HOME & LIVING', 'images/Category/home&live/1/'),
(15, 'PALM TREE TISSUE BOX', 16.5, 2, 8, 'PALM TREE TISSUE BOX COVER METAL AND WICKER RATTAN BAMBOO//CANE WOVEN', 'HOME & LIVING', 'images/Category/home&live/2/'),
(16, 'Pottery Ceramic Tool Trimming Knife', 18.99, 5, 12, 'Pottery Ceramic Tool Trimming Knife Single Head Ring Scraper DIY Clay Sculpture Carving Texture', 'HOME & LIVING', 'images/Category/home&live/7/'),
(17, 'Feather Folding Fan Halloween', 9.99, 4, 5, 'Feather Folding Fan Halloween Ball Sweet Fairy Girl Feather Fan Fleece Fan Dance Hand Fan Art Craft ', 'WEDDING & PARTY', 'images/Category/wed&party/1/'),
(18, 'Style Crafts Hang Tag', 4.99, 4, 19, 'Kraft Paper Tags DIY Handmade/Thank You Multi Style Crafts Hang Tag With Rope Labels Gift', 'WEDDING & PARTY', 'images/Category/wed&party/2/'),
(19, 'Baby Toy Montessori 3D Puzzle', 5.99, 5, 20, 'Baby Toy Montessori 3D Puzzle DIY Jigsaw Board Wooden Puzzle Insect Animal Handmade Educational', 'TOY & ENTERTAINMENT', 'images/Category/toy&ent/1/'),
(20, 'Handmade Wooden Cat', 6.99, 4, 12, 'Handmade Wooden Cat Ornament Mini Cute Orange Cats Statues Doll Car Figurines Desktop', 'TOY & ENTERTAINMENT', 'images/Category/toy&ent/2/'),
(21, 'Scale Sailboat Model DIY Ship', 15.99, 4, 20, 'Sailboat Model DIY Ship Assembly Model Kits Classical Handmade Wooden Sailing Boats', 'TOY & ENTERTAINMENT', 'images/Category/toy&ent/3/'),
(23, 'Genuine Leather Plush women\'s short Boots', 320.2, 4, 10, 'Genuine Leather Plush women\'s short Boots Retro Casual Autumn Winter Women\'s Boots Waterproof leather warm Snow boots', 'CLOTH & SHOES', 'images/Category/clothing/4/'),
(24, 'Spring Ladies Genuine Leather Handmade Shoes', 240.2, 4, 100, 'GKTINOO Spring Ladies Genuine Leather Handmade Shoes Women Hook &Loop Flat Shoes Women 2022 Autumn Soft Loafers Flats', 'CLOTH & SHOES', 'images/Category/clothing/5/'),
(25, 'Slip On Loafers Driving Shoes', 240.2, 4, 40, '“Pre Loved but in great condition and has been well cared for. Any flaws will be highlighted in the ”... Read more', 'CLOTH & SHOES', 'images/Category/clothing/6/'),
(26, ' Men leather shoes ', 136.2, 3, 30, '100% Lether\n100% Hand Made\nMade in Srilanka', 'CLOTH & SHOES', 'images/Category/clothing/7/'),
(27, 'Bathick clothes', 489.2, 4, 20, 'Hand craft Product Sri lanka\nHome Made\n100% Hand made', 'CLOTH & SHOES', 'images/Category/clothing/8/'),
(28, 'Coconut Shell Neckless', 7.99, 3, 4, '\r\nHand made\r\nSrilankan Product\r\nwoman and mens', 'JEWELERY & ACCESSORIES', 'images/Category/Jewelery/4/'),
(29, 'Coconut Shell Neckless', 7.99, 3, 4, '100% hand made\r\nSrilankan culture\r\nuse forDancing event', 'JEWELERY & ACCESSORIES', 'images/Category/Jewelery/5/'),
(30, 'Handmade Elephant Toys', 6.99, 3, 12, '\r\nHand craft Product Sri lanka\r\nHome Made\r\n100% Hand made', 'TOY & ENTERTAINMENT', 'images/Category/toy&ent/4/'),
(31, 'Wooden Toy Hand Made', 8.66, 3, 12, 'Hand craft Product Sri lanka\r\nHome Made\r\n100% Hand made', 'TOY & ENTERTAINMENT', 'images/Category/toy&ent/5/'),
(32, 'Wedding Decorations Letter', 5.22, 4, 5, 'Wedding Decorations Letter Mr & Mrs Decor Props Just Married Wedding Events Party DIY Decoration Supplies Wedding Sign\n Extra 2% Off\n4.7\n283 Reviews\n2229 orders\nShop now & save more!\nLKR 1,167.1', 'WEDDING & PARTY', 'images/Category/wed&party/3/'),
(33, 'Handmade Jute Hessian Burlap Flowers Rose ', 8.66, 4, 5, ' Shabby Chic Rustic Wedding Decoration Table Christmas Party DIY Supplies\r\n Extra 2% Off\r\n4.8\r\n181 Reviews\r\n671 orders\r\nLKR 500.72 - 1,069.89LKR 832.14 - 1,783.15-40%', 'WEDDING & PARTY', 'images/Category/wed&party/4/'),
(34, 'Tissue Paper Pompom Garland Rustic Weeding Decorat', 1.55, 4, 5, '10cm 15cm Weddings Decor Party Decor Bridal Shower Baby\r\nLKR 1,080.70 off every LKR 10,806.95 spent\r\n4.8\r\n611 Reviews\r\n2344 orders\r\nLKR 270.17 - 1,347.27 / lot (5 Pieces)', 'WEDDING & PARTY', 'images/Category/wed&party/5/');

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
(5, 'dsfds', 'fdsf@gmail.com', 'dsfdsf', '', ''),
(6, 'Eshadi kalharaa', 'mek13@gmail.com', '7442', '', '');

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
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
