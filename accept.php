<?php
session_start();
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

$id = $_GET['id'];
if(!empty($id)){
    $result = mysqli_query($conn,"SELECT * FROM animalrequest WHERE animalId=".$id.";");
	$row=mysqli_fetch_assoc($result);
	if($row){
		$type=$row['type'];
		$picture=$row['picture'];
		$name=$row['name'];
		$gender=$row['gender'];
		$age=$row['age'];
		$breed=$row['breed'];
		$agr=$row['isAgressive'];
		$sql="INSERT INTO pet(type,picture,name,gender,age,breed,isAgressive) VALUES('$type','$picture','$name','$gender','$age','$breed','$agr')";
	    if(mysqli_query($conn,$sql)===TRUE){
		 $result = mysqli_query($conn,"DELETE FROM animalrequest WHERE animalId=".$id.";");
	     header('Location:adminpage.php');
		 
        }
		else echo "Error: ". $sql . "<br>" . $conn->error;
	}
}
