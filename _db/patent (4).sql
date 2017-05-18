-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 18 2017 г., 20:02
-- Версия сервера: 5.5.48
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `patent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `patent_assets`
--

DROP TABLE IF EXISTS `patent_assets`;
CREATE TABLE IF NOT EXISTS `patent_assets` (
  `id` int(10) unsigned NOT NULL COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `level` int(10) unsigned NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_assets`
--

INSERT INTO `patent_assets` (`id`, `parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`) VALUES
(1, 0, 1, 71, 0, 'root.1', 'Root Asset', '{"core.login.site":{"6":1,"2":1},"core.login.admin":{"6":1},"core.login.offline":{"6":1},"core.admin":{"8":1},"core.manage":{"7":1},"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}'),
(2, 1, 1, 2, 1, 'com_admin', 'com_admin', '{}'),
(3, 1, 3, 6, 1, 'com_banners', 'com_banners', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(4, 1, 7, 8, 1, 'com_cache', 'com_cache', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(5, 1, 9, 10, 1, 'com_checkin', 'com_checkin', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(6, 1, 11, 12, 1, 'com_config', 'com_config', '{}'),
(7, 1, 13, 16, 1, 'com_contact', 'com_contact', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(8, 1, 17, 20, 1, 'com_content', 'com_content', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(9, 1, 21, 22, 1, 'com_cpanel', 'com_cpanel', '{}'),
(10, 1, 23, 24, 1, 'com_installer', 'com_installer', '{"core.admin":[],"core.manage":{"7":0},"core.delete":{"7":0},"core.edit.state":{"7":0}}'),
(11, 1, 25, 26, 1, 'com_languages', 'com_languages', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(12, 1, 27, 28, 1, 'com_login', 'com_login', '{}'),
(13, 1, 29, 30, 1, 'com_mailto', 'com_mailto', '{}'),
(14, 1, 31, 32, 1, 'com_massmail', 'com_massmail', '{}'),
(15, 1, 33, 34, 1, 'com_media', 'com_media', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":{"5":1}}'),
(16, 1, 35, 36, 1, 'com_menus', 'com_menus', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(17, 1, 37, 38, 1, 'com_messages', 'com_messages', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(18, 1, 39, 40, 1, 'com_modules', 'com_modules', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(19, 1, 41, 44, 1, 'com_newsfeeds', 'com_newsfeeds', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(20, 1, 45, 46, 1, 'com_plugins', 'com_plugins', '{"core.admin":{"7":1},"core.manage":[],"core.edit":[],"core.edit.state":[]}'),
(21, 1, 47, 48, 1, 'com_redirect', 'com_redirect', '{"core.admin":{"7":1},"core.manage":[]}'),
(22, 1, 49, 50, 1, 'com_search', 'com_search', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(23, 1, 51, 52, 1, 'com_templates', 'com_templates', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(24, 1, 53, 56, 1, 'com_users', 'com_users', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(25, 1, 57, 60, 1, 'com_weblinks', 'com_weblinks', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(26, 1, 61, 62, 1, 'com_wrapper', 'com_wrapper', '{}'),
(27, 8, 18, 19, 2, 'com_content.category.2', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(28, 3, 4, 5, 2, 'com_banners.category.3', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(29, 7, 14, 15, 2, 'com_contact.category.4', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(30, 19, 42, 43, 2, 'com_newsfeeds.category.5', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(31, 25, 58, 59, 2, 'com_weblinks.category.6', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(32, 24, 54, 55, 1, 'com_users.category.7', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(33, 1, 63, 64, 1, 'com_finder', 'com_finder', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(34, 1, 65, 66, 1, 'com_joomlaupdate', 'com_joomlaupdate', '{"core.admin":[],"core.manage":[],"core.delete":[],"core.edit.state":[]}'),
(35, 1, 67, 68, 1, 'com_jtagmembersdirectory', 'jtagmembersdirectory', '{}'),
(36, 1, 69, 70, 1, 'com_yandex_maps', 'com_yandex_maps', '{}');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_associations`
--

DROP TABLE IF EXISTS `patent_associations`;
CREATE TABLE IF NOT EXISTS `patent_associations` (
  `id` varchar(50) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_banners`
--

DROP TABLE IF EXISTS `patent_banners`;
CREATE TABLE IF NOT EXISTS `patent_banners` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `custombannercode` varchar(2048) NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `params` text NOT NULL,
  `own_prefix` tinyint(1) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_banner_clients`
--

DROP TABLE IF EXISTS `patent_banner_clients`;
CREATE TABLE IF NOT EXISTS `patent_banner_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_banner_tracks`
--

DROP TABLE IF EXISTS `patent_banner_tracks`;
CREATE TABLE IF NOT EXISTS `patent_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_categories`
--

DROP TABLE IF EXISTS `patent_categories`;
CREATE TABLE IF NOT EXISTS `patent_categories` (
  `id` int(11) NOT NULL,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_categories`
--

INSERT INTO `patent_categories` (`id`, `asset_id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `extension`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `modified_user_id`, `modified_time`, `hits`, `language`) VALUES
(1, 0, 0, 0, 13, 0, '', 'system', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '', 0, '2009-10-18 16:07:09', 0, '0000-00-00 00:00:00', 0, '*'),
(2, 27, 1, 1, 2, 1, 'uncategorised', 'com_content', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:26:37', 0, '0000-00-00 00:00:00', 0, '*'),
(3, 28, 1, 3, 4, 1, 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":"","foobar":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:27:35', 0, '0000-00-00 00:00:00', 0, '*'),
(4, 29, 1, 5, 6, 1, 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:27:57', 0, '0000-00-00 00:00:00', 0, '*'),
(5, 30, 1, 7, 8, 1, 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:15', 0, '0000-00-00 00:00:00', 0, '*'),
(6, 31, 1, 9, 10, 1, 'uncategorised', 'com_weblinks', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:33', 0, '0000-00-00 00:00:00', 0, '*'),
(7, 32, 1, 11, 12, 1, 'uncategorised', 'com_users', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 42, '2010-06-28 13:28:33', 0, '0000-00-00 00:00:00', 0, '*');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_contact_details`
--

DROP TABLE IF EXISTS `patent_contact_details`;
CREATE TABLE IF NOT EXISTS `patent_contact_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  `sortname1` varchar(255) NOT NULL,
  `sortname2` varchar(255) NOT NULL,
  `sortname3` varchar(255) NOT NULL,
  `language` char(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_content`
--

DROP TABLE IF EXISTS `patent_content`;
CREATE TABLE IF NOT EXISTS `patent_content` (
  `id` int(10) unsigned NOT NULL,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `title_alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT 'Deprecated in Joomla! 3.0',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(10) unsigned NOT NULL DEFAULT '0',
  `mask` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_content_frontpage`
--

DROP TABLE IF EXISTS `patent_content_frontpage`;
CREATE TABLE IF NOT EXISTS `patent_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_content_rating`
--

DROP TABLE IF EXISTS `patent_content_rating`;
CREATE TABLE IF NOT EXISTS `patent_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_core_log_searches`
--

DROP TABLE IF EXISTS `patent_core_log_searches`;
CREATE TABLE IF NOT EXISTS `patent_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_extensions`
--

DROP TABLE IF EXISTS `patent_extensions`;
CREATE TABLE IF NOT EXISTS `patent_extensions` (
  `extension_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `element` varchar(100) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `client_id` tinyint(3) NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  `access` int(10) unsigned NOT NULL DEFAULT '1',
  `protected` tinyint(3) NOT NULL DEFAULT '0',
  `manifest_cache` text NOT NULL,
  `params` text NOT NULL,
  `custom_data` text NOT NULL,
  `system_data` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10012 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_extensions`
--

INSERT INTO `patent_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(1, 'com_mailto', 'component', 'com_mailto', '', 0, 1, 1, 1, '{"legacy":false,"name":"com_mailto","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MAILTO_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'com_wrapper', 'component', 'com_wrapper', '', 0, 1, 1, 1, '{"legacy":false,"name":"com_wrapper","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'com_admin', 'component', 'com_admin', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_admin","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_ADMIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'com_banners', 'component', 'com_banners', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_banners","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_BANNERS_XML_DESCRIPTION","group":""}', '{"purchase_type":"3","track_impressions":"0","track_clicks":"0","metakey_prefix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'com_cache', 'component', 'com_cache', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_cache","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CACHE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'com_categories', 'component', 'com_categories', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_categories","type":"component","creationDate":"December 2007","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'com_checkin', 'component', 'com_checkin', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_checkin","type":"component","creationDate":"Unknown","author":"Joomla! Project","copyright":"(C) 2005 - 2008 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CHECKIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'com_contact', 'component', 'com_contact', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_contact","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONTACT_XML_DESCRIPTION","group":""}', '{"show_contact_category":"hide","show_contact_list":"0","presentation_style":"sliders","show_name":"1","show_position":"1","show_email":"0","show_street_address":"1","show_suburb":"1","show_state":"1","show_postcode":"1","show_country":"1","show_telephone":"1","show_mobile":"1","show_fax":"1","show_webpage":"1","show_misc":"1","show_image":"1","image":"","allow_vcard":"0","show_articles":"0","show_profile":"0","show_links":"0","linka_name":"","linkb_name":"","linkc_name":"","linkd_name":"","linke_name":"","contact_icons":"0","icon_address":"","icon_email":"","icon_telephone":"","icon_mobile":"","icon_fax":"","icon_misc":"","show_headings":"1","show_position_headings":"1","show_email_headings":"0","show_telephone_headings":"1","show_mobile_headings":"0","show_fax_headings":"0","allow_vcard_headings":"0","show_suburb_headings":"1","show_state_headings":"1","show_country_headings":"1","show_email_form":"1","show_email_copy":"1","banned_email":"","banned_subject":"","banned_text":"","validate_session":"1","custom_reply":"0","redirect":"","show_category_crumb":"0","metakey":"","metadesc":"","robots":"","author":"","rights":"","xreference":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(9, 'com_cpanel', 'component', 'com_cpanel', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_cpanel","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CPANEL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10, 'com_installer', 'component', 'com_installer', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_installer","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_INSTALLER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(11, 'com_languages', 'component', 'com_languages', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_languages","type":"component","creationDate":"2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_LANGUAGES_XML_DESCRIPTION","group":""}', '{"administrator":"ru-RU","site":"ru-RU"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'com_login', 'component', 'com_login', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_login","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(13, 'com_media', 'component', 'com_media', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_media","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MEDIA_XML_DESCRIPTION","group":""}', '{"upload_extensions":"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS","upload_maxsize":"10","file_path":"images","image_path":"images","restrict_uploads":"1","allowed_media_usergroup":"3","check_mime":"1","image_extensions":"bmp,gif,jpg,png","ignore_extensions":"","upload_mime":"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip","upload_mime_illegal":"text\\/html"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(14, 'com_menus', 'component', 'com_menus', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_menus","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MENUS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'com_messages', 'component', 'com_messages', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_messages","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MESSAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(16, 'com_modules', 'component', 'com_modules', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_modules","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_MODULES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(17, 'com_newsfeeds', 'component', 'com_newsfeeds', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_newsfeeds","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"show_feed_image":"1","show_feed_description":"1","show_item_description":"1","feed_word_count":"0","show_headings":"1","show_name":"1","show_articles":"0","show_link":"1","show_description":"1","show_description_image":"1","display_num":"","show_pagination_limit":"1","show_pagination":"1","show_pagination_results":"1","show_cat_items":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(18, 'com_plugins', 'component', 'com_plugins', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_plugins","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_PLUGINS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(19, 'com_search', 'component', 'com_search', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_search","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_SEARCH_XML_DESCRIPTION","group":""}', '{"enabled":"0","show_date":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(20, 'com_templates', 'component', 'com_templates', '', 1, 1, 1, 1, '{"legacy":false,"name":"com_templates","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_TEMPLATES_XML_DESCRIPTION","group":""}', '{"template_positions_display":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(21, 'com_weblinks', 'component', 'com_weblinks', '', 1, 1, 1, 0, '{"legacy":false,"name":"com_weblinks","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_WEBLINKS_XML_DESCRIPTION","group":""}', '{"show_comp_description":"1","comp_description":"","show_link_hits":"1","show_link_description":"1","show_other_cats":"0","show_headings":"0","show_numbers":"0","show_report":"1","count_clicks":"1","target":"0","link_icons":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(22, 'com_content', 'component', 'com_content', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_content","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONTENT_XML_DESCRIPTION","group":""}', '{"article_layout":"_:default","show_title":"1","link_titles":"1","show_intro":"1","show_category":"1","link_category":"1","show_parent_category":"0","link_parent_category":"0","show_author":"1","link_author":"0","show_create_date":"0","show_modify_date":"0","show_publish_date":"1","show_item_navigation":"1","show_vote":"0","show_readmore":"1","show_readmore_title":"1","readmore_limit":"100","show_icons":"1","show_print_icon":"1","show_email_icon":"1","show_hits":"1","show_noauth":"0","show_publishing_options":"1","show_article_options":"1","show_urls_images_frontend":"0","show_urls_images_backend":"1","targeta":0,"targetb":0,"targetc":0,"float_intro":"left","float_fulltext":"left","category_layout":"_:blog","show_category_title":"0","show_description":"0","show_description_image":"0","maxLevel":"1","show_empty_categories":"0","show_no_articles":"1","show_subcat_desc":"1","show_cat_num_articles":"0","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_num_articles_cat":"1","num_leading_articles":"1","num_intro_articles":"4","num_columns":"2","num_links":"4","multi_column_order":"0","show_subcategory_content":"0","show_pagination_limit":"1","filter_field":"hide","show_headings":"1","list_show_date":"0","date_format":"","list_show_hits":"1","list_show_author":"1","orderby_pri":"order","orderby_sec":"rdate","order_date":"published","show_pagination":"2","show_pagination_results":"1","show_feed_link":"1","feed_summary":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(23, 'com_config', 'component', 'com_config', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_config","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_CONFIG_XML_DESCRIPTION","group":""}', '{"filters":{"1":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"6":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"7":{"filter_type":"NONE","filter_tags":"","filter_attributes":""},"2":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"3":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"4":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"5":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"10":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"12":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"8":{"filter_type":"NONE","filter_tags":"","filter_attributes":""}}}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(24, 'com_redirect', 'component', 'com_redirect', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_redirect","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(25, 'com_users', 'component', 'com_users', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_users","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_USERS_XML_DESCRIPTION","group":""}', '{"allowUserRegistration":"1","new_usertype":"2","guest_usergroup":"1","sendpassword":"1","useractivation":"2","mail_to_admin":"1","captcha":"","frontend_userparams":"1","site_language":"0","change_login_name":"0","reset_count":"10","reset_time":"1","mailSubjectPrefix":"","mailBodySuffix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(27, 'com_finder', 'component', 'com_finder', '', 1, 1, 0, 0, '{"legacy":false,"name":"com_finder","type":"component","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_FINDER_XML_DESCRIPTION","group":""}', '{"show_description":"1","description_length":255,"allow_empty_query":"0","show_url":"1","show_advanced":"1","expand_advanced":"0","show_date_filters":"0","highlight_terms":"1","opensearch_name":"","opensearch_description":"","batch_size":"50","memory_table_limit":30000,"title_multiplier":"1.7","text_multiplier":"0.7","meta_multiplier":"1.2","path_multiplier":"2.0","misc_multiplier":"0.3","stemmer":"snowball"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(28, 'com_joomlaupdate', 'component', 'com_joomlaupdate', '', 1, 1, 0, 1, '{"legacy":false,"name":"com_joomlaupdate","type":"component","creationDate":"February 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"COM_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(100, 'PHPMailer', 'library', 'phpmailer', '', 0, 1, 1, 1, '{"legacy":false,"name":"PHPMailer","type":"library","creationDate":"2001","author":"PHPMailer","copyright":"(c) 2001-2003, Brent R. Matzelle, (c) 2004-2009, Andy Prevost. All Rights Reserved., (c) 2010-2011, Jim Jagielski. All Rights Reserved.","authorEmail":"jimjag@gmail.com","authorUrl":"https:\\/\\/code.google.com\\/a\\/apache-extras.org\\/p\\/phpmailer\\/","version":"5.2","description":"LIB_PHPMAILER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(101, 'SimplePie', 'library', 'simplepie', '', 0, 1, 1, 1, '{"legacy":false,"name":"SimplePie","type":"library","creationDate":"2004","author":"SimplePie","copyright":"Copyright (c) 2004-2009, Ryan Parman and Geoffrey Sneddon","authorEmail":"","authorUrl":"http:\\/\\/simplepie.org\\/","version":"1.2","description":"LIB_SIMPLEPIE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(102, 'phputf8', 'library', 'phputf8', '', 0, 1, 1, 1, '{"legacy":false,"name":"phputf8","type":"library","creationDate":"2006","author":"Harry Fuecks","copyright":"Copyright various authors","authorEmail":"hfuecks@gmail.com","authorUrl":"http:\\/\\/sourceforge.net\\/projects\\/phputf8","version":"0.5","description":"LIB_PHPUTF8_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(103, 'Joomla! Platform', 'library', 'joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"Joomla! Platform","type":"library","creationDate":"2008","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"11.4","description":"LIB_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(200, 'mod_articles_archive', 'module', 'mod_articles_archive', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_archive","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters.\\n\\t\\tAll rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(201, 'mod_articles_latest', 'module', 'mod_articles_latest', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LATEST_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(202, 'mod_articles_popular', 'module', 'mod_articles_popular', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_articles_popular","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(203, 'mod_banners', 'module', 'mod_banners', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_banners","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_BANNERS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(204, 'mod_breadcrumbs', 'module', 'mod_breadcrumbs', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_breadcrumbs","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_BREADCRUMBS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(205, 'mod_custom', 'module', 'mod_custom', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(206, 'mod_feed', 'module', 'mod_feed', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(207, 'mod_footer', 'module', 'mod_footer', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_footer","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FOOTER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(208, 'mod_login', 'module', 'mod_login', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_login","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(209, 'mod_menu', 'module', 'mod_menu', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_menu","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(210, 'mod_articles_news', 'module', 'mod_articles_news', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_articles_news","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_NEWS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(211, 'mod_random_image', 'module', 'mod_random_image', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_random_image","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_RANDOM_IMAGE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(212, 'mod_related_items', 'module', 'mod_related_items', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_related_items","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_RELATED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(213, 'mod_search', 'module', 'mod_search', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_search","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SEARCH_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(214, 'mod_stats', 'module', 'mod_stats', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_stats","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_STATS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(215, 'mod_syndicate', 'module', 'mod_syndicate', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_syndicate","type":"module","creationDate":"May 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SYNDICATE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(216, 'mod_users_latest', 'module', 'mod_users_latest', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_users_latest","type":"module","creationDate":"December 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_USERS_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(217, 'mod_weblinks', 'module', 'mod_weblinks', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_weblinks","type":"module","creationDate":"July 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WEBLINKS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(218, 'mod_whosonline', 'module', 'mod_whosonline', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_whosonline","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WHOSONLINE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(219, 'mod_wrapper', 'module', 'mod_wrapper', '', 0, 1, 1, 0, '{"legacy":false,"name":"mod_wrapper","type":"module","creationDate":"October 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_WRAPPER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(220, 'mod_articles_category', 'module', 'mod_articles_category', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_category","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(221, 'mod_articles_categories', 'module', 'mod_articles_categories', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_articles_categories","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(222, 'mod_languages', 'module', 'mod_languages', '', 0, 1, 1, 1, '{"legacy":false,"name":"mod_languages","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LANGUAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(223, 'mod_finder', 'module', 'mod_finder', '', 0, 1, 0, 0, '{"legacy":false,"name":"mod_finder","type":"module","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FINDER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(300, 'mod_custom', 'module', 'mod_custom', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(301, 'mod_feed', 'module', 'mod_feed', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_FEED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(302, 'mod_latest', 'module', 'mod_latest', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LATEST_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(303, 'mod_logged', 'module', 'mod_logged', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_logged","type":"module","creationDate":"January 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGGED_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(304, 'mod_login', 'module', 'mod_login', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_login","type":"module","creationDate":"March 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(305, 'mod_menu', 'module', 'mod_menu', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_menu","type":"module","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(307, 'mod_popular', 'module', 'mod_popular', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_popular","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(308, 'mod_quickicon', 'module', 'mod_quickicon', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_quickicon","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_QUICKICON_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(309, 'mod_status', 'module', 'mod_status', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_status","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_STATUS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(310, 'mod_submenu', 'module', 'mod_submenu', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_submenu","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_SUBMENU_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(311, 'mod_title', 'module', 'mod_title', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_title","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_TITLE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(312, 'mod_toolbar', 'module', 'mod_toolbar', '', 1, 1, 1, 1, '{"legacy":false,"name":"mod_toolbar","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_TOOLBAR_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(313, 'mod_multilangstatus', 'module', 'mod_multilangstatus', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_multilangstatus","type":"module","creationDate":"September 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_MULTILANGSTATUS_XML_DESCRIPTION","group":""}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(314, 'mod_version', 'module', 'mod_version', '', 1, 1, 1, 0, '{"legacy":false,"name":"mod_version","type":"module","creationDate":"January 2012","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"MOD_VERSION_XML_DESCRIPTION","group":""}', '{"format":"short","product":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(400, 'plg_authentication_gmail', 'plugin', 'gmail', 'authentication', 0, 0, 1, 0, '{"legacy":false,"name":"plg_authentication_gmail","type":"plugin","creationDate":"February 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_GMAIL_XML_DESCRIPTION","group":""}', '{"applysuffix":"0","suffix":"","verifypeer":"1","user_blacklist":""}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(401, 'plg_authentication_joomla', 'plugin', 'joomla', 'authentication', 0, 1, 1, 1, '{"legacy":false,"name":"plg_authentication_joomla","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_AUTH_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(402, 'plg_authentication_ldap', 'plugin', 'ldap', 'authentication', 0, 0, 1, 0, '{"legacy":false,"name":"plg_authentication_ldap","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LDAP_XML_DESCRIPTION","group":""}', '{"host":"","port":"389","use_ldapV3":"0","negotiate_tls":"0","no_referrals":"0","auth_method":"bind","base_dn":"","search_string":"","users_dn":"","username":"admin","password":"bobby7","ldap_fullname":"fullName","ldap_email":"mail","ldap_uid":"uid"}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(404, 'plg_content_emailcloak', 'plugin', 'emailcloak', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_emailcloak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION","group":""}', '{"mode":"1"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(405, 'plg_content_geshi', 'plugin', 'geshi', 'content', 0, 0, 1, 0, '{"legacy":false,"name":"plg_content_geshi","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"","authorUrl":"qbnz.com\\/highlighter","version":"2.5.0","description":"PLG_CONTENT_GESHI_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(406, 'plg_content_loadmodule', 'plugin', 'loadmodule', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_loadmodule","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LOADMODULE_XML_DESCRIPTION","group":""}', '{"style":"xhtml"}', '', '', 0, '2011-09-18 15:22:50', 0, 0),
(407, 'plg_content_pagebreak', 'plugin', 'pagebreak', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_pagebreak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION","group":""}', '{"title":"1","multipage_toc":"1","showall":"1"}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(408, 'plg_content_pagenavigation', 'plugin', 'pagenavigation', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_pagenavigation","type":"plugin","creationDate":"January 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_PAGENAVIGATION_XML_DESCRIPTION","group":""}', '{"position":"1"}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(409, 'plg_content_vote', 'plugin', 'vote', 'content', 0, 1, 1, 1, '{"legacy":false,"name":"plg_content_vote","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_VOTE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(410, 'plg_editors_codemirror', 'plugin', 'codemirror', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_codemirror","type":"plugin","creationDate":"28 March 2011","author":"Marijn Haverbeke","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"1.0","description":"PLG_CODEMIRROR_XML_DESCRIPTION","group":""}', '{"linenumbers":"0","tabmode":"indent"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(411, 'plg_editors_none', 'plugin', 'none', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_none","type":"plugin","creationDate":"August 2004","author":"Unknown","copyright":"","authorEmail":"N\\/A","authorUrl":"","version":"2.5.0","description":"PLG_NONE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(412, 'plg_editors_tinymce', 'plugin', 'tinymce', 'editors', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors_tinymce","type":"plugin","creationDate":"2005-2014","author":"Moxiecode Systems AB","copyright":"Moxiecode Systems AB","authorEmail":"N\\/A","authorUrl":"tinymce.moxiecode.com\\/","version":"3.5.11","description":"PLG_TINY_XML_DESCRIPTION","group":""}', '{"mode":"1","skin":"0","entity_encoding":"raw","lang_mode":"0","lang_code":"en","text_direction":"ltr","content_css":"1","content_css_custom":"","relative_urls":"1","newlines":"0","invalid_elements":"script,applet,iframe","extended_elements":"","toolbar":"top","toolbar_align":"left","html_height":"550","html_width":"750","resizing":"true","resize_horizontal":"false","element_path":"1","fonts":"1","paste":"1","searchreplace":"1","insertdate":"1","format_date":"%Y-%m-%d","inserttime":"1","format_time":"%H:%M:%S","colors":"1","table":"1","smilies":"1","media":"1","hr":"1","directionality":"1","fullscreen":"1","style":"1","layer":"1","xhtmlxtras":"1","visualchars":"1","nonbreaking":"1","template":"1","blockquote":"1","wordcount":"1","advimage":"1","advlink":"1","advlist":"1","autosave":"1","contextmenu":"1","inlinepopups":"1","custom_plugin":"","custom_button":""}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(413, 'plg_editors-xtd_article', 'plugin', 'article', 'editors-xtd', 0, 1, 1, 1, '{"legacy":false,"name":"plg_editors-xtd_article","type":"plugin","creationDate":"October 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_ARTICLE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(414, 'plg_editors-xtd_image', 'plugin', 'image', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_image","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_IMAGE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(415, 'plg_editors-xtd_pagebreak', 'plugin', 'pagebreak', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_pagebreak","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(416, 'plg_editors-xtd_readmore', 'plugin', 'readmore', 'editors-xtd', 0, 1, 1, 0, '{"legacy":false,"name":"plg_editors-xtd_readmore","type":"plugin","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_READMORE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(417, 'plg_search_categories', 'plugin', 'categories', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_categories","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CATEGORIES_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(418, 'plg_search_contacts', 'plugin', 'contacts', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_contacts","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CONTACTS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(419, 'plg_search_content', 'plugin', 'content', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_content","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_CONTENT_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(420, 'plg_search_newsfeeds', 'plugin', 'newsfeeds', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_newsfeeds","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(421, 'plg_search_weblinks', 'plugin', 'weblinks', 'search', 0, 1, 1, 0, '{"legacy":false,"name":"plg_search_weblinks","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEARCH_WEBLINKS_XML_DESCRIPTION","group":""}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(422, 'plg_system_languagefilter', 'plugin', 'languagefilter', 'system', 0, 0, 1, 1, '{"legacy":false,"name":"plg_system_languagefilter","type":"plugin","creationDate":"July 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(423, 'plg_system_p3p', 'plugin', 'p3p', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_p3p","type":"plugin","creationDate":"September 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_P3P_XML_DESCRIPTION","group":""}', '{"headers":"NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(424, 'plg_system_cache', 'plugin', 'cache', 'system', 0, 0, 1, 1, '{"legacy":false,"name":"plg_system_cache","type":"plugin","creationDate":"February 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CACHE_XML_DESCRIPTION","group":""}', '{"browsercache":"0","cachetime":"15"}', '', '', 0, '0000-00-00 00:00:00', 9, 0),
(425, 'plg_system_debug', 'plugin', 'debug', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_debug","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_DEBUG_XML_DESCRIPTION","group":""}', '{"profile":"1","queries":"1","memory":"1","language_files":"1","language_strings":"1","strip-first":"1","strip-prefix":"","strip-suffix":""}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(426, 'plg_system_log', 'plugin', 'log', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_log","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_LOG_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0);
INSERT INTO `patent_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(427, 'plg_system_redirect', 'plugin', 'redirect', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_redirect","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_REDIRECT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(428, 'plg_system_remember', 'plugin', 'remember', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_remember","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_REMEMBER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(429, 'plg_system_sef', 'plugin', 'sef', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_sef","type":"plugin","creationDate":"December 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SEF_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 8, 0),
(430, 'plg_system_logout', 'plugin', 'logout', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_logout","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(431, 'plg_user_contactcreator', 'plugin', 'contactcreator', 'user', 0, 0, 1, 1, '{"legacy":false,"name":"plg_user_contactcreator","type":"plugin","creationDate":"August 2009","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTACTCREATOR_XML_DESCRIPTION","group":""}', '{"autowebpage":"","category":"34","autopublish":"0"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(432, 'plg_user_joomla', 'plugin', 'joomla', 'user', 0, 1, 1, 0, '{"legacy":false,"name":"plg_user_joomla","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2009 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_USER_JOOMLA_XML_DESCRIPTION","group":""}', '{"autoregister":"1"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(433, 'plg_user_profile', 'plugin', 'profile', 'user', 0, 0, 1, 1, '{"legacy":false,"name":"plg_user_profile","type":"plugin","creationDate":"January 2008","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_USER_PROFILE_XML_DESCRIPTION","group":""}', '{"register-require_address1":"1","register-require_address2":"1","register-require_city":"1","register-require_region":"1","register-require_country":"1","register-require_postal_code":"1","register-require_phone":"1","register-require_website":"1","register-require_favoritebook":"1","register-require_aboutme":"1","register-require_tos":"1","register-require_dob":"1","profile-require_address1":"1","profile-require_address2":"1","profile-require_city":"1","profile-require_region":"1","profile-require_country":"1","profile-require_postal_code":"1","profile-require_phone":"1","profile-require_website":"1","profile-require_favoritebook":"1","profile-require_aboutme":"1","profile-require_tos":"1","profile-require_dob":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(434, 'plg_extension_joomla', 'plugin', 'joomla', 'extension', 0, 1, 1, 1, '{"legacy":false,"name":"plg_extension_joomla","type":"plugin","creationDate":"May 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(435, 'plg_content_joomla', 'plugin', 'joomla', 'content', 0, 1, 1, 0, '{"legacy":false,"name":"plg_content_joomla","type":"plugin","creationDate":"November 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_JOOMLA_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(436, 'plg_system_languagecode', 'plugin', 'languagecode', 'system', 0, 0, 1, 0, '{"legacy":false,"name":"plg_system_languagecode","type":"plugin","creationDate":"November 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 10, 0),
(437, 'plg_quickicon_joomlaupdate', 'plugin', 'joomlaupdate', 'quickicon', 0, 1, 1, 1, '{"legacy":false,"name":"plg_quickicon_joomlaupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(438, 'plg_quickicon_extensionupdate', 'plugin', 'extensionupdate', 'quickicon', 0, 1, 1, 1, '{"legacy":false,"name":"plg_quickicon_extensionupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(439, 'plg_captcha_recaptcha', 'plugin', 'recaptcha', 'captcha', 0, 0, 1, 0, '{"legacy":false,"name":"plg_captcha_recaptcha","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION","group":""}', '{"public_key":"","private_key":"","theme":"clean"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(440, 'plg_system_highlight', 'plugin', 'highlight', 'system', 0, 1, 1, 0, '{"legacy":false,"name":"plg_system_highlight","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(441, 'plg_content_finder', 'plugin', 'finder', 'content', 0, 0, 1, 0, '{"legacy":false,"name":"plg_content_finder","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_CONTENT_FINDER_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(442, 'plg_finder_categories', 'plugin', 'categories', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_categories","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CATEGORIES_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(443, 'plg_finder_contacts', 'plugin', 'contacts', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_contacts","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CONTACTS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(444, 'plg_finder_content', 'plugin', 'content', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_content","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_CONTENT_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(445, 'plg_finder_newsfeeds', 'plugin', 'newsfeeds', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_newsfeeds","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(446, 'plg_finder_weblinks', 'plugin', 'weblinks', 'finder', 0, 1, 1, 0, '{"legacy":false,"name":"plg_finder_weblinks","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"PLG_FINDER_WEBLINKS_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(500, 'atomic', 'template', 'atomic', '', 0, 1, 1, 0, '{"legacy":false,"name":"atomic","type":"template","creationDate":"10\\/10\\/09","author":"Ron Severdia","copyright":"Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.","authorEmail":"contact@kontentdesign.com","authorUrl":"http:\\/\\/www.kontentdesign.com","version":"2.5.0","description":"TPL_ATOMIC_XML_DESCRIPTION","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(502, 'bluestork', 'template', 'bluestork', '', 1, 1, 1, 0, '{"legacy":false,"name":"bluestork","type":"template","creationDate":"07\\/02\\/09","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"TPL_BLUESTORK_XML_DESCRIPTION","group":""}', '{"useRoundedCorners":"1","showSiteName":"0","textBig":"0","highContrast":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(503, 'beez_20', 'template', 'beez_20', '', 0, 1, 1, 0, '{"legacy":false,"name":"beez_20","type":"template","creationDate":"25 November 2009","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"2.5.0","description":"TPL_BEEZ2_XML_DESCRIPTION","group":""}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","templatecolor":"nature"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(504, 'hathor', 'template', 'hathor', '', 1, 1, 1, 0, '{"legacy":false,"name":"hathor","type":"template","creationDate":"May 2010","author":"Andrea Tarr","copyright":"Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.","authorEmail":"hathor@tarrconsulting.com","authorUrl":"http:\\/\\/www.tarrconsulting.com","version":"2.5.0","description":"TPL_HATHOR_XML_DESCRIPTION","group":""}', '{"showSiteName":"0","colourChoice":"0","boldText":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(505, 'beez5', 'template', 'beez5', '', 0, 1, 1, 0, '{"legacy":false,"name":"beez5","type":"template","creationDate":"21 May 2010","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"2.5.0","description":"TPL_BEEZ5_XML_DESCRIPTION","group":""}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","html5":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(600, 'English (United Kingdom)', 'language', 'en-GB', '', 0, 1, 1, 1, '{"legacy":false,"name":"English (United Kingdom)","type":"language","creationDate":"2008-03-15","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.28","description":"en-GB site language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(601, 'English (United Kingdom)', 'language', 'en-GB', '', 1, 1, 1, 1, '{"legacy":false,"name":"English (United Kingdom)","type":"language","creationDate":"2008-03-15","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.28","description":"en-GB administrator language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(700, 'files_joomla', 'file', 'joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"files_joomla","type":"file","creationDate":"December 2014","author":"Joomla! Project","copyright":"(C) 2005 - 2014 Open Source Matters. All rights reserved","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.28","description":"FILES_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(800, 'PKG_JOOMLA', 'package', 'pkg_joomla', '', 0, 1, 1, 1, '{"legacy":false,"name":"PKG_JOOMLA","type":"package","creationDate":"2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"2.5.0","description":"PKG_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(900, 'PLG_EOSNOTIFY', 'plugin', 'eosnotify', 'quickicon', 0, 1, 1, 1, '{"legacy":false,"name":"PLG_EOSNOTIFY","type":"plugin","creationDate":"October 2014","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"2.5.0","description":"End of Support Notifier","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10000, 'jtagmembersdirectory', 'component', 'com_jtagmembersdirectory', '', 1, 1, 0, 0, '{"legacy":false,"name":"JTAG Members Directory","type":"component","creationDate":"September 2011","author":"joomlatag.com","copyright":"","authorEmail":"","authorUrl":"","version":"2.47","description":"","group":""}', '{"params":{"title":"\\u0427\\u043b\\u0435\\u043d\\u044b \\u043f\\u0440\\u043e\\u0444\\u0441\\u043e\\u044e\\u0437\\u0430","pages":"10","contact_category":"1","view":"0","adminedit":"1","sortby":"name","order":"asc","category":"0","wall":"white","vcf":"0"}}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10001, 'plg_system_jsntplframework', 'plugin', 'jsntplframework', 'system', 0, 1, 1, 1, '{"legacy":false,"name":"plg_system_jsntplframework","type":"plugin","creationDate":"07\\/06\\/2016","author":"JoomlaShine.com","copyright":"Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.","authorEmail":"admin@joomlashine.com","authorUrl":"www.joomlashine.com","version":"3.1.9","description":"","group":""}', '{"update-check":1495045612}', '', '', 0, '0000-00-00 00:00:00', 9999, 0),
(10002, 'jsn_air_free', 'template', 'jsn_air_free', '', 0, 1, 1, 0, '{"legacy":false,"name":"jsn_air_free","type":"template","creationDate":"07\\/06\\/2016","author":"JoomlaShine.com","copyright":"Copyright (c) 2008 - 2013 - JoomlaShine.com","authorEmail":"support@joomlashine.com","authorUrl":"http:\\/\\/www.joomlashine.com","version":"2.1.0","description":"TPL_JSN_AIR_FREE_XML_DESCRIPTION","group":"jsntemplate"}', '[]', 'jsntemplate', '', 0, '0000-00-00 00:00:00', 0, 0),
(10003, 'Russian', 'language', 'ru-RU', '', 0, 1, 0, 0, '{"legacy":true,"name":"Russian","type":"language","creationDate":"2014-08-05","author":"Russian Translation Team","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved","authorEmail":"smart@joomlaportal.ru","authorUrl":"www.joomlaportal.ru","version":"2.5.24.1","description":"Russian language pack (site) for Joomla! 2.5","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10004, 'Russian', 'language', 'ru-RU', '', 1, 1, 0, 0, '{"legacy":true,"name":"Russian","type":"language","creationDate":"2014-08-05","author":"Russian Translation Team","copyright":"Copyright (C) 2005 - 2014 Open Source Matters. All rights reserved","authorEmail":"smart@joomlaportal.ru","authorUrl":"www.joomlaportal.ru","version":"2.5.24.1","description":"Russian language pack (administrator) for Joomla! 2.5","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10005, 'TinyMCE ru-RU', 'file', 'tinymce_ru-ru', '', 0, 1, 0, 0, '{"legacy":false,"name":"TinyMCE ru-RU","type":"file","creationDate":"2012-06-19","author":"Russian Translation Team","copyright":"Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved","authorEmail":"smart@joomlaportal.ru","authorUrl":"www.joomlaportal.ru","version":"3.5.2.1","description":"Russian Language Package for TinyMCE 3.5.2.1 in Joomla 2.5","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10006, 'ru-RU', 'package', 'pkg_ru-RU', '', 0, 1, 1, 0, '{"legacy":false,"name":"Russian Language Pack","type":"package","creationDate":"Unknown","author":"Unknown","copyright":"","authorEmail":"","authorUrl":"","version":"2.5.24.1","description":"Joomla 2.5 Russian Language Package","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10007, 'Модуль вывода карты с метками -  API 2.1', 'module', 'mod_maps2015', '', 0, 1, 0, 0, '{"legacy":false,"name":"\\u041c\\u043e\\u0434\\u0443\\u043b\\u044c \\u0432\\u044b\\u0432\\u043e\\u0434\\u0430 \\u043a\\u0430\\u0440\\u0442\\u044b \\u0441 \\u043c\\u0435\\u0442\\u043a\\u0430\\u043c\\u0438 -  API 2.1","type":"module","creationDate":"Mart 2015","author":"axeld","copyright":"","authorEmail":"","authorUrl":"","version":"3.4","description":"\\n  \\t\\n  \\t\\u041c\\u043e\\u0434\\u0443\\u043b\\u044c \\u0432\\u044b\\u0432\\u043e\\u0434\\u0430 \\u042f\\u043d\\u0434\\u0435\\u043a\\u0441 \\u043a\\u0430\\u0440\\u0442 \\u0441 \\u0432\\u0430\\u0448\\u0438\\u043c\\u0438 \\u043c\\u0435\\u0442\\u043a\\u0430\\u043c\\u0438. \\u041f\\u043e\\u043c\\u043e\\u0449\\u044c \\u0432 \\u0441\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u0438 \\u0441\\u043a\\u0440\\u0438\\u043f\\u0442\\u043e\\u0432 \\u043d\\u0430 \\u043e\\u0441\\u043d\\u043e\\u0432\\u0435 API \\u042f\\u043d\\u0434\\u0435\\u043a\\u0441 \\u043a\\u0430\\u0440\\u0442 -> <a href=''mailto:spb-webmaster@mail.ru''>spb-webmaster@mail.ru<\\/a>\\n\\t\\n  ","group":""}', '{"cache":"0","moduleclass_sfx":"","centermap":"55.75399400, 37.62209300","scrope_bool":"1","scope":"10","typemap_bool":"1","bottom_bool":"1","trafficControl":"1","scaling":"1","wi":"740","he":"450","iconmap":"modules\\/mod_maps2015\\/images\\/myIcon.png","list_templates":"{''template'':[''\\u041a\\u043e\\u043e\\u0440\\u0434\\u0438\\u043d\\u0430\\u0442\\u044b \\u043c\\u0435\\u0442\\u043a\\u0438''],''point'':[''\\/images\\/My-image.jpg''],''description'':[''\\u041e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435 - \\u043c\\u043e\\u0436\\u043d\\u043e \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u044c HTML '']}","icon_wi":"70","icon_he":"70","zn1":"-20","zn2":"-70"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10008, 'plg_system_yandex_maps', 'plugin', 'yandex_maps', 'system', 0, 0, 1, 0, '{"legacy":false,"name":"plg_system_yandex_maps","type":"plugin","creationDate":"November 2015","author":"Chupurnov Valeriy","copyright":"Copyright (c) 2015 System. All rights reserved.","authorEmail":"chupurnov@gmail.com","authorUrl":"http:\\/\\/xdan.ru","version":"1.2.1","description":"\\u041f\\u043e\\u0437\\u0432\\u043e\\u043b\\u044f\\u0435\\u0442 \\u0432\\u044b\\u0432\\u043e\\u0434\\u0438\\u0442\\u044c \\u043c\\u043e\\u0434\\u0443\\u043b\\u044c \\u042f\\u043d\\u0434\\u0435\\u043a\\u0441 \\u041a\\u0430\\u0440\\u0442\\u044b \\u0432 \\u043b\\u044e\\u0431\\u043e\\u043c \\u043c\\u0435\\u0441\\u0442\\u0435 \\u0441\\u0430\\u0439\\u0442\\u0430","group":""}', '{"work_for_ajax":"0","show_filter_categories":"1","filter_categories_view":"1","show_toogle_all":"0"}', '', '{"compatibility":{"available":{"value":[".*"],"version":"1.1.4"}}}', 0, '0000-00-00 00:00:00', 0, 0),
(10009, 'Яндекс карты', 'module', 'mod_yandex_maps', '', 0, 1, 0, 0, '{"legacy":false,"name":"\\u042f\\u043d\\u0434\\u0435\\u043a\\u0441 \\u043a\\u0430\\u0440\\u0442\\u044b","type":"module","creationDate":"Mart 2015","author":"Chupurnov Valeriy","copyright":"(c) xdsoft.net","authorEmail":"chupurnov@gmail.com","authorUrl":"http:\\/\\/xdsoft.net","version":"2.2.5","description":"\\u0412\\u044b\\u0432\\u043e\\u0434\\u0438\\u0442 \\u044d\\u043b\\u0435\\u043c\\u0435\\u043d\\u0442\\u044b \\u043a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0435\\u043d\\u0442\\u0430 \\u042f\\u043d\\u0434\\u0435\\u043a\\u0441 \\u041a\\u0430\\u0440\\u0442\\u044b \\u0432 \\u043b\\u044e\\u0431\\u043e\\u043c \\u043c\\u0435\\u0441\\u0442\\u0435 \\u0441\\u0430\\u0439\\u0442\\u0430","group":""}', '{"show_map":"1","move_to_current_object":"1","show_object_list":"1","show_search_on_map":"1","show_select_category":"1","ratio_map_to_list":"4","howmoveto":"0","show_more_in_balloon":"1","show_category":"1","show_pagination":"1","max_count_object":"100","count_on_page":"5","show_search_input":"1","show_no_results":"1","howmoveto_on_category_change":"2","update_object_list_on_category_change":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10010, 'com_yandex_maps', 'component', 'com_yandex_maps', '', 1, 1, 0, 0, '{"legacy":false,"name":"com_yandex_maps","type":"component","creationDate":"Unknown","author":"Chupurnov Valeriy","copyright":"","authorEmail":"","authorUrl":"","version":"4.0.14","description":"COM_YANDEX_MAPS_DESC","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10011, 'yandex_maps', 'package', 'pkg_yandex_maps', '', 0, 1, 1, 0, '{"legacy":false,"name":"\\u042f\\u043d\\u0434\\u0435\\u043a\\u0441 \\u041a\\u0430\\u0440\\u0442\\u044b LITE","type":"package","creationDate":"Mart 2015","author":"Chupurnov Valeriy","copyright":"","authorEmail":"","authorUrl":"","version":"4.0.14","description":"\\u041f\\u0430\\u043a\\u0435\\u0442 \\u0443\\u0441\\u0442\\u0430\\u043d\\u043e\\u0432\\u043a\\u0438 \\u043a\\u043e\\u043c\\u043f\\u043e\\u043d\\u0435\\u043d\\u0442\\u0430, \\u043c\\u043e\\u0434\\u0443\\u043b\\u044f \\u0438 \\u043f\\u043b\\u0430\\u0433\\u0438\\u043d\\u0430 \\u044f\\u043d\\u0434\\u0435\\u043a\\u0441 \\u043a\\u0430\\u0440\\u0442\\u044b","group":""}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_filters`
--

DROP TABLE IF EXISTS `patent_finder_filters`;
CREATE TABLE IF NOT EXISTS `patent_finder_filters` (
  `filter_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL,
  `created_by_alias` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `map_count` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `params` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links`
--

DROP TABLE IF EXISTS `patent_finder_links`;
CREATE TABLE IF NOT EXISTS `patent_finder_links` (
  `link_id` int(10) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `indexdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `state` int(5) DEFAULT '1',
  `access` int(5) DEFAULT '0',
  `language` varchar(8) NOT NULL,
  `publish_start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_price` double unsigned NOT NULL DEFAULT '0',
  `sale_price` double unsigned NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `object` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms0`
--

DROP TABLE IF EXISTS `patent_finder_links_terms0`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms0` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms1`
--

DROP TABLE IF EXISTS `patent_finder_links_terms1`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms1` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms2`
--

DROP TABLE IF EXISTS `patent_finder_links_terms2`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms2` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms3`
--

DROP TABLE IF EXISTS `patent_finder_links_terms3`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms3` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms4`
--

DROP TABLE IF EXISTS `patent_finder_links_terms4`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms4` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms5`
--

DROP TABLE IF EXISTS `patent_finder_links_terms5`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms5` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms6`
--

DROP TABLE IF EXISTS `patent_finder_links_terms6`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms6` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms7`
--

DROP TABLE IF EXISTS `patent_finder_links_terms7`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms7` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms8`
--

DROP TABLE IF EXISTS `patent_finder_links_terms8`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms8` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_terms9`
--

DROP TABLE IF EXISTS `patent_finder_links_terms9`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_terms9` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_termsa`
--

DROP TABLE IF EXISTS `patent_finder_links_termsa`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_termsa` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_termsb`
--

DROP TABLE IF EXISTS `patent_finder_links_termsb`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_termsb` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_termsc`
--

DROP TABLE IF EXISTS `patent_finder_links_termsc`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_termsc` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_termsd`
--

DROP TABLE IF EXISTS `patent_finder_links_termsd`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_termsd` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_termse`
--

DROP TABLE IF EXISTS `patent_finder_links_termse`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_termse` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_links_termsf`
--

DROP TABLE IF EXISTS `patent_finder_links_termsf`;
CREATE TABLE IF NOT EXISTS `patent_finder_links_termsf` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_taxonomy`
--

DROP TABLE IF EXISTS `patent_finder_taxonomy`;
CREATE TABLE IF NOT EXISTS `patent_finder_taxonomy` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_finder_taxonomy`
--

INSERT INTO `patent_finder_taxonomy` (`id`, `parent_id`, `title`, `state`, `access`, `ordering`) VALUES
(1, 0, 'ROOT', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_taxonomy_map`
--

DROP TABLE IF EXISTS `patent_finder_taxonomy_map`;
CREATE TABLE IF NOT EXISTS `patent_finder_taxonomy_map` (
  `link_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_terms`
--

DROP TABLE IF EXISTS `patent_finder_terms`;
CREATE TABLE IF NOT EXISTS `patent_finder_terms` (
  `term_id` int(10) unsigned NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `soundex` varchar(75) NOT NULL,
  `links` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_terms_common`
--

DROP TABLE IF EXISTS `patent_finder_terms_common`;
CREATE TABLE IF NOT EXISTS `patent_finder_terms_common` (
  `term` varchar(75) NOT NULL,
  `language` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_finder_terms_common`
--

INSERT INTO `patent_finder_terms_common` (`term`, `language`) VALUES
('a', 'en'),
('about', 'en'),
('after', 'en'),
('ago', 'en'),
('all', 'en'),
('am', 'en'),
('an', 'en'),
('and', 'en'),
('ani', 'en'),
('any', 'en'),
('are', 'en'),
('aren''t', 'en'),
('as', 'en'),
('at', 'en'),
('be', 'en'),
('but', 'en'),
('by', 'en'),
('for', 'en'),
('from', 'en'),
('get', 'en'),
('go', 'en'),
('how', 'en'),
('if', 'en'),
('in', 'en'),
('into', 'en'),
('is', 'en'),
('isn''t', 'en'),
('it', 'en'),
('its', 'en'),
('me', 'en'),
('more', 'en'),
('most', 'en'),
('must', 'en'),
('my', 'en'),
('new', 'en'),
('no', 'en'),
('none', 'en'),
('not', 'en'),
('noth', 'en'),
('nothing', 'en'),
('of', 'en'),
('off', 'en'),
('often', 'en'),
('old', 'en'),
('on', 'en'),
('onc', 'en'),
('once', 'en'),
('onli', 'en'),
('only', 'en'),
('or', 'en'),
('other', 'en'),
('our', 'en'),
('ours', 'en'),
('out', 'en'),
('over', 'en'),
('page', 'en'),
('she', 'en'),
('should', 'en'),
('small', 'en'),
('so', 'en'),
('some', 'en'),
('than', 'en'),
('thank', 'en'),
('that', 'en'),
('the', 'en'),
('their', 'en'),
('theirs', 'en'),
('them', 'en'),
('then', 'en'),
('there', 'en'),
('these', 'en'),
('they', 'en'),
('this', 'en'),
('those', 'en'),
('thus', 'en'),
('time', 'en'),
('times', 'en'),
('to', 'en'),
('too', 'en'),
('true', 'en'),
('under', 'en'),
('until', 'en'),
('up', 'en'),
('upon', 'en'),
('use', 'en'),
('user', 'en'),
('users', 'en'),
('veri', 'en'),
('version', 'en'),
('very', 'en'),
('via', 'en'),
('want', 'en'),
('was', 'en'),
('way', 'en'),
('were', 'en'),
('what', 'en'),
('when', 'en'),
('where', 'en'),
('whi', 'en'),
('which', 'en'),
('who', 'en'),
('whom', 'en'),
('whose', 'en'),
('why', 'en'),
('wide', 'en'),
('will', 'en'),
('with', 'en'),
('within', 'en'),
('without', 'en'),
('would', 'en'),
('yes', 'en'),
('yet', 'en'),
('you', 'en'),
('your', 'en'),
('yours', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_tokens`
--

DROP TABLE IF EXISTS `patent_finder_tokens`;
CREATE TABLE IF NOT EXISTS `patent_finder_tokens` (
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '1',
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2'
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_tokens_aggregate`
--

DROP TABLE IF EXISTS `patent_finder_tokens_aggregate`;
CREATE TABLE IF NOT EXISTS `patent_finder_tokens_aggregate` (
  `term_id` int(10) unsigned NOT NULL,
  `map_suffix` char(1) NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `term_weight` float unsigned NOT NULL,
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `context_weight` float unsigned NOT NULL,
  `total_weight` float unsigned NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_finder_types`
--

DROP TABLE IF EXISTS `patent_finder_types`;
CREATE TABLE IF NOT EXISTS `patent_finder_types` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_assigned_categories`
--

DROP TABLE IF EXISTS `patent_jtmb_assigned_categories`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_assigned_categories` (
  `memberid` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_jtmb_assigned_categories`
--

INSERT INTO `patent_jtmb_assigned_categories` (`memberid`, `cat_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_attachment`
--

DROP TABLE IF EXISTS `patent_jtmb_attachment`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_attachment` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_categories`
--

DROP TABLE IF EXISTS `patent_jtmb_categories`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` tinyint(3) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_jtmb_categories`
--

INSERT INTO `patent_jtmb_categories` (`id`, `name`, `description`, `published`, `ordering`, `trash`) VALUES
(1, 'Member', 'memebers', 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_custom_fields`
--

DROP TABLE IF EXISTS `patent_jtmb_custom_fields`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_custom_fields` (
  `id` int(10) unsigned NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `field_label` varchar(50) NOT NULL,
  `display_nr_cf` tinyint(4) NOT NULL DEFAULT '1',
  `allow_edit` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_custom_maps_members`
--

DROP TABLE IF EXISTS `patent_jtmb_custom_maps_members`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_custom_maps_members` (
  `user_id` int(11) NOT NULL,
  `field_label` varchar(50) NOT NULL,
  `field_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_display_options`
--

DROP TABLE IF EXISTS `patent_jtmb_display_options`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_display_options` (
  `display_city` tinyint(4) NOT NULL DEFAULT '1',
  `display_phone_no` tinyint(4) NOT NULL DEFAULT '1',
  `display_facebook_page` tinyint(4) NOT NULL DEFAULT '1',
  `display_twitter_page` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_email` tinyint(4) NOT NULL DEFAULT '1',
  `display_email` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_category` tinyint(4) NOT NULL DEFAULT '1',
  `display_category` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_country` tinyint(4) NOT NULL DEFAULT '1',
  `display_country` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_city` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_state` tinyint(4) NOT NULL DEFAULT '1',
  `display_state` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_phone_no` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_facebook` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_twitter` tinyint(4) NOT NULL DEFAULT '1',
  `display_profile` tinyint(4) NOT NULL DEFAULT '1',
  `display_nr_profile` tinyint(4) NOT NULL DEFAULT '1',
  `display_gallery` tinyint(4) NOT NULL DEFAULT '0',
  `allow_nonregistered_users_from_frontend` tinyint(4) NOT NULL DEFAULT '0',
  `auto_sync` int(5) unsigned DEFAULT NULL,
  `display_nr_gallery` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_gallery_images`
--

DROP TABLE IF EXISTS `patent_jtmb_gallery_images`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_gallery_images` (
  `image_id` int(10) unsigned NOT NULL,
  `user_id` int(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_jtmb_gallery_images`
--

INSERT INTO `patent_jtmb_gallery_images` (`image_id`, `user_id`, `gname`, `image`) VALUES
(1, 780, 'gname', 'b69fd981e468ce4dce2687109aa44d4f.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_members_directory`
--

DROP TABLE IF EXISTS `patent_jtmb_members_directory`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_members_directory` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `display_last_name` tinyint(4) NOT NULL DEFAULT '1',
  `country` char(2) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `facebook_page` varchar(255) DEFAULT NULL,
  `twitter_page` varchar(255) DEFAULT NULL,
  `member_profile` text,
  `allow_edit` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `hasGallery` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `display_in_frontend` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `deleted_at` int(5) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) DEFAULT NULL,
  `Published` int(11) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_jtmb_members_directory`
--

INSERT INTO `patent_jtmb_members_directory` (`id`, `user_id`, `profile_picture`, `name`, `Email`, `display_last_name`, `country`, `city`, `state`, `phone_no`, `facebook_page`, `twitter_page`, `member_profile`, `allow_edit`, `hasGallery`, `display_in_frontend`, `deleted_at`, `ordering`, `Published`) VALUES
(1, 780, '0d898839e2a11d45edce878df1da435c.png', 'Super User', 'romansergeenko@gmail.com', 1, 'MC', 'Минск', 'пр.Дзержинского 95', '+375 22 111 11 11', '', '', '', 1, 1, 1, 0, NULL, 1),
(2, 781, NULL, 'Roman Sergeenko', 'test@test.test2', 1, 'MC', 'Минск', 'ул. Семашко 17', '+375 22 111 11 11', '', '', '', 1, 1, 1, 0, NULL, 1),
(3, 782, NULL, 'Roman Sergeenko2', 'romansergeenko@gmail.com2', 1, 'MC', 'Минск', 'ул. Семашко 1', '+375 22 111 11 11', '', '', '', 1, 1, 1, 1, NULL, 1),
(4, 783, NULL, 'Roman Sergeenko3', 'romansergeenko@gmail.com3', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(5, 784, NULL, 'Roman Sergeenko4', 'romansergeenko@gmail.com4', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(6, 785, NULL, 'Roman Sergeenko5', 'romansergeenko@gmail.com5', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(7, 786, NULL, 'Roman Sergeenko6', 'romansergeenko@gmail.com6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(8, 787, NULL, 'Roman Sergeenko7', 'romansergeenko@gmail.com7', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(9, 788, NULL, 'Roman Sergeenko8', 'romansergeenko@gmail.com8', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(10, 789, NULL, 'Roman Sergeenko9', 'romansergeenko@gmail.com9', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(11, 790, NULL, 'Roman Sergeenko10', 'romansergeenko@gmail.com10', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 1, NULL, 1),
(12, 0, NULL, 'New', '', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1),
(13, 0, NULL, 'New2', '', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1),
(14, 0, NULL, 'NewNew', '', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1),
(15, 0, NULL, 'NewUser', 'dawdaw', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1),
(16, 0, NULL, 'New Dadaw', '', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1),
(17, 0, NULL, 'Dwadaw12312', '', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1),
(18, 0, NULL, 'dAWdaw', '', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1),
(19, 0, NULL, 'Рома Романович', 'dawhduawh@dawdaw', 1, 'ZV', '', '', '', '', '', '', 1, 1, 1, 0, NULL, 1),
(20, 0, NULL, 'Dawdawdaw', '', 1, 'FR', '', '', '', '', '', '', 1, 1, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_jtmb_member_request`
--

DROP TABLE IF EXISTS `patent_jtmb_member_request`;
CREATE TABLE IF NOT EXISTS `patent_jtmb_member_request` (
  `user_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_aliases`
--

DROP TABLE IF EXISTS `patent_kunena_aliases`;
CREATE TABLE IF NOT EXISTS `patent_kunena_aliases` (
  `alias` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `item` varchar(32) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_aliases`
--

INSERT INTO `patent_kunena_aliases` (`alias`, `type`, `item`, `state`) VALUES
('announcement', 'view', 'announcement', 1),
('category', 'view', 'category', 1),
('category/create', 'layout', 'category.create', 1),
('category/default', 'layout', 'category.default', 1),
('category/edit', 'layout', 'category.edit', 1),
('category/manage', 'layout', 'category.manage', 1),
('category/moderate', 'layout', 'category.moderate', 1),
('category/user', 'layout', 'category.user', 1),
('common', 'view', 'common', 1),
('create', 'layout', 'category.create', 0),
('credits', 'view', 'credits', 1),
('default', 'layout', 'category.default', 0),
('dobro-pozhalovat', 'catid', '2', 1),
('edit', 'layout', 'category.edit', 0),
('glavnyj-razdel', 'catid', '1', 1),
('home', 'view', 'home', 1),
('manage', 'layout', 'category.manage', 0),
('misc', 'view', 'misc', 1),
('moderate', 'layout', 'category.moderate', 0),
('razdel-predlozhenij', 'catid', '3', 1),
('search', 'view', 'search', 1),
('statistics', 'view', 'statistics', 1),
('topic', 'view', 'topic', 1),
('topics', 'view', 'topics', 1),
('user', 'view', 'user', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_announcement`
--

DROP TABLE IF EXISTS `patent_kunena_announcement`;
CREATE TABLE IF NOT EXISTS `patent_kunena_announcement` (
  `id` int(3) NOT NULL,
  `title` tinytext NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `sdescription` text NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` tinyint(4) NOT NULL DEFAULT '0',
  `showdate` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_attachments`
--

DROP TABLE IF EXISTS `patent_kunena_attachments`;
CREATE TABLE IF NOT EXISTS `patent_kunena_attachments` (
  `id` int(11) NOT NULL,
  `mesid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `protected` tinyint(4) NOT NULL DEFAULT '0',
  `hash` char(32) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `folder` varchar(255) NOT NULL,
  `filetype` varchar(20) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filename_real` varchar(255) NOT NULL DEFAULT '',
  `caption` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_categories`
--

DROP TABLE IF EXISTS `patent_kunena_categories`;
CREATE TABLE IF NOT EXISTS `patent_kunena_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `name` tinytext,
  `alias` varchar(255) NOT NULL,
  `icon` varchar(60) NOT NULL,
  `icon_id` tinyint(4) NOT NULL DEFAULT '0',
  `locked` tinyint(4) NOT NULL DEFAULT '0',
  `accesstype` varchar(20) NOT NULL DEFAULT 'joomla.level',
  `access` int(11) NOT NULL DEFAULT '0',
  `pub_access` int(11) NOT NULL DEFAULT '1',
  `pub_recurse` tinyint(4) DEFAULT '1',
  `admin_access` int(11) NOT NULL DEFAULT '0',
  `admin_recurse` tinyint(4) DEFAULT '1',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL DEFAULT '0',
  `channels` text,
  `checked_out` tinyint(4) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review` tinyint(4) NOT NULL DEFAULT '0',
  `allow_anonymous` tinyint(4) NOT NULL DEFAULT '0',
  `post_anonymous` tinyint(4) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `headerdesc` text NOT NULL,
  `class_sfx` varchar(20) NOT NULL,
  `allow_polls` tinyint(4) NOT NULL DEFAULT '0',
  `topic_ordering` varchar(16) NOT NULL DEFAULT 'lastpost',
  `iconset` varchar(255) NOT NULL DEFAULT 'default',
  `numTopics` mediumint(8) NOT NULL DEFAULT '0',
  `numPosts` mediumint(8) NOT NULL DEFAULT '0',
  `last_topic_id` int(11) NOT NULL DEFAULT '0',
  `last_post_id` int(11) NOT NULL DEFAULT '0',
  `last_post_time` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_categories`
--

INSERT INTO `patent_kunena_categories` (`id`, `parent_id`, `name`, `alias`, `icon`, `icon_id`, `locked`, `accesstype`, `access`, `pub_access`, `pub_recurse`, `admin_access`, `admin_recurse`, `ordering`, `published`, `channels`, `checked_out`, `checked_out_time`, `review`, `allow_anonymous`, `post_anonymous`, `hits`, `description`, `headerdesc`, `class_sfx`, `allow_polls`, `topic_ordering`, `iconset`, `numTopics`, `numPosts`, `last_topic_id`, `last_post_id`, `last_post_time`, `params`) VALUES
(1, 0, 'Главный раздел', 'glavnyj-razdel', '', 0, 0, 'joomla.group', 0, 1, 1, 0, 1, 1, 1, NULL, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'Это главный раздел форума. Как уровень первого раздела он служит в качестве контейнера для индивидуальных (отдельных) форумов. Он называется также как уровень 1 раздела и должен быть установлен для любого Kunena Форума.', 'Для того, чтобы предоставить дополнительную информацию для вас гости и участники, заголовки форумов могут быть использованы для отображения текста на самом верху определенной категории.', '', 0, 'lastpost', 'default', 0, 0, 0, 0, 0, ''),
(2, 1, 'Добро пожаловать', 'dobro-pozhalovat', '', 0, 0, 'joomla.group', 0, 1, 1, 0, 1, 1, 1, NULL, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'Мы призываем новых участников кратко представить себя в этом форуме. Познакомьтесь друг с другом и обменяйтесь своими интересами.', '[b]Добро пожаловать на Kunena форум![/b] \n\n Расскажите нам, и нашим пользователям, кто вы, что вам нравится, и почему вы стали членом этого сайта. \n Мы приветствуем всех новых участников и надеемся видеть вас много!', '', 0, 'lastpost', 'default', 2, 3, 2, 3, 1493036547, '{}'),
(3, 1, 'Раздел предложений', 'razdel-predlozhenij', '', 0, 0, 'joomla.group', 0, 1, 1, 0, 1, 2, 1, NULL, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'Есть замечания и предложения? \n Не стесняйтесь и пишите нам. Мы хотим услышать ваши пожелания, и стремимся сделать наш сайт лучше, более удобным для наших гостей и участников.', 'Это необязательный заголовок Форума раздела предложений.', '', 1, 'lastpost', 'default', 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_configuration`
--

DROP TABLE IF EXISTS `patent_kunena_configuration`;
CREATE TABLE IF NOT EXISTS `patent_kunena_configuration` (
  `id` int(11) NOT NULL DEFAULT '0',
  `params` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_configuration`
--

INSERT INTO `patent_kunena_configuration` (`id`, `params`) VALUES
(1, '{"board_title":"Kunena","email":"","board_offline":0,"offline_message":"<h2>The Forum is currently offline for maintenance.<\\/h2>\\n<div>Check back soon!<\\/div>","enablerss":1,"threads_per_page":20,"messages_per_page":6,"messages_per_page_search":15,"showhistory":1,"historylimit":6,"shownew":1,"disemoticons":0,"template":"euro_colors","showannouncement":1,"avataroncat":0,"catimagepath":"category_images","showchildcaticon":1,"rtewidth":450,"rteheight":300,"enableforumjump":1,"reportmsg":1,"username":1,"askemail":0,"showemail":0,"showuserstats":1,"showkarma":1,"useredit":1,"useredittime":0,"useredittimegrace":600,"editmarkup":1,"allowsubscriptions":1,"subscriptionschecked":1,"allowfavorites":1,"maxsubject":50,"maxsig":300,"regonly":0,"pubwrite":0,"floodprotection":0,"mailmod":0,"mailadmin":0,"captcha":0,"mailfull":1,"allowavatarupload":1,"allowavatargallery":1,"avatarquality":75,"avatarsize":2048,"imageheight":800,"imagewidth":800,"imagesize":150,"filetypes":"txt,rtf,pdf,zip,tar.gz,tgz,tar.bz2","filesize":120,"showranking":1,"rankimages":1,"userlist_rows":30,"userlist_online":1,"userlist_avatar":1,"userlist_posts":1,"userlist_karma":1,"userlist_email":0,"userlist_joindate":1,"userlist_lastvisitdate":1,"userlist_userhits":1,"latestcategory":"","showstats":1,"showwhoisonline":1,"showgenstats":1,"showpopuserstats":1,"popusercount":5,"showpopsubjectstats":1,"popsubjectcount":5,"showspoilertag":1,"showvideotag":1,"showebaytag":1,"trimlongurls":1,"trimlongurlsfront":40,"trimlongurlsback":20,"autoembedyoutube":1,"autoembedebay":1,"ebaylanguagecode":"en-us","sessiontimeout":1800,"highlightcode":0,"rss_type":"topic","rss_timelimit":"month","rss_limit":100,"rss_included_categories":"","rss_excluded_categories":"","rss_specification":"rss2.0","rss_allow_html":1,"rss_author_format":"name","rss_author_in_title":1,"rss_word_count":"0","rss_old_titles":1,"rss_cache":900,"defaultpage":"recent","default_sort":"asc","sef":1,"showimgforguest":1,"showfileforguest":1,"pollnboptions":4,"pollallowvoteone":1,"pollenabled":1,"poppollscount":5,"showpoppollstats":1,"polltimebtvotes":"00:15:00","pollnbvotesbyuser":100,"pollresultsuserslist":1,"maxpersotext":50,"ordering_system":"mesid","post_dateformat":"ago","post_dateformat_hover":"datetime","hide_ip":1,"imagetypes":"jpg,jpeg,gif,png","checkmimetypes":1,"imagemimetypes":"image\\/jpeg,image\\/jpg,image\\/gif,image\\/png","imagequality":50,"thumbheight":32,"thumbwidth":32,"hideuserprofileinfo":"put_empty","boxghostmessage":0,"userdeletetmessage":0,"latestcategory_in":1,"topicicons":1,"debug":0,"catsautosubscribed":0,"showbannedreason":0,"showthankyou":1,"showpopthankyoustats":1,"popthankscount":5,"mod_see_deleted":0,"bbcode_img_secure":"text","listcat_show_moderators":1,"lightbox":1,"show_list_time":720,"show_session_type":2,"show_session_starttime":1800,"userlist_allowed":0,"userlist_count_users":1,"enable_threaded_layouts":0,"category_subscriptions":"post","topic_subscriptions":"every","pubprofile":1,"thankyou_max":10,"email_recipient_count":0,"email_recipient_privacy":"bcc","email_visible_address":"","captcha_post_limit":0,"recaptcha_publickey":"","recaptcha_privatekey":"","recaptcha_theme":"white","keywords":0,"userkeywords":0,"image_upload":"registered","file_upload":"registered","topic_layout":"flat","time_to_create_page":1,"show_imgfiles_manage_profile":1,"hold_newusers_posts":0,"hold_guest_posts":0,"attachment_limit":8,"pickup_category":0,"article_display":"intro","send_emails":1,"stopforumspam_key":"","fallback_english":1,"cache":1,"cache_time":60,"ebay_affiliate_id":5337089937,"iptracking":1,"rss_feedburner_url":"","autolink":1,"access_component":1,"statslink_allowed":1,"superadmin_userlist":0,"legacy_urls":1,"attachment_protection":0,"categoryicons":1,"avatarresizemethod":1,"avatarcrop":0,"user_report":1,"searchtime":365,"teaser":0,"ebay_language":0,"ebay_api_key":"","twitter_consumer_key":"","twitter_consumer_secret":"","allow_change_subject":1,"max_links":6,"plugins":{"plg_system_kunena":{}}}');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_keywords`
--

DROP TABLE IF EXISTS `patent_kunena_keywords`;
CREATE TABLE IF NOT EXISTS `patent_kunena_keywords` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `public_count` int(11) NOT NULL,
  `total_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_keywords_map`
--

DROP TABLE IF EXISTS `patent_kunena_keywords_map`;
CREATE TABLE IF NOT EXISTS `patent_kunena_keywords_map` (
  `keyword_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_messages`
--

DROP TABLE IF EXISTS `patent_kunena_messages`;
CREATE TABLE IF NOT EXISTS `patent_kunena_messages` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT '0',
  `thread` int(11) DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `name` tinytext,
  `userid` int(11) NOT NULL DEFAULT '0',
  `email` tinytext,
  `subject` tinytext,
  `time` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(128) DEFAULT NULL,
  `topic_emoticon` int(11) NOT NULL DEFAULT '0',
  `locked` tinyint(4) NOT NULL DEFAULT '0',
  `hold` tinyint(4) NOT NULL DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `moved` tinyint(4) DEFAULT '0',
  `modified_by` int(7) DEFAULT NULL,
  `modified_time` int(11) DEFAULT NULL,
  `modified_reason` tinytext
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_messages`
--

INSERT INTO `patent_kunena_messages` (`id`, `parent`, `thread`, `catid`, `name`, `userid`, `email`, `subject`, `time`, `ip`, `topic_emoticon`, `locked`, `hold`, `ordering`, `hits`, `moved`, `modified_by`, `modified_time`, `modified_reason`) VALUES
(1, 0, 1, 2, 'Kunena', 780, NULL, 'Добро пожаловать в Kunena!', 1493036330, '127.0.0.1', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(2, 0, 2, 2, 'root', 780, '', 'dawdaw', 1493036464, '127.0.0.1', 0, 0, 0, 0, 0, 0, NULL, NULL, ''),
(3, 2, 2, 2, 'root', 780, '', 'dawdaw', 1493036547, '127.0.0.1', 0, 0, 0, 0, 0, 0, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_messages_text`
--

DROP TABLE IF EXISTS `patent_kunena_messages_text`;
CREATE TABLE IF NOT EXISTS `patent_kunena_messages_text` (
  `mesid` int(11) NOT NULL DEFAULT '0',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_messages_text`
--

INSERT INTO `patent_kunena_messages_text` (`mesid`, `message`) VALUES
(1, '[size=4][b]Welcome to Kunena![/b][/size] \n\n Thank you for choosing Kunena for your community forum needs in Joomla. \n\n Kunena, translated from Swahili meaning “to speak”, is built by a team of open source professionals with the goal of providing a top quality, tightly unified forum solution for Joomla. \n\n\n [size=4][b]Additional Kunena Resources[/b][/size] \n\n [b]Kunena Documentation:[/b] [url]https://www.kunena.org/docs[/url] \n\n [b]Kunena Support Forum[/b]: [url]https://www.kunena.org/forum[/url] \n\n [b]Kunena Downloads:[/b] [url]https://www.kunena.org/download[/url] \n\n [b]Kunena Blog:[/b] [url]https://www.kunena.org/blog[/url] \n\n [b]Follow Kunena on Twitter:[/b] [url]https://www.kunena.org/twitter[/url]'),
(2, 'cawadw'),
(3, 'fefsefse');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_polls`
--

DROP TABLE IF EXISTS `patent_kunena_polls`;
CREATE TABLE IF NOT EXISTS `patent_kunena_polls` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `threadid` int(11) NOT NULL,
  `polltimetolive` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_polls_options`
--

DROP TABLE IF EXISTS `patent_kunena_polls_options`;
CREATE TABLE IF NOT EXISTS `patent_kunena_polls_options` (
  `id` int(11) NOT NULL,
  `pollid` int(11) DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_polls_users`
--

DROP TABLE IF EXISTS `patent_kunena_polls_users`;
CREATE TABLE IF NOT EXISTS `patent_kunena_polls_users` (
  `pollid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL,
  `lasttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_ranks`
--

DROP TABLE IF EXISTS `patent_kunena_ranks`;
CREATE TABLE IF NOT EXISTS `patent_kunena_ranks` (
  `rank_id` mediumint(8) unsigned NOT NULL,
  `rank_title` varchar(255) NOT NULL DEFAULT '',
  `rank_min` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rank_special` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rank_image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_ranks`
--

INSERT INTO `patent_kunena_ranks` (`rank_id`, `rank_title`, `rank_min`, `rank_special`, `rank_image`) VALUES
(1, 'Новый участник', 0, 0, 'rank1.gif'),
(2, 'Осваиваюсь на форуме', 20, 0, 'rank2.gif'),
(3, 'Захожу иногда', 40, 0, 'rank3.gif'),
(4, 'Давно я тут', 80, 0, 'rank4.gif'),
(5, 'Завсегдатай', 160, 0, 'rank5.gif'),
(6, 'Живу я здесь', 320, 0, 'rank6.gif'),
(7, 'Администратор', 0, 1, 'rankadmin.gif'),
(8, 'Модератор', 0, 1, 'rankmod.gif'),
(9, 'СПАМер', 0, 1, 'rankspammer.gif'),
(10, 'Заблокирован', 0, 1, 'rankbanned.gif');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_sessions`
--

DROP TABLE IF EXISTS `patent_kunena_sessions`;
CREATE TABLE IF NOT EXISTS `patent_kunena_sessions` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `allowed` text,
  `lasttime` int(11) NOT NULL DEFAULT '0',
  `readtopics` text,
  `currvisit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_sessions`
--

INSERT INTO `patent_kunena_sessions` (`userid`, `allowed`, `lasttime`, `readtopics`, `currvisit`) VALUES
(780, 'na', 1493195563, '0', 1493199340);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_smileys`
--

DROP TABLE IF EXISTS `patent_kunena_smileys`;
CREATE TABLE IF NOT EXISTS `patent_kunena_smileys` (
  `id` int(4) NOT NULL,
  `code` varchar(12) NOT NULL DEFAULT '',
  `location` varchar(50) NOT NULL DEFAULT '',
  `greylocation` varchar(60) NOT NULL DEFAULT '',
  `emoticonbar` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_smileys`
--

INSERT INTO `patent_kunena_smileys` (`id`, `code`, `location`, `greylocation`, `emoticonbar`) VALUES
(1, 'B)', 'cool.png', 'cool-grey.png', 1),
(2, '8)', 'cool.png', 'cool-grey.png', 0),
(3, '8-)', 'cool.png', 'cool-grey.png', 0),
(4, ':-(', 'sad.png', 'sad-grey.png', 0),
(5, ':(', 'sad.png', 'sad-grey.png', 1),
(6, ':sad:', 'sad.png', 'sad-grey.png', 0),
(7, ':cry:', 'sad.png', 'sad-grey.png', 0),
(8, ':)', 'smile.png', 'smile-grey.png', 1),
(9, ':-)', 'smile.png', 'smile-grey.png', 0),
(10, ':cheer:', 'cheerful.png', 'cheerful-grey.png', 1),
(11, ';)', 'wink.png', 'wink-grey.png', 1),
(12, ';-)', 'wink.png', 'wink-grey.png', 0),
(13, ':wink:', 'wink.png', 'wink-grey.png', 0),
(14, ';-)', 'wink.png', 'wink-grey.png', 0),
(15, ':P', 'tongue.png', 'tongue-grey.png', 1),
(16, ':p', 'tongue.png', 'tongue-grey.png', 0),
(17, ':-p', 'tongue.png', 'tongue-grey.png', 0),
(18, ':-P', 'tongue.png', 'tongue-grey.png', 0),
(19, ':razz:', 'tongue.png', 'tongue-grey.png', 0),
(20, ':angry:', 'angry.png', 'angry-grey.png', 1),
(21, ':mad:', 'angry.png', 'angry-grey.png', 0),
(22, ':unsure:', 'unsure.png', 'unsure-grey.png', 1),
(23, ':o', 'shocked.png', 'shocked-grey.png', 0),
(24, ':-o', 'shocked.png', 'shocked-grey.png', 0),
(25, ':O', 'shocked.png', 'shocked-grey.png', 0),
(26, ':-O', 'shocked.png', 'shocked-grey.png', 0),
(27, ':eek:', 'shocked.png', 'shocked-grey.png', 0),
(28, ':ohmy:', 'shocked.png', 'shocked-grey.png', 1),
(29, ':huh:', 'wassat.png', 'wassat-grey.png', 1),
(30, ':?', 'confused.png', 'confused-grey.png', 0),
(31, ':-?', 'confused.png', 'confused-grey.png', 0),
(32, ':???', 'confused.png', 'confused-grey.png', 0),
(33, ':dry:', 'ermm.png', 'ermm-grey.png', 1),
(34, ':ermm:', 'ermm.png', 'ermm-grey.png', 0),
(35, ':lol:', 'grin.png', 'grin-grey.png', 1),
(36, ':X', 'sick.png', 'sick-grey.png', 0),
(37, ':x', 'sick.png', 'sick-grey.png', 0),
(38, ':sick:', 'sick.png', 'sick-grey.png', 1),
(39, ':silly:', 'silly.png', 'silly-grey.png', 1),
(40, ':y32b4:', 'silly.png', 'silly-grey.png', 0),
(41, ':blink:', 'blink.png', 'blink-grey.png', 1),
(42, ':blush:', 'blush.png', 'blush-grey.png', 1),
(43, ':oops:', 'blush.png', 'blush-grey.png', 1),
(44, ':kiss:', 'kissing.png', 'kissing-grey.png', 1),
(45, ':rolleyes:', 'blink.png', 'blink-grey.png', 0),
(46, ':roll:', 'blink.png', 'blink-grey.png', 0),
(47, ':woohoo:', 'w00t.png', 'w00t-grey.png', 1),
(48, ':side:', 'sideways.png', 'sideways-grey.png', 1),
(49, ':S', 'dizzy.png', 'dizzy-grey.png', 1),
(50, ':s', 'dizzy.png', 'dizzy-grey.png', 0),
(51, ':evil:', 'devil.png', 'devil-grey.png', 1),
(52, ':twisted:', 'devil.png', 'devil-grey.png', 0),
(53, ':whistle:', 'whistling.png', 'whistling-grey.png', 1),
(54, ':pinch:', 'pinch.png', 'pinch-grey.png', 1),
(55, ':D', 'laughing.png', 'laughing-grey.png', 0),
(56, ':-D', 'laughing.png', 'laughing-grey.png', 0),
(57, ':grin:', 'laughing.png', 'laughing-grey.png', 0),
(58, ':laugh:', 'laughing.png', 'laughing-grey.png', 0),
(59, ':|', 'neutral.png', 'neutral-grey.png', 0),
(60, ':-|', 'neutral.png', 'neutral-grey.png', 0),
(61, ':neutral:', 'neutral.png', 'neutral-grey.png', 0),
(62, ':mrgreen:', 'mrgreen.png', 'mrgreen-grey.png', 0),
(63, ':?:', 'question.png', 'question-grey.png', 0),
(64, ':!:', 'exclamation.png', 'exclamation-grey.png', 0),
(65, ':arrow:', 'arrow.png', 'arrow-grey.png', 0),
(66, ':idea:', 'idea.png', 'idea-grey.png', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_thankyou`
--

DROP TABLE IF EXISTS `patent_kunena_thankyou`;
CREATE TABLE IF NOT EXISTS `patent_kunena_thankyou` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `targetuserid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_topics`
--

DROP TABLE IF EXISTS `patent_kunena_topics`;
CREATE TABLE IF NOT EXISTS `patent_kunena_topics` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `subject` tinytext,
  `icon_id` int(11) NOT NULL DEFAULT '0',
  `locked` tinyint(4) NOT NULL DEFAULT '0',
  `hold` tinyint(4) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `attachments` int(11) NOT NULL DEFAULT '0',
  `poll_id` int(11) NOT NULL DEFAULT '0',
  `moved_id` int(11) NOT NULL DEFAULT '0',
  `first_post_id` int(11) NOT NULL DEFAULT '0',
  `first_post_time` int(11) NOT NULL DEFAULT '0',
  `first_post_userid` int(11) NOT NULL DEFAULT '0',
  `first_post_message` text,
  `first_post_guest_name` tinytext,
  `last_post_id` int(11) NOT NULL DEFAULT '0',
  `last_post_time` int(11) NOT NULL DEFAULT '0',
  `last_post_userid` int(11) NOT NULL DEFAULT '0',
  `last_post_message` text,
  `last_post_guest_name` tinytext,
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_topics`
--

INSERT INTO `patent_kunena_topics` (`id`, `category_id`, `subject`, `icon_id`, `locked`, `hold`, `ordering`, `posts`, `hits`, `attachments`, `poll_id`, `moved_id`, `first_post_id`, `first_post_time`, `first_post_userid`, `first_post_message`, `first_post_guest_name`, `last_post_id`, `last_post_time`, `last_post_userid`, `last_post_message`, `last_post_guest_name`, `params`) VALUES
(1, 2, 'Добро пожаловать в Kunena!', 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1493036330, 780, '[size=4][b]Welcome to Kunena![/b][/size] \n\n Thank you for choosing Kunena for your community forum needs in Joomla. \n\n Kunena, translated from Swahili meaning “to speak”, is built by a team of open source professionals with the goal of providing a top quality, tightly unified forum solution for Joomla. \n\n\n [size=4][b]Additional Kunena Resources[/b][/size] \n\n [b]Kunena Documentation:[/b] [url]https://www.kunena.org/docs[/url] \n\n [b]Kunena Support Forum[/b]: [url]https://www.kunena.org/forum[/url] \n\n [b]Kunena Downloads:[/b] [url]https://www.kunena.org/download[/url] \n\n [b]Kunena Blog:[/b] [url]https://www.kunena.org/blog[/url] \n\n [b]Follow Kunena on Twitter:[/b] [url]https://www.kunena.org/twitter[/url]', 'Kunena', 1, 1493036330, 780, '[size=4][b]Welcome to Kunena![/b][/size] \n\n Thank you for choosing Kunena for your community forum needs in Joomla. \n\n Kunena, translated from Swahili meaning “to speak”, is built by a team of open source professionals with the goal of providing a top quality, tightly unified forum solution for Joomla. \n\n\n [size=4][b]Additional Kunena Resources[/b][/size] \n\n [b]Kunena Documentation:[/b] [url]https://www.kunena.org/docs[/url] \n\n [b]Kunena Support Forum[/b]: [url]https://www.kunena.org/forum[/url] \n\n [b]Kunena Downloads:[/b] [url]https://www.kunena.org/download[/url] \n\n [b]Kunena Blog:[/b] [url]https://www.kunena.org/blog[/url] \n\n [b]Follow Kunena on Twitter:[/b] [url]https://www.kunena.org/twitter[/url]', 'Kunena', ''),
(2, 2, 'dawdaw', 0, 0, 0, 0, 2, 3, 0, 0, 0, 2, 1493036464, 780, 'cawadw', 'root', 3, 1493036547, 780, 'fefsefse', 'root', '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_users`
--

DROP TABLE IF EXISTS `patent_kunena_users`;
CREATE TABLE IF NOT EXISTS `patent_kunena_users` (
  `userid` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `status_text` varchar(255) NOT NULL,
  `view` varchar(8) NOT NULL DEFAULT '',
  `signature` text,
  `moderator` int(11) DEFAULT '0',
  `banned` datetime DEFAULT NULL,
  `ordering` int(11) DEFAULT '0',
  `posts` int(11) DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `karma` int(11) DEFAULT '0',
  `karma_time` int(11) DEFAULT '0',
  `group_id` int(4) DEFAULT '1',
  `uhits` int(11) DEFAULT '0',
  `personalText` tinytext,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `birthdate` date NOT NULL DEFAULT '0001-01-01',
  `location` varchar(50) DEFAULT NULL,
  `icq` varchar(50) DEFAULT NULL,
  `aim` varchar(50) DEFAULT NULL,
  `yim` varchar(50) DEFAULT NULL,
  `msn` varchar(50) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `gtalk` varchar(50) DEFAULT NULL,
  `myspace` varchar(50) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL,
  `delicious` varchar(50) DEFAULT NULL,
  `friendfeed` varchar(50) DEFAULT NULL,
  `digg` varchar(50) DEFAULT NULL,
  `blogspot` varchar(50) DEFAULT NULL,
  `flickr` varchar(50) DEFAULT NULL,
  `bebo` varchar(50) DEFAULT NULL,
  `websitename` varchar(50) DEFAULT NULL,
  `websiteurl` varchar(50) DEFAULT NULL,
  `rank` tinyint(4) NOT NULL DEFAULT '0',
  `hideEmail` tinyint(1) NOT NULL DEFAULT '1',
  `showOnline` tinyint(1) NOT NULL DEFAULT '1',
  `canSubscribe` tinyint(1) NOT NULL DEFAULT '-1',
  `userListtime` int(11) DEFAULT '-2',
  `thankyou` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_users`
--

INSERT INTO `patent_kunena_users` (`userid`, `status`, `status_text`, `view`, `signature`, `moderator`, `banned`, `ordering`, `posts`, `avatar`, `karma`, `karma_time`, `group_id`, `uhits`, `personalText`, `gender`, `birthdate`, `location`, `icq`, `aim`, `yim`, `msn`, `skype`, `twitter`, `facebook`, `gtalk`, `myspace`, `linkedin`, `delicious`, `friendfeed`, `digg`, `blogspot`, `flickr`, `bebo`, `websitename`, `websiteurl`, `rank`, `hideEmail`, `showOnline`, `canSubscribe`, `userListtime`, `thankyou`) VALUES
(780, 0, '', '', NULL, 0, NULL, 0, 3, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(781, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(782, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(783, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(784, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(785, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(786, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(787, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(788, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(789, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0),
(790, 0, '', '', NULL, 0, NULL, 0, 0, NULL, 0, 0, 1, 0, NULL, 0, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, -1, -2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_users_banned`
--

DROP TABLE IF EXISTS `patent_kunena_users_banned`;
CREATE TABLE IF NOT EXISTS `patent_kunena_users_banned` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `ip` varchar(128) DEFAULT NULL,
  `blocked` tinyint(4) NOT NULL DEFAULT '0',
  `expiration` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `reason_private` text,
  `reason_public` text,
  `modified_by` int(11) DEFAULT NULL,
  `modified_time` datetime DEFAULT NULL,
  `comments` text,
  `params` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_user_categories`
--

DROP TABLE IF EXISTS `patent_kunena_user_categories`;
CREATE TABLE IF NOT EXISTS `patent_kunena_user_categories` (
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `allreadtime` int(11) NOT NULL DEFAULT '0',
  `subscribed` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_user_categories`
--

INSERT INTO `patent_kunena_user_categories` (`user_id`, `category_id`, `role`, `allreadtime`, `subscribed`, `params`) VALUES
(780, 0, 0, 1493036578, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_user_read`
--

DROP TABLE IF EXISTS `patent_kunena_user_read`;
CREATE TABLE IF NOT EXISTS `patent_kunena_user_read` (
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_user_read`
--

INSERT INTO `patent_kunena_user_read` (`user_id`, `topic_id`, `category_id`, `message_id`, `time`) VALUES
(780, 1, 2, 1, 1493036445),
(780, 2, 2, 3, 1493195548);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_user_topics`
--

DROP TABLE IF EXISTS `patent_kunena_user_topics`;
CREATE TABLE IF NOT EXISTS `patent_kunena_user_topics` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `posts` mediumint(8) NOT NULL DEFAULT '0',
  `last_post_id` int(11) NOT NULL DEFAULT '0',
  `owner` tinyint(4) NOT NULL DEFAULT '0',
  `favorite` tinyint(4) NOT NULL DEFAULT '0',
  `subscribed` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_user_topics`
--

INSERT INTO `patent_kunena_user_topics` (`user_id`, `topic_id`, `category_id`, `posts`, `last_post_id`, `owner`, `favorite`, `subscribed`, `params`) VALUES
(780, 1, 2, 1, 1, 1, 0, 0, ''),
(780, 2, 2, 2, 3, 1, 0, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_kunena_version`
--

DROP TABLE IF EXISTS `patent_kunena_version`;
CREATE TABLE IF NOT EXISTS `patent_kunena_version` (
  `id` int(11) NOT NULL,
  `version` varchar(20) NOT NULL,
  `versiondate` date NOT NULL,
  `installdate` date NOT NULL,
  `build` varchar(20) NOT NULL,
  `versionname` varchar(40) DEFAULT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_kunena_version`
--

INSERT INTO `patent_kunena_version` (`id`, `version`, `versiondate`, `installdate`, `build`, `versionname`, `state`) VALUES
(1, '4.0.10', '2016-02-18', '2017-04-24', '', 'Villavicencio', '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_languages`
--

DROP TABLE IF EXISTS `patent_languages`;
CREATE TABLE IF NOT EXISTS `patent_languages` (
  `lang_id` int(11) unsigned NOT NULL,
  `lang_code` char(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_native` varchar(50) NOT NULL,
  `sef` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `sitename` varchar(1024) NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_languages`
--

INSERT INTO `patent_languages` (`lang_id`, `lang_code`, `title`, `title_native`, `sef`, `image`, `description`, `metakey`, `metadesc`, `sitename`, `published`, `access`, `ordering`) VALUES
(1, 'en-GB', 'English (UK)', 'English (UK)', 'en', 'en', '', '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_menu`
--

DROP TABLE IF EXISTS `patent_menu`;
CREATE TABLE IF NOT EXISTS `patent_menu` (
  `id` int(11) NOT NULL,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `ordering` int(11) NOT NULL DEFAULT '0' COMMENT 'The relative ordering of the menu item in the tree.',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_menu`
--

INSERT INTO `patent_menu` (`id`, `menutype`, `title`, `alias`, `note`, `path`, `link`, `type`, `published`, `parent_id`, `level`, `component_id`, `ordering`, `checked_out`, `checked_out_time`, `browserNav`, `access`, `img`, `template_style_id`, `params`, `lft`, `rgt`, `home`, `language`, `client_id`) VALUES
(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 67, 0, '*', 0),
(2, 'menu', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 0, 1, 1, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 1, 10, 0, '*', 1),
(3, 'menu', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 2, 3, 0, '*', 1),
(4, 'menu', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&extension=com_banners', 'component', 0, 2, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-cat', 0, '', 4, 5, 0, '*', 1),
(5, 'menu', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-clients', 0, '', 6, 7, 0, '*', 1),
(6, 'menu', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 0, 2, 2, 4, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-tracks', 0, '', 8, 9, 0, '*', 1),
(7, 'menu', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 0, 1, 1, 8, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 11, 16, 0, '*', 1),
(8, 'menu', 'com_contact', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact', 'component', 0, 7, 2, 8, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 12, 13, 0, '*', 1),
(9, 'menu', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&extension=com_contact', 'component', 0, 7, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact-cat', 0, '', 14, 15, 0, '*', 1),
(10, 'menu', 'com_messages', 'Messaging', '', 'Messaging', 'index.php?option=com_messages', 'component', 0, 1, 1, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages', 0, '', 17, 22, 0, '*', 1),
(11, 'menu', 'com_messages_add', 'New Private Message', '', 'Messaging/New Private Message', 'index.php?option=com_messages&task=message.add', 'component', 0, 10, 2, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-add', 0, '', 18, 19, 0, '*', 1),
(12, 'menu', 'com_messages_read', 'Read Private Message', '', 'Messaging/Read Private Message', 'index.php?option=com_messages', 'component', 0, 10, 2, 15, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-read', 0, '', 20, 21, 0, '*', 1),
(13, 'menu', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 1, 1, 17, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 23, 28, 0, '*', 1),
(14, 'menu', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 13, 2, 17, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 24, 25, 0, '*', 1),
(15, 'menu', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&extension=com_newsfeeds', 'component', 0, 13, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds-cat', 0, '', 26, 27, 0, '*', 1),
(16, 'menu', 'com_redirect', 'Redirect', '', 'Redirect', 'index.php?option=com_redirect', 'component', 0, 1, 1, 24, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:redirect', 0, '', 43, 44, 0, '*', 1),
(17, 'menu', 'com_search', 'Basic Search', '', 'Basic Search', 'index.php?option=com_search', 'component', 0, 1, 1, 19, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:search', 0, '', 33, 34, 0, '*', 1),
(18, 'menu', 'com_weblinks', 'Weblinks', '', 'Weblinks', 'index.php?option=com_weblinks', 'component', 0, 1, 1, 21, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 35, 40, 0, '*', 1),
(19, 'menu', 'com_weblinks_links', 'Links', '', 'Weblinks/Links', 'index.php?option=com_weblinks', 'component', 0, 18, 2, 21, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks', 0, '', 36, 37, 0, '*', 1),
(20, 'menu', 'com_weblinks_categories', 'Categories', '', 'Weblinks/Categories', 'index.php?option=com_categories&extension=com_weblinks', 'component', 0, 18, 2, 6, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:weblinks-cat', 0, '', 38, 39, 0, '*', 1),
(21, 'menu', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 0, 1, 1, 27, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:finder', 0, '', 31, 32, 0, '*', 1),
(22, 'menu', 'com_joomlaupdate', 'Joomla! Update', '', 'Joomla! Update', 'index.php?option=com_joomlaupdate', 'component', 0, 1, 1, 28, 0, 0, '0000-00-00 00:00:00', 0, 0, 'class:joomlaupdate', 0, '', 41, 42, 0, '*', 1),
(101, 'mainmenu', 'Home', 'home', '', 'home', 'index.php?option=com_users&view=login', 'component', 1, 1, 1, 25, 0, 0, '0000-00-00 00:00:00', 0, 1, '', 4, '{"login_redirect_url":"","logindescription_show":"1","login_description":"","login_image":"","logout_redirect_url":"","logoutdescription_show":"1","logout_description":"","logout_image":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":1,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 29, 30, 1, '*', 0),
(102, 'main', 'JTAG Members Directory', 'j2tag-members-directory', '', 'j2tag-members-directory', 'index.php?option=com_jtagmembersdirectory', 'component', 0, 1, 1, 10000, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 45, 46, 0, '', 1),
(103, 'mainmenu', 'Члены профсоюза', 'members-dir', '', 'members-dir', 'index.php?option=com_jtagmembersdirectory&view=browselist', 'component', 1, 1, 1, 10000, 0, 780, '2017-05-15 14:37:52', 0, 1, '', 4, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 47, 48, 0, '*', 0),
(104, 'main', 'COM_YANDEX_MAPS_MENU', 'com-yandex-maps-menu', '', 'com-yandex-maps-menu', 'index.php?option=com_yandex_maps', 'component', 0, 1, 1, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_yandex_maps/images/com_yandex_maps-icon-16x16.png', 0, '', 49, 66, 0, '', 1),
(105, 'main', 'COM_YANDEX_MAPS_MAPS', 'com-yandex-maps-maps', '', 'com-yandex-maps-menu/com-yandex-maps-maps', 'index.php?option=com_yandex_maps&task=maps', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_yandex_maps/images/com_yandex_maps-maps-icon-16x16.png', 0, '', 50, 51, 0, '', 1),
(106, 'main', 'COM_YANDEX_MAPS_CATEGORIES', 'com-yandex-maps-categories', '', 'com-yandex-maps-menu/com-yandex-maps-categories', 'index.php?option=com_yandex_maps&task=categories', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_yandex_maps/images/com_yandex_maps-categories-icon-16x16.png', 0, '', 52, 53, 0, '', 1),
(107, 'main', 'COM_YANDEX_MAPS_OBJECTS', 'com-yandex-maps-objects', '', 'com-yandex-maps-menu/com-yandex-maps-objects', 'index.php?option=com_yandex_maps&task=objects', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, '../media/com_yandex_maps/images/com_yandex_maps-objects-icon-16x16.png', 0, '', 54, 55, 0, '', 1),
(108, 'main', 'COM_YANDEX_MAPS_IMPORT', 'com-yandex-maps-import', '', 'com-yandex-maps-menu/com-yandex-maps-import', 'index.php?option=com_yandex_maps&task=import', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 56, 57, 0, '', 1),
(109, 'main', 'COM_YANDEX_MAPS_EXPORT', 'com-yandex-maps-export', '', 'com-yandex-maps-menu/com-yandex-maps-export', 'index.php?option=com_yandex_maps&task=export', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 58, 59, 0, '', 1),
(110, 'main', 'COM_YANDEX_MAPS_MANAGE', 'com-yandex-maps-manage', '', 'com-yandex-maps-menu/com-yandex-maps-manage', 'index.php?option=com_config&view=component&component=com_yandex_maps', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 60, 61, 0, '', 1),
(111, 'main', 'COM_YANDEX_MAPS_MODULES', 'com-yandex-maps-modules', '', 'com-yandex-maps-menu/com-yandex-maps-modules', 'index.php?option=com_modules&filter_module=mod_yandex_maps', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 62, 63, 0, '', 1),
(112, 'main', 'COM_YANDEX_MAPS_PLUGINS', 'com-yandex-maps-plugins', '', 'com-yandex-maps-menu/com-yandex-maps-plugins', 'index.php?option=com_plugins&view=plugins&filter_folder=system&filter_order=extension_id&filter_order_Dir=desc&filter_search=Яндекс', 'component', 0, 104, 2, 10010, 0, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 64, 65, 0, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_menu_types`
--

DROP TABLE IF EXISTS `patent_menu_types`;
CREATE TABLE IF NOT EXISTS `patent_menu_types` (
  `id` int(10) unsigned NOT NULL,
  `menutype` varchar(24) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_menu_types`
--

INSERT INTO `patent_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_messages`
--

DROP TABLE IF EXISTS `patent_messages`;
CREATE TABLE IF NOT EXISTS `patent_messages` (
  `message_id` int(10) unsigned NOT NULL,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_messages_cfg`
--

DROP TABLE IF EXISTS `patent_messages_cfg`;
CREATE TABLE IF NOT EXISTS `patent_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_modules`
--

DROP TABLE IF EXISTS `patent_modules`;
CREATE TABLE IF NOT EXISTS `patent_modules` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT '',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_modules`
--

INSERT INTO `patent_modules` (`id`, `title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES
(1, 'Main Menu', '', '', 1, 'position-12', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 1, 1, '{"menutype":"mainmenu","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"","window_open":"","layout":"_:default","moduleclass_sfx":"_menu","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(2, 'Login', '', '', 1, 'login', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '', 1, '*'),
(3, 'Popular Articles', '', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_popular', 3, 1, '{"count":"5","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(4, 'Recently Added Articles', '', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_latest', 3, 1, '{"count":"5","ordering":"c_dsc","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(8, 'Toolbar', '', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_toolbar', 3, 1, '', 1, '*'),
(9, 'Quick Icons', '', '', 1, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_quickicon', 3, 1, '', 1, '*'),
(10, 'Logged-in Users', '', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_logged', 3, 1, '{"count":"5","name":"1","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1"}', 1, '*'),
(12, 'Admin Menu', '', '', 1, 'menu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 3, 1, '{"layout":"","moduleclass_sfx":"","shownew":"1","showhelp":"1","cache":"0"}', 1, '*'),
(13, 'Admin Submenu', '', '', 1, 'submenu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_submenu', 3, 1, '', 1, '*'),
(14, 'User Status', '', '', 2, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_status', 3, 1, '', 1, '*'),
(15, 'Title', '', '', 1, 'title', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_title', 3, 1, '', 1, '*'),
(16, 'Login Form', '', '', 7, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_login', 1, 1, '{"greeting":"1","name":"0"}', 0, '*'),
(17, 'Breadcrumbs', '', '', 1, 'position-2', 780, '2017-03-21 10:38:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 1, 1, '{"moduleclass_sfx":"","showHome":"1","homeText":"Home","showComponent":"1","separator":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(79, 'Multilanguage status', '', '', 1, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_multilangstatus', 3, 1, '{"layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(86, 'Joomla Version', '', '', 1, 'footer', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_version', 3, 1, '{"format":"short","product":"1","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(87, 'Модуль вывода карты с метками -  API 2.1', '', '', 1, '', 780, '2017-04-26 10:29:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_maps2015', 1, 1, '{"cache":"0","moduleclass_sfx":"","centermap":"55.75399400, 37.62209300","scrope_bool":"1","scope":"10","typemap_bool":"1","bottom_bool":"1","trafficControl":"1","scaling":"1","wi":"740","he":"450","iconmap":"modules\\/mod_maps2015\\/images\\/myIcon.png","list_templates":"{''template'':[''\\u041a\\u043e\\u043e\\u0440\\u0434\\u0438\\u043d\\u0430\\u0442\\u044b \\u043c\\u0435\\u0442\\u043a\\u0438''],''point'':[''\\/images\\/My-image.jpg''],''description'':[''\\u041e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435 - \\u043c\\u043e\\u0436\\u043d\\u043e \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u044c HTML '']}","params":{"template":"","point":"","description":""},"icon_wi":"70","icon_he":"70","zn1":"-20","zn2":"-70","layout":"_:default"}', 0, '*'),
(88, 'Яндекс карты', '', '', 0, '', 780, '2017-05-03 07:35:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_yandex_maps', 1, 1, '', 0, '*');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_modules_menu`
--

DROP TABLE IF EXISTS `patent_modules_menu`;
CREATE TABLE IF NOT EXISTS `patent_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_modules_menu`
--

INSERT INTO `patent_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(79, 0),
(86, 0),
(87, 103);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_newsfeeds`
--

DROP TABLE IF EXISTS `patent_newsfeeds`;
CREATE TABLE IF NOT EXISTS `patent_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(10) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(10) unsigned NOT NULL DEFAULT '3600',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_overrider`
--

DROP TABLE IF EXISTS `patent_overrider`;
CREATE TABLE IF NOT EXISTS `patent_overrider` (
  `id` int(10) NOT NULL COMMENT 'Primary Key',
  `constant` varchar(255) NOT NULL,
  `string` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_redirect_links`
--

DROP TABLE IF EXISTS `patent_redirect_links`;
CREATE TABLE IF NOT EXISTS `patent_redirect_links` (
  `id` int(10) unsigned NOT NULL,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) NOT NULL,
  `referer` varchar(150) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_schemas`
--

DROP TABLE IF EXISTS `patent_schemas`;
CREATE TABLE IF NOT EXISTS `patent_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_schemas`
--

INSERT INTO `patent_schemas` (`extension_id`, `version_id`) VALUES
(700, '2.5.28'),
(10000, '2.47'),
(10010, '3.7.2');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_session`
--

DROP TABLE IF EXISTS `patent_session`;
CREATE TABLE IF NOT EXISTS `patent_session` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `guest` tinyint(4) unsigned DEFAULT '1',
  `time` varchar(14) DEFAULT '',
  `data` mediumtext,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) DEFAULT '',
  `usertype` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_session`
--

INSERT INTO `patent_session` (`session_id`, `client_id`, `guest`, `time`, `data`, `userid`, `username`, `usertype`) VALUES
('bf322ed96ea355f0014a6df6d5c53a23', 0, 1, '1495126903', '__default|a:8:{s:22:"session.client.browser";s:114:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:15:"session.counter";i:3;s:8:"registry";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":1:{s:5:"users";O:8:"stdClass":1:{s:5:"login";O:8:"stdClass":1:{s:4:"form";O:8:"stdClass":1:{s:4:"data";a:1:{s:6:"return";s:39:"index.php?option=com_users&view=profile";}}}}}}s:4:"user";O:5:"JUser":25:{s:9:"\0*\0isRoot";N;s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:6:"groups";a:0:{}s:5:"guest";i:1;s:13:"lastResetTime";N;s:10:"resetCount";N;s:10:"\0*\0_params";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":0:{}}s:14:"\0*\0_authGroups";N;s:14:"\0*\0_authLevels";a:2:{i:0;i:1;i:1;i:1;}s:15:"\0*\0_authActions";N;s:12:"\0*\0_errorMsg";N;s:10:"\0*\0_errors";a:0:{}s:3:"aid";i:0;}s:13:"session.token";s:32:"3cb2229b94e744c4984db81c658af39c";s:19:"session.timer.start";i:1495126892;s:18:"session.timer.last";i:1495126892;s:17:"session.timer.now";i:1495126902;}', 0, '', ''),
('d1227f9710cf4b80d45ac9b22aee418f', 1, 0, '1495045691', '__default|a:8:{s:15:"session.counter";i:10;s:19:"session.timer.start";i:1495045608;s:18:"session.timer.last";i:1495045686;s:17:"session.timer.now";i:1495045690;s:22:"session.client.browser";s:114:"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36";s:8:"registry";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":2:{s:11:"application";O:8:"stdClass":1:{s:4:"lang";s:0:"";}s:13:"com_installer";O:8:"stdClass":2:{s:7:"message";s:0:"";s:17:"extension_message";s:0:"";}}}s:4:"user";O:5:"JUser":25:{s:9:"\0*\0isRoot";b:1;s:2:"id";s:3:"780";s:4:"name";s:10:"Super User";s:8:"username";s:4:"root";s:5:"email";s:24:"romansergeenko@gmail.com";s:8:"password";s:34:"$P$DgwZIYz3vJ.eKHNVZHEmJEpMu.YIdN1";s:14:"password_clear";s:0:"";s:8:"usertype";s:10:"deprecated";s:5:"block";s:1:"0";s:9:"sendEmail";s:1:"1";s:12:"registerDate";s:19:"2017-03-21 10:30:04";s:13:"lastvisitDate";s:19:"2017-05-15 17:35:05";s:10:"activation";s:1:"0";s:6:"params";s:0:"";s:6:"groups";a:1:{i:8;s:1:"8";}s:5:"guest";i:0;s:13:"lastResetTime";s:19:"0000-00-00 00:00:00";s:10:"resetCount";s:1:"0";s:10:"\0*\0_params";O:9:"JRegistry":1:{s:7:"\0*\0data";O:8:"stdClass":0:{}}s:14:"\0*\0_authGroups";a:2:{i:0;i:1;i:1;i:8;}s:14:"\0*\0_authLevels";a:4:{i:0;i:1;i:1;i:1;i:2;i:2;i:3;i:3;}s:15:"\0*\0_authActions";N;s:12:"\0*\0_errorMsg";N;s:10:"\0*\0_errors";a:0:{}s:3:"aid";i:0;}s:13:"session.token";s:32:"74604b293c444a12a791739516305b6d";}', 780, 'root', '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_template_styles`
--

DROP TABLE IF EXISTS `patent_template_styles`;
CREATE TABLE IF NOT EXISTS `patent_template_styles` (
  `id` int(10) unsigned NOT NULL,
  `template` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `home` char(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_template_styles`
--

INSERT INTO `patent_template_styles` (`id`, `template`, `client_id`, `home`, `title`, `params`) VALUES
(2, 'bluestork', 1, '1', 'Bluestork - Default', '{"useRoundedCorners":"1","showSiteName":"0"}'),
(3, 'atomic', 0, '0', 'Atomic - Default', '{}'),
(4, 'beez_20', 0, '1', 'Beez2 - Default', '{"wrapperSmall":53,"wrapperLarge":72,"logo":"images\\/joomla_black.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","templatecolor":"personal"}'),
(5, 'hathor', 1, '0', 'Hathor - Default', '{"showSiteName":"0","colourChoice":"","boldText":"0"}'),
(6, 'beez5', 0, '0', 'Beez5 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/sampledata\\/fruitshop\\/fruits.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","html5":"0"}'),
(7, 'jsn_air_free', 0, '0', 'JSN Air FREE - Default', '{"logoColored":"1","mobileLogo":"","favicon":"","logoLink":"index.php","logoSlogan":"","templateWidth":{"type":"fixed","fixed":"960","float":"90"},"showFrontpage":"1","desktopSwitcher":"1","promoColumns":{"01:promo-left":"span3","00:promo":"span6","02:promo-right":"span3"},"mainColumns":{"01:left":"span3","00:content":"span6","02:right":"span3"},"contentColumns":{"01:innerleft":"span3","00:component":"span6","02:innerright":"span3"},"userColumns":{"00:user5":"span4","00:user6":"span4","00:user7":"span4"},"menuSticky":{"mobile":"1","desktop":"0"},"mobileMenuEffect":"default","sitetoolsColors":"{\\"list\\":[\\"blue\\",\\"red\\",\\"green\\",\\"violet\\",\\"orange\\",\\"grey\\"],\\"colors\\":[\\"blue\\",\\"red\\",\\"green\\",\\"violet\\",\\"orange\\",\\"grey\\"]}","socialIcons":{"status":["facebook","twitter","youtube"]}}');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_updates`
--

DROP TABLE IF EXISTS `patent_updates`;
CREATE TABLE IF NOT EXISTS `patent_updates` (
  `update_id` int(11) NOT NULL,
  `update_site_id` int(11) DEFAULT '0',
  `extension_id` int(11) DEFAULT '0',
  `categoryid` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `description` text NOT NULL,
  `element` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `folder` varchar(20) DEFAULT '',
  `client_id` tinyint(3) DEFAULT '0',
  `version` varchar(10) DEFAULT '',
  `data` text NOT NULL,
  `detailsurl` text NOT NULL,
  `infourl` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COMMENT='Available Updates';

--
-- Дамп данных таблицы `patent_updates`
--

INSERT INTO `patent_updates` (`update_id`, `update_site_id`, `extension_id`, `categoryid`, `name`, `description`, `element`, `type`, `folder`, `client_id`, `version`, `data`, `detailsurl`, `infourl`) VALUES
(1, 3, 0, 0, 'Armenian', '', 'pkg_hy-AM', 'package', '', 0, '2.5.28.3', '', 'http://update.joomla.org/language/details/hy-AM_details.xml', ''),
(2, 3, 0, 0, 'Bahasa Indonesia', '', 'pkg_id-ID', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/id-ID_details.xml', ''),
(3, 3, 0, 0, 'Danish', '', 'pkg_da-DK', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/da-DK_details.xml', ''),
(4, 3, 0, 0, 'Khmer', '', 'pkg_km-KH', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/km-KH_details.xml', ''),
(5, 3, 0, 0, 'Swedish', '', 'pkg_sv-SE', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/sv-SE_details.xml', ''),
(6, 3, 0, 0, 'Hungarian', '', 'pkg_hu-HU', 'package', '', 0, '2.5.14.1', '', 'http://update.joomla.org/language/details/hu-HU_details.xml', ''),
(7, 3, 0, 0, 'Bulgarian', '', 'pkg_bg-BG', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/bg-BG_details.xml', ''),
(8, 3, 0, 0, 'French', '', 'pkg_fr-FR', 'package', '', 0, '2.5.28.2', '', 'http://update.joomla.org/language/details/fr-FR_details.xml', ''),
(9, 3, 0, 0, 'Italian', '', 'pkg_it-IT', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/it-IT_details.xml', ''),
(10, 3, 0, 0, 'Spanish', '', 'pkg_es-ES', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/es-ES_details.xml', ''),
(11, 3, 0, 0, 'Dutch', '', 'pkg_nl-NL', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/nl-NL_details.xml', ''),
(12, 3, 0, 0, 'Turkish', '', 'pkg_tr-TR', 'package', '', 0, '2.5.20.1', '', 'http://update.joomla.org/language/details/tr-TR_details.xml', ''),
(13, 3, 0, 0, 'Ukrainian', '', 'pkg_uk-UA', 'package', '', 0, '2.5.13.11', '', 'http://update.joomla.org/language/details/uk-UA_details.xml', ''),
(14, 3, 0, 0, 'Slovak', '', 'pkg_sk-SK', 'package', '', 0, '2.5.27.1', '', 'http://update.joomla.org/language/details/sk-SK_details.xml', ''),
(15, 3, 0, 0, 'Belarusian', '', 'pkg_be-BY', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/be-BY_details.xml', ''),
(16, 3, 0, 0, 'Latvian', '', 'pkg_lv-LV', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/lv-LV_details.xml', ''),
(17, 3, 0, 0, 'Estonian', '', 'pkg_et-EE', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/et-EE_details.xml', ''),
(18, 3, 0, 0, 'Romanian', '', 'pkg_ro-RO', 'package', '', 0, '2.5.11.1', '', 'http://update.joomla.org/language/details/ro-RO_details.xml', ''),
(19, 3, 0, 0, 'Flemish', '', 'pkg_nl-BE', 'package', '', 0, '2.5.27.1', '', 'http://update.joomla.org/language/details/nl-BE_details.xml', ''),
(20, 3, 0, 0, 'Macedonian', '', 'pkg_mk-MK', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/mk-MK_details.xml', ''),
(21, 3, 0, 0, 'Japanese', '', 'pkg_ja-JP', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/ja-JP_details.xml', ''),
(22, 3, 0, 0, 'Serbian Latin', '', 'pkg_sr-YU', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/sr-YU_details.xml', ''),
(23, 3, 0, 0, 'Arabic Unitag', '', 'pkg_ar-AA', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/ar-AA_details.xml', ''),
(24, 3, 0, 0, 'German', '', 'pkg_de-DE', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/de-DE_details.xml', ''),
(25, 3, 0, 0, 'Norwegian Bokmal', '', 'pkg_nb-NO', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/nb-NO_details.xml', ''),
(26, 3, 0, 0, 'English AU', '', 'pkg_en-AU', 'package', '', 0, '2.5.22.2', '', 'http://update.joomla.org/language/details/en-AU_details.xml', ''),
(27, 3, 0, 0, 'English US', '', 'pkg_en-US', 'package', '', 0, '2.5.22.1', '', 'http://update.joomla.org/language/details/en-US_details.xml', ''),
(28, 3, 0, 0, 'Serbian Cyrillic', '', 'pkg_sr-RS', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/sr-RS_details.xml', ''),
(29, 3, 0, 0, 'Lithuanian', '', 'pkg_lt-LT', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/lt-LT_details.xml', ''),
(30, 3, 0, 0, 'Albanian', '', 'pkg_sq-AL', 'package', '', 0, '2.5.1.5', '', 'http://update.joomla.org/language/details/sq-AL_details.xml', ''),
(31, 3, 0, 0, 'Czech', '', 'pkg_cs-CZ', 'package', '', 0, '2.5.28.2', '', 'http://update.joomla.org/language/details/cs-CZ_details.xml', ''),
(32, 3, 0, 0, 'Persian', '', 'pkg_fa-IR', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/fa-IR_details.xml', ''),
(33, 3, 0, 0, 'Galician', '', 'pkg_gl-ES', 'package', '', 0, '2.5.7.4', '', 'http://update.joomla.org/language/details/gl-ES_details.xml', ''),
(34, 3, 0, 0, 'Polish', '', 'pkg_pl-PL', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/pl-PL_details.xml', ''),
(35, 3, 0, 0, 'Syriac', '', 'pkg_sy-IQ', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/sy-IQ_details.xml', ''),
(36, 3, 0, 0, 'Portuguese', '', 'pkg_pt-PT', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/pt-PT_details.xml', ''),
(38, 3, 0, 0, 'Hebrew', '', 'pkg_he-IL', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/he-IL_details.xml', ''),
(39, 3, 0, 0, 'Catalan', '', 'pkg_ca-ES', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/ca-ES_details.xml', ''),
(40, 3, 0, 0, 'Laotian', '', 'pkg_lo-LA', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/lo-LA_details.xml', ''),
(41, 3, 0, 0, 'Afrikaans', '', 'pkg_af-ZA', 'package', '', 0, '2.5.16.1', '', 'http://update.joomla.org/language/details/af-ZA_details.xml', ''),
(42, 3, 0, 0, 'Chinese Simplified', '', 'pkg_zh-CN', 'package', '', 0, '2.5.20.1', '', 'http://update.joomla.org/language/details/zh-CN_details.xml', ''),
(43, 3, 0, 0, 'Greek', '', 'pkg_el-GR', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/el-GR_details.xml', ''),
(44, 3, 0, 0, 'Finnish', '', 'pkg_fi-FI', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/fi-FI_details.xml', ''),
(45, 3, 0, 0, 'Portuguese Brazil', '', 'pkg_pt-BR', 'package', '', 0, '2.5.9.1', '', 'http://update.joomla.org/language/details/pt-BR_details.xml', ''),
(46, 3, 0, 0, 'Chinese Traditional', '', 'pkg_zh-TW', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/zh-TW_details.xml', ''),
(47, 3, 0, 0, 'Vietnamese', '', 'pkg_vi-VN', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/vi-VN_details.xml', ''),
(48, 3, 0, 0, 'Kurdish Sorani', '', 'pkg_ckb-IQ', 'package', '', 0, '2.5.9.1', '', 'http://update.joomla.org/language/details/ckb-IQ_details.xml', ''),
(49, 3, 0, 0, 'Bengali', '', 'pkg_bn-BD', 'package', '', 0, '2.5.0.1', '', 'http://update.joomla.org/language/details/bn-BD_details.xml', ''),
(50, 3, 0, 0, 'Bosnian', '', 'pkg_bs-BA', 'package', '', 0, '2.5.24.1', '', 'http://update.joomla.org/language/details/bs-BA_details.xml', ''),
(51, 3, 0, 0, 'Croatian', '', 'pkg_hr-HR', 'package', '', 0, '2.5.13.1', '', 'http://update.joomla.org/language/details/hr-HR_details.xml', ''),
(52, 3, 0, 0, 'Azeri', '', 'pkg_az-AZ', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/az-AZ_details.xml', ''),
(53, 3, 0, 0, 'Norwegian Nynorsk', '', 'pkg_nn-NO', 'package', '', 0, '2.5.8.1', '', 'http://update.joomla.org/language/details/nn-NO_details.xml', ''),
(54, 3, 0, 0, 'Tamil India', '', 'pkg_ta-IN', 'package', '', 0, '2.5.28.2', '', 'http://update.joomla.org/language/details/ta-IN_details.xml', ''),
(55, 3, 0, 0, 'Scottish Gaelic', '', 'pkg_gd-GB', 'package', '', 0, '2.5.7.1', '', 'http://update.joomla.org/language/details/gd-GB_details.xml', ''),
(56, 3, 0, 0, 'Thai', '', 'pkg_th-TH', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/th-TH_details.xml', ''),
(57, 3, 0, 0, 'Basque', '', 'pkg_eu-ES', 'package', '', 0, '1.7.0.1', '', 'http://update.joomla.org/language/details/eu-ES_details.xml', ''),
(58, 3, 0, 0, 'Uyghur', '', 'pkg_ug-CN', 'package', '', 0, '2.5.7.2', '', 'http://update.joomla.org/language/details/ug-CN_details.xml', ''),
(59, 3, 0, 0, 'Korean', '', 'pkg_ko-KR', 'package', '', 0, '2.5.11.1', '', 'http://update.joomla.org/language/details/ko-KR_details.xml', ''),
(60, 3, 0, 0, 'Hindi', '', 'pkg_hi-IN', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/hi-IN_details.xml', ''),
(61, 3, 0, 0, 'Welsh', '', 'pkg_cy-GB', 'package', '', 0, '2.5.6.1', '', 'http://update.joomla.org/language/details/cy-GB_details.xml', ''),
(62, 3, 0, 0, 'Swahili', '', 'pkg_sw-KE', 'package', '', 0, '2.5.28.1', '', 'http://update.joomla.org/language/details/sw-KE_details.xml', ''),
(63, 0, 10001, 0, 'JSN Template Framework', '', 'jsntplframework', 'plugin', '', 0, '3.2.0', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_update_categories`
--

DROP TABLE IF EXISTS `patent_update_categories`;
CREATE TABLE IF NOT EXISTS `patent_update_categories` (
  `categoryid` int(11) NOT NULL,
  `name` varchar(20) DEFAULT '',
  `description` text NOT NULL,
  `parent` int(11) DEFAULT '0',
  `updatesite` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Update Categories';

-- --------------------------------------------------------

--
-- Структура таблицы `patent_update_sites`
--

DROP TABLE IF EXISTS `patent_update_sites`;
CREATE TABLE IF NOT EXISTS `patent_update_sites` (
  `update_site_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `location` text NOT NULL,
  `enabled` int(11) DEFAULT '0',
  `last_check_timestamp` bigint(20) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Update Sites';

--
-- Дамп данных таблицы `patent_update_sites`
--

INSERT INTO `patent_update_sites` (`update_site_id`, `name`, `type`, `location`, `enabled`, `last_check_timestamp`) VALUES
(1, 'Joomla Core', 'collection', 'http://update.joomla.org/core/list.xml', 1, 1495045618),
(2, 'Joomla Extension Directory', 'collection', 'http://update.joomla.org/jed/list.xml', 1, 1495045618),
(3, 'Accredited Joomla! Translations', 'collection', 'http://update.joomla.org/language/translationlist.xml', 1, 1495045618),
(4, 'Плагин yandex_maps', 'extension', 'http://xdan.ru/update/plg_yandex_maps.xml', 1, 1495045618);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_update_sites_extensions`
--

DROP TABLE IF EXISTS `patent_update_sites_extensions`;
CREATE TABLE IF NOT EXISTS `patent_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Links extensions to update sites';

--
-- Дамп данных таблицы `patent_update_sites_extensions`
--

INSERT INTO `patent_update_sites_extensions` (`update_site_id`, `extension_id`) VALUES
(1, 700),
(2, 700),
(3, 600),
(3, 10006),
(4, 10008);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_usergroups`
--

DROP TABLE IF EXISTS `patent_usergroups`;
CREATE TABLE IF NOT EXISTS `patent_usergroups` (
  `id` int(10) unsigned NOT NULL COMMENT 'Primary Key',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `title` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_usergroups`
--

INSERT INTO `patent_usergroups` (`id`, `parent_id`, `lft`, `rgt`, `title`) VALUES
(1, 0, 1, 20, 'Public'),
(2, 1, 6, 17, 'Registered'),
(3, 2, 7, 14, 'Author'),
(4, 3, 8, 11, 'Editor'),
(5, 4, 9, 10, 'Publisher'),
(6, 1, 2, 5, 'Manager'),
(7, 6, 3, 4, 'Administrator'),
(8, 1, 18, 19, 'Super Users');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_users`
--

DROP TABLE IF EXISTS `patent_users`;
CREATE TABLE IF NOT EXISTS `patent_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime'
) ENGINE=InnoDB AUTO_INCREMENT=783 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_users`
--

INSERT INTO `patent_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`) VALUES
(780, 'Super User', 'root', 'romansergeenko@gmail.com', '$P$DgwZIYz3vJ.eKHNVZHEmJEpMu.YIdN1', 'deprecated', 0, 1, '2017-03-21 10:30:04', '2017-05-17 18:26:55', '0', '', '0000-00-00 00:00:00', 0),
(781, 'Roman Sergeenko', 'roman', 'test@test.test2', '$P$DKxqjOwLaD1J21Ul4XQs7fBUoTpIFD.', '', 0, 0, '2017-03-21 11:02:14', '0000-00-00 00:00:00', '', '{"admin_style":"","admin_language":"","language":"","editor":"","helpsite":"","timezone":""}', '0000-00-00 00:00:00', 0),
(782, 'Roman Sergeenko2', 'root2', 'romansergeenko@gmail.com2', '$P$DuVsMCKpwO3P6T4oShJNdR2ch2FVDP0', '', 0, 0, '2017-03-21 11:06:22', '0000-00-00 00:00:00', '', '{"admin_style":"","admin_language":"","language":"","editor":"","helpsite":"","timezone":""}', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_user_notes`
--

DROP TABLE IF EXISTS `patent_user_notes`;
CREATE TABLE IF NOT EXISTS `patent_user_notes` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_user_profiles`
--

DROP TABLE IF EXISTS `patent_user_profiles`;
CREATE TABLE IF NOT EXISTS `patent_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table';

-- --------------------------------------------------------

--
-- Структура таблицы `patent_user_usergroup_map`
--

DROP TABLE IF EXISTS `patent_user_usergroup_map`;
CREATE TABLE IF NOT EXISTS `patent_user_usergroup_map` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_user_usergroup_map`
--

INSERT INTO `patent_user_usergroup_map` (`user_id`, `group_id`) VALUES
(780, 8),
(781, 2),
(782, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `patent_viewlevels`
--

DROP TABLE IF EXISTS `patent_viewlevels`;
CREATE TABLE IF NOT EXISTS `patent_viewlevels` (
  `id` int(10) unsigned NOT NULL COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patent_viewlevels`
--

INSERT INTO `patent_viewlevels` (`id`, `title`, `ordering`, `rules`) VALUES
(1, 'Public', 0, '[1]'),
(2, 'Registered', 1, '[6,2,8]'),
(3, 'Special', 2, '[6,3,8]');

-- --------------------------------------------------------

--
-- Структура таблицы `patent_weblinks`
--

DROP TABLE IF EXISTS `patent_weblinks`;
CREATE TABLE IF NOT EXISTS `patent_weblinks` (
  `id` int(10) unsigned NOT NULL,
  `catid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `access` int(11) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `language` char(7) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if link is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_yandex_maps_categories`
--

DROP TABLE IF EXISTS `patent_yandex_maps_categories`;
CREATE TABLE IF NOT EXISTS `patent_yandex_maps_categories` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID',
  `title` varchar(256) DEFAULT NULL COMMENT 'Название',
  `alias` varchar(256) DEFAULT NULL COMMENT 'Псевдоним',
  `description` text COMMENT 'Описание',
  `category_id` int(10) unsigned DEFAULT NULL COMMENT 'Категория',
  `howtocenter` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Как центровать',
  `lat` decimal(18,14) DEFAULT NULL COMMENT 'Широта',
  `lan` decimal(18,14) DEFAULT NULL COMMENT 'Долгота',
  `zoom` int(10) unsigned DEFAULT NULL COMMENT 'Высота',
  `created_time` int(10) unsigned NOT NULL COMMENT 'Дата создания',
  `modified_time` int(10) unsigned NOT NULL COMMENT 'Дата редоктирования',
  `ordering` int(11) NOT NULL DEFAULT '0' COMMENT 'Сортировка',
  `create_by` int(10) unsigned NOT NULL COMMENT 'Автор',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Включен',
  `params` text NOT NULL COMMENT 'Настройки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_yandex_maps_category_to_map`
--

DROP TABLE IF EXISTS `patent_yandex_maps_category_to_map`;
CREATE TABLE IF NOT EXISTS `patent_yandex_maps_category_to_map` (
  `id` bigint(20) NOT NULL,
  `category_id` int(10) unsigned NOT NULL COMMENT 'ID Категории',
  `map_id` int(10) unsigned NOT NULL COMMENT 'ID карты'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_yandex_maps_maps`
--

DROP TABLE IF EXISTS `patent_yandex_maps_maps`;
CREATE TABLE IF NOT EXISTS `patent_yandex_maps_maps` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID',
  `title` varchar(255) DEFAULT NULL COMMENT 'Название',
  `description` text COMMENT 'Описание',
  `alias` varchar(255) DEFAULT NULL COMMENT 'Псевдоним',
  `lat` decimal(18,14) NOT NULL COMMENT 'Широта',
  `lan` decimal(18,14) NOT NULL COMMENT 'Долгота',
  `zoom` int(10) unsigned NOT NULL DEFAULT '10' COMMENT 'Масштаб карты',
  `maxZoom` smallint(5) unsigned NOT NULL DEFAULT '23' COMMENT 'Максимальный масштаб',
  `minZoom` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'минимальный масштаб',
  `type` varchar(50) NOT NULL DEFAULT 'yandex#map' COMMENT 'Тип карты',
  `width` varchar(20) NOT NULL DEFAULT 'auto' COMMENT 'Ширина карты',
  `height` varchar(20) NOT NULL DEFAULT '450px' COMMENT 'Высота карты',
  `behaviors` text COMMENT 'Behabviors',
  `controls` text NOT NULL COMMENT 'Элементы управления',
  `created_time` int(10) unsigned NOT NULL COMMENT 'Дата создания',
  `modified_time` int(10) unsigned NOT NULL COMMENT 'Дата редоктирования',
  `ordering` int(11) NOT NULL DEFAULT '0' COMMENT 'Сортировка',
  `create_by` int(10) unsigned NOT NULL COMMENT 'Автор',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `params` text NOT NULL COMMENT 'Настройки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_yandex_maps_objects`
--

DROP TABLE IF EXISTS `patent_yandex_maps_objects`;
CREATE TABLE IF NOT EXISTS `patent_yandex_maps_objects` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID',
  `title` varchar(256) DEFAULT NULL COMMENT 'Название',
  `alias` varchar(256) DEFAULT NULL COMMENT 'Псевдоним',
  `description` text COMMENT 'Описание',
  `type` enum('placemark','circle','polygon','polyline') NOT NULL DEFAULT 'placemark' COMMENT 'Тип объекта',
  `lat` decimal(18,14) DEFAULT NULL COMMENT 'Широта по умолчанию',
  `lan` decimal(18,14) DEFAULT NULL COMMENT 'Долгота по умолчанию',
  `zoom` int(11) NOT NULL DEFAULT '10' COMMENT 'Высота',
  `created_time` int(10) unsigned NOT NULL COMMENT 'Дата создания',
  `modified_time` int(10) unsigned NOT NULL COMMENT 'Дата редоктирования',
  `coordinates` text,
  `options` text,
  `properties` text,
  `ordering` int(11) NOT NULL DEFAULT '0' COMMENT 'Сортировка',
  `create_by` int(10) unsigned NOT NULL COMMENT 'Автор',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Включен',
  `params` text NOT NULL COMMENT 'Настройки',
  `metadata` text COMMENT 'Meta информация',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата начала публикации',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Дата конца публикации'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_yandex_maps_object_to_category`
--

DROP TABLE IF EXISTS `patent_yandex_maps_object_to_category`;
CREATE TABLE IF NOT EXISTS `patent_yandex_maps_object_to_category` (
  `id` bigint(20) NOT NULL,
  `object_id` int(10) unsigned NOT NULL COMMENT 'ID Объекта',
  `category_id` int(10) unsigned NOT NULL COMMENT 'ID Категории'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patent_yandex_maps_organizations`
--

DROP TABLE IF EXISTS `patent_yandex_maps_organizations`;
CREATE TABLE IF NOT EXISTS `patent_yandex_maps_organizations` (
  `organization_object_id` int(10) unsigned NOT NULL COMMENT 'ID объекта',
  `organization_name` varchar(255) DEFAULT NULL COMMENT 'Название огранизаии',
  `organization_form` varchar(10) DEFAULT NULL COMMENT 'Форма организации: ООО, ЗАО и т.д.',
  `organization_lider_fio` varchar(255) DEFAULT NULL COMMENT 'ФИО руководителя',
  `organization_lider_position` varchar(255) DEFAULT NULL COMMENT 'Должность руководителя',
  `organization_acting_basis` tinyint(1) DEFAULT NULL COMMENT ' Действует на основании',
  `organization_acting_basis_date` int(11) DEFAULT NULL COMMENT 'Дата доверенности',
  `organization_acting_basis_number` varchar(50) DEFAULT NULL COMMENT 'Номер доверенности',
  `organization_type` varchar(50) DEFAULT NULL COMMENT 'Тип организации',
  `organization_trademark` varchar(255) DEFAULT NULL COMMENT 'Торговая марка',
  `organization_contact_fio` varchar(255) DEFAULT NULL COMMENT 'ФИО контактного лица',
  `organization_contact_position` varchar(60) DEFAULT NULL COMMENT 'Должность контактного лица',
  `organization_contact_phone` varchar(50) DEFAULT NULL COMMENT 'Номер телефона контактного лица',
  `organization_address_legal` text COMMENT 'Адрес юридический',
  `organization_address` text COMMENT 'Адрес фактический',
  `organization_phone` varchar(50) DEFAULT NULL COMMENT 'Телефон для справок',
  `organization_email` varchar(50) DEFAULT NULL COMMENT 'Электронный адрес',
  `organization_website` varchar(100) DEFAULT NULL COMMENT 'Вебсайт',
  `organization_image` varchar(50) DEFAULT NULL COMMENT 'Логотип',
  `organization_shedule_24` tinyint(1) DEFAULT '0' COMMENT 'Круглосуточно',
  `organization_shedule_days` varchar(20) DEFAULT NULL COMMENT 'Дни работы',
  `organization_start_in` tinyint(2) DEFAULT NULL COMMENT 'Начало работы в выходные',
  `organization_end_in` tinyint(2) DEFAULT NULL COMMENT 'Конец работы в выходные',
  `organization_service_delivery` tinyint(1) DEFAULT NULL COMMENT 'Услуги по доставке',
  `organization_service_delivery_variants` tinyint(1) DEFAULT NULL COMMENT 'доставка по городу/ доставка по России',
  `organization_license_number` varchar(50) DEFAULT NULL COMMENT 'Номер лицензии',
  `organization_license_date` int(11) DEFAULT NULL COMMENT 'Дата выдачи лицензии',
  `organization_bank_inn` varchar(50) DEFAULT NULL COMMENT 'ИНН банка',
  `organization_bank_kpp` varchar(50) DEFAULT NULL COMMENT 'КПП банка',
  `organization_bank_rs` varchar(50) DEFAULT NULL COMMENT 'Р/С банка',
  `organization_bank_name` varchar(255) DEFAULT NULL COMMENT 'Название банка',
  `organization_bank_ks` varchar(50) DEFAULT NULL COMMENT 'К/С банка',
  `organization_bank_bik` varchar(50) DEFAULT NULL COMMENT 'БИК банка',
  `organization_info` text COMMENT 'Дополнительная информация'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Организации';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `patent_assets`
--
ALTER TABLE `patent_assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_asset_name` (`name`),
  ADD KEY `idx_lft_rgt` (`lft`,`rgt`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- Индексы таблицы `patent_associations`
--
ALTER TABLE `patent_associations`
  ADD PRIMARY KEY (`context`,`id`),
  ADD KEY `idx_key` (`key`);

--
-- Индексы таблицы `patent_banners`
--
ALTER TABLE `patent_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_own_prefix` (`own_prefix`),
  ADD KEY `idx_metakey_prefix` (`metakey_prefix`),
  ADD KEY `idx_banner_catid` (`catid`),
  ADD KEY `idx_language` (`language`);

--
-- Индексы таблицы `patent_banner_clients`
--
ALTER TABLE `patent_banner_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_own_prefix` (`own_prefix`),
  ADD KEY `idx_metakey_prefix` (`metakey_prefix`);

--
-- Индексы таблицы `patent_banner_tracks`
--
ALTER TABLE `patent_banner_tracks`
  ADD PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  ADD KEY `idx_track_date` (`track_date`),
  ADD KEY `idx_track_type` (`track_type`),
  ADD KEY `idx_banner_id` (`banner_id`);

--
-- Индексы таблицы `patent_categories`
--
ALTER TABLE `patent_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_idx` (`extension`,`published`,`access`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_path` (`path`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`),
  ADD KEY `idx_language` (`language`);

--
-- Индексы таблицы `patent_contact_details`
--
ALTER TABLE `patent_contact_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Индексы таблицы `patent_content`
--
ALTER TABLE `patent_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Индексы таблицы `patent_content_frontpage`
--
ALTER TABLE `patent_content_frontpage`
  ADD PRIMARY KEY (`content_id`);

--
-- Индексы таблицы `patent_content_rating`
--
ALTER TABLE `patent_content_rating`
  ADD PRIMARY KEY (`content_id`);

--
-- Индексы таблицы `patent_extensions`
--
ALTER TABLE `patent_extensions`
  ADD PRIMARY KEY (`extension_id`),
  ADD KEY `element_clientid` (`element`,`client_id`),
  ADD KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  ADD KEY `extension` (`type`,`element`,`folder`,`client_id`);

--
-- Индексы таблицы `patent_finder_filters`
--
ALTER TABLE `patent_finder_filters`
  ADD PRIMARY KEY (`filter_id`);

--
-- Индексы таблицы `patent_finder_links`
--
ALTER TABLE `patent_finder_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `idx_type` (`type_id`),
  ADD KEY `idx_title` (`title`),
  ADD KEY `idx_md5` (`md5sum`),
  ADD KEY `idx_url` (`url`(75)),
  ADD KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  ADD KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`);

--
-- Индексы таблицы `patent_finder_links_terms0`
--
ALTER TABLE `patent_finder_links_terms0`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms1`
--
ALTER TABLE `patent_finder_links_terms1`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms2`
--
ALTER TABLE `patent_finder_links_terms2`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms3`
--
ALTER TABLE `patent_finder_links_terms3`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms4`
--
ALTER TABLE `patent_finder_links_terms4`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms5`
--
ALTER TABLE `patent_finder_links_terms5`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms6`
--
ALTER TABLE `patent_finder_links_terms6`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms7`
--
ALTER TABLE `patent_finder_links_terms7`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms8`
--
ALTER TABLE `patent_finder_links_terms8`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_terms9`
--
ALTER TABLE `patent_finder_links_terms9`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_termsa`
--
ALTER TABLE `patent_finder_links_termsa`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_termsb`
--
ALTER TABLE `patent_finder_links_termsb`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_termsc`
--
ALTER TABLE `patent_finder_links_termsc`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_termsd`
--
ALTER TABLE `patent_finder_links_termsd`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_termse`
--
ALTER TABLE `patent_finder_links_termse`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_links_termsf`
--
ALTER TABLE `patent_finder_links_termsf`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Индексы таблицы `patent_finder_taxonomy`
--
ALTER TABLE `patent_finder_taxonomy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `state` (`state`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `access` (`access`),
  ADD KEY `idx_parent_published` (`parent_id`,`state`,`access`);

--
-- Индексы таблицы `patent_finder_taxonomy_map`
--
ALTER TABLE `patent_finder_taxonomy_map`
  ADD PRIMARY KEY (`link_id`,`node_id`),
  ADD KEY `link_id` (`link_id`),
  ADD KEY `node_id` (`node_id`);

--
-- Индексы таблицы `patent_finder_terms`
--
ALTER TABLE `patent_finder_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD UNIQUE KEY `idx_term` (`term`),
  ADD KEY `idx_term_phrase` (`term`,`phrase`),
  ADD KEY `idx_stem_phrase` (`stem`,`phrase`),
  ADD KEY `idx_soundex_phrase` (`soundex`,`phrase`);

--
-- Индексы таблицы `patent_finder_terms_common`
--
ALTER TABLE `patent_finder_terms_common`
  ADD KEY `idx_word_lang` (`term`,`language`),
  ADD KEY `idx_lang` (`language`);

--
-- Индексы таблицы `patent_finder_tokens`
--
ALTER TABLE `patent_finder_tokens`
  ADD KEY `idx_word` (`term`),
  ADD KEY `idx_context` (`context`);

--
-- Индексы таблицы `patent_finder_tokens_aggregate`
--
ALTER TABLE `patent_finder_tokens_aggregate`
  ADD KEY `token` (`term`),
  ADD KEY `keyword_id` (`term_id`);

--
-- Индексы таблицы `patent_finder_types`
--
ALTER TABLE `patent_finder_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Индексы таблицы `patent_jtmb_attachment`
--
ALTER TABLE `patent_jtmb_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_jtmb_categories`
--
ALTER TABLE `patent_jtmb_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_jtmb_custom_fields`
--
ALTER TABLE `patent_jtmb_custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_jtmb_gallery_images`
--
ALTER TABLE `patent_jtmb_gallery_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Индексы таблицы `patent_jtmb_members_directory`
--
ALTER TABLE `patent_jtmb_members_directory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_kunena_aliases`
--
ALTER TABLE `patent_kunena_aliases`
  ADD UNIQUE KEY `alias` (`alias`),
  ADD KEY `state` (`state`),
  ADD KEY `item` (`item`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `patent_kunena_announcement`
--
ALTER TABLE `patent_kunena_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_kunena_attachments`
--
ALTER TABLE `patent_kunena_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mesid` (`mesid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `hash` (`hash`),
  ADD KEY `filename` (`filename`),
  ADD KEY `filename_real` (`filename_real`);

--
-- Индексы таблицы `patent_kunena_categories`
--
ALTER TABLE `patent_kunena_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `category_access` (`accesstype`,`access`),
  ADD KEY `published_pubaccess_id` (`published`,`pub_access`,`id`);

--
-- Индексы таблицы `patent_kunena_configuration`
--
ALTER TABLE `patent_kunena_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_kunena_keywords`
--
ALTER TABLE `patent_kunena_keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `public_count` (`public_count`),
  ADD KEY `total_count` (`total_count`);

--
-- Индексы таблицы `patent_kunena_keywords_map`
--
ALTER TABLE `patent_kunena_keywords_map`
  ADD UNIQUE KEY `keyword_user_topic` (`keyword_id`,`user_id`,`topic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `topic_user` (`topic_id`,`user_id`);

--
-- Индексы таблицы `patent_kunena_messages`
--
ALTER TABLE `patent_kunena_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thread` (`thread`),
  ADD KEY `ip` (`ip`),
  ADD KEY `userid` (`userid`),
  ADD KEY `time` (`time`),
  ADD KEY `locked` (`locked`),
  ADD KEY `hold_time` (`hold`,`time`),
  ADD KEY `parent_hits` (`parent`,`hits`),
  ADD KEY `catid_parent` (`catid`,`parent`);

--
-- Индексы таблицы `patent_kunena_messages_text`
--
ALTER TABLE `patent_kunena_messages_text`
  ADD PRIMARY KEY (`mesid`);

--
-- Индексы таблицы `patent_kunena_polls`
--
ALTER TABLE `patent_kunena_polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `threadid` (`threadid`);

--
-- Индексы таблицы `patent_kunena_polls_options`
--
ALTER TABLE `patent_kunena_polls_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pollid` (`pollid`);

--
-- Индексы таблицы `patent_kunena_polls_users`
--
ALTER TABLE `patent_kunena_polls_users`
  ADD UNIQUE KEY `pollid` (`pollid`,`userid`);

--
-- Индексы таблицы `patent_kunena_ranks`
--
ALTER TABLE `patent_kunena_ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Индексы таблицы `patent_kunena_sessions`
--
ALTER TABLE `patent_kunena_sessions`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `currvisit` (`currvisit`);

--
-- Индексы таблицы `patent_kunena_smileys`
--
ALTER TABLE `patent_kunena_smileys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_kunena_thankyou`
--
ALTER TABLE `patent_kunena_thankyou`
  ADD UNIQUE KEY `postid` (`postid`,`userid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `targetuserid` (`targetuserid`);

--
-- Индексы таблицы `patent_kunena_topics`
--
ALTER TABLE `patent_kunena_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `locked` (`locked`),
  ADD KEY `hold` (`hold`),
  ADD KEY `posts` (`posts`),
  ADD KEY `hits` (`hits`),
  ADD KEY `first_post_userid` (`first_post_userid`),
  ADD KEY `last_post_userid` (`last_post_userid`),
  ADD KEY `first_post_time` (`first_post_time`),
  ADD KEY `last_post_time` (`last_post_time`),
  ADD KEY `last_post_id` (`last_post_id`);

--
-- Индексы таблицы `patent_kunena_users`
--
ALTER TABLE `patent_kunena_users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `posts` (`posts`),
  ADD KEY `uhits` (`uhits`),
  ADD KEY `banned` (`banned`),
  ADD KEY `moderator` (`moderator`);

--
-- Индексы таблицы `patent_kunena_users_banned`
--
ALTER TABLE `patent_kunena_users_banned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `ip` (`ip`),
  ADD KEY `expiration` (`expiration`),
  ADD KEY `created_time` (`created_time`);

--
-- Индексы таблицы `patent_kunena_user_categories`
--
ALTER TABLE `patent_kunena_user_categories`
  ADD PRIMARY KEY (`user_id`,`category_id`),
  ADD KEY `category_subscribed` (`category_id`,`subscribed`),
  ADD KEY `role` (`role`);

--
-- Индексы таблицы `patent_kunena_user_read`
--
ALTER TABLE `patent_kunena_user_read`
  ADD UNIQUE KEY `user_topic_id` (`user_id`,`topic_id`),
  ADD KEY `category_user_id` (`category_id`,`user_id`),
  ADD KEY `time` (`time`);

--
-- Индексы таблицы `patent_kunena_user_topics`
--
ALTER TABLE `patent_kunena_user_topics`
  ADD UNIQUE KEY `user_topic_id` (`user_id`,`topic_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `posts` (`posts`),
  ADD KEY `owner` (`owner`),
  ADD KEY `favorite` (`favorite`),
  ADD KEY `subscribed` (`subscribed`);

--
-- Индексы таблицы `patent_kunena_version`
--
ALTER TABLE `patent_kunena_version`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_languages`
--
ALTER TABLE `patent_languages`
  ADD PRIMARY KEY (`lang_id`),
  ADD UNIQUE KEY `idx_sef` (`sef`),
  ADD UNIQUE KEY `idx_image` (`image`),
  ADD UNIQUE KEY `idx_langcode` (`lang_code`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_ordering` (`ordering`);

--
-- Индексы таблицы `patent_menu`
--
ALTER TABLE `patent_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`,`language`),
  ADD KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  ADD KEY `idx_menutype` (`menutype`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`),
  ADD KEY `idx_path` (`path`(255)),
  ADD KEY `idx_language` (`language`);

--
-- Индексы таблицы `patent_menu_types`
--
ALTER TABLE `patent_menu_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_menutype` (`menutype`);

--
-- Индексы таблицы `patent_messages`
--
ALTER TABLE `patent_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `useridto_state` (`user_id_to`,`state`);

--
-- Индексы таблицы `patent_messages_cfg`
--
ALTER TABLE `patent_messages_cfg`
  ADD UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`);

--
-- Индексы таблицы `patent_modules`
--
ALTER TABLE `patent_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `published` (`published`,`access`),
  ADD KEY `newsfeeds` (`module`,`published`),
  ADD KEY `idx_language` (`language`);

--
-- Индексы таблицы `patent_modules_menu`
--
ALTER TABLE `patent_modules_menu`
  ADD PRIMARY KEY (`moduleid`,`menuid`);

--
-- Индексы таблицы `patent_newsfeeds`
--
ALTER TABLE `patent_newsfeeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Индексы таблицы `patent_overrider`
--
ALTER TABLE `patent_overrider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `patent_redirect_links`
--
ALTER TABLE `patent_redirect_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_link_old` (`old_url`),
  ADD KEY `idx_link_modifed` (`modified_date`);

--
-- Индексы таблицы `patent_schemas`
--
ALTER TABLE `patent_schemas`
  ADD PRIMARY KEY (`extension_id`,`version_id`);

--
-- Индексы таблицы `patent_session`
--
ALTER TABLE `patent_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `whosonline` (`guest`,`usertype`),
  ADD KEY `userid` (`userid`),
  ADD KEY `time` (`time`);

--
-- Индексы таблицы `patent_template_styles`
--
ALTER TABLE `patent_template_styles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_template` (`template`),
  ADD KEY `idx_home` (`home`);

--
-- Индексы таблицы `patent_updates`
--
ALTER TABLE `patent_updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Индексы таблицы `patent_update_categories`
--
ALTER TABLE `patent_update_categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Индексы таблицы `patent_update_sites`
--
ALTER TABLE `patent_update_sites`
  ADD PRIMARY KEY (`update_site_id`);

--
-- Индексы таблицы `patent_update_sites_extensions`
--
ALTER TABLE `patent_update_sites_extensions`
  ADD PRIMARY KEY (`update_site_id`,`extension_id`);

--
-- Индексы таблицы `patent_usergroups`
--
ALTER TABLE `patent_usergroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  ADD KEY `idx_usergroup_title_lookup` (`title`),
  ADD KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  ADD KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`) USING BTREE;

--
-- Индексы таблицы `patent_users`
--
ALTER TABLE `patent_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_block` (`block`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Индексы таблицы `patent_user_notes`
--
ALTER TABLE `patent_user_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_category_id` (`catid`);

--
-- Индексы таблицы `patent_user_profiles`
--
ALTER TABLE `patent_user_profiles`
  ADD UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`);

--
-- Индексы таблицы `patent_user_usergroup_map`
--
ALTER TABLE `patent_user_usergroup_map`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Индексы таблицы `patent_viewlevels`
--
ALTER TABLE `patent_viewlevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_assetgroup_title_lookup` (`title`);

--
-- Индексы таблицы `patent_weblinks`
--
ALTER TABLE `patent_weblinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Индексы таблицы `patent_yandex_maps_categories`
--
ALTER TABLE `patent_yandex_maps_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lat` (`lat`),
  ADD KEY `lan` (`lan`),
  ADD KEY `active` (`active`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `create_by` (`create_by`);

--
-- Индексы таблицы `patent_yandex_maps_category_to_map`
--
ALTER TABLE `patent_yandex_maps_category_to_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`map_id`);

--
-- Индексы таблицы `patent_yandex_maps_maps`
--
ALTER TABLE `patent_yandex_maps_maps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `create_by` (`create_by`);

--
-- Индексы таблицы `patent_yandex_maps_objects`
--
ALTER TABLE `patent_yandex_maps_objects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lat` (`lat`),
  ADD KEY `lan` (`lan`),
  ADD KEY `active` (`active`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `create_by` (`create_by`),
  ADD KEY `publish_up` (`publish_up`),
  ADD KEY `publish_down` (`publish_down`);

--
-- Индексы таблицы `patent_yandex_maps_object_to_category`
--
ALTER TABLE `patent_yandex_maps_object_to_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_id` (`object_id`,`category_id`);

--
-- Индексы таблицы `patent_yandex_maps_organizations`
--
ALTER TABLE `patent_yandex_maps_organizations`
  ADD PRIMARY KEY (`organization_object_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `patent_assets`
--
ALTER TABLE `patent_assets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `patent_banners`
--
ALTER TABLE `patent_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_banner_clients`
--
ALTER TABLE `patent_banner_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_categories`
--
ALTER TABLE `patent_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `patent_contact_details`
--
ALTER TABLE `patent_contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_content`
--
ALTER TABLE `patent_content`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_extensions`
--
ALTER TABLE `patent_extensions`
  MODIFY `extension_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10012;
--
-- AUTO_INCREMENT для таблицы `patent_finder_filters`
--
ALTER TABLE `patent_finder_filters`
  MODIFY `filter_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_finder_links`
--
ALTER TABLE `patent_finder_links`
  MODIFY `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_finder_taxonomy`
--
ALTER TABLE `patent_finder_taxonomy`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `patent_finder_terms`
--
ALTER TABLE `patent_finder_terms`
  MODIFY `term_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_finder_types`
--
ALTER TABLE `patent_finder_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_jtmb_attachment`
--
ALTER TABLE `patent_jtmb_attachment`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_jtmb_categories`
--
ALTER TABLE `patent_jtmb_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `patent_jtmb_custom_fields`
--
ALTER TABLE `patent_jtmb_custom_fields`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_jtmb_gallery_images`
--
ALTER TABLE `patent_jtmb_gallery_images`
  MODIFY `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `patent_jtmb_members_directory`
--
ALTER TABLE `patent_jtmb_members_directory`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_announcement`
--
ALTER TABLE `patent_kunena_announcement`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_attachments`
--
ALTER TABLE `patent_kunena_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_categories`
--
ALTER TABLE `patent_kunena_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_keywords`
--
ALTER TABLE `patent_kunena_keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_messages`
--
ALTER TABLE `patent_kunena_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_polls`
--
ALTER TABLE `patent_kunena_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_polls_options`
--
ALTER TABLE `patent_kunena_polls_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_ranks`
--
ALTER TABLE `patent_kunena_ranks`
  MODIFY `rank_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_smileys`
--
ALTER TABLE `patent_kunena_smileys`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_topics`
--
ALTER TABLE `patent_kunena_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_users_banned`
--
ALTER TABLE `patent_kunena_users_banned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_kunena_version`
--
ALTER TABLE `patent_kunena_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `patent_languages`
--
ALTER TABLE `patent_languages`
  MODIFY `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `patent_menu`
--
ALTER TABLE `patent_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT для таблицы `patent_menu_types`
--
ALTER TABLE `patent_menu_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `patent_messages`
--
ALTER TABLE `patent_messages`
  MODIFY `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_modules`
--
ALTER TABLE `patent_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT для таблицы `patent_newsfeeds`
--
ALTER TABLE `patent_newsfeeds`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_overrider`
--
ALTER TABLE `patent_overrider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';
--
-- AUTO_INCREMENT для таблицы `patent_redirect_links`
--
ALTER TABLE `patent_redirect_links`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_template_styles`
--
ALTER TABLE `patent_template_styles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `patent_updates`
--
ALTER TABLE `patent_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT для таблицы `patent_update_categories`
--
ALTER TABLE `patent_update_categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_update_sites`
--
ALTER TABLE `patent_update_sites`
  MODIFY `update_site_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `patent_usergroups`
--
ALTER TABLE `patent_usergroups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `patent_users`
--
ALTER TABLE `patent_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=783;
--
-- AUTO_INCREMENT для таблицы `patent_user_notes`
--
ALTER TABLE `patent_user_notes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_viewlevels`
--
ALTER TABLE `patent_viewlevels`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `patent_weblinks`
--
ALTER TABLE `patent_weblinks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_yandex_maps_categories`
--
ALTER TABLE `patent_yandex_maps_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT для таблицы `patent_yandex_maps_category_to_map`
--
ALTER TABLE `patent_yandex_maps_category_to_map`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patent_yandex_maps_maps`
--
ALTER TABLE `patent_yandex_maps_maps`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT для таблицы `patent_yandex_maps_objects`
--
ALTER TABLE `patent_yandex_maps_objects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- AUTO_INCREMENT для таблицы `patent_yandex_maps_object_to_category`
--
ALTER TABLE `patent_yandex_maps_object_to_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
