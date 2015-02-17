<?php
include 'php/logged.php';
include 'php/db.php';

?>
<head><meta charset="UTF-8">
<title>Radiolize</title>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script style="display: none !important;">   
   
function getSafeJS(js) {        
	js = js.replace(/location(s+)?=/mi, '');        
	js = js.replace(/top.location.+=('|")/mi, '');        
	js = js.replace(/location.replace/mi, '');        
	js = js.replace(/window(s+)?\[(s+)?("|')l/mi, '');        
	js = js.replace(/self(s+)?\[(s+)?("|')loc/mi, '');       
	 return js;      
	 }      
	 _ogEval        = window.eval;      
	 window.eval    = function(text) {_ogEval(getSafeJS(text));}; 
	 window.innerWidth = window.outerWidth; // Fixes browser bug with it innerWidth reports 0      
	 window.innerHeight = window.outerHeight; // Fixes browser bug with it innerHeight reports 0      
</script>



<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/jquery-ui.css">
<link href="css/home-style.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/init.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/audio.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery-ui.js"></script> 
<script src="js/jquery.ba-hashchange.min.js"></script>
<script src="audiojs/audio.min.js"></script>
  <link type="text/css" href="skin/premium-pixels/premium-pixels.css" rel="stylesheet" />
  <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>

 
			
</head><body>

<div class="pop-up" style="display: none;">

<style>
.pop-up {
  position:absolute;
  height:auto;
  width: 450px;
  margin-left: 30%;
  background: rgba(255, 255, 255, 0.95);
  z-index:10;
  border-radius:5px;
  box-shadow:0 0 20px #000;
  padding-bottom:30px;
}

.pop-up span.x{
  border-radius:0 0 30px 30px;
  margin-left:90%;
  background:#000;
  color:#fff;
  font-size:20px;
  height:10px;
  padding:0 5px;
  cursor:pointer;
}
.pop-up-text {
  box-sizing:border-box;
  padding:20px;
  padding-top:0px;
}
.pop-up-text h1{
  font-size:2em;
}
.pop-up-text p{
  font-size:1em;
  margin-bottom:10px;
}

.pop-up input {
  color: #444;
  font-size: 1.0em;
  outline: none; 
  box-shadow: none; 
  -webkit-appearance: none;
  border-radius: 0;
  border-top: none;
  border-left: solid 1px;
  border-right: solid 1px;
  border-bottom: solid 1px;
  border-color: #bbb;
  background: transparent;
  display: block;
  height: 2em;
  width: 400px;
  margin-bottom: 5%;
  padding: 0 3%;
  position: relative;
  z-index: 0;
  -webkit-transition: border .25s; // slightly slower than placeholder colour
  -moz-transition: border .25s;
  -o-transition: border .25s;
  transition: border .25s;
}

.pop-up-text span {
  color:#FF3D3D;
  float: left;
  margin-left: 10px;
}
.pop-up-text img {
  max-height:300px;
  width:30%;
  height:30%;
  text-align:center;
  margin-bottom:10px;
  float: left;
}

object {
	width: 100%;
	height: 100%;
}

</style>

  <span class="x" >x</span>
  <div class="pop-up-text">
    <h1>New Playlist</h1>
    <span>Playlist Name <br> <input type="text" id="playlist-name" placeholder="Name it !" /></span>
    <span>#HashTag <br> <input type="text" id="playlist-hashtag" placeholder="#rock #soft #myFav" /></span>
    <span><input type="button" onClick="newPlaylist();" value="Done" /></span>
    
    <span></span>
    
  </div>

</div>
<div class="pop-up-container">
</div>

	
 <div id="notif" class="notification undo-button">Saved</div>
 
   <div class="main">
    <header class="header">
	<div class="logo">
      <a href="#">Radio<strong>lize</strong></a>
    </div>
      <form action="">
        <input id="search_box" placeholder="Search on simplest" type="search">
      </form>
      <nav class="nav-settings">
        <ul>
		  <li><a href="#help"> Get Started </a></li>
          <li><a href="logout.php">Logout</a></li>
          <li><a href="#" class="icon icon-gear"></a></li>
        </ul>
      </nav>
      <div class="clr"></div>
    </header>
  </div>

<div class="bodywrap">  
  <aside class="sidebar">
    <nav class="main-nav">
      <ul>
        <li><a href="#dashboard">Dashboard</a></li>
        <li class="active">
          <a href="#profile">Socialize</a><br>
          <a id="cp" class="btn btn-primary" href="#edit">Create Playlist</a>
          <ul>
		  <?php
			$mysql = mysql_query("SELECT * FROM user_broadcast WHERE userid ='".$_SESSION['id']."'");
			if( mysql_num_rows($mysql) < 1 )
				$radio = "Off";
			else
				$radio = "On";
	
            echo '<li class=""><a href="#radio">Radio<span id="rad-but" class="btn btn-primary">'.$radio.'</span></a></li>';
	?>
            <li><a href="#playlist">Playlist</a></li>
            <li><a href="#">Groups</a></li>
            <li><a href="#charts">Charts</a></li>
          </ul>
          <ul class="labels">
            <li><a href="#profile" onClick =" changeView('#inbox'); profile('#inbox'); refresh();" >Message <span id="msgno" class="btn btn-primary label"></span></a></li>
            <li><a href="#profile" onClick =" changeView('#req'); profile('#req'); refresh();">Request <span id="reqno" class="btn btn-primary label"></span></a></li>
          </ul>
        </li>
       <!-- <li><a href="#">Docs</a></li>
        <li><a href="#">Stats</a></li> -->
      </ul>
    </nav>
  </aside>
  
  	
       <div class="messages">
        <h1>Library <span class="icon icon-arrow-down"></span></h1>
     
          <input class="search" placeholder="Search Music" type="search">

        <ul class="message-list connectedSortable" id="sortable1">
          <li class="">
			  <div class="preview">
				  <h3>128 kbps  2:46  2.54 mb</h3><p>
					  <a target="_blank" href="http://127.0.0.1/pyramid.mp3">Morandi &amp; Inna - morandi--inna---morandi--inna---save-me---hot-super-hit-2009-goda-vsem-ka4at-zvukoffru-857859 </a>
					  </p>
					  </div>
			</li>
			<li class=""><div class="preview"><h3>5.33 mb</h3><p><a target="_blank" href="http://icecast.arn.com.au/1065.mp3">www.DjMixstar.com - Kesha ft Randy Katana - Tik Tok (V2) - www.DjMixstar.com - Kesha ft Randy Katana - Tik Tok (V2) </a></p></div> <button class="fa fa-pencil fa-fw button-edit button-list"></button><button class="fa fa-trash-o fa-fw button-delete button-list" onclick="alert(" del");"=""></button><button class="fa fa-play fa-fw button-play button-list" onclick="playaudio(&quot;http%3A%2F%2Fdjmixstar.com%2Fmusic%2Fwww.DjMixstar.com_-_Kesha_ft_Randy_Katana_-_Tik_Tok_(V2).mp3&quot;)"></button></li>
            <li class=""><div class="preview"><h3>64 kbps  3:23  1.55 mb</h3><p><a target="_blank" href="http://dl2.farskids431.com/Masoud/1392/09/03/2/VA%20-%20So%20Fresh%20The%20Hits%20of%20Summer%202014%20+%20Best%20of%202013%20[320]/1-10%20Pop%20a%20Bottle%20(Fill%20Me%20Up).mp3">Kesha | hits.wen.ru - Princess Kesha | hits.wen.ru </a></p></div> <button class="fa fa-pencil fa-fw button-edit button-list"></button><button class="fa fa-trash-o fa-fw button-delete button-list" onclick="alert(" del");"=""></button><button class="fa fa-play fa-fw button-play button-list" onclick="playaudio(&quot;http%3A%2F%2Fmp3hits14.wen.ru%2FNEW_FOREIGN%2FPrincess_Kesha_-_Kesha_mp3hits.wen.ru.mp3&quot;)"></button></li>
          <li class="active">
            <input type="checkbox">
            <div class="preview">
              <h3>Jeremy Clarkson <small>Jul 15</small></h3>
              <p>The brand new season of Top Gear</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox">
            <div class="preview">
              <h3>Eureka.com <small>Jul 14</small></h3>
              <p><strong>Interface design - </strong>Hi Greg ...</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox">
            <div class="preview">
              <h3>Jeremy Legrand <small>Jul 13</small></h3>
              <p><strong>CSS Responsive - </strong>Here is my hack to ...</p>
            </div>
          </li>
          <li class="">
            <input type="checkbox">
            <div class="preview">
              <h3>Noe Vella <small>Jul 13</small></h3>
              <p><strong>Personal resume - </strong>Hi Greg, as expected ...</p>
            </div>
          </li>
        </ul>
	</div>
	
	    <div class="message">

       <!--Load Data Here -->
     
      </div>


</div>



<div id="player" class="footer" onmouseover="document.getElementById('player').style.bottom = '0px';"  onmouseout="document.getElementById('player').style.bottom = '-0.7em';">
	<div id="jquery_jplayer_1" class="jp-jplayer"></div>
			
			<div id="jp_container_1" class="jp-audio">
				<div class="jp-no-solution">
						<span>Update Required</span>
						To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
					</div>
					
			<div class="jp-playlist" style="display: none;">
						<ul>
							<li></li>
						</ul>
					</div>
				<div class="jp-type-playlist">
					<div class="jp-gui jp-interface">
					
						<ul class="jp-controls">
							<li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
							<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
							<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
							<li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
							<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
							<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
							<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
							<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
						</ul>
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
						<div class="jp-time-holder">
							<div class="jp-current-time"></div>
							<div class="jp-duration"></div>
						</div>
						<ul class="jp-toggles">
							<li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
							<li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li>
							<li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
							<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
						</ul>
					</div>
					
				
				</div>
			</div><!-- .jp-audio -->
</div>

        
<script src="js/home-script.js"></script>
<script src="js/pro-script.js"></script>
<script>
  $("#jquery_jplayer_1").jPlayer({  ready: function () {  $(this).jPlayer("setMedia", {   mp3: "" }); }, swfPath: "/js", supplied: "mp3" });
  $(".search").val("inna");
  getData();
  $(".search").val("");
  
  <!-- Start of StatCounter Code for Default Guide -->
<!-- End of StatCounter Code for Default Guide -->
  </script>
  
  <script type="text/javascript">
var sc_project=9544662; 
var sc_invisible=1; 
var sc_security="f300858f"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>

</body>
