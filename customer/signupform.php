<!DOCTYPE html>
<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("login",$conn);
	include '../functions/functions.php';
	session_start();
?>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>eShop</title>
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/styles.css?v=1.2" rel="stylesheet">
		<link href="../css/queries.css?v=1.2" rel="stylesheet">
		<link rel="stylesheet" href="../css/flexslider.css?v=1.2" type="text/css">
		<link rel="stylesheet" href="../css/animate.css" type="text/css">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body style = "background-color:#CCCCCC">
		<!-- Header -->
		<div class="col-md-10" style="background-color: #DDDDDD; margin-left: 100px; height: 100px; filter: alpha(opacity=90);">
			<div class="col-md-2"><h1>eShop</h1></div>
			
			<div style = 'float:right; margin-top:20px'>
				<p><a href = '../index.php'> Home <a>
				<a href="signinform.php">Sign in</a></p>
			</div>
		</div>
		<!-- Space -->
		<div  class="col-md-12" style = "background-color:#CCCCCC; height: 20px;">
		</div>

		<div class="col-md-10" style = "background-color:#DDDDDD; margin-left: 100px;">
			<div class="col-md-11" style = "background-color:#CCCCCC; margin-left: 50px; margin-top: 50px; margin-bottom: 50px">
				<div align = "center" style = "margin-top:100px">
				<?php
					if(!isset($_SESSION['email']))
					{
						
						echo "<form action = 'signupform.php' method = 'POST'>
								<p>First Name: <input type = 'text' name = 'Fname' required></p><br>
								<p>Last Name: <input type = 'text' name = 'Lname' ></p><br>
								<p>Email: <input type = 'email' name = 'email' ></p><br>
								<p>Password: <input type = 'password' name = 'password' required></p><br>
								<p>Choose avatar: <input type = 'file' name = 'user_image'></p><br>
								<input type = 'submit' name = 'Submit' value = 'Submit'>
							</form>
							<p>Already a user? <a href='signinform.php'>Login</a></p>";
						
					}
					else echo "<h1>Already logged in!</h1>";
					
				?>
				</div>
			</div>
		</div>

<?php

	if (isset($_POST['Submit']))
	{
		$FirstName = $_POST["Fname"];
		$LastName = $_POST["Lname"];
		$Email = $_POST["email"];
		$password = $_POST["password"];
		$image = $_FILES["user_image"]["name"] ;
		$image_tmp = $_FILES["user_image"]["tmp_name"] ;
		$query = "INSERT into users values ('','".$FirstName."','".$LastName."', ' ".$image." ' ,'".$Email."','".$password."')";
		$execquery = mysql_query($query);
		move_uploaded_file($image_tmp, SITE_ROOT.'user_images/$image');
		if(!$execquery) {
			echo "Signup Failed!<br>";
			die("Error:".mysql_error());
		}
		else
		{
			$_SESSION['email'] = $Email;
			echo "<script>alert('Signup Completed!')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}
	}
	


?>