<?php

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
	$sql= "SELECT * from funds where viewer_id='$user_id'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo"<script>confirm('Error');window.location.href='http://localhost/codefury/'</script>";
		mysqli_close($con);

	}

	$row=mysqli_fetch_assoc($result);
	if($row['user_id']==NULL)
	{
		echo"<script>confirm('No funding Done Yet');window.location.href='http://localhost/codefury/'</script>";
	mysqli_close($con);
	}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Viewers</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/x-icon" href="images/user logo.jpg">
</head>
<body>


<script type="text/javascript">
		
		function execute(display_control) {
			idea=document.getElementById(display_control);
			
			id_value=idea.id;
			document.cookie="idea="+id_value;
			document.location.reload(true);
			window.location=('description.php');
			console.log(window.location);
		}
	</script>

<div id="navigation" align="center">
		<a href="http://localhost/codefury/viewers/index.php">Start Ups</a>
		<a href="#" id="active">Funds Helped</a>
		<a href="http://localhost/codefury/">Log-Out</a>
	</div>
	<div id="user" align="center">
		<span>User id :<label><?php  echo ($user_id); ?></label></span>
	</div>

	<div id="start_ups" align="center">
		<table align="center">
			<th align="center">Idea</th>
			<th align="center">Start Upper- Id</th>
			<th align="center">Amount</th>

			<?php  
			echo"<tr><td align='center' id='sl'>";
			echo($row['idea']);
			echo"</td>
				<td align='center' id='label'><label onclick='execute(this.id)' id='";
				echo($row['idea']);
				echo "'>";
				echo($row['user_id']);
				echo "</label></td>
				<td align='center' >";
				echo($row['amount']);
				echo"</td>
				</tr>";

				while($row=mysqli_fetch_assoc($result))
			  {
			  	echo"<tr><td align='center' id='sl'>";
			echo($row['idea']);
			echo"</td>
				<td align='center' id='label'><label onclick='execute(this.id)' id='";
				echo($row['idea']);
				echo "'>";
				echo($row['user_id']);
				echo "</label></td>
				<td align='center' >";
				echo($row['amount']);
				echo"</td>
				</tr>";
			
			  }
			  ?>

			<!--<tr>
				<td align="center" id="sl">1.</td>
				<td align="center" id="label"><label onclick='execute(this.id)' id="IOT devices inter connectivity">IOT devices inter connectivity</label></td>
			</tr>

			<tr>
				<td align="center" id="sl">1.</td>
				<td align="center" id="label"><label onclick='execute(this.id)' id="IOT devices inter connectivity">IOT devices inter connectivity</label></td>
			</tr>


			<tr>
				<td align="center" id="sl">1.</td>
				<td align="center" id="label"><label onclick='execute(this.id)' id="IOT devices inter connectivity">IOT devices inter connectivity</label></td>
			</tr>


			<tr>
				<td align="center" id="sl">1.</td>
				<td align="center" id="label"><label onclick='execute(this.id)' id="IOT devices inter connectivity">IOT devices inter connectivity</label></td>
			</tr>-->
		</table>
	</div>

</body>
</html>