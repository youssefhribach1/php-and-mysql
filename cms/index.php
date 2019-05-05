<?php include "includes/header.php" ?>

<body>

  <?php include "includes/navigation.php" ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

<?php    
 $per_page=2;
                    if(isset($_GET['page'])){
                        $the_page=$_GET['page'];
                      
                    }

                    else{
                        $the_page="";
                    }

                    if($the_page="" || $the_page==1){
                        $the_page1=0;     
                    }

                    else{
                        $the_page=$_GET['page'];
                        $the_page1=($the_page*$per_page)-$per_page ;
                       
                    }
          ?>


         <?php
         $query="SELECT * FROM posts LIMIT $the_page1 , $per_page";
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
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                  <?php  } ?>

         
       <ul class="pagination"> 
                  <?php
                $query="SELECT * FROM posts";
                $send_request=mysqli_query($connection,$query);
                $count=mysqli_num_rows($send_request);
                $count=ceil($count/$per_page);

                  for($i=1;$i<=$count;$i++){
                    if($i == $the_page) {

                        echo "<li '><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
           
                   }  else {
           
                       echo "<li '><a href='index.php?page={$i}'>{$i}</a></li>";
              
                   }
                  }


                  ?>
                  
  
 
</ul>
            </div>
                  
                 
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text"  name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
          

                     <!-- login-->
                     <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
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

         <?php include "includes/login.php"; ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

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
 
 echo "<li><a href=''>$the_title</a>
 </li>";

   ?>

  <?php } ?>
                              
                                
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

       <?php include "includes/footer.php" ?>
