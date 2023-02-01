<?php

// Starting session
session_start();

// Connecting to database
$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");
$db = mysqli_select_db($connect,"users");

// if statement that collects the username and password inserted by the user
if(isset($_POST['submit'])) {
	$user = $_POST['username'];
	$pwd = $_POST['password'];
	
	$select = mysqli_query($connect,"select * from users where username = '$user' and password = '$pwd'");
	
	$fetch = mysqli_fetch_array($select);
	$userfetch = $fetch['username'];
	$pwdfetch = $fetch['password'];	
	
	$usersIDfetch = $fetch['usersID'];
	$firstnamefetch = $fetch['firstname'];
	$surnamefetch = $fetch['surname'];
	$dobfetch = $fetch['dob'];
	$genderfetch = $fetch['gender'];
	$emailfetch = $fetch['email'];
	$phonenumberfetch = $fetch['phonenumber'];
	
	// if statement that allows user to sign in if the username and password they entered matches with the username and password stored in the database and redirects them to the home PHP page
	if ($user == $userfetch && $pwd == $pwdfetch) {
		$_SESSION['username'] = $userfetch;
		$_SESSION['password'] = $pwdfetch;
		
		$_SESSION['usersID'] = $usersIDfetch;
		$_SESSION['firstname'] = $firstnamefetch;
		$_SESSION['surname'] = $surnamefetch;
		$_SESSION['dob'] = $dobfetch;
		$_SESSION['gender'] = $genderfetch;
		$_SESSION['email'] = $emailfetch;
		$_SESSION['phonenumber'] = $phonenumberfetch;
		
		header("Location:registered_home.php");
	}
	else {
		?>
		<div class="alert-confirm">
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Incorrect username or password!</strong> Please try again.
			</div>
		</div>
		<?php
	}
}
		
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
      <a class="navbar-brand" href="home.html"><img style="max-width:155px; margin-top: -20px;" src="logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="events.php">EVENTS</a></li>
        <li><a href="login.php">LOGIN</a></li>
        <li><a href="register.php">REGISTER</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="separate">
</div>

<!-- Section that allows users to enter their information in order to sign in to the website -->
<div class="container" id="login_box">
	&nbsp;&nbsp;
	<div class="panel panel-default">
       <div id="heading-text" class="panel-heading"><h3>Login</h3></div>
         <div class="panel-body">
			<form action="login.php" method="post">
	  <div class="row col-lg-12">
		<div class="col-lg-3">
		</div>
		<div class="col-lg-6">
		 <div class="form-group col-md-12">
			  <label for="email" style="color:black">Username:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			     <input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
			  </div>
		  </div>
		  <div class="form-group col-md-12">
			  <label for="pwd" style="color:black">Password:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			     <input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
			  </div>
		  </div>
		  
		  <div style="text-align:center" class="col-md-12">
			<button type="submit" name="submit" class="btn btn-primary">Login</button>
		  </div>
		</div>
		
		
		<div class="form-group col-md-12" align="center">
			  <h5 style="color:black">Don't have an account? <a href="register.php">Register Here.</a></h5>
		</div>
		  
	  </div>
	  
	</form>
		 
		</div>
	</div>
	
  	
</div>

&nbsp;&nbsp;


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright © 2021 | Aston Events</a></p> 
</footer>

</body>
</html>
