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
if(isset($_POST['associate']))
{
	$exercise_id=$_POST['exercise'];
	$concept_id=$_POST['concept'];

	mysqli_query($con,"insert into concept_exercise(concept_id,exercise_id) values ($exercise_id,$concept_id)");
}
if(isset($_POST['add']))
{
	$concept=$_POST['newconcept'];


	mysqli_query($con,"insert into concept(concept_name) values ('$concept')");
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
        <div class="main" style="text-align: center;">
        <h2>Associate an exercise with a concept</h2>
		<form method="post">
			<div class="select">
						<select id="selectconcept" name="concept" >
							<option value="">Select Concept</option>
							<?php
							$result=mysqli_query($con,"Select * from concept");
								while($test=mysqli_fetch_assoc($result))
								{
									$concept_id=$test['concept_id'];
									$concept_name=$test['concept_name'];

									echo "<option value='".$concept_id."'>$concept_name</option>";
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
					<input class="submit" type="submit" name="associate" value="Associate" />
		</form></br>
		<h2>Add a new concept</h2>
		<form method="post">
		<input type="text" name="newconcept">
		<input class="submit" type="submit" value="Add Concept" name="add">

		</form>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
    </div>
</body>
</html>
