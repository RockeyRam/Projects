<?php
include('PHPCodes.php');
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<!-- //web font -->


</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Register</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="post">
					<input class="text" type="text" name="name" placeholder="Name" required="">
					<input class="text email" type="email" name="email" data-validation="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="Confirm" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit"  value="SIGNUP" name="submit">

					

				</form>
				
				<p>Already have an Account? <a href="Login.php"> Login Now!</a></p>
				<p id="pass"></p>
			</div>
		</div>
		<!-- copyright -->
		
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li>Guvi</li>
			<li>Guvi</li>
			<li>Internship Challenge</li>
			<li>Guvi</li>
			<li>:-)</li>
			<li>Internship Challenge</li>
			<li>Guvi</li>
			<li>Guvi</li>
			
		</ul>
	</div>
	<!-- //main -->
</body>
</html>
