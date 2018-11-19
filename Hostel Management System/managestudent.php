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
  <title>Manage Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 650px}
    
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
        <li><a href="room.php">Room</a></li>
        <li><a href="register.php">Student Registration</a></li>
        <li class="active"><a href="managestudent.php">Manage Student</a></li>
        <li><a href="notif.php">Notification</a></li>
        <li><a href="addemp.php">Register Employee</a></li>
        <li><a href="manageemployee.php">Manage Employee</a></li>
        <li><a href="employee.php">Employee</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul><br>
    </div>

    <div class="col-sm-9">
    <center><h1>Manage Students</h1></center><br><br>
    <form method="Post">
      <div class="row">
        <div class="col-sm-6">
          <label>Search Student here</label>
          <input type="text" name="mstud" placeholder="Enter Register Number" required>
          <button class="btn btn-success" type="submit">Search</button>
        </div>
      </div>
    </form>
    <?php
      $mstud=$_POST['mstud'];
      $sbtn=$_POST['sbtn'];
      if (isset($mstud)) {
        # code...

        $_SESSION['creg']="$mstud";
        mysql_select_db(hostel,$con);
        $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
        ?>
        <h4>Name:<?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['Name'];
       ?>
       </h4>
        <h4>RegNo:<?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['RegNo'];
       ?> 
        </h4>
        <h4>Email:<?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['Email'];
       ?>

        </h4>

        <h4>Password:
          <?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['Password'];
          
          ?>
        </h4>
          <h4>Contact No:
          <?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['ContactNo'];
          
          ?>
        </h4>
          <h4>Parent Name:
          <?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['ParentName'];
          
          ?>
        </h4>
          <h4>Parent Contact No:
          <?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['ParentContactNo'];
          
          ?>
        </h4>
        <h4>Address:
          <?php 
          $mquery=mysql_query("SELECT * FROM student WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['Address'];
          
          ?>
        </h4>

          <h4>RoomNo:
          <?php 
          $mquery=mysql_query("SELECT RoomNo FROM Room WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['RoomNo'];
          
          ?>
        </h4>
        <h4>Total Fees:
          <?php 
          echo "15000";

          
          ?>
        </h4>
          <h4>Fees Paid:
          <?php 
          $mquery=mysql_query("SELECT * FROM Room WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo $rslt['FeesPayment'];

          
          ?>
        </h4>
        <h4>Fees Balance:
          <?php 
          $mquery=mysql_query("SELECT * FROM Room WHERE RegNo='$mstud'");
          $rslt=mysql_fetch_array($mquery);
          echo 15000-$rslt['FeesPayment'];

          
          ?>
        </h4>
        <br><br>
        <div class="row">
          <div class="col-sm-6">
            <a href="changedelete.php"><button type="button" class="btn btn-primary">Manage Student</button></a>
          </div>
        </div><?php 

          } 
      ?>

    </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <center><p>&copy;Copyrights</p></center>
</footer>

</body>
</html>
