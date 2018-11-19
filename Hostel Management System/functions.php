 <?php
  include("con.php");
  session_start();
  if (!isset($_SESSION['room'])) {
   # code...
  header('location:room.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Room</title>
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
        <li class="active"><a href="room.php">Room</a></li>
        <li><a href="register.php">Student Registration</a></li>
        <li><a href="managestudent.php">Manage Student</a></li>
        <li><a href="notif.php">Notification</a></li>
        <li><a href="addemp.php">Register Employee</a></li>
        <li><a href="manageemployee.php">Manage Employee</a></li>
        <li><a href="employee.php">Employee</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <div class="row">
          <div class="col-md-12 well "><center><h1>Hostel Management</h1></center></div>
    </div>
      <div class="row">
        <div class="col-sm-12">
          <center><h2>Room No:<?php 
          $roomn=$_SESSION['room'];
          echo $roomn;
          mysql_select_db(hostel,$con);
          ?>
            
          </h2></center>
          
        </div>
        <?php
            $getquery=mysql_query("SELECT * FROM student WHERE RegNo IN (SELECT RegNo FROM Room WHERE RoomNo='$roomn')");
            ?>
              <table class="table table-hover">
    <thead>
      <tr>
        <th>Register No</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Course</th>
        <th>Gender</th>
        <th>Contact No</th>
      </tr>
    </thead>
      <?php
         //results per page
        $results_per_page=10;

        //Number of rows
        $sql="SELECT * FROM student WHERE RegNo IN (SELECT RegNo FROM Room WHERE RoomNo='$roomn')";
        $result=mysql_query($sql);
        $no_of_results=mysql_num_rows($result);

        $no_of_page=ceil($no_of_results/$results_per_page);

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

         $sqls="SELECT * FROM student WHERE RegNo IN (SELECT RegNo FROM Room WHERE RoomNo='$roomn') LIMIT ".$this_page_first_result.','.$results_per_page;
         $result=mysql_query($sqls);
         
        
        while ($row=mysql_fetch_array($result)) {
            # code...
            echo '<tbody>';
              echo '<tr>';
                echo '<td>'.$row['RegNo'].' </td>';
                echo '<td>'.$row['Name'].' </td>';
                echo '<td>'.$row['Email'].' </td>';
                echo '<td>'.$row['Course'].' </td>';
                echo '<td>'.$row['Gender'].' </td>';
                echo '<td>'.$row['ContactNo'].' </td>';
              echo '</tr>';
            echo '</tbody>';

          }      
         
      ?>    
        
        </table>
      </div>
      <?php
      for ($page=1; $page<=$no_of_page ; $page++) { 
          # code...
         ?>
         <ul class="pagination"><?php
          echo '<li><a href="functions.php?page='. $page.'">'.$page.'</a></li>';
          ?>
        </ul>   
        <?php
        }
        
      ?>
    </div>
  </div>

   
</div>

<footer class="container-fluid">
  <center><p>&copy;Copyrights</p></center>
</footer>
<?php 
  
  
?>
</body>
</html>
