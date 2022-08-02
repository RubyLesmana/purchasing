-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2022 pada 04.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `satuan_id`, `jenis_id`) VALUES
('B000001', 'Lenovo Ideapad 1550', 15, 1, 3),
('B000002', 'Samsung Galaxy J1 Ace', 70, 1, 4),
('B000003', 'Aqua 1,5 Liter', 703, 3, 2),
('B000004', 'Mouse Wireless Logitech M220', 20, 1, 7),
('B000005', 'RAM 8 GB', 10, 1, 7),
('B000006', 'Tablet', 0, 1, 4),
('B000007', 'Kopi Kapal Api', 0, 2, 2),
('B000008', 'gula', 0, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `supplier_id`, `user_id`, `barang_id`, `jumlah_masuk`, `tanggal_masuk`) VALUES
('T-BM-21113000001', 1, 15, 'B000005', 10, '2021-11-30'),
('T-BM-21122000001', 2, 16, 'B000002', 20, '2021-12-20'),
('T-BM-21122000002', 2, 16, 'B000003', 3, '2021-12-20');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'IT'),
(2, 'Warehouse'),
(3, 'Accounting'),
(4, 'Produksi'),
(5, 'PPIC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Snack'),
(2, 'Minuman'),
(3, 'Laptop'),
(4, 'Handphone'),
(5, 'Sepeda Motor'),
(6, 'Mobil'),
(7, 'Perangkat Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_po` char(7) NOT NULL,
  `ro_id` char(7) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `quantity` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `requistion_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `purchase_order`
--

INSERT INTO `purchase_order` (`id_po`, `ro_id`, `divisi_id`, `barang_id`, `quantity`, `keterangan`, `requistion_id`, `supplier_id`, `harga`, `total`, `tanggal`, `status`) VALUES
('PO00004', 'RO00004', 1, 'B000003', 1, 'Bismillah', 12, 5, 15000, 15000, '2022-01-21', 1),
('PO00005', 'RO00003', 2, 'B000001', 2, 'Bismillah', 1, 2, 3000000, 6000000, '0000-00-00', 1),
('PO00006', 'RO00007', 7, 'B000005', 3, 'Bismillah', 9, 7, 500000, 1500000, '0000-00-00', 1),
('PO00007', 'RO00001', 1, 'B000003', 1, '', 12, 5, 15000, 15000, '2022-02-23', NULL),
('PO00008', 'RO00002', 2, 'B000002', 3, '', 7, 7, 1000000, 3000000, '2022-02-23', NULL),
('PO00009', 'RO00006', 2, 'B000003', 5, '', 12, 5, 15000, 75000, '2022-02-23', NULL),
('PO00010', 'RO00011', 1, 'B000001', 1, '', 6, 7, 3000000, 3000000, '2022-02-23', NULL);

--
-- Trigger `purchase_order`
--
DELIMITER $$
CREATE TRIGGER `Update_RO` AFTER INSERT ON `purchase_order` FOR EACH ROW BEGIN
 UPDATE request_order SET status=1 WHERE id_ro=new.ro_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_RO_Before_Delete` BEFORE DELETE ON `purchase_order` FOR EACH ROW BEGIN
 UPDATE request_order SET status=0 WHERE id_ro=old.ro_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_order`
--

CREATE TABLE `request_order` (
  `id_ro` char(7) NOT NULL,
  `divisi_id` int(255) NOT NULL,
  `barang_id` char(16) NOT NULL,
  `quantity` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `request_order`
--

INSERT INTO `request_order` (`id_ro`, `divisi_id`, `barang_id`, `quantity`, `keterangan`, `tanggal`, `status`) VALUES
('RO00001', 1, 'B000003', 1, 'Bismillah', '2022-01-06', 1),
('RO00002', 2, 'B000002', 3, 'Bismillah', '2022-01-03', 1),
('RO00003', 1, 'B000001', 2, 'Bismillah', '2022-01-04', 1),
('RO00004', 2, 'B000003', 1, 'Bismillah', '2022-01-04', 1),
('RO00005', 2, 'B000002', 3, 'Bismillah', '2022-01-05', 0),
('RO00006', 2, 'B000003', 5, 'Bismillah', '2022-01-06', 1),
('RO00007', 1, 'B000005', 3, 'Bismillah', '2022-01-06', 1),
('RO00008', 2, 'B000001', 2, 'Bismillah', '2022-01-06', 0),
('RO00009', 3, 'B000004', 1, 'ppp', '2022-02-02', 0),
('RO00010', 5, 'B000008', 1, 'bismillah', '2022-02-23', 0),
('RO00011', 1, 'B000001', 1, 'bismillah', '2022-02-23', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Unit'),
(2, 'Pack'),
(3, 'Botol'),
(5, 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'PT. ATK', '085688772971', 'Kec. Cigudeg, Bogor - Jawa Barat'),
(2, 'PT. Digital', '081341879246', 'Kec. Ciampea, Bogor - Jawa Barat'),
(3, 'PT. Snack', '087728164328', 'Kec. Ciomas, Bogor - Jawa Barat'),
(5, 'PT. Maju Jaya', '021938848', 'Rawalumbu, Bekasi'),
(7, 'PT. Ruby Sukses', '021929923', 'Kuningan, Jawa barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_requistion`
--

CREATE TABLE `tb_requistion` (
  `id_requistion` int(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_requistion`
--

INSERT INTO `tb_requistion` (`id_requistion`, `supplier_id`, `barang_id`, `harga`) VALUES
(1, 2, 'B000001', 3000000),
(2, 2, 'B000005', 1000000),
(3, 2, 'B000006', 500000),
(4, 2, 'B000002', 1500000),
(5, 2, 'B000004', 2500000),
(6, 7, 'B000001', 3000000),
(7, 7, 'B000002', 1000000),
(8, 7, 'B000004', 50000),
(9, 7, 'B000005', 500000),
(10, 7, 'B000006', 3000000),
(11, 3, 'B000003', 20000),
(12, 5, 'B000003', 15000),
(13, 3, 'B000007', 10000),
(14, 5, 'B000007', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('staff purchasing','admin','divisi','manager') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(15, 'Rubi Lesmana', 'Ruby', 'rubbyghozaly@gmail.com', '08928283', 'admin', '$2y$10$e.Kj.5wk/WF19dSh6HoDwetbN.3QeFy.8cJQD8T.zr3bwQvEWy6wi', 1638093973, 'user.png', 1),
(16, 'Divisi', 'Divisi', 'divisi@gmail.com', '0918282', 'divisi', '$2y$10$wXk.xZRjwZNSwvl6VtP7ieWsm.7WqXK2MYTw549yRS83cWJD4VdJW', 1638250577, 'user.png', 1),
(17, 'Purchasing', 'Purchasing', 'purchasing@gmail.com', '08291919', 'staff purchasing', '$2y$10$E6NBQM.cmAWHyjPvy/Vp4OX5smnxL6mRCMC45YrBMWxOQ7gWcMXlG', 1638289927, 'user.png', 1),
(18, 'manager', 'Manager', 'manager@gmail.com', '082217307872', 'manager', '$2y$10$/LRinluxM/vDdLBEtoe1ne82FRA6tr0ODvfk2M/i3xXj15ouFbsBC', 1642008827, 'user.png', 1),
(19, 'Admin', 'Admin', 'admin@gmail.com', '08928283', 'admin', '$2y$10$0ZYP7rXOHVF1dgxOeBC7K.v1VVfhQ5GwUAfvGMnbN9vTtrh2qP8ou', 1642050302, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kategori_id` (`jenis_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_po`),
  ADD KEY `barang_id` (`requistion_id`),
  ADD KEY `ro_id` (`ro_id`);

--
-- Indeks untuk tabel `request_order`
--
ALTER TABLE `request_order`
  ADD PRIMARY KEY (`id_ro`),
  ADD KEY `kategori_id` (`quantity`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_requistion`
--
ALTER TABLE `tb_requistion`
  ADD PRIMARY KEY (`id_requistion`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_requistion`
--
ALTER TABLE `tb_requistion`
  MODIFY `id_requistion` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`ro_id`) REFERENCES `request_order` (`id_ro`),
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`requistion_id`) REFERENCES `tb_requistion` (`id_requistion`);

--
-- Ketidakleluasaan untuk tabel `request_order`
--
ALTER TABLE `request_order`
  ADD CONSTRAINT `request_order_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tb_requistion`
--
ALTER TABLE `tb_requistion`
  ADD CONSTRAINT `tb_requistion_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `tb_requistion_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
