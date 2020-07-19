<?php
    include('connections.php');
	if(!empty($_SESSION['id']))
	{
		header("Location: " . $APP_URL."dashboard");
		die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Saksham Johri">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
    <link rel="stylesheet" href="css/login-page.css">
    <link rel="stylesheet" href="css/find-job.css">
    <?php
        if(isset($_GET['err']) && $_GET='invalid'){
            ?>
        <script>
            alert("E-mail or Password Invalid !");
            </script>
    <?php
        }
    ?>
</head>
<body>
    <div class="header">
        <div class="inner-header">
            <div class="logo-container">
                <h1>MY <span>SITE</span> </h1>
            </div>

            <div class="navigation">
                <a href="index.php"><li>Home</li></a>
            </div>
        </div>
    </div>
    <div class="login-box">
        <a href="#" value="can" class="login" >
            <h2>
                Candidate
            </h2>
        </a>
        <a href="#" value="rec" class="login" >
            <h2>
                Recruiter 
            </h2>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
        $('.login').click(function()
        {
            var type = $(this).attr('value');
            if(type == "can")
            {
                $('.login-box').html('<h1>Login Candidate</h1>');
            }
            else
            {
                $('.login-box').html('<h1>Login Recruiter</h1>');
            }
            $('.login-box').append(`<form id="login" action="functions.php" method="post" value="`+type+`">
                                    <input type="hidden" name="func" value="login">
                                    <div class="textbox">
                                        <i class="fa fa-envelope"></i>
                                        <input type="text" placeholder = "E-mail" name = "email">
                                    </div>

                                    <div class="textbox">
                                        <i class="fa fa-lock"></i>
                                        <input type="password" placeholder="Password" name="pass">
                                    </div>
                                    
                                    <input class="btn" type="submit" name="" value="Sign In">
                                    
                                    </form>`);
                                    
            if(type == "can")
            {
                $('.login-box').append('<form action = "signup/can.php"> <input class="btn" type="submit" name="" value="Sign Up"> </form>');
            }
            else
            {
                $('.login-box').append('<form action = "signup/rec.php"> <input class="btn" type="submit" name="" value="Sign Up"> </form>');
            }
        });

    </script>
    
</body>
</html>