
<?php include('header.php'); ?>

	

			
		  
				<div class="clearfix"></div>

			<div class="col-md-12 mid-left">
				<h3>Upcoming Movies</h3>
				<div class="clearfix"></div>
				<br>
				
			<?php
                  
                    $cmd="select * from upmovies ORDER BY mid";
                    $result = mysqli_query($conn, $cmd);
                    
                    while($row = mysqli_fetch_array($result))
                    {
                        
                ?>      
					 
						<div class="col-md-3 up" id="<?php echo $row[0]; ?>" style="cursor:pointer" onclick="showmovie(this)">
							<div style="border:1px solid #ccc; padding:10px;">
								<img src="upcoming/<?php echo $row[5]; ?>" width="100%" >
								<br><br>
								<p><strong><?php echo $row[1]; ?></strong></p>
								<p><?php echo $row[3]; ?></p>
							</div>
						</div>
				<?php 
					}
				?>
			
			</div>
			<span id="movie"></span>
		

			<script>
				function showmovie(mov)
				{
				
				$("#movie").load('popup.php?mid='+mov.id);
				}
			</script



<?php include('footer.php'); ?>