
<?php include('header.php'); ?>

	
			<div class="col-md-8 col-md-offset-2"  id="error">
				
			</div>

			<div class="col-md-8 col-md-offset-2 login">
				<div class="col-md-5" style="padding:140px 15px;">
					<h4>Don't have an account?</h4>
					<br>
					<h1>Sign Up</h1>
				</div>

				<div class="col-md-7" >
				<form action="register.php" method="post" autocomplete="off">	
					<p> <input name="name" type="text" placeholder="Name" required pattern="[a-z, A-Z]{3,}" title="Enter a valid name"></p>
					<p> <input name="mobile" type="text"  id="mob" placeholder="Mobile Number" maxlength="10" required pattern="[0-9]{10}" title="Enter a valid mobile number"></p>
					<p> <input name="email" type="email"   placeholder="Email Address" required></p>
					<p> <input name="password" type="password" placeholder="Password" required></p>
					<p> <input type="submit" class="button" value="REGISTER"></p>
					<br>
					<p class="text-center"><b>Have an account? <a href="login.php" style="color:#f84713;">Sign In</a></b></p>
				</form>	
				</div>

			</div>
		
	<?php
		if(isset($_GET['error']))
		{
			echo "<script> alert('Sorry! try after some time.'); </script>";
		}
	?>
<?php include('footer.php'); ?>