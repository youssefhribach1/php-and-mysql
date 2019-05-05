
<form action="" method="post">    
     

     
     <div class="form-group">
        <label for="title">N° de D'arrivée</label>
         <input type="text"  style="width:200px;"   class="form-control" name="num">
     </div>


     
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="rc" value="Rechercher">
     </div>


</form>
   

<div class="col-xs-12">

<table class="table table-bordered table-hover">

    <thead>
                    <tr>
                        <th>N° Arivée</th>
                        <th>Objet Arivée</th>
                        <th>Date Arivée</th>
                        <th>Référence Arivée</th>
                        <th>Type Arivée</th>
                        <th>Destinataire</th>
                    </tr>
                </thead>
                <tbody>

<?php 


$query = "SELECT * FROM courrier_arrivee";
$select_ca = mysqli_query($connection,$query);  

while($row = mysqli_fetch_assoc($select_ca)) {
$num_a = $row['num_arrivee'];
$objet_a = $row['objet_arrivee'];
$date_a = $row['date_arrivee'];
$reference_a = $row['reference_arrivee'];
$type_a = $row['type_arrivee'];
$des = $row['destinataire'];

echo "<tr>";

echo "<td>{$num_a}</td>";
echo "<td>{$objet_a}</td>";
echo "<td>{$date_a}</td>";
echo "<td>{$reference_a}</td>";
echo "<td>{$type_a}</td>";
echo "<td>{$des}</td>";

echo "<td><a href='index.php?res=courrier_ca&Supprimer2={$num_a}'>Supprimer</a></td>";
echo "<td><a href='index.php?res=modifier_ca&Modifier2={$num_a}'>Modifier</a></td>";
echo "</tr>";

}




?>




</tbody>
</table>

            </div>