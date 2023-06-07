-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2022 pada 12.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_persediaanbrg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_brg` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_brg`, `kode_barang`, `nama_barang`, `photo`, `jml`) VALUES
(1, '34354', 'Atap', '', 49),
(2, '73543', 'Besi', '', 75),
(3, 'HJFGJ76', 'Pulpen', '', 65),
(4, 'JHFG', 'STABILO', '', 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_brg_keluar` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_brg_keluar`, `id_brg`, `jml_keluar`, `tgl_keluar`, `id_user`) VALUES
(1, 2, 50, '2022-05-19 12:00:00', '2'),
(2, 1, 17, '2022-05-19 06:29:01', '2'),
(3, 1, 13, '2022-05-19 06:55:11', '2'),
(4, 1, 30, '2022-05-20 07:05:16', '2');

--
-- Trigger `tbl_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `tbl_barang_keluar` FOR EACH ROW BEGIN
UPDATE tbl_barang SET jml=jml - NEW.jml_keluar
WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_brg_masuk` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `jml_masuk` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_brg_masuk`, `id_brg`, `tgl_masuk`, `jml_masuk`, `id_user`) VALUES
(3, 1, '2022-05-19 06:10:46', '5', 2),
(4, 2, '2022-05-19 06:12:54', '45', 2),
(5, 2, '2022-05-19 12:00:00', '15', 2),
(6, 2, '2022-05-19 06:13:22', '15', 2),
(7, 1, '2022-05-19 06:54:51', '150', 2),
(8, 1, '2022-05-19 08:19:39', '25', 2),
(9, 2, '2022-05-20 07:04:33', '25', 2);

--
-- Trigger `tbl_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tmb_brg_masuk` AFTER INSERT ON `tbl_barang_masuk` FOR EACH ROW BEGIN
UPDATE tbl_barang SET jml=jml + NEW.jml_masuk
WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `level` varchar(20) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2022-08-19 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `photo`, `level`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`) VALUES
(2, 'admin', '$2y$10$pFphjoNfiszpjenDMvn.Auuks.4vxkE51LWDJpzzYY1dUW2xLi7WG', 'jevi.alvenosa99@gmail.com', 'http://localhost/persediaanbarang/uploads/files/q6vukjd92y_sn5h.jpg', 'admin', NULL, NULL, '2022-08-19 00:00:00', NULL),
(3, 'ratna', '$2y$10$yJUNQ1r4ArxdhCasduSi.OmpuJKEVsSnmTsReT8Ktj8K9sSYaR7km', 'ratnapuji90@gmail.com', 'http://localhost/persediaanbarang/uploads/files/asbl0edpvcz3jfx.png', 'user', NULL, NULL, '2022-08-19 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_brg_keluar`);

--
-- Indeks untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_brg_masuk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_brg_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_brg_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
