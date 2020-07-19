<?php
	include("../connections.php");
	if(empty($_SESSION['id']))
	{
		header("Location: " . $APP_URL);
		die();
	}
	$id = $_SESSION['id'];
	if(!isset($_POST['func'])){
		header("Location: " . $APP_URL . "dashboard ");
		die();
	}
	$p = $_POST['func'];
	
	if($p == 'addJob'){
		$jt = $_POST['jt'];
		$jd = $_POST['jd'];
		if(mysqli_query($conn, "insert into jobs(rec_id, title, description) values('$id', '$jt', '$jd')") or die(mysqli_error($conn))){
			header("Location: " . $APP_URL . "dashboard?msg=done");
			die();
		}
		echo "Something went Wrong";
		die();
	}
	
	if($p == 'apply'){
		$jid = $_POST['jid'];
		if(mysqli_query($conn, "insert into application(job_id, can_id) values('$jid', '$id')") or die(mysqli_error($conn))){
			header("Location: " . $APP_URL . "dashboard");
			die();
		}
		echo "Something went Wrong";
		die();
	}
?>