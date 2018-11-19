<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hostel Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

    .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';https://www.google.com/
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

  </style>
</head>
<body>
  <div class="row">
    <div class="col-md-12 "><center><h1>Hostel Management</h1></center></div>
  </div>
 <nav class="navbar navbar-inverse">
   <div class="container-fluid">
     <div class="navbar-header">
        <a href="#" class="navbar-brand">Dhiya Girls Hostel</a>
     </div>
     <ul class="navbar-nav nav navbar-right navbar-brand">
       <a href="index.php"><span style="text-decoration: none;">Home</a>
       <a href="login.php">SignIn</a> 
       <a href="about.php">About</a>
     </ul>
   </div>
 </nav>
 <div class="row">
   <div class="col-sm-12">
     <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img.jpg" style="width:100%">
  <div class="text">Bed Room</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img2.jpg" style="width:100%">
  <div class="text">Food court</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img3.jpg" style="width:100%">
  <div class="text">Play Ground</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

   </div>
 </div>
  <div class="row">
    <div class="col-md-12 "><a href="login.php"><center><button class="button" style="vertical-align:middle"><span>LogIn</span></button></center></a></div>
  </div>
  <div class="container-fluid">
 <div class="row">
    <div class="col-md-4">
      <center><h1>Features Of Our Hostel</h1></center>
      <p>Our shared dorms have a maximum of 4 or 5 beds per room, and every room has a private, en suite bathroom. We also have two types of private rooms: Standard private rooms have either a double bed or 2 tiwn beds. There's a full, private bathroom in every room, as well as a writing desk, seating area, and in-room safe.</p>
    </div>
   <div class="col-md-6"><h1>Hostel Rules</h1><p>
     Students must occupy rooms specifically allotted to them. They are not allowed to change rooms except with the written permission of the Warden/ Chief Warden. However, students can choose their room-mates as per their choice within first few days, and duly inform their Hostel Warden.
Change of accommodation from one hostel to another during a term is generally not permitted.
Allotment made to a student is subject to cancellation if he/she fails to occupy the room within the prescribed time. Students are liable to forfeit their rooms if they fail to clear all their dues to the hostel by the appointed day and are asked to vacate the hostel.
The Chief Warden reserves the right to break open rooms in case of any violation of hostel rules, suspected unlawful activities or on a perceived security risk.
   </p>

   </div>
 </div>
</div>
<div class="row">
    <div class="col-md-12"><center>&copy;Copyrights</center></div>
</div>
</body>
</html>
