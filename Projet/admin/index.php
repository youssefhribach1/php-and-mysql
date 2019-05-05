
<?php include "includes/header.php" ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Gestion des Courriers</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
                <li class="dropdown">
                   
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hribach <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                     
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  
                    <li>
                        <a href="index.php?res=courrier_cd"><i class="fa fa-fw fa-table"></i> Courrier Départ</a>
                    </li>
                
                 
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Courrier Départ <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                        <li>
                            <li>
                        <a href="index.php?res=courrier_cd"><i class="fa fa-fw fa-table"></i> Courrier Départ</a>  
                           </li>
                           <li>
                        <a href="index.php?res=ajouter_cd"><i class="fa fa-fw fa-edit"></i>Ajouter Courrier Départ</a>
                    </li>
                            </li>
                        </ul>
                    </li>

                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Courrier Arrivée <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                            <li>
                        <a href="index.php?res=courrier_ca"><i class="fa fa-fw fa-table"></i>Courrier Arrivée</a>  
                           </li>
                           <li>
                        <a href="index.php?res=ajouter_ca"><i class="fa fa-fw fa-edit"></i>Ajouter Courrier Arrivée</a>
                    </li>
                            </li>
                          
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        gestion de courrier 

                            <small>de la deriction de formation</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa "></i> 
                            </li>
                           
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php

if(isset($_GET['res'])){

    $res = $_GET['res'];
    
    } else {
    
    $res = '';
    
    }

switch($res){

    case 'courrier_cd':include "includes/courrier_depart.php";break; 
    case 'courrier_ca':include "includes/courrier_arivee.php";break; 
    case 'ajouter_cd':include "includes/ajouter_cd.php";break; 
    case 'ajouter_ca':include "includes/ajouter_ca.php";break; 
    case 'modifier_cd':include "includes/modifier_cd.php";break;
    case 'modifier_ca':include "includes/modifier_ca.php";break;

       }

?>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php delete_all_cd() ?>
  <?php delete_all_ca() ?>
 
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
