-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: theworldcycle
-- ------------------------------------------------------
-- Server version	5.6.26-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adreca`
--

DROP TABLE IF EXISTS `adreca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adreca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrer` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `pis` int(11) DEFAULT NULL,
  `porta` int(11) DEFAULT NULL,
  `postal` int(11) NOT NULL,
  `id_ciutat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adreca`
--

LOCK TABLES `adreca` WRITE;
/*!40000 ALTER TABLE `adreca` DISABLE KEYS */;
INSERT INTO `adreca` VALUES (2,'C/Maria Trulls Algué',53,NULL,NULL,8700,1),(3,'C/Calaf',103,1,2,8700,1),(4,'C/Masquefa',9,1,1,98765,13),(5,'C/Masquefa',9,2,2,98765,13),(6,'C/Masquefa',9,1,1,98765,1),(7,'C/Capallades',102,1,1,8700,1),(8,'C/Calaf',23,1,1,8700,1),(9,'C/Valencia',2,3,3,9876,15),(10,'C/Castelloli',3,NULL,NULL,8700,1),(11,'C/Calaf',23,1,1,83838,20),(12,'C/Masquefa',3,NULL,NULL,12345,19),(13,'C/Masquefa',2,NULL,NULL,98765,0),(14,'C/Masquefa',2,NULL,NULL,12345,0),(15,'C/Masquefa',2,NULL,NULL,9876,0),(16,'C/Masquefa',1,NULL,NULL,12345,0),(17,'C/Piera',2,NULL,NULL,12345,25),(18,'C/Sitges',2,1,2,9876,3),(19,'C/Masquefa',2,1,1,12345,17),(20,'C/Calaf',32,1,1,9876,3),(21,'C/Lleida',23,NULL,NULL,12312,26),(22,'C/Lleida',23,NULL,NULL,9876,26),(23,'C/Lleida',23,NULL,NULL,12345,26),(24,'C/Calaf',1,NULL,NULL,12345,17),(25,'C/Mataro',1,1,1,12345,24),(26,'C/Maria Trulls Algué',1,NULL,NULL,8700,1),(27,'C/Maria Trulls Algue',53,NULL,NULL,8700,1),(28,'C/calle Valencia',23,2,1,12345,15),(29,'C/Maria Trulls Algue',2,NULL,NULL,8700,27),(30,'C/Ramon',23,1,1,12323,17),(31,'C/Maria Trulls Algue',87,NULL,NULL,8700,28),(32,'C/Calaf',1,1,1,12345,17),(33,'C/Sant Cugat',11,1,1,12312,29),(34,'C/Ramon',1,1,1,12312,17),(35,'C/Maria Trulls Algue',53,NULL,NULL,12313,17),(36,'C/Maria Trulls Algue',53,NULL,NULL,12332,2),(37,'C/kdjkdjkdj',23,NULL,NULL,8700,26),(38,'C/Masquefa',1,NULL,NULL,9876,30),(39,'C/Ramon',1,NULL,NULL,12345,30),(40,'C/Lleida',100,1,1,8700,1),(41,'C/Garcia',2,NULL,NULL,9876,8),(42,'C/san cugat',11,1,1,12345,29),(43,'C/Maria Trulls Algue',53,NULL,NULL,89765,8),(44,'C/Ramon',1,1,1,12345,3),(45,'c/Sant feliu',2,1,2,12345,24),(46,'C/Calaf',1,1,1,12345,29),(47,'C/Maria Trulls',53,1,1,12345,30),(48,'C/calle Valencia',3,NULL,NULL,12345,12),(49,'C/Garcia',32,1,1,12345,25),(50,'C/Maria Trulls i Algué',53,NULL,NULL,9900,3),(53,'C/Calaf',2,NULL,NULL,9231,31),(54,'C/maria Trulls',53,NULL,NULL,12345,26),(55,'C/Maria Trulls i Algué',23,NULL,NULL,8700,1),(56,'C/Maria trulls',2,2,2,8700,1),(57,'C/lleida',23,NULL,NULL,12345,3),(58,'C/Maria Trulls i Algué',53,NULL,NULL,8700,1),(61,'Avinguda Doctor Pasteur',32,2,2,8700,1),(63,'C/Maria Trulls i Algué 53',54,NULL,NULL,8700,1);
/*!40000 ALTER TABLE `adreca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `descripció` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Quadro','Productes que ven els quadros dels bicis'),(2,'Forquilla','Productes que ven les forquilles dels bicis'),(3,'Rodes','Productes que ven les rodes dels bicis'),(4,'Accessoris','Productes que ven peces dels bicis'),(5,'Cascos','Productes que ven els cascos per protegir'),(6,'Roba','Productes que ven la roba per anar bici'),(7,'Frens','Productes que ven els frenos com pasitlles, disc i etc dels bicis'),(8,'Bicis','Productes que ven tot junt amb bici');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciutat`
--

DROP TABLE IF EXISTS `ciutat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciutat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `id_provinciaregio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciutat`
--

LOCK TABLES `ciutat` WRITE;
/*!40000 ALTER TABLE `ciutat` DISABLE KEYS */;
INSERT INTO `ciutat` VALUES (1,'Igualada',1),(2,'Cervera',2),(3,'Barcelona',1),(4,'Girona',3),(5,'Lleida',2),(6,'La Pobla de Claramunt',1),(7,'Olot',3),(8,'Sitges',1),(9,'Montbui',1),(10,'Calaf',1),(12,'Sant Genis',1),(13,'Tarragona',4),(15,'Cuenca',5),(17,'Bellpuig',2),(19,'Mollerussa',2),(20,'Capallades',1),(21,'Santander',6),(22,'Santiago de Compostela',7),(23,'Valencia',8),(24,'Cornella',1),(25,'Piera',1),(26,'La Fuliola',2),(27,'222',1),(28,'Carme',1),(29,'Sant Cugat',1),(30,'Odena',1),(31,'Sabadell',1);
/*!40000 ALTER TABLE `ciutat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentar`
--

DROP TABLE IF EXISTS `comentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producte` int(11) NOT NULL,
  `id_usuari` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `descripcio` varchar(500) NOT NULL,
  PRIMARY KEY (`id`,`id_producte`,`id_usuari`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentar`
--

LOCK TABLES `comentar` WRITE;
/*!40000 ALTER TABLE `comentar` DISABLE KEYS */;
INSERT INTO `comentar` VALUES (14,3,39,'2016-05-17 13:52:06','Prova hola hola'),(15,3,39,'2016-05-17 13:53:10','prova prova prova prova adeu'),(16,4,39,'2016-05-17 14:01:02','Hola \nAquest producte es bo?\nProva Prova'),(17,3,39,'2016-05-17 14:01:59','Hola \nCom va?\nAdeu'),(30,6,39,'2016-05-17 18:40:05','Bones proves'),(37,4,39,'2016-05-17 18:54:04','provaaaaa'),(45,1,39,'2016-05-19 13:31:15','Hola ');
/*!40000 ALTER TABLE `comentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id_producte` int(11) NOT NULL,
  `id_usuari` int(11) NOT NULL,
  `data` date NOT NULL,
  `quantitat` int(11) NOT NULL,
  `id_factura` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producte`,`id_usuari`,`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (94,3,'2016-05-31',1,2),(96,3,'2016-05-31',1,3),(97,3,'2016-05-31',1,4),(98,3,'2016-05-31',1,1),(101,3,'2016-05-31',1,5),(103,3,'2016-05-31',1,6);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrassenya`
--

DROP TABLE IF EXISTS `contrassenya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrassenya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrassenya`
--

LOCK TABLES `contrassenya` WRITE;
/*!40000 ALTER TABLE `contrassenya` DISABLE KEYS */;
INSERT INTO `contrassenya` VALUES (35,'250cf8b51c773f3f8dc8b4be867a9a02'),(36,'202cb962ac59075b964b07152d234b70'),(37,'189bbbb00c5f1fb7fba9ad9285f193d1'),(38,'3350073dd991a43b05aedf4969ea7e46'),(39,'1775223eeeb515c77a7f201db191af09'),(40,'d41d8cd98f00b204e9800998ecf8427e'),(41,'b601badd1d4dfcd6e01b3f1ff702f959');
/*!40000 ALTER TABLE `contrassenya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estat`
--

DROP TABLE IF EXISTS `estat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcio` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`descripcio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estat`
--

LOCK TABLES `estat` WRITE;
/*!40000 ALTER TABLE `estat` DISABLE KEYS */;
INSERT INTO `estat` VALUES (1,'alta'),(2,'baixa');
/*!40000 ALTER TABLE `estat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preutotal` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,1010),(2,1010),(3,150),(4,1210),(5,410),(6,1100);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imatge`
--

DROP TABLE IF EXISTS `imatge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imatge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_arxiu` varchar(200) NOT NULL,
  `id_producte` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imatge`
--

LOCK TABLES `imatge` WRITE;
/*!40000 ALTER TABLE `imatge` DISABLE KEYS */;
INSERT INTO `imatge` VALUES (97,'MO-510008-0010.jpg',94),(98,'Kask-Protone-Road.jpg',96),(99,'cannondale_trail.jpg',97),(100,'canyon_01_full.jpg',98),(101,'canyon_03.jpg',98),(102,'canyon_08.jpg',98),(103,'ruedas-bicicleta-carretera-ruedas.jpg',101),(104,'rhochox.jpg',103),(105,'mailot_trek.jpg',104),(106,'cadena_velocitats.jpg',105),(107,'Road Cyclocross RX Team OFERTA RX TEAM 105 LC206.jpg',107),(108,'22t-770.jpg',0),(109,'22t-770.jpg',108),(112,'baixa.jpg',0);
/*!40000 ALTER TABLE `imatge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (3,'Espanya'),(4,'França'),(5,'Alemanya'),(6,'Portugal'),(7,'Italia'),(8,'Finlandia');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producte`
--

DROP TABLE IF EXISTS `producte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) NOT NULL,
  `preu` float NOT NULL,
  `unitat` int(11) NOT NULL,
  `nou/segon` varchar(45) NOT NULL,
  `descripció` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producte`
--

LOCK TABLES `producte` WRITE;
/*!40000 ALTER TABLE `producte` DISABLE KEYS */;
INSERT INTO `producte` VALUES (94,'Guants Astana Team 2016',10,0,'Nou','Estem liquidant la botiga i baixem preu.'),(96,'Casc Kask Protone',110,0,'Nou','Per poc ús'),(97,'Cannondale Trail 2016',1200,0,'Segonma','Venc un tipus trial per poder comprar un de nou.'),(98,'Canyon 2008 nerve xc9',1000,0,'Segonma','Es talla S i ven per poc ús.'),(101,'Vasmis cosmic',400,1,'Nou','No estan estranades i són noves.'),(103,'Forquilla xc32 Rockshox 100 mm',100,0,'Segonma','Modifico les peces del bici i aquest motiu vull vendre.'),(104,'Mailot Trek talla L',20,2,'Segonma','Tinc un mun de mailots i tinc inteció de vendre.'),(105,'Cadena Shimano HG40 6-7-8 velocitats',4,3,'Segonma','Al final ni vaig posar i no vull tenir guardat el magatzem.'),(107,'BH RX TEAM 105 de carretera talla S',1000,1,'Segonma','Venc per poc ús i esta molt bon estat.'),(108,'Plat Rondo Shimano XT M800/M770/M660/M590',10,3,'Nou','Es ven per poc us'),(109,'Plat Ovalado Rotor Q-Rings QX2 BCD 104x4 negro 38D',100,7,'Nou','Es ven per no utilitzar mai.'),(113,'prova',23,2,'Nou','ñlkaslkdjf');
/*!40000 ALTER TABLE `producte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinciaregio`
--

DROP TABLE IF EXISTS `provinciaregio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinciaregio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinciaregio`
--

LOCK TABLES `provinciaregio` WRITE;
/*!40000 ALTER TABLE `provinciaregio` DISABLE KEYS */;
INSERT INTO `provinciaregio` VALUES (1,'Barcelona',3),(2,'Lleida',3),(3,'Girona',3),(4,'Tarragona',3),(5,'Cuenca',3),(6,'Santander',3),(7,'La Coruna',3),(8,'Valencia',3);
/*!40000 ALTER TABLE `provinciaregio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permisos` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'client');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasa`
--

DROP TABLE IF EXISTS `tasa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentatge` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasa`
--

LOCK TABLES `tasa` WRITE;
/*!40000 ALTER TABLE `tasa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `te_prd_ctg`
--

DROP TABLE IF EXISTS `te_prd_ctg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `te_prd_ctg` (
  `id_producte` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_producte`,`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `te_prd_ctg`
--

LOCK TABLES `te_prd_ctg` WRITE;
/*!40000 ALTER TABLE `te_prd_ctg` DISABLE KEYS */;
INSERT INTO `te_prd_ctg` VALUES (0,1),(0,4),(94,4),(96,5),(97,8),(98,8),(101,3),(103,2),(104,6),(105,4),(107,8),(108,4),(109,4),(113,2);
/*!40000 ALTER TABLE `te_prd_ctg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `te_usr_adr`
--

DROP TABLE IF EXISTS `te_usr_adr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `te_usr_adr` (
  `id_usuari` int(11) NOT NULL,
  `id_adreça` int(11) NOT NULL,
  PRIMARY KEY (`id_usuari`,`id_adreça`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `te_usr_adr`
--

LOCK TABLES `te_usr_adr` WRITE;
/*!40000 ALTER TABLE `te_usr_adr` DISABLE KEYS */;
INSERT INTO `te_usr_adr` VALUES (3,2),(3,61),(37,39),(38,27),(39,32),(40,40),(41,41),(42,42),(43,43),(44,44),(45,27),(46,45),(47,46),(48,47),(49,48),(50,49),(50,53),(51,54),(52,55),(53,56),(53,57),(54,58),(55,63);
/*!40000 ALTER TABLE `te_usr_adr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuari`
--

DROP TABLE IF EXISTS `usuari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correu` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `cognom1` varchar(45) NOT NULL,
  `cognom2` varchar(45) DEFAULT NULL,
  `h/d` varchar(4) DEFAULT NULL,
  `telefon` int(11) NOT NULL,
  `data_naix` date NOT NULL,
  `data_inici` date NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_contrassenya` int(11) NOT NULL,
  `id_estat` int(11) NOT NULL,
  PRIMARY KEY (`id`,`correu`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuari`
--

LOCK TABLES `usuari` WRITE;
/*!40000 ALTER TABLE `usuari` DISABLE KEYS */;
INSERT INTO `usuari` VALUES (3,'rogercat23@gmail.com','Roger','Freixes','Ribalta','Home',123123121,'1991-03-22','1991-03-27',1,37,1),(37,'sara@gmail.com','Saraa','Dalmau','Roca','Dona',123453212,'1997-05-01','2016-04-12',2,41,2),(38,'rogercat33@gmail.com','Roger','Freixes','Ribalta','Home',123123123,'1991-03-25','2016-04-14',2,41,1),(39,'prova@gmail.com','Prova','Provados','Provatres','Home',123123332,'1991-03-25','2016-04-14',2,41,1),(41,'prova123@gmail.com','Prova','Prova','Prova','Home',123123123,'1990-01-01','2016-04-14',2,41,1),(43,'marc@gmail.com','Prova','Provaprimer','Provasegon','Dona',987654321,'1987-01-23','2016-04-14',2,41,1),(47,'prova321@gmail.com','Prova','Prova','Prova','Home',123123123,'1991-01-01','2016-04-14',2,41,1),(48,'luissuarez@gmail.com','Luis','Suarez','Salgado','Home',123123123,'1987-01-01','2016-04-14',2,41,1),(49,'jpurito@gmail.com','Joaquim','Rodriguez','Purito','Home',765432123,'1990-04-01','2016-04-14',2,41,1),(50,'urbano@gmail.com','Urbano','Mendez','Rodriguez','Home',999999999,'2007-03-15','2016-05-19',2,41,1),(51,'rfb@exelfil.com','Ramon','Freixes','Batalla','Home',123455782,'1960-03-25','2016-05-21',2,41,1),(52,'gmarc@gmail.com','Prova','Prova','Prova','Home',123123123,'1991-03-23','2016-05-24',2,41,1),(53,'cep@gmail.com','kdkdk','kdkdkd','dkdkd','Home',123456789,'2008-02-20','2016-05-25',1,41,1),(54,'mery@gmail.com','Meritxell','Freixes','Ribalta','Dona',123456789,'1998-05-03','2016-05-26',2,41,1),(55,'ubrano@gmail.com','Roger','Freixes','Ribalta','Home',123456789,'2006-02-01','2016-05-30',2,41,1);
/*!40000 ALTER TABLE `usuari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendre`
--

DROP TABLE IF EXISTS `vendre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendre` (
  `id_producte` int(11) NOT NULL,
  `id_usuari` int(11) NOT NULL,
  `data` date NOT NULL,
  `quantitat` int(11) NOT NULL,
  PRIMARY KEY (`id_producte`,`id_usuari`,`data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendre`
--

LOCK TABLES `vendre` WRITE;
/*!40000 ALTER TABLE `vendre` DISABLE KEYS */;
INSERT INTO `vendre` VALUES (0,3,'2016-05-29',3),(94,52,'2016-05-28',4),(96,52,'2016-05-28',1),(97,52,'2016-05-28',1),(98,39,'2016-05-28',1),(101,39,'2016-05-28',2),(103,39,'2016-05-28',1),(104,3,'2016-05-28',2),(105,3,'2016-05-28',3),(107,3,'2016-05-28',1),(108,3,'2016-05-29',3),(109,3,'2016-05-29',7),(113,3,'2016-05-31',2);
/*!40000 ALTER TABLE `vendre` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-31 21:37:25
