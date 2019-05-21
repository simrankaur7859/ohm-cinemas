<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
	</head>
<body>

	<div class="col-md-6 col-md-offset-3 login">
		<div class="col-md-4 text-center">
			<i class="fa fa-user-secret fa-5x"></i>
			<h4>OHM CINEMA PANEL</h4>
			<h1>SIGN IN</h1>
			
		</div>
		<div class="col-md-8 text-center">
            <form action="verify.php" method="post">
				<p><input name="username" type="text" placeholder="User Name" required></p>
				<p><input name="password" type="password" placeholder="Password" required></p>
				<p><input type="submit" value="Sign In" class="button"></p>
			</form>
			<p>
				<?php
					if(isset($_GET['error']))
					{
						echo "Incorrect username or password!";
					}
				?>
			</p>
		</div>

	</div>


    <p class="footer"></p>
</body>
</html>