
<div class="container">
<div class="row">
 <div class="col-md-12">

 <h3> Liste des Documents</h6>
      <input type="text" class="form-control col-md-5" id="myInput" onkeyup="myFunction()" placeholder="Rechercher">
			<div class="ttable">
			<table class="table" id="myTable">
			<thead  style ="background-color:#5BC0DE;"class="entet">
			<tr>
			<th scope="col">Devis_ID</th>
      <th scope="col">Document
            <i  onclick="sortTable(0)" class="fa fa-sort-alpha-down"> </i>
       </th>          
			<th scope="col">Type
            <i  onclick="sortTable(1)" class="fa fa-sort-alpha-down"> </i>
            </th>
			<th scope="col">Date
            <i  onclick="sortTable(2)" class="fa fa-sort-alpha-down"> </i>
            </th>
			<th scope="col">Client
            <i  onclick="sortTable(3)" class="fa fa-sort-alpha-down"> </i>
            </th>
      <th scope="col">Devis-Seulement</th>
      <th scope="col">Traducteur</th>
      <th scope="col">Document-Traduit</th>
      <th scope="col"></th>
			</tr>
		</thead>
		<tbody>
      <?php
		if($data['devis'])
		{
			foreach ($data['devis'] as $devis)
			{
        if($devis['traducteursId'])
        {
          $j = 0;
          foreach ($devis['traducteursId'] as $traducteurId)
          {?>
            <tr  style="cursor: pointer ; " class="lien" >
              <th scope="row"><?php echo $devis['id'] ?></th>
              <td><i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank" href="?p=downDevis&did=<?php echo $devis['id']?>"><?php echo $devis['file_path'] ?></td>
</a></td>
              <td>pdf</td>
              <td><?php echo $devis['date'] ?></td>
              <td><a target="_blank" href="?p=clientProfile&id=<? echo $devis['client_id'] ?>" ><button class="btn btn-info">Profile</button></a></td>
              <?php if($devis['demandeTraduction'][$j])
              {
                ?>								<td><i class="glyphicon glyphicon-ok" style="color:green"></i></td>

              <?php
              }
              else 
              {?>
              								<td><i class="glyphicon glyphicon-remove" style="color:red"></i></td>

             <?}
              ?>
              <td><a target="_blank" href="?p=traducteurProfile&id=<? echo $traducteurId ?>" ><button class="btn btn-info">Profile</button></a></td>
              <?php if($devis['traduction'][$j]) 
              {
                ?>                   
               <td><i class="glyphicon glyphicon-file" style="color:red;"></i><a target="_blank" href="?p=downDevis&did=<?php echo $devis['id']?>"><?php echo $devis['traduction'][$j]['file_path'] ?></td>

              <?php
              }
              else
              {
                ?> 
                <td>-</td>
              <?php
              }
              ?>
              <td><a href="?p=supDocument&did=<?php echo $devis['id']?>"><button class="btn-editdevis btn btn-danger">Supprimer</button></a></td>
          </tr>
      <?php
              $j++;
      		}
        }
			}
		}
			?>
		</tbody>
		</table>
		</div>


        


</div>
</div>
</div>


<script type="text/javascript" src="view/js/admin_gestiondevis.js"></script>

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
  dir = "asc";
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
