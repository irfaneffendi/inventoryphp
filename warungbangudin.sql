-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 09:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warungbangudin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kode_barang`, `nama_barang`, `kode_kategori`, `spesifikasi`, `stok`) VALUES
('BRG001', 'Mie Aceh', 1, 'Kg', 10),
('BRG002', 'Jeruk', 2, 'Kg', 2),
('BRG003', 'Alpukat', 2, 'Kg', 2),
('BRG004', 'Beras', 1, '10', 10),
('BRG005', 'Ayam', 1, 'Kg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_penerimaan`
--

CREATE TABLE `tbdetail_penerimaan` (
  `id` int(11) NOT NULL,
  `kode_terima` varchar(30) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_penerimaan`
--

INSERT INTO `tbdetail_penerimaan` (`id`, `kode_terima`, `kode_barang`, `jumlah_barang`) VALUES
(8, 'M202208250001', 'BRG005', 20),
(9, 'M202208250001', 'BRG001', 10),
(10, 'M202208250001', 'BRG002', 2),
(11, 'M202208250001', 'BRG003', 2),
(12, 'M202208250001', 'BRG004', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_pengeluaran`
--

CREATE TABLE `tbdetail_pengeluaran` (
  `id` int(11) NOT NULL,
  `kode_keluar` varchar(30) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_pengeluaran`
--

INSERT INTO `tbdetail_pengeluaran` (`id`, `kode_keluar`, `kode_barang`, `jumlah_barang`) VALUES
(8, 'K202208250001', 'BRG001', 2),
(9, 'K202208250001', 'BRG002', 1),
(10, 'K202208250001', 'BRG003', 1),
(11, 'K202208250001', 'BRG005', 5),
(12, 'K202208250001', 'BRG004', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenerimaan`
--

CREATE TABLE `tbpenerimaan` (
  `kode_terima` varchar(20) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenerimaan`
--

INSERT INTO `tbpenerimaan` (`kode_terima`, `tanggal_terima`, `jumlah_item`, `id_user`, `keterangan`) VALUES
('M202208250001', '2022-08-25', 5, 'USR001', 'Barang masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengeluaran`
--

CREATE TABLE `tbpengeluaran` (
  `kode_keluar` varchar(30) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `id_user` varchar(60) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengeluaran`
--

INSERT INTO `tbpengeluaran` (`kode_keluar`, `tanggal_keluar`, `jumlah_item`, `id_user`, `keterangan`) VALUES
('K202208250001', '2022-08-25', 5, 'USR001', 'Barang keluar');

-- --------------------------------------------------------

--
-- Table structure for table `tbsementara_penerimaan`
--

CREATE TABLE `tbsementara_penerimaan` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsementara_pengeluaran`
--

CREATE TABLE `tbsementara_pengeluaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id_user` varchar(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `username`, `password`, `nama`, `status`) VALUES
('USR001', 'pemilik', '58399557dae3c60e23c78606771dfa3d', 'PEMILIK WARUNG', 'pemilik'),
('USR002', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tbpenerimaan`
--
ALTER TABLE `tbpenerimaan`
  ADD PRIMARY KEY (`kode_terima`);

--
-- Indexes for table `tbpengeluaran`
--
ALTER TABLE `tbpengeluaran`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `tbsementara_penerimaan`
--
ALTER TABLE `tbsementara_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbsementara_pengeluaran`
--
ALTER TABLE `tbsementara_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbsementara_penerimaan`
--
ALTER TABLE `tbsementara_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbsementara_pengeluaran`
--
ALTER TABLE `tbsementara_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
