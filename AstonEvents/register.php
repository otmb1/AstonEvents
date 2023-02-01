<?php

// if statement that collects data inserted by the user
if(isset($_POST['insert'])){
	
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	
	$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");
		
	$sql = "INSERT into users (firstname, surname, username, password, dob, gender, email, phonenumber) values ('$firstname','$surname','$username','$password','$dob','$gender','$email','$phonenumber')";
	$result = mysqli_query($connect, $sql);
	
	// if statement that inserts data to the users table of the database
	if($result)
	{
		?>
		<div class="alert-confirm">
			<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Success!</strong> You have successfully registered to <strong>Aston Events!</strong>
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

&nbsp;&nbsp;

  <!-- Section that allows users to enter their information in order to register to the website -->
  <div class="container" id="register_box">
	&nbsp;&nbsp;
  
	<div class="panel panel-default">
       <div id="heading-text" class="panel-heading"><h3>Register</h3></div>
         <div class="panel-body">
			<form action="register.php" method="post">
	  <div class="row col-lg-12">
		<form action="register.php" method="post">
		  <div class="form-group col-md-6">
			  <label for="name" style="color:black">First Name:</label> 
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			     <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
				</div>
			  </div>
		  </div>
		  <div class="form-group col-md-6">
			  <label for="email" style="color:black">Surname:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			     <input type="text" class="form-control" name="surname" placeholder="Surname" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-6">
			  <label for="email" style="color:black">Username:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			     <input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-6">
			  <label for="pwd" style="color:black">Password:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			     <input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-6">
			  <label for="email" style="color:black">Date of Birth:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			     <input type="date" class="form-control" name="dob" placeholder="DD/MM/YY" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-6">
			  <label for="gender" rowspan="2" style="color:black">Gender:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group" style="color:black">
			     <input type="radio" name="gender" value="M" required> Male </input>
				 <input type="radio" name="gender" value="F" required> Female </input>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-6">
			  <label for="email" style="color:black">Email address:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			     <input type="email" class="form-control" id="email" name="email" placeholder="example@aston.ac.uk" pattern="[\w.%+-]+@aston\.ac\.uk" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-6">
			  <label for="email" style="color:black">Phone Number:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			     <input type="number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
				</div>
			  </div>
		  </div>


		  <div style="text-align:center" class="col-md-12">
			<button type="submit" name="insert" class="btn btn-primary">Register</button>
		  </div>
		  
		  <div class="form-group col-md-12" align="center">
			  <h5 style="color:black">Already have an account? <a href="login.php">Sign In Here.</a></h5>
		</div>
	  </div>
	  
	</form>
		 
		</div>
	</div>
 
		  
	
	&nbsp;&nbsp;
</div>

&nbsp;&nbsp;

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright © 2021 | Aston Events</a></p> 
</footer>

</body>
</html>