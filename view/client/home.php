<link href="view/forms/form2.css" rel="stylesheet">
<link href="view/css/tableaustyle.css" rel="stylesheet">

<style>
	.form-style-5,.traducteurs
	{
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		background-color:beige;
		z-index: 1; /* Sit on top */
		top: 20px;
		height: 80%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		left: 30%;
	}
</style>

<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>

		<div class="col-md-11">
			<a href="../profiles/client_profile.html"><button class="btn btn-lg btn-info">My Profile</button></a>
			<a href="?p=deconnexion"><button class="btn btn-lg btn-info">Déconnexion</button></a>
			<button id="addv" class="btn btn-lg btn-info">Nouveau Devis</button>
			
			<h3> Liste des Devis</h6>
			<div class="ttable">
			<table class="table">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis ID</th>
			<th scope="col">Langue Source</th>
			<th scope="col">Langue Cible</th>
			<th scope="col">Nombre d'offre</th>
			<th scope="col">Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
		if($data != false)
		{
			foreach ($data['listDevis'] as $devis)
			{?>

			<tr  onclick="location.href='?p=devis&amp;id=<?php echo $devis['id'] ?>'" style="cursor: pointer ; " class="lien" >
				<th scope="row"><?php echo $devis['id'] ?></th>
				<td><?php echo $devis['langue_s'] ?></td>
				<td><?php echo $devis['langue_d'] ?></td>
				<td><?php echo 5 ?></td>
				<td><?php echo $devis['date'] ?></td>
			</tr>
			<?php
			}
		}
			?>
		</tbody>
		</table>
		</div>
		<div class="col-md-10">


		<div id="ddt-form" class="form-style-5">
				<form id="devis_form" method="post" action="javascript:void(0)">
					<h1>Demande de traduction :</h1>
					<input type="text" name="nom" placeholder="Votre nom *">
					<input type="text" name="prenom" placeholder="Votre prenom*">
					<input type="email" name="email" placeholder="Votre email *">
					<input type="text" name="tel" placeholder="Votre numero de telephone *">
					<input type="text" name="adresse" placeholder="Votre adresse">
					<?php
						use model\type_traduction;
						use model\langue;
						$type_traduction = new type_traduction();
						$traduction_types = $type_traduction->getTypeDispo();
						$langue = new langue();
						$langues = $langue->getAll();
					?>
					<label for="job">Langue d'origine des documents*:</label>
					<select name="langue_s">
					<?php
						foreach ($langues as $l) {
							if($l['id'] === "Arabe")
							{
							?>
								<option selected="selected" value='<?php echo $l['id']; ?>'>
								<?php echo $l['id']; ?>
								</option>
							<?php
							}
							else 
							{
							?>
								<option value='<?php echo $l['id']; ?>'>
								<?php echo $l['id']; ?>
								</option>
								<?php
							}
						}
					?>
					</select> 
					<label for="job">Langue cible*:</label>
					<select name="langue_d">
					<?php
						foreach ($langues as $l) {
							if($l['id'] === "Anglais")
							{
							?>
								<option selected="selected" value='<?php echo $l['id']; ?>'>
								<?php echo $l['id']; ?>
								</option>
							<?php
							}
							else 
							{
							?>
								<option value='<?php echo $l['id']; ?>'>
								<?php echo $l['id']; ?>
								</option>
								<?php
							}
						}
					?>
					</select> 
					<label for="job">Type de traduction souhaité:</label>
					<select name="traduction_type">
					<?php
						foreach ($traduction_types as $type) {
							?>
							<option value='<?php echo $type['id']; ?>'>
							<?php echo $type['description']; ?>
							</option>
							<?php
						}
					?>
					</select>    
					<textarea name="comment" placeholder="Demande spécifique / commentaire ..."></textarea>	
					<label>Choisir le document a traduire :
						<input type="file" name="document">
					</label>
					<label for="assermente"> Traducteur Assermenté :
						<input type="checkbox" id="assermente" name="assermente" value="1">
					</label></br>
					<input type="submit" value="Valider " />
				</form>	
				<button type="button" onclick="document.getElementById('ddt-form').style.display='none'" >Annuler</button>
			</div>

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
					<button type="button" onclick="document.getElementById('divTraducteurs').style.display='none'" >Annuler</button>	
					<button type="button" id="RetourDemandeDevis" >Retour</button>	
					<button type="submit" id="sendTraducteurs">Envoyez la demande</button>
				</form>	
			</div>

		
				
<script type="text/javascript" src="view/js/client_home.js"></script>
