<?php

// Starting session
session_start();

// Connecting to database
$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");

// Attaining name from the events table as a variable
$eventIDSet = mysqli_query($connect, "select name FROM events");

// if statement that collects data inserted by the user
if(isset($_POST['submit'])) {
	$eventName = $_POST['eventName'];
	$bookingPlaces = $_POST['bookingPlaces'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$usersID = $_SESSION['usersID'];
	
	$eventIDquery = mysqli_query($connect, "select eventID FROM events where name = '$eventName'");
	$eventfetch = mysqli_fetch_array($eventIDquery);
	$eventID = $eventfetch['eventID'];
	
	$select = mysqli_query($connect, "select * from users where email = '$email' and phonenumber = '$phonenumber'");		
	
	$fetch = mysqli_fetch_array($select);
	$emailfetch = $fetch['email'];
	$phonenumberfetch = $fetch['phonenumber'];
	
	// if statement that only inserts data if the email and phone number matches the email and phone number fetched from database
	if ($email == $emailfetch && $phonenumber == $phonenumberfetch) {
		$result = mysqli_query($connect, "INSERT into bookings (bookingPlaces, eventID, eventName, usersID) values ('$bookingPlaces','$eventID','$eventName','$usersID')");
		$_SESSION['email'] = $emailfetch;
		$_SESSION['phonenumber'] = $phonenumberfetch;
		if($result){
			
		}
		else {
			?>
			<div class="alert-confirm">
				<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<strong>Failed To Book Event!</strong> Please try again later.
				</div>
			</div>
			<?php
		}
	?>	
	<div class="alert-confirm">
		<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Booking Confirmed!</strong>
		</div>
	</div>
		<?php
		
	}
	else {
		?>
		<div class="alert-confirm">
			<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Incorrect Email Address or Phone Number!</strong> Please try again.
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

&nbsp;&nbsp;

  <div class="container" id="bookings_box">
	&nbsp;&nbsp;
  
	<!-- Section that allows user to enter their booking information followed by email and phone number verification forms -->
	<div class="panel panel-default">
       <div id="heading-text" class="panel-heading" align="center"><h3>Book Event: </h3></div>
         <div class="panel-body">
		 
			<form action="bookings.php" method="post">
	  <div class="row col-lg-12">
		<form action="bookings.php" method="post">
		  <div class="form-group col-md-12">
			  <label for="name" style="color:black">Select Event:</label> 
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-menu-hamburger"></i></span>
			     <select type="text" class="form-control" name="eventName" placeholder="Event" required>
				 <?php
				 while($rows = $eventIDSet -> fetch_assoc()){
					 $name = $rows['name'];
					 echo "<option value='$name'>$name</option>";
				 }
				 ?>
				 </select>
				</div>
			  </div>
		  </div>
		  <div class="form-group col-md-12">
			  <label for="email" style="color:black">No. of Tickets:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-sort"></i></span>
			     <input type="number" class="form-control" name="bookingPlaces" placeholder="Tickets" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-12">
			  <label for="email" style="color:black">Confirm Email Address:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			     <input type="email" class="form-control" name="email" placeholder="Email Address" required>
				</div>
			  </div>
		  </div>
		  
		  <div class="form-group col-md-12">
			  <label for="pwd" style="color:black">Confirm Phone Number:</label>
			  <div class="inputGroupContainer">
			    <div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
			     <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" required>
				</div>
			  </div>
		  </div>


		  <div style="text-align:center" class="col-md-12">
			<button type="submit" name="submit" class="btn btn-success">Confirm Booking</button>
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
