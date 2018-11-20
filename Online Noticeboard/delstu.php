<?php
include("con.php");
session_start();
mysql_select_db(noticeboard,$con);
$regs=$_SESSION['reg'];
$delqury=mysql_query("DELETE FROM student WHERE RegNo='$regs'");
if (!$delqury) {
	# code...
	echo "error".mysql_error();
}
else
{
	
	echo '<script language="javascript">';
	echo 'alert("Student Removed Successfully")';
	echo '</script>';
	header('location:managestudent.php');
}
?>
