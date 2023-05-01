-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table sigudang.gudang
CREATE TABLE IF NOT EXISTS `gudang` (
  `id_gudang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(255) DEFAULT NULL,
  `alamat_gudang` varchar(255) DEFAULT NULL,
  `luas_gudang` varchar(255) DEFAULT NULL,
  `no_gudang` varchar(255) DEFAULT NULL,
  `tgl_terdaftar` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `pemilik_gudang` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_gudang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sigudang.gudang: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `gudang` DISABLE KEYS */;
INSERT INTO `gudang` (`id_gudang`, `nama_gudang`, `alamat_gudang`, `luas_gudang`, `no_gudang`, `tgl_terdaftar`, `jumlah`, `jenis_barang`, `pemilik_gudang`, `user_id`) VALUES
	(1, 'CV. WARGA MANDIRI JAYA', 'Dsn. Karanganyar Barat RT 03/05 Desa Sukamandi Jaya Kec. Ciasem Kab. Subang', '200 m2 & Kapasitas Gudang', 'No : 503/0001/TDG/DPMPTSP/I/2020', '14 Januari 2020', 'Satu (1) Bangunan', 'SAPROTAN DAN HASIL PERTANIAN', 'OTONG WIRANTA  (GOLONGAN A)', 2),
	(3, 'CV. MENTOR CODE', 'CIBOGO', '2X2 M', '20', '20 Agustus 1945', '200', 'Orang', 'Agoy', 5),
	(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
	(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
	(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8);
/*!40000 ALTER TABLE `gudang` ENABLE KEYS */;

-- membuang struktur untuk table sigudang.laporan
CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `gudang_id` int(11) DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `stok_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sigudang.laporan: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;

-- membuang struktur untuk table sigudang.stok
CREATE TABLE IF NOT EXISTS `stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `gudang_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sigudang.stok: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` (`id_stok`, `gudang_id`, `nama_barang`, `jumlah`) VALUES
	(1, 1, 'Pestisida', 40),
	(2, 3, 'laptop geming', -50),
	(3, 3, 'Handphone', NULL),
	(4, 3, 'batu', NULL);
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;

-- membuang struktur untuk table sigudang.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `gudang_id` varchar(50) NOT NULL,
  `stok_id` varchar(50) NOT NULL,
  `jumlah_stok` varchar(50) NOT NULL,
  `status` enum('BERTAMBAH','BERKURANG') DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sigudang.transaksi: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id_transaksi`, `gudang_id`, `stok_id`, `jumlah_stok`, `status`, `tgl`) VALUES
	(6, '1', '1', '50', 'BERTAMBAH', NULL),
	(7, '1', '1', '20', 'BERKURANG', NULL),
	(8, '1', '1', '11', 'BERKURANG', NULL),
	(9, '1', '1', '41', 'BERTAMBAH', NULL),
	(10, '1', '1', '50', 'BERTAMBAH', NULL),
	(11, '1', '1', '10', 'BERKURANG', NULL),
	(12, '3', '2', '50', 'BERTAMBAH', '2023-03-24');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- membuang struktur untuk table sigudang.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('Kepala Dinas','Kepala Bidang','Admin Bidang','Pemilik Gudang') DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sigudang.user: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `username`, `password`, `role`) VALUES
	(1, 'admin@admin.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin Bidang'),
	(2, 'gudang@gudang.com', 'gudang', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pemilik Gudang'),
	(5, 'gudang1@gudang.com', 'gudang1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pemilik Gudang'),
	(6, 'gudang2@gmail.com', 'gudang2', '5f4dcc3b5aa765d61d8327deb882cf99', 'Pemilik Gudang'),
	(7, 'admin2@gmail.com', 'admin2', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin Bidang'),
	(8, 'kadis@gmail.om', 'kadis', '5f4dcc3b5aa765d61d8327deb882cf99', 'Kepala Dinas'),
	(9, 'email@email.com', 'admin111', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin Bidang');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
