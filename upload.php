<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    
  </head>
  <body>
    <div class="container">
<?php 
$con=mysqli_connect("localhost","codeonkl_aamir","111@unconcious");
mysqli_select_db($con,"codeonkl_website");
if(isset($_REQUEST["submit"]))
{
	 $file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="/home/codeonkl/public_html/upload/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png","gif","wmv","pdf","zip");
	if(in_array($ext,$allowed))
	{
 move_uploaded_file($tmp_name,$path);
 $res=mysqli_query($con,"insert into files(files)values('$file')");
 if($res)
	 echo'<p class="lead text-success">file uploaded successfully</p>';
 else
	 echo'<p class="lead text-danger">file not uploaded.Try again</p>';
	
	
}
else
echo'<p class="lead text-danger">format not supported</p>';
}

?>


<form enctype="multipart/form-data" method="post">
<table class="table">
<tr><td>
File Upload:<input type="file" name="file"></td></tr>
<tr><td>
<input type="submit" name="submit" value="upload"></td></tr>
</table>

</form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
