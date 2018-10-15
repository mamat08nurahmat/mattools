-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Okt 2018 pada 16.59
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mattools`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `system_upload`
--
-- drop table system_upload
CREATE TABLE IF NOT EXISTS `system_upload` (
`id` int(11) unsigned NOT NULL,
  `upload_date` datetime DEFAULT NULL,
  `upload_remark` text,
  `source` varchar(100) DEFAULT NULL,
  `file_path` text,
  `file_size` int(11) NOT NULL,
  `row_data_count` int(11) NOT NULL,
  `row_data_succeed` int(11) NOT NULL,
  `row_data_failed` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `upload_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `system_upload`
--

INSERT INTO `system_upload` (`id`, `upload_date`, `upload_remark`, `source`, `file_path`, `file_size`, `row_data_count`, `row_data_succeed`, `row_data_failed`, `is_approved`, `upload_at`) VALUES
(1, '2018-10-14 00:00:00', 'tes', 'MISMER', '20181014215743-2018-10-14system_upload215659.csv', 123, 123, 123, 0, 1, '2018-10-14 14:57:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system_upload`
--
ALTER TABLE `system_upload`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_upload`
--
ALTER TABLE `system_upload`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
