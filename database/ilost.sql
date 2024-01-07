-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 13.27
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'ciafiz111@gmail.com', 'Hilang', 'Jaket', 'warna biru', 'lainnya', '2023-12-28', 'padang', '6591da041a4a1No Game No Life Wallpaper.jpg', '2024-01-01 04:15:48'),
(3, 'ciafiz111@gmail.com', 'temuan', 'Jaket', 'warna biru', 'lainnya', '2023-12-28', 'padang', '659195b3aa6c4Anime Girl Wallpaper (1).jpg', '2023-12-31 23:07:19'),
(4, 'ciafiz111@gmail.com', 'Hilang', 'tess', 'wafwa', 'perhiasan', '2023-12-04', 'padang', '6591da2b973afTo Your Eternity Wallpaper (1).jpg', '2024-01-01 04:16:27'),
(5, 'ciafiz111@gmail.com', 'temuan', 'setang', 'dwa', 'elektronik', '2023-11-29', 'dwa', '659195b3aa6c4Anime Girl Wallpaper (1).jpg', '2023-12-31 23:24:19'),
(6, 'ciafiz111@gmail.com', 'temuan', 'Jaket', 'wa', 'penting', '2023-12-15', 'wad', '659196ab36c8f79603059_p0 - 栗花落カナヲ.jpg', '2023-12-31 23:28:27'),
(7, 'ciafiz111@gmail.com', 'Hilang', 'dwa', 'daw', 'kendaraan', '2023-12-21', 'dwa', '659436e0d567bAnime Girl Wallpaper.jpg', '2024-01-02 23:16:32');

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
('ciafiz111@gmail.com', 'mhafiz001', 'Muhammad Hafiz', 'L', '$2y$10$hNguVtwyHpPof/c69aKfxOJ6rfUAND8gTjeHlwJ21MupVHKyVe2u.', '659a980ca444837520194_p0 - チェルシー.png', '0823');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
