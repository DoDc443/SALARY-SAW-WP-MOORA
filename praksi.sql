-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table umkm.databobot
CREATE TABLE IF NOT EXISTS `databobot` (
  `iddatabobot` int NOT NULL AUTO_INCREMENT,
  `kodekriteria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `namabobot` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nilaibobot` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddatabobot`) USING BTREE,
  KEY `kodekriteria` (`kodekriteria`),
  CONSTRAINT `databobot_ibfk_1` FOREIGN KEY (`kodekriteria`) REFERENCES `datakriteria` (`kodekriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table umkm.databobot: ~10 rows (approximately)
REPLACE INTO `databobot` (`iddatabobot`, `kodekriteria`, `namabobot`, `nilaibobot`) VALUES
	(1, 'C1', 'Mikro', 30),
	(2, 'C1', 'Makro', 70),
	(3, 'C2', '<=1', 10),
	(4, 'C2', '1-50', 20),
	(5, 'C2', '51-100', 30),
	(6, 'C2', '>100', 40),
	(7, 'C3', '<=1000000', 10),
	(8, 'C3', '1000000-2000000', 20),
	(9, 'C3', '2000000-3000000', 30),
	(10, 'C3', '>3000000', 40);

-- Dumping structure for table umkm.dataumkm
CREATE TABLE IF NOT EXISTS `dataumkm` (
  `iddataumkm` int NOT NULL AUTO_INCREMENT,
  `namausaha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `namapimpinan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `jalan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `desa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `kecamatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `idjenisusaha` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`iddataumkm`),
  KEY `idjenisusaha` (`idjenisusaha`),
  CONSTRAINT `dataumkm_ibfk_1` FOREIGN KEY (`idjenisusaha`) REFERENCES `jenisusaha` (`idjenisusaha`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table umkm.dataumkm: ~1 rows (approximately)
REPLACE INTO `dataumkm` (`iddataumkm`, `namausaha`, `namapimpinan`, `jalan`, `desa`, `kecamatan`, `idjenisusaha`) VALUES
	(6, '1231', '12312', '31231', '12312', '3123123', 9);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
