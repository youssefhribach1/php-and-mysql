<?php 
$connection=mysqli_connect("localhost","root","","cmssystem");
if(!$connection){
    die('Connection Fialed'.mysqli_error($connection));
}
?>