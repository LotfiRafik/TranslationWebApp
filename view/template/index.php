<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="view/template/template.css" rel="stylesheet">		
		<link href="view/login/sign.css" rel="stylesheet">		
		<link href="view/index.css" rel="stylesheet">	
		<link href="view/blog/blog.css" rel="stylesheet">	
		<link href="view/forms/form2.css" rel="stylesheet">
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
	<body>
		<div class="top-template"> 
			<img src="view/template/logo.jpg"  alt="logo"  class="logo">
			<ul class="link-menu">
				<li><a href="/cat/developers/" target="_self"> Link1 </a></li>
				<li><a href="/cat/developers/" target="_self"> Link2 </a></li>
				<li><a href="/cat/developers/" target="_self"> Link3 </a></li>	
			</ul>		
		</div>
		<ul class="main-menu">
				<li><a href="#home">Accueil</a></li>
				<li><a href="#news">News</a></li>
			   <li><a href="?p=traducteurlist">Traducteurs</a></li>
			   <li><a href="#news">Recrutement</a></li>
			   <li><a href="#news">A propos</a></li>
		</ul>
		<div class="diaporama" style="height: 30%;width: 80%;margin-left: 10%;margin-right: 10%;">
			<img class="slide" src="view/template/diaporama_images/1.jpeg" style="width:100%;height:100%;display:none;border-radius: 8px;">
			<img class="slide" src="view/template/diaporama_images/2.jpeg" style="width:100%;height:100%;display:none;border-radius: 8px;">
			<img class="slide" src="view/template/diaporama_images/3.jpeg" style="width:100%;height:100%;display:none;border-radius: 8px;">
		</div>



		<?php
        echo $content;
		?>
		


		<footer>
				<ul class="main-menu">
						<li><a href="#home">Home</a></li>
						<li><a href="#news">News</a></li>
					   <li><a href="#news">Traduction</a></li>
					   <li><a href="#news">Recrutement</a></li>
					   <li><a href="#news">A propos</a></li>
				</ul>
		</footer>
	</body>
</html>
