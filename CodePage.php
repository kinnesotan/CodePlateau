<!DOCTYPE html>

<html>
<head>
    <title>Code Plateau | Learn, Practice, Excel</title>
    <link rel="stylesheet" media="(min-width: 1000px)" href="css/desktopstyles.css" />
    <link rel="stylesheet" media="(max-width: 999px)" href="css/mobileview.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/modernizr.custom.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
	
    <script>
	function showPHP() {
	    document.getElementById('php').style.display = 'block';
	    document.getElementById('java').style.display = "none";
	    document.getElementById('c').style.display = "none";
	    document.getElementById('javascript').style.display = "none";
	}
	function showJava() {
	    document.getElementById('java').style.display = "block";
	    document.getElementById('php').style.display = "none";
	    document.getElementById('c').style.display = "none";
	    document.getElementById('javascript').style.display = "none";
	}
	function showC() {
	    document.getElementById('c').style.display = "block";
	    document.getElementById('java').style.display = "none";
	    document.getElementById('php').style.display = "none";
	    document.getElementById('javascript').style.display = "none";
	}
	function showJS() {
	    document.getElementById('javascript').style.display = "block";
	    document.getElementById('java').style.display = "none";
	    document.getElementById('c').style.display = "none";
	    document.getElementById('php').style.display = "none";
	}
    </script>
</head>

<body class="cbp-spmenu-push">
    <div class="desktop-view">
        <div id="top-bar">
            <div id="logo-div"><div id="logo"><a href="index.php"><img src="images/CodePlateauTest.png" alt="Code Plateau logo desktop"width="150" height="38"></a></div></div>
            <div id="desktop-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Learn</a></li>
                <li><a href="#">Exercises</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </div>
        </div>
        <div id="header"></div>
        <div class="main">
            <div class="codeblock">
		<div class="code-button">
		    <ul >
			<li id="button1" onclick="showPHP()"><a href="#">PHP</a></li>
			<li id="button2" onClick="showJava()"><a href="#">Java</a></li>
			<li id="button3" onclick="showC()"><a href="#">C#</a></li>
			<li id="button4" onclick="showJS()"><a href="#">JavaScript</a></li>
		    </ul>
		</div>
		<div class="code">
		    <div id="php" style="display:none;" onclick="showDiv('php')">
			<code>
			    <i>/* in PHP, all variables begin with the $ sign and must be within &lt;?php ?> script tags. Varibles do not have to be declared */</i><br/><br/>
			    &lt;?php<br/>
			    $txt = "Hello world!";<br/>
			    $x = 5;<br/>
			    $y = 10.5;<br/>
			    ?>
			</code>
		    </div>
		    <div id="java" style="display:none;">
			<code>
			    <i>/* in Java, variables have to be declared by using, int, String, double, bool, etc.*/</i><br/><br/>
			    String str1 = "Welcome to Code Plateau";<br/>
			    String str2 = "Hello!";<br/>
			    int num1 = 3;<br/>
			    double dub1 = 2.0;
			</code>
		    </div>
		    <div id="c" style="display:none;">
			<code>
			     <i>/* in C#, variables have to be declared by using, int, String, double, bool, etc.*/</i><br/><br/>
			     string str1 = "Welcome to Code Plateau";<br/>
			     int num1 = 3;<br/>
			     double dub1 = 2.0;
			</code>
		    </div>
		    <div id="javascript" style="display:none;">
			<code>
			    <i>/* in JavaScript, all code must be within &lt;script> tags. Variables are declared by using 'var'*/</i><br/><br/>
			    &lt;script><br/>
			    var num1 = 2;<br/>
			    var str1 = "Skateboard"<br/>
			    &lt;/script>
			</code>
		    </div> 
		</div>
				
	    </div>
        </div>
        <div id="footer">
            <div id="footer-content">
                Code Plateau<br/>
                Dunwoody College of Technology
            </div>
        </div> 
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
                            		
			</div>
			    <div id="footer">
				<div id="footer-content">
                                    Code Plateau<br/>
                                    Dunwoody College of Technology
				</div>
			    </div>
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
