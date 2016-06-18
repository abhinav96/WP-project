<?php
	include 'dbconnect.php';
	
	if(isset($_POST['accept'])){
		$query5="UPDATE leavedetail SET status='approved' WHERE srno='".$_POST['srno']."'";
		$result5=mysqli_query($conn,$query5);
	}
	else if(isset($_POST['reject'])){
		$query5="UPDATE leavedetail SET status='rejected' WHERE srno='".$_POST['srno']."'";
		$result5=mysqli_query($conn,$query5);	
	}
	header('location:staffLeaves.php');
?>
