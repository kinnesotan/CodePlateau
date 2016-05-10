<?php
session_start();
include_once("includes/dbconnect.php");

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
if(isset($_POST['btn-post']))
{
	#DECLARE PHP VARIABLES FOR CONTENT
	$title = mysqli_real_escape_string($con,$_POST["title"]);
	$content = mysqli_real_escape_string($con,$_POST["content"]);




		if(mysqli_query($con,"INSERT INTO concept(concept_name,concept_text) VALUES('$title','$content')"))
		{
			?>
			<script>alert('Your concept was successfully entered');</script>
			<?php
			header("Location: exercise-view.php");
		}
		else
		{
			?>
			<script>alert('There was an error while submitting your concept...');</script>
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
		<title>Concept Editor | Code Plateau</title>
		<link rel="stylesheet" media="(min-width: 1000px)" href="css/desktopstyles.css" />
		<link rel="stylesheet" media="(max-width: 999px)" href="css/mobileview.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/modernizr.custom.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico">
			
	</head>
	<body class="cbp-spmenu-push">
    <div class="desktop-view">
        <?php include_once('header.php'); ?>
	
	<!-- main page content begins here: Code editor, content, exercises, etc. -->
        <div class="concept-main">
		<!-- Select the type of language for the user to enable in the code block -->
		<!-- Code editor starts here -->
		<form method="post" class="exercise-form" name="exercise-form">
			
			<ul>
				<li>
					<label for="title">Title:</label>
					<input id="title" type="text" name="title" placeholder="Concept title..." required />
					<input type="hidden" name="code" id="code" value="";/>
				</li>
				<li>
					<label for="content">Content:</label>
					<textarea name="content" placeholder="Enter supplemental text here..." cols="40" rows="6" required></textarea>
				</li>
				<li>
				<button class="submit" name="btn-post" type="submit">Submit Concept</button>	
				</li>
			</ul>			
		</form>
		<!-- Code editor ends here -->
	</div>
	<!-- main page content ends here -->
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
				<!-- Select the type of language for the user to enable in the code block -->
		<div class="select">
			<select id="select" onchange="langMode()">
				<option>Select Language</option>
				<option value="php">PHP</option>
				<option value="java">Java</option>
				<option value="csharp">C#</option>
				<option value="javascript">JavaScript</option>
				<option value="css">CSS</option>
				<option value="html">HTML</option>
				<option value="sql">SQL</option>
			</select>
		</div>
		

			<label for="support_file">File Name:</label>
			<input id="support_file" type="text" name="title" placeholder="File Name"></input>
				<!-- Code editor starts here -->
		<div class="codeblock">	
			
			
		</div>
		<!-- Code editor ends here -->
                            		
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
