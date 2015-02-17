<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$surl= 'http://'.parse_url($url, PHP_URL_HOST) . '/radiolize/';
    header("Location: ".$surl."home.php");
}

?>
<html>
<head>
<script type="text/javascript" src="js/jquery.min.js"></script>

<script>      
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

<script>
function auth() {
	var url = "auth.php?username=" + $("#username").val() + "&password=" + $("#password").val();
	console.log(url);
	$.getJSON( url, function(data) {
		console.log(data);
		if( data.auth == "CORRECT" )
			location.href = "home.php";
		else
			$("#login h3").css("display", "block");
	});
			
}
</script>

	
<link href="css/basic-style.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/init.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/home.css" media="all" rel="stylesheet" type="text/css" /> 
<link href="css/player-main.css" media="all" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="css/font-awesome.min.css">

</head><body>
  
 <div class="main">
    <header class="header" style="height: 10%">
  <div class="sidebar">
    <h1 class="logo">
      <a href="#">Radio<strong>lize</strong></a>
    </h1>
   </div>
      
    </header>

    
<div id="tbody">
	
	<div class="wrapper">

<div id="biz">
<h1> ConnectTune</h1>
<h2>    Where Your Music Belongs</h2>
	<div class="player" style="opacity: 1; display: none;">
	  <div class="art"></div>
	  <div class="info1">
      <div class="title">DILLONFRANCIS</div>
      <div class="song">Flux Pavilion &amp; Dillon Francis - Im The One</div>
	    <div class="progress">
	      <div class="progress-bar"></div>
	    </div>
	  </div>  
	  <div class="controls">
	    <button class="play glyphicon glyphicon-play"></button>    
	    <button class="backward glyphicon glyphicon glyphicon-backward"></button>
	    <button class="forward glyphicon glyphicon-forward"></button>      
      <div class="settings glyphicon glyphicon-cog"></div>
	  </div>
	</div>
	
</div>
<div id="login" >
	<h1>Log in</h1>
  <form>
	  <h3>Incorrect Credentials !</h3>
    <input type="input" id="username" placeholder="Email" />
    <input type="password" id="password" placeholder="Password" /><br>
    <cb style="border: 0; padding: 0;"><input type="checkbox" name="rememberMe" id="rememberMe" />
	<label for="rememberMe">Remember me on this computer</label></cb>
    <input type="button" onClick="auth();" value="Log in" />
    <a class="facebook">Sign up with Facebook</a>
  </form>
 </div> 


	</div>
</div>



    <div class="footer" style="height: 3%">
		<p class="copyright">&copy; 1999-2013 ConnectTune Inc. <br>
</p>
    </div>
</div>		

</body>
</html>
