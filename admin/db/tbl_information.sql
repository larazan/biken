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

-- Dumping structure for table ecommerce.tbl_information
CREATE TABLE IF NOT EXISTS `tbl_information` (
  `infos_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext,
  `description` longtext,
  PRIMARY KEY (`infos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_information: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_information` DISABLE KEYS */;
INSERT INTO `tbl_information` (`infos_id`, `type`, `description`) VALUES
	(1, 'tentang_kami', NULL),
	(2, 'kebijakan_privasi', NULL),
	(3, 'order_n_refund', NULL),
	(4, 'syarat_n_ketentuan', NULL);
/*!40000 ALTER TABLE `tbl_information` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
