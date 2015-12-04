<!DOCTYPE html>
<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("login",$conn);
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
			<div style = "float:right; margin-top:20px">
				
				<a href="cart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a> 
				 
			</div>
			
		</div>
		<!-- Space -->
		<div  class="col-md-12" style = "background-color:#CCCCCC; height: 20px;">
		</div>
		
		
		<!-- Categories -->
		<div class="col-md-2" style="background-color:#DDDDDD; margin-left: 100px; height: 500px;">
			<h1>Categories</h1>
			<?php
				$get_cats = "SELECT * FROM categories";
				$run_cats = mysql_query($get_cats);

				while($cat_array = mysql_fetch_array($run_cats))
				{
					$cat_name = $cat_array['name'];
					echo "<h3><a href = '#'>$cat_name </a></h3><br>";
					
				}
			?>
		</div>

		<!-- Products -->
		<div class="col-md-8" style="background-color:#FFFFFF; text-align: center; ">
			<?php
				if(isset($_GET['product_id']))
				{
					$product_id = $_GET['product_id'];
				
					$get_products = "SELECT * FROM products WHERE id = '".$product_id."' ";
					$exec = mysql_query($get_products);
					if($exec === FALSE) { 
					    die(mysql_error()); // TODO: better error handling
					}
				while($products_array = mysql_fetch_array($exec))
				{
					
					$product_id = $products_array['id'];
					$product_name = $products_array['name'];
					$product_category = $products_array['category'];
					$product_description = $products_array['description'];
					$product_price = $products_array['price'];
					$product_stock = $products_array['stock'];
					$product_image = $products_array['image'];

					echo "
						<a href = 'index.php'> Back </a>
						<div class='col-md-8'>
							
							<h1> $product_name </h1> 
							<img src = 'admin/product_images/$product_image' width = '400' height = '300'>
							<p>$product_description </p>
							<p>Price: $$product_price Stock: $product_stock</p>
							<a href = 'index.php?product_id=$product_id'><button align = 'right' style = 'margin-bottom:10px'>Home</button></a>
						</div>
						<div class='col-md-3'>
						</div>
						";
				} 
			}
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