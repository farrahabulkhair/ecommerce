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
				<a href = '../index.php'> Home <a>
				<a href="signupform.php">Sign up</a>
			</div>
		</div>
		<!-- Space -->
		<div  class="col-md-12" style = "background-color:#CCCCCC; height: 20px;">
		</div>

		<div class="col-md-10" style = "background-color:#DDDDDD; height: 500px; margin-left: 100px;">
			<div class="col-md-11" style = "background-color:#CCCCCC; height: 400px; margin-left: 50px; margin-top: 50px">
				<div align = "center" style = "margin-top:100px">
				<?php
					if(!isset($_SESSION['email']))
					{
						
						echo "<form action = 'signinform.php' method = 'post'>
								<p>Email: <input type = 'email' name = 'email'></p><br>
								<p>Password:<input type = 'password' name = 'password'></p><br>
								<input type = 'submit' name = 'Login' value = 'Login'>
							</form>
							<p>New user? <a href='signupform.php' >sign up now!</a></p>";
						
					}
					else echo "<h1>Already logged in!</h1><br> <h3><a href = 'logout.php'> logout</a></h3>";
					
				?>
				</div>
			</div>
		</div>




<?php

	if (isset($_POST['Login']))
	{
		$email = $_POST['email'];
		$pw = $_POST['password'];
		$query = "SELECT count(*) FROM users WHERE (email = '".$email."' and password = ' ".$pw." ' )";
		$queryexec = mysql_query($query);
		$result = mysql_fetch_array($queryexec);

		$get_name = "SELECT 'First Name' FROM users WHERE (email = '".$email."')";
		$queryexec2 = mysql_query($get_name);
		$name = mysql_fetch_array($queryexec2);
		

		if ($result > 0) {
			
			$_SESSION['email'] = $email;
			//$_SESSION['id'] = $id;
			echo "<p>Welcome " .$_SESSION['email']."!</p><br>";
			echo "<p>Login successful! Return<a href = '../index.php'> home</a>.</p>";
			echo "<br><a href = 'logout.php'> Logout </a>.";

			}
		else
		{
			echo "Login failed!";
			die("Error:".mysql_error());
		}
	}
	?>