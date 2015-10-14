-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 26 Août 2015 à 20:37
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `boomchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `addons`
--

CREATE TABLE IF NOT EXISTS `addons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `banned`
--

CREATE TABLE IF NOT EXISTS `banned` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `post_date` int(10) NOT NULL,
  `post_time` varchar(6) NOT NULL,
  `post_user` varchar(16) NOT NULL,
  `post_message` text NOT NULL,
  `post_color` varchar(12) NOT NULL,
  `post_roomid` int(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `post_target` varchar(16) NOT NULL,
  `avatar` varchar(40) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `filter`
--

CREATE TABLE IF NOT EXISTS `filter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hunter` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `use_player` int(1) NOT NULL DEFAULT '0',
  `player_status` int(1) NOT NULL DEFAULT '1',
  `player_url` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `player`
--

INSERT INTO `player` (`id`, `use_player`, `player_status`, `player_url`) VALUES
(1, 0, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `private`
--

CREATE TABLE IF NOT EXISTS `private` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` int(13) NOT NULL,
  `message` text NOT NULL,
  `hunter` varchar(20) NOT NULL,
  `target` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `target_color` varchar(20) NOT NULL,
  `hunter_color` varchar(20) NOT NULL,
  `view` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(40) NOT NULL,
  `hunter_guest` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `private`
--

INSERT INTO `private` (`id`, `time`, `message`, `hunter`, `target`, `status`, `target_color`, `hunter_color`, `view`, `avatar`, `hunter_guest`) VALUES
(1, 1440620904, 'Thank you for purchasing Boomchat.', 'System', 'Boomchat', 0, 'user', 'system', 0, 'default_system_tumb.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(40) NOT NULL,
  `topic` text NOT NULL,
  `access` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `topic`, `access`) VALUES
(1, 'Main', 'You can view user manual by typing /manual or change that topic by typing /topic', 1);

-- --------------------------------------------------------

--
-- Structure de la table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT 'Boomchat',
  `registration` int(1) NOT NULL DEFAULT '1',
  `maintenance` int(1) NOT NULL DEFAULT '1',
  `flood_delay` int(4) NOT NULL DEFAULT '300',
  `mute_delay` int(10) NOT NULL DEFAULT '86400',
  `away` int(6) NOT NULL DEFAULT '900',
  `gone` int(10) NOT NULL DEFAULT '86400',
  `default_theme` varchar(15) NOT NULL DEFAULT 'Premium',
  `allow_theme` int(1) NOT NULL DEFAULT '0',
  `allow_link` int(1) NOT NULL DEFAULT '0',
  `chat_history` int(3) NOT NULL DEFAULT '20',
  `log_history` int(4) NOT NULL DEFAULT '100',
  `data_delete` int(2) NOT NULL DEFAULT '1',
  `max_password` int(2) NOT NULL DEFAULT '30',
  `max_username` int(2) NOT NULL DEFAULT '16',
  `max_message` int(3) NOT NULL DEFAULT '300',
  `max_avatar` int(4) NOT NULL DEFAULT '200',
  `hosting` int(1) NOT NULL DEFAULT '1',
  `max_host` int(11) NOT NULL DEFAULT '5',
  `file_weight` int(5) NOT NULL DEFAULT '2',
  `domain` varchar(100) NOT NULL DEFAULT 'yourdomainhere.net',
  `emoticon` int(1) NOT NULL DEFAULT '1',
  `allow_private` int(1) NOT NULL DEFAULT '1',
  `allow_history` int(1) NOT NULL DEFAULT '1',
  `allow_image` int(1) NOT NULL DEFAULT '4',
  `version` int(1) NOT NULL DEFAULT '5',
  `language` varchar(20) NOT NULL DEFAULT 'English',
  `ads_delay` int(3) NOT NULL DEFAULT '30',
  `ads_time` int(10) NOT NULL DEFAULT '0',
  `ads_count` int(1) NOT NULL DEFAULT '1',
  `ads_stop` int(1) NOT NULL DEFAULT '0',
  `allow_ads` int(1) NOT NULL DEFAULT '0',
  `ads_select` int(1) NOT NULL DEFAULT '1',
  `orientation` int(1) NOT NULL DEFAULT '1',
  `welcome` int(1) NOT NULL DEFAULT '0',
  `guest` int(8) NOT NULL DEFAULT '1',
  `allow_guest` int(1) NOT NULL DEFAULT '0',
  `guest_chat` int(1) NOT NULL DEFAULT '0',
  `guest_clear` int(8) NOT NULL DEFAULT '3600',
  `activation` int(1) NOT NULL DEFAULT '0',
  `cookie_ban` int(1) NOT NULL DEFAULT '0',
  `allow_email` int(1) NOT NULL DEFAULT '1',
  `chat_speed` int(1) NOT NULL DEFAULT '2',
  `global_sound` int(1) NOT NULL DEFAULT '1',
  `silent_mode` int(1) NOT NULL DEFAULT '0',
  `show_topic` int(1) NOT NULL DEFAULT '1',
  `private_style` int(1) NOT NULL DEFAULT '1',
  `welcome_login_title` varchar(40) NOT NULL DEFAULT 'Chat news',
  `timezone` varchar(60) NOT NULL DEFAULT 'America/Montreal',
  `welcome_login` varchar(300) NOT NULL DEFAULT 'Welcome to Boomchat you can change this message in your setting panel.',
  `welcome_chat` varchar(500) NOT NULL DEFAULT 'Welcome new member please be respectfull with other users and keep conversation clean enjoy your chat.',
  `min_age` int(2) NOT NULL DEFAULT '14',
  `full_width` int(1) NOT NULL DEFAULT '0',
  `show_avatar` int(1) NOT NULL DEFAULT '1',
  `full_form` int(1) NOT NULL DEFAULT '0',
  `rules` int(1) NOT NULL DEFAULT '0',
  `allow_logs` int(1) NOT NULL DEFAULT '1',
  `full_sound` int(1) NOT NULL DEFAULT '0',
  `rtl` int(1) NOT NULL DEFAULT '0',
  `allow_colors` int(1) NOT NULL DEFAULT '1',
  `allow_avatar` int(1) NOT NULL DEFAULT '1',
  `allow_friend` int(1) NOT NULL DEFAULT '1',
  `allow_ignore` int(1) NOT NULL DEFAULT '1',
  `allow_username` int(1) NOT NULL DEFAULT '2',
  `custom_count` int(1) NOT NULL DEFAULT '0',
  `custom1` varchar(100) NOT NULL DEFAULT 'Custom1',
  `custom2` varchar(100) NOT NULL DEFAULT 'Custom2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `setting`
--

INSERT INTO `setting` (`id`, `title`, `registration`, `maintenance`, `flood_delay`, `mute_delay`, `away`, `gone`, `default_theme`, `allow_theme`, `allow_link`, `chat_history`, `log_history`, `data_delete`, `max_password`, `max_username`, `max_message`, `max_avatar`, `hosting`, `max_host`, `file_weight`, `domain`, `emoticon`, `allow_private`, `allow_history`, `allow_image`, `version`, `language`, `ads_delay`, `ads_time`, `ads_count`, `ads_stop`, `allow_ads`, `ads_select`, `orientation`, `welcome`, `guest`, `allow_guest`, `guest_chat`, `guest_clear`, `activation`, `cookie_ban`, `allow_email`, `chat_speed`, `global_sound`, `silent_mode`, `show_topic`, `private_style`, `welcome_login_title`, `timezone`, `welcome_login`, `welcome_chat`, `min_age`, `full_width`, `show_avatar`, `full_form`, `rules`, `allow_logs`, `full_sound`, `rtl`, `allow_colors`, `allow_avatar`, `allow_friend`, `allow_ignore`, `allow_username`, `custom_count`, `custom1`, `custom2`) VALUES
(1, 'Boomchat', 1, 1, 300, 86400, 900, 86400, 'Gray', 0, 0, 20, 100, 1, 30, 16, 300, 200, 1, 5, 2, 'yourdomainhere.net', 1, 1, 1, 4, 5, 'English', 30, 0, 1, 0, 0, 1, 1, 0, 1, 0, 0, 3600, 0, 0, 1, 2, 1, 0, 1, 1, 'Chat news', 'America/Montreal', 'Welcome to Boomchat you can change this message in your setting panel.', 'Welcome new member please be respectfull with other users and keep conversation clean enjoy your chat.', 14, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 2, 0, 'Custom1', 'Custom2');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id`, `name`) VALUES
(1, 'Blue'),
(2, 'Corporate'),
(3, 'Default'),
(4, 'Dark'),
(5, 'Fancy_gold'),
(6, 'Gray'),
(7, 'Lite'),
(8, 'Lite_blue'),
(9, 'Midnight_cherry'),
(10, 'Pinky_winky'),
(11, 'Red');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(16) NOT NULL,
  `old_name` varchar(30) NOT NULL DEFAULT 'e',
  `user_password` varchar(60) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  `user_ip` varchar(30) NOT NULL,
  `user_join` int(12) NOT NULL,
  `last_action` int(10) NOT NULL,
  `last_message` varchar(500) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '1',
  `user_action` int(1) NOT NULL DEFAULT '1',
  `user_color` varchar(10) NOT NULL DEFAULT 'user',
  `user_rank` int(1) NOT NULL DEFAULT '1',
  `user_access` int(1) NOT NULL DEFAULT '4',
  `user_roomid` int(6) NOT NULL DEFAULT '1',
  `user_kick` text NOT NULL,
  `user_mute` varchar(16) NOT NULL,
  `mute_time` int(12) NOT NULL,
  `user_flood` int(1) NOT NULL,
  `user_theme` varchar(16) NOT NULL DEFAULT 'Default',
  `user_sex` int(1) NOT NULL DEFAULT '0',
  `user_age` int(2) NOT NULL DEFAULT '0',
  `user_description` text NOT NULL,
  `user_avatar` varchar(50) NOT NULL DEFAULT 'default_avatar.png',
  `alt_name` varchar(100) NOT NULL,
  `upload_count` int(11) NOT NULL DEFAULT '0',
  `upload_access` int(11) NOT NULL DEFAULT '1',
  `user_sound` int(1) NOT NULL DEFAULT '2',
  `temp_pass` varchar(40) NOT NULL DEFAULT '0',
  `temp_time` int(10) NOT NULL DEFAULT '0',
  `user_tumb` varchar(100) NOT NULL DEFAULT 'default_avatar_tumb.png',
  `guest` int(1) NOT NULL DEFAULT '0',
  `verified` int(1) NOT NULL DEFAULT '1',
  `valid_key` varchar(64) NOT NULL,
  `user_ignore` text NOT NULL,
  `first_check` int(10) NOT NULL DEFAULT '0',
  `join_chat` int(10) NOT NULL DEFAULT '0',
  `email_count` int(1) NOT NULL DEFAULT '0',
  `user_friends` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `count` int(10) NOT NULL DEFAULT '0',
  `custom1` varchar(250) NOT NULL DEFAULT '',
  `custom2` varchar(250) NOT NULL DEFAULT '',
  `session_id` int(10) NOT NULL DEFAULT '1',
  `facebook` varchar(120) NOT NULL DEFAULT '',
  `twitter` varchar(120) NOT NULL DEFAULT '',
  `pinterest` varchar(120) NOT NULL DEFAULT '',
  `google` varchar(120) NOT NULL DEFAULT '',
  `youtube` varchar(120) NOT NULL DEFAULT '',
  `instagram` varchar(120) NOT NULL DEFAULT '',
  `linkedin` varchar(120) NOT NULL DEFAULT '',
  `tumblr` varchar(120) NOT NULL DEFAULT '',
  `flickr` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
