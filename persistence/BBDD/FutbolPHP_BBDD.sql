-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.12.0.7122
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para futbol
CREATE DATABASE IF NOT EXISTS `futbol` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `futbol`;

-- Volcando estructura para tabla futbol.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `estadio` varchar(100) DEFAULT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla futbol.equipos: ~12 rows (aproximadamente)
INSERT INTO `equipos` (`id`, `nombre`, `estadio`, `imagen`) VALUES
	(1, 'Real Madrid', 'Santiago Bernabéu', 'https://upload.wikimedia.org/wikipedia/en/5/56/Real_Madrid_CF.svg'),
	(2, 'FC Barcelona', 'Spotify Camp Nou', 'https://upload.wikimedia.org/wikipedia/en/4/47/FC_Barcelona_%28crest%29.svg'),
	(3, 'Atlético de Madrid', 'Cívitas Metropolitano', 'https://upload.wikimedia.org/wikipedia/it/1/15/Club_Atl%C3%A9tico_de_Madrid_logo_2018.png'),
	(4, 'Sevilla FC', 'Ramón Sánchez-Pizjuán', 'https://upload.wikimedia.org/wikipedia/en/3/3b/Sevilla_FC_logo.svg'),
	(5, 'Real Betis', 'Benito Villamarín', 'https://upload.wikimedia.org/wikipedia/en/1/13/Real_betis_logo.svg'),
	(6, 'Real Sociedad', 'Reale Arena', 'https://upload.wikimedia.org/wikipedia/en/f/f1/Real_Sociedad_logo.svg'),
	(7, 'Athletic Club', 'San Mamés', 'https://upload.wikimedia.org/wikipedia/en/9/98/Club_Athletic_Bilbao_logo.svg'),
	(8, 'Valencia CF', 'Mestalla', 'https://www.viniloscasa.com/28195-thickbox/vinilos-valencia-club-de-futbol-escudo.jpg'),
	(9, 'Villarreal CF', 'Estadio de la Cerámica', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToYWmEmv4sS9X2LDbjXoZodE747BuV3rzwnw&s'),
	(10, 'Celta de Vigo', 'Abanca Balaídos', 'https://a.espncdn.com/i/teamlogos/soccer/500-dark/85.png'),
	(11, 'Granada CF', 'Nuevo Los Cármenes', 'https://logodownload.org/wp-content/uploads/2021/02/granada-fc-logo-1.png'),
	(12, 'Levante UD', 'Ciutat de València', 'https://lh5.googleusercontent.com/proxy/wqPQ7ME1_DqT4KozqBvvAuzmQzHwsY75IDad6rprfQKS7dndTzG3rQOAq7sOoeXo2QXgrn4bvYEkoQXzonkgycCSu4BKEuTOGzt3sA6cAld0O7LxLEkL1B5b3fHrk_PI1EX_syL8Sk_lkMzzfjwrrlu-sON8ZoCF');

-- Volcando estructura para tabla futbol.partidos
CREATE TABLE IF NOT EXISTS `partidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEquipo1` int(11) DEFAULT NULL,
  `idEquipo2` int(11) DEFAULT NULL,
  `resultado` varchar(1) DEFAULT NULL,
  `jornada` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_partidoequipo_equipos` (`idEquipo1`),
  KEY `FK_partidoequipo_equipos_2` (`idEquipo2`),
  CONSTRAINT `FK_partidoequipo_equipos` FOREIGN KEY (`idEquipo1`) REFERENCES `equipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_partidoequipo_equipos_2` FOREIGN KEY (`idEquipo2`) REFERENCES `equipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla futbol.partidos: ~10 rows (aproximadamente)
INSERT INTO `partidos` (`id`, `idEquipo1`, `idEquipo2`, `resultado`, `jornada`) VALUES
	(1, 1, 2, '1', 1),
	(2, 3, 4, 'X', 1),
	(3, 5, 6, '2', 1),
	(4, 7, 8, 'X', 2),
	(5, 9, 10, '1', 2),
	(6, 11, 12, '2', 2),
	(7, 1, 3, '1', 3),
	(8, 5, 7, '2', 3),
	(9, 9, 11, 'X', 3),
	(10, 2, 4, '1', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
