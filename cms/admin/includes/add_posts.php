

<?php

if(isset($_POST['add_post']))
{
    $post_id=$_POST['post_id'];
    $post_title=$_POST['post_title'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];  
   
    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query="INSERT INTO posts(post_id,post_title,post_date,post_image,post_tags,post_content) ";
    $query .="VALUES ({$post_id},'{$post_title}',now(),'{$post_image}','{$post_tags}','{$post_content}') ";
    $insert_posts=mysqli_query($connection,$query);
    if(!$insert_posts){
        die('Connection Fialed'.mysqli_error($insert_posts));
    }
}
?>



<form action="" method="post" enctype="multipart/form-data">

 <div class="form-group">
         <label for="title">Post Id</label>
          <input  style="width:200px;"  type="text" class="form-control" name="post_id">
      </div>

       <div class="form-group">
       <label for="title">Post Title</label>
       <input   type="text" class="form-control" name="post_title">
       </div>

                
        <div class="form-group">
        <input  type="file" name="image">
        </div>

     <div class="form-group">
       <label for="title">Post Tags</label>
       <input   type="text" class="form-control" name="post_tags">
       </div>


         <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea  class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
         </div>
      
         <script>
      ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
       </script>
      

       <div class="form-group">
       <input class="btn btn-primary" type="submit" name="add_post" value="Add Post">
       </div>

     </form>