<div class="col-xs-15"> 
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
        <th>Id</th>
        <th>Session</th>
        <th>Time</th>
      
           </tr>
        </thead>

        <?php 
        $query="SELECT * FROM users_online";
        $select_users_online=mysqli_query($connection,$query);

         if(!$select_all_posts){
        die('Connection Fialed'.mysqli_error($select_users_online));
          }
    while($row=mysqli_fetch_assoc($select_users_online)){
     $id=$row['id'];
     $session=$row['session'];
     $time=$row['time'];

   
        ?>


        

        <?php
     echo "<tbody>";
     echo "<tr>";
     echo "<td>.$id.</td>";
     echo "<td>.$session.</td>";
     echo "<td>.$time.</td>";
  
     echo "</tr>";
     echo "</tbody>";
    }
    
        ?>
    </table>
</div>
