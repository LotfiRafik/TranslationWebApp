
		<div class="col-md-12">

			<h3> Historique des Devis</h6>
			<div class="ttable">
			<table class="table">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis ID</th>
			<th scope="col">Langue Source</th>
			<th scope="col">Langue Cible</th>
			<th scope="col">Nombre Traducteurs Disponibles</th>
			<th scope="col">Nombre d'offre</th>
			<th scope="col">Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
		if($data['listDevis'] != false)
		{
			foreach ($data['listDevis'] as $devis)
			{?>

			<tr  onclick="location.href='?p=clientDevis&amp;id=<?php echo $devis['id'] ?>'" style="cursor: pointer ; " class="lien" >
				<th scope="row"><?php echo $devis['id'] ?></th>
				<td><?php echo $devis['langue_s'] ?></td>
				<td><?php echo $devis['langue_d'] ?></td>
				<td><?php echo $devis['nb_traducteurs_dispo'] ?></td>
				<td><?php echo $devis['nb_offre']  ?></td>
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
		
				
<script type="text/javascript" src="view/js/client_home.js"></script>
