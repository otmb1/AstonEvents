<?php

// Starting session
session_start();

?>  
<!DOCTYPE html>
<html lang="en">
<!-- Calls to Bootstrap, JQuery and my CSS file -->
<head>
  <title>Aston Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="registered_home.php"><img style="max-width:155px; margin-top: -20px;" src="logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="registered_events.php">EVENTS</a></li>
        <li><a href="profile.php">ACCOUNT</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="separate">
</div>

<!-- Slideshow -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Images used for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="pictures/slideshow1.jpg" alt="Slideshow 1">
    </div>

    <div class="item">
      <img src="pictures/slideshow2.jpg" alt="Slideshow 2">
    </div>

    <div class="item">
      <img src="pictures/slideshow3.jpg" alt="Slideshow 3">
    </div>
  </div>

  <!-- Left and right controls for Slideshow-->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Welcome to Aston Events!</h3>
  <p>From the chalked yet smooth football field to the professional and insightful speeches at TEDx. We are here to make sure you can capitalise on the extra-curricular activities here at Aston to ensure you have memories to remember throughout your university life and beyond! Click on the events link below to get started!</p>
  <a href="registered_events.php" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-th-list"></span> Events
  </a>
</div>

<!-- Third Container -->
<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-4">
	  <h2>Sports</h2>
	  <a href="registered_events.php">
	  <img src="pictures/container1.jpg" class="img-responsive margin" style="width:100%" alt="Image-1">
	  </a>
      <p>We offer a large variety of sporting events including the likes of rugby, football, basketball and so much more!</p> 
    </div>
    <div class="col-sm-4"> 
	  <h2>Culture</h2>
	  <a href="registered_events.php">
	  <img src="pictures/container2.jpg" class="img-responsive margin" style="width:100%" alt="Image-2">
	  </a>
      <p>Expand your network even further with our cultural events here at Aston Events!</p>
    </div>
    <div class="col-sm-4"> 
	  <h2>Others</h2>
	  <a href="registered_events.php">
	  <img src="pictures/container3.jpg" class="img-responsive margin" style="width:100%" alt="Image-3">
	  </a>
      <p>We have this section dedicated to the special events that are hosted in collaboration with our partners which include the likes of TEDx and LinkedIn!</p>
    </div>
  </div>
</div>

<!-- Fourth Container -->
<div class="container-fluid bg-2 text-center"> 
  <h3 class="margin">Our Location</h3><br>
	<div class="contact_map" align="center">
		<iframe  
		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.531167148689!2d-1.8913983843103803!3d52.4876239463807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc9ae4f37f75%3A0x5ea0cdcded62a9ac!2sAston%20Students&#39;%20Union!5e0!3m2!1sen!2suk!4v1619653416428!5m2!1sen!2suk"
		width="80%" height="600" frameborder="100" style="border:100"></iframe>
	</div>
  <br><h3 class="margin">Contact Us:</h3>
	<h4>Phone Number: <strong> +44 (0)121 204 4855</strong></h4>
	<h4>Email Address: <strong> union.reception@aston.ac.uk</strong></h4>
	<h4>Address: <strong> Aston Students' Union, 8 Coleshill St, Birmingham, B4 7BX</strong></h4>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright © 2021 | Aston Events</a></p> 
</footer>

</body>
</html>
