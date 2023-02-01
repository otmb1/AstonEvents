<?php

// Starting session
session_start();

// Making the logged in user's ID a variable
$usersID = $_SESSION['usersID'];

// Connecting to database
$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");

// Query that selects the booking information from the booking table depending on the user's ID
$sql = "SELECT eventName, bookingDate, bookingPlaces FROM bookings where usersID  = '$usersID'";
$result = mysqli_query($connect, $sql);
		
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

&nbsp;&nbsp;

<!-- Section that displays the user's information -->
<div class="container" style="width:700px;">  
   <h3 align="center" class="margin" style="color:black">My Profile</h3>
</div> 

<div class="container" align="center" style="color:black">
	<p>First Name: <?php echo $_SESSION['firstname']; ?></p>
	<p>Surname: <?php echo $_SESSION['surname']; ?></p>
	<p>Username: <?php echo $_SESSION['username']; ?></p>
	<p>Date of Birth: <?php echo $_SESSION['dob']; ?></p>
	<p>Gender: <?php echo $_SESSION['gender']; ?></p>
	<p>Email Address: <?php echo $_SESSION['email']; ?></p>
	<p>Phone Number: <?php echo $_SESSION['phonenumber']; ?></p>
 </div>
 
 &nbsp;&nbsp;

 <!-- Buttons that gives the user an option to update their password or details, redirecting to their perspective pages -->
 
 <form action="update_password.php" align="center" style="color:black">
    <input type="submit" name="upd_password" value="Update Password"><br><br></input>
</form>

<form action="update_details.php" align="center" style="color:black">
    <input type="submit" name="upd_details" value="Update Details"><br><br>
</form>

<!-- Section that displays the user's booking information -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">My Bookings</h3>
    <br />
    <div id="booking-table">
	<?php
      while($row1 = mysqli_fetch_array($result))
      {
      ?>
     <table class="table table-bordered">
      <thead>  
       <th width="30%">Event</th>
	   <th width="40%">Date of Reservation:</th>
	   <th width="30%">Tickets</th>
      </thead>
      <tr>
       <td><?php echo $row1["eventName"]; ?></td>
       <td><?php echo $row1["bookingDate"]; ?></td>
	   <td><?php echo $row1["bookingPlaces"]; ?></td>
	   </tr>
	   <?php
		}
		?>
     </table>
    </div>
   </div>
</div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright © 2021 | Aston Events</a></p> 
</footer>

</body>
</html>