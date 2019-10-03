<?php
session_start();
		include('connect.php');
	
	$uid =$_SESSION['uid'];
	$cp = $_POST['cp'];
	$np = $_POST['np'];

	$cmd="select uid from users_tbl where password='".$cp."' AND uid=".$uid;
	$res= mysqli_query($conn, $cmd);
	$num = mysqli_num_rows($res);
	if($num>0)
	{
		$str ="update users_tbl set password='".$np."' where uid=".$uid;
		mysqli_query($conn, $str);
		header('location:profile.php?error=000');
	}
	else
	{
		header('location:profile.php?error=111');
	}


?>