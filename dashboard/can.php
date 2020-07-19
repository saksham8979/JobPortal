<?php
	if(empty($_SESSION['id']))
	{
		header("Location: " . $APP_URL);
		die();
    }
    $id = $_SESSION['id'];
	$user_result = mysqli_query($conn,"select * from users where id='$id'") or die(mysqli_error($conn));
	$user_row = mysqli_fetch_array($user_result);
	if($user_row['role'] != 2){
        header("Location: " . $APP_URL.'dashboard');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Saksham Johri">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <a href="../logout.php"><li>Log Out</li></a>
            </div>
        </div>
    </div>

    <div class="job-table">
        <div class="table-box">
            <div style="text-align: center; font-family: cursive; font-size: 26px; color: white;">
                <h2>Welcome <?php echo $user_row['name']; ?> </h2>
            </div>
            <div>
                <table class="table" style="font-size: 22px; font-family: cursive;">
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM jobs WHERE id NOT IN (SELECT job_id FROM application WHERE can_id ='$id')");
                        //$result = mysqli_query($conn, "select k.id, k.title, k.description from jobs k left join (select * from application where can_id='$id') r on k.id = r.job_id where r.job_id is NULL;");
                        if (mysqli_num_rows($result) != 0) { ?>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Apply</th>
                    </tr>
                    <?php	while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><form action = "functions.php" method="post">
                                <input type="hidden" name="func" value="apply">
                                <input type="hidden" name="jid" value="<?php echo $row['id']; ?>">
                                <input class="btn" type="submit" name="" value="Apply">
                            </form></td>
                    </tr>
                    <?php }}else{ ?>
                        No Jobs Found!
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    
</body>
</html>