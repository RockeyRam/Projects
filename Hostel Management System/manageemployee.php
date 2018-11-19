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
  <title>Register Employee</title>
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
        <li><a href="room.php">Room</a></li>
        <li><a href="register.php">Student Registration</a></li>
        <li><a href="managestudent.php">Manage Student</a></li>
        <li><a href="notif.php">Notification</a></li>
        <li><a href="addemp.php">Register Employee</a></li>
        <li class="active"><a href="manageemployee.php">Manage Employee</a></li>
        <li><a href="employee.php">Employee</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <center><h1>Manage Employee</h1></center><br>
      <form method="post" class="form-group">
        <div class="row">
          <div class="col-sm-4">
            <select class="form-control" name="filter">
              <option class="active">Employee Id</option>
              <option>Employee Name</option>
              <option>Employee Gender</option>
              <option>Employee Contact No</option>
              
            </select>
          </div>
          <div class="col-sm-4"><input type="text" name="manage" class="form-control"></div>
          <div class="col-sm-2"><input type="submit" name="mbtn" class="form-control btn btn-primary" value="Search"></div>
        </div>
      </form>
      <?php
        $manage=$_POST['manage'];
        $mbtn=$_POST['mbtn'];
        $filter=$_POST['filter'];
        if ($filter=="Employee Id") {
          # code...
          $filter="Empid";
        }
        elseif ($filter=="Employee Name") {
          # code...
          $filter="EmpName";
        }
        elseif ($filter=="Employee Gender") {
          # code...
          $filter="Gender";
        }
        elseif ($filter=="Employee Contact No") {
          # code...
          $filter="ContactNumber";
        }
        $_SESSION['filters']=$filter;
        $_SESSION['mbtns']=$mbtn;
        if (isset($mbtn)) {
          # code...
          mysql_select_db(hostel,$con);
          $mqry=mysql_query("SELECT * FROM Employee WHERE $filter='$manage'");
          $result=mysql_fetch_array($mqry);
          echo "<h3>Name:".$result['EmpName']."</h3>";
          echo "<h3>Employee Id:".$result['Empid']."</h3>";
          echo "<h3>Gender:".$result['Gender']."</h3>";
          echo "<h3>Contact Number:".$result['ContactNumber']."</h3>";
          echo "<h3>Work:".$result['Occupation']."</h3>";
          echo "<h3>Salary:".$result['Salary']."</h3>";?>
          <a href="empremove.php"><button class="btn btn-danger" >Remove</button></a><?php
        }
      ?>
    </div>
  </div>  
</div>

<footer class="container-fluid">
   <center><p>&copy;Copyrights</p></center>
</footer>

</body>
</html>