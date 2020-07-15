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

-- Dumping structure for table ecommerce.tbl_shoppertrack
CREATE TABLE IF NOT EXISTS `tbl_shoppertrack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(64) DEFAULT NULL,
  `item_title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_size` varchar(70) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `item_colour` varchar(70) DEFAULT NULL,
  `date_added` int(11) DEFAULT NULL,
  `shopper_id` int(11) DEFAULT NULL,
  `ip_address` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_shoppertrack: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_shoppertrack` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_shoppertrack` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
