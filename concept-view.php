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
				<form method="get">
				<?php
						$result = mysqli_query($con,"SELECT * FROM concept ORDER by concept_id");
						while($test = mysqli_fetch_array($result))
						{
								$conid = $test['concept_id'];
								echo "<h3 style='text-align: center'>". $test['concept_name']. "</h4>";
								echo "<table  class='table' style='margin-bottom: 20px; margin-top: 20px;'  align='center' border='1'>";
								echo "<th>Exercise Title</th>";
								echo "<th>Exercise Language</th>";
								echo "<th>View Exercise</th>";
								echo "<th>Remove Exercise</th>";
								echo "<th>Edit Exercise</th>";
								$conceptQ = mysqli_query($con, "SELECT * FROM concept_exercise WHERE concept_id = $conid");
								while($fetch = mysqli_fetch_array($conceptQ))
								{
										echo "<tr align='center'>";
										$exerciseid = $fetch['exercise_id'];
										$exerciseQ = mysqli_query($con, "SELECT * FROM exercise WHERE exercise_id = $exerciseid");
										$exerciseR = mysqli_fetch_array($exerciseQ);
										$exerciseName = $exerciseR['title'];
										
										$langQ = mysqli_query($con, "SELECT * from support_package WHERE exercise_id = $exerciseid");
										$langR = mysqli_fetch_array($langQ);						
										$langid = $langR['language_id'];
										$newLangQ = mysqli_query($con,"SELECT * FROM language WHERE language_id = $langid");
										$newLangR = mysqli_fetch_array($newLangQ);
										$langName = $newLangR['language_name'];
										echo "<td>$exerciseName</td>";
										echo "<td>".strtoupper($langName)."</td>";
										echo "<td><a href='code-view.php?id=$exerciseid'>View</a></td>";
										//Delete records
										echo "<td><a href='delete.php?id=$exerciseid'>Remove</a></td>";
										//Edit records
										echo "<td><a href='code-edit.php?id=$exerciseid'>Edit</a></td>";
										echo "</tr>";
								}
								echo "</table>";
						}
				?>
			</form>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
    </div>
</body>
</html>
