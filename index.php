 
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
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
        <h1>Good ideas start with <span style="color:#50D0C3;">great</span> coffee</h1>
      </div>
      <p class="lead">Home for delicious brewed coffee.</p>
   		  <img class="img-responsive" src="img/tyizeciz_60-karl-fredrickson.jpg" alt="drip-coffee" width="100%" > 
		</div>
      <div class="container">
      <br>
      <div class="news">
      <h3>Coming soon!</h2>
      <p>We are soon going to add our very own coffee blog :)</p>
      <p>Stay tuned!!</p>
	  </div>

      </div>
      </div>
	<br>
		<?php include 'includes/footer.php'; ?>
		
		<script src="js/jquery-3.1.1.min.js"></script>
	    <script src="js/scripts.js"></script>
	</body>
</html>