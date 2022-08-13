<?php 
//accesing the setted cookie value in javascript in last page
$idea=$_COOKIE['idea'];
echo($idea);

$amount=$_POST['amount'];
echo "$amount";
session_start();
$user_id=$_SESSION["user_id"];
$user_id=strval($user_id);
$user=$_SESSION["user"];
echo "$user";
echo "$user_id";
$username="root";
	$password="";
	$server="localhost";
	$database="codefury";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");


$amount=$_POST['amount'];

$sql="insert into funds(idea,user_id,viewer_id,amount)values('$idea','$user','$user_id','$amount')";
$result=mysqli_query($con,$sql);
	if(!$result)
	{
		//echo"error";
		echo"<script>confirm('internal error please retry');window.location.href='http://localhost/codefury/viewers/description.php'</script>";
	}
	else
	{
		
		echo"<script>confirm('Amount Rs. $amount funded');window.location.href='http://localhost/codefury/viewers/description.php'</script>";
	}

?>