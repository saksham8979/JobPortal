<?php
    include ("connections.php");
	if(isset($_POST['func'])){
		$p = $_POST['func'];
	}
	else{
        echo "Unauthorized Access!";
	    die();
    }
    
    if($p == "login"){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $result = mysqli_query($conn, "select * from users where email='$email' and password='$pass'") or die(mysqli_error($conn));
        if (mysqli_num_rows($result) == 1)
        {
            $user_row = mysqli_fetch_array($result);
            $_SESSION['id'] = $user_row['id'];
            header('Location:'.$APP_URL.'dashboard');
            die();
        }
        else
        {
            header('Location:'.$APP_URL.'index.php?err=invalid');
            die();
        }
    }
    
    if($p == "signup_can"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $chk_user = mysqli_query($conn, "select * from users where email='$email'") or die(mysqli_error($conn));
	    if (mysqli_num_rows($chk_user) == 0){
	        $query = "insert into users(name, email, password, role) values( '$name', '$email', '$pass', 2 )";
	        if (mysqli_query($conn, $query) or die(mysqli_error($conn))){
                header('Location:'.$APP_URL.'signup/can.php?msg=done');
				die();
	        }
	    }
	    else{
            header('Location:'.$APP_URL.'signup/can.php?msg=exist');
            die();
	    }
    }
    
    if($p == "signup_rec"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $chk_user = mysqli_query($conn, "select * from users where email='$email'") or die(mysqli_error($conn));
	    if (mysqli_num_rows($chk_user) == 0){
	        $query = "insert into users(name, email, password, role) values( '$name', '$email', '$pass', 1 )";
	        if (mysqli_query($conn, $query) or die(mysqli_error($conn))){
                header('Location:'.$APP_URL.'signup/rec.php?msg=done');
				die();
	        }
	    }
	    else{
            header('Location:'.$APP_URL.'signup/rec.php?msg=exist');
            die();
	    }
    }
?>