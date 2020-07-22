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

-- Dumping data for table ecommerce.ci_sessions: ~22 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('tj9ik19badaqiegbqig4be0j299ksdmk', '::1', 1591580872, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313538303837313B),
	('ptutbhiu8ob71h3k15adpmikbo5bko2h', '::1', 1591587804, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313538373830343B),
	('405srgcu18sa853j9sm6fuhn7u4n5p56', '::1', 1591588562, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313538383536323B),
	('6fqk710qnmbk7jb984qn8tor74mhsk3c', '::1', 1591589818, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313538393831383B),
	('dp8e9rmqr571m8l5vlsshjd76onhh1gh', '::1', 1591591588, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313539313538383B),
	('pvc7dagr4qikbi6l8eq1u18l365v4suq', '::1', 1591596486, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313539363438363B),
	('4g46es51mgr9ba80pn6quspdd8db8b0d', '::1', 1591597510, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313539373531303B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('886bqa9djk9arh6bgema8ihqfj628mp2', '::1', 1591597869, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313539373836393B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('grkdteh4kbvrulj06qd6p6pcmkl230ds', '::1', 1591599002, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313539393030323B),
	('at0s13gm9mfmio23s2g4lgm8ogql8hre', '::1', 1591600425, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630303432353B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('hl7pmq3v31ndvijrgeouujcfhrjmvucd', '::1', 1591601517, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630313531373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('u96efb44dg3g8ogli1em564f3t6682p2', '::1', 1591601913, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630313931333B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('1e1r6e5il74gdctm8mqao3fnijrvfimv', '::1', 1591604147, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630343134373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('b3cp0h0h3n2tup3p3131vbrg343cq3gu', '::1', 1591604768, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630343736383B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('rirmeo48j1qpi1g4ff153hdvqk2b6dpn', '::1', 1591605226, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630353232363B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('bo5cla3ved0qejqb50ihu2ifbsbcgdaj', '::1', 1591605667, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630353636373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('t23o7841l40v0qdf084ep0ff0eg7g0d2', '::1', 1591605929, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313630353636373B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('vnsokv2d014p7lhppapk0u4196vhc08s', '::1', 1591842864, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313834323836343B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('0h797hsqqba6bcr8rbohmmfa3aoheidg', '::1', 1591847672, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313834373637323B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('5tafjsejdpq99hqvsd73b2b4q9p6gijq', '::1', 1591848269, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313834383236393B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('qdemlh0il7nq7vp4gk36crrnrpofeqaq', '::1', 1591848380, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313834383236393B7573657249647C733A313A2234223B6E616D657C733A353A2261646D696E223B69734C6F67676564496E7C623A313B),
	('ffmolpvg78a82hjes5ugaj6fap6075lb', '::1', 1591861480, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313539313836313437373B);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;