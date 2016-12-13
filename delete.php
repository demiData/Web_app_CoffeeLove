<?php 
	   
       require 'require/functions.php';
       require 'require/connection.php';
       require 'require/error_reporting.php';
       
	   if (isset($_POST['delete']) && trim($_POST['delete']) != '') {
	    if (isset($_POST['username']) && isset($_POST['password']) 
		&& trim($_POST['username']) != '' && trim($_POST['password']) != '') {

		$username = escape_quotes($_POST['username']);
		$password = escape_quotes(hash("sha512", $_POST['password']));
 		
 		

        $user = get_all_info("SELECT * FROM users WHERE username='$username'");
        
        // Get the first instance of the user and store it into an array
        $userArray = $user->fetch_assoc();
        
        if(count($userArray) <= 0) {
        	die("<h2>That username doesn't exist! Please type in the correct username. 
        		<a href='delete.php'>Back</a></h2>");
        }
        if ($userArray['password'] != $password) {
        	die("<h2>Incorrect password! <a href='delete.php'>Back</a></h2>");
        }

        insert_or_update_info("DELETE FROM users WHERE username='$username'");	

		setcookie("c_user" , '' , time()-50000, '/');

	        $logged = false;

		echo "<h2>User has been deleted. <a href='index.php'>Home</a> </h2><br>";

	    exit;
	}
	else {
		echo "<h2>Please enter a username and password.</h2>";
	}
}

 ?>

<!doctype html>
<html>
	<head>
		<title></title>
		<?php include 'includes/links_scripts.php'; ?>
		<style>
			#submit_delete {
				background-color:#D01B04;
			}
		</style>
	</head>
	<body>
		<div id="container">
	<?php include "includes/header.php" ?>
	


<div class="container">
	<div class="row" style="text-align:center;">
	<!-- 	<h3>Coffee Love :: Log In</h3> -->
	</div>
	<div class="row signup flex-container">
	<div class="active">
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
			<h3>Awww, come back soon!</h3>
		</div>
		<form id="form_delete" method="post" class="form-horizontal">
			
			<div class="row form-group input_group">
				<label for="username" class="col-sm-2">Username</label>
				<div class="col-sm-10">
					<input id="username" type="text" name="username"  class="form-control">
					<span id="error_username"></span>
				</div>
			</div>

		
			<div class="row form-group input_group">
				<label for="" class="col-sm-2">Password</label>
				<div class="col-sm-10">
					<input id="password" type="password" name="password" class="form-control">
					<span id="error_Password"></span>
				</div>
			</div>

			<div class="row form-group">
				
				<div class="col-xs-12">
					<input id="submit_delete" type="submit" name="delete" value="Delete" class="form-control">
				</div>
			</div>
		</form>
 		
 		
	    </div>
	</div>

	<?php include 'includes/footer.php' ?>
</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/scripts.js"></script>
	</body>
</html>