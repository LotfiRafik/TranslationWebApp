<link href="view/profiles/profiles.css" rel="stylesheet">
<link href="view/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="view/css/font-awesome.min.css" rel="stylesheet">
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
								<p><strong>About: </strong>
									Web Designer / UI.Read, out with friends, listen to musi.
								</p>
								<p><strong>Langues: </strong>
									<span class="tags">Arabe</span> 
									<span class="tags">Francais</span>
									<span class="tags">Anglais</span>
								</p>
							</div>             
							<div class="col-xs-12 col-sm-4 text-center">
								<figure>
									<img src="view/profiles/traducteur_pictures/0.jpg" alt="" class="img-circle img-responsive">
									<figcaption class="ratings">
										<p>Ratings
										<a href="#">
											<span class="fa fa-star"></span>
										</a>
										<a href="#">
											<span class="fa fa-star"></span>
										</a>
										<a href="#">
											<span class="fa fa-star"></span>
										</a>
										<a href="#">
											<span class="fa fa-star"></span>
										</a>
										<a href="#">
											 <span class="fa fa-star-o"></span>
										</a> 
										</p>
									</figcaption>
								</figure>
							</div>
						</div>            
						<div class="col-xs-12 divider text-center">
							<div class="col-xs-12 col-sm-4 emphasis">
								<h2><strong> 20,7K </strong></h2>                    
								<p><small>Nombre de documents traduit</small></p>
							</div>
							<div class="col-xs-12 col-sm-4 emphasis">
								<h2><strong>245</strong></h2>                    
								<p><small>Moyenne des<br>notes</small></p>
								<a href="?p=traducteurprofile&id=<?php echo $t['id'];?>" style="text-decoration: none;">
									<button class="btn btn-info btn-block">
									<span class="fa fa-user"></span> Voir Profile</button>
								</a>
							</div>
							<div class="col-xs-12 col-sm-4 emphasis">
								<h2><strong>43</strong></h2>                    
								<p><small>Quelque choses</small></p>
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