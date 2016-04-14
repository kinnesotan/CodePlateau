<?php
session_start();
include_once("includes/dbconnect.php");

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$id = $_REQUEST['id'];
$result = mysqli_query($con,"SELECT exercise_id, title, content, language, code FROM exercise WHERE exercise_id = $id");


if($row = mysqli_fetch_array($result, MYSQLI_NUM))
{
	// This can be enabled to make sure SQL is running when the page starts
	?>
	<script>//alert("SQL ran successfully")</script>
	<?php
}
else
{
	?>
	<script>alert("There was an error gettings the exercise")</script>
	<?php
}
if(isset($_POST['btn-post']))
{
	header("Location: exercise-view.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
	<head>
		<meta name="theme-color" content="#a31929">
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Code Viewer | Code Plateau</title>
		<link rel="stylesheet" media="(min-width: 1000px)" href="css/desktopstyles.css" />
		<link rel="stylesheet" media="(max-width: 999px)" href="css/mobileview.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/modernizr.custom.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico">
			
		<script>
			var lang = '<?php echo $row[3]; ?>';
		</script>
	</head>
	<body class="cbp-spmenu-push">
    <div class="desktop-view">
        <div id="top-bar">
            <div id="logo-div"><div id="logo"><a href="index.php"><img src="images/CodePlateauTest.png" alt="Code Plateau logo desktop"width="150" height="38"></a></div></div>
            <div id="desktop-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Learn</a></li>
                <li><a href="exercise-view.php">Exercises</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </div>
        </div>
        <div id="header"></div>
	
	<!-- main page content begins here: Code editor, content, exercises, etc. -->
        <div class="main">
		<!-- Select the type of language for the user to enable in the code block -->
		<!-- Code editor starts here -->
		<form method="post" class="exercise-form" name="exercise-form">
			<div id="exercise-text">
			<ul>
				<li>
					<label for="title">Title:</label>
						<?php echo '<input type="text" id="input-text" name="title" value="'.$row[1].'" readonly />'; ?>
					<input type="hidden" name="code" id="code" value="";/>
				</li>
				<li>
					<label for="content">Content:</label>
					<textarea name="content" placeholder="Enter supplemental text here..." cols="40" rows="6" readonly>
<?php echo $row[2]; ?>
					</textarea>
					
				</li>
				<li>
					<h1>Language: <?php echo strtoupper($row[3])?></h1>
				</li>
				<li>
					<button class="submit" name="btn-post" type="submit">Go back to exercises</button>
				</li>
			</ul>
			</div>
			<div class="codeblock">
<div id="editor" name="code">
<!-- PHP codeblock to display in code editor -->
<?php echo '<pre>'. htmlspecialchars($row[4]) . '</pre>'; ?>
</div>
				<script src="editor/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
				<script>
					var editor = ace.edit("editor");
					//if the line below is set to true, the user will not be able to edit the code block
					editor.setReadOnly(true);
					//this sets the theme for the editor
					editor.setTheme("ace/theme/twilight");
					//editor.session.setMode("ace/mode/php");
					//this is declared in the script at the top of the page
				       // editor.session.setMode("ace/mode/+language");
				       if (lang=="php") {
					    editor.session.setMode("ace/mode/php");
				       }
				       else if (lang=="java") {
					       editor.session.setMode("ace/mode/java");
				       }
				       else if (lang=="csharp") {
					       editor.session.setMode("ace/mode/csharp");
				       }
				       else if (lang=="javascript") {
					       editor.session.setMode("ace/mode/javascript");
				       }
				       else if (lang=="css") {
					       editor.session.setMode("ace/mode/css");
				       }
				       else if (lang=="html") {
					       editor.session.setMode("ace/mode/html");
				       }
				</script>
			</div>
		</form>
		<!-- Code editor ends here -->
	</div>
	<!-- main page content ends here -->
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
