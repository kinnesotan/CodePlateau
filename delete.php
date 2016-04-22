<?php
include_once("includes/dbconnect.php");

//get data from URL 
$id = $_GET['id'];

//query for deleting the table
$result = @mysqli_query($con, "DELETE FROM exercise WHERE exercise_id = $id");

//redirect to view page
header("Location: exercise-view.php");

?>
