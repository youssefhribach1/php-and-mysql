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
         if(isset($_POST['submit'])){
         $sear=$_POST['search'];
         $query="SELECT * FROM posts WHERE post_tags LIKE '%$sear%' ";
         $select_all_posts=mysqli_query($connection,$query);
         if(!$select_all_posts){
             die('Connection Fialed'.mysqli_error($select_all_posts));
         }

        $count = mysqli_num_rows($select_all_posts);

        if($count == 0) {

            echo "<h1> NO RESULT</h1>";

        } else {
         while($row=mysqli_fetch_assoc($select_all_posts)){

          
            $title=$row['post_title'];
            $date=$row['post_date'];
            $image=$row['post_image'];
            $content=$row['post_content']; 

         ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php if(isset($title)){echo $title;}?></a>
                </h2>
              
                <p><span class="glyphicon glyphicon-time"></span><?php if(isset($date)){echo $date;}?></p>
                <hr>
                <img class="img-responsive" style="width:90%;height:300px" src="images/<?php if(isset($image)){echo $image;}?>" alt="">
                <hr>
                <p><?php if(isset($content)){echo $content;}?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                  <?php  }}}?>
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
