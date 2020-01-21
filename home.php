<?php

$_SESSION['errors'] = array("Your username or password was incorrect.");
header("Location:index.php");

require_once('dbconnect.php');


$email = $_GET['email'];
$staffNumber = $_GET['staffNumber'];


echo "<br>";


$my_query = "";


$my_query = "select * from lecturerTable where email = '$email' and staffNumber = '$staffNumber'"; 

$result = mysqli_query($connection, $my_query);

if(mysqli_num_rows($result) > 0)
{
    header("Location:http://localhost:8888/APP_4/landingpage.php"); 
exit; // <- don't forget this!
    
}
else
{
    header("Location:http://localhost:8888/APP_4/index.php"); 
 
}



