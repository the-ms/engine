-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `rate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module` (`id`, `cat_id`, `title`, `text`, `price`, `image`, `file`, `name`, `phone`, `url`, `email`, `address`, `company`, `user_id`, `date`, `active`, `rate`) VALUES
(39,	0,	'1',	'2',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	0,	'0000-00-00',	1,	350);

DROP TABLE IF EXISTS `module_cat`;
CREATE TABLE `module_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `rate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_cat` (`id`, `cat_id`, `title`, `active`, `rate`) VALUES
(1,	0,	'рубрика',	1,	350),
(3,	2,	'2',	1,	0);

DROP TABLE IF EXISTS `module_comments`;
CREATE TABLE `module_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` int(10) unsigned NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `rate` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `module_comments` (`id`, `item`, `text`, `name`, `email`, `user_id`, `date`, `active`, `rate`) VALUES
(1,	1,	'комментарий',	'Русский',	'',	0,	'2013-02-20',	1,	0),
(2,	1,	'фыва',	'фыва',	'',	0,	'2013-02-20',	1,	0);

-- 2016-01-03 05:52:22
