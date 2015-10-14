<?php

	$mysqli->query("CREATE TABLE IF NOT EXISTS `friends` (
	  `id` int(10) NOT NULL AUTO_INCREMENT,
	  `hunter` varchar(50) NOT NULL,
	  `target` varchar(50) NOT NULL,
	  `status` int(1) NOT NULL DEFAULT 1,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci AUTO_INCREMENT=1");
	
	$mysqli->query("CREATE TABLE IF NOT EXISTS `player` (
	  `id` int(10) NOT NULL AUTO_INCREMENT,
	  `use_player` int(1) NOT NULL DEFAULT '0',
	  `player_status` int(1) NOT NULL DEFAULT '1',
	  `player_url` varchar(200) NOT NULL DEFAULT '',
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci AUTO_INCREMENT=1");

	
	$mysqli->query("ALTER TABLE setting ADD allow_friend int(1) NOT NULL DEFAULT '1'");
	$mysqli->query("ALTER TABLE setting ADD allow_ignore int(1) NOT NULL DEFAULT '1'");
	$mysqli->query("ALTER TABLE setting ADD allow_username int(1) NOT NULL DEFAULT '2'");
	$mysqli->query("ALTER TABLE setting ADD custom_count int(1) NOT NULL DEFAULT '0'");
	$mysqli->query("ALTER TABLE setting ADD custom1 varchar(50) NOT NULL DEFAULT 'Custom1'");
	$mysqli->query("ALTER TABLE setting ADD custom2 varchar(50) NOT NULL DEFAULT 'Custom2'");
	
	$mysqli->query("ALTER TABLE users ADD custom1 varchar(150) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD custom2 varchar(150) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD old_name varchar(30) NOT NULL DEFAULT 'e'");
	$mysqli->query("ALTER TABLE users ADD session_id int(10) NOT NULL DEFAULT '1'");
	$mysqli->query("ALTER TABLE users ADD facebook varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD twitter varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD pinterest varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD google varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD youtube varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD instagram varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD linkedin varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD tumblr varchar(120) NOT NULL DEFAULT ''");
	$mysqli->query("ALTER TABLE users ADD flickr varchar(120) NOT NULL DEFAULT ''");
	
	
	$mysqli->query("UPDATE setting SET version = '60' WHERE id = 1");
	
	$mysqli->query("INSERT INTO `player` (id) VALUES ('1')");

?>