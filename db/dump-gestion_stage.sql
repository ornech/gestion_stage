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
INSERT INTO `Activite_Etu` VALUES (1,1,1,'2024-02-01 10:00:00','tel','no coment',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (2,2,1,'2024-03-21 10:00:00','mail','un commentaire',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (10,1,1,'2024-04-10 19:49:19','1','',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (11,49,2,'2024-04-10 20:42:17','mal','',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (12,100,2,'2024-04-11 09:20:44','1','5555555555555',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (13,14,1,'2024-04-11 09:24:15','651656546546465','651651651651651',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (14,85,2,'2024-04-11 09:24:38','56156516','5165165165156',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (25,2,NULL,'2024-04-20 19:57:35','mail',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (26,45,1,'2024-04-20 22:24:53','tel','coucou',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (27,1,1,'2024-04-20 22:25:10','email','zzzzzzz',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (28,54,1,'2024-04-20 22:30:55','email','Ceci est mon commentaire',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (29,53,1,'2024-04-20 22:38:30','tel','cccccccccccccc',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (30,127,1,'2024-04-20 22:52:08','email','fzefz',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (31,101,1,'2024-04-20 23:24:27','tel','ytesy',NULL,NULL,NULL,NULL);
INSERT INTO `Activite_Etu` VALUES (32,54,1,'2024-04-21 15:49:40','email','fEFEF',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Activite_Etu` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
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
INSERT INTO `Activite_type` VALUES (1,'Ajout d\'entreprise',1);
INSERT INTO `Activite_type` VALUES (2,'Modification d\'une information d\'une entreprise',1);
INSERT INTO `Activite_type` VALUES (3,'Envoie d\'un email',2);
INSERT INTO `Activite_type` VALUES (4,'Appel téléphonique',2);
INSERT INTO `Activite_type` VALUES (5,'Ajout d\'un mail',4);
INSERT INTO `Activite_type` VALUES (6,'Ajout d\'une ligne direct vers un employé',1);
INSERT INTO `Activite_type` VALUES (7,'Ajout d\'un maitre de stage',5);
INSERT INTO `Activite_type` VALUES (8,'Ajout d\'un recruteur',4);
INSERT INTO `Activite_type` VALUES (9,'Ajout d\'un employé',2);
/*!40000 ALTER TABLE `Activite_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `Contact_employe`
--

DROP TABLE IF EXISTS `Contact_employe`;
/*!50001 DROP VIEW IF EXISTS `Contact_employe`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `Contact_employe` AS SELECT
 1 AS `EmployeID`,
  1 AS `nom`,
  1 AS `prenom`,
  1 AS `email`,
  1 AS `telephone`,
  1 AS `fonction`,
  1 AS `EntrepriseID`,
  1 AS `entreprise`,
  1 AS `UserID`,
  1 AS `Created_User`,
  1 AS `Created_date` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Employe`
--

DROP TABLE IF EXISTS `Employe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEntreprise` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `Created_UserID` int(11) DEFAULT NULL,
  `Created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`),
  CONSTRAINT `Employe_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employe`
--

LOCK TABLES `Employe` WRITE;
/*!40000 ALTER TABLE `Employe` DISABLE KEYS */;
INSERT INTO `Employe` VALUES (1,141,'Dupond','Fernand','test@test.de','00 00 00 00 00','Président',3,'2024-05-15 15:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entreprise`
--

LOCK TABLES `Entreprise` WRITE;
/*!40000 ALTER TABLE `Entreprise` DISABLE KEYS */;
INSERT INTO `Entreprise` VALUES (1,'Auto-école du Littoral','17, Rue Pujos',NULL,'ROCHEFORT','0000000000000000000','17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (2,'Base aérienne 721',' Base Aérienne',NULL,'Rochefort','05 46 88 80 00','17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (3,'IDK Stratégie Multimédia','Hotel d\'entreprise, local n°3, 1 Rue de la Trinquette',NULL,'La Rochelle (Minnimes)',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (4,'Léa Nature','23Avenue Paul Langevin',NULL,'Perigny Cedex',NULL,'17183',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (5,'Novatique','16 B RUE DU DANEMARK   ',NULL,'AURAY','','56400',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (6,'Novatique',NULL,NULL,'AURAY',NULL,'56400',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (7,'Pays Rochefortais','3 avenue Maurice Chupin Parc des Fouriers',NULL,'Rochefort',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (8,'Sacrée Com','15 rue Renouleau',NULL,'Tonnay-Charente',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (9,'TESSI TECHNOLOGIES','1-3 Avenue des Satellites',NULL,'Le Haillan',NULL,'33185',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (10,'4DConcept','41-43 Avenue du centre MONTIGNY LE BRETONNEUX',NULL,'MONTIGNY LE BRETONNEUX',NULL,'78180',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (11,'6 TEM\' INFORMATIQUE','2 RD 734',NULL,'Dolus',NULL,'17550',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (12,'A2I Informatique ','Rue Augustin Fresnel –',NULL,'PERIGNY',NULL,'17183',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (13,'A2I INFORMATIQUE','ZAC Les Montagnes BP5',NULL,'CHAMPNIERS',NULL,'16430',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (14,'ACT Service','18 rue de la Bonnette Les minimes',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (15,'Adequat Systeme','14 avenue Jean de Vivonne',NULL,'Pisany',NULL,'17600',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (16,'Alstom','Avenue Commdt Lysiack',NULL,'Aytré',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (17,'Archipel',NULL,NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (18,'Astron Associate SA','Ch du grand Puits 38 CP 339 CH – 1217 Meyrin - 1',NULL,'Meyrin- Suisse',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (19,'CARA','107 avenue de ROCHEFORT',NULL,'Royan',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (20,'Caserne Renaudin','av Porte Dauphine',NULL,'LA ROCHELLE',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (21,'CC17','37 rue du Dr Peltier',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (22,'CCI Rochefort et Saintonges','Corderie Royale Rue Audebert',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (23,'Centre hospitalier de Rochefort','16, Rue du Docteur Peltier',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (24,'Centre hospitalier de Royan',NULL,NULL,'Royan',NULL,'17205',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (25,'Centre Hospitalier De Saintong','11 Bd Ambroise Paré BP326',NULL,'SAINTES',NULL,'17108',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (26,'Cetios','Allée de la Baucette',NULL,'Surgères',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (27,'CH Jonzac','Av, Winston churchild, BP 109',NULL,'Jonzac',NULL,'17503',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (28,'cipecma',NULL,NULL,'Chatelaillon',NULL,'17340',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (29,'Clinique Pasteur',NULL,NULL,'Royan',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (30,'CMAF ',NULL,NULL,'LA ROCHELLE',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (31,'Communauté d\'agglomération de ',NULL,NULL,'PERIGNY',NULL,'17180',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (32,'Mairie de Château-Larcher','4, Rue de la Mairie ',NULL,'CHATEAU LARCHER',NULL,'86370',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (33,'CC17 INFORMATIQUE',' 37, rue du Docteur Peltier ',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (34,'CYBERTEK','Avenue Fourneaux ',NULL,'ANGOULINS SUR MER',NULL,'17690',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (35,'DATACLIC ','47, Rue Pierre de Campet',NULL,'SAUJON',NULL,'17600',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (36,'DDSV ',NULL,NULL,'LA ROCHELLE',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (37,'DELAMET SAS ','16, Rue Gambetta ',NULL,'Saint Aigulin',NULL,'17360',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (38,'DIGITAL','751 rue de la Génoise,Parc d\'activité Les Montagnes ',NULL,'CHAMPNIERS',NULL,'16430',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (39,'EIGSI - ',NULL,NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (40,'ENILIA – ENSMIC','Avenue François Mitterand BP 49 ',NULL,'SURGERES',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (41,'Foyer départemental Lannelongue','30 Bld du Débarquement',NULL,'Saint Trojan Les Bains',NULL,'17370',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (42,'GARANDEAU FRERES Chamblanc ',' 2 route des étangs',NULL,'Cherves-Richemont',NULL,'16370',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (43,'Groupe Coop Atlantique','3 rue du docteur jean ',NULL,'SAINTES',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (44,'Groupe Gibaud','15 rue de l\'ormeau du Pied Saintes ',NULL,'SAINTES',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (45,'Groupe Léa Nature','Avenue Paul Langevin',NULL,'Périgny',NULL,'17180',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (46,'Excelia','102, Rue de Coureilles /  1 rue Jean Perrin',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (47,'Hano-communication ',' place Charles De Gaulle  ',NULL,'Aulnay',NULL,'17450',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (48,'IN TECH',' 2bis rue Ferdinand Gateau',NULL,'Tonnay Charente ',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (49,'IUT La Rochelle ',NULL,NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (50,'IUT La Rochelle ','15 rue François De Vaux Foletier ',NULL,' LA ROCHELE cedex 01 ',NULL,'17026',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (51,'Groupe Michel',' 163 Avenue Jean-Paul SARTRE ',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (52,'Jean-Noël Informatique','37 avenue d\'aunis ',NULL,'tonnay-charente ',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (53,'KUEHNE+NAGEL DSIA','16 rue de la petite sensive ',NULL,'Nantes ',NULL,'44323',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (54,'Leroy Somer','Boulevard Marcelin Leroy',NULL,'Angoulème',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (55,'LP Jean Rostand louise lériget','12 Rue Louise Lériget',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (56,'Lycée ?','66 Boulevard de châtenay ',NULL,'Cognac ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (57,'Lycée agricole','Site de l\'oisellerie ',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (58,'Lycée Agricole Bordeaux ',NULL,NULL,'Blanquefort ',NULL,'33290',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (59,'Lycee bellevue ',NULL,NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (60,'Lycée Bernard Palissy','1, Rue de Gascogne',NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (61,'lycée Georges Desclaude','rue Georges Desclaude',NULL,'Saintes',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (62,'Lycée georges Leygues ',NULL,NULL,'Villeneuve\\lot ',NULL,'47300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (63,'Lycée Jamain','2A Boulevard Pouzet ',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (64,'Lycée Jean DAUTET ',NULL,NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (65,'Lycée Léonce Vieljeux ','Rue des Gonthières ',NULL,'La Rochelle ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (66,'Lycée Marcel Dassault - ',' NULL',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (67,'lycée Professionnel Régional I',' NULL',NULL,'COGNAC ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (68,'Lycée Professionnel Rompsay',' Rue de Périgny ',NULL,'La Rochelle',NULL,'17025',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (69,'Lycée Victor hugo ',NULL,NULL,'Poitiers ',NULL,'86000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (70,'MAAF Assurances','SA Chauray ',NULL,'Niort ',NULL,'79036',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (71,'Maiano Informatique',' 17 rue de l\'électricité 17200 Royan ',NULL,'Royan ',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (72,'Mairie de Saintes','Square Andre Maudet ',NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (73,'Mairie de Chatelaillon ',NULL,NULL,'Chatelaillon ',NULL,'17340',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (74,'Mairie de Meschers','8 rue Paul Massy ',NULL,'MESCHERS SUR GIRONDE',NULL,'17132',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (75,'Mairie de Poitiers Informatiqu','Rue du Dolmen',NULL,'Poitiers',NULL,'86000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (76,'Mairie de Pont l\'Abbé d\'Arnoul','Place du général de Gaulle',NULL,'Pont l\'Abbé d\'Arnoult ',NULL,'17250',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (77,'MAIRIE DE ROYAN',' 80, avenue de Pontaillac ',NULL,'Royan ',NULL,'17200',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (78,'MAIRIE DE SAUJON',' Hotel de ville BP 108 ',NULL,'SAUJON ',NULL,'17600',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (79,'Malichaud atlantique','13 rue Hubert Pennevert',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (80,'MAPA Mutuelle d\'Assurance','Rue Anatole Contré ',NULL,'Saint Jean d\'Angély ',NULL,'17400',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (81,'Metal Néo','ZI des Soeurs, 21 Boulevard du vercors',NULL,'Rochefort',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (82,'MSA ','46, boulevard du Dr C.Duroselle',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (83,'NEOPC','ZI OUEST voie C ',NULL,'SURGERES ',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (84,'NEVA technologies','40 Rue de Marignan',NULL,'Cognac',NULL,'16',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (85,'ORECO S.A. ','44 bd Oscar Planat ',NULL,'COGNAC ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (86,'Orix Informatique','6 rue pape',NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (87,'Boutique?','Parc d\'activité Les Montagnes ',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (88,'PRODWARE','9 rue jacques cartier ',NULL,'AYTRE ',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (89,'Romain Informatique','20 rue de saint-vivien',NULL,' Bords',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (90,'Saint jean d\'Y / Val de Sainto',' rue texier ',NULL,'Saint Jean d\'Angély ',NULL,'17400',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (91,'SAINTRONIC',' parc atlantique, l\'ormeau de pied ',NULL,'SAINTES ',NULL,'17101',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (92,'SARL A.I.P.C. ','18, route de Frontenay RUFFIGNY',NULL,'LA CRECHE ',NULL,'79260',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (93,'SARL Concept Joueur Cité Joueu','15, rue Jean Fougerat ',NULL,'Angouleme ',NULL,'16000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (94,'SARL DIF Informatique','ZA de chez Bernard 25 route de Cognac',NULL,'Archiac',NULL,'17520',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (95,'SARL LE MONDE DU PC ','16,rue G. Claude ',NULL,'Vaux Sur Mer ',NULL,'17640',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (96,'Satti informatique ','rue Augustin Fresnel ZI ',NULL,'PERIGNY ',NULL,'17183',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (97,'Services-emedia','12 rue de la boulangerie ',NULL,'Bernay Saint-Martin ',NULL,'17330',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (98,'Simair','17 avenue André Dublin',NULL,'ROCHEFORT',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (99,'SOGEMAP','40, Rue de Marignan',NULL,'COGNAC ',NULL,'16100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (100,'SS2i-services','1 rue Alexandre Fleming',NULL,'LA ROCHELLE ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (101,'STEF INFORMATIX ','61, av. Lafayette ',NULL,'ROCHEFORT ',NULL,'17300',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (102,'Soluris',NULL,NULL,'SAINTES ',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (103,'SYSTEL SA','17 Rue Leverrien',NULL,'AYTRE',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (104,'URANIE ','Zone d\'activité des docks maritimes Bat A Quai Carriet ',NULL,'Lormont ',NULL,'33310',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (105,'Zolux','141 cours Paul Doumer',NULL,'Saintes',NULL,'17100',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (106,'Mairie Ecurat','route de ',NULL,'Ecurat',NULL,'17560',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (107,'SASU Esprit numérique','rue Henri Giraudeau',NULL,'Surgères',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (108,'Agence Wouep!','Pépinière d\'entreprises Indigo Allée de la Barratte',NULL,'Surgères',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (109,'LR Marketing','1 rue Fleming',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (110,'Cerealog ','1 place Bernard Moitessier',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (111,'Inter Mutuelles Assistance','118 avenue de Paris',NULL,'Niort ',NULL,'79033',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (112,'Conservatoire du littoral','Corderie Royale CS 10137',NULL,'Rochefort',NULL,'17306',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (113,'Communauté de Communes de l\'île de Ré','3, rue du Père Ignace',NULL,'Saint Martin de Ré',NULL,'17410',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (114,'Pluscom','45 rue de la gare',NULL,'Aytré',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (115,'Centre hospitalier Jonzac','4 avenue Winston Churchill ',NULL,'Jonzac',NULL,'17503',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (116,'Mairie de La Rochelle','Place de l\'hôtel de ville',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (117,'SICA Atlantique','69 rue Montcalm',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (118,'A2MI','10 rue Jean Perrin',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (119,'Agence des territoires de la Vienne','Avenue René Cassin',NULL,'Chasseneuil-du-Poitou',NULL,'86963',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (120,'Terra Lacta',' 2 rue de la Glacière 05 46 30 30 30',NULL,'Surgères  ',NULL,'17700',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (121,'AP-HP Corentin Celton','4, parvis Corentin Celton',NULL,'Issy-les-Moulineaux',NULL,'92130',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (122,'Essentia','23a rue Antoine Lavoisier',NULL,'Aytre',NULL,'17440',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (123,'Université de La Rochelle','15 rue Flemming',NULL,'La Rochelle',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (124,'MAIF','200 avenue Salvadore Allende',NULL,'Niort',NULL,'79000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (125,'Studio VA','5 quai Auriol',NULL,'Tonnay-Charente',NULL,'17430',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (126,'NASKIGO','21 Chemin du Prieuré ',NULL,' LA ROCHELLE ',NULL,'17000',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (127,'Eixa6 Informatique','5 Rue Louise Michel',NULL,'Marennes',NULL,'17320',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `Entreprise` VALUES (140,'BHI2C','  ','','SAINT-HILAIRE-DE-VILLEFRANCHE','','17770','17','48153967400012','46.52Z','PME','3 à 5 salariés',3,'2024-05-16 00:04:51');
INSERT INTO `Entreprise` VALUES (141,'CATALYSE INFORMATIQUE','21 RUE GUTENBERG','','AYTRE','','17440','17','47842596000026','47.41Z','PME','3 à 5 salariés',3,'2024-05-16 00:06:05');
INSERT INTO `Entreprise` VALUES (142,'START INFORMATIQUE','163 ROUTE DE LA TURPAUDIERE','','LA CHAPELLE-DES-POTS','','17100','17','45071596600021','47.41Z','PME','-',3,'2024-05-16 00:24:30');
INSERT INTO `Entreprise` VALUES (143,'RE-SET INFORMATIQUE','8 ROUTE DU GOISIL','','LA COUARDE-SUR-MER','','17670','17','89121926300011','62.02B','PME','-',3,'2024-05-16 09:07:08');
INSERT INTO `Entreprise` VALUES (145,'BANQUE DE FRANCE','22 RUE REAUMUR',NULL,'LA ROCHELLE',NULL,'17000',NULL,'57210489102555','64.11Z','12','12',3,'2024-05-18 23:06:55');
INSERT INTO `Entreprise` VALUES (146,'FB 17 TELECOM','4 PLACE ALSACE LORRAINE','','LA TREMBLADE','','17390','17','83212260000022','61.90Z','PME','3 à 5 salariés',3,'2024-05-24 08:59:44');
/*!40000 ALTER TABLE `Entreprise` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER Test_redondance
BEFORE INSERT
ON Entreprise FOR EACH ROW
BEGIN
    DECLARE count_exist INT;
    
    
    SELECT COUNT(*) INTO count_exist FROM Entreprise WHERE siret = NEW.siret;
    
    
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
-- Table structure for table `Stage`
--

DROP TABLE IF EXISTS `Stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEntreprise` int(11) DEFAULT NULL,
  `idMaitreDeStage` int(11) DEFAULT NULL,
  `idEtudiant` int(11) DEFAULT NULL,
  `classe` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idMaitreDeStage` (`idMaitreDeStage`),
  KEY `idEtudiant` (`idEtudiant`),
  CONSTRAINT `Stage_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`id`),
  CONSTRAINT `Stage_ibfk_2` FOREIGN KEY (`idMaitreDeStage`) REFERENCES `Employe` (`id`),
  CONSTRAINT `Stage_ibfk_3` FOREIGN KEY (`idEtudiant`) REFERENCES `User` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stage`
--

LOCK TABLES `Stage` WRITE;
/*!40000 ALTER TABLE `Stage` DISABLE KEYS */;
INSERT INTO `Stage` VALUES (1,1,1,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Stage` ENABLE KEYS */;
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
  `date_entree` date DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `spe` varchar(4) DEFAULT NULL COMMENT 'Spécialité (SLAM ou SISR)',
  `promo` varchar(4) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_reset` tinyint(1) DEFAULT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `inactif` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Dupond','André','',NULL,NULL,NULL,'','test','$2y$10$XzVV.OVw3QxgcuEW9ZXGEubrF0jYfVrJV73FDMLVd1zP2lOFeOtUW',0,'Etudiant',1);
INSERT INTO `User` VALUES (2,'prof','prof',NULL,NULL,NULL,NULL,'','prof','$2y$10$Ib3pC565U/q.lb4lxsa5W.oNfVjlHpdgvHUU0HA7TgwAkffgXFQrW',0,'Professeur',0);
INSERT INTO `User` VALUES (3,'Ornech','Jean-François','jean-francois.ornech@ac-poitiers.fr',NULL,'',NULL,'','jfornech','$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q',0,'Professeur',0);
INSERT INTO `User` VALUES (18,'Patrice','DENIS ARONIS','mail@mail.local',NULL,'',NULL,'','patrice','$2y$10$hR2DosUGTpgg/z4yy3X.vupNh9Rg7ri9rw3JIa8uJLzInmxLhBnLW',1,'Professeur',0);
INSERT INTO `User` VALUES (20,'Etudiant','etudiant de test','',NULL,'',NULL,'','sio','$2y$10$KeXbUulOY1uxBUdr.5zkDeTCDqLJHGYU8DF11Ji5PmUcBe79RI0Tq',0,'Etudiant',1);
INSERT INTO `User` VALUES (21,'login','login',NULL,NULL,NULL,NULL,'','login','$2y$10$NNi/pR4j1Ne4N8MD.QFJOedZjQtNhcfPttfxHRXPLYyPGrGzBDnXu',0,'Etudiant',0);
INSERT INTO `User` VALUES (40,'CASTILLO','Jean-Christophe','',NULL,'',NULL,'','castillojc','$2y$10$H5W2E9n/oN0m4C9ugRdbdeRUEYM.zM.DUGWMlPrIR1ID7XqI785vC',1,'Professeur',0);
INSERT INTO `User` VALUES (41,'BOUCHEREAU','Bertrand','',NULL,'',NULL,'','bouchereaub','$2y$10$HO4yuuq58SJBqqxnGzksCuvm4FWDBR6nWc3n6ZJHyNHdDEk2tBAK6',1,'Professeur',0);
INSERT INTO `User` VALUES (43,'test3','test3','test3@test3.test3',NULL,'',NULL,'','test3','$2y$10$vBFEKCAj89EuGo3oLKCZwOabwVoqMpIFIRuaRielTFisKJ07pts1G',0,'Etudiant',0);
INSERT INTO `User` VALUES (44,'test4','test4','',NULL,'',NULL,'','test4','$2y$10$NtrExBcCGJpDOA/hahsUWOAby9r7QQLo1lEMNvyjKsvgLhO.sszjC',0,'Professeur',0);
INSERT INTO `User` VALUES (283,'BARBIER','loann',NULL,'2023-09-04',NULL,'','','barbier.loann','$2y$10$LgIb4/JPIgLjEKcEQGM31.bhNcPx7ifu40zjg3AXb7uOE1EWOit0u',1,'Etudiant',0);
INSERT INTO `User` VALUES (284,'DEGRAUW VERRY','axel',NULL,'2023-09-04',NULL,'','','degrauwverry.axel','$2y$10$v0pV6vOxh2UtLG7U5X5d0u5EJGszxWZE.x84Lgf1PPMUUMDtMCy4i',1,'Etudiant',0);
INSERT INTO `User` VALUES (285,'ERNOULT','gabin',NULL,'2023-09-04',NULL,'','','ernoult.gabin','$2y$10$fcd96wY6oCbEWKjQ9ezSL.IWLaLP7aFTUj8yJbO.0FXh.U.whOctG',1,'Etudiant',0);
INSERT INTO `User` VALUES (286,'GAILLARD','logan',NULL,'2023-09-04',NULL,'','','gaillard.logan','$2y$10$b0qsMB0TmRAPE1wRDsYfue4fYhOdTaJ5cHAZ6Zae2LPknXC/hCUXi',1,'Etudiant',0);
INSERT INTO `User` VALUES (287,'KOSIOREK','alexandre',NULL,'2023-09-04',NULL,'','','kosiorek.alexandre','$2y$10$ZAmJ.kVgyJqEC/rVX.8vGeq6fXYIxjUPf/V2S9s5YZhJS5ntlcvmy',1,'Etudiant',0);
INSERT INTO `User` VALUES (288,'LE ROCHELEUIL  CHAILLE','alexis',NULL,'2023-09-04',NULL,'','','lerocheleuilchaille.alexis','$2y$10$qoWwikAq8GHhAdBGUVyqF.aqCMuGwntJZXyBwUy5dkpdF1tcEyaVq',1,'Etudiant',0);
INSERT INTO `User` VALUES (289,'LESCOUZERE','matheo',NULL,'2023-09-04',NULL,'','','lescouzere.matheo','$2y$10$HqU1mgQicDfWOabvOJ7PyuCeBQ5oQ6yISR7XOtbrhdbG5QXzqXb0C',1,'Etudiant',0);
INSERT INTO `User` VALUES (290,'MANUKYAN','astghik',NULL,'2023-09-04',NULL,'','','manukyan.astghik','$2y$10$PNd9ccVd.omSeZvPR9dabOCZdqJFXCI0JwE.MLzrxnN/Q6Nu3QemC',1,'Etudiant',0);
INSERT INTO `User` VALUES (291,'MINGOUOLO','noah',NULL,'2023-09-04',NULL,'','','mingouolo.noah','$2y$10$p5tkLzkj1RiVHyzn5WWdVOcr1E7t3HY30cWbq4uHQdc5.ayjOWK.C',1,'Etudiant',0);
INSERT INTO `User` VALUES (292,'MORNAC','erwan',NULL,'2023-09-04',NULL,'','','mornac.erwan','$2y$10$KaKZrvQJuGhNi/8tWIiRCeyjwzTn0dbYxePPx6knVq1lfSWxbWse6',1,'Etudiant',0);
INSERT INTO `User` VALUES (293,'RAMOS','clement',NULL,'2023-09-04',NULL,'','','ramos.clement','$2y$10$2nq9sOVxrNC6m5aKqw68f.6MmpcRzetq.qm4LpaQHCLSbuUZXeVjm',1,'Etudiant',0);
INSERT INTO `User` VALUES (294,'ROUX','kevin',NULL,'2023-09-04',NULL,'','','roux.kevin','$2y$10$3jlp/7o3pLewV5fL3GV2J.PkkNUqaSKUgqZsRdEy5zSwzX1HpZTjS',1,'Etudiant',0);
INSERT INTO `User` VALUES (295,'SAWANE','salle',NULL,'2023-09-04',NULL,'','','sawane.salle','$2y$10$D2dj.0mTOYqdJXiY.ORMJ.uwc/JqPjJqPyDbBebB/zLFjl8jtrkRq',1,'Etudiant',0);
INSERT INTO `User` VALUES (296,'SOUAKRI','lounes',NULL,'2023-09-04',NULL,'','','souakri.lounes','$2y$10$eLcFIfCY.dG8pirygmu.f.9JT5GFt1WMyDw2xJEHyxLaNORBI2nee',1,'Etudiant',0);
INSERT INTO `User` VALUES (297,'BONNET','matthieu',NULL,'2022-09-04',NULL,'','','bonnet.matthieu','$2y$10$Gz6vxW7uRyF.21sW33oTMel/yIZk8AFuLP00n81LIPd8XhtrLUFA.',1,'Etudiant',0);
INSERT INTO `User` VALUES (298,'BUIL','victor',NULL,'2022-09-04',NULL,'','','buil.victor','$2y$10$oL1Hs1ChRjg.Z/ctUrW6/O3/mUNXNdotZfIzhfqpIRpQVJtOOr5Ye',1,'Etudiant',0);
INSERT INTO `User` VALUES (299,'BURAUD','mathis',NULL,'2022-09-04',NULL,'','','buraud.mathis','$2y$10$T88L.I8FH1.yPbqrA1bjbOMV5PKfbDOALVzCkrpQrfWowLMyEUKiq',1,'Etudiant',0);
INSERT INTO `User` VALUES (300,'COQUILLAU','elowan',NULL,'2022-09-04',NULL,'','','coquillau.elowan','$2y$10$4bes3wmOeU5ECpEN/8RBVOnKRXtD.3Bh9jaKaf9m9PFeDe/nueNVC',1,'Etudiant',0);
INSERT INTO `User` VALUES (301,'COTTEREAU','corentin',NULL,'2022-09-04',NULL,'','','cottereau.corentin','$2y$10$/WWjbjvMfHERxHoOPbIkoe8IScbC1AD.TeYi3ipquU4Ll2WlKfiam',1,'Etudiant',0);
INSERT INTO `User` VALUES (302,'DE ALMEIDA','angel',NULL,'2022-09-04',NULL,'','','dealmeida.angel','$2y$10$gZCtPO6nMFJVFebVNDZJSuGygJAvxwZu6jR8mhZUCgW8tMgZL4PTC',1,'Etudiant',0);
INSERT INTO `User` VALUES (303,'DOMENICI','lheo',NULL,'2022-09-04',NULL,'','','domenici.lheo','$2y$10$KCl/7Mv/IRbZTXzocHm3EulSKpLe3U/gXKeFajbA8u2No1QAYUQeC',1,'Etudiant',0);
INSERT INTO `User` VALUES (304,'GARNIER','aurelien',NULL,'2022-09-04',NULL,'','','garnier.aurelien','$2y$10$wDye3E8DE2BraJ4nDhrOPevJov6PRd4U0uxZnjApWGfsEAQoElizq',1,'Etudiant',0);
INSERT INTO `User` VALUES (305,'GUICHARD','camille',NULL,'2022-09-04',NULL,'','','guichard.camille','$2y$10$CqKEETRFqDr4XYjNjOmBuen/9SjmH.B6L1N8ZZgQ6NB9TF2ilZSUm',1,'Etudiant',0);
INSERT INTO `User` VALUES (306,'LEFEBVRE','aleksander',NULL,'2022-09-04',NULL,'','','lefebvre.aleksander','$2y$10$rP37oqAr.aFo3UgeoK20UuUvhUbOj9Sbb9VU7UG64v3yFJU5fLyQS',1,'Etudiant',0);
INSERT INTO `User` VALUES (307,'MENARD','lucas',NULL,'2022-09-04',NULL,'','','menard.lucas','$2y$10$xcl0h3lHO9lVf0TaBxFtL.YPr6ephkdgE4qEThbqFD0TyXyt6Vxni',1,'Etudiant',0);
INSERT INTO `User` VALUES (308,'MIE','martin',NULL,'2022-09-04',NULL,'','','mie.martin','$2y$10$cTxklMVeDggknfMGaUmUreUqGRUfQLutqQVSIzYSFFU9so2j4d1uq',1,'Etudiant',0);
INSERT INTO `User` VALUES (309,'PERODEAU','matheo',NULL,'2022-09-04',NULL,'','','perodeau.matheo','$2y$10$sYxXUD11lKzs9byjX4V39erc.mAlpVmEQvGre/z1fv50IuOnNGp9a',1,'Etudiant',0);
INSERT INTO `User` VALUES (310,'POUPEAU','mathieu',NULL,'2022-09-04',NULL,'','','poupeau.mathieu','$2y$10$yiNoHD8QYjSIQuDLmXUy6OSWl3ncsALNWgd195FHMwyx3XtdngnLq',1,'Etudiant',0);
INSERT INTO `User` VALUES (311,'TEXIER','hugo',NULL,'2022-09-04',NULL,'','','texier.hugo','$2y$10$GIOZRvGjkTRIEcc0ecHV.eS1CtGhDArNsJefxGMXjMaytjT8KBc2W',1,'Etudiant',0);
INSERT INTO `User` VALUES (312,'THOMAS','dorian',NULL,'2022-09-04',NULL,'','','thomas.dorian','$2y$10$OS6Z5ON6SuqtAeLl/BFv5eSV4giJItE0hhpuODYELqJ0WQWpOl7TO',1,'Etudiant',0);
INSERT INTO `User` VALUES (313,'VINCENT','chloe',NULL,'2021-09-04',NULL,'','','vincent.chloe','$2y$10$EndTptWnDV0GAhsM0M3MC.yWiXl/qBy4KPSYavejgoXTx18DKj86e',1,'Etudiant',0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'Dupond','André','',NULL,NULL,'2023','test','$2y$10$XzVV.OVw3QxgcuEW9ZXGEubrF0jYfVrJV73FDMLVd1zP2lOFeOtUW',0,'Etudiant',1);
INSERT INTO `utilisateur` VALUES (2,'prof','prof',NULL,NULL,NULL,NULL,'prof','$2y$10$Ib3pC565U/q.lb4lxsa5W.oNfVjlHpdgvHUU0HA7TgwAkffgXFQrW',0,'Professeur',0);
INSERT INTO `utilisateur` VALUES (3,'Ornech','Jean-François','jean-francois.ornech@ac-poitiers.fr','',NULL,NULL,'jfornech','$2y$10$GVLSmMO4r25S2Uu.lpa6COtmNRdMr6.q.KgoDdVec.IIPtEi.GN.q',0,'Professeur',0);
INSERT INTO `utilisateur` VALUES (18,'Patrice','DENIS ARONIS','mail@mail.local','',NULL,'2024','patrice','$2y$10$hR2DosUGTpgg/z4yy3X.vupNh9Rg7ri9rw3JIa8uJLzInmxLhBnLW',1,'Professeur',0);
INSERT INTO `utilisateur` VALUES (20,'Etudiant','etudiant de test','','',NULL,'2024','sio','$2y$10$KeXbUulOY1uxBUdr.5zkDeTCDqLJHGYU8DF11Ji5PmUcBe79RI0Tq',0,'Etudiant',1);
INSERT INTO `utilisateur` VALUES (21,'login','login',NULL,NULL,NULL,'2023','login','$2y$10$NNi/pR4j1Ne4N8MD.QFJOedZjQtNhcfPttfxHRXPLYyPGrGzBDnXu',0,'Etudiant',0);
INSERT INTO `utilisateur` VALUES (40,'CASTILLO','Jean-Christophe','','',NULL,'','castillojc','$2y$10$H5W2E9n/oN0m4C9ugRdbdeRUEYM.zM.DUGWMlPrIR1ID7XqI785vC',1,'Professeur',0);
INSERT INTO `utilisateur` VALUES (41,'BOUCHEREAU','Bertrand','','',NULL,'2024','bouchereaub','$2y$10$HO4yuuq58SJBqqxnGzksCuvm4FWDBR6nWc3n6ZJHyNHdDEk2tBAK6',1,'Professeur',0);
INSERT INTO `utilisateur` VALUES (43,'test3','test3','test3@test3.test3','',NULL,'2024','test3','$2y$10$vBFEKCAj89EuGo3oLKCZwOabwVoqMpIFIRuaRielTFisKJ07pts1G',0,'Etudiant',0);
INSERT INTO `utilisateur` VALUES (44,'test4','test4','','',NULL,'2025','test4','$2y$10$NtrExBcCGJpDOA/hahsUWOAby9r7QQLo1lEMNvyjKsvgLhO.sszjC',0,'Professeur',0);
INSERT INTO `utilisateur` VALUES (45,'test6','test6','fazef@fazef.fr','',NULL,'2025','ttest6','$2y$10$gTGaPW57oOOmOFkWYvDUZe6JVuhUJCO6pf7E9r8sFzkloy63i0Ufq',0,'Etudiant',0);
INSERT INTO `utilisateur` VALUES (46,'test7','test7','frefr@fr.fr','','SLAM','2025','ttest7','$2y$10$P3z29YsZZ0mCJ/hyjgav4ua15bttqyN6Orht.rLPwdEMiO/o4JahW',0,'Etudiant',0);
INSERT INTO `utilisateur` VALUES (47,'Loann','BARBIER',NULL,NULL,'SIO','2023','barbier.loann','$2y$10$Zh1sPL7IGrYMlEPk13.KAeS9YUHOnBKb9mGhlePDKgaQ3zd5BLKAK',1,'étudiant',0);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
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
  1 AS `type`,
  1 AS `effectif`,
  1 AS `Created_Date`,
  1 AS `Created_User` */;
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
  1 AS `classe`,
  1 AS `description`,
  1 AS `dateDebut`,
  1 AS `dateFin`,
  1 AS `EtudiantNom`,
  1 AS `EtudiantPrenom`,
  1 AS `EtudiantEmail`,
  1 AS `EtudiantSpe`,
  1 AS `EtudiantPromo`,
  1 AS `siret`,
  1 AS `Entreprise`,
  1 AS `employe_nom`,
  1 AS `employe_prenom`,
  1 AS `employe_fonction` */;
SET character_set_client = @saved_cs_client;

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

--
-- Final view structure for view `Contact_employe`
--

/*!50001 DROP VIEW IF EXISTS `Contact_employe`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `Contact_employe` AS select `Employe`.`id` AS `EmployeID`,`Employe`.`nom` AS `nom`,`Employe`.`prenom` AS `prenom`,`Employe`.`email` AS `email`,`Employe`.`telephone` AS `telephone`,`Employe`.`fonction` AS `fonction`,`Entreprise`.`id` AS `EntrepriseID`,`Entreprise`.`nomEntreprise` AS `entreprise`,`User`.`id` AS `UserID`,concat(`User`.`nom`,' ',`User`.`prenom`) AS `Created_User`,`Employe`.`Created_date` AS `Created_date` from ((`Employe` join `Entreprise` on(`Employe`.`idEntreprise` = `Entreprise`.`id`)) join `User` on(`Employe`.`Created_UserID` = `User`.`id`)) */;
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
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vue_entreprise` AS select `e`.`id` AS `EntrepriseID`,`e`.`siret` AS `siret`,`e`.`nomEntreprise` AS `nomEntreprise`,`e`.`adresse` AS `adresse`,`e`.`ville` AS `ville`,`e`.`codePostal` AS `codePostal`,`e`.`naf` AS `naf`,`e`.`type` AS `type`,`e`.`effectif` AS `effectif`,`e`.`Created_Date` AS `Created_Date`,concat(`u`.`nom`,' ',`u`.`prenom`) AS `Created_User` from (`Entreprise` `e` join `User` `u` on(`e`.`Created_UserID` = `u`.`id`)) */;
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
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `vue_stage` AS select `s`.`id` AS `idStage`,`s`.`idEntreprise` AS `idEntreprise`,`s`.`idMaitreDeStage` AS `idMaitreDeStage`,`s`.`idEtudiant` AS `idEtudiant`,`s`.`classe` AS `classe`,`s`.`description` AS `description`,`s`.`dateDebut` AS `dateDebut`,`s`.`dateFin` AS `dateFin`,`u`.`nom` AS `EtudiantNom`,`u`.`prenom` AS `EtudiantPrenom`,`u`.`email` AS `EtudiantEmail`,`u`.`spe` AS `EtudiantSpe`,`u`.`promo` AS `EtudiantPromo`,`e`.`siret` AS `siret`,`e`.`nomEntreprise` AS `Entreprise`,`m`.`nom` AS `employe_nom`,`m`.`prenom` AS `employe_prenom`,`m`.`fonction` AS `employe_fonction` from (((`Stage` `s` join `User` `u` on(`s`.`idEtudiant` = `u`.`id`)) join `Entreprise` `e` on(`s`.`idEntreprise` = `e`.`id`)) join `Employe` `m` on(`s`.`idMaitreDeStage` = `m`.`id`)) */;
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

-- Dump completed on 2024-05-24 14:57:50
-- gestion_stage.Activite source

CREATE OR REPLACE
ALGORITHM = UNDEFINED VIEW `gestion_stage`.`Activite` AS
select
    `gestion_stage`.`Activite_Etu`.`id` AS `IdActivite`,
    `gestion_stage`.`User`.`id` AS `IdEtudiant`,
    `gestion_stage`.`Entreprise`.`id` AS `IdEntreprise`,
    cast(`gestion_stage`.`Activite_Etu`.`date` as date) AS `Date`,
    cast(`gestion_stage`.`Activite_Etu`.`date` as time) AS `Heure`,
    `gestion_stage`.`Activite_Etu`.`type` AS `Type`,
    concat(`gestion_stage`.`User`.`nom`, ' ', `gestion_stage`.`User`.`prenom`) AS `Etudiant`,
    `gestion_stage`.`Entreprise`.`nomEntreprise` AS `Entreprise`,
    `gestion_stage`.`Entreprise`.`ville` AS `Ville`,
    `gestion_stage`.`Activite_Etu`.`Commentaire` AS `Commentaire`
from
    ((`gestion_stage`.`Activite_Etu`
join `gestion_stage`.`User` on
    (`gestion_stage`.`Activite_Etu`.`IdEtudiant` = `gestion_stage`.`User`.`id`))
join `gestion_stage`.`Entreprise` on
    (`gestion_stage`.`Activite_Etu`.`ID_Entreprise` = `gestion_stage`.`Entreprise`.`id`));
    
    
 -- gestion_stage.Contact_employe source

CREATE OR REPLACE
ALGORITHM = UNDEFINED VIEW `gestion_stage`.`Contact_employe` AS
select
    `gestion_stage`.`Employe`.`id` AS `EmployeID`,
    `gestion_stage`.`Employe`.`nom` AS `nom`,
    `gestion_stage`.`Employe`.`prenom` AS `prenom`,
    `gestion_stage`.`Employe`.`email` AS `email`,
    `gestion_stage`.`Employe`.`telephone` AS `telephone`,
    `gestion_stage`.`Employe`.`fonction` AS `fonction`,
    `gestion_stage`.`Entreprise`.`id` AS `EntrepriseID`,
    `gestion_stage`.`Entreprise`.`nomEntreprise` AS `entreprise`,
    `gestion_stage`.`User`.`id` AS `UserID`,
    concat(`gestion_stage`.`User`.`nom`, ' ', `gestion_stage`.`User`.`prenom`) AS `Created_User`,
    `gestion_stage`.`Employe`.`Created_date` AS `Created_date`
from
    ((`gestion_stage`.`Employe`
join `gestion_stage`.`Entreprise` on
    (`gestion_stage`.`Employe`.`idEntreprise` = `gestion_stage`.`Entreprise`.`id`))
join `gestion_stage`.`User` on
    (`gestion_stage`.`Employe`.`Created_UserID` = `gestion_stage`.`User`.`id`));
    
-- gestion_stage.vue_entreprise source

CREATE OR REPLACE
ALGORITHM = UNDEFINED VIEW `gestion_stage`.`vue_entreprise` AS
select
    `e`.`id` AS `EntrepriseID`,
    `e`.`siret` AS `siret`,
    `e`.`nomEntreprise` AS `nomEntreprise`,
    `e`.`adresse` AS `adresse`,
    `e`.`ville` AS `ville`,
    `e`.`codePostal` AS `codePostal`,
    `e`.`naf` AS `naf`,
    `e`.`type` AS `type`,
    `e`.`effectif` AS `effectif`,
    `e`.`Created_Date` AS `Created_Date`,
    concat(`u`.`nom`, ' ', `u`.`prenom`) AS `Created_User`
from
    (`gestion_stage`.`Entreprise` `e`
join `gestion_stage`.`User` `u` on
    (`e`.`Created_UserID` = `u`.`id`));
    
    
    -- gestion_stage.vue_stage source

CREATE OR REPLACE
ALGORITHM = UNDEFINED VIEW `gestion_stage`.`vue_stage` AS
select
    `s`.`id` AS `idStage`,
    `s`.`idEntreprise` AS `idEntreprise`,
    `s`.`idMaitreDeStage` AS `idMaitreDeStage`,
    `s`.`idEtudiant` AS `idEtudiant`,
    `s`.`classe` AS `classe`,    
    `s`.`description` AS `description`,
    `s`.`dateDebut` AS `dateDebut`,
    `s`.`dateFin` AS `dateFin`,
    `u`.`nom` AS `EtudiantNom`,
    `u`.`prenom` AS `EtudiantPrenom`,
    `u`.`email` AS `EtudiantEmail`,
    `u`.`spe` AS `EtudiantSpe`,
    `u`.`promo` AS `EtudiantPromo`,
    `e`.`siret` AS `siret`,
    `e`.`nomEntreprise` AS `Entreprise`,
    `m`.`nom` AS `employe_nom`,
    `m`.`prenom` AS `employe_prenom`,
    `m`.`fonction` AS `employe_fonction`
from
    (((`gestion_stage`.`Stage` `s`
join `gestion_stage`.`User` `u` on
    (`s`.`idEtudiant` = `u`.`id`))
join `gestion_stage`.`Entreprise` `e` on
    (`s`.`idEntreprise` = `e`.`id`))
join `gestion_stage`.`Employe` `m` on
    (`s`.`idMaitreDeStage` = `m`.`id`));
