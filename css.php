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
        <table align="center">
        <div style="margin-top:10px;">
        <h1 style="text-align: center;">CSS</h1>
        </div>
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
                <h5 style="text-align: center;">CSS stands for Cascading Style Sheets.<br>CSS describes how HTML elements are to be displayed on screen, paper, or in other media.<br>
                CSS saves a lot of work. It can control the layout of multiple web pages all at once.</h5>
                <pre style="border:solid thin black; width:40%; margin:0 auto;">
                &lt;!DOCTYPE html&gt;
                &lt;html&gt;
                &lt;head&gt;

                &lt;style&gt;
                h1
                    {
                        text-align:center;
                        color:red;
                    }
                &lt;/style&gt;

                &lt;meta charset="UTF-8"&gt;
                    &lt;title&gt;Page Title&lt;/title&gt;
                &lt;/head&gt;
                    &lt;body&gt;

                        &lt;h1&gt;Content&lt;/h1&gt;

                    &lt;/body&gt;
                &lt;/html&gt;
                </pre>
            </div>
        </div>


        <?php include_once('footer.php'); ?>
</body>
</html>
