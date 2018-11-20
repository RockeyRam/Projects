<?php
include("con.php");
session_start();

if (!isset($_SESSION['staff'])) {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
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

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Menus</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="staff.php">Today Notification</a></li>
        <li><a href="staffhistory.php">History</a></li>
        <li class="active"><a href="staffchpass.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-12">
          <center><h1>Change Password</h1></center><br>
        </div>
      </div>
      <form method="post" class="form-group">
      <div class="row">
        <div class="col-sm-5">
          <input type="text" name="old" placeholder="Old Password" class="form-control"><br>
          <input type="text" name="new" placeholder="New Password" class="form-control"><br>
          <input type="submit" name="sbtn" value="Change" class="btn btn-success">
        </div>
      </div>
    </form>
    <?php
      $old=$_POST['old'];
      $new=$_POST['new'];
      $sbtn=$_POST['sbtn'];
      if (isset($sbtn)) {
        # code...
        mysql_select_db(noticeboard,$con);
        $RegNo=$_SESSION['staff'];
        $qry=mysql_query("SELECT * FROM staffprofile WHERE UserName='$RegNo'");
        $result=mysql_fetch_array($qry);
        
        if ($result['Password']==$old) {
          # code...
          $uqry=mysql_query("UPDATE staffprofile SET Password='$new' WHERE UserName='$RegNo'");
          if ($uqry) {
            # code...
            echo "Password Update Successfully";
            //header("location:logout.php");
          }
          else
          {
            echo "Password Cannot Upadate";
          }
        }
        else
          echo "fail".mysql_error();
      }
      
    ?>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <div class="col-md-12 " style="background:none"><center>&copy;Copyrights</center></div>
</footer>

</body>
</html>
