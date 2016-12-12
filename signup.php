<?php 
require 'require/functions.php';
require 'require/connection.php';
require 'require/error_reporting.php';

if (isset($_POST['register']) && trim($_POST['register']) != '') {
	if (isset($_POST['username']) && isset($_POST['password']) && trim($_POST['username']) != '' && trim($_POST['password']) != '') {

		$username = escape_quotes($_POST['username']);
		$password = escape_quotes(hash("sha512", $_POST['password']));

		if ($_POST['fullname']) {
			$name = escape_quotes(strip_tags($_POST['fullname']));
		}

		$check = get_all_info("SELECT * FROM coffeelovers WHERE username='$username'");
		// Get the first instance of the user and store it into an array
		$userArray = $check->fetch_assoc();

		if (count($userArray) > 0) {
			die("That username already exists! Try creating another username. <a href='register.php'>Back</a>");
		}
		if (!ctype_alnum($username)) {
			die("Username contains special characters! Only numbers and letters are permitted. <a href='register.php'>Back</a>" );
		}
		if (strlen($username) > 20) {
			die("Username must contain less than 20 characters. <a href='register.php'>Back</a>" );
		}

		$salt = hash("sha512", rand() . rand() . rand());

		insert_or_update_info("INSERT INTO coffeelovers (email, fullname, username, password, salt) 
			VALUES ('$email', '$fullname', '$username', '$password', '$salt')");

		setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
		setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");

		die("Your account has been created and you are now logged in. <a href='index.php'>Back</a>");
	}
	else {
		echo "Please enter a username and password.";
	}
}

?>
<!doctype html>
<html>
	<head>
		<title>Coffee Love :: Sign Up</title>

		<?php 
		    include 'includes/links_scripts.php'; 
		    ?>
	</head>
	<body>
		<?php 
			include 'includes/header.php';
			
		 ?>
		<div class="container">
		    <div>
				<?php 
					require_once 'require/cookie_login.php';
					
					if ($logged == true) {
					    echo $userArray['username'] . " is logged in";
					} else {
					    echo "User not logged in";
					}
					?>
			</div>
		<div class="row signup flex-container">
		<div>
				
			</div>
		<div class="row">
			<h3>Welcome to Coffee Love, please join us!</h3>
		</div>
		<form action="" method="post" class="form-horizontal">
			
			<div class="row form-group input_group">
				<label for="" class="col-sm-2">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" id="email" class="form-control">
					<span id="errorEmail"></span>
				</div>
			</div>

			<div class="row form-group input_group">
				<label for="" class="col-sm-2">Username</label>
				<div class="col-sm-10">
					<input type="text" name="username" id="username" value="" class="form-control">
					<span id="errorEmail"></span>
				</div>
			</div>

			         

			<div class="row form-group input_group">
				<label for="" class="col-sm-2">Full Name</label>
				<div class="col-sm-10">
					<input type="text" name="fullname" id="fullname" class="form-control">
					<span id="errorFirstname"></span>
				</div>
			</div>

			
			

			<div class="row form-group input_group">
				<label for="" class="col-sm-2">Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" id="password" class="form-control">
					<span id="errorPassword"></span>
				</div>
			</div>

			<div class="row form-group">
				
				<div class="col-xs-12">
					<input type="submit" name="register" id="register" class="form-control">
				</div>
			</div>
		</form>


	</div>
	
</div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>