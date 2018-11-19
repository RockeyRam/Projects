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
    .row.content {height: 500px}
    
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
      <center><h1>Employee Registration</h1></center><br>
      <form method="post" class="form-group">
        <div class="row" class="form-group">
        <div class="col-sm-6">
          <input type="text" name="empname" class="form-control" placeholder="Employee Name">
        </div>
          <div class="col-sm-6"><input name="contact" class="form-control" placeholder="ContactNo"></div>
      </div><br>
      <div class="row" class="form-group">
        <div class="col-sm-6">
          <select class="form-control" id="sel1" name="food">
              <option class="active">Select One</option>
              <option>Male</option>
              <option>Female</option>
           </select>
        </div>
          <div class="col-sm-6"><input name="occupation" class="form-control" placeholder="Occupation"></div>
      </div><br>
      <div class="row" class="form-group">
        <div class="col-sm-6">
          <textarea name="addr" placeholder="Address" class="form-control"></textarea>
        </div>
          <div class="col-sm-6">
          <input type="text" name="salary" class="form-control" placeholder="Salary">
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-6">
          <input type="submit" name="empbtn" class="btn btn-success" value="Register">  
        
        </div>
      </div>
      </form>
      <?php
        $name=$_POST['empname'];
        $eid="";
        $gender=$_POST['gender'];
        $contact=$_POST['contact'];
        $addr=$_POST['addr'];
        $occupation=$_POST['occupation'];
        $salary=$_POST['salary'];
        $empbtns=$_POST['empbtn'];
        if (isset($empbtns)) {
          # code...
          
          $db=mysql_select_db(hostel,$con);
          $empqry=mysql_query("INSERT INTO Employee(EmpName,Gender,ContactNumber,Address,Occupation,Salary)VALUES('$name','$gender','$contact','$addr','$occupation','$salary')");
          if ($empqry) {
            # code...
            echo "Employee Register Successfully";
          }
          else
          {
            echo "Invalid Data" ;
          }
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