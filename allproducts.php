<!DOCTYPE html>
<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("login",$conn);
	include 'functions/functions.php';
?>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Yebo HTML5 CSS3 Template</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css?v=1.2" rel="stylesheet">
		<link href="css/queries.css?v=1.2" rel="stylesheet">
		<link rel="stylesheet" href="css/flexslider.css?v=1.2" type="text/css">
		<link rel="stylesheet" href="css/animate.css" type="text/css">
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
			<?php
				session_start();
				if (isset($_SESSION['email'])) {
				echo "
				<div style = 'float:right; margin-top:20px'>
					<a href='customer/profile.php'>".$_SESSION['email']."</a>
					<a href='customer/logout.php'>logout</a>
					<a href='cart.php'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></a> 
				</div>
				";
			}
			else
			{
				echo "<div style = 'float:right; margin-top:20px'>
				<p><a href='customer/signinform.php'>login</a></p></div>";
			}
			?>
			
		</div>
		<!-- Space -->
		<div  class="col-md-12" style = "background-color:#CCCCCC; height: 20px;">
		</div>
		
		
		<!-- Categories -->
		<div class="col-md-2" style="background-color:#DDDDDD; margin-left: 100px; ">
			<p><h1>Categories</h1></p>
			<p><a href = 'allproducts.php'> All </a> <br><br><br></p>
			<?php
				getCategories();
			?>
		</div>

		<!-- Products -->
		<div class="col-md-8" style="background-color:#FFFFFF; text-align: center; ">
			<?php
				getProducts();
			?>
		</div>
		
		<!-- Space -->
		<div  class="col-md-12" style = "background-color:#CCCCCC; height: 20px;">
		</div>

		<!-- Footer -->
		<div class="col-md-10" style="background-color:#EEEEEE;  height: 50px; margin-left: 100px;">
		</div>
	</body>
</html>