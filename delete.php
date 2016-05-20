<?php
include_once("includes/dbconnect.php");

//get data from URL 
$id = $_GET['id'];

//query for deleting the table
/*$result = @mysqli_query($con, "DELETE FROM exercise WHERE exercise_id = $id");
$result2 = @mysqli_query($con, "DELETE FROM file_package WHERE exercise_id = $id");
$result3 = @mysqli_query($con, "DELETE FROM support_package WHERE exercise_id = $id");
$result4 = @mysqli_query($con, "DELETE FROM concept_exercise WHERE exercise_id = $id");
*/
mysqli_query($con,"UPDATE exercise SET deleted =1 WHERE exercise_id = $id");
mysqli_query($con,"UPDATE support_package SET deleted =1 WHERE exercise_id = $id");
//redirect to view page
header("Location: concept-view.php");

?>
