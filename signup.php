<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
    <div class="sign-up-form">
    <h1>Sign Up Now!</h1>
    <form method="post" action="">
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
$sql="INSERT INTO user(firstname,lastname,town,email,username,password) VALUES ('$_POST['firstname']','$_POST['lastname']','$_POST['town']','$_POST['email']','$_POST['username']','$_POST['password']')";
if($conn->query($sql)===TRUE){
	echo "New record created successfully";
}else {
	echo "Error: ". $sql . "<br>" . $conn->error;
}
$conn->close();
?>
</body>
</html>