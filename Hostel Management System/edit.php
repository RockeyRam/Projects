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
  <title>Edit Profile</title>
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
    #savebtn
    {
      height: 100px;
      width: 50px;
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
        <li class="active"><a href="edit.php">Edit</a></li>
        <li><a href="others.php">Others</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
      
    </div>
    <div class="col-sm-9">
      <center><h1>Edit Your Profile</h1></center>
      <form role="form" method="POST">

        <div class="row form-group">
          <div class="col-md-6"><input type="text" name="Ename" class="form-control" placeholder="Name">
             <?php
                mysql_select_db(hostel,$con); 
                $Ename=$_POST['Ename'];
                if ($Ename!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                  
                    $qry=mysql_query("UPDATE student SET Name='$Ename' WHERE Email='$email'" );
                  }
                }
                    
             ?> 
          </div>
          <div class="col-md-6"><input type="text" name="Epname" class="form-control" placeholder="Parent Name">
            <?php 
                
                $Epname=$_POST['Epname'];
                if ($Epname!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                    $qry=mysql_query("UPDATE student SET ParentName='$Epname' WHERE Email='$email'" );
                  }
                }
                                               
             ?> 
          </div>
        </div>
        <div class="row form-group">
          
         
        </div>

          <div class="row form-group">
          <div class="col-md-6"><input type="text" name="Econtact" class="form-control" placeholder="Contact No">
            <?php 
                
                $Econtact=$_POST['Econtact'];
                if ($Econtact!="") {
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                    $qry=mysql_query("UPDATE student SET ContactNo='$Econtact' WHERE Email='$email'" );
                    if ($qry) {

                      # code...
                      echo "Updated Successfully";
                    }
                    else
                      echo "Invalid Data";
                  }
                  
                }
                                               
             ?> 
          </div>
          <div class="col-md-6"><input type="text" name="Ecourse" placeholder="Course" class="form-control">
              <?php   
                
                $Ecourse=$_POST['Ecourse'];
                if ($Ecourse!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                    $qry=mysql_query("UPDATE student SET Course='$Ecourse' WHERE Email='$email'" );
                  }
                }
                                               
             ?> 
            </div>
        </div>
        <div class="row form-group">
          
          <div class="col-md-6"><input type="text" name="Epcontact" class="form-control" placeholder="Parrent Contact No">
            <?php 
                
                $Epcontact=$_POST['Epcontact'];
                if ($Epcontact!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                  
                    echo "set";
                    $qry=mysql_query("UPDATE student SET ParentContactNo='$Epcontact' WHERE Email='$email'" );
                    
                  }
                  
                }
                                               
             ?> 
          </div>
          
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <label for="sel1">Gender:</label>
            <select class="form-control" id="sel1" name="Egender">
              <option class="active">Female</option>
            </select>
           <?php 
                
                $Egender=$_POST['Egender'];
                if ($Egender!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
              
                  if (isset($sbtn)) {
                  
                    $sdb=mysql_select_db(hostel,$con);
                    $qry=mysql_query("UPDATE student SET Gender='$Egender' WHERE Email='$email'" );
                    
                  }
                }
                                               
             ?> 
          </div>
            
        </div>
        <left><h3>Address</h3></left>
        <div class="row">
          <div class="col-md-6">
            <textarea placeholder="Enter your Address" class="form-control"  name="Eaddr">
              <?php 
                
                $Eaddr=$_POST['Eaddr'];
                if ($Eaddr!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                    $qry=mysql_query("UPDATE student SET Address='$Eaddr' WHERE Email='$email'" );
                  }
                }
                                               
             ?> 
            </textarea>
          </div>
          <div class="col-md-6"><input type="text" name="Ecity" class="form-control" placeholder="City">
            <?php 
                
                $Ecity=$_POST['Ecity'];
                if ($Estate!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                  
                    $qry=mysql_query("UPDATE student SET State='$Estate' WHERE Email='$email'" );
                  }
                }
                                               
             ?>            
           </div>         
         </div><br>           
         <div class="row">         
          <div class="col-md-6"><input type="text" name="Estate" class="form-control" placeholder="State">             
                <?php  
                $Estate=$_POST['Estate'];
                if ($Estate!="") {
                  # code...
                  $email=$_SESSION['email'];
                  $sbtn=$_POST['savebtn'];
                  if (isset($sbtn)) {
                  
                    $qry=mysql_query("UPDATE student SET State='$Estate' WHERE Email='$email'" );
                  }
                }
                                               
             ?> 
          </div>
          
        </div>
        <br><br>
        <center><button type="submit" class="btn btn-primary" name="savebtn">Save</button></center><br>
        </div> 
        <?php 
          if (isset($sbtn)) {
            # code...
            if ($qry) {
              # code...
              echo "Updated Successfull";
            }
          }
        ?>      
      </form>        
    </div>
  </div>
</div>              
<footer class="container-fluid">
<center>&copy;Copyrights</center>
</footer>
  <?php mysql_close(); ?>
</body>
</html>   