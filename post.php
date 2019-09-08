    <!--
    لو حبيت اروح لاى صفحة جانبية 
    هاخد copy 
    1-header
    2navigation 
    3 slidebar
     5 widgets
    4 footer
    6- db 
    7-
    -->



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
        if(isset($_GET['p_id']))
        {
        
            $post_id = $_GET['p_id'];
        //to know number of views 
            $view_query = "UPDATE posts SET post_view_counts = post_view_counts + 1 WHERE post_id = $post_id";
            $send_query = mysqli_query($connection,$view_query);
            
            
            confirm($send_query);

        if(isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin')
        {
         $query = "SELECT * FROM posts WHERE post_id={$post_id}";   
        }
        else
        {
           
            $query = "SELECT * FROM posts WHERE post_id={$post_id} AND post_status = 'published'"; 
        }
         $select_all_cat_post_query = mysqli_query($connection,$query);
        if(mysqli_num_rows($select_all_cat_post_query)<1)
        {
            echo"<h1 class = 'text-center'>NO POSTS</h1>";
        }
        else{
                    
                   
                    while($row = mysqli_fetch_assoc($select_all_cat_post_query ))
                    {
                        $post_title=$row['post_title'];
                        $post_author=$row['post_user'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                        
                    ?>
                    

                <h1 class="page-header">
                    Posts
                    
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#">
                        <?php echo $post_title ?></a>
                        <input type="text" value="<?php echo $post_title ?>" class="form-control" name="username">
                </h2>
                <p class="lead">
                    by <a href="index.php">
                        <?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span>
                    <?php echo $post_date ?>
                </p>
                <hr>
                <img class="img-responsive" src="/cms/images/<?php echo $post_image?>" alt="">
                <hr>
                <p>
                    <?php echo $post_content ?>
                </p>
              

                <hr>
                <?php } 
        
                ?>

                <!--blog comments-->
                <!-- Comments Form -->
                
                <?php
                if(isset($_POST['create_comment']))
                {
                    
    $the_post_id = $_GET['p_id'];
    $comment_author = escape($_POST['comment_author']);
    $comment_email = escape($_POST['comment_email']);
    $comment_content = escape($_POST['comment_content']);


    if(!empty($comment_author)&&!empty($comment_email)&&
      !empty($comment_content))
    {

    $query = "INSERT INTO comment (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)"; 
    $query .= "VALUES ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";

    $create_comment = mysqli_query($connection,$query);
    confirm($create_comment);

    //$query="UPDATE posts SET post_comment_count = post_comment_count + 1 ";
    //$query .= " WHERE post_id={$the_post_id}";
    //$update_create_comment = mysqli_query($connection,$query);
    //
    //  confirm($update_create_comment);
                }
                    else
                    {
                    echo "<script>alert('fields cannot be empty')</script> ";
                              
                    }
                
                }
                
                ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                      
                             <div class="form-group">
                            <label for="Author">Author</label>
                                 <input type="text" name="comment_author"
                                 class="form-control">
                        </div>
                              <div class="form-group">
                            <label    for="Email">Email</label>
                                 <input type="text" name="comment_email"
                                 class="form-control">
                                 </div>
                            
                            <div class="form-group">
                            <label for="Comment">Your Comment</label>  
                            <textarea name ="comment_content" class="form-control" rows="3"></textarea>
                        
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

    <!-- Posted Comments -->
    <?php 
    $query = "SELECT * FROM comment where comment_post_id = {$post_id} ";

    $query.= "AND comment_status = 'approved' ";
    /*Meanin that it give us the newst comment in the first top */
    $query.="ORDER BY comment_id DESC";
    $select_comment_query=mysqli_query($connection,$query);



    while($row=mysqli_fetch_assoc($select_comment_query))
    {
        $comment_date=$row['comment_date'];
        $comment_author=$row['comment_author'];
        $comment_content=$row['comment_content'];
    ?>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $comment_author ?>
                <small><?php echo $comment_date ?></small>
            </h4>

                   <?php echo $comment_content ?>
               
                               
               </div>
                </div>
                
                <?php }}}
                else
                {
                    header("Location: index.php");
                } ?>

                
                

                <!-- Comment -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/slidebar.php"     ?>


        </div>

    </div>
    <!-- /.row -->

    <hr>
    <?php include "includes/footer.php";?>
