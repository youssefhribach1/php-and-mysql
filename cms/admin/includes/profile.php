

<?php

   $username=$_SESSION['uname']; 
$query="SELECT * FROM users WHERE username='{$username}' ";
        $select_user=mysqli_query($connection,$query);

         if(!$select_user){
        die('Connection Fialed'.mysqli_error($select_user));
          }
    while($row=mysqli_fetch_assoc($select_user)){
     
        $u_id=$row['user_id'];
     $u_n=$row['username'];
     $u_pw=$row['user_password'];
     $u_fn=$row['user_firstname'];
     $u_ln=$row['user_lastname'];
     $u_m=$row['user_mail'];
     $u_i=$row['user_image'];
     $u_r=$row['user_role'];
     $randsalt=$row['randsalt'];

    }
    


if(isset($_POST['update_user']))
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


    if(empty($user_image)){
        $query="SELECT * FROM users ";
        $select_img=mysqli_query($connection,$query);
        if(!$select_img){
            die('we cant select image'.mysqli_error($select_img));
        }
       while($row=mysqli_fetch_assoc($select_img)){
           $user_image=$row['user_image'];
       }
    }

    $query="UPDATE  users SET ";

    $query .=" username='{$u_n}', ";
    $query .=" user_password='{$u_pw}', ";
    $query .=" user_firstname='{$u_fn}', ";
    $query .=" user_lastname='{$u_ln}', ";
    $query .=" user_mail='{$u_m}', ";
    $query .=" user_image='{$user_image}', ";
    $query .=" user_role='{$u_r}', ";
    $query .=" randsalt='{$randsalt}' ";
    $query .=" WHERE username='{$username}' ";
    
    $update_user=mysqli_query($connection,$query);

    if(!$update_user){
        die('Connection Fialed'.mysqli_error($update_user));
    }

    
}




?>


   

<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
         <label for="User id">User id</label>
          <input  style="width:200px;" value="<?php if(isset($u_id)){echo $u_id;} ?>" type="text" class="form-control" name="u_id">
      </div>

       <div class="form-group">
       <label for="Username">Username</label>
       <input   type="text" value="<?php if(isset($u_n)){echo $u_n;} ?>" class="form-control" name="u_n">
       </div>

        <div class="form-group">
       <label for="User password">User password</label>
       <input   type="password" value="<?php if(isset($u_pw)){echo $u_pw;} ?>"  class="form-control" name="u_pw">
       </div>

           <div class="form-group">
       <label for="User firs name">User firs name</label>
       <input   type="text" value="<?php if(isset($u_fn)){echo $u_fn;} ?>" class="form-control" name="u_fn">
       </div>

           <div class="form-group">
       <label for="User last name">User last name</label>
       <input   type="text" value="<?php if(isset($u_ln)){echo $u_ln;} ?>" class="form-control" name="u_ln">
       </div>


   <div class="form-group">
       <label for="User mail">User mail</label>
       <input   type="text" value="<?php if(isset($u_m)){echo $u_m;} ?>"  class="form-control" name="u_m">
       </div>
      
        <div class="form-group">
        <img width="100" src="../images/<?php if(isset($u_i)){echo $u_i;}?>" alt="user image">
        <label for="User image">User image</label>
        <input  type="file" name="image">
        </div>
    


        <div class="form-group">
        <label for="User role">User role</label>
       <select name="u_r" id="">
       <option value="subscriber"><?php if(isset($u_r)){echo $u_r;}?></option> 
       
       <?php
       if($u_r == 'subscriber'){
       echo "<option value='admin'>Admin</option>"; 
       }
       else{
       echo"<option value='subscriber'>Subscriber</option>"; 
       }
       ?>
       </select>
       </div>


        <div class="form-group">
       <label for="randsalt">randsalt</label>
       <input   type="text" value="<?php if(isset($randsalt)){echo $randsalt;} ?>"  class="form-control" name="randsalt">
       </div>
      
      

       <div class="form-group">
       <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
       </div>

     </form>


 