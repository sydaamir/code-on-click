<?php
	session_start();
	$con=mysqli_connect("localhost","codeonkl_aamir","111@unconcious") or die("could not connect!");
	mysqli_select_db($con,"codeonkl_website") or die("could not find database!");
		if(isset($_POST["login_btn"]))
		{
		$username=mysqli_real_escape_string($con,$_POST['username']);//escapes the special character
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$password=md5($password);
		$query="select * from accounts where username='$username' and password='$password'";
		$res=mysqli_query($con,$query);
		if(mysqli_num_rows($res)==1)
		{
			$_SESSION['message']="you are now logged in";
			$_SESSION['username']=$username;
			echo'<div class="container"><h3 class="text-justify text-success">welcome ';echo $_SESSION['username'];echo'</h3></div>';
			header("location: http://www.codeonklick.today/upload.php");
			
		}
		else
		{
			$_SESSION['message']="oops:-username/password combination incorrect!";
			echo $_SESSION['message'];
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
    <form action="http://www.codeonklick.today/login.php" method="post">

    <div class="table-responsive">
	<table class="table table-stripped">
	<tr>
	<td>username:</td>
	<td><input type="text" name="username"/></td>
	</tr>
	<tr>
	<td>password:</td>
	<td><input type="password" name="password"/></td>
	</tr>
	</table>
	<center>
	<input type="submit" name="login_btn" value="login"/></td>
	</center>
	</form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>