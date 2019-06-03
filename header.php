<?php
  session_start();
  include('connect.php');
?>
<html>
<head>

	<title>OHM CINEMA</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="col-md-1 navbar-fixed-top left">
		<p style="margin-top:70px;" class="active"><a href="index.php"><i class="fa-fw fa-3x fa fa-home"></i>HOME</a></p>
		<p><a href="index.php"><i class="fa-fw fa-3x fa fa-youtube-play"></i>MOVIES</a></p>
		<p><a href="ticket.php"><i class="fa-fw fa-3x fa fa-ticket"></i>TICKET</a></p>
		
		<p><a href="contact.php"><i class="fa-fw fa-3x fa fa-envelope"></i>CONTACT</a></p>

	</div>

	<div class="col-md-11 col-md-offset-1 right">
			<div class="col-md-12 top-bar" style="z-index:2">
			      <div class="col-md-3">
			      	<!-- <h3>OHM CINEMA</h3> -->
			      <a href="index.php">	<img src="images/logo.png" width="100"></a>
			      </div>
			      <div class="col-md-6 ">
			      	<form>
				      	<input type="text" placeholder="Search" class="search"><button  class="srch"><i class="fa fa-search"></i></button>
			      	</form>
			      </div>

			      <div class="col-md-3">
					<?php
						if(!isset($_SESSION['uid']))
						{
					?>
			      	<span class="btn link" id="login" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Sign In</span>
			      	<span class="btn link" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user-plus"></i> Sign Up</span>
			    		<?php
						}
						else
						{
							$cmd = "select name from users_tbl where uid=".$_SESSION['uid'];
							$res  = mysqli_query($conn, $cmd);
							$row  = mysqli_fetch_array($res);
						?>
						<a class="btn link" href="profile.php"><i class="fa fa-user"></i> <?php echo strtoupper($row['name']); ?></a>
						<a class="btn link" href="logout.php"><i class=" fa fa-sign-out"></i> LOGOUT</a>
			     		<?php		
						}
					?>	
			      </div>
			</div>
			
			<div class="clearfix"></div>