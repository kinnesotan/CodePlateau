<?php
session_start();
include_once("includes/dbconnect.php");
?>
<div id="top-bar">
            <div id="logo-div"><div id="logo"><a href="index.php"><img src="images/CodePlateauTest.png" alt="Code Plateau logo desktop"width="150" height="38"></a></div></div>
            <div id="desktop-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="concept-view.php">Exercise Manager</a></li>
                <li><a href="add-exercise.php">Add Exercises</a></li>
				<li><a href="concepts.php">Add Concepts</a></li>
				<li><a href="upload.php">Add Files</a></li>
                <?php
                
                if(!isset($_SESSION['user']))
                {
                     echo "<li><a href='admin-login.php'>Login</a></li>";                       
                }
                else
                {
					 echo "<li><a href='logout.php?logout'>Log out</a></li>";  
                }
                ?>
            </ul>
            </div>
</div>
<div id="header"></div>