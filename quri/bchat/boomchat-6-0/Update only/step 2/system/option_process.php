<?php
/**
* Boomchat
*
* @package Boomchat
* @author www.myboomchat.com
* @copyright 2015
* @terms any use of this script without a legal license is prohibited
* all the content of Boomchat is the propriety of BoomCoding and Cannot be 
* used for another project.
*/
$load_setting = 'timezone, allow_theme, default_theme, language';
$load_user = 'user_name, user_theme, user_rank, user_access, user_ignore, user_roomid, user_id';
require_once("config_lite.php");
require_once("content_process.php");
	
	$name = $user['user_name'];
	$room = $user['user_roomid'];
	$user_id = $user["user_id"];
	$post_time = date("H:i", $time);
	$set_ignore = $mysqli->real_escape_string(trim($_GET['option']));
	
	if($user['user_rank'] >= 3 && $user['user_access'] > 3 &&  $set_ignore !== "get_ignore" && $set_ignore !== "get_friends"){
	
		if(isset($_GET['option']) && isset($_GET['target'])){
		
			$option = $mysqli->real_escape_string(trim($_GET['option']));
			$user_target = $mysqli->real_escape_string(trim($_GET['target']));
			
			$findtarget = $mysqli->query("SELECT `user_rank`, `user_mute`, `user_ip`, `user_tumb`, `user_avatar` FROM `users` WHERE `user_name` = '$user_target'");
			
			if ($findtarget->num_rows > 0){
				
				$target = $findtarget->fetch_array(MYSQLI_BOTH);
				$target_rank = $target['user_rank'];
				$target_mute = $target['user_mute'];
				$target_ip = $target['user_ip'];
				
			
				if($option == "get_mute"){
				
						if($user['user_rank'] > $target_rank){
						
							if ($target_mute == ''){
							
								$mutenotice = "$user_target $msgmute $name";
								$mysqli->query("UPDATE `users` SET `user_access` = 1, `user_mute` = '$name', `mute_time` = '$time' WHERE `user_name` = '$user_target'");
								$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$mutenotice', $room, 'bold', 'system', 'default_system_tumb.png')");
								echo 1;
							}
							else{
								echo 1;
							}
						}
						else{
							echo 1;
						}	
				}
				
				
				if($option == "get_unmute"){
					
					if($name == $target_mute || $target_mute == "" || $target_mute == 'flood' || $user['user_rank'] > 3){
						$unmutenotice = "$user_target $msgunmute $name";
						$mysqli->query("UPDATE `users` SET `user_access` = 4, `mute_time` = '', `user_mute` = '', `user_flood` = '0' WHERE `user_name` = '$user_target'");
						$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$unmutenotice', $room, 'bold', 'system', 'default_system_tumb.png')");

						echo 1;
					}
					else{
						echo 1;
					}
				}
				elseif($option == "get_ban"){
				
					if ($user['user_rank'] > $target_rank){
						$bannotice = "$user_target $msgban $name";
						$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$bannotice', $room, 'bold', 'system', 'default_system_tumb.png')");
						$mysqli->query("UPDATE `users` SET `user_access` = 0 WHERE `user_name` = '$user_target'");
						$mysqli->query("INSERT INTO `banned` (ip) VALUES ('$target_ip')");
						echo 1;
					}
					else{
						echo 1;
					}
				}
				elseif($option == "get_kick"){
				
					if ($user['user_rank'] > $target_rank){
					
						$displaykick = $quickkick;
								
							$kicknotice = "$user_target $msgkick " . $name . " ( $displaykick )";
							$mysqli->query("UPDATE `users` SET `user_access` = 2, `user_kick` = '$displaykick', `user_status` = '3' WHERE `user_name` = '$user_target'");
							$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$kicknotice', $room, 'csystem', 'system', 'default_system_tumb.png')");
							echo 1;
					}
				}
				elseif($option == "get_kill"){
				
						if($user['user_rank'] > $target_rank && $user['user_rank'] > 4 && $user_target !== $name){
								$kill_notice = "$user_target $msgkill $name";
								$mysqli->query("DELETE FROM `users` WHERE `user_name` = '$user_target' AND `user_ip` = '$target_ip'");
								$mysqli->query("DELETE FROM `chat` WHERE `post_user` = '$user_target'");
								$mysqli->query("DELETE FROM `private` WHERE `hunter` = '$user_target'");
								$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$kill_notice', $room, 'bold', 'system', 'default_system_tumb.png')");
								$path_user_file = "../upload/$user_target";
								if (file_exists($path_user_file)) {
									$clean_user = delete_files($path_user_file);
								}
								
								$tumb = '../avatar/' . $target['user_tumb'];
								$avt = '../avatar/' . $target['user_avatar'];
								if($target['user_avatar'] !== 'default_avatar.png' && file_exists($avt)){
									unlink($avt);
								}
								if($target['user_tumb'] !== 'default_avatar_tumb.png' && file_exists($tumb)){
									unlink($tumb);
								}
								
								echo 1;
						}
						else{
							echo 1;
						}	
				}
				else {
					die();
				}
			}
			else {
				die();
			}
		}
		else {
			echo "error";
		}
		
	}
	elseif ($user['user_rank'] >= 1 && $user['user_access'] == 4 && $set_ignore == "get_ignore"){
	
				$user_target = $mysqli->real_escape_string(trim($_GET['target']));
				$findignore = $mysqli->query("SELECT `user_name`, `user_rank`  FROM `users` WHERE `user_name` = '$user_target'");
				if ($findignore->num_rows > 0){
					$ignored = $findignore->fetch_array(MYSQLI_BOTH);
					if($ignored['user_rank'] < 3){
						$ignore = $user['user_ignore'];
						if(!strpos(strtolower($user['user_ignore']), strtolower(" $user_target "))){
							$ignore = trim($ignore);
							$ignore = " $ignore $user_target ";
							$mysqli->query("UPDATE `users` SET `user_ignore` = '$ignore', `first_check` = '1' WHERE `user_name` = '$name'");
							echo 102;
						}
						else {
							echo 103;
						}
					}
					else {
						echo 1;
					}
				}
				else {
					echo 1;
				}
	
	}	
	elseif ($user['user_rank'] >= 1 && $user['user_access'] == 4 && $set_ignore == "get_friends"){
	
				$user_target = $mysqli->real_escape_string(trim($_GET['target']));
				$ff = $mysqli->query("SELECT user_name, guest  FROM users WHERE user_name = '$user_target'");
				if ($ff->num_rows > 0){
					$tf = $ff->fetch_array(MYSQLI_BOTH);
					$fn = $tf['user_name'];
					if($tf['guest'] !== 1){
					$cf = $mysqli->query("SELECT * FROM friends WHERE target = '$fn' AND hunter = '$name' OR target = '$name' AND hunter = '$fn'");
						if($cf->num_rows < 1){
							$mysqli->query("INSERT INTO friends (hunter, target, status) VALUES ('$name', '$fn', '0')");
							echo 105;
						}
						else {
							echo 104;
						}
					}
					else {
						echo 1;
					}
				}
				else {
					echo 1;
				}
	
	}
	else {
		die();
	}
	
?>