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

-- Dumping structure for table ecommerce.tbl_subcategory
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `sub_name` varchar(50) DEFAULT NULL,
  `subcat_url` varchar(50) DEFAULT NULL,
  `sub_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_subcategory: ~13 rows (approximately)
/*!40000 ALTER TABLE `tbl_subcategory` DISABLE KEYS */;
INSERT INTO `tbl_subcategory` (`sub_id`, `cat_id`, `sub_name`, `subcat_url`, `sub_status`, `created_at`, `updated_at`) VALUES
	(2, 4, 'Handphone & Tablet', 'Handphone-Tablet', 1, 1593566933, 1593566933),
	(3, 4, 'Casing & Covers', 'Casing-Covers', 1, 1593566925, 1593566925),
	(4, 4, 'Powerbank & Baterai', 'Powerbank-Baterai', 1, 1593566915, 1593566915),
	(5, 5, 'Atasan', 'Atasan', 1, 1593566905, 1593566905),
	(6, 5, 'Bawahan', 'Bawahan', 1, 1593566898, 1593566898),
	(7, 5, 'Outwear', 'Outwear', 1, 1593566890, 1593566890),
	(8, 6, 'Atasan', 'Atasan', 1, 1593566861, 1593566861),
	(9, 6, 'Outwear', 'Outwear', 1, 1593566882, 1593566882),
	(10, 7, 'Laptop', 'Laptop', 1, 1593566841, 1593566841),
	(11, 7, 'Desktop', 'Desktop', 1, 1593566833, 1593566833),
	(12, 7, 'Mouse & Keyboard', 'Mouse-Keyboard', 1, 1593566814, 1593566814),
	(13, 7, 'Komponen Komputer', 'Komponen-Komputer', 1, 1593566806, 1593566806),
	(14, 7, 'Audio Komputer', 'Audio-Komputer', 1, 1593566800, 1593566800);
/*!40000 ALTER TABLE `tbl_subcategory` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
