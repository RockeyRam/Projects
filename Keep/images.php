<?php
  include("ConnectionDB.php");
  session_start();
  if (!isset($_SESSION['email'])) {
  header('location:Login.php');

  }s
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Keep</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
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

    #pages
    {
    	position: fixed;
    	bottom: 10px;
    	left: 400px;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Menu</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="Register.php">Register</a></li>
        
        <li><a href="keepme.php">Notes</a></li>
        <li class="active"><a href="images.php">Images</a></li>
        <li><a href="Logout.php">Logout</a></li>
        
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <center><h2>Keep</h2></center>
      <center><h4>Keep all the things you want...</h4></center>

      <div class="container">
   
      <?php
      		$UserEmail=$_SESSION['email'];

          mysql_select_db(Keep);
          

          //results per page
        $results_per_page=10;

        //Number of rows
        $sql="SELECT * FROM Images";
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

         $sqls="SELECT * FROM Images WHERE Email='$UserEmail' ORDER BY Dates DESC LIMIT ".$this_page_first_result.','.$results_per_page;
    
         $result=mysql_query($sqls);

    ?>
    <table>
    	<?php
         $Iteration=0;
   
         while ($row=mysql_fetch_array($result)) 
         {
         	if ($i%3==0) {
         		echo "<tr>";
         	}
 
          	if ($row['Picture']==true) {
                  # code...
                  echo '<img height="200" width="200" src="data:image;base64,'.$row["Picture"].'"> ';
            }
                          
            if ($i%3==2) {
                echo "</tr>";
            }       

              ?>
    </table> 
          <?php
        }
        echo "<br>";
        //Display Link to the page
        for ($page=1; $page<=$no_of_page ; $page++) { 
          
         ?>
         <ul class="pagination page-item" ><?php
          echo '<li><a href="keepme.php?page='. $page.'">'.$page.'</a></li>';
          ?>
        </ul>
        <?php
        }

        

      ?>    
    </div>
    <!-- Display Images -->


    
    
 



    </div>
  </div>
</div>

<footer class="container-fluid">
  <center><p>&copy Copyrights  |  Keepme</p></center>
</footer>

</body>
</html>
