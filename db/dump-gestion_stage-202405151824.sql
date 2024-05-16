-- MariaDB dump 10.19  Distrib 10.11.7-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: gestion_stage
-- ------------------------------------------------------
-- Server version	10.11.7-MariaDB-1:10.11.7+maria~ubu2204

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
-- Temporary table structure for view `Activite`
--

DROP TABLE IF EXISTS `Activite`;
/*!50001 DROP VIEW IF EXISTS `Activite`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `Activite` AS SELECT
 1 AS `IdActivite`,
  1 AS `IdEtudiant`,
  1 AS `IdEntreprise`,
  1 AS `Date`,
  1 AS `Heure`,
  1 AS `Type`,
  1 AS `Etudiant`,
  1 AS `Entreprise`,
  1 AS `Ville`,
  1 AS `Commentaire` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Activite_Etu`
--

DROP TABLE IF EXISTS `Activite_Etu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Activite_Etu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Entreprise` int(11) DEFAULT NULL,
  `IdEtudiant` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `Commentaire` varchar(255) DEFAULT NULL,
  `contact_mail` varchar(100) DEFAULT NULL,
  `contact_tel` varchar(100) DEFAULT NULL,
  `contact_nom` varchar(100) DEFAULT NULL,
  `contact_fonction` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdEtudiant` (`IdEtudiant`),
  KEY `ID_Entreprise` (`ID_Entreprise`),
  CONSTRAINT `Activite_Etu_ibfk_1` FOREIGN KEY (`IdEtudiant`) REFERENCES `User` (`id`),
  CONSTRAINT `Activite_Etu_ibfk_2` FOREIGN KEY (`ID_Entreprise`) REFERENCES `Entreprise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Activite_Etu`
--

LOCK TABLES `Activite_Etu` WRITE;
/*!40000 ALTER TABLE `Activite_Etu` DISABLE KEYS */;
INSERT INTO `Activite_Etu` VALUES
(1,1,1,'2024-02-01 10:00:00','tel','no coment',NULL,NULL,NULL,NULL),
(2,2,1,'2024-03-21 10:00:00','mail','un commentaire',NULL,NULL,NULL,NULL),
(10,1,1,'2024-04-10 19:49:19','1','',NULL,NULL,NULL,NULL),
(11,49,2,'2024-04-10 20:42:17','mal','',NULL,NULL,NULL,NULL),
(12,100,2,'2024-04-11 09:20:44','1','5555555555555',NULL,NULL,NULL,NULL),
(13,14,1,'2024-04-11 09:24:15','651656546546465','651651651651651',NULL,NULL,NULL,NULL),
(14,85,2,'2024-04-11 09:24:38','56156516','5165165165156',NULL,NULL,NULL,NULL),
(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(25,2,NULL,'2024-04-20 19:57:35','mail',NULL,NULL,NULL,NULL,NULL),
(26,45,1,'2024-04-20 22:24:53','tel','coucou',NULL,NULL,NULL,NULL),
(27,1,1,'2024-04-20 22:25:10','email','zzzzzzz',NULL,NULL,NULL,NULL),
(28,54,1,'2024-04-20 22:30:55','email','Ceci est mon commentaire',NULL,NULL,NULL,NULL),
(29,53,1,'2024-04-20 22:38:30','tel','cccccccccccccc',NULL,NULL,NULL,NULL),
(30,127,1,'2024-04-20 22:52:08','email','fzefz',NULL,NULL,NULL,NULL),
(31,101,1,'2024-04-20 23:24:27','tel','ytesy',NULL,NULL,NULL,NULL),
(32,54,1,'2024-04-21 15:49:40','email','fEFEF',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Activite_Etu` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER ajout_activite
BEFORE INSERT ON Activite_Etu
FOR EACH ROW
BEGIN
    SET NEW.date = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Activite_type`
--

DROP TABLE IF EXISTS `Activite_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Activite_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Activite_type`
--

LOCK TABLES `Activite_type` WRITE;
/*!40000 ALTER TABLE `Activite_type` DISABLE KEYS */;
INSERT INTO `Activite_type` VALUES
(1,'Ajout d\'entreprise',1),
(2,'Modification d\'une information d\'une entreprise',1),
(3,'Envoie d\'un email',2),
(4,'Appel téléphonique',2),
(5,'Ajout d\'un mail',4),
(6,'Ajout d\'une ligne direct vers un employé',1),
(7,'Ajout d\'un maitre de stage',5),
(8,'Ajout d\'un recruteur',4),
(9,'Ajout d\'un employé',2);
/*!40000 ALTER TABLE `Activite_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employe`
--

DROP TABLE IF EXISTS `Employe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employe` (
  `id` int(11) NOT NULL,
  `idEntreprise` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`),
  CONSTRAINT `Employe_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employe`
--

LOCK TABLES `Employe` WRITE;
/*!40000 ALTER TABLE `Employe` DISABLE KEYS */;
/*!40000 ALTER TABLE `Employe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Entreprise`
--

DROP TABLE IF EXISTS `Entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Entreprise` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entreprise`
--

LOCK TABLES `Entreprise` WRITE;
/*!40000 ALTER TABLE `Entreprise` DISABLE KEYS */;
INSERT INTO `Entreprise` VALUES
(1,'Auto-école du Littoral','17, Rue Pujos',NULL,'ROCHEFORT','0000000000000000000','17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'Base aérienne 721',' Base Aérienne',NULL,'Rochefort','05 46 88 80 00','17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,'IDK Stratégie Multimédia','Hotel d\'entreprise, local n°3, 1 Rue de la Trinquette',NULL,'La Rochelle (Minnimes)',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,'Léa Nature','23Avenue Paul Langevin',NULL,'Perigny Cedex',NULL,'17183',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,'Novatique','16 B RUE DU DANEMARK   ',NULL,'AURAY','','56400',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(6,'Novatique',NULL,NULL,'AURAY',NULL,'56400',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(7,'Pays Rochefortais','3 avenue Maurice Chupin Parc des Fouriers',NULL,'Rochefort',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,'Sacrée Com','15 rue Renouleau',NULL,'Tonnay-Charente',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,'TESSI TECHNOLOGIES','1-3 Avenue des Satellites',NULL,'Le Haillan',NULL,'33185',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(10,'4DConcept','41-43 Avenue du centre MONTIGNY LE BRETONNEUX',NULL,'MONTIGNY LE BRETONNEUX',NULL,'78180',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,'6 TEM\' INFORMATIQUE','2 RD 734',NULL,'Dolus',NULL,'17550',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,'A2I Informatique ','Rue Augustin Fresnel –',NULL,'PERIGNY',NULL,'17183',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,'A2I INFORMATIQUE','ZAC Les Montagnes BP5',NULL,'CHAMPNIERS',NULL,'16430',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,'ACT Service','18 rue de la Bonnette Les minimes',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,'Adequat Systeme','14 avenue Jean de Vivonne',NULL,'Pisany',NULL,'17600',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,'Alstom','Avenue Commdt Lysiack',NULL,'Aytré',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,'Archipel',NULL,NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(18,'Astron Associate SA','Ch du grand Puits 38 CP 339 CH – 1217 Meyrin - 1',NULL,'Meyrin- Suisse',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(19,'CARA','107 avenue de ROCHEFORT',NULL,'Royan',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(20,'Caserne Renaudin','av Porte Dauphine',NULL,'LA ROCHELLE',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(21,'CC17','37 rue du Dr Peltier',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(22,'CCI Rochefort et Saintonges','Corderie Royale Rue Audebert',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(23,'Centre hospitalier de Rochefort','16, Rue du Docteur Peltier',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(24,'Centre hospitalier de Royan',NULL,NULL,'Royan',NULL,'17205',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(25,'Centre Hospitalier De Saintong','11 Bd Ambroise Paré BP326',NULL,'SAINTES',NULL,'17108',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(26,'Cetios','Allée de la Baucette',NULL,'Surgères',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(27,'CH Jonzac','Av, Winston churchild, BP 109',NULL,'Jonzac',NULL,'17503',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(28,'cipecma',NULL,NULL,'Chatelaillon',NULL,'17340',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(29,'Clinique Pasteur',NULL,NULL,'Royan',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(30,'CMAF ',NULL,NULL,'LA ROCHELLE',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(31,'Communauté d\'agglomération de ',NULL,NULL,'PERIGNY',NULL,'17180',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(32,'Mairie de Château-Larcher','4, Rue de la Mairie ',NULL,'CHATEAU LARCHER',NULL,'86370',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(33,'CC17 INFORMATIQUE',' 37, rue du Docteur Peltier ',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(34,'CYBERTEK','Avenue Fourneaux ',NULL,'ANGOULINS SUR MER',NULL,'17690',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(35,'DATACLIC ','47, Rue Pierre de Campet',NULL,'SAUJON',NULL,'17600',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(36,'DDSV ',NULL,NULL,'LA ROCHELLE',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(37,'DELAMET SAS ','16, Rue Gambetta ',NULL,'Saint Aigulin',NULL,'17360',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(38,'DIGITAL','751 rue de la Génoise,Parc d\'activité Les Montagnes ',NULL,'CHAMPNIERS',NULL,'16430',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(39,'EIGSI - ',NULL,NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(40,'ENILIA – ENSMIC','Avenue François Mitterand BP 49 ',NULL,'SURGERES',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(41,'Foyer départemental Lannelongue','30 Bld du Débarquement',NULL,'Saint Trojan Les Bains',NULL,'17370',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42,'GARANDEAU FRERES Chamblanc ',' 2 route des étangs',NULL,'Cherves-Richemont',NULL,'16370',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(43,'Groupe Coop Atlantique','3 rue du docteur jean ',NULL,'SAINTES',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(44,'Groupe Gibaud','15 rue de l\'ormeau du Pied Saintes ',NULL,'SAINTES',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(45,'Groupe Léa Nature','Avenue Paul Langevin',NULL,'Périgny',NULL,'17180',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(46,'Excelia','102, Rue de Coureilles /  1 rue Jean Perrin',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(47,'Hano-communication ',' place Charles De Gaulle  ',NULL,'Aulnay',NULL,'17450',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(48,'IN TECH',' 2bis rue Ferdinand Gateau',NULL,'Tonnay Charente ',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(49,'IUT La Rochelle ',NULL,NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(50,'IUT La Rochelle ','15 rue François De Vaux Foletier ',NULL,' LA ROCHELE cedex 01 ',NULL,'17026',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(51,'Groupe Michel',' 163 Avenue Jean-Paul SARTRE ',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(52,'Jean-Noël Informatique','37 avenue d\'aunis ',NULL,'tonnay-charente ',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(53,'KUEHNE+NAGEL DSIA','16 rue de la petite sensive ',NULL,'Nantes ',NULL,'44323',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(54,'Leroy Somer','Boulevard Marcelin Leroy',NULL,'Angoulème',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(55,'LP Jean Rostand louise lériget','12 Rue Louise Lériget',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(56,'Lycée ?','66 Boulevard de châtenay ',NULL,'Cognac ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(57,'Lycée agricole','Site de l\'oisellerie ',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(58,'Lycée Agricole Bordeaux ',NULL,NULL,'Blanquefort ',NULL,'33290',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(59,'Lycee bellevue ',NULL,NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(60,'Lycée Bernard Palissy','1, Rue de Gascogne',NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(61,'lycée Georges Desclaude','rue Georges Desclaude',NULL,'Saintes',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(62,'Lycée georges Leygues ',NULL,NULL,'Villeneuve\\lot ',NULL,'47300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(63,'Lycée Jamain','2A Boulevard Pouzet ',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(64,'Lycée Jean DAUTET ',NULL,NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(65,'Lycée Léonce Vieljeux ','Rue des Gonthières ',NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(66,'Lycée Marcel Dassault - ',' NULL',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(67,'lycée Professionnel Régional I',' NULL',NULL,'COGNAC ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(68,'Lycée Professionnel Rompsay',' Rue de Périgny ',NULL,'La Rochelle',NULL,'17025',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(69,'Lycée Victor hugo ',NULL,NULL,'Poitiers ',NULL,'86000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(70,'MAAF Assurances','SA Chauray ',NULL,'Niort ',NULL,'79036',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(71,'Maiano Informatique',' 17 rue de l\'électricité 17200 Royan ',NULL,'Royan ',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(72,'Mairie de Saintes','Square Andre Maudet ',NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(73,'Mairie de Chatelaillon ',NULL,NULL,'Chatelaillon ',NULL,'17340',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(74,'Mairie de Meschers','8 rue Paul Massy ',NULL,'MESCHERS SUR GIRONDE',NULL,'17132',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(75,'Mairie de Poitiers Informatiqu','Rue du Dolmen',NULL,'Poitiers',NULL,'86000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(76,'Mairie de Pont l\'Abbé d\'Arnoul','Place du général de Gaulle',NULL,'Pont l\'Abbé d\'Arnoult ',NULL,'17250',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(77,'MAIRIE DE ROYAN',' 80, avenue de Pontaillac ',NULL,'Royan ',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(78,'MAIRIE DE SAUJON',' Hotel de ville BP 108 ',NULL,'SAUJON ',NULL,'17600',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(79,'Malichaud atlantique','13 rue Hubert Pennevert',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(80,'MAPA Mutuelle d\'Assurance','Rue Anatole Contré ',NULL,'Saint Jean d\'Angély ',NULL,'17400',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(81,'Metal Néo','ZI des Soeurs, 21 Boulevard du vercors',NULL,'Rochefort',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(82,'MSA ','46, boulevard du Dr C.Duroselle',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(83,'NEOPC','ZI OUEST voie C ',NULL,'SURGERES ',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(84,'NEVA technologies','40 Rue de Marignan',NULL,'Cognac',NULL,'16',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(85,'ORECO S.A. ','44 bd Oscar Planat ',NULL,'COGNAC ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(86,'Orix Informatique','6 rue pape',NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(87,'Boutique?','Parc d\'activité Les Montagnes ',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(88,'PRODWARE','9 rue jacques cartier ',NULL,'AYTRE ',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(89,'Romain Informatique','20 rue de saint-vivien',NULL,' Bords',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(90,'Saint jean d\'Y / Val de Sainto',' rue texier ',NULL,'Saint Jean d\'Angély ',NULL,'17400',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(91,'SAINTRONIC',' parc atlantique, l\'ormeau de pied ',NULL,'SAINTES ',NULL,'17101',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(92,'SARL A.I.P.C. ','18, route de Frontenay RUFFIGNY',NULL,'LA CRECHE ',NULL,'79260',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(93,'SARL Concept Joueur Cité Joueu','15, rue Jean Fougerat ',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(94,'SARL DIF Informatique','ZA de chez Bernard 25 route de Cognac',NULL,'Archiac',NULL,'17520',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(95,'SARL LE MONDE DU PC ','16,rue G. Claude ',NULL,'Vaux Sur Mer ',NULL,'17640',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(96,'Satti informatique ','rue Augustin Fresnel ZI ',NULL,'PERIGNY ',NULL,'17183',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(97,'Services-emedia','12 rue de la boulangerie ',NULL,'Bernay Saint-Martin ',NULL,'17330',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(98,'Simair','17 avenue André Dublin',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(99,'SOGEMAP','40, Rue de Marignan',NULL,'COGNAC ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(100,'SS2i-services','1 rue Alexandre Fleming',NULL,'LA ROCHELLE ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(101,'STEF INFORMATIX ','61, av. Lafayette ',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(102,'Soluris',NULL,NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(103,'SYSTEL SA','17 Rue Leverrien',NULL,'AYTRE',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(104,'URANIE ','Zone d\'activité des docks maritimes Bat A Quai Carriet ',NULL,'Lormont ',NULL,'33310',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(105,'Zolux','141 cours Paul Doumer',NULL,'Saintes',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(106,'Mairie Ecurat','route de ',NULL,'Ecurat',NULL,'17560',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(107,'SASU Esprit numérique','rue Henri Giraudeau',NULL,'Surgères',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(108,'Agence Wouep!','Pépinière d\'entreprises Indigo Allée de la Barratte',NULL,'Surgères',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(109,'LR Marketing','1 rue Fleming',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(110,'Cerealog ','1 place Bernard Moitessier',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(111,'Inter Mutuelles Assistance','118 avenue de Paris',NULL,'Niort ',NULL,'79033',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(112,'Conservatoire du littoral','Corderie Royale CS 10137',NULL,'Rochefort',NULL,'17306',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(113,'Communauté de Communes de l\'île de Ré','3, rue du Père Ignace',NULL,'Saint Martin de Ré',NULL,'17410',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(114,'Pluscom','45 rue de la gare',NULL,'Aytré',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(115,'Centre hospitalier Jonzac','4 avenue Winston Churchill ',NULL,'Jonzac',NULL,'17503',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(116,'Mairie de La Rochelle','Place de l\'hôtel de ville',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(117,'SICA Atlantique','69 rue Montcalm',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(118,'A2MI','10 rue Jean Perrin',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(119,'Agence des territoires de la Vienne','Avenue René Cassin',NULL,'Chasseneuil-du-Poitou',NULL,'86963',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(120,'Terra Lacta',' 2 rue de la Glacière 05 46 30 30 30',NULL,'Surgères  ',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(121,'AP-HP Corentin Celton','4, parvis Corentin Celton',NULL,'Issy-les-Moulineaux',NULL,'92130',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(122,'Essentia','23a rue Antoine Lavoisier',NULL,'Aytre',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(123,'Université de La Rochelle','15 rue Flemming',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(124,'MAIF','200 avenue Salvadore Allende',NULL,'Niort',NULL,'79000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(125,'Studio VA','5 quai Auriol',NULL,'Tonnay-Charente',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(126,'NASKIGO','21 Chemin du Prieuré ',NULL,' LA ROCHELLE ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(127,'Eixa6 Informatique','5 Rue Louise Michel',NULL,'Marennes',NULL,'17320',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(140,'BHI2C','  ','','SAINT-HILAIRE-DE-VILLEFRANCHE','','17770','17','48153967400012','46.52Z','PME','3 à 5 salariés',3,'2024-05-16 00:04:51'),
(141,'CATALYSE INFORMATIQUE','21 RUE GUTENBERG','','AYTRE','','17440','17','47842596000026','47.41Z','PME','3 à 5 salariés',3,'2024-05-16 00:06:05'),
(142,'START INFORMATIQUE','163 ROUTE DE LA TURPAUDIERE','','LA CHAPELLE-DES-POTS','','17100','17','45071596600021','47.41Z','PME','-',3,'2024-05-16 00:24:30');
/*!40000 ALTER TABLE `Entreprise` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER Test_redondance
BEFORE INSERT
ON Entreprise FOR EACH ROW
BEGIN
    DECLARE count_exist INT;
    
    -- Vérifier si le SIRET existe déjà dans la table
    SELECT COUNT(*) INTO count_exist FROM Entreprise WHERE siret = NEW.siret;
    
    -- Si le SIRET existe déjà, lever une erreur
    IF count_exist > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cette entreprise existe déjà dans la base de données.';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Suivi_stage`
--

DROP TABLE IF EXISTS `Suivi_stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Suivi_stage` (
  `idStage` int(11) NOT NULL,
  `idEntreprise` int(11) DEFAULT NULL,
  `idMaitreDeStage` int(11) DEFAULT NULL,
  `idEtudiant` int(11) DEFAULT NULL,
  `titreStage` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`idStage`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idMaitreDeStage` (`idMaitreDeStage`),
  KEY `idEtudiant` (`idEtudiant`),
  CONSTRAINT `Suivi_stage_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`id`),
  CONSTRAINT `Suivi_stage_ibfk_2` FOREIGN KEY (`idMaitreDeStage`) REFERENCES `Employe` (`id`),
  CONSTRAINT `Suivi_stage_ibfk_3` FOREIGN KEY (`idEtudiant`) REFERENCES `User` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Suivi_stage`
--

LOCK TABLES `Suivi_stage` WRITE;
/*!40000 ALTER TABLE `Suivi_stage` DISABLE KEYS */;
/*!40000 ALTER TABLE `Suivi_stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `spe` varchar(4) DEFAULT NULL COMMENT 'Spécialité (SLAM ou SISR)',
  `promo` varchar(4) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_reset` tinyint(1) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `inactif` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES
(1,'Dupond','André','',NULL,NULL,'2023','test','$2y$10$XzVV.OVw3QxgcuEW9ZXGEubrF0jYfVrJV73FDMLVd1zP2lOFeOtUW',0,'Etudiant',1),
(2,'prof','prof',NULL,NULL,NULL,NULL,'prof','$2y$10$Ib3pC565U/q.lb4lxsa5W.oNfVjlHpdgvHUU0HA7TgwAkffgXFQrW',0,'Professeur',0),
(3,'Ornech','Jean-François','jean-francois.ornech@ac-poitiers.fr','',NULL,NULL,'jfornech','$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q',0,'Professeur',0),
(18,'Patrice','DENIS ARONIS','mail@mail.local','',NULL,'2024','patrice','$2y$10$hR2DosUGTpgg/z4yy3X.vupNh9Rg7ri9rw3JIa8uJLzInmxLhBnLW',1,'Professeur',0),
(20,'Etudiant','etudiant de test','','',NULL,'2024','sio','$2y$10$KeXbUulOY1uxBUdr.5zkDeTCDqLJHGYU8DF11Ji5PmUcBe79RI0Tq',0,'Etudiant',1),
(21,'login','login',NULL,NULL,NULL,'2023','login','$2y$10$NNi/pR4j1Ne4N8MD.QFJOedZjQtNhcfPttfxHRXPLYyPGrGzBDnXu',0,'Etudiant',0),
(22,'BARBIER','Loann',NULL,NULL,NULL,'2023','Loann','$2y$10$ZNrpDkjWY6hJIqehZUvCxuNV7cTAuwOwD7hJ.Zd7Vzvu9gP85o7H2',0,'Etudiant',0),
(23,'BEAUFILS','Killian',NULL,NULL,NULL,'2023','Killian','$2y$10$W4VJ.dnjG6Mb.ZpzQwJv/.rrjJnB0OHG0sY2ff.4p/lgnSROcE43O',1,'Etudiant',0),
(24,'DEGRAUW-VERRY','Axel',NULL,NULL,NULL,'2023','Axel','$2y$10$qTtT5t/gjyfaLh8I7mmXceyLZ5HS14pSdoJK1xws23GqePVzDdq/a',1,'Etudiant',0),
(25,'ERNOULT','Gabin',NULL,NULL,NULL,'2023','Gabin','$2y$10$cStxPKScBkpFnm4Na/z4iOOkmtEZ/l.6AlRnapOlNEatLbNcrjpA6',1,'Etudiant',0),
(26,'GAILLARD','Logan',NULL,NULL,NULL,'2023','Logan','$2y$10$nvb08iUGB1p//zep5EeseusY42ygT/aiSlYnys9HGq573R7Z0VBPK',0,'Etudiant',0),
(27,'KOSIOREK','Alexandre',NULL,NULL,NULL,'2023','Alexandre','$2y$10$/Vi7CC5ZP3xXDj/gstV4BelELy77ARcBMCFiqSrHPSr.4BtypVcEq',0,'Etudiant',0),
(28,'LE ROCHELEUIL-CHAILLE','Alexis',NULL,NULL,NULL,'2023','Alexis','$2y$10$xtW/SzljJBiac5qkYq/X5uOKCh5FUXBLtN22L08P6WeJqY0nwDAiW',0,'Etudiant',0),
(29,'LEFEVRE','Manon',NULL,NULL,NULL,'2023','Manon','$2y$10$TtirF7AzMSeweLV8eetfLe/Zc5jOge0/0Xyp4np/xaqHt2kHj8Gmu',1,'Etudiant',0),
(30,'LESCOUZERE','Mathéo',NULL,NULL,NULL,'2023','Mathéo','$2y$10$QN2EB8CsZci4LrmWowt14uZUCjyRUUXAUUTbS3oRh6Qai0KbXjEI2',0,'Etudiant',0),
(31,'MANUKYAN','Astghik',NULL,NULL,NULL,'2023','Astghik','$2y$10$Oid6oIh2szcHR0IfJJk8Sue/IK400xedYH4bdgL7V8jbdnQkZMkQa',0,'Etudiant',0),
(32,'MINGOUOLO','Noah',NULL,NULL,NULL,'2023','Noah','$2y$10$//NcOYhHQYPjb7eWMP9DruW1qeiOO1gmmMWGxlu30ccKD.BQ3zP8C',0,'Etudiant',0),
(33,'MORNAC','Erwan',NULL,NULL,NULL,'2023','Erwan','$2y$10$j9FcCNc3G.L4pTAP.GpvE.krXC.idehMjvyAEbLfHUy.VBMDtv4rW',1,'Etudiant',0),
(34,'RAMOS','Clement',NULL,NULL,NULL,'2023','Clement','$2y$10$mHSXyzFnF7ZW8A9FqDHdLeAUBfiosbV7W99muIzYAJEBMamjyvn6q',0,'Etudiant',0),
(35,'ROBIN','Kyllian',NULL,NULL,NULL,'2023','Kyllian','$2y$10$QdwFusxX7KnMmsOFn5kxhuKYVQU3kyKn6kp93ywv/MsvjF2uR9eyG',0,'Etudiant',0),
(36,'ROUX','Kevin',NULL,NULL,NULL,'2023','Kevin','$2y$10$WgGW3r6Dp8liNbdq5Zur8u2nEp9jhMrJS9q8JAO5mZD46fwRYTJye',1,'Etudiant',0),
(37,'SAWANÉ','Sallé',NULL,NULL,NULL,'2023','Salle','$2y$10$LyQQUWZGCFsRxs61bEKSceM68XC4rPaMuUejfhfu3McoxnPzlwRXK',0,'Etudiant',0),
(38,'SOUAKRI','Lounès',NULL,NULL,NULL,'2023','Lounes','$2y$10$7FJwSuyh55nKMLQ3zcSkpuUxZKLjpYb.6JiwFevR/t1uYSLP2tC3K',0,'Etudiant',0),
(39,'TEXIER','Enola',NULL,NULL,NULL,'2023','Enola','$2y$10$RbZXEK6ypj2WRDqSSxKr5eHcD4Z8fkcd64JoOrHgX.Kc4fMvOUP/K',0,'Etudiant',0),
(40,'CASTILLO','Jean-Christophe','','',NULL,'','castillojc','$2y$10$H5W2E9n/oN0m4C9ugRdbdeRUEYM.zM.DUGWMlPrIR1ID7XqI785vC',1,'Professeur',0),
(41,'BOUCHEREAU','Bertrand','','',NULL,'2024','bouchereaub','$2y$10$HO4yuuq58SJBqqxnGzksCuvm4FWDBR6nWc3n6ZJHyNHdDEk2tBAK6',1,'Professeur',0),
(43,'test3','test3','test3@test3.test3','',NULL,'2024','test3','$2y$10$vBFEKCAj89EuGo3oLKCZwOabwVoqMpIFIRuaRielTFisKJ07pts1G',0,'Etudiant',0),
(44,'test4','test4','','',NULL,'2025','test4','$2y$10$NtrExBcCGJpDOA/hahsUWOAby9r7QQLo1lEMNvyjKsvgLhO.sszjC',0,'Professeur',0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gestion_stage'
--

--
-- Final view structure for view `Activite`
--

/*!50001 DROP VIEW IF EXISTS `Activite`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `Activite` AS select `Activite_Etu`.`id` AS `IdActivite`,`User`.`id` AS `IdEtudiant`,`Entreprise`.`id` AS `IdEntreprise`,cast(`Activite_Etu`.`date` as date) AS `Date`,cast(`Activite_Etu`.`date` as time) AS `Heure`,`Activite_Etu`.`type` AS `Type`,concat(`User`.`nom`,' ',`User`.`prenom`) AS `Etudiant`,`Entreprise`.`nomEntreprise` AS `Entreprise`,`Entreprise`.`ville` AS `Ville`,`Activite_Etu`.`Commentaire` AS `Commentaire` from ((`Activite_Etu` join `User` on(`Activite_Etu`.`IdEtudiant` = `User`.`id`)) join `Entreprise` on(`Activite_Etu`.`ID_Entreprise` = `Entreprise`.`id`)) */;
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

-- Dump completed on 2024-05-16  7:40:58
