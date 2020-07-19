<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Saksham Johri">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
    <link rel="stylesheet" href="../css/login-page.css">
    <link rel="stylesheet" href="../css/find-job.css">
</head>
<body>
    <div class="header">
        <div class="inner-header">
            <div class="logo-container">
                <h1>MY <span>SITE</span> </h1>
            </div>

            <div class="navigation">
                <a href="../index.php"><li>Home</li></a>
            </div>
        </div>
    </div>
    <div class="login-box">
        <?php
            if(isset($_GET['msg']) && $_GET['msg']=='done'){
        ?>
        <h1 style="border:none;">Signed Up Successfully !</h1> <form action="../index.php"> 
            <input class="btn" type="submit" value="Back To Home">
            </form>
        <?php
                }else{
        ?>
        <h1>SignUp Recruiter</h1>
        <?php
        if(isset($_GET['msg']) && $_GET['msg']=='exist'){
        ?>
        <h2 style="border:none; font-size: 25px">User Already Exist !</h2>
                <?php } ?>
        <form id="signup" method="post" action="../functions.php">
            <input type="hidden" name="func" value="signup_rec">
            <div class="textbox">
                <i class="fa fa-user"></i>
                <input type="text" placeholder = "Enter Your Full Name" name = "name" required>
            </div>

            <div class="textbox">
                <i class="fa fa-envelope"></i>
                <input type="email" placeholder = "Enter Your E-mail" name = "email" required>
            </div>

            <div class="textbox">
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Enter Your Password" name="pass" required>
            </div>
            
            <input class="btn" type="submit" name="" value="Sign Up">
        </form>
        <?php
    }
?>
    </div>
</body>
</html>