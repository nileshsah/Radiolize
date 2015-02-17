<?php  
include 'php/db.php';
session_start();

if(isset($_SESSION['loggedin']))
{     die("You are already logged in!"); }
if (!isset($_GET['username']) || !isset($_GET['password'])) {
     header( "Location: index.php" );
}



   $name = mysql_real_escape_string($_GET['username']);
   $pass = md5(mysql_real_escape_string($_GET['password']));
   $mysql = mysql_query("SELECT * FROM user_login WHERE  LOWER(username) = LOWER('".$name."') AND password = '".$pass."'");
   $count = mysql_num_rows($mysql);

//echo "SELECT * FROM user_login WHERE username ='".$name."' AND password = '".$pass."'";

	
if($count < 1)
   {   $posts =  array( 'auth' => 'INCORRECT'); }
else {
   $data = mysql_query("SELECT id,FirstName, LastName, propic FROM user_login WHERE username ='".$name."' AND password = '".$pass."'");
   $info = mysql_fetch_array( $data );

   session_regenerate_id();
   $_SESSION['loggedin'] = "TRUE";    $_SESSION['FirstName'] = $info['FirstName']; $_SESSION['LastName'] = $info['LastName']; $_SESSION['id'] = $info['id'];
   $_SESSION['propic'] = $info['propic'];
   session_write_close();
	
	$posts =  array( 'auth' => 'CORRECT');
}

echo json_encode($posts);		

?>
