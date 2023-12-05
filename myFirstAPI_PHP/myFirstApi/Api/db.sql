# by yvanol fotso
# ------------------------------------------------------------

DROP DATABASE IF EXISTS `apirest`;
CREATE DATABASE `apirest`;
use apirest;


DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;


INSERT INTO `categories` (`id`, `name`, `description`)
VALUES
	(1,'NIKE','marque nike'),
	(2,'PUMA','marque puma'),
	(3,'ADDIDAS','marque addidas'),
  (4,'ANDROID','plate forme android'),
	(5,'APPLE','plate forme apple');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `name`, `description`, `price`,`category_id`,`category_name`)
VALUES
  (1,'chapeau','chapeau pour homme et femme','5000 fcfa',1,'NIKE'),
  (2,'chaussure','chausssure pour homme et femme','10000 fcfa',2,'PUMA'),
  (3,'chaussure','chausssure pour homme et femme','10000 fcfa',3,'ADDIDAS'),
  (4,'telephone android','telephone 4G +','1505000 fcfa',4,'ANDROID'),
  (5,'telephone apple','telephone de marque apple iphone ','200500 fcfa',5,'APPLE'),
  (6,'T-shirt','T-shirt pour homme et femme','8000 fcfa',1,'NIKE'),
  (7,'Pantalon','pantalon pour homme','5000 fcfa',1,'NIKE'),
  (8,'Ceinture','ceinture pour femme','5000 fcfa',2,'PUMA'),
  (9,'valise','valise pour enfant','25000 fcfa',3,'ADDIDAS');
  
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
