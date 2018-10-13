<!DOCTYPE html>
<html>
<head>
    <title>AddPet</title>
    <link rel="stylesheet" type="text/css" href="addpet.css">
</head>
<body>
<div class="add-pet-form">
    <h1>Give us some information about the pet you want to add</h1>
	 <h2>We will find it a home</h2>
<form action="" method="POST">
<p>Picture</p>
<input type="file" name="pic" required>
<p>Cat or dog?</p>
<select name="animal" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="cat">Cat</option>
  <option value="dog">Dog</option>
  </select>
<p>Name (optional)</p>
<input type="text" name="name">
<p>Gender</p>
<select name="gender" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="f">Female</option>
  <option value="m">Male</option>
  </select>
<p>Age(years)</p>
<select name="age" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="little">Younger than 1 year old</option>
  <option value="13y">1-3 years old</option>
  <option value="36y">3-6 years old</option>
  <option value="610y">6-10 years old</option>
  <option value="m10y">Older than 10 years old</option>
 </select>
<p>Breed</p>
<input type="text" name="breed">
<p>Where did you find it?</p>
<textarea></textarea>
<p>Is it agressive?</p>
<select name="agressive" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="yes">Yes</option>
  <option value="no">No</option>
  <option value="dno">Don't know</option>
</select><br>
<input type="submit" value="Add">
</form>
</div>
</body>