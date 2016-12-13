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
        <h1>The Story: <br> Coffee Love</h1>
            </div>
      
        <div class="container">
  		<h1>Jacob</h1>
  		<p>It dawn to him. His very own coffee shop, why not? Great ideas starts with a cup of coffee in the early morning...</p>
 		 <img class="img-responsive" src="img/4s3r-z-_u0k-jake-young.jpg" alt="Chania" width="2048" height="3072"> 
		</div>    

        </div>

		<br>
		<br>
		<?php include 'includes/footer.php'; ?>
	
	    <script src="js/jquery-3.1.1.min.js"></script>
	    <script src="js/scripts.js"></script>
	</body>
</html>