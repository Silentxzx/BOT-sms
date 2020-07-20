-- phpMyAdmin SQL Dump

-- version 4.9.5

-- https://www.phpmyadmin.net/

--

-- Host: localhost

-- Waktu pembuatan: 20 Jul 2020 pada 23.56

-- Versi server: 10.3.16-MariaDB

-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT = 0;

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--

-- Database: `id13051813_zx22xz`

--

-- --------------------------------------------------------

--

-- Struktur dari tabel `sms_outgoing`

--

CREATE TABLE `sms_outgoing` (

  `id` int(10) NOT NULL,

  `sms_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,

  `target` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,

  `msg` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,

  `status` enum('pending','proccess','sent','failed') CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,

  `error` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,

  `date` date NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

-- Dumping data untuk tabel `sms_outgoing`

--

INSERT INTO `sms_outgoing` (`id`, `sms_id`, `target`, `msg`, `status`, `error`, `date`) VALUES

(1, '476', '+6282112566751', 'Halo juga bro!', 'sent', '', '2020-07-21');

--

-- Indexes for dumped tables

--

--

-- Indeks untuk tabel `sms_outgoing`

--

ALTER TABLE `sms_outgoing`

  ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT untuk tabel yang dibuang

--

--

-- AUTO_INCREMENT untuk tabel `sms_outgoing`

--

ALTER TABLE `sms_outgoing`

  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
