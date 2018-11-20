<?php
  $con=mysql_connect("localhost","root","mysql","test1");
  if ($con) {
    # code...
    echo "Success";
  }
  else
  {
    echo "Failed";
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
      <form method="post" enctype="multipart/form-data">
        <input type="file" name="image">        
        <input type="submit" name="stn" value="Upload">
      </form>
      <?php
        
        $image=$_POST['image'];
        $sbtn=$_POST['stn'];
        if (isset($sbtn)) {
          # code...
          if (getimagesize($_FILES['image']['tmp_name'])==FALSE) {
            # code...
            echo "Please Select Image";
          }
          else
          {
            $image=addslashes($_FILES['image']['tmp_name']);
            $name=addslashes($_FILES['image']['name']);
            $image=file_get_contents($image);
            $image=base64_encode($image);
            mysql_select_db(test1,$con);
            $qry=mysql_query("INSERT INTO test(image,name)VALUES('$image','$name')");
            $sql=mysql_query("SELECT * FROM test");
            if ($qry) {
              # code...
              echo "Image Uploaded";
            }
            else
            {
              echo "Not Ok";
            }

            while ($row=mysql_fetch_array($sql)) {
              # code...
              echo '<img height="100" width="100" src="data:image;base64,'.$row["image"].'"> ';
              if ($row=['image']==true) {
              # code...
                echo "YES FILE OCCUR";
            }
            else
            {
              echo "FILE NOT OCCUR";
            }
            }
          }
        }
        else
        {
          echo "not set";
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