<?php
$servername = "localhost";
$username = "root";
$password = 'mysql';
$dbname = "Guvi";

$Email = "viki@mail.com";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Guvi", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM Users where Email=:Email"); // case sensitive
    $stmt->execute(['Email' => $Email]);

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $data = $stmt->fetchAll();
     
    foreach ($data as $row) {
     	$userid=$row['Email'];
     	$pass=$row['password'];
     } 

     if ($userid==$Email and $pass==$password) {
     	header("location:profile.php");
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "<pre>";
print_r($data);
?> 
