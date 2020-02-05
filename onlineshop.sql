-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2020 pada 20.36
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `qty`, `deskripsi`, `gambar`) VALUES
(1, 'asdasd', 1000000, 123123, 'asdasd', 'logos.png'),
(2, 'baranga', 10000, 10, 'asdasd', 'x.jpg'),
(3, 'hais', 20000, 20, 'kajsbd', 'x.jpg'),
(4, 'asdasd', 1000000, 123123, 'asdasd', 'logos.png'),
(5, 'baranga', 10000, 10, 'asdasd', 'x.jpg'),
(6, 'hais', 20000, 20, 'kajsbd', 'x.jpg'),
(7, 'asdasd', 1000000, 123123, 'asdasd', 'logos.png'),
(8, 'baranga', 10000, 10, 'asdasd', 'x.jpg'),
(9, 'hais', 20000, 20, 'kajsbd', 'x.jpg'),
(10, 'asdasd', 1000000, 123123, 'asdasd', 'logos.png'),
(11, 'baranga', 10000, 10, 'asdasd', 'x.jpg'),
(12, 'hais', 20000, 20, 'kajsbd', 'x.jpg'),
(13, 'baranga', 10000, 10, 'asdasd', 'x.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_barang` int(11) NOT NULL,
  `no_transaksi` varchar(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `nama_pembeli` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `no_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`no_keranjang`, `id_barang`, `qty`, `id_user`) VALUES
(1, 3, 1, 0),
(2, 3, 30, 0),
(3, 3, 12, 0),
(4, 3, 12, 1),
(5, 3, 1, 1),
(6, 1, 1, 1),
(7, 2, 1, 1),
(8, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `username` varchar(56) NOT NULL,
  `telepon` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `email`, `password`, `username`, `telepon`) VALUES
(1, 'asd@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'asgdk', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `no_transaksi` varchar(11) NOT NULL,
  `nama_pembeli` varchar(128) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`no_keranjang`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `no_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
