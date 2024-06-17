/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: gestion_stage
-- ------------------------------------------------------
-- Server version	10.11.8-MariaDB-ubu2204

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoriejuridique`
--

DROP TABLE IF EXISTS `categoriejuridique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriejuridique` (
  `id` varchar(100) NOT NULL,
  `Libelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriejuridique`
--

LOCK TABLES `categoriejuridique` WRITE;
/*!40000 ALTER TABLE `categoriejuridique` DISABLE KEYS */;
INSERT INTO `categoriejuridique` VALUES
('0000','Organisme de placement collectif en valeurs mobilières sans personnalité morale'),
('1000','Entrepreneur individuel'),
('2110','Indivision entre personnes physiques '),
('2120','Indivision avec personne morale '),
('2210','Société créée de fait entre personnes physiques '),
('2220','Société créée de fait avec personne morale '),
('2310','Société en participation entre personnes physiques '),
('2320','Société en participation avec personne morale '),
('2385','Société en participation de professions libérales '),
('2400','Fiducie '),
('2700','Paroisse hors zone concordataire '),
('2800','Assujetti unique à la TVA'),
('2900','Autre groupement de droit privé non doté de la personnalité morale '),
('3110','Représentation ou agence commerciale d\'état ou organisme public étranger immatriculé au RCS '),
('3120','Société commerciale étrangère immatriculée au RCS'),
('3205','Organisation internationale '),
('3210','État, collectivité ou établissement public étranger'),
('3220','Société étrangère non immatriculée au RCS '),
('3290','Autre personne morale de droit étranger '),
('4110','Établissement public national à caractère industriel ou commercial doté d\'un comptable public '),
('4120','Établissement public national à caractère industriel ou commercial non doté d\'un comptable public '),
('4130','Exploitant public '),
('4140','Établissement public local à caractère industriel ou commercial '),
('4150','Régie d\'une collectivité locale à caractère industriel ou commercial '),
('4160','Institution Banque de France '),
('5191','Société de caution mutuelle '),
('5192','Société coopérative de banque populaire '),
('5193','Caisse de crédit maritime mutuel '),
('5194','Caisse (fédérale) de crédit mutuel '),
('5195','Association coopérative inscrite (droit local Alsace Moselle) '),
('5196','Caisse d\'épargne et de prévoyance à forme coopérative '),
('5202','Société en nom collectif '),
('5203','Société en nom collectif coopérative '),
('5306','Société en commandite simple '),
('5307','Société en commandite simple coopérative '),
('5308','Société en commandite par actions '),
('5309','Société en commandite par actions coopérative '),
('5310','Société en libre partenariat (SLP)'),
('5370','Société de Participations Financières de Profession Libérale Société en commandite par actions (SPFPL SCA)'),
('5385','Société d\'exercice libéral en commandite par actions '),
('5410','SARL nationale '),
('5415','SARL d\'économie mixte '),
('5422','SARL immobilière pour le commerce et l\'industrie (SICOMI) '),
('5426','SARL immobilière de gestion'),
('5430','SARL d\'aménagement foncier et d\'équipement rural (SAFER)'),
('5431','SARL mixte d\'intérêt agricole (SMIA) '),
('5432','SARL d\'intérêt collectif agricole (SICA) '),
('5442','SARL d\'attribution '),
('5443','SARL coopérative de construction '),
('5451','SARL coopérative de consommation '),
('5453','SARL coopérative artisanale '),
('5454','SARL coopérative d\'intérêt maritime '),
('5455','SARL coopérative de transport'),
('5458','SARL coopérative de production (SCOP)'),
('5459','SARL union de sociétés coopératives '),
('5460','Autre SARL coopérative '),
('5470','Société de Participations Financières de Profession Libérale Société à responsabilité limitée (SPFPL SARL)'),
('5485','Société d\'exercice libéral à responsabilité limitée '),
('5499','Société à responsabilité limitée (sans autre indication)'),
('5505','SA à participation ouvrière à conseil d\'administration '),
('5510','SA nationale à conseil d\'administration '),
('5515','SA d\'économie mixte à conseil d\'administration '),
('5520','Fonds à forme sociétale à conseil d\'administration'),
('5522','SA immobilière pour le commerce et l\'industrie (SICOMI) à conseil d\'administration'),
('5525','SA immobilière d\'investissement à conseil d\'administration'),
('5530','SA d\'aménagement foncier et d\'équipement rural (SAFER) à conseil d\'administration'),
('5531','Société anonyme mixte d\'intérêt agricole (SMIA) à conseil d\'administration '),
('5532','SA d\'intérêt collectif agricole (SICA) à conseil d\'administration'),
('5542','SA d\'attribution à conseil d\'administration'),
('5543','SA coopérative de construction à conseil d\'administration'),
('5546','SA de HLM à conseil d\'administration '),
('5547','SA coopérative de production de HLM à conseil d\'administration '),
('5548','SA de crédit immobilier à conseil d\'administration '),
('5551','SA coopérative de consommation à conseil d\'administration '),
('5552','SA coopérative de commerçants-détaillants à conseil d\'administration'),
('5553','SA coopérative artisanale à conseil d\'administration '),
('5554','SA coopérative (d\'intérêt) maritime à conseil d\'administration '),
('5555','SA coopérative de transport à conseil d\'administration'),
('5558','SA coopérative de production  (SCOP) à conseil d\'administration'),
('5559','SA union de sociétés coopératives à conseil d\'administration '),
('5560','Autre SA coopérative à conseil d\'administration '),
('5570','Société de Participations Financières de Profession Libérale Société anonyme à conseil d\'administration (SPFPL SA à conseil d\'administration)'),
('5585','Société d\'exercice libéral à forme anonyme à conseil d\'administration '),
('5599','SA à conseil d\'administration (s.a.i.)'),
('5605','SA à participation ouvrière à directoire '),
('5610','SA nationale à directoire '),
('5615','SA d\'économie mixte à directoire '),
('5620','Fonds à forme sociétale à directoire'),
('5622','SA immobilière pour le commerce et l\'industrie (SICOMI) à directoire'),
('5625','SA immobilière d\'investissement à directoire '),
('5630','Safer anonyme à directoire '),
('5631','SA mixte d\'intérêt agricole (SMIA)'),
('5632','SA d\'intérêt collectif agricole (SICA)'),
('5642','SA d\'attribution à directoire'),
('5643','SA coopérative de construction à directoire'),
('5646','SA de HLM à directoire'),
('5647','Société coopérative de production de HLM anonyme à directoire '),
('5648','SA de crédit immobilier à directoire '),
('5651','SA coopérative de consommation à directoire '),
('5652','SA coopérative de commerçants-détaillants à directoire'),
('5653','SA coopérative artisanale à directoire '),
('5654','SA coopérative d\'intérêt maritime à directoire '),
('5655','SA coopérative de transport à directoire '),
('5658','SA coopérative de production (SCOP) à directoire'),
('5659','SA union de sociétés coopératives à directoire '),
('5660','Autre SA coopérative à directoire'),
('5670','Société de Participations Financières de Profession Libérale Société anonyme à Directoire (SPFPL SA à directoire)'),
('5685','Société d\'exercice libéral à forme anonyme à directoire '),
('5699','SA à directoire (s.a.i.)'),
('5710','SAS, société par actions simplifiée'),
('5770','Société de Participations Financières de Profession Libérale Société par actions simplifiée (SPFPL SAS)'),
('5785','Société d\'exercice libéral par action simplifiée '),
('5800','Société européenne '),
('6100','Caisse d\'Épargne et de Prévoyance '),
('6210','Groupement européen d\'intérêt économique (GEIE) '),
('6220','Groupement d\'intérêt économique (GIE) '),
('6316','Coopérative d\'utilisation de matériel agricole en commun (CUMA) '),
('6317','Société coopérative agricole '),
('6318','Union de sociétés coopératives agricoles '),
('6411','Société d\'assurance à forme mutuelle'),
('6511','Sociétés Interprofessionnelles de Soins Ambulatoires '),
('6521','Société civile de placement collectif immobilier (SCPI) '),
('6532','Société civile d\'intérêt collectif agricole (SICA) '),
('6533','Groupement agricole d\'exploitation en commun (GAEC) '),
('6534','Groupement foncier agricole '),
('6535','Groupement agricole foncier '),
('6536','Groupement forestier '),
('6537','Groupement pastoral '),
('6538','Groupement foncier et rural'),
('6539','Société civile foncière '),
('6540','Société civile immobilière '),
('6541','Société civile immobilière de construction-vente'),
('6542','Société civile d\'attribution '),
('6543','Société civile coopérative de construction '),
('6544','Société civile immobilière d\' accession progressive à la propriété'),
('6551','Société civile coopérative de consommation '),
('6554','Société civile coopérative d\'intérêt maritime '),
('6558','Société civile coopérative entre médecins '),
('6560','Autre société civile coopérative '),
('6561','SCP d\'avocats '),
('6562','SCP d\'avocats aux conseils '),
('6563','SCP d\'avoués d\'appel '),
('6564','SCP d\'huissiers '),
('6565','SCP de notaires '),
('6566','SCP de commissaires-priseurs '),
('6567','SCP de greffiers de tribunal de commerce '),
('6568','SCP de conseils juridiques '),
('6569','SCP de commissaires aux comptes '),
('6571','SCP de médecins '),
('6572','SCP de dentistes '),
('6573','SCP d\'infirmiers '),
('6574','SCP de masseurs-kinésithérapeutes'),
('6575','SCP de directeurs de laboratoire d\'analyse médicale '),
('6576','SCP de vétérinaires '),
('6577','SCP de géomètres experts'),
('6578','SCP d\'architectes '),
('6585','Autre société civile professionnelle'),
('6589','Société civile de moyens '),
('6595','Caisse locale de crédit mutuel '),
('6596','Caisse de crédit agricole mutuel '),
('6597','Société civile d\'exploitation agricole '),
('6598','Exploitation agricole à responsabilité limitée '),
('6599','Autre société civile '),
('6901','Autre personne de droit privé inscrite au registre du commerce et des sociétés'),
('7111','Autorité constitutionnelle '),
('7112','Autorité administrative ou publique indépendante'),
('7113','Ministère '),
('7120','Service central d\'un ministère '),
('7150','Service du ministère de la Défense '),
('7160','Service déconcentré à compétence nationale d\'un ministère (hors Défense)'),
('7171','Service déconcentré de l\'État à compétence (inter) régionale '),
('7172','Service déconcentré de l\'État à compétence (inter) départementale '),
('7179','(Autre) Service déconcentré de l\'État à compétence territoriale '),
('7190','Ecole nationale non dotée de la personnalité morale '),
('7210','Commune et commune nouvelle '),
('7220','Département '),
('7225','Collectivité et territoire d\'Outre Mer'),
('7229','(Autre) Collectivité territoriale '),
('7230','Région '),
('7312','Commune associée et commune déléguée '),
('7313','Section de commune '),
('7314','Ensemble urbain '),
('7321','Association syndicale autorisée '),
('7322','Association foncière urbaine '),
('7323','Association foncière de remembrement '),
('7331','Établissement public local d\'enseignement '),
('7340','Pôle métropolitain'),
('7341','Secteur de commune '),
('7342','District urbain '),
('7343','Communauté urbaine '),
('7344','Métropole'),
('7345','Syndicat intercommunal à vocation multiple (SIVOM) '),
('7346','Communauté de communes '),
('7347','Communauté de villes '),
('7348','Communauté d\'agglomération '),
('7349','Autre établissement public local de coopération non spécialisé ou entente '),
('7351','Institution interdépartementale ou entente'),
('7352','Institution interrégionale ou entente '),
('7353','Syndicat intercommunal à vocation unique (SIVU) '),
('7354','Syndicat mixte fermé '),
('7355','Syndicat mixte ouvert'),
('7356','Commission syndicale pour la gestion des biens indivis des communes '),
('7357','Pôle d\'équilibre territorial et rural (PETR)'),
('7361','Centre communal d\'action sociale '),
('7362','Caisse des écoles '),
('7363','Caisse de crédit municipal '),
('7364','Établissement d\'hospitalisation '),
('7365','Syndicat inter hospitalier '),
('7366','Établissement public local social et médico-social '),
('7367','Centre Intercommunal d\'action sociale (CIAS)'),
('7371','Office public d\'habitation à loyer modéré (OPHLM) '),
('7372','Service départemental d\'incendie et de secours (SDIS)'),
('7373','Établissement public local culturel '),
('7378','Régie d\'une collectivité locale à caractère administratif '),
('7379','(Autre) Établissement public administratif local '),
('7381','Organisme consulaire '),
('7382','Établissement public national ayant fonction d\'administration centrale '),
('7383','Établissement public national à caractère scientifique culturel et professionnel '),
('7384','Autre établissement public national d\'enseignement '),
('7385','Autre établissement public national administratif à compétence territoriale limitée '),
('7389','Établissement public national à caractère administratif '),
('7410','Groupement d\'intérêt public (GIP) '),
('7430','Établissement public des cultes d\'Alsace-Lorraine '),
('7450','Etablissement public administratif, cercle et foyer dans les armées'),
('7470','Groupement de coopération sanitaire à gestion publique '),
('7490','Autre personne morale de droit administratif '),
('8110','Régime général de la Sécurité Sociale'),
('8120','Régime spécial de Sécurité Sociale'),
('8130','Institution de retraite complémentaire '),
('8140','Mutualité sociale agricole '),
('8150','Régime maladie des non-salariés non agricoles '),
('8160','Régime vieillesse ne dépendant pas du régime général de la Sécurité Sociale'),
('8170','Régime d\'assurance chômage '),
('8190','Autre régime de prévoyance sociale '),
('8210','Mutuelle '),
('8250','Assurance mutuelle agricole '),
('8290','Autre organisme mutualiste '),
('8310','Comité social économique d’entreprise'),
('8311','Comité social économique d\'établissement '),
('8410','Syndicat de salariés '),
('8420','Syndicat patronal '),
('8450','Ordre professionnel ou assimilé '),
('8470','Centre technique industriel ou comité professionnel du développement économique '),
('8490','Autre organisme professionnel '),
('8510','Institution de prévoyance '),
('8520','Institution de retraite supplémentaire '),
('9110','Syndicat de copropriété '),
('9150','Association syndicale libre '),
('9210','Association non déclarée '),
('9220','Association déclarée '),
('9221','Association déclarée d\'insertion par l\'économique'),
('9222','Association intermédiaire'),
('9223','Groupement d\'employeurs'),
('9224','Association d\'avocats à responsabilité professionnelle individuelle'),
('9230','Association déclarée, reconnue d\'utilité publique'),
('9240','Congrégation '),
('9260','Association de droit local (Bas-Rhin, Haut-Rhin et Moselle)'),
('9300','Fondation '),
('9900','Autre personne morale de droit privé '),
('9970','Groupement de coopération sanitaire à gestion privée');
/*!40000 ALTER TABLE `categoriejuridique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProfPrincipal` int(11) DEFAULT NULL,
  `nomProf` varchar(50) DEFAULT NULL,
  `nomClasse` varchar(25) NOT NULL,
  `dateDebutStage` date DEFAULT NULL,
  `dateFinStage` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idProfPrincipal` (`idProfPrincipal`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classe`
--

LOCK TABLES `classe` WRITE;
/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
INSERT INTO `classe` VALUES
(1,3,'Ornech Jean-François','SIO1',NULL,NULL),
(2,41,'BOUCHEREAU Bertrand','SIO2',NULL,NULL);
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `contact_employe`
--

DROP TABLE IF EXISTS `contact_employe`;
/*!50001 DROP VIEW IF EXISTS `contact_employe`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `contact_employe` AS SELECT
 1 AS `EmployeID`,
  1 AS `nom`,
  1 AS `prenom`,
  1 AS `email`,
  1 AS `telephone`,
  1 AS `fonction`,
  1 AS `service`,
  1 AS `EntrepriseID`,
  1 AS `entreprise`,
  1 AS `Entreprise_adresse`,
  1 AS `Entreprise_codePostal`,
  1 AS `Entreprise_ville`,
  1 AS `UserID`,
  1 AS `Created_User`,
  1 AS `Created_date`,
  1 AS `contact_valide` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `effectif`
--

DROP TABLE IF EXISTS `effectif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `effectif` (
  `code` varchar(100) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `effectif`
--

LOCK TABLES `effectif` WRITE;
/*!40000 ALTER TABLE `effectif` DISABLE KEYS */;
INSERT INTO `effectif` VALUES
('00','0 salarié'),
('01','1 ou 2 salariés'),
('02','3 à 5 salariés'),
('03','6 à 9 salariés'),
('11','10 à 19 salariés'),
('12','20 à 49 salariés'),
('21','50 à 99 salariés'),
('22','100 à 199 salariés'),
('31','100 à 199 salariés'),
('32','250 à 499 salariés'),
('41','500 à 999 salariés'),
('42','1 000 à 1 999 salariés'),
('51','2 000 à 4 999 salariés'),
('52','5 000 à 9 999 salariés'),
('53','10 000 salariés et plus'),
('NN','Unité non-employeuse'),
('null','donnée manquante');
/*!40000 ALTER TABLE `effectif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEntreprise` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `created_userid` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `contact_valide` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `created_userId` (`created_userid`),
  CONSTRAINT `Employe_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`id`),
  CONSTRAINT `created_userId` FOREIGN KEY (`created_userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employe`
--

LOCK TABLES `employe` WRITE;
/*!40000 ALTER TABLE `employe` DISABLE KEYS */;
INSERT INTO `employe` VALUES
(0,NULL,'Anonymous',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),
(1,231,'Robert-Cantenet','Gael','rochefort@happycash.eu','0546876408',NULL,'Adjoint',3,'2024-06-13 15:02:12',1),
(2,232,'Le Guennec','Vincent','vincent.leguennec@natureboisconcept.fr','05 81 91 56 30',NULL,'Responsable service informatique',3,'2024-06-13 15:10:36',1),
(3,233,'SCHERRER','Benoit','contact@arobaz.info','06 33 11 59 74',NULL,'Gérant',3,'2024-06-13 15:13:32',1),
(4,234,'Gaucher','Barnabé','barnabe@lagrosseboite.fr','06 51 38 21 91',NULL,'Vendeur',3,'2024-06-13 15:16:24',1),
(5,16,'Rospars','Thibault','thibault.rospars@alstomgroup.com','06 45 57 48 99',NULL,'SPM Testa/Télédiagu',3,'2024-06-13 15:19:27',1),
(6,127,'BRISSONNEAU','Fabien','fabien.brissonneau@gmail.com','06 74 64 16 36',NULL,'Gérant',3,'2024-06-13 15:21:58',1),
(7,235,'DEXPERT','Sébastien','sebastien.dexpert2006@wanadoo.fr','',NULL,'Coordinateur d&#039;atelier',3,'2024-06-13 15:25:04',1),
(8,236,'Contact','Contact','','',NULL,'',3,'2024-06-13 15:28:35',1),
(9,237,'Grasset','Guillaume','g.grasset@gdbouest.com','07 60 82 73 41',NULL,'Consultant intégrateur',3,'2024-06-13 15:36:56',1),
(10,239,'MOREAU','Vincent','limoges@ldlc.com','05 55 14 48 70','','',3,'2024-06-14 15:54:30',1),
(11,240,'Migaud','Julien','julien.migaud@erudo.fr','',NULL,'',3,'2024-06-14 16:35:16',1),
(12,241,'Gue','Jérôme','j.gue@agglo.rochefortocean.fr','05 46 82 66 60','','',3,'2024-06-14 16:42:31',1),
(13,242,'MARCHAND','Olivier','olivier.marchand@ensma.fr','06 14 44 43 00',NULL,'',3,'2024-06-14 16:45:34',1),
(14,31,'Rautureau','Jerome','jerome.rautureau@agglo.larochelle.fr','05 46 30 34 25',NULL,'',3,'2024-06-14 16:54:27',1),
(15,243,'HERPIN','Simon','ufolep-usep-1@laligue17.org','',NULL,'',3,'2024-06-14 16:56:28',1),
(16,244,'COUTANCEAU','Anne','acoutanceau@ocealia-groupe.fr','05 49 97 09 45',NULL,'',3,'2024-06-14 16:58:20',1),
(17,102,'BOGDANOVIC','Yann','y.bogdanovic@soluris.fr','05 46 92 39 05 ',NULL,'numéro du tuteur: 07 57 67 67 36',3,'2024-06-14 17:01:02',1),
(18,245,'MOREAU','Sylvain','smoreau@cl.cerfrance.fr','05 87 50 41 41',NULL,'',3,'2024-06-14 17:10:47',1);
/*!40000 ALTER TABLE `employe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `Created_UserID` int(11) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `entreprise_valide` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `Created_UserID` (`Created_UserID`),
  CONSTRAINT `created_useridEntreprise` FOREIGN KEY (`Created_UserID`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entreprise`
--

LOCK TABLES `entreprise` WRITE;
/*!40000 ALTER TABLE `entreprise` DISABLE KEYS */;
INSERT INTO `entreprise` VALUES
(14,'ACT SERVICE','18 RUE DE LA BONETTE',NULL,'LA ROCHELLE',NULL,'17000',NULL,'33190075300038','46.51Z','5499','11',3,'2024-06-13 08:35:50',1),
(15,'ADEQUAT SYSTEME','54 AVENUE JEAN DE VIVONNE',NULL,'PISANY',NULL,'17600',NULL,'34994332400096','62.01Z','5499','12',3,'2024-06-12 19:05:25',1),
(16,'ALSTOM TRANSPORT SA',' AVENUE DU COMMANDANT LYSIACK',NULL,'AYTRE',NULL,'17440',NULL,'38919198200047','30.20Z','5599','42',3,'2024-06-10 18:53:28',1),
(17,'ARCHIPEL','3 AVENUE MAURICE CHUPIN',NULL,'ROCHEFORT',NULL,'17300',NULL,'48763129300031','94.99Z','9220','-',3,'2024-06-12 19:06:05',1),
(19,'AGGLOMERATION ROYAN ATLANTIQUE','107 AVENUE DE ROCHEFORT',NULL,'ROYAN',NULL,'17200',NULL,'24170064000048','84.11Z','7348','22',3,'2024-06-10 19:18:10',1),
(20,'DIRECTION ZONALE DES CRS SUD-OUEST',' AVENUE DE LA PORTE DAUPHINE',NULL,'LA ROCHELLE',NULL,'17000',NULL,'17330153200037','84.24Z','7179','22',3,'2024-06-10 19:20:10',1),
(21,'CC17 SAP','3 AVENUE LA FAYETTE',NULL,'ROCHEFORT',NULL,'17300',NULL,'84064010600026','62.09Z','5710','-',3,'2024-06-10 19:22:40',1),
(22,'CCI TERRITORIALE CHARENTE-MARITIME',' RUE AUDEBERT',NULL,'ROCHEFORT',NULL,'17300',NULL,'13002980400015','94.11Z','7381','-',3,'2024-06-12 19:05:53',1),
(23,'CENTRE HOSPITALIER DE ROCHEFORT','1 AVENUE DE BELIGON',NULL,'ROCHEFORT',NULL,'17300',NULL,'26170033000135','86.10Z','7364','41',3,'2024-06-10 19:37:19',1),
(24,'CENTRE HOSPITALIER ROYAN-ATLANTIQUE','20 AV DE ST SORDELIN',NULL,'VAUX-SUR-MER',NULL,'17640',NULL,'26170039700019','86.10Z','7364','41',3,'2024-06-13 08:30:48',1),
(25,'GROUPE HOSPITALIER SAINTES-SAINT-JEAN-D&#039;ANGELY','11 RUE AMBROISE PARE',NULL,'SAINTES',NULL,'17100',NULL,'26170002500339','86.10Z','7364','42',3,'2024-06-13 09:26:11',1),
(26,'CETIOS',' ALLEE DE LA BARATTE',NULL,'SURGERES',NULL,'17700',NULL,'79049926300024','71.12B','5710','03',3,'2024-06-13 08:34:56',1),
(27,'CENTRE HOSPITALIER DE JONZAC','4 AVENUE WINSTON CHURCHILL',NULL,'JONZAC',NULL,'17500',NULL,'26170027200014','86.10Z','7364','41',3,'2024-06-13 08:36:49',1),
(28,'cipecma',NULL,NULL,'Chatelaillon',NULL,'17340',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(29,'CLINIQUE PASTEUR','222 AVENUE DE ROCHEFORT',NULL,'ROYAN',NULL,'17200',NULL,'71545005200025','86.10Z','5599','22',3,'2024-06-13 08:39:57',1),
(31,'COMMUNAUTE D\'AGGLOMERATION LA ROCHELLE','6 RUE SAINT MICHEL',NULL,'LA ROCHELLE',NULL,'17000',NULL,'24170043400020','84.11Z','7348','41',3,'2024-06-13 08:42:01',1),
(32,'COMMUNE DE CHATEAU LARCHER','4 RUE DE LA MAIRIE',NULL,'CHATEAU-LARCHER',NULL,'86370',NULL,'21860065800015','84.11Z','7210','11',3,'2024-06-13 08:43:49',1),
(33,'CC17 SAP','3 AVENUE LA FAYETTE',NULL,'ROCHEFORT',NULL,'17300',NULL,'84064010600026','62.09Z','5710','-',3,'2024-06-13 08:46:05',1),
(37,'DELAMET','1 AVENUE DU PROGRES',NULL,'SAINT-AIGULIN',NULL,'17360',NULL,'41278207000012','71.12B','5599','12',3,'2024-06-13 08:54:52',1),
(39,'GALA EIGSI','26 RUE F DE VAUX DE FOLETIER',NULL,'LA ROCHELLE',NULL,'17000',NULL,'49509120900017','94.99Z','9220','-',3,'2024-06-13 09:09:40',1),
(41,'PARENTS ET AMIS DU FOYER DEPARTEMENTAL LANNELONGUE','30 BD DU DEBARQUEMENT',NULL,'SAINT-TROJAN-LES-BAINS',NULL,'17370',NULL,'82857899700011','88.99B','9220','-',3,'2024-06-13 09:18:04',1),
(43,'COOP ATLANTIQUE','3 RUE DU DOCTEUR JEAN',NULL,'SAINTES',NULL,'17100',NULL,'52558013000017','47.11D','5651','31',3,'2024-06-13 09:20:02',1),
(45,'LEA NATURE SERVICES','23 AVENUE PAUL LANGEVIN',NULL,'PERIGNY',NULL,'17180',NULL,'40995752900038','70.10Z','5710','22',3,'2024-06-13 09:23:21',1),
(46,'Excelia','102, Rue de Coureilles /  1 rue Jean Perrin',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(47,'HANO COMMUNICATION','5 RUE DES FRAGONS',NULL,'DAMPIERRE-SUR-BOUTONNE',NULL,'17470',NULL,'81152239000020','73.11Z','5710','-',3,'2024-06-13 09:28:38',1),
(48,'DATHAL','2 RUE FERDINAND GATEAU',NULL,'TONNAY-CHARENTE',NULL,'17430',NULL,'43498179100040','47.41Z','5499','-',3,'2024-06-13 09:33:08',1),
(49,'LA ROCHELLE UNIVERSITE','23 AVENUE ALBERT EINSTEIN',NULL,'LA ROCHELLE',NULL,'17000',NULL,'19170032700015','85.42Z','7383','41',3,'2024-06-13 09:35:22',1),
(51,'SORDA - GROUPE MICHEL','163 AVENUE JEAN PAUL SARTRE',NULL,'LA ROCHELLE',NULL,'17000',NULL,'71178046000079','45.11Z','5710','21',3,'2024-06-13 09:34:40',1),
(52,'JEAN NOEL INFORMATIQUE','37 AVENUE D&#039;AUNIS',NULL,'TONNAY-CHARENTE',NULL,'17430',NULL,'45394555200025','95.11Z','1000','01',3,'2024-06-13 09:36:40',1),
(53,'DSIA','16 RUE DE LA PETITE SENSIVE',NULL,'NANTES',NULL,'44300',NULL,'40194669400015','62.01Z','5710','22',3,'2024-06-13 09:51:52',1),
(54,'MOTEURS LEROY SOMER',' BOULEVARD MARCELLIN LEROY',NULL,'ANGOULEME',NULL,'16000',NULL,'33856725800011','27.11Z','5710','41',3,'2024-06-13 09:54:32',1),
(55,'LYCEE PROFESSIONNEL JEAN ROSTAND','12 RUE LOUISE LERIGET',NULL,'ANGOULEME',NULL,'16000',NULL,'19160049300016','85.32Z','7331','21',3,'2024-06-13 09:55:27',1),
(56,'LYCEE POYVALENT JEAN MONNET','66 BOULEVARD DE CHATENAY',NULL,'COGNAC',NULL,'16100',NULL,'19160020400017','85.31Z','7331','22',3,'2024-06-13 09:56:05',1),
(58,'Lycée Agricole Bordeaux ',NULL,NULL,'Blanquefort ',NULL,'33290',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(59,'Lycee bellevue ',NULL,NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(60,'Lycée Bernard Palissy','1, Rue de Gascogne',NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(61,'lycée Georges Desclaude','rue Georges Desclaude',NULL,'Saintes',NULL,'17100',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(62,'Lycée georges Leygues ',NULL,NULL,'Villeneuve\\lot ',NULL,'47300',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(63,'Lycée Jamain','2A Boulevard Pouzet ',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(64,'Lycée Jean DAUTET ',NULL,NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(65,'Lycée Léonce Vieljeux ','Rue des Gonthières ',NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(66,'Lycée Marcel Dassault - ',' NULL',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(67,'lycée Professionnel Régional I',' NULL',NULL,'COGNAC ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(68,'Lycée Professionnel Rompsay',' Rue de Périgny ',NULL,'La Rochelle',NULL,'17025',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(69,'Lycée Victor hugo ',NULL,NULL,'Poitiers ',NULL,'86000',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(70,'MAAF ASSURANCES','  CHABAN',NULL,'CHAURAY',NULL,'79180',NULL,'78142328000010','65.12Z','6411','32',3,'2024-06-13 10:00:24',1),
(71,'MAIANO INFORMATIQUE','31 RUE PAUL EMILE VICTOR',NULL,'VAUX-SUR-MER',NULL,'17640',NULL,'44400027700020','62.02A','5499','11',3,'2024-06-13 10:04:26',1),
(72,'COMMUNE DE SAINTES',' SQUARE ANDRE MAUDET',NULL,'SAINTES',NULL,'17100',NULL,'21170415000351','84.11Z','7210','32',3,'2024-06-13 10:05:35',1),
(73,'COMMUNE DE CHATELAILLON-PLAGE','20 BOULEVARD DE LA LIBERATION',NULL,'CHATELAILLON-PLAGE',NULL,'17340',NULL,'21170094300015','84.11Z','7210','22',3,'2024-06-13 10:05:57',1),
(74,'COMMUNE DE MESCHERS-SUR-GIRONDE','38 RUE PAUL MASSAY',NULL,'MESCHERS-SUR-GIRONDE',NULL,'17132',NULL,'21170230300010','84.11Z','7210','12',3,'2024-06-13 10:06:23',1),
(75,'COMMUNE DE POITIERS','15 PLACE DU MARECHAL LECLERC',NULL,'POITIERS',NULL,'86000',NULL,'21860194600013','84.11Z','7210','42',3,'2024-06-13 10:07:59',1),
(76,'COMMUNE DE PONT L ABBE D ARNOULT','26 PLACE DU GENERAL DE GAULLE',NULL,'PONT-L&#039;ABBE-D&#039;ARNOULT',NULL,'17250',NULL,'21170284000011','84.11Z','7210','12',3,'2024-06-13 10:08:46',1),
(77,'COMMUNE DE ROYAN','80 AVENUE DE PONTAILLAC',NULL,'ROYAN',NULL,'17200',NULL,'21170306100013','84.11Z','7210','32',3,'2024-06-13 10:09:09',1),
(78,'COMMUNE DE SAUJON',' PLACE GASTON BALLANDE',NULL,'SAUJON',NULL,'17600',NULL,'21170421800018','84.11Z','7210','21',3,'2024-06-13 10:10:35',1),
(79,'MALICHAUD ATLANTIQUE',' RUE HUBERT PENNEVERT',NULL,'ROCHEFORT',NULL,'17300',NULL,'37952148700023','30.30Z','5710','31',3,'2024-06-13 10:11:20',1),
(80,'MAPA - MUTUELLE D&#039;ASSURANCE',' RUE ANATOLE CONTRE',NULL,'SAINT-JEAN-D&#039;ANGELY',NULL,'17400',NULL,'77556508800066','65.12Z','6411','32',3,'2024-06-13 10:11:56',1),
(82,'MSA DES CHARENTES','1 BOULEVARD VLADIMIR',NULL,'SAINTES',NULL,'17100',NULL,'52022158100017','84.30A','8140','32',3,'2024-06-13 10:13:07',1),
(83,'NEO PC',' RUE HENRI GIRAUDEAU',NULL,'SURGERES',NULL,'17700',NULL,'51024943600021','95.11Z','5458','01',3,'2024-06-13 10:13:31',1),
(85,'ORGANISATION ECONOMIQUE DU COGNAC','44 BOULEVARD OSCAR PLANAT',NULL,'COGNAC',NULL,'16100',NULL,'90572055300015','52.10B','5599','12',3,'2024-06-13 10:14:55',1),
(86,'ORIX INFORMATIQUE','6 RUE DU PAPE URBAIN II',NULL,'SAINTES',NULL,'17100',NULL,'39107764100044','62.02A','5499','02',3,'2024-06-13 10:15:29',1),
(89,'ROMAIN INFORMATIQUE','20 RUE SAINT-VIVIEN',NULL,'BORDS',NULL,'17430',NULL,'75007045000010','47.41Z','5499','03',3,'2024-06-13 10:18:47',1),
(91,'SAINTRONIC','  L&#039;ORMEAU DE PIED',NULL,'SAINTES',NULL,'17100',NULL,'42086432400025','26.30Z','5710','-',3,'2024-06-13 10:16:54',1),
(92,'SARL A.I.P.C.','2 RUE DE LA PEROUSE',NULL,'LA CRECHE',NULL,'79260',NULL,'45296449700021','95.11Z','5499','03',3,'2024-06-13 10:19:17',1),
(94,'DISTRIBUTION INFORMATIQUE FAURE','25 ROUTE DE COGNAC',NULL,'ARCHIAC',NULL,'17520',NULL,'33847982700028','62.01Z','5499','-',3,'2024-06-13 10:20:27',1),
(95,'LE MONDE DU PC','30 AVENUE FREDERIC GARNIER',NULL,'VAUX-SUR-MER',NULL,'17640',NULL,'48083104900014','47.41Z','5499','-',3,'2024-06-13 10:21:29',1),
(97,'EMEDIA SERVICES','20 AVENUE ALBERT EINSTEIN',NULL,'LA ROCHELLE',NULL,'17000',NULL,'49325278700020','46.51Z','5499','01',3,'2024-06-13 10:24:19',1),
(98,'SIMAIR','17 AVENUE ANDRE DULIN',NULL,'ROCHEFORT',NULL,'17300',NULL,'31688318000036','30.30Z','5710','22',3,'2024-06-13 10:22:41',1),
(100,'SS2I SERVICES','16 RUE HENRI LE CHATELIER',NULL,'PERIGNY',NULL,'17180',NULL,'75238790200048','62.02A','5499','11',3,'2024-06-13 10:25:32',1),
(101,'-','6 RUE DES MEUNIERS',NULL,'ROCHEFORT',NULL,'17300',NULL,'44291786000037','95.11Z','1000','-',3,'2024-06-13 10:26:01',1),
(102,'SOLURIS  (SOLUTIONS NUMERIQUES TERRITORIALES INNOVANTES)','2 RUE DES ROCHERS',NULL,'SAINTES',NULL,'17100',NULL,'25170232000051','84.11Z','7355','21',3,'2024-06-13 10:27:27',1),
(104,'URANIE',' QUAI CARRIET',NULL,'LORMONT',NULL,'33310',NULL,'40413275500046','62.03Z','5499','02',3,'2024-06-13 10:28:54',1),
(105,'ZOLUX','141 COURS PAUL DOUMER',NULL,'SAINTES',NULL,'17100',NULL,'43196744700019','46.49Z','5710','22',3,'2024-06-13 10:29:21',1),
(106,'COMMUNE D ECURAT','1 PLACE SAINT LOUIS',NULL,'ECURAT',NULL,'17810',NULL,'21170148700012','84.11Z','7210','02',3,'2024-06-13 10:30:18',1),
(111,'INTER MUTUELLES ASSISTANCE GIE','118 AVENUE DE PARIS',NULL,'NIORT',NULL,'79000',NULL,'43324099100011','65.12Z','6220','51',3,'2024-06-13 10:34:25',1),
(112,'CONSERVATOIRE DE L&#039;ESPACE LITTORAL ET DES RIVAGES LACUSTRES',' RUE AUDEBERT',NULL,'ROCHEFORT',NULL,'17300',NULL,'18000501900047','84.13Z','7389','21',3,'2024-06-13 10:35:14',1),
(113,'COMMUNAUTE DE COMMUNES DE L ILE DE RE','3 RUE DU PERE IGNACE',NULL,'SAINT-MARTIN-DE-RE',NULL,'17410',NULL,'24170045900043','84.11Z','7346','21',3,'2024-06-13 10:35:44',1),
(114,'PLUSCOM','45 RUE DE LA GARE',NULL,'AYTRE',NULL,'17440',NULL,'50820744600057','73.11Z','5499','03',3,'2024-06-13 10:36:15',1),
(115,'CENTRE HOSPITALIER DE JONZAC','4 AVENUE WINSTON CHURCHILL',NULL,'JONZAC',NULL,'17500',NULL,'26170027200014','86.10Z','7364','41',3,'2024-06-13 10:36:40',1),
(116,'COMMUNE DE LA ROCHELLE','1 RUE DE L&#039;HOTEL DE VILLE',NULL,'LA ROCHELLE',NULL,'17000',NULL,'21170300400013','84.11Z','7210','42',3,'2024-06-13 10:37:08',1),
(117,'SICA DU SILO DE LA ROCHELLE PALLICE','69 RUE MONTCALM',NULL,'LA ROCHELLE',NULL,'17000',NULL,'78015477900034','52.24A','5532','21',3,'2024-06-13 10:37:55',1),
(118,'A2MI','10 RUE JEAN PERRIN',NULL,'LA ROCHELLE',NULL,'17000',NULL,'75176396200014','62.09Z','5499','02',3,'2024-06-13 10:38:30',1),
(119,'AGENCE DES TERRITOIRES DE LA VIENNE',' AVENUE RENE CASSIN',NULL,'CHASSENEUIL-DU-POITOU',NULL,'86360',NULL,'25860168100020','84.11Z','7379','21',3,'2024-06-13 10:39:31',1),
(120,'TERRA LACTA','2 RUE DE LA GLACIERE',NULL,'SURGERES',NULL,'17700',NULL,'77570963700034','46.33Z','6317','12',3,'2024-06-13 10:38:55',1),
(122,'ESSENTIA','23 RUE ANTOINE LAVOISIER',NULL,'AYTRE',NULL,'17440',NULL,'50259646300021','46.51Z','5710','03',3,'2024-06-13 10:41:02',1),
(123,'Université de La Rochelle','15 rue Flemming',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,3,NULL,1),
(126,'NASKIGO','21 CHEMIN DU PRIEURE',NULL,'LA ROCHELLE',NULL,'17000',NULL,'84253609600022','70.21Z','5499','01',3,'2024-06-13 10:43:53',1),
(127,'EIXA6 INFORMATIQUE','5 RUE LOUISE MICHEL',NULL,'MARENNES-HIERS-BROUAGE',NULL,'17320',NULL,'44219374400046','62.02A','5499','NN',3,'2024-06-13 10:44:20',1),
(230,'MAIANO INFORMATIQUE','21 RUE ALFONSE DE SAINTONGE',NULL,'LA ROCHELLE',NULL,'17000',NULL,'44400027700046','62.02A','5499','-',3,'2024-06-13 10:03:49',1),
(231,'HAPPY CASH ROCHEFORT',' AVENUE DES ERABLES',NULL,'SAINTE-HERMINE',NULL,'85210',NULL,'81417059300010','47.79Z','5499','-',3,'2024-06-13 14:59:55',1),
(232,'NATURE BOIS CONCEPT','1 ROUTE DE SURGERES',NULL,'TONNAY-CHARENTE',NULL,'17430',NULL,'74992710900050','47.91A','5710','12',3,'2024-06-13 15:09:13',1),
(233,'AROBAZ INFORMATIQUE','1 RUE AMPERE',NULL,'DOMPIERRE-SUR-MER',NULL,'17139',NULL,'49946828800026','95.11Z','5499','-',3,'2024-06-13 15:11:50',1),
(234,'LA GROSSE BOITE','65 RUE SAINT NICOLAS',NULL,'LA ROCHELLE',NULL,'17000',NULL,'51400062900014','47.65Z','5458','03',3,'2024-06-13 15:14:53',1),
(235,'COLLEGE EMILE COMBES','7 RUE DES CORDELIERS',NULL,'PONS',NULL,'17800',NULL,'19170389100017','85.31Z','7331','12',3,'2024-06-13 15:23:20',1),
(236,'NT Formation','3 IMPASSE DE L’EGLISE',NULL,'LE MUNG',NULL,'17350',NULL,'51117988900031','85.59A','1000','-',3,'2024-06-13 15:28:02',1),
(237,'LA GENERALE DE BUREAUTIQUE','14 RUE DU CHEMIN ROUGE',NULL,'NANTES',NULL,'44300',NULL,'35166785200039','33.12Z','5710','11',3,'2024-06-13 15:32:51',1),
(239,'TECHCITY (LDLC)','1 ALLEE TEISSERENC DE BORT',NULL,'LIMOGES',NULL,'87280',NULL,'81038417200039','47.41Z','5710','02',3,'2024-06-14 15:54:04',1),
(240,'ERUDO','147 RUE DE LIMOGES',NULL,'ANGOULEME',NULL,'16000',NULL,'81863790200011','62.02B','5710','02',3,'2024-06-14 16:34:30',1),
(241,'COMMUNE DE ROCHEFORT','119 RUE PIERRE LOTI',NULL,'ROCHEFORT',NULL,'17300',NULL,'21170299800017','84.11Z','7210','32',3,'2024-06-14 16:42:01',1),
(242,'ECOLE NATIONALE SUPERIEURE DE MECANIQUE ET D&#039;AEROTECHNIQUE DE POITIERS','1 AVENUE CLEMENT ADER',NULL,'CHASSENEUIL-DU-POITOU',NULL,'86360',NULL,'19860073600021','85.42Z','7383','31',3,'2024-06-14 16:44:31',1),
(243,'COMITE DEPARTEMENTAL UFOLEP',' AVENUE DE BOURGOGNE',NULL,'LA ROCHELLE',NULL,'17000',NULL,'44776686600027','93.12Z','9220','01',3,'2024-06-14 16:55:46',1),
(244,'OCEALIA','51 RUE PIERRE LOTI',NULL,'COGNAC',NULL,'16100',NULL,'77571559200314','46.21Z','6317','32',3,'2024-06-14 16:57:41',1),
(245,'AGC CER FRANCE CENTRE LIMOUSIN','2 AVENUE GEORGES GUINGOUIN',NULL,'PANAZOL',NULL,'87350',NULL,'31792629300067','69.20Z','9220','12',3,'2024-06-14 17:09:59',1);
/*!40000 ALTER TABLE `entreprise` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `Test_redondance` BEFORE INSERT ON `entreprise` FOR EACH ROW BEGIN
    DECLARE count_exist INT;
    
    
    SELECT COUNT(*) INTO count_exist FROM entreprise WHERE siret = NEW.siret;
    
    
    IF count_exist > 0 THEN
        SIGNAL SQLSTATE '45001'
        SET MESSAGE_TEXT = 'Cette entreprise existe déjà dans la base de données.';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `log_type`
--

DROP TABLE IF EXISTS `log_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_type`
--

LOCK TABLES `log_type` WRITE;
/*!40000 ALTER TABLE `log_type` DISABLE KEYS */;
INSERT INTO `log_type` VALUES
(1,'Ajout d\'un utilisateur',2),
(2,'Ajout d\'une entreprise manuellement',1),
(3,'Importer une entreprise depuis le siret',3),
(4,'Modification d\'une entreprise',2),
(5,'Envoie d\'un email',1),
(6,'Appel téléphonique',1),
(7,'Ajout d\'un mail (A changer probablement)',2),
(8,'Ajout d\'un stage',5),
(9,'Ajout d\'un contact',2),
(10,'Modification d\'un contact',1),
(11,'Modification d\'un stage',1),
(12,'Modification d\'un utilisateur',1),
(13,'Suppression d\'un utilisateur',0),
(14,'Confirmation d\'un contact',0),
(15,'Suppression d\'un contact',0),
(16,'Confirmation d\'une entreprise',0),
(17,'Suppression d\'une entreprise',0),
(18,'Suppression d\'un stage',0),
(19,'Changement de mot de passe',1);
/*!40000 ALTER TABLE `log_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idLogType` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `entite_type` varchar(50) DEFAULT NULL,
  `entite_id` int(11) DEFAULT NULL,
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idActivite` (`idLogType`),
  KEY `idUser` (`idUser`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=440 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES
(366,16,3,'entreprise',98,'null','null','2024-06-11 11:25:55'),
(364,16,3,'entreprise',126,'null','null','2024-06-11 11:24:27'),
(369,13,3,'profil',315,'null','null','2024-06-11 14:43:53'),
(368,13,3,'profil',319,'null','null','2024-06-11 14:43:43'),
(370,9,3,'contact',0,'null','{\"EmployeID\":1000000,\"nom\":\"Maitre\",\"prenom\":\"BaseAerienne\",\"email\":\"\",\"telephone\":\"\",\"fonction\":\"\",\"service\":null,\"EntrepriseID\":2,\"entreprise\":\"Base A\\u00e9rienne 721\",\"Entreprise_adresse\":\"  ZONE MILITAIRE\",\"Entreprise_codePostal\":\"17300\",\"Entreprise_ville\":\"ROCHEFORT\",\"UserID\":3,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"Created_date\":\"2024-06-13 12:17:06\",\"contact_valide\":1}','2024-06-13 12:17:06'),
(371,9,3,'contact',1000001,'null','{\"EmployeID\":1000001,\"nom\":\"Maitre\",\"prenom\":\"BaseAerienne\",\"email\":\"\",\"telephone\":\"\",\"fonction\":\"\",\"service\":null,\"EntrepriseID\":2,\"entreprise\":\"Base A\\u00e9rienne 721\",\"Entreprise_adresse\":\"  ZONE MILITAIRE\",\"Entreprise_codePostal\":\"17300\",\"Entreprise_ville\":\"ROCHEFORT\",\"UserID\":3,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"Created_date\":\"2024-06-13 12:18:09\",\"contact_valide\":1}','2024-06-13 12:18:09'),
(372,10,3,'contact',1000001,'{\"EmployeID\":1000001,\"nom\":\"Maitre\",\"prenom\":\"BaseAerienne\",\"email\":\"\",\"telephone\":\"\",\"fonction\":\"\",\"service\":null,\"EntrepriseID\":2,\"entreprise\":\"Base A\\u00e9rienne 721\",\"Entreprise_adresse\":\"  ZONE MILITAIRE\",\"Entreprise_codePostal\":\"17300\",\"Entreprise_ville\":\"ROCHEFORT\",\"UserID\":3,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"Created_date\":\"2024-06-13 12:18:09\",\"contact_valide\":1}','{\"EmployeID\":1000001,\"nom\":\"Maitre\",\"prenom\":\"BaseAerienne\",\"email\":\"oreu@grheou.com\",\"telephone\":\"\",\"fonction\":\"Militaire\",\"service\":\"Public\",\"EntrepriseID\":2,\"entreprise\":\"Base A\\u00e9rienne 721\",\"Entreprise_adresse\":\"  ZONE MILITAIRE\",\"Entreprise_codePostal\":\"17300\",\"Entreprise_ville\":\"ROCHEFORT\",\"UserID\":3,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"Created_date\":\"2024-06-13 12:18:09\",\"contact_valide\":1}','2024-06-13 12:25:49'),
(373,3,3,'entreprise',230,'null','{\"EntrepriseID\":230,\"siret\":\"35600000000048\",\"nomEntreprise\":\"LA POSTE\",\"adresse\":\"9 RUE DU COLONEL PIERRE AVIA\",\"ville\":\"PARIS\",\"codePostal\":\"75015\",\"naf\":\"53.10Z\",\"naf_libelle\":\"Activit\\u00e9s de poste dans le cadre d\'une obligation de service universel\",\"type\":\"SA nationale \\u00e0 conseil d\'administration \",\"effectif\":\"2 000 \\u00e0 4 999 salari\\u00e9s\",\"Created_Date\":\"2024-06-13 12:28:43\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 12:28:43'),
(374,3,3,'entreprise',231,'null','{\"EntrepriseID\":231,\"siret\":\"55212022200013\",\"nomEntreprise\":\"SOCIETE GENERALE\",\"adresse\":\"29 BOULEVARD HAUSSMANN\",\"ville\":\"PARIS\",\"codePostal\":\"75009\",\"naf\":\"64.19Z\",\"naf_libelle\":\"Autres interm\\u00e9diations mon\\u00e9taires\",\"type\":\"SA \\u00e0 conseil d\'administration (s.a.i.)\",\"effectif\":\"500 \\u00e0 999 salari\\u00e9s\",\"Created_Date\":\"2024-06-13 12:32:46\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 12:32:46'),
(375,4,3,'entreprise',2,'{\"EntrepriseID\":2,\"siret\":\"18170900700023\",\"nomEntreprise\":\"CERCLE DE LA BASE DE DEFENSE ROCHEFORT - COGNAC\",\"adresse\":\"  ZONE MILITAIRE\",\"ville\":\"ROCHEFORT\",\"codePostal\":\"17300\",\"naf\":\"56.29B\",\"naf_libelle\":\"Autres services de restauration n.c.a.\",\"type\":\"Etablissement public administratif, cercle et foyer dans les arm\\u00e9es\",\"effectif\":null,\"Created_Date\":\"2024-06-13 12:59:36\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":2,\"siret\":\"18170900700023\",\"nomEntreprise\":\"CERCLE DE LA BASE DE DEFENSE ROCHEFORT - COGNAC\",\"adresse\":\"  ZONE MILITAIRE\",\"ville\":\"ROCHEFORT\",\"codePostal\":\"17300\",\"naf\":\"56.29B\",\"naf_libelle\":\"Autres services de restauration n.c.a.\",\"type\":\"Etablissement public administratif, cercle et foyer dans les arm\\u00e9es\",\"effectif\":null,\"Created_Date\":\"2024-06-13 12:59:47\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 12:59:47'),
(376,4,3,'entreprise',2,'{\"EntrepriseID\":2,\"siret\":\"18170900700023\",\"nomEntreprise\":\"CERCLE DE LA BASE DE DEFENSE ROCHEFORT - COGNAC\",\"adresse\":\"  ZONE MILITAIRE\",\"ville\":\"ROCHEFORT\",\"codePostal\":\"17300\",\"naf\":\"56.29B\",\"naf_libelle\":\"Autres services de restauration n.c.a.\",\"type\":\"Etablissement public administratif, cercle et foyer dans les arm\\u00e9es\",\"effectif\":null,\"Created_Date\":\"2024-06-13 12:59:47\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":2,\"siret\":\"18170900700023\",\"nomEntreprise\":\"CERCLE DE LA BASE DE DEFENSE ROCHEFORT - COGNAC\",\"adresse\":\"  ZONE MILITAIRE\",\"ville\":\"ROCHEFORT\",\"codePostal\":\"17300\",\"naf\":\"56.29B\",\"naf_libelle\":\"Autres services de restauration n.c.a.\",\"type\":\"Etablissement public administratif, cercle et foyer dans les arm\\u00e9es\",\"effectif\":null,\"Created_Date\":\"2024-06-13 13:01:14\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 13:01:14'),
(377,4,3,'entreprise',2,'{\"EntrepriseID\":2,\"siret\":\"18170900700023\",\"nomEntreprise\":\"Base A\\u00e9rienne 721\",\"adresse\":\"  ZONE MILITAIRE\",\"ville\":\"ROCHEFORT\",\"codePostal\":\"17300\",\"naf\":\"56.29B\",\"naf_libelle\":\"Autres services de restauration n.c.a.\",\"type\":\"Etablissement public administratif, cercle et foyer dans les arm\\u00e9es\",\"effectif\":null,\"Created_Date\":\"2024-06-13 13:01:14\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":2,\"siret\":\"18170900700023\",\"nomEntreprise\":\"CERCLE DE LA BASE DE DEFENSE ROCHEFORT - COGNAC\",\"adresse\":\"  ZONE MILITAIRE\",\"ville\":\"ROCHEFORT\",\"codePostal\":\"17300\",\"naf\":\"56.29B\",\"naf_libelle\":\"Autres services de restauration n.c.a.\",\"type\":\"Etablissement public administratif, cercle et foyer dans les arm\\u00e9es\",\"effectif\":null,\"Created_Date\":\"2024-06-13 13:01:34\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 13:01:34'),
(378,1,3,'profil',322,'null','{\"id\":322,\"idTuteur\":null,\"nom\":\"GAILLARD\",\"prenom\":\"Test8\",\"email\":\"jfip@gheoru.com\",\"date_entree\":\"2024-06-13\",\"telephone\":\"\",\"spe\":\"\",\"classe\":null,\"promo\":\"2025\",\"login\":\"gaillard.test8\",\"password\":\"$2y$10$5rVcnLvluvb7iMFsqWpC3.5a0zuOoydKZLncj9MxPSjO8.4dX2IlW\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 13:06:34'),
(410,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:42'),
(409,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:39'),
(408,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:36'),
(407,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:31'),
(406,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:09'),
(405,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:01'),
(404,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:49:44'),
(403,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:49:08'),
(402,4,3,'Entreprise',15,'{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT \",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT SYSTEME\",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 15:39:28'),
(401,4,3,'Entreprise',15,'{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT SYSTEME\",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT \",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 15:39:25'),
(400,5,3,'Entreprise',15,'{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT \",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT SYSTEME\",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 15:38:46'),
(398,19,302,'302',0,'null','null','2024-06-13 15:31:14'),
(399,5,3,'Entreprise',15,'{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT SYSTEME\",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":15,\"siret\":\"34994332400096\",\"nomEntreprise\":\"ADEQUAT \",\"adresse\":\"54 AVENUE JEAN DE VIVONNE\",\"ville\":\"PISANY\",\"codePostal\":\"17600\",\"naf\":\"62.01Z\",\"naf_libelle\":\"Programmation informatique\",\"type\":\"Soci\\u00e9t\\u00e9 \\u00e0 responsabilit\\u00e9 limit\\u00e9e (sans autre indication)\",\"effectif\":\"20 \\u00e0 49 salari\\u00e9s\",\"Created_Date\":\"2024-06-10 19:29:57\",\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-13 15:38:44'),
(411,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:45'),
(412,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:47'),
(413,12,3,'profil',299,'{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":299,\"idTuteur\":40,\"nom\":\"BURAUD\",\"prenom\":\"mathis\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"buraud.mathis\",\"password\":\"$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 16:50:50'),
(414,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"SIO2\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:01:27'),
(415,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"SIO2\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"SIO2\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:01:30'),
(416,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"SIO2\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"SIO2\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:01:35'),
(417,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:09:36'),
(418,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:09:41'),
(419,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:09:44'),
(420,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:09:53'),
(421,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:10:18'),
(422,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:12:14'),
(423,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:12:27'),
(424,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:12:30'),
(425,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:12:33'),
(426,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:12:36'),
(427,12,3,'profil',289,'{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":289,\"idTuteur\":null,\"nom\":\"LESCOUZERE\",\"prenom\":\"matheo\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lescouzere.matheo\",\"password\":\"$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:12:39'),
(428,9,286,'contact',1000020,'null','{\"id\":1000020,\"idEntreprise\":93,\"nom\":\"zerzer\",\"prenom\":\"rerezrzer\",\"email\":\"\",\"telephone\":\"\",\"service\":null,\"fonction\":\"\",\"created_userid\":286,\"created_date\":\"2024-06-13 17:19:53\",\"contact_valide\":0}','2024-06-13 17:19:53'),
(429,12,3,'profil',298,'{\"id\":298,\"idTuteur\":null,\"nom\":\"BUIL\",\"prenom\":\"victor\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"buil.victor\",\"password\":\"$2y$10$oL1Hs1ChRjg.Z\\/ctUrW6\\/O3\\/mUNXNdotZfIzhfqpIRpQVJtOOr5Ye\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":298,\"idTuteur\":null,\"nom\":\"BUIL\",\"prenom\":\"victor\",\"email\":null,\"date_entree\":\"2022-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"buil.victor\",\"password\":\"$2y$10$oL1Hs1ChRjg.Z\\/ctUrW6\\/O3\\/mUNXNdotZfIzhfqpIRpQVJtOOr5Ye\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:28:55'),
(430,12,3,'profil',288,'{\"id\":288,\"idTuteur\":null,\"nom\":\"LE ROCHELEUIL  CHAILLE\",\"prenom\":\"alexis\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"Ancien \\u00e9tudiant\",\"promo\":\"2020\",\"login\":\"lerocheleuilchaille.alexis\",\"password\":\"$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":288,\"idTuteur\":null,\"nom\":\"LE ROCHELEUIL  CHAILLE\",\"prenom\":\"alexis\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lerocheleuilchaille.alexis\",\"password\":\"$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:33:05'),
(431,12,3,'profil',288,'{\"id\":288,\"idTuteur\":null,\"nom\":\"LE ROCHELEUIL  CHAILLE\",\"prenom\":\"alexis\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lerocheleuilchaille.alexis\",\"password\":\"$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":288,\"idTuteur\":null,\"nom\":\"LE ROCHELEUIL  CHAILLE\",\"prenom\":\"alexis\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lerocheleuilchaille.alexis\",\"password\":\"$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:33:19'),
(432,12,3,'profil',288,'{\"id\":288,\"idTuteur\":null,\"nom\":\"LE ROCHELEUIL  CHAILLE\",\"prenom\":\"alexis\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO1\",\"promo\":\"2025\",\"login\":\"lerocheleuilchaille.alexis\",\"password\":\"$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','{\"id\":288,\"idTuteur\":null,\"nom\":\"LE ROCHELEUIL  CHAILLE\",\"prenom\":\"alexis\",\"email\":null,\"date_entree\":\"2023-09-04\",\"telephone\":null,\"spe\":\"\",\"classe\":\"SIO2\",\"promo\":\"2024\",\"login\":\"lerocheleuilchaille.alexis\",\"password\":\"$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq\",\"password_reset\":1,\"statut\":\"Etudiant\",\"inactif\":0,\"dateFirstConn\":null,\"isDeleted\":0}','2024-06-13 17:33:21'),
(433,4,3,'Entreprise',41,'{\"EntrepriseID\":41,\"siret\":null,\"nomEntreprise\":\"Foyer d\\u00e9partemental Lannelongue\",\"adresse\":\"30 Bld du D\\u00e9barquement\",\"ville\":\"Saint Trojan Les Bains\",\"codePostal\":\"17370\",\"naf\":null,\"naf_libelle\":null,\"type\":null,\"effectif\":null,\"Created_Date\":null,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":41,\"siret\":null,\"nomEntreprise\":\"Foyer d\\u00e9partemental Lannelongu\",\"adresse\":\"30 Bld du D\\u00e9barquement\",\"ville\":\"Saint Trojan Les Bains\",\"codePostal\":\"17370\",\"naf\":null,\"naf_libelle\":null,\"type\":null,\"effectif\":null,\"Created_Date\":null,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-14 09:01:10'),
(434,4,3,'Entreprise',41,'{\"EntrepriseID\":41,\"siret\":null,\"nomEntreprise\":\"Foyer d\\u00e9partemental Lannelongu\",\"adresse\":\"30 Bld du D\\u00e9barquement\",\"ville\":\"Saint Trojan Les Bains\",\"codePostal\":\"17370\",\"naf\":null,\"naf_libelle\":null,\"type\":null,\"effectif\":null,\"Created_Date\":null,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','{\"EntrepriseID\":41,\"siret\":null,\"nomEntreprise\":\"Foyer d\\u00e9partemental Lannelongue\",\"adresse\":\"30 Bld du D\\u00e9barquement\",\"ville\":\"Saint Trojan Les Bains\",\"codePostal\":\"17370\",\"naf\":null,\"naf_libelle\":null,\"type\":null,\"effectif\":null,\"Created_Date\":null,\"Created_User\":\"Ornech Jean-Fran\\u00e7ois\",\"entreprise_valide\":1}','2024-06-14 09:01:13'),
(435,19,294,'294',0,'null','null','2024-06-14 12:13:31'),
(436,19,294,'294',0,'null','null','2024-06-14 12:48:14'),
(437,19,296,'296',0,'null','null','2024-06-14 12:55:08'),
(438,19,3,'3',0,'null','null','2024-06-14 13:01:16'),
(439,13,3,'profil',321,'null','null','2024-06-14 13:27:41');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `naf`
--

DROP TABLE IF EXISTS `naf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `naf` (
  `id` varchar(10) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `naf`
--

LOCK TABLES `naf` WRITE;
/*!40000 ALTER TABLE `naf` DISABLE KEYS */;
INSERT INTO `naf` VALUES
('01.11Z','Culture de céréales (à l\'exception du riz), de légumineuses et de graines oléagineuses'),
('01.12Z','Culture du riz'),
('01.13Z','Culture de légumes, de melons, de racines et de tubercules'),
('01.14Z','Culture de la canne à sucre'),
('01.15Z','Culture du tabac'),
('01.16Z','Culture de plantes à fibres'),
('01.19Z','Autres cultures non permanentes'),
('01.21Z','Culture de la vigne'),
('01.22Z','Culture de fruits tropicaux et subtropicaux'),
('01.23Z','Culture d\'agrumes'),
('01.24Z','Culture de fruits à pépins et à noyau'),
('01.25Z','Culture d\'autres fruits d\'arbres ou d\'arbustes et de fruits à coque'),
('01.26Z','Culture de fruits oléagineux'),
('01.27Z','Culture de plantes à boissons'),
('01.28Z','Culture de plantes à épices, aromatiques, médicinales et pharmaceutiques'),
('01.29Z','Autres cultures permanentes'),
('01.30Z','Reproduction de plantes'),
('01.41Z','Élevage de vaches laitières'),
('01.42Z','Élevage d\'autres bovins et de buffles'),
('01.43Z','Élevage de chevaux et d\'autres équidés'),
('01.44Z','Élevage de chameaux et d\'autres camélidés'),
('01.45Z','Élevage d\'ovins et de caprins'),
('01.46Z','Élevage de porcins'),
('01.47Z','Élevage de volailles'),
('01.49Z','Élevage d\'autres animaux'),
('01.50Z','Culture et élevage associés'),
('01.61Z','Activités de soutien aux cultures'),
('01.62Z','Activités de soutien à la production animale'),
('01.63Z','Traitement primaire des récoltes'),
('01.64Z','Traitement des semences'),
('01.70Z','Chasse, piégeage et services annexes'),
('02.10Z','Sylviculture et autres activités forestières'),
('02.20Z','Exploitation forestière'),
('02.30Z','Récolte de produits forestiers non ligneux poussant à l\'état sauvage'),
('02.40Z','Services de soutien à l\'exploitation forestière'),
('03.11Z','Pêche en mer'),
('03.12Z','Pêche en eau douce'),
('03.21Z','Aquaculture en mer'),
('03.22Z','Aquaculture en eau douce'),
('05.10Z','Extraction de houille'),
('05.20Z','Extraction de lignite'),
('06.10Z','Extraction de pétrole brut'),
('06.20Z','Extraction de gaz naturel'),
('07.10Z','Extraction de minerais de fer'),
('07.21Z','Extraction de minerais d\'uranium et de thorium'),
('07.29Z','Extraction d\'autres minerais de métaux non ferreux'),
('08.11Z','Extraction de pierres ornementales et de construction, de calcaire industriel, de gypse, de craie et d\'ardoise'),
('08.12Z','Exploitation de gravières et sablières, extraction d\'argiles et de kaolin'),
('08.91Z','Extraction des minéraux chimiques et d\'engrais minéraux'),
('08.92Z','Extraction de tourbe'),
('08.93Z','Production de sel'),
('08.99Z','Autres activités extractives n.c.a.'),
('09.10Z','Activités de soutien à l\'extraction d\'hydrocarbures'),
('09.90Z','Activités de soutien aux autres industries extractives'),
('10.11Z','Transformation et conservation de la viande de boucherie'),
('10.12Z','Transformation et conservation de la viande de volaille'),
('10.13A','Préparation industrielle de produits à base de viande'),
('10.13B','Charcuterie'),
('10.20Z','Transformation et conservation de poisson, de crustacés et de mollusques'),
('10.31Z','Transformation et conservation de pommes de terre'),
('10.32Z','Préparation de jus de fruits et légumes'),
('10.39A','Autre transformation et conservation de légumes'),
('10.39B','Transformation et conservation de fruits'),
('10.41A','Fabrication d\'huiles et graisses brutes'),
('10.41B','Fabrication d\'huiles et graisses raffinées'),
('10.42Z','Fabrication de margarine et graisses comestibles similaires'),
('10.51A','Fabrication de lait liquide et de produits frais'),
('10.51B','Fabrication de beurre'),
('10.51C','Fabrication de fromage'),
('10.51D','Fabrication d\'autres produits laitiers'),
('10.52Z','Fabrication de glaces et sorbets'),
('10.61A','Meunerie'),
('10.61B','Autres activités du travail des grains'),
('10.62Z','Fabrication de produits amylacés'),
('10.71A','Fabrication industrielle de pain et de pâtisserie fraîche'),
('10.71B','Cuisson de produits de boulangerie'),
('10.71C','Boulangerie et boulangerie-pâtisserie'),
('10.71D','Pâtisserie'),
('10.72Z','Fabrication de biscuits, biscottes et pâtisseries de conservation'),
('10.73Z','Fabrication de pâtes alimentaires'),
('10.81Z','Fabrication de sucre'),
('10.82Z','Fabrication de cacao, chocolat et de produits de confiserie'),
('10.83Z','Transformation du thé et du café'),
('10.84Z','Fabrication de condiments et assaisonnements'),
('10.85Z','Fabrication de plats préparés'),
('10.86Z','Fabrication d\'aliments homogénéisés et diététiques'),
('10.89Z','Fabrication d\'autres produits alimentaires n.c.a.'),
('10.91Z','Fabrication d\'aliments pour animaux de ferme'),
('10.92Z','Fabrication d\'aliments pour animaux de compagnie'),
('11.01Z','Production de boissons alcooliques distillées'),
('11.02A','Fabrication de vins effervescents'),
('11.02B','Vinification'),
('11.03Z','Fabrication de cidre et de vins de fruits'),
('11.04Z','Production d\'autres boissons fermentées non distillées'),
('11.05Z','Fabrication de bière'),
('11.06Z','Fabrication de malt'),
('11.07A','Industrie des eaux de table'),
('11.07B','Production de boissons rafraîchissantes'),
('12.00Z','Fabrication de produits à base de tabac'),
('13.10Z','Préparation de fibres textiles et filature'),
('13.20Z','Tissage'),
('13.30Z','Ennoblissement textile'),
('13.91Z','Fabrication d\'étoffes à mailles'),
('13.92Z','Fabrication d\'articles textiles, sauf habillement'),
('13.93Z','Fabrication de tapis et moquettes'),
('13.94Z','Fabrication de ficelles, cordes et filets'),
('13.95Z','Fabrication de non-tissés, sauf habillement'),
('13.96Z','Fabrication d\'autres textiles techniques et industriels'),
('13.99Z','Fabrication d\'autres textiles n.c.a.'),
('14.11Z','Fabrication de vêtements en cuir'),
('14.12Z','Fabrication de vêtements de travail'),
('14.13Z','Fabrication de vêtements de dessus'),
('14.14Z','Fabrication de vêtements de dessous'),
('14.19Z','Fabrication d\'autres vêtements et accessoires'),
('14.20Z','Fabrication d\'articles en fourrure'),
('14.31Z','Fabrication d\'articles chaussants à mailles'),
('14.39Z','Fabrication d\'autres articles à mailles'),
('15.11Z','Apprêt et tannage des cuirs ; préparation et teinture des fourrures'),
('15.12Z','Fabrication d\'articles de voyage, de maroquinerie et de sellerie'),
('15.20Z','Fabrication de chaussures'),
('16.10A','Sciage et rabotage du bois, hors imprégnation'),
('16.10B','Imprégnation du bois'),
('16.21Z','Fabrication de placage et de panneaux de bois'),
('16.22Z','Fabrication de parquets assemblés'),
('16.23Z','Fabrication de charpentes et d\'autres menuiseries'),
('16.24Z','Fabrication d\'emballages en bois'),
('16.29Z','Fabrication d\'objets divers en bois ; fabrication d\'objets en liège, vannerie et sparterie'),
('17.11Z','Fabrication de pâte à papier'),
('17.12Z','Fabrication de papier et de carton'),
('17.21A','Fabrication de carton ondulé'),
('17.21B','Fabrication de cartonnages'),
('17.21C','Fabrication d\'emballages en papier'),
('17.22Z','Fabrication d\'articles en papier à usage sanitaire ou domestique'),
('17.23Z','Fabrication d\'articles de papeterie'),
('17.24Z','Fabrication de papiers peints'),
('17.29Z','Fabrication d\'autres articles en papier ou en carton'),
('18.11Z','Imprimerie de journaux'),
('18.12Z','Autre imprimerie (labeur)'),
('18.13Z','Activités de pré-presse'),
('18.14Z','Reliure et activités connexes'),
('18.20Z','Reproduction d\'enregistrements'),
('19.10Z','Cokéfaction'),
('19.20Z','Raffinage du pétrole'),
('20.11Z','Fabrication de gaz industriels'),
('20.12Z','Fabrication de colorants et de pigments'),
('20.13A','Enrichissement et retraitement de matières nucléaires'),
('20.13B','Fabrication d\'autres produits chimiques inorganiques de base n.c.a.'),
('20.14Z','Fabrication d\'autres produits chimiques organiques de base'),
('20.15Z','Fabrication de produits azotés et d\'engrais'),
('20.16Z','Fabrication de matières plastiques de base'),
('20.17Z','Fabrication de caoutchouc synthétique'),
('20.20Z','Fabrication de pesticides et d\'autres produits agrochimiques'),
('20.30Z','Fabrication de peintures, vernis, encres et mastics'),
('20.41Z','Fabrication de savons, détergents et produits d\'entretien'),
('20.42Z','Fabrication de parfums et de produits pour la toilette'),
('20.51Z','Fabrication de produits explosifs'),
('20.52Z','Fabrication de colles'),
('20.53Z','Fabrication d\'huiles essentielles'),
('20.59Z','Fabrication d\'autres produits chimiques n.c.a.'),
('20.60Z','Fabrication de fibres artificielles ou synthétiques'),
('21.10Z','Fabrication de produits pharmaceutiques de base'),
('21.20Z','Fabrication de préparations pharmaceutiques'),
('22.11Z','Fabrication et rechapage de pneumatiques'),
('22.19Z','Fabrication d\'autres articles en caoutchouc'),
('22.21Z','Fabrication de plaques, feuilles, tubes et profilés en matières plastiques'),
('22.22Z','Fabrication d\'emballages en matières plastiques'),
('22.23Z','Fabrication d\'éléments en matières plastiques pour la construction'),
('22.29A','Fabrication de pièces techniques à base de matières plastiques'),
('22.29B','Fabrication de produits de consommation courante en matières plastiques'),
('23.11Z','Fabrication de verre plat'),
('23.12Z','Façonnage et transformation du verre plat'),
('23.13Z','Fabrication de verre creux'),
('23.14Z','Fabrication de fibres de verre'),
('23.19Z','Fabrication et façonnage d\'autres articles en verre, y compris verre technique'),
('23.20Z','Fabrication de produits réfractaires'),
('23.31Z','Fabrication de carreaux en céramique'),
('23.32Z','Fabrication de briques, tuiles et produits de construction, en terre cuite'),
('23.41Z','Fabrication d\'articles céramiques à usage domestique ou ornemental'),
('23.42Z','Fabrication d\'appareils sanitaires en céramique'),
('23.43Z','Fabrication d\'isolateurs et pièces isolantes en céramique'),
('23.44Z','Fabrication d\'autres produits céramiques à usage technique'),
('23.49Z','Fabrication d\'autres produits céramiques'),
('23.51Z','Fabrication de ciment'),
('23.52Z','Fabrication de chaux et plâtre'),
('23.61Z','Fabrication d\'éléments en béton pour la construction'),
('23.62Z','Fabrication d\'éléments en plâtre pour la construction'),
('23.63Z','Fabrication de béton prêt à l\'emploi'),
('23.64Z','Fabrication de mortiers et bétons secs'),
('23.65Z','Fabrication d\'ouvrages en fibre-ciment'),
('23.69Z','Fabrication d\'autres ouvrages en béton, en ciment ou en plâtre'),
('23.70Z','Taille, façonnage et finissage de pierres'),
('23.91Z','Fabrication de produits abrasifs'),
('23.99Z','Fabrication d\'autres produits minéraux non métalliques n.c.a.'),
('24.10Z','Sidérurgie'),
('24.20Z','Fabrication de tubes, tuyaux, profilés creux et accessoires correspondants en acier'),
('24.31Z','Étirage à froid de barres'),
('24.32Z','Laminage à froid de feuillards'),
('24.33Z','Profilage à froid par formage ou pliage'),
('24.34Z','Tréfilage à froid'),
('24.41Z','Production de métaux précieux'),
('24.42Z','Métallurgie de l\'aluminium'),
('24.43Z','Métallurgie du plomb, du zinc ou de l\'étain'),
('24.44Z','Métallurgie du cuivre'),
('24.45Z','Métallurgie des autres métaux non ferreux'),
('24.46Z','Élaboration et transformation de matières nucléaires'),
('24.51Z','Fonderie de fonte'),
('24.52Z','Fonderie d\'acier'),
('24.53Z','Fonderie de métaux légers'),
('24.54Z','Fonderie d\'autres métaux non ferreux'),
('25.11Z','Fabrication de structures métalliques et de parties de structures'),
('25.12Z','Fabrication de portes et fenêtres en métal'),
('25.21Z','Fabrication de radiateurs et de chaudières pour le chauffage central'),
('25.29Z','Fabrication d\'autres réservoirs, citernes et conteneurs métalliques'),
('25.30Z','Fabrication de générateurs de vapeur, à l\'exception des chaudières pour le chauffage central'),
('25.40Z','Fabrication d\'armes et de munitions'),
('25.50A','Forge, estampage, matriçage ; métallurgie des poudres'),
('25.50B','Découpage, emboutissage'),
('25.61Z','Traitement et revêtement des métaux'),
('25.62A','Décolletage'),
('25.62B','Mécanique industrielle'),
('25.71Z','Fabrication de coutellerie'),
('25.72Z','Fabrication de serrures et de ferrures'),
('25.73A','Fabrication de moules et modèles'),
('25.73B','Fabrication d\'autres outillages'),
('25.91Z','Fabrication de fûts et emballages métalliques similaires'),
('25.92Z','Fabrication d\'emballages métalliques légers'),
('25.93Z','Fabrication d\'articles en fils métalliques, de chaînes et de ressorts'),
('25.94Z','Fabrication de vis et de boulons'),
('25.99A','Fabrication d\'articles métalliques ménagers'),
('25.99B','Fabrication d\'autres articles métalliques'),
('26.11Z','Fabrication de composants électroniques'),
('26.12Z','Fabrication de cartes électroniques assemblées'),
('26.20Z','Fabrication d\'ordinateurs et d\'équipements périphériques'),
('26.30Z','Fabrication d\'équipements de communication'),
('26.40Z','Fabrication de produits électroniques grand public'),
('26.51A','Fabrication d\'équipements d\'aide à la navigation'),
('26.51B','Fabrication d\'instrumentation scientifique et technique'),
('26.52Z','Horlogerie'),
('26.60Z','Fabrication d\'équipements d\'irradiation médicale, d\'équipements électromédicaux et électrothérapeutiques'),
('26.70Z','Fabrication de matériels optique et photographique'),
('26.80Z','Fabrication de supports magnétiques et optiques'),
('27.11Z','Fabrication de moteurs, génératrices et transformateurs électriques'),
('27.12Z','Fabrication de matériel de distribution et de commande électrique'),
('27.20Z','Fabrication de piles et d\'accumulateurs électriques'),
('27.31Z','Fabrication de câbles de fibres optiques'),
('27.32Z','Fabrication d\'autres fils et câbles électroniques ou électriques'),
('27.33Z','Fabrication de matériel d\'installation électrique'),
('27.40Z','Fabrication d\'appareils d\'éclairage électrique'),
('27.51Z','Fabrication d\'appareils électroménagers'),
('27.52Z','Fabrication d\'appareils ménagers non électriques'),
('27.90Z','Fabrication d\'autres matériels électriques'),
('28.11Z','Fabrication de moteurs et turbines, à l\'exception des moteurs d\'avions et de véhicules'),
('28.12Z','Fabrication d\'équipements hydrauliques et pneumatiques'),
('28.13Z','Fabrication d\'autres pompes et compresseurs'),
('28.14Z','Fabrication d\'autres articles de robinetterie'),
('28.15Z','Fabrication d\'engrenages et d\'organes mécaniques de transmission'),
('28.21Z','Fabrication de fours et brûleurs'),
('28.22Z','Fabrication de matériel de levage et de manutention'),
('28.23Z','Fabrication de machines et d\'équipements de bureau (à l\'exception des ordinateurs et équipements périphériques)'),
('28.24Z','Fabrication d\'outillage portatif à moteur incorporé'),
('28.25Z','Fabrication d\'équipements aérauliques et frigorifiques industriels'),
('28.29A','Fabrication d\'équipements d\'emballage, de conditionnement et de pesage'),
('28.29B','Fabrication d\'autres machines d\'usage général'),
('28.30Z','Fabrication de machines agricoles et forestières'),
('28.41Z','Fabrication de machines-outils pour le travail des métaux'),
('28.49Z','Fabrication d\'autres machines-outils'),
('28.91Z','Fabrication de machines pour la métallurgie'),
('28.92Z','Fabrication de machines pour l\'extraction ou la construction'),
('28.93Z','Fabrication de machines pour l\'industrie agro-alimentaire'),
('28.94Z','Fabrication de machines pour les industries textiles'),
('28.95Z','Fabrication de machines pour les industries du papier et du carton'),
('28.96Z','Fabrication de machines pour le travail du caoutchouc ou des plastiques'),
('28.99A','Fabrication de machines d\'imprimerie'),
('28.99B','Fabrication d\'autres machines spécialisées'),
('29.10Z','Construction de véhicules automobiles'),
('29.20Z','Fabrication de carrosseries et remorques'),
('29.31Z','Fabrication d\'équipements électriques et électroniques automobiles'),
('29.32Z','Fabrication d\'autres équipements automobiles'),
('30.11Z','Construction de navires et de structures flottantes'),
('30.12Z','Construction de bateaux de plaisance'),
('30.20Z','Construction de locomotives et d\'autre matériel ferroviaire roulant'),
('30.30Z','Construction aéronautique et spatiale'),
('30.40Z','Construction de véhicules militaires de combat'),
('30.91Z','Fabrication de motocycles'),
('30.92Z','Fabrication de bicyclettes et de véhicules pour invalides'),
('30.99Z','Fabrication d\'autres équipements de transport n.c.a.'),
('31.01Z','Fabrication de meubles de bureau et de magasin'),
('31.02Z','Fabrication de meubles de cuisine'),
('31.03Z','Fabrication de matelas'),
('31.09A','Fabrication de sièges d\'ameublement d\'intérieur'),
('31.09B','Fabrication d\'autres meubles et industries connexes de l\'ameublement'),
('32.11Z','Frappe de monnaie'),
('32.12Z','Fabrication d\'articles de joaillerie et bijouterie'),
('32.13Z','Fabrication d\'articles de bijouterie fantaisie et articles similaires'),
('32.20Z','Fabrication d\'instruments de musique'),
('32.30Z','Fabrication d\'articles de sport'),
('32.40Z','Fabrication de jeux et jouets'),
('32.50A','Fabrication de matériel médico-chirurgical et dentaire'),
('32.50B','Fabrication de lunettes'),
('32.91Z','Fabrication d\'articles de brosserie'),
('32.99Z','Autres activités manufacturières n.c.a.'),
('33.11Z','Réparation d\'ouvrages en métaux'),
('33.12Z','Réparation de machines et équipements mécaniques'),
('33.13Z','Réparation de matériels électroniques et optiques'),
('33.14Z','Réparation d\'équipements électriques'),
('33.15Z','Réparation et maintenance navale'),
('33.16Z','Réparation et maintenance d\'aéronefs et d\'engins spatiaux'),
('33.17Z','Réparation et maintenance d\'autres équipements de transport'),
('33.19Z','Réparation d\'autres équipements'),
('33.20A','Installation de structures métalliques, chaudronnées et de tuyauterie'),
('33.20B','Installation de machines et équipements mécaniques'),
('33.20C','Conception d\'ensemble et assemblage sur site industriel d\'équipements de contrôle des processus industriels'),
('33.20D','Installation d\'équipements électriques, de matériels électroniques et optiques ou d\'autres matériels'),
('35.11Z','Production d\'électricité'),
('35.12Z','Transport d\'électricité'),
('35.13Z','Distribution d\'électricité'),
('35.14Z','Commerce d\'électricité'),
('35.21Z','Production de combustibles gazeux'),
('35.22Z','Distribution de combustibles gazeux par conduites'),
('35.23Z','Commerce de combustibles gazeux par conduites'),
('35.30Z','Production et distribution de vapeur et d\'air conditionné'),
('36.00Z','Captage, traitement et distribution d\'eau'),
('37.00Z','Collecte et traitement des eaux usées'),
('38.11Z','Collecte des déchets non dangereux'),
('38.12Z','Collecte des déchets dangereux'),
('38.21Z','Traitement et élimination des déchets non dangereux'),
('38.22Z','Traitement et élimination des déchets dangereux'),
('38.31Z','Démantèlement d\'épaves'),
('38.32Z','Récupération de déchets triés'),
('39.00Z','Dépollution et autres services de gestion des déchets'),
('41.10A','Promotion immobilière de logements'),
('41.10B','Promotion immobilière de bureaux'),
('41.10C','Promotion immobilière d\'autres bâtiments'),
('41.10D','Supports juridiques de programmes'),
('41.20A','Construction de maisons individuelles'),
('41.20B','Construction d\'autres bâtiments'),
('42.11Z','Construction de routes et autoroutes'),
('42.12Z','Construction de voies ferrées de surface et souterraines'),
('42.13A','Construction d\'ouvrages d\'art'),
('42.13B','Construction et entretien de tunnels'),
('42.21Z','Construction de réseaux pour fluides'),
('42.22Z','Construction de réseaux électriques et de télécommunications'),
('42.91Z','Construction d\'ouvrages maritimes et fluviaux'),
('42.99Z','Construction d\'autres ouvrages de génie civil n.c.a.'),
('43.11Z','Travaux de démolition'),
('43.12A','Travaux de terrassement courants et travaux préparatoires'),
('43.12B','Travaux de terrassement spécialisés ou de grande masse'),
('43.13Z','Forages et sondages'),
('43.21A','Travaux d\'installation électrique dans tous locaux'),
('43.21B','Travaux d\'installation électrique sur la voie publique'),
('43.22A','Travaux d\'installation d\'eau et de gaz en tous locaux'),
('43.22B','Travaux d\'installation d\'équipements thermiques et de climatisation'),
('43.29A','Travaux d\'isolation'),
('43.29B','Autres travaux d\'installation n.c.a.'),
('43.31Z','Travaux de plâtrerie'),
('43.32A','Travaux de menuiserie bois et PVC'),
('43.32B','Travaux de menuiserie métallique et serrurerie'),
('43.32C','Agencement de lieux de vente'),
('43.33Z','Travaux de revêtement des sols et des murs'),
('43.34Z','Travaux de peinture et vitrerie'),
('43.39Z','Autres travaux de finition'),
('43.91A','Travaux de charpente'),
('43.91B','Travaux de couverture par éléments'),
('43.99A','Travaux d\'étanchéification'),
('43.99B','Travaux de montage de structures métalliques'),
('43.99C','Travaux de maçonnerie générale et gros œuvre de bâtiment'),
('43.99D','Autres travaux spécialisés de construction'),
('43.99E','Location avec opérateur de matériel de construction'),
('45.11Z','Commerce de voitures et de véhicules automobiles légers'),
('45.19Z','Commerce d\'autres véhicules automobiles'),
('45.20A','Entretien et réparation de véhicules automobiles légers'),
('45.20B','Entretien et réparation d\'autres véhicules automobiles'),
('45.31Z','Commerce de gros d\'équipements automobiles'),
('45.32Z','Commerce de détail d\'équipements automobiles'),
('45.40Z','Commerce et réparation de motocycles'),
('46.11Z','Intermédiaires du commerce en matières premières agricoles, animaux vivants, matières premières textiles et produits semi-finis'),
('46.12A','Centrales d\'achat de carburant'),
('46.12B','Autres intermédiaires du commerce en combustibles, métaux, minéraux et produits chimiques'),
('46.13Z','Intermédiaires du commerce en bois et matériaux de construction'),
('46.14Z','Intermédiaires du commerce en machines, équipements industriels, navires et avions'),
('46.15Z','Intermédiaires du commerce en meubles, articles de ménage et quincaillerie'),
('46.16Z','Intermédiaires du commerce en textiles, habillement, fourrures, chaussures et articles en cuir'),
('46.17A','Centrales d\'achat alimentaires'),
('46.17B','Autres intermédiaires du commerce en denrées, boissons et tabac'),
('46.18Z','Intermédiaires spécialisés dans le commerce d\'autres produits spécifiques'),
('46.19A','Centrales d\'achat non alimentaires'),
('46.19B','Autres intermédiaires du commerce en produits divers'),
('46.21Z','Commerce de gros (commerce interentreprises) de céréales, de tabac non manufacturé, de semences et d\'aliments pour le bétail'),
('46.22Z','Commerce de gros (commerce interentreprises) de fleurs et plantes'),
('46.23Z','Commerce de gros (commerce interentreprises) d\'animaux vivants'),
('46.24Z','Commerce de gros (commerce interentreprises) de cuirs et peaux'),
('46.31Z','Commerce de gros (commerce interentreprises) de fruits et légumes'),
('46.32A','Commerce de gros (commerce interentreprises) de viandes de boucherie'),
('46.32B','Commerce de gros (commerce interentreprises) de produits à base de viande'),
('46.32C','Commerce de gros (commerce interentreprises) de volailles et gibier'),
('46.33Z','Commerce de gros (commerce interentreprises) de produits laitiers, œufs, huiles et matières grasses comestibles'),
('46.34Z','Commerce de gros (commerce interentreprises) de boissons'),
('46.35Z','Commerce de gros (commerce interentreprises) de produits à base de tabac'),
('46.36Z','Commerce de gros (commerce interentreprises) de sucre, chocolat et confiserie'),
('46.37Z','Commerce de gros (commerce interentreprises) de café, thé, cacao et épices'),
('46.38A','Commerce de gros (commerce interentreprises) de poissons, crustacés et mollusques'),
('46.38B','Commerce de gros (commerce interentreprises) alimentaire spécialisé divers'),
('46.39A','Commerce de gros (commerce interentreprises) de produits surgelés'),
('46.39B','Commerce de gros (commerce interentreprises) alimentaire non spécialisé'),
('46.41Z','Commerce de gros (commerce interentreprises) de textiles'),
('46.42Z','Commerce de gros (commerce interentreprises) d\'habillement et de chaussures'),
('46.43Z','Commerce de gros (commerce interentreprises) d\'appareils électroménagers'),
('46.44Z','Commerce de gros (commerce interentreprises) de vaisselle, verrerie et produits d\'entretien'),
('46.45Z','Commerce de gros (commerce interentreprises) de parfumerie et de produits de beauté'),
('46.46Z','Commerce de gros (commerce interentreprises) de produits pharmaceutiques'),
('46.47Z','Commerce de gros (commerce interentreprises) de meubles, de tapis et d\'appareils d\'éclairage'),
('46.48Z','Commerce de gros (commerce interentreprises) d\'articles d\'horlogerie et de bijouterie'),
('46.49Z','Commerce de gros (commerce interentreprises) d\'autres biens domestiques'),
('46.51Z','Commerce de gros (commerce interentreprises) d\'ordinateurs, d\'équipements informatiques périphériques et de logiciels'),
('46.52Z','Commerce de gros (commerce interentreprises) de composants et d\'équipements électroniques et de télécommunication'),
('46.61Z','Commerce de gros (commerce interentreprises) de matériel agricole'),
('46.62Z','Commerce de gros (commerce interentreprises) de machines-outils'),
('46.63Z','Commerce de gros (commerce interentreprises) de machines pour l\'extraction, la construction et le génie civil'),
('46.64Z','Commerce de gros (commerce interentreprises) de machines pour l\'industrie textile et l\'habillement'),
('46.65Z','Commerce de gros (commerce interentreprises) de mobilier de bureau'),
('46.66Z','Commerce de gros (commerce interentreprises) d\'autres machines et équipements de bureau'),
('46.69A','Commerce de gros (commerce interentreprises) de matériel électrique'),
('46.69B','Commerce de gros (commerce interentreprises) de fournitures et équipements industriels divers'),
('46.69C','Commerce de gros (commerce interentreprises) de fournitures et équipements divers pour le commerce et les services'),
('46.71Z','Commerce de gros (commerce interentreprises) de combustibles et de produits annexes'),
('46.72Z','Commerce de gros (commerce interentreprises) de minerais et métaux'),
('46.73A','Commerce de gros (commerce interentreprises) de bois et de matériaux de construction'),
('46.73B','Commerce de gros (commerce interentreprises) d\'appareils sanitaires et de produits de décoration'),
('46.74A','Commerce de gros (commerce interentreprises) de quincaillerie'),
('46.74B','Commerce de gros (commerce interentreprises) de fournitures pour la plomberie et le chauffage'),
('46.75Z','Commerce de gros (commerce interentreprises) de produits chimiques'),
('46.76Z','Commerce de gros (commerce interentreprises) d\'autres produits intermédiaires'),
('46.77Z','Commerce de gros (commerce interentreprises) de déchets et débris'),
('46.90Z','Commerce de gros (commerce interentreprises) non spécialisé'),
('47.11A','Commerce de détail de produits surgelés'),
('47.11B','Commerce d\'alimentation générale'),
('47.11C','Supérettes'),
('47.11D','Supermarchés'),
('47.11E','Magasins multi-commerces'),
('47.11F','Hypermarchés'),
('47.19A','Grands magasins'),
('47.19B','Autres commerces de détail en magasin non spécialisé'),
('47.21Z','Commerce de détail de fruits et légumes en magasin spécialisé'),
('47.22Z','Commerce de détail de viandes et de produits à base de viande en magasin spécialisé'),
('47.23Z','Commerce de détail de poissons, crustacés et mollusques en magasin spécialisé'),
('47.24Z','Commerce de détail de pain, pâtisserie et confiserie en magasin spécialisé'),
('47.25Z','Commerce de détail de boissons en magasin spécialisé'),
('47.26Z','Commerce de détail de produits à base de tabac en magasin spécialisé'),
('47.29Z','Autres commerces de détail alimentaires en magasin spécialisé'),
('47.30Z','Commerce de détail de carburants en magasin spécialisé'),
('47.41Z','Commerce de détail d\'ordinateurs, d\'unités périphériques et de logiciels en magasin spécialisé'),
('47.42Z','Commerce de détail de matériels de télécommunication en magasin spécialisé'),
('47.43Z','Commerce de détail de matériels audio et vidéo en magasin spécialisé'),
('47.51Z','Commerce de détail de textiles en magasin spécialisé'),
('47.52A','Commerce de détail de quincaillerie, peintures et verres en petites surfaces (moins de 400 m²)'),
('47.52B','Commerce de détail de quincaillerie, peintures et verres en grandes surfaces (400 m² et plus)'),
('47.53Z','Commerce de détail de tapis, moquettes et revêtements de murs et de sols en magasin spécialisé'),
('47.54Z','Commerce de détail d\'appareils électroménagers en magasin spécialisé'),
('47.59A','Commerce de détail de meubles'),
('47.59B','Commerce de détail d\'autres équipements du foyer'),
('47.61Z','Commerce de détail de livres en magasin spécialisé'),
('47.62Z','Commerce de détail de journaux et papeterie en magasin spécialisé'),
('47.63Z','Commerce de détail d\'enregistrements musicaux et vidéo en magasin spécialisé'),
('47.64Z','Commerce de détail d\'articles de sport en magasin spécialisé'),
('47.65Z','Commerce de détail de jeux et jouets en magasin spécialisé'),
('47.71Z','Commerce de détail d\'habillement en magasin spécialisé'),
('47.72A','Commerce de détail de la chaussure'),
('47.72B','Commerce de détail de maroquinerie et d\'articles de voyage'),
('47.73Z','Commerce de détail de produits pharmaceutiques en magasin spécialisé'),
('47.74Z','Commerce de détail d\'articles médicaux et orthopédiques en magasin spécialisé'),
('47.75Z','Commerce de détail de parfumerie et de produits de beauté en magasin spécialisé'),
('47.76Z','Commerce de détail de fleurs, plantes, graines, engrais, animaux de compagnie et aliments pour ces animaux en magasin spécialisé'),
('47.77Z','Commerce de détail d\'articles d\'horlogerie et de bijouterie en magasin spécialisé'),
('47.78A','Commerces de détail d\'optique'),
('47.78B','Commerces de détail de charbons et combustibles'),
('47.78C','Autres commerces de détail spécialisés divers'),
('47.79Z','Commerce de détail de biens d\'occasion en magasin'),
('47.81Z','Commerce de détail alimentaire sur éventaires et marchés'),
('47.82Z','Commerce de détail de textiles, d\'habillement et de chaussures sur éventaires et marchés'),
('47.89Z','Autres commerces de détail sur éventaires et marchés'),
('47.91A','Vente à distance sur catalogue général'),
('47.91B','Vente à distance sur catalogue spécialisé'),
('47.99A','Vente à domicile'),
('47.99B','Vente par automates et autres commerces de détail hors magasin, éventaires ou marchés n.c.a.'),
('49.10Z','Transport ferroviaire interurbain de voyageurs'),
('49.20Z','Transports ferroviaires de fret'),
('49.31Z','Transports urbains et suburbains de voyageurs'),
('49.32Z','Transports de voyageurs par taxis'),
('49.39A','Transports routiers réguliers de voyageurs'),
('49.39B','Autres transports routiers de voyageurs'),
('49.39C','Téléphériques et remontées mécaniques'),
('49.41A','Transports routiers de fret interurbains'),
('49.41B','Transports routiers de fret de proximité'),
('49.41C','Location de camions avec chauffeur'),
('49.42Z','Services de déménagement'),
('49.50Z','Transports par conduites'),
('50.10Z','Transports maritimes et côtiers de passagers'),
('50.20Z','Transports maritimes et côtiers de fret'),
('50.30Z','Transports fluviaux de passagers'),
('50.40Z','Transports fluviaux de fret'),
('51.10Z','Transports aériens de passagers'),
('51.21Z','Transports aériens de fret'),
('51.22Z','Transports spatiaux'),
('52.10A','Entreposage et stockage frigorifique'),
('52.10B','Entreposage et stockage non frigorifique'),
('52.21Z','Services auxiliaires des transports terrestres'),
('52.22Z','Services auxiliaires des transports par eau'),
('52.23Z','Services auxiliaires des transports aériens'),
('52.24A','Manutention portuaire'),
('52.24B','Manutention non portuaire'),
('52.29A','Messagerie, fret express'),
('52.29B','Affrètement et organisation des transports'),
('53.10Z','Activités de poste dans le cadre d\'une obligation de service universel'),
('53.20Z','Autres activités de poste et de courrier'),
('55.10Z','Hôtels et hébergement similaire'),
('55.20Z','Hébergement touristique et autre hébergement de courte durée'),
('55.30Z','Terrains de camping et parcs pour caravanes ou véhicules de loisirs'),
('55.90Z','Autres hébergements'),
('56.10A','Restauration traditionnelle'),
('56.10B','Cafétérias et autres libres-services'),
('56.10C','Restauration de type rapide'),
('56.21Z','Services des traiteurs'),
('56.29A','Restauration collective sous contrat'),
('56.29B','Autres services de restauration n.c.a.'),
('56.30Z','Débits de boissons'),
('58.11Z','Édition de livres'),
('58.12Z','Édition de répertoires et de fichiers d\'adresses'),
('58.13Z','Édition de journaux'),
('58.14Z','Édition de revues et périodiques'),
('58.19Z','Autres activités d\'édition'),
('58.21Z','Édition de jeux électroniques'),
('58.29A','Édition de logiciels système et de réseau'),
('58.29B','Édition de logiciels outils de développement et de langages'),
('58.29C','Édition de logiciels applicatifs'),
('59.11A','Production de films et de programmes pour la télévision'),
('59.11B','Production de films institutionnels et publicitaires'),
('59.11C','Production de films pour le cinéma'),
('59.12Z','Post-production de films cinématographiques, de vidéo et de programmes de télévision'),
('59.13A','Distribution de films cinématographiques'),
('59.13B','Édition et distribution vidéo'),
('59.14Z','Projection de films cinématographiques'),
('59.20Z','Enregistrement sonore et édition musicale'),
('60.10Z','Édition et diffusion de programmes radio'),
('60.20A','Édition de chaînes généralistes'),
('60.20B','Édition de chaînes thématiques'),
('61.10Z','Télécommunications filaires'),
('61.20Z','Télécommunications sans fil'),
('61.30Z','Télécommunications par satellite'),
('61.90Z','Autres activités de télécommunication'),
('62.01Z','Programmation informatique'),
('62.02A','Conseil en systèmes et logiciels informatiques'),
('62.02B','Tierce maintenance de systèmes et d\'applications informatiques'),
('62.03Z','Gestion d\'installations informatiques'),
('62.09Z','Autres activités informatiques'),
('63.11Z','Traitement de données, hébergement et activités connexes'),
('63.12Z','Portails Internet'),
('63.91Z','Activités des agences de presse'),
('63.99Z','Autres services d\'information n.c.a.'),
('64.11Z','Activités de banque centrale'),
('64.19Z','Autres intermédiations monétaires'),
('64.20Z','Activités des sociétés holding'),
('64.30Z','Fonds de placement et entités financières similaires'),
('64.91Z','Crédit-bail'),
('64.92Z','Autre distribution de crédit'),
('64.99Z','Autres activités des services financiers, hors assurance et caisses de retraite, n.c.a.'),
('65.11Z','Assurance vie'),
('65.12Z','Autres assurances'),
('65.20Z','Réassurance'),
('65.30Z','Caisses de retraite'),
('66.11Z','Administration de marchés financiers'),
('66.12Z','Courtage de valeurs mobilières et de marchandises'),
('66.19A','Supports juridiques de gestion de patrimoine mobilier'),
('66.19B','Autres activités auxiliaires de services financiers, hors assurance et caisses de retraite, n.c.a.'),
('66.21Z','Évaluation des risques et dommages'),
('66.22Z','Activités des agents et courtiers d\'assurances'),
('66.29Z','Autres activités auxiliaires d\'assurance et de caisses de retraite'),
('66.30Z','Gestion de fonds'),
('68.10Z','Activités des marchands de biens immobiliers'),
('68.20A','Location de logements'),
('68.20B','Location de terrains et d\'autres biens immobiliers'),
('68.31Z','Agences immobilières'),
('68.32A','Administration d\'immeubles et autres biens immobiliers'),
('68.32B','Supports juridiques de gestion de patrimoine immobilier'),
('69.10Z','Activités juridiques'),
('69.20Z','Activités comptables'),
('70.10Z','Activités des sièges sociaux'),
('70.21Z','Conseil en relations publiques et communication'),
('70.22Z','Conseil pour les affaires et autres conseils de gestion'),
('71.11Z','Activités d\'architecture'),
('71.12A','Activité des géomètres'),
('71.12B','Ingénierie, études techniques'),
('71.20A','Contrôle technique automobile'),
('71.20B','Analyses, essais et inspections techniques'),
('72.11Z','Recherche-développement en biotechnologie'),
('72.19Z','Recherche-développement en autres sciences physiques et naturelles'),
('72.20Z','Recherche-développement en sciences humaines et sociales'),
('73.11Z','Activités des agences de publicité'),
('73.12Z','Régie publicitaire de médias'),
('73.20Z','Études de marché et sondages'),
('74.10Z','Activités spécialisées de design'),
('74.20Z','Activités photographiques'),
('74.30Z','Traduction et interprétation'),
('74.90A','Activité des économistes de la construction'),
('74.90B','Activités spécialisées, scientifiques et techniques diverses'),
('75.00Z','Activités vétérinaires'),
('77.11A','Location de courte durée de voitures et de véhicules automobiles légers'),
('77.11B','Location de longue durée de voitures et de véhicules automobiles légers'),
('77.12Z','Location et location-bail de camions'),
('77.21Z','Location et location-bail d\'articles de loisirs et de sport'),
('77.22Z','Location de vidéocassettes et disques vidéo'),
('77.29Z','Location et location-bail d\'autres biens personnels et domestiques'),
('77.31Z','Location et location-bail de machines et équipements agricoles'),
('77.32Z','Location et location-bail de machines et équipements pour la construction'),
('77.33Z','Location et location-bail de machines de bureau et de matériel informatique'),
('77.34Z','Location et location-bail de matériels de transport par eau'),
('77.35Z','Location et location-bail de matériels de transport aérien'),
('77.39Z','Location et location-bail d\'autres machines, équipements et biens matériels n.c.a.'),
('77.40Z','Location-bail de propriété intellectuelle et de produits similaires, à l\'exception des œuvres soumises à copyright'),
('78.10Z','Activités des agences de placement de main-d\'œuvre'),
('78.20Z','Activités des agences de travail temporaire'),
('78.30Z','Autre mise à disposition de ressources humaines'),
('79.11Z','Activités des agences de voyage'),
('79.12Z','Activités des voyagistes'),
('79.90Z','Autres services de réservation et activités connexes'),
('80.10Z','Activités de sécurité privée'),
('80.20Z','Activités liées aux systèmes de sécurité'),
('80.30Z','Activités d\'enquête'),
('81.10Z','Activités combinées de soutien lié aux bâtiments'),
('81.21Z','Nettoyage courant des bâtiments'),
('81.22Z','Autres activités de nettoyage des bâtiments et nettoyage industriel'),
('81.29A','Désinfection, désinsectisation, dératisation'),
('81.29B','Autres activités de nettoyage n.c.a.'),
('81.30Z','Services d\'aménagement paysager'),
('82.11Z','Services administratifs combinés de bureau'),
('82.19Z','Photocopie, préparation de documents et autres activités spécialisées de soutien de bureau'),
('82.20Z','Activités de centres d\'appels'),
('82.30Z','Organisation de foires, salons professionnels et congrès'),
('82.91Z','Activités des agences de recouvrement de factures et des sociétés d\'information financière sur la clientèle'),
('82.92Z','Activités de conditionnement'),
('82.99Z','Autres activités de soutien aux entreprises n.c.a.'),
('84.11Z','Administration publique générale'),
('84.12Z','Administration publique (tutelle) de la santé, de la formation, de la culture et des services sociaux, autre que sécurité sociale'),
('84.13Z','Administration publique (tutelle) des activités économiques'),
('84.21Z','Affaires étrangères'),
('84.22Z','Défense'),
('84.23Z','Justice'),
('84.24Z','Activités d\'ordre public et de sécurité'),
('84.25Z','Services du feu et de secours'),
('84.30A','Activités générales de sécurité sociale'),
('84.30B','Gestion des retraites complémentaires'),
('84.30C','Distribution sociale de revenus'),
('85.10Z','Enseignement pré-primaire'),
('85.20Z','Enseignement primaire'),
('85.31Z','Enseignement secondaire général'),
('85.32Z','Enseignement secondaire technique ou professionnel'),
('85.41Z','Enseignement post-secondaire non supérieur'),
('85.42Z','Enseignement supérieur'),
('85.51Z','Enseignement de disciplines sportives et d\'activités de loisirs'),
('85.52Z','Enseignement culturel'),
('85.53Z','Enseignement de la conduite'),
('85.59A','Formation continue d\'adultes'),
('85.59B','Autres enseignements'),
('85.60Z','Activités de soutien à l\'enseignement'),
('86.10Z','Activités hospitalières'),
('86.21Z','Activité des médecins généralistes'),
('86.22A','Activités de radiodiagnostic et de radiothérapie'),
('86.22B','Activités chirurgicales'),
('86.22C','Autres activités des médecins spécialistes'),
('86.23Z','Pratique dentaire'),
('86.90A','Ambulances'),
('86.90B','Laboratoires d\'analyses médicales'),
('86.90C','Centres de collecte et banques d\'organes'),
('86.90D','Activités des infirmiers et des sages-femmes'),
('86.90E','Activités des professionnels de la rééducation, de l\'appareillage et des pédicures-podologues'),
('86.90F','Activités de santé humaine non classées ailleurs'),
('87.10A','Hébergement médicalisé pour personnes âgées'),
('87.10B','Hébergement médicalisé pour enfants handicapés'),
('87.10C','Hébergement médicalisé pour adultes handicapés et autre hébergement médicalisé'),
('87.20A','Hébergement social pour handicapés mentaux et malades mentaux'),
('87.20B','Hébergement social pour toxicomanes'),
('87.30A','Hébergement social pour personnes âgées'),
('87.30B','Hébergement social pour handicapés physiques'),
('87.90A','Hébergement social pour enfants en difficultés'),
('87.90B','Hébergement social pour adultes et familles en difficultés et autre hébergement social'),
('88.10A','Aide à domicile'),
('88.10B','Accueil ou accompagnement sans hébergement d\'adultes handicapés ou de personnes âgées'),
('88.10C','Aide par le travail'),
('88.91A','Accueil de jeunes enfants'),
('88.91B','Accueil ou accompagnement sans hébergement d\'enfants handicapés'),
('88.99A','Autre accueil ou accompagnement sans hébergement d\'enfants et d\'adolescents'),
('88.99B','Action sociale sans hébergement n.c.a.'),
('90.01Z','Arts du spectacle vivant'),
('90.02Z','Activités de soutien au spectacle vivant'),
('90.03A','Création artistique relevant des arts plastiques'),
('90.03B','Autre création artistique'),
('90.04Z','Gestion de salles de spectacles'),
('91.01Z','Gestion des bibliothèques et des archives'),
('91.02Z','Gestion des musées'),
('91.03Z','Gestion des sites et monuments historiques et des attractions touristiques similaires'),
('91.04Z','Gestion des jardins botaniques et zoologiques et des réserves naturelles'),
('92.00Z','Organisation de jeux de hasard et d\'argent'),
('93.11Z','Gestion d\'installations sportives'),
('93.12Z','Activités de clubs de sports'),
('93.13Z','Activités des centres de culture physique'),
('93.19Z','Autres activités liées au sport'),
('93.21Z','Activités des parcs d\'attractions et parcs à thèmes'),
('93.29Z','Autres activités récréatives et de loisirs'),
('94.11Z','Activités des organisations patronales et consulaires'),
('94.12Z','Activités des organisations professionnelles'),
('94.20Z','Activités des syndicats de salariés'),
('94.91Z','Activités des organisations religieuses'),
('94.92Z','Activités des organisations politiques'),
('94.99Z','Autres organisations fonctionnant par adhésion volontaire'),
('95.11Z','Réparation d\'ordinateurs et d\'équipements périphériques'),
('95.12Z','Réparation d\'équipements de communication'),
('95.21Z','Réparation de produits électroniques grand public'),
('95.22Z','Réparation d\'appareils électroménagers et d\'équipements pour la maison et le jardin'),
('95.23Z','Réparation de chaussures et d\'articles en cuir'),
('95.24Z','Réparation de meubles et d\'équipements du foyer'),
('95.25Z','Réparation d\'articles d\'horlogerie et de bijouterie'),
('95.29Z','Réparation d\'autres biens personnels et domestiques'),
('96.01A','Blanchisserie-teinturerie de gros'),
('96.01B','Blanchisserie-teinturerie de détail'),
('96.02A','Coiffure'),
('96.02B','Soins de beauté'),
('96.03Z','Services funéraires'),
('96.04Z','Entretien corporel'),
('96.09Z','Autres services personnels n.c.a.'),
('97.00Z','Activités des ménages en tant qu\'employeurs de personnel domestique'),
('98.10Z','Activités indifférenciées des ménages en tant que producteurs de biens pour usage propre'),
('98.20Z','Activités indifférenciées des ménages en tant que producteurs de services pour usage propre'),
('99.00Z','Activités des organisations et organismes extraterritoriaux');
/*!40000 ALTER TABLE `naf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `professeurs`
--

DROP TABLE IF EXISTS `professeurs`;
/*!50001 DROP VIEW IF EXISTS `professeurs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `professeurs` AS SELECT
 1 AS `id`,
  1 AS `idTuteur`,
  1 AS `idClasse`,
  1 AS `nom`,
  1 AS `prenom`,
  1 AS `email`,
  1 AS `date_entree`,
  1 AS `telephone`,
  1 AS `spe`,
  1 AS `classe`,
  1 AS `promo`,
  1 AS `login`,
  1 AS `password`,
  1 AS `password_reset`,
  1 AS `statut`,
  1 AS `inactif`,
  1 AS `dateFirstConn`,
  1 AS `isDeleted` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `stage`
--

DROP TABLE IF EXISTS `stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEntreprise` int(11) DEFAULT NULL,
  `idMaitreDeStage` int(11) DEFAULT NULL,
  `idEtudiant` int(11) DEFAULT NULL,
  `idProfesseur` int(11) DEFAULT NULL,
  `classe` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idMaitreDeStage` (`idMaitreDeStage`),
  KEY `idEtudiant` (`idEtudiant`),
  KEY `stage_user_FK` (`idProfesseur`),
  CONSTRAINT `Stage_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`id`),
  CONSTRAINT `Stage_ibfk_2` FOREIGN KEY (`idMaitreDeStage`) REFERENCES `employe` (`id`),
  CONSTRAINT `Stage_ibfk_3` FOREIGN KEY (`idEtudiant`) REFERENCES `user` (`id`),
  CONSTRAINT `stage_user_FK` FOREIGN KEY (`idProfesseur`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage`
--

LOCK TABLES `stage` WRITE;
/*!40000 ALTER TABLE `stage` DISABLE KEYS */;
INSERT INTO `stage` VALUES
(8,231,1,294,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(9,232,2,287,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(10,233,3,284,NULL,'SIO1','','2024-05-13','2024-06-24'),
(11,234,4,283,NULL,'SIO1','','2024-05-13','2024-06-24'),
(12,16,5,292,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(13,127,6,296,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(14,235,7,288,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(15,235,7,289,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(16,236,8,290,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(17,236,8,286,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(18,237,9,285,NULL,'SIO1',NULL,'2024-05-13','2024-06-24'),
(20,236,8,321,NULL,'SIO1','','2024-05-27','2024-07-08'),
(21,239,10,297,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(22,240,11,298,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(23,241,12,304,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(24,242,13,308,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(25,31,14,300,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(26,243,15,309,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(27,244,16,311,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(28,102,17,312,NULL,'SIO2',NULL,'2024-01-08','2024-02-19'),
(29,245,18,323,NULL,'SIO2',NULL,'2024-01-08','2024-02-19');
/*!40000 ALTER TABLE `stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTuteur` int(11) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
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
  `inactif` tinyint(1) DEFAULT 0,
  `dateFirstConn` datetime DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idTuteur` (`idTuteur`),
  KEY `idClasse` (`idClasse`),
  CONSTRAINT `idTuteur` FOREIGN KEY (`idTuteur`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(-1,NULL,NULL,'ANONYMOUS','Anonymous',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,1),
(3,NULL,NULL,'ORNECH','Jean-François','jean-francois-ornech@ac-poitiers.fr',NULL,'06 06 06 06 06',NULL,'Enseignant','','jfornech','$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q',0,'Professeur',0,'2024-06-06 09:55:04',0),
(18,40,NULL,'DENIS ARONIS','Patrice','mail@mail.local',NULL,'',NULL,'Enseignant','','patrice','$2y$10$hR2DosUGTpgg/z4yy3X.vupNh9Rg7ri9rw3JIa8uJLzInmxLhBnLW',1,'Professeur',0,NULL,0),
(20,NULL,NULL,'Etudiant','etudiant de test','',NULL,'',NULL,'SIO1','2025','sio','$2y$10$KeXbUulOY1uxBUdr.5zkDeTCDqLJHGYU8DF11Ji5PmUcBe79RI0Tq',0,'Etudiant',1,NULL,0),
(40,NULL,NULL,'CASTILLO','Jean-Christophe','',NULL,'',NULL,'Enseignant','','castillojc','$2y$10$4SOI336Uo8PxWwGtwXMrTOMkOd4DgtQGOifw7fEq8/SWax8BeUrCy',1,'Professeur',0,NULL,0),
(41,NULL,NULL,'BOUCHEREAU','Bertrand','',NULL,'',NULL,'Enseignant','','bouchereaub','$2y$10$HO4yuuq58SJBqqxnGzksCuvm4FWDBR6nWc3n6ZJHyNHdDEk2tBAK6',1,'Professeur',0,NULL,0),
(43,NULL,NULL,'ANONYMOUS','Anonymous',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,1),
(44,NULL,NULL,'ANONYMOUS','Anonymous',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,1),
(283,NULL,NULL,'BARBIER','loann',NULL,'2023-09-04',NULL,'SLAM','SIO1','2025','barbier.loann','$2y$10$LgIb4/JPIgLjEKcEQGM31.bhNcPx7ifu40zjg3AXb7uOE1EWOit0u',1,'Etudiant',0,NULL,0),
(284,NULL,NULL,'DEGRAUW VERRY','axel',NULL,'2023-09-04',NULL,'','SIO1','2025','degrauwverry.axel','$2y$10$v0pV6vOxh2UtLG7U5X5d0u5EJGszxWZE.x84Lgf1PPMUUMDtMCy4i',1,'Etudiant',0,NULL,0),
(285,3,NULL,'ERNOULT','gabin',NULL,'2023-09-04',NULL,'','SIO1','2025','ernoult.gabin','$2y$10$fcd96wY6oCbEWKjQ9ezSL.IWLaLP7aFTUj8yJbO.0FXh.U.whOctG',1,'Etudiant',0,NULL,0),
(286,3,NULL,'GAILLARD','logan','logangaillard1@gmail.com','2023-09-04','07 00 00 00 00','SLAM','SIO1','2025','gaillard.logan','$2y$10$ccKA7y5uJfUz2pXHdZJPhegQ5hwgwfB8549LVd8NNdO7yUxjOjB0y',0,'Etudiant',0,'2024-06-06 12:32:03',0),
(287,3,NULL,'KOSIOREK','alexandre',NULL,'2023-09-04',NULL,'SISR','SIO1','2025','kosiorek.alexandre','$2y$10$ZAmJ.kVgyJqEC/rVX.8vGeq6fXYIxjUPf/V2S9s5YZhJS5ntlcvmy',1,'Etudiant',0,NULL,0),
(288,NULL,NULL,'LE ROCHELEUIL  CHAILLE','alexis',NULL,'2023-09-04',NULL,'','SIO1','2025','lerocheleuilchaille.alexis','$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq',1,'Etudiant',0,NULL,0),
(289,NULL,NULL,'LESCOUZERE','matheo',NULL,'2023-09-04',NULL,'','SIO1','2025','lescouzere.matheo','$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C',1,'Etudiant',0,NULL,0),
(290,3,NULL,'MANUKYAN','astghik',NULL,'2023-09-04',NULL,'SLAM','SIO1','2025','manukyan.astghik','$2y$10$PNd9ccVd.omSeZvPR9dabOCZdqJFXCI0JwE.MLzrxnN/Q6Nu3QemC',1,'Etudiant',0,NULL,0),
(291,41,NULL,'MINGOUOLO','noah',NULL,'2023-09-04',NULL,'','SIO1','2025','mingouolo.noah','$2y$10$p5tkLzkj1RiVHyzn5WWdVOcr1E7t3HY30cWbq4uHQdc5.ayjOWK.C',1,'Etudiant',0,NULL,0),
(292,NULL,NULL,'MORNAC','erwan',NULL,'2023-09-04',NULL,'','SIO1','2025','mornac.erwan','$2y$10$KaKZrvQJuGhNi/8tWIiRCeyjwzTn0dbYxePPx6knVq1lfSWxbWse6',1,'Etudiant',0,NULL,0),
(293,NULL,NULL,'RAMOS','clement',NULL,'2023-09-04',NULL,'SISR','SIO1','2025','ramos.clement','$2y$10$2nq9sOVxrNC6m5aKqw68f.6MmpcRzetq.qm4LpaQHCLSbuUZXeVjm',1,'Etudiant',0,NULL,0),
(294,3,NULL,'ROUX','kevin',NULL,'2023-09-04',NULL,'SISR','SIO1','2025','roux.kevin','$2y$10$3jlp/7o3pLewV5fL3GV2J.PkkNUqaSKUgqZsRdEy5zSwzX1HpZTjS',1,'Etudiant',0,NULL,0),
(295,40,NULL,'SAWANE','salle',NULL,'2023-09-04',NULL,'SISR','SIO1','2025','sawane.salle','$2y$10$D2dj.0mTOYqdJXiY.ORMJ.uwc/JqPjJqPyDbBebB/zLFjl8jtrkRq',1,'Etudiant',0,NULL,0),
(296,NULL,NULL,'SOUAKRI','lounes',NULL,'2023-09-04',NULL,'SLAM','SIO1','2025','souakri.lounes','$2y$10$eLcFIfCY.dG8pirygmu.f.9JT5GFt1WMyDw2xJEHyxLaNORBI2nee',1,'Etudiant',0,NULL,0),
(297,18,NULL,'BONNET','matthieu',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','bonnet.matthieu','$2y$10$Gz6vxW7uRyF.21sW33oTMel/yIZk8AFuLP00n81LIPd8XhtrLUFA.',1,'Etudiant',0,NULL,0),
(298,NULL,NULL,'BUIL','victor',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','buil.victor','$2y$10$oL1Hs1ChRjg.Z/ctUrW6/O3/mUNXNdotZfIzhfqpIRpQVJtOOr5Ye',1,'Etudiant',0,NULL,0),
(299,NULL,NULL,'BURAUD','mathis',NULL,'2022-09-04',NULL,'SISR','SIO2','2024','buraud.mathis','$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq',1,'Etudiant',0,NULL,0),
(300,NULL,NULL,'COQUILLAU','elowan',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','coquillau.elowan','$2y$10$4bes3wmOeU5ECpEN/8RBVOnKRXtD.3Bh9jaKaf9m9PFeDe/nueNVC',1,'Etudiant',0,NULL,0),
(301,NULL,NULL,'COTTEREAU','corentin',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','cottereau.corentin','$2y$10$/WWjbjvMfHERxHoOPbIkoe8IScbC1AD.TeYi3ipquU4Ll2WlKfiam',1,'Etudiant',0,NULL,0),
(302,NULL,NULL,'DE ALMEIDA','angel',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','dealmeida.angel','$2y$10$gZCtPO6nMFJVFebVNDZJSuGygJAvxwZu6jR8mhZUCgW8tMgZL4PTC',1,'Etudiant',0,NULL,0),
(303,NULL,NULL,'DOMENICI','lheo',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','domenici.lheo','$2y$10$KCl/7Mv/IRbZTXzocHm3EulSKpLe3U/gXKeFajbA8u2No1QAYUQeC',1,'Etudiant',0,NULL,0),
(304,NULL,NULL,'GARNIER','aurelien',NULL,'2022-09-04',NULL,'SISR','SIO2','2024','garnier.aurelien','$2y$10$wDye3E8DE2BraJ4nDhrOPevJov6PRd4U0uxZnjApWGfsEAQoElizq',1,'Etudiant',0,NULL,0),
(305,NULL,NULL,'GUICHARD','camille',NULL,'2022-09-04',NULL,'SISR','SIO2','2024','guichard.camille','$2y$10$CqKEETRFqDr4XYjNjOmBuen/9SjmH.B6L1N8ZZgQ6NB9TF2ilZSUm',1,'Etudiant',0,NULL,0),
(306,NULL,NULL,'LEFEBVRE','aleksander',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','lefebvre.aleksander','$2y$10$rP37oqAr.aFo3UgeoK20UuUvhUbOj9Sbb9VU7UG64v3yFJU5fLyQS',1,'Etudiant',0,NULL,0),
(307,NULL,NULL,'MENARD','lucas',NULL,'2022-09-04',NULL,'SISR','SIO2','2024','menard.lucas','$2y$10$xcl0h3lHO9lVf0TaBxFtL.YPr6ephkdgE4qEThbqFD0TyXyt6Vxni',1,'Etudiant',0,NULL,0),
(308,NULL,NULL,'MIE','martin',NULL,'2022-09-04',NULL,'SISR','SIO2','2024','mie.martin','$2y$10$cTxklMVeDggknfMGaUmUreUqGRUfQLutqQVSIzYSFFU9so2j4d1uq',1,'Etudiant',0,NULL,0),
(309,NULL,NULL,'PERODEAU','matheo',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','perodeau.matheo','$2y$10$sYxXUD11lKzs9byjX4V39erc.mAlpVmEQvGre/z1fv50IuOnNGp9a',1,'Etudiant',0,NULL,0),
(310,NULL,NULL,'POUPEAU','mathieu',NULL,'2022-09-04',NULL,'SLAM','SIO2','2024','poupeau.mathieu','$2y$10$yiNoHD8QYjSIQuDLmXUy6OSWl3ncsALNWgd195FHMwyx3XtdngnLq',1,'Etudiant',0,NULL,0),
(311,NULL,NULL,'TEXIER','hugo',NULL,'2022-09-04',NULL,'SISR','SIO2','2024','texier.hugo','$2y$10$GIOZRvGjkTRIEcc0ecHV.eS1CtGhDArNsJefxGMXjMaytjT8KBc2W',1,'Etudiant',0,NULL,0),
(312,NULL,NULL,'THOMAS','dorian',NULL,'2022-09-04',NULL,'SISR','SIO2','2024','thomas.dorian','$2y$10$OS6Z5ON6SuqtAeLl/BFv5eSV4giJItE0hhpuODYELqJ0WQWpOl7TO',1,'Etudiant',0,NULL,0),
(313,NULL,NULL,'ANONYMOUS','Anonymous',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,1),
(316,NULL,NULL,'Prof','prof','',NULL,'',NULL,'Enseignant',NULL,'prof.prof','$2y$10$f5jfCrryZ0I.gtfZmrLUeuBWTmq817d8Xr12vnf/fNN6WJMNCsKFG',1,'Professeur',0,NULL,0),
(318,NULL,NULL,'Gaillard','Logan Prof','',NULL,'',NULL,'Enseignant',NULL,'lpgaillard','$2y$10$mhHBbXUsSQ9qYEoVgiYBM.gQBfV0ep7reNbt9fab3Zn.zdwYqsPWi',1,'Professeur',0,NULL,0),
(320,NULL,NULL,'ANONYMOUS','Anonymous',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,1,NULL,1),
(321,3,NULL,'ETUDIANT','Etudiant','','2023-09-06','','SLAM','SIO1','2025','etudiant','$2y$10$GH2/65oExoLixlZ3hzIFVu/1Z/nRDPRry24b3pVrDhLhHqp/SjdGC',0,'Etudiant',0,'2024-06-10 14:45:39',0),
(323,NULL,NULL,'VINCENT','Chloé','','2022-09-14','','SLAM','SIO2','2024','vincen.chloe','$2y$10$UJUGSXuehiqEexLTIPYZhO5LknDJZ5ePmfeE659TlOQBzOTkjx9gG',1,'Etudiant',0,NULL,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vue_entreprise`
--

DROP TABLE IF EXISTS `vue_entreprise`;
/*!50001 DROP VIEW IF EXISTS `vue_entreprise`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vue_entreprise` AS SELECT
 1 AS `EntrepriseID`,
  1 AS `siret`,
  1 AS `nomEntreprise`,
  1 AS `adresse`,
  1 AS `ville`,
  1 AS `codePostal`,
  1 AS `naf`,
  1 AS `naf_libelle`,
  1 AS `type`,
  1 AS `effectif`,
  1 AS `Created_Date`,
  1 AS `Created_User`,
  1 AS `entreprise_valide` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vue_logs`
--

DROP TABLE IF EXISTS `vue_logs`;
/*!50001 DROP VIEW IF EXISTS `vue_logs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vue_logs` AS SELECT
 1 AS `idLog`,
  1 AS `idLogType`,
  1 AS `idUser`,
  1 AS `logType`,
  1 AS `pointGagne`,
  1 AS `entite_type`,
  1 AS `entite_id`,
  1 AS `nomUser`,
  1 AS `prenomUser`,
  1 AS `classeUser`,
  1 AS `old_values`,
  1 AS `new_values`,
  1 AS `date` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vue_operations`
--

DROP TABLE IF EXISTS `vue_operations`;
/*!50001 DROP VIEW IF EXISTS `vue_operations`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vue_operations` AS SELECT
 1 AS `idUser`,
  1 AS `idTuteur`,
  1 AS `nomUser`,
  1 AS `type`,
  1 AS `idEntite`,
  1 AS `nomEntite`,
  1 AS `dateCreation` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vue_stage`
--

DROP TABLE IF EXISTS `vue_stage`;
/*!50001 DROP VIEW IF EXISTS `vue_stage`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vue_stage` AS SELECT
 1 AS `idStage`,
  1 AS `idEntreprise`,
  1 AS `idMaitreDeStage`,
  1 AS `idEtudiant`,
  1 AS `idProfesseur`,
  1 AS `idTuteur`,
  1 AS `classe`,
  1 AS `Statut`,
  1 AS `description`,
  1 AS `dateDebut`,
  1 AS `dateFin`,
  1 AS `EtudiantNom`,
  1 AS `EtudiantPrenom`,
  1 AS `EtudiantEmail`,
  1 AS `EtudiantTel`,
  1 AS `EtudiantSpe`,
  1 AS `EtudiantPromo`,
  1 AS `siret`,
  1 AS `Entreprise`,
  1 AS `Entreprise_adresse`,
  1 AS `Entreprise_codePostal`,
  1 AS `Entreprise_ville`,
  1 AS `Entreprise_effectif`,
  1 AS `Entreprise_naf`,
  1 AS `employe_nom`,
  1 AS `employe_prenom`,
  1 AS `employe_fonction`,
  1 AS `employe_mail`,
  1 AS `employe_telephone` */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'gestion_stage'
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `anonymize_employes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE  PROCEDURE `anonymize_employes`()
BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE employee_id INT;
    DECLARE anonymous_id INT;
    DECLARE cur CURSOR FOR 
        SELECT id 
        FROM employe 
        WHERE created_date < DATE_SUB(NOW(), INTERVAL 5 YEAR);
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    
    SELECT id INTO anonymous_id FROM employe WHERE nom = 'Anonymous' LIMIT 1;

    OPEN cur;

    main_loop: LOOP
        FETCH cur INTO employee_id;
        IF done THEN
            LEAVE main_loop;
        END IF;

        
        UPDATE stage 
        SET idMaitreDeStage = anonymous_id 
        WHERE idMaitreDeStage = employee_id;

        
        DELETE FROM employe WHERE id = employee_id;

    END LOOP main_loop;

    CLOSE cur;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `contact_employe`
--

/*!50001 DROP VIEW IF EXISTS `contact_employe`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `contact_employe` AS select `employe`.`id` AS `EmployeID`,`employe`.`nom` AS `nom`,`employe`.`prenom` AS `prenom`,`employe`.`email` AS `email`,`employe`.`telephone` AS `telephone`,`employe`.`fonction` AS `fonction`,`employe`.`service` AS `service`,`entreprise`.`id` AS `EntrepriseID`,`entreprise`.`nomEntreprise` AS `entreprise`,`entreprise`.`adresse` AS `Entreprise_adresse`,`entreprise`.`codePostal` AS `Entreprise_codePostal`,`entreprise`.`ville` AS `Entreprise_ville`,`user`.`id` AS `UserID`,concat(`user`.`nom`,' ',`user`.`prenom`) AS `Created_User`,`employe`.`created_date` AS `Created_date`,`employe`.`contact_valide` AS `contact_valide` from ((`employe` join `entreprise` on(`employe`.`idEntreprise` = `entreprise`.`id`)) join `user` on(`employe`.`created_userid` = `user`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `professeurs`
--

/*!50001 DROP VIEW IF EXISTS `professeurs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `professeurs` AS select `user`.`id` AS `id`,`user`.`idTuteur` AS `idTuteur`,`user`.`idClasse` AS `idClasse`,`user`.`nom` AS `nom`,`user`.`prenom` AS `prenom`,`user`.`email` AS `email`,`user`.`date_entree` AS `date_entree`,`user`.`telephone` AS `telephone`,`user`.`spe` AS `spe`,`user`.`classe` AS `classe`,`user`.`promo` AS `promo`,`user`.`login` AS `login`,`user`.`password` AS `password`,`user`.`password_reset` AS `password_reset`,`user`.`statut` AS `statut`,`user`.`inactif` AS `inactif`,`user`.`dateFirstConn` AS `dateFirstConn`,`user`.`isDeleted` AS `isDeleted` from `user` where `user`.`statut` = 'Professeur' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vue_entreprise`
--

/*!50001 DROP VIEW IF EXISTS `vue_entreprise`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vue_entreprise` AS select `e`.`id` AS `EntrepriseID`,`e`.`siret` AS `siret`,`e`.`nomEntreprise` AS `nomEntreprise`,`e`.`adresse` AS `adresse`,`e`.`ville` AS `ville`,`e`.`codePostal` AS `codePostal`,`n`.`id` AS `naf`,`n`.`libelle` AS `naf_libelle`,`c`.`Libelle` AS `type`,`ef`.`libelle` AS `effectif`,`e`.`Created_Date` AS `Created_Date`,concat(`u`.`nom`,' ',`u`.`prenom`) AS `Created_User`,`e`.`entreprise_valide` AS `entreprise_valide` from ((((`entreprise` `e` left join `user` `u` on(`e`.`Created_UserID` = `u`.`id`)) left join `categoriejuridique` `c` on(`e`.`type` = `c`.`id` collate utf8mb4_general_ci)) left join `naf` `n` on(`e`.`naf` = `n`.`id` collate utf8mb4_general_ci)) left join `effectif` `ef` on(`e`.`effectif` = `ef`.`code` collate utf8mb4_general_ci)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vue_logs`
--

/*!50001 DROP VIEW IF EXISTS `vue_logs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vue_logs` AS select `l`.`id` AS `idLog`,`l`.`idLogType` AS `idLogType`,`l`.`idUser` AS `idUser`,`t`.`type` AS `logType`,`t`.`points` AS `pointGagne`,`l`.`entite_type` AS `entite_type`,`l`.`entite_id` AS `entite_id`,`u`.`nom` AS `nomUser`,`u`.`prenom` AS `prenomUser`,`u`.`classe` AS `classeUser`,`l`.`old_values` AS `old_values`,`l`.`new_values` AS `new_values`,`l`.`date` AS `date` from ((`logs` `l` join `user` `u` on(`l`.`idUser` = `u`.`id`)) join `log_type` `t` on(`l`.`idLogType` = `t`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vue_operations`
--

/*!50001 DROP VIEW IF EXISTS `vue_operations`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vue_operations` AS select `e`.`created_userid` AS `idUser`,`u`.`idTuteur` AS `idTuteur`,concat(`u`.`nom`,' ',`u`.`prenom`) AS `nomUser`,'contact' AS `type`,`e`.`id` AS `idEntite`,concat(`e`.`nom`,' ',`e`.`prenom`) AS `nomEntite`,`e`.`created_date` AS `dateCreation` from (`employe` `e` join `user` `u` on(`e`.`created_userid` = `u`.`id`)) where `e`.`created_userid` is not null and `e`.`contact_valide` = 0 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vue_stage`
--

/*!50001 DROP VIEW IF EXISTS `vue_stage`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vue_stage` AS select `s`.`id` AS `idStage`,`s`.`idEntreprise` AS `idEntreprise`,`s`.`idMaitreDeStage` AS `idMaitreDeStage`,`s`.`idEtudiant` AS `idEtudiant`,`s`.`idProfesseur` AS `idProfesseur`,`u`.`idTuteur` AS `idTuteur`,`s`.`classe` AS `classe`,`u`.`statut` AS `Statut`,`s`.`description` AS `description`,`s`.`dateDebut` AS `dateDebut`,`s`.`dateFin` AS `dateFin`,`u`.`nom` AS `EtudiantNom`,`u`.`prenom` AS `EtudiantPrenom`,`u`.`email` AS `EtudiantEmail`,`u`.`email` AS `EtudiantTel`,`u`.`spe` AS `EtudiantSpe`,`u`.`promo` AS `EtudiantPromo`,`e`.`siret` AS `siret`,`e`.`nomEntreprise` AS `Entreprise`,`e`.`adresse` AS `Entreprise_adresse`,`e`.`codePostal` AS `Entreprise_codePostal`,`e`.`ville` AS `Entreprise_ville`,`e`.`effectif` AS `Entreprise_effectif`,`e`.`naf` AS `Entreprise_naf`,`m`.`nom` AS `employe_nom`,`m`.`prenom` AS `employe_prenom`,`m`.`fonction` AS `employe_fonction`,`m`.`email` AS `employe_mail`,`m`.`telephone` AS `employe_telephone` from (((`stage` `s` join `user` `u` on(`s`.`idEtudiant` = `u`.`id`)) join `entreprise` `e` on(`s`.`idEntreprise` = `e`.`id`)) join `employe` `m` on(`s`.`idMaitreDeStage` = `m`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-17 18:04:35
