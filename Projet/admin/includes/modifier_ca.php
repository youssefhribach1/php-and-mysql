
<?php 
if(isset($_GET['Modifier2'])){
    $the_id=$_GET['Modifier2'];
}

$query="SELECT * FROM  courrier_arrivee WHERE num_arrivee={$the_id} ";
$select_cd=mysqli_query($connection,$query);

if(!$select_cd){
    die('Connection Fialed'.mysqli_error($select_cd));
   }

   while($row=mysqli_fetch_assoc($select_cd)){
       $num=$row['num_arrivee'];
       $objet=$row['objet_arrivee'];
       $ref=$row['reference_arrivee'];
       $type=$row['type_arrivee'];
       $des=$row['destinataire'];
   }


 
  if(isset($_POST['create_Courrier_arv'])){

    $num=$_POST['num'];
    $objet=$_POST['objet'];
    $ref=$_POST['ref'];
    $type=$_POST['typ'];
    $des=$_POST['des'];

    $query="UPDATE courrier_arrivee SET ";
    $query .="num_arrivee={$num}, ";
    $query .="objet_arrivee='{$objet}', ";
    $query .="date_arrivee=now(), ";
    $query .="reference_arrivee='{$ref}', ";
    $query .="type_arrivee='{$type}', ";
    $query .="destinataire='{$des}' ";
    $query .="WHERE num_arrivee={$the_id} ";

    $update_cd=mysqli_query($connection,$query);

    if(!$select_cd){
        die('Connection Fialed'.mysqli_error($update_cd));
       }
  }

?>


<form action="" method="post" >    
     
     
     <div class="form-group">
        <label for="title">N° de arrivée</label>
         <input type="text" value="<?php if(isset($num)){echo $num;} ?>"  class="form-control" name="num">
     </div>

       <div class="form-group">
        <label for="title">Objet arrivée</label>
         <input type="text" value="<?php if(isset($objet)){echo $objet;} ?>" class="form-control" name="objet">
     </div>



   <div class="form-group">
        <label for="title">Référence arrivée</label>
         <input type="text" value="<?php if(isset($ref)){echo $ref;} ?>"  class="form-control" name="ref">
     </div>


   <div class="form-group">
        <label for="title">Type arrivée</label>
         <input type="text" value="<?php if(isset($type)){echo $type;} ?>" class="form-control" name="typ">
     </div>


   <div class="form-group">
        <label for="title">Destinataire</label>
         <input type="text" value="<?php if(isset($des)){echo $des;} ?>" class="form-control" name="des">
     </div>





     
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_Courrier_arv" value="Modifier Courrier">
     </div>


</form>
   