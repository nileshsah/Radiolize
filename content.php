<?php
 include 'php/db.php';
 include 'php/logged.php';
 
if( !isset( $_GET['q']) ) die("400 Bad Request");

 if( $_GET['q'] == 'msg' ) {
	$userid = $_SESSION['id'];
	$broid = $_POST['broid'];
	
	if( $broid == 0 )
		$broid = $userid;
		
	$msg = mysql_real_escape_string($_POST['msg']);
	$hash = md5($broid." ".time());
	
	$pvc = ( isset($_GET['pvc']) ) ? 1 : 0;
	
	$data = mysql_query("INSERT INTO user_message( userid, broid, message, privacy, hash, timestamp ) VALUES( $userid, $broid, '$msg', $pvc, '$hash', now())");
	$data = mysql_query("INSERT INTO hash( hash, likes) VALUES( '$hash', $userid )");
	
		$sql = mysql_query("SELECT CONCAT(FirstName,' ', LastName) AS name, propic FROM user_login WHERE id = $userid");
		$inf = mysql_fetch_array($sql);
		$uname = $inf['name'];
		$pic = $inf['propic'];
	
	echo '<div class="_msg" >
		<img class="pic" src="propic/'.$pic.'" />
		<div class="txt"> <a><b>'.$uname.'</b></a> shouted: </div>
		<div class="txt hr"> Now | <a>Like</a> <i class="fa fa-thumbs-up fa-fw" />0</div><br>
		<div class="txt">'.urldecode($msg).'</div>
		</div>';
}
else if( $_GET['q'] == 'rec' ) {
	
	$userid = $_SESSION['id'];
	$broid = $_POST['broid'];
	$msg = mysql_real_escape_string( $_POST['text'] );
	
	if( $broid == 0 )
		$broid = $userid;
		
	$songname = json_decode($_POST['name']);
	$songhref = json_decode($_POST['href']);
	$songtime = json_decode($_POST['time']);
	
	$songlist = '';
	
	for( $i = 0; $i < count($songname); $i++ ) {
		$sname = mysql_real_escape_string($songname[$i]);
		$data = mysql_query("INSERT INTO user_songs(song_name, song_href, song_time) VALUES('$sname', '$songhref[$i]', '$songtime[$i]')");
		$songlist .= $id = mysql_insert_id().",";
	 }
	 
	 $songlist .= '0';
	 $hash = md5($broid." ".time());

	 $data = mysql_query("INSERT INTO user_recommend( userid, broid, songlist, message, hash, timestamp ) VALUES( $userid, $broid, '$songlist', '$msg', '$hash', now() )" ); 
		 print("INSERT INTO user_recommend( userid, broid, songlist, message, hash, timestamp ) VALUES( $userid, $broid, '$songlist', '$msg', '$hash', now() )" ); 

}
else if( $_GET['q'] == 'fan' ) {

	$userid = $_SESSION['id'];
	$broid = $_POST['broid'];
	
	if( $broid == 0 )
		$broid = $userid;
	
	$hash = md5($broid." ".time());
		
	$data = mysql_query("INSERT INTO user_fans( userid, fanid, hash ) VALUES( $userid, $broid, '$hash' )");
}
else if( $_GET['q'] == 'defan' ) {
	$userid = $_SESSION['id'];
	$broid = $_POST['broid'];
	
	if( $broid == 0 )
		$broid = $userid;
		
	$data = mysql_query("DELETE FROM user_fans WHERE fanid = $broid AND userid = $userid");
}
else if( $_GET['q'] == 'req' ) {
	
	$userid = $_SESSION['id'];
	$broid = $_POST['broid'];
	
	if( $broid == 0 )
		$broid = $userid;
		
	$hash = md5($broid." ".time());
	
	$sql = mysql_query("DELETE FROM user_friends WHERE userid = $userid AND broid = $broid");
	$sql = mysql_query("DELETE FROM user_friends WHERE userid = $broid AND broid = $userid");
	
	$sql = mysql_query("INSERT INTO user_friends( userid, broid, accepted, hash ) VALUES ( $userid, $broid, 0, '$hash')");
}
else if( $_GET['q'] == 'reqacc' ) {

	$userid = $_SESSION['id'];
	$broid = $_POST['broid'];
	
	if( $broid == 0 )
		$broid = $userid;
		
	$sql = mysql_query("UPDATE user_friends SET accepted = 1, timestamp = now() WHERE userid = $broid AND broid = $userid");

}
else if( $_GET['q'] == 'reqdec' ) {

	$userid = $_SESSION['id'];
	$broid = $_POST['broid'];
	
	if( $broid == 0 )
		$broid = $userid;
		
	$sql = mysql_query("DELETE FROM user_friends WHERE userid = $userid AND broid = $broid");
	$sql = mysql_query("DELETE FROM user_friends WHERE userid = $broid AND broid = $userid");
	
	
}
else if( $_GET['q'] == 'like' ) {
	$hash = $_POST['hash'];
	$userid = $_SESSION['id'];
	
	$sql = mysql_query("INSERT INTO hash( hashcode, userid ) VALUES( '$hash', '$userid' )");
}
else if( $_GET['q'] == "del" ) {
	$hash = $_POST['hash'];
	
	$sql = mysql_query("DELETE FROM user_friends WHERE hash LIKE '$hash'");
	$sql = mysql_query("DELETE FROM user_recommend WHERE hash LIKE '$hash'");
	$sql = mysql_query("DELETE FROM user_message WHERE hash LIKE '$hash'");
}
else if( $_GET['q'] == 'update' ) {
	$genre = $_POST['genre'];
	$artist = $_POST['artist'];
	$aboutme = $_POST['aboutme'];
	$id = $_SESSION['id'];
	

	$sql = mysql_query("UPDATE user_profile SET aboutme = '$aboutme', artist='$artist', genre='$genre' WHERE userid = $id");
}
else if( $_GET['q'] == 'check' ) {
	$myid = $_SESSION['id'];
	
	$sql = mysql_query("DELETE FROM user_check WHERE userid = $myid");
	$sql = mysql_query("INSERT INTO user_check ( userid ) VALUES( $myid )");
}
else if( $_GET['q'] == 'data' ) {
	$myid = $_SESSION['id'];
	$sql = mysql_query("SELECT timestamp FROM user_check WHERE userid = $myid");
	$inf = mysql_fetch_array($sql);
	$time = $inf['timestamp'];
	
	$sql = mysql_query("SELECT count( DISTINCT userid) AS cid FROM user_message WHERE broid = $myid AND privacy = 1 AND timestamp > '$time' ");
	$inf = mysql_fetch_array($sql);
	$mcount = $inf['cid'];
	
	 $data = mysql_query("SELECT userid FROM user_friends WHERE broid = $myid AND accepted = 0");
	$reqcount = mysql_num_rows($data);
	
	$push = array();
	array_push( $push, array( 'message' => $mcount, 'request' => $reqcount ) );
	
	header('Access-Control-Allow-Origin: *');
	echo json_encode($push);
}
	

	
	
?>