<?php	

ini_set('error_reporting', E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

parse_str(implode('&', array_slice($argv, 1)), $params);
$channel = strval($params["channel"]);

$data = file_get_contents("data.json");
$videos = json_decode($data, true);
$video_ids = array();

foreach($videos['data'] as $video){
	if(isset($video['id'])){
		$video_ids[] = $video['id'];
	}
}

if($channel=="0"){
	
	$xml = simplexml_load_file("https://www.youtube.com/feeds/videos.xml?channel_id=UCBa659QWEk1AI4Tg--mrJ2A");
	$output = "";
	foreach ($xml->entry as $entry) {
		if(!in_array(str_replace("yt:video:","",$entry->id), $video_ids)){
			$output = $output . '{"id":"'.str_replace("yt:video:","",$entry->id).'", "title":"'.str_replace("\"","\\\"", str_replace("\\","\\\\", $entry->title[0])).'", "lat":"", "long":"", "category":"", "comment":"", "status":"open", "internal_comment":""},'."\n";
		}
	}
	echo substr($output,0,strlen($output)-1);
	
}else if($channel=="1"){

	$xml = simplexml_load_file("https://www.youtube.com/feeds/videos.xml?channel_id=UCRUULstZRWS1lDvJBzHnkXA");
	$output = "";
	foreach ($xml->entry as $entry) {
		if(!in_array(str_replace("yt:video:","",$entry->id), $video_ids)){
			$output = $output . '{"id":"'.str_replace("yt:video:","",$entry->id).'", "title":"'.str_replace("\"","\\\"", str_replace("\\","\\\\", $entry->title[0])).'", "lat":"", "long":"", "category":"ParkBench", "comment":"", "status":"open", "internal_comment":""},'."\n";
		}
	}
	echo substr($output,0,strlen($output)-1);
}else if($channel=="2"){
	
	$xml = simplexml_load_file("https://www.youtube.com/feeds/videos.xml?channel_id=UCHC4G4X-OR5WkY-IquRGa3Q");
	$output = "";
	foreach ($xml->entry as $entry) {
		if(!in_array(str_replace("yt:video:","",$entry->id), $video_ids)){
			$output = $output . '{"id":"'.str_replace("yt:video:","",$entry->id).'", "title":"'.str_replace("\"","\\\"", str_replace("\\","\\\\", $entry->title[0])).'", "lat":"", "long":"", "category":"Plus", "comment":"", "status":"open", "internal_comment":""},'."\n";
		}
	}
	echo substr($output,0,strlen($output)-1);

}else if($channel=="3"){
	
	$xml = simplexml_load_file("https://www.youtube.com/feeds/videos.xml?channel_id=UCO-zhhas4n_kAPHaeLe1qnQ");
	$output = "";
	foreach ($xml->entry as $entry) {
		if(!in_array(str_replace("yt:video:","",$entry->id), $video_ids)){
			$output = $output . '{"id":"'.str_replace("yt:video:","",$entry->id).'", "title":"'.str_replace("\"","\\\"", str_replace("\\","\\\\", $entry->title[0])).'", "lat":"", "long":"", "category":"TechDif", "comment":"", "status":"open", "internal_comment":""},'."\n";
		}
	}
	echo substr($output,0,strlen($output)-1);

}
	
	//{"data":[
	//{"comment":"//Videos from Matt and Toms Channel"},
	//{"comment":"//Videos from Tom's second channel: Tom Scott plus"},

	//not yet: {"comment":"//Videos from the Technical Difficulties channel"},
