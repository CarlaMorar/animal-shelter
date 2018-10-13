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
<fieldset>
<legend><span class="number">1</span> Pet Info</legend>
<label class="custom-file-upload">
    <input type="file"/>
    Picture(click here to add)
</label>
<p class="add-pet-form-text">Cat or dog?</p>
<select name="animal" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="cat">Cat</option>
  <option value="dog">Dog</option>
  </select>
<p class="add-pet-form-text">Name (optional)</p>
<input type="text" name="pet-name">
<p class="add-pet-form-text">Gender</p>
<select name="gender" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="f">Female</option>
  <option value="m">Male</option>
  </select>
<p class="add-pet-form-text">Age(years)</p>
<select name="age" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="little">Younger than 1 year old</option>
  <option value="13y">1-3 years old</option>
  <option value="36y">3-6 years old</option>
  <option value="610y">6-10 years old</option>
  <option value="m10y">Older than 10 years old</option>
 </select>
<p class="add-pet-form-text">Breed</p>
<input type="text" name="breed">
<p class="add-pet-form-text">Where did you find it?</p>
<textarea></textarea>
<p class="add-pet-form-text">Is it agressive?</p>
<select name="agressive" form="add-pet-form">
  <option value="nothing">--Choose an option--</option>
  <option value="yes">Yes</option>
  <option value="no">No</option>
  <option value="dno">Don't know</option>
</select><br>
</fieldset>
<fieldset>
<legend><span class="number">2</span> Your info</legend>
<p class="add-pet-form-text">Your name</p>
<input type="text" name="name">
<p class="add-pet-form-text">Your phone number</p>
<input type="text" name="phone-number">
</fieldset>
<input type="submit" value="Add">
</form>
</div>
</body>