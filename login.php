
<?php include('header.php'); ?>

	

			<div class="col-md-8 col-md-offset-2 login">
				<div class="col-md-5">
					<h4>Book your ticket now!</h4>
					<br>
					<h1>Sign In</h1>
				</div>

				<div class="col-md-7">
				<form action="check.php" method="post">	
					<br>
					<p> <input name="mobile" type="text" id="mob" placeholder="Mobile Number" maxlength="10" required pattern="[0-9]{10}" title="Enter a valid mobile number"></p>
					<p> <input name="password" type="password" placeholder="Password" required></p>
					<p> <input type="submit" class="button" value="SIGN IN"></p>
					<br>
					<p class="text-center"><b>Don't have an account? <a href="signup.php" style="color:#f84713;">Register Now</a></b></p>
					<br>
					<p class="text-center text-danger">
							<?php
							if(isset($_GET['error']))
							{
								echo "Incorrect mobile number or password.";
							}
						    ?> 
					</p>
				</form>
				</div>

			</div>
		

<?php include('footer.php'); ?>