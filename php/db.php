<?php

$username = "root";
$password = "";
$hostname = "localhost";
$database = "radiolize";

$dbhandle = mysql_connect($hostname, $username, $password);
@mysql_select_db($database) or die( "Unable to select database");

 date_default_timezone_set('Asia/Calcutta');
 function time_elapsed_string($timestamp, $full = false) {
	$timestamp = strtotime($timestamp);
	$diff = (time() - $timestamp);
	
	if ($diff <= 0) {
		return 'Now';
	}
	else if ($diff < 60) {
		return grammar_date(floor($diff), ' second(s) ago');
	}
	else if ($diff < 60*60) {
		return grammar_date(floor($diff/60), ' minute(s) ago');
	}
	else if ($diff < 60*60*24) {
		return grammar_date(floor($diff/(60*60)), ' hour(s) ago');
	}
	else if ($diff < 60*60*24*30) {
		return grammar_date(floor($diff/(60*60*24)), ' day(s) ago');
	}
	else if ($diff < 60*60*24*30*12) {
		return grammar_date(floor($diff/(60*60*24*30)), ' month(s) ago');
	}
	else {
		return grammar_date(floor($diff/(60*60*24*30*12)), ' year(s) ago');
	}
}
 
 
function grammar_date($val, $sentence) {
	if ($val > 1) {
		return $val.str_replace('(s)', 's', $sentence);
	} else {
		return $val.str_replace('(s)', '', $sentence);
	}
}

function getLike( $hash ) {
		$txt = "";
		$myid = $_SESSION['id'];
		
		$sql = mysql_query("SELECT count(userid) as likes FROM hash WHERE hashcode LIKE '$hash'");
		$inf = mysql_fetch_array($sql);
		$count = $inf['likes'];	
		
		$sql = mysql_query("SELECT userid FROM hash WHERE hashcode LIKE '$hash' AND userid = $myid");
		if( mysql_num_rows($sql) > 0 )
			$txt = "Liked";
		else
			$txt = '<a onClick="postLike(\''.$hash.'\');" > Like </a>';
			
		$txt .= ' <i class="fa fa-thumbs-up fa-fw" />  <like>'.$count.'</like> ';
		
		return $txt;
}

?>
