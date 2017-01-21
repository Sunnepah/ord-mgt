CREATE DATABASE IF NOT EXISTS orders_db;

USE orders_db;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

TRUNCATE TABLE `products`;
INSERT INTO `orders_db`.`products` VALUES ('1', 'Books', '12.43');
INSERT INTO `orders_db`.`products` VALUES ('2', 'PS4', '399.99');
INSERT INTO `orders_db`.`products` VALUES ('3', 'MacPro', '1503.43');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

TRUNCATE TABLE `users`;

INSERT INTO `orders_db`.`users` VALUES ('1', 'Jacky');
INSERT INTO `orders_db`.`users` VALUES ('2', 'Johny');
INSERT INTO `orders_db`.`users` VALUES ('3', 'Stamat');
INSERT INTO `orders_db`.`users` VALUES ('4', 'Sunday');