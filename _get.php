<?php
	
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'http://mp3skull.com/mp3/'.urlencode($_GET['song']).'.html');
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($ch);

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

foreach ($href[1] as $match) {
      	$song_href[$count] = $match;
	//echo $song_name[$count]." - ".$match." - ".$song_data[$count]."<br><br>";
		array_push($posts, array( 'song'=> $song_name[$count], 'href'=> $song_href[$count], 'data'=>$song_data[$count] ) );
		$count++;
}

header('Access-Control-Allow-Origin: *');
echo json_encode($posts);

?>
