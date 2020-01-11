<link href="view/forms/form2.css" rel="stylesheet">

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

		<a href="../profiles/client_profile.html">My Profile</a>
		<a href="?p=deconnexion">Déconnexion</a>

		<br>
		<button id="addv" >Ajouter une demande de devis de traduction</button>
		<?php
			echo '<br>ID : '.$_SESSION['id'];
			echo ' EMAIL : '.$_SESSION['email'];
			echo ' TYPE : '.$_SESSION['type'];	
		?>
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
							if($l->id === "Arabe")
							{
							?>
								<option selected="selected" value='<?php echo $l->id; ?>'>
								<?php echo $l->id; ?>
								</option>
							<?php
							}
							else 
							{
							?>
								<option value='<?php echo $l->id; ?>'>
								<?php echo $l->id; ?>
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
							if($l->id === "Anglais")
							{
							?>
								<option selected="selected" value='<?php echo $l->id; ?>'>
								<?php echo $l->id; ?>
								</option>
							<?php
							}
							else 
							{
							?>
								<option value='<?php echo $l->id; ?>'>
								<?php echo $l->id; ?>
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
							<option value='<?php echo $type->id; ?>'>
							<?php echo $type->description; ?>
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
				<h3>Selectionner les traducteurs que vous voulez:</h3>
					<table id="tableTraducteurs" >
					<tr>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Email</th>
					</tr>
					</table>
				<button type="button" onclick="document.getElementById('divTraducteurs').style.display='none'" >Annuler</button>	
				<button type="button" id="sendTraducteurs">Envoyez la demande</button>
			</div>

	
				


<script type="text/javascript">
	$(document).ready(function(){

		$("#addv").click(function(){
			$("#ddt-form").show();
		});
		
    });
    
</script>
<script type="text/javascript" src="view/js/modal_post.js"></script>
