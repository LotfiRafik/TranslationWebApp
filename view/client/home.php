<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Client</title>
		<link href="../template/template.css" rel="stylesheet">
		<link href="../forms/form2.css" rel="stylesheet">
		<style>
			.form-style-5{
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				top: 20px;
				height: 80%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				padding-top: 0px;
				left: 25%;
			}
		</style>
		<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
              $("#addv").click(function(){
				$("#ddt-form").show();
			  });
			});
		</script>
	</head>
	<body>
		<a href="../profiles/client_profile.html" style="position:absolute;right:0px;">My Profile</a>
		<a href="?p=deconnexion">Déconnexion</a>

		<br>
		<button id="addv" >Ajouter une demande de devis de traduction</button>
		<?php
			echo '<br>ID : '.$_SESSION['id'];
			echo '<br>EMAIL : '.$_SESSION['email'];
			echo '<br>PASSWORD : '.$_SESSION['password'];
			echo '<br>TYPE : '.$_SESSION['type'];	
		?>
		<div id="ddt-form" class="form-style-5">
				<form method="POST">
					<h1>Demande de traduction :</h1>
					<input type="text" name="nom" placeholder="Votre nom *">
					<input type="text" name="prenom" placeholder="Votre prenom*">
					<input type="email" name="email" placeholder="Votre email *">
					<input type="text" name="tel" placeholder="Votre numero de telephone *">
					<input type="text" name="adresse" placeholder="Votre adresse">	
					<input type="text" name="langueo" placeholder="Langue d'origine des documents*">
					<input type="text" name="languec" placeholder="Langue cible*">
					<label for="job">Type de traduction souhaité:</label>
					<select id="type_traduction" name="type_traduction">
					  <option value="generale">Générale</option>
					  <option value="scientifique">Scientifique</option>
					  <option value="siteweb">Site web</option>
					</select>    
					<textarea name="commentaire" placeholder="Demande spécifique / commentaire ..."></textarea>	
					<label>Choisir le document a traduire :
						<input type="file" name="document">
					</label>
					<label for="assermente"> Traducteur Assermenté :
						<input type="checkbox" id="assermente" name="assermente" value="oui">
					</label></br>
					<input type="submit" value="Apply" />
				</form>	
			</div>



		<ul class="main-menu">
			<li><a id="dtc" href=".">Demande de traduction en cour</a></li>
			<li><a id="dv" href="dv.html">Les demandes validées</a></li>
		   <li><a id="dt" href="dt.html" >Traduction terminé</a></li>
		</ul>
		<div class="content">
			<div class="dtc">
					<p>date 
					les langues d’origine et source,
					le type de traduction souhaité (général, scientifique, site web
					les commentaires et demandes spécifique  le fichier du document à traduire
					un traducteur assermenté pour cette traduction. (1pt)
					</p>
			</div>
		</div>




		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


	</body>
</html>
