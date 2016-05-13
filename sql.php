<?php
session_start();
include_once("includes/dbconnect.php");
	#$result = mysqli_query($con,"SELECT language_id WHERE language = '$lang' ");
	#while($test = mysqli_fetch_array($result))
	$lang = "";

?>
<!DOCTYPE html>

<html>
<head>
    <title>Code Plateau | Learn, Practice, Excel</title>
    <link rel="stylesheet" media="(min-width: 1000px)" href="css/desktopstyles.css" />
    <link rel="stylesheet" media="(max-width: 999px)" href="css/mobileview.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/modernizr.custom.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body class="cbp-spmenu-push">
    <div class="desktop-view">
        <?php include_once('header.php'); ?>
        <div style="margin-top:10px;">
        <h1 style="text-align: center;">SQL</h1>
        </div>
        <table align="center">
        <th>Exercise Name</th>
        <?php
        $result=mysqli_query($con, "select exercise.exercise_name, support-package.package_id, exercise.excercise_id from exercise inner join support-package on support-package.exercise_id=exercise.exercise_id where language_id=$lang ");
                while($test=($result))
                {
                    $pack=$test['support-package.package_id'];
                    echo "<tr>";
                    echo "<td><a href='userex.php?=".$pack."'>$exercise.exercise_name</a></td>";
                    echo "</tr>";
                }
        ?>
        </table>
        </div>
        <div id="code-container" style="">
            <div id="code">
                <h5 style="text-align: center;">SQL stands for Structured Query Language. SQL is used to communicate with a database.<br>According to ANSI (American National Standards Institute),<br>it is the standard language for relational database management systems.</h5><br>
                <pre style="border:solid thin black; width:40%; margin:0 auto;">
                    SQL Select Syntax:
                    SELECT column_name,column_name
                    FROM table_name;

                    SQL INSERT INTO Syntax:
                    INSERT INTO table_name
                    VALUES (value1,value2,value3,...);                  
                </pre>
            </div>
        </div>


        <?php include_once('footer.php'); ?>
</body>
</html>
