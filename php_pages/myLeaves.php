<?php
	include '../php_pages/navbar.php';
	include '../php_pages/sessioncheck.php';
	$query1="SELECT * FROM userdetail WHERE userid='".$_SESSION['suser']."'";
	$result1=mysqli_query($conn,$query1);
	$row1=mysqli_fetch_assoc($result1);
	$myHierarchy=$row1['hierarchy']	;
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>My leaves!</title>
		<link rel="stylesheet" type="text/css" href="../css/default.css">
		<link rel="stylesheet" type="text/css" href="../css/myLeaves.css">
	</head>
	<body>
		<div class="blackBox">
			<div class="greyBox">
				<?php
					if($_SERVER['REQUEST_METHOD']=='POST'){
						switch ($_POST['sort']) {
								case 'all':
									$query4="SELECT * FROM leavedetail WHERE sender='".$_SESSION['suser']."' ORDER BY srno DESC";
									break;
								case 'accepted':
									$query4="SELECT * FROM leavedetail WHERE sender='".$_SESSION['suser']."' AND status='approved' ORDER BY srno DESC";
									break;
								case 'rejected':
									$query4="SELECT * FROM leavedetail WHERE sender='".$_SESSION['suser']."' AND status='rejected' ORDER BY srno DESC";
									break;
								case 'pending':
									$query4="SELECT * FROM leavedetail WHERE sender='".$_SESSION['suser']."' AND status='Pending' ORDER BY srno DESC";
									break;
						}
					}
					else{
						$query4="SELECT * FROM leavedetail WHERE sender='".$_SESSION['suser']."' ORDER BY srno DESC";
					}
						$result4= mysqli_query($conn,$query4);
						if(mysqli_num_rows($result4)==0){
							echo "<h>No entries as of now</h>";
						}
						else{
						echo '
						<form method="POST" id="filter">
							<select name="sort">
								<option value="all">All</option>
								<option value="accepted">Accepted</option>
								<option value="rejected">Rejected</option>
								<option value="pending">Pending</option>
							</select>
							<input type="submit" value="Filter">
						</form>
						<table border="2" id="table" align="center">
						<tr>
							<th>Type of leave</th>
							<th>From</th>
							<th>To</th>
							<th>Applying to</th>
							<th>Status</th>';
							if($_SERVER['REQUEST_METHOD']=='POST'){
								if($_POST['sort']=='accepted' || $_POST['sort']=='rejected'){}
								else{
									echo'<td>Cancel Leave</td>';
								}
							}
							else{
							echo'<th>Cancel Leave</th>';
							}
						echo '</tr>';
						while($row4= mysqli_fetch_assoc($result4))
						{
							$srno=$row4['srno'];
							$s = $row4['status'];
							echo '<tr> 
									<td>'.$row4['type'].'</td>
									<td>'.$row4['start'].'</td>
									<td>'.$row4['last'].'</td>
									<td>'.$row4['receiver'].'</td>
									<td>'.$row4['status'].'</td>';
									if($s == 'Pending'){
										echo '
									<form action="cancelLeave.php" method="POST">
										<td><input type= "submit" name="cancel" value="Cancel"></td>
										<input type="hidden" name="srno" value='.$srno.'>
									</form>';
								}
								echo '</tr>';
						}
						echo '</table>';
					}
				?>
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