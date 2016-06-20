<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/logform.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css">
</head>
<body>
	<?php
		include '../php_pages/navbar.php';
		if(isset($_SESSION['suser'])){
		header('location:application.php');
	}
	?>
	<div class="blackBox">
		<p id="heading">LEAVE APPLICATION MADE EASY.</p>
		<p id="description">
			Apply for leave without having to leave your seat with just a few clicks.
		</p>
		<div id="login">
			<p>Login To Get Started!</p>
			<form method="POST" action="../php_pages/login.php" id='loginform'>
			<table>
				<tr>
					<td>
						<label for="email">Email:</label>
					</td>
					<td>
						<input type="email" id="email" name="userid" placeholder="example@ves.ac.in" required autofocus>
					</td>
				</tr>
				<tr>
					<td>
						<label for="pwd">Password:</label>
					</td>
					<td>
						<input type="Password" id="pwd" name="password" placeholder="Password" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" id="error" style="text-align: center;">
						<?php
							if(isset($_SESSION['error'])){
								if($_SESSION['error']=='true'){
									echo 'Invalid EmailID or Password.';
									$_SESSION['error']='false';
								}
							}
						?>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<input type="Submit" value="Login">
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	<script src="../javascript/jquery-3.0.0.js"></script>
	<script type="text/javascript" src="../javascript/logformjs.js"></script>
</body>
</html>
