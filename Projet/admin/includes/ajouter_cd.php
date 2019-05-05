<?php 
if(isset($_POST['create_Courrier'])){

    $num=$_POST['num'];
    $objet=$_POST['objet'];
    $ref=$_POST['ref'];
    $type=$_POST['typ'];
    $des=$_POST['des'];

    $query="INSERT INTO courrier_depart(num_depart,objet_depart,date_depart,reference_depart,type_depart,destinataire) ";
    $query .="VALUES({$num},'{$objet}',now(),'{$ref}','{$type}','{$des}') ";
    $add_cd=mysqli_query($connection,$query);

    if(!$add_cd){
        die('Connection Fialed'.mysqli_error($add_cd));
    }
}

?>

<form action="" method="post">    
     

     
     <div class="form-group">
        <label for="title">N° de départ</label>
         <input type="text" class="form-control" name="num">
     </div>

       <div class="form-group">
        <label for="title">Objet départ</label>
         <input type="text" class="form-control" name="objet">
     </div>

 


   <div class="form-group">
        <label for="title">Référence départ</label>
         <input type="text" class="form-control" name="ref">
     </div>


   <div class="form-group">
        <label for="title">Type départ</label>
         <input type="text" class="form-control" name="typ">
     </div>


   <div class="form-group">
        <label for="title">Destinataire</label>
         <input type="text" class="form-control" name="des">
     </div>





     
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_Courrier" value="Ajouter Courrier">
     </div>


</form>
   