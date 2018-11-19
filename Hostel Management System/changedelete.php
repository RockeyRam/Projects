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
  <title>Change Room and Remove Student</title>
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
      <h4>Menu</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="dash.php">Dashboard</a></li>
        <li><a href="room.php">Room</a></li>
        <li><a href="register.php">Student Registration</a></li>
        <li class="active"><a href="mananagestudent.php">Manage Student</a></li>
        <li><a href="notif.php">Notification</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>  
    </div>

    <div class="col-sm-9">
      <center><h1>Change Room</h1></center>
      <?php
        $_SESSION['creg'];
        $screg=$_SESSION['creg'];
        mysql_select_db(hostel,$con);
        $chqry=mysql_query("SELECT * FROM Room WHERE RegNo='$screg'");
        $rslt=mysql_fetch_array($chqry);
        $chroom=$rslt['RoomNo'];
      ?>
      <form method="post">
        <div class="row ">
            <div class="col-md-8">
              <label for="sel1">Select Room:</label>
              <select class="form-control" id="sel1" name="chroomno">
                <option class="active">A1</option>
                <option>A2</option>
                <option>A3</option>
                <option>A4</option>
                <option>A5</option>
             </select>
            </div> 
            <div class="col-md-4"><button type="submit" name="chrbtn" class="btn btn-success" style="margin-top:  25px;">Ok</button></div> 
          </div>
      </form><br><br>
      <?php
        $chroomno=$_POST['chroomno'];
        $chrbtn=$_POST['chrbtn'];
        if (isset($chrbtn)) {
          # code...
          mysql_select_db(hostel,$con);
          if($chroom!=$chroomno){
            $chrq=mysql_query("UPDATE Room SET RoomNo='$chroomno' WHERE RegNo='$screg'");
            if (!$chrq) {
              # code...
              echo "Error ";
            }
            else
            {
              echo "Room changed Successfully";
            }
          }
          else
            {
              echo "Student already using this Room";
            }
          }
      ?>
      <div class="row">
        <div class="col-md-12">
          <center><h1>Remove Student</h1></center>
          <p>Are you really want to remove the student, The student will permenently Removed cannot be Recover.If you like to Remove <b>Click the button</b></p>
          <form method="post">
            <center><button type="submit" class="btn btn-danger" name="restu">Remove Student</button></center>
          </form>
          <?php  
            $restu=$_POST['restu'];
            if (isset($restu)) {
              # code...
                $requery1=mysql_query("DELETE FROM student WHERE RegNo='$screg'");
                $requery2=mysql_query("DELETE FROM Room WHERE RegNo='$screg'");
                $requery3=mysql_query("DELETE FROM Users WHERE RegNo='$screg'");
                if (!$requery1||!$requery2||!$requery3) {
                  echo "Delete Error";  
                }
                else
                {
                  echo "Student Removed Successfully";
                }
            }
          ?>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
 <center><p>&copy;Copyrights</p></center>
</footer>

</body>
</html>
