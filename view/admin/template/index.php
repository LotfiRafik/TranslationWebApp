<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="view/admin/template/template.css" rel="stylesheet">		
		<link href="view/css/sign.css" rel="stylesheet">		
		<link href="view/css/form2.css" rel="stylesheet">
		<link href="view/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="view/css/font-awesome.min.css" rel="stylesheet">
		<link href="view/css/fontawesome.min.css" rel="stylesheet" type="text/css">

		<link href="view/css/tableaustyle.css" rel="stylesheet">
		<script type="text/javascript" src="view/js/jquery-3.3.1.js"></script>

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


		<?php
        echo $content;
		?>




		 <br><br><br>


		
	</body>
</html>
