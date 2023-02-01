<?php

// Starting session
session_start();

// if statement that collects the details inserted by the user
if(isset($_POST['update'])){
	
	$usersID = $_SESSION['usersID'];
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	
	$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");
		
	$sql = "UPDATE users SET firstname = '$firstname', surname = '$surname', username = '$username', dob = '$dob', email = '$email', phonenumber = '$phonenumber' where usersID = '$usersID'";
	$result = mysqli_query($connect, $sql);
	
	// if statement that updates the database based on the details entered by the user
	if($result)
	{
		?>
		<div class="alert-confirm">
			<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Success!</strong> You have successfully updated your account!
			</div>
		</div>
		<?php
    }
    
    else{
        ?>
		<div class="alert-confirm">
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Incorrect information entered!</strong> Please try again.
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


<!-- Section that allows users to enter their information in order to update them on the database -->
<div class="container" id="login_box">
	&nbsp;&nbsp;
	<div class="panel panel-default">
       <div id="heading-text" class="panel-heading"><h3>Update Account</h3></div>
         <div class="panel-body">
			<form action="update_details.php" method="post">
	  <div class="row col-lg-12">
		<div class="col-lg-3">
		</div>
		<div class="col-lg-12">
		<div class="form-group col-md-12">
			  <label for="name" style="color:black">First Name:</label> 
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			     <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-12">
			  <label for="email" style="color:black">Surname:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			     <input type="text" class="form-control" name="surname" placeholder="Surname" required>
				</div>
			  </div>
		  </div>
		
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
			  <label for="email" style="color:black">Date of Birth:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			     <input type="date" class="form-control" name="dob" placeholder="DD/MM/YY" required>
				</div>
			  </div>
		  </div>
		
		 <div class="form-group col-md-12">
			  <label for="email" style="color:black">Email address:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			     <input type="email" class="form-control" id="email" name="email" placeholder="example@aston.ac.uk" pattern="[\w.%+-]+@aston\.ac\.uk" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-12">
			  <label for="email" style="color:black">Phone Number:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			     <input type="number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
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

<br>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright © 2021 | Aston Events</a></p> 
</footer>

</body>
</html>