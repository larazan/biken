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

-- Dumping structure for table ecommerce.products
CREATE TABLE IF NOT EXISTS `products` (
  `prodId` char(25) NOT NULL,
  `prodCtgId` int(11) DEFAULT NULL,
  `prodName` char(50) DEFAULT NULL,
  `prodSKU` char(50) DEFAULT NULL,
  `prodUrl` char(50) DEFAULT NULL,
  `prodAvail` char(1) DEFAULT NULL,
  `prodDesc` text,
  `prodSpec` text,
  `prodPics` text,
  `prodBrand` bigint(20) DEFAULT NULL,
  `prodPrice` bigint(20) DEFAULT NULL,
  `prodQty` bigint(20) DEFAULT NULL,
  `prodWeight` bigint(20) DEFAULT NULL,
  `prodDisc` bigint(20) DEFAULT NULL,
  `prodView` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`prodId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.products: ~0 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`prodId`, `prodCtgId`, `prodName`, `prodSKU`, `prodUrl`, `prodAvail`, `prodDesc`, `prodSpec`, `prodPics`, `prodBrand`, `prodPrice`, `prodQty`, `prodWeight`, `prodDisc`, `prodView`, `created_at`, `updated_at`, `status`) VALUES
	('1', 2, 'Laptop SNSV Core i3-8560', 'CS323', 'Laptop-SNSV-Core-i3-8560', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', '200626041459_product06.png', 1, 10000000, 11, 5, NULL, NULL, '2020-06-30 15:56:18', NULL, '1'),
	('2', 24, 'Macbook Pro 2019 MVVL2ID/A / MVVJ2ID/A TouchBar 16', 'MC2345', 'Macbook-Pro-2019-MVVL2IDA-MVVJ2IDA-TouchBar-16inch', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', '200630085536_product01.png', 4, 35990000, 3, 4, NULL, NULL, '2020-06-30 16:01:35', NULL, '1'),
	('3', 24, 'Macbook Pro 2019 TouchBar MUHN2 13" 8GB 128GB 1.4G', 'MC5678', 'Macbook-Pro-2019-TouchBar-MUHN2-13-8GB-128GB-14GHz', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', '200630090230_product03.png', 4, 20600000, 4, 4, NULL, NULL, '2020-06-30 16:12:43', NULL, '1'),
	('4', 25, 'Asus Tuf Gaming FX505DY-R5698T-Amd Ryzen 5 3550H-8', 'AS2345', 'Asus-Tuf-Gaming-FX505DY-R5698T-Amd-Ryzen-5-3550H-8', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', '200630091024_product08.png', 5, 8684990, 5, 4, NULL, NULL, '2020-06-30 16:12:42', NULL, '1'),
	('5', 2, 'Samsung Galaxy Tab A 8.0 2019 2/32 Gb T295 TabA A8', 'SA9876', 'Samsung-Galaxy-Tab-A-80-2019-232-Gb-T295-TabA-A8', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:2:{i:0;a:2:{s:4:"name";s:15:"Memory Internal";s:5:"value";s:21:"32 GB, 2 GB RAM (LTE)";}i:1;a:2:{s:4:"name";s:7:"Battery";s:5:"value";s:37:"Non-removable Li-Ion 4200 mAh battery";}}', '200630091522_product04.png', 1, 1945000, 7, 2, NULL, NULL, '2020-06-30 16:16:16', NULL, '1'),
	('6', 26, 'Bose QuietComfort 35 ii / QC35ii wireless headphon', 'BS7685', 'Bose-QuietComfort-35-ii-QC35ii-wireless-headphones', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', NULL, '200630091924_product02.png', 6, 6289300, 6, 2, NULL, NULL, '2020-06-30 16:24:49', NULL, '1'),
	('7', 26, 'BOSE QC35 Wireless Headphone Silver / Hitam', 'BS4321', 'BOSE-QC35-Wireless-Headphone-Silver-Hitam', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', NULL, '200630092311_product05.png', 6, 5980000, 7, 2, NULL, NULL, '2020-06-30 16:31:07', NULL, '1'),
	('8', 26, 'Sennheiser HD 4.50 BTNC Wireless Bluetooth Noise C', 'SN6664', 'Sennheiser-HD-450-BTNC-Wireless-Bluetooth-Noise-Ca', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', NULL, '200630092644_shop03.png', 7, 2499000, 7, 2, NULL, NULL, '2020-06-30 16:33:09', NULL, '1'),
	('9', 2, 'Samsung Galaxy S10 Plus - Ram 8/128Gb', 'SA9809', 'Samsung-Galaxy-S10-Plus-Ram-8128Gb', NULL, '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', NULL, '200630092908_product07.png', 1, 9999000, 9, 2, NULL, NULL, '2020-06-30 16:35:23', NULL, '1');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
