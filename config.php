<?php
$hostname     = "localhost"; 
$username     = "root";  
$password     = "";   
$databasename = "test";  

$conn = mysqli_connect($hostname, $username, $password, $databasename);

if ($conn->connect_error) { 
    die("Unable to Connect database: " . $conn->connect_error);
}
?>