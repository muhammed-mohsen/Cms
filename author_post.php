<?php include "includes/header.php"?>
<?php include "includes/db.php"?>
<?php include "admin/function.php"?>

<!-- Navigation -->
<?php include "includes/navigation.php"?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php
    if(isset($_GET['p_id']))
    {
        $post_id = $_GET['p_id'];
        $post_author = $_GET['author'];
    }
                $query = "SELECT * FROM posts WHERE post_user='{$post_author}'";
                $select_all_cat_post_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_all_cat_post_query ))
                {
                    $post_title=$row['post_title'];
                    $post_author=$row['post_user'];
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
                <a href="#">
                    <?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                 
                All Post By <?php echo $post_author ?>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>
                <?php echo $post_date ?>
            </p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
            <hr>
            <p>
                <?php echo $post_content ?>
            </p>
          

            <hr>
            <?php } ?>

            <!--blog comments-->
            <!-- Comments Form -->
            
           
                           
           
            
            
            
            
            

            <!-- Comment -->
            

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/slidebar.php"     ?>


    </div>

</div>
<!-- /.row -->

<hr>
<?php include "includes/footer.php";?>
