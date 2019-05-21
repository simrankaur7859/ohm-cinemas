
<?php include('header.php'); ?>

				
			<?php
                   $mid =$_POST['mid'];
                  
                    $cmd="select * from movies where mid='".$mid."'";
                    $result = mysqli_query($conn, $cmd);
    
                    $row = mysqli_fetch_array($result);
                   
               
		  			date_default_timezone_set("Asia/Kolkata");
		  			$t=0;
					if(date('H')>=19)
					{
						$t=4;
					}
					else
						if(date('H')>=16)
						{
							$t=3;
						}
						else
						if(date('H')>=13)
						{
							$t=2;
						}
						else
						if(date('H')>=10)
						{
							$t=1;
						}


					?>
		  <div class="col-md-12 " style="margin-top:30px;">

		  		<form action="save.php" method="post">
			<div class="col-md-5 mid-left days" style="padding-top:0px;">
				<h4><?php echo $row[2]; ?></h4>
			<hr>
		  
		  		<input type="hidden" name="mid" value="<?php echo $row[2]; ?>">
		  		<input type="hidden" id="dt" name="dt" value="<?php echo date('d-m-Y', strtotime(' +'.$_POST['dt'].' day'))?>">
		  		<p>

		  			

		  			<span id="1" class="day text-center"><?php echo "<b>".date('d', strtotime(' +'.$_POST['dt'].' day'))."</b><br>".date('D', strtotime(' +1 day')); ?></span>
		  			

		  		</p>
					
		  		<div class="clearfix"></div>
		  		<br>
				<p>
					
					
					
					<span ><label for="t4"><?php echo $_POST['time']; ?></label></span>
					
				</p>
					
				
				
				<button type="submit" class="button shade1"><i class="fa fa-ticket fa-2x fa-fw"></i> <span>PROCEED</span></button>
				
			
			</div>

			<div class="col-md-7 seats">
				<b>Gold- Rs. 200.00</b><hr>
				<?php
				 $alpha=array("M","L","K","J","I","H","G","F","E","D","C","B","A");
					 for($i=0 ; $i<=12; $i++)
					{
						

						echo "<p><span>".$alpha[$i]."</span>";
							
							for($j=1; $j<=14; $j++)
							{

								
								if($j==7)
								{
									echo "<input type='checkbox' name='seat[]' id='".$alpha[$i].$j."' value='".$alpha[$i].$j."'><label for='".$alpha[$i].$j."' style='margin-right:70px;'>".$j."</label>";
								}
								else{
								echo "<input type='checkbox' name='seat[]' id='".$alpha[$i].$j."' value='".$alpha[$i].$j."'><label for='".$alpha[$i].$j."'>".$j."</label>";
								}
							}
							echo "</p>";
							if($alpha[$i]=="F")
							{
								echo"<b>Silver- Rs. 150.00</b><hr>";
							}
					}

				?>
					<br>	
				<h4 class="text-center">All eyes this way please!</h4>
			</div>

			</form>
			</div>
			


				<div class="clearfix"></div>

	

<?php include('footer.php'); ?>