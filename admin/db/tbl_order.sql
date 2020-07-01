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

-- Dumping structure for table ecommerce.tbl_order
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(64) NOT NULL DEFAULT '0',
  `no_order` varchar(64) NOT NULL DEFAULT '0',
  `cus_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `order_size` int(11) DEFAULT NULL,
  `order_color` int(11) DEFAULT NULL,
  `order_total` float DEFAULT NULL,
  `order_status` enum('Unpaid','Pending','Process','Send') DEFAULT NULL,
  `tag_id` varchar(64) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_order: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
products