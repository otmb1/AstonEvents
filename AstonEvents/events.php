<?php  

// if statement that sorts the date/time column from the events table in ascending order when the "date/time ascending" button is pressed
if(isset($_POST['d_ASC']))
{
   $asc_query = "SELECT * FROM events ORDER BY datetime ASC";
   $result = executeQuery($asc_query);
}

// if statement that sorts the date/time column from the events table in descending order when the "date/time descending" button is pressed 
elseif (isset ($_POST['d_DESC'])) 
{
	$desc_query = "SELECT * FROM events ORDER BY datetime DESC";
	$result = executeQuery($desc_query);
}

// if statement that sorts the category column from the events table in ascending order when the "category ascending" button is pressed 
elseif (isset ($_POST['c_ASC'])) 
{
	$cat_asc_query = "SELECT * FROM events ORDER BY category ASC";
	$result = executeQuery($cat_asc_query);
}

// if statement that sorts the category column from the events table in descending order when the "category descending" button is pressed
elseif (isset ($_POST['c_DESC'])) 
{
	$cat_desc_query = "SELECT * FROM events ORDER BY category DESC";
	$result = executeQuery($cat_desc_query);
}

// main call where the events are automatically sorted by their event ID in descending order
else {
    $default_query = "SELECT * FROM events ORDER BY eventID DESC";
    $result = executeQuery($default_query);
}

// function that connects to the database and executes the specified query
function executeQuery($query) {

	$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");
	$result = mysqli_query($connect, $query);
	return $result;
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
  <style>
	table {
		border-collapse: collapse;
		width: 100%;
		color: #000000;
		text-align: left;
		font-size: 14px;
		}
		
  </style>
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

<!-- Header of the page -->
<div class="container" style="width:700px;">  
   <h2 align="center" style="color:black">List of Events</h2>
</div> 

 &nbsp;&nbsp;

<!-- Buttons that once pressed sort out the data that's called from the assigned name -->
<form class="table solid-bordered" action="events.php" method="post" align="center" style="color:black">
	<h3 align="center" style="color:black">Sort:</h3>
    <input type="submit" name="d_ASC" value="Date/Time Ascending"> 
    <input type="submit" name="d_DESC" value="Date/Time Descending">
	<input type="submit" name="c_ASC" value="Category Ascending">
    <input type="submit" name="c_DESC" value="Category Descending">
</form>


<!-- Table that displays brief data from the events table and a view button -->
<div class="table-responsive">
    <br />
    <div id="events">
	<?php
      while($row = mysqli_fetch_array($result))
      {
      ?>
     <table class="table table-bordered">
      <tr>
       <th width="10%">Category</th>  
       <th width="30%">Name</th>
	   <th width="20%">Date/Time</th>
	   <th width="30%">Description</th>
	   <th width="10%"></th>
      </tr>
      
      <tr>
       <td><?php echo $row["category"]; ?></td>
       <td><?php echo $row["name"]; ?></td>
	   <td><?php echo $row["datetime"]; ?></td>
	   <td><?php echo $row["description"]; ?></td>
	   <td align="center"><button type="button" name="view" id="view" data-toggle="modal" data-target="#view_data_Modal<?php echo $row["eventID"]; ?>" class="btn btn-basic" onclick="loadData(this.getAttribute('data-id'));" data-id="<?php echo $row["eventID"]; ?>">View</button></td>
      </tr>
     </table>
    </div>
   </div>  
</body>
</html>

<!-- Modal Window that displays data from the event table based on the event ID -->
<div id="view_data_Modal<?php echo $row["eventID"]; ?>" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" style="color:black">Event Details</h4>
   </div>
   <div class="modal-body" id="modal-body" style="color:black">
	<h1 align="center"><?php echo '<img src="data:image;base64,'.base64_encode($row['image']). '" alt="Image" style="width: 250px; height=250px;" >'; ?></h1>
   <p><strong>Category: </strong> <span id="category"></span><?php echo $row["category"]; ?></p>
   <p><strong>Name: </strong> <span id="name"></span><?php echo $row["name"]; ?></p>
   <p><strong>Date/Time: </strong> <span id="datetime"><?php echo $row["datetime"]; ?></span></p>
   <p><strong>Location: </strong> <span id="place"></span><?php echo $row["place"]; ?></p>
   <p><strong>Organiser:</strong> <span id="organiser"></span><?php echo $row["organiser"]; ?></p>
   <p><strong>URL: </strong><span id="url"></span><a href ="<?php echo $row["url"]; ?>"><?php echo $row["url"]; ?></a></p>
   <p><strong>Description: </strong><span id="description"></span><?php echo $row["description"]; ?></p>
   </div>
   <div class="modal-footer">
   <div style="text-align:center" class="col-md-12">
	<form action="login.php" method="post">
	 <button type="book" name="book" class="btn btn-warning"><i class="glyphicon glyphicon-lock"></i> Log in to Book</button>
     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	</form>
	</div>
   </div>
  </div>
 </div>
</div>

<?php
   }
?>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Copyright © 2021 | Aston Events</a></p> 
</footer>

</body>
</html>