<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="view/template/template.css" rel="stylesheet">		
		<link href="view/css/sign.css" rel="stylesheet">		
		<link href="view/index.css" rel="stylesheet">	
		<link href="view/css/form2.css" rel="stylesheet">
		<link href="view/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="view/css/font-awesome.min.css" rel="stylesheet">


		<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="view/template/template.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
              diapo(0);
			});
		</script>
	</head>
	<body style="hight:100%;"> 
		<div class="top-template"> 
			<img src="view/template/logo.jpg"  alt="logo"  class="logo">
			<ul class="link-menu">
				<li><a href="www.facebook.com" target="_self"> Facebook </a></li>
				<li><a href="www.instagram.com" target="_self"> Instagram </a></li>
				<li><a href="www.twitter.com" target="_self"> Twitter </a></li>	
			</ul>		
		</div>
		<ul class="main-menu">
				<li><a href="?p=home">Accueil</a></li>
				<li><a href="#news">News</a></li>
			   <li><a href="?p=traducteurlist">Traducteurs</a></li>
			   <li><a href="?p=recrutement">Recrutement</a></li>
			   <li><a href="#news">A propos</a></li>
		</ul>
		<div class="diaporama" style="height:30%;width: 100%;text-center:">
			<img class="slide" src="view/template/diaporama_images/1.jpeg" style="width:100%;height:100%;display:none;">
			<img class="slide" src="view/template/diaporama_images/2.jpeg" style="width:100%;height:100%;display:none;">
			<img class="slide" src="view/template/diaporama_images/3.jpeg" style="width:100%;height:100%;display:none;">
		</div>
	



		<?php
        echo $content;
		?>
			
		 <br><br><br>
		<ul class="main-menu pull-left">
				<li><a href="?p=home">Accueil</a></li>
				<li><a href="#news">News</a></li>
			   <li><a href="?p=traducteurlist">Traducteurs</a></li>
			   <li><a href="#news">Recrutement</a></li>
			   <li><a href="#news">A propos</a></li>
		</ul>

		
	</body>
</html>
