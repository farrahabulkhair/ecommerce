<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("login",$conn);
?>
<html>
	<head>
		<title>Inserting Products</title>
	</head>
	<body>
		<h1 align = "center">Insert new product</h1>
		<form action = "insert_product.php" method = "post" enctype = "multipart/form-data">
			Product Name: <input type = "text" name = "product_name" required><br>
			Product Category: 
				<select name = "product_cat" >
					<option>Select a category</option>
					<?php
						$get_cats = "SELECT * from categories";
						$run_cats = mysql_query($get_cats);

						while($cat_array = mysql_fetch_array($run_cats))
						{
							$cat_id = $cat_array['id'];
							$cat_name = $cat_array['name'];
							echo "<option value = '$cat_id'>$cat_name </option><br>";
						}
					?>

				</select><br>
			
			Product Description: <br><textarea name = "product_description" cols = "40" rows = "10"></textarea><br>
			Product Price: <input type = "text" name = "product_price" required><br>
			Product Stock: <input type = "text" name = "product_stock" required><br>
			Product Image: <input type = "file" name = "product_image"><br>
			<input type = "submit" name = "insert_product" value = "Insert Product"><br>
		</form>
	</body>

</html>

<?php
	if (isset($_POST['insert_product']))
	{
	
			$product_name = $_POST["product_name"] ;
			$product_cat = $_POST["product_cat"] ;
			$product_description = $_POST["product_description"] ;
			$product_price = $_POST["product_price"] ;
			$product_stock = $_POST["product_stock"] ;
			$product_image = $_FILES["product_image"]["name"] ;
			$product_image_tmp = $_FILES["product_image"]["tmp_name"] ;
			//fopen($_FILES["product_image"], mode)
			//move_uploaded_file($product_image_tmp, SITE_ROOT.'/product_images/$product_image');

			move_uploaded_file($product_image_tmp, "product_images/$product_image");

			$insert_product = "INSERT INTO products (name, category, description, price, stock, image) 
			VALUES ('".$product_name."', '".$product_cat."', '".$product_description."', '".$product_price."', '".$product_stock."', '".$product_image."') ";
			
			$query = mysql_query($insert_product);
			
			
			if ($query) {

				echo "<script>alert('Product is inserted!')</script>";
				echo "<script>window.open('insert_product.php','_self')</script>";
			}
			else {
				echo "<script>alert('Product cannot be inserted!')</script>";
				echo "<script>window.open('insert_product.php','_self')</script>";
				die("Error:".mysql_error());
				}
				

			
	}
	

?>