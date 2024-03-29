<?php 

require 'require/functions.php';
require 'require/connection.php';
require 'require/error_reporting.php';

if (isset($_POST['login']) && trim($_POST['login']) != '') {
	if (isset($_POST['username']) && isset($_POST['password']) && trim($_POST['username']) != '' && trim($_POST['password']) != '') {

		$username = escape_quotes($_POST['username']);
		$password = escape_quotes(hash("sha512", $_POST['password']));

		$user = get_all_info("SELECT * FROM users WHERE Username='$username'");

		// Get the first instance of the user and store it into an array
		$userArray = $user->fetch_assoc();

		if(count($userArray) <= 0) {
			die("That username doesn't exist! Try making <i>$username</i> today! <a href='login.php'>Back</a>");
		}
		if ($userArray['password'] != $password) {
			die("Incorrect password! <a href='login.php'>Back</a>");
		}
		$salt = hash("sha512", rand() . rand() . rand());

		setcookie("c_user", hash("sha512", $username), time() + 24 * 60 * 60, "/");
		setcookie("c_salt", $salt, time() + 24 * 60 * 60, "/");

		$userID = $userArray['id'];
		insert_or_update_info("UPDATE users SET Salt='$salt' WHERE ID='$userID'");

		die("You are now logged in as $username");
	}
	else {
		echo "Please enter a username and password.";
	}
}

?>
<!doctype html>
<html>
	<head>
		<title>Coffee Love ::log in</title>
		<?php 
		    require 'includes/links_scripts.php'; 
		?>
	</head>
	<body>
		<?php 
			include 'includes/header.php';
			
		 ?>
	<div class="container">
	<div class="row signup flex-container">
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
		<div class="row">
			<h3>Welcome to Coffee Love, Please Log In!</h3>
		</div>
		<form action="" method="post" class="form-horizontal">
			
			<div class="row form-group input_group">
				<label for="username" class="col-sm-2">Username</label>
				<div class="col-sm-10">
					<input id="username" type="text" name="username" value=""  class="form-control">
					<span id="error_username"></span>
				</div>
			</div>

		
			<div class="row form-group input_group">
				<label for="" class="col-sm-2">Password</label>
				<div class="col-sm-10">
					<input id="password" type="password" name="password" value="" class="form-control">
					<span id="error_Password"></span>
				</div>
			</div>

			<div class="row form-group">
				
				<div class="col-xs-12">
					<input type="submit" name="login" value="Login" id="log_in" class="form-control">
				</div>
			</div>

			<form method="post" action="logout.php">
					<ul>
						<li>
							<input type="submit" name="logout" value="Logout">
						</li>
					</ul>
            </form>

 		<!-- 
 		<div class="row">
 			<div class="col-sm-12 text-center">
 				<a href="#">forgot password?</a>
 			</div> -->
 	
        
           
	</div>
	<?php include 'includes/footer.php'; ?>
	</body>
</html>