<?php
$file = $_GET['song'];
$file_headers = @get_headers($file);

$flag = 0;
for( $i = 0; $i < count($file_headers); $i++)
	if( strcmp( $file_headers[$i], "Content-Type: audio/mpeg" ) == 0)
		$flag = 1;
if( $flag == 1 )
	echo "Yes\n\n\n";
		
print_r($file_headers);
?>
