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

-- Dumping structure for table ecommerce.tbl_location
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `id_location` int(11) DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kabupaten` int(11) DEFAULT NULL,
  `kecamatan` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_location: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_location` DISABLE KEYS */;
INSERT INTO `tbl_location` (`id_location`, `provinsi`, `kabupaten`, `kecamatan`, `created_at`, `updated_at`) VALUES
	(1, 9, 149, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_location` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
