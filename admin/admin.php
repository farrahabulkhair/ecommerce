<?php
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("login",$conn);
	session_start();
?>
<a href="../index.php">Home</a>
<html>
<h1>Only Admin can sign in.</h1>
	<form action = "admin.php" method = "post">
		Email: <input type = "email" name = "email"><br>
		Password:<input type = "password" name = "password"><br>
		<input type = "submit" name = "Login" value = "Login">
	</form>
	New user? <a href="admin.php" >sign up now!</a>
</html>

<?php

	if (isset($_POST['Login']))
	{
		$email = $_POST['email'];
		$pw = $_POST['password'];

		if($email = 'Admin@admin' && $pw = 'admin') {
			echo "Logged in as admin.";
		}


	}
?>