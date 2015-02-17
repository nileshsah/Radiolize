<?php
include 'php/logged.php';

    $ch1 = curl_init();
    curl_setopt( $ch1, CURLOPT_URL, 'http://search.mtvnservices.com/typeahead/suggest/?spellcheck.q='.urlencode($_GET['term']).'&callback=jsonpTypeahead&q='.urlencode($_GET['term']).'&siteName=artist_platform&format=json&rows=50');
    curl_setopt( $ch1, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($ch1);
	
	$posts = array();
$count = 0;
	
//echo htmlspecialchars($content);
$regex = '| "artist_name_s":"(.*?)",|si';
preg_match_all($regex, $content, $names);

foreach ($names[1] as $match) 
{
	if( $count >=1 ) 
     array_push( $posts, array( 'id'=> $match, 'value'=> $match ) );
	$count++;
}

echo json_encode($posts);

?>