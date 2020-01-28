<link href="view/forms/form2.css" rel="stylesheet">
<link href="view/css/tableaustyle.css" rel="stylesheet">
<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>
<style>
	.infoDevis,.infoDemande
	{
		display: none; /* Hidden by default */
		padding : 10px;
		position: fixed; /* Stay in place */
		background-color:white;
		z-index: 1; /* Sit on top */
		top: 8%;
		left : 15%;
		height: 70%; /* Full height */
		width:60%;
		overflow-y: auto; /* Enable scroll if needed */overflow-x:hidden;
		border : 1px black solid;
	}
</style>

		<div class="col-md-11">
			<a href="?p=deconnexion"><button class="btn btn-danger pull-right btn-lg">Déconnexion</button></a>

			<a href="?p=traducteurprofile&id=<?php echo $_SESSION['id']?>"><button class="btn btn-lg pull-right btn-success">Mon Profile</button></a>
			<br>
			<h3>Liste des demandes de Devis</h6>
			<div class="ttable">
			<table class="table">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis ID</th>
			<th scope="col">Langue Source</th>
			<th scope="col">Langue Cible</th>
			<th scope="col">Date</th>
			<th scope="col">Offre soumit</th>
			</tr>
		</thead>
		<tbody id="devis_table" >
			<?php
		if($data['listDevis'])
		{	
			foreach ($data['listDevis'] as $devis)
			{
			?>
			<tr style="cursor: pointer ; " class="lien" >
				<th scope="row"><?php echo $devis['id'] ?></th>
				<td><?php echo $devis['langue_s'] ?></td>
				<td><?php echo $devis['langue_d'] ?></td>
				<td><?php echo $devis['date'] ?></td>
				<?php
						if($devis['offre'])
						{
					?>
							<td><i class="glyphicon glyphicon-ok" style="color:green"></i></td>
					<?php	
						}
						else
						{
						?>
							<td><i class="glyphicon glyphicon-remove" style="color:red"></i></td>
						<?php
						}
					?>
			</tr>
			<?php
			}
		}
			?>
		</tbody>
		</table>
		</div>

		<?php
			$i = 0;
			if($data['listDevis'])
			{
			foreach ($data['listDevis'] as $devis)
			{
			?>
			<div class="infoDevis" id="infoDevis<?php echo $i?>">
				<button class="retourOffre pull-right btn-danger" type="button">x</button>	
				<h3>Informations Devis</h3>
				<div class="row">
					<div class="col-xs-3 col-md-3">
					Nom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['nom'] ?>">						
					</div>
					<div class="col-xs-3 col-md-3">
					Prenom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['prenom'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
					Email:<input type="text"  class="form-control input"  readonly placeholder="<?php echo $devis['email'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
					Téléphone:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['tel'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-md-3">
					Adresse:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['adresse'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						Langue Source:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_s'] ?>"></div>
					<div class="col-xs-3 col-md-3">
						Langue Cible:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_d'] ?>"></div>
					<div class="col-xs-3 col-md-3">
						Type Traduction:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['traduction_type'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-md-3">
						Traducteur Assermente:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['assermente'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						Commentaire:<textarea type="text"  class="form-control input" readonly placeholder="<?php echo $devis['comment'] ?>"></textarea>
					</div>
					<div class="col-xs-3 col-md-3">
						Date :<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['date'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						<br><i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank" href="?p=downDevis&did=<?php echo $devis['id']?>">Document_A_Traduire</a>
					</div>
				</div>
					<br>
					<?php
						if($devis['offre'])
						{?>
							<h3>L'offre soumit a cet devis:</h3>
							<div class="row">
								<div class="col-xs-6 col-md-6">
								<label>Prix en dinar algérien:</label><input type="number"  class="form-control input"  readonly placeholder="<?php echo $devis['offre']['prix'] ?>">
								</div>
								<div class="col-xs-6 col-md-6">
								<label>Date:</label><input type="text" readonly  class="form-control input"  placeholder="<?php echo $devis['offre']['date'] ?>">
								</div>
							</div>
						<?php
						}
						else{
						?>
							<form  id="sendOffre" method="post" action="?p=addOffreDevis">
							<div class="row">
								<div class="col-xs-6 col-md-6">
									<label>Prix en dinar algérien:</label><input  class="form-control input"  type="number" name="prix" min="50" required> 
									(L'offre minimal est a 50 DZD)
								</div>
								<div class="col-xs-6 col-md-6">
									<br><input type="submit" class="btn btn-primary" value="Envoyer l'offre " />
								</div>
							</div>				
							<input type="hidden" name="devis_id" value=<?php echo $devis['id']?>>
							</form>
						<?php
						}
						?>
			</div>
			<?php
			$i++;
			}
		}
			?>



<h3>Liste des demandes de Traduction</h6>
			<div class="ttable">
			<table class="table">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis ID</th>
			<th scope="col">Langue Source</th>
			<th scope="col">Langue Cible</th>
			<th scope="col">Date</th>
			<th scope="col">Traité</th>
			</tr>
		</thead>
		<tbody id="demande_table">
			<?php
		if($data['listDevis'] != false)
		{	
			foreach ($data['listDevis'] as $devis)
			{
				if($devis['demandeTrad'])
				{
					?>
					<tr style="cursor: pointer ; " class="lien" >
						<th scope="row"><?php echo $devis['id'] ?></th>
						<td><?php echo $devis['langue_s'] ?></td>
						<td><?php echo $devis['langue_d'] ?></td>
						<td><?php echo $devis['date'] ?></td>
					<?php
						if($devis['traduction'])
						{
					?>
							<td><i class="glyphicon glyphicon-ok" style="color:green"></i></td>
					<?php	
						}
						else
						{
						?>
							<td><i class="glyphicon glyphicon-remove" style="color:red"></i></td>
						<?php
						}
					?>
					</tr>
					<?php
				}
			}
		}
			?>
		</tbody>
		</table>
		</div>

		<?php
			$i = 0;
			if($data['listDevis'])
			{
			foreach ($data['listDevis'] as $devis)
			{
				if($devis['demandeTrad'])
				{
			?>
			<div class="infoDemande" id="infoDemande<?php echo $i?>">
				<button class="retourDemande pull-right btn-danger" type="button">x</button>	
				<h3>Informations sur la demande de traduction :</h3>
					<div class="row">
						<div class="col-xs-3 col-md-3">
						Nom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['nom'] ?>">						
						</div>
						<div class="col-xs-3 col-md-3">
						Prenom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['prenom'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
						Email:<input type="text"  class="form-control input"  readonly placeholder="<?php echo $devis['email'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
						Téléphone:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['tel'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-md-3">
						Adresse:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['adresse'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
							Langue Source:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_s'] ?>"></div>
						<div class="col-xs-3 col-md-3">
							Langue Cible:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_d'] ?>"></div>
						<div class="col-xs-3 col-md-3">
							Type Traduction:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['traduction_type'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-md-3">
							Traducteur Assermente:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['assermente'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
							Commentaire:<textarea type="text"  class="form-control input" readonly placeholder="<?php echo $devis['comment'] ?>"></textarea>
						</div>
						<div class="col-xs-3 col-md-3">
							Date :<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['date'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
							<br><i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank" href="?p=downDevis&did=<?php echo $devis['id']?>">Document_A_Traduire</a>
						</div>
					</div>
					<br>
					<?php
					if($devis['traduction'])
					{	
						?>
						<div class="row">
							<div class="col-xs-8 col-md-8">
								<h3>Feedback du client :</h3>
								<label>Note:</label><input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['traduction']['note'] ?>">
							</div>
						</div>
						<?php 
						if($devis['signalement'])
						{
						?>
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<h3>Informations Signalement :</h3>
								<div class="row">
									<div class="col-md-6">
										<label>Description</label>:<textarea class="form-control input" type="text" readonly placeholder="<?php echo $devis['signalement']['description'] ?>"></textarea>
									</div>
									<div class="col-md-6">
										<label>Date</label><input class="form-control input" type="text" readonly placeholder="<?php echo $devis['signalement']['date']?>">
									</div>
								</div>
							</div>
						</div>
						<?php
						}
						else
						{
						?>		
						<div class="row">			
							<div class="col-xs-4 col-md-4 ">
								<h3>Signaler ce client :</h3>
								<form  method="post" action="?p=signaler">
									<input type="hidden" name="devis_id" value=<?php echo $devis['id']?>>
									<div class="row">
										<div class="col-xs-12 col-md-12">
											<textarea required type="text" name="description" placeholder="Explique la raison du signalement ?"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-12">
											<input type="submit"  class="btn btn-danger"  value="Signaler" />
										</div>
									</div>	
								</form>
							</div>
						</div>
					<?php	
						}
					}
					else {
							?>
							<form  id="sendTraduction" method="post" action="?p=sendTraduction" enctype='multipart/form-data'>
							<input type="hidden" name="devis_id" value=<?php echo $devis['id']?>>
							<div class="row">
								<div class="col-xs-6 col-md-6">
									<label>Document traduit :</label><input type="file"  class="form-control input" name="document" required>
								</div>
								<div class="col-xs-6 col-md-6">
									<br><input type="submit"  class="btn btn-primary" value="Rendre la traduction" />
								</div>
							</div>
							</form>	
						<?php					
						}
					?>
			</div>
			<?php
				}
				$i++;
			}
		}
			?>

<script type="text/javascript" src="view/js/traducteur_home.js"></script>


