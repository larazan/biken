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

-- Dumping structure for table ecommerce.tbl_basket
CREATE TABLE IF NOT EXISTS `tbl_basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(64) DEFAULT NULL,
  `item_title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `item_colour` varchar(50) DEFAULT NULL,
  `item_size` varchar(50) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `shopper_id` int(11) DEFAULT NULL,
  `ip_address` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_basket: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_basket` DISABLE KEYS */;
INSERT INTO `tbl_basket` (`id`, `session_id`, `item_title`, `price`, `tax`, `item_id`, `item_qty`, `item_colour`, `item_size`, `date_added`, `shopper_id`, `ip_address`) VALUES
	(1, 'qqvqtmbhp42seutoct4kk2c0vgbu4lnr', 'Macbook Pro 2019 TouchBar MUHN2 13" 8GB 128GB 1.4GHz Quadcore i5 Grey - Inter', 41200000.00, NULL, 3, 2, 'Merah', 'L', 1593763283, 0, 0),
	(2, 'qqvqtmbhp42seutoct4kk2c0vgbu4lnr', 'Macbook Pro 2019 TouchBar MUHN2 13" 8GB 128GB 1.4GHz Quadcore i5 Grey - Inter', 41200000.00, NULL, 3, 2, 'Merah', 'L', 1593763342, 0, 0),
	(3, 'u5003hqoj5umncf205mc9dehtmbtr94r', 'Macbook Pro 2019 TouchBar MUHN2 13" 8GB 128GB 1.4GHz Quadcore i5 Grey - Inter', 41200000.00, NULL, 3, 2, 'Merah', 'L', 1593763758, 0, 0),
	(4, 'u5003hqoj5umncf205mc9dehtmbtr94r', 'Macbook Pro 2019 TouchBar MUHN2 13" 8GB 128GB 1.4GHz Quadcore i5 Grey - Inter', 41200000.00, NULL, 3, 2, 'Merah', 'L', 1593763771, 0, 0);
/*!40000 ALTER TABLE `tbl_basket` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
