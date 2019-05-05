
<form action="" method="post">    
     

     
     <div class="form-group">
        <label for="title">N° de Départ</label>
         <input type="text" style="width:200px;"  class="form-control" name="num">
     </div>


     
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="dc" value="Rechercher">
     </div>


</form>

<div class="col-xs-12">

<table class="table table-bordered table-hover">

    <thead>
                    <tr>
                        <th>N° Départ</th>
                        <th>Objet Départ</th>
                        <th>Date Départ</th>
                        <th>Référence Départ</th>
                        <th>Type Départ</th>
                        <th>Destinataire</th>
                    </tr>
                </thead>
                <tbody>

<?php 


$query = "SELECT * FROM courrier_depart";
$select_cd = mysqli_query($connection,$query);  

while($row = mysqli_fetch_assoc($select_cd)) {
$num_d = $row['num_depart'];
$objet_d = $row['objet_depart'];
$date_d = $row['date_depart'];
$reference_d = $row['reference_depart'];
$type_d = $row['type_depart'];
$des = $row['destinataire'];

echo "<tr>";

echo "<td>{$num_d}</td>";
echo "<td>{$objet_d}</td>";
echo "<td>{$date_d}</td>";
echo "<td>{$reference_d}</td>";
echo "<td>{$type_d}</td>";
echo "<td>{$des}</td>";

echo "<td><a href='index.php?res=courrier_cd&Supprimer={$num_d}'>Supprimer</a></td>";
echo "<td><a href='index.php?res=modifier_cd&Modifier={$num_d}'>Modifier</a></td>";
echo "</tr>";

}




?>




</tbody>
</table>

            </div>