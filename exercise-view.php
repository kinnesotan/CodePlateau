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
		<table  class="table" style="margin-bottom: 20px; margin-top: 20px;"  align="center" border="1">
			<form method="post">
				<?php
					echo "<th>Exercise Title</th>";
					echo "<th>Language</th>";
					echo "<th>Support File</th>";
					echo "<th>View Exercise</th>";
					echo "<th>Remove Exercise</th>";
					echo "<th>Edit Exercise</th>";
					$result = mysqli_query($con,"SELECT * FROM exercise ORDER by exercise_id");
					while($test = mysqli_fetch_array($result))
					{
					    $langname = $test["language"];
					    $file_name = $test["support_file"];
					    $id = $test['exercise_id'];
						
						$newResult = mysqli_query($con, "SELECT * FROM support_package where exercise_id = $id");
						$newTest = mysqli_fetch_array($newResult);
						$langid = $newTest['language_id'];
						
						$resultNew = mysqli_query($con, "SELECT * FROM language where language_id = $langid");
						$testNew = mysqli_fetch_array($resultNew);
						$langname = $testNew['language_name'];
						
					    echo "<tr align='center'>";
					    echo "<td>". $test['title']. "</td>";
					    echo "<td>". strtoupper($langname). "</td>";
					    echo "<td>". strtoupper($file_name). "</td>";
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
		<a href="add-exercise.php">ADD MORE EXERCISES</a>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
    </div>
</body>
</html>
