<?php
session_start();
include_once("includes/dbconnect.php");

/*
$lanQuery = mysqli_query("SELECT * FROM langauge");
$lanRes = mysqli_fetch_array($lanQuery);
*/
if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
if(isset($_POST['btn-post']))
{
    
	#DECLARE PHP VARIABLES FOR CONTENT
	//$author = $_SESSION['user'];
	//$title = mysqli_real_escape_string($con, $_POST['title']);
	$exercise= $_POST['exercise'];
	//$content = mysqli_real_escape_string($con, $_POST['content']);
	$code = mysqli_real_escape_string($con, $_POST['code']);
	$lang = mysqli_real_escape_string($con, $_POST['language']);
	$concept = $_POST['concept'];
	$lvl = $_POST['lvl'];

    $query = mysqli_query($con, "Select language_id from language where language_name = '$lang'");
	$res = mysqli_fetch_array($query);
	$language = $res['language_id'];



	#IF NO LANGUAGE IS SELECTED, THROW ERROR
	if($_POST["language"] == "" )
	{
		?>
		<script>alert('Please select the language for this exercise...');</script>
		<?php
	}
	else
	{
		if(mysqli_query($con, "INSERT INTO support_package(language_id, exercise_id ,content) values ('$language', '$exercise', '$code')"))
		{
			//$result= mysqli_query($con, "Select * from exercise where exercise_id>0 order by exercise_id desc limit 1");
			//$row=mysqli_fetch_array($result);
			//$maxid = $row['exercise_id'];
			/*
			if(mysqli_query($con, "INSERT INTO concept_exercise(concept_id, exercise_id) VALUES($concept, $maxid) "))
			{
				?>
						<script>alert('You successfully submitted your concept exercise...');</script> 
				<?php
			}
			else
			{
				?>
						<script>alert('There  was an error while submitting your concept exercise...');</script> 
				<?php
			}
			
			if(mysqli_query($con, "INSERT INTO support_package(language_id, exercise_id ,content) values ('$language', '$maxid', '$code')"))
			{
				?>
						<script>alert('You successfully submitted your support exercise...');</script> 
				<?php
			}
			else
			{
				?>
						<script>alert('There  was an error while submitting your support package...');</script> 
				<?php
			} */
			?>
			<script>alert('Your exercise was successfully entered');</script>
			<?php
			//header("Location: concept-view.php");
		}
		else
		{
			/*
			echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
			var_dump($_FILES); */
			?>
			<script>alert('There  was an error while submitting your exercise...');</script> 
			<?php
		}
	}
/*
	
	$support_file = mysqli_real_escape_string($con,$_POST["support_file"]);
	$file=$_FILES["file"]["name"];
	$size= $_FILES["file"]["size"];
	
*/	
 
//Checking if 'image name' entered and 'File attachment' has been done.
/*if( empty($iname) || empty($file))
{
	echo "<label class='err'>All field is required</label>";
}
	
// Checking the File Size. Maximum allowed size: 500,000 bytes (500 kb)	
elseif($size >500000)
{
	echo "<label class='err'> Image size must not greater than 500kb </label>";
}

*/
	
/* -- Few preparations for Checking 
         the File Type (extension) -- */

//Store the allowed extensions in an array	
//$allowedExts = array("gif", "jpeg", "jpg", "png"); 

/* using explode() function, separate the 'File Name' 
and its 'Extension' into individual elements of an array: $temp */
//$temp = explode(".", $_FILES["file"]["name"]); 

/* The end() function returns the last element iof an array.
As per array $temp, First element: File name 
					 Last element: Extension */	
//$extension = end($temp); 

/* -- Checking the File Type (extension) -- */	
/*if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/txt")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] <= 500000)
&& in_array($extension, $allowedExts)) */
/* The in_array() searches for a specific value in an array.
Here, searches for $extension value in $allowedExts array */
//{ 
/*If file is of allowed extension type, then further 
 validations for file are processed. */
	
	
	
// Checks if any error
/*if ($_FILES["file"]["error"] > 0) 
  {
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } 

//Checks if the specific file already exists in the directory.		  
elseif (file_exists("upload/" . $_FILES["file"]["name"])) 
  {
	echo $_FILES["file"]["name"] . "Image upload already exist. ";
  } 
*/
/* On passing all validations, the file is moved from 
temporary location to the directory. */
//else
  //{
    /* The move_uploaded_file() function moves an 
	    uploaded file to a new location. */
	//move_uploaded_file ( $_FILES["file"]["tmp_name"],
	//				     "upload/" . $_FILES["file"]["name"] );
						 
	// Insert the 'Image name' and 'File Name' to the database					 
	//mysqli_query($con,"INSERT INTO Amalan (iname, filename)
	/*								VALUES ('$iname', '$file')");
									
	echo "Data Entered Successfully Saved!";
   }
} 
mysqli_close($con); //Close the Database Connection
*/

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
				var mode = document.getElementById("selectlang");
				
				/*
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
				*/
			}
			function getCode() {
				document.getElementById('code').value = editor.getValue(code);
				//if you enable the code below, it alerts the code being entered
				//into the database for reference
					//alert(editor.getValue(code));
			}
			
		</script>
	</head>
	<body class="cbp-spmenu-push">
    <div class="desktop-view">
        <?php include_once('header.php'); ?>
	
	<!-- main page content begins here: Code editor, content, exercises, etc. -->
        <div class="main">
		<!-- Select the type of language for the user to enable in the code block -->
		<!-- Code editor starts here -->
		<form method="post" class="exercise-form" name="exercise-form" action="add-language.php">
			<div id="exercise-text">
			<ul>
				
				<li>
					<div class="select">
						<select id="selectlang" name="language" onchange="langMode()">
							<option value="">Select Language</option>
							<?php
								$result=mysqli_query($con,"Select * from language ORDER by language_name");
								while($test=mysqli_fetch_assoc($result))
								{
									//$language_id=$test['language_id'];
									$language_name=$test['language_name'];
									$call_language = $test['call_language'];

									echo "<option value='".$language_name."'>" .strtoupper($language_name). "</option>";
								}
							  ?>
						</select>
					</div>
				</li>
				<li>
					<div class="select">
						<select id="selectexercise" name="exercise" >
							<option value="">Select Exercise</option>
							<?php
							$result=mysqli_query($con,"Select * from exercise");
								while($test=mysqli_fetch_assoc($result))
								{
									$exercise_id=$test['exercise_id'];
									$title=$test['title'];

									echo "<option value='".$exercise_id."'>$title</option>";
								}
							?>
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
        <?php include_once('footer.php'); ?>
    </div>
<!-- MOBILE VIEW STARTS HERE 
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
				Select the type of language for the user to enable in the code block
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
				 Code editor starts here 
		<div class="codeblock">	
			
			
		</div>
		<!-- Code editor ends here 
                            		
			</div>
			    <div id="footer">
				<div id="footer-content">
                                    Code Plateau<br/>
                                    Dunwoody College of Technology
				</div>
			    </div>
		</div>
    </div>
		 Classie - class helper functions by @desandro https://github.com/desandro/classie 
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
