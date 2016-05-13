<?php

if (isset($_REQUEST['submit'])) 
{
	$con=mysqli_connect("localhost", "root", "", "codesite");
	var_dump($filename);
	if (mysqli_connect_errno()) 
	{ echo "NOPE" . mysqli_connect_errno(); }
	
	$filename=$_POST['filename'];
	$file = $_FILES["file"]["name"];
	$size=$_FILES["file"]["size"];

//Checking if 'image name' entered and 'File attachment' has been done.
if(empty($filename))
{ echo "<label class='err'>All field is required</label>"; }

elseif($size >5000000000)
{ echo "<label class='err'> Image size must not greater than 500kb </label>"; }

$allowedExts = array("php", "cs", "html", "js", "css", "sql"); 

$temp = explode(".", $_FILES["file"]["name"]); 

$extension = end($temp); 

/* -- Checking the File Type (extension) -- */	


if ($_FILES["file"]["error"] > 0) 
  {
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } 

//Checks if the specific file already exists in the directory.		  
elseif (file_exists("upload/" . $_FILES["file"]["name"])) 
  {
	echo $_FILES["file"]["name"] . "God Help Us. ";
  }

else
  {
    /* The move_uploaded_file() function moves an 
	    uploaded file to a new location. */
	move_uploaded_file ( $_FILES["file"]["tmp_name"],
					     "file/" . $_FILES["file"]["name"] );
						 
	// Insert the 'Image name' and 'File Name' to the database					 
	mysqli_query($con,"INSERT INTO file(file_name)
									VALUES('$filename')");
	header("location:exercise-upload.php");
   }
}
mysqli_close($con); //Close the Database Connection



?>