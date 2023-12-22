-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 déc. 2023 à 14:41
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `euro`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231222095353', '2023-12-22 09:53:56', 104);

-- --------------------------------------------------------

--
-- Structure de la table `match_barrer`
--

DROP TABLE IF EXISTS `match_barrer`;
CREATE TABLE IF NOT EXISTS `match_barrer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team1_id` int DEFAULT NULL,
  `team2_id` int DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C101F3D5E72BCFA4` (`team1_id`),
  KEY `IDX_C101F3D5F59E604A` (`team2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `match_barrer_final`
--

DROP TABLE IF EXISTS `match_barrer_final`;
CREATE TABLE IF NOT EXISTS `match_barrer_final` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team1_id` int DEFAULT NULL,
  `team2_id` int DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_35B8C59E72BCFA4` (`team1_id`),
  KEY `IDX_35B8C59F59E604A` (`team2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `match_group`
--

DROP TABLE IF EXISTS `match_group`;
CREATE TABLE IF NOT EXISTS `match_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team1_id` int DEFAULT NULL,
  `team2_id` int DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D3AA3B64E72BCFA4` (`team1_id`),
  KEY `IDX_D3AA3B64F59E604A` (`team2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2186 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `match_group`
--

INSERT INTO `match_group` (`id`, `team1_id`, `team2_id`, `score`) VALUES
(2126, 2, 3, '1-3'),
(2127, 2, 4, '1-2'),
(2128, 2, 5, '2-1'),
(2129, 2, 6, '1-1'),
(2130, 2, 33, '0-2'),
(2131, 3, 4, '2-3'),
(2132, 3, 5, '3-4'),
(2133, 3, 6, '0-1'),
(2134, 3, 33, '2-1'),
(2135, 4, 5, '0-1'),
(2136, 4, 6, '2-0'),
(2137, 4, 33, '0-0'),
(2138, 5, 6, '0-1'),
(2139, 5, 33, '1-0'),
(2140, 6, 33, '1-0'),
(2141, 7, 8, '2-1'),
(2142, 7, 9, '1-0'),
(2143, 7, 10, '2-2'),
(2144, 7, 11, '2-0'),
(2145, 7, 12, '1-0'),
(2146, 8, 9, '2-0'),
(2147, 8, 10, '1-3'),
(2148, 8, 11, '4-1'),
(2149, 8, 12, '2-1'),
(2150, 9, 10, '2-1'),
(2151, 9, 11, '1-1'),
(2152, 9, 12, '0-1'),
(2153, 10, 11, '4-1'),
(2154, 10, 12, '1-2'),
(2155, 11, 12, '2-2'),
(2156, 13, 14, '2-0'),
(2157, 13, 15, '1-1'),
(2158, 13, 16, '3-0'),
(2159, 13, 17, '3-1'),
(2160, 13, 18, '4-0'),
(2161, 14, 15, '2-2'),
(2162, 14, 16, '3-1'),
(2163, 14, 17, '2-1'),
(2164, 14, 18, '0-1'),
(2165, 15, 16, '2-1'),
(2166, 15, 17, '1-0'),
(2167, 15, 18, '2-0'),
(2168, 16, 17, '1-1'),
(2169, 16, 18, '2-3'),
(2170, 17, 18, '1-0'),
(2171, 1, 19, '2-0'),
(2172, 1, 20, '2-0'),
(2173, 1, 21, '2-0'),
(2174, 1, 22, '3-1'),
(2175, 1, 25, '2-2'),
(2176, 19, 20, '3-2'),
(2177, 19, 21, '3-0'),
(2178, 19, 22, '3-3'),
(2179, 19, 25, '3-1'),
(2180, 20, 21, '2-2'),
(2181, 20, 22, '1-1'),
(2182, 20, 25, '1-1'),
(2183, 21, 22, '1-3'),
(2184, 21, 25, '2-3'),
(2185, 22, 25, '0-1');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_fifa` int DEFAULT NULL,
  `chapeau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wins` int DEFAULT NULL,
  `losses` int DEFAULT NULL,
  `draws` int DEFAULT NULL,
  `goals_scored` int DEFAULT NULL,
  `goals_conceded` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `name`, `rank_fifa`, `chapeau`, `path`, `wins`, `losses`, `draws`, `goals_scored`, `goals_conceded`, `points`) VALUES
(1, 'Italy\r\n\r\n', 9, 'POT4', NULL, 4, 0, 1, 11, 3, 13),
(2, 'Germany', 16, 'POT1', NULL, 1, 3, 1, 5, 9, 4),
(3, 'Portugal', 6, 'POT1', NULL, 2, 3, 0, 10, 10, 6),
(4, 'Spain', 8, 'POT1', NULL, 3, 1, 1, 7, 4, 10),
(5, 'Belgium', 5, 'POT1', NULL, 3, 2, 0, 7, 6, 9),
(6, 'England', 4, 'POT1', NULL, 3, 1, 1, 4, 3, 10),
(7, 'Hungary', 30, 'POT2', NULL, 4, 0, 1, 8, 3, 13),
(8, 'Turkey', 38, 'POT2', NULL, 3, 2, 0, 10, 7, 9),
(9, 'Romania', 48, 'POT2', NULL, 1, 3, 1, 3, 6, 4),
(10, 'Denmark', 19, 'POT2', NULL, 2, 2, 1, 11, 8, 7),
(11, 'Albania', 59, 'POT2', NULL, 0, 3, 2, 5, 13, 2),
(12, 'Austria', 25, 'POT2', NULL, 2, 2, 1, 6, 6, 7),
(13, 'Netherlands', 7, 'POT3', NULL, 4, 0, 1, 13, 2, 13),
(14, 'Scotland', 34, 'POT3', NULL, 2, 2, 1, 7, 7, 7),
(15, 'Croatia', 10, 'POT3', NULL, 3, 0, 2, 8, 4, 11),
(16, 'Slovenia', 54, 'POT3', NULL, 0, 4, 1, 5, 12, 1),
(17, 'Slovakia', 50, 'POT3', NULL, 1, 3, 1, 4, 7, 4),
(18, 'Czech', 41, 'POT3', NULL, 2, 3, 0, 4, 9, 6),
(19, 'Serbia', 29, 'POT4', NULL, 3, 1, 1, 12, 8, 10),
(20, 'Switzerland', 14, 'POT4', NULL, 0, 2, 3, 6, 9, 3),
(21, 'Wales', 28, 'POT4', 'PATHA', 0, 4, 1, 5, 13, 1),
(22, 'Finland', 62, 'POT4', 'PATHA', 1, 2, 2, 8, 9, 5),
(23, 'Poland ', 31, NULL, 'PATHA', 0, 0, 0, 0, 0, 0),
(24, 'Estonia', 118, NULL, 'PATHA', 0, 0, 0, 0, 0, 0),
(25, 'Bosnia Herzegovina', 63, 'POT4', 'PATHB', 2, 1, 2, 8, 8, 8),
(26, 'Ukraine', 22, NULL, 'PATHB', 0, 0, 0, 0, 0, 0),
(27, 'Israël', 71, NULL, 'PATHB', 0, 0, 0, 0, 0, 0),
(28, 'Island', 67, NULL, 'PATHB', 0, 0, 0, 0, 0, 0),
(29, 'Gerogia', 76, NULL, 'PATHC', 0, 0, 0, 0, 0, 0),
(30, 'Luxembourg', 87, NULL, 'PATHC', 0, 0, 0, 0, 0, 0),
(31, 'Greece', 51, NULL, 'PATHC', 0, 0, 0, 0, 0, 0),
(32, 'Kazakhstan', 98, NULL, 'PATHC', 0, 0, 0, 0, 0, 0),
(33, 'France', 2, 'POT1', NULL, 1, 3, 1, 3, 4, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `match_barrer`
--
ALTER TABLE `match_barrer`
  ADD CONSTRAINT `FK_C101F3D5E72BCFA4` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `FK_C101F3D5F59E604A` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`);

--
-- Contraintes pour la table `match_barrer_final`
--
ALTER TABLE `match_barrer_final`
  ADD CONSTRAINT `FK_35B8C59E72BCFA4` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `FK_35B8C59F59E604A` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`);

--
-- Contraintes pour la table `match_group`
--
ALTER TABLE `match_group`
  ADD CONSTRAINT `FK_D3AA3B64E72BCFA4` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `FK_D3AA3B64F59E604A` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
