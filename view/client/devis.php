<link href="view/css/tableaustyle.css" rel="stylesheet">
<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>
<style>
	.infoOffre,.infoTraduction,.traducteurs
	{
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		background-color:beige;
		z-index: 1; /* Sit on top */
		top: 20%;
		left : 30%;
		height: 30%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		border : 1px black solid;
	}
</style>

		<div class="col-md-11">
       	 	<h3>Informations Devis</h3>
		    Nom:<input type="text" readonly placeholder="<?php echo $data['devis']['nom'] ?>">
			Prenom:<input type="text" readonly placeholder="<?php echo $data['devis']['prenom'] ?>">
			Email:<input type="text" readonly placeholder="<?php echo $data['devis']['email'] ?>">
            Téléphone:<input type="text" readonly placeholder="<?php echo $data['devis']['tel'] ?>">
		    Adresse:<input type="text" readonly placeholder="<?php echo $data['devis']['adresse'] ?>">
			Langue Source:<input type="text" readonly placeholder="<?php echo $data['devis']['langue_s'] ?>">
			Langue Cible:<input type="text" readonly placeholder="<?php echo $data['devis']['langue_d'] ?>">
            Type Traduction:<input type="text" readonly placeholder="<?php echo $data['devis']['traduction_type'] ?>">
			Traducteur Assermente:<input type="text" readonly placeholder="<?php echo $data['devis']['assermente'] ?>">
			Commentaire:<input type="text" readonly placeholder="<?php echo $data['devis']['comment'] ?>">
			Date :<input type="text" readonly placeholder="<?php echo $data['devis']['date'] ?>">
			<a target="_blank" href="?p=downDevis&did=<?php echo $data['devis']['id']?>">Document A Traduire</a>



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
							<div class="infoOffre" id="infoOffre<?php echo $i?>">
								<h3>Informations Offre</h3>
								Prix en dinar algérien:<input type="number" readonly placeholder="<?php echo $traducteur['offre']['prix'] ?>">
								Date<input type="text" readonly placeholder="<?php echo $traducteur['offre']['date']?>"><br>
								<?php
								if(!$traducteur['demande'])
								{
								?>
									<form  id="acceptOffre" method="post" action="?p=addDemandeTrad">
										<input type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
										<input type="hidden" name="traducteur_id" value=<?php echo $traducteur['id']?>>
										<input type="submit" value="Envoyer une demande de traduction" />	
									</form>
								<?php
								}
								?>
								<button class="retourOffre">Retour</button>
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
					<h3>Selectionner les traducteurs que vous voulez:</h3>
					<table id="tableTraducteurs" >
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Email</th>
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
									<th scope="col">Note/5</th>
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
											<?php 
											if($traducteur['offre'])
											{
											?>
											<td><button>Consulter la traduction</button></td>
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
						if($data['devis']['traducteurs'])
						{
						foreach ($data['devis']['traducteurs'] as $traducteur)
						{
							if($traducteur['traduction'])
							{							
							?>
									<div class="infoTraduction" id="infoTraduction<?php echo $i?>">
										<h3>Informations Traduction</h3>
										<a target="_blank" href="?p=downTrad&tid=<?php echo $traducteur['id']?>&did=<?php echo $data['devis']['id']?>">Document Traduit</a><br>
										<form  id="noterTraduction" method="post" action="?p=noteTrad">
											<input type="number" name="note" min="0" max="5">
											<input type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
											<input type="hidden" name="traducteur_id" value=<?php echo $traducteur['id']?>>
											<input type="submit" value="Noter la traduction"/>	
										</form>
										<button class="retourTraduction">Retour</button>
									</div>		
							<?php
							}
							$i++;
						}
					}
						?>
							
<script type="text/javascript" src="view/js/client_devis.js"></script>
