<?php
 session_start();
if(isset($_SESSION['loggedin']))
{
    header("Location: home.php");
}
?>

<html>

<head>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<title>Radiolize</title>
 
<style>
#city:focus{
    background: url('images/loading.gif') right center no-repeat;
  }
  
body {
	margin: 0px;
	padding: 0px;
	background: url(images/music.jpg);
	background-size: cover;
	height: 100%;
	font-family: 'Open Sans',Verdana,Arial,sans-serif;
}

.headbar {
	background: #363636;
	width: 100%;
	height: 25px;
 }
.bar {
	z-index: -1;
	position: absolute;
	background: #363636;
	margin-left: 10px;
	width: 290px;
	height: 90px;
 }
	
 
.headbar h3 {	
	font-weight: 100;
	float: right;
	color: white;
	font-size: 13px;
	margin-top: 4px;
	margin-right: 15px;
}

.header {
	z-index: 0;
	background-color: rgba(88, 93, 90, 0.5);
	width: 100%;
	height: 70px;
	padding-top: 10px;
 }
 
 .header img {
	width: 70px;
	height: 70px;
	margin: -5px 0px 0px 20px;
	vertical-align: center;
	float: left;
 }
 
 .footer {
	position: fixed;
	background-color: rgba(54, 54, 54, 0.5);
	bottom: 0px;
	width: 100%;
	padding-top: 5px;
	height: 20px;
	font-weight: 300;
	color: white;
	font-size: 10pt;
	text-align: center;
 }

 .header span {
	font-weight: 500;
	font-size: 40px;
	color: white;
	margin: 10px 0px 0px 10px;
 }

  ul.menu {
	float: right;
	color: white;
 }
  ul.menu li {
	font-weight: 600;
	font-size: 17px;
	float:left;
	display; inline;
	padding-right: 20px;
	list-style: none;
	cursor: pointer;
 }
 
 ul.menu li img {
	width: 35px;
	height: 35px;
	margin-right: 10px;
 }
 
 .message {
	margin-top; 210px;
	margin-left: 120px;
	width: 580px;
	padding-top: 50px;
	height: auto;
 }
 
 .message h1 {
	font-weight: 500;
	font-size: 72px;
	color: white;
	line-height: 70px;
 }
 .message p {
	margin-top: -20px;
	font-weight: 100;
	font-size: 17px;
	color: white;
	line-height: 18px;
 }
 
 li.button {
	margin-top: -15px;
	padding: 15px;
	background: #7d7e7d;
	-moz-border-radius: 15px;
	border-top-left-radius: 15px;
	border-bottom-left-radius: 15px;
background: #8fc800;
background: -moz-linear-gradient(top,  #8fc800 0%, #8fc800 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8fc800), color-stop(100%,#8fc800));
background: -webkit-linear-gradient(top,  #8fc800 0%,#8fc800 100%);
background: -o-linear-gradient(top,  #8fc800 0%,#8fc800 100%);
background: -ms-linear-gradient(top,  #8fc800 0%,#8fc800 100%);
background: linear-gradient(to bottom,  #8fc800 0%,#8fc800 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc800', endColorstr='#8fc800',GradientType=0 );

	
 }
	
	fieldset {
	border: none;
	margin: 0;
}

input {
	border: none;
	font-family: inherit;
	font-size: inherit;
	margin: 0;
	-webkit-appearance: none;
}

input:focus {
  outline: none;
}

input[type="submit"] { cursor: pointer; }

.clearfix { *zoom: 1; }
.clearfix:before, .clearfix:after {
	content: "";
	display: table;	
}
.clearfix:after { clear: both; }

/* ---------- LOGIN-FORM ---------- */

#login-form {
	position: absolute;
	top: 120px;
	right: 20px;
	width: 300px;
}

#login-form h3 {
	background-color: #282830;
	border-radius: 5px 5px 0 0;
	color: #fff;
	font-size: 14px;
	padding: 20px;
	text-align: center;
	text-transform: uppercase;
}

#login-form fieldset {
	background: rgba(54, 54, 54, 0.5);
	border-radius: 0 0 5px 5px;
	padding: 20px;
	position: relative;
}

#login-form fieldset:before {
	background: rgba(54, 54, 54, 0.5);
	content: "";
	height: 8px;
	left: 50%;
	margin: -4px 0 0 -4px;
	position: absolute;
	top: 0;
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	transform: rotate(45deg);
	width: 8px;
}

#login-form input {
	font-size: 14px;
}

#login-form input[type="username"],
#login-form input[type="password"] {
	border: 1px solid #dcdcdc;
	padding: 12px 10px;
	width: 238px;
	background: rgba(255, 255, 255, 0.5);
}

#login-form input[type="username"] {
	border-radius: 3px 3px 0 0;
}

#login-form input[type="password"] {
	border-top: none;
	border-radius: 0px 0px 3px 3px;
}

#login-form input[type="button"] {
	background: #1dabb8;
	border-radius: 3px;
	color: #fff;
	float: right;
	font-weight: bold;
	margin-top: 20px;
	padding: 12px 20px;
}

#login-form input[type="button"]:hover { background: #198d98; }

#login-form footer {
	font-size: 12px;
	margin-top: 16px;
}


.info {
	background: #e5e5e5;
	border-radius: 50%;
	display: inline-block;
	height: 20px;
	color: grey;
	line-height: 20px;
	margin: 0 10px 0 0;
	text-align: center;
	width: 20px;
}

 footer p a {
	color: white;
	text-decoration: none;
}
 
.register {
  position: absolute;
  top: 120px;
  right: 30px;
  width: 300px;
  padding: 30px;
  border-radius: 5px;
  background: rgba(54, 54, 54, 0.55);

}

.register h1 {
  position: absolute;
  top: -50px;
  left: 0;
  width: 300px;
  margin: 0;
  text-align: center;
  color: #fff;
  text-shadow: 0 1px 0 rgba(0, 0, 0, 0.3);
}

.register h1 span {
  display: inline-block;
  margin: 0 5px 0 0;
  font: 30px fontawesome;
}

.register input {
  font-weight: 300;
  display: block;
  width: 100%;
  line-height: 20px;
  margin: 0 0 10px;
  padding: 5px;
  color: #fff;
  font-size: 11pt;
  border: 1px solid rgba(0, 0, 0, 0.2);
  background: rgba(0, 0, 0, 0.1);
}

.register [placeholder]::-webkit-input-placeholder{
  font-size: 10pt;
  font-weight: 300;
  color: #fff;
}

.register [placeholder]:focus::-webkit-input-placeholder {
  color: transparent;
}

.register button {
  display: block;
  width: 100%;
  height: 40px;
  padding: 0 20px;
  font-weight: 800;
  font-size: 16px;
  line-height: 40px;
  text-align: center;
  text-transform: uppercase;
  color: #3c5977;
  background: linear-gradient(to bottom, #dde6ee 0%, #aabfd4 100%);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.75);
}

span.error {
	font-size: 10pt;
	color: white;
	line-height: 30px;
}

.gender select {
   background: transparent;
   width: 268px;
   padding: 3px;
   font-size: 13px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   -webkit-appearance: none;
   }
   
   .gender {
   width: 300px;
   height: 25px;
   overflow: hidden;
   background: url(images/down_arrow_select.jpg) no-repeat right #ddd;
   border: 1px solid #ccc;
   margin-bottom: 15px;
   }
   
   .but {
	cursor: pointer;
	}
</style>

</head>

<body>
<div class="headbar"> <h3> </h3> </div>
<div class="bar" > </div>
<div class="header">
	<img src="https://cdn1.iconfinder.com/data/icons/woothemes/PNG/signal.png" />
 <span> Radio<b>lize</b>
 </span>
 
	<ul class="menu">
		<li onclick="location.href='help.php'; ">Help</li>
		<li onClick="toggle();"><img class="png" src="images/LOGIN.PNG" /> Login</li>
		<li onClick="toggleReg();" class="button">Register</li>
	</ul>
</div>

<div class="message">
 <h1> THE SOCIAL "LISTENING" NETWORK </h1>
 <p> Seperated by distance, Connected by "Music" :D<br><br>Radiolize gives you access to over 15 million songs for free ! With a radio station of your own, Life
just can't get any better. Play songs of your favourite artist and share it with people like you ! <br>Discover.Listen.Share
 </p>
 </div>
 
   <div id="login-form" style="display: none;" >
        <fieldset>

            <form >

                <input id="user" type="username" required value="Username" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "> 
                <input id="pass" type="password" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "> 
                <input class="but" type="button" onClick="auth();" value="Login">
				
				<span class="error" id="LoginError" style="display: none;" >Incorrect Credentials</span>
                <footer class="clearfix">

                    <p><span class="info" >?</span><a href="#">Forgot Password</a></p>

                </footer>

            </form>

        </fieldset>

    </div> 
	
	<div id="register" style="display: none;">
		<form action="" class="register">
  <div style="display: inline; !important" >
	<input id="fname" style="width: 145px; display: inline; !important" placeholder="Your First Name" type="text">
	<input id="lname" style="width: 145px; display: inline; !important"  placeholder="Your Last Name" type="text">
  </div>
  <input id="email" placeholder="Your email address" type="email">
  <input id="city" placeholder="Your City" >
  <input id="datepicker" placeholder="Your date of birth" >
 
 <div class="gender">
 <select>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
</div>

  <input id="username" placeholder="Desired username" type="text">
  <input id="password" placeholder="Create a password" type="password">
  <input id="password2"  placeholder="Confirm password" type="password">
  <span class="error" id="RegError" style="display: none;" > Username Exists ! </span>
  
  <button>
    step in
  </button>
</form>
	</div>
	
	

	
<div class="footer">&copy; Copyright 2013 Radiolize, Inc. All rights reserved. </div>
</body>

<script>
	var login = false;
	var reg = false;

$(function () {
	$("#pass").keypress(function(e) {
	 if( e.keyCode == 13 )
		auth();
	});
});

function toggle() {
	if( login )
		$("#login-form").hide();
	else
		$("#login-form").show();
		
	reg = false;
	$("#register").hide();
	
	login = !login;
}

function toggleReg() {
	if( reg )
		$("#register").hide();
	else
		$("#register").show();
	
	login = false;
	$("#login-form").hide();
	
	reg = !reg;
}

$(function() {
    
    $( "#city" ).autocomplete({
      source: function( request, response ) {
        $.ajax({
          url: "http://ws.geonames.org/searchJSON",
          dataType: "jsonp",
          data: {
            featureClass: "P",
            style: "full",
            maxRows: 12,
            name_startsWith: request.term
          },
          success: function( data ) {
            response( $.map( data.geonames, function( item ) {
              return {
                label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
                value:  item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName
              }
            }));
          }
        });
      },
      minLength: 2,
	  select: function( event, ui ) {
        $("#city").val(ui.item.label);
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
  });
  
  function auth() {
	var url = "auth.php?username=" + $("#user").val() + "&password=" + $("#pass").val();
	console.log(url);
	$.getJSON( url, function(data) {
		console.log(data);
		if( data.auth == "CORRECT" )
			location.href = "home.php";
		else
			$("#LoginError").show();
	});
			
}
 $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'yy-mm-dd',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
  
 $(function () {
	$(".register").on("submit", function (e) {
	e.preventDefault();
//	$("button").text("Processing..");
	var com = 1;
		err("");
		
	$("#register input").each(function() {
                if( (this.value) == "" ) {

                    err("Please enter " + this.placeholder);
					com = 0;
					return false ;
                }
            });
			
	if( com == 1 ) {
		 var regex = /[*|,\\":<>\[\]{}`';()@&$#%!+-]\s/g;
			if(regex.test($("#username").val()) || $("#username").val().length < 3  || $("#username").val().indexOf(" ") !== -1 )  {
				err("Invalid Username !");
				return false;
			}
		
		if( $("#password").val() != $("#password2").val() )
			{ err("Password Mismatch :("); return false; }
			
		$.post("register.php", { username: $("#username").val(), password: $("#password").val(), email: $("#email").val(), Fname: $("#fname").val(), Lname: $("#lname").val(), gender: $("select").val(), dob: $("#datepicker").val(), city: $("#city").val() }, function (data) {
			if( data == "USERNAME" )
				err("Username Already Taken :(");
			else if( data == "ERROR" )
				err("Error ! Please recheck your fields ;(");
			else if( data == "ENTER" ) {
			  $("#user").val( $("#username").val() );
			  $("#pass").val( $("#password").val() );
			  auth();
			 }
			 $("button").text("Step In");
		});
			
	
	}
		return false;
	});
  });
function err( data ) {
	$("#RegError").text(data);
	$("#RegError").show();
}
	
</script>

</html>