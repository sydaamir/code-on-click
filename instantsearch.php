<?php
$con=mysqli_connect("localhost","codeonkl_aamir","111@unconcious") or die("could not connect!");
mysqli_select_db($con,"codeonkl_website") or die("could not find database!");
$output= '';

	$searchq=$_POST['searchval'];
	$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	$query=mysqli_query($con,"select * from files where file like '%$searchq%'") or die("query not generated!");
	$count=mysqli_num_rows($query);
	if($count == 0)
	{
		echo'no search results!';
	}
	else
	{
		while($row = mysqli_fetch_array($query))
		{
			$res=$row['file'];
			$output .='<div>'.$res.'</div>';
		}
	}
	echo($output);
?>