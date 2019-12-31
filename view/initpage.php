<div class="zone">
		<div class="right_zone">
			<button class="signbtn" onclick="document.getElementById('login').style.display='block'">Login</button>
			<button class="signbtn" onclick="document.getElementById('signup').style.display='block'">Sign-Up</button>
			<?php
				if(isset($error))
				echo '<div id="login" class="sign" style="display:block" >';
				else
				echo '<div id="login" class="sign">';
			?>
				<form class="sign-content" method="POST" action="?p=connexion">
					<span onclick="document.getElementById('login').style.display='none'"
					class="sign-close" >&times;</span>
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
							if(isset($error))
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
				if(isset($sign_error))
				echo '<div id="signup" class="sign" style="display:block">';
				else
				echo '<div id="signup" class="sign">';
			?>
				<form class="sign-content" method="POST" action="?p=signup">
					<span onclick="document.getElementById('signup').style.display='none'" class="sign-close" >&times;</span>
					<div class="sign-container">
						<h1>Sign Up</h1>
						<p>Please fill in this form to create an account.</p>
						<hr>
						<label><b>Email</b></label>
						<input type="text" placeholder="Enter Email" name="email" required>
						<label><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="password" required>
						<label><b>Repeat Password</b></label>
						<input type="password" placeholder="Repeat Password" name="rpassword" required>
						<label ><b>S'inscrire en tant que :</b></label>
							<input type="radio" checked="checked" name="type" value="client"> Client 
							<input type="radio" name="type" value="traducteur"> Traducteur 
						</label>
						<?php
							if(isset($sign_error))
							echo '<label><b>Email existe déja ! </b></label>';
						?>			
						<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
						<button type="button" onclick="document.getElementById('signup').style.display='none'" class="sign-cancelbtn">Cancel</button>
						<button type="submit">Sign Up</button>
					</div>
				</form>
			</div>	

			<div class="form-style-5">
				<form>
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
		</div>

		<div class="left_zone">
            <div class="blog" style="position: relative;left: 25px;">
			<div class="container">
					<div class="row">
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-12 post" style="background-color:white;	border-radius: 8px;
								">
									<div class="row">
										<div class="col-md-12">
											<h4>
												<strong><a href="http://www.jquery2dotnet.com/2013/12/cool-share-button-effects-styles.html" class="post-title">Cool Share Button Effects Styles</a></strong></h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 post-header-line">
											<span class="glyphicon glyphicon-user"></span>by <a href="#">Lotfi</a> | <span class="glyphicon glyphicon-calendar">
											</span>Sept 16th, 2012 | <span class="glyphicon glyphicon-comment"></span><a href="#">
												3 Comments</a> | <i class="icon-share"></i><a href="#">39 Shares</a> | <span class="glyphicon glyphicon-tags">
												</span>Tags : <a href="#"><span class="label label-info">Snipp</span></a> <a href="#">
													<span class="label label-info">Bootstrap</span></a> <a href="#"><span class="label label-info">
														UI</span></a> <a href="#"><span class="label label-info">growth</span></a>
										</div>
									</div>
									<div class="row post-content">
								
										<div class="col-md-9">
											<p>
												Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option.
												Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari
												conclusionemque, ad nobis propriae quaerendum sea.
											</p>
											<p>
												<a class="btn btn-read-more" href="http://www.jquery2dotnet.com/2013/12/cool-share-button-effects-styles.html">Read more</a></p>
										</div>
									</div>
								</div>
								<!-- Seconde article-->
								<div class="col-md-12 post"  style="background-color:white;	border-radius: 8px;
								">
										<div class="row">
											<div class="col-md-12">
												<h4>
													<strong><a href="http://www.jquery2dotnet.com/2013/12/cool-share-button-effects-styles.html" class="post-title">Cool Share Button Effects Styles</a></strong></h4>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 post-header-line">
												<span class="glyphicon glyphicon-user"></span>by <a href="#">Bhaumik</a> | <span class="glyphicon glyphicon-calendar">
												</span>Sept 16th, 2012 | <span class="glyphicon glyphicon-comment"></span><a href="#">
													3 Comments</a> | <i class="icon-share"></i><a href="#">39 Shares</a> | <span class="glyphicon glyphicon-tags">
													</span>Tags : <a href="#"><span class="label label-info">Snipp</span></a> <a href="#">
														<span class="label label-info">Bootstrap</span></a> <a href="#"><span class="label label-info">
															UI</span></a> <a href="#"><span class="label label-info">growth</span></a>
											</div>
										</div>
										<div class="row post-content">
								
											<div class="col-md-9">
												<p>
													Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option.
													Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari
													conclusionemque, ad nobis propriae quaerendum sea.
												</p>
												<p>
													<a class="btn btn-read-more" href="http://www.jquery2dotnet.com/2013/12/cool-share-button-effects-styles.html">Read more</a></p>
											</div>
										</div>
									</div>
									<div class="col-md-12 post"   style="background-color:white">
											<div class="row">
												<div class="col-md-12">
													<h4>
														<strong><a href="http://www.jquery2dotnet.com/2013/12/cool-share-button-effects-styles.html" class="post-title">Cool Share Button Effects Styles</a></strong></h4>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 post-header-line">
													<span class="glyphicon glyphicon-user"></span>by <a href="#">Bhaumik</a> | <span class="glyphicon glyphicon-calendar">
													</span>Sept 16th, 2012 | <span class="glyphicon glyphicon-comment"></span><a href="#">
														3 Comments</a> | <i class="icon-share"></i><a href="#">39 Shares</a> | <span class="glyphicon glyphicon-tags">
														</span>Tags : <a href="#"><span class="label label-info">Snipp</span></a> <a href="#">
															<span class="label label-info">Bootstrap</span></a> <a href="#"><span class="label label-info">
																UI</span></a> <a href="#"><span class="label label-info">growth</span></a>
												</div>
											</div>
											<div class="row post-content">
		
												<div class="col-md-9">
													<p>
														Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option.
														Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari
														conclusionemque, ad nobis propriae quaerendum sea.
													</p>
													<p>
														<a class="btn btn-read-more" href="http://www.jquery2dotnet.com/2013/12/cool-share-button-effects-styles.html">Read more</a></p>
												</div>
											</div>
										</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br style="clear:both;"/>
    	</div>