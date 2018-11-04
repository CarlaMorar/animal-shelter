<?php
session_start();
if(isset($_SESSION['username'])&&$_SESSION['username']!=""){
$servername = "localhost";
$username = "root";
$password = "";
$dbname="shelterdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

$id = $_GET['id'];
$u=$_SESSION['username'];
$verify="SELECT * FROM adoptionrequest WHERE petID='$id' and personUsername='$u'";
$result=mysqli_query($conn,$verify);
$row=mysqli_fetch_assoc($result);
if($row){
	//$message = "You already requested to adopt this pet!";
    //echo "<script type='text/javascript'>alert('$message');</script>";
	echo "Already tried to adopt this pet";
	
}
else if(!empty($id)){
$sql="INSERT INTO adoptionrequest (petID,personUsername) VALUES ('$id','$u')";
if(mysqli_query($conn,$sql)===TRUE){
	echo "New record created successfully";
}
}
$conn->close();
}
	header('Location:pets.php');