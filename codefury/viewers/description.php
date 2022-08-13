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
	$sql= "SELECT * from ideas where idea='$idea'";

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
	<title>Viewers</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/description.css">
	<link rel="icon" type="image/x-icon" href="images/user logo.jpg">
</head>
<body>


<div id="navigation" align="center">
		<a href="index.php" >Start Ups</a>
		<a href="funds_helped.php" >Funds Helped</a>
		<a href="http://localhost/codefury/">Log-Out</a>
	</div>
	<div id="user" align="center">
		<span>User id :<label><?php  echo ($user_id); ?></label></span>
	</div>


	<div id="idea_details" align="center">
		<span>Idea : <label><u><?php echo($idea); ?></u></label></span>
	</div>

	<div id="description">
		<span>Idea Description : </span>
			<p>

				<?php 
				$_SESSION['user']=$row['user_id'];
				echo($row['description']); ?>
			</p>


	</div>

	<div id="help" align="center">

		<form method="post" action="fund.php">
			<input type="submit" name="" value="Fund Here">
		</form>

	</div>

	<!--<div id="comments" align="center">
		<form id="post" method="#">
			<input type="text" name="comment" placeholder="Comment here..........">
			<input type="submit" name="" value="Submit">
		</form>
	</div>-->


</body>
</html>