<?php include '../db.php'; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Student Login</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
		<!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="css/font-awesome.min.css" rel="stylesheet">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/templatemo-style.css" rel="stylesheet">
        <!-- Footer -->
        <link type="text/css" rel="stylesheet" href="../css/style.css">
		
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <div class="square"></div>
	          <h1>Student Login</h1>
	        </header>
	        <form  action="login.php" class="templatemo-login-form" method="POST">
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
		              	<input type="text" class="form-control" placeholder="E-mail" name="email">
		          	</div>
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
		              	<input type="password" class="form-control" placeholder="******" name="password">
		          	</div>
	        	</div>
	          	<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
						<label for="c1"><span></span>Remember me</label>
				    </div>
				</div>
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100">Login</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Not a registered user yet? <strong><a href="register.php" class="blue-text">Sign up now!</a></strong></p>
		</div>
        <div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			
		</div>
		<!--Footer-->
		<?php include 'footer.php'; ?>
	</body>
</html>






<?php
	//session_start();
	$username = $_POST['email'];
	$password  = $_POST['password'];

	if ($username&&$password)
	{
		$connect = mysqli_connect("localhost","root","","dbms") or die("Couldn't Connect");
		//mysql_select_db("placement") or die("Cant find DB");

		$query = "SELECT * FROM student WHERE email='$username'";
	$result=mysqli_query($connect,$query);
if(!$result){
		die("LOGIN FAILED".mysqli_error($connection));
	    }
	
		//$numrows = $query->num_rows;
while($row=mysqli_fetch_assoc($result)){

		$db_password=$row['password'];
		$db_email=$row['email'];

	}

	 	if($username == $db_email && $db_password===$password)
		{

					echo 'verified user';
					$_SESSION['email']=$db_email;
					$_SESSION['password']=$db_password;
					header("Location:./hello.php");

		}
 else{
				$message = "Username and/or Password incorrect.";
  			echo "<script type='text/javascript'>alert('$message');</script>";
			  echo "<center>Redirecting you back to Login Page! If not Goto <a href='index.php'> Here </a></center>";
			}
	}
	
	else
	die("Please enter Email and Password");
?>





 
