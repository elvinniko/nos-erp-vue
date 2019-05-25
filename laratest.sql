-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: laratest
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alamatpelanggan`
--

DROP TABLE IF EXISTS `alamatpelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `alamatpelanggan` (
  `KodePelanggan` varchar(50) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Kota` varchar(100) DEFAULT NULL,
  `Provinsi` varchar(150) DEFAULT NULL,
  `Negara` varchar(100) DEFAULT NULL,
  `Faks` int(11) DEFAULT NULL,
  `Telepon` int(11) DEFAULT NULL,
  `NoIndeks` int(11) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  UNIQUE KEY `KodePelanggan_UNIQUE` (`KodePelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alamatpelanggan`
--

LOCK TABLES `alamatpelanggan` WRITE;
/*!40000 ALTER TABLE `alamatpelanggan` DISABLE KEYS */;
INSERT INTO `alamatpelanggan` VALUES ('CUS1','Villa Puncak Tidar','Malang','Jawa Timur',NULL,12345,12345,NULL,NULL,'2019-03-06 11:05:37.00'),('CUS3','Dinoyo','Malang','Jawa Timur',NULL,12345,12345,NULL,'2019-04-24 18:50:26.00','2019-04-24 18:50:26.00'),('CUS2','Araya','Malang','Jawa Timur',NULL,12345,12345,NULL,'2019-04-25 02:06:12.00','2019-04-25 02:06:12.00');
/*!40000 ALTER TABLE `alamatpelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `item` (
  `KodeItem` varchar(50) NOT NULL,
  `KodeKategori` varchar(50) DEFAULT NULL,
  `Nama_Item` varchar(150) DEFAULT NULL,
  `Alias` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(150) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `KodeUser` varchar(50) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`KodeItem`),
  KEY `kategori` (`KodeKategori`),
  CONSTRAINT `kategori` FOREIGN KEY (`KodeKategori`) REFERENCES `kategori` (`kodekategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `kategori` (
  `KodeKategori` varchar(50) NOT NULL,
  `NamaKategori` varchar(60) DEFAULT NULL,
  `KodeItem` varchar(10) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `DateModified` date DEFAULT NULL,
  `KodeUser` varchar(50) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`KodeKategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES ('KLA1','Minyak','MYK',NULL,NULL,NULL,'2019-02-12 01:09:16.00','2019-02-12 01:09:16.00'),('KLA2','Beras','BRS',NULL,NULL,NULL,'2019-02-12 01:09:34.00','2019-02-12 01:09:34.00'),('KLA3','Mie','MIE',NULL,NULL,NULL,'2019-04-18 20:10:22.00','2019-04-18 20:10:22.00'),('KLA4','Besi','BES',NULL,NULL,NULL,'2019-04-20 04:04:16.00','2019-04-20 04:04:16.00'),('KLA5','Baja','BAJ',NULL,NULL,NULL,'2019-04-23 06:56:11.00','2019-04-23 06:56:11.00');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klasifikasi`
--

DROP TABLE IF EXISTS `klasifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `klasifikasi` (
  `kode_klasifikasi` varchar(45) NOT NULL,
  `nama_klasifikasi` varchar(45) NOT NULL,
  `kode_item` varchar(45) NOT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`kode_klasifikasi`),
  UNIQUE KEY `kode_item_UNIQUE` (`kode_item`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klasifikasi`
--

LOCK TABLES `klasifikasi` WRITE;
/*!40000 ALTER TABLE `klasifikasi` DISABLE KEYS */;
INSERT INTO `klasifikasi` VALUES ('KLA1','Beras','BRS','2019-01-13 11:59:24.00','2019-01-13 11:59:24.00',2),('KLA2','Minyak','MYK','2019-01-13 12:04:11.00','2019-01-13 12:04:11.00',3);
/*!40000 ALTER TABLE `klasifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `lokasi` (
  `KodeLokasi` varchar(50) NOT NULL,
  `NamaLokasi` varchar(50) DEFAULT NULL,
  `Tipe` varchar(5) DEFAULT NULL,
  `Status` varchar(5) DEFAULT NULL,
  `KodeUser` varchar(50) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`KodeLokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT INTO `lokasi` VALUES ('GUD1','Toko Widodo','INV',NULL,NULL,'2019-02-12 02:03:21.00','2019-02-12 02:03:21.00'),('GUD2','Toko Dennis','INV',NULL,NULL,'2019-02-12 02:04:49.00','2019-02-12 02:04:49.00');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matauang`
--

DROP TABLE IF EXISTS `matauang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `matauang` (
  `KodeMataUang` varchar(50) NOT NULL,
  `NamaMataUang` varchar(50) DEFAULT NULL,
  `Nilai` double DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `KodeUser` varchar(255) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`KodeMataUang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matauang`
--

LOCK TABLES `matauang` WRITE;
/*!40000 ALTER TABLE `matauang` DISABLE KEYS */;
INSERT INTO `matauang` VALUES ('Rp','Rupiah',1,NULL,NULL,NULL,'2019-02-19 02:22:32.00','2019-02-19 02:22:32.00'),('USD','US Dollar',14000,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `matauang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',2),(4,'2016_06_01_000002_create_oauth_access_tokens_table',2),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(6,'2016_06_01_000004_create_oauth_clients_table',2),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','8i0dQrKHFFGRxuNDhoGiiIA8qJrpRtgUhz0vQpck','http://localhost',1,0,0,'2019-02-06 09:32:41','2019-02-06 09:32:41'),(2,NULL,'Laravel Password Grant Client','g9b3mZ8JSxm86I1tyuMQsAdbexokqe7fX1mTUAu0','http://localhost',0,1,0,'2019-02-06 09:32:41','2019-02-06 09:32:41');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2019-02-06 09:32:41','2019-02-06 09:32:41');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pelanggan` (
  `KodePelanggan` varchar(50) NOT NULL,
  `NamaPelanggan` varchar(255) DEFAULT NULL,
  `Kontak` varchar(100) DEFAULT NULL,
  `Handphone` varchar(15) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `NIK` varchar(30) DEFAULT NULL COMMENT 'Nomor KTP',
  `LimitPiutang` double DEFAULT NULL,
  `Diskon` double DEFAULT NULL COMMENT 'dalam presentase',
  `Status` varchar(10) DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'tanggal modifikasi data',
  `KodeLokasi` varchar(50) DEFAULT NULL COMMENT 'mengetahui lokasi input data',
  `KodeUser` varchar(50) DEFAULT NULL COMMENT 'untuk mengetahui user yang melakukan input',
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`KodePelanggan`),
  UNIQUE KEY `KodePelanggan_UNIQUE` (`KodePelanggan`),
  KEY `Lokasi` (`KodeLokasi`),
  KEY `Pengguna` (`KodeUser`),
  CONSTRAINT `Lokasi` FOREIGN KEY (`KodeLokasi`) REFERENCES `lokasi` (`kodelokasi`),
  CONSTRAINT `Pengguna` FOREIGN KEY (`KodeUser`) REFERENCES `pengguna` (`kodeuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES ('CUS1','Dennis Lie','Dennis','081945777488','dennischristianto@gmail.com',NULL,NULL,NULL,NULL,'2019-03-04 12:37:43',NULL,NULL,'2019-02-12 04:53:28.00','2019-03-03 22:37:43.00'),('CUS2','Bayu Maha Agung','Bayu','08123456789','bayumahaagung@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-25 02:06:12.00','2019-04-25 02:06:12.00'),('CUS3','Elvin Nikolas','Elvin','12345','elvin@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-24 18:50:26.00','2019-04-24 18:50:26.00');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemesananpenjualan`
--

DROP TABLE IF EXISTS `pemesananpenjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pemesananpenjualan` (
  `KodeSO` varchar(100) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `KodeLokasi` varchar(100) DEFAULT NULL,
  `KodeMataUang` varchar(100) DEFAULT NULL,
  `POPelanggan` varchar(100) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  `KodePelanggan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`KodeSO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemesananpenjualan`
--

LOCK TABLES `pemesananpenjualan` WRITE;
/*!40000 ALTER TABLE `pemesananpenjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemesananpenjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pengguna` (
  `KodeUser` varchar(50) NOT NULL,
  `Password` varchar(25) DEFAULT NULL,
  `NamaUser` varchar(200) DEFAULT NULL,
  `TanggalDaftar` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Aktif` varchar(10) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`KodeUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `satuan` (
  `KodeSatuan` varchar(50) NOT NULL,
  `NamaSatuan` varchar(50) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `KodeUser` varchar(255) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`KodeSatuan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan`
--

LOCK TABLES `satuan` WRITE;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` VALUES ('Kg','Kilogram',NULL,NULL,NULL,'2019-02-14 08:18:01.00','2019-02-14 08:18:01.00'),('Kw','Kwintal',NULL,NULL,NULL,'2019-02-14 08:18:16.00','2019-02-14 08:18:16.00');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `supplier` (
  `KodeSupplier` varchar(50) NOT NULL,
  `NamaSupplier` varchar(255) DEFAULT NULL,
  `Kontak` varchar(100) DEFAULT NULL,
  `Handphone` int(11) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `NIK` varchar(30) DEFAULT NULL COMMENT 'Nomor KTP',
  `Status` varchar(10) DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'tanggal modifikasi data',
  `KodeLokasi` varchar(50) DEFAULT NULL COMMENT 'mengetahui lokasi input data',
  `KodeUser` varchar(50) DEFAULT NULL COMMENT 'untuk mengetahui user yang melakukan input',
  `Alamat` varchar(100) DEFAULT NULL,
  `Kota` varchar(100) DEFAULT NULL,
  `Propinsi` varchar(100) DEFAULT NULL,
  `Negara` varchar(100) DEFAULT NULL,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  `Telepon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`KodeSupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES ('SUP1','Taruna Jaya',NULL,12345,NULL,NULL,NULL,NULL,NULL,NULL,'Martadinata, Malang',NULL,NULL,NULL,'2019-03-01 01:57:34.00','2019-03-01 01:57:34.00','12345');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `kode` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `aktif` varchar(45) DEFAULT 'Y',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(2) NULL DEFAULT NULL,
  `usercol` varchar(45) DEFAULT NULL,
  `updated_at` timestamp(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'profile.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$10$pR7/OEPpdq1OAvBwg/hnUOZFnKOMzXROfU991ueNGlRC/dLkPbDK.','admin','profile.png','THWdXmTloGPxNMONj1dcaKTQutKMGL9MpCkPg4p5rO6jjJXIms4A5SWbAVBH','2019-01-11 05:32:21','2019-01-11 05:32:21'),(2,'John Doe','jd@gmail.com',NULL,'$2y$10$Zg2.PEn3FOpyIOXl2IgdbezYyRCuR5dhVdx.v9iy9nxTJHf7T1Veq','member',NULL,NULL,'2019-01-11 05:40:29','2019-01-11 05:40:29'),(5,'Dennis Lie','duenis@gmail.com',NULL,'$2y$10$kaI/j/Hn.WPoi9hVHkp/qe7.flYe6sjDlpCwipjjr69HrfA2nbc5u','admin',NULL,NULL,'2019-01-11 09:08:40','2019-01-11 09:08:40'),(7,'Mr Somebody','somebody@gmail.com',NULL,'$2y$10$iUpfKEAlsGV65A1L/PyUv.DpT5MWFYqaoGzLlQT8XHxk4ykkyXVWq','member',NULL,NULL,'2019-01-11 10:44:10','2019-01-11 10:44:10'),(8,'Mr Nobody','nobody@gmail.com',NULL,'$2y$10$VhRuVdYlKFSKjAC.QfU0Dui9bDPcBEWeU2ouSoQ5D9a4ORZLkuqaG','user',NULL,NULL,'2019-01-11 11:09:11','2019-01-13 05:47:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-25 12:10:58
