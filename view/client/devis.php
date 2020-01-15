<link href="view/css/tableaustyle.css" rel="stylesheet">
<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>
<style>
	.infoOffre,.infoTraduction
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
		    <input type="text" readonly placeholder="<?php echo $data['devis']['nom'] ?>">
			<input type="text" readonly placeholder="<?php echo $data['devis']['prenom'] ?>">
			<input type="text" readonly placeholder="<?php echo $data['devis']['email'] ?>">
            <input type="text" readonly placeholder="<?php echo $data['devis']['tel'] ?>">
		    <input type="text" readonly placeholder="<?php echo $data['devis']['adresse'] ?>">
			<input type="text" readonly placeholder="<?php echo $data['devis']['langue_s'] ?>">
			<input type="text" readonly placeholder="<?php echo $data['devis']['langue_d'] ?>">
            <input type="text" readonly placeholder="<?php echo $data['devis']['traduction_type'] ?>">
			<input type="text" readonly placeholder="<?php echo $data['devis']['assermente'] ?>">
			<input type="text" readonly placeholder="<?php echo $data['devis']['comment'] ?>">
			<input type="text" readonly placeholder="<?php echo $data['devis']['date'] ?>">
			<h3>Liste des Traducteurs</h6>
			<div class="ttable">
				<table class="table">
					<thead  style ="background-color:#5BC0DE;"class="entet">
						<tr>
						<th scope="col">Traducteur ID</th>
						<th scope="col">Nom</th>
						<th scope="col">Prenom</th>
						<th scope="col">Email</th>
						<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach ($data['devis']['traducteurs'] as $traducteur)
						{
						?>
						<tr  id="offreRow" style="cursor: pointer ; " class="lien" >
						<th scope="row"><?php echo $traducteur['id'] ?></th>
						<td><?php echo $traducteur['lastname'] ?></td>
						<td><?php echo $traducteur['firstname'] ?></td>
						<td><?php echo $traducteur['email'] ?></td>
						<?php 
						if($traducteur['offre'])
						{
						?>
						<td><button id="offreRow">Consulter l'offre</button></td>
						<input type="hidden" id="offreRowNum" value="<?php echo $i;?>">		
						<?php
						$i++;
						}
						?>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<?php
			$i = 0;
			foreach ($data['devis']['traducteurs'] as $traducteur)
			{
				if(isset($traducteur['offre']))
				{
				?>
						<div class="infoOffre" id="infoOffre<?php echo $i?>">
							<h3>Informations Offre</h3>
							Prix<input type="text" readonly placeholder="<?php echo $traducteur['offre']['prix'] ?>">
							Date<input type="text" readonly placeholder="<?php echo $traducteur['offre']['date']?>"><br>
							<form  id="acceptOffre" method="post" action="?p=addDemandeTrad">
								<input type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
								<input type="hidden" name="traducteur_id" value=<?php echo $traducteur['id']?>>
								<input type="submit" value="Envoyer une demande de traduction" />	
							</form>
							<button id="retourOffre">Retour</button>
						</div>		
				<?php
				}
				$i++;
			}
			?>

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
								<tbody>
									<?php
									$i = 0;
									foreach ($data['devis']['traducteurs'] as $traducteur)
									{
										if($traducteur['traduction'])
										{
								
									?>
										<tr  id="traductionRow" style="cursor: pointer ; " class="lien" >
										<th scope="row"><?php echo $traducteur['id'] ?></th>
										<td><?php echo $traducteur['lastname'] ?></td>
										<td><?php echo $traducteur['firstname'] ?></td>
										<td><?php echo $traducteur['email'] ?></td>
										<td><?php echo $traducteur['traduction']['note'] ?></td>
										<?php 
										if($traducteur['offre'])
										{
										?>
										<td><button id="consultTraduction">Consulter la traduction</button></td>
										<input type="hidden" id="traductionRowNum" value="<?php echo $i;?>">		
										<?php
										$i++;
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
						foreach ($data['devis']['traducteurs'] as $traducteur)
						{
							if($traducteur['traduction'])
							{							
							?>
									<div class="infoTraduction" id="infoTraduction<?php echo $i?>">
										<h3>Informations Traduction</h3>
										Document Traduit :<input type="text" readonly placeholder="<?php echo $traducteur['traduction']['file_path']?>"><br>
										<form  id="noterTraduction" method="post" action="?p=noteTrad">
											<input type="number" name="note" min="0" max="5">
											<input type="hidden" name="devis_id" value=<?php echo $data['devis']['id']?>>
											<input type="hidden" name="traducteur_id" value=<?php echo $traducteur['id']?>>
											<input type="submit" value="Noter la traduction"/>	
										</form>
										<button id="retourTraduction">Retour</button>
									</div>		
							<?php
							}
							$i++;
						}
						?>
							
<script type="text/javascript" src="view/js/client_devis.js"></script>
