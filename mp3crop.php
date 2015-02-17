<?php
set_time_limit(0);
ini_set('display_errors',true);

include 'php/logged.php';
include 'php/db.php';
require 'getID3/getid3.php';

$url = urldecode($_GET['url']);
//echo $url;
$sql = mysql_query("SELECT * FROM mp3hash WHERE url LIKE '$url' LIMIT 1");
if( mysql_num_rows($sql) == 0 ) {
	$md5 = md5( $_SESSION['id']."mp3".time() );
	$path = dirname(__FILE__).'/mp3/'.$md5.'.mp3';
	$fp = fopen ($path, 'w+');
	$ch = curl_init(str_replace(" ","%20",$url));
	curl_setopt($ch, CURLOPT_TIMEOUT, 50);
	curl_setopt($ch, CURLOPT_FILE, $fp); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_exec($ch); 
	curl_close($ch);
	fclose($fp);
	$name = $md5.'.mp3';
	$sql = mysql_query("INSERT INTO mp3hash(url, mp3) VALUES('$url', '$name') ");
}
else {
	$info = mysql_fetch_array($sql);
	$path = dirname(__FILE__).'/mp3/'.$info['mp3'];
}
	

//echo $path;
$getID3 = new getID3();  
  
$id3_info = $getID3->analyze($path);  
//print_r($id3_info);

$time = $id3_info['playtime_seconds'];
  
//$preview = $time / 30; // Preview time of 30 seconds  

$handle = fopen($path, 'r');  
$content = fread($handle, filesize($path));  

$length = $id3_info['filesize'] - $id3_info['id3v2']['padding']['start'];
$bitrate = ($length/(1024*$time))*8;
$seek = $_GET['seek'];

$bps = $length / $time;

//echo $length;
//echo "\n\nBitrate: ".$bitrate;
//echo "Echo: ".-1*$bitrate/8*$seek;
  //  $length = round(strlen($content) / $preview);  
$content = substr($content, $id3_info['id3v2']['padding']['start'] + $seek*$bps, $length);  

$length -= $id3_info['id3v2']['padding']['start'] + $seek*$bps;   
  
// echo $length." STart: ".$id3_info['id3v2']['padding']['start'];
header("Content-Type: {$id3_info['mime_type']}");  
header("Content-Length: $length");  
print $content; 
 
?>