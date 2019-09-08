<?php include "includes/header.php"?>
<?php include "includes/db.php"?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                
                <?php
    if(isset($_POST['submit']))
                        {
                        $search=$_POST['search'];
    //like is =     
            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection ,$query);
    if(!$search_query)
    {
        die("QUERY FIELD".mysqli_error($connection));
    }  
    // to check out that search_query perform correctly we use 
    $counte = mysqli_num_rows($search_query);
    if($counte == 0 )
    {
        echo "<h1>NO RESULT</h1>";
    }
         else
    {
//                $query = "SELECT * FROM posts";
//                $select_all_cat_post_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($search_query))
                {
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    
                ?>
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php } 
                
      
         }
    }
     ?>      
            

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/slidebar.php"     ?>
                        <!-- /.col-lg-6 -->
        
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
<?php include "includes/footer.php"?>