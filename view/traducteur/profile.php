
<link href="view/css/profiles.css" rel="stylesheet">

			<?php 
			if($_SESSION['id'] === $data['infos']['id'])  
			{
			?>
			<button class="btn"  style="float:right;background-color:#1abc9c" onclick="document.getElementById('editProfile').style.display='block'">Modifier Mes Informations Personnelles</button>
			<?php
			}
			?>
			<div class="container">
					<div class="row">
						<div class="col-lg-offset-2 col-lg-8">
						 <div class="well profile">
							<div class="col-sm-12">
								<div class="col-xs-12 col-sm-8">
									<h2 style="margin-bottom: 0;" >
										<?php echo $data['infos']['lastname']." ".$data['infos']['firstname']; ?>
									</h2>
									<p><strong>
										<?php echo $data['infos']['wilaya']." ".$data['infos']['commune'];?>
										</strong></p>
									<p><strong>Email: </strong>
									<?php echo $data['infos']['email']?>
									</p>
									</p>
									<p><strong>Adresse: </strong>
									<?php echo $data['infos']['adress'];?>									</p>
									</p>
				
									<p><strong>Langues: </strong>
									
									<?php if(isset($data['infos']['langue1'])) ?><span class="tags"><?php echo $data['infos']['langue1'];?></span>
									<?php if(isset($data['infos']['langue2'])) ?><span class="tags"><?php echo $data['infos']['langue2'];?></span>
									<?php if(isset($data['infos']['langue3'])) ?><span class="tags"><?php echo $data['infos']['langue3'];?></span>
									<?php if(isset($data['infos']['langue4'])) ?><span class="tags"><?php echo $data['infos']['langue4'];?></span>
									<?php if(isset($data['infos']['langue5'])) ?><span class="tags"><?php echo $data['infos']['langue5'];?></span>
									</p>
								</div>             
								<div class="col-sm-4">
									<img src="Traducteurs/1/profile_picture.jpg" alt="" class="img-circle img-responsive" style="width:40%">
									<figure>
										<?php $etoile_vide = 5 - $data['moynote'];?>
										<figcaption class="ratings">
											<p>Note
											<?php for($j=0;$j<$data['moynote'];$j++) { ?>
												<a href="#">
												<span class="fa fa-star"></span>
												</a>										
											<?php }?>
											<?php for($j=0;$j<$etoile_vide;$j++) { ?>
												<a href="#">
												<span class="fa fa-star-o"></span>
												</a>										
											<?php }?>
											</p>
										</figcaption>
									</figure> 
								</div>
							</div>            
							<div class="col-xs-12 divider text-center">
								<div class="col-xs-12 col-sm-4 emphasis">
									<h2><strong><?php echo $data['nb_traduction']?></strong></h2>                    
									<p><small>Nombre de documents traduit</small></p>
								</div>
								<div class="col-xs-12 col-sm-4 emphasis">
									<h2><strong><?php echo $data['moynote']?></strong></h2>    
									               
									<p><small>Moyenne des<br>notes</small></p>
								</div>
								<div class="col-xs-12 col-sm-4 emphasis">
									<h2><strong><?php echo $data['nbdemande']?></strong></h2>             
									<p><small>Nombre demandes de <br>traductions</small></p>
								</div>
							</div>
						 </div>               
						</div>
					</div>
				</div>
		<div class="container">
				<div class="row">
					<div class="col-lg-offset-2 col-lg-8"">
					 <div class="well profile">
						<div class="col-sm-12">
							<?php
							$i = 1;
							if($data['traductions'])
							{
							foreach ($data['traductions'] as $traduction) {
							?>
							<div class="col-xs-12 col-sm-8">
								<h2 style="margin-bottom: 0;" >Traduction <?php echo $i;?> </h2>
								<p><strong>Algerie,Alger</strong></p>
								<p><strong>Type de Traduction: </strong>
									<?php echo $traduction['type']; ?>
								</p>
								<p><strong>Prix: </strong>
									<?php echo $traduction['prix']; ?>
								</p>
								<p><strong>Langue Origine: </strong>
									<span class="tags"><?php echo $traduction['devis']['langue_s'];?></span> 
									<strong> Cible: </strong>
									<span class="tags"><?php echo $traduction['devis']['langue_d'];?></span>
								</p>
							</div>             
							<div class="col-xs-12 col-sm-4 text-center">
								<figure>
									<?php $etoile_vide = 5 - $traduction['note'];?>
									<figcaption class="ratings">
										<p>Note
										<?php for($j=0;$j<$traduction['note'];$j++) { ?>
											<a href="#">
											<span class="fa fa-star"></span>
											</a>										
										<?php }?>
										<?php for($j=0;$j<$etoile_vide;$j++) { ?>
											<a href="#">
											<span class="fa fa-star-o"></span>
											</a>										
										<?php }?>
										</p>
									</figcaption>
								</figure>
							</div>
							<?php
							$i++;
							}
							}
							?>
						</div>   
					</div>
				</div>
			</div>



			<div class="container">
					<div class="row">
						<div class="col-lg-offset-2 col-lg-8">
						 <div class="well profile">
							<div class="col-sm-12">
								<div class="col-xs-12 col-sm-8">
									<p><strong>Cv: </strong>
									<?php echo $data['infos']['email']?>
									</p>
									</p>
									<p><strong>Documents references : </strong>
									<?php echo $data['infos']['adress'];?>									</p>
									</p>
									<p><strong>Document assermentation : </strong>
									<?php echo $data['infos']['adress'];?>									</p>
									</p>
								</div>             
							</div>            
						 </div>               
						</div>
					</div>
				</div>


				<div id="editProfile" class="sign" style="display:none">
				<form class="sign-content" method="POST" action="?p=editProfile">
					<span onclick="document.getElementById('editProfile').style.display='none'" class="sign-close" >&times;</span>
					<div class="sign-container">
					<div class="row">	
						<div class="col-xs-6 col-md-6">
						<h1>Modifier</h1>
						</div>
					</div>
					<div class="row">
							<div class="col-xs-6 col-md-6">
								<input required type="text" name="lastname"  class="form-control input-lg"  value="<?php echo $data['infos']['lastname'];?>"  />
							</div>
							<div class="col-xs-6 col-md-6">
								<input required type="text" name="firstname"  class="form-control input-lg" value="<?php echo $data['infos']['firstname']?>" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-md-6">
								<input  required type="number" name="tel"  class="form-control input-lg" value="<?php echo $data['infos']['tel']?>"  />
							</div>
							<div class="col-xs-6 col-md-6">
								<input required type="number" name="fax"  class="form-control input-lg" value="<?php echo $data['infos']['fax']?>" />
							</div>
						</div>
						<input  type="password" name="password"  class="form-control input-lg" placeholder="Mot de Passe*"  /><input type="password" name="rpassword"  class="form-control input-lg" placeholder="Confirmer Mot de Passe*"  /> 
						<br/>		
						<div class="row">
							<div class="col-xs-6 col-md-6">
							<button type="button" onclick="document.getElementById('editProfile').style.display='none'" class="sign-cancelbtn">Annuler</button>
							</div>
							<div class="col-xs-6 col-md-6">
							<button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Enregistrer</button>  
							</div>
						</div>
					</div>
				</form>
						</div>