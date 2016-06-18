<?php
	include 'dbconnect.php';
	$query6="DELETE FROM leavedetail WHERE srno=".$_POST['srno'];
	mysqli_query($conn,$query6);
	header('location:myLeaves.php');
?>
