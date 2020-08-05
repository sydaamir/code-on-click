<?php
	session_start();
	$con=mysqli_connect("localhost","codeonkl_aamir","111@unconcious") or die("could not connect!");
	mysqli_select_db($con,"codeonkl_website") or die("could not find database!");
	
		if(isset($_POST['submit']))
		{
		$username=mysqli_real_escape_string($con,$_POST['username']);//escapes the special character
		$password=mysqli_real_escape_string($con,$_POST['password']);
		
		$password=md5($password);
		$query="SELECT * FROM accounts WHERE username='$username' AND password='$password'";
		$res=mysqli_query($con,$query);
		if(mysqli_num_rows($res) == 1)
		{
			$_SESSION['message']="you are now logged in";
			$_SESSION['username']=$username;
			header("location: http://www.codeonklick.today/upload.php?");
			echo'<div class="container"><h3 class="text-justify text-success">welcome ';echo $_SESSION['username'];echo'</h3></div>';
		}
		else
		{
			$_SESSION['message']="oops:-username/password combination incorrect!";
			echo"<center>";
			echo "<h3 class='text-danger'>".$_SESSION['message']."</h3>";
			echo"</center>";
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

  <div class="container">
 <form action="http://www.codeonklick.today/admin.php" method="post">   
 
    

	<form class="form-signin">
		<h1 class="form-signin-heading text-muted">Sign In</h1>
		<div class="col-xs-4">
		<input type="text" name="username" class="form-control " placeholder="Username" required="" autofocus=""/>
		<input type="password" name="password" class="form-control " placeholder="Password" required=""/>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">
			Sign In
		</button>
		</div>
	</form>
	<form action="http://www.codeonklick.today/register.php">
	<center>
	</br></br></br>
	<h3 class=" text-primary">if you are not a registered user.please register</h3>
	 
	<input type="submit" class="btn btn-info" value="register here">
	</center>
	</form>


</form> 
</div>   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>