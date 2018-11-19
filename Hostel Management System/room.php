<?php
  include("con.php");
  session_start();
  if (!isset($_SESSION['Aemail'])) {
   # code...
  header('location:login.php');
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rooms</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Menu</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="dash.php">Dashboard</a></li>
        <li class="active"><a href="room.php">Room</a></li>
        <li><a href="register.php">Student Registration</a></li>
        <li><a href="managestudent.php">Manage Student</a></li>
        <li><a href="notif.php">Notification</a></li>
        <li><a href="addemp.php">Register Employee</a></li>
        <li><a href="manageemployee.php">Manage Employee</a></li>
        <li><a href="employee.php">Employee</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul><br>
      
    </div>  

    <div class="col-sm-9">
      <center><h1>Rooms</h1></center><br><br>
      <div class="row">
        <form method="post">
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="A1"
          <?php
          mysql_select_db(hostel,$con);
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='A1'"); 
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="A2"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='A2'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="A3"
            <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='A3'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="A4"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='A4'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="A5"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='A5'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        
      </div>
      <div class="row"><br><br>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="B1"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='B1'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="B2"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='B2'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="B3"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='B3'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="B4"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='B4'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <div class="col-sm-2"><input type="submit" id="rbtn" class="btn"  name="rbtn" value="B5"
          <?php
          $roomqry=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='B5'");
          $eqry=mysql_result($roomqry, 0);
          echo $eqry;
          if ($eqry>=5) {
            # code...
          ?>
          style="color: white;background:red;"<?php }
          else
          { ?>
          style="color:white;background: green;"<?php } ?>
          ></div>
        <?php
          mysql_close();    
        ?>
      </form>

      <?php 
      $roomnum=$_POST['rbtn']; 
      if (isset($roomnum)) {
        # code...
        $_SESSION['room']=$roomnum;
        
        header("location:functions.php");
      }
      
            
      ?>
      <script type="text/javascript">
        
      </script>
      </div>
    </div>
    
      
  </div>
</div>

<footer class="container-fluid">
  <center><p>&copy;Copyrights</p></center>
</footer>

</body>
</html>
