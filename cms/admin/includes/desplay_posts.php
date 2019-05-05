<div class="col-xs-10"> 
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Date</th>
        <th>Image</th>
        <th>tags</th>
        <th>Content</th>
           </tr>
        </thead>

        <?php 
        $query="SELECT * FROM posts";
        $select_all_posts=mysqli_query($connection,$query);

         if(!$select_all_posts){
        die('Connection Fialed'.mysqli_error($select_all_posts));
          }
    while($row=mysqli_fetch_assoc($select_all_posts)){
     $id=$row['post_id'];
     $title=$row['post_title'];
     $date=$row['post_date'];
     $image=$row['post_image'];
     $tags=$row['post_tags'];
     $content=$row['post_content'];


        ?>
   
     
        <?php
    
       
     echo "<tbody>";
     echo "<tr>";
     echo "<td>.$id.</td>";
     echo "<td>.$title.</td>";
     echo "<td>.$date.</td>";
     echo "<td><img width='100' src='../images/$image' alt='image'></td>";
     echo "<td>.$tags.</td>";
     echo "<td>.$content.</td>";
     echo "<td><a href='index.php?source=desplayallposts&deleteid=$id'>Delete</a></td>";
     echo "<td><a href='index.php?source=editpost&editid=$id'>Edit</a></td>";
     echo "</tr>";
     echo "</tbody>";
    }
        ?>
    </table>
</div>
