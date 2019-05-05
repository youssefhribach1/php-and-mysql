<?php 
if(isset($_GET['Modifier'])){
    $the_id=$_GET['Modifier'];
}

$query="SELECT * FROM  courrier_depart WHERE num_depart={$the_id} ";
$select_cd=mysqli_query($connection,$query);

if(!$select_cd){
    die('Connection Fialed'.mysqli_error($select_cd));
   }

   while($row=mysqli_fetch_assoc($select_cd)){
       $num=$row['num_depart'];
       $objet=$row['objet_depart'];
       $ref=$row['reference_depart'];
       $type=$row['type_depart'];
       $des=$row['destinataire'];
   }


 
  if(isset($_POST['update_Courrier'])){

    $num=$_POST['num'];
    $objet=$_POST['objet'];
    $ref=$_POST['ref'];
    $type=$_POST['typ'];
    $des=$_POST['des'];

    $query="UPDATE courrier_depart SET ";
    $query .="num_depart={$num}, ";
    $query .="objet_depart='{$objet}', ";
    $query .="date_depart=now(), ";
    $query .="reference_depart='{$ref}', ";
    $query .="type_depart='{$type}', ";
    $query .="destinataire='{$des}' ";
    $query .="WHERE num_depart={$the_id} ";
    $update_cd=mysqli_query($connection,$query);
    if(!$select_cd){
        die('Connection Fialed'.mysqli_error($update_cd));
       }
  }

?>

<form action="" method="post">    
     

     
     <div class="form-group">
        <label for="title">N° de départ</label>
         <input type="text" value="<?php if(isset($num)){echo $num;} ?>" class="form-control" name="num">
     </div>

       <div class="form-group">
        <label for="title">Objet départ</label>
         <input type="text"  value="<?php if(isset($objet)){echo $objet;} ?>" class="form-control" name="objet">
     </div>

 


   <div class="form-group">
        <label for="title">Référence départ</label>
         <input type="text"  value="<?php if(isset($ref)){echo $ref;} ?>" class="form-control" name="ref">
     </div>


   <div class="form-group">
        <label for="title">Type départ</label>
         <input type="text"  value="<?php if(isset($type)){echo $type;} ?>" class="form-control" name="typ">
     </div>


   <div class="form-group">
        <label for="title">Destinataire</label>
         <input type="text"  value="<?php if(isset($des)){echo $des;} ?>" class="form-control" name="des">
     </div>





     
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_Courrier" value="Modifier Courrier">
     </div>


</form>
   