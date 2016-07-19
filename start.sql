-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg14.eigbox.net
-- Generation Time: Apr 11, 2016 at 08:31 PM
-- Server version: 5.5.44
-- PHP Version: 4.4.9
-- 
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `calendarEvents`
-- 

CREATE TABLE `calendarEvents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `location` text COLLATE utf8_unicode_ci,
  `contact` text COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_start` (`start`),
  KEY `idx_end` (`end`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `calendarEvents`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `chat_rooms`
-- 

CREATE TABLE `chat_rooms` (
  `chat_id` int(32) NOT NULL AUTO_INCREMENT,
  `creator_user_id` int(32) NOT NULL,
  `bgimg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `chat_rooms`
-- 

INSERT INTO `chat_rooms` VALUES (1, 19, 'beginner_room', 'beginner', '2016-03-24 12:11:56');


-- --------------------------------------------------------

-- 
-- Table structure for table `chats_msgs`
-- 

CREATE TABLE `chats_msgs` (
  `msg_id` int(32) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chat_id` int(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `chats_msgs`
-- 

INSERT INTO `chats_msgs` VALUES (1, '1', 'first msg for the beginner_room', 1, '2016-04-10 18:54:53');

-- --------------------------------------------------------

-- 
-- Table structure for table `modal_settings`
-- 

CREATE TABLE `modal_settings` (
  `modal_id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(32) NOT NULL,
  `auto_close` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `classes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wgtBtnObjs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`modal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=244 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `modal_settings`
-- 

INSERT INTO `modal_settings` VALUES (243, 'modImageSelector', '', '', 19, '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `news_and_announcements`
-- 

CREATE TABLE `news_and_announcements` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `image_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  `created_by_user_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `news_and_announcements`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `notes`
-- 

CREATE TABLE `notes` (
  `note_id` int(32) NOT NULL AUTO_INCREMENT,
  `user_id` int(32) NOT NULL,
  `note_title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `note_content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `notes`
-- 

INSERT INTO `notes` VALUES (16, 1, 'first note', 'this is a test note');
INSERT INTO `notes` VALUES (17, 1, 'this is to test multiple notes', 'testing');

-- --------------------------------------------------------

-- 
-- Table structure for table `open_chats`
-- 

CREATE TABLE `open_chats` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `user_id` int(32) NOT NULL,
  `opened_date` date NOT NULL,
  `chat_id` int(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `open_chats`
-- 

INSERT INTO `open_chats` VALUES (1, 1, '2016-03-11', 1);


-- --------------------------------------------------------

-- 
-- Table structure for table `options`
-- 

CREATE TABLE `options` (
  `option_id` int(32) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `option_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='these options are called by the loadOptions class';

-- 
-- Dumping data for table `options`
-- 

INSERT INTO `options` VALUES (1, 'themeInUse', 'freeTheme');
INSERT INTO `options` VALUES (2, 'workspaceTheme', 'longDays');
INSERT INTO `options` VALUES (3, 'appName', 'ADD YOUR OWN ROOT FOLDER NAME');

-- --------------------------------------------------------

-- 
-- Table structure for table `posts`
-- 

CREATE TABLE `posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_category` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `post_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `posts`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `temp_notes`
-- 

CREATE TABLE `temp_notes` (
  `note_id` int(32) NOT NULL AUTO_INCREMENT,
  `widget_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(32) NOT NULL,
  `note_title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `temp_notes`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `user_session`
-- 

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `user_session`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(32) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(10) NOT NULL,
  `opened_widgets` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `users`
-- 


INSERT INTO `users` VALUES (1, 'root', 'bd4338b81a57cb708976d98ea747a0b6bbae55ccf8d48fe61c2a8f7ec16e699d', 'root', 'user', 'Õ?½ú@™õ	]ö¡ç65HE~qF¥–0''#4Ì4', '2015-08-14 17:33:41', 1, '1');


-- --------------------------------------------------------

-- 
-- Table structure for table `widgets_settings`
-- 

CREATE TABLE `widgets_settings` (
  `widget_id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `displayName` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'this will be a prefered display name for the widget',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(32) NOT NULL,
  `auto_close` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `classes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'col-xs-12 col-md-4',
  `wgtBtnObjs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`widget_id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `widgets_settings`
-- 

INSERT INTO `widgets_settings` VALUES (1, 'wgtWelcome', 'Welcome', '0', '0', 0, '0', 'col-xs-12 col-md-12', 'wgtResize wgtExit');
INSERT INTO `widgets_settings` VALUES (2, 'wgtDispArticles', 'Display Articles', '0', '0', 0, '0', 'col-xs-12 col-md-4', 'wgtResize wgtExit');
INSERT INTO `widgets_settings` VALUES (3, 'wgtNotes', 'Show Notes', '0', '0', 0, '0', 'col-xs-12 col-md-4', 'wgtSaveNote wgtResize wgtExit');
INSERT INTO `widgets_settings` VALUES (4, 'wgtFeatured', 'Featured Items', '0', '0', 0, '0', 'col-xs-12 col-md-4', 'wgtResize wgtExit');
INSERT INTO `widgets_settings` VALUES (5, 'wgtCreateWidgetFiles', 'Create New Widget(admin only)', '0', '0', 0, '', 'col-xs-12 col-md-4', 'wgtResize wgtExit');
INSERT INTO `widgets_settings` VALUES (240, 'wgtPosts', 'Create Post', '', '', 0, '', 'col-xs-12 col-md-4', 'wgtResize wgtExit');
INSERT INTO `widgets_settings` VALUES (243, 'wgtCreateEvent', 'Create Events', '', '', 0, '', 'col-xs-12 col-md-4', 'wgtResize wgtExit');
INSERT INTO `widgets_settings` VALUES (246, 'wgtAppOptions', 'App Options', '', '', 0, '', 'col-xs-12 col-md-4', 'wgtResize wgtExit');
