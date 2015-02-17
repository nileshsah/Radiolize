<?php
 include 'php/db.php';
 include 'php/logged.php';
 
 if( !isset($_GET['id']) ) $id = $_SESSION['id'];
  else
 $id = $_GET['id'];
 
 if( $id == 0 )
	$id = $_SESSION['id'];
 
 $data = mysql_query("SELECT TIMESTAMPDIFF(YEAR,dob,NOW()), gender, location, FirstName, LastName, propic, username FROM user_login WHERE id = $id");
 
 if( mysql_num_rows($data) < 1 ) die("User does not exist");
 
 $info = mysql_fetch_array($data);
 
		$loc = $info['location'];
		$gen = $info['gender'];
		$FN = $info['FirstName'];
		$LN = $info['LastName'];
		$age = $info['TIMESTAMPDIFF(YEAR,dob,NOW())'];
		$pic = $info['propic'];
		$username = $info['username'];
		
 $name = $FN." ".$LN;
 
 $data = mysql_query("SELECT count(broid) AS c FROM user_friends WHERE (userid = $id OR broid = $id) AND accepted = 1");
 $info = mysql_fetch_array($data);
 $fcount = $info['c'];
 
 $data = mysql_query("SELECT count(fanid) AS c FROM user_fans WHERE fanid = $id ");
 $info = mysql_fetch_array($data);
 $fancount = $info['c'];
 
 $frnd = true;
 
 if( $id != $_SESSION['id'] ) {
    $myid =  $_SESSION['id'];
	$data = mysql_query("SELECT broid FROM user_friends WHERE ( (userid = $myid AND broid = $id) OR (userid = $id AND broid = $myid) ) AND accepted = 1");
	if( mysql_num_rows($data) < 1 ) $frnd = false;
 }
 
 $fan = true;

 if( $id != $_SESSION['id'] ) {
    $myid =  $_SESSION['id'];
	$data = mysql_query("SELECT fanid FROM user_fans WHERE fanid = $id AND userid = $myid");
	if( mysql_num_rows($data) < 1 ) $fan = false;
 }
 
 if( $id == $_SESSION['id'] ) {
 $data = mysql_query("SELECT userid FROM user_friends WHERE broid = $id AND accepted = 0");
	$reqcount = mysql_num_rows($data);
}

// date_default_timezone_set('Asia/Calcutta');
	

		
?>

<html>

<body>
<div id="profile">
<script type="text/javascript" src="js/jquery.min.js"></script>

<style>
#profile, body {
	overflow-x: hidden;
	background: url(images/music.jpg);
	 background-repeat: no-repeat;
	background-attachment: fixed;
	min-height: 100%;
}
.wrapper {
	width: 100%;
	min-height: 100%;
	background-color: rgba( 255, 255, 255, 0.7);
	margin: 0px auto;
	padding: 30px;
}

.propic {
	width: 160px;
	height: 160px;
	border-style: solid;
	border-width: 2px;
	border-color: #C6C6C6;
	background: url(<?php echo "propic/".$pic; ?>);
	background-size: cover;
	margin-bottom: 10px;
 }
  .button
    {        
        display: block;
        white-space: nowrap;
        background-color: #eee;        
        background-image: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#ddd));
        background-image: -webkit-linear-gradient(top, #FFFFFF, #ddd);
        background-image: -moz-linear-gradient(top, #FFFFFF, #ddd);
        background-image: -ms-linear-gradient(top, #FFFFFF, #ddd);
        background-image: -o-linear-gradient(top, #FFFFFF, #ddd);
        background-image: linear-gradient(top, #FFFFFF, #ddd);
		
		
	    border: 1px solid #777;
        font-size: 10pt;
        text-decoration: none;
		margin: 10px 0 10px;
		padding: 5px;
        color: #333;
		min-width: 180px;
        text-shadow: 0 1px 0 rgba(255,255,255,.8);
        -moz-border-radius: .2em;
        -webkit-border-radius: .2em;
        border-radius: .2em;
        -moz-box-shadow: 0 0 1px 1px rgba(255,255,255,.8) inset, 0 1px 0 rgba(0,0,0,.3);
        -webkit-box-shadow: 0 0 1px 1px rgba(255,255,255,.8) inset, 0 1px 0 rgba(0,0,0,.3);
        box-shadow: 0 0 1px 1px rgba(255,255,255,.8) inset, 0 1px 0 rgba(0,0,0,.3);
		
    }
    
    .button:hover
    {
        background-color: #ddd;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#eee), to(#ccc));
        background-image: -webkit-linear-gradient(top, #eee, #ccc);
        background-image: -moz-linear-gradient(top, #eee, #ccc);
        background-image: -ms-linear-gradient(top, #eee, #ccc);
        background-image: -o-linear-gradient(top, #eee, #ccc);
        background-image: linear-gradient(top, #eee, #ccc);
        
    }
    
 .but-radio {
	  background-image: -webkit-gradient(linear, left top, left bottom, from(#66FF66), to(#009900));
        background-image: -webkit-linear-gradient(top, #66FF66, #009900);
        background-image: -moz-linear-gradient(top, #66FF66, #009900);
        background-image: -ms-linear-gradient(top, #66FF66, #009900);
        background-image: -o-linear-gradient(top, #66FF66, #009900);
        background-image: linear-gradient(top, #66FF66, #009900);
		
		margin-top: 20px;
		margin-bottom: 20px;
 }
/*attempting 2 icons in one button */
.title {
	width: 160px;
	left: 10px;
	font-size: 10pt;
	margin-left: 15px;
}

#profile .title a {
	float: right;
	font-size: 10pt;
	color: blue;
}

#profile a:hover {
 text-decoration: underline;
 cursor: pointer;
}

#left {
 position: fixed;
 float: left;
}
#right {
 margin-left: 210px;
}

.user { font-size: 13pt; margin-bottom: 20px; }
.user b{
	font-size: 18pt;
	margin-right: 10px;
}

#box {
	border: 1px solid #808080;
	width: 90%;
	min-height: 400px;
	background: white;
}

#smallbox {
	border: 1px solid #808080;
	width: 88%;
	min-height: 25px;
	background: white;
	padding-left: 10px;
	margin-bottom: 15px;
}


 @-moz-document url-prefix() {
                       #box, #smallbox{
							width: 95%;
							margin: auto;
                    }
					#smallbox {
						margin-bottom: 15px;
					}
}


#smallbox b, text {
	font-size: 8pt;
	font-family: 'Open Sans', sans-serif;
	color: #34393D;
	padding: 10px;
}


.topcoat-button-bar__item > input {
  border: 0;
	clip: rect(0 0 0 0);
	height: 10px;
	margin: 0 -2rem -2rem 0;
	overflow: hidden;
	padding: 0;
	position: absolute;
	width: auto;
  opacity: 0.001;
}


.topcoat-button-bar {
  display: table;
  table-layout: fixed;
  white-space: no-wrap;
  margin: 20 10px;
  padding: 0;
  

}

.topcoat-button-bar__item {
  display: table-cell;
  width: auto;
  border-radius: 0;
}

.topcoat-button-bar > .topcoat-button-bar__item:first-child {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}

.topcoat-button-bar > .topcoat-button-bar__item:last-child {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}

.topcoat-button-bar__item:first-child > .topcoat-button-bar__button {
  border-right: none;
}

.topcoat-button-bar__item:last-child > .topcoat-button-bar__button {
  border-left: none;
}

.topcoat-button-bar__button {
  position: relative;
  display: inline-block;
  overflow: hidden;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  border: none;
  background: transparent;
  background-clip: padding-box;
  color: inherit;
  vertical-align: top;
  text-decoration: none;
  text-overflow: ellipsis;
  white-space: nowrap;
  font: inherit;
  cursor: default;
  user-select: none;
}

.topcoat-button-bar__button {
  padding: 0 1.25rem;
  border: 1px solid #a5a8a8;
  /* Important inheritance to manipulate border radius from parent */
  border-radius: inherit;
  font-size: 10pt;
  background-color: #e5e9e8;
  -webkit-box-shadow: inset 0 1px #fff;
  box-shadow: inset 0 1px #fff;
  color: #454545;
  text-shadow: 0 1px #fff;
  line-height: 25px;
}

:checked + .topcoat-button-bar__button,
.topcoat-button-bar__button:active,
.topcoat-button-bar__button.is-active {
  background-color: #d3d7d7;
  -webkit-box-shadow: inset 0 1px rgba(0,0,0,0.12);
  box-shadow: inset 0 1px rgba(0,0,0,0.12);
}

.topcoat-button-bar__item:disabled,
.topcoat-button-bar__item.is-disabled {
  opacity: 0.3;
  cursor: default;
  pointer-events: none;
}

.topcoat-button-bar__button:focus {
  border: 1px solid #0940fd;
  -webkit-box-shadow: 0 0 0 2px #6fb5f1;
  box-shadow: 0 0 0 2px #6fb5f1;
  z-index: 1;
}

#box input {
 margin-left: 30px;
 width: 80%;
 font-size: 10pt;
 color: black;
 padding: 5px;
}

._msg {
	width: 80%;
	margin-top: 20px;
	margin-left: 30px;
	padding-bottom: 20px;
	border-bottom: 1px solid #c6c6c6;
}

._msg .pic {
	float: left;
	width: 40px;
	height: 36px;
	margin: auto;
	border: 1px solid #C6C6C6;
	margin-right: 10px;
	
}

._msg .txt {
	margin-left: 40px;
	font-size: 10pt;
}

._msg .t {
	margin-top: 10px;
}

.hr {
	font-size: 5pt;
	color: grey;
}

._msg ul {
  width: 100%;
  list-style:none;
  margin-top: 5px;
  padding:0;
}
    
._msg ul li {
	margin-left: 30px;
	font-size: 10pt;
  }
._msg ul li a {
	color: black;
}
  
.txt a { color: blue; }

#profile h2 {
	font-size: 13pt;
	font-weight: bold;
}

#profile h3 {
	font-size: 12pt;
	font-weight: bold;
	margin-left: 20px;
	margin-bottom: 0px;
}

#aboutme p {
	margin-left: 35px;
	font-size: 10pt;
}

#aboutme p.genre {
	word-spacing: 20px;
}

#profile hr {
	width: 90%;
	align: center;
}

#rectext {
 margin-bottom: 20px;
 margin-top: 10px;
 }

 .delPost {
	float: right;
	cursor: pointer;
	font-weight: 300;
	font-size: 12px;

 }
 
#alist {
	list-style: none;
	font-size: 10pt;
}
 
#alist li {
	font-size: 12pt;
}
 	
</style>

 <div class = "wrapper">
  <div id="left">
	<div class="propic"> </div>
<?php
 if( $id == $_SESSION['id'] )
	echo '<button onClick="toggle(\'#editProfile\');" class="button save"><i class="fa fa-pencil fa-fw" /> Edit Profile </button>';
?>	
 <div class="title"><?php echo "$gen, $age <br> $loc"; ?></div>
 <button class="button" onClick="playRadio('<?php echo $username; ?>');" ><i class="fa fa-music fa-fw" /> Play Radio </button>
<?php
 if( $id != $_SESSION['id'] ) {
  
  if( !$fan )
	echo '<button class="button save" onClick="fan(1);" ><i class="fa fa-tags fa-fw" /> Become a Fan </button>';
  else
	echo '<button class="button save" onClick="fan(0);" ><i class="fa fa-tags fa-fw" /> un-Fan </button>';

  if( !$frnd )
   echo '<button class="button save" id="addbut" onClick="addfrnd();" ><i class="fa fa-user fa-fw" /> Add to Friends </button>';

  
  }
?>
 <button class="button save" onClick="toggle('#pm');" ><i class="fa fa-comments fa-fw" /> Send Message </button>
 <button class="button save" onClick="toggle('#playlist');"><i class="fa  fa-list-ul fa-fw" /> View Playlist </button>
 <br>
 <div class="title"><strong>Friends (<?php echo $fcount; ?>)</strong> <a onClick="toggle('#friends');">View All</a></div>
 <div class="title"><strong>Fans (<?php echo $fancount; ?>)</strong> <a onClick="toggle('#fans');">View All</a></div>

 <?php /*
  if( $id == $_SESSION['id'] ) {
	echo '<br><div class="title"><strong>Request ('.$reqcount.')</strong> <a onClick="toggle(\'#req\');">View All</a></div>';
	
	$myid = $_SESSION['id'];
	$data = mysql_query("SELECT count(DISTINCT id) AS idc FROM user_message WHERE broid = $myid AND privacy = 1");
	$in = mysql_fetch_array($data);

	echo '<div class="title"><strong>Messages ('.$in['idc'].')</strong> <a onClick="toggle(\'#inbox\');">View All</a></div>';
 }*/
 ?>
 
 </div>
 
 <div id="right">
	<div class="user"> <b><?php echo $name; ?></b> <?php echo "($username)"; ?></div>
	
	<div id="smallbox" > <i class="fa fa-music fa-fw" /> <b>Now Playing: </b> <text></text> </div>
	
	<div id="box">
		<div class="topcoat-button-bar">
   <label class="topcoat-button-bar__item">
     <input type="radio" name="topcoat">
     <button class="topcoat-button-bar__button" onClick="toggle('#content');" >What's Up</button>
   </label>
   <label class="topcoat-button-bar__item">
     <input type="radio" name="topcoat">
     <button class="topcoat-button-bar__button" onClick="toggle('#aboutme');">About Me</button>
   </label>
   <label class="topcoat-button-bar__item">
     <input type="radio" name="topcoat">
     <button class="topcoat-button-bar__button" onClick="toggle('#playlist');">Playlist</button>
   </label>
   <label class="topcoat-button-bar__item">
     <input type="radio" name="topcoat">
     <button class="topcoat-button-bar__button" onClick="toggle('#recommend');">Recommend</button>
   </label>
   <label class="topcoat-button-bar__item">
     <input type="radio" name="topcoat">
     <button class="topcoat-button-bar__button" onClick="toggle('#friends');">Friends</button>
   </label>
		</div>

<div id="content" style="display: none;">
<?php 
  if( $frnd )
	echo '<input type="text" id="postbox" placeholder="Shout Something"> </input>';
  else
	echo '<input type="text" id="postbox" placeholder="You must be friends to post comments" disabled> </input>';
?>	
 <div id="stories">
<?php
 $data = mysql_query(" (SELECT 'MESSAGE', id, userid, broid, message, hash, TIMESTAMP FROM user_message WHERE broid = $id AND privacy = 0)
						UNION
						(SELECT 'JOIN', id, ' ', ' ', ' ', '  ', timestamp FROM user_login WHERE id = $id)
						UNION
						(SELECT 'FRIEND', id, userid, broid, ' ', hash, timestamp FROM user_friends WHERE (userid = $id OR broid = $id) AND accepted = 1)
						UNION
						(SELECT 'RECOMMEND', id, userid, broid, songlist, hash, timestamp FROM user_recommend WHERE broid = $id)
						ORDER BY timestamp DESC LIMIT 30" );
 
 while($in = mysql_fetch_array($data)) { //print_r($in);
	if( $in[0] == 'MESSAGE' ) {
		$uid = $in['userid'];
		$hash = $in['hash'];
		$msg = urldecode($in['message']);
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		$broid = $in['broid'];
		
		if( $broid == $_SESSION['id'] || $uid == $_SESSION['id'] )
			$div = '<div class="delPost" onClick="delPost(\''.$hash.'\');"><i class="fa fa-times fa-fw" /></div>';
		else
			$div = '';
			
		$time = time_elapsed_string( $in['TIMESTAMP'] );
	echo '<div class="_msg" id="'.$hash.'" >'.$div.'
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> shouted: </div>
		<div class="txt hr">'.$time.' | '.getLike($hash).' </div>
	   <div class="txt t">'.$msg.'</div>
	</div>';

	}
	else if ( $in[0] == 'JOIN' ) {
	 $time = time_elapsed_string( $in['TIMESTAMP'] );
	 
	 echo '<div class="_msg" >
		<img class="pic" src="propic/'.$pic.'" />
		<div class="txt"> <a href="#profile|'.$id.'"><b>'.$name.'</b></a> joined the community ! </div>
		<div class="txt hr">'.$time.'</div>
	</div>';
	}
	else if ( $in[0] == 'FRIEND' ) {
	 $time = time_elapsed_string( $in['TIMESTAMP'] );
	 
	 if( $in['userid'] == $id )
	  $uid = $in['broid'];
	 else
	  $uid = $in['userid'];
	  
	$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
	$inf = mysql_fetch_array($sql);
	$uname = $inf['name'];
	$ppic = $inf['propic'];
	$hash = $in['hash'];
	  
	echo '<div class="_msg" id="'.$hash.'" >
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> and <a href="#profile|'.$id.'" >'.$name.'</a> are now friends. </div>
		<div class="txt hr">'.$time.' | '.getLike($hash).' </div>
	</div>';
	
	}
	else if( $in[0] == 'RECOMMEND' ) {
		
		$uid = $in['userid'];
		$hash = $in['hash'];
		$msg = urldecode($in['message']);
		$time = time_elapsed_string( $in['TIMESTAMP'] );
		$broid = $in['broid'];
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		
		$sql = mysql_query("SELECT message FROM user_recommend WHERE id = ".$in['id'] );
		$inf = mysql_fetch_array($sql);
		
			if( $broid == $_SESSION['id'] || $uid == $_SESSION['id'] )
			$div = '<div class="delPost" onClick="delPost(\''.$hash.'\');"><i class="fa fa-times fa-fw" /></div>';
		else
			$div = '';
		
	echo '<div class="_msg" id="'.$hash.'" >'.$div.'
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> recommended: </div>
		 <div class="txt hr">'.$time.' | '.getLike($hash).' </div>
		 <div class="txt t">'.$inf['message'].'</div>
		<ul>';
		
	
		
		$sql = mysql_query("SELECT song_name, song_href FROM user_songs WHERE id IN ($msg)");
		while( $inf = mysql_fetch_array($sql) ) {
			$sname = $inf['song_name'];
			$slink = $inf['song_href'];

			echo '<li> <i class="fa fa-music" /> <a href= "'.urldecode($slink).'" onclick="playaudio(\''.urlencode($slink).'\');">'.$sname.'</a></li>';
		}

		echo '</ul> </div>';
	  
	 }

}	 
?>
 </div>
</div>

<div id="recommend" style="display: none;">
<?php
if( $frnd )
  echo '<h3> Recommend Songs </h3> <input type="textbox" id="rectext" placeholder="Write Something.."></input> <br> <ul id="sortable2"><li id="nothing" class="ui-state-default">Drop Songs Here</li></ul><br>
  <input type="button" class="button" id="recbut" value="Send">';
else
  echo '<h2> You must be friends to recommend this user songs. </h2>';
?>
</div>

<div id="aboutme" style="display: none;">
<?php
	$sql = mysql_query("SELECT * FROM user_profile WHERE userid = $id");
	$res = mysql_fetch_array($sql);
	
	$aboutme = $res['aboutme'];
	$genre = $res['genre'];
	$artist = $res['artist'];
	
	$glist = str_replace("," , " ", $genre );
	$alist = explode("," , $artist);
?>
	<h3> About Me </h3>
		<p><?php echo $aboutme; ?></p>
	<hr>
	<h3> Genre </h3>
		<p class="genre"><?php echo $glist; ?></p>
	<hr>
	<h3>Music </h3>
		<ul id="alist" >
			<?php
				for( $i = 0; $i < count($alist) - 1; $i++ )
					echo "<li>$alist[$i]</li>";
			?>
		</ul>
	<hr>
</div>

<div id="playlist" style="display: none;" >
	<h3>Playlist</h3>
	<div id="user-playlist">
  <ul class="downloads">
	  <?php
		
		 $data = mysql_query("SELECT id, name, playtime FROM user_playlist WHERE userid ='".$id."'");
		 while($info = mysql_fetch_array( $data ))
          {		 
			  $hash = '#view|'.$info['id'];
			  echo '<li playlist-id="'.$info['id'].'"data-text="'.gmdate("H:i:s", $info['playtime']).'">'.
					 $info['name'].'
					<button id="play" style="margin-left: 0px;" class="fa fa-play fa-fw button" onclick="window.location.hash=\''.$hash.'\'; ">  View</button>
					</li>';
          }

		?>

  </ul>
  </div>

</div>

<style>
#people-list {
    width: 90%; /*your fixed height*/
    -webkit-column-count: 3;
       -moz-column-count: 3;
            column-count: 3;
}
#people-list li {
    display: inline-block; /*necessary*/
	 width: 180px;
	 padding-bottom: 20px;
	 line-height: 15px;
	 margin-top: 10px;
}

#people-list li text{
   font-size: 8pt;
  }

#people-list li img{
    height: 45px;
	width: 45px;
	float: left;
	margin-right: 5px;
	border: 1px solid #DDDDDD;
}

#profile textarea {
	margin-left: 30px;
	margin-top: 10px;
	font-size: 10pt;
	width: 80%;
	height: 210px;
}
</style>

<div id="friends" style="display: none;" >
<h3>Friends</h3>
	<ul id="people-list">
<?php

	$sql = mysql_query("(SELECT broid FROM user_friends WHERE userid = $id AND accepted = 1)
						 UNION
						(SELECT userid FROM user_friends WHERE broid = $id AND accepted = 1)
					   ");
					 
					 
	while( $res = mysql_fetch_array($sql) ) {
	    $uid = $res['broid'];
		$query = mysql_query("SELECT CONCAT(FirstName, ' ', LastName) AS name, gender, TIMESTAMPDIFF(YEAR,dob,NOW()) AS age, propic, location FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($query);
		
		echo '<li><a href="#profile|'.$uid.'" ><img src="propic/'.$inf['propic'].'" /> <text>'.$inf['name'].'</text> </a><br><text>'.$inf['gender'].', '.$inf['age'].' </text> </li>';
		
	}
?>
	</ul>
</div>

<div id="fans" style="display: none;" >
<h3>Fans</h3>
	<ul id="people-list">
<?php

	$sql = mysql_query("SELECT userid FROM user_fans WHERE fanid = $id");
					 
					 
	while( $res = mysql_fetch_array($sql) ) {
	    $uid = $res['userid'];
		$query = mysql_query("SELECT CONCAT(FirstName, ' ', LastName) AS name, gender, TIMESTAMPDIFF(YEAR,dob,NOW()) AS age, propic, location FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($query);
		
		echo '<li><a href="#profile|'.$uid.'" ><img src="propic/'.$inf['propic'].'" /> <text>'.$inf['name'].'</text> </a><br><text>'.$inf['gender'].', '.$inf['age'].' </text> </li>';
		
	}
?>
	</ul>
</div>

<div id="pm" style="display: none;" >
<h3>Private Message</h3>
	<hr>
	<input type="text" id="msgbox" placeholder="Message" ></input>
	<!--<input type="button" class="button" onClick="pm();" value="Send">	-->
<?php
	$myid = $_SESSION['id'];
	$data = mysql_query("SELECT id, userid, broid, message, hash, TIMESTAMP FROM user_message WHERE (broid = $id AND userid = $myid AND privacy = 1) OR (broid = $myid AND userid = $id AND privacy = 1) ORDER BY timestamp DESC");
	
 while($in = mysql_fetch_array($data)) {
		$uid = $in['userid'];
		$hash = $in['hash'];
		$msg = urldecode($in['message']);
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		$broid = $in['broid'];
		
			$div = '';
			
		$time = time_elapsed_string( $in['TIMESTAMP'] );
	echo '<div class="_msg" id="'.$hash.'" >'.$div.'
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> messaged: </div>
		<div class="txt hr">'.$time.' | '.getLike($hash).' </div>
	   <div class="txt t">'.$msg.'</div>
	</div>';

	}
?>

</div>


<?php
 if( $id == $_SESSION['id'] ) {
	echo '<div id="req" style="display: none;" >';
	echo '<h3>Friend Requests</h3>';
	
	$data = mysql_query("SELECT userid FROM user_friends WHERE broid = $id AND accepted = 0");
	
	while( $res = mysql_fetch_array($data) ) {
	    $uid = $res['userid'];
		$query = mysql_query("SELECT CONCAT(FirstName, ' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($query);
		
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		
		echo '<div class="_msg" id="req-'.$uid.'" >
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> wants to be your friend. </div>
		<div class="txt hr"> <a onClick="reqacc('.$uid,');" >Accept</a> | <a onClick="reqdec('.$uid,');">Decline</a></div>
	</div>';
	}
	
	echo '</div>';
	
echo '	<div id="inbox" style="display: none;" >
<h3>Messages</h3>';

	$myid = $_SESSION['id'];
	$data = mysql_query("SELECT userid, message, hash, TIMESTAMP FROM user_message um WHERE (broid = $myid AND privacy = 1) AND id = (SELECT max(id) FROM user_message mm WHERE um.userid = mm.userid AND broid = $myid AND privacy = 1)  ORDER BY id DESC");
	
 while($in = mysql_fetch_array($data)) { //print_r($in);
		$uid = $in['userid'];
		$hash = $in['hash'];
		$msg = urldecode($in['message']);
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		
			$div = '';
			
		$time = time_elapsed_string( $in['TIMESTAMP'] );
	echo '<div class="_msg" id="'.$hash.'" >'.$div.'
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> messaged: </div>
		<div class="txt hr">'.$time.' | '.getLike($hash).' </div>
	   <div class="txt t">'.$msg.'</div>
	</div>';

	}
	
	echo '</div>';
}
?>
<style>
	.edit {
		padding: 0px 20px;
	}
h5 {
	font-weight: 300;
	margin-left: -10px;
	margin-bottom: 5px;
}
.edit #aboutmebox {
	width: 100%;
	height: 80px;
	margin: 0;
 }
 
#genreList {
    width: 110%; /*your fixed height*/
	padding: 0px;
	margin-left: -30px;
    -webkit-column-count: 4;
       -moz-column-count: 4;
            column-count: 4;
}
#genreList li {
    display: inline-block; /*necessary*/
	 width: 320px;
	 font-size: 10pt;
}

#genreList li input {
	width: 20px;
	vertical-align: centre;
}

#artist {
	line-height: 10px;
	margin-left: 5px;
}

#artistList {
	display: block;
	font-size: 10pt;
	list-style: none;
}

#artistList li {
	display: block
	line-height: 10px;
	padding-right: 10px;
}

#artistList li i {
	cursor: pointer;
}

#file {
	border: 1px solid #DDDDDD;
	margin-bottom: 5px;
}

</style>
<?php
	if( $id == $_SESSION['id'] ) {
	$sql = mysql_query("SELECT * FROM user_profile WHERE userid = $id");
	$res = mysql_fetch_array($sql);
	
	$aboutme = $res['aboutme'];
	$genre = $res['genre'];
	$artist = $res['artist'];
	
	$alist = explode("," , $artist);
echo '<div id="editProfile" style="display: none;">
	<h3>Edit Profile</h3>
	<div class="edit">
		<h5>Profile Picture:</h5>
		<form enctype="multipart/form-data" method="POST" action="upload_pic.php" >
			<input id="file" name="file" type="file" />
			<input type="submit" value="Upload" />
		</form>
	
		
		<h5>About Me:</h5>
		<textarea id="aboutmebox">'.$aboutme.'
		</textarea>';
		
echo '<h5>Artist(s) you listen to: </h5>
		<input type="text" id="artist" > </input>
		<br>
		<ul id="artistList"> ';
		for( $i = 0; $i < count($alist) - 1; $i++ )
			echo '<li><i class="fa fa-fw fa-times" />'.$alist[$i].'</li>';
	  echo '</ul>';
	
	$array = array('Acoustic', 'Alternative', 'Folk', 'Country', 'Rock', 'Metal', 'R&B', 'Hip-Hop', 'Rap', 'Dance', 'Latin', 'Blues', 'Electronic', 'Funk', 'Jazz', 'Pop', 'Soul', 'Contemporary', 'Classical', 'Reggae', 'New Age', 'African', 'Ska', 'Holiday', 'Comedy', 'Club', 'Rave', 'Trance', 'Slow', 'Love', 'Soft');
	$checked = "";
	echo'<h5>Genre(s) which I listen to:</h5>
		<ul id="genreList">';
		for( $i = 0; $i < count($array); $i++) {
			if( strpos($genre, $array[$i]) !== false )
				$checked = "checked";
			else
				$checked = "";
			
			echo '<li> <input type="checkbox" value="'.$array[$i].'" name="genre" '.$checked.' >'.$array[$i].'</input> </li>';
		}
		echo '</ul>	


	</div>
			<input type="button" onClick="updateProfile();" value="Update" ></input>
			<div style="display: block;"> <br> </div>
</div>';
 }
?>

	</div>
 </div>
</div>

 <script src="js/pro-script.js"></script>
 </div>
</body>

</html>
