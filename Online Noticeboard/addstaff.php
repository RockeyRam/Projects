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
    <title>Register Staff</title>
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
        <li class="active"><a href="register.php">Student Register</a></li>
        <li><a href="managestudent.php">Manage Student</a></li>
        <li><a href="managenotice.php">Manage Notice</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
      
    </div>
      <div class="col-sm-9 clr">
    <div class="row">
      <div class="col-sm-12">
        <center><h1>Online Notice Board System</h1></center>
      </div>
    </div>
    <center> <h2>Register Staff</h2></center><br><br>
    <form method="Post">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>FirstName</label>
            <input type="text" name="fname" class="form-control">
          </div>
        </div>
        <div class="col-sm-6">
          <label>LastName</label>
          <input type="text" name="lname" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Date of Birth</label>
            <input type="text" name="dob" class="form-control " placeholder="YYYY-MM-DD">
          </div>
        </div>
        <div class="col-sm-6">
          <label>UserName</label>
          <input type="text" name="regno" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Course</label>
             <select class="form-control" id="sel1" name="course">
                <option>B.sc Computer Science</option>
                <option>B.sc Physics</option>
                <option>B.sc Chemistry</option>
              </select>
          </div>
        </div>
        <div class="col-sm-6">
          <label>Email</label>
          <input type="Email" name="email" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Password</label>
            <input type="Password" name="pass" class="form-control ">
          </div>
        </div>
        <div class="col-sm-6">
          <label>Conform Password</label>
          <input type="Password" name="rpass" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="cno" class="form-control ">
          </div>
        </div>
        <div class="col-sm-6">
          <label>Address</label>
          <textarea type="text" name="addr" class="form-control "></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control date">
          </div>
        </div>
        <div class="col-sm-6">
          <label>state</label>
          <input type="text" name="state" class="form-control"><br>
        </div>
      </div>
      <center><input type="submit" name="add" value="Add Student" class="btn btn-success"></center>
    </form>  
    <?php
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $dob=$_POST['dob'];
      $regno=$_POST['regno'];
      $course=$_POST['course'];
      $email=$_POST['email'];
      $pass=$_POST['pass'];
      $rpass=$_POST['rpass'];
      $cno=$_POST['cno'];
      $addr=$_POST['addr'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $add=$_POST['add'];
      if (isset($add)) {
        # code...
        mysql_select_db(noticeboard,$con);
        if ($pass==$rpass) {
          # code...
          $iquery=mysql_query("INSERT INTO staffprofile(FirstName,LastName,DateOfBirth,UserName,Department,Email,Password,PhoneNo,Address,City,State)VALUES('$fname','$lname','$dob','$regno','$course','$email','$pass','$cno','$addr','$city','$state')");
          if (!$iquery) {
            # code...
            echo "error".mysql_error();
          }
          else
          {
            echo "Member Added Successfully";
          }
        }
        else
        {
          echo "<h4>Invalid</h4";
        }
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