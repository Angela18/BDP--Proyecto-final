/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.25 : Database - ventas_dbp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ventas_dbp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ventas_dbp`;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(25) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`dni`,`nombres`,`apellidos`,`telefono`,`correo`) values (1,'11111111','Analuz','Caceres ','323232','nenita@hotmail.com'),(2,'12345678','MaryTere','Ramos Ccoa','e433434','lokita@hotmail.com'),(3,'34343465','Juan','perez',NULL,'juan@hotmail.com'),(4,'23457834','Romeo','Santos',NULL,'romeo@hotmail.com'),(5,'43434340','Jose','Castro',NULL,'juniorgomez1305@gmail.com'),(6,'43344334','Naysha','Cardenas',NULL,'warner@hotmail.com'),(7,'45564754','Jairo','del Valle',NULL,'wisin@hotmail.com'),(8,'24567893','Pablo','Gomez','997085883','juniorgomez1305@gmail.com'),(12,'33333333','Jorge','Gomez','123455','jorgito@hotmail.com'),(13,'77777777','Jhony','Pacheco','34434343','jhony@hotmail.com'),(14,'22222222','Micky','Gonzales','99999','micky@hotmail.com'),(15,'12345678','Oliver','Diaz','999','oliver@hotmailcom'),(16,'99999999','Pedro','Infantes','545454','loquillo@hotmail.com'),(17,'66666666','Pamela','Aquino','545','abc@hotmail.com'),(18,'88888888','Jimena','Ramos','545454','jejej@hotmail.com'),(20,'22224544','Brenda','Salazar','34434343','brenda@ss.com'),(21,'33334444','Rosa','Torres','99999','michelle@gmail.com'),(22,'44444555','Yessenia','Caja','999','oli@hotmailcom'),(23,'11113333','Romiel','Cabrejo','123455','correo'),(24,'22224544','Brenda','Salazar','34434343','cor@ss.com'),(25,'33334444','Michelle','Torres','99999','emial'),(26,'44444555','Bejamin','Ochoa','999','oli@hotmailcom'),(27,'9999999','Daniel','Perez','545454','lo@hotmail.com'),(28,'6666666','Pamela','Aquino','545','abc@hotmail.com'),(29,'888888','Ximena','Caceres','545454','jejej@hotmail.com'),(30,'12345678','Hugo','Casas','123','g@gmail.com');

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `marca` varchar(250) DEFAULT NULL,
  `talla` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

insert  into `productos`(`id`,`nombre`,`precio`,`stock`,`imagen`,`marca`,`talla`) values (16,'Jean clasico (dama)',80,17,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/16','Louis','S'),(20,'Pantalon de buzo (varon)',34,16,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/20','Joma','S'),(21,'Pantalon de buzo (dama)',50,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/21','Adidas','L'),(22,'Pantalon excursionista (varon)',75,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/22','Doo Australia','XL'),(25,'Pantalon suelto de tela (dama)',65,20,'','',''),(26,'Pantalon de vestir (dama)',85,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/26','New York','XS'),(27,'Jean clasico (varon)',80,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/27','Pieers','M'),(28,'Jean degradado (dama)',70,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/28','Mossimo','S'),(29,'Jean rasgado',100,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/29','Denimlab','M'),(30,'Pantalon Harem (dama)',60,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/30','Yeezy','S'),(31,'Pantalon Bombacho (dama)',40,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/31','Yohji Yamamoto','XL'),(32,'Boyfriend Jean',85,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/32','Jacob Cohen','M'),(33,'Jean palazzo (dama)',75,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/33','Louis','L'),(34,'Pantalon de vestir (bebe)',90,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/34','El','10'),(35,'Pantalon deportivo Minnie Mouse (niña)',50,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/35','Valentino','16'),(36,'Pantalon vaquero de estrellas (niña)',70,16,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/36','Balmain','16'),(37,'Jean bebe',50,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/37','Etudes','4'),(38,'Pantalon de buzo (bebe)',55,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/38','Puma','4'),(39,'Pantalon de vestir palazzo (dama)',70,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/39','Gosha','L'),(40,'Pantalon pitillo (varon)',70,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/40','Pieers','M'),(41,'Jean de cintura alta',70,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/41','Rustrng','M'),(42,'Pantalon de corduroy (dama)',85,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/42','Yang Li','L'),(43,'Pantalon Drill Dama',80,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/43','Alexander McQueen','XL'),(44,'Pantalon Drill Varon',85,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/44','Alexander McQueen','M'),(45,'Pantalon de pana acampanado',70,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/45','Neil Barret','L'),(46,'Buzo legging (dama)',85,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/46','Nike','S'),(47,'Pantalon legging (dama)',65,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/47','Mossimo','XS'),(48,'Pantalon pescador (niña)',55,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/48','Tree','16'),(49,'Pantalon de buzo plomo (niña)',70,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/49','Nike','16'),(50,'Jean de flor (niña)',75,20,'','',''),(51,'Pantalon sport dama',70,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/51','Puma','S'),(52,'Pantalon Buzo (Dama)',45,20,'C:/Program Files (x86)/Ampps/www/dbp/assets/productos/52','Lomas','S');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`descripcion`) values (1,'admin'),(2,'vendedor');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(25) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `olvido` varchar(100) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_rol_fk` (`rol_id`),
  CONSTRAINT `usuario_rol_fk` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombres`,`apellidos`,`correo`,`usuario`,`clave`,`olvido`,`rol_id`,`estado`) values (4,'Joao','Chavez','jsepxk@hotmail.com','admin3','1OARKr9ILQaUlZ8/b57/eKZiYwJtkPWhyvrDalp1QRE=',NULL,1,1),(5,'Juan','Perez ','juan_per_ovb@gmail.com','Juan1','skJ8Edy2T8t+gT4gSprepDybmYEP13RisENsQQ3XGHs=',NULL,2,1),(9,'Gonzalo','Caira','gonza_L@gmail.com','gonza','x8a2LO1qYcZ5nFdgEMojAXWeO/kUtSJhBsWsvkYsxXM=',NULL,2,1),(10,'Angela','Aquise','angelaaquise1@gmail.com','Angela','tEYt2MrD0qw99VLMYOWKruBezygpgtpY8g+kx+Ih7WY=',NULL,1,1),(11,'Fabricio','Barrionuevo','zap.ptt@gmail.com','Fab','qJFBAlsf6BPI9qkWwsQ5+PgtxpncsclCTCpIosROYko=',NULL,1,1);

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `fecha_venta` datetime DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `ventas` */

insert  into `ventas`(`id`,`numero`,`fecha_venta`,`total`,`cliente_id`,`usuario_id`,`cantidad`,`producto_id`,`precio`) values (1,NULL,'2018-07-08 00:00:00',150,21,1,5,4,30),(2,NULL,'2018-07-15 00:00:00',50,23,1,2,2,25),(3,NULL,'2018-07-08 00:00:00',250,22,6,5,3,50),(4,NULL,'2018-07-08 00:00:00',250,20,6,5,3,50),(5,NULL,'2018-07-08 00:00:00',60,14,1,2,4,30),(6,NULL,'2018-07-08 00:00:00',280,21,1,5,1,56),(7,NULL,'2018-07-08 00:00:00',224,1,1,4,1,56),(8,NULL,'2018-07-08 00:00:00',100,1,1,4,2,25),(9,NULL,'0000-00-00 00:00:00',175,1,1,7,2,25),(10,NULL,'2018-07-09 00:00:00',68,15,1,2,1,34),(11,NULL,'0000-00-00 00:00:00',135,16,11,3,6,45),(12,NULL,'0000-00-00 00:00:00',240,15,11,3,16,80),(13,NULL,'0000-00-00 00:00:00',136,3,9,4,20,34),(14,NULL,'0000-00-00 00:00:00',280,25,9,4,36,70);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
