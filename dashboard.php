<?php
	include 'php/db.php';
	include 'php/logged.php';
	
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	
	$id = $_SESSION['id'];

 $data = mysql_query("SELECT TIMESTAMPDIFF(YEAR,dob,NOW()), gender, location, FirstName, LastName, propic, username FROM user_login WHERE id = $id");
 
 $info = mysql_fetch_array($data);
 
		$loc = $info['location'];
		$gen = $info['gender'];
		$FN = $info['FirstName'];
		$LN = $info['LastName'];
		$age = $info['TIMESTAMPDIFF(YEAR,dob,NOW())'];
		$pic = $info['propic'];
		$username = $info['username'];
		
 $name = $FN." ".$LN;

?>

<html>

<body>
<div id="profile">

<style>
#profile {
	overflow-x: hidden;
	min-height: 100%;
	background: url(images/music.jpg);
	background-repeat: no-repeat;
	background-attachment: fixed;
}
.wrapper {
	width: 100%;
	background-color: rgba( 255, 255, 255, 0.5);
	margin: 0px auto;
	min-height: 100%;
	padding: 30px;
}

.propic {
	width: 180px;
	height: 160px;
	border-style: solid;
	border-width: 1px;
	border-color: #C6C6C6;
	background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBvcLbwzyYVmDh1YOMNMgGF7sk64GFruvBFx6JOjcNTi7OonBE);
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
	font-weight: 600;
}

.box {
	border: 0px solid #808080;
	width: 90%;
	border-radius: 4px;
	background-color: rgba( 255, 255, 255, 0.6);
	padding: 5px 0px 0px 20px;
}

 @-moz-document url-prefix() {
                       .box{
							margin: auto;
                    }
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

.hr {
	font-size: 5pt;
	color: grey;
}

._msg ul {
  width: 100%;
  list-style:none;
  padding:0;
}
    
._msg ul li {
	margin-left: 30px;
	font-size: 10pt;
	line-height: 20px;
  }
._msg ul li a{
	color: black;
 }

.txt a { color: blue; }

#people-list {
    width: 95%; /*your fixed height*/
    -webkit-column-count: 5;
       -moz-column-count: 5;
            column-count: 5;
	margin-left: -25px;
}
#people-list li {
    display: inline-block; /*necessary*/
	 width: 180px;
	 padding-bottom: 15px;
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

.box h3 {
	line-height: 10px;
	font-weight: 500;
}

.text {
	font-size: 10pt;
	padding: 10px;
	text-align: center;
}
	
</style>

 <div class = "wrapper">
 
 
	<div class="user"> <b>Hi <?php echo $username; ?> !</b></div>
	

<div class="box" >
	<h3>Trending Now </h3>
	<div class="_msg" >
	<ul>
<?php
		$sql = mysql_query("SELECT DISTINCT song_name, song_href FROM user_songs WHERE userid = 0 AND pid = 0 ORDER BY timestamp, RAND() LIMIT 5");
		while( $inf = mysql_fetch_array($sql) ) {
			$sname = $inf['song_name'];
			$slink = $inf['song_href'];
			
			echo '<li> <i class="fa fa-music" /> <a href= "'.urldecode($slink).'" onclick="playaudio(\''.urlencode($slink).'\');">'.$sname.'</a></li>';
		}

?>
		<ul>
	</div>
	
</div>
<br>
<div class="box">
 <h3>People You May Know</h3>
 <ul id="people-list">
 <?php
		$sql = mysql_query("SELECT GROUP_CONCAT(broid) AS broid, GROUP_CONCAT(userid) AS userid FROM user_friends WHERE userid = $id OR broid = $id");
		$res = mysql_fetch_array($sql);
		if( $res['broid'] != "" ) {
			$friend = $res['broid'];
		  if( $res['userid'] != "" )
			$friend .= ",".$res['userid'];
		}
		else if( $res['userid'] != "" )
			$friend = $res['userid'];
		else
			$friend = "0";
		
			
		//print("SELECT id,CONCAT(FirstName, ' ', LastName) AS name, gender, TIMESTAMPDIFF(YEAR,dob,NOW()) AS age, propic, location FROM user_login WHERE id NOT IN ($friend) ORDER BY RAND() LIMIT 5");
		$query = mysql_query("SELECT id, CONCAT(FirstName, ' ', LastName) AS name, gender, TIMESTAMPDIFF(YEAR,dob,NOW()) AS age, propic, location FROM user_login WHERE id NOT IN ($friend) ORDER BY RAND() LIMIT 5");
				 
					 
	while( $inf = mysql_fetch_array($query) ) 
	 echo '<li><a href="#profile|'.$inf['id'].'" ><img src="propic/'.$inf['propic'].'" /> <text>'.$inf['name'].'</text> </a><br><text>'.$inf['gender'].', '.$inf['age'].' </text> </li>';
?>
 </ul>
</div>


 <div class="box" >
	<h3>Fan Updates</h3>
	
<?php
	$sql = mysql_query("SELECT GROUP_CONCAT(fanid) AS fanid FROM user_fans WHERE userid = $id");
	$res = mysql_fetch_array($sql);
	$fan = $res['fanid'];
	
	if( $fan == "" )
		$fan = "0";
	
	$count = 0;
 $data = mysql_query(" (SELECT 'MESSAGE', id, userid, broid, message, hash, TIMESTAMP FROM user_message WHERE userid IN ($fan) AND broid = userid AND privacy = 0)
						UNION
						(SELECT 'RECOMMEND', id, userid, broid, songlist, hash, timestamp FROM user_recommend WHERE userid IN($fan) )
						ORDER BY timestamp DESC LIMIT 20" );
 
 while($in = mysql_fetch_array($data)) { //print_r($in);
	$count++;
	
	if( $in[0] == 'MESSAGE' ) {
		$uid = $in['userid'];
		$hash = $in['hash'];
		$msg = urldecode($in['message']);
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		
	
		$time = time_elapsed_string( $in['TIMESTAMP'] );
	echo '<div class="_msg" id="'.$hash.'" >
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> shouted: </div>
		<div class="txt hr">'.$time.' | '.getLike($hash).' </div>
	   <div class="txt t">'.$msg.'</div>
	</div>';

	}
else if( $in[0] == 'RECOMMEND' ) {
		
		$uid = $in['userid'];
		$hash = $in['hash'];
		$msg = urldecode($in['message']);
		$time = time_elapsed_string( $in['TIMESTAMP'] );
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		
		$sql = mysql_query("SELECT message FROM user_recommend WHERE id = ".$in['id'] );
		$inf = mysql_fetch_array($sql);
		
	echo '<div class="_msg" id="'.$hash.'" >
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

if( $count < 5 )
		echo '<div class="text">Add more fans to get more updates.</div>';
?>

	
	</div>
	
<br>
 <div class="box" >
	<h3>Friends Updates</h3>
	
<?php
	
	$count = 0;
 $data = mysql_query(" (SELECT 'MESSAGE', id, userid, broid, message, hash, TIMESTAMP FROM user_message WHERE userid IN ($friend) AND privacy = 0 AND userid <> $id)
						UNION
						(SELECT 'RECOMMEND', id, userid, broid, songlist, hash, timestamp FROM user_recommend WHERE userid IN($friend) AND ( userid NOT IN($fan) AND userid <> broid ) AND userid <> $id)
						UNION
					   (SELECT 'FRIEND', id, userid, broid, ' ', hash, timestamp FROM user_friends WHERE (userid IN ($friend) OR broid IN ($friend)) AND accepted = 1)
						ORDER BY timestamp DESC LIMIT 20" );
	
 while($in = mysql_fetch_array($data)) { //print_r($in);
	$count++;
	
	if( $in[0] == 'MESSAGE' ) {
		$uid = $in['userid'];
		$hash = $in['hash'];
		$msg = urldecode($in['message']);
		$broid = $in['broid'];
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$ppic = $inf['propic'];
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $broid");
		$inf = mysql_fetch_array($sql);
		$bname = $inf['name'];
		
		if( $broid == $uid )
			$bname = "";
	
		$time = time_elapsed_string( $in['TIMESTAMP'] );
	echo '<div class="_msg" id="'.$hash.'" >
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> shouted <a href="#profile|'.$broid.'">'.$bname.'</a>: </div>
		<div class="txt hr">'.$time.' | '.getLike($hash).' </div>
	   <div class="txt t">'.$msg.'</div>
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
		$info = mysql_fetch_array($sql);
		
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $broid");
		$inf = mysql_fetch_array($sql);
		$bname = $inf['name'];
		
		if( $broid == $uid )
			$bname = "";
	
		
	echo '<div class="_msg" id="'.$hash.'" >
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> recommended <a href="#profile|'.$broid.'">'.$bname.'</a>: </div>
		 <div class="txt hr">'.$time.' | '.getLike($hash).' </div>
		 <div class="txt t">'.$info['message'].'</div>
		<ul>';
		
	
		
		$sql = mysql_query("SELECT song_name, song_href FROM user_songs WHERE id IN ($msg)");
		while( $inf = mysql_fetch_array($sql) ) {
			$sname = $inf['song_name'];
			$slink = $inf['song_href'];

			echo '<li> <i class="fa fa-music" /> <a href= "'.urldecode($slink).'" onclick="playaudio(\''.urlencode($slink).'\');">'.$sname.'</a></li>';
		}

		echo '</ul> </div>';
	  
	 }
	 else if ( $in[0] == 'FRIEND' ) {
	 $time = time_elapsed_string( $in['TIMESTAMP'] );
	 $broid = $in['broid'];
	 
	 if( $in['userid'] == $id )
	  $uid = $in['broid'];
	 else
	  $uid = $in['userid'];
	  
	$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $uid");
	$inf = mysql_fetch_array($sql);
	$uname = $inf['name'];
	$ppic = $inf['propic'];
	$hash = $in['hash'];
	
	$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $broid");
		$inf = mysql_fetch_array($sql);
		$bname = $inf['name'];
		
		if( $broid == $uid )
			$bname = "";
	  
	echo '<div class="_msg" id="'.$hash.'" >
		<img class="pic" src="propic/'.$ppic.'" />
		<div class="txt"> <a href="#profile|'.$uid.'"><b>'.$uname.'</b></a> and <a href="#profile|'.$broid.'" >'.$bname.'</a> are now friends. </div>
		<div class="txt hr">'.$time.' | '.getLike($hash).' </div>
	</div>';
	
	}
}	 

if( $count < 5 )
		echo '<div class="text">Add more friends to get more updates.</div>';
?>

	
	</div>
	
 </div>
</div>


 </div>
</body>

</html>
