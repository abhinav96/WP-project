<?php
	include 'dbconnect.php';
?>
<link href='https://fonts.googleapis.com/css?family=Lato:400,900' rel='stylesheet' type='text/css'>
<div id="navbar">
		<nav>
			<ul>
				<?php
					if(isset($_SESSION['suser'])){
						echo'<a href="../php_pages/application.php"><li>Home</li></a>';
					}
					else{
						echo'<a href="../php_pages/logform.php"><li>Home</li></a>';
					}
				?>
				<a href="#"><li>About</li></a>
				<a href="#"><li>Contact Us</li></a>
				<?php
					
					if(isset($_SESSION['suser']) && isset($_SESSION['spwd'])){
						echo'	<a href="../php_pages/logout.php"><li>Logout</li></a>';
				}
				?>
			</ul>
		</nav>
</div>