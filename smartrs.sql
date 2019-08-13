-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table smartrs.m_pasien
CREATE TABLE IF NOT EXISTS `m_pasien` (
  `nomr` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL DEFAULT '',
  `nik` bigint(20) DEFAULT NULL,
  `nocard` bigint(20) DEFAULT NULL,
  `alamat` tinytext NOT NULL,
  PRIMARY KEY (`nomr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smartrs.m_pasien: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_pasien` DISABLE KEYS */;
INSERT INTO `m_pasien` (`nomr`, `nama`, `nik`, `nocard`, `alamat`) VALUES
	(1122, 'doddy ahmad', 1, 2, 'mampang prapatan'),
	(123456, 'doddy ahmad', 0, 0, 'Cibubur Rt 004 Rw 013 No 34A');
/*!40000 ALTER TABLE `m_pasien` ENABLE KEYS */;

-- Dumping structure for table smartrs.tbl_hak_akses
CREATE TABLE IF NOT EXISTS `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table smartrs.tbl_hak_akses: ~11 rows (approximately)
/*!40000 ALTER TABLE `tbl_hak_akses` DISABLE KEYS */;
INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
	(15, 1, 1),
	(19, 1, 3),
	(21, 2, 1),
	(24, 1, 9),
	(28, 2, 3),
	(29, 2, 2),
	(30, 1, 2),
	(31, 1, 10),
	(32, 1, 11),
	(33, 1, 12),
	(34, 1, 13),
	(35, 1, 14),
	(36, 1, 15),
	(37, 1, 16);
/*!40000 ALTER TABLE `tbl_hak_akses` ENABLE KEYS */;

-- Dumping structure for table smartrs.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table smartrs.tbl_menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
	(1, 'KELOLA MENU', 'kelolamenu', 'fal fa-server', 15, 'y'),
	(2, 'KELOLA PENGGUNA', 'user', 'fal fa-users', 15, 'y'),
	(3, 'level PENGGUNA', 'userlevel', 'fal fa-users', 15, 'y'),
	(9, 'Contoh Form', 'welcome/form', 'fal fa-id-card', 15, 'y'),
	(11, 'CRUD GEN', 'Crudgen', 'fal fa-users', 15, 'y'),
	(14, 'Master Pasien', 'master_pasien', 'fal fa-user-circle', 0, 'y'),
	(15, 'SETTING', '#', 'fal fa-cogs', 0, 'y'),
	(16, 'pendaftaran', 'pendaftaran', 'fal fa-calendar-plus', 0, 'y');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;

-- Dumping structure for table smartrs.tbl_setting
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table smartrs.tbl_setting: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
	(1, 'Tampil Menu', 'ya');
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;

-- Dumping structure for table smartrs.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table smartrs.tbl_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
	(1, 'Super Admin', 'superadmin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
	(3, 'Administrator', 'admin@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

-- Dumping structure for table smartrs.tbl_user_level
CREATE TABLE IF NOT EXISTS `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table smartrs.tbl_user_level: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_user_level` DISABLE KEYS */;
INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
	(1, 'Super Admin'),
	(2, 'Admin');
/*!40000 ALTER TABLE `tbl_user_level` ENABLE KEYS */;

-- Dumping structure for table smartrs.t_daftar
CREATE TABLE IF NOT EXISTS `t_daftar` (
  `noreg` int(11) NOT NULL,
  `nomr` int(11) NOT NULL,
  `kddatang` int(11) NOT NULL,
  `kdpoli` int(11) NOT NULL,
  `kddokter` int(11) NOT NULL,
  `kdbayar` int(11) NOT NULL,
  `tglreg` datetime NOT NULL,
  `regby` int(11) NOT NULL,
  PRIMARY KEY (`noreg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table smartrs.t_daftar: ~0 rows (approximately)
/*!40000 ALTER TABLE `t_daftar` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_daftar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
