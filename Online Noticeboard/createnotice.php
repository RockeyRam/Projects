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
    <title>Create Notice</title>
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
    
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Create Notice</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="register.php">Student Register</a></li>
        <li><a href="managestudent.php">Manage Student</a></li>
        <li><a href="managenotice.php">Manage Notice</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
    <div class="row">
      <div class="col-sm-12">
        <center><h1>Online Notice Board System</h1></center>
      </div>
    </div>
      <center><h2>Create New Notice</h2></center>
      <div class="row">
        <div class="col-sm-12">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" name="desc"></textarea>
            </div>
             <div class="form-group">
              <label for="sel1">Select Department:</label>
              <select class="form-control" id="sel1" name="dep">
                <option>B.sc Computer Science</option>
                <option>B.sc Physics</option>
                <option>B.sc Chemistry</option>
                <option>Staffs</option>
              </select>
            </div> 
            <div class="form-group">
              <label>Select File</label>
              <input type="file" name="image" >
            </div>
            <div class="form-group">
              <center><input type="submit" name="subbtn" class="btn btn-success" value="Submit"></center>
            </div>
          </form>
          <?Php
            $title=$_POST['title'];
            $desc=$_POST['desc'];
            $dep=$_POST['dep'];
            $file=$_POST['file'];
            $subbtn=$_POST['subbtn'];
            $comp="B.sc Computer Sciecnce";
            $phy="B.sc Physics";
            $chem="B.sc Chemistry";
            $staff="Staffs";
            if (isset($subbtn)) {
              # code...
              
              mysql_select_db(noticeboard,$con);
              $image=addslashes($_FILES['image']['tmp_name']);
              $image=addslashes($_FILES['image']['tmp_name']);
              $name=addslashes($_FILES['image']['name']);
              $image=file_get_contents($image);
              $image=base64_encode($image);       


              
              




              $date=date("Y-m-d");
              $nquery1=mysql_query("INSERT INTO notice(Title,DateOfNotice,Description,Department,File)VALUES('$title','$date','$desc','$dep','$image')");
              if ($dep==$comp) {
                # code...
                $nquery=mysql_query("INSERT INTO computer(Title,DateOfNotice,Description,File)VALUES('$title','$date','$desc','$image')");
                if (!$nquery||!$nquery1) {
                  # code...
                  echo "Error".mysql_error();
                }
                else
                {
                  echo "Notice Sent";
                }
              }
              elseif ($dep==$phy) {
                # code...
                $nquery=mysql_query("INSERT INTO physics(Title,DateOfNotice,Description,File)VALUES('$title','$date','$desc','$image')");
                if (!$nquery||!$nquery1) {
                  # code...
                  echo "Error".mysql_error();
                }
                else
                {
                  echo "Notice Sent";
                }
                
              }
              elseif ($dep==$chem) {
                # code...
                $nquery=mysql_query("INSERT INTO chemistry(Title,DateOfNotice,Description,File)VALUES('$title','$date','$desc','$image')");
                if (!$nquery||!$nquery1) {
                  # code...
                  echo "Error".mysql_error();
                }
                else
                {
                  echo "Notice Sent";
                }

              }
              elseif ($dep==$staff) {
                # code...
                $nquery=mysql_query("INSERT INTO staff(Title,DateOfNotice,Description,File)VALUES('$title','$date','$desc','$image')");
                if (!$nquery||!$nquery1) {
                  # code...
                  echo "Error".mysql_error();
                }
                else
                {
                  echo "Notice Sent";
                }

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
  <div class="col-md-12 " style="background:none"><center>&copy;Copyrights</center></div>
</footer>

  </body>
</html>