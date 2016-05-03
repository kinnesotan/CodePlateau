<?php
		session_start();
		
		session_destroy();
		unset($_SESSION['user']);
		?>
			<script>alert("Logout successful")</script>
		<?php
		header("Location: index.php");
?>