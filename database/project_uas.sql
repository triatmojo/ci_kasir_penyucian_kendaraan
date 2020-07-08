-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Jan 2020 pada 02.30
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `jenis`, `biaya`) VALUES
(2, 'Sepeda Motor', 10000),
(5, 'Mobil', 25000),
(21, 'Truck', 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembali` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_nota`, `jenis`, `nama`, `bayar`, `kembali`, `total`, `tanggal`, `id_user`) VALUES
(63, 'C001', '25000', 'Sandhika Galih', 50000, 25000, 25000, '2019-12-03', 1),
(64, 'C002', '25000', 'robot qu', 100000, 75000, 25000, '2019-12-18', 1),
(66, 'C003', '25000', 'Lukki', 50000, 25000, 25000, '2019-12-19', 1),
(67, 'C004', '25000', 'Beni', 100000, 75000, 25000, '2019-12-19', 1),
(68, 'C005', '25000', 'Asyil', 100000, 75000, 25000, '2019-12-27', 1),
(69, 'C006', '250000', 'Steve', 300000, 50000, 250000, '2019-12-27', 19),
(70, 'C007', '25000', 'Ananda', 50000, 25000, 25000, '2019-12-27', 19),
(71, 'C008', '10000', 'robot qu', 10000, 0, 10000, '2019-12-27', 1),
(72, 'C009', '10000', 'Keysa', 10000, 0, 10000, '2019-12-28', 1),
(74, 'C010', '250000', 'apsarini', 500000, 250000, 250000, '2020-01-02', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`, `active`) VALUES
(1, 'admin', '$2y$10$V7XnOjANTwF3gd7QtfMTGO2IrS4Ryq8KS4bN8CZY7XHj7A5n5tZfO', 'Steve Jobs', 'Ds. Bareng, Kec. Sawahan Kab. Nganjuk - Jawa Timur', '085735501035', 1, 1),
(19, 'angga', '$2y$10$SB1tl/6WC4DLTrNyx/5YAelNiQFrtlzw0Hz1rs6rV8JJwwDfHVQne', 'angga risky', 'bogor', '0899212123', 2, 1),
(23, 'nurul', '$2y$10$9fXfptATgDBK9dG0wW0KCOHtnElMeT0qiiwYvnTd.kr7XNfJU6tp2', 'nurul cayank', 'lewiliang', '99999999', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
