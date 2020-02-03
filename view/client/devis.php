<link href="view/css/tableaustyle.css" rel="stylesheet">
<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>
<style>
	.infoOffre,.infoTraduction,.traducteurs,.infoSignalement
	{
		display: none; /* Hidden by default */
		padding : 10px;
		position: fixed; /* Stay in place */
		background-color:white;
		z-index: 1; /* Sit on top */
		top: 20%;
		left : 30%;
		height: 50%; /* Full height */
		width : 30%;
		overflow-y : auto;overflow-x:hidden;
		border : 1px black solid;
	}
</style>

		<div class="col-md-12">
		<a class="pull-right" href="?p=deconnexion"><button class="btn btn-lg btn-danger">Déconnexion</button></a>
			<a class="pull-right" href="../profiles/client_profile.html"><button class="btn btn-lg btn-info">Mon Profile</button></a><br>
			<div  style="background-color:white;">
			<h3>Informations Devis</h3>
				<div class="row">
					<div class="col-xs-3 col-md-3">
					Nom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['nom'] ?>">						
					</div>
					<div class="col-xs-3 col-md-3">
					Prenom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['prenom'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
					Email:<input type="text"  class="form-control input"  readonly placeholder="<?php echo $data['devis']['email'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
					Téléphone:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['tel'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-md-3">
					Adresse:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['adresse'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						Langue Source:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['langue_s'] ?>"></div>
					<div class="col-xs-3 col-md-3">
						Langue Cible:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['langue_d'] ?>"></div>
					<div class="col-xs-3 col-md-3">
						Type Traduction:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['traduction_type'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-md-3">
						Traducteur Assermente:<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['assermente'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						Commentaire:<textarea type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['comment'] ?>"></textarea>
					</div>
					<div class="col-xs-3 col-md-3">
						Date :<input type="text"  class="form-control input" readonly placeholder="<?php echo $data['devis']['date'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						<br><i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank" href="?p=downDevis&did=<?php echo $data['devis']['id']?>">Document_A_Traduire</a>
					</div>
				</div>
			</div>



			<h3>Liste des Traducteurs</h6>
			<div class="ttable">
				<table class="table">
					<thead  style ="background-color:#5BC0DE;"class="entet">
						<tr>
						<th scope="col">Traducteur ID</th>
						<th scope="col">Nom</th>
						<th scope="col">Prenom</th>
						<th scope="col">Email</th>
						<th scope="col">Demande Envoyée</th>
						<th scope="col"></th>
						</tr>
					</thead>
					<tbody id="traducteur_table">
						<?php
						if($data['devis']['traducteurs'] )
						{
							foreach ($data['devis']['traducteurs'] as $traducteur)
							{
							?>
							<tr style="cursor: pointer ; " class="lien" >
							<th scope="row"><?php echo $traducteur['id'] ?></th>
							<td><?php echo $traducteur['lastname'] ?></td>
							<td><?php echo $traducteur['firstname'] ?></td>
							<td><?php echo $traducteur['email'] ?></td>
							<?php
							if($traducteur['demande'])
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
							if($traducteur['offre'])
							{
							?>
							<td><button>Consulter l'offre</button></td>
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
			if($data['devis']['traducteurs'])
			{
			foreach ($data['devis']['traducteurs'] as $traducteur)
				{
					if($traducteur['offre'])
					{
					?>
							<div class="col-md-11">
							<div class="shadow-lg infoOffre" id="infoOffre<?php echo $i?>">
							<button class="retourOffre pull-right btn-danger" type="button">x</button>
								<h3>Informations sur l'offre</h3><br>
								<div class="row">
									<div class="col-xs-6 col-md-6">
										<label>Prix en dinar algérien:</label>
										<input class="form-control input"  readonly placeholder="<?php echo $traducteur['offre']['prix'] ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 col-md-6">
										<label>Date</label>
										<input class="form-control input"  readonly placeholder="<?php echo $traducteur['offre']['date']?>">
									</div>
								</div>
								<?php
								if(!$traducteur['demande'])
								{
								?>
									<form  id="acceptOffre" method="post" action="?p=addDemandeTrad">
										<input type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
										<input type="hidden" name="traducteur_id" value=<?php echo $traducteur['id']?>>
										<label>Joindre le document prouvant votre paiement :
											<input required type="file" name="document">
										</label>
										<div class="row">
											<div class="col-xs-6 col-md-6">
												<input type="submit" value="Envoyer une demande de traduction" />
											</div>	
								</div>
									</form>
								<?php
								}
								?>
							</div>		
							</div>
					<?php
					}
					$i++;
				}
			}
			?>
			
			<button id="getTrad" class="btn btn-lg btn-info">Ajouter un traducteur</button>
			<input id="devis_id" type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>


			<div id="divTraducteurs" class="traducteurs" >
				<form id="trad_checklist_form" method="post" action="?p=addTradDevis">
					<h3>Selectionner les traducteurs :</h3>
					<table id="tableTraducteurs"  border="1" >
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Email</th>
							<th>Profile</th>
							<th></th>
						</tr>
					</table>
					<input id="devis_id" type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
					<button type="button" onclick="document.getElementById('divTraducteurs').style.display='none'" >Annuler</button>	
					<button type="submit" id="sendTraducteurs">Envoyez la demande</button>
				</form>	
			</div>


			<h3>Liste des Traductions </h6>
						<div class="ttable">
							<table class="table">
								<thead  style ="background-color:#5BC0DE;"class="entet">
									<tr>
									<th scope="col">Traducteur ID</th>
									<th scope="col">Nom</th>
									<th scope="col">Prenom</th>
									<th scope="col">Email</th>
									<th scope="col">Note</th>
									<th scope="col"></th>
									<th scope="col"></th>
									</tr>
								</thead>
								<tbody id="traduction_table">
									<?php
									if($data['devis']['traducteurs'])
									{
										foreach ($data['devis']['traducteurs'] as $traducteur)
										{
											if($traducteur['traduction'])
											{
									
										?>
											<tr style="cursor: pointer ; " class="lien" >
												<th scope="row"><?php echo $traducteur['id'] ?></th>
												<td><?php echo $traducteur['lastname'] ?></td>
												<td><?php echo $traducteur['firstname'] ?></td>
												<td><?php echo $traducteur['email'] ?></td>
												<td><?php echo $traducteur['traduction']['note'] ?></td>
												<td class="pull-right">
													<button class="btn btn-success">Consulter la traduction</button>
													<button class="signaler btn  btn-danger">Signaler</button>
												</td>
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
						if($data['devis']['traducteurs'])
						{
							foreach ($data['devis']['traducteurs'] as $traducteur)
							{
								if($traducteur['traduction'])
								{							
								?>
									<div class="infoTraduction" id="infoTraduction<?php echo $i?>">
									<button class="retourTraduction pull-right btn-danger" type="button">x</button>
										<h3>Informations Traduction</h3><br>
										<div class="row">
											<div class="col-xs-12 col-md-12">
												<i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank"  href="?p=downTrad&tid=<?php echo $traducteur['id']?>&did=<?php echo $data['devis']['id']?>">Document Traduit</a><br><br><br><br>
											</div>
										</div>
										<form  id="noterTraduction" method="post" action="?p=noteTrad">
										<div class="row">
											<div class="col-xs-6 col-md-6">
												<input required type="number"  name="note" min="0" max="5">
											</div>
											<input type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
											<input type="hidden" name="traducteur_id" value=<?php echo $traducteur['id']?>>
											<div class="col-xs-6 col-md-6">
												<input type="submit"  class="btn btn-primary" value="Noter la traduction"/>	
												</div>
											</div>
										</form>
									</div>
									<div class="infoSignalement" id="infoSignalement<?php echo $i?>">	
									<button class="retourSignalement retourTraduction pull-right btn-danger" type="button">x</button>	
									<?php
									if($traducteur['signalement'])
									{
									?>
										<h3>Informations Signalement</h3>
										<div class="row">
											<div class="col-xs-12 col-md-12">
												<label>Description</label>:<textarea class="form-control input" type="text" readonly placeholder="<?php echo $traducteur['signalement']['description'] ?>"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-md-12">
												<label>Date</label><input class="form-control input" type="text" readonly placeholder="<?php echo $traducteur['signalement']['date']?>">
											</div>
										</div>
										<?php
									}
									else
									{
									?>
										<form  method="post" action="?p=signaler">
										<div class="row">
											<div class="col-xs-12 col-md-12">
												<textarea type="text" name="description" placeholder="Explique la raison du signalement ?"></textarea>
											</div>
										</div>
											<input type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
											<input type="hidden" name="traducteur_id" value=<?php echo $traducteur['id']?>>
										<div class="row">
											<div class="col-xs-12 col-md-12">
												<input type="submit"  class="btn btn-danger"  value="Signaler ce Traducteur " />
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

							
<script type="text/javascript" src="view/js/client_devis.js"></script>
