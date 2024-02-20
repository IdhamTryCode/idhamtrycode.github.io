-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2022 pada 08.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`) VALUES
(128, 'Lancelot', 'Land of Dawn', 'Airport West'),
(2, 'Naruto', 'Konoha Barat Baru', 'Yarravile'),
(3, 'Goku', 'Namek Timur dekat pos ronda', 'Airport West'),
(4, 'Jisoo', 'Citayem, Korea Selatan', 'Box Hill'),
(5, 'Alan Walker', 'Pulau seribu', 'Airport West'),
(6, 'Balmond', 'Mobile Legend', 'Box Hill');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` float(6,2) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`) VALUES
(1, 3, 69.98, '2000-04-02'),
(2, 1, 49.99, '2000-04-15'),
(3, 2, 74.98, '2000-04-19'),
(4, 3, 24.99, '2000-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `shoes_id` char(13) NOT NULL,
  `quantity` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`orderid`, `shoes_id`, `quantity`) VALUES
(1, '0-672-31697-8', 2),
(2, '0-672-31769-9', 1),
(3, '0-672-31769-9', 1),
(3, '0-672-31509-2', 1),
(4, '0-672-31745-1', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shoes`
--

CREATE TABLE `shoes` (
  `shoes_id` varchar(13) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `price` float(6,2) DEFAULT NULL,
  `pic` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shoes`
--

INSERT INTO `shoes` (`shoes_id`, `merk`, `type`, `price`, `pic`) VALUES
('1', 'Air Jordan', 'AJ 1 Retro High Red', 490.99, 'shoes-1.png'),
('2', 'Nike', 'Air Force 1 White', 250.99, 'shoes-2.webp'),
('3', 'Under Armour', 'Curry 7', 220.99, 'shoes-3.png'),
('4', 'Adidas', 'Yeezy Ultraboost 3 Black', 300.99, 'shoes-4.png'),
('5', 'Adidas', 'Gazelle Blue', 99.99, 'shoes-5.png'),
('6', 'Puma', 'Blaze White Black', 150.99, 'shoes-6.png'),
('7', 'Nike', 'Air Max 97 White', 180.99, 'shoes-7.png'),
('8', 'Nike', 'Revolution 6 Black', 130.99, 'shoes-8.png'),
('9', 'Compass', 'Gazelle Black', 50.99, 'shoes-9.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shoes_reviews`
--

CREATE TABLE `shoes_reviews` (
  `isbn` char(13) NOT NULL,
  `review` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shoes_reviews`
--

INSERT INTO `shoes_reviews` (`isbn`, `review`) VALUES
('0-672-31697-8', 'Morgan\'s book is clearly written and goes well beyond \r\n                     most of the basic Java books out there.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `role`) VALUES
(1, 'idham@admin.com', '12345', 'admin'),
(3, 'idham@customer.com', '12345', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`orderid`,`shoes_id`);

--
-- Indeks untuk tabel `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoes_id`);

--
-- Indeks untuk tabel `shoes_reviews`
--
ALTER TABLE `shoes_reviews`
  ADD PRIMARY KEY (`isbn`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
