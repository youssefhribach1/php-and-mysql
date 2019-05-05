

<?php 
if(isset($_POST['Add_cat'])){
    $thecat_id=$_POST['cat_id'];
    $thecat_title=$_POST['cat_title'];

    $query="INSERT INTO categories(cat_id,cat_title) ";
    $query.="VALUES({$thecat_id},'{$thecat_title}') ";
    $add_category=mysqli_query($connection,$query);

    if(!$add_category){
        die('Connection Failed'.mysqli_error($add_category));
    }
}
?>

<form action="" method="post">

<div class="form-group">

         <label for="title">Cat Id</label>
          <input  style="width:200px;"  type="text" class="form-control" name="cat_id">
      </div>

 <div class="form-group">
         <label for="title">Cat Title</label>
          <input   type="text"  class="form-control" name="cat_title">
      </div>

               

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="Add_cat" value="Add Category">
      </div>


</form>