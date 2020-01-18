
			<button class="signbtn" onclick="document.getElementById('login').style.display='block'">Login</button>
			<button class="signbtn" onclick="document.getElementById('signup').style.display='block'">S'incrire</button>
			<?php
				if(isset($error['login']))
				echo '<div id="login" class="sign" style="display:block" >';
				else
				echo '<div id="login" class="sign">';
			?>
				<form class="sign-content" method="POST" action="?p=connexion">
				<button class="pull-right btn-danger" type="button" onclick="document.getElementById('login').style.display='none'" >X</button>

					<div class="sign-container">
						<label for="uname"><b>Email</b></label>
						<input type="text" placeholder="Entrer votre email" name="email" id="email" required>
						<label for="psw"><b>Password</b></label>
						<input type="password" placeholder="Entrer votre mot de passe" name="password" id="password" required>
						<label>
						<label for="uname"><b>Se connecter en tant que :</b></label>
							<input type="radio" checked="checked" name="type"   value="client"> Client 
							<input type="radio" name="type" value="traducteur">  Traducteur 
						</label>
						<?php
							if(isset($error['login']))
							echo '<label><b>Email et/ou Mot de passe incorrect :</b></label>';
						?>
						<button type="submit">Login</button>
						<label>
							<input type="checkbox" checked="checked" name="remember"> Remember me
						</label>
					</div>
					<div class="sign-container" style="background-color:#f1f1f1">
						<button type="button" onclick="document.getElementById('login').style.display='none'" 	class="sign-cancelbtn">Annuler</button>
						<span class="sign-psw">Oublié <a href="#">Mot de passe?</a></span>
					</div>
				</form>
			</div>
			<?php
				if(isset($error['signup']))
				echo '<div id="signup" class="sign" style="display:block">';
				else
				echo '<div id="signup" class="sign">';
			?>
				<form class="sign-content" method="POST" action="?p=signup">
					<button class="pull-right btn-danger" type="button" onclick="document.getElementById('signup').style.display='none'" >X</button>
					<div class="sign-container">
					<div class="row">	
						<div class="col-xs-6 col-md-6">
						<h1>Créer un compte client</h1>
						</div>
						<div class="col-xs-6 col-md-6">
						<h3><a href="?p=recrutement" target="_blank" >Cliquer içi pour un compte traducteur</a></h3>
						</div>
					</div>
					<div class="row">
							<div class="col-xs-6 col-md-6">
								<input required type="text" name="lastname" value="" class="form-control input-lg" placeholder="Nom*"  />
							</div>
							<div class="col-xs-6 col-md-6">
								<input required type="text" name="firstname" value="" class="form-control input-lg" placeholder="Prenom*"  />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-md-6">
								<input type="number" name="tel" value="" class="form-control input-lg" placeholder="Téléphone"  />
							</div>
							<div class="col-xs-6 col-md-6">
								<input type="number" name="fax" value="" class="form-control input-lg" placeholder="Fax"  />
							</div>
						</div>
						<input required type="text" name="email" value="" class="form-control input-lg" placeholder="Votre Email*"  />
						<input required type="password" name="password" value="" class="form-control input-lg" placeholder="Mot de Passe*"  /><input type="password" name="rpassword" value="" class="form-control input-lg" placeholder="Confirmer Mot de Passe*"  /> 
						<br/>
						<?php
							if(isset($error['signup']))
							echo '<label><b>Email existe déja ! </b></label>';
						?>			
						<div class="row">
							<div class="col-xs-6 col-md-6">
							<button type="button" onclick="document.getElementById('signup').style.display='none'" class="sign-cancelbtn">Annuler</button>
							</div>
							<div class="col-xs-6 col-md-6">
							<button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Créer mon compte</button>  
							</div>
						</div>
					</div>
				</form>
			</div>	

		

			<!-- FORMULAIRE DEMANDE DEVIS -->
			<div id="ddt-form" class="form-style-5">
				<form id="devis_form" method="post" action="javascript:void(0)" target="_blank">
					<h1>Demande de traduction :</h1>
					<div class="row">
							<div class="col-xs-6 col-md-6">
								<label for="job">Nom:</label>
								<input required type="text" name="nom" >
							</div>
							<div class="col-xs-6 col-md-6">
								<label for="job">Prénom:</label>
								<input required type="text" name="prenom" >
							</div>
					</div>
					<div class="row">
							<div class="col-xs-6 col-md-6">
								<label for="job">Email:</label>
								<input required type="email" name="email" >
							</div>
							<div class="col-xs-6 col-md-6">
								<label for="job">Téléphone:</label>
								<input required type="text" name="tel" >
							</div>
					</div>
					<div class="row">
							<div class="col-xs-12 col-md-12">
								<label for="job">Adresse:</label>
								<input required type="text" name="adresse" >
							</div>
					</div>
					<div class="row">
							<div class="col-xs-6 col-md-6">
							<label for="job">Langue d'origine des documents*:</label>
							<select name="langue_s">
							<option selected="selected" value='Arabe'>Arabe</option>
							<?php
								foreach ($data['langues'] as $l) {
										?>
										<option value='<?php echo $l['id']; ?>'>
										<?php echo $l['id']; ?>
										</option>
										<?php
								}
							?>
							</select> 
							</div>
							<div class="col-xs-6 col-md-6">
							<label for="job">Langue cible*:</label>
							<select name="langue_d">
								<option selected="selected" value='Anglais'>Anglais</option>
							<?php
								foreach ($data['langues'] as $l) {
									?>
										<option value='<?php echo $l['id']; ?>'>
										<?php echo $l['id']; ?>
										</option>
										<?php
								}
							?>
							</select> 
							</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-6">
							<label for="job">Type de traduction souhaité:</label>
								<select name="traduction_type">
								<?php
									foreach ($data['traduction_types'] as $type) {
										?>
										<option value='<?php echo $type['id']; ?>'>
										<?php echo $type['description']; ?>
										</option>
										<?php
									}
								?>
								</select>    
								</div>
								<div class="col-xs-6 col-md-6"></br>
							<label for="assermente"> Traducteur Assermenté :
							<input type="checkbox" id="assermente" name="assermente" value="1">
							</label>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-md-6">
					<textarea name="comment" placeholder="Demande spécifique / commentaire ..."></textarea>	
								</div>
					<div class="row">
						<div class="col-xs-6 col-md-6">
						<label>Choisir le document a traduire :
							<input required type="file" name="document">
						</label>
								</div>
					</div>
							<input type="submit" value="Valider " />
							</form>	
			</div>
							</div>

			<!-- FORMULAIRE DEMANDE DEVIS -->



