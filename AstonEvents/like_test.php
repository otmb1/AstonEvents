<?php

	session_start();

	$connect = mysqli_connect("localhost", "root", "mysql", "aston_events");

	if (isset($_POST['liked'])) {
		$usersID = $_SESSION['usersID'];
		$eventID = $_POST['eventID'];
		$result = mysqli_query("SELECT * from events where eventID = $eventID");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];
		
		mysqli_query("UPDATE events SET likes=$n+1 WHERE eventID = $eventID");
		mysqli_query("INSERT INTO likes(usersID, eventID) VALUES ($usersID, $eventID)");
		exit();
	}
		
	if (isset($_POST['unliked'])) {
		$usersID = $_SESSION['usersID'];
		$eventID = $_POST['eventID'];
		$result = mysqli_query("SELECT * from events where eventID = $eventID");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];
		
		mysqli_query("DELETE FROM likes WHERE eventID=$eventID AND usersID=$usersID");
		mysqli_query("UPDATE events SET likes=$n-1 WHERE eventID = $eventID");
		exit();
	}


?>  

<!DOCTYPE html>
<html>
<head>
	<title>Like and Unlike</title>
</head>
<body>

<div class = "content">

<?php
	$query = mysqli_query($connect, "SELECT * FROM events");
	
while ($row = mysqli_fetch_array($query)) { ?>
	<div class="post" method="post">
		<?php echo $row['name']; ?><br>
		
		<?php
		$usersID = $_SESSION['usersID'];
		$sql = "SELECT * FROM likes WHERE usersID=$usersID AND eventID = ".$row['eventID']."";
		$result = mysqli_query($connect, $sql);
		
		if (mysqli_num_rows($result) == 1) { ?>
		
			<span><a href="" class="unlike" name="unlike" id="<?php echo row['eventID']; ?>">UNLIKE</a></span>
		<?php } else { ?>
			<span><a href="" class="like" name="like" id="<?php echo row['eventID']; ?>">LIKE</a></span>
		<?php } ?>
		<span><?php echo $row['likes']." people like this" ?></span>
		
		
	</div>
<?php } ?>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.like').click(function(){
			var eventID = $(this).attr('eventID');
			$.ajax({
				url: 'like_test.php',
				type: 'post',
				async: false,
				data:{
					'liked': 1,
					'eventID': eventID
				},
				success:function(){
					
				}
			});
		});
		
		$('.unlike').click(function(){
			var eventID = $(this).attr('eventID');
			$.ajax({
				url: 'like_test.php',
				type: 'post',
				async: false,
				data:{
					'unliked': 1,
					'eventID': eventID
				},
				success:function(){
					
				}
			});
		});
</script>
</body>
</html>
		
		
		
		
		