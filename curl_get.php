<?php
	
	
$dnd = "* promodj.com stream.get-tune.net";
if(!is_dir($dir = "xml")) mkdir($dir);

$file = "xml/".urlencode($_GET['song']);

echo $file;

if ( !file_exists($file)) {  
  $ch1 = curl_init();
    curl_setopt( $ch1, CURLOPT_URL, 'http://mp3skull.com/mp3/'.urlencode($_GET['song']).'.html');
    curl_setopt( $ch1, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($ch1);
	file_put_contents($file, $content);
	echo "----> CURL<br>";
}
else {
	$content = file_get_contents($file);
	echo "---> FILE<br>";
}
	
//echo htmlspecialchars($content);
$regex = '|<div style="font-size:15px;"><b>(.*?)</b></div>|si';
preg_match_all($regex, $content, $names);
$count = 0;

foreach ($names[1] as $match) {
        $song_name[$count] = str_replace(' mp3', ' ', $match);
	$count++;
}

$regex = '|<!-- info mp3 here -->(.*?)</div>|si';
preg_match_all($regex, $content, $data);

$count = 0;
foreach ($data[1] as $match) {
    $song_data[$count] = $match;
    echo "<br><br>$match";
    $crypt = explode("<br />", $song_data[$count]);
    print_r($crypt);
    foreach($crypt as $m) {
		if( strpos($m, ":") !== false )
		 {
			$p = strrpos( $m, ":");
				if( ($p-2) < 0 )
					$s = 0;
				else
					$s = $p-2;
				
					echo "--->".$m."--$p";
					$song_dur[$count] = substr($m, $p+1, $p+3) + substr($m, $s , $p)*60;
					echo "Dur: $song_dur[$count]";
					break;
				
		 }
	}
	
	$count++;
}

$regex =  '|<div style="float:left;"><a href="(.*?)" rel="nofollow"|si';
preg_match_all($regex, $content, $href);

$count = 0;
 $mcount = 0;
 
 $pid = ( isset($_GET['pid']) ) ? ($_GET['pid']) : 0;
 $posts = array();
 $mh = curl_multi_init();
 $into = array();
 $ch = array();
 
 echo count($href[1])."<br>";
 
foreach ($href[1] as $match)
{
  $song_href[$count] = $match;
   $parse = str_ireplace('www.', '', parse_url($match, PHP_URL_HOST));
    //echo "Input: ".$parse." --> ".strpos($dnd, $parse)."<br>";
 if( strpos($song_data[$count],':') !== false && strpos($dnd, $parse) == false)
	if( $count >= $pid )
 {	
     $ch[$mcount] = curl_init($song_href[$count]);
     curl_setopt($ch[$mcount], CURLOPT_NOBODY, true);
     curl_setopt($ch[$mcount], CURLOPT_HEADER, true);
	 curl_setopt($ch[$mcount], CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($ch[$mcount], CURLOPT_RETURNTRANSFER,1);
	 curl_setopt($ch[$mcount], CURLOPT_TIMEOUT, 2);
	 curl_setopt($ch[$mcount], CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
	 curl_setopt($ch[$mcount], CURLOPT_CONNECTTIMEOUT , 3);
	 $into[$mcount] = $count;
	 
	 curl_multi_add_handle($mh, $ch[$mcount]);
	 $mcount++;
    echo "Added: ".$count." ".$parse."<br>";

	 if( $mcount >  8 )
		break;
 }
	$count++;
}

    $time_start = microtime(true);
    	 
    $running = null;
    do {
        curl_multi_exec($mh, $running);
    } while ($running);
    
	 $time_end = microtime(true);
     $execution_time = ($time_end - $time_start);

	 array_push($posts, array( 'Total'=> count($href[1]), 'pid'=> $count, 'mcount'=>$mcount) );
		
header('Access-Control-Allow-Origin: *');
for( $i = 0; $i < $mcount; $i++ )
 {
	$info = curl_getinfo($ch[$i]);
	print_r($info); echo "<br><br>";
	if(  ($info['http_code'] == '200' ||  $info['http_code'] == '400') && strpos($info['content_type'],"audio/mpeg") !== false )
		array_push($posts, array( 'song'=> $song_name[$into[$i]], 'href'=> $song_href[$into[$i]], 'data'=>$song_data[$into[$i]], 'dur'=>$song_dur[$into[$i]] ) );
		
 }	

echo json_encode($posts);

?>
