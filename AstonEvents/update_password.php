<?php

// Starting session
session_start();

// Connecting to database
$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");

// if statement that collects the passwords inserted by the user
if(isset($_POST['update'])) {
	$c_password = $_POST['c_password'];
	$n_password = $_POST['n_password'];
	$cn_password = $_POST['cn_password'];
	$usersID = $_SESSION['usersID'];
	
	$select = mysqli_query($connect, "SELECT password FROM users where usersID = '$usersID' AND password = '$c_password'");		
	
	$fetch = mysqli_fetch_array($select);
	$passwordfetch = $fetch['password'];
	
	// if statement that updates the database based on the passwords entered by the user only if the current password matches the password fetched on the database and the new password matches the confirmation field
	if ($c_password == $passwordfetch && $n_password == $cn_password) {
		$result = mysqli_query($connect, "UPDATE users SET password = '$n_password' where usersID = '$usersID'");
		if($result){
			
		}
		else {
			?>
			<div class="alert-confirm">
				<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<strong>Failed To Update Password!</strong> Please try again later.
				</div>
			</div>
			<?php
		}
	?>	
	<div class="alert-confirm">
		<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Success!</strong> Your password has been updated!
		</div>
	</div>
		<?php
		
	}
	else {
		?>
		<div class="alert-confirm">
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Incorrect Current Password or Confirmation Password does not match!</strong> Please try again.
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
      <a class="navbar-brand"href="registered_home.php"><img style="max-width:155px; margin-top: -20px;" src="logo.png"></a>
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

<!-- Section that allows users to enter their current and new password in order to update them on the database -->
<div class="container" id="login_box">
	&nbsp;&nbsp;
	<div class="panel panel-default">
       <div id="heading-text" class="panel-heading"><h3>Update Password</h3></div>
         <div class="panel-body">
			<form action="update_password.php" method="post">
	  <div class="row col-lg-12">
		<div class="col-lg-3">
		</div>
		<div class="col-lg-6">
		 <div class="form-group col-md-12">
			  <label for="pwd" style="color:black">Current Password:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			     <input type="password" class="form-control" name="c_password" placeholder="Password" required>
				</div>
			  </div>
		  </div>
		  <div class="form-group col-md-12">
			  <label for="pwd" style="color:black">New Password:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			     <input type="password" class="form-control" name="n_password" placeholder="New Password" required>
				</div>
			  </div>
		  </div>
		  <div class="form-group col-md-12">
			  <label for="pwd" style="color:black">Confirm New Password:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			     <input type="password" class="form-control" name="cn_password" placeholder="Confirm Password" required>
				</div>
			  </div>
		  </div>
		  
		  <div style="text-align:center" class="col-md-12">
			<button type="submit" name="update" class="btn btn-primary">Update</button>
		  </div>
		</div>
		
		  
	  </div>
	  
	</form>
		 
		</div>
	</div>
	
  	
</div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright © 2021 | Aston Events</a></p> 
</footer>

</body>
</html>