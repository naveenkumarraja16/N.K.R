<?php 
//accesing the setted cookie value in javascript in last page
$idea=$_COOKIE['idea'];
//echo($idea);


session_start();
$user_id=$_SESSION["user_id"];
$user_id=strval($user_id);


$username="root";
	$password="";
	$server="localhost";
	$database="codefury";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql= "SELECT * from ideas where user_id='$user_id' and idea='$idea'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo"<script>confirm('Error');window.location.href='http://localhost/codefury/'</script>";
		mysqli_close($con);

	}

	$row=mysqli_fetch_assoc($result);
	if($row['user_id']==NULL)
	{
		echo"<script>confirm('Error');window.location.href='http://localhost/codefury/'</script>";
	mysqli_close($con);
	}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Start - Up User</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/x-icon" href="images/start.jfif">
	<link rel="stylesheet" type="text/css" href="css/idea.css">
</head>

<body>

	<div id="navigation" align="right">
		<a href="index.php">Home</a>
		<a href="http://localhost/codefury/">Log-Out</a>
	</div>
	<div id="user">
		<span>User id : <?php  echo ($user_id); ?></span>
	</div>

	<div id="idea_details" align="center">
		<span>Idea : <label><u><?php echo($idea); ?></u></label></span>
	</div>

	<div id="description">
		<span>Idea Description : </span>
			<p>
				<?php 
				echo($row['description']);
				 ?> 
			</p>


	</div>
<?php 
	$sql= "SELECT sum(amount) as total from funds where user_id='$user_id' and idea='$idea'";
	$result=mysqli_query($con,$sql);
			
			$row=mysqli_fetch_assoc($result);
			?>
	<div id="funds" align="center">
		<h1>Funds Raised Total = <label><?php 
		if($row['total']>0)
				echo($row['total']);
			else
				echo (0);
				 ?> </label></h1>
		<div id="raiser">
			<table>
							 	<th align='center'>User - id</th>
			 	<th align='center'>Helped</th>
			<?php  
			if($row['total']>0)
			{
				$sql1= "SELECT * from funds where user_id='$user_id' and idea='$idea'";
	if($result2=mysqli_query($con,$sql1)){
		$row=mysqli_fetch_assoc($result);
			if($row['user_id'])
			{
				echo"

			 	

			 	<tr>
			 		<td align='center'>";echo($row['viewer_id']);;
			 		echo"</td>
			 		<td align='center'> Rs. ";
			 		echo($row['amount']);
			 		echo"</td>
			 	</tr>";
			}

				while($row=mysqli_fetch_assoc($result2))
				{
				echo"<tr>
			 		<td align='center'>";
			 		echo($row['viewer_id']);;
			 		echo"</td>
			 		<td align='center'> Rs. ";
			 		echo($row['amount']);
			 		echo"</td>
			 	</tr>";	
				}
			}
		}
			?>


	


			


			<!--<table>
			 	<th align="center">User - id</th>
			 	<th align="center">Helped</th>
			 	

			 	<tr>
			 		<td align="center">codefury_helper_1</td>
			 		<td align="center"> Rs. 5000</td>
			 	</tr>-->
			 </table>
		</div>
	</div>
</body>
</html>