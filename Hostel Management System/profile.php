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
  <title>MyProfile</title>
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
        <li class="active"><a href="profile">MyProfile</a></li>
        <li><a href="edit.php">Edit</a></li>
        <li><a href="others.php">Others</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <center><h1>My Profile</h1></center><br><br>
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Name:<?php $sdb=mysql_select_db(hostel,$con); 
                      $email=$_SESSION['email'];                      
                      $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                      $rows=mysql_fetch_array($qry);
                      echo $rows['Name'];                      
                      ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Email:<?php
                      $email=$_SESSION['email'];                      
                      $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                      $rows=mysql_fetch_array($qry);
                      echo $email;?>                      
              </h4></td>
            </tr>
          </table>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Contact No:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['ContactNo'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Emergency Contact No:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['EmergencyContactNo'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Parent Name:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['ParentName'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Parent Contact No:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['ParentContactNo'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>

      </div>
        <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Gender:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['Gender'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Course:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['Course'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>

      </div>
      <center><h2>Address Details

      </h2></center>                        
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Address:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['Address'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>City:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['City'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>State:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM student WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['State'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        
      </div>            
      <center><h2>Room Details</h2></center>
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Room No:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM Room WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['RoomNo'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Fees Paid:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM Room WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['FeesPayment'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Balance:<?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM Room WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                $fee=$rows['FeesPayment'];
                $bal=1000000-$fee;
                echo $bal;
                 ?></h4>
                
              </td>
            </tr>
          </table>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Food Status:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM Room WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['FoodStatus'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Stay From:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM Room WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['StayFrom'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <table>
            <tr>
              <td><h4>Stay Duration:
                <?php $email=$_SESSION['email'];
                $qry=mysql_query("SELECT * FROM Room WHERE Email='$email'");
                $rows=mysql_fetch_array($qry);
                echo $rows['Duration'];
                 ?>
              </h4></td>
            </tr>
          </table>
        </div>
        
      </div>
    </div>
  </div>
</div>

<footer>
  <center><p>&copy;Copyrights</p></center>
</footer>

</body>
</html>
