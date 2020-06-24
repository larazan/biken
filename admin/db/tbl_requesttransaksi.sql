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

-- Dumping structure for table ecommerce.tbl_requesttransaksi
CREATE TABLE IF NOT EXISTS `tbl_requesttransaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_code` varchar(3) DEFAULT NULL,
  `status_message` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `gross_amount` decimal(20,2) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `transaction_status` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `va_number` varchar(50) DEFAULT NULL,
  `fraud_status` varchar(50) DEFAULT NULL,
  `bca_va_number` varchar(50) DEFAULT NULL,
  `permata_va_number` varchar(50) DEFAULT NULL,
  `pdf_url` varchar(200) DEFAULT NULL,
  `finish_redirect_url` varchar(200) DEFAULT NULL,
  `bill_key` varchar(50) DEFAULT NULL,
  `biller_code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_requesttransaksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_requesttransaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_requesttransaksi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
