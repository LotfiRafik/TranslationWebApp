<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="view/admin/connexion/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="view/admin/connexion/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="view/admin/connexion/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="view/admin/connexion/css/util.css">
	<link rel="stylesheet" type="text/css" href="view/admin/connexion/css/main.css">
	<link href="view/css/bootstrap.min.css" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(view/admin/connexion/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Connexion
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="admin.php?p=connexion">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Identifiant requis">
						<span class="label-input100">Identifiant</span>
						<input class="input100" type="text" name="identifiant" placeholder="Entrer identifiant">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Mote de passe requis">
						<span class="label-input100">Mot de passe</span>
						<input class="input100" type="password" name="password" placeholder="Entrer mot de passe">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<?php
							if($error)
							{
								echo '<p style="color:red;">Mot de passe ou Identifiant Incorrect !  </p>';
							}
							?>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Se connecter
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
