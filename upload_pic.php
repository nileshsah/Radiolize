<?php
	include 'php/db.php';
	include 'php/logged.php';
	
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
		$name = md5( $_SESSION['id'].time() );
		$name .= ".".$extension;
		$id = $_SESSION['id'];

      move_uploaded_file($_FILES["file"]["tmp_name"],
      "propic/" . $name);
    //  echo "Stored in: " . "propic/" . $name;
	  
	  $sql = mysql_query("UPDATE user_login SET propic = '$name' WHERE id = $id");
	  $_SESSION['propic'] = $name;
     // header("HTTP/1.0 204 No Content");
	 header("Location: ".$_SERVER['HTTP_REFERER']."#profile");
	 //echo $_SERVER['HTTP_REFERER'];
    }
  }
else
  {
  echo "Invalid file";
  }
?>