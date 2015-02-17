<?php
	include 'php/db.php';
	include 'php/logged.php';
	
if( !isset($_GET['term']) ) die("");
	$q = "%";
	$q .= $_GET['term'];
	$q .= "%";
	$posts = array();
	
	$data = mysql_query("SELECT id, TIMESTAMPDIFF(YEAR,dob,NOW()), gender, location, FirstName, LastName, propic, username FROM user_login WHERE concat_ws(' ',FirstName, LastName)  LIKE '$q' LIMIT 6");
 
	while($info = mysql_fetch_array($data)) {		
		$id = $info['id'];
		$loc = $info['location'];
		$gen = $info['gender'];
		$FN = $info['FirstName'];
		$LN = $info['LastName'];
		$age = $info['TIMESTAMPDIFF(YEAR,dob,NOW())'];
		$pic = $info['propic'];
		$username = $info['username'];
		$name = $FN." ".$LN ;
		
		array_push( $posts, array( 'id'=> $id, 'name' => $name, 'loc'=> $loc, 'pic'=>$pic, 'gender'=> $gen, 'age'=> $age ) );
	}
	
echo json_encode($posts);
?>
	
		