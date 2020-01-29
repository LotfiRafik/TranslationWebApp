
<link href="view/css/profiles.css" rel="stylesheet">
<link href="view/forms/form2.css" rel="stylesheet">
<style>
	.infoDevis,.infoDemande
	{
		display: none; /* Hidden by default */
		padding : 10px;
		position: fixed; /* Stay in place */
		background-color:white;
		z-index: 1; /* Sit on top */
		top: 8%;
		left : 15%;
		height: 70%; /* Full height */
		width:60%;
		overflow-y: auto; /* Enable scroll if needed */overflow-x:hidden;
		border : 1px black solid;
	}
</style>
 <a href="javascript:history.back()"><i class="glyphicon glyphicon-arrow-left"></i>Retour</a>

<div class="container">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8">
             <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2 style="margin-bottom: 0;" >
                            <?php echo $data['infos']['lastname']." ".$data['infos']['firstname']; ?>
                        </h2>
                        <p><strong>
                            <?php echo $data['infos']['wilaya']." ".$data['infos']['commune'];?>
                            </strong></p>
                        <p><strong>Email: </strong>
                        <?php echo $data['infos']['email']?>
                        </p>
                        </p>
                        <p><strong>Adresse: </strong>
                        <?php echo $data['infos']['adress'];?>									</p>
                        </p>
    
                        <p><strong>Langues: </strong>
                        
                        <?php if(isset($data['infos']['langue1'])) ?><span class="tags"><?php echo $data['infos']['langue1'];?></span>
                        <?php if(isset($data['infos']['langue2'])) ?><span class="tags"><?php echo $data['infos']['langue2'];?></span>
                        <?php if(isset($data['infos']['langue3'])) ?><span class="tags"><?php echo $data['infos']['langue3'];?></span>
                        <?php if(isset($data['infos']['langue4'])) ?><span class="tags"><?php echo $data['infos']['langue4'];?></span>
                        <?php if(isset($data['infos']['langue5'])) ?><span class="tags"><?php echo $data['infos']['langue5'];?></span>
                        </p>
                    </div>             
                    <div class="col-sm-4">
                        <img src="Traducteurs/1/profile_picture.jpg" alt="" class="img-circle img-responsive" style="width:40%">
                        <figure>
                            <?php $etoile_vide = 5 - $data['moynote'];?>
                            <figcaption class="ratings">
                                <p>Note
                                <?php for($j=0;$j<$data['moynote'];$j++) { ?>
                                    <a href="#">
                                    <span class="fa fa-star"></span>
                                    </a>										
                                <?php }?>
                                <?php for($j=0;$j<$etoile_vide;$j++) { ?>
                                    <a href="#">
                                    <span class="fa fa-star-o"></span>
                                    </a>										
                                <?php }?>
                                </p>
                            </figcaption>
                        </figure> 
                    </div>
                </div>            
                <div class="col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong><?php echo $data['nb_traduction']?></strong></h2>                    
                        <p><small>Nombre de documents traduit</small></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong><?php echo $data['moynote']?></strong></h2>    
                                       
                        <p><small>Moyenne des<br>notes</small></p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong><?php echo $data['nbdemande']?></strong></h2>             
                        <p><small>Nombre demandes de <br>traductions</small></p>
                    </div>
                </div>
             </div>               
            </div>
        </div>
    </div>
<div class="container">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8">
             <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <a target="_blank" href="Traducteurs/<?php echo $data['infos']['id'];?>/CV.pdf">CV</a>
                    </div>             
                    <div class="col-xs-12 col-sm-8">
                        <a  target="_blank" href="Traducteurs/<?php echo $data['infos']['id'];?>/assermente.pdf">Document assermentation</a>
                    </div>             
                </div>            
             </div>               
            </div>
        </div>
    </div>




<div class="col-md-11">
			<br>
<div class="row">
<div class="col-xs-6 col-md-6">
			<h3>Historique des demandes de Devis</h6>
			<div class="ttable">
			<table class="table">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis ID</th>
			<th scope="col">Langue Source</th>
			<th scope="col">Langue Cible</th>
			<th scope="col">Date</th>
			<th scope="col">Offre soumit</th>
			</tr>
		</thead>
		<tbody id="devis_table" >
			<?php
		if($data['listDevis'])
		{	
			foreach ($data['listDevis'] as $devis)
			{
			?>
			<tr style="cursor: pointer ; " class="lien" >
				<th scope="row"><?php echo $devis['id'] ?></th>
				<td><?php echo $devis['langue_s'] ?></td>
				<td><?php echo $devis['langue_d'] ?></td>
				<td><?php echo $devis['date'] ?></td>
				<?php
						if($devis['offre'])
						{
					?>
							<td><i class="glyphicon glyphicon-ok" style="color:green"></i></td>
					<?php	
						}
						else
						{
						?>
							<td><i class="glyphicon glyphicon-remove" style="color:red"></i></td>
						<?php
						}
					?>
			</tr>
			<?php
			}
		}
			?>
		</tbody>
		</table>
		</div>
	</div>

		<?php
			$i = 0;
			if($data['listDevis'])
			{
			foreach ($data['listDevis'] as $devis)
			{
			?>
			<div class="infoDevis" id="infoDevis<?php echo $i?>">
				<button class="retourOffre pull-right btn-danger" type="button">x</button>	
				<h3>Informations Devis</h3>
				<div class="row">
					<div class="col-xs-3 col-md-3">
					Nom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['nom'] ?>">						
					</div>
					<div class="col-xs-3 col-md-3">
					Prenom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['prenom'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
					Email:<input type="text"  class="form-control input"  readonly placeholder="<?php echo $devis['email'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
					Téléphone:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['tel'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-md-3">
					Adresse:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['adresse'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						Langue Source:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_s'] ?>"></div>
					<div class="col-xs-3 col-md-3">
						Langue Cible:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_d'] ?>"></div>
					<div class="col-xs-3 col-md-3">
						Type Traduction:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['traduction_type'] ?>">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 col-md-3">
						Traducteur Assermente:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['assermente'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						Commentaire:<textarea type="text"  class="form-control input" readonly placeholder="<?php echo $devis['comment'] ?>"></textarea>
					</div>
					<div class="col-xs-3 col-md-3">
						Date :<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['date'] ?>">
					</div>
					<div class="col-xs-3 col-md-3">
						<br><i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank" href="?p=downDevis&did=<?php echo $devis['id']?>">Document_A_Traduire</a>
					</div>
				</div>
					<br>
					<?php
						if($devis['offre'])
						{?>
							<h3>L'offre soumit a cet devis:</h3>
							<div class="row">
								<div class="col-xs-6 col-md-6">
								<label>Prix en dinar algérien:</label><input type="number"  class="form-control input"  readonly placeholder="<?php echo $devis['offre']['prix'] ?>">
								</div>
								<div class="col-xs-6 col-md-6">
								<label>Date:</label><input type="text" readonly  class="form-control input"  placeholder="<?php echo $devis['offre']['date'] ?>">
								</div>
							</div>
						<?php
						}
						?>
			</div>
			<?php
			$i++;
			}
		}
			?>

<div class="col-xs-6 col-md-6">
<h3>Historique des demandes de Traduction</h6>
			<div class="ttable">
			<table class="table">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis ID</th>
			<th scope="col">Langue Source</th>
			<th scope="col">Langue Cible</th>
			<th scope="col">Date</th>
			<th scope="col">Traité</th>
			</tr>
		</thead>
		<tbody id="demande_table">
			<?php
		if($data['listDevis'] != false)
		{	
			foreach ($data['listDevis'] as $devis)
			{
				if($devis['demandeTrad'])
				{
					?>
					<tr style="cursor: pointer ; " class="lien" >
						<th scope="row"><?php echo $devis['id'] ?></th>
						<td><?php echo $devis['langue_s'] ?></td>
						<td><?php echo $devis['langue_d'] ?></td>
						<td><?php echo $devis['date'] ?></td>
					<?php
						if($devis['traduction'])
						{
					?>
							<td><i class="glyphicon glyphicon-ok" style="color:green"></i></td>
					<?php	
						}
						else
						{
						?>
							<td><i class="glyphicon glyphicon-remove" style="color:red"></i></td>
						<?php
						}
					?>
					</tr>
					<?php
				}
			}
		}
			?>
		</tbody>
		</table>
		</div>
	</div>
	</div>

		<?php
			$i = 0;
			if($data['listDevis'])
			{
			foreach ($data['listDevis'] as $devis)
			{
				if($devis['demandeTrad'])
				{
			?>
			<div class="infoDemande" id="infoDemande<?php echo $i?>">
				<button class="retourDemande pull-right btn-danger" type="button">x</button>	
				<h3>Informations sur la demande de traduction :</h3>
					<div class="row">
						<div class="col-xs-3 col-md-3">
						Nom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['nom'] ?>">						
						</div>
						<div class="col-xs-3 col-md-3">
						Prenom:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['prenom'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
						Email:<input type="text"  class="form-control input"  readonly placeholder="<?php echo $devis['email'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
						Téléphone:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['tel'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-md-3">
						Adresse:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['adresse'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
							Langue Source:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_s'] ?>"></div>
						<div class="col-xs-3 col-md-3">
							Langue Cible:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['langue_d'] ?>"></div>
						<div class="col-xs-3 col-md-3">
							Type Traduction:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['traduction_type'] ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-md-3">
							Traducteur Assermente:<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['assermente'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
							Commentaire:<textarea type="text"  class="form-control input" readonly placeholder="<?php echo $devis['comment'] ?>"></textarea>
						</div>
						<div class="col-xs-3 col-md-3">
							Date :<input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['date'] ?>">
						</div>
						<div class="col-xs-3 col-md-3">
							<br><i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank" href="?p=downDevis&did=<?php echo $devis['id']?>">Document_A_Traduire</a>
						</div>
					</div>
					<br>
					<?php
					if($devis['traduction'])
					{	
						?>
						<div class="row">
							<div class="col-xs-6 col-md-6">
								<h3>Feedback du client :</h3>
								<label>Note:</label><input type="text"  class="form-control input" readonly placeholder="<?php echo $devis['traduction']['note'] ?>">
							</div>
							<?php
							if($devis['signalementClient'])
							{
							?>
								<div class="col-xs-6 col-md-6">
									<h3>Signalement du client :</h3>
									<div class="row">
									<div class="col-md-6">
										<label>Description</label>:<textarea class="form-control input" type="text" readonly placeholder="<?php echo $devis['signalementClient']['description'] ?>"></textarea>
									</div>
									<div class="col-md-6">
										<label>Date</label><input class="form-control input" type="text" readonly placeholder="<?php echo $devis['signalementClient']['date']?>">
									</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
						<?php 
						if($devis['signalement'])
						{
						?>
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<h3> Signalement du traducteur :</h3>
								<div class="row">
									<div class="col-md-6">
										<label>Description</label>:<textarea class="form-control input" type="text" readonly placeholder="<?php echo $devis['signalement']['description'] ?>"></textarea>
									</div>
									<div class="col-md-6">
										<label>Date</label><input class="form-control input" type="text" readonly placeholder="<?php echo $devis['signalement']['date']?>">
									</div>
								</div>
							</div>
						</div>
						<?php
						}
					}
					?>
			</div>
			<?php
							$i++;

				}
			}
		}
			?>

<script type="text/javascript" src="view/js/traducteur_home.js"></script>


