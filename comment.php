<?php
	session_start();
	$con=mysqli_connect("localhost","codeonkl_aamir","111@unconcious") or die("could not connect!");
	mysqli_select_db($con,"codeonkl_website") or die("could not find database!");
	if(isset($_POST['submit']))
	{
		$name=mysqli_real_escape_string($con,$_POST['name']);//escapes the special character
		$comment=mysqli_real_escape_string($con,$_POST['comment']);
		if($name== '' &&  $comment== '')
		{
			echo'<div class="container"><h3 class="text-justify text-danger">please enter the name and comment ';echo'</h3></div>';
		}
		else
		{
		if($name!= '' && $comment!='')
		{
			
			$query="insert into comments(name,comment) values ('$name','$comment')";
			mysqli_query($con,$query);
			$_SESSION['message'] = "comment submitted";
			$_SESSION['username']=$name;
			
		}
		else
		{
			$_SESSION['message'] = "fill the fields";
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
  <div class="container">
  <center>
  <form action="http://www.codeonklick.today/comment.php" method="post">
    Enter Your Name: <input type="text" name="name" /></br></br>
	<textarea name="comment" rows="10" cols="40" placeholder="please type your comment here"></textarea></br></br>
	<input type="submit" name="submit" value="comment"/>
</form>
<?php 
$query="select * from comments";
$res=mysqli_query($con,$query);
		if(mysqli_num_rows($res)> 0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
        //echo "name" . $row["name"]. " comment: " . $row["comment"]. " " .  "<br>";
		echo'<table class="table table-striped">';
		echo'<tr><td>';
		echo'<div class="container"><h5 class="text-justify text-success">'. $row["name"];
		echo'</td></tr>';
		echo'<tr><td>';
		echo'<div class="container"><h6 class="text-justify text-danger">'. $row["comment"];
		echo'</td></tr>';
		echo'<table>';
			}
			
		}	
?>
</center>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>