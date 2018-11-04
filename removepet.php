<?php
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

$id = $_GET['id']; //this needs to be sanitized 
echo "$id";
if(!empty($id)){
    $result = mysqli_query($conn,"DELETE FROM pet WHERE id=".$id.";");
}

header("Location: adminpage.php");
