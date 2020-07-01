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

-- Dumping structure for table ecommerce.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `product_description` text,
  `product_specification` text,
  `product_size` text,
  `product_color` text,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_brand` int(11) DEFAULT NULL,
  `product_weight` float DEFAULT NULL,
  `product_view` int(11) DEFAULT NULL,
  `product_url` varchar(255) DEFAULT NULL,
  `product_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_product: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`product_id`, `product_title`, `sku`, `product_description`, `product_specification`, `product_size`, `product_color`, `product_image`, `product_price`, `product_quantity`, `product_category`, `product_brand`, `product_weight`, `product_view`, `product_url`, `product_status`, `created_at`, `updated_at`) VALUES
	(1, 'Laptop SNSV Core i3-8560', 'CS323', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', 'a:0:{}', 'a:0:{}', '200626041459_product06.png', 10000000, 11, 2, 1, 5, NULL, 'Laptop-SNSV-Core-i3-8560', 1, 1593137700, 1593137700),
	(2, 'Macbook Pro 2019 MVVL2ID/A / MVVJ2ID/A TouchBar 16"inch i7 16Gb 512GB - SILVER', 'MC2345', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', 'a:0:{}', 'a:0:{}', '200630085536_product01.png', 35990000, 3, 24, 4, 4, NULL, 'Macbook-Pro-2019-MVVL2IDA-MVVJ2IDA-TouchBar-16inch-i7-16Gb-512GB-SILVER', 1, 1593500136, 1593500136),
	(3, 'Macbook Pro 2019 TouchBar MUHN2 13" 8GB 128GB 1.4GHz Quadcore i5 Grey - Inter', 'MC5678', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', 'a:0:{}', 'a:0:{}', '200630090230_product03.png', 20600000, 4, 24, 4, 4, NULL, 'Macbook-Pro-2019-TouchBar-MUHN2-13-8GB-128GB-14GHz-Quadcore-i5-Grey-Inter', 1, 1593500550, 1593500550),
	(4, 'Asus Tuf Gaming FX505DY-R5698T-Amd Ryzen 5 3550H-8GB-1TB-RADEON RX560X', 'AS2345', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:4:{i:0;a:2:{s:4:"name";s:9:"Prosessor";s:5:"value";s:18:"Intel Core i7-8650";}i:1;a:2:{s:4:"name";s:18:"Penyimpanan(Utama)";s:5:"value";s:9:"SSD 256Gb";}i:2;a:2:{s:4:"name";s:21:"Penyimpanan(Sekunder)";s:5:"value";s:9:"HDD 500Gb";}i:3;a:2:{s:4:"name";s:3:"RAM";s:5:"value";s:9:"DDR-4 8Gb";}}', 'a:0:{}', 'a:0:{}', '200630091024_product08.png', 8684990, 5, 25, 5, 4, NULL, 'Asus-Tuf-Gaming-FX505DY-R5698T-Amd-Ryzen-5-3550H-8GB-1TB-RADEON-RX560X', 1, 1593501024, 1593501024),
	(5, 'Samsung Galaxy Tab A 8.0 2019 2/32 Gb T295 TabA A8', 'SA9876', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:2:{i:0;a:2:{s:4:"name";s:15:"Memory Internal";s:5:"value";s:21:"32 GB, 2 GB RAM (LTE)";}i:1;a:2:{s:4:"name";s:7:"Battery";s:5:"value";s:37:"Non-removable Li-Ion 4200 mAh battery";}}', 'a:0:{}', 'a:0:{}', '200630091522_product04.png', 1945000, 7, 2, 1, 2, NULL, 'Samsung-Galaxy-Tab-A-80-2019-232-Gb-T295-TabA-A8', 1, 1593501322, 1593501322),
	(6, 'Bose QuietComfort 35 ii / QC35ii wireless headphones Black / Silver', 'BS7685', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:1:{i:0;a:2:{s:4:"name";s:0:"";s:5:"value";s:0:"";}}', 'a:0:{}', 'a:0:{}', '200630091924_product02.png', 6289300, 6, 26, 6, 2, NULL, 'Bose-QuietComfort-35-ii-QC35ii-wireless-headphones-Black-Silver', 1, 1593501564, 1593501564),
	(7, 'BOSE QC35 Wireless Headphone Silver / Hitam', 'BS4321', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:1:{i:0;a:2:{s:4:"name";s:0:"";s:5:"value";s:0:"";}}', 'a:0:{}', 'a:0:{}', '200630092311_product05.png', 5980000, 3, 26, 6, 2, NULL, 'BOSE-QC35-Wireless-Headphone-Silver-Hitam', 1, 1593501791, 1593501791),
	(8, 'Sennheiser HD 4.50 BTNC Wireless Bluetooth Noise Cancelling Headphones', 'SN6664', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:1:{i:0;a:2:{s:4:"name";s:0:"";s:5:"value";s:0:"";}}', 'a:0:{}', 'a:0:{}', '200630092644_shop03.png', 2499000, 7, 26, 7, 2, NULL, 'Sennheiser-HD-450-BTNC-Wireless-Bluetooth-Noise-Cancelling-Headphones', 1, 1593502004, 1593502004),
	(9, 'Samsung Galaxy S10 Plus - Ram 8/128Gb', 'SA9809', '<p><span xss=removed>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore nihil illum, ad iusto deleniti minima officiis. Iste, culpa ut ea reiciendis quos non dicta alias adipisci, illo, at delectus!</span><br></p>', 'a:1:{i:0;a:2:{s:4:"name";s:0:"";s:5:"value";s:0:"";}}', 'a:0:{}', 'a:0:{}', '200630092908_product07.png', 9999000, 5, 2, 1, 2, NULL, 'Samsung-Galaxy-S10-Plus-Ram-8128Gb', 1, 1593502148, 1593502148);
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
