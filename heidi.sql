-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ptxy_xavi_gallego
CREATE DATABASE IF NOT EXISTS `ptxy_xavi_gallego` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ptxy_xavi_gallego`;



-- Volcando estructura para tabla ptxy_xavi_gallego.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.cache: ~9 rows (aproximadamente)
DELETE FROM `cache`;
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel_cache_f1_news_Formula 1 OR "Fórmula 1" OR F1 OR "Gran Premio" OR "Carrera F1" OR "Campeonato F1"_es_12_v2', 'a:1:{s:8:"articles";a:0:{}}', 1744064257),
	('laravel_cache_f1_news_Formula 1 OR F1 OR "Grand Prix" OR "F1 race" OR "F1 championship"_en_12_v2', 'a:1:{s:8:"articles";a:0:{}}', 1744064258),
	('laravel_cache_motogp_news', 'a:10:{i:0;a:8:{s:6:"source";a:2:{s:2:"id";N;s:4:"name";s:12:"Hipertextual";}s:6:"author";s:25:"Hipertextual (Redacción)";s:5:"title";s:63:"DAZN tiene la mejor oferta para ver toda la Fórmula 1 y MotoGP";s:11:"description";s:268:"Ha llegado el momento del año que millones de aficionados estábamos esperando: el regreso del campeonato del mundo de Fórmula 1 y MotoGP. Si quieres ver todas las carreras, suscríbete a DAZN antes del 31 de marzo y disfruta de un precio increíble: sólo 9,99 e…";s:3:"url";s:59:"http://hipertextual.com/2025/03/oferta-dazn-formula1-motogp";s:10:"urlToImage";s:71:"https://imgs.hipertextual.com/wp-content/uploads/2025/03/DAZN-motor.jpg";s:11:"publishedAt";s:20:"2025-03-12T14:54:05Z";s:7:"content";s:220:"Ha llegado el momento del año que millones de aficionados estábamos esperando: el regreso del campeonato del mundo de Fórmula 1 y MotoGP. Si quieres ver todas las carreras, suscríbete a DAZN antes de… [+2030 chars]";}i:1;a:8:{s:6:"source";a:2:{s:2:"id";N;s:4:"name";s:10:"Xataka.com";}s:6:"author";s:13:"Javier Lacort";s:5:"title";s:110:"Cloudflare sufre un revés en Francia: la Justicia le obliga a bloquear las retransmisiones ilegales de MotoGP";s:11:"description";s:265:"En un movimiento que nos recuerda mucho a lo que está ocurriendo en estas latitudes, Canal+ ha logrado que la justicia francesa reconozca a Cloudflare como intermediario técnico responsable en sus tres capacidades (DNS, CDN y proxy inverso), obligándola a imp…";s:3:"url";s:138:"https://www.xataka.com/legislacion-y-derechos/cloudflare-sufre-reves-francia-justicia-le-obliga-a-bloquear-retransmisiones-ilegales-motogp";s:10:"urlToImage";s:45:"https://i.blogs.es/0f8c76/motogp/840_560.jpeg";s:11:"publishedAt";s:20:"2025-04-02T09:00:51Z";s:7:"content";s:218:"En un movimiento que nos recuerda mucho a lo que está ocurriendo en estas latitudes, Canal+ ha logrado que la justicia francesa reconozca a Cloudflare como intermediario técnico responsable en sus tr… [+2938 chars]";}i:2;a:8:{s:6:"source";a:2:{s:2:"id";s:5:"marca";s:4:"name";s:5:"Marca";}s:6:"author";s:9:"marca.com";s:5:"title";s:88:"Marc admite que echó a correr como táctica: "Sabía el Reglamento y que me seguirían"";s:11:"description";s:89:"El director de carrera de MotoGp admite que puede provocar una modificación&nbsp;  Leer";s:3:"url";s:132:"https://www.marca.com/motor/motogp/gp-americas/2025/03/30/marc-marquez-admite-echo-correr-tactica-sabia-reglamento-me-seguirian.html";s:10:"urlToImage";s:99:"https://e00-xlk-ue-marca.uecdn.es/files/phantom_desktop_1200w/uploads/2025/03/30/67e9b4f6374f3.jpeg";s:11:"publishedAt";s:20:"2025-03-30T21:19:02Z";s:7:"content";s:225:"Más allá del triunfo de Bagnaia, la caída de Marc Márquez y el liderato del Mundial de Álex Márquez, el Gran Premio de las Américas se recordará por el caos que se vivió en los minutos previos al ini… [+2189 chars]";}i:3;a:8:{s:6:"source";a:2:{s:2:"id";s:5:"marca";s:4:"name";s:5:"Marca";}s:6:"author";s:13:"JAIME MARTÍN";s:5:"title";s:40:""El joven Marc Márquez está volviendo"";s:11:"description";s:110:"Ducati enseña imágenes no vistas del GP de Argentina de MotoGP, con la alegría del 93 como constante  Leer";s:3:"url";s:79:"https://www.marca.com/motor/motogp/2025/03/21/joven-marc-marquez-volviendo.html";s:10:"urlToImage";s:99:"https://e00-xlk-ue-marca.uecdn.es/files/phantom_desktop_1200w/uploads/2025/03/20/67dbe6d015ff5.jpeg";s:11:"publishedAt";s:20:"2025-03-21T07:19:33Z";s:7:"content";s:219:"Ducati desveló imágenes no vistas de la doble victoria de Marc Márquez, en el Sprint y la carrera larga, del GP de Argentina de MotoGP. Es su \'Inside\', que, como en el de Tailandia, ofrece detalles q… [+2860 chars]";}i:4;a:8:{s:6:"source";a:2:{s:2:"id";s:8:"el-mundo";s:4:"name";s:8:"El Mundo";}s:6:"author";s:14:"Amadeu García";s:5:"title";s:66:"Marc Márquez gana la sprint race de Austin y abre aún más hueco";s:11:"description";s:174:"Marc Márquez sigue estando sencillamente imparable. En la sprint race del Gran Premio de Las Américas de MotoGP, tras hacerse otra vez con otra pole, sólo dejó un leve...";s:3:"url";s:85:"https://www.elmundo.es/deportes/motociclismo/2025/03/29/67e853edfc6c8334188b45b7.html";s:10:"urlToImage";s:141:"https://phantom-elmundo.uecdn.es/e1aa764e56ba4bef0668d3a493b1a908/resize/1200/f/webp/assets/multimedia/imagenes/2025/03/29/17432823814188.jpg";s:11:"publishedAt";s:20:"2025-03-29T21:11:43Z";s:7:"content";s:220:"Marc Márquez sigue estando sencillamente imparable. En la sprint race del Gran Premio de Las Américas de MotoGP, tras hacerse otra vez con otra pole, sólo dejó un leve resquicio para algo de suspense… [+1762 chars]";}i:5;a:8:{s:6:"source";a:2:{s:2:"id";s:5:"marca";s:4:"name";s:5:"Marca";}s:6:"author";s:12:"LUIS GENTILE";s:5:"title";s:48:"El \'safety car\' de MotoGP se estrelló en Austin";s:11:"description";s:121:"El coche de seguridad perdió el control en el trazado de Texas en la curva 14 durante la vuelta de reconocimiento  Leer";s:3:"url";s:96:"https://www.marca.com/motor/motogp/gp-americas/2025/03/31/safety-car-motogp-estrello-austin.html";s:10:"urlToImage";s:99:"https://e00-xlk-ue-marca.uecdn.es/files/phantom_desktop_1200w/uploads/2025/03/31/67ea6ef037a9b.jpeg";s:11:"publishedAt";s:20:"2025-03-31T11:10:22Z";s:7:"content";s:224:"El Gran Premio de las Américas parecía preparado para volver a ver a Marc Márquez reinar en su \'jardín\'. El ocho veces campeón del Mundo había sido el más rápido, por tercera vez consecutiva, en la s… [+1559 chars]";}i:6;a:8:{s:6:"source";a:2:{s:2:"id";s:5:"marca";s:4:"name";s:5:"Marca";}s:6:"author";s:15:"JOSÉ LUIS RUIZ";s:5:"title";s:59:"Así está la clasificación de MotoGP: Álex, por un punto";s:11:"description";s:92:"Pecco Bagnaia se sitúa a 12 puntos del liderato tras su inesperado triunfo en Austin  Leer";s:3:"url";s:129:"https://www.marca.com/motor/motogp/gp-americas/2025/03/30/asi-queda-clasificacion-motogp-2025-alex-marquez-nuevo-lider-punto.html";s:10:"urlToImage";s:99:"https://e00-xlk-ue-marca.uecdn.es/files/phantom_desktop_1200w/uploads/2025/03/30/67e9af334c021.jpeg";s:11:"publishedAt";s:20:"2025-03-30T21:09:47Z";s:7:"content";s:218:"El Mundial ha sufrido un vuelco con la llegada de la lluvia... y la caída de Marc Márquez en la carrera larga disputada este domingo en el trazado texano. El \'93\' ha cometido un error garrafal que ha… [+2201 chars]";}i:7;a:8:{s:6:"source";a:2:{s:2:"id";s:5:"marca";s:4:"name";s:5:"Marca";}s:6:"author";s:16:"EMILIO CONTRERAS";s:5:"title";s:70:"Doble récord histórico de la web de MARCA, líder digital en España";s:11:"description";s:184:"El mes de febrero con la Liga más igualada de la historia, la Champions más apasionante y la Copa del Rey con partidazos, además del preludio de lo que será la Fórmula 1 y MotoGP,";s:3:"url";s:74:"https://www.marca.com/mundo-marca/2025/03/20/67dc0c5646163f4aa48b4584.html";s:10:"urlToImage";s:127:"https://phantom-marca.uecdn.es/b6c770358a61b6f2ba2f25ec3805b907/f/webp/assets/multimedia/imagenes/2025/03/20/17424737635762.jpg";s:11:"publishedAt";s:20:"2025-03-20T17:44:21Z";s:7:"content";s:221:"El mes de febrero con la Liga más igualada de la historia, la Champions más apasionante y la Copa del Rey con partidazos, además del preludio de lo que será la Fórmula 1 y MotoGP, han convertido a MA… [+3467 chars]";}i:8;a:8:{s:6:"source";a:2:{s:2:"id";s:5:"marca";s:4:"name";s:5:"Marca";}s:6:"author";s:12:"LUIS GENTILE";s:5:"title";s:40:"El idilio de Marc Márquez con Argentina";s:11:"description";s:85:"El ilerdense se reencuentra con uno de sus trazados predilectos del calendario  Leer";s:3:"url";s:135:"https://www.marca.com/motor/motogp/gp-argentina/2025/03/15/marc-marquez-idilio-argentina-primer-ganador-tres-victorias-cinco-poles.html";s:10:"urlToImage";s:99:"https://e00-xlk-ue-marca.uecdn.es/files/phantom_desktop_1200w/uploads/2025/03/14/67d4883ab1a5e.jpeg";s:11:"publishedAt";s:20:"2025-03-15T04:55:01Z";s:7:"content";s:220:"Marc Márquez está disfrutando de un dulce momento en el arranque de la temporada 2025 de la MotoGP. El piloto ilerdense, quien consiguió la máxima cantidad de puntos en el Gran Premio de Tailandia, t… [+1880 chars]";}i:9;a:8:{s:6:"source";a:2:{s:2:"id";N;s:4:"name";s:13:"La Vanguardia";}s:6:"author";s:14:"Daniel García";s:5:"title";s:106:"Fútbol, Fórmula 1, MotoGP y más, en la pantalla de tu coche: la app de DAZN llega a los modelos de Audi";s:11:"description";s:265:"La conocida plataforma de streaming deportivo DAZN ha cerrado un llamativo acuerdo con Audi para que sus coches cuenten a partir de ahora con una aplicación que permita acceder a sus contenidos a través de la pantalla de sus coches. De esta manera, a través d…";s:3:"url";s:148:"https://www.lavanguardia.com/andro4all/movilidad/futbol-formula-1-motogp-y-mas-en-la-pantalla-de-tu-coche-la-app-de-dazn-llega-a-los-modelos-de-audi";s:10:"urlToImage";s:86:"https://www.lavanguardia.com/andro4all/hero/2024/05/dazn.1715851548.245.jpg?width=1200";s:11:"publishedAt";s:20:"2025-03-12T12:08:53Z";s:7:"content";s:217:"DAZN es una de las plataformas de contenido deportivo más consumidas en el mundo\r\nLa conocida plataforma de streaming deportivo DAZN ha cerrado un llamativo acuerdo con Audi para que sus coches cuent… [+2460 chars]";}}', 1744141974),
	('laravel_cache_news_F1_es_10', 'a:1:{s:8:"articles";a:0:{}}', 1744056814),
	('laravel_cache_news_Formula 1 OR "Fórmula 1" OR F1 OR "Gran Premio"_es_10', 'a:1:{s:8:"articles";a:0:{}}', 1744060423),
	('laravel_cache_news_Formula 1 OR "Fórmula 1" OR F1 OR "Gran Premio"_es_12', 'a:1:{s:8:"articles";a:0:{}}', 1744064050),
	('laravel_cache_news_Formula 1 OR "Fórmula 1" OR F1_es_10', 'a:1:{s:8:"articles";a:0:{}}', 1744059663),
	('laravel_cache_news_Formula 1 OR F1 OR "Grand Prix"_en_10', 'a:1:{s:8:"articles";a:0:{}}', 1744060425),
	('laravel_cache_news_Formula 1 OR F1 OR "Grand Prix"_en_12', 'a:1:{s:8:"articles";a:0:{}}', 1744064050),
	('laravel_cache_news_Formula 1 OR F1_en_10', 'a:1:{s:8:"articles";a:0:{}}', 1744059663);

-- Volcando estructura para tabla ptxy_xavi_gallego.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.cache_locks: ~0 rows (aproximadamente)
DELETE FROM `cache_locks`;

-- Volcando estructura para tabla ptxy_xavi_gallego.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Volcando datos para la tabla ptxy_xavi_gallego.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

-- Volcando estructura para tabla ptxy_xavi_gallego.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
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

-- Volcando datos para la tabla ptxy_xavi_gallego.jobs: ~0 rows (aproximadamente)
DELETE FROM `jobs`;

-- Volcando estructura para tabla ptxy_xavi_gallego.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
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

-- Volcando datos para la tabla ptxy_xavi_gallego.job_batches: ~0 rows (aproximadamente)
DELETE FROM `job_batches`;

-- Volcando estructura para tabla ptxy_xavi_gallego.jwt_tokens
CREATE TABLE IF NOT EXISTS `jwt_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `token` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.jwt_tokens: ~0 rows (aproximadamente)
DELETE FROM `jwt_tokens`;

-- Volcando estructura para tabla ptxy_xavi_gallego.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.migrations: ~4 rows (aproximadamente)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(12, '0001_01_01_000000_create_users_table', 1),
	(13, '0001_01_01_000001_create_cache_table', 1),
	(14, '0001_01_01_000002_create_jobs_table', 1),
	(15, '2025_03_20_192335_create_articles_table', 1),
	(16, '2025_03_27_192210_add_remember_token_to_usuaris_table', 2),
	(17, '2025_04_01_195419_create_usuari_auth_table', 3),
	(18, '2025_04_02_152119_add_remember_token_to_usuari_auth', 4),
	(19, '2025_04_04_162803_afegir_imatges_a_els_articles', 5);

-- Volcando estructura para tabla ptxy_xavi_gallego.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.password_reset_tokens: ~0 rows (aproximadamente)
DELETE FROM `password_reset_tokens`;

-- Volcando estructura para tabla ptxy_xavi_gallego.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
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

-- Volcando datos para la tabla ptxy_xavi_gallego.sessions: ~2 rows (aproximadamente)
DELETE FROM `sessions`;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('RG0arDn0dZLij6DAYFGw1B6PSsrjZz4IGoOTgsrw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0Jjem1JY3hYVDBxcnRteWhKTUlhbGhnU0JWcnVheENPVFo4UmhGSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1743607550),
	('Xy9K9BCmBLgNEY5aM50gp5rAIWUAFKJUnpUU683t', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUhqajk5VDNCS3pUMXU2M2p1SUFIbmJVdm10aGZka2JnbnpSakEySiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoiNm9ubG5jZWZ1SUJWaUtQTENHZkRtcklPV0VGeklTNnF1TFVyRVdHdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbi9nb29nbGUiO319', 1743607509);

-- Volcando estructura para tabla ptxy_xavi_gallego.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.users: ~0 rows (aproximadamente)
DELETE FROM `users`;

-- Volcando estructura para tabla ptxy_xavi_gallego.usuaris
CREATE TABLE IF NOT EXISTS `usuaris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` char(9) COLLATE utf8mb4_general_ci NOT NULL,
  `nickname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `cognom` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasenya` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.usuaris: ~2 rows (aproximadamente)
DELETE FROM `usuaris`;
INSERT INTO `usuaris` (`id`, `dni`, `nickname`, `nom`, `cognom`, `email`, `contrasenya`, `admin`, `created_at`, `updated_at`, `photo`, `remember_token`) VALUES
	(75, '45962292T', 'jxiberta', 'Julia', 'Xiberta', 'juliaxiberta@gmail.com', '$2y$12$anTPpNcBhmYlNLHNlybequzwf4cObysfNCDdyPxgBdf7xhc3epSTq', 0, '2025-04-11 18:34:37', '2025-04-11 18:34:37', 'images/OS28LIRyOReyAHyAiTNTgGb9IFfCsJO72IvmRwVJ.png', NULL),
	(76, '45962292C', 'cgallego', 'Carlos', 'Gallego', 'cgallego@gmail.com', '$2y$12$mKmdUYNJ2FH6xJ9UIm.TEOKGxLLfno1e8yzZSH6Qs98XzoUZ7UAMW', 0, '2025-04-12 05:45:39', '2025-04-12 07:31:49', 'images/PPTT7oykm6fBPzwSphrJFNsEZEbzXfa7E6lK2PAk.png', 'jalnnWc0mWHKTWtu1iTpmJqHhQUOuW8wCiKWxi7esixq6o3eCbuoLDnGYNKY'),
	(77, '45962292N', 'xgallego', 'Xavier', 'Gallego', 'xavigallegopalau@gmail.com', '$2y$12$ee/pMv3Wjn2JASUu5EH6jembwn5uNACdY.jV0YW2EVHtWKOhIOGXK', 0, '2025-04-12 07:47:10', '2025-04-12 07:47:10', 'images/ghC0AYikmBqd82ivieeUJUmCblisV8McLX7qYq7g.png', 'zqioEFnWkwYJevWOAvD7hAqj77vCgNIe1dMQBCmG6kN6dJ2pMjEVQHIcuAHt');

-- Volcando estructura para tabla ptxy_xavi_gallego.usuaris_auth
CREATE TABLE IF NOT EXISTS `usuaris_auth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `email` int NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.usuaris_auth: ~0 rows (aproximadamente)
DELETE FROM `usuaris_auth`;

-- Volcando estructura para tabla ptxy_xavi_gallego.usuaris_jwt
CREATE TABLE IF NOT EXISTS `usuaris_jwt` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `token` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expira` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuaris_jwt_user_id` (`user_id`),
  CONSTRAINT `fk_usuaris_jwt_user_id` FOREIGN KEY (`user_id`) REFERENCES `usuaris` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.usuaris_jwt: ~1 rows (aproximadamente)
DELETE FROM `usuaris_jwt`;
INSERT INTO `usuaris_jwt` (`id`, `user_id`, `token`, `expira`, `created_at`, `updated_at`) VALUES
	(1, 77, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2NyZWF0b2tlbiIsImlhdCI6MTc0NDkzMzUyNiwiZXhwIjoxNzQ0OTM3MTI2LCJuYmYiOjE3NDQ5MzM1MjYsImp0aSI6IlpUVVFueVMzQkgzb1JyN0YiLCJzdWIiOiI3NyIsInBydiI6IjM1MDI0ZjhlMmI1NWNjOWYwNmI1ZDhhYWE0MTA5N2VhMjM3MWRhYmEifQ.KhRfoSVm7jN__tHzgaB6_pcN0GaEAk3X1JHMPj9IHWw', '2025-04-20 09:45:26', '2025-04-17 21:45:26', '2025-04-17 21:45:26'),
	(2, 77, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2NyZWF0b2tlbiIsImlhdCI6MTc0NDk3NDUwNiwiZXhwIjoxNzQ0OTc4MTA2LCJuYmYiOjE3NDQ5NzQ1MDYsImp0aSI6IkFUOGh1UWVDeHJCRWliRFUiLCJzdWIiOiI3NyIsInBydiI6IjM1MDI0ZjhlMmI1NWNjOWYwNmI1ZDhhYWE0MTA5N2VhMjM3MWRhYmEifQ.jDf2NuvyfQHIA4p9QTquOPKE7YFszyJPV_FYbnSgBn8', '2025-04-20 21:08:26', '2025-04-18 09:08:26', '2025-04-18 09:08:26'),
	(3, 77, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2NyZWF0b2tlbiIsImlhdCI6MTc0NDk4MTYzNywiZXhwIjoxNzQ0OTg1MjM3LCJuYmYiOjE3NDQ5ODE2MzcsImp0aSI6IlZFZGI4NjcyT3Z1VEhVZk4iLCJzdWIiOiI3NyIsInBydiI6IjM1MDI0ZjhlMmI1NWNjOWYwNmI1ZDhhYWE0MTA5N2VhMjM3MWRhYmEifQ.CPRLxzhEmaGkuhFbjTxAlRIwsBmKZaPxNv5o70dNCLE', '2025-04-20 23:07:17', '2025-04-18 11:07:17', '2025-04-18 11:07:17'),
	(4, 77, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2NyZWF0b2tlbiIsImlhdCI6MTc0NDk4NTI3MCwiZXhwIjoxNzQ0OTg4ODcwLCJuYmYiOjE3NDQ5ODUyNzAsImp0aSI6InBqQ0hnV3NXZ0JHbjhJbWsiLCJzdWIiOiI3NyIsInBydiI6IjM1MDI0ZjhlMmI1NWNjOWYwNmI1ZDhhYWE0MTA5N2VhMjM3MWRhYmEifQ.dAM6yBKiq-ktUCc7SBXZxiJj2Re0ZzX0a8B6nt8e6Lo', '2025-04-21 00:07:50', '2025-04-18 12:07:50', '2025-04-18 12:07:50'),
	(5, 77, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2NyZWF0b2tlbiIsImlhdCI6MTc0NDk5NTg5OSwiZXhwIjoxNzQ0OTk5NDk5LCJuYmYiOjE3NDQ5OTU4OTksImp0aSI6IkV1WllhRjVzaUlOR0w0TlAiLCJzdWIiOiI3NyIsInBydiI6IjM1MDI0ZjhlMmI1NWNjOWYwNmI1ZDhhYWE0MTA5N2VhMjM3MWRhYmEifQ.4w1Dp-LUr_S3DZpukWTx6Hcnsn3pT8FEcwTCl3I3ZF0', '2025-04-21 03:04:59', '2025-04-18 15:04:59', '2025-04-18 15:04:59'),
	(6, 77, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2NyZWF0b2tlbiIsImlhdCI6MTc0NTAwODI2MywiZXhwIjoxNzQ1MDExODYzLCJuYmYiOjE3NDUwMDgyNjMsImp0aSI6IjBnS1BMSk0yVjJzbGpVYlciLCJzdWIiOiI3NyIsInBydiI6IjM1MDI0ZjhlMmI1NWNjOWYwNmI1ZDhhYWE0MTA5N2VhMjM3MWRhYmEifQ.CshGJjtPkO0vS4mWrC9MHkDb6mN8MD-u8BbTu4fSFYc', '2025-04-21 06:31:03', '2025-04-18 18:31:03', '2025-04-18 18:31:03'),
	(7, 77, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2NyZWF0b2tlbiIsImlhdCI6MTc0NTAxMjA5MCwiZXhwIjoxNzQ1MDE1NjkwLCJuYmYiOjE3NDUwMTIwOTAsImp0aSI6IkNPTEN4MjRIdm5ERDV2dEgiLCJzdWIiOiI3NyIsInBydiI6IjM1MDI0ZjhlMmI1NWNjOWYwNmI1ZDhhYWE0MTA5N2VhMjM3MWRhYmEifQ.77VpdchrQbVslr6erN5fcxuisI5tA0VmYTg7279pFvc', '2025-04-21 07:34:50', '2025-04-18 19:34:50', '2025-04-18 19:34:50');

-- Volcando estructura para tabla ptxy_xavi_gallego.usuari_auth
CREATE TABLE IF NOT EXISTS `usuari_auth` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuari_auth_email_unique` (`email`),
  UNIQUE KEY `usuari_auth_google_id_unique` (`google_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ptxy_xavi_gallego.usuari_auth: ~2 rows (aproximadamente)
DELETE FROM `usuari_auth`;
INSERT INTO `usuari_auth` (`id`, `name`, `email`, `google_id`, `avatar`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 'Xavier Gallego Palau', 'x.gallego@sapalomera.cat', '112748431502289799959', NULL, '2025-04-02 18:18:56', '2025-04-02 18:18:56', 'b7aC4W7IJ67PTJ7YIucsewwgs5QNHxqqWWXvRAldeuuKi2S0hWg9jrxFln4r'),
	(2, 'Xavi Gallego', 'xavigallegopalau@gmail.com', '113460819943917052409', NULL, '2025-04-03 14:18:14', '2025-04-03 14:18:14', 'bhQGyAoTwVmg8upVlhNKbD3LeWTb8nu0CuMCUZLGhOkItMWzQueMloZIMjHI');


CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titol` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cos` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `data` date DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `usuaris` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;)


DELETE FROM `articles`;
INSERT INTO `articles` (`id`, `titol`, `cos`, `data`, `user_id`, `image_path`) VALUES
	(24, 'Kelvin van der Linde se une a BMW, pero podría quedarse sin asiento en el DTM', 'El piloto sudafricano Kelvin van der Linde ha firmado con BMW, sin embargo, su participación en la temporada 2025 del DTM aún no está asegurada.', '2024-12-25', 77, 'images/D3U07uQ6447kwa7zw4MmbViCzSg9OLsKbmk3OJjU.png'),
	(25, 'Nuevo equipo Porsche se une al DTM en 2025 y firma al ex piloto de Audi, Feller', 'Un nuevo equipo respaldado por Porsche ingresará al DTM en 2025, contando con el ex piloto de Audi, Ricardo Feller, en su alineación.', '2024-12-25', 77, 'images/1abcc1t0ybPvWdlRi2TGBGkUJ6amKxKAChGjwrFI.png'),
	(27, 'HWA EVO: Una reinterpretación moderna del Mercedes-Benz 190E Evo II', 'HWA AG ha presentado el HWA EVO, una versión contemporánea del icónico Mercedes-Benz 190E 2.5-16 EVO II de 1990. Este modelo, limitado a 100 unidades y con un precio de 714.000 euros, incorpora un motor V6 biturbo de 3.0 litros que genera hasta 500 caballos de fuerza y 550 Nm de torque. El diseño mantiene la esencia del original, con mejoras como un chasis reforzado y una carrocería de carbono.', '2025-01-15', 75, NULL),
	(28, 'Aston Martin incorpora a Daniel Juncadella como piloto de simulador', 'Aston Martin ha contratado al piloto español Daniel Juncadella, de 33 años, como nuevo piloto de simulador. Juncadella, con amplia experiencia en WEC, GT y DTM, comenzó sus funciones durante el Gran Premio de Abu Dhabi, participando desde la fábrica de Silverstone. El jefe del equipo, Mike Krack, destacó la importancia de este rol para el desarrollo del coche. ', '2025-01-15', 77, NULL),
	(29, 'Audi se retira del DTM para enfocarse en la Fórmula 1', 'Audi ha decidido concentrarse en su entrada a la Fórmula 1 en 2026, lo que implica la retirada del DTM y el fin de la colaboración con ABT Sportsline, que ha sido exitosa durante años. Hans-Jürgen Abt ha expresado críticas hacia esta decisión, señalando que el programa de clientes es financieramente viable y actualmente está en auge. Teme que los clientes se desvíen hacia competidores como BMW o Mercedes.', '2025-01-15', 76, NULL),
	(98, 'PROVA', 'inbdtuipbnewiofv bisd vijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL),
	(99, 'PROVA', 'inbdtuipbnewiofv bisd vijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL),
	(100, 'PROVA', 'inbdtuipbnewiofv bisd vijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL),
	(101, 'PROVA', 'inbdtuipbnewiofv bisd vijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL),
	(102, 'PROVA', 'inbdtuipbnewiofv bisd wadawdawdawdawdawdvijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL),
	(103, 'PROVA1234', 'inbdtuipbnewiofv bisd wadawdawdawdawdawdvijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL),
	(104, 'PROVA1234', 'inbdtuipbnewiofv bisd wadawdawdawdawdawdvijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL),
	(105, 'PROVA1234789', 'inbdtuipbnewiofv bisd wadawdawdawdawdawdvijgnbieorsdnvgiobmeridvm gibmerivngiubnreviomnrbitremvc90ernbper9g', '2025-04-18', 77, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
