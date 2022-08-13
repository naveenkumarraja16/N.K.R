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
	$sql= "SELECT * from ideas where user_id='$user_id'";
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
</head>

<body>
	<script type="text/javascript">
		
		function execute(display_control) {
			idea=document.getElementById(display_control);
			
			id_value=idea.id;
			document.cookie="idea="+id_value;
			document.location.reload(true);
			window.location=('idea.php');
			console.log(window.location);
		}
	</script>



	<div id="navigation" align="right">
		<a href="#" id="active">Home</a>
		<a href="http://localhost/codefury/">Log-Out</a>
	</div>
	<div id="user">
		<span>User id : <?php  echo ($user_id); ?></span>
	</div>

	<div id="ideas" align="center">
		<table>
			<th>Sl.no</th>
			<th>Your Ideas</th>
			<th>Status</th>
			<?php

			echo "<tr>
				<td align='center' id='sl'> 1 .</td>
				<td align='center' id='label'><label onclick='execute(this.id)' id='";
				echo ($row['idea']);
				echo "'>";
				echo ($row['idea']);
				echo"</label></td>
				<td align='center' >";
				$idea=$row['idea'];
	$sql1= "SELECT sum(amount) as total from funds where user_id='$user_id' and idea='$idea'";
	$result1=mysqli_query($con,$sql1);
			
			$row1=mysqli_fetch_assoc($result1);

				if($row1['total']>0)
					echo "Funds Raising Started";
				else
					echo "None";

				echo"</td>
			</tr>";

			$i=2;
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr>
				<td align='center' id='sl'> $i .</td>
				<td align='center' id='label'><label onclick='execute(this.id)' id='";
				echo ($row['idea']);
				echo "'>";
				echo ($row['idea']);
				echo"</label></td>
				<td align='center' >";

				$idea=$row['idea'];
					$sql1= "SELECT sum(amount) as total from funds where user_id='$user_id' and idea='$idea'";
	$result1=mysqli_query($con,$sql1);
			
			$row1=mysqli_fetch_assoc($result1);

				if($row1['total']>0)
					echo "Funds Raising Started";
				else
					echo "None";

				echo"</td>
			</tr>";
			$i++;
			}
			

			 ?>
			<!--<tr>
				<td align="center" id="sl">1.</td>
				<td align="center" id="label"><label onclick='execute(this.id)' id="IOT devices inter connectivity">IOT devices inter connectivity</label></td>
				<td align="center" >Funds Raising Started</td>
			</tr>


			<tr>
				<td align="center" id="sl">2.</td>
				<td align="center" id="label"><label onclick='execute(this.id)' id="IOT Network">IOT Network</label></td>
				<td align="center" >None</td>
			</tr>


	<tr>
				<td align="center" id="sl">3.</td>
				<td align="center" id="label"><label onclick='execute(this.id)' id="Automation Tools">Automation Tools</label></td>
				<td align="center" >None</td>
			</tr>

-->




		</table>
	</div>
</body>
</html>