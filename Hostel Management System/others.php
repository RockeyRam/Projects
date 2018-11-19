 <?php
include("con.php");
session_start();
 if (!isset($_SESSION['email'])) {
   # code...
  header('location:login.php');
 }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Others</title>
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
<div class="row">
      <div class="col-md-12 well "><center><h1>Hostel Management</h1></center></div>
</div>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Menu</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="index.php">Home</a></li>
        <li><a href="profile.php">MyProfile</a></li>
        <li><a href="edit.php">Edit</a></li>
        <li class="active"><a href="others.php">Others</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <center><h1>Change Password</h1></center>
      <form method="POST">
        <div class="row">
          <div class="col-md-6"><input type="Password" class="form-control" placeholder="Old Password" name="ops"></div>
        </div><br>
        <div class="row">
          <div class="col-md-6"><input type="Password" class="form-control" placeholder="New Password" name="nps"></div>
        </div>
        <div class="row"><br>
          <div class="col-md-6"><input type="Password" class="form-control" placeholder="Retype Password" name="rps"></div>
        </div><br>
        <button type="submit" class="btn btn-primary" name="pbtn">Change</button>
        <?php  
          $ops=$_POST['ops'];
          $nps=$_POST['nps'];
          $rps=$_POST['rps'];
          $pbtn=$_POST['pbtn'];
          $email=$_SESSION['email'];
          if(isset($pbtn))
          {
            mysql_select_db(hostel,$con);
            $pqry=mysql_query("SELECT * FROM student WHERE Email='$email' ");
            
            $pqry=mysql_fetch_array($pqry);
             $oldps=$pqry['Password'];
            
             if ($ops==$oldps) 
             {
              # code...
              if($nps==$rps)
              {
                $cps=mysql_query("UPDATE student SET Password='$nps' WHERE Email='$email'");
                $cps2=mysql_query("UPDATE Users SET Password='$nps' WHERE Email='$email'");
                if (!$cps||!$cps2) {
                  # code...
                  echo "Query Failed";
                }
                else
                {
                  echo "Password Changed Successfully";
                }
              }
            }
            else
            {
              echo "Incorrect Old Password";
            }
          }
        ?>
    </form mesthod="POST">
      <center><h1>Request or Suggetion</h1></center>
      <form method="post"> 
     <textarea class="form-control" name="msg"></textarea><br>
     <button type="submit" class="btn btn-danger" name="mbtn">Send</button>
     <?php  
      $msg=$_POST['msg'];
      $mbtn=$_POST['mbtn'];
      if (isset($mbtn)) {
        # code...
        mysql_select_db(hostel,$con);
        $getdatas=mysql_query("SELECT * FROM student WHERE Email='$email'");
        $rname=mysql_fetch_array($getdatas);
        if (!$getdatas) {
          # code...
          echo "failed";
        }
        $noemail=$email;
        $noname=$rname['Name'];
        date_default_timezone_set('Asia/Kolkata'); 
        $date=date('d.m.Y l ');
        $noreg=$rname['RegNo'];
        $nomsg=$msg;
        $ncount=mysql_query("SELECT count(SNo) FROM Notification ");
        $countrslt=mysql_result($ncount, 0);
        $nosno=$countrslt+1;
        $noqry=mysql_query("INSERT INTO Notification (Name,Dateofmsg,Message,RegNo,Email)VALUES('$noname','$date','$nomsg','$noreg','$noemail')",$con);
        if (!$noqry) {
          # code...
          echo "Request Not Sent".mysql_error();
        }
        else
        {
          echo "Request has been Sent";
        }

      }
    ?>
   </form>
    
    </div>
    </div>

   
</div>

<footer class="container-fluid">
  <center><p>&copy;Copyrights</p></center>
</footer>

</body>
</html>
