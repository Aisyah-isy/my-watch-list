-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 02:16 AM
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
-- Database: `ais_ani`
--

-- --------------------------------------------------------

--
-- Table structure for table `caraousel`
--

CREATE TABLE `caraousel` (
  `title_car` varchar(200) NOT NULL,
  `sub_title` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caraousel`
--

INSERT INTO `caraousel` (`title_car`, `sub_title`, `image`) VALUES
('Friendly UserInterface', 'Give a perfect user experience.', '20240729141703.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(75) NOT NULL,
  `fill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `id_user`, `name`, `email`, `fill`) VALUES
(6, 2, 'baa', 'iniakunjasaa1@gmail.com', 'tambah genre');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `id_fav` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_list` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`id_fav`, `id_user`, `id_genre`, `id_list`, `id_type`) VALUES
(14, 2, 3, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(2, 'Romance'),
(3, 'Sc-fi'),
(4, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id_list` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `watch` enum('Belum ditonton','Sedang ditonton','Selesai ditonton') NOT NULL,
  `statues` enum('Ongoing','Completed') NOT NULL,
  `release_at` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime NOT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id_list`, `id_user`, `id_genre`, `id_type`, `title`, `description`, `rate`, `watch`, `statues`, `release_at`, `create_at`, `update_at`, `slug`, `image`) VALUES
(13, 2, 4, 2, 'Llyoid de saloumn', 'Di kehidupan masa lalunya, Pangeran Lloyd de Saloum adalah orang biasa yang tidak bisa mahir dalam sihir, tidak peduli seberapa berpengetahuan atau terobsesinya dia tentang sihir. Sekarang bereinkarnasi ke dalam garis keturunan kerajaannya saat ini, dia menerima tubuh dengan mana yang tampaknya tak ada habisnya, membuat keinginannya untuk menguasai segala hal yang misterius dapat dicapai. Terlebih lagi, sebagai pangeran ketujuh kerajaan, Lloyd tidak memiliki klaim atas takhta, sehingga dia bisa mengembangkan kemampuannya sebebas yang dia inginkan. Sayangnya bagi Lloyd, segel kuno yang memenjarakan iblis kuat mulai rusak dan melepaskan kengerian di dalamnya, sehingga membahayakan perdamaian. Dengan monster-monster yang berkeliaran, kekuatan magis Lloyd yang luar biasa adalah senjata pamungkas yang dapat menetralisir ancaman-ancaman ini sebelum segala sesuatunya berubah menjadi kekacauan.', 8, 'Sedang ditonton', 'Ongoing', '2024-04-02', '2024-07-29 12:19:57', '2024-07-29 19:19:57', 'Llyoid-de-saloumn', '20240606084036.jpg'),
(14, 2, 5, 2, 'The Promise Neverland', 'Dikelilingi oleh hutan dan pintu masuk yang berpagar, Grace Field House dihuni oleh anak-anak yatim piatu yang hidup bahagia bersama sebagai satu keluarga besar, diasuh oleh \"Mama\" mereka, Isabella. Meskipun mereka diharuskan mengikuti tes setiap hari, anak-anak bebas menghabiskan waktu mereka sesuai keinginan mereka, biasanya bermain di luar, selama mereka tidak pergi terlalu jauh dari panti asuhan—sebuah aturan yang harus mereka patuhi, apa pun yang terjadi. Namun, masa-masa indah harus berakhir, karena setiap beberapa bulan, seorang anak diadopsi dan dikirim untuk tinggal bersama keluarga baru mereka, dan tidak pernah terdengar lagi kabarnya.\r\n\r\nNamun, ketiga kakak beradik tersebut memiliki kecurigaan terhadap apa yang sebenarnya terjadi di panti asuhan tersebut, dan mereka akan mengetahui nasib kejam yang menanti anak-anak yang tinggal di Grace Field, termasuk sifat memutarbalikkan Mama tercinta mereka.', 8, 'Selesai ditonton', 'Completed', '2024-05-27', '2024-06-06 02:16:10', '0000-00-00 00:00:00', 'The-Promise-Neverland', '20240606091609.jpg'),
(15, 2, 2, 2, 'Drama Korea', '', 7, 'Belum ditonton', 'Completed', '2024-04-06', '2024-07-29 12:19:17', '2024-07-29 19:19:17', 'Drama-Korea', '20240606091702.jpg'),
(16, 2, 3, 2, 'Drama cina', '', 7, 'Sedang ditonton', 'Completed', '2024-05-02', '2024-07-29 12:02:12', '2024-07-29 19:02:12', 'Drama-cina', '20240606091742.jpg'),
(17, 14, 5, 2, 'Promise Neverland', 'maaaasaaaaa', 9, 'Sedang ditonton', 'Completed', '2024-06-06', '2024-06-06 03:29:42', '2024-06-06 10:29:42', 'Promise-Neverland', '20240606102924.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `type_name`) VALUES
(1, 'Kdrama'),
(2, 'Anime'),
(3, 'Cdrama'),
(4, 'Jdrama'),
(5, 'LiveAction');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_active` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `email`, `role`, `create_at`, `last_active`) VALUES
(2, 'aisyah', 'a', '202cb962ac59075b964b07152d234b70', 'iniakunjasaa1@gmail.com', 'Admin', '2024-05-25 13:09:09', '0000-00-00 00:00:00'),
(14, 'sasa', 'sa', '03c7c0ace395d80182db07ae2c30f034', 'sasa@gmail.com', 'User', '2024-06-06 09:23:01', '0000-00-00 00:00:00'),
(15, 'aaa', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'asasa@mail.com', 'User', '2024-07-29 18:50:44', '0000-00-00 00:00:00'),
(16, 'ma', 'm', '6f8f57715090da2632453988d9a1501b', '', '', '2024-09-26 14:56:58', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id_fav`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
