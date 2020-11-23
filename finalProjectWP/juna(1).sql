-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2020 pada 08.57
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juna`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `kode` varchar(12) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `kode`, `judul`, `pengarang`, `penerbit`, `tipe`, `harga`, `gambar`) VALUES
(1, '0001', 'Goosebumpp', 'travis sekut', 'travis sekut', 'non-fiksi', 10000, 'default.jpg'),
(2, '0002', 'sicko mode', 'travis sikut', 'travis sikut', 'non-fiksi', 12000, 'default.jpg'),
(4, '0004', 'Astronomical', 'travisss', 'travisss', 'pelajaran', 30000, 'default.jpg'),
(5, '0005', 'The jungle book', 'tarzan', 'tarzan jr', 'non-fiksi', 13000, 'default.jpg'),
(9, '0008', 'Sugar', 'maroon5', 'maroon5', 'fiksi', 10000, '9786024814526_Setan_Pesugihan_NAIK_CETAK_HIRES_-1.jpg'),
(10, '0012', 'The city', 'eduardo', 'tarno kopling', 'fiksi', 90000, 'hauto.jpg'),
(13, '0014', 'Komik Dilan Bagian 2', 'Mizan Media Utama Pt', 'Pidi Baiq', 'fiksi', 79000, '9786024814526_Setan_Pesugihan_NAIK_CETAK_HIRES_-1.jpg'),
(16, '1203891298', 'sdhfjh', 'hsjkdh`', 'hasfjkh', 'pelajaran', 263, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `number`, `password`) VALUES
(1, 'Parker', 0, 'hallo'),
(2, 'Parkur', 2147483647, '1234'),
(3, 'Bambang', 234890, 'bamskuy'),
(4, 'bamski', 123890, 'alsdfjk'),
(5, 'asdfhjk', 12378, 'asfhjk'),
(6, 'asdfjk', 23478, 'dsh'),
(7, 'asdfjkl', 234789, 'sdjkl'),
(8, 'asdjkl', 24789, 'ashj'),
(9, 'asdk', 2378, 'shjk'),
(10, 'asdjk', 123789, 'dhja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `number` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `role` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `alamat`, `number`, `image`, `role`) VALUES
(1, 'AdminGans', '123123', 'manangg', '081237526491', 'pngwing.com.png', 1),
(2, 'Member', '123123', 'manung', '08979867', 'default.jpg', 2),
(3, 'User', '123123', 'sambeng', '8923098', 'default.jpg', 2),
(5, 'bamsky', '123123', 'gone', '123123', 'default.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
