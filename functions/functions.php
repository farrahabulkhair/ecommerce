<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("login",$conn);
?>

<?php

	function getCategories() 
	{
		$get_cats = "SELECT * FROM categories";
		$run_cats = mysql_query($get_cats);

		while($cat_array = mysql_fetch_array($run_cats))
		{
			$cat_name = $cat_array['name'];
			$cat_id = $cat_array['id'];
			echo "<p><a href = 'index.php?category=$cat_id'> $cat_name </a> <br><br><br></p>";
		}

	}

	function getProducts()
	{
		if(!isset($_GET['category']))
		{
			
			$get_products = "SELECT * FROM products" ;
			$exec = mysql_query($get_products);

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
							<div class='col-md-3'>
								<p><h3> $product_name </h3> </p>
								<img src = 'admin/product_images/$product_image' width = '180' height = '180'>
								<p>Price: $$product_price Stock: $product_stock</p>
								<p><a href = 'details.php? product_id=$product_id'>
								<button style = 'float:left' type='button'>
								Details</button></a></p>
							
								
						";
							if($product_stock >0)
							{
								echo "
								<a href = 'customer/confirmation.php?action=confirm&pid=$product_id'>
								<button style = 'float:right'>Add to cart</button></a>
								";
							}
							else {echo "<p><button style = 'float:right'>Out of stock!</button></a></p>";}
							echo "</div>";
				} 
		}
	}
	
	function getProductsGuest()
	{
		if(!isset($_GET['category']))
		{
			
			$get_products = "SELECT * FROM products" ;
			$exec = mysql_query($get_products);

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
							<div class='col-md-3'>
								<p><h3> $product_name </h3> </p>
								<img src = 'admin/product_images/$product_image' width = '180' height = '180'>
								<p>Price: $$product_price Stock: $product_stock</p>
								<a href = 'details.php? product_id=$product_id'>
								<button style = 'float:left' type='button'>
								Details</button></a>
								
							</div>

						 ";
				} 
		}
	}

	function getCatProducts()
	{
		if(isset($_GET['category']))
		{
			$cat_id = $_GET['category'];

			$get_products = "SELECT * FROM products WHERE category = '".$cat_id."' ";
			$exec = mysql_query($get_products);
			$count = mysql_num_rows($exec);

			if ($count = 0) {
				echo "<h2>There are no products in this category.</h2>";
				close();
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
							<div class='col-md-3'>
								<p><h3> $product_name </h3> </p>
								<img src = 'admin/product_images/$product_image' width = '180' height = '180'>
								<p>Price: $$product_price Stock: $product_stock</p>
								<a href = 'details.php? product_id=$product_id'>
								<button style = 'float:left' type='button'>
								Details</button></a>
								<a href = 'index.php?product_id=$product_id'><button style = 'float:right'>Add to cart</button></a>
							</div>

						 ";
				} 
		}
	}

	function getCatProductsGuest()
	{
		if(isset($_GET['category']))
		{
			$cat_id = $_GET['category'];

			$get_products = "SELECT * FROM products WHERE category = '".$cat_id."' ";
			$exec = mysql_query($get_products);
			$count = mysql_num_rows($exec);

			if ($count = 0) {
				echo "<h2>There are no products in this category.</h2>";
				close();
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
							<div class='col-md-3'>
								<h3> $product_name </h3> 
								<img src = 'admin/product_images/$product_image' width = '180' height = '180'>
								<p>Price: $$product_price Stock: $product_stock</p>
								<a href = 'details.php? product_id=$product_id'>
								<button style = 'float:left' type='button'>
								Details</button></a>
							</div>

						 ";
				} 
		}
	}

	function confirm() 
	{
		if (isset($_GET['action']) && $_GET['action'] == 'confirm' ) 
		{
			//Fetching user ID
			$user_email = $_SESSION['email'];
			/*
			$get_userID = "SELECT * FROM Users WHERE email = '".$user_email."' ";
			$userID_exec = mysql_query($get_userID);
			$arrayUser = array();
			if($userID_exec){
				while ($fetch_userID = mysql_fetch_array($userID_exec)) 
				{
				array_push($arrayUser, $fetch_userID);
				}
			var_dump($arrayUser);
			$user_id = $arrayUser[0]['id'];
			}
			else
			{
				echo "failed";
			}
			*/
			// End fetch
			$product_id = $_GET['pid'];
			// Inserting into cart
			$insert_cart = "INSERT into cart (users_email,products_id) VALUES ('".$user_email."','".$product_id."')";
			$insert_cart_exec = mysql_query($insert_cart);
			$get_product = "SELECT * FROM products WHERE id = '".$product_id."' ";
			$exec = mysql_query($get_product);
			//$fetch = mysql_fetch_array($exec);
			$array = array();
			while ($fetch = mysql_fetch_array($exec)) {
				array_push($array, $fetch);
			}
			$product_name = $array[0]['name'];
			$product_price = $array[0]['price'];
			$product_image = $array[0]['image'];
			$product_desc = $array[0]['description'];
			echo "<img src = '../admin/product_images/$product_image' width = '180' height = '180' style = 'float:left'>";
			echo "<p>".$product_name. "<br></p>";
			echo "<p>".$product_price. "<br></p>";
			echo "<p>".$product_desc. "<br></p>" ;
			echo "<a href = '../cart.php?uemail=$user_email'><button style = 'float:right; margin-bottom:10px' type='button'>
								Proceed to checkout</button></a>";
		}
	}

	function getCart()
	{
		if(isset($_GET['uemail'])) 
		{
			$current_user = $_GET['uemail'];
			$get_products = "SELECT * FROM cart WHERE users_email = '".$current_user."' ";
			$exec = mysql_query($get_products);
			$array = array();
			if(mysql_num_rows($exec)>0){
				while ($fetch = mysql_fetch_array($exec)) {

					array_push($array, $fetch['products_id']);
				}
				$total = 0;
				for ( $i = 1; $i <= count($array)+1; $i++) {
					$temp_id = array_pop($array);
					$get_products_name = "SELECT * FROM products WHERE id = '".$temp_id."' ";
					$exec_pname = mysql_query($get_products_name);
					$array_products = array();
					while ($fetch = mysql_fetch_array($exec_pname)) 
					{
						array_push($array_products, $fetch);
					}
					$product_name = $array_products[0]['name'];
					$product_price = $array_products[0]['price'];
					$product_image = $array_products[0]['image'];
					$total = $total + $product_price;

					//echo "<img src = '/admin/product_images/$product_image' width = '180' height = '180' style = 'float:left'>";
					echo "<h3>Product " .$i. ": </h3><br> <p>Name: ".$product_name."<br></p>";
					echo "<p>Price: ".$product_price."<br><br></p>";

					$array_f = array_pop($array);


				}
				echo "<div align = 'right'>
					<h2>Total = $total</h2>
					<a href = 'buy.php?uemail=$current_user&pid=$array_f'><button style = 'margin-bottom: 10px;'>Buy</button></a>

					</div>";
				
			}
			else {
				echo "You didn't add anything to the cart!";
				}//echo $array[0];
			

			
		
		}

	}

	function buy() 
	{
		if(isset($_GET['uemail'])&&isset($_GET['pid']))
		{
			$current_user = $_GET['uemail'];
			$pid = $_GET['pid'];
			
				
				$insert_buy = "INSERT INTO buy (user_email,product_id) VALUES ('".$current_user."','".$pid."') ";
				$insert_exec = mysql_query($insert_buy);

				$get_products_name = "SELECT * FROM products WHERE id = '".$pid."' ";
				$exec_pname = mysql_query($get_products_name);
				$array_products = array();
				while ($fetch = mysql_fetch_array($exec_pname)) 
				{
					array_push($array_products, $fetch);
				}
				//$stock = $array_products[0]['stock'];
				//$new_stock = $stock - 1; 
				//$dec_stock = " UPDATE products SET stock = ' ".$new_stock." ' ";
				//$exec_stock = mysql_query($dec_stock);

				if($exec_pname ) {

					echo "<p>Purchase successful!</p><br>
					<p><a href = 'index.php'>Go back home!<a></p>";
				}
				else {
					echo "Error occured in purchase";
				}

			


		}
	}

	function getProfile()
	{
		//Fetching user ID
			$user_email = $_SESSION['email'];
			
			$get_userID = "SELECT * FROM Users WHERE email = '".$user_email."' ";
			$userID_exec = mysql_query($get_userID);
			$arrayUser = array();
			if($userID_exec){
				while ($fetch_userID = mysql_fetch_array($userID_exec)) 
				{
				array_push($arrayUser, $fetch_userID);
				}
			//var_dump($arrayUser);
			$user_id = $arrayUser[0]['id'];
			$user_fname = $arrayUser[0]['First Name'];
			$user_lname = $arrayUser[0]['Last Name'];
			$user_image = $arrayUser[0]['image'];
			echo "<img src = 'user_images/$user_image' width = '300' height = '300' style = 'float:left'>
					<H1>".$user_fname." ".$user_lname. "</h1><br>

					";

			}
			else
			{
				echo "failed";
			}
			
			// End fetch
	}

	function edit_profile()
	{
			echo "<form action = 'edit_profile.php' method = 'POST'>
								<p>First Name: <input type = 'text' name = 'Fname'></p><br>
								<p>Last Name: <input type = 'text' name = 'Lname'></p><br>
								<p>Email: <input type = 'email' name = 'email'></p><br>
								<p>Password: <input type = 'password' name = 'password'></p><br>
								<p>Choose avatar: <input type = 'file' name = 'user_image'></p><br>
								<input type = 'submit' name = 'Submit' value = 'Submit'>
							</form>
							";
		if (isset($_POST['Submit']))
		{
			$FirstName = $_POST["Fname"];
			$LastName = $_POST["Lname"];
			$Email = $_POST["email"];
			$password = $_POST["password"];
			$image = $_FILES["user_image"]["name"] ;
			$image_tmp = $_FILES["user_image"]["tmp_name"] ;
			$query = "UPDATE Users SET First Name = ' ".$FirstName." ', 
			Last Name = ' ".$LastName." ', email = ' ".$Email." ', password = ' ".$password." ',image = ' ".$image." '   " ;
			$execquery = mysql_query($query);
			//move_uploaded_file($image_tmp, SITE_ROOT.'user_images/$image');
			if(!$execquery) {
				echo "Editing Failed!<br>";
				die("Error:".mysql_error());
			}
			else
			{
				$_SESSION['email'] = $Email;
				echo "<script>alert('Completed editing')</script>";
				echo "<script>window.open('../profile.php','_self')</script>";
			}
		}

	}

	function getHistory() {

		echo "string";
	}

?>