<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="shelterdb";

$conn = mysqli_connect($servername, $username, $password,$dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";

$delete = $_GET['delete'];
//echo "$delete";
if(!empty($delete)){
    $result = mysqli_query($conn,"DELETE FROM user WHERE id=".$delete.";");
}

header("Location: adminpage.php");

