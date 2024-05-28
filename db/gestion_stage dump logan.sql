-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 mai 2024 à 06:57
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

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
-- Doublure de structure pour la vue `activite`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
`commentaire` varchar(255)
,`date` date
,`entreprise` varchar(255)
,`etudiant` varchar(511)
,`heure` time
,`idactivite` int
,`identreprise` int
,`idetudiant` int
,`type` varchar(25)
,`ville` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la table `activite_etu`
--

DROP TABLE IF EXISTS `activite_etu`;
CREATE TABLE IF NOT EXISTS `activite_etu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_entreprise` int DEFAULT NULL,
  `idEtudiant` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_mail` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_tel` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_nom` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_fonction` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdEtudiant` (`idEtudiant`),
  KEY `ID_Entreprise` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite_etu`
--

INSERT INTO `activite_etu` (`id`, `id_entreprise`, `idEtudiant`, `date`, `type`, `commentaire`, `contact_mail`, `contact_tel`, `contact_nom`, `contact_fonction`) VALUES
(1, 1, 1, '2024-02-01 10:00:00', 'tel', 'no coment', NULL, NULL, NULL, NULL),
(2, 2, 1, '2024-03-21 10:00:00', 'mail', 'un commentaire', NULL, NULL, NULL, NULL),
(10, 1, 1, '2024-04-10 19:49:19', '1', '', NULL, NULL, NULL, NULL),
(11, 49, 2, '2024-04-10 20:42:17', 'mal', '', NULL, NULL, NULL, NULL),
(12, 100, 2, '2024-04-11 09:20:44', '1', '5555555555555', NULL, NULL, NULL, NULL),
(13, 14, 1, '2024-04-11 09:24:15', '651656546546465', '651651651651651', NULL, NULL, NULL, NULL),
(14, 85, 2, '2024-04-11 09:24:38', '56156516', '5165165165156', NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 2, NULL, '2024-04-20 19:57:35', 'mail', NULL, NULL, NULL, NULL, NULL),
(26, 45, 1, '2024-04-20 22:24:53', 'tel', 'coucou', NULL, NULL, NULL, NULL),
(27, 1, 1, '2024-04-20 22:25:10', 'email', 'zzzzzzz', NULL, NULL, NULL, NULL),
(28, 54, 1, '2024-04-20 22:30:55', 'email', 'Ceci est mon commentaire', NULL, NULL, NULL, NULL),
(29, 53, 1, '2024-04-20 22:38:30', 'tel', 'cccccccccccccc', NULL, NULL, NULL, NULL),
(30, 127, 1, '2024-04-20 22:52:08', 'email', 'fzefz', NULL, NULL, NULL, NULL),
(31, 101, 1, '2024-04-20 23:24:27', 'tel', 'ytesy', NULL, NULL, NULL, NULL),
(32, 54, 1, '2024-04-21 15:49:40', 'email', 'fEFEF', NULL, NULL, NULL, NULL);

--
-- Déclencheurs `activite_etu`
--
DROP TRIGGER IF EXISTS `ajout_activite`;
DELIMITER $$
CREATE TRIGGER `ajout_activite` BEFORE INSERT ON `activite_etu` FOR EACH ROW BEGIN
    SET NEW.date = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `activite_type`
--

DROP TABLE IF EXISTS `activite_type`;
CREATE TABLE IF NOT EXISTS `activite_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite_type`
--

INSERT INTO `activite_type` (`id`, `type`, `points`) VALUES
(1, 'Ajout d\'entreprise', 1),
(2, 'Modification d\'une information d\'une entreprise', 1),
(3, 'Envoie d\'un email', 2),
(4, 'Appel téléphonique', 2),
(5, 'Ajout d\'un mail', 4),
(6, 'Ajout d\'une ligne direct vers un employé', 1),
(7, 'Ajout d\'un maitre de stage', 5),
(8, 'Ajout d\'un recruteur', 4),
(9, 'Ajout d\'un employé', 2);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `contact_employe`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `contact_employe`;
CREATE TABLE IF NOT EXISTS `contact_employe` (
`Created_date` datetime
,`Created_User` varchar(511)
,`email` varchar(255)
,`EmployeID` int
,`entreprise` varchar(255)
,`EntrepriseID` int
,`fonction` varchar(255)
,`nom` varchar(255)
,`prenom` varchar(255)
,`telephone` varchar(255)
,`UserID` int
);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idEntreprise` int DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `created_userid` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `idEntreprise`, `nom`, `prenom`, `email`, `telephone`, `fonction`, `created_userid`, `created_date`) VALUES
(1, 141, 'Dupond', 'Fernand', 'test@test.de', '00 00 00 00 00', 'Président', 3, '2024-05-15 15:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomEntreprise` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `adresse2` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `codePostal` varchar(255) DEFAULT NULL,
  `dep_geo` varchar(4) DEFAULT NULL,
  `siret` varchar(100) DEFAULT NULL,
  `naf` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `effectif` varchar(20) DEFAULT NULL,
  `Created_UserID` int DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nomEntreprise`, `adresse`, `adresse2`, `ville`, `tel`, `codePostal`, `dep_geo`, `siret`, `naf`, `type`, `effectif`, `Created_UserID`, `Created_Date`) VALUES
(1, 'Auto-école du Littoral', '17, Rue Pujos', NULL, 'ROCHEFORT', '0000000000000000000', '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Base aérienne 721', ' Base Aérienne', NULL, 'Rochefort', '05 46 88 80 00', '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'IDK Stratégie Multimédia', 'Hotel d\'entreprise, local n°3, 1 Rue de la Trinquette', NULL, 'La Rochelle (Minnimes)', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Léa Nature', '23Avenue Paul Langevin', NULL, 'Perigny Cedex', NULL, '17183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Novatique', '16 B RUE DU DANEMARK   ', NULL, 'AURAY', '', '56400', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Novatique', NULL, NULL, 'AURAY', NULL, '56400', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Pays Rochefortais', '3 avenue Maurice Chupin Parc des Fouriers', NULL, 'Rochefort', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Sacrée Com', '15 rue Renouleau', NULL, 'Tonnay-Charente', NULL, '17430', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'TESSI TECHNOLOGIES', '1-3 Avenue des Satellites', NULL, 'Le Haillan', NULL, '33185', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '4DConcept', '41-43 Avenue du centre MONTIGNY LE BRETONNEUX', NULL, 'MONTIGNY LE BRETONNEUX', NULL, '78180', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '6 TEM\' INFORMATIQUE', '2 RD 734', NULL, 'Dolus', NULL, '17550', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'A2I Informatique ', 'Rue Augustin Fresnel –', NULL, 'PERIGNY', NULL, '17183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'A2I INFORMATIQUE', 'ZAC Les Montagnes BP5', NULL, 'CHAMPNIERS', NULL, '16430', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'ACT Service', '18 rue de la Bonnette Les minimes', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Adequat Systeme', '14 avenue Jean de Vivonne', NULL, 'Pisany', NULL, '17600', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Alstom', 'Avenue Commdt Lysiack', NULL, 'Aytré', NULL, '17440', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Archipel', NULL, NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Astron Associate SA', 'Ch du grand Puits 38 CP 339 CH – 1217 Meyrin - 1', NULL, 'Meyrin- Suisse', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'CARA', '107 avenue de ROCHEFORT', NULL, 'Royan', NULL, '17200', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Caserne Renaudin', 'av Porte Dauphine', NULL, 'LA ROCHELLE', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'CC17', '37 rue du Dr Peltier', NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'CCI Rochefort et Saintonges', 'Corderie Royale Rue Audebert', NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Centre hospitalier de Rochefort', '16, Rue du Docteur Peltier', NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Centre hospitalier de Royan', NULL, NULL, 'Royan', NULL, '17205', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Centre Hospitalier De Saintong', '11 Bd Ambroise Paré BP326', NULL, 'SAINTES', NULL, '17108', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Cetios', 'Allée de la Baucette', NULL, 'Surgères', NULL, '17700', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'CH Jonzac', 'Av, Winston churchild, BP 109', NULL, 'Jonzac', NULL, '17503', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'cipecma', NULL, NULL, 'Chatelaillon', NULL, '17340', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Clinique Pasteur', NULL, NULL, 'Royan', NULL, '17200', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'CMAF ', NULL, NULL, 'LA ROCHELLE', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Communauté d\'agglomération de ', NULL, NULL, 'PERIGNY', NULL, '17180', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Mairie de Château-Larcher', '4, Rue de la Mairie ', NULL, 'CHATEAU LARCHER', NULL, '86370', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'CC17 INFORMATIQUE', ' 37, rue du Docteur Peltier ', NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'CYBERTEK', 'Avenue Fourneaux ', NULL, 'ANGOULINS SUR MER', NULL, '17690', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'DATACLIC ', '47, Rue Pierre de Campet', NULL, 'SAUJON', NULL, '17600', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'DDSV ', NULL, NULL, 'LA ROCHELLE', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'DELAMET SAS ', '16, Rue Gambetta ', NULL, 'Saint Aigulin', NULL, '17360', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'DIGITAL', '751 rue de la Génoise,Parc d\'activité Les Montagnes ', NULL, 'CHAMPNIERS', NULL, '16430', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'EIGSI - ', NULL, NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'ENILIA – ENSMIC', 'Avenue François Mitterand BP 49 ', NULL, 'SURGERES', NULL, '17700', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Foyer départemental Lannelongue', '30 Bld du Débarquement', NULL, 'Saint Trojan Les Bains', NULL, '17370', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'GARANDEAU FRERES Chamblanc ', ' 2 route des étangs', NULL, 'Cherves-Richemont', NULL, '16370', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Groupe Coop Atlantique', '3 rue du docteur jean ', NULL, 'SAINTES', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Groupe Gibaud', '15 rue de l\'ormeau du Pied Saintes ', NULL, 'SAINTES', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Groupe Léa Nature', 'Avenue Paul Langevin', NULL, 'Périgny', NULL, '17180', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Excelia', '102, Rue de Coureilles /  1 rue Jean Perrin', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Hano-communication ', ' place Charles De Gaulle  ', NULL, 'Aulnay', NULL, '17450', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'IN TECH', ' 2bis rue Ferdinand Gateau', NULL, 'Tonnay Charente ', NULL, '17430', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'IUT La Rochelle ', NULL, NULL, 'La Rochelle ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'IUT La Rochelle ', '15 rue François De Vaux Foletier ', NULL, ' LA ROCHELE cedex 01 ', NULL, '17026', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Groupe Michel', ' 163 Avenue Jean-Paul SARTRE ', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Jean-Noël Informatique', '37 avenue d\'aunis ', NULL, 'tonnay-charente ', NULL, '17430', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'KUEHNE+NAGEL DSIA', '16 rue de la petite sensive ', NULL, 'Nantes ', NULL, '44323', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Leroy Somer', 'Boulevard Marcelin Leroy', NULL, 'Angoulème', NULL, '16000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'LP Jean Rostand louise lériget', '12 Rue Louise Lériget', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Lycée ?', '66 Boulevard de châtenay ', NULL, 'Cognac ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Lycée agricole', 'Site de l\'oisellerie ', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Lycée Agricole Bordeaux ', NULL, NULL, 'Blanquefort ', NULL, '33290', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Lycee bellevue ', NULL, NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Lycée Bernard Palissy', '1, Rue de Gascogne', NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'lycée Georges Desclaude', 'rue Georges Desclaude', NULL, 'Saintes', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Lycée georges Leygues ', NULL, NULL, 'Villeneuve\\lot ', NULL, '47300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Lycée Jamain', '2A Boulevard Pouzet ', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Lycée Jean DAUTET ', NULL, NULL, 'La Rochelle ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Lycée Léonce Vieljeux ', 'Rue des Gonthières ', NULL, 'La Rochelle ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Lycée Marcel Dassault - ', ' NULL', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'lycée Professionnel Régional I', ' NULL', NULL, 'COGNAC ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Lycée Professionnel Rompsay', ' Rue de Périgny ', NULL, 'La Rochelle', NULL, '17025', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Lycée Victor hugo ', NULL, NULL, 'Poitiers ', NULL, '86000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'MAAF Assurances', 'SA Chauray ', NULL, 'Niort ', NULL, '79036', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Maiano Informatique', ' 17 rue de l\'électricité 17200 Royan ', NULL, 'Royan ', NULL, '17200', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Mairie de Saintes', 'Square Andre Maudet ', NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Mairie de Chatelaillon ', NULL, NULL, 'Chatelaillon ', NULL, '17340', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Mairie de Meschers', '8 rue Paul Massy ', NULL, 'MESCHERS SUR GIRONDE', NULL, '17132', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Mairie de Poitiers Informatiqu', 'Rue du Dolmen', NULL, 'Poitiers', NULL, '86000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Mairie de Pont l\'Abbé d\'Arnoul', 'Place du général de Gaulle', NULL, 'Pont l\'Abbé d\'Arnoult ', NULL, '17250', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'MAIRIE DE ROYAN', ' 80, avenue de Pontaillac ', NULL, 'Royan ', NULL, '17200', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'MAIRIE DE SAUJON', ' Hotel de ville BP 108 ', NULL, 'SAUJON ', NULL, '17600', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Malichaud atlantique', '13 rue Hubert Pennevert', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'MAPA Mutuelle d\'Assurance', 'Rue Anatole Contré ', NULL, 'Saint Jean d\'Angély ', NULL, '17400', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Metal Néo', 'ZI des Soeurs, 21 Boulevard du vercors', NULL, 'Rochefort', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'MSA ', '46, boulevard du Dr C.Duroselle', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'NEOPC', 'ZI OUEST voie C ', NULL, 'SURGERES ', NULL, '17700', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'NEVA technologies', '40 Rue de Marignan', NULL, 'Cognac', NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'ORECO S.A. ', '44 bd Oscar Planat ', NULL, 'COGNAC ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Orix Informatique', '6 rue pape', NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Boutique?', 'Parc d\'activité Les Montagnes ', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'PRODWARE', '9 rue jacques cartier ', NULL, 'AYTRE ', NULL, '17440', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Romain Informatique', '20 rue de saint-vivien', NULL, ' Bords', NULL, '17430', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Saint jean d\'Y / Val de Sainto', ' rue texier ', NULL, 'Saint Jean d\'Angély ', NULL, '17400', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'SAINTRONIC', ' parc atlantique, l\'ormeau de pied ', NULL, 'SAINTES ', NULL, '17101', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'SARL A.I.P.C. ', '18, route de Frontenay RUFFIGNY', NULL, 'LA CRECHE ', NULL, '79260', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'SARL Concept Joueur Cité Joueu', '15, rue Jean Fougerat ', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'SARL DIF Informatique', 'ZA de chez Bernard 25 route de Cognac', NULL, 'Archiac', NULL, '17520', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'SARL LE MONDE DU PC ', '16,rue G. Claude ', NULL, 'Vaux Sur Mer ', NULL, '17640', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Satti informatique ', 'rue Augustin Fresnel ZI ', NULL, 'PERIGNY ', NULL, '17183', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'Services-emedia', '12 rue de la boulangerie ', NULL, 'Bernay Saint-Martin ', NULL, '17330', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Simair', '17 avenue André Dublin', NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'SOGEMAP', '40, Rue de Marignan', NULL, 'COGNAC ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'SS2i-services', '1 rue Alexandre Fleming', NULL, 'LA ROCHELLE ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'STEF INFORMATIX ', '61, av. Lafayette ', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Soluris', NULL, NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'SYSTEL SA', '17 Rue Leverrien', NULL, 'AYTRE', NULL, '17440', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'URANIE ', 'Zone d\'activité des docks maritimes Bat A Quai Carriet ', NULL, 'Lormont ', NULL, '33310', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Zolux', '141 cours Paul Doumer', NULL, 'Saintes', NULL, '17100', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Mairie Ecurat', 'route de ', NULL, 'Ecurat', NULL, '17560', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'SASU Esprit numérique', 'rue Henri Giraudeau', NULL, 'Surgères', NULL, '17700', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'Agence Wouep!', 'Pépinière d\'entreprises Indigo Allée de la Barratte', NULL, 'Surgères', NULL, '17700', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'LR Marketing', '1 rue Fleming', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Cerealog ', '1 place Bernard Moitessier', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Inter Mutuelles Assistance', '118 avenue de Paris', NULL, 'Niort ', NULL, '79033', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Conservatoire du littoral', 'Corderie Royale CS 10137', NULL, 'Rochefort', NULL, '17306', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Communauté de Communes de l\'île de Ré', '3, rue du Père Ignace', NULL, 'Saint Martin de Ré', NULL, '17410', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Pluscom', '45 rue de la gare', NULL, 'Aytré', NULL, '17440', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Centre hospitalier Jonzac', '4 avenue Winston Churchill ', NULL, 'Jonzac', NULL, '17503', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Mairie de La Rochelle', 'Place de l\'hôtel de ville', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'SICA Atlantique', '69 rue Montcalm', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'A2MI', '10 rue Jean Perrin', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'Agence des territoires de la Vienne', 'Avenue René Cassin', NULL, 'Chasseneuil-du-Poitou', NULL, '86963', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'Terra Lacta', ' 2 rue de la Glacière 05 46 30 30 30', NULL, 'Surgères  ', NULL, '17700', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'AP-HP Corentin Celton', '4, parvis Corentin Celton', NULL, 'Issy-les-Moulineaux', NULL, '92130', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'Essentia', '23a rue Antoine Lavoisier', NULL, 'Aytre', NULL, '17440', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Université de La Rochelle', '15 rue Flemming', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'MAIF', '200 avenue Salvadore Allende', NULL, 'Niort', NULL, '79000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Studio VA', '5 quai Auriol', NULL, 'Tonnay-Charente', NULL, '17430', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'NASKIGO', '21 Chemin du Prieuré ', NULL, ' LA ROCHELLE ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'Eixa6 Informatique', '5 Rue Louise Michel', NULL, 'Marennes', NULL, '17320', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'BHI2C', '  ', '', 'SAINT-HILAIRE-DE-VILLEFRANCHE', '', '17770', '17', '48153967400012', '46.52Z', 'PME', '3 à 5 salariés', 3, '2024-05-16 00:04:51'),
(141, 'CATALYSE INFORMATIQUE', '21 RUE GUTENBERG', '', 'AYTRE', '', '17440', '17', '47842596000026', '47.41Z', 'PME', '3 à 5 salariés', 3, '2024-05-16 00:06:05'),
(142, 'START INFORMATIQUE', '163 ROUTE DE LA TURPAUDIERE', '', 'LA CHAPELLE-DES-POTS', '', '17100', '17', '45071596600021', '47.41Z', 'PME', '-', 3, '2024-05-16 00:24:30'),
(143, 'RE-SET INFORMATIQUE', '8 ROUTE DU GOISIL', '', 'LA COUARDE-SUR-MER', '', '17670', '17', '89121926300011', '62.02B', 'PME', '-', 3, '2024-05-16 09:07:08'),
(145, 'BANQUE DE FRANCE', '22 RUE REAUMUR', NULL, 'LA ROCHELLE', NULL, '17000', NULL, '57210489102555', '64.11Z', '12', '12', 3, '2024-05-18 23:06:55'),
(146, 'FB 17 TELECOM', '4 PLACE ALSACE LORRAINE', '', 'LA TREMBLADE', '', '17390', '17', '83212260000022', '61.90Z', 'PME', '3 à 5 salariés', 3, '2024-05-24 08:59:44'),
(151, 'GRAPHIWEB', '85 AVENUE DE LA GRANDE CONCHE', NULL, 'ROYAN', NULL, '17200', NULL, '52399897900018', '73.11Z', 'PME', '', 3, '2024-05-27 16:56:50'),
(155, 'Non défini', '85 AVENUE DE LA GRANDE CONCHE', NULL, 'ROYAN', NULL, '17200', NULL, '49234218300018', '58.19Z', 'Non défini', 'Non défini', 3, '2024-05-27 18:01:41'),
(156, 'SAUJON', '13 ROUTE DE SAINTES', NULL, 'SAUJON', NULL, '17600', NULL, '87922229700027', '10.71C', 'PME', '11', 3, '2024-05-27 18:02:12'),
(157, 'LIDL', '72 AVENUE ROBERT SCHUMAN', NULL, 'RUNGIS', NULL, '94150', NULL, '34326262218927', '47.11D', 'GE', '41', 3, '2024-05-27 18:03:14');

--
-- Déclencheurs `entreprise`
--
DROP TRIGGER IF EXISTS `Test_redondance`;
DELIMITER $$
CREATE TRIGGER `Test_redondance` BEFORE INSERT ON `entreprise` FOR EACH ROW BEGIN
    DECLARE count_exist INT;
    
    
    SELECT COUNT(*) INTO count_exist FROM Entreprise WHERE siret = NEW.siret;
    
    
    IF count_exist > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cette entreprise existe déjà dans la base de données.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idEntreprise` int DEFAULT NULL,
  `idMaitreDeStage` int DEFAULT NULL,
  `idEtudiant` int DEFAULT NULL,
  `classe` varchar(10) DEFAULT NULL,
  `description` text,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idMaitreDeStage` (`idMaitreDeStage`),
  KEY `idEtudiant` (`idEtudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id`, `idEntreprise`, `idMaitreDeStage`, `idEtudiant`, `classe`, `description`, `dateDebut`, `dateFin`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_entree` date DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `spe` varchar(4) DEFAULT NULL COMMENT 'Spécialité (SLAM ou SISR)',
  `classe` varchar(100) DEFAULT NULL,
  `promo` varchar(4) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_reset` tinyint(1) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `inactif` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `date_entree`, `telephone`, `spe`, `classe`, `promo`, `login`, `password`, `password_reset`, `statut`, `inactif`) VALUES
(1, 'Dupond', 'André', '', NULL, NULL, NULL, NULL, '', 'test', '$2y$10$XzVV.OVw3QxgcuEW9ZXGEubrF0jYfVrJV73FDMLVd1zP2lOFeOtUW', 0, 'Etudiant', 1),
(2, 'prof', 'prof', NULL, NULL, NULL, NULL, 'Enseignant', '', 'prof', '$2y$10$Ib3pC565U/q.lb4lxsa5W.oNfVjlHpdgvHUU0HA7TgwAkffgXFQrW', 0, 'Professeur', 0),
(3, 'Ornech', 'Jean-François', 'jean-francois.ornech@ac-poitiers.fr', NULL, '', NULL, 'Enseignant', '', 'jfornech', '$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q', 0, 'Professeur', 0),
(18, 'Patrice', 'DENIS ARONIS', 'mail@mail.local', NULL, '', NULL, 'Enseignant', '', 'patrice', '$2y$10$hR2DosUGTpgg/z4yy3X.vupNh9Rg7ri9rw3JIa8uJLzInmxLhBnLW', 1, 'Professeur', 0),
(20, 'Etudiant', 'etudiant de test', '', NULL, '', NULL, NULL, '', 'sio', '$2y$10$KeXbUulOY1uxBUdr.5zkDeTCDqLJHGYU8DF11Ji5PmUcBe79RI0Tq', 0, 'Etudiant', 1),
(21, 'login', 'login', NULL, NULL, NULL, NULL, NULL, '', 'login', '$2y$10$NNi/pR4j1Ne4N8MD.QFJOedZjQtNhcfPttfxHRXPLYyPGrGzBDnXu', 0, 'Etudiant', 0),
(40, 'CASTILLO', 'Jean-Christophe', '', NULL, '', NULL, 'Enseignant', '', 'castillojc', '$2y$10$H5W2E9n/oN0m4C9ugRdbdeRUEYM.zM.DUGWMlPrIR1ID7XqI785vC', 1, 'Professeur', 0),
(41, 'BOUCHEREAU', 'Bertrand', '', NULL, '', NULL, 'Enseignant', '', 'bouchereaub', '$2y$10$HO4yuuq58SJBqqxnGzksCuvm4FWDBR6nWc3n6ZJHyNHdDEk2tBAK6', 1, 'Professeur', 0),
(43, 'test3', 'test3', 'test3@test3.test3', NULL, '', NULL, NULL, '', 'test3', '$2y$10$vBFEKCAj89EuGo3oLKCZwOabwVoqMpIFIRuaRielTFisKJ07pts1G', 0, 'Etudiant', 0),
(44, 'test4', 'test4', '', NULL, '', NULL, 'Enseignant', '', 'test4', '$2y$10$NtrExBcCGJpDOA/hahsUWOAby9r7QQLo1lEMNvyjKsvgLhO.sszjC', 0, 'Professeur', 0),
(283, 'BARBIER', 'loann', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'barbier.loann', '$2y$10$LgIb4/JPIgLjEKcEQGM31.bhNcPx7ifu40zjg3AXb7uOE1EWOit0u', 1, 'Etudiant', 0),
(284, 'DEGRAUW VERRY', 'axel', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'degrauwverry.axel', '$2y$10$v0pV6vOxh2UtLG7U5X5d0u5EJGszxWZE.x84Lgf1PPMUUMDtMCy4i', 1, 'Etudiant', 0),
(285, 'ERNOULT', 'gabin', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'ernoult.gabin', '$2y$10$fcd96wY6oCbEWKjQ9ezSL.IWLaLP7aFTUj8yJbO.0FXh.U.whOctG', 1, 'Etudiant', 0),
(286, 'GAILLARD', 'logan', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'gaillard.logan', '$2y$10$b0qsMB0TmRAPE1wRDsYfue4fYhOdTaJ5cHAZ6Zae2LPknXC/hCUXi', 1, 'Etudiant', 0),
(287, 'KOSIOREK', 'alexandre', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'kosiorek.alexandre', '$2y$10$ZAmJ.kVgyJqEC/rVX.8vGeq6fXYIxjUPf/V2S9s5YZhJS5ntlcvmy', 1, 'Etudiant', 0),
(288, 'LE ROCHELEUIL  CHAILLE', 'alexis', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'lerocheleuilchaille.alexis', '$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq', 1, 'Etudiant', 0),
(289, 'LESCOUZERE', 'matheo', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'lescouzere.matheo', '$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C', 1, 'Etudiant', 0),
(290, 'MANUKYAN', 'astghik', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'manukyan.astghik', '$2y$10$PNd9ccVd.omSeZvPR9dabOCZdqJFXCI0JwE.MLzrxnN/Q6Nu3QemC', 1, 'Etudiant', 0),
(291, 'MINGOUOLO', 'noah', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'mingouolo.noah', '$2y$10$p5tkLzkj1RiVHyzn5WWdVOcr1E7t3HY30cWbq4uHQdc5.ayjOWK.C', 1, 'Etudiant', 0),
(292, 'MORNAC', 'erwan', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'mornac.erwan', '$2y$10$KaKZrvQJuGhNi/8tWIiRCeyjwzTn0dbYxePPx6knVq1lfSWxbWse6', 1, 'Etudiant', 0),
(293, 'RAMOS', 'clement', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'ramos.clement', '$2y$10$2nq9sOVxrNC6m5aKqw68f.6MmpcRzetq.qm4LpaQHCLSbuUZXeVjm', 1, 'Etudiant', 0),
(294, 'ROUX', 'kevin', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'roux.kevin', '$2y$10$3jlp/7o3pLewV5fL3GV2J.PkkNUqaSKUgqZsRdEy5zSwzX1HpZTjS', 1, 'Etudiant', 0),
(295, 'SAWANE', 'salle', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'sawane.salle', '$2y$10$D2dj.0mTOYqdJXiY.ORMJ.uwc/JqPjJqPyDbBebB/zLFjl8jtrkRq', 1, 'Etudiant', 0),
(296, 'SOUAKRI', 'lounes', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'souakri.lounes', '$2y$10$eLcFIfCY.dG8pirygmu.f.9JT5GFt1WMyDw2xJEHyxLaNORBI2nee', 1, 'Etudiant', 0),
(297, 'BONNET', 'matthieu', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'bonnet.matthieu', '$2y$10$Gz6vxW7uRyF.21sW33oTMel/yIZk8AFuLP00n81LIPd8XhtrLUFA.', 1, 'Etudiant', 0),
(298, 'BUIL', 'victor', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'buil.victor', '$2y$10$oL1Hs1ChRjg.Z/ctUrW6/O3/mUNXNdotZfIzhfqpIRpQVJtOOr5Ye', 1, 'Etudiant', 0),
(299, 'BURAUD', 'mathis', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'buraud.mathis', '$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq', 1, 'Etudiant', 0),
(300, 'COQUILLAU', 'elowan', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'coquillau.elowan', '$2y$10$4bes3wmOeU5ECpEN/8RBVOnKRXtD.3Bh9jaKaf9m9PFeDe/nueNVC', 1, 'Etudiant', 0),
(301, 'COTTEREAU', 'corentin', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'cottereau.corentin', '$2y$10$/WWjbjvMfHERxHoOPbIkoe8IScbC1AD.TeYi3ipquU4Ll2WlKfiam', 1, 'Etudiant', 0),
(302, 'DE ALMEIDA', 'angel', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'dealmeida.angel', '$2y$10$gZCtPO6nMFJVFebVNDZJSuGygJAvxwZu6jR8mhZUCgW8tMgZL4PTC', 1, 'Etudiant', 0),
(303, 'DOMENICI', 'lheo', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'domenici.lheo', '$2y$10$KCl/7Mv/IRbZTXzocHm3EulSKpLe3U/gXKeFajbA8u2No1QAYUQeC', 1, 'Etudiant', 0),
(304, 'GARNIER', 'aurelien', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'garnier.aurelien', '$2y$10$wDye3E8DE2BraJ4nDhrOPevJov6PRd4U0uxZnjApWGfsEAQoElizq', 1, 'Etudiant', 0),
(305, 'GUICHARD', 'camille', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'guichard.camille', '$2y$10$CqKEETRFqDr4XYjNjOmBuen/9SjmH.B6L1N8ZZgQ6NB9TF2ilZSUm', 1, 'Etudiant', 0),
(306, 'LEFEBVRE', 'aleksander', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'lefebvre.aleksander', '$2y$10$rP37oqAr.aFo3UgeoK20UuUvhUbOj9Sbb9VU7UG64v3yFJU5fLyQS', 1, 'Etudiant', 0),
(307, 'MENARD', 'lucas', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'menard.lucas', '$2y$10$xcl0h3lHO9lVf0TaBxFtL.YPr6ephkdgE4qEThbqFD0TyXyt6Vxni', 1, 'Etudiant', 0),
(308, 'MIE', 'martin', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'mie.martin', '$2y$10$cTxklMVeDggknfMGaUmUreUqGRUfQLutqQVSIzYSFFU9so2j4d1uq', 1, 'Etudiant', 0),
(309, 'PERODEAU', 'matheo', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'perodeau.matheo', '$2y$10$sYxXUD11lKzs9byjX4V39erc.mAlpVmEQvGre/z1fv50IuOnNGp9a', 1, 'Etudiant', 0),
(310, 'POUPEAU', 'mathieu', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'poupeau.mathieu', '$2y$10$yiNoHD8QYjSIQuDLmXUy6OSWl3ncsALNWgd195FHMwyx3XtdngnLq', 1, 'Etudiant', 0),
(311, 'TEXIER', 'hugo', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'texier.hugo', '$2y$10$GIOZRvGjkTRIEcc0ecHV.eS1CtGhDArNsJefxGMXjMaytjT8KBc2W', 1, 'Etudiant', 0),
(312, 'THOMAS', 'dorian', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'thomas.dorian', '$2y$10$OS6Z5ON6SuqtAeLl/BFv5eSV4giJItE0hhpuODYELqJ0WQWpOl7TO', 1, 'Etudiant', 0),
(313, 'VINCENT', 'chloe', NULL, '2021-09-04', NULL, '', 'Ancien étudiant', '', 'vincent.chloe', '$2y$10$EndTptWnDV0GAhsM0M3MC.yWiXl/qBy4KPSYavejgoXTx18DKj86e', 1, 'Etudiant', 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_entreprise`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_entreprise`;
CREATE TABLE IF NOT EXISTS `vue_entreprise` (
`adresse` varchar(255)
,`codePostal` varchar(255)
,`Created_Date` datetime
,`Created_User` varchar(511)
,`effectif` varchar(20)
,`EntrepriseID` int
,`naf` varchar(100)
,`nomEntreprise` varchar(255)
,`siret` varchar(100)
,`type` varchar(100)
,`ville` varchar(255)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_stage`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_stage`;
CREATE TABLE IF NOT EXISTS `vue_stage` (
`classe` varchar(10)
,`dateDebut` date
,`dateFin` date
,`description` text
,`employe_fonction` varchar(255)
,`employe_nom` varchar(255)
,`employe_prenom` varchar(255)
,`Entreprise` varchar(255)
,`EtudiantEmail` varchar(255)
,`EtudiantNom` varchar(255)
,`EtudiantPrenom` varchar(255)
,`EtudiantPromo` varchar(4)
,`EtudiantSpe` varchar(4)
,`idEntreprise` int
,`idEtudiant` int
,`idMaitreDeStage` int
,`idStage` int
,`siret` varchar(100)
,`Statut` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure de la vue `activite`
--
DROP TABLE IF EXISTS `activite`;

DROP VIEW IF EXISTS `activite`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activite`  AS SELECT `activite_etu`.`id` AS `idactivite`, `user`.`id` AS `idetudiant`, `entreprise`.`id` AS `identreprise`, cast(`activite_etu`.`date` as date) AS `date`, cast(`activite_etu`.`date` as time) AS `heure`, `activite_etu`.`type` AS `type`, concat(`user`.`nom`,' ',`user`.`prenom`) AS `etudiant`, `entreprise`.`nomEntreprise` AS `entreprise`, `entreprise`.`ville` AS `ville`, `activite_etu`.`commentaire` AS `commentaire` FROM ((`activite_etu` join `user` on((`activite_etu`.`idEtudiant` = `user`.`id`))) join `entreprise` on((`activite_etu`.`id_entreprise` = `entreprise`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `contact_employe`
--
DROP TABLE IF EXISTS `contact_employe`;

DROP VIEW IF EXISTS `contact_employe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `contact_employe`  AS SELECT `employe`.`id` AS `EmployeID`, `employe`.`nom` AS `nom`, `employe`.`prenom` AS `prenom`, `employe`.`email` AS `email`, `employe`.`telephone` AS `telephone`, `employe`.`fonction` AS `fonction`, `entreprise`.`id` AS `EntrepriseID`, `entreprise`.`nomEntreprise` AS `entreprise`, `user`.`id` AS `UserID`, concat(`user`.`nom`,' ',`user`.`prenom`) AS `Created_User`, `employe`.`created_date` AS `Created_date` FROM ((`employe` join `entreprise` on((`employe`.`idEntreprise` = `entreprise`.`id`))) join `user` on((`employe`.`created_userid` = `user`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_entreprise`
--
DROP TABLE IF EXISTS `vue_entreprise`;

DROP VIEW IF EXISTS `vue_entreprise`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_entreprise`  AS SELECT `e`.`id` AS `EntrepriseID`, `e`.`siret` AS `siret`, `e`.`nomEntreprise` AS `nomEntreprise`, `e`.`adresse` AS `adresse`, `e`.`ville` AS `ville`, `e`.`codePostal` AS `codePostal`, `e`.`naf` AS `naf`, `e`.`type` AS `type`, `e`.`effectif` AS `effectif`, `e`.`Created_Date` AS `Created_Date`, concat(`u`.`nom`,' ',`u`.`prenom`) AS `Created_User` FROM (`entreprise` `e` join `user` `u` on((`e`.`Created_UserID` = `u`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_stage`
--
DROP TABLE IF EXISTS `vue_stage`;

DROP VIEW IF EXISTS `vue_stage`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_stage`  AS SELECT `s`.`id` AS `idStage`, `s`.`idEntreprise` AS `idEntreprise`, `s`.`idMaitreDeStage` AS `idMaitreDeStage`, `s`.`idEtudiant` AS `idEtudiant`, `s`.`classe` AS `classe`, `u`.`statut` AS `Statut`, `s`.`description` AS `description`, `s`.`dateDebut` AS `dateDebut`, `s`.`dateFin` AS `dateFin`, `u`.`nom` AS `EtudiantNom`, `u`.`prenom` AS `EtudiantPrenom`, `u`.`email` AS `EtudiantEmail`, `u`.`spe` AS `EtudiantSpe`, `u`.`promo` AS `EtudiantPromo`, `e`.`siret` AS `siret`, `e`.`nomEntreprise` AS `Entreprise`, `m`.`nom` AS `employe_nom`, `m`.`prenom` AS `employe_prenom`, `m`.`fonction` AS `employe_fonction` FROM (((`stage` `s` join `user` `u` on((`s`.`idEtudiant` = `u`.`id`))) join `entreprise` `e` on((`s`.`idEntreprise` = `e`.`id`))) join `employe` `m` on((`s`.`idMaitreDeStage` = `m`.`id`))) ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite_etu`
--
ALTER TABLE `activite_etu`
  ADD CONSTRAINT `Activite_Etu_ibfk_1` FOREIGN KEY (`idEtudiant`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `Activite_Etu_ibfk_2` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `Employe_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `Stage_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `Stage_ibfk_2` FOREIGN KEY (`idMaitreDeStage`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `Stage_ibfk_3` FOREIGN KEY (`idEtudiant`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
