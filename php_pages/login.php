<?php
		include 'dbconnect.php';
		
		if($conn){
			$uid=$_POST['userid'];
			$pwd=$_POST['password'];
			$_SESSION['error']='false';
			$sql= "SELECT * FROM logindetail WHERE userid='$uid' and password='$pwd'";
			$result= mysqli_query($conn,$sql);
			$row= mysqli_fetch_assoc($result);
			$count=mysqli_num_rows($result);
			
			if($count==1)
				{
					$_SESSION['suser']=$row['userid'];
					$_SESSION['spwd']=$row['password'];
					header("location:application.php");
					
				}
			else{	
					$_SESSION['error']='true';	
					header("location:../php_pages/logform.php");
				}
		}
		else {
			die("connection failed:".mysqli_connect_error());
		}
?>