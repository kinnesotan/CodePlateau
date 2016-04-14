<?php
session_start();

if(!isset($_SESSION['user']))
{
	//header("Location: index.php");
	?>
		<script>alert("Log out not successful")</script>
	<?php
}
else if(isset($_SESSION['user'])!="")
{
	//header("Location: index.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
	?>
		<script>alert("Logout successful")</script>
	<?php
	header("Location: index.php");
}
?>