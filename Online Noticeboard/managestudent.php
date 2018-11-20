<?php
include("con.php");
session_start();
if (!isset($_SESSION['users'])) {
  header("location:index.php");
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Manage Student</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 700px}
    
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
      <h4>Menus</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="createnotice.php">Create Notice</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="register.php">Student Register</a></li>
        <li class="active"><a href="managestudent.php">Manage Student</a></li>
        <li><a href="managenotice.php">Manage Notice</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <div class="row">
      <div class="col-sm-12">
        <center><h1>Online Notice Board System</h1></center>
      </div>
    </div>
      <center><h2>Manage Student</h2></center>
      <form class="form-group" method="POST" autocomplete="off">
        <div class="row">
          <div class="col-sm-3">
            <input type="text" name="sname" class="form-control" placeholder="Enter Register Number" required>
          </div>
          <div class="col-sm-4">
            <button type="submit" name="sebtn"   class="btn btn-primary">Search</button>
          </div>
        </div>
      </form>
      <?php
        $sname=$_POST['sname'];
        $sebtn=$_POST['sebtn'];
        if (isset($sebtn)) {
          # code...
          mysql_select_db(noticeboard,$con);
          $squery=mysql_query("SELECT * FROM student WHERE RegNo='$sname'");
          
          $rows=mysql_fetch_array($squery);
          echo "<h4>First Name:"." ".$rows['FirstName']."</h4><br>";
          echo "<h4>Last Name:"." ".$rows['LastName']."</h4><br>";
          echo "<h4>Email Id:"." ".$rows['Email']."</h4><br>";
          echo "<h4>Course:"."".$rows['Course']."</h4><br>";
          echo "<h4>Password:"." ".$rows['Password']."</h4><br>";
          echo "<h4>Contact Number:"." ".$rows['PhoneNo']."</h4><br>";
          echo "<h4>Address:"." ".$rows['Address']."</h4><br>";
          echo "<h4>City:"." ".$rows['City']."</h4><br>";
          echo "<h4>State:"." ".$rows['State']."</h4><br>";
          $_SESSION['reg']=$sname;
          $regs=$_SESSION['reg'];


          ?>
          
            <a href="delstu.php"><button name="remove" class="btn btn-danger">Remove</button></a>
          
       <?php   
        }
      ?>
    </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <div class="col-md-12 " style="background:none"><center>&copy;Copyrights</center></div>
</footer>

  </body>
</html>