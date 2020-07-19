<?php
	session_start();
	$conn = mysqli_connect("us-cdbr-east-02.cleardb.com","b82a0276ea0d73","51f64732") or die(mysqli_connect_error());
	$DB = mysqli_select_db($conn,'heroku_db4da753d301a40') or die(mysqli_error($conn));
	date_default_timezone_set('Asia/Kolkata');
	
	$APP_URL = 'https://job-profile.herokuapp.com/';
?>