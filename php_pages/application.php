<!DOCTYPE html>
<html> 
	<head>
		<title>
			Apply for leave!
		</title>
		<link rel="stylesheet" type="text/css" href="../css/default.css">
		<link rel="stylesheet" type="text/css" href="../css/appform.css">
	</head>
	<body>
		<?php
			include '../php_pages/navbar.php';
			include '../php_pages/sessioncheck.php';
		?>	
		<div class="blackBox">
			<div class="greyBox">
				<form id="form" method="POST" action="../php_pages/leave.php">
					<table>
						<tr>
							<td>
								<label for="type">Type of leave:</label>
							</td>
							<td>
								<select name="type" id="type">
									<option value="Casual">Casual</option>
									<option value="Sick">Sick</option>
									<option value="Maternity">Maternity</option>
									<option value="Hospital">Hospital</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="applyTo">Apply to:</label>
							</td>
							<td>
								<select name='appto' id="applyTo"> 
									<?php 
										$query1="SELECT * FROM userdetail WHERE userid='".$_SESSION['suser']."'";
										$result1=mysqli_query($conn,$query1);
										$row1=mysqli_fetch_assoc($result1);
										$myHierarchy=$row1['hierarchy']	;
										$myBranch=$row1['branch'];

										$query2="SELECT * FROM userdetail WHERE hierarchy < ".$myHierarchy." AND branch = '".$myBranch."'";
										$result2=mysqli_query($conn,$query2);
										
										if($myHierarchy==3){
											echo '<option>Principal</option>';
											echo '<option>Vice Principal</option>';
										}

										while($row2=mysqli_fetch_assoc($result2)){
											$receiverID=$row2['userid'];
											echo "<option value='".$receiverID."'>".$row2['fname']."</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="from">From:</label>	
							</td>
							<td>
								<input type="date" name="from" id="from">
							</td>
						</tr>
						<tr>
							<td>
								<label for="to">To:</label>
							</td>
							<td>
								<input type="date" name="to" id="to">
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;" id="error">
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<input type="submit" value="Apply" name="apply">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<nav id="menu">
				<?php
					if($myHierarchy<5)
					{
						echo '<ul>
						<a href="myLeaves.php"><li>MY LEAVES</li></a>
						<a href="staffLeaves.php"><li>STAFF LEAVES</li></a>
						</ul>';
					}
					else{
						echo '<ul>
						<a href="myLeaves.php"><li>MY LEAVES</li></a>
						</ul>';	
					}
				?>
			</nav>
		</div>
	</body>
</html>