CREATE TABLE IF NOT EXISTS `#__jtmb_objects_directory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `display_last_name` tinyint(4) NOT NULL DEFAULT '1',
  `country` char(2) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `facebook_page` varchar(255) DEFAULT NULL, 
  `twitter_page` varchar(255) DEFAULT NULL,
  `object_profile` text,
  `allow_edit` 	tinyint(4) UNSIGNED NOT NULL DEFAULT '1',
  `hasGallery` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `display_in_frontend` tinyint(3) unsigned NOT NULL DEFAULT '1',
   `deleted_at` int(5) unsigned NOT NULL DEFAULT '0',
   `ordering` int(11) ,
  `Published` int(11) unsigned NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__jtmb_custom_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field_name` varchar(50) NOT NULL,
  `field_label` varchar(50) NOT NULL,
  `display_nr_cf` tinyint(4) NOT NULL DEFAULT '1',
  `allow_edit` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE  TABLE IF NOT EXISTS `#__jtmb_categories` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(100) CHARACTER SET utf8 NOT NULL,
 `description` text CHARACTER SET utf8 NOT NULL,
 `published` tinyint(1) NOT NULL DEFAULT '0',
 `ordering` tinyint(3) NOT NULL,
 `trash` tinyint(1) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__jtmb_gallery_images` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (image_id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE  TABLE IF NOT EXISTS `#__jtmb_assigned_categories` (
 `objectid` int(10) unsigned NOT NULL ,
 `cat_id` int(10) unsigned NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE  TABLE IF NOT EXISTS `#__jtmb_display_options` (
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
 `auto_sync` int(5) unsigned,
 `display_nr_gallery` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE  TABLE IF NOT EXISTS `#__jtmb_custom_maps_objects` (
  `user_id` int(11) NOT NULL,
 `field_label` varchar(50) NOT NULL,
  `field_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__jtmb_object_request` (
  `user_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__jtmb_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

