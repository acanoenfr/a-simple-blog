# A simple blog
Made by @acanoenfr under MIT terms

## Configure it

Create a database named "blog"
``
CREATE DATABASE IF NOT EXISTS `blog`;
use `blog`;
``

Create a table users
``
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(82) DEFAULT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
``
