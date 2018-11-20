<?php
include("con.php");
session_start();
if (!isset($_SESSION['ram'])) {
  header('location:index.php');
}
ob_start();
mysql_select_db(Profile);
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
*
{
  margin:0px;
  padding: 0px;
}
body {font-family: Arial;}

.avatar {
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}
/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    border-bottom:transparent;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.1s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
	border-bottom: 2px solid blue;
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
	border-bottom: 2px solid blue; 
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
</head>
<body>
<div class="row">
  <div class="col-sm-12">
    <center><h2>My Profile</h2></center>
  </div>
</div>
<?php
    mysql_select_db(Profile);
    $sql=mysql_query("SELECT * FROM ProfileInfo");
    $row=mysql_fetch_array($sql);
    
    
    
?>
<div class="row">
  <div class="col-sm-6">
    <h4>Name:<?php echo  $row['Name']; ?></h4>
    <h4>Email:<?php echo $row['Email']; ?></h4>
    <h4>Phone:<?php echo $row['Phone'];  ?></h4>
    <h4>Country:<?php echo $row['Country']; ?></h4>
  </div>

  <div class="col-sm-6">
    <h4>Company Name:<?php echo $row['CompanyName']; ?></h4>
    <h4>Company Size:<?php echo $row['CompanySize'] ?></h4>
    <h4>Language:<?php echo $row['Language'];  ?></h4>
    <h4>Company Site:<?php echo $row['CompanySite'] ?></h4>

  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <center><a href="Profile.php"><button class="btn btn-primary">Edit</button></a></center>
  </div>
</div>
     
</body>
</html> 

