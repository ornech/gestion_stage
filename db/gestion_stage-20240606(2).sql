-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 juin 2024 à 15:08
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
-- Doublure de structure pour la vue `contact_employe`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `contact_employe`;
CREATE TABLE IF NOT EXISTS `contact_employe` (
`EmployeID` int
,`nom` varchar(255)
,`prenom` varchar(255)
,`email` varchar(255)
,`telephone` varchar(255)
,`fonction` varchar(255)
,`service` varchar(100)
,`EntrepriseID` int
,`entreprise` varchar(255)
,`Entreprise_adresse` varchar(255)
,`Entreprise_codePostal` varchar(255)
,`Entreprise_ville` varchar(255)
,`UserID` int
,`Created_User` varchar(511)
,`Created_date` datetime
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
  `service` varchar(100) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `created_userid` int DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `contact_valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `idEntreprise`, `nom`, `prenom`, `email`, `telephone`, `service`, `fonction`, `created_userid`, `created_date`, `contact_valide`) VALUES
(1, 141, 'Dupond', 'Fernand', 'test@test.de', '00 00 00 00 00', NULL, 'Président', 3, '2024-05-15 15:00:00', 0),
(4, 156, 'Maitre', 'Saujon', 'lemaire@saujon.fr', '0578435948', 'public', 'Maire de Saujon', 3, '2024-06-03 08:54:28', 0),
(92, 145, 'Monsieur', 'leBanquierDeFrance', 'lebanquierdefrance@gmail.com', '0606060606', NULL, 'Directeur du secteur de l&#039;informatique', 3, '2024-06-03 19:26:42', 0),
(96, 151, 'Graphi', 'Webmaster', '', '', NULL, '', 3, '2024-06-04 07:53:32', 0),
(98, 156, 'Sosie Maitre', 'Saujon', '', '', NULL, '', 3, '2024-06-04 10:45:51', 0),
(99, 38, 'Maitre', 'Jean-François', '', '', NULL, '', 3, '2024-06-04 10:53:13', 0),
(100, 210, 'Logan', 'Gaillard', 'logangaillard1@gmail.com', '07 83 07 83 68', NULL, 'Étudiant option SLAM', 3, '2024-06-04 11:11:01', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nomEntreprise`, `adresse`, `adresse2`, `ville`, `tel`, `codePostal`, `dep_geo`, `siret`, `naf`, `type`, `effectif`, `Created_UserID`, `Created_Date`) VALUES
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
(157, 'LIDL', '72 AVENUE ROBERT SCHUMAN', NULL, 'RUNGIS', NULL, '94150', NULL, '34326262218927', '47.11D', 'GE', '41', 3, '2024-05-27 18:03:14'),
(158, 'HAPPY CASH ROCHEFORT', ' AVENUE DES ERABLES', NULL, 'SAINTE-HERMINE', NULL, '85210', NULL, '81417059300010', '47.79Z', 'PME', 'Non défini', 3, '2024-05-29 18:54:11'),
(198, 'ALDI MARCHE CESTAS', '13  CRUQUE PIGNON', NULL, 'CESTAS', NULL, '33610', NULL, '40309262001321', '47.11D', 'GE', '22', 3, '2024-06-04 10:54:09'),
(210, 'Logan inc', '1 rue william turner, logement 01A', NULL, 'SAUJON', NULL, '17600', NULL, NULL, NULL, NULL, NULL, 3, '2024-06-04 09:04:41');

--
-- Déclencheurs `entreprise`
--
DROP TRIGGER IF EXISTS `Test_redondance`;
DELIMITER $$
CREATE TRIGGER `Test_redondance` BEFORE INSERT ON `entreprise` FOR EACH ROW BEGIN
    DECLARE count_exist INT;
    
    
    SELECT COUNT(*) INTO count_exist FROM entreprise WHERE siret = NEW.siret;
    
    
    IF count_exist > 0 THEN
        SIGNAL SQLSTATE '45001'
        SET MESSAGE_TEXT = 'Cette entreprise existe déjà dans la base de données.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idLogType` int NOT NULL,
  `idUser` int NOT NULL,
  `entite_type` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `entite_id` int DEFAULT NULL,
  `old_values` json DEFAULT NULL,
  `new_values` json DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idActivite` (`idLogType`),
  KEY `idUser` (`idUser`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`id`, `idLogType`, `idUser`, `entite_type`, `entite_id`, `old_values`, `new_values`, `date`) VALUES
(13, 9, 296, 'contact', 151, 'null', '{\"id\": 96, \"nom\": \"Graphi\", \"email\": \"\", \"prenom\": \"Webmaster\", \"service\": null, \"fonction\": \"\", \"telephone\": \"\", \"created_date\": \"2024-06-04 07:53:32\", \"idEntreprise\": 151, \"created_userid\": 3}', '2024-06-04 07:53:32'),
(70, 8, 3, 'stage', 6, 'null', '{\"siret\": \"87922229700027\", \"Statut\": \"Etudiant\", \"classe\": \"SIO1\", \"dateFin\": \"2024-06-12\", \"idStage\": 6, \"dateDebut\": \"2024-05-08\", \"Entreprise\": \"SAUJON\", \"idEtudiant\": 315, \"EtudiantNom\": \"Guillebot\", \"EtudiantSpe\": \"SLAM\", \"EtudiantTel\": \"guillebot-damien@damien.fr\", \"description\": null, \"employe_nom\": \"Maitre\", \"employe_mail\": \"lemaire@saujon.fr\", \"idEntreprise\": 156, \"idProfesseur\": null, \"EtudiantEmail\": \"guillebot-damien@damien.fr\", \"EtudiantPromo\": \"2025\", \"Entreprise_naf\": \"10.71C\", \"EtudiantPrenom\": \"Damien\", \"employe_prenom\": \"Saujon\", \"idMaitreDeStage\": 4, \"Entreprise_ville\": \"SAUJON\", \"employe_fonction\": \"Maire de Saujon\", \"employe_telephone\": \"0578435948\", \"Entreprise_adresse\": \"13 ROUTE DE SAINTES\", \"Entreprise_effectif\": \"11\", \"Entreprise_codePostal\": \"17600\"}', '2024-06-05 11:04:14'),
(29, 2, 290, 'entreprise', 170, 'null', '{\"id\": 170, \"naf\": null, \"tel\": null, \"type\": null, \"siret\": null, \"ville\": \"SAUJON\", \"adresse\": \"9 RUE EUGENE MOUSNIER\", \"dep_geo\": null, \"adresse2\": null, \"effectif\": null, \"codePostal\": \"17600\", \"Created_Date\": \"2024-06-04 07:34:21\", \"nomEntreprise\": \"Avelis Connect\", \"Created_UserID\": 3}', '2024-06-04 09:34:21'),
(19, 10, 293, 'contact', 156, '{\"nom\": \"Maitre\", \"email\": \"jfip@gheoru.com\", \"UserID\": 3, \"prenom\": \"Saujon\", \"service\": \"\", \"fonction\": \"Directeur du secteur de l\'informatique\", \"EmployeID\": 4, \"telephone\": \"0783078368\", \"entreprise\": \"SAUJON\", \"Created_User\": \"Ornech Jean-François\", \"Created_date\": \"2024-06-03 08:54:28\", \"EntrepriseID\": 156, \"Entreprise_ville\": \"SAUJON\", \"Entreprise_adresse\": \"13 ROUTE DE SAINTES\", \"Entreprise_codePostal\": \"17600\"}', '{\"nom\": \"Maitre\", \"email\": \"lemaire@saujon.fr\", \"UserID\": 3, \"prenom\": \"Saujon\", \"service\": \"Public\", \"fonction\": \"Maire de Saujon\", \"EmployeID\": 4, \"telephone\": \"0578435948\", \"entreprise\": \"SAUJON\", \"Created_User\": \"Ornech Jean-François\", \"Created_date\": \"2024-06-03 08:54:28\", \"EntrepriseID\": 156, \"Entreprise_ville\": \"SAUJON\", \"Entreprise_adresse\": \"13 ROUTE DE SAINTES\", \"Entreprise_codePostal\": \"17600\"}', '2024-06-04 08:07:29'),
(69, 11, 3, 'stage', 2, '{\"siret\": \"47842596000026\", \"Statut\": \"Etudiant\", \"classe\": \"SIO1\", \"dateFin\": \"2024-07-10\", \"idStage\": 2, \"dateDebut\": \"2024-05-29\", \"Entreprise\": \"CATALYSE INFORMATIQUE\", \"idEtudiant\": 286, \"EtudiantNom\": \"GAILLARD\", \"EtudiantSpe\": \"\", \"EtudiantTel\": null, \"description\": null, \"employe_nom\": \"Dupond\", \"employe_mail\": \"test@test.de\", \"idEntreprise\": 141, \"idProfesseur\": 3, \"EtudiantEmail\": null, \"EtudiantPromo\": \"\", \"Entreprise_naf\": \"47.41Z\", \"EtudiantPrenom\": \"logan\", \"employe_prenom\": \"Fernand\", \"idMaitreDeStage\": 1, \"Entreprise_ville\": \"AYTRE\", \"employe_fonction\": \"Président\", \"employe_telephone\": \"00 00 00 00 00\", \"Entreprise_adresse\": \"21 RUE GUTENBERG\", \"Entreprise_effectif\": \"3 à 5 salariés\", \"Entreprise_codePostal\": \"17440\"}', '{\"siret\": \"47842596000026\", \"Statut\": \"Etudiant\", \"classe\": \"SIO1\", \"dateFin\": \"2024-06-26\", \"idStage\": 2, \"dateDebut\": \"2024-05-29\", \"Entreprise\": \"CATALYSE INFORMATIQUE\", \"idEtudiant\": 286, \"EtudiantNom\": \"GAILLARD\", \"EtudiantSpe\": \"\", \"EtudiantTel\": null, \"description\": null, \"employe_nom\": \"Dupond\", \"employe_mail\": \"test@test.de\", \"idEntreprise\": 141, \"idProfesseur\": 3, \"EtudiantEmail\": null, \"EtudiantPromo\": \"\", \"Entreprise_naf\": \"47.41Z\", \"EtudiantPrenom\": \"logan\", \"employe_prenom\": \"Fernand\", \"idMaitreDeStage\": 1, \"Entreprise_ville\": \"AYTRE\", \"employe_fonction\": \"Président\", \"employe_telephone\": \"00 00 00 00 00\", \"Entreprise_adresse\": \"21 RUE GUTENBERG\", \"Entreprise_effectif\": \"3 à 5 salariés\", \"Entreprise_codePostal\": \"17440\"}', '2024-06-05 10:24:06'),
(65, 8, 18, 'stage', 5, 'null', '{\"siret\": null, \"Statut\": \"Professeur\", \"classe\": \"SIO1\", \"dateFin\": \"2024-06-17\", \"idStage\": 5, \"dateDebut\": \"2024-05-06\", \"Entreprise\": \"Logan inc\", \"idEtudiant\": 3, \"EtudiantNom\": \"Ornech\", \"EtudiantSpe\": null, \"EtudiantTel\": \"jean-francois.ornech@ac-poitiers.fr\", \"description\": null, \"employe_nom\": \"Logan\", \"employe_mail\": \"logangaillard1@gmail.com\", \"idEntreprise\": 210, \"idProfesseur\": null, \"EtudiantEmail\": \"jean-francois.ornech@ac-poitiers.fr\", \"EtudiantPromo\": \"\", \"Entreprise_naf\": null, \"EtudiantPrenom\": \"Jean-François\", \"employe_prenom\": \"Gaillard\", \"idMaitreDeStage\": 100, \"Entreprise_ville\": \"SAUJON\", \"employe_fonction\": \"Étudiant option SLAM\", \"employe_telephone\": \"07 83 07 83 68\", \"Entreprise_adresse\": \"1 rue william turner, logement 01A\", \"Entreprise_effectif\": null, \"Entreprise_codePostal\": \"17600\"}', '2024-06-04 11:17:31'),
(63, 9, 3, 'contact', 100, 'null', '{\"id\": 100, \"nom\": \"Logan\", \"email\": \"logangaillard1@gmail.com\", \"prenom\": \"Gaillard\", \"service\": null, \"fonction\": \"Étudiant option SLAM\", \"telephone\": \"07 83 07 83 68\", \"created_date\": \"2024-06-04 11:11:01\", \"idEntreprise\": 210, \"created_userid\": 3}', '2024-06-04 11:11:01'),
(68, 11, 3, 'stage', 2, '{\"siret\": \"47842596000026\", \"Statut\": \"Etudiant\", \"classe\": \"SIO1\", \"dateFin\": \"2024-07-03\", \"idStage\": 2, \"dateDebut\": \"2024-05-29\", \"Entreprise\": \"CATALYSE INFORMATIQUE\", \"idEtudiant\": 286, \"EtudiantNom\": \"GAILLARD\", \"EtudiantSpe\": \"\", \"EtudiantTel\": null, \"description\": null, \"employe_nom\": \"Dupond\", \"employe_mail\": \"test@test.de\", \"idEntreprise\": 141, \"idProfesseur\": 3, \"EtudiantEmail\": null, \"EtudiantPromo\": \"\", \"Entreprise_naf\": \"47.41Z\", \"EtudiantPrenom\": \"logan\", \"employe_prenom\": \"Fernand\", \"idMaitreDeStage\": 1, \"Entreprise_ville\": \"AYTRE\", \"employe_fonction\": \"Président\", \"employe_telephone\": \"00 00 00 00 00\", \"Entreprise_adresse\": \"21 RUE GUTENBERG\", \"Entreprise_effectif\": \"3 à 5 salariés\", \"Entreprise_codePostal\": \"17440\"}', '{\"siret\": \"47842596000026\", \"Statut\": \"Etudiant\", \"classe\": \"SIO1\", \"dateFin\": \"2024-07-10\", \"idStage\": 2, \"dateDebut\": \"2024-05-29\", \"Entreprise\": \"CATALYSE INFORMATIQUE\", \"idEtudiant\": 286, \"EtudiantNom\": \"GAILLARD\", \"EtudiantSpe\": \"\", \"EtudiantTel\": null, \"description\": null, \"employe_nom\": \"Dupond\", \"employe_mail\": \"test@test.de\", \"idEntreprise\": 141, \"idProfesseur\": 3, \"EtudiantEmail\": null, \"EtudiantPromo\": \"\", \"Entreprise_naf\": \"47.41Z\", \"EtudiantPrenom\": \"logan\", \"employe_prenom\": \"Fernand\", \"idMaitreDeStage\": 1, \"Entreprise_ville\": \"AYTRE\", \"employe_fonction\": \"Président\", \"employe_telephone\": \"00 00 00 00 00\", \"Entreprise_adresse\": \"21 RUE GUTENBERG\", \"Entreprise_effectif\": \"3 à 5 salariés\", \"Entreprise_codePostal\": \"17440\"}', '2024-06-05 10:12:12'),
(48, 3, 3, 'entreprise', 196, 'null', '{\"naf\": \"47.11D\", \"type\": \"GE\", \"siret\": \"40309262001321\", \"ville\": \"CESTAS\", \"adresse\": \"13  CRUQUE PIGNON\", \"effectif\": \"22\", \"codePostal\": \"33610\", \"Created_Date\": \"2024-06-04 10:43:13\", \"Created_User\": \"Ornech Jean-François\", \"EntrepriseID\": 196, \"nomEntreprise\": \"ALDI MARCHE CESTAS\"}', '2024-06-04 10:43:13'),
(61, 2, 288, 'entreprise', 210, 'null', '{\"naf\": null, \"type\": null, \"siret\": null, \"ville\": \"SAUJON\", \"adresse\": \"1 rue william turner, logement 01A\", \"effectif\": null, \"codePostal\": \"17600\", \"Created_Date\": \"2024-06-04 09:04:41\", \"Created_User\": \"Ornech Jean-François\", \"EntrepriseID\": 210, \"nomEntreprise\": \"Loloche&#039;inc\"}', '2024-06-04 11:04:41'),
(71, 12, 3, 'profil', 315, '{\"id\": 315, \"nom\": \"Guillebot\", \"spe\": \"SLAM\", \"email\": \"guillebotdamien@guillebot.com\", \"login\": \"guillebot.damien\", \"promo\": \"2025\", \"classe\": \"SIO1\", \"prenom\": \"Damien\", \"statut\": \"Etudiant\", \"inactif\": 0, \"password\": \"$2y$10$Hj4/gjAjZR.B6avBbnKi8eNL/sHwra49014SJfLM5elIT1o8WX9tm\", \"telephone\": \"07 67 67 67 67\", \"date_entree\": \"2023-09-04\", \"password_reset\": 1}', '{\"id\": 315, \"nom\": \"Guillebot\", \"spe\": \"SLAM\", \"email\": \"guillebot---damien@guillebot.com\", \"login\": \"guillebot.damien\", \"promo\": \"2025\", \"classe\": \"SIO1\", \"prenom\": \"Damien\", \"statut\": \"Etudiant\", \"inactif\": 0, \"password\": \"$2y$10$Hj4/gjAjZR.B6avBbnKi8eNL/sHwra49014SJfLM5elIT1o8WX9tm\", \"telephone\": \"07 83 83 83 83\", \"date_entree\": \"2023-09-04\", \"password_reset\": 1}', '2024-06-05 17:39:40'),
(72, 12, 3, 'profil', 3, '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois.ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"\", \"date_entree\": null, \"password_reset\": 0}', '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois.ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"06 41 54 57 39\", \"date_entree\": null, \"password_reset\": 0}', '2024-06-05 17:41:03'),
(73, 12, 3, 'profil', 3, '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois.ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"06 41 54 57 39\", \"date_entree\": null, \"password_reset\": 0}', '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois-ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"06 41 54 57 39\", \"date_entree\": null, \"password_reset\": 0}', '2024-06-05 17:41:17'),
(74, 12, 286, 'profil', 286, '{\"id\": 286, \"nom\": \"GAILLARD\", \"spe\": \"\", \"email\": null, \"login\": \"gaillard.logan\", \"promo\": \"\", \"classe\": \"SIO1\", \"prenom\": \"logan\", \"statut\": \"Etudiant\", \"inactif\": 0, \"password\": \"$2y$10$ccKA7y5uJfUz2pXHdZJPhegQ5hwgwfB8549LVd8NNdO7yUxjOjB0y\", \"telephone\": null, \"date_entree\": \"2023-09-04\", \"password_reset\": 0}', '{\"id\": 286, \"nom\": \"GAILLARD\", \"spe\": \"\", \"email\": \"logangaillard1@gmail.com\", \"login\": \"gaillard.logan\", \"promo\": \"\", \"classe\": \"SIO1\", \"prenom\": \"logan\", \"statut\": \"Etudiant\", \"inactif\": 0, \"password\": \"$2y$10$ccKA7y5uJfUz2pXHdZJPhegQ5hwgwfB8549LVd8NNdO7yUxjOjB0y\", \"telephone\": \"07 83 07 83 68\", \"date_entree\": \"2023-09-04\", \"password_reset\": 0}', '2024-06-05 17:42:11'),
(75, 12, 3, 'profil', 3, '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois-ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"06 41 54 57 39\", \"date_entree\": null, \"dateFirstConn\": \"2024-06-06 09:55:04\", \"password_reset\": 0}', '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois-ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"06 00 00 00 00\", \"date_entree\": null, \"dateFirstConn\": \"2024-06-06 09:55:04\", \"password_reset\": 0}', '2024-06-06 10:36:26'),
(76, 12, 3, 'profil', 3, '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois-ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"06 00 00 00 00\", \"date_entree\": null, \"dateFirstConn\": \"2024-06-06 09:55:04\", \"password_reset\": 0}', '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois-ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"0606060606\", \"date_entree\": null, \"dateFirstConn\": \"2024-06-06 09:55:04\", \"password_reset\": 0}', '2024-06-06 10:37:08'),
(77, 12, 3, 'profil', 3, '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois-ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"0606060606\", \"date_entree\": null, \"dateFirstConn\": \"2024-06-06 09:55:04\", \"password_reset\": 0}', '{\"id\": 3, \"nom\": \"Ornech\", \"spe\": null, \"email\": \"jean-francois-ornech@ac-poitiers.fr\", \"login\": \"jfornech\", \"promo\": \"\", \"classe\": \"Enseignant\", \"prenom\": \"Jean-François\", \"statut\": \"Professeur\", \"inactif\": 0, \"password\": \"$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q\", \"telephone\": \"06 06 06 06 06\", \"date_entree\": null, \"dateFirstConn\": \"2024-06-06 09:55:04\", \"password_reset\": 0}', '2024-06-06 10:37:13'),
(78, 13, 3, 'profil', 0, 'null', 'null', '2024-06-06 15:50:25'),
(79, 13, 3, 'profil', 320, 'null', 'null', '2024-06-06 15:51:31'),
(80, 13, 3, 'profil', 43, 'null', 'null', '2024-06-06 15:54:12'),
(81, 13, 3, 'profil', 44, 'null', 'null', '2024-06-06 15:54:18');

-- --------------------------------------------------------

--
-- Structure de la table `log_type`
--

DROP TABLE IF EXISTS `log_type`;
CREATE TABLE IF NOT EXISTS `log_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `log_type`
--

INSERT INTO `log_type` (`id`, `type`, `points`) VALUES
(1, 'Importer une entreprise depuis la recherche', 2),
(2, 'Ajout d\'une entreprise manuellement', 1),
(3, 'Importer une entreprise depuis le siret', 3),
(4, 'Modification d\'une entreprise', 2),
(5, 'Envoie d\'un email', 1),
(6, 'Appel téléphonique', 1),
(7, 'Ajout d\'un mail (A changer probablement)', 2),
(8, 'Ajout d\'un stage', 5),
(9, 'Ajout d\'un contact', 2),
(10, 'Modification d\'un contact', 1),
(11, 'Modification d\'un stage', 1),
(12, 'Modification d\'un utilisateur', 1),
(13, 'Suppression d\'un utilisateur', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id`, `idEntreprise`, `idMaitreDeStage`, `idEtudiant`, `classe`, `description`, `dateDebut`, `dateFin`) VALUES
(1, 141, 1, 288, 'SIO1', NULL, '2024-05-31', '2024-06-28'),
(2, 141, 1, 286, 'SIO1', NULL, '2024-05-29', '2024-06-26'),
(3, 141, 1, 308, 'SIO2', NULL, '2024-05-30', '2024-07-11'),
(5, 210, 100, 3, 'SIO1', NULL, '2024-05-06', '2024-06-17'),
(6, 156, 4, 315, 'SIO1', NULL, '2024-05-08', '2024-06-12');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idTuteur` int DEFAULT NULL,
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
  `dateFirstConn` datetime DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idTuteur` (`idTuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `idTuteur`, `nom`, `prenom`, `email`, `date_entree`, `telephone`, `spe`, `classe`, `promo`, `login`, `password`, `password_reset`, `statut`, `inactif`, `dateFirstConn`, `isDeleted`) VALUES
(1, NULL, 'Dupond', 'André', '', NULL, NULL, NULL, NULL, '', 'test', '$2y$10$XzVV.OVw3QxgcuEW9ZXGEubrF0jYfVrJV73FDMLVd1zP2lOFeOtUW', 0, 'Etudiant', 1, NULL, 0),
(2, NULL, 'prof', 'prof', NULL, NULL, NULL, NULL, 'Enseignant', '', 'prof', '$2y$10$nIrnqg66QlvFkT8KuCtrtu2GMmmX4jP.BiRA8LPaBn6am55Q0Ox4.', 1, 'Professeur', 0, NULL, 0),
(3, NULL, 'Ornech', 'Jean-François', 'jean-francois-ornech@ac-poitiers.fr', NULL, '06 06 06 06 06', NULL, 'Enseignant', '', 'jfornech', '$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q', 0, 'Professeur', 0, '2024-06-06 09:55:04', 0),
(18, NULL, 'Patrice', 'DENIS ARONIS', 'mail@mail.local', NULL, '', NULL, 'Enseignant', '', 'patrice', '$2y$10$hR2DosUGTpgg/z4yy3X.vupNh9Rg7ri9rw3JIa8uJLzInmxLhBnLW', 1, 'Professeur', 0, NULL, 0),
(20, NULL, 'Etudiant', 'etudiant de test', '', NULL, '', NULL, NULL, '', 'sio', '$2y$10$KeXbUulOY1uxBUdr.5zkDeTCDqLJHGYU8DF11Ji5PmUcBe79RI0Tq', 0, 'Etudiant', 1, NULL, 0),
(21, NULL, 'login', 'login', NULL, NULL, NULL, NULL, NULL, '', 'login', '$2y$10$NNi/pR4j1Ne4N8MD.QFJOedZjQtNhcfPttfxHRXPLYyPGrGzBDnXu', 0, 'Etudiant', 0, NULL, 0),
(40, NULL, 'CASTILLO', 'Jean-Christophe', '', NULL, '', NULL, 'Enseignant', '', 'castillojc', '$2y$10$4SOI336Uo8PxWwGtwXMrTOMkOd4DgtQGOifw7fEq8/SWax8BeUrCy', 1, 'Professeur', 0, NULL, 0),
(41, NULL, 'BOUCHEREAU', 'Bertrand', '', NULL, '', NULL, 'Enseignant', '', 'bouchereaub', '$2y$10$HO4yuuq58SJBqqxnGzksCuvm4FWDBR6nWc3n6ZJHyNHdDEk2tBAK6', 1, 'Professeur', 0, NULL, 0),
(43, NULL, 'ANONYMOUS', 'Anonymous', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 1),
(44, NULL, 'ANONYMOUS', 'Anonymous', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 1),
(283, NULL, 'BARBIER', 'loann', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'barbier.loann', '$2y$10$LgIb4/JPIgLjEKcEQGM31.bhNcPx7ifu40zjg3AXb7uOE1EWOit0u', 1, 'Etudiant', 0, NULL, 0),
(284, NULL, 'DEGRAUW VERRY', 'axel', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'degrauwverry.axel', '$2y$10$v0pV6vOxh2UtLG7U5X5d0u5EJGszxWZE.x84Lgf1PPMUUMDtMCy4i', 1, 'Etudiant', 0, NULL, 0),
(285, NULL, 'ERNOULT', 'gabin', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'ernoult.gabin', '$2y$10$fcd96wY6oCbEWKjQ9ezSL.IWLaLP7aFTUj8yJbO.0FXh.U.whOctG', 1, 'Etudiant', 0, NULL, 0),
(286, NULL, 'GAILLARD', 'logan', 'logangaillard1@gmail.com', '2023-09-04', '07 83 07 83 68', '', 'SIO1', '', 'gaillard.logan', '$2y$10$ccKA7y5uJfUz2pXHdZJPhegQ5hwgwfB8549LVd8NNdO7yUxjOjB0y', 0, 'Etudiant', 0, '2024-06-06 12:32:03', 0),
(287, NULL, 'KOSIOREK', 'alexandre', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'kosiorek.alexandre', '$2y$10$ZAmJ.kVgyJqEC/rVX.8vGeq6fXYIxjUPf/V2S9s5YZhJS5ntlcvmy', 1, 'Etudiant', 0, NULL, 0),
(288, NULL, 'LE ROCHELEUIL  CHAILLE', 'alexis', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'lerocheleuilchaille.alexis', '$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq', 1, 'Etudiant', 0, NULL, 0),
(289, NULL, 'LESCOUZERE', 'matheo', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'lescouzere.matheo', '$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C', 1, 'Etudiant', 0, NULL, 0),
(290, NULL, 'MANUKYAN', 'astghik', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'manukyan.astghik', '$2y$10$PNd9ccVd.omSeZvPR9dabOCZdqJFXCI0JwE.MLzrxnN/Q6Nu3QemC', 1, 'Etudiant', 0, NULL, 0),
(291, NULL, 'MINGOUOLO', 'noah', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'mingouolo.noah', '$2y$10$p5tkLzkj1RiVHyzn5WWdVOcr1E7t3HY30cWbq4uHQdc5.ayjOWK.C', 1, 'Etudiant', 0, NULL, 0),
(292, NULL, 'MORNAC', 'erwan', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'mornac.erwan', '$2y$10$KaKZrvQJuGhNi/8tWIiRCeyjwzTn0dbYxePPx6knVq1lfSWxbWse6', 1, 'Etudiant', 0, NULL, 0),
(293, NULL, 'RAMOS', 'clement', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'ramos.clement', '$2y$10$2nq9sOVxrNC6m5aKqw68f.6MmpcRzetq.qm4LpaQHCLSbuUZXeVjm', 1, 'Etudiant', 0, NULL, 0),
(294, NULL, 'ROUX', 'kevin', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'roux.kevin', '$2y$10$3jlp/7o3pLewV5fL3GV2J.PkkNUqaSKUgqZsRdEy5zSwzX1HpZTjS', 1, 'Etudiant', 0, NULL, 0),
(295, NULL, 'SAWANE', 'salle', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'sawane.salle', '$2y$10$D2dj.0mTOYqdJXiY.ORMJ.uwc/JqPjJqPyDbBebB/zLFjl8jtrkRq', 1, 'Etudiant', 0, NULL, 0),
(296, NULL, 'SOUAKRI', 'lounes', NULL, '2023-09-04', NULL, '', 'SIO1', '', 'souakri.lounes', '$2y$10$eLcFIfCY.dG8pirygmu.f.9JT5GFt1WMyDw2xJEHyxLaNORBI2nee', 1, 'Etudiant', 0, NULL, 0),
(297, NULL, 'BONNET', 'matthieu', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'bonnet.matthieu', '$2y$10$Gz6vxW7uRyF.21sW33oTMel/yIZk8AFuLP00n81LIPd8XhtrLUFA.', 1, 'Etudiant', 0, NULL, 0),
(298, NULL, 'BUIL', 'victor', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'buil.victor', '$2y$10$oL1Hs1ChRjg.Z/ctUrW6/O3/mUNXNdotZfIzhfqpIRpQVJtOOr5Ye', 1, 'Etudiant', 0, NULL, 0),
(299, NULL, 'BURAUD', 'mathis', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'buraud.mathis', '$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq', 1, 'Etudiant', 0, NULL, 0),
(300, NULL, 'COQUILLAU', 'elowan', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'coquillau.elowan', '$2y$10$4bes3wmOeU5ECpEN/8RBVOnKRXtD.3Bh9jaKaf9m9PFeDe/nueNVC', 1, 'Etudiant', 0, NULL, 0),
(301, NULL, 'COTTEREAU', 'corentin', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'cottereau.corentin', '$2y$10$/WWjbjvMfHERxHoOPbIkoe8IScbC1AD.TeYi3ipquU4Ll2WlKfiam', 1, 'Etudiant', 0, NULL, 0),
(302, NULL, 'DE ALMEIDA', 'angel', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'dealmeida.angel', '$2y$10$gZCtPO6nMFJVFebVNDZJSuGygJAvxwZu6jR8mhZUCgW8tMgZL4PTC', 1, 'Etudiant', 0, NULL, 0),
(303, NULL, 'DOMENICI', 'lheo', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'domenici.lheo', '$2y$10$KCl/7Mv/IRbZTXzocHm3EulSKpLe3U/gXKeFajbA8u2No1QAYUQeC', 1, 'Etudiant', 0, NULL, 0),
(304, NULL, 'GARNIER', 'aurelien', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'garnier.aurelien', '$2y$10$wDye3E8DE2BraJ4nDhrOPevJov6PRd4U0uxZnjApWGfsEAQoElizq', 1, 'Etudiant', 0, NULL, 0),
(305, NULL, 'GUICHARD', 'camille', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'guichard.camille', '$2y$10$CqKEETRFqDr4XYjNjOmBuen/9SjmH.B6L1N8ZZgQ6NB9TF2ilZSUm', 1, 'Etudiant', 0, NULL, 0),
(306, NULL, 'LEFEBVRE', 'aleksander', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'lefebvre.aleksander', '$2y$10$rP37oqAr.aFo3UgeoK20UuUvhUbOj9Sbb9VU7UG64v3yFJU5fLyQS', 1, 'Etudiant', 0, NULL, 0),
(307, NULL, 'MENARD', 'lucas', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'menard.lucas', '$2y$10$xcl0h3lHO9lVf0TaBxFtL.YPr6ephkdgE4qEThbqFD0TyXyt6Vxni', 1, 'Etudiant', 0, NULL, 0),
(308, NULL, 'MIE', 'martin', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'mie.martin', '$2y$10$cTxklMVeDggknfMGaUmUreUqGRUfQLutqQVSIzYSFFU9so2j4d1uq', 1, 'Etudiant', 0, NULL, 0),
(309, NULL, 'PERODEAU', 'matheo', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'perodeau.matheo', '$2y$10$sYxXUD11lKzs9byjX4V39erc.mAlpVmEQvGre/z1fv50IuOnNGp9a', 1, 'Etudiant', 0, NULL, 0),
(310, NULL, 'POUPEAU', 'mathieu', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'poupeau.mathieu', '$2y$10$yiNoHD8QYjSIQuDLmXUy6OSWl3ncsALNWgd195FHMwyx3XtdngnLq', 1, 'Etudiant', 0, NULL, 0),
(311, NULL, 'TEXIER', 'hugo', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'texier.hugo', '$2y$10$GIOZRvGjkTRIEcc0ecHV.eS1CtGhDArNsJefxGMXjMaytjT8KBc2W', 1, 'Etudiant', 0, NULL, 0),
(312, NULL, 'THOMAS', 'dorian', NULL, '2022-09-04', NULL, '', 'SIO2', '', 'thomas.dorian', '$2y$10$OS6Z5ON6SuqtAeLl/BFv5eSV4giJItE0hhpuODYELqJ0WQWpOl7TO', 1, 'Etudiant', 0, NULL, 0),
(313, NULL, 'VINCENT', 'chloe', NULL, '2021-09-04', NULL, '', 'Ancien étudiant', '', 'vincent.chloe', '$2y$10$EndTptWnDV0GAhsM0M3MC.yWiXl/qBy4KPSYavejgoXTx18DKj86e', 1, 'Etudiant', 0, NULL, 0),
(315, NULL, 'Guillebot', 'Damien', 'guillebot---damien@guillebot.com', '2023-09-04', '07 83 83 83 83', 'SLAM', 'SIO1', '2025', 'guillebot.damien', '$2y$10$Hj4/gjAjZR.B6avBbnKi8eNL/sHwra49014SJfLM5elIT1o8WX9tm', 1, 'Etudiant', 0, NULL, 0),
(316, NULL, 'Prof', 'prof', '', NULL, '', NULL, 'Enseignant', NULL, 'prof.prof', '$2y$10$f5jfCrryZ0I.gtfZmrLUeuBWTmq817d8Xr12vnf/fNN6WJMNCsKFG', 1, 'Professeur', 0, NULL, 0),
(318, NULL, 'Gaillard', 'Logan Prof', '', NULL, '', NULL, 'Enseignant', NULL, 'lpgaillard', '$2y$10$mhHBbXUsSQ9qYEoVgiYBM.gQBfV0ep7reNbt9fab3Zn.zdwYqsPWi', 1, 'Professeur', 0, NULL, 0),
(319, NULL, 'gaillard', 'Jean-François', '', '2024-07-02', '', 'SLAM', 'SIO1', '2025', 'gaillard.jeanfrancois', '$2y$10$UmD0Bl.yOK78dcmp7IxdRukHDL0wx22lvn7wi25IA31mPvRetgfEW', 1, 'Etudiant', 0, NULL, 0),
(320, NULL, 'ANONYMOUS', 'Anonymous', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_entreprise`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_entreprise`;
CREATE TABLE IF NOT EXISTS `vue_entreprise` (
`EntrepriseID` int
,`siret` varchar(100)
,`nomEntreprise` varchar(255)
,`adresse` varchar(255)
,`ville` varchar(255)
,`codePostal` varchar(255)
,`naf` varchar(100)
,`type` varchar(100)
,`effectif` varchar(20)
,`Created_Date` datetime
,`Created_User` varchar(511)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_logs`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_logs`;
CREATE TABLE IF NOT EXISTS `vue_logs` (
`idLog` int
,`idLogType` int
,`idUser` int
,`logType` varchar(100)
,`pointGagne` int
,`entite_type` varchar(50)
,`entite_id` int
,`nomUser` varchar(255)
,`prenomUser` varchar(255)
,`classeUser` varchar(100)
,`old_values` json
,`new_values` json
,`date` datetime
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_stage`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_stage`;
CREATE TABLE IF NOT EXISTS `vue_stage` (
`idStage` int
,`idEntreprise` int
,`idMaitreDeStage` int
,`idEtudiant` int
,`idTuteur` int
,`classe` varchar(10)
,`Statut` varchar(100)
,`description` text
,`dateDebut` date
,`dateFin` date
,`EtudiantNom` varchar(255)
,`EtudiantPrenom` varchar(255)
,`EtudiantEmail` varchar(255)
,`EtudiantTel` varchar(255)
,`EtudiantSpe` varchar(4)
,`EtudiantPromo` varchar(4)
,`siret` varchar(100)
,`Entreprise` varchar(255)
,`Entreprise_adresse` varchar(255)
,`Entreprise_codePostal` varchar(255)
,`Entreprise_ville` varchar(255)
,`Entreprise_effectif` varchar(20)
,`Entreprise_naf` varchar(100)
,`employe_nom` varchar(255)
,`employe_prenom` varchar(255)
,`employe_fonction` varchar(255)
,`employe_mail` varchar(255)
,`employe_telephone` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la vue `contact_employe`
--
DROP TABLE IF EXISTS `contact_employe`;

DROP VIEW IF EXISTS `contact_employe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `contact_employe`  AS SELECT `employe`.`id` AS `EmployeID`, `employe`.`nom` AS `nom`, `employe`.`prenom` AS `prenom`, `employe`.`email` AS `email`, `employe`.`telephone` AS `telephone`, `employe`.`fonction` AS `fonction`, `employe`.`service` AS `service`, `entreprise`.`id` AS `EntrepriseID`, `entreprise`.`nomEntreprise` AS `entreprise`, `entreprise`.`adresse` AS `Entreprise_adresse`, `entreprise`.`codePostal` AS `Entreprise_codePostal`, `entreprise`.`ville` AS `Entreprise_ville`, `user`.`id` AS `UserID`, concat(`user`.`nom`,' ',`user`.`prenom`) AS `Created_User`, `employe`.`created_date` AS `Created_date` FROM ((`employe` join `entreprise` on((`employe`.`idEntreprise` = `entreprise`.`id`))) join `user` on((`employe`.`created_userid` = `user`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_entreprise`
--
DROP TABLE IF EXISTS `vue_entreprise`;

DROP VIEW IF EXISTS `vue_entreprise`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_entreprise`  AS SELECT `e`.`id` AS `EntrepriseID`, `e`.`siret` AS `siret`, `e`.`nomEntreprise` AS `nomEntreprise`, `e`.`adresse` AS `adresse`, `e`.`ville` AS `ville`, `e`.`codePostal` AS `codePostal`, `e`.`naf` AS `naf`, `e`.`type` AS `type`, `e`.`effectif` AS `effectif`, `e`.`Created_Date` AS `Created_Date`, concat(`u`.`nom`,' ',`u`.`prenom`) AS `Created_User` FROM (`entreprise` `e` join `user` `u` on((`e`.`Created_UserID` = `u`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_logs`
--
DROP TABLE IF EXISTS `vue_logs`;

DROP VIEW IF EXISTS `vue_logs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_logs`  AS SELECT `l`.`id` AS `idLog`, `l`.`idLogType` AS `idLogType`, `l`.`idUser` AS `idUser`, `t`.`type` AS `logType`, `t`.`points` AS `pointGagne`, `l`.`entite_type` AS `entite_type`, `l`.`entite_id` AS `entite_id`, `u`.`nom` AS `nomUser`, `u`.`prenom` AS `prenomUser`, `u`.`classe` AS `classeUser`, `l`.`old_values` AS `old_values`, `l`.`new_values` AS `new_values`, `l`.`date` AS `date` FROM ((`logs` `l` join `user` `u` on((`l`.`idUser` = `u`.`id`))) join `log_type` `t` on((`l`.`idLogType` = `t`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_stage`
--
DROP TABLE IF EXISTS `vue_stage`;

DROP VIEW IF EXISTS `vue_stage`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_stage`  AS SELECT `s`.`id` AS `idStage`, `s`.`idEntreprise` AS `idEntreprise`, `s`.`idMaitreDeStage` AS `idMaitreDeStage`, `s`.`idEtudiant` AS `idEtudiant`, `u`.`idTuteur` AS `idTuteur`, `s`.`classe` AS `classe`, `u`.`statut` AS `Statut`, `s`.`description` AS `description`, `s`.`dateDebut` AS `dateDebut`, `s`.`dateFin` AS `dateFin`, `u`.`nom` AS `EtudiantNom`, `u`.`prenom` AS `EtudiantPrenom`, `u`.`email` AS `EtudiantEmail`, `u`.`email` AS `EtudiantTel`, `u`.`spe` AS `EtudiantSpe`, `u`.`promo` AS `EtudiantPromo`, `e`.`siret` AS `siret`, `e`.`nomEntreprise` AS `Entreprise`, `e`.`adresse` AS `Entreprise_adresse`, `e`.`codePostal` AS `Entreprise_codePostal`, `e`.`ville` AS `Entreprise_ville`, `e`.`effectif` AS `Entreprise_effectif`, `e`.`naf` AS `Entreprise_naf`, `m`.`nom` AS `employe_nom`, `m`.`prenom` AS `employe_prenom`, `m`.`fonction` AS `employe_fonction`, `m`.`email` AS `employe_mail`, `m`.`telephone` AS `employe_telephone` FROM (((`stage` `s` join `user` `u` on((`s`.`idEtudiant` = `u`.`id`))) join `entreprise` `e` on((`s`.`idEntreprise` = `e`.`id`))) join `employe` `m` on((`s`.`idMaitreDeStage` = `m`.`id`))) ;

--
-- Contraintes pour les tables déchargées
--

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
