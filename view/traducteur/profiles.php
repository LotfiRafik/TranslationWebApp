<link href="view/css/profiles.css" rel="stylesheet">
	<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
					<?php
					foreach ($data as $t) {
					?>
					 <div class="well profile">
							<div class="col-sm-12">
								<div class="col-xs-12 col-sm-8">
									<h2 style="margin-bottom: 0;" >
										<?php echo $t['lastname']." ".$t['firstname']; ?>
									</h2>
									<p><strong>
										<?php echo $t['wilaya']." ".$t['commune'];?>
										</strong></p>
									<p><strong>Email: </strong>
									<?php echo $t['email']?>
									</p>
									</p>
									<p><strong>Adresse: </strong>
									<?php echo $t['adress'];?>									</p>
									</p>
				
									<p><strong>Langues: </strong>
									
									<?php if(isset($t['langue1'])) ?><span class="tags"><?php echo $t['langue1'];?></span>
									<?php if(isset($t['langue2'])) ?><span class="tags"><?php echo $t['langue2'];?></span>
									<?php if(isset($t['langue3'])) ?><span class="tags"><?php echo $t['langue3'];?></span>
									<?php if(isset($t['langue4'])) ?><span class="tags"><?php echo $t['langue4'];?></span>
									<?php if(isset($t['langue5'])) ?><span class="tags"><?php echo $t['langue5'];?></span>
									</p>
								</div>             
								<div class="col-sm-4">
									<img src="Traducteurs/1/profile_picture.jpg" alt="" class="img-circle img-responsive" style="width:80%">
								</div>
							</div>            
							<div class="col-xs-12 text-center">
								<div class="col-sm-4">
									<a href="?p=traducteurprofile&id=<?php echo $t['id'];?>" style="text-decoration: none;">
										<button class="btn btn-info btn-block">
										<span class="fa fa-user"></span> Voir Profile</button>
									</a>
								</div>
						</div>
						 </div> 
					 <?php
					}
					?>               
					</div>
				</div>
			</div>
</body>
</html>