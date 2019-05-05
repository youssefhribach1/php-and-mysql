

<?php

if(isset($_POST['add_user']))
{
    $u_id=$_POST['u_id'];
    $u_n=$_POST['u_n'];
    $u_pw=$_POST['u_pw'];
    $u_fn=$_POST['u_fn'];
    $u_ln=$_POST['u_ln'];
    $u_m=$_POST['u_m'];
    $user_image=$_FILES['image']['name'];
    $user_image_temp=$_FILES['image']['tmp_name'];
    $u_r=$_POST['u_r'];
    $randsalt=$_POST['randsalt'];
   
   
    move_uploaded_file($user_image_temp, "../images/$user_image");

    $query="INSERT INTO users(user_id,username,user_password,user_firstname,user_lastname,user_mail,user_image,user_role,randsalt) ";
    $query .="VALUES ({$u_id},'{$u_n}','{$u_pw}','{$u_fn}','{$u_ln}','{$u_m}','{$user_image}','{$u_r}','{$randsalt}') ";
    $insert_posts=mysqli_query($connection,$query);

    if(!$insert_posts){
        die('Connection Fialed'.mysqli_error($insert_posts));
    }
}
?>



<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
         <label for="title">User id</label>
          <input  style="width:200px;"  type="text" class="form-control" name="u_id">
      </div>

       <div class="form-group">
       <label for="title">Username</label>
       <input   type="text" class="form-control" name="u_n">
       </div>

        <div class="form-group">
       <label for="title">User password</label>
       <input   type="password" class="form-control" name="u_pw">
       </div>

           <div class="form-group">
       <label for="title">User firs name</label>
       <input   type="text" class="form-control" name="u_fn">
       </div>

           <div class="form-group">
       <label for="title">User last name</label>
       <input   type="text" class="form-control" name="u_ln">
       </div>


   <div class="form-group">
       <label for="title">User mail</label>
       <input   type="text" class="form-control" name="u_m">
       </div>
                
        <div class="form-group">
        <label for="title">User image</label>
        <input  type="file" name="image">
        </div>

    


        <div class="form-group">
        <label for="title">User role</label>
       <select name="u_r" id="">
       <option value="subscriber">Select option</option> 
       <option value="admin">Admin</option> 
       <option value="subscriber">Subscriber</option> 
       </div>

        <div class="form-group">
       <label for="title">randsalt</label>
       <input   type="text" class="form-control" name="randsalt">
       </div>
      
      

       <div class="form-group">
       <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
       </div>

     </form>