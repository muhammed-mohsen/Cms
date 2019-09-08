<?php session_start() ?>
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
    if(isset($_GET['category']))
    {
     $post_category_id=$_GET['category'];   
   
    
    if(is_admin($_SESSION['user_name']))
    {


     $stm1 =mysqli_prepare($connection, "SELECT post_id,post_title,post_author,post_date,post_image,post_content FROM posts WHERE post_category_id=?");   
    }
    else
    {
    
        $stm2 = mysqli_prepare($connection,"SELECT  post_id,post_title,post_author,post_date,post_image,post_content FROM posts WHERE post_category_id=? AND post_status = ?"); 
         $published = 'published';
    }
         

        if(isset($stm1))
        {
            mysqli_stmt_bind_param($stm1,"i",$post_category_id);
            mysqli_stmt_execute($stm1);
            mysqli_stmt_bind_result($stm1,$post_id,$post_title,$post_author,$post_date,$post_image,$post_content);
            $stmt = $stm1;
        } 
        else
        {
            mysqli_stmt_bind_param($stm2,"is",$post_category_id,$published);

         mysqli_stmt_execute($stm2);

            mysqli_stmt_bind_result($stm2,$post_id,$post_title,$post_author,$post_date,$post_image,$post_content);    
                $stmt = $stm2;

        }  




                // $select_all_cat_post_query = mysqli_query($connection,$query);
               // echo $query ; die;
                if(mysqli_stmt_num_rows($stmt) === 0)
                {
                    echo"<h1 class = 'text-center'>NO POSTS</h1>";
                }

          
                // while($row = mysqli_fetch_assoc($select_all_cat_post_query ))
                // {
                //     $post_id = $row['post_id'];
                //     $post_title=$row['post_title'];
                //     $post_author=$row['post_author'];
                //     $post_date=$row['post_date'];
                //     $post_image=$row['post_image'];
                //     $post_content=substr($row['post_content'],0,100);

                    while(mysqli_stmt_fetch($stmt))
                    :
                    
                ?>
                
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post/<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
              
                <img class="img-responsive" src="/cms/images/<?php echo $post_image?>" alt="no images">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php endwhile;}

            else 
            {
                header("Location: index.php");
            }

                 ?>
                

                

             
            </div>  

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/slidebar.php"     ?>
                  

            </div>
</div>
        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php";?>