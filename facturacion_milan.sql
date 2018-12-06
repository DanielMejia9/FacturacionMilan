-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: milanbc.com    Database: facturacion_milan
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB

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
-- Table structure for table `tb_actividad_posteo`
--

DROP TABLE IF EXISTS `tb_actividad_posteo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_actividad_posteo` (
  `id` int(11) NOT NULL,
  `actividad` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_actividad_posteo`
--

LOCK TABLES `tb_actividad_posteo` WRITE;
/*!40000 ALTER TABLE `tb_actividad_posteo` DISABLE KEYS */;
INSERT INTO `tb_actividad_posteo` VALUES (1,'Seguir página de MilanBC en Facebook'),(2,'Seguir página de MilanBC en Instagram');
/*!40000 ALTER TABLE `tb_actividad_posteo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_caja`
--

DROP TABLE IF EXISTS `tb_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_caja` (
  `id_caja` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_caja` datetime DEFAULT NULL,
  `saldopordia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_caja`
--

LOCK TABLES `tb_caja` WRITE;
/*!40000 ALTER TABLE `tb_caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria_puntaje`
--

DROP TABLE IF EXISTS `tb_categoria_puntaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categoria_puntaje` (
  `id_puntaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `puntaje_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_puntaje`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria_puntaje`
--

LOCK TABLES `tb_categoria_puntaje` WRITE;
/*!40000 ALTER TABLE `tb_categoria_puntaje` DISABLE KEYS */;
INSERT INTO `tb_categoria_puntaje` VALUES (1,'Bronce',NULL,10),(2,'Silver',NULL,15),(3,'Gold',NULL,20),(4,'Platium',NULL,30),(5,'Diamond',NULL,50),(6,'New',NULL,5);
/*!40000 ALTER TABLE `tb_categoria_puntaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categorias_productos`
--

DROP TABLE IF EXISTS `tb_categorias_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categorias_productos` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  `status_categoria` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categorias_productos`
--

LOCK TABLES `tb_categorias_productos` WRITE;
/*!40000 ALTER TABLE `tb_categorias_productos` DISABLE KEYS */;
INSERT INTO `tb_categorias_productos` VALUES (1,'Barberia',1,'2018-12-05');
/*!40000 ALTER TABLE `tb_categorias_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_config`
--

DROP TABLE IF EXISTS `tb_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_emp` varchar(255) DEFAULT NULL,
  `nregistro_emp` varchar(255) DEFAULT NULL,
  `imglogo_emp` varchar(255) DEFAULT NULL,
  `impuesto_emp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_config`
--

LOCK TABLES `tb_config` WRITE;
/*!40000 ALTER TABLE `tb_config` DISABLE KEYS */;
INSERT INTO `tb_config` VALUES (1,'Tecnología y Desarrollo Jirehpro,C.A','J-40135922-1','images/Jirehpro_logo.png','12'),(2,'Dr. Cell','0','images/Jirehpro_logo3.png','12');
/*!40000 ALTER TABLE `tb_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_detalle_factura`
--

DROP TABLE IF EXISTS `tb_detalle_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_detalle_factura` (
  `codi_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `codi_factu` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `id_producto` int(11) DEFAULT NULL,
  `precio` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codi_detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Detalle de la Venta o Factura';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_factura`
--

LOCK TABLES `tb_detalle_factura` WRITE;
/*!40000 ALTER TABLE `tb_detalle_factura` DISABLE KEYS */;
INSERT INTO `tb_detalle_factura` VALUES (1,1,1,'prueba',1,555);
/*!40000 ALTER TABLE `tb_detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_detalle_gastos`
--

DROP TABLE IF EXISTS `tb_detalle_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_detalle_gastos` (
  `codi_detalle_gastos` int(11) NOT NULL AUTO_INCREMENT,
  `codi_gastos` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `precio` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codi_detalle_gastos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Detalle de los Gastos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_gastos`
--

LOCK TABLES `tb_detalle_gastos` WRITE;
/*!40000 ALTER TABLE `tb_detalle_gastos` DISABLE KEYS */;
INSERT INTO `tb_detalle_gastos` VALUES (1,1,1,'gasa absorbente no esteril',6800),(2,1,1,'brocha en abanico',4900);
/*!40000 ALTER TABLE `tb_detalle_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_detalle_puntos`
--

DROP TABLE IF EXISTS `tb_detalle_puntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_detalle_puntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `puntos_asignados` int(11) NOT NULL,
  `fecha_asignacion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_puntos`
--

LOCK TABLES `tb_detalle_puntos` WRITE;
/*!40000 ALTER TABLE `tb_detalle_puntos` DISABLE KEYS */;
INSERT INTO `tb_detalle_puntos` VALUES (1,1,1,1,'2018-12-05');
/*!40000 ALTER TABLE `tb_detalle_puntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_empleados`
--

DROP TABLE IF EXISTS `tb_empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(45) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono_principal` varchar(15) NOT NULL,
  `telefono_secundario` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cargo_ocupacion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_empleados`
--

LOCK TABLES `tb_empleados` WRITE;
/*!40000 ALTER TABLE `tb_empleados` DISABLE KEYS */;
INSERT INTO `tb_empleados` VALUES (1,'18190473','Daniel','Mejia','2018-12-12','dswawa','adawd','awdawd','awdawd','awdawda');
/*!40000 ALTER TABLE `tb_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_expediente`
--

DROP TABLE IF EXISTS `tb_expediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_expediente` (
  `codi_exp` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(25000) DEFAULT NULL,
  `codi_clie` int(11) DEFAULT NULL,
  PRIMARY KEY (`codi_exp`),
  KEY `codi_clie` (`codi_clie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_expediente`
--

LOCK TABLES `tb_expediente` WRITE;
/*!40000 ALTER TABLE `tb_expediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_expediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_factura`
--

DROP TABLE IF EXISTS `tb_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_factura` (
  `codi_factu` int(11) NOT NULL AUTO_INCREMENT,
  `num_control` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fech_emis` date DEFAULT '0000-00-00',
  `codi_clie` int(11) DEFAULT NULL,
  `monto_neto` decimal(10,2) DEFAULT NULL,
  `monto_iva` decimal(10,2) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`codi_factu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para el registro de las facturas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_factura`
--

LOCK TABLES `tb_factura` WRITE;
/*!40000 ALTER TABLE `tb_factura` DISABLE KEYS */;
INSERT INTO `tb_factura` VALUES (1,'0001','2018-12-05',1,555.00,0.00,555.00);
/*!40000 ALTER TABLE `tb_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_gastos`
--

DROP TABLE IF EXISTS `tb_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_gastos` (
  `codi_gastos` int(11) NOT NULL AUTO_INCREMENT,
  `fech_emis` date DEFAULT '0000-00-00',
  `monto_neto` decimal(10,2) DEFAULT NULL,
  `monto_iva` decimal(10,2) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`codi_gastos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para el registro de los gastos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_gastos`
--

LOCK TABLES `tb_gastos` WRITE;
/*!40000 ALTER TABLE `tb_gastos` DISABLE KEYS */;
INSERT INTO `tb_gastos` VALUES (1,'2018-12-04',11700.00,0.00,11700.00);
/*!40000 ALTER TABLE `tb_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_marcas`
--

DROP TABLE IF EXISTS `tb_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_marca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_marcas`
--

LOCK TABLES `tb_marcas` WRITE;
/*!40000 ALTER TABLE `tb_marcas` DISABLE KEYS */;
INSERT INTO `tb_marcas` VALUES (1,'Generica');
/*!40000 ALTER TABLE `tb_marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_productos`
--

DROP TABLE IF EXISTS `tb_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_producto` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `cantidad_producto` int(11) DEFAULT NULL,
  `costo_producto` int(11) DEFAULT NULL,
  `precio_producto` int(11) DEFAULT NULL,
  `minimo_stock` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productos`
--

LOCK TABLES `tb_productos` WRITE;
/*!40000 ALTER TABLE `tb_productos` DISABLE KEYS */;
INSERT INTO `tb_productos` VALUES (1,'producto',1,1,0,2000,5000,5,1,'2018-12-05');
/*!40000 ALTER TABLE `tb_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_puntaje_cliente`
--

DROP TABLE IF EXISTS `tb_puntaje_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_puntaje_cliente` (
  `codi_puntaje_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `codi_cliente` int(11) DEFAULT NULL,
  `puntaje_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`codi_puntaje_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_puntaje_cliente`
--

LOCK TABLES `tb_puntaje_cliente` WRITE;
/*!40000 ALTER TABLE `tb_puntaje_cliente` DISABLE KEYS */;
INSERT INTO `tb_puntaje_cliente` VALUES (1,1,1);
/*!40000 ALTER TABLE `tb_puntaje_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_puntos_posteo`
--

DROP TABLE IF EXISTS `tb_puntos_posteo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_puntos_posteo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `puntos_asignados` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `fecha_posteo` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_puntos_posteo`
--

LOCK TABLES `tb_puntos_posteo` WRITE;
/*!40000 ALTER TABLE `tb_puntos_posteo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_puntos_posteo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_regi_cli`
--

DROP TABLE IF EXISTS `tb_regi_cli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_regi_cli` (
  `codi_clie` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `nomb_clie` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_clie` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `rif_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nit_clie` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fech_clie` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `dire_clie` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `pais_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ciud_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `esta_clie` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tele_clie` varchar(14) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `tele_clie_opci` varchar(14) COLLATE utf8_spanish2_ci DEFAULT 'NA',
  `email` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cont_espe_clie` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_modificado` date DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codi_clie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_regi_cli`
--

LOCK TABLES `tb_regi_cli` WRITE;
/*!40000 ALTER TABLE `tb_regi_cli` DISABLE KEYS */;
INSERT INTO `tb_regi_cli` VALUES (1,'14789632','Luis','Gonzales',NULL,NULL,'2018-01-12','Alguna por allÃ­',NULL,NULL,NULL,'123456789','987654321','daniel@mejia.com',NULL,NULL,'594b5a31a8ed8a091a566201d3ca232d');
/*!40000 ALTER TABLE `tb_regi_cli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_regi_pers_cont`
--

DROP TABLE IF EXISTS `tb_regi_pers_cont`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_regi_pers_cont` (
  `codi_cont` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_cont` varchar(50) NOT NULL,
  `apel_cont` varchar(50) NOT NULL,
  `cargo_cont` varchar(50) NOT NULL,
  `tele_cont` varchar(11) NOT NULL,
  `corr_cont` varchar(50) NOT NULL,
  `codi_clie` int(11) NOT NULL,
  PRIMARY KEY (`codi_cont`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_regi_pers_cont`
--

LOCK TABLES `tb_regi_pers_cont` WRITE;
/*!40000 ALTER TABLE `tb_regi_pers_cont` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_regi_pers_cont` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_reporte_empleados`
--

DROP TABLE IF EXISTS `tb_reporte_empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_reporte_empleados` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `id_detalle_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_reporte`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_reporte_empleados`
--

LOCK TABLES `tb_reporte_empleados` WRITE;
/*!40000 ALTER TABLE `tb_reporte_empleados` DISABLE KEYS */;
INSERT INTO `tb_reporte_empleados` VALUES (1,0,1,'2018-12-05'),(2,1,1,'2018-12-05');
/*!40000 ALTER TABLE `tb_reporte_empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_status_factura`
--

DROP TABLE IF EXISTS `tb_status_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_status_factura` (
  `codi_status` int(11) NOT NULL AUTO_INCREMENT,
  `descrip_status_factura` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codi_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status_factura`
--

LOCK TABLES `tb_status_factura` WRITE;
/*!40000 ALTER TABLE `tb_status_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_status_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user_reg`
--

DROP TABLE IF EXISTS `tb_user_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ape_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ced_usuario` varchar(8) NOT NULL,
  `car_usuario` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `tip_usuario` int(1) NOT NULL,
  `id_config` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user_reg`
--

LOCK TABLES `tb_user_reg` WRITE;
/*!40000 ALTER TABLE `tb_user_reg` DISABLE KEYS */;
INSERT INTO `tb_user_reg` VALUES (1,'Usuario','Admin','12345678','Administrador del Sistema','b433ce675b32a824e24d762ca0fa1ba9',1,2);
/*!40000 ALTER TABLE `tb_user_reg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'facturacion_milan'
--

--
-- Dumping routines for database 'facturacion_milan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-06  9:57:18
