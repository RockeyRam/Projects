<?php
include("con.php");
 mysql_select_db(Profile);
 $Select=mysql_query("SELECT NewPass From Password");
 $Result=mysql_fetch_array($Select);
 $Result['NewPass'];
 $a="{$_POST["OL"]}";
 $b="{$_POST["NPS"]}";
 $c="{$_POST["CPS"]}";
 if ($Result['NewPass']==$a) {
 	if ($b==$c) {
		$sql="UPDATE Password SET NewPass='{$_POST["NPS"]}' ";

 		$Query=mysql_query($sql);
 		if (!$Query) {
 			echo "Cannot Updated".mysql_error();
 		}
		 else
		 	echo "Updated Successfully";
 	}
 	else
 		echo "Password not match";
 }
 else
 	echo "Invalid Old Password";



?>
