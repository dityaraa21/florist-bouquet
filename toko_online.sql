-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 02:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(4) NOT NULL,
  `berat` int(7) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `id_kategori`, `nama_brg`, `harga`, `keterangan`, `stok`, `berat`, `gambar`) VALUES
(17, 1, 'Anne', 349000, 'Let your someone special know how special they are with these handpicked, romantic hues.  Essentially easy and staple, each of our bouquets are perfect for every occasion. No more fuss for showing that extra love—you know this bouquet is the one for', 50, 100, 'anne.jpg'),
(18, 1, 'Aqua', 369000, 'The blue color is calming and peaceful and thus, relaxes our state of mind. We also relate it to freshness, attractiveness and classy appearance. These blue bloomers are the perfect complimentary for your romantic day.', 50, 100, 'aqua1.jpg'),
(19, 1, 'Giselle', 325000, 'Passionate love translated through roses, these red bloomers are the perfect complimentary for your romantic day.', 50, 100, 'Giselle1.jpg'),
(20, 1, 'Sunny', 450000, 'Full of beauty, radiance and happiness, nothing brightens their day quite like sunflowers. This gorgeous flower is sure to bring long-lasting smiles and add some light to any room it’s placed.  Essentially easy and staple, each of our bouquets are perfect for every occasion. No more fuss for showing that extra', 50, 52, 'sunny.jpg'),
(36, 1, 'Ellen', 299000, 'Let your someone special know how special they are with these handpicked, romantic hues.  Essentially easy and staple, each of our bouquets are perfect for every occasion. No more fuss for showing that extra love—you know this bouquet is the one for you.', 50, 52, 'Ellen1.PNG'),
(37, 1, 'Cassie', 399000, 'Let your someone special know how special they are with these handpicked, romantic hues.  Essentially easy and staple, each of our bouquets are perfect for every occasion. No more fuss for showing that extra love—you know this bouquet is the one for you.', 32, 100, 'cassie.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama`) VALUES
(1, 'Flower Bouquet'),
(2, 'Money Bouquet'),
(3, 'Snack Bouquet');

-- --------------------------------------------------------

--
-- Table structure for table `tb_midtrans`
--

CREATE TABLE `tb_midtrans` (
  `no_order` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(18) NOT NULL,
  `transaction_time` varchar(19) NOT NULL,
  `pdf_url` text NOT NULL,
  `status_code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_midtrans`
--

INSERT INTO `tb_midtrans` (`no_order`, `id_user`, `gross_amount`, `payment_type`, `transaction_time`, `pdf_url`, `status_code`) VALUES
('02092204MCFX9EXI', 2, 367000, 'bank_transfer', '', 'https://app.sandbox.midtrans.com/snap/v1/transactions/77ba30c4-2409-4937-a428-b21c29cf47c1/pdf', '201'),
('020922GNQDTAYMTH', 2, 367000, 'bank_transfer', '', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c02d0dcb-0dd6-43a2-87b0-bdeec963c0a2/pdf', '201'),
('020922RYSWXMBL0P', 2, 343000, 'bank_transfer', '', 'https://app.sandbox.midtrans.com/snap/v1/transactions/6ac0196a-e0b7-45d9-8bd1-ddaad552fa52/pdf', '201'),
('260822SIGMA2IZFC', 2, 112412, 'bank_transfer', '', 'https://app.sandbox.midtrans.com/snap/v1/transactions/009568e9-50c6-4a76-bb39-bd8223ea9869/pdf', '200');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincian`
--

CREATE TABLE `tb_rincian` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `no_order` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rincian`
--

INSERT INTO `tb_rincian` (`id`, `id_brg`, `no_order`, `nama_barang`, `qty`, `harga`) VALUES
(1, 11, '260822SIGMA2IZFC', 'Anne', 1, 100000),
(2, 11, '280822VDUWKLBA9G', 'Anne', 1, 100000),
(3, 17, '02092204MCFX9EXI', 'Anne', 1, 349000),
(4, 17, '020922GNQDTAYMTH', 'Anne', 1, 349000),
(5, 19, '020922RYSWXMBL0P', 'Giselle', 1, 325000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(4) NOT NULL,
  `no_order` varchar(20) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `layanan` varchar(11) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `no_tlp` int(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_user`, `no_order`, `total_harga`, `layanan`, `ongkir`, `nama_lengkap`, `no_tlp`, `alamat`, `total_bayar`) VALUES
(1, 2, '260822SIGMA2IZFC', 100000, '4124', 12412, '412', 412, '412', 112412),
(2, 2, '280822VDUWKLBA9G', 100000, 'OKE', 18000, 'Aditya Rahman', 813132, 'Telaga Murni', 118000),
(3, 2, '02092204MCFX9EXI', 349000, 'OKE', 18000, 'Aditya Rahman', 813143423, 'Telaga Murni', 367000),
(4, 2, '020922GNQDTAYMTH', 349000, 'OKE', 18000, 'Aditya Rahman', 813143423, 'Telaga Murni13123', 367000),
(5, 2, '020922RYSWXMBL0P', 325000, 'CTCYES', 18000, 'Aditya Rahman', 813132, 'Telaga Murni', 343000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role_id`) VALUES
(1, '', 'admin', 'admin', 1),
(2, '', 'smith', 'smith', 2),
(3, 'Annisa', 'nisa', 'nisa', 2),
(4, 'galih', 'galih', 'galih', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_midtrans`
--
ALTER TABLE `tb_midtrans`
  ADD PRIMARY KEY (`no_order`);

--
-- Indexes for table `tb_rincian`
--
ALTER TABLE `tb_rincian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rincian`
--
ALTER TABLE `tb_rincian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
