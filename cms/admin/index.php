
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
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
    
            <script>
    
   
       

    function loadusersonline(){
      
        $.get("index.php?onlineusers=result",function(data){
            $(".usersonline").text(data);
        });
    }
   
  

    
    setInterval(function(){
    loadUsersOnline();
     },500);

    
 </script>
 

    <?php 

function users_online(){

   if(isset($_GET['onlineusers'])){

    global $connection;

  
      echo "<h1>0000000000000000000000000</h1>";

        $session=session_id();
        $time=time();
        $time_out_in_seconds=30;
        $time_out=$time - $time_out_in_seconds ;
      
        $query="SELECT * FROM users_online WHERE session='$session' ";
        $send_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($send_query);
      
        if($count == null){
            mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES ('$session','$time') ");
        }
       
        else{
          mysqli_query($connection, "UPDATE users_online SET time='$time' WHERE session='$session' ");
        }
      
        $users_online_query=mysqli_query($connection, "SELECT * FROM users_online WHERE time>'$time_out' ");
        echo $count_users=mysqli_num_rows($users_online_query);
        

    
   

}}

 
    ?>



                         
     

                <!-- <li>
                    <a href="../index.php"></i>Users Online : <?php  users_online(); ?><b class=""></b></a>
                
                </li> -->

    <li>
                    <a href="../index.php"></i>Users Online : <span class="usersonline"><?php  users_online(); ?></span><b class=""></b></a>
                
                </li>

               <li>
                    <a href="../index.php"></i>HOME SITE<b class=""></b></a>
                
                </li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> </i><?php echo  $_SESSION['uname']; ?><b class="caret"></b></a>

                    <ul class="dropdown-menu">

                    
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                  
                        <li>
                            <a href="../index.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>



                


            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   
                <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i> Categories <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="index.php?source=addcat"><i class="fa fa-fw fa-edit"></i> Add Category</a>
                            </li>
                            <li>
                                <a href="index.php?source=desplaycat"><i class="fa fa-fw fa-table"></i> desplay All Categories</a>
                            </li>
                        </ul>
                    </li>

  
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="index.php?source=addposts"><i class="fa fa-fw fa-edit"></i> Add Post</a>
                            </li>
                            <li>
                                <a href="index.php?source=desplayallposts"><i class="fa fa-fw fa-table"></i> desplay All Posts</a>
                            </li>
                        </ul>
                    </li>
                    
                   

                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Comments <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                          
                            <li>
                                <a href="index.php?source=desplayallcomments"><i class="fa fa-fw fa-table"></i> desplay All Comments</a>
                            </li>
                        </ul>
                    </li>
                    



                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="index.php?source=addusers"><i class="fa fa-fw fa-edit"></i> Add Users</a>
                            </li>
                            <li>
                                <a href="index.php?source=desplayusers"><i class="fa fa-fw fa-table"></i> desplay All Users</a>
                            </li>

                            
                            <li>
                            <a href="index.php?source=usersonline"><i class="fa fa-fw fa-user"></i> Users Online</a>
                        </li>
                   

                        </ul>
                    </li>

                        <li>
                            <a href="index.php?source=profile"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                            Welcome Mr
                            <small><?php echo $_SESSION['uname']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                       

                               <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                <?php
                $query="SELECT * FROM posts";
                $select_all_posts=mysqli_query($connection,$query);
                $count_posts=mysqli_num_rows($select_all_posts);
               
                 echo "<div class='huge'>$count_posts</div>";
                  ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="index.php?source=desplayallposts">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                $query="SELECT * FROM comments";
                $select_all_comments=mysqli_query($connection,$query);
                $count_comments=mysqli_num_rows($select_all_comments);
               
                 echo "<div class='huge'>$count_comments</div>";
                  ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="index.php?source=desplayallcomments">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                $query="SELECT * FROM users";
                $select_all_users=mysqli_query($connection,$query);
                $count_users=mysqli_num_rows($select_all_users);
               
                 echo "<div class='huge'>$count_users</div>";
                  ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="index.php?source=desplayusers">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                $query="SELECT * FROM categories";
                $select_all_categories=mysqli_query($connection,$query);
                $count_categories=mysqli_num_rows($select_all_categories);
               
                 echo "<div class='huge'>$count_categories</div>";
                  ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="index.php?source=desplaycat">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<!--
                <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

<?php 
/*
  $element_text=['Active Posts','Categories','Users','Comments'];
  $element_text=[$count_posts,$count_categories,$count_users,$count_comments];


          for($i=0;$i <4;$i++){
              echo "['{$element_text[$i]}'" . "," . "{$element_text[$i]}],";
          }  */
?>

          ['Posts', <?php echo $count_posts ;?>],
          ['categories', <?php echo $count_categories ;?>],
          ['users', <?php echo $count_users ;?>],
          ['comments', <?php echo $count_comments ;?>],
        ]);

        var options = {
          chart: {
            title: 'just test',
            subtitle: 'tttttttttt',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
  </body>
</html>
-->
                
   <?php 
   if(isset($_GET['source'])){
       $source=$_GET['source'];
   }
   else{
       $source="";
   }
   switch($source){
    case 'desplayallposts':include "includes/desplay_posts.php";break;
    case 'addposts':include "includes/add_posts.php";break;
    case 'editpost':include "includes/edit_post.php";break;
    case 'desplaycat':include "includes/desplay_cat.php";break;
    case 'editcat':include "includes/edit_cat.php";break;
    case 'addcat':include "includes/add_cat.php";break;
    case 'desplayallcomments':include "includes/desplay_all_comments.php";break;
    case 'desplayusers':include "includes/users.php";break;
    case 'addusers':include "includes/add_users.php";break;
    case 'edituser':include "includes/edit_users.php";break;
    case 'usersonline':include "includes/users_online.php";break;
    case 'profile':include "includes/profile.php";break;
    default:;break;

   }
   ?>

<?php deletepost(); ?>
<?php  deletecat(); ?>
<?php delete_commants(); ?>
<?php  delete_user(); ?>
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/scripts.js"></script>

</body>

</html>
