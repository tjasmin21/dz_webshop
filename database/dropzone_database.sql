-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Dez 2017 um 04:51
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dropzone_database`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Ton'),
(2, 'Bild');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total_amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amt`) VALUES
(1, 1, '0', 0, 'Samsung Dous 2', 'samsung mobile.jpg', 1, 5000, 5000),
(2, 2, '0', 0, 'iPhone 5s', 'iphone mobile.jpg', 1, 25000, 25000),
(12, 1, '0', 6, 'Mastering', 'samsung mobile.jpg', 1, 100, 100),
(13, 5, '0', 6, 'Digitale Aufnahmen bearbeitet', 'ipad 2.jpg', 1, 140, 140),
(14, 5, '0', 7, 'Digitale Aufnahmen bearbeitet', 'ipad 2.jpg', 1, 140, 140);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mastering'),
(2, 'Recording'),
(3, 'Vermietung'),
(4, 'Vermittlung'),
(5, 'Photographie'),
(6, 'Videobearbeitung'),
(7, 'Videoproduktion');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `pages`
--

INSERT INTO `pages` (`id`, `page`, `private`) VALUES
(1, 'account.php', 1),
(2, 'admin_configuration.php', 1),
(3, 'admin_page.php', 1),
(4, 'admin_pages.php', 1),
(5, 'admin_permission.php', 1),
(6, 'admin_permissions.php', 1),
(7, 'admin_user.php', 1),
(8, 'admin_users.php', 1),
(9, 'forgot-password.php', 0),
(10, 'index.php', 0),
(11, 'left-nav.php', 0),
(12, 'logout.php', 1),
(13, 'register.php', 0),
(14, 'user_settings.php', 1),
(15, 'change_language.php', 0),
(16, 'httpsprache.php', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'Customer'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `permission_page_matches`
--

CREATE TABLE `permission_page_matches` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `permission_page_matches`
--

INSERT INTO `permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 17),
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9),
(12, 2, 14),
(13, 2, 17);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 1, 'Mastering', 100, 'Samsung Dous 2 sgh ', 'samsung mobile.jpg', 'samsung mobile electronics'),
(5, 2, 1, 'Digitale Aufnahmen bearbeitet', 140, 'samsung ipad', 'ipad 2.jpg', 'ipad tablet samsung'),
(6, 2, 1, 'Digitale Aufnahmen unbearbeitet', 80, 'Hp Red and Black combination Laptop', 'k2-_ed8b8f8d-e696-4a96-8ce9-d78246f10ed1.v1.jpg-bc204bdaebb10e709a997a8bb4518156dfa6e3ed-optim-450x450.jpg', 'hp laptop '),
(7, 2, 1, 'Akkustische Instrumente bearbeitet', 140, 'Laptop Hp Pavillion', '12039452_525963140912391_6353341236808813360_n.png', 'Laptop Hp Pavillion'),
(8, 5, 2, 'Shootings', 0, 'Sony Mobile', 'sony mobile.jpg', 'sony mobile'),
(9, 2, 1, 'Akkustische Instrumente unbearbeitet', 80, 'iphone', 'white iphone.png', 'iphone apple mobile'),
(10, 5, 2, 'Landschaft / Themenbilder', 0, 'red dress for girls', 'red dress.jpg', 'red dress '),
(11, 5, 2, 'Events', 0, 'Blue dress', 'images.jpg', 'blue dress cloths'),
(12, 6, 2, 'Vertonung', 100, 'ladies casual summer two colors pleted', '7475-ladies-casual-dresses-summer-two-colors-pleated.jpg', 'girl dress cloths casual'),
(32, 2, 1, 'Vocal bearbeitet', 120, 'book shelf', 'furniture-book-shelf-250x250.jpg', 'book shelf furniture'),
(33, 3, 1, 'PA', 300, 'Refrigerator', 'CT_WM_BTS-BTC-AppliancesHome_20150723.jpg', 'refrigerator samsung'),
(34, 7, 2, 'Visual Effects', 0, 'Emergency Light', 'emergency light.JPG', 'emergency light'),
(35, 4, 1, 'Band', 0, 'Vaccum Cleaner', 'images (2).jpg', 'Vaccum Cleaner'),
(36, 7, 2, 'zusätzliches Personal', 0, 'gj', 'iron.JPG', 'iron'),
(37, 7, 2, 'Special Shots', 140, 'LED TV', 'images (4).jpg', 'led tv lg'),
(38, 7, 2, 'Drohnenaufnahme', 180, 'Microwave Oven', 'images.jpg', 'Microwave Oven'),
(39, 7, 2, 'Song Komposition', 100, 'Mixer Grinder', 'singer-mixer-grinder-mg-46-medium_4bfa018096c25dec7ba0af40662856ef.jpg', 'Mixer Grinder'),
(45, 4, 1, 'Instrument', 0, '0', 'samsung_galaxy_note3_note3neo.JPG', 'samsung galaxy Note 3 neo'),
(46, 4, 1, 'Gesang', 0, '', 'samsung_galaxy_note3_note3neo.JPG', 'samsung galxaxy note 3 neo');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `address`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`) VALUES
(1, '', '0', 'admin', '', '48cea680d82daa656d4c6fa462ec60626e9ff6e62d68186e4b47e8f80e8fb7b9b', 'jasmin.thevathas@sitasys.com', 'c732c8fd673c15571dae51f122f9a80c', 1422009671, 0, 1, 'New Member', 1422009671, 1424434705),
(2, '', '0', 'user3', 'user3', '877f7e4980d13682db38c8aee2558f07075ad8aec46b068e7ae1d352187e1b4b7', 'jasmin.thevathas@sitasys.com', 'ec32e9c8df3050a1cb77982c9cd16c20', 1422979126, 1, 1, 'New Member', 1422979126, 0),
(3, 'Jasmin', 'Thevathas', 'jasmin', 'Oberdorfstrasse 3', '27d57eab9067af9119de896aa553d307fdbc9b0471d0521195ddaf2e311f71133', 'jasmin.thevathas@hotmail.com', 'fd105786d6b670fcae865d0ad22b4d2a', 1511459513, 0, 1, 'New Member', 1511459513, 0),
(4, 'Asvini', 'Thevathas', 'asvini', 'SchÃ¼tzenweg 14', '0a0583203be320f890989fb1175002e6', 'jasmin.thevathas@sitasys.com', '5454ef9f6840c1d48ef92bab3c01c33d', 1511459735, 0, 1, 'New Member', 1511459735, 0),
(5, 'Asvini', 'Thevathas', 'asvini1', 'SchÃ¼tzenweg 14', '0bfff65e563892e8586a9a65379a9fe1', 'jasmin.thevathas@sitasys.com', 'a0759f296214a821e01a48e3fcb2f764', 1511460020, 0, 1, 'New Member', 1511460020, 0),
(6, 'Asvini', 'Thevathas', 'asvini2', 'SchÃ¼tzenweg 14', '25d55ad283aa400af464c76d713c07ad', 'jasmin.thevathas@sitasys.com', '8b3ba6ef5d576207d032d346f0cb60e8', 1513280811, 0, 1, 'New Member', 1513280811, 1514422884),
(7, 'Jasmin', 'Thevathas', 'jasmin5', 'Oberdorfstrasse 3', '96e79218965eb72c92a549dd5a330112', 'jasmin.thevathas@hotmail.com', '45352adf8135fce9aa4a638de18d9cc4', 1514686550, 0, 1, 'New Member', 1514686550, 1514692025);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_permission_matches`
--

CREATE TABLE `user_permission_matches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user_permission_matches`
--

INSERT INTO `user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1),
(7, 6, 1),
(8, 7, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indizes für die Tabelle `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `permission_page_matches`
--
ALTER TABLE `permission_page_matches`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user_permission_matches`
--
ALTER TABLE `user_permission_matches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `permission_page_matches`
--
ALTER TABLE `permission_page_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `user_permission_matches`
--
ALTER TABLE `user_permission_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
