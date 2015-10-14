$(document).ready(function(){

	// reload room data
	topic_reload();
	user_reload();
	statusReload();
	chat_reload();
	adjustHeight();
	reload_data();
	
	
	//determine elapse time between room data refresh
   
	var userroom = setInterval(showRooms, 60000);
	var reload_topic = setInterval(topic_reload, 180000);
	var userlist = setInterval(user_reload, 10000);
	var privateLog = setInterval(privateReload, 8000);
	var privateList = setInterval(privateOpen, 10000);
	var reloadStatus = setInterval(statusReload, 60000);
	var chatLog = setInterval(chat_reload, 3500);
	var reloadAds = setInterval(adsMargin, 15000);
	var dataReload = setInterval(reload_data, 10000);
	var friendlis = setInterval(reloadFriends, 30000);
   
   
   
});