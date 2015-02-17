<?php
	
	
    $ch1 = curl_init();
    curl_setopt( $ch1, CURLOPT_URL, 'http://mp3skull.com/mp3/'.urlencode($_GET['song']).'.html');
    curl_setopt( $ch1, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($ch1);

	$posts = array();
	$song_name = array();
	$song_href = array();
	$song_data = array();
	$count = 0;
	
//echo htmlspecialchars($content);
$regex = '|<div style="font-size:15px;"><b>(.*?)</b></div>|si';
preg_match_all($regex, $content, $names);

foreach ($names[1] as $match) {
        $song_name[$count] = str_replace(' mp3', ' ', $match);
	$count++;
}

$regex = '|<!-- info mp3 here -->(.*?)</div>|si';
preg_match_all($regex, $content, $data);

$count = 0;
foreach ($data[1] as $match) {
    $song_data[$count] = $match;
	$count++;
}

$regex =  '|<div style="float:left;"><a href="(.*?)" rel="nofollow"|si';
preg_match_all($regex, $content, $href);

$count = 0;
$m_count = 0;

$max_requests = 1;
 
$curl_options = array(
    CURLOPT_SSL_VERIFYPEER => FALSE,
    CURLOPT_SSL_VERIFYHOST => FALSE
);


 $mh = curl_multi_init();
 $ch = array();
 
foreach ($href[1] as $match) {
      	$song_href[$count] = $match;
	
	
	
	 $ch[$count] = curl_init($song_href[$count]);
	 curl_setopt( $ch[$count], CURLOPT_RETURNTRANSFER, true);
	
	 curl_multi_add_handle($mh, $ch[$count]);
	 
	if( $flag == 1 )
	 { 
		 array_push($posts, array( 'song'=> $song_name[$count], 'href'=> $song_href[$count], 'data'=>$song_data[$count] ) );
		 $m_count++;
	 }
	 
	 $time_start = microtime(true);
	 $time_end = microtime(true);
    $execution_time = ($time_end - $time_start);
    
   // echo $song_href[$count]." ---> ".$execution_time."\n\n";
    
	 if( $m_count > 5 )
		break; 
		
	$count++; 
}

    $running = null;
    do {
        curl_multi_exec($mh, $running);
    } while ($running);

for( $i = 0; $i < $count; $i++ )
	echo curl_multi_getcontent($ch[$i])."<br><br>";
//header('Access-Control-Allow-Origin: *');
//echo json_encode($posts);

?>
