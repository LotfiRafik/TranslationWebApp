
<div class="container">
<div class="row">
 <div class="col-md-12">

 <h3> Liste des Clients</h6>
      <input type="text" class="form-control col-md-5" id="myInput" onkeyup="myFunction()" placeholder="Rechercher">
			<div class="ttable">
			<table class="table" id="myTable">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">ID</th>
            <th scope="col">Nom
            <i  onclick="sortTable(0)" class="fa fa-sort-alpha-down"> </i>
            </th>
            
			<th scope="col">Prenom
            <i  onclick="sortTable(1)" class="fa fa-sort-alpha-down"> </i>
            </th>
			<th scope="col">Email
            <i  onclick="sortTable(2)" class="fa fa-sort-alpha-down"> </i>
            </th>
			<th scope="col">Wilaya
            <i  onclick="sortTable(3)" class="fa fa-sort-alpha-down"> </i>
            </th>
            <th scope="col"></th>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
        $i = 0;
		if($data['clients'])
		{
			foreach ($data['clients'] as $client)
			{?>

			<tr  style="cursor: pointer ; " class="lien" >
				<th scope="row"><?php echo $client['id'] ?></th>
				<td><?php echo $client['lastname'] ?></td>
				<td><?php echo $client['firstname'] ?></td>
				<td><?php echo $client['email'] ?></td>
				<td><?php echo $client['wilaya'] ?></td>
                <td><button class="btn-editClient btn btn-primary">Modifier</button></td>
                <?php if($client['idbloquer']) {?>
                    <td><a  href="?p=debloquerClient&id=<? echo $client['id'] ?>" ><button class="btn btn-success">Debloquer</button></a></td>
                <?php
                }
                else{?>
                                    <td><a  href="?p=bloquerClient&id=<? echo $client['id'] ?>" ><button class="btn btn-danger">Bloquer</button></a></td>
                <?php 
            }?>
			</tr>


            <div id="editClient<?php echo $i?>" class="editClient sign" style="display:none">
				<form class="sign-content" method="POST" action="?p=editClient">
					<span class="retourEdit" >&times;</span>
					<div class="sign-container">
					<div class="row">	
						<div class="col-xs-6 col-md-6">
						<h1>Modifier</h1>
						</div>
					</div>
					<div class="row">
							<div class="col-xs-6 col-md-6">
								<input required type="text" name="lastname"  class="form-control input-lg"  value="<?php echo $client['lastname'];?>"  />
							</div>
							<div class="col-xs-6 col-md-6">
								<input required type="text" name="firstname"  class="form-control input-lg" value="<?php echo $client['firstname']?>" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-md-6">
								<input  required type="number" name="tel"  class="form-control input-lg" value="<?php echo $client['tel']?>"  />
							</div>
							<div class="col-xs-6 col-md-6">
								<input required type="number" name="fax"  class="form-control input-lg" value="<?php echo $client['fax']?>" />
							</div>
						</div>
						<input  type="password" name="password"  class="form-control input-lg" placeholder="Mot de Passe*"  /><input type="password" name="rpassword"  class="form-control input-lg" placeholder="Confirmer Mot de Passe*"  /> 
                        <input  type="hidden" name="id" value=<?php echo $client['id'] ?> /> 
                        <br/>		
						<div class="row">
							<div class="col-xs-6 col-md-6">
							<button type="button" class="retourEdit sign-cancelbtn">Annuler</button>
							</div>
							<div class="col-xs-6 col-md-6">
							<button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Enregistrer</button>  
							</div>
						</div>
					</div>
				</form>
				</div>


                

			<?php
            $i++;
			}
		}
			?>
		</tbody>
		</table>
		</div>


        


</div>
</div>
</div>


<script type="text/javascript" src="view/js/admin_gestionClient.js"></script>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, j,bool;
  input = document.getElementById("myInput");
  filter = input.value.toLowerCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

    for (i=1; i< tr.length; i++) 
    {
        found=false;
        for(j = 0; j<5; j++)
        {
        td = $('tr:eq('+i+')').find('td:eq('+j+')');
            if (td)
            {
                if (td.text().toLowerCase().indexOf(filter.toLowerCase()) > -1) 
                {
                    tr[i].style.display = "";
                    found=true;
                } 
            }
        }
        if (found==false)    tr[i].style.display = "none";
    }
}



function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
