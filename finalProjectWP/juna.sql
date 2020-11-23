-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2020 pada 23.59
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.18

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
(1, '0001', 'Hope', 'Dr. dr. Amang Surya Priyanto ', 'travis sekut', 'non-fiksi', 160000, 'hope.jpg'),
(2, '0002', 'Play the danish', 'Iben Dissin Sandahl ', 'travis sikut', 'non-fiksi', 49300, 'play.jpg'),
(4, '0050', 'Java script', 'Ir. Yuniar Supardi ', 'drake', 'pelajaran', 56000, 'js.jpg'),
(5, '0005', 'Sosiologi Sastra', 'Sapardi Djoko Damono ', 'tarzan jr', 'non-fiksi', 78400, 'sosiologi.jpg'),
(9, '0027', 'Untuk kamu', 'Tissa Biani', 'Bukune', 'fiksi', 88000, 'untuk.jpg'),
(13, '0028', 'Even Though', 'Yonezawa Honobu ', 'Yonezawa Honobu ', 'fiksi', 103000, 'even.jpg'),
(16, '12038', 'SPSS', 'Singgih Santoso ', 'hasfjkh', 'pelajaran', 100000, 'spss.jpg'),
(17, '0029', 'Midnight Sun', 'Stephenie Meyer', 'Bukkue', 'fiksi', 198000, 'matahari.jpg'),
(18, '0030', 'Naga, Jangan Bucin!', 'Andhyrama', 'Bentang Belia', 'fiksi', 75650, 'Naga, Jangan Bucin!.jpg'),
(19, '0033', 'Bising', 'Kurniawan Gunadi ', 'bukune', 'fiksi', 45900, 'bising.jpg'),
(20, '0036', 'Kosan 6 Hari', 'Dayroit', 'Bukkue', 'fiksi', 63750, 'kosan.jpg'),
(21, '0039', 'Ku Harap Kau', 'Alois A. Nugroho', 'drake', 'fiksi', 40000, 'kuharap.jpg'),
(22, '0040', 'My daily Jurnal', '@risstudy', 'drake', 'fiksi', 76000, 'my.jpg'),
(23, '0042', 'Empedu Tanah', 'Inggit Putria Marga', 'drake', 'fiksi', 64000, 'empedu.jpg'),
(24, '0043', 'Rewrite', 'Azahra Natasyaafhjkd', 'bukuku', 'fiksi', 98000, 'rewrite.jpg'),
(25, '0050', 'Jangan DIklik 2', 'Dadan Erlangga', 'sekut', 'fiksi', 75200, 'jangan.jpg'),
(26, '723', 'Geez & Ann', 'Rintik Sedu', 'sekut', 'fiksi', 61600, 'geez.jpg'),
(28, '0007', 'Yogya Yoga', 'Herry Gendut Janarto ', 'asdf', 'non-fiksi', 6000, 'yogya.jpg'),
(35, '0091', 'Manajemen Leha', 'Nishida Masaki ', 'swentodd', 'non-fiksi', 71200, 'leh.jpg'),
(36, '0048', 'Selamat Tinggal', 'Tere Liye', 'bukune', 'non-fiksi', 68000, 'peace.jpg'),
(37, '5345', 'Sayang', 'sayangku', 'fsdhjaka', 'non-fiksi', 40190, 'default.jpg'),
(38, '9090', 'YAah pergi', 'hlu', 'halu', 'non-fiksi', 40900, 'default.jpg'),
(39, '0052', 'Word', 'Yudhy Wicaksono ', 'drake', 'pelajaran', 73600, 'word.jpg'),
(40, '0054', 'Java', 'Abdul Kadir ', 'drake', 'pelajaran', 112000, 'java.jpg'),
(41, '0055', 'VB', 'Jubilee Enterprise ', 'skut', 'pelajaran', 52500, 'vb.jpg'),
(42, '0056', 'After Effect', 'Jubilee Enterprise ', 'siko', 'pelajaran', 59200, 'ae.jpg'),
(43, '0057', 'Virus', 'Dedik Kurniawan ', 'aku', 'pelajaran', 56000, 'virus.jpg'),
(44, '0058', 'PhotoShop', 'Jubilee Enterprise ', '', 'pelajaran', 75800, 'ps.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_pesan` int(11) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_buku` varchar(15) NOT NULL,
  `jumlah` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_pesan`, `id_user`, `id_buku`, `jumlah`) VALUES
(35, '5', '9', '2'),
(36, '5', '18', '1'),
(37, '5', '24', '1'),
(38, '5', '28', '1'),
(39, '5', '5', '2'),
(40, '5', '4', '1'),
(41, '5', '43', '2');

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
(1, 'AdminGans', '123123', 'manangg', '081237526491', 'spiderman vs electro.png', 1),
(2, 'Member', '123123', 'manung', '0897986743', 'default.jpg', 2),
(5, 'bamsky', '123123', 'gone', '0812', 'pngwing.com.png', 2),
(9, 'Firstmember', '123123', 'manag', '8123', 'default.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_pesan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
