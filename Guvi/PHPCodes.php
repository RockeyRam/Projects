<?php
include('connection.php');
session_start();
if (isset($_POST['submit'])) 
{
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Password=$_POST['password'];
	$ConfirmPassword=$_POST['Confirm'];
	
	ValidationRegister($Name,$Email,$Password,$ConfirmPassword);
}

if (isset($_POST['login-submit'])) 
{
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	ValidationLogin($Email,$Password);
}

if (isset($_POST['psubmit'])) {
	$username=$_POST['username'];
	$name=$_POST['name'];
	$lastname=$_POST['lastname'];
	$text=$_POST['text'];
	$select=$_POST['select'];
	$website=$_POST['website'];
	$email=$_POST['email'];
	$publicinfo=$_POST['publicinfo'];
	ProfileInsert($username,$name,$lastname,$text,$select,$email,$publicinfo);

}

function ValidationRegister($Name,$Email,$Password,$ConfirmPassword)
{
	if($Password==$ConfirmPassword)
	{
		
		try 
		{

           	$pdoConnect = new PDO("mysql:host=localhost;dbname=Guvi","root","mysql");
	    } 
	    catch (PDOException $exc)
	    {
	        echo $exc->getMessage();
	        exit();
	    }

   
    
    

	    $pdoQuery = "INSERT INTO `Users`(`Name`, `Email`, `Password`) VALUES (:Name,:Email,:Password)";
	    
	    $pdoResult = $pdoConnect->prepare($pdoQuery);
	    
	    $pdoExec = $pdoResult->execute(array(":Name"=>$Name,":Email"=>$Email,":Password"=>$Password));
	    
        // check if mysql insert query successful
	    if($pdoExec)
	    {
	        echo "
	        	<script type='text/javascript'>
	        		alert('You are Registered Successflly');
	        	</script>
	        ";
	    }
	    else
	    {
	        echo "
	        	<script type='text/javascript'>
	        		alert('Error');
	        	</script>
	        ";
	    }
	    $pdoConnect=null;	
	}
}


function ValidationLogin($Email,$Password)
{

$servername = "localhost";
$username = "root";
$password = 'mysql';
$dbname = "Guvi";




try {
    $conn = new PDO("mysql:host=$servername;dbname=Guvi", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM Users where Email=:Email"); // case sensitive
    $stmt->execute(['Email' => $Email]);

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data = $stmt->fetchAll();
     
    foreach ($data as $row) {
     	$userid=$row['Email'];
     	$pass=$row['Password'];
     } 

     echo $userid."<br>";
     echo $Email."<br>";
     echo $LPassword."<br>";
     echo $pass."<br>";
     if ($userid==$Email and $pass==$Password) {
     	header("location:profile.php");
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

}

function ProfileInsert($username,$name,$lastname,$text,$select,$email,$publicinfo,$website)
{
	try 
		{

           	$pdoConnect = new PDO("mysql:host=localhost;dbname=Guvi","root","mysql");
	    } 
	    catch (PDOException $exc)
	    {
	        echo $exc->getMessage();
	        exit();
	    }

   
    
    

	    $pdoQuery = "INSERT INTO Users(UserName,Name,LastName,NickName,Displayname,Website,PublicInfo,Email) VALUES (:username,:name,:lastname,:text,:select,:website,:publicinfo,:email)";
	    
	    $pdoResult = $pdoConnect->prepare($pdoQuery);
	    
	    $pdoExec = $pdoResult->execute(array(":UserName"=>$username,":LastName"=>$lastname,":NickName"=>$text,":Displayname"=>$select,":Website"=>$website,":PublicInfo"=>$publicinfo,"Email"=>$Email));
	    
        // check if mysql insert query successful
	    if($pdoExec)
	    {
	        echo "
	        	<script type='text/javascript'>
	        		alert('You are Registered Successflly');
	        	</script>
	        ";
	    }
	    else
	    {
	        echo "
	        	<script type='text/javascript'>
	        		alert('Error');
	        	</script>
	        ";
	    }
	    $pdoConnect=null;		
}
?> 
