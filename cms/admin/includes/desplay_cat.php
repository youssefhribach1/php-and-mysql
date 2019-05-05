<div class="col-xs-6">
<table class="table table-bordered table-hover">
<thead>
<tr>
  <th>Id Category</th>
  <th>Title Category</th>
</tr>
</thead>

<?php 
  $query="select * from categories";
  $select_all_cat=mysqli_query($connection,$query);
  if(!$select_all_cat){
      die('Connection Fialed'.mysqli_error($select_all_cat));
  }

  while($row=mysqli_fetch_assoc($select_all_cat)){
      $the_id=$row['cat_id'];
      $the_title=$row['cat_title'];
      ?>
   <?php
   echo "<tbody>";
   echo "<tr>";
   echo "<td>$the_id</td>";
   echo "<td>$the_title</td>";
   echo "<td><a href='index.php?source=desplaycat&deleteid=$the_id'>Delete</a></td>";
   echo "<td><a href='index.php?source=editcat&editid=$the_id'>Edit</a></td>";
   echo "</tbody>";
   echo "</tr>";

   ?>

  <?php } ?>

</table>
</div>