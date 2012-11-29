<?php

class Application_Model_Videos
{
	public function getLast($page = 1)
	{
		$table_videos = new Application_Model_DbTable_Videos();
		
		$select = $table_videos->select()
					->where('status = ?','O')
					->order('id DESC')
					->limit(12);
		$query = $select->query();
		$rowset = $query->fetchAll();
		return $rowset;
	}
	
	public function newVideo($video_data)
	{
		$table_videos = new Application_Model_DbTable_Videos();
		
		$table_videos->insert($video_data);	
	}
	
	public function getDailyMotionInfo($videourl)
	{
		$daily_query = "http://www.dailymotion.com/services/oembed?format=json&url=" . urlencode($videourl);
		$get = file_get_contents($daily_query);
		
	}
	
	public function getYoutubeInfo($videourl)
	{
		parse_str(parse_url($videourl, PHP_URL_QUERY), $url_parts);
		$get = file_get_contents("https://gdata.youtube.com/feeds/api/videos/" . $url_parts['v']);
		$ytid= $url_parts['v']; // YouTube Id
		$url = "http://gdata.youtube.com/feeds/api/videos/". $ytid;
		$doc = new DOMDocument;
		$doc->load($url);
		
		$title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
		$description = $doc->getElementsByTagName("description")->item(0)->nodeValue;
		$published = $doc->getElementsByTagName("published")->item(0)->nodeValue;
		$updated = $doc->getElementsByTagName("updated")->item(0)->nodeValue;
		$thumbnail = 'http://img.youtube.com/vi/'.$ytid.'/hqdefault.jpg';
		$video_json = array();
		$video_json['title'] = $title;
		$video_json['description'] = $description;
		$video_json['thumb'] = $thumbnail;
		$video_json['id'] = $ytid;
		$video_json['embed_code'] = '<iframe width="350" height="197" src="http://www.youtube.com/embed/' . $ytid . '" frameborder="0" allowfullscreen></iframe>';
		$json_response = json_encode($video_json);
		return $json_response;
	}
}