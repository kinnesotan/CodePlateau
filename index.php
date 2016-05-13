<?php
session_start();
include_once("includes/dbconnect.php");
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
        <div class="main">
            <div class="logo-styles">
                <div class="lan-image-1"><a href="c-sharp.php"><img src="images/csharp.png" width="100" height="100" alt="C# logo"></a></div>
                <div class="lan-image-2"><a href="javascript.php"><img src="images/javascript.png" width="100" height="100" alt="JavaScript logo"></a></div>
                <div class="lan-image-3"><a href="php.php"><img src="images/php.png" width="100" height="100" alt="PHP logo"></a></div>
            </div>
            <div class="logo-styles">
                <div class="lan-image-1"><a href="sql.php"><img src="images/sql.png" width="100" height="100" alt="SQL logo"></a></div>
                <div class="lan-image-2"><a href="html5.php"><img src="images/html.png" width="100" height="100" alt="HTML logo"></a></div>
                <div class="lan-image-3"><a href="css.php"><img src="images/css.png" width="100" height="100" alt="CSS logo"></a></div>
            </div>
        </div>
        <?php include_once('footer.php'); ?>
    </div>
<!-- MOBILE VIEW STARTS HERE -->
    <div class="mobile-view">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <h3>Welcome!</h3>
            <a href="#">Home</a>
            <a href="#">Learn</a>
            <a href="#">Exercises</a>
            <a href="#">About Us</a>
	</nav>
		<div class="container">
			<div id="top-bar">
                            <div id="shownav"><img src="images/menu-icon.png" width="35" height="35"></div>
                            <div id="logo">
                                <a href="index.php"><img src="images/CodePlateau.png" alt="Code Plateau logo mobile" width="150" height="38"></a>
                            </div>
                        </div>
			<div id="header"></div>
			<div class="main">
                            <div class="logo-styles">
                                <div class="lan-image-1"><a href="#"><img src="images/csharp.png" width="100" height="100" alt="C# logo"></a></div>
                                <div class="lan-image-2"><a href="#"><img src="images/javascript.png" width="100" height="100" alt="JavaScript logo"></a></div>
                            </div>
                            <div class="logo-styles">
                                <div class="lan-image-1"><a href="#"><img src="images/php.png" width="100" height="100" alt="PHP logo"></a></div>
                                <div class="lan-image-2"><a href="#"><img src="images/sql.png" width="100" height="100" alt="SQL logo"></a></div>
                            </div>
                            <div class="logo-styles">
                                <div class="lan-image-1"><a href="#"><img src="images/html.png" width="100" height="100" alt="HTML logo"></a></div>
                                <div class="lan-image-2"><a href="#"><img src="images/css.png" width="100" height="100" alt="CSS logo"></a></div>
                            </div>		
			</div>
            
			    <?php include_once('footer.php'); ?>
		</div>
    </div>
		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'shownav' ),	
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
		</script>
		
		
        </div>
<!-- MOBILE CONTENT ENDS HERE -->
    </div>



</body>
</html>
