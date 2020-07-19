<?php
	if(empty($_SESSION['id']))
	{
		header("Location: " . $APP_URL);
		die();
    }
    $id = $_SESSION['id'];
	$user_result = mysqli_query($conn,"select * from users where id='$id'") or die(mysqli_error($conn));
	$user_row = mysqli_fetch_array($user_result);
	if($user_row['role'] != 1){
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

    <div style="background: #101010">
        <div style="color:white; text-align: center;">
            <h1 style="padding-bottom: 10px">
                Welcome <?php echo $user_row['name']; ?>
            </h1>
        </div>
    </div>
    <div class="jobs">
        <div style="text-align: center; font-family: cursive; font-size: 26px; padding-top: 40px;">
                <h2>Post A Job</h2>
        </div>
        <div class="login-box">
            <form action="functions.php" method="post">
                <input type="hidden" value="addJob" name = "func">
                <div class="textbox">
                    <i class="fa fa-pencil"></i>
                    <input type="text" placeholder = "Job Title" name = "jt" required>
                </div>

                <div class="textbox">
                    <i class="fa fa-edit"></i>
                    <textarea type="textbox" placeholder="Job Description" name="jd" required></textarea>
                </div>
                <div style="text-align-last: center;">
                    <input class="btn" type="submit" name="" value="Post Job">
                </div>
            </form>
        </div>
    </div>

    <div class="job-table">
        <div class="table-box">
            <div style="text-align: center; font-family: cursive; font-size: 26px; color: white;">
                <h2>Jobs Posted</h2>
            </div>
            <div>
            <table class="table" style="font-size: 22px; font-family: cursive;">
                <?php	if ($result = mysqli_query($conn, "select * from jobs where rec_id='$id' order by id desc")) { ?>
                <tr style="border-bottom: dotted 1px">
                    <th>Job Title</th>
                    <th>Description</th>
                    <th>View</th>
                </tr>
                <?php	while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><a href="job.php?id=<?php echo $row['id']; ?>"><button class="btn"><i class="fa fa-inbox"></i> View</button></a></td>
                </tr>
                
                <?php }} ?>
            </table>
            </div>
        </div>
    </div>
    
</body>
</html>