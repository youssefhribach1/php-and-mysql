<?php

function deletepost(){
global $connection;
if(isset($_GET['deleteid'])){
    $the_id=$_GET['deleteid'];

$query="DELETE FROM posts WHERE post_id={$the_id}";
$deleteR=mysqli_query($connection,$query);
      if(!$deleteR){
      die('Connection Fialed'.mysqli_error($deleteR));
      }

      header("Location:index.php?source=desplayallposts");

}


}

  function deletecat(){
      global $connection;
    if(isset($_GET['deleteid'])){
        $thecat_id=$_GET['deleteid'];
    $query="DELETE  FROM categories WHERE cat_id={$thecat_id} ";
    $deletecat=mysqli_query($connection,$query);
    if(!$deletecat){
        die('Connection Fialed '.mysqli_error($deletecat));
    }
    header("Location:index.php?source=desplaycat");
 
    }
  }




  
  function delete_commants(){
    global $connection;
    if(isset($_GET['deleteidc'])){
      $delete_id_c=$_GET['deleteidc'];
    $query="DELETE FROM comments WHERE  comment_id={$delete_id_c} ";
    $delete_commant=mysqli_query($connection,$query);

    if(!$delete_commant){
        die('Connection Fialed:'.mysqli_error($delete_commant));
    }

    header("Location:index.php?source=desplayallcomments");
    }
}

function delete_user(){
    global $connection;

    if(isset($_GET['deleteidu'])){
        $theuserid=$_GET['deleteidu'];

    $query="DELETE FROM users WHERE user_id={$theuserid} ";
    $delete_user=mysqli_query($connection,$query);
    if(!$delete_user){
        die('Connection Fialed:'.mysqli_error($delete_user));
    }

    header("Location:index.php?source=desplayusers");
    }

    
}





?>