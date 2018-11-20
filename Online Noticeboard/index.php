<?php
include("con.php");
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Notice Board</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>
    <div class="row">
      <div class="col-sm-12" id="header"><center><h1>Online Notice Board System</h1>
        <p>Kongunadu College of Arts and Science</p></center>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5 ">
        <video width="100%" controls>
          <source src="col.mp4" type="video/mp4">
        </video>
      </div>
      <div class="col-sm-7 ">
        <center>
          <h3>Online Notice Board System</h3>
          <p>
            Notice Board Management allows the College authorities to post important notices to online notice board which can be seen by students and staff members on their home screen after login. The College authorities can also post pictures, exam schedules, important notices such parents-teachers, picnic or activities/competition details etc on the notice board.
 
          </p>
          <h3>Features and Advantage of Online Notice Board System</h3>
          <p align="left">
            <b>
            The College easily post all types of message on the notice board.<br><br>
            Students and teachers can easily go through the notices through their logins.<br><br>
            The College authorities can automatically set to activate/deactivate a given notice for a given time period thus helping in automizing the posting and removal of notices after the given time period.<br><br>
            The authorities can also manually activate/deactivate the notices incase the College wants to remove the notice bearing wrong message.<br><br><br>
          </b>
          </p>
        </center>
      </div>
    </div>
    <div class="container ">
      <div class="row">
        <div class="col-md-6">
          <form method="POST">
            <div class="form-group">
                <center><h3>Login</h3></center>
                <label for="email">UserName or Register Number:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter UserName" name="uname">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
                <input type="Password" class="form-control"  placeholder="Password" name="passd">
            </div>

            <button type="submit" class="btn btn-primary" name="logbtn">Submit</button>
          </form>
          <?php
            $uname=$_POST['uname'];
            $pass=$_POST['passd'];
            $lbtn=$_POST['logbtn'];
            if (isset($lbtn)) {
              # code...
              mysql_select_db(noticeboard,$con);
              if (ereg('^AD', $uname)) {
                # code...
                
                $logqry=mysql_query("SELECT * FROM admin WHERE UserName='$uname'");
                $result=mysql_fetch_array($logqry);
      
                if (($uname==$result['UserName'])&&($pass==$result['Password'])) {
                  # code...
                  $_SESSION['users']=$uname;
                  header("location:createnotice.php");
                }
                else
                {
                  echo "<h5>Invalid UserName or Password</h5>";
                }
              }
              elseif (ereg('^ST', $uname)) {
                # code...
                $stuqry=mysql_query("SELECT * FROM student WHERE RegNo='$uname'");
                $srslt=mysql_fetch_array($stuqry);
                if (($uname==$srslt['RegNo'])&&($pass==$srslt['Password'])) {
                  # code...
                  $_SESSION['regno']=$uname;
                  
                  echo $_SESSION['dep']=$srslt['Course'];
                  header("location:studentnotice.php");
                }
                else
                {
                  echo "<h5>Invalid UserName or Password </h5>";
                }
              }
                elseif (ereg('^TE', $uname)) {
                # code...
                $stuqry=mysql_query("SELECT * FROM staffprofile WHERE UserName='$uname'");
                $srslt=mysql_fetch_array($stuqry);
                if (($uname==$srslt['UserName'])&&($pass==$srslt['Password'])) {
                  # code...
                  $_SESSION['staff']=$uname;
                  
                  echo $_SESSION['dep']=$srslt['Course'];
                  header("location:staff.php");
                }
                else
                {
                  echo "<h5>Invalid UserName or Password </h5>";
                }
              }}
                 


          ?>
        </div>
        <div class="col-md-6">
          <image src="sec.jpg"  class="img-responsive"><br><br>
        </div>
      </div>
    </div>
    <div class="row ">
  <div class="col-sm-6 ">
    <center><h2>Vission& Mission</h2></center>
    <p>Developing the total personality of every student in a holistic way by adhering to the principles of Swami Vivekananda and Mahatma Gandhi.<br><br>

    Imparting holistic and man-making education with emphasis on character, culture and value - moral and ethical.<br><br>
    Designing the curriculum and offering courses that transform its students into value added skilled human resources.<br><br>
    Constantly updating academic and management practices towards total quality management and promotion of quality in all spheres.<br><br>
    Extending the best student support services by making them comprehensive and by evolving a curriculum relevant to student community and society at large.<br><br>
    Taking steps to make education affordable and accessible by extending scholarships to the meritorious and economically disadvantaged students.<br><br>
    Moulding the teachers in such a way that they become the role models in promoting Higher Education.


    </p>
  </div>
  <div class="col-sm-6">
    <center><h2>Goals</h2></center>
    <p>
      
    Maintaining high academic standards.<br><br>
    Educating students from rural, agricultural community by giving preference.<br><br>
    Creating empowerment of women through education.<br><br>
    Keeping pace with the knowledge era and gearing up in all activities to match the demands of the scientific and technological world.<br><br>
    Enhancing mind set towards research and creation of new Knowledge.<br><br>
    Making every student of the college skilled and employable.

    </p>
  </div>
</div>
  <footer class="container-fluid">
  <div class="col-md-12 " style="background:none"><center>&copy;Copyrights</center></div>
</footer>
  </body>
</html>