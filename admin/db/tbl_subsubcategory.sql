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
  `subsub_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`subsub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_subsubcategory: ~26 rows (approximately)
/*!40000 ALTER TABLE `tbl_subsubcategory` DISABLE KEYS */;
INSERT INTO `tbl_subsubcategory` (`subsub_id`, `subcat_id`, `subsub_name`, `subsub_status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Iphone', 1, 1593393742, NULL),
	(2, 2, 'Samsung', 1, 1593393756, NULL),
	(3, 2, 'Xiaomi', 1, 1593393769, NULL),
	(4, 2, 'Asus', 1, 1593393780, NULL),
	(5, 5, 'Kemeja Formal', 1, 1593395825, NULL),
	(6, 5, 'Kaos Polo', 1, 1593395876, NULL),
	(7, 5, 'T-shirt', 1, 1593395899, NULL),
	(8, 5, 'Batik', 1, 1593395918, NULL),
	(9, 6, 'Celana Chino', 1, 1593395938, NULL),
	(10, 6, 'Celana Cargo', 1, 1593395956, NULL),
	(11, 6, 'Celana Formal', 1, 1593395975, NULL),
	(12, 6, 'Celana Jogger', 1, 1593395999, NULL),
	(13, 7, 'Hoodie', 1, 1593396021, NULL),
	(14, 7, 'Jaket', 1, 1593396035, NULL),
	(15, 7, 'Sweater', 1, 1593396057, NULL),
	(16, 9, 'Blazer', 1, 1593396112, NULL),
	(17, 9, 'Kardigan', 1, 1593396129, NULL),
	(18, 13, 'Memory RAM', 1, 1593497866, NULL),
	(19, 13, 'Monitor', 1, 1593497883, NULL),
	(20, 13, 'Processor', 1, 1593497918, NULL),
	(21, 11, 'PC Desktop', 1, 1593497941, NULL),
	(22, 11, 'PC Mini', 1, 1593497960, NULL),
	(23, 11, 'Server PC', 1, 1593497982, NULL),
	(24, 10, 'Ultrabook', 1, 1593498004, NULL),
	(25, 10, 'Laptop Gaming', 1, 1593498019, NULL),
	(26, 14, 'Headset PC', 1, 1593498207, NULL);
/*!40000 ALTER TABLE `tbl_subsubcategory` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
