<?php
include ("php/db.php");
include 'php/logged.php';

$id = (isset($_GET['uid']) ) ? ($_GET['uid']) : $_SESSION['id'];
$pid = 0;
$val = 0;

	if( $id == 0 ) $id = $_SESSION['id'];
	

$sql = mysql_query("select TIMESTAMPDIFF(SECOND, session_start, NOW() ), seek, song_id FROM user_broadcast WHERE userid = '$id' ");
while($inf= mysql_fetch_array( $sql ))
  { $diff = $inf['TIMESTAMPDIFF(SECOND, session_start, NOW() )'];  $currid = $inf['song_id']; $seek = $inf['seek']; }
if ( empty($diff) )
{ die("RADIO OFFLINE"); }


 $count = 0;
 $link = array();
 $song = array();
 $dur = array();
 $posts = array();
 $songid = array();

  $data = mysql_query("SELECT pid,song_name, song_href, duration from user_radio_playlist WHERE userid = '$id' ORDER BY pid ASC ");
	while( $info = mysql_fetch_array( $data ) )
	{
		$link[$count] = $info['song_href'];
		$song[$count] = $info['song_name'];
		$dur[$count] = $info['duration'];
		$songid[$count] = $info['pid'];
			
		if( $currid == $info['pid'] )
			$pid = $count;
		  
		$count++;
	}


 if( !isset($_GET['id']) )
{
	$totaltime = 0;
	for ($i = 0; $i < $count; $i++ )
	{  $totaltime += $dur[$i] ; }
	
	$totaltime -= ($count)*4.5;

	$left = $diff;
	$left = $left%$totaltime;

	$sum = 0;
	
	
	if( $left < ($dur[$pid] - $seek - 4) )
		$posts[] = array('id'=> $currid, 'song'=> urldecode($song[$pid]), 'seek'=> ($seek+$left), 'url'=> urldecode($link[$pid]), 'dur'=>urldecode($dur[$pid]) );
	else {
	for ($i = $pid+1, $left -= ($dur[$pid]-$seek-4); ; $i++ )
	{	
		$i %= $count;
	  $sum+=$dur[$i]-4; $val = $dur[$i]-4;
	  
	  if ($sum > $left)
      { break; }
    
	}
	
	
	$calc = $left - $sum + $val;
	$next =  'http://'.$_SERVER['SERVER_NAME'].'/mp3crop.php?url='.$link[$i].'&seek='.$calc;
	$posts[] = array('id'=> $songid[$i], 'song'=> urldecode($song[$i]), 'seek'=> 0, 'url'=> $next, 'dur'=>urldecode($dur[$i]) );
	
	}
	//echo $link[$i-1];
}
else
{	$pid = $_GET['id'];
	$lid = $songid[$count-1];
	
	if( $pid > $lid )
		$pid = $songid[0];
		
	for( $i = 0; $songid[$i] != $pid; $i++ );
	$posts[] = array('id'=> $songid[$i], 'song'=> urldecode($song[$i]), 'seek'=> 0, 'url'=> urldecode($link[$i]), 'dur'=>urldecode($dur[$i]) ); 
}
 
 echo json_encode($posts);
 
?>
