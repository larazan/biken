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

-- Dumping structure for table ecommerce.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `timestamp` int(10) DEFAULT '0',
  `data` blob,
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.ci_sessions: ~25 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('dmdugcgr63of2qgmkk3klerr8t9ok7ut', '::1', 1593566677, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333536363637373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('slk2qnmtf6ti4h08eqfohk135iolrvu6', '::1', 1593567674, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333536373637343B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('9uiqd2luj5c99tonqlvqsul1qkmfilrg', '::1', 1593568451, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333536383435313B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('npnr9fpprk3dsehqpvdqoqgojcq55sf0', '::1', 1593568877, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333536383837373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('860abm2dc9q86f910r246aaagqdlrcq5', '::1', 1593569209, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333536393230393B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('d96nmho463l9so0q6s90fkkfn37ajfpo', '::1', 1593570439, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333537303433393B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('u4fklos6jfb1us8b45qcjl1siut1k62e', '::1', 1593571613, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333537313631333B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('t8qiou2jchev4nipv0iaglus6go6hmv7', '::1', 1593571630, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333537313631333B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('pk990c6r9g2omus7hk6oj28jpfjp516b', '::1', 1593656533, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333635363533333B),
	('4332ku61cf8vbvr3hb47uuge4uln1aq5', '::1', 1593656842, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333635363834323B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('96d668900t15e9qpbbce8h7bf5b3s8p6', '::1', 1593657227, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333635373232373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('h2fgpn61u5dcp906ke8mihcpdrhsfoki', '::1', 1593657913, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333635373931333B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('202orl86a6dn85se74vmvs0sdtim1kq5', '::1', 1593658577, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333635383537373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('jdu3h3nkt66mhad2tuvn1mnsfiulf5jr', '::1', 1593659209, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333635393230393B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('0cjvctb2m3j0qjmu5jnbmb6afpmsaefn', '::1', 1593659724, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333635393732343B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('rbsaracrc0h23h4upu4ebsllo7fi98ps', '::1', 1593660967, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333636303936373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('j8hcoj1hu4hlkan0n3ob42r85dsj72cm', '::1', 1593661883, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333636313838333B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('q3u46hm510m0kg8sssvs6aba5eep6l3l', '::1', 1593662225, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333636323232353B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('j97bd843ve04o3l00glfun7i40s9rdnc', '::1', 1593662533, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333636323533333B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('4p345v7vujj2i3vt4mm2ivgpql8gk8sh', '::1', 1593662875, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333636323837353B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('vju0ed5b1s4alr23lodc0jhbrh694aon', '::1', 1593663035, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333636323837353B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('1gkafo3tl6csg8k5vghj1p3ca070ahq5', '::1', 1593670215, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333637303231303B),
	('vah2o8bl8d3g17d5iku4ihc4aso3kdld', '192.168.1.89', 1593740251, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333734303235313B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('fpipv435mhaf20neifs6tda9ghflbono', '192.168.1.89', 1593740264, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333734303235313B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('p5rjeab4qh2cmtdgsqfmhn7t1n249pic', '::1', 1593762450, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539333736323430383B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B6974656D7C733A3139383A223C64697620636C6173733D22616C65727420616C6572742D7375636365737320616C6572742D6469736D69737369626C6520666164652073686F772220726F6C653D22616C657274223E3C627574746F6E20747970653D22627574746F6E2220636C6173733D22636C6F73652220646174612D6469736D6973733D22616C6572742220617269612D6C6162656C3D22436C6F7365223E3C2F627574746F6E3E54686520636F6C6F7220776173207375636365737366756C6C792061646465642E3C2F6469763E223B5F5F63695F766172737C613A313A7B733A343A226974656D223B733A333A226F6C64223B7D);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Dumping structure for table ecommerce.contoh
CREATE TABLE IF NOT EXISTS `contoh` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.contoh: ~4 rows (approximately)
/*!40000 ALTER TABLE `contoh` DISABLE KEYS */;
INSERT INTO `contoh` (`co_id`, `id`, `name`, `price`, `quantity`, `total`) VALUES
	(1, 'a2', 'Durian', 630000, 1, 630000),
	(2, 'a3', 'Mangga', 7000, 4, 28000),
	(3, 'a4', 'Jeruk', 6000, 5, 30000),
	(4, 'a1', 'Apple', 13000, 2, 26000);
/*!40000 ALTER TABLE `contoh` ENABLE KEYS */;

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

-- Dumping data for table ecommerce.products: ~9 rows (approximately)
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

-- Dumping structure for table ecommerce.tbl_article
CREATE TABLE IF NOT EXISTS `tbl_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `body` text,
  `featured_image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `viewed` int(11) DEFAULT '0',
  `published_at` varchar(50) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_article: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_article` DISABLE KEYS */;
INSERT INTO `tbl_article` (`id`, `title`, `slug`, `author`, `body`, `featured_image`, `status`, `viewed`, `published_at`, `created_at`, `updated_at`) VALUES
	(14, 'lipsum', 'lipsum', '0', '<p><span xss=removed>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span><br></p>', NULL, 1, 0, NULL, 1591604768, 1591604768);
/*!40000 ALTER TABLE `tbl_article` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_bank
CREATE TABLE IF NOT EXISTS `tbl_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `rekening` varchar(50) DEFAULT NULL,
  `anam` varchar(50) DEFAULT NULL,
  `featured_image` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_bank: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_bank` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bank` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_banner
CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) DEFAULT NULL,
  `banner_img` varchar(255) DEFAULT NULL,
  `banner_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_banner: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_banner` ENABLE KEYS */;

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

-- Dumping structure for table ecommerce.tbl_brand
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_description` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_brand: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_brand` DISABLE KEYS */;
INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Samsung', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 1592438400, 1592438400),
	(2, 'iPhone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 1592438400, 1592438400),
	(3, 'Samase', NULL, 1, 1591602024, 1591602024),
	(4, 'Apple', NULL, 1, 1593499386, 1593499386),
	(5, 'Asus', NULL, 1, 1593500785, 1593500785),
	(6, 'Bose', NULL, 1, 1593500828, 1593500828),
	(7, 'Sennheiser', NULL, 1, 1593500880, 1593500880);
/*!40000 ALTER TABLE `tbl_brand` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `cat_url` varchar(100) DEFAULT NULL,
  `category_description` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_category: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`id`, `category_name`, `cat_url`, `category_description`, `status`, `created_at`, `updated_at`) VALUES
	(4, 'Handphone & Aksesoris', 'Handphone-Aksesoris', NULL, 1, 1593566749, 1593566749),
	(5, 'Pakaian Pria', 'Pakaian-Pria', NULL, 1, 1593566742, 1593566742),
	(6, 'Pakaian Wanita', 'Pakaian-Wanita', NULL, 1, 1593566728, 1593566728),
	(7, 'Komputer & Aksesoris', 'Komputer-Aksesoris', NULL, 1, 1593566703, 1593566703);
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_color
CREATE TABLE IF NOT EXISTS `tbl_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `color_status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_color: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_color` DISABLE KEYS */;
INSERT INTO `tbl_color` (`color_id`, `name`, `color_status`) VALUES
	(1, 'Merah', 1),
	(2, 'Biru', 1);
/*!40000 ALTER TABLE `tbl_color` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_contact
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(50) DEFAULT NULL,
  `contact_msg` text,
  `contact_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_contact: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contact` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_customer
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_password` varchar(50) DEFAULT NULL,
  `customer_address` text,
  `customer_city` varchar(50) DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `customer_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_customer: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_city`, `customer_phone`, `customer_status`, `created_at`) VALUES
	(1, 'Nadia', 'nadia@email.com', NULL, 'Jl. Maulana Hasanudin, RT.001/RW.002, Cipondoh Makmur, Kec. Cipondoh, Kota Tangerang, Banten 15122', 'surabaya', '089999999999', 1, 1593129600),
	(2, 'Yono', 'yono@email.com', NULL, 'Ruko Mangga Dua Square Blok E No.24, Jl. Gn. Sahari No.1, RT.12/RW.6, Ancol, Pademangan, North Jakarta City, Jakarta 14430', 'surabaya', '089555555555', 1, 1593129600);
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_information
CREATE TABLE IF NOT EXISTS `tbl_information` (
  `infos_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext,
  `description` longtext,
  PRIMARY KEY (`infos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_information: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_information` DISABLE KEYS */;
INSERT INTO `tbl_information` (`infos_id`, `type`, `description`) VALUES
	(1, 'tentang_kami', '<div class="page-title-wrapper" style="color: rgb(51, 51, 51); font-family: Poppins, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px;"><h1 class="page-title" style="line-height: 1.1; font-size: 37px; margin-bottom: 30px;"><span class="base" data-ui-id="page-title-wrapper">TENTANG ERAFONE.COM</span></h1></div><p style="color: rgb(51, 51, 51); font-family: Poppins, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px;">Erafone.com merupakan satu-satunya online retail smartphone, gadget, IOT dan aksesoris pendukungnya di Indonesia yang memberikan pengalaman belanja online aman dan nyaman dengan jaminan orisinalitas serta garansi resmi untuk semua produk yang dijual dari berbagai merek ternama seperti Apple, Samsung, Xiaomi, Huawei, Oppo, Vivo, Nokia, Asus, Realme, Honor, Smartfren, DJI, GoPro, Garmin, JBL dan masih banyak lagi.</p><p style="color: rgb(51, 51, 51); font-family: Poppins, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px;">Erafone.com juga memberikan pengalaman berbelanja online yang tidak akan terlupakan dengan terintegrasinya website Erafone.com dengan ratusan toko Erafone yang tersebar di seluruh Indonesia sehingga memungkinkan untuk melakukan transaksi Online to Offline ataupun Offline to Online dengan beragam pilihan fasilitas pembayaran yang lengkap, mudah dan aman. &nbsp;</p><p style="color: rgb(51, 51, 51); font-family: Poppins, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px;">Erafone.com akan selalu berusaha memberikan penawaran menarik dan pelayanan terbaik seperti kemudahan pembayaran, fleksibilitas pemesanan (bias melalui website ataupun toko), fasilitas pengembalian produk, layanan konsumen dan layanan purna jual (after sales) yang terjamin karena Erafone.com memiliki kemitraan dan lisensi langsung dari pemegang merek ternama untuk semua produk yang dijual.</p>'),
	(2, 'kebijakan_privasi', NULL),
	(3, 'order_n_refund', NULL),
	(4, 'syarat_n_ketentuan', NULL);
/*!40000 ALTER TABLE `tbl_information` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_kurir
CREATE TABLE IF NOT EXISTS `tbl_kurir` (
  `kurir_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`kurir_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_kurir: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_kurir` DISABLE KEYS */;
INSERT INTO `tbl_kurir` (`kurir_id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'JNE', 'jne', 1, 1592529166, NULL),
	(2, 'TIKI', 'tiki', 1, 1592529193, NULL),
	(3, 'J&T', 'jnt', 1, 1592529217, NULL),
	(4, 'POS Indonesia', 'pos', 1, 1592529234, NULL);
/*!40000 ALTER TABLE `tbl_kurir` ENABLE KEYS */;

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
  `opened` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_order: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_payment_confirm
CREATE TABLE IF NOT EXISTS `tbl_payment_confirm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rekening` varchar(50) DEFAULT NULL,
  `bank` tinyint(4) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `date_payment` int(11) DEFAULT NULL,
  `featured_image` text,
  `description` text,
  `status` tinyint(4) DEFAULT NULL,
  `opened` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_payment_confirm: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_payment_confirm` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_payment_confirm` ENABLE KEYS */;

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

-- Dumping data for table ecommerce.tbl_product: ~8 rows (approximately)
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

-- Dumping structure for table ecommerce.tbl_product_color
CREATE TABLE IF NOT EXISTS `tbl_product_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_product_color: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_product_color` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_color` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_product_size
CREATE TABLE IF NOT EXISTS `tbl_product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_product_size: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_product_size` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_product_size` ENABLE KEYS */;

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

-- Dumping structure for table ecommerce.tbl_reset_password
CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_reset_password: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_reset_password` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reset_password` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_roles
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text',
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.tbl_roles: 3 rows
/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
	(1, 'System Administrator'),
	(2, 'Manager'),
	(3, 'Employee');
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_settings
CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext,
  `description` longtext,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_settings: ~16 rows (approximately)
/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` (`settings_id`, `type`, `description`) VALUES
	(1, 'shop_name', 'Wiklan | Situs Belanja Online Media Iklan Indoor dan Outdoor'),
	(2, 'address', 'Jl. Adityawarman No. 2 Surabaya 60242 Jawa Timur - Indonesia'),
	(3, 'phone', '(031) 512 01088'),
	(4, 'email', 'cs@wiklan.com'),
	(5, 'author', 'PT. Wijaya Iklan Indonesia (Wiklan)'),
	(6, 'logo', 'logo_wiklan.png'),
	(7, 'homepage_background', 'homepage_background.jpg'),
	(8, 'description', 'Wiklan adalah Perusahaan Swasta Nasional yang berbasis teknologi dalam menghasilkan titik lokasi terbaik yang berfokus pada bidang periklanan dan terus bertumbuh secara berkesinambungan, memberikan kesejahteraan dan menjadi saluran berkat bagi semua yang berhubungan dengan kami. Kami juga melayani pembuatan berbagai jenis media iklan mulai dari billboards, baliho, pedestrian bridge (JPO), videotron, road sign, midi board, neon box, dll.'),
	(9, 'keyword', 'Advertising Indonesia, Billboard, Baliho, JPO, Videotron, Road Sign, dll.'),
	(10, 'rekening_pembayaran', '010 642 703 5'),
	(11, 'facebook', 'http://www.facebook.com/username'),
	(12, 'instagram', 'http://www.instagram.com/username'),
	(13, 'metatext', 'Explore internships, graduate jobs &amp; career development resources on Glints. Do what you love on our career discovery &amp; development platform'),
	(14, 'icon', 'logo_wiklan.png'),
	(15, 'tagline', 'Berpacu dalam melodi'),
	(16, 'rajaongkir_key', '18c1ae365c10fea954e08449b1c2e185'),
	(17, 'midtrans_key', NULL),
	(18, 'kurir', 'a:3:{i:0;s:3:"jne";i:1;s:4:"tiki";i:2;s:3:"pos";}'),
	(19, 'password', NULL);
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_size
CREATE TABLE IF NOT EXISTS `tbl_size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `size_status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_size: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_size` DISABLE KEYS */;
INSERT INTO `tbl_size` (`size_id`, `name`, `size_status`) VALUES
	(1, 'L', 1);
/*!40000 ALTER TABLE `tbl_size` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_subcategory
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `sub_name` varchar(50) DEFAULT NULL,
  `subcat_url` varchar(50) DEFAULT NULL,
  `sub_status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_subcategory: ~13 rows (approximately)
/*!40000 ALTER TABLE `tbl_subcategory` DISABLE KEYS */;
INSERT INTO `tbl_subcategory` (`sub_id`, `cat_id`, `sub_name`, `subcat_url`, `sub_status`, `created_at`, `updated_at`) VALUES
	(2, 4, 'Handphone & Tablet', 'Handphone-Tablet', 1, 1593566933, 1593566933),
	(3, 4, 'Casing & Covers', 'Casing-Covers', 1, 1593566925, 1593566925),
	(4, 4, 'Powerbank & Baterai', 'Powerbank-Baterai', 1, 1593566915, 1593566915),
	(5, 5, 'Atasan', 'Atasan', 1, 1593566905, 1593566905),
	(6, 5, 'Bawahan', 'Bawahan', 1, 1593566898, 1593566898),
	(7, 5, 'Outwear', 'Outwear', 1, 1593566890, 1593566890),
	(8, 6, 'Atasan', 'Atasan', 1, 1593566861, 1593566861),
	(9, 6, 'Outwear', 'Outwear', 1, 1593566882, 1593566882),
	(10, 7, 'Laptop', 'Laptop', 1, 1593566841, 1593566841),
	(11, 7, 'Desktop', 'Desktop', 1, 1593566833, 1593566833),
	(12, 7, 'Mouse & Keyboard', 'Mouse-Keyboard', 1, 1593566814, 1593566814),
	(13, 7, 'Komponen Komputer', 'Komponen-Komputer', 1, 1593566806, 1593566806),
	(14, 7, 'Audio Komputer', 'Audio-Komputer', 1, 1593566800, 1593566800);
/*!40000 ALTER TABLE `tbl_subcategory` ENABLE KEYS */;

-- Dumping structure for table ecommerce.tbl_subscribe
CREATE TABLE IF NOT EXISTS `tbl_subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.tbl_subscribe: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_subscribe` DISABLE KEYS */;
INSERT INTO `tbl_subscribe` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'jhon@doe.com', 1, 1593043200, NULL);
/*!40000 ALTER TABLE `tbl_subscribe` ENABLE KEYS */;

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

-- Dumping structure for table ecommerce.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ecommerce.tbl_users: 4 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `created_at`, `updated_at`) VALUES
	(1, 'admin@bewithdhanu.in', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'System Administrator', '9890098900', 0, 1),
	(2, 'manager@bewithdhanu.in', '$2y$10$Gkl9ILEdGNoTIV9w/xpf3.mSKs0LB1jkvvPKK7K0PSYDsQY7GE9JK', 'Manager', '9890098900', 1, 1),
	(3, 'employee@bewithdhanu.in', '$2y$10$MB5NIu8i28XtMCnuExyFB.Ao1OXSteNpCiZSiaMSRPQx1F1WLRId2', 'Employee', '9890098900', 1, 1),
	(4, 'admin@mail.com', '$2y$10$SiHtOc5ahTFlSH7iZT2rxOY3hsz/eHr/zjiEFelYR5SAOnMBTxIWq', 'admin', '08999999999', 1591596487, 1591596487);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for table ecommerce.upload
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(200) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table ecommerce.upload: ~2 rows (approximately)
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` (`id`, `filename`, `created_at`) VALUES
	(13, 'a:2:{i:0;s:36:"b47e8d483d3c1c3f1163c5f07330313b.png";i:1;s:36:"0799409c17767a205273a0e065202524.png";}', 1592971440),
	(14, 'a:3:{i:0;s:36:"638b7d4612b3436647c6ff74c5da1f80.png";i:1;s:36:"81cf297b732e9b84ce9e3a51bd231ab9.png";i:2;s:36:"385bc05864807d84acbfc58379a68a9a.png";}', 1592972493);
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
