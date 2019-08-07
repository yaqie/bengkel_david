-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 12:07 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `nokendaraan` varchar(15) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `tanggaljambooking` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `nama`, `nohp`, `nokendaraan`, `jam`, `tanggal`, `tanggaljambooking`, `status`) VALUES
(2, 'ahmad yahya asy-syidqie', '0895357948031', 'R 2367 GS', '12:00:00', '2019-07-27', '2019-07-26 04:47:38', 2),
(3, 'dafid', '01928390182309', 'R 1893 US', '12:00:00', '2019-07-27', '2019-07-26 04:53:06', 1),
(4, 'kungfret', '0895357948031', 'R 2367 GS', '20:00:00', '2019-07-26', '2019-07-26 15:20:04', -1),
(5, 'yahya', '0895357948031', 'R 2367 GS', '12:00:00', '2019-08-03', '2019-08-03 07:15:43', 0),
(6, 'yaqie', '0895357948031', 'R 2367 GS', '12:00:00', '2019-08-05', '2019-08-05 01:20:22', 1),
(7, 'yahya', '0895357948031', 'R 2367 GS', '12:00:00', '2019-08-08', '2019-08-08 02:16:41', 1),
(8, 'dafid', '08098098008', 'R 2367 GS', '14:00:00', '2019-08-09', '2019-08-08 03:39:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(1) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `alamat`, `telp`, `email`, `website`, `owner`, `desc`) VALUES
(1, 'Lancar Motor 2', 'purwokerto', '0895357948031', 'ahmadyahyay@gmail.com', 'https://bookcircle.id', 'yaqie', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde incidunt soluta commodi voluptas quibusdam dolorum sit, mollitia nam quam harum sequi vitae sapiente odit ab libero doloribus, perferendis consectetur. Fugit.\r\n  Veniam suscipit, blanditiis consequuntur aut fuga id maxime velit ut enim ipsum reprehenderit dicta perferendis dolorum repellendus nostrum ducimus, ea at hic error reiciendis quo, eius incidunt. Distinctio, odio aliquam?\r\n  Quas soluta delectus ullam mollitia cupiditate suscipit aliquam temporibus, magnam dignissimos blanditiis nostrum nihil cum error maiores nesciunt autem non omnis placeat culpa? Voluptas, quis dolor autem perspiciatis voluptates explicabo?\r\n  Atque molestias expedita ea sint dolor totam consectetur nisi non iure necessitatibus earum odit voluptatum officiis, accusantium nobis, fuga ad dignissimos. Voluptatum corrupti hic molestiae alias quas numquam soluta nesciunt.\r\n  Id eum eos consequatur modi praesentium quae doloribus ducimus nobis porro officiis, veniam ipsam corrupti, aspernatur inventore. Ullam nulla repellat doloribus. Error vel sed nesciunt, voluptatum accusamus porro fugiat assumenda!');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kd_pelanggan` varchar(15) NOT NULL,
  `nm_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `ngantri` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kd_pelanggan`, `nm_pelanggan`, `alamat`, `email`, `telp`, `ngantri`) VALUES
(2, 'P-002', 'eka', 'bekasi', 'eka@valconware.com', '089679', 1),
(3, 'P-0003', 'www', 'wwwwwerrww', 'dhdfh@gmail.com', '542222', 0),
(4, 'P-0004', 'gesha', 'banyumas', 'uyuryryuye@gmail.com', '889979877', 0),
(5, 'P-0005', 'yyyy', 'hjhjhjhjhj', 'jgjhgh@gmail.com', '000898', 0),
(6, 'P-0006', 'eeee', 'eeeee', 'ahmadyahyay@gmail.com', '0895357948031', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `kd_pemasok` varchar(15) NOT NULL,
  `nm_pemasok` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `kd_pemasok`, `nm_pemasok`, `alamat`, `email`, `telp`) VALUES
(1, 'PS-001', 'pt sejahtera abadi indonesia1', 'jalan jalan1', 'asdasd@asdas.adsd1', '081234567891'),
(3, 'PS-0002', 'pt dafid abadi indonesia', ' kajshjdbjwhb aj bshdjwbhjdbaj', 'dafidganteng@gmail.com', '0898172398179');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id_servis` int(11) NOT NULL,
  `nm_layanan` varchar(50) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id_servis`, `nm_layanan`, `harga`) VALUES
(0, 'Tidak Melakukan Servis', 0),
(1, 'Servis Ringan', 45000),
(2, 'Servis Standar', 55000),
(3, 'Servis Berat', 65000);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `text1` varchar(200) NOT NULL,
  `text2` varchar(200) NOT NULL,
  `text3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `bagian`, `text1`, `text2`, `text3`) VALUES
(1, 'jam_operasional', 'Senin - Jumat : 08:00 - 16:00', 'Sabtu & Minggu : 08:00 - 14:00', '5');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_part` int(11) NOT NULL,
  `kd_part` varchar(5) NOT NULL,
  `nm_part` varchar(20) NOT NULL,
  `kd_pemasok` varchar(50) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga_modal` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `letak_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_part`, `kd_part`, `nm_part`, `kd_pemasok`, `stok`, `harga_modal`, `harga`, `letak_barang`) VALUES
(7, 'P-001', 'Oli Mesin', 'PS-001', 33, 60000, 70000, 'jas@KASknj'),
(8, 'P-002', 'Lampu LED', 'PS-0002', 213, 20000, 25000, ''),
(9, 'P-003', 'kampas rem', 'PS-0002', 86, 30000, 35000, 'vbb '),
(10, 'P-004', 'Ban Luar', 'PS-001', 10, 0, 20000, 'gnjhn'),
(11, 'P-005', 'Pentil', 'PS-001', 1, 0, 10000, 'U20'),
(14, 'P-006', 'jiiiii', 'PS-001', 888, 0, 8787, 'gnjhn'),
(15, 'P-007', 'obeng', 'PS-001', 990, 10000, 12000, 'Puz@3naT'),
(16, 'P-008', 'oli enduro', 'PS-0002', 50, 35000, 40000, 'u23'),
(17, 'P-009', 'dafid', 'PS-0002', 31, 100000, 110000, 'uaksjdn'),
(21, 'P-010', 'Oli Mesin Federal', 'PS-0002', 70, 35000, 45000, 'y fyu');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `kd_transaksi` varchar(5) NOT NULL,
  `kd_part` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `kd_transaksi`, `kd_part`, `qty`) VALUES
(15, 'T-005', 'P-002', 2),
(16, 'T-006', 'P-002', 2),
(17, 'T-007', 'P-003', 2),
(18, 'T-008', 'P-002', 1),
(19, 'T-010', 'P-001', 2),
(20, 'T-011', 'P-001', 5),
(22, 'T-012', 'P-002', 2),
(23, 'T-013', 'P-003', 10),
(24, 'T-016', 'P-002', 10),
(25, 'T-017', 'P-007', 10),
(26, 'T-018', 'P-001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_header`
--

CREATE TABLE `transaksi_header` (
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
('T-003', 'P-002', 0, 3, '2019-07-14', 'K-001'),
('T-005', 'P-002', 50000, 0, '2019-07-17', 'K-001'),
('T-006', 'P-002', 50000, 0, '2019-07-18', 'K-001'),
('T-007', 'P-002', 70000, 0, '2019-07-18', 'K-001'),
('T-008', 'P-002', 25000, 0, '2019-07-18', 'K-001'),
('T-009', 'P-0004', 0, 3, '2019-07-18', 'K-001'),
('T-010', 'P-0003', 156000, 0, '2019-07-18', 'K-001'),
('T-011', 'P-002', 390000, 3, '2019-07-18', 'K-001'),
('T-012', 'P-0004', 50000, 0, '2019-07-21', 'K-001'),
('T-013', 'P-0005', 350000, 1, '2019-07-21', 'K-001'),
('T-014', 'P-0004', 0, 3, '2019-07-26', 'K-001'),
('T-015', 'P-0003', 0, 2, '2019-07-26', 'K-001'),
('T-016', '0', 250000, 0, '2019-08-03', 'K-001'),
('T-017', '0', 120000, 0, '2019-08-03', 'K-001'),
('T-018', '0', 70000, 0, '2019-08-05', 'K-001');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kd_part` varchar(5) NOT NULL,
  `nm_part` varchar(20) NOT NULL,
  `kd_pemasok` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_modal` int(15) NOT NULL,
  `tanggaljam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`id_pembelian`, `kd_part`, `nm_part`, `kd_pemasok`, `jumlah`, `harga_modal`, `tanggaljam`) VALUES
(1, 'P-009', 'dafid', 'PS-0002', 10, 100000, '2019-07-21 00:00:00'),
(2, 'P-009', 'dafid', 'PS-0002', 20, 100000, '2019-07-27 00:00:00'),
(3, 'P-009', 'dafid', 'PS-0002', 5, 100000, '2019-08-02 00:00:00'),
(8, 'P-009', 'dafid', 'PS-001', 5, 100000, '2019-08-04 00:00:00'),
(9, 'P-009', 'dafid', 'PS-0002', 1, 100000, '2019-08-04 00:00:00'),
(10, 'P-010', 'Oli Mesin Federal', 'PS-001', 50, 35000, '2019-08-04 21:14:30'),
(11, 'P-010', 'Oli Mesin Federal', 'PS-001', 1, 35000, '2019-08-04 00:00:00'),
(12, 'P-010', 'Oli Mesin Federal', 'PS-0002', 4, 35000, '2019-08-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kd_user` varchar(5) NOT NULL DEFAULT '0',
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `kd_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'K-001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dafid', 'admin'),
(3, 'K-002', 'ii', '36347412c7d30ae6fde3742bbc4f21b9', 'tttttt', 'user'),
(4, 'K-003', 'yaqie', '7815696ecbf1c96e6894b779456d330e', 'yaqie', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

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
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`,`kd_pemasok`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id_servis`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_part`,`kd_part`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `transaksi_header`
--
ALTER TABLE `transaksi_header`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`,`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id_servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
