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
        <div>
            <div class="select">
                <select id="selectlang" name="language" onchange="langMode()">
                    <option value="">Select Language</option>
                    <?php
                        $result=mysqli_query($con,"Select * from language");
                        while($test=mysqli_fetch_assoc($result))
                        {
                            $language_id=$test['language_id'];
                            $language_name=$test['language_name'];

                            echo "<option value='".$language_name."'>$language_name</option>";
                        }
                      ?>
                </select>
            </div>
            <div class="select">
                <select id="selectconcept" name="concept" onchange="langMode()">
                    <option value="">Select Concept</option>
                    <?php
                    $result=mysqli_query($con,"Select * from concept");
                        while($test=mysqli_fetch_assoc($result))
                        {
                            $concept_id=$test['concept_id'];
                            $concept_name=$test['concept_name'];

                            echo "<option value='".$concept_id."'>$concept_name</option>";
                        }
                    ?>
                </select>
            </div>
            <form action="form_upload.php" method="post" enctype="multipart/form-data">
                <td><input type="text" name="filename" placeholder="NAME YOUR FILE JERK"></td>
                <td><input type="file" name="file"></td>
                <td><input type="submit" name="submit" value="UPLOAD"></td>                     
                </form>
                </tr>
            </form>
        </div>
        <?php
			include_once('logoutbutton.php');
		?>
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
