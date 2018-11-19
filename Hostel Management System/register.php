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
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 800px}
    
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
        <li class="active"><a href="register.php">Student Registration</a></li>
        <li><a href="managestudent.php">Manage Student</a></li>
        <li><a href="notif.php">Notification</a></li>
        <li><a href="addemp.php">Register Employee</a></li>
        <li><a href="manageemployee.php">Manage Employee</a></li>
        <li><a href="employee.php">Employee</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <center><h1>Student Registration</h1></center><br><br>
      <form role="form" method="post"  autocomplete="off">
        <div class="row">
          <div class="col-sm-6"><label>Students Details</label></div>
          <div class="col-sm-6"><label>Parents Details</label></div>
        </div>
        <div class="row form-group">
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Name" name="name" required></div>
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Parent Name" name="Pname" required></div>
        </div>
        <div class="row form-group">
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Contact" name="contact" required></div>
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Parent Contact No" name="pcontact" required></div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            
            <select class="form-control" id="sel1" name="course" required>
              <option class="active">Course</option>
              <option>B.Sc Computer Science</option>
              <option>B.sc Maths</option>
              <option>B.sc Physics</option>
           </select>
          </div>  
          <div class="col-md-6">
            <textarea placeholder="Address" name="addr" class="form-control"></textarea>
          </div>  
        </div>
        <div class="row form-group">
          <div class="col-sm-6"><input type="email" class="form-control" placeholder="Email" name="email" required></div>
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="City" name="city" required></div>
      </div>


        <div class="row form-group">
      
        <div class="row form-group">
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Reg No" name="regno" required></div>
          <div class="col-sm-6"><input type="Password" class="form-control" placeholder="Password" name="pass" required>
            
        </div>
      </div>
          
          
        <div class="row form-group">
          <div class="col-md-6">
            <select class="form-control" id="sel1" name="gender">
              <option class="active">Female</option>
              
           </select>
          </div>
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="State" name="state" required></div>
        </div>
          
        </div>
        <div class="row form-group">
          <div class="col-md-12">
            <label for="sel1">Select Room:</label>
            <select class="form-control" id="sel1" name="roomno">
              <option class="active">A1</option>
              <option>A2</option>
              <option>A3</option>
              <option>A4</option>
              <option>A5</option>
              <option>B1</option>
              <option>B2</option>
              <option>B3</option>
              <option>B4</option>
              <option>B5</option>
           </select>
          </div>  
        </div>
        <div class="row form-group">
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Fees" name="fees" required></div>
          <div class="col-md-6">
            <label for="sel1">Food Status:</label>
            <select class="form-control" id="sel1" name="food">
              <option class="active">Select One</option>
              <option>Available</option>
              <option>No</option>
           </select>
          </div>  
        </div>
        <div class="row form-group">
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Date Of Joining  YYY/MM/DD" name="staydate" required></div>
          <div class="col-md-6">
            <select class="form-control" id="sel1" name="duration" required>
              <option class="active">1 Year</option>
              <option>2 Years</option>
              <option>3 Years</option>
           </select>
          </div>  
        </div>
        <center><button type="submit" name="sbtn" class="btn btn-success">Register</button></center>

      </form>
       <?php
          
          $name=$_POST['name'];
          $email=$_POST['email'];
          $contact=$_POST['contact'];
          $pname=$_POST['Pname'];
          $pcontact=$_POST['pcontact'];
          $regno=$_POST['regno'];
          $addr=$_POST['addr'];
          $gender=$_POST['gender'];
          $course=$_POST['course'];
          $pass=$_POST['pass'];
          $city=$_POST['city'];
          $state=$_POST['state'];
          $roomno=$_POST['roomno'];
          $fees=$_POST['fees'];
          $food=$_POST['food'];
          $staydate=$_POST['staydate'];
          $duration=$_POST['duration'];
          $sub=$_POST['sbtn'];
          if (isset($sub)) {
            # code...
            $sdb=mysql_select_db(hostel,$con);
            $rcount=mysql_query("SELECT count(RoomNo) FROM Room WHERE RoomNo='$roomno'"); 
            $exc=mysql_result($rcount, 0);
            
          if($exc<5)
           {
           $iquery1=mysql_query("INSERT INTO student(Name,Email,ContactNo,ParentName,ParentContactNo,RegNo,Address,Gender,Course,Password,City,State)VALUES('$name','$email','$contact','$pname','$pcontact','$regno','$addr','$gender','$course','$pass','$city','$state')",$con);
           
           $iquery2=mysql_query("INSERT INTO Room (RoomNo, FeesPayment, FoodStatus, StayFrom, Duration,RegNo,Email) VALUES ( '$roomno', '$fees', '$food','$staydate','$duration','$regno', '$email')",$con);  
            $iquery3=mysql_query("INSERT INTO Users(RegNo,Password,Email)VALUES('$regno','$pass','$email')",$con);     

              if (!$iquery1||!$iquery2||!$iquery3) 
              {
                # code...
                echo "Database query failed ".mysql_error();
              }
              else
              {
                
                echo "Student Registered Successfully";
              }
           }
           else
           {
            echo "Room not available".'<br>';
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