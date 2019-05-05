<?php
$connection=mysqli_connect("localhost","root","","gc");

if(!$connection){
    die('Conncetion Fialed'.mysqli_error($connection));
}
?>