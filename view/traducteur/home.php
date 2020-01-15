<link href="view/forms/form2.css" rel="stylesheet">
<link href="view/css/tableaustyle.css" rel="stylesheet">
<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>
<style>
	.infoDevis,.infoDemande
	{
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		background-color:beige;
		z-index: 1; /* Sit on top */
		top: 10%;
		left : 15%;
		height: 50%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		border : 1px black solid;
	}
</style>

		<div class="col-md-11">
			<a href="../profiles/client_profile.html"><button class="btn btn-lg btn-info">My Profile</button></a>
			<a href="?p=deconnexion"><button class="btn btn-lg btn-info">Déconnexion</button></a>
			
			<h3>Liste des demandes de Devis</h6>
			<div class="ttable">
			<table class="table">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis ID</th>
			<th scope="col">Langue Source</th>
			<th scope="col">Langue Cible</th>
			<th scope="col">Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
		if($data != false)
		{	
			$i = 0;
			foreach ($data['listDevis'] as $devis)
			{
			?>
			<tr id="devisRow" style="cursor: pointer ; " class="lien" >
				<th scope="row"><?php echo $devis['id'] ?></th>
				<td><?php echo $devis['langue_s'] ?></td>
				<td><?php echo $devis['langue_d'] ?></td>
				<td><?php echo $devis['date'] ?></td>
			</tr>
			<input type="hidden" id="devisRowNum" value="<?php echo $i;?>">
			<?php
			$i++;
			}
		}
			?>
		</tbody>
		</table>
		</div>

		<?php
			$i = 0;
			foreach ($data['listDevis'] as $devis)
			{
			?>
			<div class="infoDevis" id="infoDevis<?php echo $i?>">
					<h3>Informations Devis</h3>
					<input type="text" readonly placeholder="<?php echo $devis['nom'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis['prenom'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis['email'] ?>"><br>
					<input type="text" readonly placeholder="<?php echo $devis['tel'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['adresse'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['langue_s'] ?>"><br>
					<input type="text" readonly placeholder="<?php echo $devis ['langue_d'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['traduction_type'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['assermente'] ?>"><br>
					<input type="text" readonly placeholder="<?php echo $devis ['comment'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['date'] ?>"><br><br><br>
					<?php
						if($devis['offre'])
						{?>
							<h3>L'offre soumit a cet devis:</h3>	
							Prix:<input type="text" readonly placeholder="<?php echo $devis['offre']['prix'] ?>">
							Date:<input type="text" readonly placeholder="<?php echo $devis['offre']['date'] ?>"><br>
						<?php
						}
						else{
						?>
							<form  id="sendOffre" method="post" action="?p=addOffreDevis">
								Prix<input type="text" name="prix" required>
								<input type="hidden" name="devis_id" value=<?php echo $devis['id']?>>
								<input type="submit" value="Envoyer l'offre " />				
							</form>
						<?php
						}
						?>
					<button id="retourOffre">Retour</button>
			</div>
			<?php
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
		<tbody>
			<?php
		if($data != false)
		{	
			$i = 0;
			foreach ($data['listDevis'] as $devis)
			{
				if($devis['demandeTrad'])
				{
			?>
			<tr id="demandeRow" style="cursor: pointer ; " class="lien" >
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
			<input type="hidden" id="demandeRowNum" value="<?php echo $i;?>">
			<?php
				$i++;
				}
			}
		}
			?>
		</tbody>
		</table>
		</div>

		<?php
			$i = 0;
			foreach ($data['listDevis'] as $devis)
			{
				if($devis['demandeTrad'])
				{
			?>
			<div class="infoDemande" id="infoDemande<?php echo $i?>">
					<h3>Informations sur la demande de traduction</h3>
					<input type="text" readonly placeholder="<?php echo $devis['nom'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis['prenom'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis['email'] ?>"><br>
					<input type="text" readonly placeholder="<?php echo $devis['tel'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['adresse'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['langue_s'] ?>"><br>
					<input type="text" readonly placeholder="<?php echo $devis ['langue_d'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['traduction_type'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['assermente'] ?>"><br>
					<input type="text" readonly placeholder="<?php echo $devis ['comment'] ?>">
					<input type="text" readonly placeholder="<?php echo $devis ['date'] ?>"><br><br><br>	
					<?php
						if($devis['traduction'])
						{
					?>
						Feedback du client :<br>
						Note / 5:<input type="text" readonly placeholder="<?php echo $devis['traduction']['note'] ?>"><br>
					<?php
						}
						else {
							?>
							<form  id="sendTraduction" method="post" action="?p=sendTraduction" enctype='multipart/form-data'>
							Document :<input type="file" name="document" required>
							<input type="hidden" name="devis_id" value=<?php echo $devis['id']?>>
							<input type="submit" value="Rendre la traduction" />				
							</form>	
						<?php					
						}
					?>
					<button id="retourDemande">Retour</button>
			</div>
			<?php
				}
			}
			?>

<script type="text/javascript" src="view/js/traducteur_home.js"></script>


