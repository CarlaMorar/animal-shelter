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

//echo "Connected successfully";

if(isset($_POST['sign-in-button'])){
    $sql=sprintf("SELECT * from user WHERE username='%s'",
	mysqli_real_escape_string($conn,$_POST['username']));
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row){
		$hash=$row['password'];
		$isAdmin=$row['isAdmin'];
		$p=$_POST['password'];
		$firstname=$row['firstname'];
		$pic=$row['pic'];

		if(password_verify($p,$hash)){
            $_SESSION['username'] = $firstname;
			$_SESSION['isAdmin']=$isAdmin;
			$_SESSION['pic']=$pic;
			if($isAdmin==0){
				header("Location:mainpage.php");
			}
			else {
				header("Location:adminpage.php");
			}
		}
		else{
			echo 'Incorrect password';
		}
	}else
	{
		echo 'Incorrect username';
	}
	$conn->close();
}

?>
<!DOCTYPE html>
<html>
<head>
<title>AnimalShelter</title>
<style>
.sign-in-form{
    font: bold arial;
    width:450px;
    padding:30px;
    margin:15% auto 10% 5px;
    background:	#FAF0E6;
    border-radius: 10px;
    -webkit-border-radius:10px;
    -moz-border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
}
.sign-in-form input[type="text"],
.sign-in-form input[type="password"]{
     display: block;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 8px;
    border-radius: 6px;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border: 2px solid #fff;
    box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
    -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
}
.sign-in-form input[type="submit"]{
   background: 	#FFA07A;
    padding: 8px 20px 8px 20px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
    font: normal 30px 'Bitter', serif;
    -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
    border: 1px solid #FFE4B5;
    font-size: 15px;
	margin-left:35%;
}
</style>
</head>
<body style="background-image:url(./images/background.jpg);background-repeat:no-repeat;background-size:100%">
<div class="sign-in-form" id="sign-in-form">
<form method="post" action="index.php">
	<input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
	<input type="submit" name="sign-in-button" value="Sign in"><br>
</form>
<p style="margin-left:25%">You don't have an account?</p>
<a href="./register.php" style="margin-left:38%">Register</a>
</div>
</body>
</html>
