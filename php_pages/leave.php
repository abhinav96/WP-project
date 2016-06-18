<?php
	include 'dbconnect.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$type=$_POST['type'];
	
	$from=$_POST['from'];
	$to=$_POST['to'];
	$appto=$_POST['appto'];

		$query3="INSERT INTO leavedetail (sender,receiver,start,last,type,status) VALUES('".$_SESSION['suser']."','".$appto."','".$from."','".$to."','".$type."','Pending')";
		$result3= mysqli_query($conn,$query3);
		header('location:myLeaves.php');
	}
	else{
		header("location:application.php");
	}	


?>