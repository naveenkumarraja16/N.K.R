<?php 
//accesing the setted cookie value in javascript in last page
$idea=$_COOKIE['idea'];
//echo($idea);

session_start();
$user_id=$_SESSION["user_id"];
$user_id=strval($user_id);
$user=$_SESSION["user"];
//echo "$user";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/fund.css">
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

	<div id="help" align="center">

		<form method="post" action="payment.php">

			<input type="number" name="amount" placeholder="Enter Funding Amount" required>
	<br>
			<input type="submit" name="" value="Pay">
		</form>

	</div>



</body>
</html>