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
	$sql= "SELECT * from ideas";
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
		<a href="#" id="active">Start Ups</a>
		<a href="funds_helped.php">Funds Helped</a>
		<a href="http://localhost/codefury/">Log-Out</a>
	</div>
	<div id="user" align="center">
		<span>User id :<label><?php  echo ($user_id); ?></label></span>
	</div>

	<div id="start_ups" align="center">
		<table align="center">
			<th align="center">SL.No</th>
			<th align="center">Idea</th>

			<?php  
			echo"<tr><td align='center' id='sl'>1.</td>
				<td align='center' id='label'><label onclick='execute(this.id)' id='";
				echo($row['idea']);
				echo "'>";
				echo($row['idea']);
				echo "</label></td></tr>";

$i=2;
				while($row=mysqli_fetch_assoc($result))
			  {
			  	echo"<tr><td align='center' id='sl'>$i .</td>
				<td align='center' id='label'><label onclick='execute(this.id)' id='";
				echo($row['idea']);
				echo "'>";
				echo($row['idea']);
				echo "</label></td></tr>";
			  	$i++;
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