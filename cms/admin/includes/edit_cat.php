
<?php  
  if(isset($_GET['editid'])){
  $the_editcat=$_GET['editid'];
  }
  $query="SELECT * FROM categories WHERE cat_id={$the_editcat} ";
  $select_edit_cat=mysqli_query($connection,$query);
  if(!$select_edit_cat){
      die('Connection Failed '.mysqli_error($select_edit_cat));
  }
  while($rows=mysqli_fetch_assoc($select_edit_cat)){
      $catid=$rows['cat_id'];
      $cattitle=$rows['cat_title'];
  }


  if(isset($_POST['update_cat'])){
      $the_new_cat_id=$_POST['cat_id'];
      $the_new_cat_title=$_POST['cat_title'];

      $query="UPDATE categories SET ";
      $query.="cat_id={$the_new_cat_id}, ";
      $query.="cat_title='{$the_new_cat_title}' ";
      $query.="WHERE cat_id={$the_editcat}";
      $update_cat=mysqli_query($connection,$query);
      if(!$update_cat){
          die('Connection Fialed'.mysqli_error($update_cat));
      }

      header("Location:index.php?source=desplaycat");
     }


?>

<form action="" method="post">

<div class="form-group">

         <label for="title">Cat Id</label>
          <input  style="width:200px;"  value="<?php if(isset($catid)){echo $catid;}?>" type="text" class="form-control" name="cat_id">
      </div>

 <div class="form-group">
         <label for="title">Cat Title</label>
          <input   type="text" value="<?php if(isset($cattitle)){echo $cattitle;}?>" class="form-control" name="cat_title">
      </div>

               

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
      </div>


</form>