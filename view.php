<?php
include 'php/logged.php';
include 'php/db.php';



?>


<html class=" -webkit-"><head><meta charset="UTF-8">

<script src="/assets/libs/prefixfree.min.js"></script>
      <script style="display: none !important;">      function getSafeJS(js) {        js = js.replace(/location(s+)?=/mi, '');        js = js.replace(/top.location.+=('|")/mi, '');        js = js.replace(/location.replace/mi, '');        js = js.replace(/window(s+)?\[(s+)?("|')l/mi, '');        js = js.replace(/self(s+)?\[(s+)?("|')loc/mi, '');        return js;      }      _ogEval        = window.eval;      window.eval    = function(text) {_ogEval(getSafeJS(text));};      window.innerWidth = window.outerWidth; // Fixes browser bug with it innerWidth reports 0      window.innerHeight = window.outerHeight; // Fixes browser bug with it innerHeight reports 0      </script>


</head><body>
<div class="player-wrapper">

<style>

li { cursor: pointer; }
li.current { font-weight: bold };

a {
  text-decoration: none;
}



.pause {
  font-size: 24px;
}

.player-wrapper {
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
	width: 70%;
	display:inline-block;
}

.playlist a:hover {
	text-decoration: underline;
}

</style>


  <header class="player-header">
  <img src="images/art.jpg" alt="" class="artwork">
    <div class="track-details">
  
<?php
	$id = $_SESSION['id'];
	$playlist_id = $_GET['id'];
	$data = mysql_query("SELECT * from user_playlist WHERE id = '$playlist_id'");
	$info = mysql_fetch_array( $data );
	$name = $info['name'];
	$userid = $info['userid'];
	$data = mysql_query("SELECT FirstName, LastName from user_login WHERE id = '$userid' ");
	$user = mysql_fetch_array( $data );
	
	echo "<h5>".$name."</h5>
    <span>".urldecode($info['hashtag'])."<span>	
    <span>Author:  <a href='#profile|".$userid."' > ".$user['FirstName']." ".$user['LastName']."</a></span>
    <span>Last Updated: ".time_elapsed_string($info['updated'])."</span>
    
    </div>";
?>  
    
    <div class="controls">
      <a href=""><i class="entypo-to-start"></i></a>
      <a href=""><i class="entypo-pause pause"></i></a>
      <a href=""><i class="entypo-to-end"></i></a>
      <a href=""><i class="entypo-stop"></i></a>
    </div>
    
    <span class="length"><?php echo gmdate("H:i:s", $info['playtime']); ?></span>
    
    <div class="progress">
      <div class="bar"></div>
    </div>
  </header>
  
  <div class="playlist" id="playlist">
	  
<?php   
	$tick = 1;
    $data = mysql_query("SELECT song_name, song_href, song_time from user_songs WHERE playlist_id = '$playlist_id' AND  userid = '$userid' ORDER BY pid ASC ");
	while( $info = mysql_fetch_array( $data ) )
	{
		$song_href = $info['song_href'];
		$song_name = $info['song_name'];
		$song_dur = $info['song_time'];
		
		echo '
    <div class="song">
      <span class="play-button">
        <i class="fa fa-play fa-fw button" onclick="playaudio(\''.urlencode($song_href).'\');" ></i>
      </span>
      <span class="number">'.$tick.'.</span>
      <span class="title">'.$song_name.'</span>
      <span class="duration">'.gmdate("i:s", $song_dur).'</span>
    </div>';
    
		$tick++;
	}
?>
    
    
  </div>
</div>
<script src="http://s.codepen.io/assets/libs/empty.js"></script>
<script>var audio    = new Audio();
    playlist = $('#playlist');

               playlist.on('click', 'li', function() {
                  playlist.find('.current').removeClass('current');
                  $(this).addClass('current');
                  audio.src = $(this).data('src');
                  audio.play();
               }).find('li:first').trigger('click');
       
audio.controls = true;
document.body.appendChild(audio);
//@ sourceURL=pen.js</script>
</body></html>
