<?php
  include("ConnectionDB.php");
  session_start();
  if (!isset($_SESSION['email'])) {
  header('location:Login.php');
 }
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
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Menu</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="Register.php">Register</a></li>
        
        <li class="active"><a href="#">Notes</a></li>
        <li><a href="images.php">Images</a></li>
        <li><a href="Logout.php">Logout</a></li>
        
      </ul><br>
      
    </div>

    <div class="col-sm-9">
      <center><h2>Keep</h2></center>
      <center><h4>Keep all the things you want...</h4></center>

      <form role="form" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="row form-group">
          <div class="col-sm-6"><input type="text" class="form-control" placeholder="Name" name="note"></div>

          <input type="file" name="image" >
          
        </div>
        <div class="row form-group">
          <div class="col-sm-3">
            <button class="btn btn-primary" name="Addnote">Add Notes</button>
          </div>
        </div>
        
      </form>
      <?php
        $UserEmail=$_SESSION['email'];
        $note=$_POST['note'];
        $Addnote=$_POST['Addnote'];
        if(isset($Addnote))
        {

          mysql_select_db(Keep,$con);
              $image=addslashes($_FILES['image']['tmp_name']);
              $name=addslashes($_FILES['image']['name']);
              $image=file_get_contents($image);
              $image=base64_encode($image);       

              $date=date("Y-m-d");
              

              if (!empty($note)) {
                $InsertNote=mysql_query("INSERT INTO Notes(Email,Texts,Dates) VALUES ('$UserEmail','$note','$date')");
                if ($InsertNote) {
                  echo "<p>Notes Added</p>";
                }
                else
                  echo mysql_error();
              }

              
           if ($_FILES['cover_image']['size'] == 0 && $_FILES['cover_image']['error'] == 0)
              {
                  echo "<p> </p>";
                  
                }
                else
                {
                    $Insert=mysql_query("INSERT INTO Images(Email,Picture,Dates) VALUES ('$UserEmail','$image','$date')");

                  if ($Insert) 
                  {
                    echo "<p>Image Added Successfully</p>";
                  }
               }
              /*else
              {
                  echo "<p>No Files selected</p>";
              }*/
              
              
        }

      ?>
      <!--DISPLAY Notes -->
      
      <div class="container">
      <?php

        mysql_select_db(Keep);
           //results per page
        $results_per_page=10;

        //Number of rows
        $sql="SELECT * FROM Notes";
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

         $sqls="SELECT * FROM Notes WHERE Email='$UserEmail' ORDER BY Dates DESC LIMIT ".$this_page_first_result.','.$results_per_page;
    
         $result=mysql_query($sqls);
         while ($row=mysql_fetch_array($result)) {
           # code...
        ?>
          <div class="row">
            <div class="col-sm-7">
              <u><h4><?php echo $row['Dates'];?></h4></u>
              <h4><?php echo $row['Texts'];?></h4><br>
              
            </div>
          </div>
          <?php
         }

        //Display Link to the page
        for ($page=1; $page<=$no_of_page ; $page++) { 
          # code...
         ?>
         <ul class="pagination"><?php
          echo '<li><a href="studentallnotice.php?page='. $page.'">'.$page.'</a></li>';
          ?>
        </ul>
        <?php
        }

        ?>


 


    
    
  </div>
    
</div>



    </div>
  </div>


<footer class="container-fluid">
<center>&copy Copyrights|Keep me</center>
</footer>

</body>
</html>
