
		<div class="col-md-12">
		<a href="javascript:history.back()"><i class="glyphicon glyphicon-arrow-left"></i>Retour</a>

<div class="container">
        <div class="row">
             <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2 style="margin-bottom: 0;" >
                            <?php echo $data['clientInfo']['lastname']." ".$data['clientInfo']['firstname']; ?>
                        </h2>
                        <p><strong>
                            <?php echo $data['clientInfo']['wilaya']." ".$data['clientInfo']['commune'];?>
                            </strong></p>
                        <p><strong>Email: </strong>
                        <?php echo $data['clientInfo']['email']?>
                        </p>
                        </p>
                        <p><strong>Adresse: </strong>
                        <?php echo $data['clientInfo']['adress'];?>									</p>
                        </p>
						<p><strong>Téléphone: </strong>
                        <?php echo $data['clientInfo']['tel'];?>									</p>
                        </p><p><strong>Fax: </strong>
                        <?php echo $data['clientInfo']['fax'];?>									</p>
                    </div>           
                </div>            
             </div>               
        </div>
    </div>

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
