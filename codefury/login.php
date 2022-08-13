<?php

$user_type=$_POST['user_type'];
$user_id=$_POST['user_id'];
$password=$_POST['password'];
$password_str=strval($password);
//echo('password_str ='.$password_str);
//echo"$password";

session_start();


$username="root";
	$password="";
	$server="localhost";
	$database="codefury";
	$con=mysqli_connect("localhost","root","")or die("unable to connect");
	//selecting the database
	$sql=mysqli_select_db($con,$database)or die("cannot cannot to database");
	$sql= "SELECT * FROM users where user_id='$user_id'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo"<script>confirm('invalid user');window.location.href='http://localhost/codefury/'</script>";

	}
	else
	{

		$row=mysqli_fetch_assoc($result);
			$id=$row['user_id'];
			if ($id) 
			{
				$password_fetched=strval($row['password']);
				if($password_fetched=='NULL')
					echo"<script>confirm('please reset u your password and login');window.location.href='http://localhost/codefury/'</script>";

				if($password_fetched==NULL)
					echo"<script>confirm('please reset u your password and login');window.location.href='http://localhost/codefury/'</script>";

				if ($password_str!=$password_fetched) {
					echo"<script>confirm('Incorrect Password');window.location.href='http://localhost/codefury/'</script>";
				}
					if($password_str==$password_fetched){
						$_SESSION["user_id"]=$user_id;
						if($user_type=='Start Up User')
						
							echo"<script>window.location.href='http://localhost/codefury/startup/'</script>";
						else{
							echo"<script>window.location.href='http://localhost/codefury/viewers/'</script>";
						}
						
				}
			}
			else
			{
				echo"<script>confirm('invalid user');window.location.href='http://localhost/codefury/'</script>";
			}

	}



?>