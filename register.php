<?php
	session_start();
	$con=mysqli_connect("localhost","codeonkl_aamir","111@unconcious") or die("could not connect!");
	mysqli_select_db($con,"codeonkl_website") or die("could not find database!");
	if(isset($_POST['register_btn']))
	{
		$username=mysqli_real_escape_string($con,$_POST['username']);//escapes the special character
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$password1=mysqli_real_escape_string($con,$_POST['password1']);
		if($username== '' &&  $password== '' && $email=='' && $password1=='')
		{
			echo'<div class="container"><h3 class="text-justify text-danger">please enter the details ';echo'</h3></div>';
		}
		else
		{
		if($username!= '' && $email!='' && $password!='' && $password == $password1)
		{
			$password=md5($password);//hashes it before storing
			$query="insert into accounts(username,email,password) values ('$username','$email','$password')";
			mysqli_query($con,$query);
			$_SESSION['message'] = "you are now logged in";
			$_SESSION['username']=$username;
			//echo $_SESSION['message'];
			header("location: login.php?");
			
			
			//echo'<div class="container"><h3 class="text-justify text-success">welcome ';echo $_SESSION['username'];echo'</h3></div>';
		}
		else
		{
			$_SESSION['message'] = "passwords do not match";
			echo $_SESSION['message'];
		}
		}
	}




?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    
  </head>
  <body>
  <div class="container" >
	<h3>Register</h3>
	<form action="http://www.codeonklick.today/register.php" method="post">
	<div class="table-responsive">
	<table class="table table-stripped">
	<tr>
	<td>Username:</td>
	<td><input type="text" name="username" placeholder="eg:-xyz"/></td>
	</tr>
	<tr>
	<td>Email:</td>
	<td><input type="email" name="email" placeholder="eg:-xyz@abc.com"/></td>
	</tr>
	<tr>
	<td>Password:</td>
	<td><input type="password" name="password" placeholder="e.g:-xyz1234"/></td>
	</tr>
	<tr>
	<td>Confirm password:</td>
	<td><input type="password" name="password1"/></td>
	</table>
	<center>
	<input type="submit" name="register_btn" value="Register"/></td>
	</center>
	</div>
	</form>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>