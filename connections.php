<?php
	session_start();
	$conn = mysqli_connect("localhost","root","usbw") or die(mysqli_connect_error());
	$DB = mysqli_select_db($conn,'squareBoat') or die(mysqli_error($conn));
	date_default_timezone_set('Asia/Kolkata');
	
	$APP_URL = 'http://localhost:8080/SquareBoat/';
?>