-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 juin 2024 à 07:20
-- Version du serveur : 8.2.0
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idProfPrincipal` int DEFAULT NULL,
  `nomProf` varchar(255) DEFAULT NULL,
  `nomClasse` varchar(4) NOT NULL,
  `promo` varchar(4) NOT NULL,
  `nbrEtu` int DEFAULT NULL,
  `sisr` int DEFAULT NULL,
  `slam` int DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`nomClasse`,`promo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idProfPrincipal`, `nomProf`, `nomClasse`, `promo`, `nbrEtu`, `sisr`, `slam`, `dateDebut`, `dateFin`) VALUES
(3, 'ORNECH Jean-François', 'SIO1', '2025', 16, 5, 9, '2024-04-01', '2024-07-03'),
(40, 'CASTILLO Jean-Christophe', 'SIO2', '2024', 17, 7, 10, '2024-05-22', '2024-07-09'),
(41, 'BOUCHEREAU Bertrand', 'SIO1', '2024', NULL, NULL, NULL, '2024-06-04', '2024-07-16'),
(18, 'DENIS ARONIS Patrice', 'SIO2', '2023', NULL, NULL, NULL, '2024-06-09', '2024-07-03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
