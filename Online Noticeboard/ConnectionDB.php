<?php
$con=mysql_connect("localhost","root","mysql","Keep");

if ($con) {
	# code...
	echo "Connections";
}
else
{
	echo "error";
}

?>