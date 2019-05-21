<?php
session_start();
		include('connect.php');	

		$mobile = $_POST['mobile'];
		$password = $_POST['password'];

		$cmd = "select * from users_tbl where mobile='".$mobile."' AND password='".$password."'";
		$res = mysqli_query($conn, $cmd);
		$num = mysqli_num_rows($res);
		

		if($num>=1)
		{
			$row  = mysqli_fetch_array($res);
			$_SESSION['uid']=$row['uid'];
				if(isset($_SESSION['log']))
				{
					unset($_SESSION['log']);
					 $_SESSION['name'] = $row['name'];
					  $_SESSION['mobile'] = $row['mobile'];
					  $_SESSION['email'] = $row['email'];
					header('location:checkout.php');
				}
				else
				{
			     header('location:index.php');
			 	}
		}
		else
		{
				if(isset($_SESSION['log']))
				{
					header('location:login.php?error=000');
				}
				else
				{
			     header('location:index.php?error=000');
			 	}
			
		}


?>		