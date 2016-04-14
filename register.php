<?php
session_start();
include_once 'includes/dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysqli_real_escape_string($con, $_POST['uname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$upass = mysqli_real_escape_string($con, $_POST['pass']);
	$upass = md5(mysqli_real_escape_string($con, $_POST['pass']));
	
	if(mysqli_query($con, "INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
	{
		?>
        <script>alert('You successfully registered ');</script>
        <?php
	header("Location: admin-login.php");
	}
	else
	{
		?>
        <script>alert('There was an error while registering you...');</script>
        <?php
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
	<head>
		<meta name="theme-color" content="#a31929">
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Login | Code Plateau</title>
		<link rel="stylesheet" media="(min-width: 1000px)" href="css/desktopstyles.css" />
		<link rel="stylesheet" media="(max-width: 999px)" href="css/mobileview.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/modernizr.custom.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body class="cbp-spmenu-push">
    <div class="desktop-view">
        <div id="top-bar">
            <div id="logo-div"><div id="logo"><a href="index.php"><img src="images/CodePlateauTest.png" alt="Code Plateau logo desktop"width="150" height="38"></a></div></div>
            <div id="desktop-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Learn</a></li>
                <li><a href="exercise-view.php">Exercises</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </div>
        </div>
        <div id="header"></div>
        <div class="main">
		<form class="login-form" method="post"  name="login-form">
			<ul>
			    <li>
				<h2>Login</h2>
				<span class="required_notification">*Denotes required field</span>
			    </li>
			    <li>
				<label for="email">Email:</label>
				<input type="text" name="email" placeholder="Your email" required />
			    </li>
			    <li>
				<label for="name">Username:</label>
				<input type="text" name="uname" placeholder="Your username" required />
			    </li>
			    <li>
				<label for="password">Password:</label>
				<input type="password" name="pass" placeholder="Your password" required />
			    </li>
			    <li>
				<button class="submit" name="btn-signup" type="submit">Sign Me Up</button>
			    </li>
			    <li>
				<a href="admin-login.php">Already a member? Sign In Here</a>
			    </li>
			</ul>
		</form>
        </div>
        <div id="footer">
            <div id="footer-content">
                Code Plateau<br/>
                Dunwoody College of Technology
            </div>
        </div> 
    </div>
<!-- MOBILE VIEW STARTS HERE -->
    <div class="mobile-view">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <h3>Welcome!</h3>
            <a href="#">Home</a>
            <a href="#">Learn</a>
            <a href="#">Exercises</a>
            <a href="#">About Us</a>
	</nav>
		<div class="container">
			<div id="top-bar">
                            <div id="shownav"><img src="images/menu-icon.png" width="35" height="35"></div>
                            <div id="logo">
                                <a href="index.php"><img src="images/CodePlateau.png" alt="Code Plateau logo mobile" width="150" height="38"></a>
                            </div>
                        </div>
			<div id="header"></div>
			<div class="main">
                            	<form class="login-form" method="post"  name="login-form">
					<ul>
					    <li>
						<h2>Login</h2>
						<span class="required_notification">*Denotes required field</span>
					    </li>
					    <li>
						<label for="name">Username:</label>
						<input type="text" name="username" placeholder="Your username" required />
					    </li>
					    <li>
						<label for="email">Password:</label>
						<input type="password" name="pass" placeholder="Your password" required />
					    </li>
					    <li>
						<button class="submit" name="btn-login" type="submit">Submit</button>
					    </li>
					</ul>
				</form>		
			</div>
			    <div id="footer">
				<div id="footer-content">
                                    Code Plateau<br/>
                                    Dunwoody College of Technology
				</div>
			    </div>
		</div>
    </div>
		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'shownav' ),	
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
		</script>
		
		
        </div>
<!-- MOBILE CONTENT ENDS HERE -->
    </div>



</body>
</html>
