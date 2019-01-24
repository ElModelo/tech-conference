<?php 
	$dbc = mysqli_connect("localhost","root","1234","tech-conference");

	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
?>
