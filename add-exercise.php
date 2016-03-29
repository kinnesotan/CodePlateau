<?php
session_start();

if(isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

$con = mysqli_connect("localhost","root","", "codesite");

if(isset($_POST['btn-login']))
{
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$upass = mysqli_real_escape_string($con,$_POST['pass']);
	$res = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
	$row = mysqli_fetch_array($res);
	if (!$res)
	{
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}
	if($row>0)
	{
		$_SESSION[‘user’]= $row['user_id'];
		header("Location: index.php");
	}
	else
	{
	?>
        <script>alert('wrong details');</script>
	<?php echo "$username $upass"; ?>
        <?php
	}
	
}
if(isset($_POST['btn-post']))
{
	#DECLARE PHP VARIABLES FOR CONTENT
	$title = mysqli_real_escape_string($con,$_POST["title"]);
	$content = mysqli_real_escape_string($con,$_POST["content"]);
	$code = mysqli_real_escape_string($con,$_POST["code"]);
	$language = mysqli_real_escape_string($con,$_POST["language"]);
	
	#IF NO LANGUAGE IS SELECTED, THROW ERROR
	if($_POST["language"] == "" )
	{
		?>
		<script>alert('Please select the language for this exercise...');</script>
		<?php
	}
	else
	{
		if(mysqli_query($con,"INSERT INTO exercise(title,content,code,language) VALUES('$title','$content','$code','$language')"))
		{
			?>
			<script>alert('Your exercise was successfully entered');</script>
			<?php
			//header("Location: code-view.php");
		}
		else
		{
			echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
			?>
			<script>alert('There was an error while submitting your exercise...');</script>
			<?php
		}
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
		<title>Code Editor | Code Plateau</title>
		<link rel="stylesheet" media="(min-width: 1000px)" href="css/desktopstyles.css" />
		<link rel="stylesheet" media="(max-width: 999px)" href="css/mobileview.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/modernizr.custom.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico">
			
		 <script>
			var code = document.getElementById("editor");
			editor.getValue(code);
			
			function langMode() {
				var mode=document.getElementById("select");
				if (mode.value=="php") {
					 editor.session.setMode("ace/mode/php");
				}
				else if (mode.value=="java") {
					editor.session.setMode("ace/mode/java");
				}
				else if (mode.value=="csharp") {
					editor.session.setMode("ace/mode/csharp");
				}
				else if (mode.value=="javascript") {
					editor.session.setMode("ace/mode/javascript");
				}
				else if (mode.value=="css") {
					editor.session.setMode("ace/mode/css");
				}
				else if (mode.value=="html") {
					editor.session.setMode("ace/mode/html");
				}	
			}
			function getCode() {
				document.getElementById('code').value = editor.getValue(code);
				alert(editor.getValue(code));
			}
			
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
                <li><a href="#">Exercises</a></li>
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
					<input id="title" type="text" name="title" placeholder="Exercise title..." required />
					<input type="hidden" name="code" id="code" value="";/>
				</li>
				<li>
					<label for="content">Content:</label>
					<textarea name="content" placeholder="Enter supplemental text here..." cols="40" rows="6" required></textarea>
				</li>
				<li>
					<div class="select">
						<select id="select" name="language" onchange="langMode()">
							<option value="">Select Language</option>
							<option value="php">PHP</option>
							<option value="java">Java</option>
							<option value="csharp">C#</option>
							<option value="javascript">JavaScript</option>
							<option value="css">CSS</option>
							<option value="html">HTML</option>
							<option value="sql">SQL</option>
						</select>
					</div>
				</li>
				<li>
				<button class="submit" name="btn-post" onclick="getCode();" type="submit">Submit Exercise</button>	
				</li>
			</ul>			
			</div>
			<div class="codeblock">
<div id="editor" name="code">
<?php
echo "<pre>";

echo "</pre>";
?>
</div>
				<script src="editor/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
				<script>
				    var editor = ace.edit("editor");
				    //if the line below is set to true, the user will not be able to edit the code block
				    //editor.setReadOnly(true);
				    //this sets the theme for the editor
				    editor.setTheme("ace/theme/twilight");
				    //this is declared in the script at the top of the page
				   // editor.session.setMode("ace/mode/+language");
				</script>
			</div>
		<script>
			document.write(editor.getValue(code));
		</script>
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
