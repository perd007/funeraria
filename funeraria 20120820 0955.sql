-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema funeraria
--

CREATE DATABASE IF NOT EXISTS funeraria;
USE funeraria;

--
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `nombres` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cedula`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`nombres`,`cedula`,`edad`,`telefono`,`ciudad`,`direccion`,`observaciones`,`id`) VALUES 
 ('jose perez',1111,11,'11111','Ciudad BOlivar','ñññ','ñññ',5);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


--
-- Definition of table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE `contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `servicio` decimal(10,0) NOT NULL,
  `semanal` decimal(10,0) NOT NULL,
  `mensual` decimal(10,0) NOT NULL,
  `ciudad` varchar(300) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `ano` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `cliente` (`cliente`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contratos`
--

/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;


--
-- Definition of table `familiares`
--

DROP TABLE IF EXISTS `familiares`;
CREATE TABLE `familiares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `familiar` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` varchar(10) NOT NULL,
  `ano` int(11) NOT NULL,
  `puesto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `familiar` (`familiar`),
  CONSTRAINT `familiares_ibfk_1` FOREIGN KEY (`familiar`) REFERENCES `clientes` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `familiares`
--

/*!40000 ALTER TABLE `familiares` DISABLE KEYS */;
INSERT INTO `familiares` (`id`,`familiar`,`nombres`,`edad`,`dia`,`mes`,`ano`,`puesto`) VALUES 
 (5,1111,'maeia ',0,20,'Julio',2007,1),
 (6,1111,'pedro  perz sanchez',0,20,'Junio',2008,2),
 (7,1111,'tovar garrido agurre',0,20,'Agosto',2009,3);
/*!40000 ALTER TABLE `familiares` ENABLE KEYS */;


--
-- Definition of table `seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
CREATE TABLE `seguridad` (
  `id_seg` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `modificar` int(11) DEFAULT NULL,
  `consultar` int(11) DEFAULT NULL,
  `registrar` int(11) DEFAULT NULL,
  `eliminar` int(11) DEFAULT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `cedula` int(11) NOT NULL,
  `administrar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_seg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seguridad`
--

/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
INSERT INTO `seguridad` (`id_seg`,`usuario`,`clave`,`modificar`,`consultar`,`registrar`,`eliminar`,`nombre`,`apellido`,`cedula`,`administrar`) VALUES 
 (1,'admin','admin',1,1,1,1,'carlos','Perez',12345678,1);
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
