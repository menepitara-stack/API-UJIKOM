-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: API_ujikom
-- ------------------------------------------------------
-- Server version	8.0.46-0ubuntu0.24.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alat`
--

DROP TABLE IF EXISTS `alat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint unsigned NOT NULL,
  `nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `status_kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alat_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `alat_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alat`
--

LOCK TABLES `alat` WRITE;
/*!40000 ALTER TABLE `alat` DISABLE KEYS */;
INSERT INTO `alat` VALUES (1,1,'multimeter',6,'Baik',NULL,'storage/images/alat/FhAzQjJE0eWjNVWpZbIL275m6O4VqTbuXEETaJzk.webp','2026-09-29 17:04:00','2026-10-01 20:10:55'),(2,2,'Obeng Set',9,'Baik',NULL,'storage/images/alat/BqjYrP4pwwZpUnICJTuZwbGL88jnD0iulUeyRd2l.webp','2026-09-29 17:18:30','2026-10-01 20:10:14'),(3,3,'Bor Listrik',5,'Baik',NULL,'storage/images/alat/acaeFRtFGlOiJsPm4jfzD9UXT0uYWkrOGORwuNy1.webp','2026-09-29 17:19:13','2026-10-01 20:50:06'),(5,1,'Router Mikrotik RB941-2nD',15,'Baik','Router nirkabel rumahan yang cocok untuk praktik jaringan dasar.','storage/images/alat/LGqrMndON8AnVfBgIQeI2tGsLGPRlBlGtJT7OOhN.webp','2026-09-29 17:25:05','2026-09-29 23:03:23'),(6,3,'Kamera DSLR Canon EOS 3000D',5,'Baik','Kamera pemula untuk kebutuhan dokumentasi dan pembuatan aset media.','storage/images/alat/hcRprSws5TSqoaYc79S7gKCz7yXyjEdhwooZZ6LD.webp','2026-09-29 17:25:05','2026-10-01 00:07:14'),(7,3,'Mini PC Intel NUC 11',8,'Baik','Perangkat komputasi ringkas untuk server lokal skala kecil.','storage/images/alat/s4jorscBtmO640nXAL6GuU2WeOkyGXKVFHc0MTni.webp','2026-09-29 17:25:05','2026-10-01 00:07:59'),(8,2,'Mouse',4,'Baik',NULL,'storage/images/alat/9uHcrxz2qiskYEILX4JMFafuFJ6cA3ZO5DcGEej5.jpg','2026-09-29 17:25:05','2026-10-01 20:50:01'),(9,1,'Kabel LAN',8,'Baik',NULL,'storage/images/alat/vAdL4CMQq2hbM3n6FUrkZ76zj5Cp5vmAXX4tfweO.webp','2026-09-29 17:25:05','2026-10-01 20:08:40');
/*!40000 ALTER TABLE `alat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_pinjam`
--

DROP TABLE IF EXISTS `detail_pinjam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_pinjam` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint unsigned NOT NULL,
  `alat_id` bigint unsigned NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_pinjam_peminjaman_id_foreign` (`peminjaman_id`),
  KEY `detail_pinjam_alat_id_foreign` (`alat_id`),
  CONSTRAINT `detail_pinjam_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detail_pinjam_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pinjam`
--

LOCK TABLES `detail_pinjam` WRITE;
/*!40000 ALTER TABLE `detail_pinjam` DISABLE KEYS */;
INSERT INTO `detail_pinjam` VALUES (1,1,1,1,'2026-09-29 17:04:14','2026-09-29 17:04:14'),(2,2,1,1,'2026-09-29 17:10:04','2026-09-29 17:10:04'),(3,3,2,2,'2026-09-30 18:39:55','2026-09-30 18:39:55'),(4,4,2,1,'2026-09-30 18:56:46','2026-09-30 18:56:46'),(5,5,3,1,'2026-09-30 19:32:16','2026-09-30 19:32:16'),(6,6,8,1,'2026-10-01 20:30:51','2026-10-01 20:30:51');
/*!40000 ALTER TABLE `detail_pinjam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Jaringan','2026-09-29 17:03:39','2026-09-29 17:03:39'),(2,'Perkakas','2026-09-29 17:18:03','2026-09-29 17:18:03'),(3,'Elektronik','2026-09-29 17:18:50','2026-09-29 17:18:50');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_aktivitas`
--

DROP TABLE IF EXISTS `log_aktivitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_aktivitas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `aktivitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_aktivitas_user_id_foreign` (`user_id`),
  CONSTRAINT `log_aktivitas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_aktivitas`
--

LOCK TABLES `log_aktivitas` WRITE;
/*!40000 ALTER TABLE `log_aktivitas` DISABLE KEYS */;
INSERT INTO `log_aktivitas` VALUES (1,1,'Menambahkan data alat baru: \'multimeter\' (Stok: 5, Kondisi: Baik).','2026-09-29 17:04:00','2026-09-29 17:04:00'),(2,1,'Menambahkan data peminjaman baru (ID: 1) dengan status: dipinjam.','2026-09-29 17:04:14','2026-09-29 17:04:14'),(3,1,'Memperbarui alat \'multimeter\': kolom \'stok\' berubah dari \'5\' menjadi \'4\'.','2026-09-29 17:04:14','2026-09-29 17:04:14'),(4,2,'Memproses pengembalian alat untuk Peminjaman ID: 1 dengan kondisi \'Baik\' dan denda Rp 100.','2026-09-29 17:07:01','2026-09-29 17:07:01'),(5,2,'Memperbarui peminjaman ID 1: kolom \'status\' berubah dari \'dipinjam\' menjadi \'dikembalikan\'.','2026-09-29 17:07:01','2026-09-29 17:07:01'),(6,2,'Memperbarui alat \'multimeter\': kolom \'stok\' berubah dari \'4\' menjadi \'5\'.','2026-09-29 17:07:01','2026-09-29 17:07:01'),(7,5,'Menambahkan data peminjaman baru (ID: 2) dengan status: diajukan.','2026-09-29 17:10:04','2026-09-29 17:10:04'),(8,1,'Menambahkan data alat baru: \'Obeng Set\' (Stok: 10, Kondisi: Baik).','2026-09-29 17:18:30','2026-09-29 17:18:30'),(9,1,'Menambahkan data alat baru: \'Bor Listrik\' (Stok: 5, Kondisi: Baik).','2026-09-29 17:19:13','2026-09-29 17:19:13'),(10,1,'Menambahkan data alat baru: \'Router Mikrotik RB941-2nD\' (Stok: 15, Kondisi: Baik).','2026-09-29 17:25:05','2026-09-29 17:25:05'),(11,1,'Menambahkan data alat baru: \'Kamera DSLR Canon EOS 3000D\' (Stok: 5, Kondisi: Baik).','2026-09-29 17:25:05','2026-09-29 17:25:05'),(12,1,'Menambahkan data alat baru: \'Mini PC Intel NUC 11\' (Stok: 8, Kondisi: Baik).','2026-09-29 17:25:05','2026-09-29 17:25:05'),(13,1,'Menambahkan data alat baru: \'Tang Crimping RJ45/RJ11 Proskit\' (Stok: 20, Kondisi: Baik).','2026-09-29 17:25:05','2026-09-29 17:25:05'),(14,1,'Menambahkan data alat baru: \'Adapter HDMI to VGA dengan Audio\' (Stok: 25, Kondisi: Baik).','2026-09-29 17:25:05','2026-09-29 17:25:05'),(15,1,'Menghapus data alat: \'Router Mikrotik RB941-2nD\'.','2026-09-29 17:26:23','2026-09-29 17:26:23'),(16,1,'Memperbarui alat \'Router Mikrotik RB941-2nD\': kolom \'gambar\' berubah dari \'images/alat/mikrotik_rb941.png\' menjadi \'/tmp/php8mbl9ffr3i0taofeNf3\'.','2026-09-29 22:56:16','2026-09-29 22:56:16'),(17,1,'Memperbarui alat \'Router Mikrotik RB941-2nD\': kolom \'gambar\' berubah dari \'/tmp/php8mbl9ffr3i0taofeNf3\' menjadi \'/tmp/phpf7t3egdte5fi2i5zFIc\'.','2026-09-29 22:56:27','2026-09-29 22:56:27'),(18,1,'Memperbarui alat \'Router Mikrotik RB941-2nD\': kolom \'gambar\' berubah dari \'/tmp/phpf7t3egdte5fi2i5zFIc\' menjadi \'storage/images/alat/LGqrMndON8AnVfBgIQeI2tGsLGPRlBlGtJT7OOhN.webp\'.','2026-09-29 23:03:23','2026-09-29 23:03:23'),(19,5,'Menambahkan data peminjaman baru (ID: 3) dengan status: diajukan.','2026-09-30 18:39:55','2026-09-30 18:39:55'),(20,1,'Memperbarui peminjaman ID 3: kolom \'status\' berubah dari \'diajukan\' menjadi \'dipinjam\'.','2026-09-30 18:40:33','2026-09-30 18:40:33'),(21,1,'Memperbarui peminjaman ID 2: kolom \'status\' berubah dari \'diajukan\' menjadi \'dikembalikan\'.','2026-09-30 18:40:45','2026-09-30 18:40:45'),(22,1,'Memperbarui peminjaman ID 2: kolom \'status\' berubah dari \'dikembalikan\' menjadi \'dipinjam\'.','2026-09-30 18:40:47','2026-09-30 18:40:47'),(23,1,'Memperbarui alat \'Obeng Set\': kolom \'stok\' berubah dari \'8\' menjadi \'6\'.','2026-09-30 18:50:18','2026-09-30 18:50:18'),(24,1,'Memperbarui alat \'Obeng Set\': kolom \'stok\' berubah dari \'6\' menjadi \'8\'.','2026-09-30 18:51:46','2026-09-30 18:51:46'),(25,5,'Menambahkan data peminjaman baru (ID: 4) dengan status: diajukan.','2026-09-30 18:56:46','2026-09-30 18:56:46'),(26,1,'Memperbarui peminjaman ID 4: kolom \'status\' berubah dari \'diajukan\' menjadi \'dipinjam\'.','2026-09-30 18:57:12','2026-09-30 18:57:12'),(27,1,'Memperbarui peminjaman ID 4: kolom \'status\' berubah dari \'dipinjam\' menjadi \'diajukan\'.','2026-09-30 18:59:18','2026-09-30 18:59:18'),(28,1,'Memperbarui peminjaman ID 4: kolom \'status\' berubah dari \'diajukan\' menjadi \'dipinjam\'.','2026-09-30 18:59:29','2026-09-30 18:59:29'),(29,1,'Memperbarui peminjaman ID 3: kolom \'status\' berubah dari \'dipinjam\' menjadi \'dikembalikan\'.','2026-09-30 18:59:31','2026-09-30 18:59:31'),(30,1,'Memperbarui alat \'Obeng Set\': kolom \'stok\' berubah dari \'8\' menjadi \'6\'.','2026-09-30 19:27:39','2026-09-30 19:27:39'),(31,1,'Memperbarui peminjaman ID 3: kolom \'status\' berubah dari \'dikembalikan\' menjadi \'dipinjam\'.','2026-09-30 19:27:39','2026-09-30 19:27:39'),(32,1,'Memperbarui alat \'Obeng Set\': kolom \'stok\' berubah dari \'6\' menjadi \'7\'.','2026-09-30 19:27:53','2026-09-30 19:27:53'),(33,1,'Memperbarui peminjaman ID 4: kolom \'status\' berubah dari \'dipinjam\' menjadi \'dikembalikan\'.','2026-09-30 19:27:53','2026-09-30 19:27:53'),(34,1,'Memperbarui alat \'Obeng Set\': kolom \'stok\' berubah dari \'7\' menjadi \'9\'.','2026-09-30 19:27:55','2026-09-30 19:27:55'),(35,1,'Memperbarui peminjaman ID 3: kolom \'status\' berubah dari \'dipinjam\' menjadi \'dikembalikan\'.','2026-09-30 19:27:55','2026-09-30 19:27:55'),(36,1,'Memperbarui alat \'multimeter\': kolom \'stok\' berubah dari \'5\' menjadi \'6\'.','2026-09-30 19:27:57','2026-09-30 19:27:57'),(37,1,'Memperbarui peminjaman ID 2: kolom \'status\' berubah dari \'dipinjam\' menjadi \'dikembalikan\'.','2026-09-30 19:27:57','2026-09-30 19:27:57'),(38,1,'Memperbarui peminjaman ID 4: kolom \'status\' berubah dari \'dikembalikan\' menjadi \'telat\'.','2026-09-30 19:28:09','2026-09-30 19:28:09'),(39,1,'Memperbarui peminjaman ID 3: kolom \'status\' berubah dari \'dikembalikan\' menjadi \'telat\'.','2026-09-30 19:28:12','2026-09-30 19:28:12'),(40,1,'Memperbarui peminjaman ID 2: kolom \'status\' berubah dari \'dikembalikan\' menjadi \'telat\'.','2026-09-30 19:28:14','2026-09-30 19:28:14'),(41,4,'Menambahkan data peminjaman baru (ID: 5) dengan status: diajukan.','2026-09-30 19:32:16','2026-09-30 19:32:16'),(42,1,'Memperbarui alat \'Bor Listrik\': kolom \'stok\' berubah dari \'5\' menjadi \'4\'.','2026-09-30 19:34:54','2026-09-30 19:34:54'),(43,1,'Memperbarui peminjaman ID 5: kolom \'status\' berubah dari \'diajukan\' menjadi \'dipinjam\'.','2026-09-30 19:34:54','2026-09-30 19:34:54'),(44,1,'Memperbarui peminjaman ID 4: kolom \'status\' berubah dari \'telat\' menjadi \'dikembalikan\'.','2026-09-30 19:34:57','2026-09-30 19:34:57'),(45,1,'Memperbarui peminjaman ID 3: kolom \'status\' berubah dari \'telat\' menjadi \'dikembalikan\'.','2026-09-30 19:34:59','2026-09-30 19:34:59'),(46,1,'Memperbarui peminjaman ID 2: kolom \'status\' berubah dari \'telat\' menjadi \'dikembalikan\'.','2026-09-30 19:35:01','2026-09-30 19:35:01'),(47,1,'Memperbarui alat \'Kamera DSLR Canon EOS 3000D\': kolom \'gambar\' berubah dari \'images/alat/canon_3000d.png\' menjadi \'storage/images/alat/hcRprSws5TSqoaYc79S7gKCz7yXyjEdhwooZZ6LD.webp\'.','2026-10-01 00:07:14','2026-10-01 00:07:14'),(48,1,'Memperbarui alat \'Mini PC Intel NUC 11\': kolom \'gambar\' berubah dari \'images/alat/intel_nuc.png\' menjadi \'storage/images/alat/s4jorscBtmO640nXAL6GuU2WeOkyGXKVFHc0MTni.webp\'.','2026-10-01 00:07:59','2026-10-01 00:07:59'),(49,1,'Memperbarui alat \'Mouse\': kolom \'nama_alat\' berubah dari \'Tang Crimping RJ45/RJ11 Proskit\' menjadi \'Mouse\', kolom \'stok\' berubah dari \'20\' menjadi \'4\', kolom \'deskripsi\' berubah dari \'Alat potong dan pasang konektor kabel UTP.\' menjadi \'\'.','2026-10-01 00:11:51','2026-10-01 00:11:51'),(50,1,'Memperbarui alat \'Mouse\': kolom \'gambar\' berubah dari \'images/alat/crimping_proskit.png\' menjadi \'storage/images/alat/9uHcrxz2qiskYEILX4JMFafuFJ6cA3ZO5DcGEej5.jpg\'.','2026-10-01 20:06:58','2026-10-01 20:06:58'),(51,1,'Memperbarui alat \'Kabel LAN\': kolom \'nama_alat\' berubah dari \'Adapter HDMI to VGA dengan Audio\' menjadi \'Kabel LAN\', kolom \'stok\' berubah dari \'25\' menjadi \'8\', kolom \'deskripsi\' berubah dari \'Konverter display untuk menyambungkan perangkat modern ke proyektor lama.\' menjadi \'\', kolom \'gambar\' berubah dari \'images/alat/hdmi_vga.png\' menjadi \'storage/images/alat/vAdL4CMQq2hbM3n6FUrkZ76zj5Cp5vmAXX4tfweO.webp\'.','2026-10-01 20:08:40','2026-10-01 20:08:40'),(52,1,'Memperbarui alat \'Bor Listrik\': kolom \'gambar\' berubah dari \'\' menjadi \'storage/images/alat/acaeFRtFGlOiJsPm4jfzD9UXT0uYWkrOGORwuNy1.webp\'.','2026-10-01 20:09:30','2026-10-01 20:09:30'),(53,1,'Memperbarui alat \'Obeng Set\': kolom \'gambar\' berubah dari \'\' menjadi \'storage/images/alat/BqjYrP4pwwZpUnICJTuZwbGL88jnD0iulUeyRd2l.webp\'.','2026-10-01 20:10:14','2026-10-01 20:10:14'),(54,1,'Memperbarui alat \'multimeter\': kolom \'gambar\' berubah dari \'\' menjadi \'storage/images/alat/FhAzQjJE0eWjNVWpZbIL275m6O4VqTbuXEETaJzk.webp\'.','2026-10-01 20:10:55','2026-10-01 20:10:55'),(55,5,'Menambahkan data peminjaman baru (ID: 6) dengan status: diajukan.','2026-10-01 20:30:51','2026-10-01 20:30:51'),(56,1,'Memperbarui alat \'Mouse\': kolom \'stok\' berubah dari \'4\' menjadi \'3\'.','2026-10-01 20:31:47','2026-10-01 20:31:47'),(57,1,'Memperbarui peminjaman ID 6: kolom \'status\' berubah dari \'diajukan\' menjadi \'dipinjam\'.','2026-10-01 20:31:47','2026-10-01 20:31:47'),(58,2,'Memproses pengembalian alat untuk Peminjaman ID: 6 dengan kondisi \'Baik\' dan denda Rp 0.','2026-10-01 20:50:01','2026-10-01 20:50:01'),(59,2,'Memperbarui peminjaman ID 6: kolom \'status\' berubah dari \'dipinjam\' menjadi \'dikembalikan\'.','2026-10-01 20:50:01','2026-10-01 20:50:01'),(60,2,'Memperbarui alat \'Mouse\': kolom \'stok\' berubah dari \'3\' menjadi \'4\'.','2026-10-01 20:50:01','2026-10-01 20:50:01'),(61,2,'Memproses pengembalian alat untuk Peminjaman ID: 5 dengan kondisi \'Baik\' dan denda Rp 0.','2026-10-01 20:50:06','2026-10-01 20:50:06'),(62,2,'Memperbarui peminjaman ID 5: kolom \'status\' berubah dari \'dipinjam\' menjadi \'dikembalikan\'.','2026-10-01 20:50:06','2026-10-01 20:50:06'),(63,2,'Memperbarui alat \'Bor Listrik\': kolom \'stok\' berubah dari \'4\' menjadi \'5\'.','2026-10-01 20:50:06','2026-10-01 20:50:06');
/*!40000 ALTER TABLE `log_aktivitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_07_30_033633_create_personal_access_tokens_table',1),(5,'2026_07_30_034346_02_create_kategori_table',1),(6,'2026_07_30_035009_03_create_alat_table',1),(7,'2026_07_30_040741_04_create_peminjaman_table',1),(8,'2026_07_30_040956_05_create_detail_pinjam_table',1),(9,'2026_07_30_040956_06_create_pengembalian_table',1),(10,'2026_07_30_040957_07_create_log_aktivitas_table',1),(11,'2026_08_06_065402_create_sessions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peminjaman` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali_plan` date NOT NULL,
  `status` enum('diajukan','dipinjam','dikembalikan','telat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diajukan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_user_id_foreign` (`user_id`),
  CONSTRAINT `peminjaman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (1,3,'2026-09-30','2026-10-03','dikembalikan','2026-09-29 17:04:14','2026-09-29 17:07:01'),(2,5,'2026-09-30','2026-10-09','dikembalikan','2026-09-29 17:10:04','2026-09-30 19:35:01'),(3,5,'2026-10-01','2026-10-02','dikembalikan','2026-09-30 18:39:55','2026-09-30 19:34:59'),(4,5,'2026-10-01','2026-10-10','dikembalikan','2026-09-30 18:56:46','2026-09-30 19:34:57'),(5,4,'2026-10-01','2026-10-02','dikembalikan','2026-09-30 19:32:16','2026-10-01 20:50:06'),(6,5,'2026-10-02','2026-10-03','dikembalikan','2026-10-01 20:30:51','2026-10-01 20:50:01');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengembalians`
--

DROP TABLE IF EXISTS `pengembalians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengembalians` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `peminjaman_id` bigint unsigned NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kondisi_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denda` int NOT NULL DEFAULT '0',
  `petugas_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengembalians_peminjaman_id_foreign` (`peminjaman_id`),
  KEY `pengembalians_petugas_id_foreign` (`petugas_id`),
  CONSTRAINT `pengembalians_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pengembalians_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengembalians`
--

LOCK TABLES `pengembalians` WRITE;
/*!40000 ALTER TABLE `pengembalians` DISABLE KEYS */;
INSERT INTO `pengembalians` VALUES (1,1,'2026-09-30','Baik',100,2,'2026-09-29 17:07:01','2026-09-29 17:07:01'),(2,6,'2026-10-02','Baik',0,2,'2026-10-01 20:50:01','2026-10-01 20:50:01'),(3,5,'2026-10-02','Baik',0,2,'2026-10-01 20:50:06','2026-10-01 20:50:06');
/*!40000 ALTER TABLE `pengembalians` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1iJJP7pxg0MnSve5TEQf3CBWqvp9WPfnsrJVWLvx',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36 Edg/154.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTWhydG1SZTFTYkd5bkxabGpvNE1jT3pJWXhhQjVrdWtaQmZMbjRBcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wZXR1Z2FzL3BlbWluamFtYW4iO3M6NToicm91dGUiO3M6MjQ6InBldHVnYXMucGVtaW5qYW1hbi5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1790913009);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas','peminjam') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peminjam',
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `foto_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Bagus Karim','admin@gmail.com','$2y$12$CQBrW5m6Fjm9VnjHEivBtOBsFplGgy/QkTGZ3O1t2bsV8RcJaS4PG','admin','081234567890','Bandung, West Java',NULL,'2026-09-29 16:59:00','2026-09-29 16:59:00'),(2,'Arif Muhammad','petugas@gmail.com','$2y$12$eG8czsFVQRC9I4gWh8prtemVrJqBjtyufGU6mbhI6eKOiehRCCaly','petugas','082345678901','Baleendah, Bandung',NULL,'2026-09-29 16:59:00','2026-09-29 16:59:00'),(3,'Rian Setiawan','rian@gmail.com','$2y$12$rzgGXaQhwq2OUGKf/EIO9e88ImZeoA3PC2PAQT4JGJidn6dLuGsbu','peminjam','083456789012','Ciparay, Bandung',NULL,'2026-09-29 16:59:00','2026-09-29 16:59:00'),(4,'Siti Aminah','siti@gmail.com','$2y$12$jrHvTuKf.aYUWpHpSuhMeePReoOGlWse1F1Pe.oJv.2eb/2LCaOgC','peminjam','084567890123','Dayeuhkolot, Bandung',NULL,'2026-09-29 16:59:00','2026-09-29 16:59:00'),(5,'Eka Pratama','eka@gmail.com','$2y$12$3pcbh9S.OvDi3R8e30G4Oedxp4q/W1q3Zj2ED/EgQM526EQGl9D46','peminjam','085678901234','Banjaran, Bandung',NULL,'2026-09-29 16:59:00','2026-09-29 16:59:00');
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

-- Dump completed on 2026-10-06  8:53:52
