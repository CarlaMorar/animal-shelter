<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

    <div class="register-form">
    <h1>Sign Up Now!</h1>
    <form method="post" action="register.php">
       <p>Picture(optional):
       <input type="file" name="pic"></p>
       <input type="text" name="firstname" placeholder="First name*" required><br>
       <input type="text" name="lastname" placeholder="Last name*" required><br>
       <input type="text" name="town" placeholder="Town*" required><br>
       <input type="email" name="email" placeholder="Email*" required><br>
       <input type="text" name="username" placeholder="Username*" required><br>
       <input type="password" name="password" placeholder="Password*" required><br>
       <input type="password" name="password2" placeholder="Confirm password*" required><br>
       <input type="submit" name="submit" value="Submit">
    </form>
    </div>
</body>
</html>	
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

if(isset($_POST['submit']))
{
echo "Submit pressed!";
$pic=$_POST['pic'];
$fn=mysqli_real_escape_string($conn,$_POST['firstname']);
$ln=mysqli_real_escape_string($conn,$_POST['lastname']);
$tw=mysqli_real_escape_string($conn,$_POST['town']);
$m=mysqli_real_escape_string($conn,$_POST['email']);
$u=mysqli_real_escape_string($conn,$_POST['username']);
$pw=mysqli_real_escape_string($conn,$_POST['password']);
$pw2=mysqli_real_escape_string($conn,$_POST['password2']);


if (same_password())
{
$hash=password_hash($pw,PASSWORD_BCRYPT);
$sql="INSERT INTO user(pic,firstname,lastname,town,email,username,password) VALUES ('$pic','$fn','$ln','$tw','$m','$u','$hash')";
if(mysqli_query($conn,$sql)===TRUE){
	echo "New record created successfully";
	header('Location:index.php');
}else if($conn->errno==1062){
	$message = "Username already taken";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
	else echo "Error: ". $sql . "<br>" . $conn->error;

}
else {
	$message = "You must introduce the same password!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
}

$conn->close();

function same_password(){
	return $_POST['password']==$_POST['password2'];
}
?>