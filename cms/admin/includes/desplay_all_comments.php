<div class="col-xs-15"> 
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
        <th>Comment Id</th>
        <th>Comment Post ID</th>
        <th>Date</th>
        <th>author's</th>
        <th>comment title</th>
        <th>author mail</th>
        <th>status</th>
           </tr>
        </thead>

        <?php 
        $query="SELECT * FROM comments";
        $select_all_posts=mysqli_query($connection,$query);

         if(!$select_all_posts){
        die('Connection Fialed'.mysqli_error($select_all_posts));
          }
    while($row=mysqli_fetch_assoc($select_all_posts)){
     $c_id=$row['comment_id'];
     $c_p_id=$row['comment_post_id'];
     $c_date=$row['comment_date'];
     $c_author=$row['comment_author'];
     $c_title=$row['comment_title'];
     $c_mail=$row['author_mail'];
     $c_status=$row['status'];
   
        ?>


        <?php 
                if(isset($_GET['approve'])){
                $the_cid=$_GET['approve'];
                $query="UPDATE comments SET status='Approved' WHERE comment_id={$the_cid} ";
                $approved_comments=mysqli_query($connection,$query);
                if(!$approved_comments){
                    die('Connection Fialed:'.mysqli_error($approved_comments));
                }
             
                header("Location:http://localhost/projets/cms/admin/index.php?source=desplayallcomments");
                }
        ?>


        
        <?php 
                if(isset($_GET['unapprove'])){
                $the_cid=$_GET['unapprove'];
                $query="UPDATE comments SET status='Unapprove' WHERE comment_id={$the_cid} ";
                $unapprove_comments=mysqli_query($connection,$query);
                if(!$unapprove_comments){
                    die('Connection Fialed:'.mysqli_error($unapprove_comments));
                }

             header("Location:http://localhost/projets/cms/admin/index.php?source=desplayallcomments");

                }
        ?>



        <?php
     echo "<tbody>";
     echo "<tr>";
     echo "<td>.$c_p_id.</td>";
     echo "<td>.$c_id.</td>";
     echo "<td>.$c_date.</td>";
     echo "<td>.$c_author.</td>";
     echo "<td>.$c_title.</td>";
     echo "<td>.$c_mail.</td>";
     echo "<td>.$c_status.</td>";
     echo "<td><a href='http://localhost/projets/cms/post.php?thepostid=$c_p_id'>the post</a></td>";
     echo "<td><a href='index.php?source=desplayallcomments&approve=$c_id'>Approve</a></td>";
     echo "<td><a href='index.php?source=desplayallcomments&unapprove=$c_id'>Unapprove</a></td>";
     echo "<td><a href='index.php?source=desplayallcomments&deleteidc=$c_id'>Delete</a></td>";

     echo "</tr>";
     echo "</tbody>";
    }
    
        ?>
    </table>
</div>
