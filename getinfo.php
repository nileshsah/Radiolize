<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$username = "screenrecdev"; // "bruger_greudeghi"; //"screenrecdev";
$password = "doicopacifaraflori"; //"test123"; //"doicopacifaraflori";
$hostname = "localhost";
$database = "bruger_yuasgdoasd";

$dbhandle = mysql_connect($hostname, $username, $password);
@mysql_select_db($database) or die( "Unable to select database");



if ( isset($_GET['info']) )
{
  $id = $_GET['info'];
  $data = mysql_query("SELECT tester_id, test_id FROM test_sessions WHERE token='$id'");
    while($info = mysql_fetch_array( $data ))
      {   $tester_id = $info['tester_id'];
         $test_id = $info['test_id'];
      }

 $data = mysql_query("SELECT tester_first_name FROM testers WHERE tester_id ='$tester_id'");
   while($info = mysql_fetch_array( $data ))
      {   $tester = $info['tester_first_name'];   }


  $data = mysql_query("SELECT test_scenario, test_tasks, test_requirements, test_website FROM tests WHERE test_id = '$test_id'");
   while($info = mysql_fetch_array( $data ))
     {   $scenario = $info['test_scenario'];
         $tasks = $info['test_tasks'];
         $requirements =$info['test_requirements'];
         $website = $info['test_website'];
     }

$array = preg_split ("#\n\s*\n#Uis", $tasks);

echo "<website>".$website."</website> <br> <scenario>".$scenario."</scenario> <br> <requirements>".$requirements."</requirements> <br><br> ";
echo "<name>".$tester."</name>";
echo "<taskid>".$test_id."</taskid>";

foreach ($array as $value) {
	if ( $value <> NULL )  {   echo "<task>".$value."</task> <br> "; }
}

}

if ( isset($_GET['ftp']) )
{
    if ( $_GET['ftp'] == "doicopacifaraflori123" )
    {
     echo "<ftp>ftp://ftp.brugertest.nu/</ftp> <br>";
     echo "<user>tester@brugertest.nu</user> <br>";
     echo "<pass>&AoJJvlm;cD!</pass> <br>";
    }

}

if ( isset($_GET['submit']) )
{
  $id = $_GET['submit'];
  $data = mysql_query("SELECT tester_id, test_id FROM test_sessions WHERE token='$id'");
    while($info = mysql_fetch_array( $data ))
      {   $tester_id = $info['tester_id'];
         $test_id = $info['test_id'];
      }

 $data = mysql_query("SELECT tester_first_name, tester_email FROM testers WHERE tester_id ='$tester_id'");
   while($info = mysql_fetch_array( $data ))
      {   $tester = $info['tester_first_name'];
          $tester_email = $info['tester_email'];
      }

   if( isset($_GET['timestamp']) )
   { 
     $timearray = $_GET['timestamp'];
     $timearray = explode(".", $timearray);
	 //echo $timearray;
	 $count = 1;
	 foreach( $timearray as $timestamp )
	 {	$sql = "INSERT INTO task_time(user_id, task_id, test_id, time) VALUES('$tester_id', '$count', '$test_id', '$timestamp')";
		$data = mysql_query($sql);
		$count++;
		echo $sql;
		//echo $tester_id." ".$count." ".$test_id." ".$timestamp."\n";
	 }
	 
   
   }

  $dom = new DOMDocument();
  $dom->formatOutput = true;

  $token = $_GET['submit'];
  $path = $_GET['path'];

 $root = $dom->createElement("screenrecoder");
 $dom->appendChild($root);

 $item = $dom->createElement("mode");
 $root->appendChild($item);
 $text = $dom->createTextNode("test");
 $item->appendChild($text);

 $item = $dom->createElement("user");
 $root->appendChild($item);

 $child = $dom->createElement("email");
 $item->appendChild($child);
 $text = $dom->createTextNode($tester_email);
 $child->appendChild($text);

 $item = $dom->createElement("test");
 $root->appendChild($item);

 $child = $dom->createElement("id");
 $item->appendChild($child);
 $text = $dom->createTextNode($test_id);
 $child->appendChild($text);

 $date = date('Y')."-".date('m')."-".date('d')."-".date('H')."-".date('i')."-".date('s');

 $child = $dom->createElement("timestamp");
 $item->appendChild($child);
 $text = $dom->createTextNode($date);
 $child->appendChild($text);

 $child = $dom->createElement("filename");
 $item->appendChild($child);
 $text = $dom->createTextNode($path);
 $child->appendChild($text);

 $item = $dom->createElement("program");
 $root->appendChild($item);

 $child = $dom->createElement("version");
 $item->appendChild($child);
 $text = $dom->createTextNode("1.0");
 $child->appendChild($text);


 $child = $dom->createElement("os");
 $item->appendChild($child);
 $text = $dom->createTextNode("windows");
 $child->appendChild($text);


 $fp = @fopen('done.xml','w');     //Direct this to the specified upload directory known: $test_id
  if(!$fp) {
    die('Error cannot create XML file');
  }
  fwrite($fp,$dom->saveXML());
  fclose($fp);

}

?>


