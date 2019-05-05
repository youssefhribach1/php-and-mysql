

<?php  

if(isset($_Get['editid'])){
 $the_editid=$_GET['editid'];
}

$the_editid=$_GET['editid'];
$query="SELECT * FROM posts WHERE post_id={$the_editid} ";
$edit_posts=mysqli_query($connection,$query);

if(!$edit_posts){
    die('Connection Fialed'.mysqli_error($edit_posts));
}

while($row=mysqli_fetch_assoc($edit_posts)){
        
        $id=$row['post_id'];
        $title=$row['post_title'];
        $date=$row['post_date'];
        $image=$row['post_image'];
        $tags=$row['post_tags'];
        $content=$row['post_content'];  
}

if(isset($_POST['update_post'])){


    $post_id=$_POST['post_id'];
    $post_title=$_POST['post_title'];
    $post_image=$_FILES['image']['name'];
    $post_tags=$_POST['post_tags'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_content=$_POST['post_content'];  
    
    move_uploaded_file($post_image_temp, "../images/$post_image");

 if(empty($post_image)){
  
 $query="SELECT * FROM posts WHERE post_id={$the_editid} ";
 $select_image=mysqli_query($connection,$query);
 
 if(!$select_image){
     die('Connection Fialed'.mysqli_error($select_image));
 }

 while($img=mysqli_fetch_assoc($select_image)){
     $post_image=$img['post_image'];
 }
 }

    $query="UPDATE posts SET ";
    $query .="post_id={$post_id}, ";
    $query .="post_title='{$post_title}', ";
    $query .="post_date=now(), ";
    $query .="post_image='{$post_image}', ";
    $query .="post_tags='{$post_tags}', ";
    $query .="post_content='{$post_content}' ";
    $query .="WHERE post_id={$the_editid} ";

    $update_posts=mysqli_query($connection,$query);

    if(!$update_posts){
        die('Connection Fialed'.mysqli_error($update_posts));
    }

     header("Location:index.php?source='desplayallposts'");
}


?>

<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
         <label for="title">Post Id</label>
          <input  style="width:200px;"  value="<?php if(isset($id)){echo $id;}?>" type="text" class="form-control" name="post_id">
      </div>

 <div class="form-group">
         <label for="title">Post Title</label>
          <input   type="text" value="<?php if(isset($title)){echo $title;}?>" class="form-control" name="post_title">
      </div>

          
      
    <div class="form-group">
       <img width="100" src="../images/<?php if(isset($image)){echo $image;}?>" alt="img">
       <input  type="file" name="image" >
      </div>



 <div class="form-group">
         <label for="title">Post Tags</label>
          <input   type="text" value="<?php if(isset($tags)){echo $tags;}?>" class="form-control" name="post_tags">
      </div>



      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea  class="form-control" name="post_content" id="" cols="30" rows="10"><?php  if(isset($content)){ echo $content;} ?>
         
         </textarea>
         </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>



</form>