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


-- Dumping database structure for sawgaji
DROP DATABASE IF EXISTS `sawgaji`;
CREATE DATABASE IF NOT EXISTS `sawgaji` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sawgaji`;

-- Dumping structure for table sawgaji.tb_karyawan
DROP TABLE IF EXISTS `tb_karyawan`;
CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `nip` int NOT NULL DEFAULT '0',
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `pendidikan` int DEFAULT NULL,
  `lama_kerja` int DEFAULT NULL,
  `kehadiran` int DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `fk_status` (`status`),
  KEY `fk_pendidikan` (`pendidikan`),
  KEY `fk_lama_kerja` (`lama_kerja`),
  KEY `fk_kehadiran` (`kehadiran`),
  CONSTRAINT `fk_kehadiran` FOREIGN KEY (`kehadiran`) REFERENCES `tb_subkriteria` (`id_subkriteria`),
  CONSTRAINT `fk_lama_kerja` FOREIGN KEY (`lama_kerja`) REFERENCES `tb_subkriteria` (`id_subkriteria`),
  CONSTRAINT `fk_pendidikan` FOREIGN KEY (`pendidikan`) REFERENCES `tb_subkriteria` (`id_subkriteria`),
  CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES `tb_subkriteria` (`id_subkriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sawgaji.tb_karyawan: ~10 rows (approximately)
REPLACE INTO `tb_karyawan` (`nip`, `nama`, `status`, `pendidikan`, `lama_kerja`, `kehadiran`) VALUES
	(443, 'ridho', 2, 6, 10, 14),
	(42009001, 'Vina', 2, 3, 10, 14),
	(512011001, 'Dinda', 2, 4, 9, 12),
	(512011002, 'Chella', 1, 6, 7, 13),
	(512011003, 'Doni A', 1, 6, 7, 11),
	(512011005, 'Thalia', 1, 6, 7, 13),
	(512011006, 'Netta', 1, 6, 7, 14),
	(512011007, 'Tara', 1, 6, 8, 13),
	(512011010, 'Anton', 1, 6, 7, 14),
	(1520110004, 'Shinta S', 2, 5, 8, 12),
	(2147483647, 'Rio', 2, 4, 8, 14);

-- Dumping structure for table sawgaji.tb_kriteria
DROP TABLE IF EXISTS `tb_kriteria`;
CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `id_kriteria` int NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `kategori` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `bobot_k` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nilai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sawgaji.tb_kriteria: ~4 rows (approximately)
REPLACE INTO `tb_kriteria` (`id_kriteria`, `kriteria`, `kategori`, `bobot_k`, `nilai`) VALUES
	(1, 'Status', 'Cost', '0.2', '60'),
	(2, 'Pendidikan', 'Benefit', '0.19', '55'),
	(3, 'LamaKerja', 'Benefit', '0.3', '88'),
	(4, 'Kehadiran', 'Benefit', '0.31', '92');

-- Dumping structure for table sawgaji.tb_subkriteria
DROP TABLE IF EXISTS `tb_subkriteria`;
CREATE TABLE IF NOT EXISTS `tb_subkriteria` (
  `id_subkriteria` int NOT NULL AUTO_INCREMENT,
  `id_kriteria` int NOT NULL DEFAULT '0',
  `bobot_sk` double NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_subkriteria`),
  KEY `fk_tb_subkriteria_tb_kriteria` (`id_kriteria`),
  CONSTRAINT `fk_tb_subkriteria_tb_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sawgaji.tb_subkriteria: ~12 rows (approximately)
REPLACE INTO `tb_subkriteria` (`id_subkriteria`, `id_kriteria`, `bobot_sk`, `keterangan`) VALUES
	(1, 1, 0.25, 'Belum Menikah'),
	(2, 1, 1, 'Menikah'),
	(3, 2, 0.25, 'SMP'),
	(4, 2, 0.5, 'SMA'),
	(5, 2, 0.75, 'D1-D3'),
	(6, 2, 1, 'S1'),
	(7, 3, 0.25, '1-3 Tahun'),
	(8, 3, 0.5, '4-6 Tahun'),
	(9, 3, 0.75, '7-9 Tahun'),
	(10, 3, 1, '>10 Tahun'),
	(11, 4, 0.25, '<82%'),
	(12, 4, 0.5, '83%-88%'),
	(13, 4, 0.75, '89%-94%'),
	(14, 4, 1, '95%-100%');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
