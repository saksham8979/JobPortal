<?php
    include("../connections.php");
	if(empty($_SESSION['id']))
	{
		header("Location: " . $APP_URL);
		die();
	}
	
	$user_id = $_SESSION['id'];
	$user_result = mysqli_query($conn,"select role from users where id='$user_id'") or die(mysqli_error($conn));
	$user_row = mysqli_fetch_array($user_result);
	if($user_row['role'] == 2){
		include('can.php');
    }
    elseif($user_row['role'] == 1){
		include('rec.php');
    }
?>