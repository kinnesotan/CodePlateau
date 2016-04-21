<?php
session_start();
include_once("includes/dbconnect.php");

if(!isset($_SESSION['user']))
{
	header("Location: admin-login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
	<head>
		<meta name="theme-color" content="#a31929">
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>View All Exercises | Code Plateau</title>
		<link rel="stylesheet" media="(min-width: 1000px)" href="css/desktopstyles.css" />
		<link rel="stylesheet" media="(max-width: 999px)" href="css/mobileview.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/modernizr.custom.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body class="cbp-spmenu-push">
    <div class="desktop-view">
        <?php include_once('header.php'); ?>
        <div class="main">
		<table  class="table" style="margin-bottom: 20px; margin-top: 20px;"  align="center" border="1">
			<form method="post">
				<?php
					echo "<th>Exercise Title</th>";
					echo "<th>Language</th>";
					echo "<th>View Exercise</th>";
					echo "<th>Remove Exercise</th>";
					echo "<th>Edit Exercise</th>";
					$result = mysqli_query($con,"SELECT * FROM exercise ORDER by exercise_id");
					while($test = mysqli_fetch_array($result))
					{
					    $langname = $test["language"];
					    $id = $test['exercise_id'];
					    echo "<tr align='center'>";
					    echo "<td>". $test['title']. "</td>";
					    echo "<td>". strtoupper($langname). "</td>";
					    //View exercise
					    echo "<td><a href='code-view.php?id=$id'>View</a></td>";
					    //Delete records
					    echo "<td><a href='delete.php?id=$id'>Remove</a></td>";
					    //Edit records
					    echo "<td><a href='code-edit.php?id=$id'>Edit</a></td>";
					    echo "</tr>";
					}
				?>
			</form>
		</table>
		<?php
			include_once('logoutbutton.php');
		?>
        </div>
        <?php include_once('footer.php'); ?>
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
			    <?php include_once('footer.php'); ?>
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
