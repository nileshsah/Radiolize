<?php
include 'php/logged.php';
include 'php/db.php';
error_reporting(-1);
?>

<div id="create">
<style>

li { cursor: pointer; }
li.current { font-weight: bold };

a {
  text-decoration: none;
}



.pause {
  font-size: 24px;
}

.player-header {
  background: #fff;
  font-family: 'Lato', sans-serif;
  font-weight: 300;
  color: #2d2d2d;
  padding: 30px;
  margin: 0 auto;
  width: 90%;
  
}

.artwork {
  max-width: 150px;
  float: left;
  margin-right: 30px;
}

h5 {
  font-size: 24px;
  margin: 0 0 10px 0;
}

header span {
  display: block;
  font-size: 18px;
  margin-bottom: 10px;
}

.controls {
  float: left;
  margin-bottom: 0;
}

.controls a {
  color: #606060;
  transition: color .3s ease-out;
}

.controls a:hover {
  color: #2d2d2d;
  transition: color .3s ease-out;
}

.length {
  float: right;
}


.double {
  margin-left: -10px
}
.progress {
  width: 70%;
  height: 5px;
  background: #606060;
  clear: both;
  position: relative;
  bottom: 5px;
  left: 30%;
}

.bar {
  background: #bf5656;
  height: 5px;
  width: 80%;
}

.playlist {
  margin-top: 20px;
  font-size: 18px;
  overflow: scrollbar;
}

.song {
  text-overflow:ellipsis;
  margin-bottom: 10px;
  padding-bottom: 10px;
  border-bottom: 1px solid #ccc;
}

.song:hover i {
  opacity:1;
  transition: opacity .2s ease-out;
}

.playlist i {
  opacity: 0;
  color: #bf5656;
  transition: opacity .2s ease-out;
  cursor: pointer;
}

.playlist span {
  margin-right: 20px;
}

.playlist .duration {
  float: right;
  margin-right: 0;
}

.playlist .title {
	width: 420px;
	display:inline-block;
}

</style>

<?php
if( !isset($_GET['id']) )
{ 
echo ' <header class="player-header">
			<img src="images/art.jpg" alt="" class="artwork">
			<div class="track-details">
			<h5>'.$_GET['name'].'</h5>
    <span class="hashtag">'.$_GET['hashtag'].'</span>
    <span>Author:  '.$_SESSION['FirstName'].' '.$_SESSION['LastName'].'</span>
    </div>
      <span class="length">00:00:00</span>
    
    <div class="progress">
      <div class="bar"></div>
    </div>
  </header>'; 
  
  echo '<form>

  <input type="hidden" id="playlist_name" value="'.$_GET['name'].'">
  <ul id="sortable2"><li id="nothing" class="ui-state-default">Drop Songs Here</li></ul>
  <input type="button" id="CreatePlaylistButton" onClick="createPlaylist();" value="Save">
  </form>
 
	</div>';
}
else
{
	$id = $_SESSION['id'];
	$playlist_id = $_GET['id'];
	$data = mysql_query("SELECT * from user_playlist WHERE id = '$playlist_id' AND userid = '$id' ");
	$info = mysql_fetch_array( $data );
	$data = mysql_query("SELECT FirstName, LastName from user_login WHERE id = '$id' ");
	$user = mysql_fetch_array( $data );
	$name = $info['name'];
	
	echo ' <header class="player-header">
			<img src="images/art.jpg" alt="" class="artwork">
			<div class="track-details">
			<h5>'.$name.'</h5>
    <span class="hashtag">'.urldecode($info['hashtag']).'<span>
	<span>Author:  '.$user['FirstName'].' '.$user['LastName'].'</span>
	 <span>Last Updated: '.time_elapsed_string($info['updated']).'</span>
    
    </div>
      <span class="length">'.gmdate("H:i:s", $info['playtime']).'</span>
    
    <div class="progress">
      <div class="bar"></div>
    </div>
  </header>';
        
  echo '      <form>
				<input type="hidden" value="'.$name.'" id="playlist_name" ReadOnly = "True" placeholder="Playlist Name">
   <ul id="sortable2"> ';
   
   $data = mysql_query("SELECT song_name, song_href, song_time from user_songs WHERE playlist_id = '$playlist_id' AND  userid = '$id' ORDER BY pid ASC ");
	while( $info = mysql_fetch_array( $data ) )
	{
		$song_href = $info['song_href'];
		$song_name = $info['song_name'];
		echo '<li class=""><div class="preview"><p><a duration='.$info['song_time'].' target="_blank" href="'.$song_href.'" >'.$song_name.'</a> </a></p></div> 
				<button class="fa fa-pencil fa-fw button-edit button-list"></button>
				<button class="fa fa-trash-o fa-fw button-delete button-list" ></button>
				<button class="fa fa-play fa-fw button-play button-list" onclick="playaudio(\''.urlencode($song_href).'\'); "></button></li>';
          
	}
	
	echo '</ul>
			<input type="button" id="CreatePlaylistButton" onClick="createPlaylist();" value="Save">
			</form>	</div>';
	
	
}

?> 

