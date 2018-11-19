  <?php
include("con.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hostel Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 400px}
    
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <div class="row">
        <div class="col-md-6">
          <form method="POST">
            <div class="form-group">
                <center><h3>Student Login</h3></center>
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
                <input type="Password" class="form-control" id="email" placeholder="Password" name="passd">
            </div>
           
            <button type="submit" class="btn btn-default" name="logbtn">Submit</button>
          </form>
          <?php
            $email=$_POST['email'];
            $pas=$_POST['passd'];
            $login=$_POST['logbtn'];
            if(isset($login))
            {
              $sdb=mysql_select_db(hostel,$con);
              $fquery=mysql_query("SELECT * FROM Users WHERE Email='$email'");
              if(!$fquery)
              {
                echo "fetch error ".mysql_error();
              }
              
               $row=mysql_fetch_array($fquery);
               $val1=$row['Email'];
               $val2=$row['Password'];
               $_SESSION['email']="$email";
               $_SESSION['pass']="$pas";
                
               if (($val1==$email)&&($val2==$pas)) {
                # code...
                header('location:profile.php');
               }
               else
                {echo "Invalid UserName or Password";}
               
            }
          ?>
        </div>
            <div class="col-md-6">
              <center><h3>Admin Login</h3></center>
              <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="Aemail">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
                <input type="Password" class="form-control" id="email" placeholder="Password" name="Apassd">
            </div>

            <button type="submit" class="btn btn-default" name="Alogbtn">Submit</button>
          </form>
          <?php
            $Aemail=$_POST['Aemail'];
            $Apas=$_POST['Apassd'];
            $Alogin=$_POST['Alogbtn'];
            if(isset($Alogin))
            {
              $Asdb=mysql_select_db(hostel,$con);
              $Afquery=mysql_query("SELECT * FROM Admin WHERE Email='$Aemail'");
              if(!$Afquery)
              {
                echo "fetch error ".mysql_error();
              }
              
              
               $Arow=mysql_fetch_array($Afquery);
               if (!$Arow) {
                 # code...
                echo "error".mysql_error();
               }
               $Aval1=$Arow['Email'];
               $Aval2=$Arow['Password']; 
               
               if (($Aval1==$Aemail)&&($Aval2==$Apas)) {
                # code...
                $_SESSION['Aemail']="$Aemail";
               $_SESSION['Apass']="$Apas";
                header('location:dash.php');
               }
               else
                {echo "Invalid UserName or Password";}
               
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <center>&copy;Copyrights</center>
</footer>

</body>
</html>