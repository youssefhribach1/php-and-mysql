



<?php session_start();?>
<?php include "db.php"; ?>


<?php

if(isset($_POST['login'])){
 $username=$_POST['username'];
 $password=$_POST['password'];
   $username=mysqli_real_escape_string($connection,$username);
   $password=mysqli_real_escape_string($connection,$password);

$query="SELECT * FROM users WHERE username='{$username}' ";
$select_user=mysqli_query($connection,$query);
if(!$select_user){
    die('Connection Failed:'.mysqli_error($select_user));
}
while($row=mysqli_fetch_assoc($select_user)){
    $realusername=$row['username'];
    $realpassword=$row['user_password'];
    $realuserrole=$row['user_role'];

}

if($username!==$realusername && $password!==$realpassword){

   
    header("Location: ../index.php");
}
else if($username==$realusername && $password==$realpassword){
     $_SESSION['uname']=$realusername;
     $_SESSION['urole']=$realuserrole;

   
    header("Location: ../admin");
}
else{
    header("Location: ../index.php");
}
}
?>