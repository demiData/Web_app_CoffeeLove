<?php

$to = "demi.minjarez@gmail.com";
$subject = "Portfolio Contact";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$body = <<<EMAIL

Hi! My name is $name and my topic is $topic

$message

Sincerely,

$name

P.S. Oh yeah, my email is $email.

EMAIL;

$header = "From: $email";

if ($_POST) {
	if ($name == '' && $email == '' && $message == '')
	{
		$feedback = 'Fill out all the fields';
	} else {
		mail($to, $subject, $body, $header);
		$feedback = 'Hey, this is actually working!';
	}
  }
?>
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Coffee Love</title>
		<?php require 'includes/links_scripts.php'; ?>
	</head>
	<body>
		<?php include 'includes/header.php'; ?>
		
		<div class="container">
					<div class="page-header">
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
	    		 	</div>
		    
		<div class="row signup flex-container">
		
		<div class="row">
			<h1>Contact us!</h1>
		
		<form action="" method="post" class="form-horizontal">
			  <div class="row form-group input_group">
				<label for="name" class="col-sm-2">Name</label>
				<div class="col-sm-10">
					<input id="name" type="text" name="name" value="" class="form-control">
					<span id="errorFirstname"></span>
				</div>
			</div>
			
			<div class="row form-group input_group">
				<label for="email" class="col-sm-2">Email</label>
				<div class="col-sm-10">
					<input type="text"name="email" id="email" value="" class="form-control">
					<span id="errorEmail"></span>
				</div>
			</div>

			<div class="row form-group input_group">
				<label for="message" class="col-sm-2">Message</label>
				<div class="col-sm-10">
					<textarea id="message" name="message" col="42" rows="9" placeholder="We would love to hear from you..."></textarea>
				</div>
			</div>
			<div class="row form-group ">
			   <div class="col-xs-12">
					<input type="submit" value="submit" class="form-control" style="">
				</div>
			</div>
		</form>

		</div>
	</div>
	
    </div>
		
		<?php include 'includes/footer.php'; ?>
		
		<script src="js/jquery-3.1.1.min.js"></script>
	    <script src="js/scripts.js"></script>
	</body>
</html>