/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - storegames
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`storegames` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `storegames`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `categoria` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `clientes` */

/*Table structure for table `games` */

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `link` varchar(5000) DEFAULT NULL,
  `imagem` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `games` */

insert  into `games`(`id`,`nome`,`tipo`,`link`,`imagem`) values 
(14,'Subway Surfers','Corrida infinita','https://poki.com/br/g/subway-surfers','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHmd7RaPdyvs4a2rn9LfLJieizT_pQ_n6fmz1Qyul-357d3OJMrXCscX50Ngw69sG9a5gkSLEoD_bzh47X5CBsh9upN_KDNoAjLhgu_uIJhw'),
(15,'minecraft','Aventura','https://www.crazygames.com.br/jogos/bloxdhop-io','https://image.api.playstation.com/vulcan/ap/rnd/202407/0401/670c294ded3baf4fa11068db2ec6758c63f7daeb266a35a1.png'),
(16,'grand prix hero','Corrida','https://poki.com/br/g/grand-prix-hero','https://play-lh.googleusercontent.com/IVB78hI6Rfc64vPWt5pJprHlYtjiJO5AnnvrZGyySkUsRgG7kRchOkbM8QEl7KRLB80'),
(17,'blocky blast puzzle','Puzzle','https://poki.com/br/g/blocky-blast-puzzle','https://m.media-amazon.com/images/I/71Swtbq5uUL.png'),
(19,'cryzen ','Tiro','https://poki.com/br/g/cryzen-io','https://cdn.jogos360.com.br/cr/yz/cryzen-io-d.jpg'),
(20,'kirby amazing mirror','RPG','https://www.miniplay.com/game/kirby-and-the-amazing-mirror','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQL3z27aksuR0FXwgetYEhrxNsz-H5AI3A-gQ&s'),
(21,'sonic','RPG','https://www.miniplay.com/game/sonic-the-hedgehog-pocket-platformer','https://www2.minijuegosgratis.com/v3/games/thumbnails/205296_7_sq.jpg'),
(27,'Subway Surfers','Aventura','https://poki.com/br/g/subway-surfers','https://sigaa.ufpi.br/sigaa/ufpi/portais/discente/discente.jsf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
