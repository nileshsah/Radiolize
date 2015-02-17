<?php
include 'php/db.php';
include 'php/logged.php';

$songname = json_decode($_POST['name']);
$songhref = json_decode($_POST['href']);
$songtime = json_decode($_POST['time']);

$userid = $_SESSION['id'];
$playlist = $_POST['playlist'];
$hashtag = $_POST['hashtag'];

$mysql = mysql_query("SELECT id FROM user_playlist WHERE name ='$playlist' AND userid='$userid'");
$count = mysql_num_rows($mysql);

if( $count < 1 )
{
	$data = mysql_query("INSERT INTO user_playlist(userid, name, hashtag) VALUES('$userid', '$playlist', '$hashtag')");
	$id = mysql_insert_id();
}
else
{
		   $info = mysql_fetch_array( $mysql );
		   $id = $info['id'];
		   $mysql = mysql_query("DELETE FROM user_songs WHERE playlist_id = '$id' AND userid = '$userid'");	   
} 
 
 $sum = 0;
 
for( $i = 0; $i < count($songname); $i++ )
{
   $sum = $sum + $songtime[$i];
 //  echo "INSERT INTO user_songs(userid, playlist_id, pid, song_name, song_href, song_time) VALUES('$userid', '$id', '$i', '$songname[$i]', '$songhref[$i]', '$songtime[$i]')";
   $sname = mysql_real_escape_string($songname[$i]);
   $data = mysql_query("INSERT INTO user_songs(userid, playlist_id, pid, song_name, song_href, song_time) VALUES('$userid', '$id', '$i', '$sname', '$songhref[$i]', '$songtime[$i]')");
}

  $data = mysql_query("UPDATE user_playlist SET playtime='$sum', updated=now() WHERE id = '$id' AND userid = '$userid'");



print("SUCCESS");
?>
