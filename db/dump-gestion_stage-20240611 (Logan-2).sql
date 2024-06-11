-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 11 juin 2024 à 12:45
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
-- Structure de la table `categoriejuridique`
--

DROP TABLE IF EXISTS `categoriejuridique`;
CREATE TABLE IF NOT EXISTS `categoriejuridique` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categoriejuridique`
--

INSERT INTO `categoriejuridique` (`id`, `Libelle`) VALUES
('0000', 'Organisme de placement collectif en valeurs mobilières sans personnalité morale'),
('1000', 'Entrepreneur individuel'),
('2110', 'Indivision entre personnes physiques '),
('2120', 'Indivision avec personne morale '),
('2210', 'Société créée de fait entre personnes physiques '),
('2220', 'Société créée de fait avec personne morale '),
('2310', 'Société en participation entre personnes physiques '),
('2320', 'Société en participation avec personne morale '),
('2385', 'Société en participation de professions libérales '),
('2400', 'Fiducie '),
('2700', 'Paroisse hors zone concordataire '),
('2800', 'Assujetti unique à la TVA'),
('2900', 'Autre groupement de droit privé non doté de la personnalité morale '),
('3110', 'Représentation ou agence commerciale d\'état ou organisme public étranger immatriculé au RCS '),
('3120', 'Société commerciale étrangère immatriculée au RCS'),
('3205', 'Organisation internationale '),
('3210', 'État, collectivité ou établissement public étranger'),
('3220', 'Société étrangère non immatriculée au RCS '),
('3290', 'Autre personne morale de droit étranger '),
('4110', 'Établissement public national à caractère industriel ou commercial doté d\'un comptable public '),
('4120', 'Établissement public national à caractère industriel ou commercial non doté d\'un comptable public '),
('4130', 'Exploitant public '),
('4140', 'Établissement public local à caractère industriel ou commercial '),
('4150', 'Régie d\'une collectivité locale à caractère industriel ou commercial '),
('4160', 'Institution Banque de France '),
('5191', 'Société de caution mutuelle '),
('5192', 'Société coopérative de banque populaire '),
('5193', 'Caisse de crédit maritime mutuel '),
('5194', 'Caisse (fédérale) de crédit mutuel '),
('5195', 'Association coopérative inscrite (droit local Alsace Moselle) '),
('5196', 'Caisse d\'épargne et de prévoyance à forme coopérative '),
('5202', 'Société en nom collectif '),
('5203', 'Société en nom collectif coopérative '),
('5306', 'Société en commandite simple '),
('5307', 'Société en commandite simple coopérative '),
('5308', 'Société en commandite par actions '),
('5309', 'Société en commandite par actions coopérative '),
('5310', 'Société en libre partenariat (SLP)'),
('5370', 'Société de Participations Financières de Profession Libérale Société en commandite par actions (SPFPL SCA)'),
('5385', 'Société d\'exercice libéral en commandite par actions '),
('5410', 'SARL nationale '),
('5415', 'SARL d\'économie mixte '),
('5422', 'SARL immobilière pour le commerce et l\'industrie (SICOMI) '),
('5426', 'SARL immobilière de gestion'),
('5430', 'SARL d\'aménagement foncier et d\'équipement rural (SAFER)'),
('5431', 'SARL mixte d\'intérêt agricole (SMIA) '),
('5432', 'SARL d\'intérêt collectif agricole (SICA) '),
('5442', 'SARL d\'attribution '),
('5443', 'SARL coopérative de construction '),
('5451', 'SARL coopérative de consommation '),
('5453', 'SARL coopérative artisanale '),
('5454', 'SARL coopérative d\'intérêt maritime '),
('5455', 'SARL coopérative de transport'),
('5458', 'SARL coopérative de production (SCOP)'),
('5459', 'SARL union de sociétés coopératives '),
('5460', 'Autre SARL coopérative '),
('5470', 'Société de Participations Financières de Profession Libérale Société à responsabilité limitée (SPFPL SARL)'),
('5485', 'Société d\'exercice libéral à responsabilité limitée '),
('5499', 'Société à responsabilité limitée (sans autre indication)'),
('5505', 'SA à participation ouvrière à conseil d\'administration '),
('5510', 'SA nationale à conseil d\'administration '),
('5515', 'SA d\'économie mixte à conseil d\'administration '),
('5520', 'Fonds à forme sociétale à conseil d\'administration'),
('5522', 'SA immobilière pour le commerce et l\'industrie (SICOMI) à conseil d\'administration'),
('5525', 'SA immobilière d\'investissement à conseil d\'administration'),
('5530', 'SA d\'aménagement foncier et d\'équipement rural (SAFER) à conseil d\'administration'),
('5531', 'Société anonyme mixte d\'intérêt agricole (SMIA) à conseil d\'administration '),
('5532', 'SA d\'intérêt collectif agricole (SICA) à conseil d\'administration'),
('5542', 'SA d\'attribution à conseil d\'administration'),
('5543', 'SA coopérative de construction à conseil d\'administration'),
('5546', 'SA de HLM à conseil d\'administration '),
('5547', 'SA coopérative de production de HLM à conseil d\'administration '),
('5548', 'SA de crédit immobilier à conseil d\'administration '),
('5551', 'SA coopérative de consommation à conseil d\'administration '),
('5552', 'SA coopérative de commerçants-détaillants à conseil d\'administration'),
('5553', 'SA coopérative artisanale à conseil d\'administration '),
('5554', 'SA coopérative (d\'intérêt) maritime à conseil d\'administration '),
('5555', 'SA coopérative de transport à conseil d\'administration'),
('5558', 'SA coopérative de production  (SCOP) à conseil d\'administration'),
('5559', 'SA union de sociétés coopératives à conseil d\'administration '),
('5560', 'Autre SA coopérative à conseil d\'administration '),
('5570', 'Société de Participations Financières de Profession Libérale Société anonyme à conseil d\'administration (SPFPL SA à conseil d\'administration)'),
('5585', 'Société d\'exercice libéral à forme anonyme à conseil d\'administration '),
('5599', 'SA à conseil d\'administration (s.a.i.)'),
('5605', 'SA à participation ouvrière à directoire '),
('5610', 'SA nationale à directoire '),
('5615', 'SA d\'économie mixte à directoire '),
('5620', 'Fonds à forme sociétale à directoire'),
('5622', 'SA immobilière pour le commerce et l\'industrie (SICOMI) à directoire'),
('5625', 'SA immobilière d\'investissement à directoire '),
('5630', 'Safer anonyme à directoire '),
('5631', 'SA mixte d\'intérêt agricole (SMIA)'),
('5632', 'SA d\'intérêt collectif agricole (SICA)'),
('5642', 'SA d\'attribution à directoire'),
('5643', 'SA coopérative de construction à directoire'),
('5646', 'SA de HLM à directoire'),
('5647', 'Société coopérative de production de HLM anonyme à directoire '),
('5648', 'SA de crédit immobilier à directoire '),
('5651', 'SA coopérative de consommation à directoire '),
('5652', 'SA coopérative de commerçants-détaillants à directoire'),
('5653', 'SA coopérative artisanale à directoire '),
('5654', 'SA coopérative d\'intérêt maritime à directoire '),
('5655', 'SA coopérative de transport à directoire '),
('5658', 'SA coopérative de production (SCOP) à directoire'),
('5659', 'SA union de sociétés coopératives à directoire '),
('5660', 'Autre SA coopérative à directoire'),
('5670', 'Société de Participations Financières de Profession Libérale Société anonyme à Directoire (SPFPL SA à directoire)'),
('5685', 'Société d\'exercice libéral à forme anonyme à directoire '),
('5699', 'SA à directoire (s.a.i.)'),
('5710', 'SAS, société par actions simplifiée'),
('5770', 'Société de Participations Financières de Profession Libérale Société par actions simplifiée (SPFPL SAS)'),
('5785', 'Société d\'exercice libéral par action simplifiée '),
('5800', 'Société européenne '),
('6100', 'Caisse d\'Épargne et de Prévoyance '),
('6210', 'Groupement européen d\'intérêt économique (GEIE) '),
('6220', 'Groupement d\'intérêt économique (GIE) '),
('6316', 'Coopérative d\'utilisation de matériel agricole en commun (CUMA) '),
('6317', 'Société coopérative agricole '),
('6318', 'Union de sociétés coopératives agricoles '),
('6411', 'Société d\'assurance à forme mutuelle'),
('6511', 'Sociétés Interprofessionnelles de Soins Ambulatoires '),
('6521', 'Société civile de placement collectif immobilier (SCPI) '),
('6532', 'Société civile d\'intérêt collectif agricole (SICA) '),
('6533', 'Groupement agricole d\'exploitation en commun (GAEC) '),
('6534', 'Groupement foncier agricole '),
('6535', 'Groupement agricole foncier '),
('6536', 'Groupement forestier '),
('6537', 'Groupement pastoral '),
('6538', 'Groupement foncier et rural'),
('6539', 'Société civile foncière '),
('6540', 'Société civile immobilière '),
('6541', 'Société civile immobilière de construction-vente'),
('6542', 'Société civile d\'attribution '),
('6543', 'Société civile coopérative de construction '),
('6544', 'Société civile immobilière d\' accession progressive à la propriété'),
('6551', 'Société civile coopérative de consommation '),
('6554', 'Société civile coopérative d\'intérêt maritime '),
('6558', 'Société civile coopérative entre médecins '),
('6560', 'Autre société civile coopérative '),
('6561', 'SCP d\'avocats '),
('6562', 'SCP d\'avocats aux conseils '),
('6563', 'SCP d\'avoués d\'appel '),
('6564', 'SCP d\'huissiers '),
('6565', 'SCP de notaires '),
('6566', 'SCP de commissaires-priseurs '),
('6567', 'SCP de greffiers de tribunal de commerce '),
('6568', 'SCP de conseils juridiques '),
('6569', 'SCP de commissaires aux comptes '),
('6571', 'SCP de médecins '),
('6572', 'SCP de dentistes '),
('6573', 'SCP d\'infirmiers '),
('6574', 'SCP de masseurs-kinésithérapeutes'),
('6575', 'SCP de directeurs de laboratoire d\'analyse médicale '),
('6576', 'SCP de vétérinaires '),
('6577', 'SCP de géomètres experts'),
('6578', 'SCP d\'architectes '),
('6585', 'Autre société civile professionnelle'),
('6589', 'Société civile de moyens '),
('6595', 'Caisse locale de crédit mutuel '),
('6596', 'Caisse de crédit agricole mutuel '),
('6597', 'Société civile d\'exploitation agricole '),
('6598', 'Exploitation agricole à responsabilité limitée '),
('6599', 'Autre société civile '),
('6901', 'Autre personne de droit privé inscrite au registre du commerce et des sociétés'),
('7111', 'Autorité constitutionnelle '),
('7112', 'Autorité administrative ou publique indépendante'),
('7113', 'Ministère '),
('7120', 'Service central d\'un ministère '),
('7150', 'Service du ministère de la Défense '),
('7160', 'Service déconcentré à compétence nationale d\'un ministère (hors Défense)'),
('7171', 'Service déconcentré de l\'État à compétence (inter) régionale '),
('7172', 'Service déconcentré de l\'État à compétence (inter) départementale '),
('7179', '(Autre) Service déconcentré de l\'État à compétence territoriale '),
('7190', 'Ecole nationale non dotée de la personnalité morale '),
('7210', 'Commune et commune nouvelle '),
('7220', 'Département '),
('7225', 'Collectivité et territoire d\'Outre Mer'),
('7229', '(Autre) Collectivité territoriale '),
('7230', 'Région '),
('7312', 'Commune associée et commune déléguée '),
('7313', 'Section de commune '),
('7314', 'Ensemble urbain '),
('7321', 'Association syndicale autorisée '),
('7322', 'Association foncière urbaine '),
('7323', 'Association foncière de remembrement '),
('7331', 'Établissement public local d\'enseignement '),
('7340', 'Pôle métropolitain'),
('7341', 'Secteur de commune '),
('7342', 'District urbain '),
('7343', 'Communauté urbaine '),
('7344', 'Métropole'),
('7345', 'Syndicat intercommunal à vocation multiple (SIVOM) '),
('7346', 'Communauté de communes '),
('7347', 'Communauté de villes '),
('7348', 'Communauté d\'agglomération '),
('7349', 'Autre établissement public local de coopération non spécialisé ou entente '),
('7351', 'Institution interdépartementale ou entente'),
('7352', 'Institution interrégionale ou entente '),
('7353', 'Syndicat intercommunal à vocation unique (SIVU) '),
('7354', 'Syndicat mixte fermé '),
('7355', 'Syndicat mixte ouvert'),
('7356', 'Commission syndicale pour la gestion des biens indivis des communes '),
('7357', 'Pôle d\'équilibre territorial et rural (PETR)'),
('7361', 'Centre communal d\'action sociale '),
('7362', 'Caisse des écoles '),
('7363', 'Caisse de crédit municipal '),
('7364', 'Établissement d\'hospitalisation '),
('7365', 'Syndicat inter hospitalier '),
('7366', 'Établissement public local social et médico-social '),
('7367', 'Centre Intercommunal d\'action sociale (CIAS)'),
('7371', 'Office public d\'habitation à loyer modéré (OPHLM) '),
('7372', 'Service départemental d\'incendie et de secours (SDIS)'),
('7373', 'Établissement public local culturel '),
('7378', 'Régie d\'une collectivité locale à caractère administratif '),
('7379', '(Autre) Établissement public administratif local '),
('7381', 'Organisme consulaire '),
('7382', 'Établissement public national ayant fonction d\'administration centrale '),
('7383', 'Établissement public national à caractère scientifique culturel et professionnel '),
('7384', 'Autre établissement public national d\'enseignement '),
('7385', 'Autre établissement public national administratif à compétence territoriale limitée '),
('7389', 'Établissement public national à caractère administratif '),
('7410', 'Groupement d\'intérêt public (GIP) '),
('7430', 'Établissement public des cultes d\'Alsace-Lorraine '),
('7450', 'Etablissement public administratif, cercle et foyer dans les armées'),
('7470', 'Groupement de coopération sanitaire à gestion publique '),
('7490', 'Autre personne morale de droit administratif '),
('8110', 'Régime général de la Sécurité Sociale'),
('8120', 'Régime spécial de Sécurité Sociale'),
('8130', 'Institution de retraite complémentaire '),
('8140', 'Mutualité sociale agricole '),
('8150', 'Régime maladie des non-salariés non agricoles '),
('8160', 'Régime vieillesse ne dépendant pas du régime général de la Sécurité Sociale'),
('8170', 'Régime d\'assurance chômage '),
('8190', 'Autre régime de prévoyance sociale '),
('8210', 'Mutuelle '),
('8250', 'Assurance mutuelle agricole '),
('8290', 'Autre organisme mutualiste '),
('8310', 'Comité social économique d’entreprise'),
('8311', 'Comité social économique d\'établissement '),
('8410', 'Syndicat de salariés '),
('8420', 'Syndicat patronal '),
('8450', 'Ordre professionnel ou assimilé '),
('8470', 'Centre technique industriel ou comité professionnel du développement économique '),
('8490', 'Autre organisme professionnel '),
('8510', 'Institution de prévoyance '),
('8520', 'Institution de retraite supplémentaire '),
('9110', 'Syndicat de copropriété '),
('9150', 'Association syndicale libre '),
('9210', 'Association non déclarée '),
('9220', 'Association déclarée '),
('9221', 'Association déclarée d\'insertion par l\'économique'),
('9222', 'Association intermédiaire'),
('9223', 'Groupement d\'employeurs'),
('9224', 'Association d\'avocats à responsabilité professionnelle individuelle'),
('9230', 'Association déclarée, reconnue d\'utilité publique'),
('9240', 'Congrégation '),
('9260', 'Association de droit local (Bas-Rhin, Haut-Rhin et Moselle)'),
('9300', 'Fondation '),
('9900', 'Autre personne morale de droit privé '),
('9970', 'Groupement de coopération sanitaire à gestion privée');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `contact_employe`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `contact_employe`;
CREATE TABLE IF NOT EXISTS `contact_employe` (
`contact_valide` tinyint(1)
,`Created_date` datetime
,`Created_User` varchar(511)
,`email` varchar(255)
,`EmployeID` int
,`entreprise` varchar(255)
,`Entreprise_adresse` varchar(255)
,`Entreprise_codePostal` varchar(255)
,`Entreprise_ville` varchar(255)
,`EntrepriseID` int
,`fonction` varchar(255)
,`nom` varchar(255)
,`prenom` varchar(255)
,`service` varchar(100)
,`telephone` varchar(255)
,`UserID` int
);

-- --------------------------------------------------------

--
-- Structure de la table `effectif`
--

DROP TABLE IF EXISTS `effectif`;
CREATE TABLE IF NOT EXISTS `effectif` (
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `effectif`
--

INSERT INTO `effectif` (`code`, `libelle`) VALUES
('00', '0 salarié'),
('01', '1 ou 2 salariés'),
('02', '3 à 5 salariés'),
('03', '6 à 9 salariés'),
('11', '10 à 19 salariés'),
('12', '20 à 49 salariés'),
('21', '50 à 99 salariés'),
('22', '100 à 199 salariés'),
('31', '100 à 199 salariés'),
('32', '250 à 499 salariés'),
('41', '500 à 999 salariés'),
('42', '1 000 à 1 999 salariés'),
('51', '2 000 à 4 999 salariés'),
('52', '5 000 à 9 999 salariés'),
('53', '10 000 salariés et plus'),
('NN', 'Unité non-employeuse'),
('null', 'donnée manquante');

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
  KEY `idEntreprise` (`idEntreprise`),
  KEY `created_userId` (`created_userid`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `idEntreprise`, `nom`, `prenom`, `email`, `telephone`, `service`, `fonction`, `created_userid`, `created_date`, `contact_valide`) VALUES
(1, 141, 'Dupond', 'Fernand', 'test@test.de', '00 00 00 00 00', NULL, 'Président', 3, '2024-05-15 15:00:00', 1),
(4, 156, 'Maitre', 'Saujon', 'lemaire@saujon.fr', '0578435948', 'public', 'Maire de Saujon', 286, '2024-06-03 08:54:28', 1),
(101, 210, 'Gaillard', 'Logan', '', '', NULL, 'Président de la société et responsable informatique', 3, '2024-06-07 11:02:13', 1),
(103, 210, 'Maitre', 'Cornichon', 'PlutotDeuxFois@kune.fr', '12 34 56 78 10', NULL, 'Dresseur de pokémon', 283, '2024-06-07 12:48:45', 0),
(104, 158, 'Thomas', 'Potiron', 'thomaspotiron@happycash.fr', '05 46 78 65 65', NULL, 'Technicien maintenance informatique', 285, '2024-06-07 12:50:27', 0),
(109, 216, 'PETIT', 'JEAN-PHILIPPE ', '', '', NULL, '', 3, '2024-06-07 22:50:40', 1);

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
  `entreprise_valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `Created_UserID` (`Created_UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nomEntreprise`, `adresse`, `adresse2`, `ville`, `tel`, `codePostal`, `dep_geo`, `siret`, `naf`, `type`, `effectif`, `Created_UserID`, `Created_Date`, `entreprise_valide`) VALUES
(2, 'Base aérienne 721', ' Base Aérienne', NULL, 'Rochefort', '05 46 88 80 00', '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(14, 'ACT Service', '18 rue de la Bonnette Les minimes', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(15, 'ADEQUAT SYSTEME', '54 AVENUE JEAN DE VIVONNE', NULL, 'PISANY', NULL, '17600', NULL, '34994332400096', '62.01Z', '5499', '12', 3, '2024-06-10 19:29:57', 1),
(16, 'ALSTOM TRANSPORT SA', ' AVENUE DU COMMANDANT LYSIACK', NULL, 'AYTRE', NULL, '17440', NULL, '38919198200047', '30.20Z', '5599', '42', 3, '2024-06-10 18:53:28', 1),
(17, 'ARCHIPEL', '3 AVENUE MAURICE CHUPIN', NULL, 'ROCHEFORT', NULL, '17300', NULL, '48763129300031', '94.99Z', '9220', '-', 3, '2024-06-10 19:16:43', 1),
(18, 'Astron Associate SA', 'Ch du grand Puits 38 CP 339 CH – 1217 Meyrin - 1', NULL, 'Meyrin- Suisse', NULL, '0', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(19, 'AGGLOMERATION ROYAN ATLANTIQUE', '107 AVENUE DE ROCHEFORT', NULL, 'ROYAN', NULL, '17200', NULL, '24170064000048', '84.11Z', '7348', '22', 3, '2024-06-10 19:18:10', 1),
(20, 'DIRECTION ZONALE DES COMPAGNIES REPUBLICAINES DE SECURITE SUD-OUEST', ' AVENUE DE LA PORTE DAUPHINE', NULL, 'LA ROCHELLE', NULL, '17000', NULL, '17330153200037', '84.24Z', '7179', '22', 3, '2024-06-10 19:20:10', 1),
(21, 'CC17 SAP', '3 AVENUE LA FAYETTE', NULL, 'ROCHEFORT', NULL, '17300', NULL, '84064010600026', '62.09Z', '5710', '-', 3, '2024-06-10 19:22:40', 1),
(22, 'CHAMBRE DE COMMERCE ET D&#039;INDUSTRIE TERRITORIALE CHARENTE-MARITIME', ' RUE AUDEBERT', NULL, 'ROCHEFORT', NULL, '17300', NULL, '13002980400015', '94.11Z', '7381', '-', 3, '2024-06-10 19:28:29', 1),
(23, 'CENTRE HOSPITALIER DE ROCHEFORT', '1 AVENUE DE BELIGON', NULL, 'ROCHEFORT', NULL, '17300', NULL, '26170033000135', '86.10Z', '7364', '41', 3, '2024-06-10 19:37:19', 1),
(24, 'Centre hospitalier de Royan', NULL, NULL, 'Royan', NULL, '17205', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(25, 'Centre Hospitalier De Saintong', '11 Bd Ambroise Paré BP326', NULL, 'SAINTES', NULL, '17108', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(26, 'Cetios', 'Allée de la Baucette', NULL, 'Surgères', NULL, '17700', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(27, 'CH Jonzac', 'Av, Winston churchild, BP 109', NULL, 'Jonzac', NULL, '17503', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(28, 'cipecma', NULL, NULL, 'Chatelaillon', NULL, '17340', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(29, 'Clinique Pasteur', NULL, NULL, 'Royan', NULL, '17200', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(30, 'CMAF ', NULL, NULL, 'LA ROCHELLE', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(31, 'Communauté d\'agglomération de ', NULL, NULL, 'PERIGNY', NULL, '17180', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(32, 'Mairie de Château-Larcher', '4, Rue de la Mairie ', NULL, 'CHATEAU LARCHER', NULL, '86370', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(33, 'CC17 INFORMATIQUE', ' 37, rue du Docteur Peltier ', NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(34, 'CYBERTEK', 'Avenue Fourneaux ', NULL, 'ANGOULINS SUR MER', NULL, '17690', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(35, 'DATACLIC ', '47, Rue Pierre de Campet', NULL, 'SAUJON', NULL, '17600', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(36, 'DDSV ', NULL, NULL, 'LA ROCHELLE', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(37, 'DELAMET SAS ', '16, Rue Gambetta ', NULL, 'Saint Aigulin', NULL, '17360', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(38, 'DIGITAL', '751 rue de la Génoise,Parc d\'activité Les Montagnes ', NULL, 'CHAMPNIERS', NULL, '16430', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(39, 'EIGSI - ', NULL, NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(40, 'ENILIA – ENSMIC', 'Avenue François Mitterand BP 49 ', NULL, 'SURGERES', NULL, '17700', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(41, 'Foyer départemental Lannelongue', '30 Bld du Débarquement', NULL, 'Saint Trojan Les Bains', NULL, '17370', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(42, 'GARANDEAU FRERES Chamblanc ', ' 2 route des étangs', NULL, 'Cherves-Richemont', NULL, '16370', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(43, 'Groupe Coop Atlantique', '3 rue du docteur jean ', NULL, 'SAINTES', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(44, 'Groupe Gibaud', '15 rue de l\'ormeau du Pied Saintes ', NULL, 'SAINTES', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(45, 'Groupe Léa Nature', 'Avenue Paul Langevin', NULL, 'Périgny', NULL, '17180', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(46, 'Excelia', '102, Rue de Coureilles /  1 rue Jean Perrin', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(47, 'Hano-communication ', ' place Charles De Gaulle  ', NULL, 'Aulnay', NULL, '17450', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(48, 'IN TECH', ' 2bis rue Ferdinand Gateau', NULL, 'Tonnay Charente ', NULL, '17430', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(49, 'IUT La Rochelle ', NULL, NULL, 'La Rochelle ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(50, 'IUT La Rochelle ', '15 rue François De Vaux Foletier ', NULL, ' LA ROCHELE cedex 01 ', NULL, '17026', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(51, 'Groupe Michel', ' 163 Avenue Jean-Paul SARTRE ', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(52, 'Jean-Noël Informatique', '37 avenue d\'aunis ', NULL, 'tonnay-charente ', NULL, '17430', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(53, 'KUEHNE+NAGEL DSIA', '16 rue de la petite sensive ', NULL, 'Nantes ', NULL, '44323', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(54, 'Leroy Somer', 'Boulevard Marcelin Leroy', NULL, 'Angoulème', NULL, '16000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(55, 'LP Jean Rostand louise lériget', '12 Rue Louise Lériget', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(56, 'Lycée ?', '66 Boulevard de châtenay ', NULL, 'Cognac ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(57, 'Lycée agricole', 'Site de l\'oisellerie ', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(58, 'Lycée Agricole Bordeaux ', NULL, NULL, 'Blanquefort ', NULL, '33290', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(59, 'Lycee bellevue ', NULL, NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(60, 'Lycée Bernard Palissy', '1, Rue de Gascogne', NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(61, 'lycée Georges Desclaude', 'rue Georges Desclaude', NULL, 'Saintes', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(62, 'Lycée georges Leygues ', NULL, NULL, 'Villeneuve\\lot ', NULL, '47300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(63, 'Lycée Jamain', '2A Boulevard Pouzet ', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(64, 'Lycée Jean DAUTET ', NULL, NULL, 'La Rochelle ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(65, 'Lycée Léonce Vieljeux ', 'Rue des Gonthières ', NULL, 'La Rochelle ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(66, 'Lycée Marcel Dassault - ', ' NULL', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(67, 'lycée Professionnel Régional I', ' NULL', NULL, 'COGNAC ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(68, 'Lycée Professionnel Rompsay', ' Rue de Périgny ', NULL, 'La Rochelle', NULL, '17025', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(69, 'Lycée Victor hugo ', NULL, NULL, 'Poitiers ', NULL, '86000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(70, 'MAAF Assurances', 'SA Chauray ', NULL, 'Niort ', NULL, '79036', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(71, 'Maiano Informatique', ' 17 rue de l\'électricité 17200 Royan ', NULL, 'Royan ', NULL, '17200', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(72, 'Mairie de Saintes', 'Square Andre Maudet ', NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(73, 'Mairie de Chatelaillon ', NULL, NULL, 'Chatelaillon ', NULL, '17340', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(74, 'Mairie de Meschers', '8 rue Paul Massy ', NULL, 'MESCHERS SUR GIRONDE', NULL, '17132', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(75, 'Mairie de Poitiers Informatiqu', 'Rue du Dolmen', NULL, 'Poitiers', NULL, '86000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(76, 'Mairie de Pont l\'Abbé d\'Arnoul', 'Place du général de Gaulle', NULL, 'Pont l\'Abbé d\'Arnoult ', NULL, '17250', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(77, 'MAIRIE DE ROYAN', ' 80, avenue de Pontaillac ', NULL, 'Royan ', NULL, '17200', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(78, 'MAIRIE DE SAUJON', ' Hotel de ville BP 108 ', NULL, 'SAUJON ', NULL, '17600', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(79, 'Malichaud atlantique', '13 rue Hubert Pennevert', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(80, 'MAPA Mutuelle d\'Assurance', 'Rue Anatole Contré ', NULL, 'Saint Jean d\'Angély ', NULL, '17400', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(81, 'Metal Néo', 'ZI des Soeurs, 21 Boulevard du vercors', NULL, 'Rochefort', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(82, 'MSA ', '46, boulevard du Dr C.Duroselle', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(83, 'NEOPC', 'ZI OUEST voie C ', NULL, 'SURGERES ', NULL, '17700', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(84, 'NEVA technologies', '40 Rue de Marignan', NULL, 'Cognac', NULL, '16', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(85, 'ORECO S.A. ', '44 bd Oscar Planat ', NULL, 'COGNAC ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(86, 'Orix Informatique', '6 rue pape', NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(87, 'Boutique?', 'Parc d\'activité Les Montagnes ', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(88, 'PRODWARE', '9 rue jacques cartier ', NULL, 'AYTRE ', NULL, '17440', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(89, 'Romain Informatique', '20 rue de saint-vivien', NULL, ' Bords', NULL, '17430', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(90, 'Saint jean d\'Y / Val de Sainto', ' rue texier ', NULL, 'Saint Jean d\'Angély ', NULL, '17400', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(91, 'SAINTRONIC', ' parc atlantique, l\'ormeau de pied ', NULL, 'SAINTES ', NULL, '17101', NULL, '42086432400025', NULL, NULL, NULL, 3, NULL, 1),
(92, 'SARL A.I.P.C. ', '18, route de Frontenay RUFFIGNY', NULL, 'LA CRECHE ', NULL, '79260', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(93, 'SARL Concept Joueur Cité Joueu', '15, rue Jean Fougerat ', NULL, 'Angouleme ', NULL, '16000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(94, 'SARL DIF Informatique', 'ZA de chez Bernard 25 route de Cognac', NULL, 'Archiac', NULL, '17520', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(95, 'SARL LE MONDE DU PC ', '16,rue G. Claude ', NULL, 'Vaux Sur Mer ', NULL, '17640', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(96, 'Satti informatique ', 'rue Augustin Fresnel ZI ', NULL, 'PERIGNY ', NULL, '17183', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(97, 'Services-emedia', '12 rue de la boulangerie ', NULL, 'Bernay Saint-Martin ', NULL, '17330', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(98, 'Simair', '17 avenue André Dublin', NULL, 'ROCHEFORT', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(99, 'SOGEMAP', '40, Rue de Marignan', NULL, 'COGNAC ', NULL, '16100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(100, 'SS2i-services', '1 rue Alexandre Fleming', NULL, 'LA ROCHELLE ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(101, 'STEF INFORMATIX ', '61, av. Lafayette ', NULL, 'ROCHEFORT ', NULL, '17300', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(102, 'Soluris', NULL, NULL, 'SAINTES ', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(103, 'SYSTEL SA', '17 Rue Leverrien', NULL, 'AYTRE', NULL, '17440', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(104, 'URANIE ', 'Zone d\'activité des docks maritimes Bat A Quai Carriet ', NULL, 'Lormont ', NULL, '33310', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(105, 'Zolux', '141 cours Paul Doumer', NULL, 'Saintes', NULL, '17100', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(106, 'Mairie Ecurat', 'route de ', NULL, 'Ecurat', NULL, '17560', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(107, 'SASU Esprit numérique', 'rue Henri Giraudeau', NULL, 'Surgères', NULL, '17700', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(108, 'Agence Wouep!', 'Pépinière d\'entreprises Indigo Allée de la Barratte', NULL, 'Surgères', NULL, '17700', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(109, 'LR Marketing', '1 rue Fleming', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(110, 'Cerealog ', '1 place Bernard Moitessier', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(111, 'Inter Mutuelles Assistance', '118 avenue de Paris', NULL, 'Niort ', NULL, '79033', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(112, 'Conservatoire du littoral', 'Corderie Royale CS 10137', NULL, 'Rochefort', NULL, '17306', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(113, 'Communauté de Communes de l\'île de Ré', '3, rue du Père Ignace', NULL, 'Saint Martin de Ré', NULL, '17410', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(114, 'Pluscom', '45 rue de la gare', NULL, 'Aytré', NULL, '17440', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(115, 'Centre hospitalier Jonzac', '4 avenue Winston Churchill ', NULL, 'Jonzac', NULL, '17503', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(116, 'Mairie de La Rochelle', 'Place de l\'hôtel de ville', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(117, 'SICA Atlantique', '69 rue Montcalm', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(118, 'A2MI', '10 rue Jean Perrin', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(119, 'Agence des territoires de la Vienne', 'Avenue René Cassin', NULL, 'Chasseneuil-du-Poitou', NULL, '86963', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(120, 'Terra Lacta', ' 2 rue de la Glacière 05 46 30 30 30', NULL, 'Surgères  ', NULL, '17700', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(121, 'AP-HP Corentin Celton', '4, parvis Corentin Celton', NULL, 'Issy-les-Moulineaux', NULL, '92130', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(122, 'Essentia', '23a rue Antoine Lavoisier', NULL, 'Aytre', NULL, '17440', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(123, 'Université de La Rochelle', '15 rue Flemming', NULL, 'La Rochelle', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(124, 'MAIF', '200 avenue Salvadore Allende', NULL, 'Niort', NULL, '79000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(125, 'Studio VA', '5 quai Auriol', NULL, 'Tonnay-Charente', NULL, '17430', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(126, 'NASKIGO', '21 Chemin du Prieuré ', NULL, ' LA ROCHELLE ', NULL, '17000', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(127, 'Eixa6 Informatique', '5 Rue Louise Michel', NULL, 'Marennes', NULL, '17320', NULL, NULL, NULL, NULL, NULL, 3, NULL, 1),
(140, 'BHI2C', '  ', '', 'SAINT-HILAIRE-DE-VILLEFRANCHE', '', '17770', '17', '48153967400012', '46.52Z', 'PME', '3 à 5 salariés', 3, '2024-05-16 00:04:51', 1),
(141, 'CATALYSE INFORMATIQUE', '21 RUE GUTENBERG', '', 'AYTRE', '', '17440', '17', '47842596000026', '47.41Z', 'PME', '3 à 5 salariés', 3, '2024-05-16 00:06:05', 1),
(142, 'START INFORMATIQUE', '163 ROUTE DE LA TURPAUDIERE', '', 'LA CHAPELLE-DES-POTS', '', '17100', '17', '45071596600021', '47.41Z', 'PME', '-', 3, '2024-05-16 00:24:30', 1),
(143, 'RE-SET INFORMATIQUE', '8 ROUTE DU GOISIL', '', 'LA COUARDE-SUR-MER', '', '17670', '17', '89121926300011', '62.02B', 'PME', '-', 3, '2024-05-16 09:07:08', 1),
(145, 'BANQUE DE FRANCE', '22 RUE REAUMUR', NULL, 'LA ROCHELLE', NULL, '17000', NULL, '57210489102555', '64.11Z', '12', '12', 3, '2024-05-18 23:06:55', 1),
(146, 'FB 17 TELECOM', '4 PLACE ALSACE LORRAINE', '', 'LA TREMBLADE', '', '17390', '17', '83212260000022', '61.90Z', 'PME', '3 à 5 salariés', 3, '2024-05-24 08:59:44', 1),
(151, 'GRAPHIWEB', '85 AVENUE DE LA GRANDE CONCHE', NULL, 'ROYAN', NULL, '17200', NULL, '52399897900018', '73.11Z', 'PME', '', 3, '2024-05-27 16:56:50', 1),
(155, 'Non défini', '85 AVENUE DE LA GRANDE CONCHE', NULL, 'ROYAN', NULL, '17200', NULL, '49234218300018', '58.19Z', 'Non défini', 'Non défini', 3, '2024-05-27 18:01:41', 1),
(156, 'SAUJON', '13 ROUTE DE SAINTES', NULL, 'SAUJON', NULL, '17600', NULL, '87922229700027', '10.71C', 'PME', '11', 3, '2024-05-27 18:02:12', 1),
(157, 'LIDL', '72 AVENUE ROBERT SCHUMAN', NULL, 'RUNGIS', NULL, '94150', NULL, '34326262218927', '47.11D', 'GE', '41', 3, '2024-05-27 18:03:14', 1),
(158, 'HAPPY CASH ROCHEFORT', ' AVENUE DES ERABLES', NULL, 'SAINTE-HERMINE', NULL, '85210', NULL, '81417059300010', '47.79Z', 'PME', 'Non défini', 3, '2024-05-29 18:54:11', 1),
(198, 'ALDI MARCHE CESTAS', '13  CRUQUE PIGNON', NULL, 'CESTAS', NULL, '33610', NULL, '40309262001321', '47.11D', 'GE', '22', 3, '2024-06-04 10:54:09', 1),
(210, 'Logan inc', '1 rue william turner, logement 01A', NULL, 'SAUJON', NULL, '17600', NULL, NULL, NULL, NULL, NULL, 3, '2024-06-04 09:04:41', 1),
(212, 'NOVATIQUE', '16 RUE DU DANEMARK', NULL, 'AURAY', NULL, '56400', NULL, '51905532100037', '62.02A', 'PME', '01', 3, '2024-06-07 22:39:16', 1),
(213, 'COMPAGNIE LEA NATURE', ' AVENUE PAUL LANGEVIN', NULL, 'PERIGNY', NULL, '17180', NULL, '49194589500010', '64.20Z', 'ETI', '11', 3, '2024-06-07 22:41:42', 1),
(214, 'CA ROCHEFORT OCEAN', '3 AVENUE MAURICE CHUPIN', NULL, 'ROCHEFORT', NULL, '17300', NULL, '20004176200010', '84.11Z', 'ETI', '32', 3, '2024-06-07 22:47:33', 1),
(215, 'TESSI TECHNOLOGIES', '1 AVENUE DES SATELLITES', NULL, 'LE HAILLAN', NULL, '33185', NULL, '38210582300092', '62.02A', '5710', '22', 3, '2024-06-10 14:32:20', 1),
(216, 'SACREE COM', '15 RUE RENOULEAU', NULL, 'TONNAY-CHARENTE', NULL, '17430', NULL, '47888482800029', '73.11Z', 'PME', 'Non défini', 3, '2024-06-07 22:49:32', 1),
(217, '6TEM&#039; INFORMATIQUE', '2 ROUTE DEPARTEMENTALE N°734', NULL, 'DOLUS-D&#039;OLERON', NULL, '17550', NULL, '44453598300019', '47.41Z', '5499', '01', 3, '2024-06-10 14:37:09', 1),
(218, 'A2I INFORMATIQUE', '86 AVENUE MARYSE BASTIE', NULL, 'L&#039;ISLE-D&#039;ESPAGNAC', NULL, '16340', NULL, '35283183800094', '62.02A', '5710', '12', 3, '2024-06-10 14:20:28', 1),
(219, 'ACT SERVICE', '18 RUE DE LA BONETTE', NULL, 'LA ROCHELLE', NULL, '17000', NULL, '33190075300038', '46.51Z', 'PME', '11', 3, '2024-06-07 22:58:35', 1),
(220, 'LYCEE POYVALENT JEAN MONNET', '66 BOULEVARD DE CHATENAY', NULL, 'COGNAC', NULL, '16100', NULL, '19160020400017', '85.31Z', 'PME', '22', 3, '2024-06-07 23:12:48', 1),
(221, 'COMMUNE DE CHATEAU LARCHER', '4 RUE DE LA MAIRIE', NULL, 'CHATEAU-LARCHER', NULL, '86370', NULL, '21860065800015', '84.11Z', '7210', '11', 3, '2024-06-07 23:54:09', 1),
(227, 'Futuroscope', 'Avenue René Monory', NULL, 'Chasseneuil-du-Poitou', NULL, '86360', NULL, '44403090200019', NULL, NULL, '11', 289, '2024-06-11 08:51:37', 0),
(228, 'Vache qui pleure', '87 bis avenu de la connerie', NULL, 'Imagination', NULL, '99888', NULL, NULL, NULL, NULL, NULL, 294, '2024-06-11 09:16:28', 0);

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
  `entite_type` varchar(50) DEFAULT NULL,
  `entite_id` int DEFAULT NULL,
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idActivite` (`idLogType`),
  KEY `idUser` (`idUser`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=370 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`id`, `idLogType`, `idUser`, `entite_type`, `entite_id`, `old_values`, `new_values`, `date`) VALUES
(366, 16, 3, 'entreprise', 98, 'null', 'null', '2024-06-11 11:25:55'),
(364, 16, 3, 'entreprise', 126, 'null', 'null', '2024-06-11 11:24:27'),
(369, 13, 3, 'profil', 315, 'null', 'null', '2024-06-11 14:43:53'),
(368, 13, 3, 'profil', 319, 'null', 'null', '2024-06-11 14:43:43');

-- --------------------------------------------------------

--
-- Structure de la table `log_type`
--

DROP TABLE IF EXISTS `log_type`;
CREATE TABLE IF NOT EXISTS `log_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf16;

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
(13, 'Suppression d\'un utilisateur', 0),
(14, 'Confirmation d\'un contact', 0),
(15, 'Suppression d\'un contact', 0),
(16, 'Confirmation d\'une entreprise', 0),
(17, 'Suppression d\'une entreprise', 0);

-- --------------------------------------------------------

--
-- Structure de la table `naf`
--

DROP TABLE IF EXISTS `naf`;
CREATE TABLE IF NOT EXISTS `naf` (
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `naf`
--

INSERT INTO `naf` (`id`, `libelle`) VALUES
('01.11Z', 'Culture de céréales (à l\'exception du riz), de légumineuses et de graines oléagineuses'),
('01.12Z', 'Culture du riz'),
('01.13Z', 'Culture de légumes, de melons, de racines et de tubercules'),
('01.14Z', 'Culture de la canne à sucre'),
('01.15Z', 'Culture du tabac'),
('01.16Z', 'Culture de plantes à fibres'),
('01.19Z', 'Autres cultures non permanentes'),
('01.21Z', 'Culture de la vigne'),
('01.22Z', 'Culture de fruits tropicaux et subtropicaux'),
('01.23Z', 'Culture d\'agrumes'),
('01.24Z', 'Culture de fruits à pépins et à noyau'),
('01.25Z', 'Culture d\'autres fruits d\'arbres ou d\'arbustes et de fruits à coque'),
('01.26Z', 'Culture de fruits oléagineux'),
('01.27Z', 'Culture de plantes à boissons'),
('01.28Z', 'Culture de plantes à épices, aromatiques, médicinales et pharmaceutiques'),
('01.29Z', 'Autres cultures permanentes'),
('01.30Z', 'Reproduction de plantes'),
('01.41Z', 'Élevage de vaches laitières'),
('01.42Z', 'Élevage d\'autres bovins et de buffles'),
('01.43Z', 'Élevage de chevaux et d\'autres équidés'),
('01.44Z', 'Élevage de chameaux et d\'autres camélidés'),
('01.45Z', 'Élevage d\'ovins et de caprins'),
('01.46Z', 'Élevage de porcins'),
('01.47Z', 'Élevage de volailles'),
('01.49Z', 'Élevage d\'autres animaux'),
('01.50Z', 'Culture et élevage associés'),
('01.61Z', 'Activités de soutien aux cultures'),
('01.62Z', 'Activités de soutien à la production animale'),
('01.63Z', 'Traitement primaire des récoltes'),
('01.64Z', 'Traitement des semences'),
('01.70Z', 'Chasse, piégeage et services annexes'),
('02.10Z', 'Sylviculture et autres activités forestières'),
('02.20Z', 'Exploitation forestière'),
('02.30Z', 'Récolte de produits forestiers non ligneux poussant à l\'état sauvage'),
('02.40Z', 'Services de soutien à l\'exploitation forestière'),
('03.11Z', 'Pêche en mer'),
('03.12Z', 'Pêche en eau douce'),
('03.21Z', 'Aquaculture en mer'),
('03.22Z', 'Aquaculture en eau douce'),
('05.10Z', 'Extraction de houille'),
('05.20Z', 'Extraction de lignite'),
('06.10Z', 'Extraction de pétrole brut'),
('06.20Z', 'Extraction de gaz naturel'),
('07.10Z', 'Extraction de minerais de fer'),
('07.21Z', 'Extraction de minerais d\'uranium et de thorium'),
('07.29Z', 'Extraction d\'autres minerais de métaux non ferreux'),
('08.11Z', 'Extraction de pierres ornementales et de construction, de calcaire industriel, de gypse, de craie et d\'ardoise'),
('08.12Z', 'Exploitation de gravières et sablières, extraction d\'argiles et de kaolin'),
('08.91Z', 'Extraction des minéraux chimiques et d\'engrais minéraux'),
('08.92Z', 'Extraction de tourbe'),
('08.93Z', 'Production de sel'),
('08.99Z', 'Autres activités extractives n.c.a.'),
('09.10Z', 'Activités de soutien à l\'extraction d\'hydrocarbures'),
('09.90Z', 'Activités de soutien aux autres industries extractives'),
('10.11Z', 'Transformation et conservation de la viande de boucherie'),
('10.12Z', 'Transformation et conservation de la viande de volaille'),
('10.13A', 'Préparation industrielle de produits à base de viande'),
('10.13B', 'Charcuterie'),
('10.20Z', 'Transformation et conservation de poisson, de crustacés et de mollusques'),
('10.31Z', 'Transformation et conservation de pommes de terre'),
('10.32Z', 'Préparation de jus de fruits et légumes'),
('10.39A', 'Autre transformation et conservation de légumes'),
('10.39B', 'Transformation et conservation de fruits'),
('10.41A', 'Fabrication d\'huiles et graisses brutes'),
('10.41B', 'Fabrication d\'huiles et graisses raffinées'),
('10.42Z', 'Fabrication de margarine et graisses comestibles similaires'),
('10.51A', 'Fabrication de lait liquide et de produits frais'),
('10.51B', 'Fabrication de beurre'),
('10.51C', 'Fabrication de fromage'),
('10.51D', 'Fabrication d\'autres produits laitiers'),
('10.52Z', 'Fabrication de glaces et sorbets'),
('10.61A', 'Meunerie'),
('10.61B', 'Autres activités du travail des grains'),
('10.62Z', 'Fabrication de produits amylacés'),
('10.71A', 'Fabrication industrielle de pain et de pâtisserie fraîche'),
('10.71B', 'Cuisson de produits de boulangerie'),
('10.71C', 'Boulangerie et boulangerie-pâtisserie'),
('10.71D', 'Pâtisserie'),
('10.72Z', 'Fabrication de biscuits, biscottes et pâtisseries de conservation'),
('10.73Z', 'Fabrication de pâtes alimentaires'),
('10.81Z', 'Fabrication de sucre'),
('10.82Z', 'Fabrication de cacao, chocolat et de produits de confiserie'),
('10.83Z', 'Transformation du thé et du café'),
('10.84Z', 'Fabrication de condiments et assaisonnements'),
('10.85Z', 'Fabrication de plats préparés'),
('10.86Z', 'Fabrication d\'aliments homogénéisés et diététiques'),
('10.89Z', 'Fabrication d\'autres produits alimentaires n.c.a.'),
('10.91Z', 'Fabrication d\'aliments pour animaux de ferme'),
('10.92Z', 'Fabrication d\'aliments pour animaux de compagnie'),
('11.01Z', 'Production de boissons alcooliques distillées'),
('11.02A', 'Fabrication de vins effervescents'),
('11.02B', 'Vinification'),
('11.03Z', 'Fabrication de cidre et de vins de fruits'),
('11.04Z', 'Production d\'autres boissons fermentées non distillées'),
('11.05Z', 'Fabrication de bière'),
('11.06Z', 'Fabrication de malt'),
('11.07A', 'Industrie des eaux de table'),
('11.07B', 'Production de boissons rafraîchissantes'),
('12.00Z', 'Fabrication de produits à base de tabac'),
('13.10Z', 'Préparation de fibres textiles et filature'),
('13.20Z', 'Tissage'),
('13.30Z', 'Ennoblissement textile'),
('13.91Z', 'Fabrication d\'étoffes à mailles'),
('13.92Z', 'Fabrication d\'articles textiles, sauf habillement'),
('13.93Z', 'Fabrication de tapis et moquettes'),
('13.94Z', 'Fabrication de ficelles, cordes et filets'),
('13.95Z', 'Fabrication de non-tissés, sauf habillement'),
('13.96Z', 'Fabrication d\'autres textiles techniques et industriels'),
('13.99Z', 'Fabrication d\'autres textiles n.c.a.'),
('14.11Z', 'Fabrication de vêtements en cuir'),
('14.12Z', 'Fabrication de vêtements de travail'),
('14.13Z', 'Fabrication de vêtements de dessus'),
('14.14Z', 'Fabrication de vêtements de dessous'),
('14.19Z', 'Fabrication d\'autres vêtements et accessoires'),
('14.20Z', 'Fabrication d\'articles en fourrure'),
('14.31Z', 'Fabrication d\'articles chaussants à mailles'),
('14.39Z', 'Fabrication d\'autres articles à mailles'),
('15.11Z', 'Apprêt et tannage des cuirs ; préparation et teinture des fourrures'),
('15.12Z', 'Fabrication d\'articles de voyage, de maroquinerie et de sellerie'),
('15.20Z', 'Fabrication de chaussures'),
('16.10A', 'Sciage et rabotage du bois, hors imprégnation'),
('16.10B', 'Imprégnation du bois'),
('16.21Z', 'Fabrication de placage et de panneaux de bois'),
('16.22Z', 'Fabrication de parquets assemblés'),
('16.23Z', 'Fabrication de charpentes et d\'autres menuiseries'),
('16.24Z', 'Fabrication d\'emballages en bois'),
('16.29Z', 'Fabrication d\'objets divers en bois ; fabrication d\'objets en liège, vannerie et sparterie'),
('17.11Z', 'Fabrication de pâte à papier'),
('17.12Z', 'Fabrication de papier et de carton'),
('17.21A', 'Fabrication de carton ondulé'),
('17.21B', 'Fabrication de cartonnages'),
('17.21C', 'Fabrication d\'emballages en papier'),
('17.22Z', 'Fabrication d\'articles en papier à usage sanitaire ou domestique'),
('17.23Z', 'Fabrication d\'articles de papeterie'),
('17.24Z', 'Fabrication de papiers peints'),
('17.29Z', 'Fabrication d\'autres articles en papier ou en carton'),
('18.11Z', 'Imprimerie de journaux'),
('18.12Z', 'Autre imprimerie (labeur)'),
('18.13Z', 'Activités de pré-presse'),
('18.14Z', 'Reliure et activités connexes'),
('18.20Z', 'Reproduction d\'enregistrements'),
('19.10Z', 'Cokéfaction'),
('19.20Z', 'Raffinage du pétrole'),
('20.11Z', 'Fabrication de gaz industriels'),
('20.12Z', 'Fabrication de colorants et de pigments'),
('20.13A', 'Enrichissement et retraitement de matières nucléaires'),
('20.13B', 'Fabrication d\'autres produits chimiques inorganiques de base n.c.a.'),
('20.14Z', 'Fabrication d\'autres produits chimiques organiques de base'),
('20.15Z', 'Fabrication de produits azotés et d\'engrais'),
('20.16Z', 'Fabrication de matières plastiques de base'),
('20.17Z', 'Fabrication de caoutchouc synthétique'),
('20.20Z', 'Fabrication de pesticides et d\'autres produits agrochimiques'),
('20.30Z', 'Fabrication de peintures, vernis, encres et mastics'),
('20.41Z', 'Fabrication de savons, détergents et produits d\'entretien'),
('20.42Z', 'Fabrication de parfums et de produits pour la toilette'),
('20.51Z', 'Fabrication de produits explosifs'),
('20.52Z', 'Fabrication de colles'),
('20.53Z', 'Fabrication d\'huiles essentielles'),
('20.59Z', 'Fabrication d\'autres produits chimiques n.c.a.'),
('20.60Z', 'Fabrication de fibres artificielles ou synthétiques'),
('21.10Z', 'Fabrication de produits pharmaceutiques de base'),
('21.20Z', 'Fabrication de préparations pharmaceutiques'),
('22.11Z', 'Fabrication et rechapage de pneumatiques'),
('22.19Z', 'Fabrication d\'autres articles en caoutchouc'),
('22.21Z', 'Fabrication de plaques, feuilles, tubes et profilés en matières plastiques'),
('22.22Z', 'Fabrication d\'emballages en matières plastiques'),
('22.23Z', 'Fabrication d\'éléments en matières plastiques pour la construction'),
('22.29A', 'Fabrication de pièces techniques à base de matières plastiques'),
('22.29B', 'Fabrication de produits de consommation courante en matières plastiques'),
('23.11Z', 'Fabrication de verre plat'),
('23.12Z', 'Façonnage et transformation du verre plat'),
('23.13Z', 'Fabrication de verre creux'),
('23.14Z', 'Fabrication de fibres de verre'),
('23.19Z', 'Fabrication et façonnage d\'autres articles en verre, y compris verre technique'),
('23.20Z', 'Fabrication de produits réfractaires'),
('23.31Z', 'Fabrication de carreaux en céramique'),
('23.32Z', 'Fabrication de briques, tuiles et produits de construction, en terre cuite'),
('23.41Z', 'Fabrication d\'articles céramiques à usage domestique ou ornemental'),
('23.42Z', 'Fabrication d\'appareils sanitaires en céramique'),
('23.43Z', 'Fabrication d\'isolateurs et pièces isolantes en céramique'),
('23.44Z', 'Fabrication d\'autres produits céramiques à usage technique'),
('23.49Z', 'Fabrication d\'autres produits céramiques'),
('23.51Z', 'Fabrication de ciment'),
('23.52Z', 'Fabrication de chaux et plâtre'),
('23.61Z', 'Fabrication d\'éléments en béton pour la construction'),
('23.62Z', 'Fabrication d\'éléments en plâtre pour la construction'),
('23.63Z', 'Fabrication de béton prêt à l\'emploi'),
('23.64Z', 'Fabrication de mortiers et bétons secs'),
('23.65Z', 'Fabrication d\'ouvrages en fibre-ciment'),
('23.69Z', 'Fabrication d\'autres ouvrages en béton, en ciment ou en plâtre'),
('23.70Z', 'Taille, façonnage et finissage de pierres'),
('23.91Z', 'Fabrication de produits abrasifs'),
('23.99Z', 'Fabrication d\'autres produits minéraux non métalliques n.c.a.'),
('24.10Z', 'Sidérurgie'),
('24.20Z', 'Fabrication de tubes, tuyaux, profilés creux et accessoires correspondants en acier'),
('24.31Z', 'Étirage à froid de barres'),
('24.32Z', 'Laminage à froid de feuillards'),
('24.33Z', 'Profilage à froid par formage ou pliage'),
('24.34Z', 'Tréfilage à froid'),
('24.41Z', 'Production de métaux précieux'),
('24.42Z', 'Métallurgie de l\'aluminium'),
('24.43Z', 'Métallurgie du plomb, du zinc ou de l\'étain'),
('24.44Z', 'Métallurgie du cuivre'),
('24.45Z', 'Métallurgie des autres métaux non ferreux'),
('24.46Z', 'Élaboration et transformation de matières nucléaires'),
('24.51Z', 'Fonderie de fonte'),
('24.52Z', 'Fonderie d\'acier'),
('24.53Z', 'Fonderie de métaux légers'),
('24.54Z', 'Fonderie d\'autres métaux non ferreux'),
('25.11Z', 'Fabrication de structures métalliques et de parties de structures'),
('25.12Z', 'Fabrication de portes et fenêtres en métal'),
('25.21Z', 'Fabrication de radiateurs et de chaudières pour le chauffage central'),
('25.29Z', 'Fabrication d\'autres réservoirs, citernes et conteneurs métalliques'),
('25.30Z', 'Fabrication de générateurs de vapeur, à l\'exception des chaudières pour le chauffage central'),
('25.40Z', 'Fabrication d\'armes et de munitions'),
('25.50A', 'Forge, estampage, matriçage ; métallurgie des poudres'),
('25.50B', 'Découpage, emboutissage'),
('25.61Z', 'Traitement et revêtement des métaux'),
('25.62A', 'Décolletage'),
('25.62B', 'Mécanique industrielle'),
('25.71Z', 'Fabrication de coutellerie'),
('25.72Z', 'Fabrication de serrures et de ferrures'),
('25.73A', 'Fabrication de moules et modèles'),
('25.73B', 'Fabrication d\'autres outillages'),
('25.91Z', 'Fabrication de fûts et emballages métalliques similaires'),
('25.92Z', 'Fabrication d\'emballages métalliques légers'),
('25.93Z', 'Fabrication d\'articles en fils métalliques, de chaînes et de ressorts'),
('25.94Z', 'Fabrication de vis et de boulons'),
('25.99A', 'Fabrication d\'articles métalliques ménagers'),
('25.99B', 'Fabrication d\'autres articles métalliques'),
('26.11Z', 'Fabrication de composants électroniques'),
('26.12Z', 'Fabrication de cartes électroniques assemblées'),
('26.20Z', 'Fabrication d\'ordinateurs et d\'équipements périphériques'),
('26.30Z', 'Fabrication d\'équipements de communication'),
('26.40Z', 'Fabrication de produits électroniques grand public'),
('26.51A', 'Fabrication d\'équipements d\'aide à la navigation'),
('26.51B', 'Fabrication d\'instrumentation scientifique et technique'),
('26.52Z', 'Horlogerie'),
('26.60Z', 'Fabrication d\'équipements d\'irradiation médicale, d\'équipements électromédicaux et électrothérapeutiques'),
('26.70Z', 'Fabrication de matériels optique et photographique'),
('26.80Z', 'Fabrication de supports magnétiques et optiques'),
('27.11Z', 'Fabrication de moteurs, génératrices et transformateurs électriques'),
('27.12Z', 'Fabrication de matériel de distribution et de commande électrique'),
('27.20Z', 'Fabrication de piles et d\'accumulateurs électriques'),
('27.31Z', 'Fabrication de câbles de fibres optiques'),
('27.32Z', 'Fabrication d\'autres fils et câbles électroniques ou électriques'),
('27.33Z', 'Fabrication de matériel d\'installation électrique'),
('27.40Z', 'Fabrication d\'appareils d\'éclairage électrique'),
('27.51Z', 'Fabrication d\'appareils électroménagers'),
('27.52Z', 'Fabrication d\'appareils ménagers non électriques'),
('27.90Z', 'Fabrication d\'autres matériels électriques'),
('28.11Z', 'Fabrication de moteurs et turbines, à l\'exception des moteurs d\'avions et de véhicules'),
('28.12Z', 'Fabrication d\'équipements hydrauliques et pneumatiques'),
('28.13Z', 'Fabrication d\'autres pompes et compresseurs'),
('28.14Z', 'Fabrication d\'autres articles de robinetterie'),
('28.15Z', 'Fabrication d\'engrenages et d\'organes mécaniques de transmission'),
('28.21Z', 'Fabrication de fours et brûleurs'),
('28.22Z', 'Fabrication de matériel de levage et de manutention'),
('28.23Z', 'Fabrication de machines et d\'équipements de bureau (à l\'exception des ordinateurs et équipements périphériques)'),
('28.24Z', 'Fabrication d\'outillage portatif à moteur incorporé'),
('28.25Z', 'Fabrication d\'équipements aérauliques et frigorifiques industriels'),
('28.29A', 'Fabrication d\'équipements d\'emballage, de conditionnement et de pesage'),
('28.29B', 'Fabrication d\'autres machines d\'usage général'),
('28.30Z', 'Fabrication de machines agricoles et forestières'),
('28.41Z', 'Fabrication de machines-outils pour le travail des métaux'),
('28.49Z', 'Fabrication d\'autres machines-outils'),
('28.91Z', 'Fabrication de machines pour la métallurgie'),
('28.92Z', 'Fabrication de machines pour l\'extraction ou la construction'),
('28.93Z', 'Fabrication de machines pour l\'industrie agro-alimentaire'),
('28.94Z', 'Fabrication de machines pour les industries textiles'),
('28.95Z', 'Fabrication de machines pour les industries du papier et du carton'),
('28.96Z', 'Fabrication de machines pour le travail du caoutchouc ou des plastiques'),
('28.99A', 'Fabrication de machines d\'imprimerie'),
('28.99B', 'Fabrication d\'autres machines spécialisées'),
('29.10Z', 'Construction de véhicules automobiles'),
('29.20Z', 'Fabrication de carrosseries et remorques'),
('29.31Z', 'Fabrication d\'équipements électriques et électroniques automobiles'),
('29.32Z', 'Fabrication d\'autres équipements automobiles'),
('30.11Z', 'Construction de navires et de structures flottantes'),
('30.12Z', 'Construction de bateaux de plaisance'),
('30.20Z', 'Construction de locomotives et d\'autre matériel ferroviaire roulant'),
('30.30Z', 'Construction aéronautique et spatiale'),
('30.40Z', 'Construction de véhicules militaires de combat'),
('30.91Z', 'Fabrication de motocycles'),
('30.92Z', 'Fabrication de bicyclettes et de véhicules pour invalides'),
('30.99Z', 'Fabrication d\'autres équipements de transport n.c.a.'),
('31.01Z', 'Fabrication de meubles de bureau et de magasin'),
('31.02Z', 'Fabrication de meubles de cuisine'),
('31.03Z', 'Fabrication de matelas'),
('31.09A', 'Fabrication de sièges d\'ameublement d\'intérieur'),
('31.09B', 'Fabrication d\'autres meubles et industries connexes de l\'ameublement'),
('32.11Z', 'Frappe de monnaie'),
('32.12Z', 'Fabrication d\'articles de joaillerie et bijouterie'),
('32.13Z', 'Fabrication d\'articles de bijouterie fantaisie et articles similaires'),
('32.20Z', 'Fabrication d\'instruments de musique'),
('32.30Z', 'Fabrication d\'articles de sport'),
('32.40Z', 'Fabrication de jeux et jouets'),
('32.50A', 'Fabrication de matériel médico-chirurgical et dentaire'),
('32.50B', 'Fabrication de lunettes'),
('32.91Z', 'Fabrication d\'articles de brosserie'),
('32.99Z', 'Autres activités manufacturières n.c.a.'),
('33.11Z', 'Réparation d\'ouvrages en métaux'),
('33.12Z', 'Réparation de machines et équipements mécaniques'),
('33.13Z', 'Réparation de matériels électroniques et optiques'),
('33.14Z', 'Réparation d\'équipements électriques'),
('33.15Z', 'Réparation et maintenance navale'),
('33.16Z', 'Réparation et maintenance d\'aéronefs et d\'engins spatiaux'),
('33.17Z', 'Réparation et maintenance d\'autres équipements de transport'),
('33.19Z', 'Réparation d\'autres équipements'),
('33.20A', 'Installation de structures métalliques, chaudronnées et de tuyauterie'),
('33.20B', 'Installation de machines et équipements mécaniques'),
('33.20C', 'Conception d\'ensemble et assemblage sur site industriel d\'équipements de contrôle des processus industriels'),
('33.20D', 'Installation d\'équipements électriques, de matériels électroniques et optiques ou d\'autres matériels'),
('35.11Z', 'Production d\'électricité'),
('35.12Z', 'Transport d\'électricité'),
('35.13Z', 'Distribution d\'électricité'),
('35.14Z', 'Commerce d\'électricité'),
('35.21Z', 'Production de combustibles gazeux'),
('35.22Z', 'Distribution de combustibles gazeux par conduites'),
('35.23Z', 'Commerce de combustibles gazeux par conduites'),
('35.30Z', 'Production et distribution de vapeur et d\'air conditionné'),
('36.00Z', 'Captage, traitement et distribution d\'eau'),
('37.00Z', 'Collecte et traitement des eaux usées'),
('38.11Z', 'Collecte des déchets non dangereux'),
('38.12Z', 'Collecte des déchets dangereux'),
('38.21Z', 'Traitement et élimination des déchets non dangereux'),
('38.22Z', 'Traitement et élimination des déchets dangereux'),
('38.31Z', 'Démantèlement d\'épaves'),
('38.32Z', 'Récupération de déchets triés'),
('39.00Z', 'Dépollution et autres services de gestion des déchets'),
('41.10A', 'Promotion immobilière de logements'),
('41.10B', 'Promotion immobilière de bureaux'),
('41.10C', 'Promotion immobilière d\'autres bâtiments'),
('41.10D', 'Supports juridiques de programmes'),
('41.20A', 'Construction de maisons individuelles'),
('41.20B', 'Construction d\'autres bâtiments'),
('42.11Z', 'Construction de routes et autoroutes'),
('42.12Z', 'Construction de voies ferrées de surface et souterraines'),
('42.13A', 'Construction d\'ouvrages d\'art'),
('42.13B', 'Construction et entretien de tunnels'),
('42.21Z', 'Construction de réseaux pour fluides'),
('42.22Z', 'Construction de réseaux électriques et de télécommunications'),
('42.91Z', 'Construction d\'ouvrages maritimes et fluviaux'),
('42.99Z', 'Construction d\'autres ouvrages de génie civil n.c.a.'),
('43.11Z', 'Travaux de démolition'),
('43.12A', 'Travaux de terrassement courants et travaux préparatoires'),
('43.12B', 'Travaux de terrassement spécialisés ou de grande masse'),
('43.13Z', 'Forages et sondages'),
('43.21A', 'Travaux d\'installation électrique dans tous locaux'),
('43.21B', 'Travaux d\'installation électrique sur la voie publique'),
('43.22A', 'Travaux d\'installation d\'eau et de gaz en tous locaux'),
('43.22B', 'Travaux d\'installation d\'équipements thermiques et de climatisation'),
('43.29A', 'Travaux d\'isolation'),
('43.29B', 'Autres travaux d\'installation n.c.a.'),
('43.31Z', 'Travaux de plâtrerie'),
('43.32A', 'Travaux de menuiserie bois et PVC'),
('43.32B', 'Travaux de menuiserie métallique et serrurerie'),
('43.32C', 'Agencement de lieux de vente'),
('43.33Z', 'Travaux de revêtement des sols et des murs'),
('43.34Z', 'Travaux de peinture et vitrerie'),
('43.39Z', 'Autres travaux de finition'),
('43.91A', 'Travaux de charpente'),
('43.91B', 'Travaux de couverture par éléments'),
('43.99A', 'Travaux d\'étanchéification'),
('43.99B', 'Travaux de montage de structures métalliques'),
('43.99C', 'Travaux de maçonnerie générale et gros œuvre de bâtiment'),
('43.99D', 'Autres travaux spécialisés de construction'),
('43.99E', 'Location avec opérateur de matériel de construction'),
('45.11Z', 'Commerce de voitures et de véhicules automobiles légers'),
('45.19Z', 'Commerce d\'autres véhicules automobiles'),
('45.20A', 'Entretien et réparation de véhicules automobiles légers'),
('45.20B', 'Entretien et réparation d\'autres véhicules automobiles'),
('45.31Z', 'Commerce de gros d\'équipements automobiles'),
('45.32Z', 'Commerce de détail d\'équipements automobiles'),
('45.40Z', 'Commerce et réparation de motocycles'),
('46.11Z', 'Intermédiaires du commerce en matières premières agricoles, animaux vivants, matières premières textiles et produits semi-finis'),
('46.12A', 'Centrales d\'achat de carburant'),
('46.12B', 'Autres intermédiaires du commerce en combustibles, métaux, minéraux et produits chimiques'),
('46.13Z', 'Intermédiaires du commerce en bois et matériaux de construction'),
('46.14Z', 'Intermédiaires du commerce en machines, équipements industriels, navires et avions'),
('46.15Z', 'Intermédiaires du commerce en meubles, articles de ménage et quincaillerie'),
('46.16Z', 'Intermédiaires du commerce en textiles, habillement, fourrures, chaussures et articles en cuir'),
('46.17A', 'Centrales d\'achat alimentaires'),
('46.17B', 'Autres intermédiaires du commerce en denrées, boissons et tabac'),
('46.18Z', 'Intermédiaires spécialisés dans le commerce d\'autres produits spécifiques'),
('46.19A', 'Centrales d\'achat non alimentaires'),
('46.19B', 'Autres intermédiaires du commerce en produits divers'),
('46.21Z', 'Commerce de gros (commerce interentreprises) de céréales, de tabac non manufacturé, de semences et d\'aliments pour le bétail'),
('46.22Z', 'Commerce de gros (commerce interentreprises) de fleurs et plantes'),
('46.23Z', 'Commerce de gros (commerce interentreprises) d\'animaux vivants'),
('46.24Z', 'Commerce de gros (commerce interentreprises) de cuirs et peaux'),
('46.31Z', 'Commerce de gros (commerce interentreprises) de fruits et légumes'),
('46.32A', 'Commerce de gros (commerce interentreprises) de viandes de boucherie'),
('46.32B', 'Commerce de gros (commerce interentreprises) de produits à base de viande'),
('46.32C', 'Commerce de gros (commerce interentreprises) de volailles et gibier'),
('46.33Z', 'Commerce de gros (commerce interentreprises) de produits laitiers, œufs, huiles et matières grasses comestibles'),
('46.34Z', 'Commerce de gros (commerce interentreprises) de boissons'),
('46.35Z', 'Commerce de gros (commerce interentreprises) de produits à base de tabac'),
('46.36Z', 'Commerce de gros (commerce interentreprises) de sucre, chocolat et confiserie'),
('46.37Z', 'Commerce de gros (commerce interentreprises) de café, thé, cacao et épices'),
('46.38A', 'Commerce de gros (commerce interentreprises) de poissons, crustacés et mollusques'),
('46.38B', 'Commerce de gros (commerce interentreprises) alimentaire spécialisé divers'),
('46.39A', 'Commerce de gros (commerce interentreprises) de produits surgelés'),
('46.39B', 'Commerce de gros (commerce interentreprises) alimentaire non spécialisé'),
('46.41Z', 'Commerce de gros (commerce interentreprises) de textiles'),
('46.42Z', 'Commerce de gros (commerce interentreprises) d\'habillement et de chaussures'),
('46.43Z', 'Commerce de gros (commerce interentreprises) d\'appareils électroménagers'),
('46.44Z', 'Commerce de gros (commerce interentreprises) de vaisselle, verrerie et produits d\'entretien'),
('46.45Z', 'Commerce de gros (commerce interentreprises) de parfumerie et de produits de beauté'),
('46.46Z', 'Commerce de gros (commerce interentreprises) de produits pharmaceutiques'),
('46.47Z', 'Commerce de gros (commerce interentreprises) de meubles, de tapis et d\'appareils d\'éclairage'),
('46.48Z', 'Commerce de gros (commerce interentreprises) d\'articles d\'horlogerie et de bijouterie'),
('46.49Z', 'Commerce de gros (commerce interentreprises) d\'autres biens domestiques'),
('46.51Z', 'Commerce de gros (commerce interentreprises) d\'ordinateurs, d\'équipements informatiques périphériques et de logiciels'),
('46.52Z', 'Commerce de gros (commerce interentreprises) de composants et d\'équipements électroniques et de télécommunication'),
('46.61Z', 'Commerce de gros (commerce interentreprises) de matériel agricole'),
('46.62Z', 'Commerce de gros (commerce interentreprises) de machines-outils'),
('46.63Z', 'Commerce de gros (commerce interentreprises) de machines pour l\'extraction, la construction et le génie civil'),
('46.64Z', 'Commerce de gros (commerce interentreprises) de machines pour l\'industrie textile et l\'habillement'),
('46.65Z', 'Commerce de gros (commerce interentreprises) de mobilier de bureau'),
('46.66Z', 'Commerce de gros (commerce interentreprises) d\'autres machines et équipements de bureau'),
('46.69A', 'Commerce de gros (commerce interentreprises) de matériel électrique'),
('46.69B', 'Commerce de gros (commerce interentreprises) de fournitures et équipements industriels divers'),
('46.69C', 'Commerce de gros (commerce interentreprises) de fournitures et équipements divers pour le commerce et les services'),
('46.71Z', 'Commerce de gros (commerce interentreprises) de combustibles et de produits annexes'),
('46.72Z', 'Commerce de gros (commerce interentreprises) de minerais et métaux'),
('46.73A', 'Commerce de gros (commerce interentreprises) de bois et de matériaux de construction'),
('46.73B', 'Commerce de gros (commerce interentreprises) d\'appareils sanitaires et de produits de décoration'),
('46.74A', 'Commerce de gros (commerce interentreprises) de quincaillerie'),
('46.74B', 'Commerce de gros (commerce interentreprises) de fournitures pour la plomberie et le chauffage'),
('46.75Z', 'Commerce de gros (commerce interentreprises) de produits chimiques'),
('46.76Z', 'Commerce de gros (commerce interentreprises) d\'autres produits intermédiaires'),
('46.77Z', 'Commerce de gros (commerce interentreprises) de déchets et débris'),
('46.90Z', 'Commerce de gros (commerce interentreprises) non spécialisé'),
('47.11A', 'Commerce de détail de produits surgelés'),
('47.11B', 'Commerce d\'alimentation générale'),
('47.11C', 'Supérettes'),
('47.11D', 'Supermarchés'),
('47.11E', 'Magasins multi-commerces'),
('47.11F', 'Hypermarchés'),
('47.19A', 'Grands magasins'),
('47.19B', 'Autres commerces de détail en magasin non spécialisé'),
('47.21Z', 'Commerce de détail de fruits et légumes en magasin spécialisé'),
('47.22Z', 'Commerce de détail de viandes et de produits à base de viande en magasin spécialisé'),
('47.23Z', 'Commerce de détail de poissons, crustacés et mollusques en magasin spécialisé'),
('47.24Z', 'Commerce de détail de pain, pâtisserie et confiserie en magasin spécialisé'),
('47.25Z', 'Commerce de détail de boissons en magasin spécialisé'),
('47.26Z', 'Commerce de détail de produits à base de tabac en magasin spécialisé'),
('47.29Z', 'Autres commerces de détail alimentaires en magasin spécialisé'),
('47.30Z', 'Commerce de détail de carburants en magasin spécialisé'),
('47.41Z', 'Commerce de détail d\'ordinateurs, d\'unités périphériques et de logiciels en magasin spécialisé'),
('47.42Z', 'Commerce de détail de matériels de télécommunication en magasin spécialisé'),
('47.43Z', 'Commerce de détail de matériels audio et vidéo en magasin spécialisé'),
('47.51Z', 'Commerce de détail de textiles en magasin spécialisé'),
('47.52A', 'Commerce de détail de quincaillerie, peintures et verres en petites surfaces (moins de 400 m²)'),
('47.52B', 'Commerce de détail de quincaillerie, peintures et verres en grandes surfaces (400 m² et plus)'),
('47.53Z', 'Commerce de détail de tapis, moquettes et revêtements de murs et de sols en magasin spécialisé'),
('47.54Z', 'Commerce de détail d\'appareils électroménagers en magasin spécialisé'),
('47.59A', 'Commerce de détail de meubles'),
('47.59B', 'Commerce de détail d\'autres équipements du foyer'),
('47.61Z', 'Commerce de détail de livres en magasin spécialisé'),
('47.62Z', 'Commerce de détail de journaux et papeterie en magasin spécialisé'),
('47.63Z', 'Commerce de détail d\'enregistrements musicaux et vidéo en magasin spécialisé'),
('47.64Z', 'Commerce de détail d\'articles de sport en magasin spécialisé'),
('47.65Z', 'Commerce de détail de jeux et jouets en magasin spécialisé'),
('47.71Z', 'Commerce de détail d\'habillement en magasin spécialisé'),
('47.72A', 'Commerce de détail de la chaussure'),
('47.72B', 'Commerce de détail de maroquinerie et d\'articles de voyage'),
('47.73Z', 'Commerce de détail de produits pharmaceutiques en magasin spécialisé'),
('47.74Z', 'Commerce de détail d\'articles médicaux et orthopédiques en magasin spécialisé'),
('47.75Z', 'Commerce de détail de parfumerie et de produits de beauté en magasin spécialisé'),
('47.76Z', 'Commerce de détail de fleurs, plantes, graines, engrais, animaux de compagnie et aliments pour ces animaux en magasin spécialisé'),
('47.77Z', 'Commerce de détail d\'articles d\'horlogerie et de bijouterie en magasin spécialisé'),
('47.78A', 'Commerces de détail d\'optique'),
('47.78B', 'Commerces de détail de charbons et combustibles'),
('47.78C', 'Autres commerces de détail spécialisés divers'),
('47.79Z', 'Commerce de détail de biens d\'occasion en magasin'),
('47.81Z', 'Commerce de détail alimentaire sur éventaires et marchés'),
('47.82Z', 'Commerce de détail de textiles, d\'habillement et de chaussures sur éventaires et marchés'),
('47.89Z', 'Autres commerces de détail sur éventaires et marchés'),
('47.91A', 'Vente à distance sur catalogue général'),
('47.91B', 'Vente à distance sur catalogue spécialisé'),
('47.99A', 'Vente à domicile'),
('47.99B', 'Vente par automates et autres commerces de détail hors magasin, éventaires ou marchés n.c.a.'),
('49.10Z', 'Transport ferroviaire interurbain de voyageurs'),
('49.20Z', 'Transports ferroviaires de fret'),
('49.31Z', 'Transports urbains et suburbains de voyageurs'),
('49.32Z', 'Transports de voyageurs par taxis'),
('49.39A', 'Transports routiers réguliers de voyageurs'),
('49.39B', 'Autres transports routiers de voyageurs'),
('49.39C', 'Téléphériques et remontées mécaniques'),
('49.41A', 'Transports routiers de fret interurbains'),
('49.41B', 'Transports routiers de fret de proximité'),
('49.41C', 'Location de camions avec chauffeur'),
('49.42Z', 'Services de déménagement'),
('49.50Z', 'Transports par conduites'),
('50.10Z', 'Transports maritimes et côtiers de passagers'),
('50.20Z', 'Transports maritimes et côtiers de fret'),
('50.30Z', 'Transports fluviaux de passagers'),
('50.40Z', 'Transports fluviaux de fret'),
('51.10Z', 'Transports aériens de passagers'),
('51.21Z', 'Transports aériens de fret'),
('51.22Z', 'Transports spatiaux'),
('52.10A', 'Entreposage et stockage frigorifique'),
('52.10B', 'Entreposage et stockage non frigorifique'),
('52.21Z', 'Services auxiliaires des transports terrestres'),
('52.22Z', 'Services auxiliaires des transports par eau'),
('52.23Z', 'Services auxiliaires des transports aériens'),
('52.24A', 'Manutention portuaire'),
('52.24B', 'Manutention non portuaire'),
('52.29A', 'Messagerie, fret express'),
('52.29B', 'Affrètement et organisation des transports'),
('53.10Z', 'Activités de poste dans le cadre d\'une obligation de service universel'),
('53.20Z', 'Autres activités de poste et de courrier'),
('55.10Z', 'Hôtels et hébergement similaire'),
('55.20Z', 'Hébergement touristique et autre hébergement de courte durée'),
('55.30Z', 'Terrains de camping et parcs pour caravanes ou véhicules de loisirs'),
('55.90Z', 'Autres hébergements'),
('56.10A', 'Restauration traditionnelle'),
('56.10B', 'Cafétérias et autres libres-services'),
('56.10C', 'Restauration de type rapide'),
('56.21Z', 'Services des traiteurs'),
('56.29A', 'Restauration collective sous contrat'),
('56.29B', 'Autres services de restauration n.c.a.'),
('56.30Z', 'Débits de boissons'),
('58.11Z', 'Édition de livres'),
('58.12Z', 'Édition de répertoires et de fichiers d\'adresses'),
('58.13Z', 'Édition de journaux'),
('58.14Z', 'Édition de revues et périodiques'),
('58.19Z', 'Autres activités d\'édition'),
('58.21Z', 'Édition de jeux électroniques'),
('58.29A', 'Édition de logiciels système et de réseau'),
('58.29B', 'Édition de logiciels outils de développement et de langages'),
('58.29C', 'Édition de logiciels applicatifs'),
('59.11A', 'Production de films et de programmes pour la télévision'),
('59.11B', 'Production de films institutionnels et publicitaires'),
('59.11C', 'Production de films pour le cinéma'),
('59.12Z', 'Post-production de films cinématographiques, de vidéo et de programmes de télévision'),
('59.13A', 'Distribution de films cinématographiques'),
('59.13B', 'Édition et distribution vidéo'),
('59.14Z', 'Projection de films cinématographiques'),
('59.20Z', 'Enregistrement sonore et édition musicale'),
('60.10Z', 'Édition et diffusion de programmes radio'),
('60.20A', 'Édition de chaînes généralistes'),
('60.20B', 'Édition de chaînes thématiques'),
('61.10Z', 'Télécommunications filaires'),
('61.20Z', 'Télécommunications sans fil'),
('61.30Z', 'Télécommunications par satellite'),
('61.90Z', 'Autres activités de télécommunication'),
('62.01Z', 'Programmation informatique'),
('62.02A', 'Conseil en systèmes et logiciels informatiques'),
('62.02B', 'Tierce maintenance de systèmes et d\'applications informatiques'),
('62.03Z', 'Gestion d\'installations informatiques'),
('62.09Z', 'Autres activités informatiques'),
('63.11Z', 'Traitement de données, hébergement et activités connexes'),
('63.12Z', 'Portails Internet'),
('63.91Z', 'Activités des agences de presse'),
('63.99Z', 'Autres services d\'information n.c.a.'),
('64.11Z', 'Activités de banque centrale'),
('64.19Z', 'Autres intermédiations monétaires'),
('64.20Z', 'Activités des sociétés holding'),
('64.30Z', 'Fonds de placement et entités financières similaires'),
('64.91Z', 'Crédit-bail'),
('64.92Z', 'Autre distribution de crédit'),
('64.99Z', 'Autres activités des services financiers, hors assurance et caisses de retraite, n.c.a.'),
('65.11Z', 'Assurance vie'),
('65.12Z', 'Autres assurances'),
('65.20Z', 'Réassurance'),
('65.30Z', 'Caisses de retraite'),
('66.11Z', 'Administration de marchés financiers'),
('66.12Z', 'Courtage de valeurs mobilières et de marchandises'),
('66.19A', 'Supports juridiques de gestion de patrimoine mobilier'),
('66.19B', 'Autres activités auxiliaires de services financiers, hors assurance et caisses de retraite, n.c.a.'),
('66.21Z', 'Évaluation des risques et dommages'),
('66.22Z', 'Activités des agents et courtiers d\'assurances'),
('66.29Z', 'Autres activités auxiliaires d\'assurance et de caisses de retraite'),
('66.30Z', 'Gestion de fonds'),
('68.10Z', 'Activités des marchands de biens immobiliers'),
('68.20A', 'Location de logements'),
('68.20B', 'Location de terrains et d\'autres biens immobiliers'),
('68.31Z', 'Agences immobilières'),
('68.32A', 'Administration d\'immeubles et autres biens immobiliers'),
('68.32B', 'Supports juridiques de gestion de patrimoine immobilier'),
('69.10Z', 'Activités juridiques'),
('69.20Z', 'Activités comptables'),
('70.10Z', 'Activités des sièges sociaux'),
('70.21Z', 'Conseil en relations publiques et communication'),
('70.22Z', 'Conseil pour les affaires et autres conseils de gestion'),
('71.11Z', 'Activités d\'architecture'),
('71.12A', 'Activité des géomètres'),
('71.12B', 'Ingénierie, études techniques'),
('71.20A', 'Contrôle technique automobile'),
('71.20B', 'Analyses, essais et inspections techniques'),
('72.11Z', 'Recherche-développement en biotechnologie'),
('72.19Z', 'Recherche-développement en autres sciences physiques et naturelles'),
('72.20Z', 'Recherche-développement en sciences humaines et sociales'),
('73.11Z', 'Activités des agences de publicité'),
('73.12Z', 'Régie publicitaire de médias'),
('73.20Z', 'Études de marché et sondages'),
('74.10Z', 'Activités spécialisées de design'),
('74.20Z', 'Activités photographiques'),
('74.30Z', 'Traduction et interprétation'),
('74.90A', 'Activité des économistes de la construction'),
('74.90B', 'Activités spécialisées, scientifiques et techniques diverses'),
('75.00Z', 'Activités vétérinaires'),
('77.11A', 'Location de courte durée de voitures et de véhicules automobiles légers'),
('77.11B', 'Location de longue durée de voitures et de véhicules automobiles légers'),
('77.12Z', 'Location et location-bail de camions'),
('77.21Z', 'Location et location-bail d\'articles de loisirs et de sport'),
('77.22Z', 'Location de vidéocassettes et disques vidéo'),
('77.29Z', 'Location et location-bail d\'autres biens personnels et domestiques'),
('77.31Z', 'Location et location-bail de machines et équipements agricoles'),
('77.32Z', 'Location et location-bail de machines et équipements pour la construction'),
('77.33Z', 'Location et location-bail de machines de bureau et de matériel informatique'),
('77.34Z', 'Location et location-bail de matériels de transport par eau'),
('77.35Z', 'Location et location-bail de matériels de transport aérien'),
('77.39Z', 'Location et location-bail d\'autres machines, équipements et biens matériels n.c.a.'),
('77.40Z', 'Location-bail de propriété intellectuelle et de produits similaires, à l\'exception des œuvres soumises à copyright'),
('78.10Z', 'Activités des agences de placement de main-d\'œuvre'),
('78.20Z', 'Activités des agences de travail temporaire'),
('78.30Z', 'Autre mise à disposition de ressources humaines'),
('79.11Z', 'Activités des agences de voyage'),
('79.12Z', 'Activités des voyagistes'),
('79.90Z', 'Autres services de réservation et activités connexes'),
('80.10Z', 'Activités de sécurité privée'),
('80.20Z', 'Activités liées aux systèmes de sécurité'),
('80.30Z', 'Activités d\'enquête'),
('81.10Z', 'Activités combinées de soutien lié aux bâtiments'),
('81.21Z', 'Nettoyage courant des bâtiments'),
('81.22Z', 'Autres activités de nettoyage des bâtiments et nettoyage industriel'),
('81.29A', 'Désinfection, désinsectisation, dératisation'),
('81.29B', 'Autres activités de nettoyage n.c.a.'),
('81.30Z', 'Services d\'aménagement paysager'),
('82.11Z', 'Services administratifs combinés de bureau'),
('82.19Z', 'Photocopie, préparation de documents et autres activités spécialisées de soutien de bureau'),
('82.20Z', 'Activités de centres d\'appels'),
('82.30Z', 'Organisation de foires, salons professionnels et congrès'),
('82.91Z', 'Activités des agences de recouvrement de factures et des sociétés d\'information financière sur la clientèle'),
('82.92Z', 'Activités de conditionnement'),
('82.99Z', 'Autres activités de soutien aux entreprises n.c.a.'),
('84.11Z', 'Administration publique générale'),
('84.12Z', 'Administration publique (tutelle) de la santé, de la formation, de la culture et des services sociaux, autre que sécurité sociale'),
('84.13Z', 'Administration publique (tutelle) des activités économiques'),
('84.21Z', 'Affaires étrangères'),
('84.22Z', 'Défense'),
('84.23Z', 'Justice'),
('84.24Z', 'Activités d\'ordre public et de sécurité'),
('84.25Z', 'Services du feu et de secours'),
('84.30A', 'Activités générales de sécurité sociale'),
('84.30B', 'Gestion des retraites complémentaires'),
('84.30C', 'Distribution sociale de revenus'),
('85.10Z', 'Enseignement pré-primaire'),
('85.20Z', 'Enseignement primaire'),
('85.31Z', 'Enseignement secondaire général'),
('85.32Z', 'Enseignement secondaire technique ou professionnel'),
('85.41Z', 'Enseignement post-secondaire non supérieur'),
('85.42Z', 'Enseignement supérieur'),
('85.51Z', 'Enseignement de disciplines sportives et d\'activités de loisirs'),
('85.52Z', 'Enseignement culturel'),
('85.53Z', 'Enseignement de la conduite'),
('85.59A', 'Formation continue d\'adultes'),
('85.59B', 'Autres enseignements'),
('85.60Z', 'Activités de soutien à l\'enseignement'),
('86.10Z', 'Activités hospitalières'),
('86.21Z', 'Activité des médecins généralistes'),
('86.22A', 'Activités de radiodiagnostic et de radiothérapie'),
('86.22B', 'Activités chirurgicales'),
('86.22C', 'Autres activités des médecins spécialistes'),
('86.23Z', 'Pratique dentaire'),
('86.90A', 'Ambulances'),
('86.90B', 'Laboratoires d\'analyses médicales'),
('86.90C', 'Centres de collecte et banques d\'organes'),
('86.90D', 'Activités des infirmiers et des sages-femmes'),
('86.90E', 'Activités des professionnels de la rééducation, de l\'appareillage et des pédicures-podologues'),
('86.90F', 'Activités de santé humaine non classées ailleurs'),
('87.10A', 'Hébergement médicalisé pour personnes âgées'),
('87.10B', 'Hébergement médicalisé pour enfants handicapés'),
('87.10C', 'Hébergement médicalisé pour adultes handicapés et autre hébergement médicalisé'),
('87.20A', 'Hébergement social pour handicapés mentaux et malades mentaux'),
('87.20B', 'Hébergement social pour toxicomanes'),
('87.30A', 'Hébergement social pour personnes âgées'),
('87.30B', 'Hébergement social pour handicapés physiques'),
('87.90A', 'Hébergement social pour enfants en difficultés'),
('87.90B', 'Hébergement social pour adultes et familles en difficultés et autre hébergement social'),
('88.10A', 'Aide à domicile'),
('88.10B', 'Accueil ou accompagnement sans hébergement d\'adultes handicapés ou de personnes âgées'),
('88.10C', 'Aide par le travail'),
('88.91A', 'Accueil de jeunes enfants'),
('88.91B', 'Accueil ou accompagnement sans hébergement d\'enfants handicapés'),
('88.99A', 'Autre accueil ou accompagnement sans hébergement d\'enfants et d\'adolescents'),
('88.99B', 'Action sociale sans hébergement n.c.a.'),
('90.01Z', 'Arts du spectacle vivant'),
('90.02Z', 'Activités de soutien au spectacle vivant'),
('90.03A', 'Création artistique relevant des arts plastiques'),
('90.03B', 'Autre création artistique'),
('90.04Z', 'Gestion de salles de spectacles'),
('91.01Z', 'Gestion des bibliothèques et des archives'),
('91.02Z', 'Gestion des musées'),
('91.03Z', 'Gestion des sites et monuments historiques et des attractions touristiques similaires'),
('91.04Z', 'Gestion des jardins botaniques et zoologiques et des réserves naturelles'),
('92.00Z', 'Organisation de jeux de hasard et d\'argent'),
('93.11Z', 'Gestion d\'installations sportives'),
('93.12Z', 'Activités de clubs de sports'),
('93.13Z', 'Activités des centres de culture physique'),
('93.19Z', 'Autres activités liées au sport'),
('93.21Z', 'Activités des parcs d\'attractions et parcs à thèmes'),
('93.29Z', 'Autres activités récréatives et de loisirs'),
('94.11Z', 'Activités des organisations patronales et consulaires'),
('94.12Z', 'Activités des organisations professionnelles'),
('94.20Z', 'Activités des syndicats de salariés'),
('94.91Z', 'Activités des organisations religieuses'),
('94.92Z', 'Activités des organisations politiques'),
('94.99Z', 'Autres organisations fonctionnant par adhésion volontaire'),
('95.11Z', 'Réparation d\'ordinateurs et d\'équipements périphériques'),
('95.12Z', 'Réparation d\'équipements de communication'),
('95.21Z', 'Réparation de produits électroniques grand public'),
('95.22Z', 'Réparation d\'appareils électroménagers et d\'équipements pour la maison et le jardin'),
('95.23Z', 'Réparation de chaussures et d\'articles en cuir'),
('95.24Z', 'Réparation de meubles et d\'équipements du foyer'),
('95.25Z', 'Réparation d\'articles d\'horlogerie et de bijouterie'),
('95.29Z', 'Réparation d\'autres biens personnels et domestiques'),
('96.01A', 'Blanchisserie-teinturerie de gros'),
('96.01B', 'Blanchisserie-teinturerie de détail'),
('96.02A', 'Coiffure'),
('96.02B', 'Soins de beauté'),
('96.03Z', 'Services funéraires'),
('96.04Z', 'Entretien corporel'),
('96.09Z', 'Autres services personnels n.c.a.'),
('97.00Z', 'Activités des ménages en tant qu\'employeurs de personnel domestique'),
('98.10Z', 'Activités indifférenciées des ménages en tant que producteurs de biens pour usage propre'),
('98.20Z', 'Activités indifférenciées des ménages en tant que producteurs de services pour usage propre'),
('99.00Z', 'Activités des organisations et organismes extraterritoriaux');

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
(2, 141, 1, 286, 'SIO1', NULL, '2024-05-29', '2024-07-10'),
(3, 141, 1, 308, 'SIO2', NULL, '2024-05-30', '2024-07-11'),
(6, 156, 4, -1, 'SIO1', NULL, '2024-05-08', '2024-06-12');

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
  KEY `idTuteur` (`idTuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `idTuteur`, `nom`, `prenom`, `email`, `date_entree`, `telephone`, `spe`, `classe`, `promo`, `login`, `password`, `password_reset`, `statut`, `inactif`, `dateFirstConn`, `isDeleted`) VALUES
(-1, NULL, 'ANONYMOUS', 'Anonymous', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1),
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
(283, NULL, 'BARBIER', 'loann', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'barbier.loann', '$2y$10$LgIb4/JPIgLjEKcEQGM31.bhNcPx7ifu40zjg3AXb7uOE1EWOit0u', 1, 'Etudiant', 0, NULL, 0),
(284, NULL, 'DEGRAUW VERRY', 'axel', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'degrauwverry.axel', '$2y$10$v0pV6vOxh2UtLG7U5X5d0u5EJGszxWZE.x84Lgf1PPMUUMDtMCy4i', 1, 'Etudiant', 0, NULL, 0),
(285, 3, 'ERNOULT', 'gabin', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'ernoult.gabin', '$2y$10$fcd96wY6oCbEWKjQ9ezSL.IWLaLP7aFTUj8yJbO.0FXh.U.whOctG', 1, 'Etudiant', 0, NULL, 0),
(286, NULL, 'GAILLARD', 'logan', 'logangaillard1@gmail.com', '2023-09-04', '07 00 00 00 00', '', 'SIO1', '2025', 'gaillard.logan', '$2y$10$ccKA7y5uJfUz2pXHdZJPhegQ5hwgwfB8549LVd8NNdO7yUxjOjB0y', 0, 'Etudiant', 0, '2024-06-06 12:32:03', 0),
(287, 3, 'KOSIOREK', 'alexandre', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'kosiorek.alexandre', '$2y$10$ZAmJ.kVgyJqEC/rVX.8vGeq6fXYIxjUPf/V2S9s5YZhJS5ntlcvmy', 1, 'Etudiant', 0, NULL, 0),
(288, NULL, 'LE ROCHELEUIL  CHAILLE', 'alexis', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'lerocheleuilchaille.alexis', '$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq', 1, 'Etudiant', 0, NULL, 0),
(289, NULL, 'LESCOUZERE', 'matheo', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'lescouzere.matheo', '$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C', 1, 'Etudiant', 0, NULL, 0),
(290, NULL, 'MANUKYAN', 'astghik', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'manukyan.astghik', '$2y$10$PNd9ccVd.omSeZvPR9dabOCZdqJFXCI0JwE.MLzrxnN/Q6Nu3QemC', 1, 'Etudiant', 0, NULL, 0),
(291, 41, 'MINGOUOLO', 'noah', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'mingouolo.noah', '$2y$10$p5tkLzkj1RiVHyzn5WWdVOcr1E7t3HY30cWbq4uHQdc5.ayjOWK.C', 1, 'Etudiant', 0, NULL, 0),
(292, NULL, 'MORNAC', 'erwan', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'mornac.erwan', '$2y$10$KaKZrvQJuGhNi/8tWIiRCeyjwzTn0dbYxePPx6knVq1lfSWxbWse6', 1, 'Etudiant', 0, NULL, 0),
(293, NULL, 'RAMOS', 'clement', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'ramos.clement', '$2y$10$2nq9sOVxrNC6m5aKqw68f.6MmpcRzetq.qm4LpaQHCLSbuUZXeVjm', 1, 'Etudiant', 0, NULL, 0),
(294, 3, 'ROUX', 'kevin', NULL, '2023-09-04', NULL, 'SISR', 'SIO1', '2025', 'roux.kevin', '$2y$10$3jlp/7o3pLewV5fL3GV2J.PkkNUqaSKUgqZsRdEy5zSwzX1HpZTjS', 1, 'Etudiant', 0, NULL, 0),
(295, 40, 'SAWANE', 'salle', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'sawane.salle', '$2y$10$D2dj.0mTOYqdJXiY.ORMJ.uwc/JqPjJqPyDbBebB/zLFjl8jtrkRq', 1, 'Etudiant', 0, NULL, 0),
(296, NULL, 'SOUAKRI', 'lounes', NULL, '2023-09-04', NULL, '', 'SIO1', '2025', 'souakri.lounes', '$2y$10$eLcFIfCY.dG8pirygmu.f.9JT5GFt1WMyDw2xJEHyxLaNORBI2nee', 1, 'Etudiant', 0, NULL, 0),
(297, 18, 'BONNET', 'matthieu', NULL, '2022-09-04', NULL, 'SLAM', 'SIO2', '2024', 'bonnet.matthieu', '$2y$10$Gz6vxW7uRyF.21sW33oTMel/yIZk8AFuLP00n81LIPd8XhtrLUFA.', 1, 'Etudiant', 0, NULL, 0),
(298, NULL, 'BUIL', 'victor', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'buil.victor', '$2y$10$oL1Hs1ChRjg.Z/ctUrW6/O3/mUNXNdotZfIzhfqpIRpQVJtOOr5Ye', 1, 'Etudiant', 0, NULL, 0),
(299, NULL, 'BURAUD', 'mathis', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'buraud.mathis', '$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq', 1, 'Etudiant', 0, NULL, 0),
(300, NULL, 'COQUILLAU', 'elowan', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'coquillau.elowan', '$2y$10$4bes3wmOeU5ECpEN/8RBVOnKRXtD.3Bh9jaKaf9m9PFeDe/nueNVC', 1, 'Etudiant', 0, NULL, 0),
(301, NULL, 'COTTEREAU', 'corentin', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'cottereau.corentin', '$2y$10$/WWjbjvMfHERxHoOPbIkoe8IScbC1AD.TeYi3ipquU4Ll2WlKfiam', 1, 'Etudiant', 0, NULL, 0),
(302, NULL, 'DE ALMEIDA', 'angel', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'dealmeida.angel', '$2y$10$gZCtPO6nMFJVFebVNDZJSuGygJAvxwZu6jR8mhZUCgW8tMgZL4PTC', 1, 'Etudiant', 0, NULL, 0),
(303, NULL, 'DOMENICI', 'lheo', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'domenici.lheo', '$2y$10$KCl/7Mv/IRbZTXzocHm3EulSKpLe3U/gXKeFajbA8u2No1QAYUQeC', 1, 'Etudiant', 0, NULL, 0),
(304, NULL, 'GARNIER', 'aurelien', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'garnier.aurelien', '$2y$10$wDye3E8DE2BraJ4nDhrOPevJov6PRd4U0uxZnjApWGfsEAQoElizq', 1, 'Etudiant', 0, NULL, 0),
(305, NULL, 'GUICHARD', 'camille', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'guichard.camille', '$2y$10$CqKEETRFqDr4XYjNjOmBuen/9SjmH.B6L1N8ZZgQ6NB9TF2ilZSUm', 1, 'Etudiant', 0, NULL, 0),
(306, NULL, 'LEFEBVRE', 'aleksander', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'lefebvre.aleksander', '$2y$10$rP37oqAr.aFo3UgeoK20UuUvhUbOj9Sbb9VU7UG64v3yFJU5fLyQS', 1, 'Etudiant', 0, NULL, 0),
(307, NULL, 'MENARD', 'lucas', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'menard.lucas', '$2y$10$xcl0h3lHO9lVf0TaBxFtL.YPr6ephkdgE4qEThbqFD0TyXyt6Vxni', 1, 'Etudiant', 0, NULL, 0),
(308, NULL, 'MIE', 'martin', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'mie.martin', '$2y$10$cTxklMVeDggknfMGaUmUreUqGRUfQLutqQVSIzYSFFU9so2j4d1uq', 1, 'Etudiant', 0, NULL, 0),
(309, NULL, 'PERODEAU', 'matheo', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'perodeau.matheo', '$2y$10$sYxXUD11lKzs9byjX4V39erc.mAlpVmEQvGre/z1fv50IuOnNGp9a', 1, 'Etudiant', 0, NULL, 0),
(310, NULL, 'POUPEAU', 'mathieu', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'poupeau.mathieu', '$2y$10$yiNoHD8QYjSIQuDLmXUy6OSWl3ncsALNWgd195FHMwyx3XtdngnLq', 1, 'Etudiant', 0, NULL, 0),
(311, NULL, 'TEXIER', 'hugo', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'texier.hugo', '$2y$10$GIOZRvGjkTRIEcc0ecHV.eS1CtGhDArNsJefxGMXjMaytjT8KBc2W', 1, 'Etudiant', 0, NULL, 0),
(312, NULL, 'THOMAS', 'dorian', NULL, '2022-09-04', NULL, '', 'SIO2', '2024', 'thomas.dorian', '$2y$10$OS6Z5ON6SuqtAeLl/BFv5eSV4giJItE0hhpuODYELqJ0WQWpOl7TO', 1, 'Etudiant', 0, NULL, 0),
(313, NULL, 'ANONYMOUS', 'Anonymous', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 1),
(316, NULL, 'Prof', 'prof', '', NULL, '', NULL, 'Enseignant', NULL, 'prof.prof', '$2y$10$f5jfCrryZ0I.gtfZmrLUeuBWTmq817d8Xr12vnf/fNN6WJMNCsKFG', 1, 'Professeur', 0, NULL, 0),
(318, NULL, 'Gaillard', 'Logan Prof', '', NULL, '', NULL, 'Enseignant', NULL, 'lpgaillard', '$2y$10$mhHBbXUsSQ9qYEoVgiYBM.gQBfV0ep7reNbt9fab3Zn.zdwYqsPWi', 1, 'Professeur', 0, NULL, 0),
(320, NULL, 'ANONYMOUS', 'Anonymous', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 1),
(321, 3, 'ETUDIANT', 'Etudiant', '', '2023-09-06', '', 'SLAM', 'SIO1', '2025', 'etudiant', '$2y$10$GH2/65oExoLixlZ3hzIFVu/1Z/nRDPRry24b3pVrDhLhHqp/SjdGC', 0, 'Etudiant', 0, '2024-06-10 14:45:39', 0);

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
,`effectif` varchar(100)
,`entreprise_valide` tinyint(1)
,`EntrepriseID` int
,`naf` varchar(10)
,`naf_libelle` varchar(255)
,`nomEntreprise` varchar(255)
,`siret` varchar(100)
,`type` varchar(255)
,`ville` varchar(255)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_logs`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_logs`;
CREATE TABLE IF NOT EXISTS `vue_logs` (
`classeUser` varchar(100)
,`date` datetime
,`entite_id` int
,`entite_type` varchar(50)
,`idLog` int
,`idLogType` int
,`idUser` int
,`logType` varchar(100)
,`new_values` longtext
,`nomUser` varchar(255)
,`old_values` longtext
,`pointGagne` int
,`prenomUser` varchar(255)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_operations`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vue_operations`;
CREATE TABLE IF NOT EXISTS `vue_operations` (
`dateCreation` datetime
,`idEntite` int
,`idTuteur` int
,`idUser` int
,`nomEntite` varchar(511)
,`nomUser` varchar(511)
,`type` varchar(10)
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
,`employe_mail` varchar(255)
,`employe_nom` varchar(255)
,`employe_prenom` varchar(255)
,`employe_telephone` varchar(255)
,`Entreprise` varchar(255)
,`Entreprise_adresse` varchar(255)
,`Entreprise_codePostal` varchar(255)
,`Entreprise_effectif` varchar(20)
,`Entreprise_naf` varchar(100)
,`Entreprise_ville` varchar(255)
,`EtudiantEmail` varchar(255)
,`EtudiantNom` varchar(255)
,`EtudiantPrenom` varchar(255)
,`EtudiantPromo` varchar(4)
,`EtudiantSpe` varchar(4)
,`EtudiantTel` varchar(255)
,`idEntreprise` int
,`idEtudiant` int
,`idMaitreDeStage` int
,`idStage` int
,`idTuteur` int
,`siret` varchar(100)
,`Statut` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure de la vue `contact_employe`
--
DROP TABLE IF EXISTS `contact_employe`;

DROP VIEW IF EXISTS `contact_employe`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `contact_employe`  AS SELECT `employe`.`id` AS `EmployeID`, `employe`.`nom` AS `nom`, `employe`.`prenom` AS `prenom`, `employe`.`email` AS `email`, `employe`.`telephone` AS `telephone`, `employe`.`fonction` AS `fonction`, `employe`.`service` AS `service`, `entreprise`.`id` AS `EntrepriseID`, `entreprise`.`nomEntreprise` AS `entreprise`, `entreprise`.`adresse` AS `Entreprise_adresse`, `entreprise`.`codePostal` AS `Entreprise_codePostal`, `entreprise`.`ville` AS `Entreprise_ville`, `user`.`id` AS `UserID`, concat(`user`.`nom`,' ',`user`.`prenom`) AS `Created_User`, `employe`.`created_date` AS `Created_date`, `employe`.`contact_valide` AS `contact_valide` FROM ((`employe` join `entreprise` on((`employe`.`idEntreprise` = `entreprise`.`id`))) join `user` on((`employe`.`created_userid` = `user`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_entreprise`
--
DROP TABLE IF EXISTS `vue_entreprise`;

DROP VIEW IF EXISTS `vue_entreprise`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_entreprise`  AS SELECT `e`.`id` AS `EntrepriseID`, `e`.`siret` AS `siret`, `e`.`nomEntreprise` AS `nomEntreprise`, `e`.`adresse` AS `adresse`, `e`.`ville` AS `ville`, `e`.`codePostal` AS `codePostal`, `n`.`id` AS `naf`, `n`.`libelle` AS `naf_libelle`, `c`.`Libelle` AS `type`, `ef`.`libelle` AS `effectif`, `e`.`Created_Date` AS `Created_Date`, concat(`u`.`nom`,' ',`u`.`prenom`) AS `Created_User`, `e`.`entreprise_valide` AS `entreprise_valide` FROM ((((`entreprise` `e` left join `user` `u` on((`e`.`Created_UserID` = `u`.`id`))) left join `categoriejuridique` `c` on((`e`.`type` = (`c`.`id` collate utf8mb4_general_ci)))) left join `naf` `n` on((`e`.`naf` = (`n`.`id` collate utf8mb4_general_ci)))) left join `effectif` `ef` on((`e`.`effectif` = (`ef`.`code` collate utf8mb4_general_ci)))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_logs`
--
DROP TABLE IF EXISTS `vue_logs`;

DROP VIEW IF EXISTS `vue_logs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_logs`  AS SELECT `l`.`id` AS `idLog`, `l`.`idLogType` AS `idLogType`, `l`.`idUser` AS `idUser`, `t`.`type` AS `logType`, `t`.`points` AS `pointGagne`, `l`.`entite_type` AS `entite_type`, `l`.`entite_id` AS `entite_id`, `u`.`nom` AS `nomUser`, `u`.`prenom` AS `prenomUser`, `u`.`classe` AS `classeUser`, `l`.`old_values` AS `old_values`, `l`.`new_values` AS `new_values`, `l`.`date` AS `date` FROM ((`logs` `l` join `user` `u` on((`l`.`idUser` = `u`.`id`))) join `log_type` `t` on((`l`.`idLogType` = `t`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_operations`
--
DROP TABLE IF EXISTS `vue_operations`;

DROP VIEW IF EXISTS `vue_operations`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_operations`  AS SELECT `e`.`created_userid` AS `idUser`, `u`.`idTuteur` AS `idTuteur`, concat(`u`.`nom`,' ',`u`.`prenom`) AS `nomUser`, 'contact' AS `type`, `e`.`id` AS `idEntite`, concat(`e`.`nom`,' ',`e`.`prenom`) AS `nomEntite`, `e`.`created_date` AS `dateCreation` FROM (`employe` `e` join `user` `u` on((`e`.`created_userid` = `u`.`id`))) WHERE ((`e`.`created_userid` is not null) AND (`e`.`contact_valide` = 0))union select `e`.`Created_UserID` AS `idUser`,`u`.`idTuteur` AS `idTuteur`,concat(`u`.`nom`,' ',`u`.`prenom`) AS `nomUser`,'entreprise' AS `type`,`e`.`id` AS `idEntite`,`e`.`nomEntreprise` AS `nomEntite`,`e`.`Created_Date` AS `dateCreation` from (`entreprise` `e` join `user` `u` on((`e`.`Created_UserID` = `u`.`id`))) where ((`e`.`Created_UserID` is not null) and (`e`.`entreprise_valide` = 0))  ;

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
  ADD CONSTRAINT `created_userId` FOREIGN KEY (`created_userid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `Employe_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `created_useridEntreprise` FOREIGN KEY (`Created_UserID`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `Stage_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `Stage_ibfk_2` FOREIGN KEY (`idMaitreDeStage`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `Stage_ibfk_3` FOREIGN KEY (`idEtudiant`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `idTuteur` FOREIGN KEY (`idTuteur`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
