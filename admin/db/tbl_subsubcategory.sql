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

-- Dumping structure for table ecommerce.tbl_subsubcategory
CREATE TABLE IF NOT EXISTS `tbl_subsubcategory` (
  `subsub_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_id` int(11) DEFAULT NULL,
  `subsub_name` varchar(50) DEFAULT NULL,
  `subsubcat_url` varchar(50) DEFAULT NULL,
  `subsub_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`subsub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_subsubcategory: ~26 rows (approximately)
/*!40000 ALTER TABLE `tbl_subsubcategory` DISABLE KEYS */;
INSERT INTO `tbl_subsubcategory` (`subsub_id`, `subcat_id`, `subsub_name`, `subsubcat_url`, `subsub_status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Iphone', 'Iphone', 1, 1593568930, 1593568930),
	(2, 2, 'Samsung', 'Samsung', 1, 1593568922, 1593568922),
	(3, 2, 'Xiaomi', 'Xiaomi', 1, 1593568906, 1593568906),
	(4, 2, 'Asus', 'Asus', 1, 1593568897, 1593568897),
	(5, 5, 'Kemeja Formal', 'Kemeja-Formal', 1, 1593568887, 1593568887),
	(6, 5, 'Kaos Polo', 'Kaos-Polo', 1, 1593568879, 1593568879),
	(7, 5, 'T-shirt', 'T-shirt', 1, 1593569036, 1593569036),
	(8, 5, 'Batik', 'Batik', 1, 1593569028, 1593569028),
	(9, 6, 'Celana Chino', 'Celana-Chino', 1, 1593569020, 1593569020),
	(10, 6, 'Celana Cargo', 'Celana-Cargo', 1, 1593569009, 1593569009),
	(11, 6, 'Celana Formal', 'Celana-Formal', 1, 1593569000, 1593569000),
	(12, 6, 'Celana Jogger', 'Celana-Jogger', 1, 1593568992, 1593568992),
	(13, 7, 'Hoodie', 'Hoodie', 1, 1593568980, 1593568980),
	(14, 7, 'Jaket', 'Jaket', 1, 1593568972, 1593568972),
	(15, 7, 'Sweater', 'Sweater', 1, 1593568963, 1593568963),
	(16, 9, 'Blazer', 'Blazer', 1, 1593568953, 1593568953),
	(17, 9, 'Kardigan', 'Kardigan', 1, 1593568579, 1593568579),
	(18, 13, 'Memory RAM', 'Memory-RAM', 1, 1593568572, 1593568572),
	(19, 13, 'Monitor', 'Monitor', 1, 1593568564, 1593568564),
	(20, 13, 'Processor', 'Processor', 1, 1593568555, 1593568555),
	(21, 11, 'PC Desktop', 'PC-Desktop', 1, 1593568547, 1593568547),
	(22, 11, 'PC Mini', 'PC-Mini', 1, 1593568539, 1593568539),
	(23, 11, 'Server PC', 'Server-PC', 1, 1593568511, 1593568511),
	(24, 10, 'Ultrabook', 'Ultrabook', 1, 1593568505, 1593568505),
	(25, 10, 'Laptop Gaming', 'Laptop-Gaming', 1, 1593568497, 1593568497),
	(26, 14, 'Headset PC', 'Headset-PC', 1, 1593568471, 1593568471);
/*!40000 ALTER TABLE `tbl_subsubcategory` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
