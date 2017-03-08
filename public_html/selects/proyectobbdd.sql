
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'Barcelona','Barcelona'),(2,'Mataró','Barcelona'),(3,'Granollers','Barcelona'),(4,'Sabadell','Barcelona'),(5,'Terrasa','Barcelona'),(6,'Madrid','Madrid'),(7,'Valencia','Valencia');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concierto`
--

DROP TABLE IF EXISTS `concierto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concierto` (
  `id_concierto` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `pago` decimal(6,2) NOT NULL,
  `local` int(11) NOT NULL,
  `genero` int(11) NOT NULL,
  `asignado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_concierto`),
  KEY `fk_conc_local` (`local`),
  KEY `fk_conc_genero` (`genero`),
  CONSTRAINT `fk_conc_genero` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`),
  CONSTRAINT `fk_conc_local` FOREIGN KEY (`local`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concierto`
--

LOCK TABLES `concierto` WRITE;
/*!40000 ALTER TABLE `concierto` DISABLE KEYS */;
INSERT INTO `concierto` VALUES (1,'2016-12-28','18:00:00',450.00,6,6,1),(2,'2016-12-29','21:00:00',300.00,7,7,1),(3,'2016-12-30','22:00:00',355.00,8,1,1),(4,'2017-01-04','20:00:00',375.00,9,5,1),(5,'2017-01-05','22:00:00',415.00,10,4,1),(6,'2017-01-05','23:00:00',550.00,11,7,1),(7,'2017-01-09','22:00:00',285.00,12,4,1),(8,'2017-01-10','22:30:00',350.00,6,3,1),(9,'2017-01-12','21:25:00',400.00,6,6,0),(10,'2017-02-01','20:00:00',333.00,7,2,0),(11,'2017-02-03','21:00:00',400.00,8,6,1),(12,'2017-02-03','22:00:00',350.00,9,5,0);
/*!40000 ALTER TABLE `concierto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fan`
--

DROP TABLE IF EXISTS `fan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fan` (
  `id_fan` int(11) NOT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`id_fan`),
  CONSTRAINT `fk_fan_usu` FOREIGN KEY (`id_fan`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fan`
--

LOCK TABLES `fan` WRITE;
/*!40000 ALTER TABLE `fan` DISABLE KEYS */;
INSERT INTO `fan` VALUES (15,'Tejedor','H','1990-05-01'),(16,'Laborda','H','1988-03-24'),(17,'Bartomeu','H','1994-11-12'),(18,'Fernandez','H','1983-07-05'),(19,'Reyes','M','1997-09-30'),(20,'Lopez','M','1989-08-27'),(21,'Soto','M','1996-06-16');
/*!40000 ALTER TABLE `fan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Rock'),(2,'Pop'),(3,'Disco'),(4,'Punk'),(5,'Dance'),(6,'Heavy Metal'),(7,'Clásica');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `aforo` int(11) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_local`),
  CONSTRAINT `fk_local_usu` FOREIGN KEY (`id_local`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (6,700,'Pamplona, 88'),(7,400,'Francesc Layret, 16'),(8,450,'Segarra, 25'),(9,550,'Regueros, 5'),(10,300,'Campoamor, 60'),(11,325,'Josep Tapiolas, 75'),(12,460,'Ramón y Cajal, 80'),(13,600,'Via Augusta, 32');
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musico`
--

DROP TABLE IF EXISTS `musico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musico` (
  `id_musico` int(11) NOT NULL,
  `n_componentes` int(11) DEFAULT NULL,
  `genero` int(11) NOT NULL,
  PRIMARY KEY (`id_musico`),
  KEY `fk_musico_gen` (`genero`),
  CONSTRAINT `fk_musico_gen` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`),
  CONSTRAINT `fk_musico_usu` FOREIGN KEY (`id_musico`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musico`
--

LOCK TABLES `musico` WRITE;
/*!40000 ALTER TABLE `musico` DISABLE KEYS */;
INSERT INTO `musico` VALUES (1,4,1),(2,1,5),(3,4,6),(4,1,7),(5,4,4),(14,3,3);
/*!40000 ALTER TABLE `musico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propuesta`
--

DROP TABLE IF EXISTS `propuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propuesta` (
  `concierto` int(11) NOT NULL,
  `musico` int(11) NOT NULL,
  `aceptado` tinyint(1) NOT NULL,
  PRIMARY KEY (`concierto`,`musico`),
  KEY `fk_prop_musico` (`musico`),
  CONSTRAINT `fk_prop_conc` FOREIGN KEY (`concierto`) REFERENCES `concierto` (`id_concierto`),
  CONSTRAINT `fk_prop_musico` FOREIGN KEY (`musico`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propuesta`
--

LOCK TABLES `propuesta` WRITE;
/*!40000 ALTER TABLE `propuesta` DISABLE KEYS */;
INSERT INTO `propuesta` VALUES (1,1,0),(1,2,0),(1,3,1),(1,14,0),(2,4,1),(3,1,1),(3,5,0),(4,2,1),(4,3,0),(5,5,1),(6,4,1),(7,5,1),(8,14,1),(9,3,0),(9,4,0),(9,5,0),(10,2,0),(10,6,0),(11,3,1),(12,1,0),(12,4,0);
/*!40000 ALTER TABLE `propuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `web` varchar(80) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `mail` (`mail`),
  KEY `fk_usu_ciudad` (`ciudad`),
  CONSTRAINT `fk_usu_ciudad` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Queen','queen@queen.com','1234','M',1,NULL,NULL,'/img/queen.jpg'),(2,'David Guetta','david@davidguetta.com','1234','M',2,NULL,NULL,'/img/davidguetta.jpg'),(3,'Metallica','metallica@metallica.com','1234','M',7,NULL,NULL,'/img/metallica.jpg'),(4,'Wolfgang Amadeus Mozart','mozart@classy.com','1234','M',6,NULL,NULL,'/img/mozart.jpeg'),(5,'The Offspring','manolete@gmail.com','1234','M',1,NULL,NULL,'/img/theoffspring.jpg'),(6,'Razzmatazz','info@razzmatazz','1234','L',1,NULL,NULL,'/img/razzmatazz.jpg'),(7,'Sala Privat','sala@salaprivat.com','1234','L',2,NULL,NULL,NULL),(8,'Sala Rock','info@salarock.com','1234','L',3,NULL,NULL,NULL),(9,'Rave Cave','rave@ravecave.es','1234','L',6,NULL,NULL,NULL),(10,'The Tribune','info@thetribune.es','1234','L',4,NULL,NULL,NULL),(11,'Classic Hall','classic@classichall.com','1234','L',7,NULL,NULL,NULL),(12,'Punkie Junkie','punkie@junkie.com','1234','L',1,NULL,NULL,NULL),(13,'Fun Haus','info@funhaus.com','1234','L',5,NULL,NULL,NULL),(14,'Bee Gees','info@beegees.com','1234','M',1,NULL,NULL,NULL),(15,'Ruben','ruben@dummy.com','1234','F',1,NULL,NULL,NULL),(16,'Sebastian','sebastian@dummy.com','1234','F',2,NULL,NULL,NULL),(17,'Javier','javier@dummy.com','1234','F',3,NULL,NULL,NULL),(18,'Marc','marc@dummy.com','1234','F',4,NULL,NULL,NULL),(19,'Raquel','raquel@dummy.com','1234','F',5,NULL,NULL,NULL),(20,'Beatriz','beatriz@dummy.com','1234','F',6,NULL,NULL,NULL),(21,'Victoria','victoria@dummy.com','1234','F',7,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voto_concierto`
--

DROP TABLE IF EXISTS `voto_concierto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voto_concierto` (
  `fan` int(11) NOT NULL,
  `concierto` int(11) NOT NULL,
  PRIMARY KEY (`fan`,`concierto`),
  KEY `fk_votoconc_conc` (`concierto`),
  CONSTRAINT `fk_votoconc_conc` FOREIGN KEY (`concierto`) REFERENCES `concierto` (`id_concierto`),
  CONSTRAINT `fk_votoconc_fan` FOREIGN KEY (`fan`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voto_concierto`
--

LOCK TABLES `voto_concierto` WRITE;
/*!40000 ALTER TABLE `voto_concierto` DISABLE KEYS */;
INSERT INTO `voto_concierto` VALUES (15,1),(16,1),(18,1),(19,1),(20,1),(21,1),(15,2),(21,2),(15,3),(18,3),(21,3),(15,4),(17,4),(16,5),(16,6),(21,6),(16,7),(17,7),(18,7),(16,8),(17,8),(18,8),(19,8);
/*!40000 ALTER TABLE `voto_concierto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voto_musico`
--

DROP TABLE IF EXISTS `voto_musico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voto_musico` (
  `fan` int(11) NOT NULL,
  `musico` int(11) NOT NULL,
  PRIMARY KEY (`fan`,`musico`),
  KEY `fk_votomusic_musico` (`musico`),
  CONSTRAINT `fk_votomusic_fan` FOREIGN KEY (`fan`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk_votomusic_musico` FOREIGN KEY (`musico`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voto_musico`
--

LOCK TABLES `voto_musico` WRITE;
/*!40000 ALTER TABLE `voto_musico` DISABLE KEYS */;
INSERT INTO `voto_musico` VALUES (15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(15,2),(16,2),(17,2),(18,2),(19,2),(15,3),(16,3),(17,3),(18,3),(15,4),(16,4),(17,4),(15,5),(16,5),(15,14);
/*!40000 ALTER TABLE `voto_musico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-08 18:20:54
