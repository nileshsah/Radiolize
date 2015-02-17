<?php
 include 'php/db.php';
 
 if( !isset($_POST['username']) ) die("404 Bad Request");
 
 $fname = $_POST['Fname'];
 $lname = $_POST['Lname'];
 $email = $_POST['email'];
 $city = $_POST['city'];
 $dob = $_POST['dob'];
 $gender = $_POST['gender'];
 $username = $_POST['username'];
 $pass = md5($_POST['password']);
 
 $sql =  mysql_query("SELECT * FROM user_login WHERE  LOWER(username) = LOWER('".$username."')");
 if( mysql_num_rows($sql) > 0 )
	die("USERNAME");
 
 //echo "SELECT * FROM user_login WHERE  LOWER(username) = LOWER('".$username."')";
  //print("INSERT INTO user_login( username, password, FastName, LastName, gender, dob, location, email) VALUES( '$username', '$pass', '$fname', '$lname', '$gender', '$dob', '$city', '$email' )");

 $sql = mysql_query("INSERT INTO user_login( username, password, FirstName, LastName, gender, dob, location, email) VALUES( '$username', '$pass', '$fname', '$lname', '$gender', '$dob', '$city', '$email' )");
	if( !$sql )
		die("ERROR");
	else {
		$id = mysql_insert_id();
		$sql = mysql_query("INSERT INTO user_profile( userid, aboutme ) VALUES( $id, 'Nothing added yet.' )");

		$sql = mysql_query("INSERT INTO user_check ( userid ) VALUES( $id )");
	}
		
  die("ENTER");
 
 ?>
 

