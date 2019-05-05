<div class="col-xs-15"> 
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
        <th>User Id</th>
        <th>User name</th>
        <th>User password</th>
        <th>User firstname</th>
        <th>User lastname</th>
        <th>User mail</th>
        <th>User image</th>
        <th>User role</th>
        <th>randsalt</th>
           </tr>
        </thead>

        <?php 
        $query="SELECT * FROM users";
        $select_all_posts=mysqli_query($connection,$query);

         if(!$select_all_posts){
        die('Connection Fialed'.mysqli_error($select_all_posts));
          }
    while($row=mysqli_fetch_assoc($select_all_posts)){
     $u_id=$row['user_id'];
     $u_n=$row['username'];
     $u_pw=$row['user_password'];
     $u_fn=$row['user_firstname'];
     $u_ln=$row['user_lastname'];
     $u_m=$row['user_mail'];
     $u_i=$row['user_image'];
     $u_r=$row['user_role'];
     $randsalt=$row['randsalt'];
   
        ?>


        <?php 
                if(isset($_GET['changetoadmin'])){
                $the_uid=$_GET['changetoadmin'];
                $query="UPDATE users SET user_role='admin' WHERE user_id={$the_uid} ";
                $changetoadmin=mysqli_query($connection,$query);
                if(!$changetoadmin){
                    die('Connection Fialed:'.mysqli_error($changetoadmin));
                }
             
                header("Location:index.php?source=desplayusers");
                }
        ?>


        
      
        <?php 
                if(isset($_GET['changetosubscriber'])){
                $the_uid=$_GET['changetosubscriber'];
                $query="UPDATE users SET user_role='subscriber' WHERE user_id={$the_uid} ";
                $changetosubscriber=mysqli_query($connection,$query);
                if(!$changetosubscriber){
                    die('Connection Fialed:'.mysqli_error($changetosubscriber));
                }
             
                header("Location:index.php?source=desplayusers");
                }
        ?>



        <?php
     echo "<tbody>";
     echo "<tr>";
     echo "<td>.$u_id.</td>";
     echo "<td>.$u_n.</td>";
     echo "<td>.$u_pw.</td>";
     echo "<td>.$u_fn.</td>";
     echo "<td>.$u_ln.</td>";
     echo "<td>.$u_m.</td>";
     echo "<td>.$u_i.</td>";
     echo "<td>.$u_r.</td>";
     echo "<td>.$randsalt.</td>";

     echo "<td><a href='index.php?source=edituser&editidu=$u_id'>Edit</a></td>";
     echo "<td><a href='index.php?source=desplayusers&changetoadmin=$u_id'>Approve</a></td>";
     echo "<td><a href='index.php?source=desplayusers&changetosubscriber=$u_id'>Unapprove</a></td>";
     echo "<td><a href='index.php?source=desplayusers&deleteidu=$u_id'>Delete</a></td>";

     echo "</tr>";
     echo "</tbody>";
    }
    
        ?>
    </table>
</div>
