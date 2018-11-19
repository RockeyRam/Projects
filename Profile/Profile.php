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
	<div class="col-sm-md-lg-12"></div>	
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'Account')" id="defaultOpen">Account Setting</button>
		  <button class="tablinks" onclick="openCity(event, 'Notification')">Notification</button>
		  <button class="tablinks" onclick="openCity(event, 'Team')">Team</button>
		</div>
	</div>
</div>
<form method="POST" class="form-group" enctype="multipart/form-data">
<div id="Account" class="tabcontent">
  <div class="container">
  	<div class="row">
  		<div class="col-sm-md-lg-12">
		  	<h3>Account Settings</h3>
        <input type="submit" name="save" class="btn btn-success" style="float:right;" value="Save">
		  	<p>Awesome sentence to replace the placeholder</p>
	  	</div>
    </div>
  <hr>
  <div class="row">
  	<div class="col-sm-2 col-xs-6 col-md-2 col-lg-2 ">
      <?php
        if (isset($_POST['save'])) {
          CompanyInfo();
        }
        $query=mysql_query("SELECT * FROM Avatar");
        $row=mysql_fetch_array($query);
        images();        
        echo '<img height="100" alt="Upload Image" width="100" src="data:image;base64,'.$row["Avatar"].'"> ';
      ?>
  		
  	</div>
  	<div class="col-xs-8 col-sm-3 col-md-4 col-lg-  ">
  		<h4 style="margin-left: 20px;">Change Avatar</h4>
  		<p style="margin-left: 20px;">The monkey-rope is found in all whalers; but it was only in the</p>
      <input type="file" name="image">
  	</div>
  	<div class="col-xs-4 col-sm-1 col-md-1 col-lg-1 ">

  		<input type="submit" name="upload" class="btn btn-primary" value="Upload">
  </div>
</div>
<?php
    function images()
    {     
      $query=mysql_query("SELECT * FROM Avatar");
      if ((mysql_num_rows($query))<1) 
      {
        $query=mysql_query("SELECT * FROM Avatar");
        $row=mysql_fetch_array($query);
        if (isset($_POST['upload'])) 
        {
          $image=$_FILES['image']['tmp_name'];
          $name=$_FILES['image']['name'];

          $image=file_get_contents($image);
          $image=base64_encode($image);
          $sql=mysql_query("INSERT INTO Avatar(Avatar,Name) VALUES('$image','$name') ");
          if (!$sql) {
           echo "Error on uploading";
          }
          else
            echo "File Uploaded Successfully";        
        }         
      }
      else
      { 
        if (isset($_POST['upload'])) 
        {
          $image=$_FILES['image']['tmp_name'];
          $name=$_FILES['image']['name'];

          $image=file_get_contents($image);
          $image=base64_encode($image);
          $sql=mysql_query("UPDATE Avatar SET Avatar='$image'");
          if (!$sql) {
           echo "Error on uploading".mysql_error();
          }
          else
            echo "File Uploaded Successfully";        
        }          
      }  
    }
?>
<hr>
<div class="row">
	<div class=" col-lg-4 ">
    
      <label>Fullname</label>
      <input type="text" name="Firstname" class="form-control">
  </div>
	<div class=" col-lg-4 ">
      <label>Email Address</label>
      <input type="text" name="Email" class="form-control"> 
  </div>
	<div class=" col-lg-4 ">
      <label>Phone Number</label>
      <input type="text" name="PhoneNumber" class="form-control"> 
  </div>
</div>
<div class="row" >
	<div class=" col-lg-4 ">
    <label>Country</label>
      <input type="text" name="Country" class="form-control">
  </div>
	<div class=" col-lg-4 " >
    <label>Language</label>
      <input type="text" name="Lang" class="form-control"> 
  </div>
</div>
<hr>
<div class="row" class="form-group">
<div class="col-lg-12 ">
  <h3>Company Informations</h3>
</div>	
</div>
<div class="row" class="form-group">
	<div class=" col-lg-4 ">
    <label>Company Name</label>
      <select id="shel1" class="form-control" name="CName">
        <option class="active">Google</option>
        <option>Microsoft</option>
        <option>IBM</option>
      </select>
  </div>
	<div class=" col-lg-4 ">
    <label>Company Size</label>
      <select id="shel1" class="form-control" name="CSize">
        <option class="active">1000-10000</option>
        <option>10000-100000</option>
        <option>100000<</option>
      </select>
  </div>
	<div class=" col-lg-4 ">
    <label>Company Website</label>
   <input type="text" name="CWebsite" class="form-control"> 
  </div>
</div>
<hr>
<div class="row form-group">
<div class="col-lg-12 ">
  <h3>Change Password</h3>
</div>	

<div class="row form-group" >
	<div class=" col-lg-3 ">
    <label id="old">Old Password</label> 
    <input type="password" id="OldPass" class="form-control">
  </div>
	<div class=" col-lg-3 ">
    <label>New Password</label> 
    <input type="password" id="NewPass" class="form-control"> 
  </div>
	<div class=" col-lg-3 ">
    <label>Confirm</label> 
    <input type="password" id="ConfirmPass" class="form-control"> 
  </div>
	<div class=" col-lg-2 ">
    <button class="btn btn-primary" style="margin-top: 23px;" type="button" id="chpass" onclick="call_ChangePass()">Change</button>
    <h5 id="out"></h5>
  </div>
</div>
<?php
mysql_select_db(Profile);
$Select=mysql_query("SELECT COUNT(NewPass) FROM Password LIMIT 0,1 ");
$Select1=mysql_query("SELECT COUNT(*) FROM Password LIMIT 0,1 ");
$result=mysql_fetch_array($Select);
$result1=mysql_fetch_array($Select1);
if ($result[0]==0 && $result1[0]==0) {
  $Insert=mysql_query("INSERT INTO Password(OldPass,NewPass,) VALUES ('ADMIN','Admin') ");
  $Insert1=mysql_query("INSERT INTO ProfileInfo(Name,Email,Phone,Country,Language,CompanyName,CompanySize,CompanySite) VALUES ('User','abc@gmail.com','India','Tamil','abc','1000-10000','http://profile.com') ");
}
?>
</div>
</form>
<hr>
<div class="row">
  <div class="col-lg-12" >
    <h3>Deactivate Your Account</h3>
    <p>
      The monkey rope is found in all whalers; but it was only in the pequod that monkey and his holder were tied together.This improvment upon the original usage was introduced by no.<a href="http://google.com">Deactivate Your Account</a>
      <form method="POST">
        <button class="btn btn-primary" type="submit" name="logout">Logout</button>
      </form>
      <?php
        if (isset($_POST['logout'])) 
        {          
          session_unset();
          session_destroy();
          header("location:index.php");
          exit();
        }
      ?>
    </p>
  </div>
  <p id="s"></p>
</div>
</div>
</div>
<div id="Notification" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Team" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
<script>
  $(document).ready(function(){
    $("button").click(function(){
        var OLP=$("#OldPass").val();
        var NP=$("#NewPass").val();
        var CP=$("#ConfirmPass").val();
        $.post("Chpass.php",
        {
          OL: OLP,
          NPS:NP,
          CPS:CP       
        },
        function(data,status){
            $("#out").html(data);
        });
    });
});
</script>
<?php
  function CompanyInfo(){
    $Name=$_POST['Firstname'];
    $Email=$_POST['Email'];
    $Phone=$_POST['PhoneNumber'];
    $Country=$_POST['Country'];
    $Language=$_POST['Lang'];
    $CName=$_POST['CName'];
    $CSize=$_POST['CSize'];
    $CWeb=$_POST['CWebsite'];  
    $sdb=mysql_select_db(Profile);
    $Insert=mysql_query("UPDATE ProfileInfo SET Name='$Name',Email='$Email',Phone='$Phone',Country='$Country',Language='$Language',CompanyName='$CName',CompanySize='$CSize',CompanySite='$CWeb' ");
    if (!$Insert) {
      echo "Unsuccessfull".mysql_error();
    }
    else
    {
      echo "<script type='text/javascript'>
              alert('Profile Updated Successfully');
            </script>";
    }  
  }
?>
<script>
  $(document).ready(function(){
    $("p").click(function(){
        alert("The paragraph was clicked.");
    });
});
</script>