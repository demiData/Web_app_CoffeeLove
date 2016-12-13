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

		die("You are now logged in as $username <a href='index.php'>Back!</a>");
	}
	else {
		echo "Please enter a username and password.";
	}
}

?>
<!doctype html>
<html>
	<head>
		<title>Coffee Love :: Log in</title>
		
		<?php 
		    include 'includes/links_scripts.php'; 
		    ?>
		 <style>
				form ul li {
					list-style-type: none;
					}
				
		 </style>
	</head>
	<body>
		<?php 
			include 'includes/header.php';
			
		 ?>
		<div class="container">
		    <div class="page-header">
      		<div class="active">
        		<?php 
							require_once 'require/cookie_login.php';
							
							if ($logged == true) {
							    echo $userArray['username'];
							    echo "<form method='post' action='logout.php'>
									<ul>
										<li>
											<input type='submit' name='logout' value='Logout' style='background-color:#D04C48;border:none;width:100px;height:40px;font-size:16px;'>
										</li>
									</ul>
           						 </form>";
           						echo "<form method='post' action='update.php'>
	 					         <input type='submit' name='update' value='update' style='background-color:#46D093;border:none;width:100px;height:40px;font-size:16px;'>
 					             </form>";
 					            echo "<form method='post' action='delete.php'>
									<ul>
										<li>
											<input type='submit' name='delete' value='Delete' style='background-color:#D01B04;border:none;width:100px;height:40px;font-size:16px;'>
										</li>
									</ul>
           						 </form>";
 					            
							} else {
							    echo "User not logged in";
							  echo "<div class='row'>
									<h3>Log in, coffee lover!</h3>
									</div>
									<form action='' method='post' class='form-horizontal'>
									<div class='row form-group input_group'>
										<label for='' class='col-sm-2'>Username</label>
										<div class='col-sm-10'>
											<input type='text' name='username' id='username' value='' class='form-control'>
											<span id='errorEmail'></span>
										</div>
									</div>
						
									<div class='row form-group input_group'>
										<label for='' class='col-sm-2'>Password</label>
										<div class='col-sm-10'>
											<input type='password' name='password' id='password' class='form-control'>
											<span id='errorPassword'></span>
										</div>
									</div>
									<div class='row form-group '>
										
										<div class='col-xs-12'>
										  <input type='submit' name='login' value='Login' class='form-control'>
											
										</div>
									</div>
								</form>
								</div>";
							} 
							?>
	     	</div>
	     	</div>
	   
		
	
	
     </div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>