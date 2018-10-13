<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>

    <div class="sign-up-form">
    <h1>Sign Up Now!</h1>
    <form method="post" action="signup.php">
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
$fn=test_input($_POST['firstname']);
$ln=test_input($_POST['lastname']);
$tw=test_input($_POST['town']);
$m=test_input($_POST['email']);
$u=test_input($_POST['username']);
$pw=test_input($_POST['password']);
$pw2=test_input($_POST['password2']);
$iUniqueNumber = crc32(uniqid());


if (same_password())
{
$sql="INSERT INTO user(id,firstname,lastname,town,email,username,password) VALUES ('$iUniqueNumber','$fn','$ln','$tw','$m','$u','$pw')";
if(mysqli_query($conn,$sql)===TRUE){
	echo "New record created successfully";
	header('Location:index.html');
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

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function same_password(){
	return $_POST['password']==$_POST['password2'];
}
?>