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
    <title>Manage Notice</title>
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
        <li><a href="register.php">Student Register</a></li>
        <li><a href="managestudent.php">Manage Student</a></li>
        <li class="active"><a href="managenotice.php">Manage Notice</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <div class="row">
      <div class="col-sm-12">
        <center><h1>Online Notice Board System</h1></center>
      </div>
    </div>
    <center><h3>Manage Notice</h3></center>
      <form method="post" class="form-group">
        <div class="row">
          <div class="col-sm-7">
            <label>Search Notice</label>
            <input type="text" name="sdate" placeholder="Enter Date" class="form-control">
          </div>
          <div class="col-sm-5">
            <button type="submit" name="sebtn" class="btn btn-primary" style="margin-top: 25px;">Search</button>
          </div>
      </div>
      </form>
    
      
      <?php
        $sdate=$_POST['sdate'];
        $sebtn=$_POST['sebtn'];
        if (isset($sebtn)) {
          # code...
          
          mysql_select_db(noticeboard,$con);
          //results per page
        $results_per_page=10;

        //Number of rows

        $sql="SELECT * FROM notice WHERE DateOfNotice='$sdate'";
        $result=mysql_query($sql);
        $no_of_results=mysql_num_rows($result);
      /* while ($row=mysql_fetch_array($result)) {
          # code...
          echo $row['Title']." ".$row['Descreption']." ".$row['File']."<br>";
        }*/
        //Number of TOtal page available
        $no_of_page=ceil($no_of_results/$results_per_page);
        //Which page Number visitor use
        if (!isset($_GET['page'])) {
          # code...
          $page=1;
        }
        else
        {
          $page=$_GET['page'];
        }
        //determine the sql LIMIT
       
         $this_page_first_result=($page-1)*10;

         //Retrive selected results form database and display them on page

         $sqls="SELECT * FROM notice WHERE DateOfNotice='$sdate' LIMIT ".$this_page_first_result.','.$results_per_page;
    
         $result=mysql_query($sqls);
         while ($row=mysql_fetch_array($result)) {
           # code...
        ?>
          <div class="row">
            <div class="col-sm-7">
              <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $row['Title']; ?></div>
                <div class="panel-body"><?php echo $row['Description']; ?></div>
                <div class="panel-body"><?php 
                    
                    if ($row['File']==true) {
                      # code...
                      echo '<img height="100" width="100" src="data:image;base64,'.$row["File"].'"> ';
                    }
                    ?>
                      
                </div>
                <div class="panel-footer">
                  <center><input type="button" name="del" class="btn btn-danger" value="Delete">  </center>
                </div>
                
              </div>
            </div>
          </div>
          <?php
         }

        //Display Link to the page
        for ($page=1; $page<=$no_of_page ; $page++) { 
          # code...
         ?>
         <ul class="pagination"><?php
          echo '<li><a href="managenotice.php?page='. $page.'">'.$page.'</a></li>';
          ?>
        </ul>
        <?php
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