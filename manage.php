<?php
include 'php/db.php';
include 'php/logged.php';

$id = $_SESSION['id'];

if( isset($_GET['radio']) )
{
	if( $_GET['radio'] == "on" ) {
	
		$list = $_GET['list'];
		$data = mysql_query("DELETE FROM user_broadcast WHERE userid = '$id'");
		$data = mysql_query("ALTER TABLE user_radio_playlist AUTO_INCREMENT = 1");
		
		$data = mysql_query("DELETE FROM user_radio_playlist WHERE userid = '$id'");
		
		$data = mysql_query("INSERT INTO user_broadcast(userid, session_start, seek, song_id, playlist) VALUES('$id', now(), 0, 1, '$list' )");
		
			
		$data = mysql_query("INSERT INTO user_radio_playlist(userid, song_name, song_href, duration, pid) SELECT $id, song_name, song_href, song_time, @s:=@s+1 FROM user_songs, (SELECT @s:= 0) AS s WHERE userid='$id' AND playlist_id IN ($list) ORDER BY RAND()");
		echo "INSERT INTO user_radio_playlist(userid, song_name, song_href, duration) SELECT $id, song_name, song_href, song_time FROM user_songs WHERE userid='$id' AND playlist_id IN ($list) ORDER BY RAND()";
	
	}
	else {
			$data = mysql_query("DELETE FROM user_broadcast WHERE userid = '$id'");
			$data = mysql_query("DELETE FROM user_radio_playlist WHERE userid = '$id'");
	}
}
else {

$id = $_SESSION['id'];
$userid = $id;
$pid = 0;
$val = 0;
$posts = array();

$sql = mysql_query("select TIMESTAMPDIFF(SECOND, session_start, NOW() ), seek, song_id FROM user_broadcast WHERE userid = '$id' ");
while($inf= mysql_fetch_array( $sql ))
  { $diff = $inf['TIMESTAMPDIFF(SECOND, session_start, NOW() )'];  $currid = $inf['song_id']; $seek = $inf['seek']; }
if ( empty($diff) )
{ die("RADIO OFFLINE"); }


 $count = 0;
 $link = array();
 $song = array();
 $dur = array();
 $songid = array();
 $cid = 0;
 
 $uid = ( isset($_GET['pid']) ) ? $_GET['pid'] : $_POST['id'];
 
  $data = mysql_query("SELECT pid,song_name, song_href, duration from user_radio_playlist WHERE userid = '$id' ORDER BY pid ASC ");
	while( $info = mysql_fetch_array( $data ) )
	{
		$link[$count] = $info['song_href'];
		$song[$count] = $info['song_name'];
		$dur[$count] = $info['duration'];
		$songid[$count] = $info['pid'];
		
		if( $uid == $info['pid'] )
			$cid = $count;
		$count++;
	}

 $lid = $songid[$count-1];
 
 if( $uid > $lid )
	$cid = 0;
 
 if( isset($_GET['pid']) )
 {	
    $pid = $_GET['pid'];
	
	if( $pid > $lid)
		$pid = $songid[0];
	
	$push = $cid;
	for( $i = 0; $i < 5; $i++, $cid++) {
			if(  ( ($cid%$count) == $push ) && $i > 0 ) break;
			array_push($posts, array('pid'=> $songid[$cid%$count], 'song'=> $song[$cid%$count], 'href'=> $link[$cid%$count], 'dur'=>$dur[$cid%$count] ) );
	}
	
	header('Access-Control-Allow-Origin: *');
	echo json_encode($posts);
  }
  else if( isset($_GET['up']) )
	{
			$pid = $_GET['up'];
			$currid = $_POST['id'];
			$seek = $_POST['seek'];
			echo $pid;
			
			$data = mysql_query("UPDATE user_broadcast SET session_start=now(), song_id= $currid , seek= $seek WHERE userid = '$userid' ");
			
			$i = 0;
			$push = $cid;
			for( ; $i < 5; $i++, $cid++) 
				if(  ( ($cid%$count) == $push ) && $i > 0 ) break;
			
			$cid = $push;
			
			$cc = $i;
			
			$songname = json_decode($_POST['name']);
			$songhref = json_decode($_POST['href']);
			$songtime = json_decode($_POST['time']);
				
			$data = mysql_query("DELETE FROM user_radio_playlist WHERE userid=$userid ");
			
			//$data = mysql_query("DELETE FROM user_radio_playlist WHERE pid < '$pid-2'");
			//$data = mysql_query("DELETE FROM user_radio_playlist WHERE pid >= '$pid'");
		
			if( $count == 1 )
				$stop = 1;
			else
				$stop = 2;
		
			for( $i = $cid, $x=0; $x < $stop; $i++, $x++)
			{
				$i %= $count;
				$data = mysql_query("INSERT INTO user_radio_playlist(userid, song_name, song_href, duration, pid) VALUES('$userid', '$song[$i]', '$link[$i]', '$dur[$i]', $currid + $x)");
			//	echo "INSERT INTO user_radio_playlist(userid, song_name, song_href, duration, pid) VALUES('$userid', '$song[$i]', '$link[$i]', '$dur[$i]', $x)";
				
			}

			$c = 0;
			for( $i=0; $i < count($songname); $i++ ) {
				$data = mysql_query("INSERT INTO user_radio_playlist(userid, song_name, song_href, duration, pid) VALUES('$userid', '$songname[$i]', '$songhref[$i]', '$songtime[$i]', $i+$currid+$stop)");
				echo "INSERT INTO user_radio_playlist(userid, song_name, song_href, duration, pid) VALUES('$userid', '$songname[$i]', '$songhref[$i]', '$songtime[$i]', $i+3)";
			}
			
			$c = count($songname) + $currid + $stop;
			echo '-----'.$c;
			for( $i = $cid + $stop + $cc , $x=0; $x < $count - $stop - $cc ; $i++, $c++, $x++ )
			{
				$i %= $count;
				$data = mysql_query("INSERT INTO user_radio_playlist(userid, song_name, song_href, duration, pid) VALUES('$userid', '$song[$i]', '$link[$i]', '$dur[$i]', $c)");
				print("INSERT INTO user_radio_playlist(userid, song_name, song_href, duration, pid) VALUES('$userid', '$song[$i]', '$link[$i]', '$dur[$i]', $c)");
				
			}

	}

}

	
?>