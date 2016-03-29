<?php
require_once("includes/db_connection.php");

//get data from URL 
$id = $_GET['id'];

//query for deleting the table
$result = @mysql_query("DELETE FROM exercise WHERE exercise_id = $id);

//redirect to view page
header("Location: exercise-view.php");


?>
