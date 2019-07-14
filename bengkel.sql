-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 02:02 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(1) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `desc` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `owner`, `desc`) VALUES
(1, 'ValconWare.com', 'Bekasi', '123456789', 'contact@valcomware.com', 'https://valconware.com/', 'Anton''s', 'IT Solution & Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(11) NOT NULL,
  `kd_pelanggan` varchar(15) NOT NULL,
  `nm_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kd_pelanggan`, `nm_pelanggan`, `alamat`, `email`, `telp`) VALUES
(1, 'P-001', 'Anton', 'Bekasi', 'anton@valconware.com', '08123456789'),
(2, 'P-002', 'eka', 'bekasi', 'eka@valconware.com', '089679'),
(3, 'P-0003', 'www', 'wwwwwerrww', 'dhdfh@gmail.com', '542222'),
(4, 'P-0004', 'gesha', 'banyumas', 'uyuryryuye@gmail.com', '889979877'),
(5, 'P-0005', 'yyyy', 'hjhjhjhjhj', 'jgjhgh@gmail.com', '000898');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE IF NOT EXISTS `servis` (
`id_servis` int(11) NOT NULL,
  `nm_layanan` varchar(50) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id_servis`, `nm_layanan`, `harga`) VALUES
(1, 'Servis Ringan', 45000),
(2, 'Servis Standar', 55000),
(3, 'Servis Berat', 65000);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE IF NOT EXISTS `sparepart` (
`id_part` int(11) NOT NULL,
  `kd_part` varchar(5) NOT NULL,
  `nm_part` varchar(20) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_part`, `kd_part`, `nm_part`, `stok`, `harga`) VALUES
(7, 'P-001', 'Oli Mesin', 227, 78000),
(8, 'P-002', 'Lampu LED', 225, 25000),
(9, 'P-003', 'kampas rem', 98, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `kd_transaksi` varchar(5) NOT NULL,
  `kd_part` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`kd_transaksi`, `kd_part`, `qty`) VALUES
('T-001', 'P-001', 4),
('T-001', 'P-002', 5),
('T-002', 'P-001', 1),
('T-002', 'P-002', 2),
('T-003', 'P-002', 4),
('T-004', 'P-002', 1),
('T-005', 'P-001', 1),
('T-006', 'P-002', 1),
('T-007', 'P-002', 1),
('T-008', 'P-003', 2),
('T-009', 'P-001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_header`
--

CREATE TABLE IF NOT EXISTS `transaksi_header` (
  `kd_transaksi` varchar(5) NOT NULL,
  `kd_pelanggan` varchar(10) DEFAULT NULL,
  `biaya_part` int(20) NOT NULL,
  `id_servis` int(20) DEFAULT NULL,
  `tanggal_penjualan` date NOT NULL,
  `kd_user` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_header`
--

INSERT INTO `transaksi_header` (`kd_transaksi`, `kd_pelanggan`, `biaya_part`, `id_servis`, `tanggal_penjualan`, `kd_user`) VALUES
('T-001', 'P-001', 185000, 1, '2018-08-18', 'K-001'),
('T-002', 'P-001', 128000, 1, '2018-08-18', 'K-002'),
('T-003', 'P-001', 100000, 2, '2018-08-26', 'K-001'),
('T-004', 'P-001', 25000, 2, '2019-06-23', 'K-001'),
('T-005', '', 78000, 0, '2019-07-04', 'K-001'),
('T-006', 'P-0003', 25000, 1, '2019-07-06', 'K-001'),
('T-007', 'P-001', 25000, 2, '2019-07-08', 'K-001'),
('T-008', '', 70000, 0, '2019-07-08', 'K-001'),
('T-009', 'P-0005', 78000, 1, '2019-07-14', 'K-001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `kd_user` varchar(5) NOT NULL DEFAULT '0',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `kd_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'K-001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Diandra Putri', 'admin'),
(2, 'K-002', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Morgan', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`,`kd_pelanggan`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
 ADD PRIMARY KEY (`id_servis`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
 ADD PRIMARY KEY (`id_part`,`kd_part`);

--
-- Indexes for table `transaksi_header`
--
ALTER TABLE `transaksi_header`
 ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`,`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
MODIFY `id_servis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
