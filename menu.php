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
        <h1>Menu</h1>
            </div>
           <p class="lead">We added new drinks to our <span style="color:#50D0C3;">menu</span>. <br>Be sure to stop by!</p>
           <p>A whole new coffee menu coming soon!</p>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        
          <img src="img/1rdpopprkoa-nick-karvounis.jpg"  alt="iced coffee" style="width:100%">
          <div class="caption">
            <p>Smooth Columbian. $5.00</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
       
          <img src="img/dt9kdskj6ek-drew-coffman.jpg" alt="fancy mocha" style="width:100%">
          <div class="caption">
            <p>Peruvian hybrid. $4.50</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
       
          <img src="img/lfrm-hkqvpm-anete-lusina.jpg" alt="Coffee ice cream" style="width:100%">
          <div class="caption">
            <p>Cold winter. $3.75</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

         </div>
		
		<?php include 'includes/footer.php'; ?>
	
		<script src="js/jquery-3.1.1.min.js"></script>
	    <script src="js/scripts.js"></script>
	</body>
</html>