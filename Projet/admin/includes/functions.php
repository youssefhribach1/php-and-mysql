<?php


function delete_all_cd(){
    global $connection;
    
        if(isset($_GET['Supprimer'])){
        $num_d = $_GET['Supprimer'];
        $query = "DELETE FROM courrier_depart WHERE num_depart = {$num_d} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: index.php?res=courrier_cd");
    
    
        }
                
    
    
    }


    function delete_all_ca(){
        global $connection;
        
            if(isset($_GET['Supprimer2'])){
            $num_a = $_GET['Supprimer2'];
            $query = "DELETE FROM courrier_arrivee WHERE num_arrivee= {$num_a} ";
            $delete_query = mysqli_query($connection,$query);
            header("Location: index.php?res=courrier_ca");
        
        
            }
                    
        
        
        }
    


?>