	<div class="clearfix"></div>
	<!-- footer -->
			<div class="col-md-12 footer" id="footer">
				<p>All Rights Reserved @ OHMCINEMA.COM</p>
			</div>

	</div>  <!-- right end -->


	 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="border-radius:0; ">
        <div class="modal-header" style="border-bottom:1px solid #f84713; color:#f84713">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h1 class="modal-title">Sign In</h1>
          <h4>Book your ticket now!</h4>
        </div>
        <div class="modal-body">
          <form action="check.php" method="post">	
					<br>
					<p> <input name="mobile" type="text" id="mob" placeholder="Enter Your Mobile Number" maxlength="10" required pattern="[0-9]{10}" title="Enter a valid mobile number"></p>
					<p> <input name="password" type="password" placeholder="Enter Password" required></p>
					<p> <input type="submit" class="button" value="SIGN IN"></p>
					<br>
					<!-- <p class="text-center"><b>Don't have an account? <a href="signup.php" style="color:#f84713;">Register Now</a></b></p> -->
					<br>
					<p class="text-center text-danger">
							<?php
							if(isset($_GET['error1']))
							{
								echo "Incorrect mobile number or password.";
							}
						    ?> 
					</p>
					<br>
					<p class="text-center text-info"><strong>Don't have an account? <span style="cursor:pointer" data-dismiss="modal" data-toggle="modal" data-target="#myModal1">Sign Up</span></strong></p>
				</form>
        </div>
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>

 <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="border-radius:0; ">
        <div class="modal-header" style="border-bottom:1px solid #f84713; color:#f84713">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h1 class="modal-title">Sign Up</h1>
          <h4>Don't have an account?</h4>
        </div>
        <div class="modal-body">
          <form action="register.php" method="post" autocomplete="off">	
					<p> <input name="name" type="text" placeholder="Name" required pattern="[a-z, A-Z]{3,}" title="Enter a valid name"></p>
					<p> <input name="mobile" type="text"  id="mob1" placeholder="Mobile Number" maxlength="10" required pattern="[0-9]{10}" title="Enter a valid  mobile number"></p>
					<p> <input name="email" type="email"   placeholder="Email Address" required></p>
					<p> <input name="password" type="password" placeholder="Password" required pattern=".{6,}" title="Password length must be 6 or more"></p>
					<p> <input type="submit" class="button" value="REGISTER"></p>
					<br>
					<!-- <p class="text-center"><b>Have an account? <a href="login.php" style="color:#f84713;">Sign In</a></b></p> -->
				</form>	
        </div>
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>


			<?php
				if(isset($_GET['error1']))
				{
			?>
				<script> document.getElementById('login').click(); </script>
			<?php		
				}
		    ?> 	
  	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>