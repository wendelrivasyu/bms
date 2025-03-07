<?php
	
	include_once '../Connection/connection.php';
	
	if (isset($_POST['login'])){
		
		//variable
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		//sql statement
		$sql = "SELECT * FROM user_tb WHERE user_username = '$username' && user_password = '$password'";
		
		//query statement
		$query = mysqli_query($conn, $sql);
		
		//get if there is a return value of 1
		if (mysqli_num_rows($query) > 0){
			//if found
			
			//get data for session and assign session
			$data = mysqli_fetch_array($query);
			
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['user_name'] = $data['user_fullname'];
			
			//redirect to admin page
			echo "<script>window.location.href='../ors/?page=index';</script>";
		}else{
			//return with error msg
			echo "<script>window.location.href='../authentication?msg=Invalid Username or Password!';</script>";
		}
	}
	
?>