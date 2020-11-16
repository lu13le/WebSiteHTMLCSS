-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 03:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kafeterijanbgd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `product_id` int(5) NOT NULL,
  `kolicina` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `product_id`, `kolicina`) VALUES
(46, '', 1, 1),
(54, '', 26, 1),
(107, 'lule', 1, 1),
(108, 'lule', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`ime`, `prezime`, `email`, `username`, `password`, `id`) VALUES
('ana', 'marjanovic', 'ana95@gmail.com', 'anciklik', '$2y$10$BSvXrr.bwoCtM9HevmKSfOXQWnfOcdakQyd2c6Knc4KejAp4uOKue', 1),
('Banana', 'Banananic', 'banana@gmail.com', 'bana123', '$2y$10$grLRBolxMnaUMjW0h9eKwuzEjYqCpENjZFmvTNxQrZxGfJ9CHlRnO', 2),
('hana', 'hanic', 'hana@gmail.com', 'hana123', '$2y$10$Fqr96gnVKEqLuIJHB1aNV.bYW5FyAQaygbzA.50Uivw6aU4J8Wh5a', 3),
('laza', 'lazic', 'laz@gmail.com', 'laza123', '$2y$10$EZ4TTVOEX961obh/MDLmgubPhuoM2yI8OYY/g9xojiIBfQwigd6R2', 6),
('Malina', 'Bela', 'mal@gmail.com', 'malina1234', 'malina123', 7),
('Mare', 'Ze', 'zivo@gmail.com', 'marko123', '$2y$10$sESYSXJVo4JxJeAQ2c2o8.FTfHnce8FGSiZY/DxTodP2k4aby.3wu', 8),
('Marko', 'Zivojinovic', 'mare96@gmail.com', 'mare123', '$2y$10$NhGrwPOSpWSqalIedmZ7uug', 9),
('Nikola', 'Zivkovic', 'nidza98@gmail.com', 'Nikola98', '$2y$10$AG0U0xHgqTT0MEwxjmSFiu9', 10),
('novica', 'zivkovic', 'nonis@gmail.com', 'nole123', '$2y$10$BSRv.2VgEnmHNH4Jw0oUi.61Q9mrpr9MH8BbG/.21Hf27bbpRXDeW', 11),
('Pera', 'Peric', 'perapera@gmail.com', 'pera123', '$2y$10$HqZ4b59xGks2pxbSV7Cr..9', 12),
('sima', 'simic', 'simke@gmail.com', 'sima123', '$2y$10$mHafFhEcSK4gUndJ/yhzC.7q6o2bUCCD1db4y6WvGDbqVwPkBzkLC', 13),
('Jovana', 'Jovanovic', 'jojo@gmail.com', 'jojo123', 'jojo123', 18),
('Lazar', 'Adjancic', 'lazar53017@its.edu.rs', 'laki123', '$2y$10$GcAex1TW.60xsN6oN7lbxeZK5bRU3w6tHFpanneVN0weo2b.LLrhm', 19),
('Luka', 'Raicevic', 'raicevic12345@gmail.com', 'luka', 'luka', 20),
('Luka', 'Raicevic', 'raicevic12345@gmail.com', 'luka', 'luka', 21),
('Luka', 'Raicevic', 'raicevic12345@gmail.com', 'luka', 'luka', 22),
('Murtic', 'Raicevic', 'radicmilo@gmail.com', 'dada1', '$2y$10$UQ6A2jVTOKuvA0OUvSc7huGustXfvrS5Wx.tAafQ6z0Fgo1P1rVNK', 23),
('ada', 'dad', 'dad@gmail.com', 'da2', '$2y$10$p14.442CfVVP6ApNtQaSluia4YNebnPPfjFPc0qaCPliTy0gyKzCG', 24),
('Luka', 'Raicevic', 'raicevic12345@gmail.com', 'luka', 'luka', 25),
('Luka', 'Raicevic', 'raicevic12345@gmail.com', 'luka', 'luka', 26),
('Profesor', 'Profesor', 'profa@gmail.com', 'profa', '$2y$10$YAcxF0i9kJC6ekdorwb8sumTm5upF2DbZVpM7Uq8XrYjvfd2yPBmu', 28),
('Stojadin', 'Raicevic', 'radicmilo@gmail.com', '1313', '$2y$10$gykd4opYHdB8XXJltgE/N.no/sG1Auw0Y3WSi98rsqFlBf.6WHH2S', 29),
('Lazar', 'Lazic', 'laza@gmail.com', 'laza', '$2y$10$rF//Uvyli0bxwLBqzCrQvu7liMPCUKDPGpBdqfqc9RHDtns71qkOS', 31),
('Luka', 'Raicevic', 'raicevic12345@gmail.com', 'lule', '$2y$10$sDDTsuIhvO7hTFvNldl9neQ4WelLTiZtZWSJL.RVxQILY8TvTzTf6', 34);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `korime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `naslov` varchar(30) NOT NULL,
  `poruka` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `ime`, `korime`, `email`, `naslov`, `poruka`) VALUES
(1, 'Nikola Zivkovic', 'neulogovan', 'nidza98@hotmail.com', 'DDD', 'ikjdjj'),
(2, 'Nikola Zivkovic', 'neulogovan', 'nikola8217@its.edu.rs', 'fff', 'gggg'),
(3, 'Nikola Zivkovic', 'marko123', 'ime.prezime@nesto.info', 'sss', 'dddd'),
(4, 'Luka Raicevic', 'luka4717', 'raicevic12345@gmail.com', 'Kontakt', 'ne valja stranica'),
(5, 'Luka Raicevic', 'luka4717', 'raicevic12345@gmail.com', 'Kontakt', 'Mrzim vas\r\n'),
(6, 'Luka Raicevic', 'neulogovan', 'raicevic12345@gmail.com', 'Kontakt', 'dada'),
(7, '', 'neulogovan', '', '', ''),
(8, '', 'neulogovan', '', '', ''),
(9, 'Luka Raicevic', 'luka4717', 'luka4717@its.edu.rs', 'Kontakt', 'adada'),
(10, 'Luka Raicevic', 'miki', 'raicevic12345@gmail.com', 'Kontakt', 'asdada'),
(11, 'Luka Raicevic', 'miki', 'raicevic12345@gmail.com', 'Kontakt', 'adadad'),
(12, 'Luka Raicevic', 'neulogovan', 'raicevic12345@gmail.com', 'a', 'Super ste');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice`
--

CREATE TABLE `narudzbenice` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `addres` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbenice`
--

INSERT INTO `narudzbenice` (`id`, `username`, `price`, `addres`, `file`) VALUES
(1, 'marko123', 630, 'ttttt', '2020 Aug Tue_marko123.txt'),
(2, 'marko123', 1140, 'beograd', '2020 Aug Tue_marko123.txt'),
(3, 'marko123', 460, 'veliko crnice', '2020 Aug Wed_marko123.txt'),
(4, 'marko123', 640, 'fghfgh', '2020 Sep Fri_marko123.txt'),
(5, 'laki123', 1422, 'zarkovo', '2020 Sep Thu_laki123.txt'),
(6, 'marko123', 220, 'hhh', '2020 Sep Fri_marko123.txt'),
(7, 'luka4717', 140, 'Balkanska 92', '2020 Sep Thu_luka4717.txt'),
(8, 'luka4717', 350, 'Balkanska 92', '2020 Sep Thu_luka4717.txt'),
(9, 'luka4717', 150, 'Balkanska 92', '2020 Sep Thu_luka4717.txt'),
(10, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(11, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(12, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(13, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(14, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(15, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(16, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(17, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(18, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(19, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(20, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(21, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(22, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(23, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(24, 'da2', 200, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(25, 'da2', 0, 'Balkanska 92', '2020 Sep Fri_da2.txt'),
(26, 'luka4717', 220, 'Balkanska 92', '2020 Sep Fri_luka4717.txt'),
(27, 'luka4717', 150, 'Balkanska 92', '2020 Sep Fri_luka4717.txt'),
(28, 'luka4717', 370, 'Balkanska 92', '2020 Sep Fri_luka4717.txt'),
(29, 'luka4717', 370, 'Balkanska 92', '2020 Sep Fri_luka4717.txt'),
(30, 'luka4717', 150, 'Balkanska 92', '2020 Sep Fri_luka4717.txt'),
(31, 'luka4717', 150, 'Balkanska 92', '2020 Sep Fri_luka4717.txt'),
(32, 'luka4717', 220, 'Balkanska 92', '2020 Sep Fri_luka4717.txt'),
(33, 'miki', 200, 'Balkanska 92', '2020 Sep Fri_miki.txt'),
(34, 'miki', 150, 'Balkanska 92', '2020 Sep Fri_miki.txt'),
(35, 'miki', 300, 'Balkanska 92', '2020 Sep Fri_miki.txt'),
(36, 'miki', 230, 'Balkanska 92', '2020 Sep Wed_miki.txt'),
(37, 'miki', 0, 'Balkanska 92', '2020 Sep Wed_miki.txt'),
(38, 'miki', 900, 'Balkanska 92', '2020 Sep Wed_miki.txt'),
(39, 'profa', 220, 'Balkanska 92', '2020 Sep Wed_profa.txt'),
(40, 'miki', 80, 'Balkanska 92', '2020 Sep Wed_miki.txt'),
(41, '1313', 80, 'Balkanska 92', '2020 Sep Wed_1313.txt'),
(42, 'miki', 200, 'Balkanska 92', '2020 Oct Fri_miki.txt'),
(43, 'nevena', 260, 'Balkanska 92', '2020 Oct Fri_nevena.txt'),
(44, 'nevena', 380, 'Balkanska 92', '2020 Oct Fri_nevena.txt'),
(45, 'nevena', 900, 'Balkanska 92', '2020 Oct Fri_nevena.txt'),
(46, 'nevena', 150, 'Balkanska 92', '2020 Oct Fri_nevena.txt'),
(47, 'laza', 180, 'Balkanska 92', '2020 Oct Sat_laza.txt'),
(48, 'nevena', 80, 'Balkanska 92', '2020 Oct Sat_nevena.txt'),
(49, 'nevena', 313, 'Balkanska 92', '2020 Oct Sat_nevena.txt'),
(50, 'lule', 410, 'Balkanska 92', '2020 Oct Sat_lule.txt'),
(51, 'lule', 313, 'Balkanska 92', '2020 Oct Sat_lule.txt');

-- --------------------------------------------------------

--
-- Table structure for table `products1`
--

CREATE TABLE `products1` (
  `id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products1`
--

INSERT INTO `products1` (`id`, `type`, `name`, `model`, `code`, `price`, `image`) VALUES
(1, 'Kafa', 'Cappuccino', '1', '1', 313, 'img/cap.jpg'),
(2, 'Kafa', 'Caffee Latte', '2', '2', 200, 'img/late.jpg'),
(5, 'Kafa', 'Esperesso', '3', '3', 220, 'img/espr.jpg'),
(7, 'Kafa', 'Macchiato', '4', '4', 260, 'img/mac.png'),
(9, 'Kafa', 'Iced Coffee', '5', '5', 270, 'img/ice.jpg'),
(11, 'Kafa', 'Turkish Coffee', '6', '6', 80, 'img/tur.jpg'),
(16, 'Kafa', 'Caffee Americano', '7', '7', 150, 'img/amer.jpg'),
(17, 'Kafa', 'Irish Coffee', '8', '8', 300, 'img/ir.jpg'),
(18, 'Kafa', 'Frappuccino', '9', '9', 245, 'img/frap.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products1`
--
ALTER TABLE `products1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products1`
--
ALTER TABLE `products1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
