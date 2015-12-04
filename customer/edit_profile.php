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

		<div class="col-md-10" style = "background-color:#DDDDDD; margin-left: 100px;">

			<div class="col-md-11" style = "background-color:#CCCCCC; margin-left: 50px; margin-top: 50px; margin-bottom:50px;" >

				<div align = "center" style = "margin-top:50px; margin-bottom:50px;">
				<?php
					if(!isset($_SESSION['email']))
					{
						
						echo "You have to <a href = 'signinform.php'> login </a> first!";
						
					}
					else edit_profile();
					
				?>
				
				</div>
				
				
					
			</div>
		</div>




