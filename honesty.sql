# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.34-MariaDB-0ubuntu0.18.04.1)
# Database: honesty
# Generation Time: 2020-07-07 16:49:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table consumption
# ------------------------------------------------------------

DROP TABLE IF EXISTS `consumption`;

CREATE TABLE `consumption` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `person` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table people
# ------------------------------------------------------------

DROP TABLE IF EXISTS `people`;

CREATE TABLE `people` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` char(50) DEFAULT NULL,
  `first_name` char(50) DEFAULT NULL,
  `last_name` char(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;

INSERT INTO `people` (`id`, `barcode`, `first_name`, `last_name`, `gender`)
VALUES
	(1,'0jamespattison0','James','Pattison','m'),
	(2,'0antonialston00','Antoni','Alston','m'),
	(3,'0oliverlynch000','Oliver','Lynch','m'),
	(4,'0elenapetrova00','Elena','Petrova','f'),
	(5,'0jessicabracey0','Jessica','Bracey','f'),
	(6,'0tomsteavenson0','Tom','Steavenson','m'),
	(7,'0lukepowell0000','Luke','Powell','m'),
	(8,'0jordanjunge000','Jordan','Junge','f'),
	(9,'0member00000000','Layla','Webb','f'),
	(10,'0jordanwells000','Jordan','Wells','m'),
	(11,'0leanacatty0000','Leana','Catty','f'),
	(12,'0afaanashiq0000','Afaan','Ashiq','m'),
	(13,'0bush0000000000','Alexandra','Bush','f'),
	(14,'0beccakatherine','Becca','Katherine','f'),
	(15,'0happy000000000','Jamie','Hopkins','m'),
	(16,'0georgeday00000','George','Day','m'),
	(17,'0callewis000000','Cal','Lewis','m'),
	(18,'0nathanthomas00','Nathan','Thomas','m'),
	(19,'0sambedford0000','Sam','Bedford','m'),
	(20,'0cocowolf000000','Coco','Wolf','f'),
	(21,'0peterdudbridge','Peter','Dudbridge','m'),
	(22,'0gregjoiner0000','Greg','Joiner','m'),
	(23,'0ashleydelport0','Ashley','Delport','m'),
	(24,'0jessiemold0000','Jessie','Mold','f'),
	(25,'0tessanelson000','Tessa','Nelson','f'),
	(26,'0megansquire000','Megan','Squire','f'),
	(27,'0martinpaunov00','Marty','Paunov','m'),
	(28,'0danielcurpen00','Daniel','Curpen','m'),
	(29,'0oligirling0000','Oli','Girling','m'),
	(30,'0russryan000000','Russ','Ryan','m'),
	(31,'0sarahpeters000','Sarah','Peters','f'),
	(32,'chantalwilliams','Chantal','Williams','f'),
	(33,'0paulbacskin000','Paul','Bacskin','m'),
	(34,'0donpepe0000000','Don','Pepe','m'),
	(35,'0saulgoodman000','Saul','Goodman','m');

/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
