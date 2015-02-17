<?php
include 'php/logged.php';
include 'php/db.php';
error_reporting(-1);
 $id = $_SESSION['id'];
 $data = mysql_query("SELECT TIMESTAMPDIFF(YEAR,dob,NOW()),  propic, username FROM user_login WHERE id = $id");
 
 $info = mysql_fetch_array($data);
		$pic = $info['propic'];
		$username = $info['username'];
		
$mysql = mysql_query("SELECT * FROM user_broadcast WHERE userid ='".$_SESSION['id']."'");
$count = mysql_num_rows($mysql);
	
if($count < 1)
	$checkbox = "";
else
	$checkbox ="checked";
?>

<html><head>
		<meta charset="utf-8">

		
<style class="cssdeck">

body {
		background: url(images/music.jpg);
	 background-repeat: no-repeat;
	background-attachment: fixed;
}

.plyr_holder {
	font-family: 'Open Sans', sans-serif;
	width: 95%;
	position: relative;
	margin: 60px auto;
	z-index: 1;
}

.shift {
	margin-left: 10px;

}

.plyr_img img {
	width: 100px;
	height: 100px;
}
.plyr_img {
	position: absolute;
	width: 100px;
	height: 100px;
	overflow: hidden;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	box-shadow: 0 0 0 6px rgba(255,255,255,1),     0 0 0 7px rgba(0,0,0,0.1),    0 2px 0 6px rgba(255,255,255,1),    0 3px 0 6px rgba(0,0,0,0.1),    0 0 8px 7px rgba(0,0,0,0.2);
	z-index: 999;
	overflow: hidden;
	top: -34px;
	left: 22px;
}
.plyr_details {
	position: relative;
background: rgb(255,255,255);
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2YzZjNmMyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUxJSIgc3RvcC1jb2xvcj0iI2VkZWRlZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(243,243,243,1) 50%, rgba(237,237,237,1) 51%, rgba(255,255,255,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(50%,rgba(243,243,243,1)), color-stop(51%,rgba(237,237,237,1)), color-stop(100%,rgba(255,255,255,1)));
background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%);
background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%);
background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%);
background: linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 );
width: 100%;
	height: auto;
	z-index: 998;
	border: 1px  solid rgba(0,0,0,0.23);
	box-shadow: inset 0 1px 1px 0px rgba(255,255,255,1),     inset 0 0 8px 5px rgba(0,0,0,0.05),    0 0 8px 0 rgba(0,0,0,0.2);
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
.plyr_details ul.play {
	margin: 0;
	padding: 0;
	position: absolute;
	list-style-type: none;
	left: 140px;
}
.plyr_details ul.play li {
}
.plyr_details ul.play li h1.title {
	font-size: 22px;
	font-weight: 700;
	color: #46565d;
	text-shadow: 1px 1px 0px rgba(255,255,255,0.8);
	line-height: 13px;
}

.plyr_details h1.subtitle {
	font-size: 22px;
	font-weight: 700;
	color: #46565d;
	margin-left: 20px;
	text-shadow: 1px 1px 0px rgba(255,255,255,0.8);
	line-height: 13px;
}

.plyr_details ul.play li.song {
	color: #526269;
	font-size: 13px;
	text-shadow: 1px 1px 0px rgba(255,255,255,0.8)
}
.plyr_details ul.play li.album {
	color: #1268b1;
	font-size: 11px;
	text-shadow: 1px 1px 0px rgba(255,255,255,0.8)
}


.slideThree input[type=checkbox] {
	visibility: hidden;
}
.slideThree {
	width: 80px;
	right: 15px;
	top: 0px;
	height: 26px;
	background: #333;
	margin: 20px auto;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	position: absolute;

	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,0.2);
}

.slideThree:after {
	content: 'OFF';
	font: 12px/26px Arial, sans-serif;
	color: #000;
	position: absolute;
	right: 10px;
	z-index: 0;
	font-weight: bold;
	text-shadow: 1px 1px 0px rgba(255,255,255,.15);
}

.slideThree:before {
	content: 'ON';
	font: 12px/26px Arial, sans-serif;
	color: #00bf00;
	position: absolute;
	left: 10px;
	z-index: 0;
	font-weight: bold;
}

.slideThree label {
	display: block;
	width: 34px;
	height: 20px;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;

	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
	cursor: pointer;
	position: absolute;
	top: 3px;
	left: 3px;
	z-index: 1;

	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.3);
	background: #fcfff4;

	background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
}

.slideThree input[type=checkbox]:checked + label {
	left: 43px;
}

.control p {
	margin-left: 20px;
}

.control p [type="checkbox"] {
	padding-right: 30px;
}

.control p input[type=checkbox] {
	cursor: pointer;
	position: relative;
	visibility: hidden;
}

.control p input[type="checkbox"]:after {
	border: 1px solid #166B94;
	border-radius: 3px;
	color: #fff;
	content: "";
	display: block;
	height: 16px;
	line-height: 16px;
	position: absolute;
	text-align: center;
	visibility: visible;
	width: 16px;
}

.control p input[type=checkbox]:checked:after {
	border: 1px solid #979797;
	color: #979797;
	content: "✓";
}

.control p input[type=checkbox]:not(:checked) + label {
	color: #979797;
	font-weight: normal;
	text-decoration: line-through;
}

.control p label {
	color: #166B94;
	font-weight: bold;
	margin-left: 12px;
}

.control push {
	float: right;
	margin-right: 20px;
	margin-top: 8px;
	
	 color: #fff;
  background: #979797;
  border: solid 1px #fff;
  border-radius: 2px;
  padding: 5px;
  cursor: pointer;
  border-radius: 4px;
}

</style></head>
	<body class="radio">
	
<div class="plyr_holder">  
	

  <div class="plyr_img">
    <img src="propic/<?php echo $pic; ?>" >
  </div>  
  <div class="plyr_details" style="height: 100px;">    
	<section>
		<div class="slideThree">	
			<input type="checkbox" value="None" id="slideThree" name="check" onClick="radio();" <?php echo $checkbox; ?>/>
			<label for="slideThree"></label>
		</div>
	</section>
 
    <ul class="play">      
      <li>
      <h1 class="title">" <?php echo $username; ?> " Radio</h1>
      </li>      
      <li class="song">Now Playing:
      </li>      
      <li class="album">Next: 
      </li>    
    </ul>    
  </div>  
  <br>
  
   <div class="plyr_details control">    
    <h1 class="subtitle">Control Panel</h1>
	<h4 style="margin-left: 30px;">Shuffle Songs From: </h4>
<?php

	$data = mysql_query("SELECT playlist FROM user_broadcast WHERE userid ='".$_SESSION['id']."'");
	$info = mysql_fetch_array( $data );
	
	$plist = $info['playlist'];
	 $data = mysql_query("SELECT id, name, playtime FROM user_playlist WHERE userid ='".$_SESSION['id']."'");
		 while($info = mysql_fetch_array( $data )) {
			if( strpos( $plist, $info['id'] ) !== false )
				$check = "checked";
			else
				$check = "";
			echo '<p><input type="checkbox" '.$check.' id="'.$info['id'].'" /><label for="'.$info['id'].'">'.$info['name'].'</label></p>';
		}
		
		if( mysql_num_rows($data) == 0 )
			echo '<p>No playlist has been created yet. Start by creating a playlist !</p>';
?>
	  
  </div>
  <br />
  <div class="plyr_details control"> 
  <push onClick="updateList();">Update</push>
    <h1 class="subtitle">Upcoming Songs</h1>
    <h4 style="margin-left: 30px;"> </h4>
    <link rel="stylesheet" href="style.css" />
	<div>
	<ul id="sortable2" class="loadList">
<?php    

    
?>		
    </ul>
    </div> 
  </div>  
	

</div>
    
</body></html>
