<?php
session_start();
include_once("includes/dbconnect.php");

if(!isset($_SESSION['user']))
{
	header("Location: admin-login.php");
}
else
{
		if($_SESSION['admin'] != 1)
		{
			header("Location: index.php");
		}
}
?>



<?php
if(isset($_POST['submit']))
{
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$filename= basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } 
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   //     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    mysqli_query($con,"INSERT INTO file (file_name)
									VALUES ('$filename')");
    ?>
    <script>alert("file upload successfull")</script>
<?php
}

if(isset($_POST['associate']))
{
	$exercise_id=$_POST['exercise'];
	$language_id=$_POST['language'];
    $file_id=$_POST['file'];
    echo "exercise".$exercise_id;
    echo "language".$language_id;
    echo "file".$file_id;
	if(mysqli_query($con,"insert into file_package(language_id,exercise_id,file_id) values ($language_id,$exercise_id,$file_id)"))
    {
        echo "Good job";
    }
    else
    {
        ?>
            <script>alert("YOUR SHIT IS WHACK");</script>
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
       
            
            <form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
            <form method="post">
			<div class="select">
						<select id="selectlanguage" name="language" >
							<option value="">Select language</option>
							<?php
							$result=mysqli_query($con,"Select * from language");
								while($test=mysqli_fetch_assoc($result))
								{
									$language_id=$test['language_id'];
									$language_name=$test['language_name'];

									echo "<option value='".$language_id."'>$language_name</option>";
								}
							?>
						</select>
			</div>
			<div class="select">
						<select id="selectex" name="exercise" >
							<option value="">Select exercise</option>
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
		    <div class="select">
						<select id="selectf" name="file" >
							<option value="">Select file</option>
							<?php
							$result=mysqli_query($con,"Select * from file");
								while($test=mysqli_fetch_assoc($result))
								{
									$file_id=$test['file_ID'];
									$file_name=$test['file_name'];

									echo "<option value='".$file_id."'>$file_name</option>";
								}
							?>
						
					</select>
			</div>
                <input type="submit" name="associate" value="associate" />
            </form>
		<?php
            
			include_once('logoutbutton.php');
		?>
		<a href="add-exercise.php">ADD MORE EXERCISES</a>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
    </div>
</body>
</html>
