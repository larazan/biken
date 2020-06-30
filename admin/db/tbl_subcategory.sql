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
  `sub_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_subcategory: ~13 rows (approximately)
/*!40000 ALTER TABLE `tbl_subcategory` DISABLE KEYS */;
INSERT INTO `tbl_subcategory` (`sub_id`, `cat_id`, `sub_name`, `sub_status`, `created_at`, `updated_at`) VALUES
	(2, 4, 'Handphone & Tablet', 1, 1593393468, NULL),
	(3, 4, 'Casing & Covers', 1, 1593393495, NULL),
	(4, 4, 'Powerbank & Baterai', 1, 1593393514, NULL),
	(5, 5, 'Atasan', 1, 1593393847, NULL),
	(6, 5, 'Bawahan', 1, 1593393861, NULL),
	(7, 5, 'Outwear', 1, 1593393876, NULL),
	(8, 6, 'Atasan', 1, 1593393909, NULL),
	(9, 6, 'Outwear', 1, 1593393928, NULL),
	(10, 7, 'Laptop', 1, 1593497717, NULL),
	(11, 7, 'Desktop', 1, 1593497729, NULL),
	(12, 7, 'Mouse & Keyboard', 1, 1593497757, NULL),
	(13, 7, 'Komponen Komputer', 1, 1593497832, NULL),
	(14, 7, 'Audio Komputer', 1, 1593498140, NULL);
/*!40000 ALTER TABLE `tbl_subcategory` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
