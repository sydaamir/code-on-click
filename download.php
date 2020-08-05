
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
$con=mysqli_connect("localhost","codeonkl_aamir","111@unconcious") or die("could not connect!");
mysqli_select_db($con,"codeonkl_website") or die("could not find database!");
$query=mysqli_query($con,"select * from files") or die("query not generated!");
$rowcount=mysqli_num_rows($query);
?>
<table class="table table-striped">
<tr>
<td><center class="text-success">download</center></td>
</tr>
<?php
for($i=1;$i<=$rowcount;$i++)
{
	$row=mysqli_fetch_array($query);

?>
<tr>
<td><a href="upload/<?php echo $row["files"] ?>"><?php echo $row["files"] ?></a></td>

</tr>

<?php	
}

?>
</table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
