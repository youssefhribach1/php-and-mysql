<?php include "includes/header.php" ?>

<body>

  <?php include "includes/navigation.php" ?>
    <!-- Page Content -->



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

               
             

         <?php
        if(isset($_GET['thepostid'])){
        $theid=$_GET['thepostid'];
         $query="SELECT * FROM posts where post_id={$theid} ";
         $select_all_posts=mysqli_query($connection,$query);
         if(!$select_all_posts){
             die('Connection Fialed'.mysqli_error($select_all_posts));
         }
         while($row=mysqli_fetch_assoc($select_all_posts)){

            $id_post=$row['post_id'];
            $title=$row['post_title'];
            $date=$row['post_date'];
            $image=$row['post_image'];
            $content=$row['post_content']; 

         ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?thepostid=<?php if(isset($id_post)){echo $id_post;}?>"><?php if(isset($title)){echo $title;}?></a>
                </h2>
              
                <p><span class="glyphicon glyphicon-time"></span><?php if(isset($date)){echo $date;}?></p>
                <hr>
                <img class="img-responsive" style="width:90%;height:300px" src="images/<?php if(isset($image)){echo $image;}?>" alt="">
                <hr>
                <p><?php if(isset($content)){echo $content;}?></p>
               

                <hr>

                  <?php  } }?>


             <?php 
               if(isset($_POST['publish_the_comment'])){
               
                $c_id=$_POST['comment_id'];
                $c_author=$_POST['comment_author'];
                $c_title=$_POST['comment'];
                $c_mail=$_POST['comment_email'];

          

                    $query="INSERT INTO comments (comment_post_id,comment_id,comment_date,comment_author,comment_title,	author_mail) ";
                    $query.="VALUES ({$theid},{$c_id},now(),'{$c_author}','{$c_title}','{$c_mail}') ";
                    $add_comment=mysqli_query($connection,$query);

                    if(!$add_comment){
                        die('Connection Faialed '.mysqli_error($add_comment));
                    }

               }
               ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>


                    <div class="form-group">
                     <label for="title">Comment id:</label>
                      <input   type="text" class="form-control" name="comment_id">
                     </div>

                         <div class="form-group">
                     <label for="title">Comment author:</label>
                      <input   type="text" class="form-control" name="comment_author">
                     </div>


                          <div class="form-group">
                     <label for="title">Comment Email:</label>
                      <input   type="text" class="form-control" name="comment_email">
                     </div>

                        <button type="submit" name="publish_the_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

               
              <?php  
                  $query="select * from comments where comment_post_id={$theid} and status='Approved' ";
                  $select_all_comments=mysqli_query($connection,$query);
                  while($rows=mysqli_fetch_assoc($select_all_comments)){

                        $name=$rows['comment_author'];
                        $date=$rows['comment_date'];
                        $comment=$rows['comment_title'];
                    
                        ?>

                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php if(isset($name)){echo $name;} ?>
                                    <small><?php if(isset($date)){echo $date;} ?></small>
                                </h4>
                                
                                <?php if(isset($comment)){echo $comment;} ?>
                                <!-- Nested Comment -->
                        
                        <!-- End Nested Comment -->
                    </div>
                    </div>

                     <?php  }  ?>
             

               
                    

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>



                <!-- login-->
                <div class="well">
                    <h4>Login</h4>
                    <form action="" method="post">
                    <div class="input-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">   
                        </div>
                        <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">   
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="login">Submit
                        </button>
                        </span>
                    </div>
                    </form>
                 </div>


                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
