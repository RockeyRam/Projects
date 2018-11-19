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
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
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
<div class="row">
      <div class="col-md-12 well "><center><h1>Hostel Management</h1></center></div>
</div>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Menu</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="dash.php">Dashboard</a></li>
        <li><a href="room.php">Room</a></li>
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
      <div class="row">
        <div class="col-sm-4"><button type="button" class="btn btn-primary" style="height: 150px;width: 250px;">Total Students:
          <?php
            mysql_select_db(hostel,$con);
            $tstudent=mysql_query("SELECT COUNT(Name) FROM student");
            echo mysql_result($tstudent, 0);
            ?>
        </button></div>
        <div class="col-sm-4"><button type="button" class="btn btn-warning" style="height: 150px;width: 250px;">Total Room:<h4>10</h4></button></div>
        <div class="col-sm-4"><button type="button" class="btn btn-danger" style="height: 150px;width: 250px;">Available Room:
          <?php

            $tstudent=mysql_query("SELECT count(Name)  FROM student");
            $aroom=mysql_result($tstudent, 0);
            if ($aroom>=1&&$aroom<5) {
              # code...
              echo "10";
            }
            elseif ($aroom>=5&&$aroom<10) {
              # code...
              echo "9";
            }
            elseif ($aroom>=10&&$aroom<15) {
              # code...
              echo "8";
            }
            elseif ($aroom>=15&&$aroom<20) {
              # code...
              echo "7";
            }
            elseif ($aroom>=20&&$aroom<25) {
              # code...
              echo "6";
            }
            elseif ($aroom>=25&&$aroom<30) {
              # code...
              echo "5";
            }
            elseif ($aroom>=30&&$aroom<35) {
              # code...
              echo "4";
            }
            elseif ($aroom>=35&&$aroom<40) {
              # code...
              echo "3";
            }
            elseif ($aroom>=40&&$aroom<45) {
              # code...
              echo "2";
            }
            elseif ($aroom>=45&&$aroom<50) {
              # code...
              echo "1";
            }
            elseif ($aroom>=50) {
              # code...
              echo "0";
            }
          ?>
        </button></div>
        
      </div>
      <div class="row">
        <div class="col-sm-6"></div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
 <center><p>&copy;Copyrights</p></center>
</footer>

</body>
</html>
