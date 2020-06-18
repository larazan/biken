-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ecommerce.tbl_settings
CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext,
  `description` longtext,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_settings: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` (`settings_id`, `type`, `description`) VALUES
	(1, 'shop_name', 'Wiklan | Situs Belanja Online Media Iklan Indoor dan Outdoor'),
	(2, 'address', 'Jl. Adityawarman No. 2 Surabaya 60242 Jawa Timur - Indonesia'),
	(3, 'phone', '(031) 512 01088'),
	(4, 'email', 'cs@wiklan.com'),
	(5, 'author', 'PT. Wijaya Iklan Indonesia (Wiklan)'),
	(6, 'logo', 'logo_wiklan.png'),
	(7, 'homepage_background', 'homepage_background.jpg'),
	(8, 'description', 'Wiklan adalah Perusahaan Swasta Nasional yang berbasis teknologi dalam menghasilkan titik lokasi terbaik yang berfokus pada bidang periklanan dan terus bertumbuh secara berkesinambungan, memberikan kesejahteraan dan menjadi saluran berkat bagi semua yang berhubungan dengan kami. Kami juga melayani pembuatan berbagai jenis media iklan mulai dari billboards, baliho, pedestrian bridge (JPO), videotron, road sign, midi board, neon box, dll.'),
	(9, 'keyword', 'Advertising Indonesia, Billboard, Baliho, JPO, Videotron, Road Sign, dll.'),
	(10, 'rekening_pembayaran', '010 642 703 5'),
	(11, 'facebook', 'http://www.facebook.com/username'),
	(12, 'instagram', 'http://www.instagram.com/username'),
	(13, 'metatext', 'Explore internships, graduate jobs &amp; career development resources on Glints. Do what you love on our career discovery &amp; development platform'),
	(14, 'icon', 'logo_wiklan.png'),
	(15, 'tagline', 'Berpacu dalam melodi'),
	(16, 'rajaongkir_key', '18c1ae365c10fea954e08449b1c2e185'),
	(17, 'midtrans_key', NULL);
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
