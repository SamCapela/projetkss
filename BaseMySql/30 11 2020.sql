-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text COLLATE utf8_unicode_ci NOT NULL,
  `lastname` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `civility` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customers` (`id_customer`, `firstname`, `lastname`, `password`, `civility`, `email`, `role`) VALUES
(1,	'Kellian',	'Jonville',	'9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08',	0,	'kellian.web@gmail.com',	0);

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `invoice_date` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `reference` text COLLATE utf8_unicode_ci NOT NULL,
  `company` int(11) NOT NULL,
  `sent_email` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_firstname` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_lastname` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_address` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `invoice_detail`;
CREATE TABLE `invoice_detail` (
  `id_invoice_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_invoice` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id_invoice_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- 2020-11-30 16:32:07
