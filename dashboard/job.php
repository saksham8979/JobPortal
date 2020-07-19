<?php
	include('../connections.php');
	if(!isset($_GET['id'])){
		header("Location: " . $APP_URL . "dashboard");
		die();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
    <link rel="stylesheet" href="../css/find-job.css">
    <link rel="stylesheet" href="../css/rec-dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div class="header">
        <div class="inner-header">
            <div class="logo-container">
                <h1>MY <span>SITE</span> </h1>
            </div>

            <div class="navigation">
				<a href="index.php"><li>Home</li></a>
				<a href="../logout.php"><li>Log Out</li></a>
            </div>
        </div>
    </div>
	
<?php
	$jid = $_GET['id'];
	$id = $_SESSION['id'];
	$result = mysqli_query($conn, "select * from jobs where id='$jid' and rec_id='$id'");
	if (mysqli_num_rows($result) == 1) { 
		$job_row = mysqli_fetch_array($result);
		?>
		<?php
			$result = mysqli_query($conn, "select name, email from users u, application a where a.job_id = '$jid' and u.id = a.can_id");
			if (mysqli_num_rows($result) != 0) { ?>
	<div class="job-table">
        <div class="table-box">
            <div style="text-align: center; font-family: cursive; font-size: 26px; color: white;">
				<h2>Applications</h2>
			</div>
			<div>
				<table class="table" style="font-size: 22px; font-family: cursive;">
					<tr>
						<th>Name</th>
						<th>Email</th>
					</tr>
					<?php	while ($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	<?php }else{ ?>
		<div class="job-table">
			<div class="table-box">
				<div style="text-align: center; font-family: cursive; font-size: 26px; color: white;">
										<h2>No Applications for this job!</h2>
				</div>
			</div>
		</div>
	<?php } ?>

<?php }else{ ?>
	Invalid Job ID
<?php } ?>

</body>
</html>