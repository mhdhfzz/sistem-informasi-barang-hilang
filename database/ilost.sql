-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2024 pada 21.11
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `email` varchar(40) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kelamin` char(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`email`, `nama`, `kelamin`, `password`, `image`) VALUES
('fiz@gmail.com', 'M Hafiz', 'L', 'c4ca4238a0b923820dcc509a6f75849b', 'te.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kategori_laporan` varchar(20) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori_barang` varchar(30) DEFAULT NULL,
  `tanggal_ditemukan` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `waktu_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `email`, `kategori_laporan`, `nama_barang`, `deskripsi`, `kategori_barang`, `tanggal_ditemukan`, `lokasi`, `gambar_barang`, `waktu_dibuat`) VALUES
(12, 'tifany@gmail.com', 'Temuan', 'Jam Tangan', 'Jam tangan warna coklat', 'perhiasan', '2024-01-01', 'Gedung E UNAND', '659d9ce69623ajam-tangan.jpeg', '2024-01-01 02:22:14'),
(13, 'tifany@gmail.com', 'Hilang', 'Kunci Motor', 'Kunci motor dengan gantungan berwarna coklat', 'kendaraan', '2024-01-02', 'Gedung F UNAND', '659d9d3491353kunci-motor.jpeg', '2024-01-02 02:23:32'),
(14, 'ciafiz111@gmail.com', 'Temuan', 'Cincin', 'Cincin berwarna emas', 'perhiasan', '2024-01-04', 'Auditorium UNAND', '659da3cbaba63cincin.jpeg', '2024-01-04 12:51:39'),
(15, 'ciafiz111@gmail.com', 'Hilang', 'Botol Minum', 'Botol minum warna ungu', 'lainnya', '2024-01-08', 'Gedung E1.5 UNAND', '659da46114f6bbotol-minum.jpeg', '2024-01-09 10:54:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(40) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kelamin` char(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kontak` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `username`, `nama`, `kelamin`, `password`, `gambar`, `kontak`) VALUES
('ciafiz111@gmail.com', 'mhafiz001', 'Muhammad Hafiz', 'L', '$2y$10$hNguVtwyHpPof/c69aKfxOJ6rfUAND8gTjeHlwJ21MupVHKyVe2u.', '659a980ca444837520194_p0 - チェルシー.png', '0823'),
('tifany@gmail.com', 'tifany_', 'Tifany Anant', 'P', '$2y$10$5vCbcJzh/hPIbMHF/B6ij.L9ZK175rHWzr02kh04snSphvwx2ntNi', '659da36295b7aaoi-ogata-bx-girlz.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`email`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
